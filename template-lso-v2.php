<?php
/**
 * Template Name: LSO v2 — Ley de Segunda Oportunidad
 *
 * Página /ley-de-segunda-oportunidad/ rediseñada al sistema v2 (Jakarta,
 * paleta navy/cream/mist, pill buttons, hairlines). Contenido editorial
 * portado desde template-area-lso.php (v1) que queda en disco como
 * respaldo.
 *
 * @package Morillo
 */
get_header();

$fases = array(
	array( 'n' => '01', 't' => 'Análisis de viabilidad', 'd' => 'Revisamos deudas, ingresos y patrimonio. Te decimos si encajas — y si no, también.', 'time' => '1–2 sem.' ),
	array( 'n' => '02', 't' => 'Documentación',          'd' => 'Inventario de bienes, lista de acreedores y memoria económica. Lo preparamos contigo.',           'time' => '2–3 sem.' ),
	array( 'n' => '03', 't' => 'Solicitud al juzgado',   'd' => 'Presentación del concurso de persona natural en el juzgado mercantil correspondiente.',           'time' => 'Día D' ),
	array( 'n' => '04', 't' => 'Admisión y AC',          'd' => 'El juez admite, designa administrador concursal y se paralizan embargos y reclamaciones.',       'time' => '1–2 mes.' ),
	array( 'n' => '05', 't' => 'Sentencia BEPI',         'd' => 'Resolución que cancela el pasivo insatisfecho. Quedas libre de las deudas exonerables.',         'time' => '3–6 mes.' ),
);

$reqs = array(
	array( 't' => 'Insolvencia actual o inminente', 'd' => 'No puedes (o no podrás) hacer frente a tus obligaciones exigibles.',                  'ref' => 'Art. 2 TRLC' ),
	array( 't' => 'Persona natural',                'd' => 'Particulares y autónomos. Posible solicitud conjunta de cónyuges en gananciales.',   'ref' => 'Art. 486 TRLC' ),
	array( 't' => 'Mínimo dos acreedores distintos','d' => 'No basta con una sola deuda. Banca, hacienda, proveedores y particulares cuentan.',  'ref' => 'Art. 583.1 TRLC' ),
	array( 't' => 'Buena fe del deudor',            'd' => 'Sin fraude, sin condena por delitos económicos en los últimos 10 años.',             'ref' => 'Art. 487 TRLC' ),
);

$cancela_si = array(
	'Préstamos personales y al consumo',
	'Tarjetas de crédito y revolving',
	'Descubiertos y comisiones bancarias',
	'Deudas con proveedores',
	'Avales y fianzas mercantiles',
	'Hasta 10.000 € por crédito público (parcial)',
);
$cancela_no = array(
	'Pensiones de alimentos',
	'Multas y sanciones',
	'Deudas por responsabilidad civil delictiva',
	'Crédito público > 10.000 € (parcial)',
	'Hipoteca con garantía sobre la vivienda*',
	'Deudas posteriores a la solicitud',
);

$victorias = array(
	array( 'num' => '30.942 €', 'who' => 'Matrimonio en gananciales',     'where' => 'Juzgado Mercantil nº 3', 'city' => 'Málaga',    'date' => '24 SEP 2024' ),
	array( 'num' => '52.198 €', 'who' => 'Madre con dos menores',         'where' => 'Juzgado Mercantil nº 1', 'city' => 'Tarragona', 'date' => '09 MAY 2025' ),
	array( 'num' => '31.933 €', 'who' => 'Hombre casado en gananciales',  'where' => 'Juzgado Mercantil nº 4', 'city' => 'Alicante',  'date' => '28 MAY 2025' ),
);

$relacionadas = array(
	array( 'n' => '02', 't' => 'Derecho Bancario',     'd' => 'Cláusulas suelo, revolving, IRPH',           'href' => '/derecho-bancario/' ),
	array( 'n' => '04', 't' => 'Derecho Mercantil',    'd' => 'Concurso de acreedores empresarial',         'href' => '/derecho-mercantil/' ),
	array( 'n' => '05', 't' => 'Gestión de Patrimonio', 'd' => 'Planificación tras el BEPI',                'href' => '/gestion-de-patrimonio/' ),
);

$provincias = array(
	'A Coruña', 'Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila',
	'Badajoz', 'Barcelona', 'Bizkaia', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria',
	'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gipuzkoa', 'Girona',
	'Granada', 'Guadalajara', 'Huelva', 'Huesca', 'Illes Balears', 'Jaén',
	'La Rioja', 'Las Palmas', 'León', 'Lleida', 'Lugo', 'Madrid', 'Málaga',
	'Melilla', 'Murcia', 'Navarra', 'Ourense', 'Palencia', 'Pontevedra',
	'Salamanca', 'Santa Cruz de Tenerife', 'Segovia', 'Sevilla', 'Soria',
	'Tarragona', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Zamora', 'Zaragoza',
);
?>

