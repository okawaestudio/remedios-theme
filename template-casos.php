<?php
/**
 * Template Name: Casos de éxito · editorial
 *
 * 5 sentencias REALES extraídas de CENDOJ (Centro de Documentación Judicial).
 * Verificables públicamente con ROJ + ECLI.
 *
 * @package Morillo
 */
get_header();

// 5 sentencias reales · todas victorias contra Wizink Bank
$casos = array(
	array(
		'tag'      => 'WIZINK · Tarjeta revolving',
		'verdict'  => 'GANADO',
		'roj'      => 'SAP ZA 193/2024',
		'ecli'     => 'ES:APZA:2024:193',
		'tribunal' => 'Audiencia Provincial de Zamora · Sección 1',
		'date'     => '19 ABR 2024',
		'titulo'   => 'Wizink apela y pierde — se confirma la nulidad por usura',
		'desc'     => 'Recurso de apelación de Wizink Bank desestimado íntegramente. La Audiencia confirma la nulidad del contrato de tarjeta revolving por interés remuneratorio usurario y condena en costas a Wizink.',
		'pdf'      => 'https://www.poderjudicial.es/search/AN/openDocument/091f7235480dd48da0a8778d75e36f0d/20240718',
	),
	array(
		'tag'      => 'WIZINK · Tarjeta revolving',
		'verdict'  => 'GANADO',
		'roj'      => 'SAP GR 493/2024',
		'ecli'     => 'ES:APGR:2024:493',
		'tribunal' => 'Audiencia Provincial de Granada · Sección 4',
		'date'     => '04 MAR 2024',
		'titulo'   => 'Revocada primera instancia: nulidad por usura del contrato',
		'desc'     => 'Recurso estimado parcialmente. Se revoca la sentencia del Juzgado nº 11 de Granada y se declara nulo por usurario el contrato de tarjeta revolving (2009-2020). Wizink debe restituir el exceso sobre el capital prestado.',
		'pdf'      => 'https://www.poderjudicial.es/search/AN/openDocument/257dccff3cd97e33a0a8778d75e36f0d/20240724',
	),
	array(
		'tag'      => 'WIZINK · Barclaycard',
		'verdict'  => 'GANADO',
		'roj'      => 'SAP T 1747/2025',
		'ecli'     => 'ES:APT:2025:1747',
		'tribunal' => 'Audiencia Provincial de Tarragona · Sección 3',
		'date'     => '30 OCT 2025',
		'titulo'   => 'Estimación íntegra: nulidad de Barclaycard por falta de transparencia',
		'desc'     => 'Recurso estimado íntegramente. Revocada la sentencia del Juzgado nº 1 de Tarragona; se declara la nulidad de la cláusula del contrato Barclaycard (2015) por falta de transparencia y Wizink debe restituir todas las cantidades indebidamente percibidas. Costas de la primera instancia a Wizink.',
		'pdf'      => 'https://www.poderjudicial.es/search/AN/openDocument/67e0958af451d9f0a0a8778d75e36f0d/20251215',
	),
	array(
		'tag'      => 'WIZINK · Barclaycard Oro',
		'verdict'  => 'GANADO',
		'roj'      => 'SAP V 447/2025',
		'ecli'     => 'ES:APV:2025:447',
		'tribunal' => 'Audiencia Provincial de Valencia · Sección 8',
		'date'     => '21 ENE 2025',
		'titulo'   => 'Revocada Paterna: nulidad de "Barclaycard oro" por falta de transparencia',
		'desc'     => 'Recurso estimado íntegramente. Revocada la sentencia del Juzgado nº 7 de Paterna; se declara la nulidad del contrato "Barclaycard oro" (2007) por falta de transparencia de los intereses.',
		'pdf'      => 'https://www.poderjudicial.es/search/AN/openDocument/8e02b19e7cdc86aba0a8778d75e36f0d/20250602',
	),
	array(
		'tag'      => 'WIZINK · Auto en ejecución',
		'verdict'  => 'GANADO',
		'roj'      => 'AAP VA 1107/2025',
		'ecli'     => 'ES:APVA:2025:1107A',
		'tribunal' => 'Audiencia Provincial de Valladolid · Sección 1',
		'date'     => '25 SEP 2025',
		'titulo'   => 'Wizink apela en ejecución y pierde — costas y pérdida del depósito',
		'desc'     => 'Auto que desestima el recurso de apelación de Wizink Bank contra el Auto del Juzgado nº 1 de Medina de Rioseco. Se confirma la resolución de instancia, con imposición de costas a Wizink y pérdida del depósito.',
		'pdf'      => 'https://www.poderjudicial.es/search/AN/openDocument/98e68405df68e15ea0a8778d75e36f0d/20251212',
	),
);

