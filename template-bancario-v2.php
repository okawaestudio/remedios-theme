<?php
/**
 * Template Name: Bancario v2 — Derecho Bancario
 *
 * Página /derecho-bancario/ rediseñada al sistema v2 (Jakarta, paleta
 * navy/cream/mist, pill buttons, hairlines). Mismo patrón que LSO v2
 * pero con bloques específicos de derecho bancario: tipos de
 * reclamación, bancos litigados, plazos, cantidades habituales.
 *
 * @package Morillo
 */
get_header();

$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-bancario.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-bancario-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-bancario-720.webp';

$reclamaciones = array(
	array(
		'n' => '01', 't' => 'Tarjetas revolving',
		'd' => 'Anulación por usura (TAE > 25%) según jurisprudencia Sala 1ª TS. Devolución íntegra de intereses y comisiones cobrados.',
		'tag' => 'WiZink · Cetelem · Cofidis',
	),
	array(
		'n' => '02', 't' => 'Cláusulas suelo',
		'd' => 'Hipotecas con cláusula suelo no transparente. Devolución de cantidades cobradas de más durante toda la vida del préstamo.',
		'tag' => 'BBVA · Sabadell · Bankia',
	),
	array(
		'n' => '03', 't' => 'IRPH',
		'd' => 'Hipotecas referenciadas al IRPH (entidades, cajas, conjunto). Nulidad por falta de transparencia tras STJUE 2020 y 2024.',
		'tag' => 'CaixaBank · Kutxabank · Unicaja',
	),
	array(
		'n' => '04', 't' => 'Gastos hipotecarios',
		'd' => 'Notaría, registro, gestoría y tasación. Devolución del 100% (notaría, gestoría) o 50% (registro). Plazo de 5 años desde el pago.',
		'tag' => 'Todas las entidades',
	),
	array(
		'n' => '05', 't' => 'Comisiones abusivas',
		'd' => 'Reclamación de posiciones deudoras, descubierto, mantenimiento de cuenta sin justificación de servicio efectivo.',
		'tag' => 'Santander · BBVA · ING',
	),
	array(
		'n' => '06', 't' => 'Hipoteca multidivisa',
		'd' => 'Hipotecas en yenes, francos suizos. Nulidad por falta de información sobre riesgos del cambio de divisa.',
		'tag' => 'Bankinter · Banco Popular',
	),
);

$bancos = array(
	array( 'name' => 'Santander',  'file' => 'santander.png' ),
	array( 'name' => 'BBVA',       'file' => 'bbva.png' ),
	array( 'name' => 'CaixaBank',  'file' => 'caixabank.png' ),
	array( 'name' => 'Sabadell',   'file' => 'sabadell.png' ),
	array( 'name' => 'Bankinter',  'file' => 'bankinter.png' ),
	array( 'name' => 'Bankia',     'file' => 'bankia.png' ),
	array( 'name' => 'Kutxabank',  'file' => 'kutxabank.png' ),
	array( 'name' => 'Unicaja',    'file' => 'unicaja.png' ),
	array( 'name' => 'ING',        'file' => 'ing.png' ),
	array( 'name' => 'Abanca',     'file' => 'abanca.png' ),
);

$plazos = array(
	array( 't' => 'Cláusulas suelo',     'd' => 'Sin plazo. Acción imprescriptible mientras dure el contrato.', 'badge' => '∞' ),
	array( 't' => 'Tarjetas revolving',  'd' => 'Sin plazo. La acción de nulidad por usura no prescribe.',     'badge' => '∞' ),
	array( 't' => 'IRPH',                'd' => 'Sin plazo. Acción de nulidad imprescriptible.',                'badge' => '∞' ),
	array( 't' => 'Gastos hipotecarios', 'd' => '5 años desde el pago de los gastos (STS 24/07/2020).',         'badge' => '5 años' ),
	array( 't' => 'Comisiones',          'd' => '5 años desde cada cobro (art. 1964 CC reformado).',            'badge' => '5 años' ),
	array( 't' => 'Multidivisa',         'd' => 'Sin plazo. Nulidad por falta de transparencia.',                'badge' => '∞' ),
);

