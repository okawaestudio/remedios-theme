<?php
/** HERO v2.1 — full-bleed Madrid skyline con overlay navy.
 *  Usa <picture> con WebP + JPG fallback, fetchpriority="high" y preload
 *  declarado en header-v2 para optimizar LCP. */
defined( 'ABSPATH' ) || exit;
$theme_uri = get_template_directory_uri();
$bg_jpg     = $theme_uri . '/assets/img/hero/madrid-granvia.jpg';
$bg_webp_lg = $theme_uri . '/assets/img/hero/madrid-granvia.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/madrid-granvia-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/madrid-granvia-720.webp';
?>
<section class="v2-hero-bg">
	<picture class="v2-hero-bg__picture" aria-hidden="true">
		<source type="image/webp"
		        srcset="<?php echo esc_url( $bg_webp_sm ); ?> 720w,
		                <?php echo esc_url( $bg_webp_md ); ?> 1280w,
		                <?php echo esc_url( $bg_webp_lg ); ?> 1920w"
		        sizes="100vw">
		<img src="<?php echo esc_url( $bg_jpg ); ?>" alt="" fetchpriority="high" decoding="async" width="1920" height="1281">
	</picture>
	<div class="v2-hero-bg__overlay" aria-hidden="true"></div>
	<div class="v2-hero-bg__inner" data-stagger>
		<span class="v2-hero-bg__eyebrow">DESPACHO JURÍDICO · MADRID · MÁLAGA</span>
		<h1 class="v2-hero-bg__title">
			Cancela tus deudas con la
			<em class="v2-hero-bg__accent">Ley de Segunda Oportunidad.</em>
		</h1>
		<p class="v2-hero-bg__lead">
			Defensa especializada para particulares y autónomos.
			Más de 200 expedientes resueltos. Primera consulta totalmente
			gratuita y confidencial.
		</p>
		<div class="v2-hero-bg__ctas">
			<a class="v2-btn v2-btn--inverse" href="<?php echo esc_url( home_url( '/contacto/#contacto-home' ) ); ?>">
				Consulta gratuita
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
			<a class="v2-btn v2-btn--inverse-ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
				☎ <?php echo esc_html( MORILLO_PHONE ); ?>
			</a>
		</div>
		<div class="v2-hero-bg__microstats">
			<div class="v2-hero-bg__microstat">
				<span class="v2-hero-bg__microstat-label">CASOS</span>
				<span class="v2-hero-bg__microstat-value">200+</span>
			</div>
			<div class="v2-hero-bg__microstat">
				<span class="v2-hero-bg__microstat-label">ÉXITO</span>
				<span class="v2-hero-bg__microstat-value">92%</span>
			</div>
			<div class="v2-hero-bg__microstat">
				<span class="v2-hero-bg__microstat-label">SEDES</span>
				<span class="v2-hero-bg__microstat-value">2</span>
			</div>
		</div>
	</div>
</section>
