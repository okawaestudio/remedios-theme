<?php
/** EQUIPO v2 — grid 5 cards de equipo. */
defined( 'ABSPATH' ) || exit;
$theme_uri = get_template_directory_uri();
$team = array(
	array( 'name' => 'Remedios Morillo Hernán',     'role' => 'Titular del despacho',  'img' => 'remedios.jpg', 'creds' => 'ICAM · LSO · BANCARIO · MERCANTIL' ),
	array( 'name' => 'Rafael Ruíz del Portal',      'role' => 'Abogado asociado',      'img' => 'rafael.jpg',   'creds' => 'ICAM 91.402 · BANCARIO · CIVIL' ),
	array( 'name' => 'Ana Mª Fernández Calderón',   'role' => 'Abogada asociada',      'img' => 'ana.jpg',      'creds' => 'ICAMÁLAGA 13.117 · MERCANTIL · PENAL' ),
	array( 'name' => 'María Agosto Villalonga',     'role' => 'Procuradora',           'img' => 'maria.jpg',    'creds' => 'ICPM 4.221 · MADRID' ),
	array( 'name' => 'Daniel Barrios Jurado',       'role' => 'Marketing y desarrollo','img' => 'daniel.jpg',   'creds' => 'OKAWA STUDIO · COMUNICACIÓN' ),
);
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">EL EQUIPO</span>
				<h2 class="v2-section__title">Personas reales al otro lado<br>del expediente.</h2>
			</div>
		</header>
		<div class="v2-team-grid" data-stagger>
			<?php foreach ( $team as $p ) : ?>
				<article class="v2-team-card">
					<div class="v2-team-card__photo">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/' . $p['img'] ); ?>"
						     alt="<?php echo esc_attr( $p['name'] ); ?>"
						     loading="lazy"
						     width="400" height="400">
					</div>
					<h3 class="v2-team-card__name"><?php echo esc_html( $p['name'] ); ?></h3>
					<p class="v2-team-card__role"><?php echo esc_html( $p['role'] ); ?></p>
					<p class="v2-team-card__creds"><?php echo esc_html( $p['creds'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