<article class="v2-lso">

	<!-- ── HERO TIPOGRÁFICO ─────────────────────────────────────────── -->
	<section class="v2-section v2-section--cream v2-lso-hero">
		<div class="v2-container">
			<nav class="v2-lso-hero__crumbs" aria-label="Migas de pan">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>#areas">Áreas</a>
				<span aria-hidden="true">/</span>
				<span aria-current="page">Segunda Oportunidad</span>
			</nav>

			<div class="v2-lso-hero__grid">
				<div class="v2-lso-hero__title-col">
					<span class="v2-eyebrow">ÁREA 01 / 06 · ESPECIALIDAD PRINCIPAL</span>
					<h1 class="v2-lso-hero__title">
						Ley de<br>
						<em>Segunda</em><br>
						Oportunidad.
					</h1>
				</div>
				<div class="v2-lso-hero__aside">
					<p class="v2-lso-hero__lead">
						Cancelación legal de deudas para personas físicas y autónomos.
						Procedimiento concursal completo desde el análisis de viabilidad
						hasta el BEPI.
					</p>
					<div class="v2-lso-hero__ctas">
						<a href="#contacto-form" class="v2-btn v2-btn--primary">
							Análisis de viabilidad gratuito
							<span class="v2-arrow" aria-hidden="true">→</span>
						</a>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-btn v2-btn--ghost">
							☎ <?php echo esc_html( MORILLO_PHONE ); ?>
						</a>
					</div>
					<div class="v2-lso-hero__stats">
						<div class="v2-lso-hero__stat">
							<p class="v2-lso-hero__stat-num">92<sup>%</sup></p>
							<p class="v2-lso-hero__stat-lbl">BEPI concedidos</p>
							<p class="v2-lso-hero__stat-sub">Sobre expedientes admitidos</p>
						</div>
						<div class="v2-lso-hero__stat">
							<p class="v2-lso-hero__stat-num">143</p>
							<p class="v2-lso-hero__stat-lbl">Concursos resueltos</p>
							<p class="v2-lso-hero__stat-sub">2019 – 2026</p>
						</div>
						<div class="v2-lso-hero__stat">
							<p class="v2-lso-hero__stat-num">4–8<sup>m</sup></p>
							<p class="v2-lso-hero__stat-lbl">Tiempo medio</p>
							<p class="v2-lso-hero__stat-sub">Desde la admisión</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── ¿QUÉ ES? ──────────────────────────────────────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-what__grid">
				<aside class="v2-lso-what__aside">
					<span class="v2-eyebrow">¿QUÉ ES?</span>
					<div class="v2-lso-what__legal-ref">
						Mecanismo previsto en el Texto Refundido de la Ley Concursal,
						art. 486 y ss. Permite obtener el Beneficio de Exoneración
						del Pasivo Insatisfecho (BEPI).
					</div>
					<div class="v2-lso-what__pull">
						<p class="v2-lso-what__pull-eyebrow">EN UNA FRASE</p>
						<p class="v2-lso-what__pull-body">
							Quitarte de encima las deudas que no puedes pagar — y volver a empezar.
						</p>
					</div>
				</aside>
				<div class="v2-lso-what__body">
					<h2 class="v2-lso-what__title">
						La ley reconoce que <em>una persona honrada pero desafortunada</em>
						merece volver a empezar sin las cargas del pasado.
					</h2>
					<p class="v2-lso-what__p">
						Si llegaste a la insolvencia <strong>de buena fe</strong>, la
						justicia puede liberarte de tus deudas — incluidas la mayoría
						de las que tienes con bancos, financieras y proveedores — y
						blindarte frente a embargos, llamadas y reclamaciones.
					</p>
					<p class="v2-lso-what__p">
						No es una promesa de marketing: es un procedimiento concursal
						regulado, con un juez, un administrador y una sentencia. Y,
						llevado bien, funciona.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── PROCEDIMIENTO · 5 FASES ──────────────────────────────────── -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<header class="v2-lso-proc__head">
				<div>
					<span class="v2-eyebrow">EL PROCEDIMIENTO</span>
					<h2 class="v2-lso-proc__title">Cinco fases. <em>Sin sorpresas.</em></h2>
				</div>
				<aside class="v2-lso-proc__meta">
					Cronograma orientativo total: 4 a 8 meses, según juzgado y volumen de acreedores.
				</aside>
			</header>

			<div class="v2-lso-proc__grid">
				<?php foreach ( $fases as $f ) : ?>
					<article class="v2-lso-fase">
						<p class="v2-lso-fase__head">FASE <?php echo esc_html( $f['n'] ); ?></p>
						<h3 class="v2-lso-fase__title"><?php echo esc_html( $f['t'] ); ?></h3>
						<p class="v2-lso-fase__desc"><?php echo esc_html( $f['d'] ); ?></p>
						<p class="v2-lso-fase__time"><?php echo esc_html( $f['time'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── REQUISITOS ────────────────────────────────────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-req__grid">
				<aside class="v2-lso-req__aside">
					<span class="v2-eyebrow">REQUISITOS</span>
					<h2 class="v2-lso-req__title">¿Encajas?</h2>
					<p class="v2-lso-req__p">
						Cuatro condiciones básicas. En la primera consulta verificamos
						las cuatro contigo y te damos un veredicto honesto.
					</p>
				</aside>
				<div class="v2-lso-req__table">
					<?php foreach ( $reqs as $i => $r ) : ?>
						<div class="v2-lso-req__row">
							<div class="v2-lso-req__num">0<?php echo esc_html( $i + 1 ); ?></div>
							<div class="v2-lso-req__body">
								<p class="v2-lso-req__rtitle"><?php echo esc_html( $r['t'] ); ?></p>
								<p class="v2-lso-req__rdesc"><?php echo esc_html( $r['d'] ); ?></p>
							</div>
							<div class="v2-lso-req__ref"><?php echo esc_html( $r['ref'] ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ── QUÉ SE CANCELA / QUÉ NO ──────────────────────────────────── -->
	<section class="v2-section v2-section--mist">
		<div class="v2-container">
			<header class="v2-lso-cancel__head">
				<span class="v2-eyebrow">DEUDAS</span>
				<h2 class="v2-lso-cancel__title">Qué se cancela. <em>Y qué no.</em></h2>
			</header>
			<div class="v2-lso-cancel__grid">
				<div class="v2-lso-cancel__col v2-lso-cancel__col--yes">
					<p class="v2-lso-cancel__col-eyebrow">SE CANCELAN</p>
					<h3 class="v2-lso-cancel__col-title">Deudas exonerables</h3>
					<ul class="v2-lso-cancel__list">
						<?php foreach ( $cancela_si as $item ) : ?>
							<li>
								<span class="v2-lso-cancel__mark v2-lso-cancel__mark--yes" aria-hidden="true">
									<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</span>
								<?php echo esc_html( $item ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="v2-lso-cancel__col v2-lso-cancel__col--no">
					<p class="v2-lso-cancel__col-eyebrow">NO SE CANCELAN</p>
					<h3 class="v2-lso-cancel__col-title">Deudas no exonerables</h3>
					<ul class="v2-lso-cancel__list">
						<?php foreach ( $cancela_no as $item ) : ?>
							<li>
								<span class="v2-lso-cancel__mark v2-lso-cancel__mark--no" aria-hidden="true">
									<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 8h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
								</span>
								<?php echo esc_html( $item ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<p class="v2-lso-cancel__foot">* Existen mecanismos para conservar la vivienda habitual; lo analizamos caso a caso.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── RESOLUCIONES RECIENTES (banda navy) ──────────────────────── -->
	<section class="v2-section v2-section--navy v2-lso-vics">
		<div class="v2-container">
			<header class="v2-lso-vics__head">
				<span class="v2-eyebrow v2-eyebrow--light">RESOLUCIONES RECIENTES</span>
				<h2 class="v2-lso-vics__title">Esto no es teoría.</h2>
			</header>
			<div class="v2-lso-vics__grid">
				<?php foreach ( $victorias as $v ) : ?>
					<article class="v2-lso-vic">
						<p class="v2-lso-vic__head">EXONERADO</p>
						<p class="v2-lso-vic__num"><?php echo esc_html( $v['num'] ); ?></p>
						<p class="v2-lso-vic__who"><?php echo esc_html( $v['who'] ); ?></p>
						<p class="v2-lso-vic__where">
							<?php echo esc_html( $v['where'] ); ?> de <?php echo esc_html( $v['city'] ); ?> · <?php echo esc_html( $v['date'] ); ?>
						</p>
					</article>
				<?php endforeach; ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>" class="v2-btn v2-btn--inverse-ghost v2-lso-vics__more">
				Ver los 143 casos
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</div>
	</section>

	<!-- ── ÁREAS RELACIONADAS ───────────────────────────────────────── -->
	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-lso-rel__head">
				<span class="v2-eyebrow">TAMBIÉN TRABAJAMOS</span>
				<h2 class="v2-lso-rel__title">Áreas relacionadas</h2>
			</header>
			<div class="v2-lso-rel__grid">
				<?php foreach ( $relacionadas as $a ) : ?>
					<a class="v2-lso-rel__card" href="<?php echo esc_url( home_url( $a['href'] ) ); ?>">
						<div>
							<p class="v2-lso-rel__num">ÁREA <?php echo esc_html( $a['n'] ); ?></p>
							<p class="v2-lso-rel__t"><?php echo esc_html( $a['t'] ); ?></p>
							<p class="v2-lso-rel__d"><?php echo esc_html( $a['d'] ); ?></p>
						</div>
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── CONTACTO + FORM ──────────────────────────────────────────── -->
	<section class="v2-section v2-section--cream v2-hablemos" id="contacto-form">
		<div class="v2-container">
			<div class="v2-hablemos__grid">
				<div class="v2-hablemos__left">
					<span class="v2-eyebrow">HABLEMOS</span>
					<h2 class="v2-hablemos__title">¿Crees que <em>tu caso encaja?</em></h2>
					<p class="v2-hablemos__lead">
						Cuéntanos tu situación. Te respondemos en menos de 24h con un
						análisis honesto de viabilidad — y un sí o un no claros.
					</p>

					<ul class="v2-hablemos__guarantees" role="list">
						<?php foreach ( array( 'Confidencial', 'Sin compromiso', 'Sin coste si no hay viabilidad' ) as $g ) : ?>
							<li class="v2-hablemos__guarantee">
								<span class="v2-hablemos__guarantee-icon" aria-hidden="true">
									<svg width="14" height="14" viewBox="0 0 16 16" fill="none">
										<path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
								<span class="v2-hablemos__guarantee-text"><?php echo esc_html( $g ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>

					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-hablemos__contact">
						<span class="v2-hablemos__contact-label">Llamar ahora</span>
						<span class="v2-hablemos__contact-value"><?php echo esc_html( MORILLO_PHONE ); ?></span>
					</a>
					<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="v2-hablemos__contact">
						<span class="v2-hablemos__contact-label">Email directo</span>
						<span class="v2-hablemos__contact-value"><?php echo esc_html( MORILLO_EMAIL ); ?></span>
					</a>
				</div>

				<div class="v2-hablemos__form-card">
					<form class="v2-form-stack" method="post" action="#" novalidate>
						<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="text" name="nombre" id="lso-nombre" placeholder=" " required>
								<label for="lso-nombre" class="v2-field__label">Nombre*</label>
							</div>
							<div class="v2-field">
								<input type="tel" name="telefono" id="lso-telefono" placeholder=" " required>
								<label for="lso-telefono" class="v2-field__label">Teléfono*</label>
							</div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="email" name="email" id="lso-email" placeholder=" " required>
								<label for="lso-email" class="v2-field__label">Email*</label>
							</div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="lso-provincia" required>
									<option value="" disabled selected>—</option>
									<?php foreach ( $provincias as $prov ) : ?>
										<option value="<?php echo esc_attr( strtolower( $prov ) ); ?>"><?php echo esc_html( $prov ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="lso-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend">Importe aproximado de deuda</legend>
							<div class="v2-radios">
								<input type="radio" name="importe" id="lso-imp-1" value="<8000"><label for="lso-imp-1">&lt; 8.000 €</label>
								<input type="radio" name="importe" id="lso-imp-2" value="8000-15000"><label for="lso-imp-2">8.000 – 15.000 €</label>
								<input type="radio" name="importe" id="lso-imp-3" value="15000-100000"><label for="lso-imp-3">15.000 – 100.000 €</label>
								<input type="radio" name="importe" id="lso-imp-4" value=">100000"><label for="lso-imp-4">&gt; 100.000 €</label>
							</div>
						</fieldset>
						<div class="v2-field">
							<textarea name="mensaje" id="lso-mensaje" rows="4" placeholder=" "></textarea>
							<label for="lso-mensaje" class="v2-field__label">Cuéntanos brevemente tu situación</label>
						</div>
						<label class="v2-checkbox">
							<input type="checkbox" name="acepto" required>
							<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
						</label>
						<div>
							<button type="submit" class="v2-btn v2-btn--primary v2-btn--lg">
								Pedir consulta gratuita
								<span class="v2-arrow" aria-hidden="true">→</span>
							</button>
						</div>
						<p class="v2-form-microcopy">Sin compromiso. Tus datos no se ceden a terceros.</p>
					</form>
				</div>
			</div>
		</div>
	</section>

</article>

<?php get_footer(); ?>
