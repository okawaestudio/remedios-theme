<?php
/**
 * Sección de reseñas reutilizable (iframe ReputationHub)
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

function morillo_reviews_section( $args = array() ) {
	$defaults = array(
		'eyebrow' => __( 'Lo que dicen nuestros clientes', 'morillo' ),
		'title'   => __( 'Opiniones reales, sin filtrar.', 'morillo' ),
		'compact' => false,
	);
	$a = wp_parse_args( $args, $defaults );
	?>
	<section class="rm-reviews <?php echo $a['compact'] ? 'rm-reviews--compact' : ''; ?>">
		<div class="container">
			<header class="rm-reviews__head">
				<span class="rm-eyebrow"><?php echo esc_html( $a['eyebrow'] ); ?></span>
				<h2 class="rm-section-title"><?php echo esc_html( $a['title'] ); ?></h2>
			</header>
			<div class="rm-reviews__widget">
				<iframe class="lc_reviews_widget"
					src="https://reputationhub.site/reputation/widgets/review_widget/I09cC0fnhUb9b56hCVTu?widgetId=6863a50a151681172a7f056b"
					frameborder="0"
					scrolling="no"
					style="min-width: 100%; width: 100%;"
					title="<?php esc_attr_e( 'Opiniones y reseñas de clientes', 'morillo' ); ?>"
					loading="lazy"></iframe>
			</div>
		</div>
	</section>
	<?php
}

// Cargar el script del widget UNA SOLA VEZ en el footer
function morillo_reviews_script() {
	?>
	<script type="text/javascript" src="https://reputationhub.site/reputation/assets/review-widget.js" defer></script>
	<?php
}
add_action( 'wp_footer', 'morillo_reviews_script', 99 );
