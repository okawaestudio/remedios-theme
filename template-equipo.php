<?php
/**
 * Template Name: Equipo
 * Hero rm-page-hero (foto Remedios bg) + grid equipo + valores + reviews.
 *
 * @package Morillo
 */
get_header();

$theme_uri = get_template_directory_uri();
$hero_bg   = $theme_uri . '/assets/img/team/remedios.jpg';

$team = array(
	array( 'name' => 'Rafael Ruíz del Portal',      'role' => 'Abogado asociado',         'area' => 'Bancario · Civil',  'meta' => 'ICAM 91.402',     'img' => 'rafael.jpg' ),
	array( 'name' => 'Ana Mª Fernández Calderón',   'role' => 'Abogada asociada',         'area' => 'Mercantil · Penal', 'meta' => 'ICAMÁLAGA 13.117','img' => 'ana.jpg' ),
	array( 'name' => 'María Agosto Villalonga',     'role' => 'Procuradora',              'area' => 'Madrid',            'meta' => 'ICPM 4.221',      'img' => 'maria.jpg' ),
	array( 'name' => 'Daniel Barrios Jurado',       'role' => 'Marketing y desarrollo',   'area' => 'Comunicación',      'meta' => '',                'img' => 'daniel.jpg' ),
);

$valores = array(
	array( 'n' => '01', 't' => 'Diagnóstico antes que venta',  'd' => 'Si tu caso no encaja en la ley, te lo decimos en la primera llamada. Cobrar por una expectativa irreal no es nuestro negocio.' ),
	array( 'n' => '02', 't' => 'Honorarios transparentes',     'd' => 'Presupuesto cerrado antes de firmar. Sin sorpresas, sin partidas variables, sin minutas creativas a mitad de procedimiento.' ),
	array( 'n' => '03', 't' => 'Una sola interlocutora',       'd' => 'La abogada que te recibe es la que firma tu sentencia. No te derivamos a un equipo junior cuando ya has firmado.' ),
);
?>

<article class="ed-page ed-equipo">

	<!-- ============== HERO con foto Remedios de fondo ============== -->
	<section class="rm-page-hero" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>'); background-position: center 25%;">
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'Equipo', 'morillo' ); ?></span>
			</nav>
			<span class="rm-page-hero__eyebrow"><?php esc_html_e( 'Sobre el despacho', 'morillo' ); ?></span>
			<h1 class="rm-page-hero__title">Soy <strong>Remedios Morillo</strong>, y respondo personalmente.</h1>
			<p class="rm-page-hero__lead">
				Trato cada expediente como si fuera el único. Mi especialidad es la Ley de la Segunda Oportunidad, pero también dirijo asuntos de derecho bancario, civil, mercantil y penal cuando el cliente necesita un acompañamiento integral.
			</p>
			<div class="rm-page-hero__ctas">
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn-primary">
					<?php esc_html_e( 'Consulta gratuita', 'morillo' ); ?> <?php morillo_arrow(); ?>
				</a>
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="btn btn-ghost-light">
					<?php echo esc_html( MORILLO_PHONE ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- ============== EQUIPO ============== -->
	<section class="ed-equipo__team">
		<div class="container">
			<span class="ed-eyebrow"><?php esc_html_e( 'El equipo', 'morillo' ); ?></span>
			<h2 class="ed-h-section ed-equipo__team-title"><?php esc_html_e( 'Personas reales al otro lado del expediente.', 'morillo' ); ?></h2>
			<div class="ed-equipo__team-grid">
				<?php foreach ( $team as $p ) : ?>
					<article class="ed-member">
						<div class="ed-member__photo">
							<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/' . $p['img'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>" loading="lazy">
						</div>
						<div class="ed-member__body">
							<div class="ed-member__name"><?php echo esc_html( $p['name'] ); ?></div>
							<div class="ed-member__role"><?php echo esc_html( $p['role'] ); ?></div>
							<div class="ed-member__meta">
								<span><?php echo esc_html( $p['area'] ); ?></span>
								<?php if ( $p['meta'] ) : ?><span><?php echo esc_html( $p['meta'] ); ?></span><?php endif; ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ============== VALORES (sección dark, mismo lenguaje que rm-cta del home) ============== -->
	<section class="ed-equipo__values">
		<div class="container">
			<span class="ed-eyebrow ed-eyebrow--invert"><?php esc_html_e( 'Nuestros principios', 'morillo' ); ?></span>
			<div class="ed-equipo__values-grid">
				<?php foreach ( $valores as $v ) : ?>
					<div class="ed-value">
						<div class="ed-value__num"><?php echo esc_html( $v['n'] ); ?></div>
						<h3 class="ed-value__title"><?php echo esc_html( $v['t'] ); ?></h3>
						<p class="ed-value__desc"><?php echo esc_html( $v['d'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

</article>

<?php get_footer(); ?>
