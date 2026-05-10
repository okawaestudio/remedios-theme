<?php
/**
 * Template Name: LSO Provincia (Segunda Oportunidad por provincia)
 *
 * Versión local de la página /ley-de-segunda-oportunidad/ contextualizada
 * a una provincia concreta. El slug de la provincia se lee del meta
 * `_morillo_lso_provincia_slug` (seedeado en bulk vía wp eval-file).
 *
 * Si la provincia no existe en el dataset, redirige al hub general.
 *
 * @package Morillo
 */
get_header();
require_once get_template_directory() . '/inc/lso-provincias.php';

$prov_slug = get_post_meta( get_the_ID(), '_morillo_lso_provincia_slug', true );
if ( ! $prov_slug ) {
	// Fallback: derivar del post_name (abogado-segunda-oportunidad-{X})
	$prov_slug = preg_replace( '/^abogado-segunda-oportunidad-/', '', get_post()->post_name );
}
$prov = morillo_lso_provincia_data( $prov_slug );
if ( ! $prov ) {
	wp_redirect( home_url( '/ley-de-segunda-oportunidad/' ), 302 );
	exit;
}

$theme_uri  = get_template_directory_uri();
$bg_jpg     = $theme_uri . '/assets/img/hero/area-lso.jpg';
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-lso.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-lso-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-lso-720.webp';

// Datos compartidos con el template hub
$fases = array(
	array( 'n' => '01', 't' => 'Análisis de viabilidad', 'd' => 'Revisamos deudas, ingresos y patrimonio. Te decimos si encajas — y si no, también.', 'time' => '1–2 sem.' ),
	array( 'n' => '02', 't' => 'Documentación',          'd' => 'Inventario de bienes, lista de acreedores y memoria económica. Lo preparamos contigo.',           'time' => '2–3 sem.' ),
	array( 'n' => '03', 't' => 'Solicitud al juzgado',   'd' => 'Presentación del concurso ante el ' . $prov['juzgado'] . '.', 'time' => 'Día D' ),
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
	'Préstamos personales y al consumo', 'Tarjetas de crédito y revolving',
	'Descubiertos y comisiones bancarias', 'Deudas con proveedores',
	'Avales y fianzas mercantiles', 'Hasta 10.000 € por crédito público (parcial)',
);
$cancela_no = array(
	'Pensiones de alimentos', 'Multas y sanciones',
	'Deudas por responsabilidad civil delictiva', 'Crédito público > 10.000 € (parcial)',
	'Hipoteca con garantía sobre la vivienda*', 'Deudas posteriores a la solicitud',
);
$relacionadas = array(
	array( 'n' => '02', 't' => 'Derecho Bancario',     'd' => 'Cláusulas suelo, revolving, IRPH',           'href' => '/derecho-bancario/' ),
	array( 'n' => '04', 't' => 'Derecho Mercantil',    'd' => 'Concurso de acreedores empresarial',         'href' => '/derecho-mercantil/' ),
	array( 'n' => '05', 't' => 'Gestión de Patrimonio', 'd' => 'Planificación tras el BEPI',                'href' => '/gestion-de-patrimonio/' ),
);
$provincias_form = array(
	'A Coruña', 'Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila',
	'Badajoz', 'Barcelona', 'Bizkaia', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria',
	'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gipuzkoa', 'Girona',
	'Granada', 'Guadalajara', 'Huelva', 'Huesca', 'Illes Balears', 'Jaén',
	'La Rioja', 'Las Palmas', 'León', 'Lleida', 'Lugo', 'Madrid', 'Málaga',
	'Melilla', 'Murcia', 'Navarra', 'Ourense', 'Palencia', 'Pontevedra',
	'Salamanca', 'Santa Cruz de Tenerife', 'Segovia', 'Sevilla', 'Soria',
	'Tarragona', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Zamora', 'Zaragoza',
);

