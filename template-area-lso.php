<?php
/**
 * Template Name: Área editorial — LSO
 *
 * Diseño editorial premium para Ley de Segunda Oportunidad.
 * Inspirado en propuesta de Claude design (claude.ai/design).
 *
 * @package Morillo
 */
get_header();

$theme_uri = get_template_directory_uri();
?>

<article class="lso">

	<!-- ============== HERO TIPOGRÁFICO ============== -->
	<section class="lso__hero">
		<div class="container">
			<nav class="lso__crumbs" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<a href="#"><?php esc_html_e( 'Áreas', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'Segunda Oportunidad', 'morillo' ); ?></span>
			</nav>

			<div class="lso__hero-grid">
				<div>
					<span class="lso__eyebrow"><span class="lso__rule"></span><?php esc_html_e( 'Área 01 / 06 — Especialidad principal', 'morillo' ); ?></span>
					<h1 class="lso__title">
						Ley de<br>
						<em>Segunda</em><br>
						Oportunidad.
					</h1>
				</div>
				<div class="lso__hero-aside">
					<p class="lso__lead">
						Cancelación legal de deudas para personas físicas y autónomos. Procedimiento concursal completo desde el análisis de viabilidad hasta el BEPI.
					</p>
					<div class="lso__cta-row">
						<a href="#contacto-form" class="lso-btn lso-btn--primary">
							Análisis de viabilidad gratuito <span class="lso-btn__arrow">→</span>
						</a>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="lso-btn lso-btn--ghost">
							<?php echo esc_html( MORILLO_PHONE ); ?>
						</a>
					</div>
					<div class="lso__stats">
						<div class="lso-stat">
							<div class="lso-stat__num"><span>92</span><small>%</small></div>
							<div class="lso-stat__lbl">BEPI concedidos</div>
							<div class="lso-stat__sub">Sobre expedientes admitidos</div>
						</div>
						<div class="lso-stat">
							<div class="lso-stat__num"><span>143</span><small>casos</small></div>
							<div class="lso-stat__lbl">Concursos resueltos</div>
							<div class="lso-stat__sub">2019 – 2026</div>
						</div>
						<div class="lso-stat">
							<div class="lso-stat__num"><span>4–8</span><small>meses</small></div>
							<div class="lso-stat__lbl">Tiempo medio</div>
							<div class="lso-stat__sub">Desde la admisión</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============== ¿QUÉ ES? ============== -->
	<section class="lso__what">
		<div class="container">
			<div class="lso__what-grid">
				<aside>
					<span class="lso__eyebrow"><span class="lso__rule"></span>¿Qué es?</span>
					<div class="lso__legal-ref">
						Mecanismo previsto en el Texto Refundido de la Ley Concursal, art. 486 y ss. Permite obtener el Beneficio de Exoneración del Pasivo Insatisfecho (BEPI).
					</div>
					<div class="lso__pullphrase">
						<div class="lso__pullphrase-eyebrow">EN UNA FRASE</div>
						<div class="lso__pullphrase-body">
							Quitarte de encima las deudas que no puedes pagar — y volver a empezar.
						</div>
					</div>
				</aside>
				<div>
					<h2 class="lso__h2-editorial">
						La ley reconoce que <em>una persona honrada pero desafortunada</em> merece volver a empezar sin las cargas del pasado.
					</h2>
					<p class="lso__body">
						Si llegaste a la insolvencia <strong>de buena fe</strong>, la justicia puede liberarte de tus deudas — incluidas la mayoría de las que tienes con bancos, financieras y proveedores — y blindarte frente a embargos, llamadas y reclamaciones.
					</p>
					<p class="lso__body">
						No es una promesa de marketing: es un procedimiento concursal regulado, con un juez, un administrador y una sentencia. Y, llevado bien, funciona.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ============== PROCEDIMIENTO 5 FASES ============== -->
	<section class="lso__process">
		<div class="container">
			<header class="lso__process-head">
				<div>
					<span class="lso__eyebrow"><span class="lso__rule"></span>El procedimiento</span>
					<h2 class="lso__h2-display">Cinco fases. Sin sorpresas.</h2>
				</div>
				<aside class="lso__process-meta">
					Cronograma orientativo total: 4 a 8 meses, según juzgado y volumen de acreedores.
				</aside>
			</header>
			<div class="lso__process-grid">
				<?php
				$fases = array(
					array( 'n' => '01', 't' => 'Análisis de viabilidad', 'd' => 'Revisamos deudas, ingresos y patrimonio. Te decimos si encajas — y si no, también.', 'time' => '1–2 sem.' ),
					array( 'n' => '02', 't' => 'Documentación',          'd' => 'Inventario de bienes, lista de acreedores y memoria económica. Lo preparamos contigo.',         'time' => '2–3 sem.' ),
					array( 'n' => '03', 't' => 'Solicitud al juzgado',   'd' => 'Presentación del concurso de persona natural en el juzgado mercantil correspondiente.',         'time' => 'Día D' ),
					array( 'n' => '04', 't' => 'Admisión y AC',          'd' => 'El juez admite, designa administrador concursal y se paralizan embargos y reclamaciones.',     'time' => '1–2 mes.' ),
					array( 'n' => '05', 't' => 'Sentencia BEPI',          'd' => 'Resolución que cancela el pasivo insatisfecho. Quedas libre de las deudas exonerables.',       'time' => '3–6 mes.' ),
				);
				foreach ( $fases as $f ) : ?>
					<div class="lso-fase">
						<div class="lso-fase__head">FASE <?php echo esc_html( $f['n'] ); ?></div>
						<h3 class="lso-fase__title"><?php echo esc_html( $f['t'] ); ?></h3>
						<p class="lso-fase__desc"><?php echo esc_html( $f['d'] ); ?></p>
						<div class="lso-fase__time"><?php echo esc_html( $f['time'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ============== REQUISITOS (tabla) ============== -->
	<section class="lso__req">
		<div class="container">
			<div class="lso__req-grid">
				<aside>
					<span class="lso__eyebrow"><span class="lso__rule"></span>Requisitos</span>
					<h2 class="lso__h2-display">¿Encajas?</h2>
					<p class="lso__body lso__body--small">
						Cuatro condiciones básicas. En la primera consulta verificamos las cuatro contigo y te damos un veredicto honesto.
					</p>
				</aside>
				<div class="lso__req-table">
					<?php
					$reqs = array(
						array( 't' => 'Insolvencia actual o inminente', 'd' => 'No puedes (o no podrás) hacer frente a tus obligaciones exigibles.',                  'ref' => 'Art. 2 TRLC' ),
						array( 't' => 'Persona natural',                'd' => 'Particulares y autónomos. Posible solicitud conjunta de cónyuges en gananciales.', 'ref' => 'Art. 486 TRLC' ),
						array( 't' => 'Mínimo dos acreedores distintos','d' => 'No basta con una sola deuda. Banca, hacienda, proveedores y particulares cuentan.',  'ref' => 'Art. 583.1 TRLC' ),
						array( 't' => 'Buena fe del deudor',            'd' => 'Sin fraude, sin condena por delitos económicos en los últimos 10 años.',           'ref' => 'Art. 487 TRLC' ),
					);
					foreach ( $reqs as $i => $r ) : ?>
						<div class="lso-req<?php if ( $i === 0 ) echo ' lso-req--first'; if ( $i === count( $reqs ) - 1 ) echo ' lso-req--last'; ?>">
							<div class="lso-req__num">0<?php echo esc_html( $i + 1 ); ?></div>
							<div class="lso-req__body">
								<div class="lso-req__title"><?php echo esc_html( $r['t'] ); ?></div>
								<div class="lso-req__desc"><?php echo esc_html( $r['d'] ); ?></div>
							</div>
							<div class="lso-req__ref"><?php echo esc_html( $r['ref'] ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ============== QUÉ SE CANCELA / QUÉ NO ============== -->
	<section class="lso__cancel">
		<div class="lso__cancel-yes">
			<div class="lso__cancel-eyebrow lso__cancel-eyebrow--yes">SE CANCELAN</div>
			<h3 class="lso__cancel-title">Deudas exonerables</h3>
			<ul class="lso__cancel-list">
				<li><span class="lso__cancel-mark lso__cancel-mark--yes">+</span>Préstamos personales y al consumo</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--yes">+</span>Tarjetas de crédito y revolving</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--yes">+</span>Descubiertos y comisiones bancarias</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--yes">+</span>Deudas con proveedores</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--yes">+</span>Avales y fianzas mercantiles</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--yes">+</span>Hasta 10.000€ por crédito público (parcial)</li>
			</ul>
		</div>
		<div class="lso__cancel-no">
			<div class="lso__cancel-eyebrow lso__cancel-eyebrow--no">NO SE CANCELAN</div>
			<h3 class="lso__cancel-title">Deudas no exonerables</h3>
			<ul class="lso__cancel-list">
				<li><span class="lso__cancel-mark lso__cancel-mark--no">−</span>Pensiones de alimentos</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--no">−</span>Multas y sanciones</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--no">−</span>Deudas por responsabilidad civil delictiva</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--no">−</span>Crédito público &gt; 10.000€ (parcial)</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--no">−</span>Hipoteca con garantía sobre la vivienda*</li>
				<li><span class="lso__cancel-mark lso__cancel-mark--no">−</span>Deudas posteriores a la solicitud</li>
			</ul>
			<div class="lso__cancel-foot">* Existen mecanismos para conservar la vivienda habitual; lo analizamos caso a caso.</div>
		</div>
	</section>

	<!-- ============== RESOLUCIONES RECIENTES ============== -->
	<section class="lso__victories">
		<div class="container">
			<span class="lso__eyebrow lso__eyebrow--invert"><span class="lso__rule lso__rule--invert"></span>Resoluciones recientes</span>
			<h2 class="lso__h2-display lso__h2-display--invert">Esto no es teoría.</h2>
			<div class="lso__victories-grid">
				<?php
				$vics = array(
					array( 'num' => '30.942 €', 'who' => 'Matrimonio en gananciales', 'where' => 'Juzgado Mercantil nº 3', 'city' => 'Málaga',    'date' => '24 SEP 2024' ),
					array( 'num' => '52.198 €', 'who' => 'Madre con dos menores',    'where' => 'Juzgado Mercantil nº 1', 'city' => 'Tarragona', 'date' => '09 MAY 2025' ),
					array( 'num' => '31.933 €', 'who' => 'Hombre casado en gananciales', 'where' => 'Juzgado Mercantil nº 4', 'city' => 'Alicante', 'date' => '28 MAY 2025' ),
				);
				foreach ( $vics as $v ) : ?>
					<div class="lso-victory">
						<div class="lso-victory__head">EXONERADO</div>
						<div class="lso-victory__num"><?php echo esc_html( $v['num'] ); ?></div>
						<div class="lso-victory__who"><?php echo esc_html( $v['who'] ); ?></div>
						<div class="lso-victory__where"><?php echo esc_html( $v['where'] ); ?> de <?php echo esc_html( $v['city'] ); ?> · <?php echo esc_html( $v['date'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>" class="lso-victories__more">Ver los 143 casos →</a>
		</div>
	</section>

	<!-- ============== ÁREAS RELACIONADAS ============== -->
	<section class="lso__related">
		<div class="container">
			<span class="lso__eyebrow"><span class="lso__rule"></span>También trabajamos</span>
			<h3 class="lso__related-title">Áreas relacionadas</h3>
			<div class="lso__related-grid">
				<a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>" class="lso-related">
					<div>
						<div class="lso-related__num">ÁREA 02</div>
						<div class="lso-related__t">Derecho Bancario</div>
						<div class="lso-related__d">Cláusulas suelo, revolving, IRPH</div>
					</div>
					<span class="lso-related__arrow">→</span>
				</a>
				<a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>" class="lso-related">
					<div>
						<div class="lso-related__num">ÁREA 04</div>
						<div class="lso-related__t">Derecho Mercantil</div>
						<div class="lso-related__d">Concurso de acreedores empresarial</div>
					</div>
					<span class="lso-related__arrow">→</span>
				</a>
				<a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>" class="lso-related">
					<div>
						<div class="lso-related__num">ÁREA 05</div>
						<div class="lso-related__t">Gestión de Patrimonio</div>
						<div class="lso-related__d">Planificación tras el BEPI</div>
					</div>
					<span class="lso-related__arrow">→</span>
				</a>
			</div>
		</div>
	</section>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

	<!-- ============== CONTACTO ============== -->
	<section class="lso__contact" id="contacto-form">
		<div class="container">
			<div class="lso__contact-grid">
				<div>
					<span class="lso__eyebrow"><span class="lso__rule"></span>Hablemos</span>
					<h2 class="lso__h2-display">¿Crees que tu caso encaja?</h2>
					<p class="lso__body">
						Cuéntanos tu situación. Te respondemos en menos de 24h con un análisis honesto de viabilidad — y un sí o un no claros.
					</p>
					<div class="lso__cta-row" style="margin-top: 28px;">
						<a href="#lso-form" class="lso-btn lso-btn--primary">Pedir consulta <span class="lso-btn__arrow">→</span></a>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="lso-btn lso-btn--ghost">Llamar al <?php echo esc_html( MORILLO_PHONE ); ?></a>
					</div>
				</div>
				<div class="lso__form-wrap" id="lso-form">
					<?php morillo_contact_form( array(
						'eyebrow' => __( 'Formulario', 'morillo' ),
						'title'   => __( 'Cuéntanos tu situación', 'morillo' ),
						'lead'    => __( 'Confidencial · sin compromiso.', 'morillo' ),
					) ); ?>
				</div>
			</div>
		</div>
	</section>

</article>

<?php get_footer(); ?>
