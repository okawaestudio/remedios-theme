<?php
/**
 * Template Name: Casos de Éxito v2
 * @package Morillo
 */
get_header();

// Casos hardcoded representativos. Cuando exista CPT casos_exito,
// sustituir por loop dinámico. Mantener interfaz $casos[] = [ref, area, amount, title, desc, where, date].
$casos = array(
	array( 'ref' => 'EXP-LSO-2024-118',  'area' => 'segunda-oportunidad', 'area_label' => 'Segunda Oportunidad', 'amount' => '87.420 €', 'title' => 'Autónomo, 5 acreedores, 7 meses', 'desc' => 'Cancelación íntegra de deuda con bancos y AEAT vía concurso consecutivo. Cliente recuperó su actividad seis meses después.', 'where' => 'JM nº 6 Madrid', 'date' => 'OCT 2025' ),
	array( 'ref' => 'EXP-IRPH-2023-044', 'area' => 'bancario',            'area_label' => 'Bancario · IRPH',     'amount' => '14.860 €', 'title' => 'IRPH abusivo · CaixaBank', 'desc' => 'Reclamación contra entidad por hipoteca con cláusula IRPH abusiva. Sentencia firme tras STJUE 2024.', 'where' => 'AP Málaga', 'date' => 'ENE 2025' ),
	array( 'ref' => 'EXP-CIV-2024-067',  'area' => 'civil',               'area_label' => 'Civil · Herencias',   'amount' => '52.300 €', 'title' => 'Herencia conflictiva · 3 herederos', 'desc' => 'Acuerdo extrajudicial tras dos meses de mediación. Reparto equilibrado evitando juicio y costas.', 'where' => 'JPI Madrid', 'date' => 'NOV 2024' ),
	array( 'ref' => 'EXP-LSO-2025-074',  'area' => 'segunda-oportunidad', 'area_label' => 'Segunda Oportunidad', 'amount' => '52.198 €', 'title' => 'Madre con dos menores · LSO',     'desc' => 'BEPI concedido en menos de 6 meses. Mecanismos de protección de la vivienda habitual aplicados.', 'where' => 'JM nº 1 Tarragona', 'date' => 'MAY 2025' ),
	array( 'ref' => 'EXP-REV-2025-052',  'area' => 'bancario',            'area_label' => 'Bancario · Revolving','amount' => '22.140 €', 'title' => 'Tarjeta revolving Cetelem 9 años', 'desc' => 'Anulación íntegra por usura (TAE 27,8%). Devolución de intereses, comisiones y seguros desde origen.', 'where' => 'JPI nº 4 Madrid', 'date' => 'OCT 2024' ),
	array( 'ref' => 'EXP-MERC-2024-021', 'area' => 'mercantil',           'area_label' => 'Mercantil · Concurso','amount' => '380.000 €', 'title' => 'Restauración · concurso voluntario', 'desc' => 'Convenio aprobado con quita del 40% y espera de 4 años. Empresa en funcionamiento, 12 empleos preservados.', 'where' => 'JM nº 2 Málaga', 'date' => 'OCT 2024' ),
	array( 'ref' => 'EXP-CIV-2025-019',  'area' => 'civil',               'area_label' => 'Civil · Tráfico',     'amount' => '38.450 €', 'title' => 'Accidente tráfico · baremo Ley 35/2015', 'desc' => 'Acuerdo extrajudicial con compañía aseguradora. Indemnización por días de baja y secuelas permanentes.', 'where' => 'Acuerdo extrajudicial', 'date' => 'OCT 2024' ),
	array( 'ref' => 'EXP-PEN-2024-009',  'area' => 'penal',               'area_label' => 'Penal · Ocupación',    'amount' => '24 días', 'title' => 'Allanamiento · vivienda habitual',  'desc' => 'Recuperación exprés de vivienda en Madrid centro. Procedimiento penal por delito flagrante.', 'where' => 'JI nº 4 Madrid', 'date' => 'ENE 2025' ),
	array( 'ref' => 'EXP-GAS-2024-067',  'area' => 'bancario',            'area_label' => 'Bancario · Gastos',    'amount' => '3.420 €',  'title' => 'Gastos hipotecarios · Santander 240k', 'desc' => 'Devolución íntegra de notaría, gestoría, registro y tasación. Hipoteca firmada en 2014.', 'where' => 'JPI nº 12 Madrid', 'date' => 'JUL 2024' ),
);