// FAQ contextualizada
$faqs = array(
	array(
		'q' => '¿Pierdo mi vivienda habitual con la Ley de Segunda Oportunidad?',
		'a' => 'No necesariamente. Existen mecanismos para conservar la vivienda habitual cuando la cuota hipotecaria es asumible y estás al corriente de los pagos. La hipoteca con garantía sobre la vivienda no se exonera, pero el resto de deudas sí, lo que suele liberar capacidad económica suficiente para mantener la cuota mensual.',
	),
	array(
		'q' => '¿Cuánto cuesta el procedimiento en honorarios?',
		'a' => 'Tras el análisis de viabilidad gratuito, te entregamos un presupuesto cerrado por escrito antes de firmar nada. No hay sorpresas ni minutas adicionales. Si tu caso no es viable, no te facturamos.',
	),
	array(
		'q' => 'Mi pareja también tiene deudas. ¿Podemos solicitarlo juntos?',
		'a' => 'Sí. La normativa permite la solicitud conjunta de cónyuges que estén en régimen de gananciales o que sean codeudores de las mismas obligaciones. Lo evaluamos caso a caso para optimizar costes y plazos.',
	),
	array(
		'q' => '¿Tengo que desplazarme al juzgado en ' . $prov['nombre'] . '?',
		'a' => 'En la mayoría de los casos no es necesaria tu presencia física en el ' . $prov['juzgado'] . '. La gestión documental la hacemos nosotros, las comunicaciones con el juzgado son telemáticas y, si en algún momento es necesaria una vista presencial, te acompaño personalmente.',
	),
	array(
		'q' => '¿Cuánto tarda el procedimiento?',
		'a' => 'Entre 4 y 8 meses desde la admisión a trámite, dependiendo del juzgado mercantil y del volumen de acreedores. Desde que firmamos hasta la admisión suelen pasar 4-6 semanas adicionales para preparar la documentación.',
	),
	array(
		'q' => '¿Quedan canceladas las deudas con Hacienda y Seguridad Social?',
		'a' => 'Parcialmente. La Ley permite exonerar hasta 10.000 € por crédito público (5.000 € de Hacienda y 5.000 € de Seguridad Social). Por encima de esa cantidad, se establece un plan de pagos a medida.',
	),
	array(
		'q' => '¿Qué pasa con mi sueldo? ¿Me pueden seguir embargando?',
		'a' => 'Una vez admitido el concurso, todos los embargos se paralizan inmediatamente — incluido el de nómina. Los acreedores no pueden seguir reclamándote ni iniciar nuevas acciones contra ti durante el procedimiento.',
	),
);

$h1_main = 'Abogado Segunda Oportunidad en ' . $prov['nombre'];
$h1_em   = 'Abogado <em>Segunda Oportunidad</em> en ' . esc_html( $prov['nombre'] );
?>

