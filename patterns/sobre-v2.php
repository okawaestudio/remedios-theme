<?php
/** SOBRE EL DESPACHO v2.1 — split 5/7 con foto + chip [200+ EXPEDIENTES]. */
defined( 'ABSPATH' ) || exit;
$theme_uri = get_template_directory_uri();
?>
<section class="v2-section">
	<div class="v2-container">
		<div class="v2-sobre__grid" data-animate="fade-up">
			<div class="v2-sobre__photo-wrap">
				<figure class="v2-sobre__photo">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
					     alt="Remedios Morillo Hernán, abogada titular"
					     loading="lazy"
					     width="600" height="800">
				</figure>
				<span class="v2-sobre__chip">[ 200+ EXPEDIENTES RESUELTOS ]</span>
			</div>
			<div class="v2-sobre__body">
				<span class="v2-eyebrow">SOBRE EL DESPACHO</span>
				<h2 class="v2-sobre__title">
					Soy <em>Remedios Morillo</em>,<br>
					y respondo personalmente.
				</h2>
				<p>
					Trato cada expediente como si fuera el único. Mi especialidad es la Ley
					de la Segunda Oportunidad, pero también dirijo asuntos de derecho
					bancario, civil, mercantil y penal cuando el cliente necesita un
					acompañamiento integral.
				</p>
				<p>
					No vendo soluciones milagrosas. Vendo seguimiento humano, transparencia
					de honorarios desde el primer email, y un análisis honesto de viabilidad
					antes de aceptar cualquier expediente.
				</p>
				<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">
					[ Conoce al equipo ]
					<span class="v2-arrow" aria-hidden="true">→</span>
				</a>
			</div>
		</div>
	</div>
</section>
