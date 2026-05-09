<?php
/** BLOG TEASER v2 — 3 últimos posts. Si no hay posts, fallback editorial. */
defined( 'ABSPATH' ) || exit;

$query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

// Fallback: si no hay posts publicados, mostramos placeholders editoriales para
// que la sección nunca quede vacía visualmente en local.
$posts_data = array();
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$cats = get_the_category();
		$cat  = $cats ? strtoupper( $cats[0]->name ) : 'JURÍDICO';
		$posts_data[] = array(
			'href'    => get_permalink(),
			'cat'     => $cat,
			'date'    => strtoupper( get_the_date( 'd M Y' ) ),
			'time'    => '6 MIN',
			'title'   => get_the_title(),
			'excerpt' => wp_trim_words( get_the_excerpt(), 24, '…' ),
			'author'  => get_the_author(),
		);
	}
	wp_reset_postdata();
} else {
	$posts_data = array(
		array( 'href' => '#', 'cat' => 'LSO', 'date' => '14 ABR 2026', 'time' => '6 MIN',
		       'title' => 'Cuándo tiene sentido pedir la Segunda Oportunidad (y cuándo no).',
		       'excerpt' => 'No es para todo el mundo. Te contamos los cinco supuestos en los que la LSO realmente cancela tu deuda y cuándo es mejor otra vía.',
		       'author' => 'Remedios Morillo' ),
		array( 'href' => '#', 'cat' => 'BANCARIO', 'date' => '02 ABR 2026', 'time' => '4 MIN',
		       'title' => 'Tarjetas revolving: cómo saber si la tuya es usuraria.',
		       'excerpt' => 'Indicadores objetivos para detectar si tu tarjeta entra en el rango sancionable por jurisprudencia del Supremo. Caso real reciente.',
		       'author' => 'Rafael Ruíz del Portal' ),
		array( 'href' => '#', 'cat' => 'CIVIL', 'date' => '20 MAR 2026', 'time' => '5 MIN',
		       'title' => 'Herencias: cómo reaccionar si tu coheredero bloquea el reparto.',
		       'excerpt' => 'Las cuatro vías reales (mediación, cuaderno particional, acción de división y judicialización) explicadas sin tecnicismos.',
		       'author' => 'Ana Mª Fernández' ),
	);
}
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">[12 — DIARIO]</span>
				<h2 class="v2-section__title">Lo último que escribimos.</h2>
			</div>
			<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
				[ Ver todo ]
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</header>

		<div class="v2-blog-grid" data-stagger>
			<?php foreach ( $posts_data as $p ) : ?>
				<a class="v2-blog-card" href="<?php echo esc_url( $p['href'] ); ?>">
					<p class="v2-blog-card__meta">[<?php echo esc_html( $p['cat'] ); ?> · <?php echo esc_html( $p['date'] ); ?> · <?php echo esc_html( $p['time'] ); ?>]</p>
					<h3 class="v2-blog-card__title"><?php echo esc_html( $p['title'] ); ?></h3>
					<p class="v2-blog-card__excerpt"><?php echo esc_html( $p['excerpt'] ); ?></p>
					<div class="v2-blog-card__foot">
						<span><?php echo esc_html( $p['author'] ); ?></span>
						<span class="v2-arrow" aria-hidden="true">→</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