// El featured case: el más reciente con resultado más espectacular (Tarragona)
$featured = $casos[2];
?>

<article class="ed-page ed-casos">

	<!-- ============== HERO SLIM ============== -->
	<section class="rm-page-hero rm-page-hero--slim">
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'Casos de éxito', 'morillo' ); ?></span>
			</nav>
			<span class="rm-page-hero__eyebrow"><?php esc_html_e( 'Sentencias publicadas en CENDOJ', 'morillo' ); ?></span>
			<h1 class="rm-page-hero__title">Casos de <strong>éxito</strong>.</h1>
			<p class="rm-page-hero__lead">
				Resoluciones reales del despacho recogidas en el <strong>Centro de Documentación Judicial (CENDOJ)</strong> del Consejo General del Poder Judicial. Cada sentencia incluye su número de ROJ y enlace al PDF oficial — verificable por cualquier persona o profesional.
			</p>
			<div class="rm-page-hero__ctas">
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn-primary">
					<?php esc_html_e( 'Pedir consulta', 'morillo' ); ?> <?php morillo_arrow(); ?>
				</a>
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="btn btn-ghost-light">
					<?php echo esc_html( MORILLO_PHONE ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- ============== KPIs banda (debajo del hero) ============== -->
	<section class="rm-page-strip">
		<div class="container">
			<div class="rm-page-strip__grid">
				<div class="rm-page-strip__stat">
					<div class="rm-page-strip__num"><?php echo count( $casos ); ?></div>
					<div class="rm-page-strip__lbl"><?php esc_html_e( 'Sentencias publicadas', 'morillo' ); ?></div>
					<div class="rm-page-strip__sub"><?php esc_html_e( 'Recogidas en CENDOJ', 'morillo' ); ?></div>
				</div>
				<div class="rm-page-strip__stat">
					<div class="rm-page-strip__num">100<small>%</small></div>
					<div class="rm-page-strip__lbl"><?php esc_html_e( 'Favorables al cliente', 'morillo' ); ?></div>
					<div class="rm-page-strip__sub"><?php esc_html_e( 'Sobre las publicadas', 'morillo' ); ?></div>
				</div>
				<div class="rm-page-strip__stat">
					<div class="rm-page-strip__num">5<small>provincias</small></div>
					<div class="rm-page-strip__lbl"><?php esc_html_e( 'Cobertura nacional', 'morillo' ); ?></div>
					<div class="rm-page-strip__sub"><?php esc_html_e( 'Trabajamos en toda España', 'morillo' ); ?></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Caso destacado -->
	<section class="ed-casos__featured">
		<div class="container">
			<span class="ed-eyebrow">Caso destacado · <?php echo esc_html( $featured['date'] ); ?></span>
			<div class="ed-casos__featured-grid">
				<div>
					<div class="ed-mono ed-casos__feat-tag"><?php echo esc_html( $featured['verdict'] ); ?></div>
					<div class="ed-casos__feat-roj"><?php echo esc_html( $featured['roj'] ); ?></div>
					<h3 class="ed-casos__feat-title"><?php echo esc_html( $featured['titulo'] ); ?></h3>
					<p class="ed-body ed-casos__feat-desc"><?php echo esc_html( $featured['desc'] ); ?></p>
					<div class="ed-casos__feat-meta">
						<span><strong>Tribunal:</strong> <?php echo esc_html( $featured['tribunal'] ); ?></span>
						<span><strong>ECLI:</strong> <?php echo esc_html( $featured['ecli'] ); ?></span>
						<span><strong>Fecha:</strong> <?php echo esc_html( $featured['date'] ); ?></span>
					</div>
					<a href="<?php echo esc_url( $featured['pdf'] ); ?>" target="_blank" rel="noopener" class="ed-btn ed-btn--ghost" style="margin-top: 28px;">
						Ver sentencia en CENDOJ <span class="ed-btn__arrow">↗</span>
					</a>
				</div>
				<div class="ed-casos__feat-photo" aria-hidden="true">
					<div class="ed-casos__feat-decor">
						<div class="ed-mono">SENTENCIA · ESTIMADA</div>
						<div class="ed-casos__feat-bigq">"</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Grid de casos -->
	<section class="ed-casos__list">
		<div class="container">
			<span class="ed-eyebrow">Resoluciones recientes</span>
			<h2 class="ed-h-section ed-casos__list-title">Las cinco últimas publicadas.</h2>
			<div class="ed-casos__grid">
				<?php foreach ( $casos as $c ) : ?>
					<article class="ed-caso-card">
						<div class="ed-caso-card__head">
							<span class="ed-caso-card__tag"><?php echo esc_html( $c['tag'] ); ?></span>
							<span class="ed-caso-card__date"><?php echo esc_html( $c['date'] ); ?></span>
						</div>
						<div class="ed-caso-card__roj"><?php echo esc_html( $c['roj'] ); ?></div>
						<div class="ed-caso-card__verdict"><?php echo esc_html( $c['verdict'] ); ?></div>
						<h3 class="ed-caso-card__titulo"><?php echo esc_html( $c['titulo'] ); ?></h3>
						<p class="ed-caso-card__desc"><?php echo esc_html( $c['desc'] ); ?></p>
						<div class="ed-caso-card__foot">
							<span class="ed-caso-card__tribunal"><?php echo esc_html( $c['tribunal'] ); ?></span>
							<a href="<?php echo esc_url( $c['pdf'] ); ?>" target="_blank" rel="noopener" class="ed-caso-card__link">
								Ver en CENDOJ <span aria-hidden="true">↗</span>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<!-- Disclaimer / nota legal -->
			<div class="ed-casos__note">
				<div class="ed-mono">NOTA</div>
				<p>Las cantidades exactas recuperadas no aparecen en las sentencias publicadas porque se determinan en fase de ejecución. Los datos personales de los clientes están anonimizados conforme al Reglamento (UE) 2016/679 y a la Ley Orgánica 3/2018 de Protección de Datos. La selección mostrada corresponde a sentencias publicadas en el Centro de Documentación Judicial (CENDOJ) del CGPJ — el despacho ha tramitado <strong>más de 200 expedientes adicionales</strong> que no se publican en bases de jurisprudencia abierta.</p>
			</div>
		</div>
	</section>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

	<!-- CTA dark -->
	<section class="ed-home__cta">
		<div class="container">
			<div class="ed-home__cta-grid">
				<div>
					<span class="ed-eyebrow ed-eyebrow--invert">El próximo caso</span>
					<h2 class="ed-h-display ed-home__cta-title">Puede ser <em>el tuyo</em>.</h2>
				</div>
				<div>
					<p class="ed-home__cta-lead">¿Tienes una tarjeta revolving (Wizink, Barclaycard, Cofidis, Cetelem, Carrefour…)? Cuéntanos tu situación. Análisis de viabilidad gratuito y honesto en menos de 24 horas.</p>
					<div class="ed-home__cta-row">
						<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="ed-btn ed-btn--invert-primary">Pedir consulta <span class="ed-btn__arrow">→</span></a>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="ed-btn ed-btn--light"><?php echo esc_html( MORILLO_PHONE ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

</article>

<?php
// ─── Schema.org LegalService con casos verificables ───
?>
<script type="application/ld+json">
<?php
$schema = array(
	'@context'  => 'https://schema.org',
	'@type'     => 'LegalService',
	'name'      => 'Remedios Morillo Abogados',
	'url'       => home_url( '/casos-de-exito/' ),
	'telephone' => MORILLO_PHONE_RAW,
	'priceRange' => '€€',
	'areaServed' => 'ES',
	'knowsAbout' => array(
		'Ley de Segunda Oportunidad',
		'Derecho Bancario',
		'Reclamación de tarjetas revolving',
		'Cláusulas suelo',
		'Gastos hipotecarios',
	),
	'review' => array_map( function( $c ) {
		return array(
			'@type' => 'Review',
			'reviewBody' => $c['titulo'] . '. ' . $c['desc'],
			'datePublished' => date( 'Y-m-d', strtotime( str_replace(
				array( 'ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC' ),
				array( 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC' ),
				$c['date']
			) ) ),
			'itemReviewed' => array(
				'@type' => 'Service',
				'name'  => $c['tag'],
			),
			'author' => array( '@type' => 'Organization', 'name' => $c['tribunal'] ),
		);
	}, $casos ),
);
echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
?>
</script>

<?php get_footer(); ?>
