<?php
/**
 * Template Name: Concurso de acreedores v2 (sub-área Mercantil)
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-mercantil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-mercantil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-mercantil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Concurso voluntario', 'd' => 'Lo presenta el deudor (la empresa). Mantienes la administración del negocio bajo supervisión del administrador concursal. Mejores efectos para el equipo gestor.', 'tag' => 'Voluntario · gestión · supervisión' ),
	array( 'n' => '02', 't' => 'Concurso necesario', 'd' => 'Lo solicita un acreedor cuando la empresa no presenta concurso a tiempo. El juez suele suspender las facultades del órgano de administración.', 'tag' => 'Acreedor · suspensión · culpable' ),
	array( 'n' => '03', 't' => 'Plan de reestructuración', 'd' => 'Alternativa pre-concursal de la Ley 16/2022. Acuerdo con acreedores principales sin pasar por el procedimiento concursal completo. Más rápido y discreto.', 'tag' => 'Pre-concursal · acuerdo · 16/2022' ),
	array( 'n' => '04', 't' => 'Convenio con acreedores', 'd' => 'Propuesta de pago a los acreedores aprobada por mayorías cualificadas. Quitas hasta el 50% y esperas hasta 5 años. Aprobación judicial.', 'tag' => 'Quitas · esperas · mayoría' ),
	array( 'n' => '05', 't' => 'Liquidación ordenada', 'd' => 'Cuando el convenio no es viable. Realización ordenada de los activos y pago a los acreedores según el orden legal de prelación.', 'tag' => 'Activos · prelación · ordenado' ),
	array( 'n' => '06', 't' => 'Defensa de la responsabilidad del administrador', 'd' => 'Acción individual y social de responsabilidad. Concurso culpable, levantamiento del velo. Defensa frente a la responsabilidad personal del administrador.', 'tag' => 'Culpable · velo · responsabilidad' ),
);
$relacionadas = array(
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Concurso de persona natural para autónomos y particulares', 'href' => '/ley-de-segunda-oportunidad/' ),
	array( 'n' => '03', 't' => 'Derecho Mercantil', 'd' => 'Otros servicios mercantiles para empresas',                'href' => '/derecho-mercantil/' ),
	array( 'n' => '04', 't' => 'Gestión de Patrimonio', 'd' => 'Estrategia patrimonial pre-concurso',                  'href' => '/gestion-de-patrimonio/' ),
);
$faqs = array(
	array( 'q' => '¿Cuándo tengo que presentar el concurso?',                          'a' => 'En los 2 meses siguientes a conocer la insolvencia (art. 5 TRLC). La presentación tardía es la causa más habitual de calificación de concurso CULPABLE — con responsabilidad personal del administrador. Si dudas si tu empresa es insolvente, llámanos y lo evaluamos contigo en 24h.' ),
	array( 'q' => '¿Qué diferencia hay entre el concurso voluntario y el necesario?',  'a' => 'Voluntario lo presenta el deudor; necesario lo solicita un acreedor. El voluntario es siempre preferible: mantienes la gestión bajo supervisión, las cuotas de la administración concursal son menores, y es mucho menos probable que el concurso se califique como culpable.' ),
	array( 'q' => '¿Qué es la Ley 16/2022 y cómo cambia el concurso?',                  'a' => 'La Ley 16/2022 introdujo los planes de reestructuración como alternativa pre-concursal. Permite acuerdos con acreedores principales (mayorías cualificadas por clase de crédito) sin necesidad de presentar concurso completo. Más rápido, más discreto y mejor reputacionalmente.' ),
	array( 'q' => '¿Mi vivienda o mis bienes personales se ven afectados?',            'a' => 'Si eres administrador único de una SL, NO se afectan tus bienes personales (salvo concurso culpable). Si eres autónomo (sin sociedad interpuesta), sí se afecta tu patrimonio personal — en ese caso, lo más eficiente es una solicitud combinada de concurso + LSO.' ),
	array( 'q' => '¿Cuánto tarda un concurso?',                                        'a' => 'Concurso voluntario sencillo: 8-14 meses. Concurso con convenio: 12-24 meses. Concurso con liquidación: 18-30 meses. Plan de reestructuración Ley 16/2022: 3-6 meses (más rápido). Conviene presentar a tiempo para reducir la complejidad.' ),
	array( 'q' => '¿Puedo seguir trabajando mientras dura el concurso?',               'a' => 'En concurso voluntario, sí — mantienes la administración del negocio bajo supervisión del AC. En concurso necesario, suele haber suspensión de facultades del órgano de administración (el AC asume la gestión). Por eso siempre es preferible presentar voluntariamente.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'concurso-acreedores',
	'area_label'        => 'Concurso de Acreedores',
	'area_num'          => '',
	'parent_label'      => 'Derecho Mercantil',
	'parent_url'        => home_url( '/derecho-mercantil/' ),
	'eyebrow_override'  => 'SUB-ÁREA · CONCURSO DE ACREEDORES',

	'hero_title_main'   => 'Concurso bien planteado:',
	'hero_title_em'     => 'salvas la empresa o sales sin daños.',
	'hero_lead'         => 'Concurso voluntario, plan de reestructuración Ley 16/2022, convenio con acreedores o liquidación ordenada. Defendemos también al administrador frente a la calificación culpable.',
	'hero_cta_primary'  => 'Análisis pre-concursal',
	'microstats'        => array(
		array( 'CONCURSOS',     '40+' ),
		array( 'CULPABLES EVITADOS','38' ),
		array( 'PLAZO PRESENT.','2 meses' ),
	),

	'whatis_legal_ref'  => 'Procedimiento al amparo del Texto Refundido de la Ley Concursal (RDL 1/2020), Ley 16/2022 (planes de reestructuración pre-concursales), Reglamento UE 2015/848 (insolvencia transfronteriza) y Ley Orgánica del Poder Judicial.',
	'whatis_pull'       => 'En concurso, lo importante no es ganar — es presentar a tiempo. Cada día perdido aumenta el riesgo de concurso culpable.',
	'whatis_h2_main'    => 'Empresa en dificultades:',
	'whatis_h2_em'      => 'tienes 2 meses para actuar.',
	'whatis_p1'         => 'Cuando una empresa no puede atender regularmente sus obligaciones, el TRLC obliga al administrador a presentar concurso en <strong>2 meses</strong>. Pasado ese plazo sin actuar, la calificación posterior del concurso casi siempre es CULPABLE — con responsabilidad personal del administrador.',
	'whatis_p2'         => 'Llevamos más de 40 procedimientos concursales empresariales: voluntarios, planes de reestructuración Ley 16/2022, convenios y liquidaciones. La <strong>presentación temprana</strong> es la diferencia entre salvar la empresa con un convenio razonable o liquidar perdiendo todo.',

	'author_chip'       => '+40 CONCURSOS · 0 CULPABLES',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y entiendo la urgencia.',
	'author_p1'         => 'Cuando una empresa entra en dificultades, el reloj corre. <strong>Análisis pre-concursal en 48h</strong>: te decimos si encajas en plan de reestructuración (Ley 16/2022, más rápido y discreto) o si conviene presentar concurso voluntario directamente.',
	'author_p2'         => 'Coordinamos con tu asesor fiscal y, si la empresa es familiar, con tu asesor patrimonial. <strong>Honorarios cerrados</strong> por fase del procedimiento (presentación, instrucción, convenio o liquidación, calificación). Te entrego presupuesto inicial antes de empezar.',

	'serv_eyebrow'      => 'SERVICIOS',
	'serv_h2_main'      => 'Seis vías',
	'serv_h2_em'        => 'concursales y pre-concursales.',
	'serv_meta'         => 'Cada empresa requiere una estrategia distinta según viabilidad, deuda y composición de los acreedores.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Concursos resueltos en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'CONVENIO',         'num' => '40% quita',  'who' => 'Restauración · Málaga',          'where' => 'JM nº 2 Málaga · OCT 2024' ),
		array( 'head' => 'PLAN REESTRUCT.',  'num' => '4 meses',    'who' => 'Pyme distribución · Madrid',     'where' => 'Acuerdo Ley 16/2022 · MAR 2025' ),
		array( 'head' => 'FORTUITO',         'num' => 'Sin culpable','who' => 'Liquidación construcción',       'where' => 'JM nº 1 Sevilla · DIC 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Tu empresa',
	'hablemos_h2_em'    => 'no llega a fin de mes?',
	'hablemos_lead'     => 'Si has dejado de pagar a 2 o más acreedores con regularidad, llámanos hoy. En 48h te decimos si conviene plan de reestructuración o concurso voluntario, y qué riesgos personales tienes como administrador.',

	'form_select_legend'  => 'Estado de la empresa',
	'form_select_options' => array(
		array( 'preventivo',     'Preventivo' ),
		array( 'impagos',        'Impagos puntuales' ),
		array( 'crisis',         'Crisis de tesorería' ),
		array( 'demanda',        'Demanda de un acreedor' ),
		array( 'culpable',       'Riesgo culpable' ),
		array( 'liquidacion',    'Liquidación' ),
	),
);
include __DIR__ . '/inc/area-template-render.php';
