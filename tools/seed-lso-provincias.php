<?php
/**
 * Seed bulk: crea 52 páginas LSO provinciales como DRAFT.
 *
 * USAGE:
 *   wp eval-file wp-content/themes/morillo/tools/seed-lso-provincias.php
 *
 * IDEMPOTENT: si una página ya existe (mismo slug), no la duplica;
 * actualiza el meta y el template.
 */

require_once __DIR__ . '/../inc/lso-provincias.php';

$created = 0;
$updated = 0;
$errors  = array();

foreach ( morillo_lso_provincias() as $slug => $data ) {
	$new_slug  = 'ley-segunda-oportunidad-' . $slug;
	$old_slug  = 'abogado-segunda-oportunidad-' . $slug;
	$page_title = 'Ley de Segunda Oportunidad en ' . $data['nombre'];

	// Buscar si ya existe (primero por nuevo slug, después por viejo)
	$existing = get_page_by_path( $new_slug, OBJECT, 'page' );
	if ( ! $existing ) {
		$existing = get_page_by_path( $old_slug, OBJECT, 'page' );
	}
	$page_slug = $new_slug;

	if ( $existing ) {
		// Si el slug actual no coincide con el nuevo, actualizamos.
		// wp_update_post con post_name guarda automáticamente _wp_old_slug
		// para mantener el redirect 301 desde el slug viejo.
		$update_args = array(
			'ID'         => $existing->ID,
			'post_title' => $page_title,
		);
		if ( $existing->post_name !== $new_slug ) {
			$update_args['post_name'] = $new_slug;
		}
		wp_update_post( $update_args );
		update_post_meta( $existing->ID, '_wp_page_template', 'template-lso-provincia.php' );
		update_post_meta( $existing->ID, '_morillo_lso_provincia_slug', $slug );
		$updated++;
		WP_CLI::log( "↻  $new_slug (ID {$existing->ID}) actualizada" . ( $existing->post_name !== $new_slug ? " [slug migrado desde {$existing->post_name}]" : '' ) );
		continue;
	}

	$post_id = wp_insert_post( array(
		'post_title'   => $page_title,
		'post_name'    => $page_slug,
		'post_status'  => 'draft',     // ← DRAFT por seguridad
		'post_type'    => 'page',
		'post_content' => '',           // El contenido lo renderiza el template
		'post_excerpt' => 'Cancelación legal de deudas para particulares y autónomos en ' . $data['nombre'] . '. Procedimiento concursal completo ante el ' . $data['juzgado'] . '.',
		'meta_input'   => array(
			'_wp_page_template'             => 'template-lso-provincia.php',
			'_morillo_lso_provincia_slug'   => $slug,
		),
	), true );

	if ( is_wp_error( $post_id ) ) {
		$errors[] = "$page_slug: " . $post_id->get_error_message();
		continue;
	}

	$created++;
	WP_CLI::log( "✓  $page_slug (ID $post_id) creada DRAFT" );
}

WP_CLI::success( sprintf(
	'Listo · %d creadas · %d actualizadas · %d errores',
	$created, $updated, count( $errors )
) );
if ( $errors ) {
	WP_CLI::warning( "Errores:\n  " . implode( "\n  ", $errors ) );
}
