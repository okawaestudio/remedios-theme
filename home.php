<?php
/**
 * Blog index · editorial
 * @package Morillo
 */
get_header();
?>

<article class="ed-page ed-blog">

	<!-- ============== HERO BLOG ============== -->
	<section class="rm-page-hero rm-page-hero--slim">
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'Blog', 'morillo' ); ?></span>
			</nav>
			<span class="rm-page-hero__eyebrow"><?php esc_html_e( 'Diario jurídico', 'morillo' ); ?></span>
			<h1 class="rm-page-hero__title"><?php esc_html_e( 'Diario jurídico', 'morillo' ); ?></h1>
			<p class="rm-page-hero__lead">
				<?php esc_html_e( 'Actualizaciones de doctrina, sentencias relevantes y reflexiones desde el despacho. Sin SEO-spam ni titulares grandilocuentes — solo lo que realmente cambia las cosas.', 'morillo' ); ?>
			</p>
		</div>
	</section>

	<section class="ed-blog__list">
		<div class="container">
			<?php if ( have_posts() ) :
				$first = true;
			?>
				<?php while ( have_posts() ) : the_post();
					if ( $first ) : $first = false; ?>
						<!-- Featured: primer post a tamaño grande -->
						<article class="ed-blog-feat">
							<a href="<?php the_permalink(); ?>" class="ed-blog-feat__link">
								<div class="ed-blog-feat__photo">
									<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'large' ); else echo '<div class="ed-blog-feat__placeholder"></div>'; ?>
								</div>
								<div class="ed-blog-feat__body">
									<div class="ed-blog-meta">
										<?php
										$cats = get_the_category();
										if ( $cats ) echo '<span class="ed-blog-meta__cat">' . esc_html( strtoupper( $cats[0]->name ) ) . '</span> · ';
										?>
										<span><?php echo esc_html( strtoupper( get_the_date( 'd M Y' ) ) ); ?></span>
									</div>
									<h2 class="ed-blog-feat__title"><?php the_title(); ?></h2>
									<p class="ed-blog-feat__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
									<span class="ed-btn ed-btn--ghost" style="margin-top: 8px;">Leer el artículo <span class="ed-btn__arrow">→</span></span>
								</div>
							</a>
						</article>
					<?php else : ?>
						<?php if ( ! isset( $opened_grid ) ) { echo '<header class="ed-blog__grid-head"><span class="ed-eyebrow">Todos los artículos</span></header><div class="ed-blog__grid">'; $opened_grid = true; } ?>
						<article class="ed-blog-card">
							<a href="<?php the_permalink(); ?>" class="ed-blog-card__link">
								<div class="ed-blog-card__photo">
									<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium' ); else echo '<div class="ed-blog-card__placeholder"></div>'; ?>
								</div>
								<div class="ed-blog-card__body">
									<div class="ed-blog-meta">
										<?php
										$cats = get_the_category();
										if ( $cats ) echo '<span class="ed-blog-meta__cat">' . esc_html( strtoupper( $cats[0]->name ) ) . '</span> · ';
										?>
										<span><?php echo esc_html( strtoupper( get_the_date( 'd M Y' ) ) ); ?></span>
									</div>
									<h3 class="ed-blog-card__title"><?php the_title(); ?></h3>
								</div>
							</a>
						</article>
					<?php endif; ?>
				<?php endwhile; ?>
				<?php if ( isset( $opened_grid ) ) echo '</div>'; ?>

				<div class="ed-blog__pagination">
					<?php the_posts_pagination( array(
						'prev_text' => '←',
						'next_text' => '→',
					) ); ?>
				</div>
			<?php else : ?>
				<div class="ed-blog__empty">
					<h2 class="ed-h-section">Pronto publicaremos artículos.</h2>
					<p class="ed-body">Estamos preparando contenido sobre Ley de Segunda Oportunidad, derecho bancario y novedades jurisprudenciales.</p>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- Newsletter -->
	<section class="ed-blog__newsletter">
		<div class="container">
			<div class="ed-blog__newsletter-grid">
				<div>
					<span class="ed-eyebrow">Newsletter mensual</span>
					<h2 class="ed-h-section">Una vez al mes.<br>Sin ruido.</h2>
				</div>
				<div>
					<p class="ed-body">El primer lunes de cada mes te enviamos un resumen de las sentencias, reformas y novedades doctrinales que de verdad importan. Tres minutos de lectura.</p>
					<div class="ed-blog__newsletter-form">
						<input type="email" placeholder="tu@email.com" disabled>
						<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="ed-btn ed-btn--primary">Suscribirme <span class="ed-btn__arrow">→</span></a>
					</div>
					<div class="ed-mono" style="margin-top: 12px;">SIN SPAM · BAJA EN UN CLICK</div>
				</div>
			</div>
		</div>
	</section>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>
</article>

<?php get_footer(); ?>
