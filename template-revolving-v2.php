<?php
/**
 * Template Name: Revolving v2 — Reclamar tarjetas revolving
 *
 * Sub-página /derecho-bancario/reclamar-tarjetas-revolving/ rediseñada
 * al sistema v2. Sub-área de Derecho Bancario, foco en reclamación
 * por usura (TAE > 25%) según jurisprudencia Sala 1ª TS.
 *
 * @package Morillo
 */
get_header();

$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/sub/revolving.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/sub/revolving-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/sub/revolving-720.webp';

$indicadores = array(
	array(
		'n' => '01', 't' => 'TAE superior al 25%',
		'd' => 'Si tu TAE excede el 25% efectivo anual, la tarjeta se considera usuraria según la doctrina del Tribunal Supremo (STS 4/03/2020 y posteriores). El interés se anula íntegramente.',
	),
	array(
		'n' => '02', 't' => 'Capitalización de intereses',
		'd' => 'Tu deuda crece sin parar aunque pagues la cuota mínima. Los intereses se suman al capital y vuelven a generar intereses (anatocismo): es la trampa estructural de la revolving.',
	),
	array(
		'n' => '03', 't' => 'Cuotas que apenas reducen el capital',
		'd' => 'Pagas mensualmente pero el saldo deudor casi no baja. Si llevas años pagando y la deuda sigue prácticamente igual, tu caso encaja con la doctrina de la usura.',
	),
	array(
		'n' => '04', 't' => 'Falta de transparencia en la contratación',
		'd' => 'No te explicaron el funcionamiento del crédito revolving, no recibiste un cuadro de amortización claro, o firmaste por teléfono sin documentación previa.',
	),
	array(
		'n' => '05', 't' => 'Importe de la deuda muy superior al usado',
		'd' => 'Has dispuesto, por ejemplo, 4.000 € a lo largo de los años y debes 8.000 €. La desproporción entre lo dispuesto y lo adeudado es indicador clásico de revolving usuraria.',
	),
);

$financieras = array(
	'WiZink', 'Cetelem', 'Cofidis', 'Carrefour Pass', 'El Corte Inglés Finance',
	'Banco Cetelem', 'Sabadell Consumer Finance', 'Caja Rural Visa Oro',
	'Bankinter Consumer Finance', 'CaixaBank Consumer Finance',
	'Santander Consumer Finance', 'BBVA Consumer Finance', 'Oney',
	'Vivus', 'Cofidis Crédito Fácil', 'Citibank',
);

$cantidades = array(
	array( 'antig' => '< 2 años',   'dispuesto' => '3.000 €',  'devolucion' => '1.500 – 3.000 €' ),
	array( 'antig' => '2 – 5 años', 'dispuesto' => '5.000 €',  'devolucion' => '4.000 – 9.000 €' ),
	array( 'antig' => '5 – 10 años', 'dispuesto' => '8.000 €',  'devolucion' => '12.000 – 22.000 €' ),
	array( 'antig' => '> 10 años',  'dispuesto' => '12.000 €', 'devolucion' => '25.000 – 45.000 €' ),
);

$relacionadas = array(
	array( 'n' => '02', 't' => 'Derecho Bancario',  'd' => 'Cláusulas suelo, IRPH, gastos hipotecarios y comisiones', 'href' => '/derecho-bancario/' ),
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Si tras reclamar a la financiera siguen quedando deudas',  'href' => '/ley-de-segunda-oportunidad/' ),
	array( 'n' => '02', 't' => 'Gastos hipotecarios', 'd' => 'Recupera notaría, registro y gestoría',                  'href' => '/gastos-hipotecarios-2/' ),
);

