<?php
/** HERO v2 — editorial asimétrico 8/4. */
defined( 'ABSPATH' ) || exit;
$theme_uri = get_template_directory_uri();
?>
<section class="v2-section v2-hero">
	<div class="v2-container">
		<div class="v2-hero__grid" data-stagger>
			<div class="v2-hero__left">
				<span class="v2-eyebrow"><span class="v2-pulse" aria-hidden="true"></span>[ÁREA · LEY DE SEGUNDA OPORTUNIDAD]</span>
				<h1 class="v2-hero__title">
					Cancela tus deudas con la
					<em class="v2-hero__accent">Ley de Segunda Oportunidad.</em>
				</h1>
				<p class="v2-hero__lead">
					Defensa especializada para particulares y autónomos.
					Más de 200 expedientes resueltos. Primera consulta totalmente
					gratuita y confidencial.
				</p>
				<div class="v2-hero__ctas">
					<a class="v2-btn v2-btn--primary" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">
						Consulta gratuita
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a class="v2-btn v2-btn--ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
				<div class="v2-hero__microstats" role="group" aria-label="Cifras del despacho">
					<div class="v2-hero__microstat">
						<span class="v2-hero__microstat-label">[CASOS]</span>
						<span class="v2-hero__microstat-value">200+</span>
					</div>
					<div class="v2-hero__microstat">
						<span class="v2-hero__microstat-label">[ÉXITO]</span>
						<span class="v2-hero__microstat-value">92%</span>
					</div>
					<div class="v2-hero__microstat">
						<span class="v2-hero__microstat-label">[SEDES]</span>
						<span class="v2-hero__microstat-value">2</span>
					</div>
				</div>
			</div>
			<div class="v2-hero__right">
				<figure class="v2-hero__photo">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
					     alt="Remedios Morillo Hernán, abogada titular"
					     fetchpriority="high"
					     width="600" height="750">
					<figcaption class="v2-hero__photo-tag">[ REMEDIOS MORILLO HERNÁN · TITULAR ]</figcaption>
				</figure>
			</div>
		</div>
	</div>
</section>
