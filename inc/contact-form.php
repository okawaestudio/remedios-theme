<?php
/**
 * Formulario de contacto reutilizable
 *
 * Uso desde cualquier template:
 *   <?php morillo_contact_form( array( 'title' => '…', 'compact' => false ) ); ?>
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

function morillo_contact_form( $args = array() ) {
	$defaults = array(
		'title'   => __( 'Pide consulta gratuita', 'morillo' ),
		'lead'    => __( 'Te respondemos en menos de 24h con un análisis honesto de tu caso. Sin compromiso.', 'morillo' ),
		'eyebrow' => __( 'Hablemos', 'morillo' ),
		'compact' => false,
		'source'  => isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( $_SERVER['REQUEST_URI'] ) : 'unknown',
	);
	$a = wp_parse_args( $args, $defaults );

	$ok  = isset( $_GET['cf_enviado'] ) ? sanitize_text_field( wp_unslash( $_GET['cf_enviado'] ) ) : '';
	$err = isset( $_GET['cf_error'] )   ? sanitize_text_field( wp_unslash( $_GET['cf_error'] ) )   : '';
	$class = 'morillo-form' . ( $a['compact'] ? ' morillo-form--compact' : '' );
	?>

	<div class="<?php echo esc_attr( $class ); ?>" id="contacto-form">
		<header class="morillo-form__head">
			<?php if ( $a['eyebrow'] ) : ?>
				<span class="rm-eyebrow"><?php echo esc_html( $a['eyebrow'] ); ?></span>
			<?php endif; ?>
			<h2 class="morillo-form__title"><?php echo esc_html( $a['title'] ); ?></h2>
			<?php if ( $a['lead'] ) : ?>
				<p class="morillo-form__lead"><?php echo esc_html( $a['lead'] ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( $ok === '1' ) : ?>
			<div class="morillo-form__success">
				<span class="morillo-form__check">✓</span>
				<h3><?php esc_html_e( 'Mensaje recibido', 'morillo' ); ?></h3>
				<p><?php esc_html_e( 'Te respondemos en menos de 24h.', 'morillo' ); ?></p>
			</div>
		<?php else : ?>
			<?php if ( $err ) : ?>
				<div class="morillo-form__alert"><?php echo esc_html( $err ); ?></div>
			<?php endif; ?>
			<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="morillo-form__form">
				<input type="hidden" name="action" value="morillo_contact">
				<?php wp_nonce_field( 'morillo_contact_form', '_morillo_nonce' ); ?>
				<input type="hidden" name="_redirect_to" value="<?php echo esc_url( get_permalink() ); ?>">
				<input type="hidden" name="_source" value="<?php echo esc_attr( $a['source'] ); ?>">
				<!-- honeypot anti-spam -->
				<input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;" aria-hidden="true">

				<div class="morillo-form__row">
					<label class="morillo-form__field">
						<span><?php esc_html_e( 'Nombre', 'morillo' ); ?></span>
						<input type="text" name="nombre" required autocomplete="name" placeholder="<?php esc_attr_e( 'Tu nombre', 'morillo' ); ?>">
					</label>
					<label class="morillo-form__field">
						<span><?php esc_html_e( 'Teléfono', 'morillo' ); ?></span>
						<input type="tel" name="telefono" autocomplete="tel" placeholder="+34 600 000 000">
					</label>
				</div>
				<label class="morillo-form__field">
					<span><?php esc_html_e( 'Email', 'morillo' ); ?></span>
					<input type="email" name="email" required autocomplete="email" placeholder="tu@email.com">
				</label>
				<label class="morillo-form__field">
					<span><?php esc_html_e( 'Cuéntanos brevemente tu situación', 'morillo' ); ?></span>
					<textarea name="mensaje" rows="4" placeholder="<?php esc_attr_e( 'Lo que necesites contar…', 'morillo' ); ?>"></textarea>
				</label>
				<label class="morillo-form__check">
					<input type="checkbox" name="rgpd" required>
					<span><?php esc_html_e( 'Acepto la', 'morillo' ); ?> <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>" target="_blank"><?php esc_html_e( 'política de privacidad', 'morillo' ); ?></a>.</span>
				</label>
				<button type="submit" class="btn btn-primary btn-lg btn-block">
					<?php esc_html_e( 'Pedir consulta gratuita', 'morillo' ); ?> <?php morillo_arrow(); ?>
				</button>
				<p class="morillo-form__foot"><?php esc_html_e( 'Sin compromiso. Tus datos no se ceden a terceros.', 'morillo' ); ?></p>
			</form>
		<?php endif; ?>
	</div>
	<?php
}

/* ---------------------------------------------------------------
 * Form handler
 * ------------------------------------------------------------- */
