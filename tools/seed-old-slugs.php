<?php
/**
 * Añade _wp_old_slug a las páginas LSO provinciales para activar
 * los redirects 301 automáticos de WP desde los slugs antiguos
 * (abogado-segunda-oportunidad-X) a los nuevos (ley-segunda-oportunidad-X).
 *
 * USAGE: wp eval-file wp-content/themes/morillo/tools/seed-old-slugs.php
 */

require_once __DIR__ . '/../inc/lso-provincias.php';

$count = 0;
foreach ( morillo_lso_provincias() as $slug => $data ) {
	$new_slug = 'ley-segunda-oportunidad-' . $slug;
	$old_slug = 'abogado-segunda-oportunidad-' . $slug;
	$post     = get_page_by_path( $new_slug, OBJECT, 'page' );
	if ( ! $post ) {
		WP_CLI::warning( "No existe: $new_slug" );
		continue;
	}
	// add_post_meta con $unique=false porque puede haber varios old_slugs
	// Pero antes verificamos que no esté ya añadido
	$existing = get_post_meta( $post->ID, '_wp_old_slug' );
	if ( in_array( $old_slug, $existing, true ) ) {
		WP_CLI::log( "·  $old_slug ya tiene meta (ID {$post->ID})" );
		continue;
	}
	add_post_meta( $post->ID, '_wp_old_slug', $old_slug, false );
	$count++;
	WP_CLI::log( "✓  $old_slug → $new_slug (ID {$post->ID})" );
}

WP_CLI::success( "$count old-slugs añadidos." );
