<?php
/**
 * Morillo theme · functions
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

define( 'MORILLO_VERSION', '1.0.0' );
define( 'MORILLO_PHONE',   '634 717 166' );
define( 'MORILLO_PHONE_RAW', '+34634717166' );
define( 'MORILLO_EMAIL',   'info@remediosmorillo.com' );

/* ---------------------------------------------------------------
 * 1. Theme setup
 * ------------------------------------------------------------- */
function morillo_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Menú principal', 'morillo' ),
		'footer'  => __( 'Menú del pie', 'morillo' ),
	) );
}
add_action( 'after_setup_theme', 'morillo_setup' );

/* ---------------------------------------------------------------
 * 2. Enqueue assets
 * ------------------------------------------------------------- */
function morillo_enqueue() {
	// Tipografías: Inter Tight (única para todo el sitio) + JetBrains Mono (datos/refs)
	wp_enqueue_style(
		'morillo-fonts',
		'https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300..900;1,300..900&family=JetBrains+Mono:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Tokens del design system (custom properties) — se carga ANTES que main.css
	$tokens_path = get_template_directory() . '/assets/css/tokens.css';
	if ( file_exists( $tokens_path ) ) {
		wp_enqueue_style(
			'morillo-tokens',
			get_template_directory_uri() . '/assets/css/tokens.css',
			array( 'morillo-fonts' ),
			filemtime( $tokens_path )
		);
	}

	// Hoja de estilos del tema (versión = filemtime para auto-bust en cada deploy)
	$css_path = get_template_directory() . '/assets/css/main.css';
	$css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : MORILLO_VERSION;
	wp_enqueue_style(
		'morillo-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'morillo-tokens', 'morillo-fonts' ),
		$css_ver
	);

	// JS principal (defer)
	$js_path = get_template_directory() . '/assets/js/main.js';
	$js_ver  = file_exists( $js_path ) ? filemtime( $js_path ) : MORILLO_VERSION;
	wp_enqueue_script(
		'morillo-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$js_ver,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'morillo_enqueue' );

/* ---------------------------------------------------------------
 * 3. Helpers de marca / branding
 * ------------------------------------------------------------- */
function morillo_logo( $width = 220, $color = 'navy' ) {
	// Carga el archivo según el color: -navy (fondo claro) o -cream (fondo oscuro).
	// Cada archivo viene con su color hardcoded en el SVG (no depende del CSS).
	$is_light = ( $color === 'cream' || $color === 'light' );
	$file     = $is_light ? 'logo-horizontal-cream.svg' : 'logo-horizontal-navy.svg';
	$path     = get_template_directory() . '/assets/img/brand/' . $file;

	// Fallback al archivo legacy si los nuevos no existen
	if ( ! file_exists( $path ) ) {
		$path = get_template_directory() . '/assets/img/brand/logo-horizontal.svg';
	}
	if ( ! file_exists( $path ) ) {
		return;
	}
	$svg = file_get_contents( $path );
	if ( $svg === false ) return;

	echo morillo_render_inline_svg(
		$svg,
		array(
			'prefix' => $is_light ? 'mlogol' : 'mlogod',
			'class'  => $is_light ? 'morillo-logo morillo-logo--light' : 'morillo-logo morillo-logo--dark',
			'width'  => (int) $width,
			'role'   => 'img',
			'aria-label' => 'Remedios Morillo · Despacho de abogados',
		)
	);
}

/**
 * Inyecta un SVG inline con clases internas prefijadas (namespace) y atributos
 * width/height calculados desde el viewBox. Evita colisiones globales entre
 * múltiples SVG inline del mismo documento (cls-1, cls-2, IDs Capa_X…).
 *
 * @param string $svg     Contenido completo del archivo .svg
 * @param array  $args    prefix(string, requerido), class(string), width(int),
 *                        role(string), aria-label(string)
 * @return string         SVG listo para echo
 */
function morillo_render_inline_svg( $svg, $args = array() ) {
	$prefix = isset( $args['prefix'] ) ? preg_replace( '/[^a-z0-9_-]/i', '', (string) $args['prefix'] ) : '';
	if ( ! $prefix ) {
		$prefix = 'svg' . substr( md5( $svg ), 0, 6 );
	}

	// 1) Quitar XML declaration
	$svg = preg_replace( '/<\?xml[^>]*\?>\s*/', '', $svg );

	// 2) Namespace de clases: cls-N → {prefix}-cls-N (en class="..." y en <style>)
	$svg = preg_replace_callback(
		'/class="([^"]+)"/',
		function( $m ) use ( $prefix ) {
			$classes = preg_split( '/\s+/', trim( $m[1] ) );
			$out = array();
			foreach ( $classes as $c ) {
				if ( preg_match( '/^cls-/', $c ) ) {
					$out[] = $prefix . '-' . $c;
				} else {
					$out[] = $c;
				}
			}
			return 'class="' . implode( ' ', $out ) . '"';
		},
		$svg
	);
	// Reemplazo dentro de <style>...</style>: ".cls-N" → ".{prefix}-cls-N"
	$svg = preg_replace_callback(
		'/<style[^>]*>(.*?)<\/style>/s',
		function( $m ) use ( $prefix ) {
			$css = preg_replace( '/\.cls-/', '.' . $prefix . '-cls-', $m[1] );
			return '<style>' . $css . '</style>';
		},
		$svg
	);

	// 3) Namespace de IDs: id="Capa_X" → id="{prefix}-Capa_X"
	$svg = preg_replace( '/id="([^"]+)"/', 'id="' . $prefix . '-$1"', $svg );
	// y referencias internas href/url(#ID)
	$svg = preg_replace( '/href="#([^"]+)"/', 'href="#' . $prefix . '-$1"', $svg );
	$svg = preg_replace( '/url\(#([^)]+)\)/', 'url(#' . $prefix . '-$1)', $svg );

	// 4) Calcular height desde viewBox para mantener aspect ratio
	$width  = isset( $args['width'] ) ? (int) $args['width'] : 0;
	$height = 0;
	if ( $width > 0 && preg_match( '/viewBox="([\d.\-\s]+)"/', $svg, $m ) ) {
		$parts = preg_split( '/\s+/', trim( $m[1] ) );
		if ( count( $parts ) === 4 && (float) $parts[2] > 0 ) {
			$height = (int) round( $width * (float) $parts[3] / (float) $parts[2] );
		}
	}

	// 5) Quitar atributos width/height previos
	$svg = preg_replace( '/\s(width|height)="[^"]*"/i', '', $svg, 2 );

	// 6) Inyectar atributos en el <svg> raíz
	$attrs = '';
	if ( ! empty( $args['class'] ) )      $attrs .= ' class="' . esc_attr( $args['class'] ) . '"';
	if ( $width > 0 )                     $attrs .= ' width="' . $width . '"';
	if ( $height > 0 )                    $attrs .= ' height="' . $height . '"';
	if ( ! empty( $args['role'] ) )       $attrs .= ' role="' . esc_attr( $args['role'] ) . '"';
	if ( ! empty( $args['aria-label'] ) ) $attrs .= ' aria-label="' . esc_attr( $args['aria-label'] ) . '"';
	// shape-rendering: geometricPrecision evita que líneas finas (puntos de "i", etc.)
	// desaparezcan por antialiasing al renderizar a tamaños pequeños.
	$attrs .= ' shape-rendering="geometricPrecision"';

	$svg = preg_replace( '/<svg\b([^>]*)>/', '<svg$1' . $attrs . '>', $svg, 1 );

	return $svg;
}

function morillo_arrow( $size = 16 ) {
	?>
	<svg class="morillo-arrow" width="<?php echo (int) $size; ?>" height="<?php echo (int) $size; ?>" viewBox="0 0 16 16" fill="none" aria-hidden="true">
		<path d="M2 8h11M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
	<?php
}

/**
 * Iconos line-art inline para áreas de práctica de la home.
 * Cada icono usa stroke="currentColor", de modo que el color lo dicta el CSS del padre.
 */
function morillo_area_icon( $key ) {
	$icons = array(
		// LSO — flecha circular tipo "reset" (segunda oportunidad)
		'lso'        => '<path d="M21 12a9 9 0 1 1-3.5-7.1M21 4v5h-5"/>',
		// Bancario — edificio columnas (banco)
		'bancario'   => '<path d="M3 21h18M4 10h16M5 10v11M12 10v11M19 10v11M3 8 12 3l9 5"/>',
		// Mercantil — handshake / contrato
		'mercantil'  => '<path d="M9 11 6 8m0 0L3 11l5 5 4-4m6-3 3-3m0 0-3-3-3 3M9 13l3 3 8-8"/>',
		// Patrimonio — monedas apiladas
		'patrimonio' => '<ellipse cx="12" cy="6" rx="8" ry="3"/><path d="M4 6v6c0 1.7 3.6 3 8 3s8-1.3 8-3V6M4 12v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/>',
		// Civil — balanza de la justicia
		'civil'      => '<path d="M12 3v18M5 21h14M6 8l-3 6h6l-3-6Zm12 0-3 6h6l-3-6ZM4 5l8-2 8 2"/>',
		// Penal — gavel / mazo de juez
		'penal'      => '<path d="m13 4 7 7M9 8l7 7-2 2-7-7 2-2ZM3 21h12M14 14l-3 3"/>',
	);
	$d = isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['lso'];
	return '<svg class="rm-area__svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $d . '</svg>';
}

/* ---------------------------------------------------------------
 * 4. Sanity: redirección /index.php → /
 * ------------------------------------------------------------- */
add_filter( 'document_title_separator', function() { return '·'; } );

/* ---------------------------------------------------------------
 * 5. Limpiar cosas no necesarias del head
 * ------------------------------------------------------------- */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

/* ---------------------------------------------------------------
 * 6. Modules adicionales
 * ------------------------------------------------------------- */
require_once get_template_directory() . '/inc/contact-form.php';
require_once get_template_directory() . '/inc/reviews.php';
require_once get_template_directory() . '/inc/enqueue-home-v2.php';
require_once get_template_directory() . '/inc/contact-handler-v2.php';
require_once get_template_directory() . '/inc/lso-redirects.php';
require_once get_template_directory() . '/inc/cpt-casos.php';

/* ---------------------------------------------------------------
 * 7. Datos de las sedes
 * ------------------------------------------------------------- */
function morillo_offices() {
	return array(
		array(
			'city'    => 'Madrid',
			'address' => 'Calle Valenzuela 8, 1ª Derecha, 28014 Madrid',
			'maps'    => 'https://maps.google.com/?q=Calle+Valenzuela+8+28014+Madrid',
		),
		array(
			'city'    => 'Málaga',
			'address' => 'Calle Cárcer 1, 1º Izquierda, Distrito Centro, 29008 Málaga',
			'maps'    => 'https://maps.google.com/?q=Calle+Cárcer+1+29008+Málaga',
		),
	);
}
