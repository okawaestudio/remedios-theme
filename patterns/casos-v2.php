<?php
/** CASOS DESTACADOS v2 — 3 expedientes con cifra grande. */
defined( 'ABSPATH' ) || exit;

$casos = array(
	array(
		'ref'        => 'EXPEDIENTE 2025-LSO-074',
		'sede'       => 'MADRID',
		'amount'     => '87.420 €',
		'title'      => 'Autónomo, 5 acreedores, 7 meses.',
		'desc'       => 'Cancelación íntegra de deuda con bancos y AEAT vía concurso consecutivo. Cliente recuperó su actividad seis meses después.',
		'proceso'    => 'Concurso consecutivo',
		'fecha'      => 'OCT 2025',
	),
	array(
		'ref'        => 'EXPEDIENTE 2025-BAN-118',
		'sede'       => 'MÁLAGA',
		'amount'     => '14.860 €',
		'title'      => 'Tarjeta revolving WiZink, devolución íntegra.',
		'desc'       => 'Sentencia firme de nulidad por usura. Devolución de intereses cobrados durante seis años más costas procesales.',
		'proceso'    => 'Acción de nulidad',
		'fecha'      => 'SEP 2025',
	),
	array(
		'ref'        => 'EXPEDIENTE 2024-CIV-091',
		'sede'       => 'MADRID',
		'amount'     => '52.300 €',
		'title'      => 'Herencia conflictiva, 3 herederos.',
		'desc'       => 'Acuerdo extrajudicial tras dos meses de mediación. Reparto equilibrado evitando juicio y costas.',
		'proceso'    => 'Mediación',
		'fecha'      => 'JUN 2024',
	),
);
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">[07 — CASOS RECIENTES]</span>
				<h2 class="v2-section__title">Casos resueltos. Cifras reales.<br>Detalles públicos con consentimiento.</h2>
			</div>
			<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">
				[ Ver todos ]
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</header>

		<div class="v2-casos-grid" data-stagger>
			<?php foreach ( $casos as $c ) : ?>
				<article class="v2-caso">
					<div class="v2-caso__head">
						<span>[ <?php echo esc_html( $c['ref'] ); ?> ]</span>
						<span>[ <?php echo esc_html( $c['sede'] ); ?> ]</span>
					</div>
					<p class="v2-caso__amount"><?php echo esc_html( $c['amount'] ); ?></p>
					<h3 class="v2-caso__title"><?php echo esc_html( $c['title'] ); ?></h3>
					<p class="v2-caso__desc"><?php echo esc_html( $c['desc'] ); ?></p>
					<div class="v2-caso__foot">
						<span><?php echo esc_html( $c['proceso'] ); ?></span>
						<span>· <?php echo esc_html( $c['fecha'] ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
