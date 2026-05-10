<?php
/**
 * Template Name: Ocupaciones ilegales Madrid v2 (sub-área Penal)
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-penal.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-penal-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-penal-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Allanamiento de morada (vivienda habitual)', 'd' => 'Ocupación de tu primera residencia. Procedimiento penal exprés, plazo orientativo de recuperación: 1-3 meses. Pena para el ocupante: hasta 2 años de cárcel.', 'tag' => 'Art. 202 CP · vivienda habitual · exprés' ),
	array( 'n' => '02', 't' => 'Usurpación (segunda residencia o local)', 'd' => 'Ocupación de bienes inmuebles que no constituyen morada habitual. Pena: multa de 3-6 meses + recuperación. Plazo: 3-6 meses.', 'tag' => 'Art. 245 CP · 2ª residencia · multa' ),
	array( 'n' => '03', 't' => 'Procedimiento exprés Ley 5/2018', 'd' => 'Vía civil rápida: ocupación sin título habilitante en 1-3 meses. Alternativa o complemento a la vía penal.', 'tag' => 'Civil · 1-3 meses · sin título' ),
	array( 'n' => '04', 't' => 'Defraudación de fluido eléctrico', 'd' => 'Si los ocupantes manipulan o conectan ilegalmente luz/agua/gas. Delito adicional al de usurpación, agrava la calificación.', 'tag' => 'Art. 255 CP · fluido · agravante' ),
	array( 'n' => '05', 't' => 'Daños y deterioros', 'd' => 'Acción civil acumulada para reclamar el coste de reparación de la vivienda tras el desalojo (puertas, electrodomésticos, instalaciones).', 'tag' => 'Civil · reparación · indemnización' ),
	array( 'n' => '06', 't' => 'Coacciones y amenazas', 'd' => 'Si los ocupantes te amenazan o coaccionan al intentar acceder a tu propiedad. Vía penal independiente.', 'tag' => 'Art. 169 CP · amenazas · denuncia' ),
);
$relacionadas = array(
	array( 'n' => '06', 't' => 'Derecho Penal', 'd' => 'Otros delitos contra la propiedad y violencia',         'href' => '/derecho-penal/' ),
	array( 'n' => '05', 't' => 'Desahucios Madrid', 'd' => 'Si entró por contrato y luego no se va',              'href' => '/derecho-civil/desahucios-y-arrendamientos-madrid/' ),
	array( 'n' => '05', 't' => 'Derecho Civil', 'd' => 'Procedimiento exprés Ley 5/2018 vía civil',                'href' => '/derecho-civil/' ),
);
$faqs = array(
	array( 'q' => '¿Cuál es la diferencia entre allanamiento y usurpación?',           'a' => 'Allanamiento (art. 202 CP) si la vivienda ocupada es la habitual del propietario; pena hasta 2 años de cárcel. Usurpación (art. 245 CP) si es segunda residencia, vivienda vacía o local; pena de multa. Como propietario, te interesa que se califique como allanamiento porque la vía penal es más rápida.' ),
	array( 'q' => '¿Cuánto se tarda en recuperar la vivienda?',                        'a' => 'Allanamiento de morada habitual: 1-3 meses (vía penal exprés). Usurpación: 3-6 meses. Procedimiento civil exprés (Ley 5/2018): 1-3 meses, alternativa o complemento. Madrid es uno de los partidos más rápidos al haber especialización en algunos juzgados.' ),
	array( 'q' => '¿Puedo entrar en mi propia vivienda y echarlos?',                   'a' => 'NO. Si entras y los echas por la fuerza, eres tú quien comete delito de allanamiento de morada (paradójicamente). Existe el principio de "inviolabilidad del domicilio" — incluso si lo ocupan ilegalmente, tras pasar varios días viviendo allí, se considera su domicilio. Solo el juez puede ordenar el desalojo.' ),
	array( 'q' => '¿Qué hago si descubro la ocupación recién hecha?',                  'a' => 'Llama inmediatamente a la Policía (091). Si llegan en las primeras 24-48 horas y los ocupantes no han establecido aún "habitualidad", pueden ser desalojados in situ por delito flagrante de allanamiento. Pasado ese plazo, ya hay que ir por vía judicial.' ),
	array( 'q' => '¿Y si tienen niños menores en la vivienda?',                        'a' => 'No paraliza el procedimiento penal, pero sí puede activar protocolos de Servicios Sociales. El juez puede dar un plazo adicional de algunos días para que la familia encuentre alternativa habitacional. La ley protege al menor, no al ocupante.' ),
	array( 'q' => '¿Cuánto cuesta un procedimiento de ocupación?',                     'a' => 'Honorarios cerrados desde 800-1.500 € + IVA según vía elegida y complejidad (¿hay testigos?, ¿hay defraudación de fluido?, ¿hay daños?). Costas: si ganamos, los ocupantes son condenados a pagarlas (recuperables si tienen patrimonio, lo habitual es que no).' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'ocupaciones-madrid',
	'area_label'        => 'Ocupaciones Ilegales en Madrid',
	'area_num'          => '',
	'parent_label'      => 'Derecho Penal',
	'parent_url'        => home_url( '/derecho-penal/' ),
	'eyebrow_override'  => 'SUB-ÁREA · OCUPACIONES ILEGALES · MADRID',

	'hero_title_main'   => 'Te ocuparon la casa.',
	'hero_title_em'     => 'La recuperamos en 1-3 meses.',
	'hero_lead'         => 'Procedimiento penal exprés por allanamiento (vivienda habitual) o usurpación (segunda residencia). Vía civil exprés Ley 5/2018 cuando aplica. Madrid: especialización en juzgados de instrucción.',
	'hero_cta_primary'  => 'Recuperar mi vivienda',
	'microstats'        => array(
		array( 'OCUPACIONES','40+' ),
		array( 'PLAZO',      '1–3m' ),
		array( 'ÉXITO',      '95%' ),
	),

	'whatis_legal_ref'  => 'Defensa al amparo del Código Penal (art. 202 allanamiento, art. 245 usurpación, art. 255 defraudación de fluidos), Ley de Enjuiciamiento Criminal y Ley 5/2018 de procedimiento civil exprés.',
	'whatis_pull'       => 'Cuanto antes actúes, más rápido recuperas la vivienda. Las primeras 48 horas son críticas.',
	'whatis_h2_main'    => 'Recuperar tu vivienda',
	'whatis_h2_em'      => 'es siempre por vía judicial.',
	'whatis_p1'         => 'No puedes echarlos tú directamente — eso te convertiría en autor de allanamiento de morada (paradójicamente). La <strong>única vía legal</strong> es el procedimiento judicial: penal (más rápido si es vivienda habitual) o civil exprés (Ley 5/2018, alternativa cuando no aplica la vía penal).',
	'whatis_p2'         => 'Trabajamos en Madrid (sede física en Calle Valenzuela 8). Coordinamos con la Policía Nacional y el juzgado de instrucción correspondiente para acelerar la diligencia de identificación y la orden de desalojo. <strong>Disponibles 24h en urgencias</strong> si la ocupación está en curso.',

	'author_chip'       => '+40 OCUPACIONES · MADRID',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y atendemos urgencias 24h.',
	'author_p1'         => 'Las ocupaciones son urgencias jurídicas reales: cada día perdido alarga el procedimiento. <strong>Atendemos 24 h</strong> ante una ocupación en curso o reciente. La primera llamada activa el protocolo: identificación de la vía más rápida según tu caso, denuncia inmediata, contacto con Policía Nacional.',
	'author_p2'         => 'Honorarios cerrados desde la primera consulta — sin sorpresas. Sede física en Madrid permite acudir en persona al juzgado y a la diligencia de lanzamiento si es necesario.',

	'serv_eyebrow'      => 'SERVICIOS',
	'serv_h2_main'      => 'Seis líneas',
	'serv_h2_em'        => 'de actuación.',
	'serv_meta'         => 'Cada ocupación es distinta. Te asesoramos sobre la vía más rápida (penal o civil) según los hechos concretos.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Viviendas recuperadas en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'ALLANAMIENTO',  'num' => '24 días', 'who' => 'Vivienda habitual · Madrid centro',   'where' => 'JI nº 4 Madrid · ENE 2025' ),
		array( 'head' => 'USURPACIÓN',    'num' => '3 meses', 'who' => 'Segunda residencia · Sierra Madrid',  'where' => 'JI nº 7 Móstoles · NOV 2024' ),
		array( 'head' => 'CIVIL EXPRÉS',  'num' => '6 semanas','who' => 'Local comercial · Centro Madrid',     'where' => 'JPI nº 23 Madrid · OCT 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Te están',
	'hablemos_h2_em'    => 'ocupando la vivienda?',
	'hablemos_lead'     => 'Si la ocupación es en curso (las próximas 24-48h), llama directamente al despacho — atendemos urgencias. Si es reciente o consolidada, escríbenos y te respondemos en menos de 24h.',

	'form_select_legend'  => 'Estado de la ocupación',
	'form_select_options' => array(
		array( 'en-curso',     'En curso (urgente)' ),
		array( 'reciente',     'Reciente (1-2 semanas)' ),
		array( 'consolidada',  'Consolidada (más de 1 mes)' ),
		array( 'habitual',     'Vivienda habitual' ),
		array( 'segunda',      'Segunda residencia' ),
		array( 'local',        'Local comercial' ),
	),
);
include __DIR__ . '/inc/area-template-render.php';
