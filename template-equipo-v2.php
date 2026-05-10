<?php
/**
 * Template Name: Equipo v2
 * @package Morillo
 */
get_header();
$theme_uri = get_template_directory_uri();

$team = array(
	array(
		'name'  => 'Remedios Morillo Hernán',
		'role'  => 'Titular del despacho · Abogada',
		'img'   => 'remedios.jpg',
		'creds' => 'ICAM · Especialista en LSO, Bancario y Mercantil',
		'areas' => array( 'Segunda Oportunidad', 'Bancario', 'Mercantil', 'Patrimonio' ),
		'bio'   => 'Abogada en ejercicio desde 2014. Fundadora del despacho. Más de 600 procedimientos resueltos entre Ley de Segunda Oportunidad, derecho bancario y asesoramiento societario. Lleva personalmente cada caso desde la primera llamada hasta la sentencia.',
	),
	array(
		'name'  => 'Rafael Ruíz del Portal',
		'role'  => 'Abogado asociado',
		'img'   => 'rafael.jpg',
		'creds' => 'ICAM 91.402 · Bancario y Civil',
		'areas' => array( 'Bancario', 'Civil' ),
		'bio'   => 'Especialista en derecho bancario y reclamaciones de consumo. 15 años de experiencia en juzgados de Madrid. Lidera procedimientos de cláusulas suelo, revolving y gastos hipotecarios.',
	),
	array(
		'name'  => 'Ana Mª Fernández Calderón',
		'role'  => 'Abogada asociada',
		'img'   => 'ana.jpg',
		'creds' => 'ICAMÁLAGA 13.117 · Mercantil y Penal',
		'areas' => array( 'Mercantil', 'Penal' ),
		'bio'   => 'Especialista en derecho mercantil y penal económico. Trabaja desde la sede de Málaga. Coordina los procedimientos concursales empresariales y la defensa penal en delitos económicos.',
	),
	array(
		'name'  => 'María Agosto Villalonga',
		'role'  => 'Procuradora',
		'img'   => 'maria.jpg',
		'creds' => 'ICPM 4.221 · Madrid',
		'areas' => array( 'Procura · Madrid' ),
		'bio'   => 'Procuradora colegiada en Madrid. Coordina la representación procesal del despacho en juzgados de la Comunidad de Madrid: presentación de escritos, recogida de notificaciones, asistencia a vistas.',
	),
	array(
		'name'  => 'Daniel Barrios Jurado',
		'role'  => 'Marketing y desarrollo',
		'img'   => 'daniel.jpg',
		'creds' => 'OKAWA STUDIO · Comunicación',
		'areas' => array( 'Comunicación', 'Web', 'SEO' ),
		'bio'   => 'Responsable de marketing, web y comunicación digital del despacho. Diseña y mantiene esta web, gestiona la presencia online y el posicionamiento orgánico.',
	),
);
?>
<article class="v2-equipo">

	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-equipo__head">
				<nav class="v2-equipo__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Equipo</span>
				</nav>
				<span class="v2-eyebrow">EL EQUIPO</span>
				<h1 class="v2-equipo__title">
					Personas reales <em>al otro lado</em><br>
					del expediente.
				</h1>
				<p class="v2-equipo__lead">
					Despacho independiente con sedes en Madrid y Málaga. Tu caso lo
					lleva personalmente la abogada titular — no un equipo rotatorio,
					no subcontratamos.
				</p>
			</header>
		</div>
	</section>

	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-equipo__grid" data-stagger>
				<?php foreach ( $team as $i => $p ) :
					$is_lead = ( $i === 0 );
				?>
					<article class="v2-equipo-card<?php echo $is_lead ? ' v2-equipo-card--lead' : ''; ?>"
					         itemscope itemtype="https://schema.org/Person">
						<meta itemprop="jobTitle" content="<?php echo esc_attr( $p['role'] ); ?>">
						<div class="v2-equipo-card__photo">
							<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/' . $p['img'] ); ?>"
							     alt="<?php echo esc_attr( $p['name'] ); ?>"
							     loading="<?php echo $is_lead ? 'eager' : 'lazy'; ?>"
							     width="600" height="750"
							     itemprop="image">
						</div>
						<div class="v2-equipo-card__body">
							<h2 class="v2-equipo-card__name" itemprop="name"><?php echo esc_html( $p['name'] ); ?></h2>
							<p class="v2-equipo-card__role"><?php echo esc_html( $p['role'] ); ?></p>
							<p class="v2-equipo-card__bio"><?php echo esc_html( $p['bio'] ); ?></p>
							<div class="v2-equipo-card__meta">
								<p class="v2-equipo-card__creds"><?php echo esc_html( $p['creds'] ); ?></p>
								<div class="v2-equipo-card__areas">
									<?php foreach ( $p['areas'] as $area ) : ?>
										<span class="v2-equipo-card__area-tag"><?php echo esc_html( $area ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Filosofía / Cómo trabajamos -->
	<section class="v2-section v2-section--cream-2 v2-equipo-philos">
		<div class="v2-container">
			<header class="v2-equipo-philos__head">
				<span class="v2-eyebrow">CÓMO TRABAJAMOS</span>
				<h2 class="v2-equipo-philos__title">
					Tres principios <em>no negociables</em>.
				</h2>
			</header>
			<div class="v2-equipo-philos__grid">
				<article class="v2-equipo-philos__item">
					<p class="v2-equipo-philos__num">01</p>
					<h3 class="v2-equipo-philos__t">Tu caso, tu abogada.</h3>
					<p class="v2-equipo-philos__d">No subcontratamos. Si te coge el caso Remedios, lo lleva Remedios — desde la primera llamada hasta la sentencia. Sin sustitutos no consultados.</p>
				</article>
				<article class="v2-equipo-philos__item">
					<p class="v2-equipo-philos__num">02</p>
					<h3 class="v2-equipo-philos__t">Honorarios cerrados, por escrito.</h3>
					<p class="v2-equipo-philos__d">Presupuesto cerrado antes de aceptar el caso. Sin facturas sorpresa, sin minutas adicionales. Si tu caso no es viable, no te facturamos.</p>
				</article>
				<article class="v2-equipo-philos__item">
					<p class="v2-equipo-philos__num">03</p>
					<h3 class="v2-equipo-philos__t">Análisis honesto de viabilidad.</h3>
					<p class="v2-equipo-philos__d">Si tu caso no encaja, te lo decimos el primer día. Preferimos perder un cliente a venderle una pelea que no puede ganar.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- CTA hablemos -->
	<section class="v2-section v2-section--white v2-hablemos" id="contacto">
		<div class="v2-container">
			<div class="v2-equipo-cta">
				<span class="v2-eyebrow">HABLEMOS</span>
				<h2 class="v2-equipo-cta__title">¿Quieres que llevemos <em>tu caso</em>?</h2>
				<p class="v2-equipo-cta__lead">
					Cuéntanos qué necesitas. Te respondemos en menos de 24h con un
					análisis honesto y un sí o un no claros.
				</p>
				<div class="v2-equipo-cta__btns">
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="v2-btn v2-btn--primary">
						Escribir al despacho
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

<?php get_footer(); ?>
