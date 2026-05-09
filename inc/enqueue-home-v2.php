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
	if ( ! is_front_page() ) return;

	// Desencolar v1 sólo en la home — el resto del sitio sigue con v1 sin tocar.
	// Las fuentes Google Fonts CDN sobran porque ya cargamos Fraunces/Inter/JBM
	// self-hostadas; tokens.css y main.css v1 pueden colisionar con el scope v2.
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

	// Motion One (vendored UMD) — opcional, sólo si se va a usar para animaciones avanzadas.
	// Por defecto el sistema usa CSS transitions + IntersectionObserver, no Motion.
	// Lo dejamos cargado por si se quiere extender.
	$motion_path = $theme_path . '/assets/js/vendor/motion.js';
	if ( file_exists( $motion_path ) ) {
		wp_enqueue_script(
			'morillo-motion',
			$theme_uri . '/assets/js/vendor/motion.js',
			array(),
			filemtime( $motion_path ),
			array( 'in_footer' => true, 'strategy' => 'defer' )
		);
	}

	// home-v2.js (depende de motion)
	$js_v2_path = $theme_path . '/assets/js/home-v2.js';
	wp_enqueue_script(
		'morillo-home-v2',
		$theme_uri . '/assets/js/home-v2.js',
		array( 'morillo-motion' ),
		file_exists( $js_v2_path ) ? filemtime( $js_v2_path ) : MORILLO_VERSION,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);
}, 20 );
