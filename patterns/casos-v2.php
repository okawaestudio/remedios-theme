<?php
/** CASOS PÚBLICOS v2.4 — 3 cards con cifra grande sobre bg mist. */
defined( 'ABSPATH' ) || exit;

$casos = array(
	array(
		'area' => 'SEGUNDA OPORTUNIDAD', 'ref' => 'EXP-LSO-2024-118',
		'amount' => '87.420 €',
		'desc' => 'Autónomo del sector hostelería con deuda mixta bancaria y AEAT.',
		'juzgado' => 'JM Nº 6 MADRID', 'fecha' => 'MAR 2025',
	),
	array(
		'area' => 'BANCARIO · IRPH', 'ref' => 'EXP-IRPH-2023-044',
		'amount' => '14.860 €',
		'desc' => 'Reclamación contra entidad por hipoteca con cláusula IRPH abusiva.',
		'juzgado' => 'AP MÁLAGA', 'fecha' => 'ENE 2025',
	),
	array(
		'area' => 'CIVIL · HERENCIAS', 'ref' => 'EXP-CIV-2024-067',
		'amount' => '52.300 €',
		'desc' => 'Aceptación a beneficio de inventario y partición con coherederos.',
		'juzgado' => 'JPI MADRID', 'fecha' => 'NOV 2024',
	),
);
?>
<section class="v2-section v2-section--mist v2-casos">
	<div class="v2-container">
		<header class="v2-casos__head">
			<div class="v2-casos__title-wrap">
				<span class="v2-eyebrow">CASOS PÚBLICOS</span>
				<h2 class="v2-casos__title">Casos resueltos. <em>Cifras reales</em>.<br>Detalles públicos con consentimiento.</h2>
			</div>
			<a class="v2-btn v2-btn--ghost v2-casos__cta" href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">
				Ver todos los casos
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</header>

		<div class="v2-casos__grid" data-stagger>
			<?php foreach ( $casos as $c ) : ?>
				<article class="v2-caso-card">
					<header class="v2-caso-card__head">
						<span class="v2-caso-card__area"><?php echo esc_html( $c['area'] ); ?></span>
						<span class="v2-caso-card__ref"><?php echo esc_html( $c['ref'] ); ?></span>
					</header>
					<p class="v2-caso-card__amount"><?php echo esc_html( $c['amount'] ); ?></p>
					<p class="v2-caso-card__desc"><?php echo esc_html( $c['desc'] ); ?></p>
					<footer class="v2-caso-card__foot">
						<span><?php echo esc_html( $c['juzgado'] ); ?></span>
						<span><?php echo esc_html( $c['fecha'] ); ?></span>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
