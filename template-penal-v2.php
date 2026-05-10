<?php
/**
 * Template Name: Penal v2 — Derecho Penal
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-penal.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-penal-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-penal-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Defensa procesal completa', 'd' => 'Asistencia letrada desde la primera declaración en comisaría hasta el juicio oral y, si procede, recursos en audiencia provincial y Supremo.', 'tag' => 'Comisaría · instrucción · juicio' ),
	array( 'n' => '02', 't' => 'Juicios rápidos', 'd' => 'Procedimientos por delitos leves o flagrantes: hurtos, lesiones, conducción bajo influencia. Estrategia de conformidad o defensa íntegra.', 'tag' => 'Hurto · lesión · alcoholemia' ),
	array( 'n' => '03', 't' => 'Ocupaciones ilegales', 'd' => 'Recuperación de la vivienda ocupada por la vía penal (allanamiento o usurpación) y/o civil. Procedimiento exprés desde 2018.', 'tag' => 'Allanamiento · usurpación · exprés' ),
	array( 'n' => '04', 't' => 'Delitos económicos', 'd' => 'Apropiación indebida, alzamiento de bienes, estafa, blanqueo, delitos societarios y contra la Hacienda Pública.', 'tag' => 'Apropiación · alzamiento · estafa' ),
	array( 'n' => '05', 't' => 'Seguridad vial', 'd' => 'Conducción bajo influencia de alcohol o drogas, exceso de velocidad penal, conducción sin permiso, omisión del deber de socorro.', 'tag' => 'Alcoholemia · velocidad · permiso' ),
	array( 'n' => '06', 't' => 'Acusación particular', 'd' => 'Representación de la víctima en delitos de estafa, lesiones, daños, denuncias falsas. Reclamación de la responsabilidad civil derivada del delito.', 'tag' => 'Víctima · indemnización · responsabilidad' ),
);
$relacionadas = array(
	array( 'n' => '05', 't' => 'Derecho Civil', 'd' => 'Acciones civiles derivadas del delito: indemnización, restitución', 'href' => '/derecho-civil/' ),
	array( 'n' => '03', 't' => 'Derecho Mercantil', 'd' => 'Delitos societarios y de administradores', 'href' => '/derecho-mercantil/' ),
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Delitos relacionados con productos bancarios: estafa, blanqueo', 'href' => '/derecho-bancario/' ),
);
$faqs = array(
	array( 'q' => 'Me han detenido. ¿Tengo que declarar en comisaría?',                  'a' => 'NO declares hasta hablar con un abogado. Tienes derecho a guardar silencio (art. 520 LECrim) y a no responder preguntas sin tu letrado presente. Lo que digas en comisaría sin asistencia puede usarse en tu contra. Llámanos las 24 h del día: estamos disponibles para urgencias.' ),
	array( 'q' => '¿Qué hago si me notifican una citación judicial?',                    'a' => 'Llámanos antes de presentarte. Necesitamos saber el procedimiento (juicio rápido, monitorio, ordinario), la condición en que te citan (investigado, testigo, perjudicado) y los plazos para preparar la defensa o solicitar suspensión si fuera necesario.' ),
	array( 'q' => '¿Puedo recuperar mi vivienda ocupada rápido?',                        'a' => 'Sí. Desde 2018 existe un procedimiento exprés (Ley 5/2018) que permite la recuperación de la vivienda en 1-3 meses. Vía penal por allanamiento (si es vivienda habitual) o por usurpación (si es segunda residencia o local). Te decimos en 24 h cuál es la vía más rápida según tu caso.' ),
	array( 'q' => '¿Cuánto cuesta una defensa penal?',                                   'a' => 'Depende de la gravedad del delito y la fase procesal: desde 600-1.200 € por un juicio rápido hasta cifras de 5 dígitos en delitos económicos complejos. Te entregamos presupuesto cerrado por escrito antes de aceptar el caso. Trabajamos con planes de pago aplazados.' ),
	array( 'q' => '¿Mis antecedentes penales se cancelan algún día?',                    'a' => 'Sí. Los plazos de cancelación van desde 6 meses (delitos leves) hasta 5 años (penas graves), contados desde el cumplimiento de la pena. La cancelación es automática salvo error administrativo, en cuyo caso te ayudamos a solicitarla expresamente al Registro Central de Penados.' ),
	array( 'q' => '¿Estáis disponibles para urgencias 24 h?',                            'a' => 'Sí, en detenciones policiales y casos de emergencia (accidentes graves, allanamientos en curso, registros judiciales). Llama al teléfono del despacho — fuera de horario el sistema redirige a Remedios Morillo o al letrado de guardia.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'penal',
	'area_label'        => 'Derecho Penal',
	'area_num'          => '06 / 06',

	'hero_title_main'   => 'Defensa penal,',
	'hero_title_em'     => 'desde la primera llamada.',
	'hero_title_tail'   => '',
	'hero_lead'         => 'Defensa procesal completa, juicios rápidos, ocupaciones ilegales, delitos económicos y seguridad vial. Disponibilidad 24 h en urgencias.',
	'hero_cta_primary'  => 'Consulta urgente',
	'microstats'        => array(
		array( 'CASOS',         '320+' ),
		array( 'JUICIOS RÁPIDOS','85+' ),
		array( 'OCUPACIONES',   '40+' ),
	),

	'whatis_legal_ref'  => 'Defensa al amparo del Código Penal (LO 10/1995), Ley de Enjuiciamiento Criminal, LO 5/2000 (responsabilidad menores) y normativa autonómica complementaria. Asistencia letrada del art. 520 LECrim 24 h.',
	'whatis_pull'       => 'En penal, lo que decides en la primera hora condiciona el resto del procedimiento. Llámanos antes de declarar.',
	'whatis_h2_main'    => 'No declares hasta',
	'whatis_h2_em'      => 'hablar con un abogado.',
	'whatis_p1'         => 'En materia penal el factor tiempo lo es todo. Una declaración mal preparada en comisaría, un juicio rápido aceptado por desconocimiento, una citación que no se atiende — son errores que después cuestan años de procedimiento.',
	'whatis_p2'         => 'Defensa <strong>integral desde la primera diligencia</strong>: asistencia letrada en comisaría, defensa en instrucción, juicio oral y, si procede, recursos en audiencia provincial y Tribunal Supremo. Coordinación con perito si el caso requiere prueba técnica (forense, contable, accidentología).',

	'author_chip'       => '+320 DEFENSAS PENALES',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y estoy disponible 24h en urgencias.',
	'author_p1'         => 'En penal no hay segundas oportunidades para preparar una declaración. Por eso ofrezco <strong>disponibilidad 24h en urgencias</strong>: detenciones, registros, accidentes graves. Llamas y tienes asistencia letrada en máximo 1 hora — Madrid o Málaga.',
	'author_p2'         => 'Trabajo con <strong>presupuestos cerrados por fase procesal</strong>: instrucción, juicio oral, recursos. Sin sorpresas. Para casos económicos complejos (alzamiento, blanqueo, delito societario) coordino con perito contable o forense según el procedimiento lo requiera.',

	'serv_eyebrow'      => 'SERVICIOS PRINCIPALES',
	'serv_h2_main'      => 'Seis frentes',
	'serv_h2_em'        => 'de defensa penal.',
	'serv_meta'         => 'Cada caso se valora en función del tipo penal, la fase procesal y la complejidad probatoria.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Resoluciones favorables recientes.',
	'vics_cards'        => array(
		array( 'head' => 'ABSOLUCIÓN',     'num' => 'Total',     'who' => 'Apropiación indebida · Madrid',  'where' => 'AP Madrid · DIC 2024' ),
		array( 'head' => 'OCUPACIÓN',      'num' => '17 días',   'who' => 'Vivienda recuperada · exprés', 'where' => 'JPI nº 4 Málaga · NOV 2024' ),
		array( 'head' => 'JUICIO RÁPIDO',  'num' => 'Multa min.','who' => 'Conducción bajo influencia',   'where' => 'JI nº 2 Málaga · OCT 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Te han detenido o',
	'hablemos_h2_em'    => 'tienes una citación?',
	'hablemos_lead'     => 'Llama directamente al teléfono del despacho. En urgencias estamos disponibles 24 h. Si la situación no es urgente, escríbenos y te respondemos en menos de 24 h.',

	'form_select_legend'  => 'Tipo de asunto',
	'form_select_options' => array(
		array( 'detenido',     'Detenido' ),
		array( 'citacion',     'Citación' ),
		array( 'juicio-rapido','Juicio rápido' ),
		array( 'ocupacion',    'Ocupación' ),
		array( 'economico',    'Delito económico' ),
		array( 'trafico',      'Tráfico' ),
	),
);

include __DIR__ . '/inc/area-template-render.php';
