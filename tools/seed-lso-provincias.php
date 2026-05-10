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
	$page_slug  = 'abogado-segunda-oportunidad-' . $slug;
	$page_title = 'Abogado Segunda Oportunidad en ' . $data['nombre'];

	// Buscar si ya existe
	$existing = get_page_by_path( $page_slug, OBJECT, 'page' );

	if ( $existing ) {
		// Actualizar template + meta + título por si cambió el dataset
		wp_update_post( array(
			'ID'         => $existing->ID,
			'post_title' => $page_title,
		) );
		update_post_meta( $existing->ID, '_wp_page_template', 'template-lso-provincia.php' );
		update_post_meta( $existing->ID, '_morillo_lso_provincia_slug', $slug );
		$updated++;
		WP_CLI::log( "↻  $page_slug (ID {$existing->ID}) actualizada" );
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
