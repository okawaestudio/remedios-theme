<?php
/**
 * Single post (blog) — hero estándar + prose body + CTA + reviews
 *
 * @package Morillo
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post();
	$thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
	$cats      = get_the_category();
	$cat_name  = ! empty( $cats ) ? $cats[0]->name : __( 'Blog', 'morillo' );
	?>

	<!-- ============== HERO POST ============== -->
	<section class="rm-page-hero<?php echo $thumb_url ? '' : ' rm-page-hero--slim'; ?>" <?php if ( $thumb_url ) : ?>style="background-image: url('<?php echo esc_url( $thumb_url ); ?>');"<?php endif; ?>>
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>

			<span class="rm-page-hero__eyebrow">
				<?php echo esc_html( $cat_name ); ?>
				<span aria-hidden="true">·</span>
				<?php echo esc_html( get_the_date( 'd M Y' ) ); ?>
			</span>
			<h1 class="rm-page-hero__title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="rm-page-hero__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<!-- ============== BODY: prose ============== -->
	<article class="single-post">
		<div class="container container--narrow">
			<div class="single-post__body prose">
				<?php the_content(); ?>
			</div>

			<footer class="single-post__foot">
				<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="single-post__back">
					<svg width="14" height="14" viewBox="0 0 16 16" aria-hidden="true"><path d="M14 8H3M7 4L3 8l4 4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<?php esc_html_e( 'Volver al blog', 'morillo' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn-primary">
					<?php esc_html_e( 'Pedir consulta gratuita', 'morillo' ); ?> <?php morillo_arrow(); ?>
				</a>
			</footer>
		</div>
	</article>

<?php endwhile; ?>

<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

<?php get_footer(); ?>
