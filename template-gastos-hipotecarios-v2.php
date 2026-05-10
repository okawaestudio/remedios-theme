<?php
/**
 * Template Name: Gastos hipotecarios v2 — sub-área Bancario
 *
 * /derecho-bancario/gastos-hipotecarios-2/ rediseñada al sistema v2.
 * Patrón heredado de revolving-v2 contextualizado a gastos.
 *
 * @package Morillo
 */
get_header();

$theme_uri  = get_template_directory_uri();
// Reutilizamos la imagen hero del área Bancario (mismo contexto)
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-bancario.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-bancario-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-bancario-720.webp';

// 5 tipos de gastos reclamables
$gastos = array(
	array(
		'n' => '01', 't' => 'Notaría', 'pct' => '100%',
		'd' => 'El notario que formalizó la escritura. La STS 23/01/2019 declara que el banco es el único interesado en la escritura pública (es quien pone el activo en su balance), no el cliente.',
		'tip' => '600 – 1.200 €',
	),
	array(
		'n' => '02', 't' => 'Gestoría', 'pct' => '100%',
		'd' => 'La empresa que el banco impone para hacer los trámites de inscripción. STS 24/07/2020: gasto íntegro a cargo de la entidad financiera.',
		'tip' => '200 – 400 €',
	),
	array(
		'n' => '03', 't' => 'Registro de la Propiedad', 'pct' => '50%',
		'd' => 'Inscripción de la hipoteca en el registro. STS 23/01/2019: la mitad corresponde al banco (inscripción de la garantía hipotecaria) y la mitad al cliente (titularidad).',
		'tip' => '100 – 250 €',
	),
	array(
		'n' => '04', 't' => 'Tasación de la vivienda', 'pct' => '100%',
		'd' => 'Si el banco impuso la tasadora o no te dejó usar tu propio tasador homologado, el gasto es íntegramente reclamable. STS 24/07/2020.',
		'tip' => '250 – 450 €',
	),
	array(
		'n' => '05', 't' => 'AJD (Actos Jurídicos Documentados)', 'pct' => '0%',
		'd' => 'Impuesto autonómico. La STS 27/11/2018 estableció que corre a cargo del cliente. NO es reclamable, salvo hipotecas firmadas tras 10/11/2018 (RDL 17/2018) que ya lo cobra el banco automáticamente.',
		'tip' => 'No recuperable',
	),
);

// Cantidades por antigüedad / valor de hipoteca
$cantidades = array(
	array( 'rango' => '< 100.000 €',     'gastos_pagados' => '1.200 – 1.800 €', 'recuperable' => '900 – 1.400 €' ),
	array( 'rango' => '100.000 – 200.000 €', 'gastos_pagados' => '1.800 – 2.800 €', 'recuperable' => '1.400 – 2.200 €' ),
	array( 'rango' => '200.000 – 350.000 €', 'gastos_pagados' => '2.800 – 4.200 €', 'recuperable' => '2.200 – 3.400 €' ),
	array( 'rango' => '> 350.000 €',     'gastos_pagados' => '4.200 € o más',    'recuperable' => '3.400 € o más' ),
);

$relacionadas = array(
	array( 'n' => '02', 't' => 'Tarjetas revolving', 'd' => 'Reclamación por usura cuando la TAE supera el 25%', 'href' => '/derecho-bancario/reclamar-tarjetas-revolving/' ),
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Cláusulas suelo, IRPH y comisiones abusivas', 'href' => '/derecho-bancario/' ),
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Cancelación legal de deudas si no llegas a fin de mes', 'href' => '/ley-de-segunda-oportunidad/' ),
);

