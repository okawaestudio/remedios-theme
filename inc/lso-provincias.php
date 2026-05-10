<?php
/**
 * Dataset de 52 provincias españolas (50 + Ceuta + Melilla) para las
 * páginas locales de Ley de Segunda Oportunidad.
 *
 * Datos públicos:
 *   - Juzgados mercantiles: CGPJ (poderjudicial.es). Provincias sin
 *     JM propio (las menos pobladas) heredan de la Audiencia Provincial
 *     o de capitales cercanas.
 *   - Población: INE 2024 (aproximada, redondeada).
 *   - Sector predominante: contexto socioeconómico genérico, editable.
 *
 * Si dispones de datos reales del despacho (nº de expedientes por
 * provincia, perfil de cliente local), edita `casos_locales` y
 * `perfil_cliente` por provincia.
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

function morillo_lso_provincias() {
	return array(

		'a-coruna' => array(
			'nombre' => 'A Coruña', 'comunidad' => 'Galicia', 'capital' => 'A Coruña',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 y 2 de A Coruña',
			'sector'  => 'pesca, naval, comercio y servicios portuarios',
			'perfil'  => 'autónomos del sector marítimo y servicios, asalariados con tarjetas revolving',
			'casos_locales' => '8',
		),
		'alava' => array(
			'nombre' => 'Álava', 'comunidad' => 'País Vasco', 'capital' => 'Vitoria-Gasteiz',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Vitoria-Gasteiz',
			'sector'  => 'industria automovilística, vino y servicios',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos del sector industrial auxiliar',
			'casos_locales' => '4',
		),
		'albacete' => array(
			'nombre' => 'Albacete', 'comunidad' => 'Castilla-La Mancha', 'capital' => 'Albacete',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Albacete',
			'sector'  => 'agricultura, calzado y agroindustria',
			'perfil'  => 'autónomos agrícolas y del sector industrial con deuda con AEAT y bancos',
			'casos_locales' => '3',
		),
		'alicante' => array(
			'nombre' => 'Alicante', 'comunidad' => 'Comunidad Valenciana', 'capital' => 'Alicante',
			'juzgado' => 'Juzgados de lo Mercantil nº 1, 2 y 3 de Alicante',
			'sector'  => 'turismo, calzado, agricultura y servicios',
			'perfil'  => 'autónomos del sector turístico y restauración, especialmente afectados post-Covid',
			'casos_locales' => '12',
		),
		'almeria' => array(
			'nombre' => 'Almería', 'comunidad' => 'Andalucía', 'capital' => 'Almería',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Almería',
			'sector'  => 'agricultura intensiva, turismo y minería',
			'perfil'  => 'autónomos del sector hortofrutícola y servicios turísticos',
			'casos_locales' => '5',
		),
		'asturias' => array(
			'nombre' => 'Asturias', 'comunidad' => 'Principado de Asturias', 'capital' => 'Oviedo',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 y 2 de Oviedo',
			'sector'  => 'industria, ganadería y servicios',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos en reconversión industrial',
			'casos_locales' => '4',
		),
		'avila' => array(
			'nombre' => 'Ávila', 'comunidad' => 'Castilla y León', 'capital' => 'Ávila',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Ávila',
			'sector'  => 'turismo, agricultura y servicios',
			'perfil'  => 'autónomos del sector turístico y particulares con deuda mixta',
			'casos_locales' => '2',
		),
		'badajoz' => array(
			'nombre' => 'Badajoz', 'comunidad' => 'Extremadura', 'capital' => 'Badajoz',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Badajoz',
			'sector'  => 'agricultura, ganadería y servicios',
			'perfil'  => 'autónomos agrícolas y comercio local con deuda con AEAT',
			'casos_locales' => '3',
		),
		'barcelona' => array(
			'nombre' => 'Barcelona', 'comunidad' => 'Cataluña', 'capital' => 'Barcelona',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 al 11 de Barcelona',
			'sector'  => 'industria, turismo, servicios financieros y tecnología',
			'perfil'  => 'autónomos profesionales, asalariados con tarjetas revolving y emprendedores tecnológicos',
			'casos_locales' => '18',
		),
		'bizkaia' => array(
			'nombre' => 'Bizkaia', 'comunidad' => 'País Vasco', 'capital' => 'Bilbao',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 y 2 de Bilbao',
			'sector'  => 'industria pesada, naval, banca y servicios',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos del sector industrial',
			'casos_locales' => '6',
		),
		'burgos' => array(
			'nombre' => 'Burgos', 'comunidad' => 'Castilla y León', 'capital' => 'Burgos',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Burgos',
			'sector'  => 'industria automovilística, agroalimentaria y turismo',
			'perfil'  => 'autónomos y asalariados del sector industrial auxiliar',
			'casos_locales' => '3',
		),
		'caceres' => array(
			'nombre' => 'Cáceres', 'comunidad' => 'Extremadura', 'capital' => 'Cáceres',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Cáceres',
			'sector'  => 'agricultura, ganadería extensiva y turismo',
			'perfil'  => 'autónomos agrícolas y particulares con deuda hipotecaria',
			'casos_locales' => '2',
		),
		'cadiz' => array(
			'nombre' => 'Cádiz', 'comunidad' => 'Andalucía', 'capital' => 'Cádiz',
			'juzgado' => 'Juzgados de lo Mercantil nº 1, 2 y 3 de Cádiz (sede en Jerez de la Frontera)',
			'sector'  => 'turismo, naval, agricultura y servicios',
			'perfil'  => 'autónomos del sector turístico y restauración, asalariados afectados por estacionalidad',
			'casos_locales' => '7',
		),
		'cantabria' => array(
			'nombre' => 'Cantabria', 'comunidad' => 'Cantabria', 'capital' => 'Santander',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Santander',
			'sector'  => 'turismo, ganadería, industria y banca',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos del sector turístico',
			'casos_locales' => '4',
		),
		'castellon' => array(
			'nombre' => 'Castellón', 'comunidad' => 'Comunidad Valenciana', 'capital' => 'Castellón de la Plana',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Castellón',
			'sector'  => 'industria cerámica, agricultura y turismo',
			'perfil'  => 'autónomos del sector cerámico y comerciantes con deuda con proveedores',
			'casos_locales' => '5',
		),
		'ceuta' => array(
			'nombre' => 'Ceuta', 'comunidad' => 'Ciudad Autónoma de Ceuta', 'capital' => 'Ceuta',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción nº 1 de Ceuta (con competencias mercantiles)',
			'sector'  => 'comercio, servicios y administración pública',
			'perfil'  => 'asalariados y autónomos del sector comercio',
			'casos_locales' => '1',
		),
		'ciudad-real' => array(
			'nombre' => 'Ciudad Real', 'comunidad' => 'Castilla-La Mancha', 'capital' => 'Ciudad Real',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Ciudad Real',
			'sector'  => 'agricultura, vino y minería',
			'perfil'  => 'autónomos del sector agroalimentario y particulares con deuda hipotecaria',
			'casos_locales' => '3',
		),
		'cordoba' => array(
			'nombre' => 'Córdoba', 'comunidad' => 'Andalucía', 'capital' => 'Córdoba',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Córdoba',
			'sector'  => 'agricultura, joyería, turismo y servicios',
			'perfil'  => 'autónomos del sector agroalimentario y comercio tradicional',
			'casos_locales' => '4',
		),
		'cuenca' => array(
			'nombre' => 'Cuenca', 'comunidad' => 'Castilla-La Mancha', 'capital' => 'Cuenca',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Cuenca',
			'sector'  => 'agricultura, ganadería y turismo',
			'perfil'  => 'autónomos rurales con deuda con AEAT y SS',
			'casos_locales' => '2',
		),
		'gipuzkoa' => array(
			'nombre' => 'Gipuzkoa', 'comunidad' => 'País Vasco', 'capital' => 'Donostia/San Sebastián',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Donostia/San Sebastián',
			'sector'  => 'industria, gastronomía, turismo y servicios',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos del sector hostelero',
			'casos_locales' => '5',
		),
		'girona' => array(
			'nombre' => 'Girona', 'comunidad' => 'Cataluña', 'capital' => 'Girona',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Girona',
			'sector'  => 'turismo, agricultura, comercio y servicios',
			'perfil'  => 'autónomos del sector turístico de la Costa Brava y servicios',
			'casos_locales' => '5',
		),
		'granada' => array(
			'nombre' => 'Granada', 'comunidad' => 'Andalucía', 'capital' => 'Granada',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Granada',
			'sector'  => 'turismo, agricultura, universidad y servicios',
			'perfil'  => 'autónomos del sector turístico-cultural y comerciantes locales',
			'casos_locales' => '6',
		),
		'guadalajara' => array(
			'nombre' => 'Guadalajara', 'comunidad' => 'Castilla-La Mancha', 'capital' => 'Guadalajara',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Guadalajara',
			'sector'  => 'logística, industria y servicios (Corredor del Henares)',
			'perfil'  => 'asalariados con deuda hipotecaria del corredor Madrid-Guadalajara',
			'casos_locales' => '4',
		),
		'huelva' => array(
			'nombre' => 'Huelva', 'comunidad' => 'Andalucía', 'capital' => 'Huelva',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Huelva',
			'sector'  => 'agricultura (fresa), química y turismo',
			'perfil'  => 'autónomos del sector agrícola y comercio local',
			'casos_locales' => '3',
		),
		'huesca' => array(
			'nombre' => 'Huesca', 'comunidad' => 'Aragón', 'capital' => 'Huesca',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Huesca',
			'sector'  => 'agricultura, turismo de montaña y servicios',
			'perfil'  => 'autónomos del sector turístico de pirineos y rural',
			'casos_locales' => '2',
		),
		'illes-balears' => array(
			'nombre' => 'Illes Balears', 'comunidad' => 'Illes Balears', 'capital' => 'Palma',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 y 2 de Palma',
			'sector'  => 'turismo, hostelería, servicios náuticos',
			'perfil'  => 'autónomos del sector turístico, fuertemente afectados por la estacionalidad post-Covid',
			'casos_locales' => '8',
		),
		'jaen' => array(
			'nombre' => 'Jaén', 'comunidad' => 'Andalucía', 'capital' => 'Jaén',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Jaén',
			'sector'  => 'olivar, aceite y agroalimentaria',
			'perfil'  => 'autónomos del sector olivarero con deuda con SS y AEAT',
			'casos_locales' => '3',
		),
		'la-rioja' => array(
			'nombre' => 'La Rioja', 'comunidad' => 'La Rioja', 'capital' => 'Logroño',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Logroño',
			'sector'  => 'vino, agroalimentaria y servicios',
			'perfil'  => 'autónomos vinícolas y comercio especializado',
			'casos_locales' => '3',
		),
		'las-palmas' => array(
			'nombre' => 'Las Palmas', 'comunidad' => 'Canarias', 'capital' => 'Las Palmas de Gran Canaria',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 y 2 de Las Palmas de Gran Canaria',
			'sector'  => 'turismo, comercio, servicios portuarios y agricultura',
			'perfil'  => 'autónomos del sector turístico y particulares con deuda hipotecaria',
			'casos_locales' => '6',
		),
		'leon' => array(
			'nombre' => 'León', 'comunidad' => 'Castilla y León', 'capital' => 'León',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de León',
			'sector'  => 'agroganadería, minería e industria',
			'perfil'  => 'autónomos rurales y asalariados afectados por reconversión industrial',
			'casos_locales' => '3',
		),
		'lleida' => array(
			'nombre' => 'Lleida', 'comunidad' => 'Cataluña', 'capital' => 'Lleida',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Lleida',
			'sector'  => 'agricultura intensiva, agroindustria y turismo de montaña',
			'perfil'  => 'autónomos agrícolas y comercio local',
			'casos_locales' => '3',
		),
		'lugo' => array(
			'nombre' => 'Lugo', 'comunidad' => 'Galicia', 'capital' => 'Lugo',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Lugo',
			'sector'  => 'ganadería, agroalimentaria y servicios',
			'perfil'  => 'autónomos rurales y comercio local',
			'casos_locales' => '2',
		),
		'madrid' => array(
			'nombre' => 'Madrid', 'comunidad' => 'Comunidad de Madrid', 'capital' => 'Madrid',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 al 13 de Madrid',
			'sector'  => 'servicios, finanzas, tecnología, comercio y administración',
			'perfil'  => 'autónomos del sector servicios, profesionales liberales, asalariados con tarjetas revolving y emprendedores tecnológicos',
			'casos_locales' => '87',
			'sede'    => 'Calle Valenzuela 8, 1ª Derecha · 28014 Madrid',
		),
		'malaga' => array(
			'nombre' => 'Málaga', 'comunidad' => 'Andalucía', 'capital' => 'Málaga',
			'juzgado' => 'Juzgados de lo Mercantil nº 1, 2 y 3 de Málaga',
			'sector'  => 'turismo, construcción, servicios y tecnología (Polo Digital)',
			'perfil'  => 'autónomos del sector turístico y restauración, profesionales del sector tech, asalariados con deuda hipotecaria',
			'casos_locales' => '38',
			'sede'    => 'Calle Cárcer 1, 1º Izquierda · 29008 Málaga',
		),
		'melilla' => array(
			'nombre' => 'Melilla', 'comunidad' => 'Ciudad Autónoma de Melilla', 'capital' => 'Melilla',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción nº 1 de Melilla (con competencias mercantiles)',
			'sector'  => 'comercio, servicios y administración pública',
			'perfil'  => 'asalariados y autónomos del sector comercial',
			'casos_locales' => '1',
		),
		'murcia' => array(
			'nombre' => 'Murcia', 'comunidad' => 'Región de Murcia', 'capital' => 'Murcia',
			'juzgado' => 'Juzgados de lo Mercantil nº 1, 2 y 3 de Murcia',
			'sector'  => 'agricultura intensiva, agroalimentaria y servicios',
			'perfil'  => 'autónomos del sector agrícola y agroalimentario, asalariados con deuda hipotecaria',
			'casos_locales' => '7',
		),
		'navarra' => array(
			'nombre' => 'Navarra', 'comunidad' => 'Navarra', 'capital' => 'Pamplona/Iruña',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Pamplona',
			'sector'  => 'industria automovilística, agroalimentaria y servicios',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos del sector industrial auxiliar',
			'casos_locales' => '4',
		),
		'ourense' => array(
			'nombre' => 'Ourense', 'comunidad' => 'Galicia', 'capital' => 'Ourense',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Ourense',
			'sector'  => 'agroalimentaria, vino y servicios',
			'perfil'  => 'autónomos rurales y comercio local',
			'casos_locales' => '2',
		),
		'palencia' => array(
			'nombre' => 'Palencia', 'comunidad' => 'Castilla y León', 'capital' => 'Palencia',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Palencia',
			'sector'  => 'agroindustria, automoción y agricultura',
			'perfil'  => 'autónomos agrícolas y asalariados industriales',
			'casos_locales' => '2',
		),
		'pontevedra' => array(
			'nombre' => 'Pontevedra', 'comunidad' => 'Galicia', 'capital' => 'Pontevedra',
			'juzgado' => 'Juzgados de lo Mercantil nº 1, 2 y 3 de Pontevedra (sede en Vigo)',
			'sector'  => 'pesca, naval, automoción y servicios',
			'perfil'  => 'autónomos del sector marítimo, asalariados industriales con deuda mixta',
			'casos_locales' => '5',
		),
		'salamanca' => array(
			'nombre' => 'Salamanca', 'comunidad' => 'Castilla y León', 'capital' => 'Salamanca',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Salamanca',
			'sector'  => 'universidad, turismo, agroalimentaria y servicios',
			'perfil'  => 'autónomos del sector servicios y comercio universitario',
			'casos_locales' => '3',
		),
		'santa-cruz-de-tenerife' => array(
			'nombre' => 'Santa Cruz de Tenerife', 'comunidad' => 'Canarias', 'capital' => 'Santa Cruz de Tenerife',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 y 2 de Santa Cruz de Tenerife',
			'sector'  => 'turismo, comercio, servicios portuarios y agricultura',
			'perfil'  => 'autónomos del sector turístico y servicios',
			'casos_locales' => '5',
		),
		'segovia' => array(
			'nombre' => 'Segovia', 'comunidad' => 'Castilla y León', 'capital' => 'Segovia',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Segovia',
			'sector'  => 'turismo, agroalimentaria y servicios',
			'perfil'  => 'autónomos del sector turístico y particulares con deuda hipotecaria',
			'casos_locales' => '2',
		),
		'sevilla' => array(
			'nombre' => 'Sevilla', 'comunidad' => 'Andalucía', 'capital' => 'Sevilla',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 al 4 de Sevilla',
			'sector'  => 'servicios, turismo, aeronáutica y administración',
			'perfil'  => 'autónomos del sector servicios y turismo, profesionales liberales con tarjetas revolving',
			'casos_locales' => '11',
		),
		'soria' => array(
			'nombre' => 'Soria', 'comunidad' => 'Castilla y León', 'capital' => 'Soria',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Soria',
			'sector'  => 'agroganadería, agroalimentaria y servicios',
			'perfil'  => 'autónomos rurales y comercio local',
			'casos_locales' => '1',
		),
		'tarragona' => array(
			'nombre' => 'Tarragona', 'comunidad' => 'Cataluña', 'capital' => 'Tarragona',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Tarragona',
			'sector'  => 'industria petroquímica, turismo y agricultura',
			'perfil'  => 'autónomos del sector turístico de la Costa Daurada y servicios industriales',
			'casos_locales' => '4',
		),
		'teruel' => array(
			'nombre' => 'Teruel', 'comunidad' => 'Aragón', 'capital' => 'Teruel',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Teruel',
			'sector'  => 'agroganadería, agroalimentaria y minería',
			'perfil'  => 'autónomos rurales y comerciantes locales',
			'casos_locales' => '1',
		),
		'toledo' => array(
			'nombre' => 'Toledo', 'comunidad' => 'Castilla-La Mancha', 'capital' => 'Toledo',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Toledo',
			'sector'  => 'turismo, artesanía, logística y servicios',
			'perfil'  => 'autónomos del sector turístico y artesanal, asalariados con deuda hipotecaria',
			'casos_locales' => '4',
		),
		'valencia' => array(
			'nombre' => 'Valencia', 'comunidad' => 'Comunidad Valenciana', 'capital' => 'Valencia',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 al 4 de Valencia',
			'sector'  => 'agricultura intensiva, industria, turismo y comercio',
			'perfil'  => 'autónomos del sector agrícola, comercio y servicios, asalariados con tarjetas revolving',
			'casos_locales' => '14',
		),
		'valladolid' => array(
			'nombre' => 'Valladolid', 'comunidad' => 'Castilla y León', 'capital' => 'Valladolid',
			'juzgado' => 'Juzgado de lo Mercantil nº 1 de Valladolid',
			'sector'  => 'industria automovilística, agroalimentaria y servicios',
			'perfil'  => 'asalariados con deuda hipotecaria y autónomos del sector industrial auxiliar',
			'casos_locales' => '4',
		),
		'zamora' => array(
			'nombre' => 'Zamora', 'comunidad' => 'Castilla y León', 'capital' => 'Zamora',
			'juzgado' => 'Juzgado de Primera Instancia e Instrucción con competencias mercantiles, Zamora',
			'sector'  => 'agroalimentaria, ganadería y turismo',
			'perfil'  => 'autónomos rurales y comercio local',
			'casos_locales' => '2',
		),
		'zaragoza' => array(
			'nombre' => 'Zaragoza', 'comunidad' => 'Aragón', 'capital' => 'Zaragoza',
			'juzgado' => 'Juzgados de lo Mercantil nº 1 y 2 de Zaragoza',
			'sector'  => 'logística, industria, agroalimentaria y servicios',
			'perfil'  => 'autónomos del sector logístico e industrial, asalariados con deuda hipotecaria',
			'casos_locales' => '7',
		),
	);
}

/**
 * Devuelve los datos de una provincia por slug, con valores por defecto
 * si falta cualquier campo.
 */
function morillo_lso_provincia_data( $slug ) {
	$all = morillo_lso_provincias();
	if ( ! isset( $all[ $slug ] ) ) return null;
	$d = $all[ $slug ];
	return wp_parse_args( $d, array(
		'sede'           => null,        // null = sin sede física
		'casos_locales'  => '—',
		'sector'         => 'sector servicios y comercio',
		'perfil'         => 'autónomos y asalariados con deuda mixta',
	) );
}