$relacionadas = array(
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Cancelación legal de deudas si la reclamación bancaria no es viable', 'href' => '/ley-de-segunda-oportunidad/' ),
	array( 'n' => '03', 't' => 'Derecho Mercantil',          'd' => 'Concurso de acreedores y contratos mercantiles',                       'href' => '/derecho-mercantil/' ),
	array( 'n' => '04', 't' => 'Gestión de Patrimonio',      'd' => 'Estrategia patrimonial tras la sentencia',                              'href' => '/gestion-de-patrimonio/' ),
);

$faqs = array(
	array(
		'q' => '¿Cuánto puedo recuperar de mi tarjeta revolving?',
		'a' => 'Si la TAE de tu tarjeta supera el 25% (referencia jurisprudencial Tribunal Supremo), puedes recuperar TODOS los intereses, comisiones y seguros cobrados desde el inicio. En revolving WiZink/Cetelem/Cofidis típicas con 5 años de antigüedad, las devoluciones medias están entre 8.000 € y 25.000 €.',
	),
	array(
		'q' => '¿Cuánto cuesta reclamar al banco?',
		'a' => 'Trabajamos a éxito en la mayoría de reclamaciones bancarias: solo cobras tú, solo cobramos nosotros. Sin sentencia favorable, no facturamos. Te entregamos el contrato de honorarios cerrado por escrito antes de iniciar el procedimiento, sin sorpresas.',
	),
	array(
		'q' => '¿Tengo que ir a juicio?',
		'a' => 'En aproximadamente el 30% de los casos basta con la reclamación extrajudicial — el banco devuelve sin pleito. En el otro 70% sí hay que demandar ante el juzgado de primera instancia. Pero la presencia personal del cliente en una vista es excepcional; lo habitual es que solo aparezca el abogado.',
	),
	array(
		'q' => 'Mi cláusula suelo dejó de aplicarse hace tiempo. ¿Puedo reclamar?',
		'a' => 'Sí. La acción de nulidad de cláusulas abusivas es imprescriptible. Aunque la cláusula ya no esté vigente o hayas cancelado la hipoteca, puedes reclamar las cantidades cobradas de más durante TODO el periodo en que estuvo aplicada.',
	),
	array(
		'q' => 'Mi banco ya cerró (Banco Popular, Caja Madrid…). ¿Puedo seguir reclamando?',
		'a' => 'Sí. La entidad sucesora (Santander en el caso de Banco Popular, BBVA en el de Catalunya Caixa…) hereda la responsabilidad y debe responder por las cláusulas y prácticas abusivas de la entidad absorbida.',
	),
	array(
		'q' => '¿Es compatible reclamar al banco con la Ley de Segunda Oportunidad?',
		'a' => 'Sí, y a menudo es lo más eficiente: primero recuperamos lo cobrado abusivamente (cláusulas suelo, revolving), reduciendo la deuda real. Después analizamos si lo restante encaja en LSO. Lo coordinamos en un único expediente.',
	),
	array(
		'q' => '¿Cuánto tarda el procedimiento?',
		'a' => 'Reclamación extrajudicial: 1-3 meses. Si hay que demandar, la sentencia de primera instancia llega entre 8 y 14 meses según el juzgado. Apelación si el banco recurre: 6-10 meses adicionales. Total típico: 1-2 años para casos litigiosos.',
	),
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
?>

<article class="v2-lso v2-bancario"
         itemscope itemtype="https://schema.org/Service">
	<meta itemprop="name" content="Abogado Derecho Bancario — Reclamaciones a entidades">
	<meta itemprop="serviceType" content="Cláusulas suelo · Revolving · IRPH · Gastos hipotecarios">
	<div itemprop="provider" itemscope itemtype="https://schema.org/LegalService" style="display:none;">
		<meta itemprop="name" content="Remedios Morillo Abogados">
		<meta itemprop="telephone" content="<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
	</div>

	<!-- ── HERO FULL-BLEED ─────────────────────────────────────────── -->
	<section class="v2-hero-bg v2-hero-bg--lso">
		<picture class="v2-hero-bg__picture" aria-hidden="true">
			<source type="image/webp"
			        srcset="<?php echo esc_url( $bg_webp_sm ); ?> 720w, <?php echo esc_url( $bg_webp_md ); ?> 1280w, <?php echo esc_url( $bg_webp_lg ); ?> 1600w"
			        sizes="100vw">
			<img src="<?php echo esc_url( $bg_webp_lg ); ?>" alt="" fetchpriority="high" decoding="async" width="1600" height="392">
		</picture>
		<div class="v2-hero-bg__overlay" aria-hidden="true"></div>

		<div class="v2-hero-bg__inner" data-stagger>
			<div class="v2-hero-bg__left">
				<nav class="v2-lso-bghero__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>#areas">Áreas</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Derecho Bancario</span>
				</nav>
				<span class="v2-hero-bg__eyebrow">ÁREA 02 / 06 · DERECHO BANCARIO</span>
				<h1 class="v2-hero-bg__title">
					Lo que el banco te cobró
					<em class="v2-hero-bg__accent">de más, te lo devuelve.</em>
				</h1>
				<p class="v2-hero-bg__lead">
					Cláusulas suelo, tarjetas revolving, IRPH, gastos hipotecarios y
					comisiones abusivas. Trabajamos a éxito: solo cobras tú, solo
					cobramos nosotros.
				</p>
				<div class="v2-hero-bg__ctas">
					<a class="v2-btn v2-btn--inverse" href="#contacto-form">
						Estudio gratuito de tu caso
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a class="v2-btn v2-btn--inverse-ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
				<div class="v2-hero-bg__microstats">
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">DEVUELTO</span>
						<span class="v2-hero-bg__microstat-value">2,3 M €</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">SENTENCIAS</span>
						<span class="v2-hero-bg__microstat-value">340+</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">ÉXITO</span>
						<span class="v2-hero-bg__microstat-value">94%</span>
					</div>
				</div>
			</div>

			<form class="v2-hero-form" method="post" action="<?php echo morillo_form_action(); ?>" novalidate aria-label="Captura rápida">
				<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<?php morillo_form_hidden_fields(); ?>
				<p class="v2-hero-form__eyebrow">ESTUDIO GRATUITO</p>
				<h2 class="v2-hero-form__title">Cuéntanos qué te cobraron.</h2>
				<p class="v2-hero-form__sub">Te respondemos en menos de 24h.</p>
				<div class="v2-hero-form__stack">
					<div class="v2-hero-form__field"><input type="text" name="hf_nombre" placeholder="Nombre" required></div>
					<div class="v2-hero-form__field"><input type="tel" name="hf_tel" placeholder="Teléfono" required></div>
					<div class="v2-hero-form__field"><input type="email" name="hf_email" placeholder="Email" required></div>
					<div class="v2-hero-form__field">
						<select name="hf_tipo" required>
							<option value="">¿Qué quieres reclamar?</option>
							<option value="revolving">Tarjeta revolving</option>
							<option value="suelo">Cláusula suelo</option>
							<option value="irph">IRPH</option>
							<option value="gastos">Gastos hipotecarios</option>
							<option value="comisiones">Comisiones abusivas</option>
							<option value="multidivisa">Hipoteca multidivisa</option>
							<option value="otro">Otro</option>
						</select>
					</div>
					<label class="v2-hero-form__checkbox">
						<input type="checkbox" name="hf_acepto" required>
						<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
					</label>
					<button type="submit" class="v2-btn v2-btn--primary v2-btn--block v2-hero-form__submit">
						Pedir estudio gratuito
						<span class="v2-arrow" aria-hidden="true">→</span>
					</button>
				</div>
				<p class="v2-hero-form__microcopy">SIN COMPROMISO · CONFIDENCIAL</p>
			</form>
		</div>
	</section>

	<!-- ── ¿QUÉ ES? ──────────────────────────────────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-what__grid">
				<aside class="v2-lso-what__aside">
					<span class="v2-eyebrow">SOBRE EL ÁREA</span>
					<div class="v2-lso-what__legal-ref">
						Reclamaciones contra entidades financieras al amparo de la Ley
						General para la Defensa de los Consumidores (RDL 1/2007),
						Directiva 93/13/CEE y jurisprudencia consolidada del Tribunal
						Supremo y del TJUE.
					</div>
					<div class="v2-lso-what__pull">
						<p class="v2-lso-what__pull-eyebrow">EN UNA FRASE</p>
						<p class="v2-lso-what__pull-body">
							Si el banco te cobró de más por una cláusula abusiva, la
							justicia obliga a que te lo devuelva.
						</p>
					</div>
				</aside>
				<div class="v2-lso-what__body">
					<h2 class="v2-lso-what__title">
						Más de <em>340 sentencias</em> contra los principales bancos
						españoles.
					</h2>
					<p class="v2-lso-what__p">
						La banca española lleva dos décadas comercializando productos
						financieros con cláusulas que los tribunales han declarado
						<strong>abusivas o usurarias</strong>: cláusulas suelo en
						hipotecas, tarjetas revolving con TAE superior al 25%, IRPH sin
						transparencia, gastos hipotecarios indebidos.
					</p>
					<p class="v2-lso-what__p">
						Reclamamos a Santander, BBVA, CaixaBank, Sabadell, Bankinter,
						Bankia, Unicaja, Kutxabank, ING y Abanca — entre otras. La
						mayoría de los procedimientos los resolvemos sin necesidad de
						que el cliente pise un juzgado.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── QUIÉN SE ENCARGA ──────────────────────────────────────── -->
	<section class="v2-section v2-section--cream-2 v2-lso-author"
	         itemscope itemtype="https://schema.org/Person">
		<meta itemprop="jobTitle" content="Abogada">
		<meta itemprop="knowsAbout" content="Derecho Bancario, cláusulas abusivas, jurisprudencia TJUE">
		<div class="v2-container">
			<div class="v2-sobre__grid">
				<div class="v2-sobre__photo-wrap">
					<figure class="v2-sobre__photo">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
						     alt="Remedios Morillo Hernán, abogada especialista en derecho bancario"
						     loading="lazy" width="600" height="800" itemprop="image">
					</figure>
					<span class="v2-sobre__chip">+340 SENTENCIAS BANCARIAS</span>
				</div>
				<div class="v2-sobre__body">
					<span class="v2-eyebrow">QUIÉN SE ENCARGA</span>
					<h2 class="v2-sobre__title">
						Soy <em itemprop="name">Remedios Morillo</em>,<br>
						y conozco a los abogados del banco.
					</h2>
					<p>
						He litigado contra <strong>todos los grandes bancos españoles</strong>
						en juzgados de primera instancia, audiencias provinciales y ante
						el Tribunal Supremo. Conozco los argumentos típicos de defensa
						de cada entidad y los plazos de cada juzgado.
					</p>
					<p>
						No subcontrato. Yo te cojo el caso, yo redacto la demanda, yo
						voy a la vista si la hay. Y si tu caso no es viable —porque la
						TAE no llega al umbral, porque el plazo prescribió o porque la
						cláusula sí fue transparente— te lo digo el primer día sin
						facturarte.
					</p>
					<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">
						Conoce al despacho completo
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ── TIPOS DE RECLAMACIÓN ─────────────────────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<header class="v2-lso-proc__head">
				<div>
					<span class="v2-eyebrow">TIPOS DE RECLAMACIÓN</span>
					<h2 class="v2-lso-proc__title">Seis frentes contra <em>la banca</em>.</h2>
				</div>
				<aside class="v2-lso-proc__meta">
					Cada caso se evalúa de forma individual. Te decimos cuáles encajan
					contigo y cuáles no — siempre por escrito.
				</aside>
			</header>
			<div class="v2-bancario__grid">
				<?php foreach ( $reclamaciones as $r ) : ?>
					<article class="v2-bancario-card">
						<p class="v2-bancario-card__num"><?php echo esc_html( $r['n'] ); ?></p>
						<h3 class="v2-bancario-card__title"><?php echo esc_html( $r['t'] ); ?></h3>
						<p class="v2-bancario-card__desc"><?php echo esc_html( $r['d'] ); ?></p>
						<p class="v2-bancario-card__tag"><?php echo esc_html( $r['tag'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── BANCOS LITIGADOS ─────────────────────────────────────── -->
	<section class="v2-section v2-section--cream v2-bancario-banks">
		<div class="v2-container">
			<header class="v2-bancario-banks__head">
				<span class="v2-eyebrow">BANCOS LITIGADOS</span>
				<h2 class="v2-bancario-banks__title">Hemos ganado contra <em>todos ellos</em>.</h2>
				<p class="v2-bancario-banks__sub">
					Bancos contra los que tenemos sentencias favorables firmes en el
					último ejercicio. La lista no es exhaustiva.
				</p>
			</header>
			<ul class="v2-bancario-banks__grid">
				<?php foreach ( $bancos as $b ) : ?>
					<li class="v2-bancario-banks__item">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/banks/' . $b['file'] ); ?>"
						     alt="<?php echo esc_attr( $b['name'] ); ?>"
						     loading="lazy">
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<!-- ── PLAZOS DE RECLAMACIÓN ─────────────────────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-req__grid">
				<aside class="v2-lso-req__aside">
					<span class="v2-eyebrow">PLAZOS</span>
					<h2 class="v2-lso-req__title">¿Llego a tiempo?</h2>
					<p class="v2-lso-req__p">
						La mayoría de las acciones de nulidad por cláusula abusiva son
						<strong>imprescriptibles</strong>. Pero los gastos y las
						comisiones tienen plazo. Si tienes dudas, llámanos antes de
						descartar tu caso.
					</p>
				</aside>
				<div class="v2-lso-req__table">
					<?php foreach ( $plazos as $p ) : ?>
						<div class="v2-lso-req__row">
							<div class="v2-lso-req__num"><?php echo esc_html( $p['badge'] ); ?></div>
							<div class="v2-lso-req__body">
								<p class="v2-lso-req__rtitle"><?php echo esc_html( $p['t'] ); ?></p>
								<p class="v2-lso-req__rdesc"><?php echo esc_html( $p['d'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ── CASOS RECIENTES (banda navy) ────────────────────────── -->
	<section class="v2-section v2-section--navy v2-lso-vics">
		<div class="v2-container">
			<header class="v2-lso-vics__head">
				<span class="v2-eyebrow v2-eyebrow--light">SENTENCIAS RECIENTES</span>
				<h2 class="v2-lso-vics__title">No es teoría: es jurisprudencia.</h2>
			</header>
			<div class="v2-lso-vics__grid">
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">14.860 €</p>
					<p class="v2-lso-vic__who">Tarjeta revolving WiZink</p>
					<p class="v2-lso-vic__where">JPI nº 12 Málaga · Sentencia firme · ENE 2025</p>
				</article>
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">22.430 €</p>
					<p class="v2-lso-vic__who">Cláusula suelo BBVA</p>
					<p class="v2-lso-vic__where">JPI nº 5 Madrid · Sentencia firme · NOV 2024</p>
				</article>
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">8.940 €</p>
					<p class="v2-lso-vic__who">Gastos hipotecarios CaixaBank</p>
					<p class="v2-lso-vic__where">JPI nº 8 Sevilla · Sentencia firme · OCT 2024</p>
				</article>
			</div>
			<a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>" class="v2-btn v2-btn--inverse-ghost v2-lso-vics__more">
				Ver todos los casos
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</div>
	</section>

	<!-- ── RESEÑAS iframe ───────────────────────────────────────── -->
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

	<!-- ── FAQ ──────────────────────────────────────────────────── -->
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

	<!-- ── ÁREAS RELACIONADAS ──────────────────────────────────── -->
	<section class="v2-section v2-section--cream-2">
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

	<!-- ── CONTACTO + FORM ─────────────────────────────────────── -->
	<section class="v2-section v2-section--cream v2-hablemos" id="contacto-form">
		<div class="v2-container">
			<div class="v2-hablemos__grid">
				<div class="v2-hablemos__left">
					<span class="v2-eyebrow">HABLEMOS</span>
					<h2 class="v2-hablemos__title">¿Crees que <em>te cobraron de más?</em></h2>
					<p class="v2-hablemos__lead">
						Cuéntanos qué te cobró el banco. Te respondemos en menos de 24h
						con un análisis honesto y un sí o un no claros.
					</p>
					<ul class="v2-hablemos__guarantees" role="list">
						<?php foreach ( array( 'Confidencial', 'Sin compromiso', 'Trabajamos a éxito' ) as $g ) : ?>
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
					<form class="v2-form-stack" method="post" action="<?php echo morillo_form_action(); ?>" novalidate>
						<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<?php morillo_form_hidden_fields(); ?>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="text" name="nombre" id="bn-nombre" placeholder=" " required>
								<label for="bn-nombre" class="v2-field__label">Nombre*</label>
							</div>
							<div class="v2-field">
								<input type="tel" name="telefono" id="bn-telefono" placeholder=" " required>
								<label for="bn-telefono" class="v2-field__label">Teléfono*</label>
							</div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="email" name="email" id="bn-email" placeholder=" " required>
								<label for="bn-email" class="v2-field__label">Email*</label>
							</div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="bn-provincia" required>
									<option value="" disabled selected>—</option>
									<?php foreach ( $provincias_form as $p ) : ?>
										<option value="<?php echo esc_attr( strtolower( $p ) ); ?>"><?php echo esc_html( $p ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="bn-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend">Tipo de reclamación</legend>
							<div class="v2-radios">
								<input type="radio" name="tipo" id="bn-t1" value="revolving"><label for="bn-t1">Revolving</label>
								<input type="radio" name="tipo" id="bn-t2" value="suelo"><label for="bn-t2">Cláusula suelo</label>
								<input type="radio" name="tipo" id="bn-t3" value="irph"><label for="bn-t3">IRPH</label>
								<input type="radio" name="tipo" id="bn-t4" value="gastos"><label for="bn-t4">Gastos</label>
								<input type="radio" name="tipo" id="bn-t5" value="comisiones"><label for="bn-t5">Comisiones</label>
								<input type="radio" name="tipo" id="bn-t6" value="otro"><label for="bn-t6">Otro</label>
							</div>
						</fieldset>
						<div class="v2-field">
							<textarea name="mensaje" id="bn-mensaje" rows="4" placeholder=" "></textarea>
							<label for="bn-mensaje" class="v2-field__label">Cuéntanos qué te cobró el banco</label>
						</div>
						<label class="v2-checkbox">
							<input type="checkbox" name="acepto" required>
							<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
						</label>
						<div>
							<button type="submit" class="v2-btn v2-btn--primary v2-btn--lg">
								Pedir estudio gratuito
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