$faqs = array(
	array(
		'q' => '¿Tengo que conservar las facturas o el banco las tiene?',
		'a' => 'Idealmente sí, pero no es imprescindible: las facturas de notaría y registro están registradas en archivo público y se pueden recuperar. Si has perdido la documentación, nosotros la solicitamos en tu nombre. Lo único que necesitamos es la escritura de la hipoteca.',
	),
	array(
		'q' => '¿Puedo reclamar si firmé la hipoteca hace muchos años?',
		'a' => 'El plazo de prescripción es de 5 años desde el pago de los gastos (STS 24/07/2020). Si tu hipoteca tiene más de 5 años, todavía puedes reclamar siempre que la cláusula esté en vigor (la cláusula abusiva es imprescriptible) y la acción de devolución de cantidades aún esté en plazo.',
	),
	array(
		'q' => '¿Cuánto cuesta reclamar?',
		'a' => 'Trabajamos a éxito: no facturamos si no recuperamos. Te entregamos el contrato de honorarios cerrado por escrito antes de iniciar el procedimiento, sin sorpresas.',
	),
	array(
		'q' => '¿Qué pasa con el AJD (impuesto)?',
		'a' => 'El AJD (Impuesto sobre Actos Jurídicos Documentados) NO es reclamable para hipotecas anteriores a noviembre de 2018: el Tribunal Supremo zanjó la cuestión en STS 27/11/2018 a favor del banco. Para hipotecas firmadas después del RDL 17/2018, el AJD ya lo paga el banco automáticamente.',
	),
	array(
		'q' => 'Mi banco ya me devolvió "todos" los gastos. ¿Puedo reclamar el resto?',
		'a' => 'Probablemente sí. Muchas entidades hacen "ofertas" devolviendo solo notaría y gestoría parcial, dejando fuera tasación y registro. Trae tu carta de devolución y la analizamos: en el 80% de los casos hay margen para reclamar lo que falta sin renunciar a lo ya cobrado.',
	),
	array(
		'q' => '¿Tengo que ir a juicio?',
		'a' => 'En aproximadamente el 25% de los casos el banco devuelve sin necesidad de demanda. En el resto sí hay que demandar, pero raramente requiere tu presencia personal: la documentación es escrita y solo el abogado va a la vista si la hay.',
	),
	array(
		'q' => '¿Cuánto tarda?',
		'a' => 'Reclamación extrajudicial: 1-2 meses. Si hay que demandar, la sentencia llega en 6-12 meses según el juzgado. Una vez firme, la devolución se ingresa en 30-60 días.',
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

<article class="v2-lso v2-bancario v2-gastos"
         itemscope itemtype="https://schema.org/Service">
	<meta itemprop="name" content="Reclamación de gastos hipotecarios">
	<meta itemprop="serviceType" content="Notaría · Gestoría · Registro · Tasación · STS 24/07/2020">
	<div itemprop="provider" itemscope itemtype="https://schema.org/LegalService" style="display:none;">
		<meta itemprop="name" content="Remedios Morillo Abogados">
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
					<a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>">Derecho Bancario</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Gastos hipotecarios</span>
				</nav>
				<span class="v2-hero-bg__eyebrow">SUB-ÁREA · GASTOS HIPOTECARIOS</span>
				<h1 class="v2-hero-bg__title">
					Notaría, gestoría, registro:
					<em class="v2-hero-bg__accent">los pagaste tú. Los devuelve el banco.</em>
				</h1>
				<p class="v2-hero-bg__lead">
					Si firmaste tu hipoteca antes de junio de 2019, los gastos de
					notaría, gestoría, registro y tasación los reclamamos íntegros.
					Devolución media: 1.500 – 3.000 € por hipoteca.
				</p>
				<div class="v2-hero-bg__ctas">
					<a class="v2-btn v2-btn--inverse" href="#contacto-form">
						Calcular mi devolución
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a class="v2-btn v2-btn--inverse-ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
				<div class="v2-hero-bg__microstats">
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">DEVOLUCIÓN</span>
						<span class="v2-hero-bg__microstat-value">1,5–3k €</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">PLAZO</span>
						<span class="v2-hero-bg__microstat-value">5 años</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">ÉXITO</span>
						<span class="v2-hero-bg__microstat-value">96%</span>
					</div>
				</div>
			</div>

			<form class="v2-hero-form" method="post" action="<?php echo morillo_form_action(); ?>" novalidate aria-label="Calcula tu devolución">
				<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<?php morillo_form_hidden_fields(); ?>
				<p class="v2-hero-form__eyebrow">CALCULA TU DEVOLUCIÓN</p>
				<h2 class="v2-hero-form__title">¿Cuándo firmaste tu hipoteca?</h2>
				<p class="v2-hero-form__sub">Te respondemos en menos de 24h.</p>
				<div class="v2-hero-form__stack">
					<div class="v2-hero-form__field"><input type="text" name="hf_nombre" placeholder="Nombre" required></div>
					<div class="v2-hero-form__field"><input type="tel" name="hf_tel" placeholder="Teléfono" required></div>
					<div class="v2-hero-form__field"><input type="email" name="hf_email" placeholder="Email" required></div>
					<div class="v2-hero-form__field">
						<select name="hf_anyo" required>
							<option value="">Año de firma de la hipoteca</option>
							<option value="<2010">Antes de 2010</option>
							<option value="2010-2015">2010 – 2015</option>
							<option value="2015-2018">2015 – 2018</option>
							<option value="2018-2019">2018 – jun 2019</option>
							<option value=">2019">Después de jun 2019</option>
							<option value="ns">No estoy seguro</option>
						</select>
					</div>
					<label class="v2-hero-form__checkbox">
						<input type="checkbox" name="hf_acepto" required>
						<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
					</label>
					<button type="submit" class="v2-btn v2-btn--primary v2-btn--block v2-hero-form__submit">
						Pedir cálculo gratuito
						<span class="v2-arrow" aria-hidden="true">→</span>
					</button>
				</div>
				<p class="v2-hero-form__microcopy">SIN COMPROMISO · TRABAJAMOS A ÉXITO</p>
			</form>
		</div>
	</section>

	<!-- ── ¿QUÉ ES? ──────────────────────────────────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-what__grid">
				<aside class="v2-lso-what__aside">
					<span class="v2-eyebrow">SOBRE LA RECLAMACIÓN</span>
					<div class="v2-lso-what__legal-ref">
						Acción de nulidad de cláusula abusiva (art. 89 RDL 1/2007) y
						devolución de cantidades pagadas indebidamente. Doctrina
						consolidada por las STS 23/01/2019 y 24/07/2020.
					</div>
					<div class="v2-lso-what__pull">
						<p class="v2-lso-what__pull-eyebrow">EN UNA FRASE</p>
						<p class="v2-lso-what__pull-body">
							Tu hipoteca llevaba una cláusula abusiva. La justicia obliga
							al banco a devolver lo que pagaste por esa cláusula.
						</p>
					</div>
				</aside>
				<div class="v2-lso-what__body">
					<h2 class="v2-lso-what__title">
						Hasta junio de 2019, los bancos te imponían pagar TODOS los
						gastos. <em>Era ilegal.</em>
					</h2>
					<p class="v2-lso-what__p">
						La cláusula que aparece en casi todas las escrituras hipotecarias
						anteriores a junio de 2019 dice algo así como: "todos los gastos
						de formalización serán por cuenta del prestatario". El Tribunal
						Supremo declaró esa cláusula <strong>abusiva y nula</strong> en
						varias sentencias entre 2018 y 2020.
					</p>
					<p class="v2-lso-what__p">
						El criterio actual es claro: <strong>la notaría, la gestoría y la
						tasación corresponden al banco al 100%</strong>; el registro al
						50%; y solo el AJD (impuesto) sigue siendo del cliente. Lo que
						pagaste indebidamente, te lo devolvemos.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── QUIÉN SE ENCARGA ──────────────────────────────────── -->
	<section class="v2-section v2-section--cream-2 v2-lso-author"
	         itemscope itemtype="https://schema.org/Person">
		<meta itemprop="jobTitle" content="Abogada">
		<meta itemprop="knowsAbout" content="Gastos hipotecarios, jurisprudencia STS, cláusulas abusivas">
		<div class="v2-container">
			<div class="v2-sobre__grid">
				<div class="v2-sobre__photo-wrap">
					<figure class="v2-sobre__photo">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
						     alt="Remedios Morillo, abogada especialista en gastos hipotecarios"
						     loading="lazy" width="600" height="800" itemprop="image">
					</figure>
					<span class="v2-sobre__chip">+220 RECLAMACIONES GANADAS</span>
				</div>
				<div class="v2-sobre__body">
					<span class="v2-eyebrow">QUIÉN SE ENCARGA</span>
					<h2 class="v2-sobre__title">
						Soy <em itemprop="name">Remedios Morillo</em>,<br>
						y los gastos los conozco al céntimo.
					</h2>
					<p>
						Reclamación de gastos hipotecarios es uno de los procedimientos
						más rutinarios pero exige <strong>cuadrar cifra a cifra</strong>:
						qué pagaste exactamente, qué pidió el banco, qué porcentaje
						corresponde a cada parte. Llevamos más de 220 procedimientos
						resueltos.
					</p>
					<p>
						<strong>Trabajamos a éxito</strong>: solo cobras tú, solo cobramos
						nosotros. Si tu hipoteca es posterior a junio de 2019 (cuando ya
						no había gastos abusivos) o si los gastos están fuera de plazo,
						te lo decimos antes de empezar.
					</p>
					<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>">
						Ver el área completa de Derecho Bancario
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ── 5 TIPOS DE GASTOS RECLAMABLES ───────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<header class="v2-lso-proc__head">
				<div>
					<span class="v2-eyebrow">QUÉ SE RECLAMA</span>
					<h2 class="v2-lso-proc__title">5 conceptos. <em>4 reclamables.</em></h2>
				</div>
				<aside class="v2-lso-proc__meta">
					Porcentajes según jurisprudencia consolidada del Tribunal Supremo
					(STS 23/01/2019 y 24/07/2020).
				</aside>
			</header>
			<div class="v2-bancario__grid v2-gastos__grid">
				<?php foreach ( $gastos as $g ) :
					$is_zero = ( $g['pct'] === '0%' );
				?>
					<article class="v2-bancario-card v2-gastos-card<?php echo $is_zero ? ' v2-gastos-card--no' : ''; ?>">
						<div class="v2-gastos-card__head">
							<p class="v2-bancario-card__num"><?php echo esc_html( $g['n'] ); ?></p>
							<p class="v2-gastos-card__pct"><?php echo esc_html( $g['pct'] ); ?></p>
						</div>
						<h3 class="v2-bancario-card__title"><?php echo esc_html( $g['t'] ); ?></h3>
						<p class="v2-bancario-card__desc"><?php echo esc_html( $g['d'] ); ?></p>
						<p class="v2-bancario-card__tag"><?php echo esc_html( $g['tip'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── CUÁNTO PUEDO RECUPERAR (tabla por importe hipoteca) ─── -->
	<section class="v2-section v2-section--mist">
		<div class="v2-container">
			<header class="v2-lso-cancel__head">
				<span class="v2-eyebrow">CANTIDADES HABITUALES</span>
				<h2 class="v2-lso-cancel__title">¿Cuánto puedes <em>recuperar</em>?</h2>
				<p style="font-family: var(--v2-font-display); font-size: 15px; color: var(--v2-muted-strong); max-width: 60ch; margin-top: 12px;">
					Estimación basada en hipotecas estándar firmadas entre 2008 y 2019.
					Cifras orientativas — variables según provincia (los gastos de
					notaría y registro varían), tipo de operación y tasadora.
				</p>
			</header>
			<div class="v2-revolving__cantidades">
				<div class="v2-revolving__cantidades-head">
					<span>IMPORTE DE LA HIPOTECA</span>
					<span>GASTOS PAGADOS (TOTAL)</span>
					<span>RECUPERABLE ESTIMADO</span>
				</div>
				<?php foreach ( $cantidades as $c ) : ?>
					<div class="v2-revolving__cantidades-row">
						<span class="v2-revolving__cant-antig"><?php echo esc_html( $c['rango'] ); ?></span>
						<span class="v2-revolving__cant-disp"><?php echo esc_html( $c['gastos_pagados'] ); ?></span>
						<span class="v2-revolving__cant-dev"><?php echo esc_html( $c['recuperable'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── PLAZO LEGAL — bloque destacado ──────────────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-gastos-plazo">
				<div class="v2-gastos-plazo__icon" aria-hidden="true">
					<svg width="32" height="32" viewBox="0 0 24 24" fill="none">
						<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.6"/>
						<path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
				<div class="v2-gastos-plazo__body">
					<p class="v2-gastos-plazo__eyebrow">PLAZO LEGAL DE RECLAMACIÓN</p>
					<h2 class="v2-gastos-plazo__title">
						5 años desde el pago de los gastos.
					</h2>
					<p class="v2-gastos-plazo__desc">
						La acción de devolución prescribe a los 5 años desde la última
						sentencia firme del Tribunal Supremo (24/07/2020). Si firmaste tu
						hipoteca antes de 2015 y no has reclamado todavía, llámanos cuanto
						antes — el plazo está corriendo.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── SENTENCIAS RECIENTES (banda navy) ──────────────────── -->
	<section class="v2-section v2-section--navy v2-lso-vics">
		<div class="v2-container">
			<header class="v2-lso-vics__head">
				<span class="v2-eyebrow v2-eyebrow--light">SENTENCIAS GASTOS</span>
				<h2 class="v2-lso-vics__title">Sentencias firmes recientes.</h2>
			</header>
			<div class="v2-lso-vics__grid">
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">2.840 €</p>
					<p class="v2-lso-vic__who">Hipoteca CaixaBank · 180.000 €</p>
					<p class="v2-lso-vic__where">JPI nº 8 Sevilla · OCT 2024</p>
				</article>
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">1.760 €</p>
					<p class="v2-lso-vic__who">Hipoteca BBVA · 95.000 €</p>
					<p class="v2-lso-vic__where">JPI nº 3 Málaga · SEP 2024</p>
				</article>
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">3.420 €</p>
					<p class="v2-lso-vic__who">Hipoteca Santander · 240.000 €</p>
					<p class="v2-lso-vic__where">JPI nº 12 Madrid · JUL 2024</p>
				</article>
			</div>
			<a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>" class="v2-btn v2-btn--inverse-ghost v2-lso-vics__more">
				Ver todos los casos
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</div>
	</section>

	<!-- ── RESEÑAS iframe ─────────────────────────────────────── -->
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

	<!-- ── FAQ ────────────────────────────────────────────────── -->
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

	<!-- ── ÁREAS RELACIONADAS ─────────────────────────────────── -->
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

	<!-- ── CONTACTO + FORM ─────────────────────────────────── -->
	<section class="v2-section v2-section--cream v2-hablemos" id="contacto-form">
		<div class="v2-container">
			<div class="v2-hablemos__grid">
				<div class="v2-hablemos__left">
					<span class="v2-eyebrow">HABLEMOS</span>
					<h2 class="v2-hablemos__title">¿Cuánto te <em>pagó el banco</em> de gastos?</h2>
					<p class="v2-hablemos__lead">
						Cuéntanos cuándo firmaste y por qué importe. En 24 h te decimos
						cuánto puedes recuperar — siempre por escrito.
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
								<input type="text" name="nombre" id="gh-nombre" placeholder=" " required>
								<label for="gh-nombre" class="v2-field__label">Nombre*</label>
							</div>
							<div class="v2-field">
								<input type="tel" name="telefono" id="gh-telefono" placeholder=" " required>
								<label for="gh-telefono" class="v2-field__label">Teléfono*</label>
							</div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="email" name="email" id="gh-email" placeholder=" " required>
								<label for="gh-email" class="v2-field__label">Email*</label>
							</div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="gh-provincia" required>
									<option value="" disabled selected>—</option>
									<?php foreach ( $provincias_form as $p ) : ?>
										<option value="<?php echo esc_attr( strtolower( $p ) ); ?>"><?php echo esc_html( $p ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="gh-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend">Año de firma de la hipoteca</legend>
							<div class="v2-radios">
								<input type="radio" name="anyo" id="gh-y1" value="<2010"><label for="gh-y1">&lt; 2010</label>
								<input type="radio" name="anyo" id="gh-y2" value="2010-2015"><label for="gh-y2">2010 – 2015</label>
								<input type="radio" name="anyo" id="gh-y3" value="2015-2019"><label for="gh-y3">2015 – jun 2019</label>
								<input type="radio" name="anyo" id="gh-y4" value=">2019"><label for="gh-y4">&gt; jun 2019</label>
							</div>
						</fieldset>
						<div class="v2-field">
							<textarea name="mensaje" id="gh-mensaje" rows="4" placeholder=" "></textarea>
							<label for="gh-mensaje" class="v2-field__label">Cuéntanos los detalles de tu hipoteca</label>
						</div>
						<label class="v2-checkbox">
							<input type="checkbox" name="acepto" required>
							<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
						</label>
						<div>
							<button type="submit" class="v2-btn v2-btn--primary v2-btn--lg">
								Pedir cálculo gratuito
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
