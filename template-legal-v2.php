<?php
/**
 * Template Name: Legal v2 — Aviso, Privacidad, Cookies, Accesibilidad
 *
 * Layout simple para páginas legales. Renderiza the_content() con
 * tipografía Jakarta legible y máxima lectura cómoda.
 *
 * @package Morillo
 */
get_header();
?>
<article class="v2-legal">

	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-legal__head">
				<nav class="v2-equipo__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php the_title(); ?></span>
				</nav>
				<span class="v2-eyebrow">PÁGINA LEGAL</span>
				<h1 class="v2-legal__title"><?php the_title(); ?></h1>
				<p class="v2-legal__updated">
					Última actualización: <?php echo esc_html( get_the_modified_date( 'j \d\e F \d\e Y' ) ); ?>
				</p>
			</header>
		</div>
	</section>

	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-legal__grid">
				<aside class="v2-legal__nav">
					<p class="v2-legal__nav-eyebrow">DOCUMENTOS LEGALES</p>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/aviso-legal/' ) ); ?>"<?php if ( is_page( 'aviso-legal' ) ) echo ' class="is-active"'; ?>>Aviso legal</a></li>
						<li><a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>"<?php if ( is_page( 'politica-de-privacidad' ) ) echo ' class="is-active"'; ?>>Política de privacidad</a></li>
						<li><a href="<?php echo esc_url( home_url( '/politica-de-cookies/' ) ); ?>"<?php if ( is_page( 'politica-de-cookies' ) ) echo ' class="is-active"'; ?>>Política de cookies</a></li>
						<li><a href="<?php echo esc_url( home_url( '/declaracion-de-accesibilidad/' ) ); ?>"<?php if ( is_page( 'declaracion-de-accesibilidad' ) ) echo ' class="is-active"'; ?>>Declaración de accesibilidad</a></li>
					</ul>

					<p class="v2-legal__nav-eyebrow" style="margin-top: 32px;">CONTACTO</p>
					<p class="v2-legal__nav-contact">
						<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>"><?php echo esc_html( MORILLO_EMAIL ); ?></a><br>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>"><?php echo esc_html( MORILLO_PHONE ); ?></a>
					</p>
				</aside>

				<div class="v2-legal__content">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							$content = get_the_content();
							if ( trim( $content ) !== '' ) {
								echo '<div class="v2-legal__prose">' . apply_filters( 'the_content', $content ) . '</div>';
							} else {
								// Placeholder cuando no hay contenido
								?>
								<div class="v2-legal__placeholder">
									<p class="v2-legal__placeholder-eyebrow">[ CONTENIDO PENDIENTE ]</p>
									<p>
										El texto de esta página legal se actualizará desde el editor
										de WordPress. Una vez añadido, sustituirá automáticamente
										este placeholder.
									</p>
									<p>
										Para añadir contenido: <code>/wp-admin/edit.php?post_type=page</code>
										→ <strong><?php the_title(); ?></strong> → Editor de Gutenberg.
									</p>
								</div>
								<?php
							}
						endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</section>
</article>
<?php get_footer(); ?>
