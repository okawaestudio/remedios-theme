<?php
/** EL PROCESO v2.4 — timeline horizontal 4 pasos. */
defined( 'ABSPATH' ) || exit;

$pasos = array(
	array(
		'num' => '01', 'tiempo' => 'Día 0',
		'titulo' => 'Primera llamada',
		'desc' => 'Cuéntame tu situación sin compromiso. 30 minutos. Yo te escucho.',
	),
	array(
		'num' => '02', 'tiempo' => '< 24h',
		'titulo' => 'Análisis de viabilidad',
		'desc' => 'Reviso documentación y te respondo por escrito si tu caso encaja, con honorarios cerrados.',
	),
	array(
		'num' => '03', 'tiempo' => '1-4 meses',
		'titulo' => 'Expediente y escritos',
		'desc' => 'Preparo, presento y defiendo. Te mando cada paso por email y resolvemos dudas por WhatsApp.',
	),
	array(
		'num' => '04', 'tiempo' => 'Sentencia',
		'titulo' => 'Resolución y seguimiento',
		'desc' => 'Te acompaño hasta el último auto y te aviso de cualquier obligación posterior.',
	),
);
?>
<section class="v2-section v2-section--cream v2-proceso">
	<div class="v2-container">
		<header class="v2-proceso__head">
			<div class="v2-proceso__title-wrap">
				<span class="v2-eyebrow">EL PROCESO</span>
				<h2 class="v2-proceso__title">De la primera llamada a<br>la sentencia, <em>en 4 pasos</em>.</h2>
			</div>
			<p class="v2-proceso__aside">¿Y mientras tanto? — te llamo yo</p>
		</header>

		<div class="v2-proceso__timeline" data-stagger>
			<?php foreach ( $pasos as $p ) : ?>
				<div class="v2-proceso__step">
					<span class="v2-proceso__dot" aria-hidden="true"></span>
					<p class="v2-proceso__meta"><?php echo esc_html( $p['num'] ); ?> · <?php echo esc_html( $p['tiempo'] ); ?></p>
					<h3 class="v2-proceso__step-title"><?php echo esc_html( $p['titulo'] ); ?></h3>
					<p class="v2-proceso__step-desc"><?php echo esc_html( $p['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
