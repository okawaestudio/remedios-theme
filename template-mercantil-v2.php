<?php
/**
 * Template Name: Mercantil v2 — Derecho Mercantil
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-mercantil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-mercantil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-mercantil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Contratos mercantiles', 'd' => 'Compraventa, distribución, agencia, suministro, franquicia, joint-venture. Redacción y revisión con cláusulas blindadas frente a litigios.', 'tag' => 'B2B · pymes · autónomos' ),
	array( 'n' => '02', 't' => 'Concurso de acreedores empresarial', 'd' => 'Concurso voluntario o necesario, plan de viabilidad, propuesta anticipada de convenio, liquidación ordenada.', 'tag' => 'Voluntario · necesario · exprés' ),
	array( 'n' => '03', 't' => 'Constitución y reestructuración societaria', 'd' => 'SL, SA, holdings patrimoniales. Fusiones, escisiones, transformaciones, modificación estatutaria.', 'tag' => 'SL · SA · Holding' ),
	array( 'n' => '04', 't' => 'Conflictos entre socios', 'd' => 'Impugnación de acuerdos sociales, derecho de separación, exclusión de socios, mediación intra-societaria.', 'tag' => 'Acuerdos · separación · exclusión' ),
	array( 'n' => '05', 't' => 'Responsabilidad de administradores', 'd' => 'Acción social e individual de responsabilidad. Concurso culpable, levantamiento del velo societario.', 'tag' => 'Social · individual · concursal' ),
	array( 'n' => '06', 't' => 'Compraventa de empresas y due diligence', 'd' => 'Asesoramiento integral en M&A. Due diligence legal, fiscal y laboral. Negociación de SPA y garantías.', 'tag' => 'M&A · due diligence · SPA' ),
);
$relacionadas = array(
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Cuando el concurso empresarial deja deudas personales del autónomo', 'href' => '/ley-de-segunda-oportunidad/' ),
	array( 'n' => '04', 't' => 'Gestión de Patrimonio', 'd' => 'Estrategia patrimonial tras la operación societaria', 'href' => '/gestion-de-patrimonio/' ),
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Reclamaciones contra productos bancarios para empresas', 'href' => '/derecho-bancario/' ),
);
$faqs = array(
	array( 'q' => '¿Cuándo conviene presentar un concurso de acreedores?',                'a' => 'Cuando la empresa no puede atender regularmente las obligaciones exigibles (insolvencia actual) o prevé que no podrá hacerlo en breve (insolvencia inminente). Presentar a tiempo evita la calificación de concurso culpable y protege al administrador frente a la responsabilidad personal.' ),
	array( 'q' => '¿Qué diferencia hay entre concurso voluntario y necesario?',           'a' => 'Voluntario lo presenta el deudor; necesario lo solicita un acreedor. El voluntario suele tener mejores efectos: el deudor mantiene la administración del negocio bajo supervisión, mientras que en el necesario se le suelen suspender las facultades.' ),
	array( 'q' => '¿Puedo evitar la responsabilidad personal como administrador?',        'a' => 'Sí, presentando el concurso a tiempo (en los dos meses siguientes a conocer la insolvencia, art. 5 TRLC) y demostrando que actuaste con la diligencia exigible. La omisión del deber de solicitar concurso es la causa más habitual de concurso culpable.' ),
	array( 'q' => '¿Qué hace el administrador concursal?',                                'a' => 'Es el órgano designado por el juez para supervisar la masa activa y pasiva del concurso. Elabora el inventario de bienes, la lista de acreedores, el informe sobre la viabilidad y propone la calificación del concurso (fortuito o culpable).' ),
	array( 'q' => '¿Qué cláusulas son imprescindibles en un contrato mercantil?',         'a' => 'Objeto detallado, precio y forma de pago, plazo y condiciones de prórroga, exclusividad si aplica, incumplimientos y penalizaciones, fuero y ley aplicable, confidencialidad, y mecanismos de resolución de disputas (arbitraje vs jurisdicción).' ),
	array( 'q' => '¿Cuánto cuesta constituir una SL?',                                    'a' => 'Notaría 200-400 €, registro mercantil 100-200 €, ITP 1% sobre capital, gestoría opcional 200-300 €. A esto se suma el capital social mínimo (3.000 € desde 2022). Total inicial habitual: 600-1.000 € + capital.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'mercantil',
	'area_label'        => 'Derecho Mercantil',
	'area_num'          => '03 / 06',

	'hero_title_main'   => 'Asesoría jurídica',
	'hero_title_em'     => 'para tu empresa.',
	'hero_title_tail'   => '',
	'hero_lead'         => 'Contratos mercantiles, concurso de acreedores, conflictos entre socios y operaciones societarias. Acompañamiento continuo a autónomos, pymes y empresas familiares.',
	'hero_cta_primary'  => 'Consulta gratuita',
	'microstats'        => array(
		array( 'CONTRATOS', '500+' ),
		array( 'CONCURSOS', '40+' ),
		array( 'SOCIEDADES', '120+' ),
	),

	'whatis_legal_ref'  => 'Asesoramiento integral al amparo del Código de Comercio, Texto Refundido de la Ley de Sociedades de Capital (RDL 1/2010), Texto Refundido de la Ley Concursal (RDL 1/2020) y normativa europea de M&A.',
	'whatis_pull'       => 'Tu empresa necesita un abogado que entienda tanto el contrato como el balance.',
	'whatis_h2_main'    => 'Más allá del contrato:',
	'whatis_h2_em'      => 'estrategia jurídica continuada.',
	'whatis_p1'         => 'No esperamos a que el problema explote para intervenir. Asesoramiento <strong>continuado</strong> en el día a día societario: contratos con proveedores y clientes, juntas, modificaciones estatutarias, política de dividendos, prevención del concurso.',
	'whatis_p2'         => 'Cuando el conflicto llega — disputa entre socios, impagos crónicos, insolvencia, reclamación de un cliente importante — ya conocemos tu empresa y podemos actuar con velocidad y criterio.',

	'author_chip'       => '+500 CONTRATOS REVISADOS',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y conozco la economía real.',
	'author_p1'         => 'He litigado y negociado con todo tipo de empresas españolas: desde el autónomo del polígono industrial hasta el grupo familiar con holding patrimonial. Conozco los <strong>cuatro juzgados mercantiles</strong> de Madrid y los tres de Málaga, y los criterios particulares de cada uno.',
	'author_p2'         => 'Trabajamos con <strong>honorarios cerrados</strong> en operaciones societarias y planificación. Iguala mensual disponible para empresas que necesitan asesoramiento continuado. Te entrego presupuesto por escrito antes de empezar — sin facturas sorpresa.',

	'serv_eyebrow'      => 'SERVICIOS PRINCIPALES',
	'serv_h2_main'      => 'Seis frentes',
	'serv_h2_em'        => 'jurídico-mercantiles.',
	'serv_meta'         => 'Cada servicio se presupuesta de forma cerrada o se incluye en iguala mensual según el volumen. Sin sorpresas.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Operaciones cerradas en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'CONCURSO RESUELTO', 'num' => '380.000 €', 'who' => 'Restauración · Málaga', 'where' => 'JM nº 2 Málaga · OCT 2024' ),
		array( 'head' => 'M&A CERRADO',        'num' => '1,2 M €',   'who' => 'Compraventa pyme tech',  'where' => 'Operación privada · MAY 2024' ),
		array( 'head' => 'ACUERDO SOCIETARIO', 'num' => '6 socios',  'who' => 'Empresa familiar 3ª gen.','where' => 'Mediación cerrada · MAR 2025' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Tu empresa',
	'hablemos_h2_em'    => 'necesita un abogado de confianza?',
	'hablemos_lead'     => 'Cuéntanos tu situación. En 24h te decimos si encajamos como asesores y te entregamos un plan de actuación con presupuesto cerrado.',

	'form_select_legend'  => 'Tipo de necesidad',
	'form_select_options' => array(
		array( 'contratos',     'Contratos' ),
		array( 'concurso',      'Concurso' ),
		array( 'societario',    'Societario' ),
		array( 'socios',        'Conflicto socios' ),
		array( 'm-and-a',       'M&A' ),
		array( 'iguala',        'Iguala mensual' ),
	),
);

include __DIR__ . '/inc/area-template-render.php';
