<?php
/**
 * Header v2 — solo para la home (front-page).
 * Cargado via get_header('v2'). El resto del sitio sigue usando header.php.
 *
 * @package Morillo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#FAF7F0">

	<?php // Preload Plus Jakarta Sans 600 (display crítico) + hero bg WebP. ?>
	<link rel="preload" href="<?php echo esc_url( get_template_directory_uri() . '/assets/fonts/jakarta/plus-jakarta-sans-latin-600-normal.woff2' ); ?>" as="font" type="font/woff2" crossorigin>
	<link rel="preload"
	      href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero/madrid-granvia-720.webp' ); ?>"
	      as="image"
	      type="image/webp"
	      imagesrcset="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero/madrid-granvia-720.webp' ); ?> 720w, <?php echo esc_url( get_template_directory_uri() . '/assets/img/hero/madrid-granvia-1280.webp' ); ?> 1280w, <?php echo esc_url( get_template_directory_uri() . '/assets/img/hero/madrid-granvia.webp' ); ?> 1920w"
	      imagesizes="100vw"
	      fetchpriority="high">

	<?php wp_head(); ?>
</head>
<body <?php body_class( 'v2-body' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Saltar al contenido', 'morillo' ); ?></a>

<div class="v2-home no-js">

	<header class="v2-header v2-header--solid" role="banner">
		<div class="v2-container v2-header__inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="v2-header__logo" aria-label="Remedios Morillo · Inicio">
				<?php morillo_logo( 200, 'navy' ); ?>
			</a>

			<nav class="v2-nav" aria-label="<?php esc_attr_e( 'Menú principal', 'morillo' ); ?>">
				<ul class="v2-nav__list">
					<li><a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>"><?php esc_html_e( 'Segunda Oportunidad', 'morillo' ); ?></a></li>
					<li>
						<button type="button" data-megamenu-trigger="#v2-megamenu-areas" aria-expanded="false" aria-haspopup="true">
							<?php esc_html_e( 'Áreas', 'morillo' ); ?>
							<svg width="10" height="10" viewBox="0 0 10 10" aria-hidden="true"><path d="M1 3l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</button>
					</li>
					<li><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>"><?php esc_html_e( 'Casos', 'morillo' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>"><?php esc_html_e( 'Equipo', 'morillo' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'morillo' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Contacto', 'morillo' ); ?></a></li>
				</ul>
			</nav>

			<div class="v2-header__actions">
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-header__phone" aria-label="<?php esc_attr_e( 'Llamar ahora', 'morillo' ); ?>">
					<?php echo esc_html( MORILLO_PHONE ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="v2-btn v2-btn--primary">
					<?php esc_html_e( 'Consulta gratuita', 'morillo' ); ?>
				</a>
				<button type="button" class="v2-burger" data-drawer-trigger aria-controls="v2-drawer" aria-expanded="false" aria-label="<?php esc_attr_e( 'Abrir menú', 'morillo' ); ?>">
					<span></span><span></span><span></span>
				</button>
			</div>
		</div>

		<?php // Mega-menu Áreas (panel debajo del header) ?>
		<div id="v2-megamenu-areas" class="v2-megamenu" role="menu" aria-label="<?php esc_attr_e( 'Áreas de práctica', 'morillo' ); ?>">
			<div class="v2-megamenu__grid">
				<div class="v2-megamenu__col">
					<p class="v2-megamenu__col-label">[Insolvencia]</p>
					<a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>"><?php esc_html_e( 'Ley de Segunda Oportunidad', 'morillo' ); ?></a>
				</div>
				<div class="v2-megamenu__col">
					<p class="v2-megamenu__col-label">[Bancario]</p>
					<a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>"><?php esc_html_e( 'Derecho Bancario', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/reclamar-tarjetas-revolving/' ) ); ?>"><?php esc_html_e( 'Tarjetas revolving', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/gastos-hipotecarios-2/' ) ); ?>"><?php esc_html_e( 'Gastos hipotecarios', 'morillo' ); ?></a>
				</div>
				<div class="v2-megamenu__col">
					<p class="v2-megamenu__col-label">[Mercantil]</p>
					<a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>"><?php esc_html_e( 'Derecho Mercantil', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/contratos-mercantiles-malaga/' ) ); ?>"><?php esc_html_e( 'Contratos mercantiles', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/concurso-de-acreedores/' ) ); ?>"><?php esc_html_e( 'Concurso de acreedores', 'morillo' ); ?></a>
				</div>
				<div class="v2-megamenu__col">
					<p class="v2-megamenu__col-label">[Civil]</p>
					<a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>"><?php esc_html_e( 'Derecho Civil', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/herencias-malaga/' ) ); ?>"><?php esc_html_e( 'Herencias', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/desahucios-y-arrendamientos-madrid/' ) ); ?>"><?php esc_html_e( 'Desahucios', 'morillo' ); ?></a>
				</div>
				<div class="v2-megamenu__col">
					<p class="v2-megamenu__col-label">[Penal]</p>
					<a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>"><?php esc_html_e( 'Derecho Penal', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/ocupaciones-ilegales-madrid/' ) ); ?>"><?php esc_html_e( 'Ocupaciones ilegales', 'morillo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>"><?php esc_html_e( 'Gestión de Patrimonio', 'morillo' ); ?></a>
				</div>
			</div>
		</div>
	</header>

	<?php // Mobile drawer (fuera del header para no afectar al backdrop-filter) ?>
	<div id="v2-drawer" class="v2-mobile-drawer" data-drawer aria-label="<?php esc_attr_e( 'Menú móvil', 'morillo' ); ?>">
		<button type="button" class="v2-mobile-drawer__close" data-drawer-close aria-label="<?php esc_attr_e( 'Cerrar menú', 'morillo' ); ?>">[ × ]</button>
		<ul class="v2-mobile-drawer__list">
			<li><a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>"><?php esc_html_e( 'Segunda Oportunidad', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>"><?php esc_html_e( 'Bancario', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>"><?php esc_html_e( 'Mercantil', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>"><?php esc_html_e( 'Civil', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>"><?php esc_html_e( 'Penal', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>"><?php esc_html_e( 'Casos', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>"><?php esc_html_e( 'Equipo', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'morillo' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Contacto', 'morillo' ); ?></a></li>
		</ul>
	</div>

	<main id="main" class="v2-main">
