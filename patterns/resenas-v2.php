<?php
/** RESEÑAS v2.1 — placeholders dashed mientras no hay reseñas reales.
 *  Mantiene schema.org Review por si se rellena con datos reales en futuras
 *  iteraciones. */
defined( 'ABSPATH' ) || exit;

$placeholders = array(
	array( 'cat' => 'GOOGLE',  'note' => 'Pendiente sincronizar con Google My Business' ),
	array( 'cat' => 'GOOGLE',  'note' => 'Pendiente sincronizar con Google My Business' ),
	array( 'cat' => 'GOOGLE',  'note' => 'Pendiente sincronizar con Google My Business' ),
	array( 'cat' => 'GOOGLE',  'note' => 'Pendiente sincronizar con Google My Business' ),
	array( 'cat' => 'GOOGLE',  'note' => 'Pendiente sincronizar con Google My Business' ),
	array( 'cat' => 'GOOGLE',  'note' => 'Pendiente sincronizar con Google My Business' ),
);
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">OPINIONES</span>
				<h2 class="v2-section__title">Opiniones reales,<br>sin filtrar.</h2>
			</div>
		</header>

		<div class="v2-reviews-grid" data-stagger>
			<?php foreach ( $placeholders as $p ) : ?>
				<article class="v2-review v2-review--placeholder" itemscope itemtype="https://schema.org/Review">
					<div class="v2-review__head">
						<span class="v2-review__stars" aria-label="5 estrellas">★★★★★</span>
						<span>[ RESEÑA PENDIENTE · <?php echo esc_html( $p['cat'] ); ?> ]</span>
					</div>
					<p class="v2-review__quote v2-review__quote--placeholder">
						<?php echo esc_html( $p['note'] ); ?>.
					</p>
					<p class="v2-review__sign">— Conectar con la API de Google Reviews —</p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