$faqs = array(
	array(
		'q' => '¿Mi tarjeta es revolving o es de débito normal?',
		'a' => 'Revolving = puedes pagar a plazos cuotas que se renuevan cada vez que dispones, generalmente con intereses muy altos (TAE > 20%). Si tu tarjeta tiene una opción "pagar a plazos" o "fraccionado", o si te dejan elegir cuánto pagar mensualmente, casi seguro es revolving. Mándanos una foto del último extracto y te lo decimos en 5 minutos.',
	),
	array(
		'q' => '¿Cuánto puedo recuperar exactamente?',
		'a' => 'Depende de tres variables: TAE aplicada, antigüedad de la tarjeta y volumen total dispuesto. La devolución media en sentencias recientes está entre 8.000 € y 25.000 €. En tarjetas con más de 10 años de antigüedad y alto uso hemos visto recuperaciones de 40.000 € o más.',
	),
	array(
		'q' => '¿Tengo que devolver el capital que dispuse?',
		'a' => 'Sí. La sentencia anula los intereses y comisiones, pero el capital efectivamente dispuesto debe devolverse (deducido de lo ya pagado). Si has pagado más que lo dispuesto, el banco te devuelve la diferencia. Si has pagado menos, queda un resto a saldar — sin intereses.',
	),
	array(
		'q' => '¿Qué pasa si dejo de pagar mientras reclamamos?',
		'a' => 'Importante: durante el procedimiento debes seguir abonando las cuotas para evitar que la financiera te incluya en ASNEF u otros ficheros de morosidad. Una vez ganada la sentencia, si has pagado de más, te lo devuelven con intereses legales.',
	),
	array(
		'q' => 'Mi tarjeta es de WiZink. ¿Es viable?',
		'a' => 'Sí — WiZink es la financiera con más sentencias condenatorias en España por revolving usuraria. Hemos ganado decenas de procedimientos contra ellos. Su modelo de tarjeta tiene TAEs típicas entre 26% y 28%, claramente por encima del umbral del Supremo.',
	),
	array(
		'q' => '¿Qué documentación necesito para empezar?',
		'a' => 'Solo necesitamos el contrato de la tarjeta (si lo conservas) y los extractos mensuales de los últimos años. Si no tienes el contrato, lo solicitamos a la entidad nosotros mismos: están obligados a entregarlo.',
	),
	array(
		'q' => '¿Cuánto tarda?',
		'a' => 'Reclamación extrajudicial previa: 1-2 meses. Si la financiera no acepta (lo habitual), demanda y sentencia de primera instancia: 8-14 meses. Total típico: 1-2 años. Trabajamos a éxito: solo facturamos si ganamos.',
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

<article class="v2-lso v2-bancario v2-revolving"
         itemscope itemtype="https://schema.org/Service">
	<meta itemprop="name" content="Reclamación de tarjetas revolving por usura">
	<meta itemprop="serviceType" content="Acción de nulidad por usura · Ley Azcárate · STS Sala 1ª">
	<div itemprop="provider" itemscope itemtype="https://schema.org/LegalService" style="display:none;">
		<meta itemprop="name" content="Remedios Morillo Abogados">
	</div>

	<!-- ── HERO FULL-BLEED ─────────────────────────────────────────── -->
	<section class="v2-hero-bg v2-hero-bg--lso">
		<picture class="v2-hero-bg__picture" aria-hidden="true">
			<source type="image/webp"
			        srcset="<?php echo esc_url( $bg_webp_sm ); ?> 720w, <?php echo esc_url( $bg_webp_md ); ?> 1280w, <?php echo esc_url( $bg_webp_lg ); ?> 1600w"
			        sizes="100vw">
			<img src="<?php echo esc_url( $bg_webp_lg ); ?>" alt="" fetchpriority="high" decoding="async" width="1000" height="1000">
		</picture>
		<div class="v2-hero-bg__overlay" aria-hidden="true"></div>

		<div class="v2-hero-bg__inner" data-stagger>
			<div class="v2-hero-bg__left">
				<nav class="v2-lso-bghero__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>">Derecho Bancario</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Tarjetas revolving</span>
				</nav>
				<span class="v2-hero-bg__eyebrow">SUB-ÁREA · TARJETAS REVOLVING</span>
				<h1 class="v2-hero-bg__title">
					Tu tarjeta revolving es
					<em class="v2-hero-bg__accent">usuraria. Y es nula.</em>
				</h1>
				<p class="v2-hero-bg__lead">
					Si tu TAE supera el 25%, el Tribunal Supremo declara la nulidad
					de la tarjeta por usura. Recuperas todos los intereses, comisiones
					y seguros que has pagado desde el primer día.
				</p>
				<div class="v2-hero-bg__ctas">
					<a class="v2-btn v2-btn--inverse" href="#contacto-form">
						Estudio gratuito de tu tarjeta
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a class="v2-btn v2-btn--inverse-ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
				<div class="v2-hero-bg__microstats">
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">TAE NULA</span>
						<span class="v2-hero-bg__microstat-value">&gt;25%</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">DEVUELTO</span>
						<span class="v2-hero-bg__microstat-value">8–25k €</span>
					</div>
					<div class="v2-hero-bg__microstat">
						<span class="v2-hero-bg__microstat-label">PLAZO</span>
						<span class="v2-hero-bg__microstat-value">∞</span>
					</div>
				</div>
			</div>

			<form class="v2-hero-form" method="post" action="#contacto-form" novalidate aria-label="Estudio gratuito de tarjeta revolving">
				<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
				<p class="v2-hero-form__eyebrow">ESTUDIO GRATUITO</p>
				<h2 class="v2-hero-form__title">¿Tu tarjeta es revolving?</h2>
				<p class="v2-hero-form__sub">Te respondemos en menos de 24h.</p>
				<div class="v2-hero-form__stack">
					<div class="v2-hero-form__field"><input type="text" name="hf_nombre" placeholder="Nombre" required></div>
					<div class="v2-hero-form__field"><input type="tel" name="hf_tel" placeholder="Teléfono" required></div>
					<div class="v2-hero-form__field"><input type="email" name="hf_email" placeholder="Email" required></div>
					<div class="v2-hero-form__field">
						<select name="hf_emisor" required>
							<option value="">Emisor de la tarjeta</option>
							<option value="wizink">WiZink</option>
							<option value="cetelem">Cetelem</option>
							<option value="cofidis">Cofidis</option>
							<option value="carrefour">Carrefour Pass</option>
							<option value="elcorteingles">El Corte Inglés Finance</option>
							<option value="otro">Otro / no estoy seguro</option>
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
						Acción de nulidad por usura al amparo de la Ley de Represión de la
						Usura de 1908 ("Ley Azcárate") y doctrina consolidada del Tribunal
						Supremo (STS 4/03/2020, 15/02/2023, entre otras).
					</div>
					<div class="v2-lso-what__pull">
						<p class="v2-lso-what__pull-eyebrow">EN UNA FRASE</p>
						<p class="v2-lso-what__pull-body">
							La revolving está diseñada para que nunca termines de pagar.
							La justicia lo sabe y la anula.
						</p>
					</div>
				</aside>
				<div class="v2-lso-what__body">
					<h2 class="v2-lso-what__title">
						Una tarjeta donde <em>la deuda crece más rápido</em> que tus pagos.
					</h2>
					<p class="v2-lso-what__p">
						La tarjeta revolving permite pagar las compras a plazos con
						<strong>cuotas que se renuevan</strong> cada vez que dispones de
						crédito. Suena cómodo, pero hay un detalle: la TAE típica está
						entre el 24% y el 28% — comparado con un préstamo personal
						normal al 6-9%.
					</p>
					<p class="v2-lso-what__p">
						El resultado: dispones de 4.000 € y, cuatro años después, debes
						9.000 € a pesar de haber pagado religiosamente cada mes. Es por
						diseño. Y por eso el Tribunal Supremo declara estas tarjetas
						<strong>usurarias y nulas</strong>.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── QUIÉN SE ENCARGA ──────────────────────────────────────── -->
	<section class="v2-section v2-section--cream-2 v2-lso-author"
	         itemscope itemtype="https://schema.org/Person">
		<meta itemprop="jobTitle" content="Abogada">
		<meta itemprop="knowsAbout" content="Tarjetas revolving, usura, Ley Azcárate, jurisprudencia STS">
		<div class="v2-container">
			<div class="v2-sobre__grid">
				<div class="v2-sobre__photo-wrap">
					<figure class="v2-sobre__photo">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
						     alt="Remedios Morillo, abogada especialista en reclamaciones revolving"
						     loading="lazy" width="600" height="800" itemprop="image">
					</figure>
					<span class="v2-sobre__chip">+180 SENTENCIAS REVOLVING</span>
				</div>
				<div class="v2-sobre__body">
					<span class="v2-eyebrow">QUIÉN SE ENCARGA</span>
					<h2 class="v2-sobre__title">
						Soy <em itemprop="name">Remedios Morillo</em>,<br>
						y a WiZink le ganamos a menudo.
					</h2>
					<p>
						Las tarjetas revolving son uno de nuestros <strong>frentes
						principales</strong>: más de 180 procedimientos resueltos contra
						WiZink, Cetelem, Cofidis y otras financieras. Conozco sus
						argumentos típicos de defensa y los criterios de cada juzgado
						mercantil.
					</p>
					<p>
						<strong>Trabajamos a éxito</strong>: solo cobras tú, solo cobramos
						nosotros. Si tu TAE no llega al umbral del Supremo o si la
						documentación no respalda la usura, te lo digo el primer día —
						sin facturarte.
					</p>
					<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>">
						Ver el área completa de Derecho Bancario
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ── INDICADORES (cómo saber si tu tarjeta es usuraria) ────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<header class="v2-lso-proc__head">
				<div>
					<span class="v2-eyebrow">CÓMO DETECTARLO</span>
					<h2 class="v2-lso-proc__title">5 indicadores de revolving <em>usuraria</em>.</h2>
				</div>
				<aside class="v2-lso-proc__meta">
					Si tu tarjeta cumple al menos los puntos 01 y 02, casi seguro es
					reclamable. En el resto de casos, lo confirmamos en el estudio gratuito.
				</aside>
			</header>
			<div class="v2-bancario__grid v2-revolving__grid">
				<?php foreach ( $indicadores as $i ) : ?>
					<article class="v2-bancario-card">
						<p class="v2-bancario-card__num"><?php echo esc_html( $i['n'] ); ?></p>
						<h3 class="v2-bancario-card__title"><?php echo esc_html( $i['t'] ); ?></h3>
						<p class="v2-bancario-card__desc"><?php echo esc_html( $i['d'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── CUÁNTO PUEDO RECUPERAR (tabla por antigüedad) ────────── -->
	<section class="v2-section v2-section--mist">
		<div class="v2-container">
			<header class="v2-lso-cancel__head">
				<span class="v2-eyebrow">CANTIDADES HABITUALES</span>
				<h2 class="v2-lso-cancel__title">¿Cuánto puedes <em>recuperar</em>?</h2>
				<p style="font-family: var(--v2-font-display); font-size: 15px; color: var(--v2-muted-strong); max-width: 60ch; margin-top: 12px;">
					Estimación basada en sentencias recientes contra las principales
					financieras. Cifras orientativas para una TAE del 26% — variables
					según uso y comisiones específicas.
				</p>
			</header>
			<div class="v2-revolving__cantidades">
				<div class="v2-revolving__cantidades-head">
					<span>ANTIGÜEDAD DE LA TARJETA</span>
					<span>DISPUESTO MEDIO</span>
					<span>DEVOLUCIÓN ESTIMADA</span>
				</div>
				<?php foreach ( $cantidades as $c ) : ?>
					<div class="v2-revolving__cantidades-row">
						<span class="v2-revolving__cant-antig"><?php echo esc_html( $c['antig'] ); ?></span>
						<span class="v2-revolving__cant-disp"><?php echo esc_html( $c['dispuesto'] ); ?></span>
						<span class="v2-revolving__cant-dev"><?php echo esc_html( $c['devolucion'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── EMISORES TÍPICOS (sin logos — chips Jakarta) ────────── -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<header class="v2-revolving__emisores-head">
				<span class="v2-eyebrow">EMISORES TÍPICOS</span>
				<h2 class="v2-bancario-banks__title">Hemos reclamado a <em>todas</em>.</h2>
				<p class="v2-bancario-banks__sub">
					Financieras y bancos contra los que tenemos sentencias firmes en
					reclamaciones por usura de tarjetas revolving.
				</p>
			</header>
			<ul class="v2-revolving__emisores-grid">
				<?php foreach ( $financieras as $f ) : ?>
					<li class="v2-revolving__emisor">
						<svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
							<path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						<?php echo esc_html( $f ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<!-- ── SENTENCIAS RECIENTES (banda navy) ──────────────────── -->
	<section class="v2-section v2-section--navy v2-lso-vics">
		<div class="v2-container">
			<header class="v2-lso-vics__head">
				<span class="v2-eyebrow v2-eyebrow--light">SENTENCIAS REVOLVING</span>
				<h2 class="v2-lso-vics__title">Sentencias firmes recientes.</h2>
			</header>
			<div class="v2-lso-vics__grid">
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">14.860 €</p>
					<p class="v2-lso-vic__who">WiZink · 7 años de antigüedad</p>
					<p class="v2-lso-vic__where">JPI nº 12 Málaga · ENE 2025</p>
				</article>
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">22.140 €</p>
					<p class="v2-lso-vic__who">Cetelem · 9 años de antigüedad</p>
					<p class="v2-lso-vic__where">JPI nº 4 Madrid · OCT 2024</p>
				</article>
				<article class="v2-lso-vic">
					<p class="v2-lso-vic__head">DEVUELTO</p>
					<p class="v2-lso-vic__num">9.230 €</p>
					<p class="v2-lso-vic__who">Cofidis · 4 años de antigüedad</p>
					<p class="v2-lso-vic__where">JPI nº 7 Sevilla · SEP 2024</p>
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
					<h2 class="v2-hablemos__title">¿Crees que tu tarjeta es <em>revolving usuraria?</em></h2>
					<p class="v2-hablemos__lead">
						Cuéntanos qué tarjeta tienes y desde cuándo. En 24 h te decimos
						si es viable y cuánto puedes recuperar — siempre por escrito.
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
					<form class="v2-form-stack" method="post" action="#" novalidate>
						<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="text" name="nombre" id="rv-nombre" placeholder=" " required>
								<label for="rv-nombre" class="v2-field__label">Nombre*</label>
							</div>
							<div class="v2-field">
								<input type="tel" name="telefono" id="rv-telefono" placeholder=" " required>
								<label for="rv-telefono" class="v2-field__label">Teléfono*</label>
							</div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="email" name="email" id="rv-email" placeholder=" " required>
								<label for="rv-email" class="v2-field__label">Email*</label>
							</div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="rv-provincia" required>
									<option value="" disabled selected>—</option>
									<?php foreach ( $provincias_form as $p ) : ?>
										<option value="<?php echo esc_attr( strtolower( $p ) ); ?>"><?php echo esc_html( $p ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="rv-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend">Antigüedad de la tarjeta</legend>
							<div class="v2-radios">
								<input type="radio" name="antig" id="rv-a1" value="<2"><label for="rv-a1">&lt; 2 años</label>
								<input type="radio" name="antig" id="rv-a2" value="2-5"><label for="rv-a2">2 – 5 años</label>
								<input type="radio" name="antig" id="rv-a3" value="5-10"><label for="rv-a3">5 – 10 años</label>
								<input type="radio" name="antig" id="rv-a4" value=">10"><label for="rv-a4">&gt; 10 años</label>
							</div>
						</fieldset>
						<div class="v2-field">
							<textarea name="mensaje" id="rv-mensaje" rows="4" placeholder=" "></textarea>
							<label for="rv-mensaje" class="v2-field__label">Cuéntanos qué tarjeta tienes</label>
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
