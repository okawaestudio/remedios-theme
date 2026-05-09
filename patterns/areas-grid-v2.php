<?php
/** ÁREAS DE PRÁCTICA v2 — grid 3x2 de cards editoriales. */
defined( 'ABSPATH' ) || exit;

$areas = array(
	array( 'num' => '01.', 'title' => 'Ley de Segunda Oportunidad', 'href' => '/ley-de-segunda-oportunidad/', 'desc' => 'Cancelación legal de deudas. Acompañamiento integral del concurso consecutivo desde el primer email.', 'tags' => array( 'BEPI', 'Insolvencia', 'Autónomos' ) ),
	array( 'num' => '02.', 'title' => 'Derecho Bancario',           'href' => '/derecho-bancario/',           'desc' => 'Cláusulas suelo, revolving, IRPH, gastos hipoteca y comisiones abusivas.', 'tags' => array( 'Revolving', 'Hipoteca', 'Cláusulas suelo' ) ),
	array( 'num' => '03.', 'title' => 'Derecho Mercantil',          'href' => '/derecho-mercantil/',          'desc' => 'Contratos, concurso de acreedores y asesoramiento societario para autónomos y pymes.', 'tags' => array( 'Contratos', 'Concurso', 'Societario' ) ),
	array( 'num' => '04.', 'title' => 'Gestión de Patrimonio',      'href' => '/gestion-de-patrimonio/',      'desc' => 'Asesoramiento patrimonial integral, planificación sucesoria y fiscal con visión a largo plazo.', 'tags' => array( 'Sucesiones', 'Fiscal', 'Patrimonial' ) ),
	array( 'num' => '05.', 'title' => 'Derecho Civil',              'href' => '/derecho-civil/',              'desc' => 'Herencias, desahucios, arrendamientos, ejecuciones hipotecarias y reclamaciones civiles.', 'tags' => array( 'Herencias', 'Desahucios', 'Ejecuciones' ) ),
	array( 'num' => '06.', 'title' => 'Derecho Penal',              'href' => '/derecho-penal/',              'desc' => 'Defensa procesal, juicio rápido, ocupaciones ilegales y delitos económicos.', 'tags' => array( 'Procesal', 'Ocupaciones', 'Económico' ) ),
);
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">[03 — ÁREAS DE PRÁCTICA]</span>
				<h2 class="v2-section__title">Seis áreas. Una sola persona<br>que sigue tu caso.</h2>
			</div>
			<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">
				[ Ver todas ]
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</header>

		<div class="v2-areas-grid" data-stagger>
			<?php foreach ( $areas as $a ) : ?>
				<a class="v2-card-area" href="<?php echo esc_url( home_url( $a['href'] ) ); ?>">
					<span class="v2-card-area__num"><?php echo esc_html( $a['num'] ); ?></span>
					<h3 class="v2-card-area__title"><?php echo esc_html( $a['title'] ); ?></h3>
					<p class="v2-card-area__desc"><?php echo esc_html( $a['desc'] ); ?></p>
					<div class="v2-card-area__tags">
						<?php foreach ( $a['tags'] as $t ) : ?>
							<span class="v2-card-area__tag">[<?php echo esc_html( $t ); ?>]</span>
						<?php endforeach; ?>
					</div>
					<span class="v2-card-area__cta">
						Ver área <span class="v2-arrow" aria-hidden="true">→</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
