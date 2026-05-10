<?php
/**
 * SPAIN COVERAGE v2 — grid de 52 (+5 ciudades alias) provincias.
 *
 * Internal linking masivo a las páginas /abogado-segunda-oportunidad-{X}/.
 * Ayuda a indexar las 52 URLs locales y distribuye PageRank desde la home.
 */
defined( 'ABSPATH' ) || exit;

// Display name → slug oficial. Algunas entries comparten slug (alias por
// ciudad común) — captura SEO de queries distintas.
$cities = array(
	array( 'Álava',         'alava' ),
	array( 'Albacete',      'albacete' ),
	array( 'Alicante',      'alicante' ),
	array( 'Almería',       'almeria' ),
	array( 'Asturias',      'asturias' ),
	array( 'Ávila',         'avila' ),
	array( 'Badajoz',       'badajoz' ),
	array( 'Barcelona',     'barcelona' ),
	array( 'Bilbao',        'bizkaia' ),
	array( 'Burgos',        'burgos' ),
	array( 'Cáceres',       'caceres' ),
	array( 'Cádiz',         'cadiz' ),
	array( 'Canarias',      'las-palmas' ),
	array( 'Cantabria',     'cantabria' ),
	array( 'Castellón',     'castellon' ),
	array( 'Ceuta',         'ceuta' ),
	array( 'Ciudad Real',   'ciudad-real' ),
	array( 'Córdoba',       'cordoba' ),
	array( 'Cuenca',        'cuenca' ),
	array( 'Gijón',         'asturias' ),
	array( 'Girona',        'girona' ),
	array( 'Granada',       'granada' ),
	array( 'Guadalajara',   'guadalajara' ),
	array( 'Huelva',        'huelva' ),
	array( 'Huesca',        'huesca' ),
	array( 'Jaén',          'jaen' ),
	array( 'La Coruña',     'a-coruna' ),
	array( 'León',          'leon' ),
	array( 'Lleida',        'lleida' ),
	array( 'Logroño',       'la-rioja' ),
	array( 'Lugo',          'lugo' ),
	array( 'Madrid',        'madrid' ),
	array( 'Málaga',        'malaga' ),
	array( 'Mallorca',      'illes-balears' ),
	array( 'Melilla',       'melilla' ),
	array( 'Murcia',        'murcia' ),
	array( 'Ourense',       'ourense' ),
	array( 'Oviedo',        'asturias' ),
	array( 'Palencia',      'palencia' ),
	array( 'Pamplona',      'navarra' ),
	array( 'Pontevedra',    'pontevedra' ),
	array( 'Sabadell',      'barcelona' ),
	array( 'Salamanca',     'salamanca' ),
	array( 'Santander',     'cantabria' ),
	array( 'San Sebastián', 'gipuzkoa' ),
	array( 'Segovia',       'segovia' ),
	array( 'Sevilla',       'sevilla' ),
	array( 'Soria',         'soria' ),
	array( 'Tarragona',     'tarragona' ),
	array( 'Tenerife',      'santa-cruz-de-tenerife' ),
	array( 'Teruel',        'teruel' ),
	array( 'Toledo',        'toledo' ),
	array( 'Valencia',      'valencia' ),
	array( 'Valladolid',    'valladolid' ),
	array( 'Vigo',          'pontevedra' ),
	array( 'Vitoria',       'alava' ),
	array( 'Zamora',        'zamora' ),
	array( 'Zaragoza',      'zaragoza' ),
);
?>
<section class="v2-section v2-section--mist v2-spain-coverage">
	<div class="v2-container">
		<header class="v2-spain-coverage__head">
			<h2 class="v2-spain-coverage__title">
				Trabajamos la Ley de Segunda Oportunidad en toda España
			</h2>
			<p class="v2-spain-coverage__sub">
				Somos el <em>despacho líder en Ley de Segunda Oportunidad en Málaga</em>
				y Andalucía, así como uno de los referentes a nivel nacional.
			</p>
		</header>

		<ul class="v2-spain-coverage__grid">
			<?php foreach ( $cities as $c ) :
				list( $name, $slug ) = $c;
				$url = home_url( '/ley-segunda-oportunidad-' . $slug . '/' );
			?>
				<li class="v2-spain-coverage__item">
					<a href="<?php echo esc_url( $url ); ?>" class="v2-spain-coverage__link">
						<svg class="v2-spain-coverage__pin" width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
							<path d="M8 1.5C5.24 1.5 3 3.74 3 6.5c0 4 5 8 5 8s5-4 5-8c0-2.76-2.24-5-5-5z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
							<circle cx="8" cy="6.5" r="1.6" stroke="currentColor" stroke-width="1.4"/>
						</svg>
						<span><?php echo esc_html( $name ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
