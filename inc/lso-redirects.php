<?php
/**
 * Redirects 301 para slugs LSO antiguos.
 *
 * WP `wp_old_slug_redirect()` no detecta páginas (post_type=page) en algunos
 * escenarios — añadimos un handler manual robusto que redirige cualquier
 * `/abogado-segunda-oportunidad-X/` a `/ley-segunda-oportunidad-X/`.
 *
 * Se ejecuta antes de que WP intente resolver la 404 final.
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

add_action( 'template_redirect', function() {
	$request_uri = $_SERVER['REQUEST_URI'] ?? '';
	$path        = trim( wp_parse_url( $request_uri, PHP_URL_PATH ) ?? '', '/' );

	// Patron: abogado-segunda-oportunidad-{cualquier-slug}
	if ( preg_match( '#^abogado-segunda-oportunidad-([a-z0-9-]+)$#', $path, $m ) ) {
		$new_url = home_url( '/ley-segunda-oportunidad-' . $m[1] . '/' );
		wp_redirect( $new_url, 301 );
		exit;
	}
}, 1 );
