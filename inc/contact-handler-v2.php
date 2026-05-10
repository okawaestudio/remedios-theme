<?php
/**
 * Handler unificado de formularios de contacto v2.
 *
 * Endpoint: admin-post.php?action=morillo_contact_submit
 *
 * Acepta cualquier combinación de campos de los formularios v2:
 *   nombre, telefono, email, provincia, area, mensaje, importe, antig,
 *   anyo, tipo, opt, hf_*, acepto + honeypot hp_nombre
 *
 * Acciones:
 *   1. Honeypot: si hp_nombre tiene contenido, descarta silenciosamente.
 *   2. Verifica nonce (morillo_nonce, action=morillo_contact).
 *   3. Sanitiza todos los campos.
 *   4. Envía email a MORILLO_EMAIL con TODOS los datos del lead.
 *   5. Guarda el lead en wp_options (cola morillo_leads, últimos 200) por
 *      si el email falla.
 *   6. Redirige a /gracias/ con ?ref={referer-slug} para tracking.
 *
 * En LocalWP los emails los captura Mailpit (Local app → Mailpit tab).
 * En Cloudways usa el SMTP configurado en el server.
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

function morillo_contact_handler() {

	// 1. Honeypot: spam silencioso
	if ( ! empty( $_POST['hp_nombre'] ?? null ) ) {
		wp_safe_redirect( home_url( '/gracias/' ) );
		exit;
	}

	// 2. Nonce
	if ( ! isset( $_POST['morillo_nonce'] ) || ! wp_verify_nonce( $_POST['morillo_nonce'], 'morillo_contact' ) ) {
		wp_die( 'Token de seguridad caducado. Vuelve a la página anterior y reenvía el formulario.', 'Error', array( 'response' => 403, 'back_link' => true ) );
	}

	// 3. Sanitizar
	$keys = array(
		'nombre', 'telefono', 'email', 'provincia', 'area', 'mensaje',
		'importe', 'antig', 'anyo', 'tipo', 'opt', 'acepto',
		'hf_nombre', 'hf_tel', 'hf_email', 'hf_importe', 'hf_emisor',
		'hf_anyo', 'hf_tipo', 'hf_area', 'hf_provincia', 'hf_acepto',
	);
	$data = array();
	foreach ( $keys as $k ) {
		if ( isset( $_POST[ $k ] ) ) {
			$v = is_array( $_POST[ $k ] ) ? array_map( 'sanitize_text_field', $_POST[ $k ] ) : sanitize_text_field( wp_unslash( $_POST[ $k ] ) );
			if ( $k === 'mensaje' ) $v = sanitize_textarea_field( wp_unslash( $_POST[ $k ] ) );
			if ( $k === 'email' || $k === 'hf_email' ) $v = sanitize_email( $v );
			$data[ $k ] = $v;
		}
	}

	// Origen (URL desde donde viene)
	$origen     = isset( $_POST['origen'] ) ? sanitize_text_field( wp_unslash( $_POST['origen'] ) ) : 'desconocido';
	$referer    = wp_get_referer() ?: '';
	$referer_path = $referer ? trim( wp_parse_url( $referer, PHP_URL_PATH ) ?? '', '/' ) : '';

	// Campos efectivos (consolidar nombre/email/tel ya vengan del form completo o del hero)
	$nombre   = $data['nombre']   ?? $data['hf_nombre'] ?? '';
	$telefono = $data['telefono'] ?? $data['hf_tel']    ?? '';
	$email    = $data['email']    ?? $data['hf_email']  ?? '';

	// Validación mínima
	if ( ! $nombre || ! $telefono || ! $email || ! is_email( $email ) ) {
		wp_die( 'Faltan datos obligatorios (nombre, teléfono, email). Vuelve a la página anterior y completa el formulario.', 'Datos incompletos', array( 'response' => 400, 'back_link' => true ) );
	}

	// 4. Email
	$asunto = sprintf( '[Web] Nuevo lead · %s · %s', $nombre, $referer_path ?: 'home' );
	$cuerpo  = "Nuevo lead recibido desde la web:\n\n";
	$cuerpo .= "ORIGEN: " . ( $referer_path ?: 'home' ) . "\n";
	$cuerpo .= "URL:    " . $referer . "\n\n";
	$cuerpo .= "DATOS DEL CONTACTO:\n";
	$cuerpo .= "  Nombre:    $nombre\n";
	$cuerpo .= "  Teléfono:  $telefono\n";
	$cuerpo .= "  Email:     $email\n";
	if ( ! empty( $data['provincia'] ) ) $cuerpo .= "  Provincia: " . $data['provincia'] . "\n";
	if ( ! empty( $data['area'] ) || ! empty( $data['hf_area'] ) ) $cuerpo .= "  Área:      " . ( $data['area'] ?? $data['hf_area'] ) . "\n";

	$detalles = array(
		'importe'     => 'Importe deuda',
		'hf_importe'  => 'Importe deuda',
		'antig'       => 'Antigüedad tarjeta',
		'anyo'        => 'Año hipoteca',
		'hf_anyo'     => 'Año hipoteca',
		'tipo'        => 'Tipo reclamación',
		'hf_tipo'     => 'Tipo reclamación',
		'hf_emisor'   => 'Emisor tarjeta',
		'opt'         => 'Opción seleccionada',
	);
	$detalle_lines = array();
	foreach ( $detalles as $k => $label ) {
		if ( ! empty( $data[ $k ] ) ) $detalle_lines[] = "  $label: " . $data[ $k ];
	}
	if ( $detalle_lines ) $cuerpo .= "\nDETALLES:\n" . implode( "\n", $detalle_lines ) . "\n";

	if ( ! empty( $data['mensaje'] ) ) {
		$cuerpo .= "\nMENSAJE:\n" . $data['mensaje'] . "\n";
	}

	$cuerpo .= "\n---\nIP: " . ( $_SERVER['REMOTE_ADDR'] ?? '?' ) . "\nUA: " . ( $_SERVER['HTTP_USER_AGENT'] ?? '?' ) . "\nFecha: " . current_time( 'mysql' ) . "\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'From: Web Remedios Morillo <noreply@' . wp_parse_url( home_url(), PHP_URL_HOST ) . '>',
		'Reply-To: ' . $nombre . ' <' . $email . '>',
	);
	wp_mail( MORILLO_EMAIL, $asunto, $cuerpo, $headers );

	// 5. Guardar en cola wp_options (últimos 200)
	$leads = get_option( 'morillo_leads', array() );
	$leads[] = array(
		'fecha'    => current_time( 'mysql' ),
		'nombre'   => $nombre,
		'telefono' => $telefono,
		'email'    => $email,
		'origen'   => $referer_path ?: 'home',
		'data'     => $data,
	);
	if ( count( $leads ) > 200 ) $leads = array_slice( $leads, -200 );
	update_option( 'morillo_leads', $leads, false );

	// 6. Redirect a /gracias/?ref=
	$gracias_url = add_query_arg( 'ref', urlencode( $referer_path ?: 'home' ), home_url( '/gracias/' ) );
	wp_safe_redirect( $gracias_url );
	exit;
}
add_action( 'admin_post_morillo_contact_submit',         'morillo_contact_handler' );
add_action( 'admin_post_nopriv_morillo_contact_submit',  'morillo_contact_handler' );

/**
 * Helper: devuelve los hidden inputs que cualquier formulario v2 debe
 * incluir para usar el handler unificado.
 */
function morillo_form_hidden_fields() {
	wp_nonce_field( 'morillo_contact', 'morillo_nonce' );
	echo '<input type="hidden" name="action" value="morillo_contact_submit">';
}

/**
 * Helper: action del formulario.
 */
function morillo_form_action() {
	return esc_url( admin_url( 'admin-post.php' ) );
}
