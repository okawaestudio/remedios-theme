<?php
/**
 * Generic fallback (no usado para home — esa es front-page.php)
 * @package Morillo
 */
get_header(); ?>

<div class="container container--narrow" style="padding: clamp(60px, 10vw, 120px) 0;">
	<?php if ( have_posts() ) : ?>
		<header style="margin-bottom: 56px;">
			<h1 class="page-default__title"><?php is_home() ? bloginfo( 'name' ) : the_archive_title(); ?></h1>
		</header>
		<div class="post-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="post-item">
					<a href="<?php the_permalink(); ?>" class="post-item__link">
						<h2 class="post-item__title"><?php the_title(); ?></h2>
						<p class="post-item__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
						<span class="post-item__action"><?php esc_html_e( 'Leer artículo', 'morillo' ); ?> <?php morillo_arrow( 14 ); ?></span>
					</a>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No hay contenido todavía.', 'morillo' ); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
