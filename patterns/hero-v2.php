<?php
/** HERO v2.2 — full-bleed Madrid + form sutil derecha (alineado con header). */
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
		<div class="v2-hero-bg__left">
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
				<a class="v2-btn v2-btn--inverse" href="#contacto-home">
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

		<form class="v2-hero-form" method="post" action="#contacto-home" novalidate aria-label="Captura rápida de contacto">
			<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
			<p class="v2-hero-form__eyebrow">CONSULTA GRATUITA</p>
			<h2 class="v2-hero-form__title">Cuéntanos tu caso.</h2>
			<p class="v2-hero-form__sub">Te respondemos en menos de 24h.</p>
			<div class="v2-hero-form__stack">
				<div class="v2-hero-form__field">
					<label for="hf-nombre" class="screen-reader-text">Nombre</label>
					<input type="text" id="hf-nombre" name="hf_nombre" placeholder="Nombre" required>
				</div>
				<div class="v2-hero-form__field">
					<label for="hf-tel" class="screen-reader-text">Teléfono</label>
					<input type="tel" id="hf-tel" name="hf_tel" placeholder="Teléfono" required>
				</div>
				<div class="v2-hero-form__field">
					<label for="hf-importe" class="screen-reader-text">Importe aproximado de deuda</label>
					<select id="hf-importe" name="hf_importe" required>
						<option value="">Importe aproximado de deuda</option>
						<option value="<8000">Menos de 8.000 €</option>
						<option value="8000-15000">8.000 – 15.000 €</option>
						<option value="15000-100000">15.000 – 100.000 €</option>
						<option value=">100000">Más de 100.000 €</option>
					</select>
				</div>
				<button type="submit" class="v2-btn v2-btn--primary v2-btn--block v2-hero-form__submit">
					Pedir consulta gratuita
					<span class="v2-arrow" aria-hidden="true">→</span>
				</button>
			</div>
			<p class="v2-hero-form__microcopy">SIN COMPROMISO · CONFIDENCIAL</p>
		</form>
	</div>
</section>
