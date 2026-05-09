<?php
/** ÁREAS DE PRÁCTICA v2.1 — grid 3×2, primera card destacada navy, sin numeritos. */
defined( 'ABSPATH' ) || exit;

$areas = array(
	array( 'icon' => 'lso',        'title' => 'Ley de Segunda Oportunidad', 'href' => '/ley-de-segunda-oportunidad/', 'desc' => 'Cancelación legal de deudas para particulares y autónomos. Acompañamiento integral del concurso consecutivo desde el primer email.', 'star' => true ),
	array( 'icon' => 'bancario',   'title' => 'Derecho Bancario',           'href' => '/derecho-bancario/',           'desc' => 'Cláusulas suelo, revolving, IRPH, gastos hipoteca y comisiones abusivas. Sentencias firmes contra los principales bancos.' ),
	array( 'icon' => 'mercantil',  'title' => 'Derecho Mercantil',          'href' => '/derecho-mercantil/',          'desc' => 'Contratos mercantiles, concurso de acreedores y asesoramiento societario continuado para autónomos y pymes.' ),
	array( 'icon' => 'patrimonio', 'title' => 'Gestión de Patrimonio',      'href' => '/gestion-de-patrimonio/',      'desc' => 'Asesoramiento patrimonial integral, planificación sucesoria y fiscal con visión a largo plazo.' ),
	array( 'icon' => 'civil',      'title' => 'Derecho Civil',              'href' => '/derecho-civil/',              'desc' => 'Herencias, desahucios, arrendamientos, ejecuciones hipotecarias y reclamaciones civiles.' ),
	array( 'icon' => 'penal',      'title' => 'Derecho Penal',              'href' => '/derecho-penal/',              'desc' => 'Defensa procesal, juicio rápido, ocupaciones ilegales y delitos económicos. Disponibilidad para urgencias.' ),
);
?>
<section class="v2-section">
	<div class="v2-container">
		<header class="v2-section__head">
			<div>
				<span class="v2-eyebrow">ÁREAS DE PRÁCTICA</span>
				<h2 class="v2-section__title">Seis áreas. Una sola persona<br>que sigue tu caso.</h2>
			</div>
			<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">
				[ Ver casos resueltos ]
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</header>

		<div class="v2-areas-grid" data-stagger>
			<?php foreach ( $areas as $a ) :
				$class = 'v2-card-area';
				if ( ! empty( $a['star'] ) ) $class .= ' v2-card-area--feature';
			?>
				<a class="<?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( home_url( $a['href'] ) ); ?>">
					<span class="v2-card-area__icon" aria-hidden="true">
						<?php echo morillo_area_icon( $a['icon'] ); ?>
					</span>
					<h3 class="v2-card-area__title"><?php echo esc_html( $a['title'] ); ?></h3>
					<p class="v2-card-area__desc"><?php echo esc_html( $a['desc'] ); ?></p>
					<span class="v2-card-area__cta">
						Ver área <span class="v2-arrow" aria-hidden="true">→</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
