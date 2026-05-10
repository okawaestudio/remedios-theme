<?php
/**
 * Enqueue assets v2 — sólo en la home.
 *
 * Carga tokens-v2.css, home-v2.css, motion (vendored) y home-v2.js únicamente
 * cuando is_front_page(). El resto del sitio no recibe nada de esto.
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', function () {
	// v2.5: el sistema v2 (header + footer + tipografía + tokens) es global.
	// Desencolamos los assets v1 en TODO el sitio para evitar colisiones.
	// La hoja main.css v1 con clases .rm-* y .site-* legacy se mantiene
	// en disco pero ya no se carga.
	wp_dequeue_style( 'morillo-fonts' );
	wp_dequeue_style( 'morillo-tokens' );
	wp_dequeue_style( 'morillo-main' );
	wp_dequeue_script( 'morillo-main' );

	$theme_uri  = get_template_directory_uri();
	$theme_path = get_template_directory();

	// tokens-v2.css (incluye @font-face self-hostadas)
	$tokens_v2_path = $theme_path . '/assets/css/tokens-v2.css';
	wp_enqueue_style(
		'morillo-tokens-v2',
		$theme_uri . '/assets/css/tokens-v2.css',
		array(),
		file_exists( $tokens_v2_path ) ? filemtime( $tokens_v2_path ) : MORILLO_VERSION
	);

	// home-v2.css (depende de tokens-v2)
	$home_v2_path = $theme_path . '/assets/css/home-v2.css';
	wp_enqueue_style(
		'morillo-home-v2',
		$theme_uri . '/assets/css/home-v2.css',
		array( 'morillo-tokens-v2' ),
		file_exists( $home_v2_path ) ? filemtime( $home_v2_path ) : MORILLO_VERSION
	);

	// Motion One vendored — DESACTIVADO en v2.2 porque no lo usa nadie.
	// Si en el futuro algún partial necesita springs avanzados, re-enqueue
	// condicionalmente desde el partial mediante wp_enqueue_script aquí.

	// home-v2.js — sin dependencia de motion (solo CSS transitions + IO).
	$js_v2_path = $theme_path . '/assets/js/home-v2.js';
	wp_enqueue_script(
		'morillo-home-v2',
		$theme_uri . '/assets/js/home-v2.js',
		array(),
		file_exists( $js_v2_path ) ? filemtime( $js_v2_path ) : MORILLO_VERSION,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);
}, 20 );
