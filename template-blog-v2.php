<?php
/**
 * Template Name: Blog v2
 * @package Morillo
 */
get_header();

$query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 12,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>
<article class="v2-blog">
	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-casos__head">
				<nav class="v2-equipo__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Blog</span>
				</nav>
				<span class="v2-eyebrow">DIARIO JURÍDICO</span>
				<h1 class="v2-casos__title">
					Lo último que <em>escribimos</em>.
				</h1>
				<p class="v2-casos__lead">
					Artículos sobre Ley de Segunda Oportunidad, derecho bancario,
					mercantil, civil y penal. Sin tecnicismos innecesarios — para
					que entiendas qué pasa con tu caso.
				</p>
			</header>
		</div>
	</section>

	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<?php if ( $query->have_posts() ) : ?>
				<div class="v2-blog-grid v2-blog-page__grid" data-stagger>
					<?php while ( $query->have_posts() ) : $query->the_post();
						$cats = get_the_category();
						$cat  = $cats ? strtoupper( $cats[0]->name ) : 'JURÍDICO';
					?>
						<a class="v2-blog-card" href="<?php the_permalink(); ?>">
							<p class="v2-blog-card__meta">
								[<?php echo esc_html( $cat ); ?> · <?php echo esc_html( strtoupper( get_the_date( 'd M Y' ) ) ); ?> · <?php echo esc_html( ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) ); ?> MIN]
							</p>
							<h2 class="v2-blog-card__title"><?php the_title(); ?></h2>
							<p class="v2-blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26, '…' ) ); ?></p>
							<div class="v2-blog-card__foot">
								<span><?php the_author(); ?></span>
								<span class="v2-arrow" aria-hidden="true">→</span>
							</div>
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			<?php else : ?>
				<div class="v2-blog-empty">
					<p class="v2-blog-empty__eyebrow">[ AÚN SIN ARTÍCULOS ]</p>
					<h2 class="v2-blog-empty__title">El diario está <em>en preparación</em>.</h2>
					<p class="v2-blog-empty__desc">
						Estamos preparando los primeros artículos sobre Ley de
						Segunda Oportunidad, derecho bancario y los cambios
						normativos del último año. Vuelve pronto, o suscríbete al
						boletín para recibir el primero por email.
					</p>
					<div class="v2-equipo-cta__btns" style="margin-top: 32px; justify-content: center;">
						<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="v2-btn v2-btn--primary">
							Suscribirme al boletín
							<span class="v2-arrow" aria-hidden="true">→</span>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
</article>
<?php get_footer(); ?>