function morillo_handle_contact_form() {
	$redirect = isset( $_POST['_redirect_to'] ) ? esc_url_raw( wp_unslash( $_POST['_redirect_to'] ) ) : home_url( '/' );

	$nonce = isset( $_POST['_morillo_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_morillo_nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'morillo_contact_form' ) ) {
		wp_safe_redirect( add_query_arg( 'cf_error', urlencode( 'Sesión expirada, vuelve a enviar.' ), $redirect ) . '#contacto-form' );
		exit;
	}

	$nombre   = isset( $_POST['nombre'] )   ? sanitize_text_field( wp_unslash( $_POST['nombre'] ) )   : '';
	$email    = isset( $_POST['email'] )    ? sanitize_email( wp_unslash( $_POST['email'] ) )         : '';
	$telefono = isset( $_POST['telefono'] ) ? sanitize_text_field( wp_unslash( $_POST['telefono'] ) ) : '';
	$mensaje  = isset( $_POST['mensaje'] )  ? sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ) ) : '';
	$rgpd     = isset( $_POST['rgpd'] ) ? '1' : '';
	$source   = isset( $_POST['_source'] ) ? sanitize_text_field( wp_unslash( $_POST['_source'] ) ) : '';
	$honeypot = isset( $_POST['website'] ) ? trim( wp_unslash( $_POST['website'] ) ) : '';

	if ( $honeypot !== '' ) {
		wp_safe_redirect( add_query_arg( 'cf_enviado', '1', $redirect ) . '#contacto-form' );
		exit;
	}
	if ( ! $nombre || ! $email || ! $rgpd ) {
		wp_safe_redirect( add_query_arg( 'cf_error', urlencode( 'Faltan campos obligatorios.' ), $redirect ) . '#contacto-form' );
		exit;
	}
	if ( ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'cf_error', urlencode( 'El email no es válido.' ), $redirect ) . '#contacto-form' );
		exit;
	}

	$to      = array( MORILLO_EMAIL );
	$subject = '[Web] Nuevo mensaje de ' . $nombre;
	$body    = "Nuevo lead desde nueva.remediosmorillo.com\n";
	$body   .= str_repeat( '─', 40 ) . "\n\n";
	$body   .= "Nombre:    $nombre\n";
	$body   .= "Email:     $email\n";
	$body   .= "Teléfono:  $telefono\n\n";
	$body   .= "Mensaje:\n" . ( $mensaje ?: '(sin mensaje)' ) . "\n\n";
	$body   .= str_repeat( '─', 40 ) . "\n";
	$body   .= "Origen:    $source\n";
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $nombre . ' <' . $email . '>',
	);

	$sent = wp_mail( $to, $subject, $body, $headers );
	$arg  = $sent ? 'cf_enviado' : 'cf_error';
	$val  = $sent ? '1' : urlencode( 'No pudimos enviar. Escríbenos a info@remediosmorillo.com' );
	wp_safe_redirect( add_query_arg( $arg, $val, $redirect ) . '#contacto-form' );
	exit;
}
add_action( 'admin_post_nopriv_morillo_contact', 'morillo_handle_contact_form' );
add_action( 'admin_post_morillo_contact',        'morillo_handle_contact_form' );
