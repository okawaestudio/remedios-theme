<?php
/**
 * Template Name: Gracias v2 — confirmación post-form
 * @package Morillo
 */
get_header();

// Origen del que viene (para personalizar el copy si se quiere)
$ref       = isset( $_GET['ref'] ) ? sanitize_text_field( wp_unslash( $_GET['ref'] ) ) : '';
$ref_label = ucfirst( str_replace( array( '-', '/' ), array( ' ', ' › ' ), $ref ) );
?>
<article class="v2-gracias">

	<section class="v2-section v2-section--cream v2-gracias-hero">
		<div class="v2-container">
			<div class="v2-gracias-hero__inner">

				<div class="v2-gracias-hero__icon" aria-hidden="true">
					<svg width="56" height="56" viewBox="0 0 64 64" fill="none">
						<circle cx="32" cy="32" r="30" stroke="currentColor" stroke-width="2.5"/>
						<path d="M19 32.5L28 41.5L46 23" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>

				<span class="v2-eyebrow v2-eyebrow--blue">CONSULTA RECIBIDA</span>
				<h1 class="v2-gracias-hero__title">
					Gracias. <em>Te respondemos en menos de 24 horas.</em>
				</h1>
				<p class="v2-gracias-hero__lead">
					Hemos recibido tu consulta. Remedios la revisará personalmente y te
					responderá por el medio que prefieras — email, teléfono o ambos —
					en menos de 24 horas hábiles.
				</p>

				<?php if ( $ref && $ref !== 'home' ) : ?>
					<p class="v2-gracias-hero__ref">
						Origen: <strong><?php echo esc_html( $ref_label ); ?></strong>
					</p>
				<?php endif; ?>

				<div class="v2-gracias-hero__cta">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="v2-btn v2-btn--primary">
						Volver al inicio
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-btn v2-btn--ghost">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Qué viene ahora -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<header class="v2-gracias-next__head">
				<span class="v2-eyebrow">QUÉ VIENE AHORA</span>
				<h2 class="v2-gracias-next__title">Tres pasos. <em>Cero sorpresas.</em></h2>
			</header>
			<div class="v2-gracias-next__grid">
				<article class="v2-gracias-next__step">
					<p class="v2-gracias-next__num">01</p>
					<p class="v2-gracias-next__time">En las próximas 24h</p>
					<h3 class="v2-gracias-next__t">Revisión personal del caso</h3>
					<p class="v2-gracias-next__d">Remedios revisa tu consulta personalmente. Si necesita más datos, te llama o te escribe primero.</p>
				</article>
				<article class="v2-gracias-next__step">
					<p class="v2-gracias-next__num">02</p>
					<p class="v2-gracias-next__time">Análisis de viabilidad</p>
					<h3 class="v2-gracias-next__t">Sí o no, claro</h3>
					<p class="v2-gracias-next__d">Te decimos por escrito si tu caso es viable. Si no encaja, te lo decimos sin facturarte. Si encaja, te entregamos presupuesto cerrado.</p>
				</article>
				<article class="v2-gracias-next__step">
					<p class="v2-gracias-next__num">03</p>
					<p class="v2-gracias-next__time">Sin compromiso</p>
					<h3 class="v2-gracias-next__t">Tú decides si seguimos</h3>
					<p class="v2-gracias-next__d">Lees el presupuesto y la propuesta. Si te encaja, firmamos. Si no, hasta aquí — sin coste alguno por la revisión.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- Contacto directo (por si hay urgencia) -->
	<section class="v2-section v2-section--mist">
		<div class="v2-container">
			<div class="v2-gracias-direct">
				<header class="v2-gracias-direct__head">
					<span class="v2-eyebrow">¿ES URGENTE?</span>
					<h2 class="v2-gracias-direct__title">Tienes 3 vías para <em>contactarnos directamente</em>.</h2>
				</header>
				<div class="v2-gracias-direct__grid">
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-gracias-direct__card">
						<span class="v2-gracias-direct__label">Llamar</span>
						<span class="v2-gracias-direct__value"><?php echo esc_html( MORILLO_PHONE ); ?></span>
						<span class="v2-gracias-direct__sub">L–V · 09–19h</span>
					</a>
					<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="v2-gracias-direct__card">
						<span class="v2-gracias-direct__label">Email</span>
						<span class="v2-gracias-direct__value"><?php echo esc_html( MORILLO_EMAIL ); ?></span>
						<span class="v2-gracias-direct__sub">Respuesta en 24h</span>
					</a>
					<a href="https://wa.me/<?php echo esc_attr( str_replace( '+', '', MORILLO_PHONE_RAW ) ); ?>" class="v2-gracias-direct__card" target="_blank" rel="noopener">
						<span class="v2-gracias-direct__label">WhatsApp</span>
						<span class="v2-gracias-direct__value"><?php echo esc_html( MORILLO_PHONE ); ?></span>
						<span class="v2-gracias-direct__sub">Respuesta L–V</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Mientras esperas — sugerencias relacionadas -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<header class="v2-lso-rel__head">
				<span class="v2-eyebrow">MIENTRAS ESPERAS</span>
				<h2 class="v2-lso-rel__title">Quizás te interese</h2>
			</header>
			<div class="v2-lso-rel__grid">
				<a class="v2-lso-rel__card" href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">
					<div>
						<p class="v2-lso-rel__num">CASOS RECIENTES</p>
						<p class="v2-lso-rel__t">Sentencias firmes con cifras reales</p>
						<p class="v2-lso-rel__d">9 procedimientos cerrados en los últimos meses con detalles públicos.</p>
					</div>
					<span class="v2-arrow" aria-hidden="true">→</span>
				</a>
				<a class="v2-lso-rel__card" href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">
					<div>
						<p class="v2-lso-rel__num">EQUIPO</p>
						<p class="v2-lso-rel__t">Quién va a llevar tu caso</p>
						<p class="v2-lso-rel__d">El equipo del despacho — colegiación, especialidad y bio de cada miembro.</p>
					</div>
					<span class="v2-arrow" aria-hidden="true">→</span>
				</a>
				<a class="v2-lso-rel__card" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
					<div>
						<p class="v2-lso-rel__num">BLOG</p>
						<p class="v2-lso-rel__t">Diario jurídico</p>
						<p class="v2-lso-rel__d">Artículos sobre LSO, derecho bancario, mercantil y novedades doctrinales.</p>
					</div>
					<span class="v2-arrow" aria-hidden="true">→</span>
				</a>
			</div>
		</div>
	</section>

</article>
<?php get_footer(); ?>