$filtros = array(
	'todas'              => 'Todas',
	'segunda-oportunidad'=> 'Segunda Oportunidad',
	'bancario'           => 'Bancario',
	'mercantil'          => 'Mercantil',
	'civil'              => 'Civil',
	'penal'              => 'Penal',
);
?>
<article class="v2-casos">

	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-casos-page__head">
				<nav class="v2-equipo__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Casos de éxito</span>
				</nav>
				<span class="v2-eyebrow">CASOS DE ÉXITO</span>
				<h1 class="v2-casos-page__title">
					Casos resueltos. <em>Cifras reales.</em><br>
					Detalles públicos con consentimiento.
				</h1>
				<p class="v2-casos-page__lead">
					Selección de procedimientos resueltos en los últimos 12 meses.
					Datos publicados con autorización expresa de cada cliente.
					Casos confidenciales bajo NDA no aparecen.
				</p>
			</header>

			<div class="v2-casos-page__filters" role="tablist" aria-label="Filtrar por área">
				<?php foreach ( $filtros as $value => $label ) : ?>
					<button type="button"
					        class="v2-casos-page__filter<?php echo $value === 'todas' ? ' is-active' : ''; ?>"
					        data-filter="<?php echo esc_attr( $value ); ?>"
					        role="tab"
					        aria-selected="<?php echo $value === 'todas' ? 'true' : 'false'; ?>">
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-casos-grid v2-casos-page__grid" data-stagger>
				<?php foreach ( $casos as $c ) : ?>
					<article class="v2-caso-card v2-caso-page" data-area="<?php echo esc_attr( $c['area'] ); ?>">
						<header class="v2-caso-card__head">
							<span class="v2-caso-card__area"><?php echo esc_html( $c['area_label'] ); ?></span>
							<span class="v2-caso-card__ref"><?php echo esc_html( $c['ref'] ); ?></span>
						</header>
						<p class="v2-caso-card__amount"><?php echo esc_html( $c['amount'] ); ?></p>
						<h2 class="v2-caso-card__title"><?php echo esc_html( $c['title'] ); ?></h2>
						<p class="v2-caso-card__desc"><?php echo esc_html( $c['desc'] ); ?></p>
						<footer class="v2-caso-card__foot">
							<span><?php echo esc_html( $c['where'] ); ?></span>
							<span><?php echo esc_html( $c['date'] ); ?></span>
						</footer>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CTA hablemos -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<div class="v2-equipo-cta">
				<span class="v2-eyebrow">¿TU CASO?</span>
				<h2 class="v2-equipo-cta__title">¿Quieres ser <em>el siguiente caso resuelto</em>?</h2>
				<p class="v2-equipo-cta__lead">
					Cuéntanos qué te pasa. Te respondemos en menos de 24h con un
					análisis honesto y un sí o un no claros.
				</p>
				<div class="v2-equipo-cta__btns">
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="v2-btn v2-btn--primary">
						Contactar al despacho
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-btn v2-btn--ghost">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

</article>

<script>
// Filtro JS minimal — toggle visibilidad por data-area
(function(){
	const buttons = document.querySelectorAll('.v2-casos-page__filter[data-filter]');
	const cards   = document.querySelectorAll('.v2-caso-page');
	buttons.forEach(b => b.addEventListener('click', () => {
		const f = b.dataset.filter;
		buttons.forEach(x => { x.classList.remove('is-active'); x.setAttribute('aria-selected','false'); });
		b.classList.add('is-active'); b.setAttribute('aria-selected','true');
		cards.forEach(c => {
			c.style.display = (f === 'todas' || c.dataset.area === f) ? '' : 'none';
		});
	}));
})();
</script>

<?php get_footer(); ?>
