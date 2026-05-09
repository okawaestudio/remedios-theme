<?php
/**
 * Header
 * @package Morillo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#162542">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Saltar al contenido', 'morillo' ); ?></a>

<header class="site-header" id="site-header">
	<div class="site-header__bar">
		<div class="container site-header__inner">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__brand" aria-label="Remedios Morillo · Inicio">
				<?php morillo_logo( 240 ); ?>
			</a>

			<nav class="site-header__nav" aria-label="<?php esc_attr_e( 'Menú principal', 'morillo' ); ?>">
				<ul class="nav-list">
					<li class="nav-item nav-item--has-children">
						<a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>"><?php esc_html_e( 'Segunda Oportunidad', 'morillo' ); ?></a>
					</li>
					<li class="nav-item nav-item--has-children">
						<button class="nav-toggle" aria-haspopup="true" aria-expanded="false"><?php esc_html_e( 'Áreas', 'morillo' ); ?>
							<svg width="10" height="10" viewBox="0 0 10 10" aria-hidden="true"><path d="M1 3l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</button>
						<ul class="nav-submenu">
							<li><a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>"><?php esc_html_e( 'Derecho Bancario', 'morillo' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>"><?php esc_html_e( 'Derecho Civil', 'morillo' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>"><?php esc_html_e( 'Derecho Penal', 'morillo' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>"><?php esc_html_e( 'Derecho Mercantil', 'morillo' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>"><?php esc_html_e( 'Gestión de Patrimonio', 'morillo' ); ?></a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>"><?php esc_html_e( 'Casos', 'morillo' ); ?></a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>"><?php esc_html_e( 'Equipo', 'morillo' ); ?></a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'morillo' ); ?></a></li>
					<li class="nav-item"><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Contacto', 'morillo' ); ?></a></li>
				</ul>
			</nav>

			<div class="site-header__actions">
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="header-phone" aria-label="<?php esc_attr_e( 'Llamar ahora', 'morillo' ); ?>">
					<svg width="14" height="14" viewBox="0 0 16 16" aria-hidden="true">
						<path d="M3 2c0-.55.45-1 1-1h2.18c.4 0 .76.24.92.6l1.1 2.55a1 1 0 0 1-.22 1.13L6.7 6.55c.85 1.7 2.05 2.9 3.75 3.75l1.27-1.28a1 1 0 0 1 1.13-.22l2.55 1.1c.36.16.6.52.6.92V13c0 .55-.45 1-1 1A12 12 0 0 1 3 2z" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/>
					</svg>
					<span><?php echo esc_html( MORILLO_PHONE ); ?></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn-primary btn-sm">
					<?php esc_html_e( 'Consulta gratuita', 'morillo' ); ?>
				</a>
				<button class="nav-burger" id="navBurger" aria-controls="mobileNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Abrir menú', 'morillo' ); ?>">
					<span></span><span></span><span></span>
				</button>
			</div>
		</div>
	</div>
</header>

<!-- Mobile drawer fuera del <header> para que position:fixed no se rompa por backdrop-filter del header -->
<div class="mobile-nav" id="mobileNav" hidden>
	<ul class="mobile-nav__list">
		<li><a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>"><?php esc_html_e( 'Ley Segunda Oportunidad', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>"><?php esc_html_e( 'Derecho Bancario', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>"><?php esc_html_e( 'Derecho Civil', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>"><?php esc_html_e( 'Derecho Penal', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>"><?php esc_html_e( 'Derecho Mercantil', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>"><?php esc_html_e( 'Gestión de Patrimonio', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>"><?php esc_html_e( 'Casos de éxito', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>"><?php esc_html_e( 'Equipo', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'morillo' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Contacto', 'morillo' ); ?></a></li>
	</ul>
	<div class="mobile-nav__cta">
		<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="btn btn-ghost btn-block"><?php echo esc_html( MORILLO_PHONE ); ?></a>
		<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn-primary btn-block"><?php esc_html_e( 'Consulta gratuita', 'morillo' ); ?></a>
	</div>
</div>

<main id="main" class="site-main">
