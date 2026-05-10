<?php
/**
 * Template Name: Casos de Éxito v2
 * @package Morillo
 */
get_header();

// Casos del CPT casos_exito (helper devuelve array uniforme).
$casos = morillo_get_casos( array( 'posts_per_page' => -1 ) );

// Filtros generados dinámicamente desde la taxonomía.
$filtros = array( 'todas' => 'Todas' );
$_terms  = get_terms( array( 'taxonomy' => 'area_practica', 'hide_empty' => true ) );
if ( $_terms && ! is_wp_error( $_terms ) ) {
	foreach ( $_terms as $_t ) $filtros[ $_t->slug ] = $_t->name;
}
?>
<article class="v2-casos">

	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-casos-page__head">
				<nav class="v2-equipo__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Casos de éxito</span>
				</nav>
				<span class="v2-eyebrow">CASOS DE ÉXITO</span>
				<h1 class="v2-casos-page__title">
					Casos resueltos. <em>Cifras reales.</em><br>
					Detalles públicos con consentimiento.
				</h1>
				<p class="v2-casos-page__lead">
					Selección de procedimientos resueltos en los últimos 12 meses.
					Datos publicados con autorización expresa de cada cliente.
					Casos confidenciales bajo NDA no aparecen.
				</p>
			</header>

			<div class="v2-casos-page__filters" role="tablist" aria-label="Filtrar por área">
				<?php foreach ( $filtros as $value => $label ) : ?>
					<button type="button"
					        class="v2-casos-page__filter<?php echo $value === 'todas' ? ' is-active' : ''; ?>"
					        data-filter="<?php echo esc_attr( $value ); ?>"
					        role="tab"
					        aria-selected="<?php echo $value === 'todas' ? 'true' : 'false'; ?>">
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<?php if ( $casos ) : ?>
				<div class="v2-casos-grid v2-casos-page__grid" data-stagger>
					<?php foreach ( $casos as $c ) : ?>
						<article class="v2-caso-card v2-caso-page" data-area="<?php echo esc_attr( $c['area_slug'] ); ?>">
							<header class="v2-caso-card__head">
								<span class="v2-caso-card__area"><?php echo esc_html( $c['area_label'] ); ?></span>
								<span class="v2-caso-card__ref"><?php echo esc_html( $c['ref'] ); ?></span>
							</header>
							<p class="v2-caso-card__amount"><?php echo esc_html( $c['amount'] ); ?></p>
							<h2 class="v2-caso-card__title"><?php echo esc_html( $c['title'] ); ?></h2>
							<p class="v2-caso-card__desc"><?php echo esc_html( $c['desc'] ); ?></p>
							<footer class="v2-caso-card__foot">
								<span><?php echo esc_html( $c['where'] ); ?></span>
								<span><?php echo esc_html( $c['date'] ); ?></span>
							</footer>
						</article>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<div class="v2-blog-empty">
					<p class="v2-blog-empty__eyebrow">[ AÚN SIN CASOS PUBLICADOS ]</p>
					<h2 class="v2-blog-empty__title">Pronto añadiremos <em>casos resueltos</em>.</h2>
					<p class="v2-blog-empty__desc">
						Estamos preparando la primera tanda de procedimientos
						resueltos para publicar aquí. Vuelve en unos días.
					</p>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- CTA hablemos -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<div class="v2-equipo-cta">
				<span class="v2-eyebrow">¿TU CASO?</span>
				<h2 class="v2-equipo-cta__title">¿Quieres ser <em>el siguiente caso resuelto</em>?</h2>
				<p class="v2-equipo-cta__lead">
					Cuéntanos qué te pasa. Te respondemos en menos de 24h con un
					análisis honesto y un sí o un no claros.
				</p>
				<div class="v2-equipo-cta__btns">
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="v2-btn v2-btn--primary">
						Contactar al despacho
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-btn v2-btn--ghost">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

</article>

<script>
// Filtro JS minimal — toggle visibilidad por data-area
(function(){
	const buttons = document.querySelectorAll('.v2-casos-page__filter[data-filter]');
	const cards   = document.querySelectorAll('.v2-caso-page');
	buttons.forEach(b => b.addEventListener('click', () => {
		const f = b.dataset.filter;
		buttons.forEach(x => { x.classList.remove('is-active'); x.setAttribute('aria-selected','false'); });
		b.classList.add('is-active'); b.setAttribute('aria-selected','true');
		cards.forEach(c => {
			c.style.display = (f === 'todas' || c.dataset.area === f) ? '' : 'none';
		});
	}));
})();
</script>

<?php get_footer(); ?>
