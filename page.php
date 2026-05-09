<?php
/**
 * Default page template — usado por páginas legales y "Gracias".
 * Estructura unificada: rm-page-hero slim + prose body + reviews + contact.
 *
 * @package Morillo
 */
get_header();
?>

<?php while ( have_posts() ) : the_post();
	$content = trim( get_the_content() );
	?>

	<!-- ============== HERO SLIM (sin foto temática, navy gradient) ============== -->
	<section class="rm-page-hero rm-page-hero--slim">
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>
			<h1 class="rm-page-hero__title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="rm-page-hero__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<!-- ============== BODY: container narrow + prose ============== -->
	<article class="page-default">
		<div class="container container--narrow">
			<div class="page-default__body prose">
				<?php if ( $content !== '' ) :
					the_content();
				else : ?>
					<p>
						<?php esc_html_e( 'Esta página aún no tiene contenido.', 'morillo' ); ?>
						<?php
						printf(
							/* translators: 1: enlace a inicio, 2: enlace a casos */
							esc_html__( 'Vuelve al %1$s o consulta nuestras %2$s.', 'morillo' ),
							'<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'inicio', 'morillo' ) . '</a>',
							'<a href="' . esc_url( home_url( '/casos-de-exito/' ) ) . '">' . esc_html__( 'resoluciones recientes', 'morillo' ) . '</a>'
						);
						?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</article>

<?php endwhile; ?>

<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

<!-- ============== CONTACT SECTION AL PIE ============== -->
<section class="rm-contact-section rm-contact-section--page">
	<div class="container rm-contact-section__inner">
		<div class="rm-contact-section__side">
			<span class="rm-eyebrow"><?php esc_html_e( '¿Hablamos de tu caso?', 'morillo' ); ?></span>
			<h2 class="rm-contact-section__title">
				<?php esc_html_e( 'Cuéntanos qué necesitas.', 'morillo' ); ?>
			</h2>
			<p class="rm-contact-section__lead">
				<?php esc_html_e( 'Análisis honesto de viabilidad sin compromiso. Te respondemos en menos de 24h.', 'morillo' ); ?>
			</p>

			<div class="rm-contact-section__channels">
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="rm-channel">
					<svg width="18" height="18" viewBox="0 0 16 16" aria-hidden="true"><path d="M3 2c0-.55.45-1 1-1h2.18c.4 0 .76.24.92.6l1.1 2.55a1 1 0 0 1-.22 1.13L6.7 6.55c.85 1.7 2.05 2.9 3.75 3.75l1.27-1.28a1 1 0 0 1 1.13-.22l2.55 1.1c.36.16.6.52.6.92V13c0 .55-.45 1-1 1A12 12 0 0 1 3 2z" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/></svg>
					<span>
						<small><?php esc_html_e( 'Llamar', 'morillo' ); ?></small>
						<strong><?php echo esc_html( MORILLO_PHONE ); ?></strong>
					</span>
				</a>
				<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="rm-channel">
					<svg width="18" height="18" viewBox="0 0 16 16" aria-hidden="true"><path d="M2 4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4zM3 4l5 4 5-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/></svg>
					<span>
						<small><?php esc_html_e( 'Email', 'morillo' ); ?></small>
						<strong><?php echo esc_html( MORILLO_EMAIL ); ?></strong>
					</span>
				</a>
			</div>

			<div class="rm-contact-section__offices">
				<?php foreach ( morillo_offices() as $o ) : ?>
					<div class="rm-office">
						<span class="rm-office__city"><?php echo esc_html( $o['city'] ); ?></span>
						<a href="<?php echo esc_url( $o['maps'] ); ?>" target="_blank" rel="noopener" class="rm-office__addr">
							<?php echo esc_html( $o['address'] ); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="rm-contact-section__form">
			<?php morillo_contact_form( array(
				'eyebrow' => __( 'Formulario', 'morillo' ),
				'title'   => __( 'Cuéntanos tu situación', 'morillo' ),
				'lead'    => __( 'Es totalmente confidencial.', 'morillo' ),
			) ); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
