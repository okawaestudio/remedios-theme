<?php
/**
 * Front page (Home) — versión moderna pre-Claude-design (sistema rm-*)
 *
 * @package Morillo
 */
get_header();

$theme_uri = get_template_directory_uri();
$hero_bg   = $theme_uri . '/assets/img/hero/madrid-granvia.jpg';

$areas = array(
	array( 'icon' => 'lso',         'title' => 'Ley de Segunda Oportunidad', 'href' => '/ley-de-segunda-oportunidad/', 'desc' => 'Cancelación legal de deudas para personas físicas y autónomos. Acompañamiento integral del expediente concursal.', 'star' => true ),
	array( 'icon' => 'bancario',    'title' => 'Derecho Bancario',           'href' => '/derecho-bancario/',           'desc' => 'Cláusulas suelo, revolving, IRPH, gastos hipoteca y comisiones abusivas. Sentencias firmes contra los principales bancos.' ),
	array( 'icon' => 'mercantil',   'title' => 'Derecho Mercantil',          'href' => '/derecho-mercantil/',          'desc' => 'Contratos mercantiles, concurso de acreedores y asesoramiento societario continuado para autónomos y pymes.' ),
	array( 'icon' => 'patrimonio',  'title' => 'Gestión de Patrimonio',      'href' => '/gestion-de-patrimonio/',      'desc' => 'Asesoramiento patrimonial integral, planificación sucesoria y fiscal con visión a largo plazo.' ),
	array( 'icon' => 'civil',       'title' => 'Derecho Civil',              'href' => '/derecho-civil/',              'desc' => 'Herencias, desahucios, arrendamientos, ejecuciones hipotecarias y reclamaciones civiles.' ),
	array( 'icon' => 'penal',       'title' => 'Derecho Penal',              'href' => '/derecho-penal/',              'desc' => 'Defensa procesal, juicio rápido, ocupaciones ilegales y delitos económicos. Disponibilidad para urgencias.' ),
);

$team = array(
	array( 'name' => 'Remedios Morillo Hernán',     'role' => 'Titular del despacho',  'img' => 'remedios.jpg' ),
	array( 'name' => 'Rafael Ruíz del Portal',      'role' => 'Abogado asociado',      'img' => 'rafael.jpg' ),
	array( 'name' => 'Ana Mª Fernández Calderón',   'role' => 'Abogada asociada',      'img' => 'ana.jpg' ),
	array( 'name' => 'María Agosto Villalonga',     'role' => 'Procuradora',           'img' => 'maria.jpg' ),
	array( 'name' => 'Daniel Barrios Jurado',       'role' => 'Marketing y desarrollo','img' => 'daniel.jpg' ),
);
?>

