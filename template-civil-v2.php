<?php
/**
 * Template Name: Civil v2 — Derecho Civil
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-civil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-civil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-civil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Herencias y testamentaría', 'd' => 'Aceptación, partición, declaración de herederos, mediación entre coherederos en conflicto, reclamación de legítima.', 'tag' => 'Aceptación · partición · legítima' ),
	array( 'n' => '02', 't' => 'Desahucios y arrendamientos', 'd' => 'Defensa del propietario y del inquilino. Desahucios por impago, falta de actualización, expiración del contrato. LAU.', 'tag' => 'Propietario · inquilino · LAU' ),
	array( 'n' => '03', 't' => 'Ejecuciones hipotecarias', 'd' => 'Defensa frente al banco en procedimiento ejecutivo: cláusulas abusivas, dación en pago, paralización por concurso.', 'tag' => 'Defensa · cláusulas · dación' ),
	array( 'n' => '04', 't' => 'Reclamaciones de cantidad', 'd' => 'Impagos comerciales, deudas particulares, monitorios, juicios verbales y ordinarios. Recuperación efectiva del crédito.', 'tag' => 'Monitorio · verbal · ordinario' ),
	array( 'n' => '05', 't' => 'Daños y perjuicios', 'd' => 'Responsabilidad civil contractual y extracontractual. Reclamación de daños materiales, morales, lucro cesante.', 'tag' => 'Material · moral · lucro' ),
	array( 'n' => '06', 't' => 'Indemnizaciones aseguradoras', 'd' => 'Seguros que se niegan a indemnizar, peritajes contradictorios, accidentes de tráfico con discapacidad, baremos.', 'tag' => 'Seguros · baremo · accidente' ),
);
$relacionadas = array(
	array( 'n' => '04', 't' => 'Gestión de Patrimonio', 'd' => 'Planificación sucesoria previa para evitar conflictos entre herederos', 'href' => '/gestion-de-patrimonio/' ),
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Cláusulas abusivas en hipotecas y reclamación de gastos', 'href' => '/derecho-bancario/' ),
	array( 'n' => '06', 't' => 'Derecho Penal', 'd' => 'Acciones civiles derivadas de delitos: estafa, apropiación, daños', 'href' => '/derecho-penal/' ),
);
$faqs = array(
	array( 'q' => '¿Tengo que aceptar la herencia si me dejan deudas?',                  'a' => 'No. Tienes tres opciones: aceptar pura y simplemente (asumes activo y pasivo), aceptar a beneficio de inventario (solo respondes con los bienes heredados, no con tu patrimonio personal) o renunciar a la herencia. Si hay dudas sobre el pasivo, la opción más segura es aceptar a beneficio de inventario.' ),
	array( 'q' => '¿Cuánto tarda un desahucio por impago?',                              'a' => 'Procedimiento monitorio de desahucio: 4-8 meses si no hay oposición; 9-15 meses con oposición y juicio verbal. Si el inquilino paga la renta atrasada antes de la vista (enervación), el desahucio se sobresee la primera vez; tras la segunda enervación ya no procede.' ),
	array( 'q' => '¿Pueden embargarme la vivienda habitual por una deuda?',              'a' => 'Sí, salvo que sea inembargable por estar ya embargada por otro acreedor preferente, o si la deuda no supera los mínimos del art. 606 LEC (mobiliario básico, ropa, herramientas profesionales). En la práctica, hipoteca y deudas grandes pueden conducir a la subasta judicial del inmueble.' ),
	array( 'q' => '¿Qué es la legítima en una herencia?',                                'a' => 'Es la porción de la herencia de la que el causante NO puede disponer libremente: corresponde por ley a los herederos forzosos (descendientes, ascendientes, cónyuge). En el Código Civil estatal, la legítima es de 2/3 del haber hereditario para los hijos.' ),
	array( 'q' => '¿Cuánto puedo reclamar por un accidente de tráfico?',                 'a' => 'Depende del baremo de la Ley 35/2015: lesiones temporales (días de baja, perjuicio personal), lesiones permanentes (puntos de secuela), gastos de asistencia, lucro cesante, daños morales a familiares. La cuantía media en lesiones moderadas: 6.000-25.000 €. En graves: hasta cifras de 6 dígitos.' ),
	array( 'q' => '¿Cuánto tarda en prescribir una deuda civil?',                        'a' => 'Plazo general: 5 años desde que se pudo exigir el pago (art. 1964 CC reformado en 2015). Plazo anterior: 15 años. Cualquier reclamación extrajudicial fehaciente (burofax) interrumpe la prescripción y reinicia el cómputo.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'civil',
	'area_label'        => 'Derecho Civil',
	'area_num'          => '05 / 06',

	'hero_title_main'   => 'Tu defensa',
	'hero_title_em'     => 'en el día a día.',
	'hero_title_tail'   => '',
	'hero_lead'         => 'Herencias, desahucios, ejecuciones hipotecarias, reclamaciones de cantidad e indemnizaciones aseguradoras. Lo cotidiano, llevado con criterio.',
	'hero_cta_primary'  => 'Consulta gratuita',
	'microstats'        => array(
		array( 'HERENCIAS',   '180+' ),
		array( 'DESAHUCIOS',  '95+' ),
		array( 'INDEMNIZ.',   '210+' ),
	),

	'whatis_legal_ref'  => 'Asesoramiento al amparo del Código Civil, Ley de Enjuiciamiento Civil (Ley 1/2000), Ley de Arrendamientos Urbanos (Ley 29/1994), Ley del Contrato de Seguro y Ley 35/2015 de baremo de tráfico.',
	'whatis_pull'       => 'Las cosas civiles son las que más afectan al día a día. Y las que mejor se resuelven con un buen abogado.',
	'whatis_h2_main'    => 'El área que toca',
	'whatis_h2_em'      => 'a casi todo el mundo.',
	'whatis_p1'         => 'Tarde o temprano, casi cualquier persona necesita un abogado civilista: una herencia con conflictos, un inquilino que no paga, un banco que ejecuta la hipoteca, un seguro que se niega a indemnizar tras un accidente.',
	'whatis_p2'         => 'Trabajamos en <strong>todos los partidos judiciales de España</strong> (la mayoría telemáticamente, con desplazamiento a vista cuando es necesario). Conocemos los plazos, los criterios habituales y las estrategias que funcionan en cada tipo de procedimiento.',

	'author_chip'       => '+450 PROCEDIMIENTOS CIVILES',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y los juzgados los conozco bien.',
	'author_p1'         => 'El derecho civil es donde más volumen tenemos: 450+ procedimientos cerrados desde 2014, en juzgados de Madrid, Málaga y otras 18 provincias. Conozco los detalles que diferencian un caso ganable de un caso difícil.',
	'author_p2'         => 'Trabajamos con <strong>honorarios cerrados</strong> en la mayoría de procedimientos civiles. En reclamaciones aseguradoras y daños y perjuicios podemos pactar a éxito según el caso. Te entrego presupuesto por escrito antes de aceptar.',

	'serv_eyebrow'      => 'SERVICIOS PRINCIPALES',
	'serv_h2_main'      => 'Seis frentes',
	'serv_h2_em'        => 'jurídico-civiles.',
	'serv_meta'         => 'Cada procedimiento se evalúa individualmente. Te decimos qué encaja, con qué probabilidad de éxito y qué coste.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Sentencias firmes recientes.',
	'vics_cards'        => array(
		array( 'head' => 'INDEMNIZACIÓN', 'num' => '52.300 €', 'who' => 'Herencia conflictiva · Madrid', 'where' => 'JPI nº 8 Madrid · NOV 2024' ),
		array( 'head' => 'DESAHUCIO',     'num' => '4 meses',  'who' => 'Inquilino impago 14 meses',     'where' => 'JPI nº 12 Málaga · ENE 2025' ),
		array( 'head' => 'BAREMO',        'num' => '38.450 €', 'who' => 'Accidente tráfico · seguro',    'where' => 'Acuerdo extrajudicial · OCT 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Tienes un',
	'hablemos_h2_em'    => 'asunto civil pendiente?',
	'hablemos_lead'     => 'Cuéntanos qué pasa. En 24h te decimos qué procedimiento corresponde, plazos, coste estimado y probabilidad de éxito — siempre por escrito.',

	'form_select_legend'  => 'Tipo de asunto',
	'form_select_options' => array(
		array( 'herencia',     'Herencia' ),
		array( 'desahucio',    'Desahucio' ),
		array( 'ejecucion',    'Ejecución hipotecaria' ),
		array( 'reclamacion',  'Reclamación' ),
		array( 'danos',        'Daños' ),
		array( 'seguros',      'Seguros' ),
	),
);

include __DIR__ . '/inc/area-template-render.php';
