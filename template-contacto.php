<?php
/**
 * Template Name: Contacto · editorial
 * @package Morillo
 */
get_header();
?>

<article class="ed-page ed-contacto">

	<!-- ============== HERO SLIM ============== -->
	<section class="rm-page-hero rm-page-hero--slim">
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'Contacto', 'morillo' ); ?></span>
			</nav>
			<span class="rm-page-hero__eyebrow"><?php esc_html_e( 'Hablemos', 'morillo' ); ?></span>
			<h1 class="rm-page-hero__title">Cuéntanos <strong>tu caso</strong>.</h1>
			<p class="rm-page-hero__lead">
				Primera consulta totalmente gratuita y confidencial. Te respondemos en menos de 24 horas con un análisis honesto: te decimos si encajas — y si no, también.
			</p>
			<div class="rm-page-hero__meta">
				<span><strong>L–V</strong> 09:00–19:00</span>
				<span aria-hidden="true">·</span>
				<span>Respuesta media <strong>4h 22min</strong></span>
			</div>
		</div>
	</section>

	<!-- Form + Sedes split -->
	<section class="ed-contacto__split">
		<div class="ed-contacto__form-side">
			<span class="ed-eyebrow">Formulario · primera consulta</span>
			<h2 class="ed-h-section">Una conversación, no un trámite.</h2>
			<div style="margin-top: 36px;">
				<?php morillo_contact_form( array(
					'eyebrow' => '',
					'title'   => '',
					'lead'    => '',
				) ); ?>
			</div>
		</div>

		<div class="ed-contacto__offices-side">
			<span class="ed-eyebrow">Sedes</span>
			<h2 class="ed-h-section">Dos despachos.<br>Una sola persona al frente.</h2>

			<div class="ed-office">
				<div class="ed-office__head">
					<div class="ed-office__city">Madrid</div>
					<div class="ed-mono">SEDE 01</div>
				</div>
				<div class="ed-office__map">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.5513240267233!2d-3.6924796238873574!3d40.4187893555138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42289b869539c3%3A0x1fed042ef41aea2e!2sC.%20de%20Valenzuela%2C%208%2C%20Salamanca%2C%2028014%20Madrid!5e0!3m2!1ses!2ses!4v1700000000000"
						loading="lazy"
						title="Mapa Madrid"></iframe>
				</div>
				<div class="ed-office__addr">Calle Valenzuela 8, 1ª Derecha</div>
				<div class="ed-office__zip">28014 Madrid</div>
				<div class="ed-mono ed-office__metro">Banco de España (L2) · 4 min andando</div>
				<div class="ed-office__note">Atención presencial bajo cita previa.</div>
			</div>

			<div class="ed-office">
				<div class="ed-office__head">
					<div class="ed-office__city">Málaga</div>
					<div class="ed-mono">SEDE 02</div>
				</div>
				<div class="ed-office__map">
					<iframe
						src="https://www.google.com/maps?q=Calle+C%C3%A1rcer+1+29008+M%C3%A1laga&output=embed"
						loading="lazy"
						title="Mapa Málaga"></iframe>
				</div>
				<div class="ed-office__addr">Calle Cárcer 1, 1º Izquierda</div>
				<div class="ed-office__zip">29008 Málaga · Distrito Centro</div>
				<div class="ed-mono ed-office__metro">Alameda Principal · 6 min andando</div>
				<div class="ed-office__note">Reuniones también por videollamada.</div>
			</div>

			<!-- Direct contact card -->
			<div class="ed-direct">
				<div class="ed-mono ed-direct__head">CONTACTO DIRECTO</div>
				<div class="ed-direct__grid">
					<div>
						<div class="ed-direct__lbl">Teléfono</div>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="ed-direct__val"><?php echo esc_html( MORILLO_PHONE ); ?></a>
					</div>
					<div>
						<div class="ed-direct__lbl">Email</div>
						<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="ed-direct__val"><?php echo esc_html( MORILLO_EMAIL ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>
</article>

<?php get_footer(); ?>