<article class="rm-home">

	<!-- ============== HERO Madrid full-bleed con overlay azul ============== -->
	<section class="rm-hero" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');">
		<div class="rm-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-hero__inner">
			<span class="rm-hero__eyebrow">Despacho jurídico · Madrid · Málaga</span>
			<h1 class="rm-hero__title">
				Abogada especialista en la <strong>Ley de Segunda Oportunidad</strong>
			</h1>
			<p class="rm-hero__lead">
				Cancela tus deudas legalmente y recupera el control de tu vida financiera.
				Más de 200 expedientes resueltos. Primera consulta totalmente gratuita y confidencial.
			</p>
			<div class="rm-hero__ctas">
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn-primary btn-lg">
					Consulta gratuita <?php morillo_arrow(); ?>
				</a>
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="btn btn-ghost-light">
					<?php echo esc_html( MORILLO_PHONE ); ?>
				</a>
			</div>
			<div class="rm-hero__trust">
				<span><strong>200+</strong> expedientes resueltos</span>
				<span><strong>92%</strong> sentencias favorables</span>
				<span><strong>2 sedes</strong> Madrid · Málaga</span>
			</div>
		</div>
	</section>

	<!-- ============== SOBRE REMEDIOS ============== -->
	<section class="rm-about">
		<div class="container rm-about__inner">
			<div class="rm-about__photo">
				<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>" alt="Remedios Morillo Hernán, abogada titular" loading="lazy">
				<div class="rm-about__badge">
					<div class="rm-about__badge-num">200+</div>
					<div class="rm-about__badge-lbl">Expedientes resueltos</div>
				</div>
			</div>
			<div class="rm-about__body">
				<span class="rm-eyebrow">Sobre el despacho</span>
				<h2 class="rm-about__title">
					Soy <strong>Remedios Morillo</strong>, y respondo personalmente.
				</h2>
				<p>
					Trato cada expediente como si fuera el único. Mi especialidad es la Ley de la Segunda Oportunidad, pero también dirijo asuntos de derecho bancario, civil, mercantil y penal cuando el cliente necesita un acompañamiento integral.
				</p>
				<p>
					No vendo soluciones milagrosas. Vendo seguimiento humano, transparencia de honorarios desde el primer email, y un análisis honesto de viabilidad antes de aceptar cualquier expediente.
				</p>
			</div>
		</div>
	</section>

	<!-- ============== ÁREAS ============== -->
	<section class="rm-areas">
		<div class="container">
			<header class="rm-areas__head">
				<span class="rm-eyebrow">Áreas de práctica</span>
				<h2 class="rm-section-title">Seis áreas de práctica.<br>Una sola persona que sigue tu caso.</h2>
			</header>
			<div class="rm-areas__grid">
				<?php foreach ( $areas as $a ) : ?>
					<a href="<?php echo esc_url( home_url( $a['href'] ) ); ?>" class="rm-area<?php if ( ! empty( $a['star'] ) ) echo ' rm-area--star'; ?>">
						<div class="rm-area__icon"><?php echo morillo_area_icon( $a['icon'] ); ?></div>
						<h3 class="rm-area__title"><?php echo esc_html( $a['title'] ); ?></h3>
						<p class="rm-area__desc"><?php echo esc_html( $a['desc'] ); ?></p>
						<span class="rm-area__action">Ver área <?php morillo_arrow(); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ============== EQUIPO ============== -->
	<section class="rm-team">
		<div class="container">
			<header class="rm-team__head">
				<span class="rm-eyebrow">El equipo</span>
				<h2 class="rm-section-title">Personas reales al otro lado del expediente.</h2>
			</header>
			<div class="rm-team__grid">
				<?php foreach ( $team as $t ) : ?>
					<article class="rm-team-card">
						<div class="rm-team-card__photo">
							<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/' . $t['img'] ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>" loading="lazy">
						</div>
						<div class="rm-team-card__name"><?php echo esc_html( $t['name'] ); ?></div>
						<div class="rm-team-card__role"><?php echo esc_html( $t['role'] ); ?></div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ============== FORMULARIO + CTA FINAL ============== -->
	<section class="rm-final" id="contacto-home">
		<div class="container rm-final__grid">
			<div class="rm-final__info">
				<span class="rm-eyebrow rm-eyebrow--inverted">Hablemos</span>
				<h2 class="rm-final__title">¿Crees que <strong>tu caso encaja?</strong></h2>
				<p class="rm-final__sub">
					Cuéntanos tu situación. Análisis de viabilidad gratuito y honesto en menos de 24 horas. Confidencial · sin compromiso.
				</p>
				<div class="rm-final__direct">
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="rm-final__direct-row">
						<span class="rm-final__direct-lbl">Llamar ahora</span>
						<span class="rm-final__direct-val"><?php echo esc_html( MORILLO_PHONE ); ?></span>
					</a>
					<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="rm-final__direct-row">
						<span class="rm-final__direct-lbl">Email directo</span>
						<span class="rm-final__direct-val"><?php echo esc_html( MORILLO_EMAIL ); ?></span>
					</a>
				</div>
			</div>
			<div class="rm-final__form">
				<?php morillo_contact_form( array(
					'eyebrow' => __( 'Formulario', 'morillo' ),
					'title'   => __( 'Cuéntanos tu situación', 'morillo' ),
					'lead'    => '',
				) ); ?>
			</div>
		</div>
	</section>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

</article>

<?php get_footer(); ?>