<article class="v2-lso"
         itemscope itemtype="https://schema.org/Service">
	<meta itemprop="name" content="Abogado Ley de Segunda Oportunidad — <?php echo esc_attr( $prov['nombre'] ); ?>">
	<meta itemprop="serviceType" content="Concurso de persona natural · Ley 16/2022">
	<div itemprop="provider" itemscope itemtype="https://schema.org/LegalService" style="display:none;">
		<meta itemprop="name" content="Remedios Morillo Abogados">
		<meta itemprop="telephone" content="<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
		<meta itemprop="email" content="<?php echo esc_attr( MORILLO_EMAIL ); ?>">
		<meta itemprop="areaServed" content="<?php echo esc_attr( $prov['nombre'] . ', ' . $prov['comunidad'] . ', España' ); ?>">
	</div>

	<!-- ── HERO FULL-BLEED ─────────────────────────────────────────── -->
	<section class="v2-hero-bg v2-hero-bg--lso">
		<picture class="v2-hero-bg__picture" aria-hidden="true">
			<source type="image/webp"
			        srcset="<?php echo esc_url( $bg_webp_sm ); ?> 720w, <?php echo esc_url( $bg_webp_md ); ?> 1280w, <?php echo esc_url( $bg_webp_lg ); ?> 1920w"
			        sizes="100vw">
			<img src="<?php echo esc_url( $bg_jpg ); ?>" alt="" fetchpriority="high" decoding="async" width="1920" height="470">
		</picture>
		<div class="v2-hero-bg__overlay" aria-hidden="true"></div>

		<div class="v2-hero-bg__inner" data-stagger>
			<div class="v2-hero-bg__left">
				<nav class="v2-lso-bghero__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>">Segunda Oportunidad</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( $prov['nombre'] ); ?></span>
				</nav>
				<span class="v2-hero-bg__eyebrow">SEGUNDA OPORTUNIDAD · <?php echo esc_html( strtoupper( $prov['nombre'] ) ); ?></span>
				<h1 class="v2-hero-bg__title">
					Abogado <em class="v2-hero-bg__accent">Segunda Oportunidad</em><br>
					en <?php echo esc_html( $prov['nombre'] ); ?>.
				</h1>
				<p class="v2-hero-bg__lead">
					Cancelación legal de deudas para particulares y autónomos en
					<?php echo esc_html( $prov['nombre'] ); ?>. Procedimiento concursal
					completo ante el <?php echo esc_html( $prov['juzgado'] ); ?>,
					desde el análisis de viabilidad hasta la sentencia BEPI.
				</p>
				<div class="v2-hero-bg__ctas">
					<a class="v2-btn v2-btn--inverse" href="#contacto-form">
						Análisis de viabilidad gratuito
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a class="v2-btn v2-btn--inverse-ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
				<div class="v2-hero-bg__microstats">
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label"><?php echo esc_html( strtoupper( $prov['nombre'] ) ); ?></span>
						<span class="v2-hero-bg__microstat-value"><?php echo esc_html( $prov['casos_locales'] ); ?> casos</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">BEPI</span>
						<span class="v2-hero-bg__microstat-value">92%</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">TIEMPO</span>
						<span class="v2-hero-bg__microstat-value">4–8m</span>
					</div>
				</div>
			</div>

			<form class="v2-hero-form" method="post" action="#contacto-form" novalidate aria-label="Captura rápida de contacto">
				<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
				<p class="v2-hero-form__eyebrow">CONSULTA GRATUITA · <?php echo esc_html( strtoupper( $prov['nombre'] ) ); ?></p>
				<h2 class="v2-hero-form__title">Cuéntanos tu caso.</h2>
				<p class="v2-hero-form__sub">Te respondemos en menos de 24h.</p>
				<div class="v2-hero-form__stack">
					<div class="v2-hero-form__field"><input type="text" name="hf_nombre" placeholder="Nombre" required></div>
					<div class="v2-hero-form__field"><input type="tel" name="hf_tel" placeholder="Teléfono" required></div>
					<div class="v2-hero-form__field"><input type="email" name="hf_email" placeholder="Email" required></div>
					<div class="v2-hero-form__field">
						<select name="hf_importe" required>
							<option value="">Importe aproximado de deuda</option>
							<option value="<8000">Menos de 8.000 €</option>
							<option value="8000-15000">8.000 – 15.000 €</option>
							<option value="15000-100000">15.000 – 100.000 €</option>
							<option value=">100000">Más de 100.000 €</option>
						</select>
					</div>
					<input type="hidden" name="hf_provincia" value="<?php echo esc_attr( $prov['nombre'] ); ?>">
					<label class="v2-hero-form__checkbox">
						<input type="checkbox" name="hf_acepto" required>
						<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
					</label>
					<button type="submit" class="v2-btn v2-btn--primary v2-btn--block v2-hero-form__submit">
						Pedir consulta gratuita
						<span class="v2-arrow" aria-hidden="true">→</span>
					</button>
				</div>
				<p class="v2-hero-form__microcopy">SIN COMPROMISO · CONFIDENCIAL</p>
			</form>
		</div>
	</section>

	<!-- ── ¿QUÉ ES? (contextualizado provincia) ───────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-what__grid">
				<aside class="v2-lso-what__aside">
					<span class="v2-eyebrow">SOBRE LA LEY</span>
					<div class="v2-lso-what__legal-ref">
						Mecanismo previsto en el Texto Refundido de la Ley Concursal,
						art. 486 y ss. Aplicable en toda España, incluida la provincia
						de <?php echo esc_html( $prov['nombre'] ); ?>.
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
						La Segunda Oportunidad en <em><?php echo esc_html( $prov['nombre'] ); ?></em>
						también es para ti.
					</h2>
					<p class="v2-lso-what__p">
						Si llegaste a la insolvencia <strong>de buena fe</strong>, la
						justicia puede liberarte de tus deudas — incluidas la mayoría
						de las que tienes con bancos, financieras y proveedores — y
						blindarte frente a embargos, llamadas y reclamaciones.
					</p>
					<p class="v2-lso-what__p">
						En <?php echo esc_html( $prov['nombre'] ); ?> trabajamos especialmente
						con <?php echo esc_html( $prov['perfil'] ); ?>, en un contexto
						económico marcado por <?php echo esc_html( $prov['sector'] ); ?>.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── QUIÉN SE ENCARGA (Schema Person) ──────────────────────── -->
	<section class="v2-section v2-section--cream-2 v2-lso-author"
	         itemscope itemtype="https://schema.org/Person">
		<meta itemprop="jobTitle" content="Abogada">
		<meta itemprop="knowsAbout" content="Ley de Segunda Oportunidad, BEPI, Concurso de acreedores">
		<div class="v2-container">
			<div class="v2-sobre__grid">
				<div class="v2-sobre__photo-wrap">
					<figure class="v2-sobre__photo">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
						     alt="Remedios Morillo Hernán, abogada titular especialista en LSO en <?php echo esc_attr( $prov['nombre'] ); ?>"
						     loading="lazy" width="600" height="800" itemprop="image">
					</figure>
					<span class="v2-sobre__chip">+<?php echo esc_html( $prov['casos_locales'] ); ?> CASOS EN <?php echo esc_html( strtoupper( $prov['nombre'] ) ); ?></span>
				</div>
				<div class="v2-sobre__body">
					<span class="v2-eyebrow">QUIÉN SE ENCARGA</span>
					<h2 class="v2-sobre__title">
						Soy <em itemprop="name">Remedios Morillo</em>,<br>
						abogada especialista en LSO.
					</h2>
					<p>
						Llevo personalmente cada expediente concursal de Segunda
						Oportunidad. Más de <strong>143 procedimientos resueltos</strong>
						desde 2019, con expedientes activos en <?php echo esc_html( $prov['nombre'] ); ?>
						y otras <?php echo esc_html( $prov['comunidad'] ); ?>.
					</p>
					<?php if ( ! empty( $prov['sede'] ) ) : ?>
						<p>
							Tenemos sede física en <strong><?php echo esc_html( $prov['sede'] ); ?></strong>,
							lo que nos permite atención presencial completa para vistas,
							recogida de documentación o reuniones estratégicas.
						</p>
					<?php else : ?>
						<p>
							Aunque no tenemos sede física en <?php echo esc_html( $prov['nombre'] ); ?>,
							atendemos toda la provincia desde nuestras oficinas de Madrid y Málaga.
							Toda la gestión documental se hace por email y videollamada;
							si en algún momento es necesaria una vista presencial ante el
							<?php echo esc_html( $prov['juzgado'] ); ?>, te acompaño personalmente.
						</p>
					<?php endif; ?>
					<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">
						Conoce al despacho completo
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ── PROCEDIMIENTO 5 FASES (juzgado contextualizado en fase 03) -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<header class="v2-lso-proc__head">
				<div>
					<span class="v2-eyebrow">EL PROCEDIMIENTO</span>
					<h2 class="v2-lso-proc__title">Cinco fases. <em>Sin sorpresas.</em></h2>
				</div>
				<aside class="v2-lso-proc__meta">
					Cronograma orientativo total: 4 a 8 meses, según volumen de acreedores
					y carga del <?php echo esc_html( $prov['juzgado'] ); ?>.
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

	<!-- ── CANCELA / NO CANCELA ──────────────────────────────────── -->
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

	<!-- ── INFO LOCAL JUZGADO (Schema Place) ─────────────────────── -->
	<section class="v2-section v2-section--white v2-lso-juzgado">
		<div class="v2-container">
			<div class="v2-lso-juzgado__grid">
				<div>
					<span class="v2-eyebrow">JUZGADO COMPETENTE</span>
					<h2 class="v2-lso-juzgado__title">
						Tu concurso se tramita en el<br>
						<em><?php echo esc_html( $prov['juzgado'] ); ?>.</em>
					</h2>
				</div>
				<div class="v2-lso-juzgado__data">
					<dl>
						<dt>Provincia</dt>
						<dd><?php echo esc_html( $prov['nombre'] ); ?></dd>
						<dt>Comunidad</dt>
						<dd><?php echo esc_html( $prov['comunidad'] ); ?></dd>
						<dt>Capital</dt>
						<dd><?php echo esc_html( $prov['capital'] ); ?></dd>
						<dt>Casos atendidos</dt>
						<dd><?php echo esc_html( $prov['casos_locales'] ); ?> expedientes activos / históricos</dd>
					</dl>
				</div>
			</div>
		</div>
	</section>

	<!-- ── RESEÑAS (iframe ReputationHub) ─────────────────────────── -->
	<section class="v2-section v2-section--cream v2-lso-reviews">
		<div class="v2-container">
			<header class="v2-lso-reviews__head">
				<span class="v2-eyebrow">OPINIONES</span>
				<h2 class="v2-lso-reviews__title">Opiniones reales, <em>sin filtrar</em>.</h2>
			</header>
			<div class="v2-lso-reviews__widget">
				<iframe class="lc_reviews_widget"
					src="https://reputationhub.site/reputation/widgets/review_widget/I09cC0fnhUb9b56hCVTu?widgetId=6863a50a151681172a7f056b"
					frameborder="0" scrolling="no" style="min-width: 100%; width: 100%;"
					title="Opiniones y reseñas de clientes" loading="lazy"></iframe>
			</div>
		</div>
	</section>

	<!-- ── FAQ (Schema FAQPage) ──────────────────────────────────── -->
	<section class="v2-section v2-section--white v2-lso-faq"
	         itemscope itemtype="https://schema.org/FAQPage">
		<div class="v2-container">
			<header class="v2-lso-faq__head">
				<span class="v2-eyebrow">PREGUNTAS FRECUENTES</span>
				<h2 class="v2-lso-faq__title">Resolvemos las dudas <em>más habituales</em>.</h2>
			</header>
			<div class="v2-lso-faq__list">
				<?php foreach ( $faqs as $f ) : ?>
					<details class="v2-lso-faq__item"
					         itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<summary class="v2-lso-faq__q">
							<span itemprop="name"><?php echo esc_html( $f['q'] ); ?></span>
							<span class="v2-lso-faq__icon" aria-hidden="true">
								<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 6l5 5 5-5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</span>
						</summary>
						<div class="v2-lso-faq__a"
						     itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<p itemprop="text"><?php echo esc_html( $f['a'] ); ?></p>
						</div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── ÁREAS RELACIONADAS ───────────────────────────────────────── -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<header class="v2-lso-rel__head">
				<span class="v2-eyebrow">TAMBIÉN TRABAJAMOS</span>
				<h2 class="v2-lso-rel__title">Otras áreas en <?php echo esc_html( $prov['nombre'] ); ?></h2>
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
					<span class="v2-eyebrow">HABLEMOS · <?php echo esc_html( strtoupper( $prov['nombre'] ) ); ?></span>
					<h2 class="v2-hablemos__title">¿Crees que <em>tu caso encaja?</em></h2>
					<p class="v2-hablemos__lead">
						Cuéntanos tu situación. Te respondemos en menos de 24h con un
						análisis honesto de viabilidad — y un sí o un no claros.
					</p>
					<ul class="v2-hablemos__guarantees" role="list">
						<?php foreach ( array( 'Confidencial', 'Sin compromiso', 'Sin coste si no hay viabilidad' ) as $g ) : ?>
							<li class="v2-hablemos__guarantee">
								<span class="v2-hablemos__guarantee-icon" aria-hidden="true">
									<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
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
								<input type="text" name="nombre" id="lp-nombre" placeholder=" " required>
								<label for="lp-nombre" class="v2-field__label">Nombre*</label>
							</div>
							<div class="v2-field">
								<input type="tel" name="telefono" id="lp-telefono" placeholder=" " required>
								<label for="lp-telefono" class="v2-field__label">Teléfono*</label>
							</div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="email" name="email" id="lp-email" placeholder=" " required>
								<label for="lp-email" class="v2-field__label">Email*</label>
							</div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="lp-provincia" required>
									<?php foreach ( $provincias_form as $p ) :
										$selected = ( strtolower( $p ) === strtolower( $prov['nombre'] ) ) ? ' selected' : '';
									?>
										<option value="<?php echo esc_attr( strtolower( $p ) ); ?>"<?php echo $selected; ?>><?php echo esc_html( $p ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="lp-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend">Importe aproximado de deuda</legend>
							<div class="v2-radios">
								<input type="radio" name="importe" id="lp-imp-1" value="<8000"><label for="lp-imp-1">&lt; 8.000 €</label>
								<input type="radio" name="importe" id="lp-imp-2" value="8000-15000"><label for="lp-imp-2">8.000 – 15.000 €</label>
								<input type="radio" name="importe" id="lp-imp-3" value="15000-100000"><label for="lp-imp-3">15.000 – 100.000 €</label>
								<input type="radio" name="importe" id="lp-imp-4" value=">100000"><label for="lp-imp-4">&gt; 100.000 €</label>
							</div>
						</fieldset>
						<div class="v2-field">
							<textarea name="mensaje" id="lp-mensaje" rows="4" placeholder=" "></textarea>
							<label for="lp-mensaje" class="v2-field__label">Cuéntanos brevemente tu situación</label>
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
