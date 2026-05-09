<?php
/** RESEÑAS v2 — 6 cards server-side con schema.org Review (placeholders). */
defined( 'ABSPATH' ) || exit;

$reviews = array(
	array( 'rating' => 5, 'date' => 'MAR 2026', 'platform' => 'GOOGLE', 'quote' => 'Remedios me sacó de cinco años de pesadilla con tarjetas revolving. Sentencia firme y devolución íntegra. Recomendable al 100%.', 'author' => 'Carlos M.', 'city' => 'Madrid' ),
	array( 'rating' => 5, 'date' => 'FEB 2026', 'platform' => 'GOOGLE', 'quote' => 'Trato cercano y honesto desde el primer email. Me explicó la viabilidad antes de cobrarme nada. Conseguimos el BEPI en seis meses.', 'author' => 'Lucía R.', 'city' => 'Málaga' ),
	array( 'rating' => 5, 'date' => 'ENE 2026', 'platform' => 'GOOGLE', 'quote' => 'Profesional, transparente y muy clara con los honorarios. No promete imposibles. Mi caso era complejo y lo resolvió.', 'author' => 'Javier P.', 'city' => 'Madrid' ),
	array( 'rating' => 5, 'date' => 'DIC 2025', 'platform' => 'GOOGLE', 'quote' => 'Después de dos despachos que me dijeron que no había nada que hacer, Remedios encontró la vía. Resultado: deuda cancelada.', 'author' => 'Ana T.', 'city' => 'Málaga' ),
	array( 'rating' => 5, 'date' => 'NOV 2025', 'platform' => 'GOOGLE', 'quote' => 'Como autónomo arruinado por la crisis, pensé que ya no había salida. La Ley de Segunda Oportunidad funcionó y volví a empezar.', 'author' => 'Manuel A.', 'city' => 'Madrid' ),
	array( 'rating' => 5, 'date' => 'OCT 2025', 'platform' => 'GOOGLE', 'quote' => 'Atención impecable. Me respondieron mismo día y el proceso fue exactamente como me explicaron al principio. Sin sustos.', 'author' => 'Pilar G.', 'city' => 'Málaga' ),
);
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">[10 — OPINIONES]</span>
				<h2 class="v2-section__title">Opiniones reales,<br>sin filtrar.</h2>
			</div>
		</header>

		<div class="v2-reviews-grid" data-stagger>
			<?php foreach ( $reviews as $r ) : ?>
				<article class="v2-review" itemscope itemtype="https://schema.org/Review">
					<meta itemprop="datePublished" content="2026-01-01">
					<div itemprop="itemReviewed" itemscope itemtype="https://schema.org/LegalService" style="display:none;">
						<meta itemprop="name" content="Remedios Morillo Abogados">
					</div>
					<div itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" class="v2-review__head">
						<span class="v2-review__stars" aria-label="<?php echo esc_attr( $r['rating'] . ' estrellas' ); ?>">
							<?php echo str_repeat( '★', $r['rating'] ); ?><?php echo str_repeat( '☆', 5 - $r['rating'] ); ?>
						</span>
						<meta itemprop="ratingValue" content="<?php echo esc_attr( $r['rating'] ); ?>">
						<meta itemprop="bestRating" content="5">
						<span>· <?php echo esc_html( $r['date'] ); ?> · [ <?php echo esc_html( $r['platform'] ); ?> ]</span>
					</div>
					<p class="v2-review__quote" itemprop="reviewBody">"<?php echo esc_html( $r['quote'] ); ?>"</p>
					<p class="v2-review__sign" itemprop="author" itemscope itemtype="https://schema.org/Person">
						<span itemprop="name"><?php echo esc_html( $r['author'] ); ?></span> · <?php echo esc_html( $r['city'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
