<?php
/**
 * Template Name: Patrimonio v2 — Gestión de Patrimonio
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-patrimonio.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-patrimonio-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-patrimonio-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Planificación sucesoria', 'd' => 'Testamento, pactos sucesorios y planificación previa para optimizar el reparto y minimizar el coste fiscal de la herencia.', 'tag' => 'Testamento · pactos · herederos' ),
	array( 'n' => '02', 't' => 'Optimización fiscal patrimonial', 'd' => 'Estructura patrimonial eficiente: holding familiar, sociedades patrimoniales, residencia fiscal estratégica.', 'tag' => 'Holding · IRPF · IS · IP' ),
	array( 'n' => '03', 't' => 'Donaciones y legados', 'd' => 'Diseño de donaciones inter vivos con reserva de usufructo, donaciones graduales, legados específicos. Aprovechamiento de bonificaciones autonómicas.', 'tag' => 'ITPAJD · ISD · usufructo' ),
	array( 'n' => '04', 't' => 'Sociedades patrimoniales', 'd' => 'Constitución y mantenimiento de sociedades de tenencia de inmuebles o cartera para profesionales y familias con patrimonio relevante.', 'tag' => 'SL patrimonial · holding' ),
	array( 'n' => '05', 't' => 'Blindaje patrimonial', 'd' => 'Separación del patrimonio empresarial y personal. Capitulaciones matrimoniales, fideicomisos, instrumentos de protección frente a la responsabilidad civil profesional.', 'tag' => 'Capitulaciones · holdings' ),
	array( 'n' => '06', 't' => 'Inversión inmobiliaria', 'd' => 'Asesoramiento en compraventa, arrendamientos vacacionales, registro de propiedades en SL, fiscalidad de la rentabilidad inmobiliaria.', 'tag' => 'Compraventa · rentabilidad · SL' ),
);
$relacionadas = array(
	array( 'n' => '05', 't' => 'Derecho Civil', 'd' => 'Herencias, sucesiones y partición hereditaria conflictiva', 'href' => '/derecho-civil/' ),
	array( 'n' => '03', 't' => 'Derecho Mercantil', 'd' => 'Constitución y reestructuración de sociedades patrimoniales', 'href' => '/derecho-mercantil/' ),
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Reestructuración de patrimonio personal en situaciones de insolvencia', 'href' => '/ley-de-segunda-oportunidad/' ),
);
$faqs = array(
	array( 'q' => '¿Cuándo conviene constituir una sociedad patrimonial?',                'a' => 'A partir de 5-6 inmuebles en alquiler o un patrimonio mobiliario relevante (>500.000 €). La SL patrimonial permite tributar al tipo del Impuesto sobre Sociedades (25%) en lugar del IRPF marginal del titular, además de facilitar el reparto sucesorio.' ),
	array( 'q' => '¿Qué es un protocolo familiar?',                                       'a' => 'Acuerdo entre los miembros de una familia empresaria que regula la convivencia entre familia, propiedad y empresa: cómo se incorporan los hijos, política de dividendos, sucesión del fundador, valoración de acciones, conflictos. Especialmente recomendable en empresas familiares de 2ª generación en adelante.' ),
	array( 'q' => '¿Puedo donar a mis hijos sin pagar impuestos?',                        'a' => 'Depende de la comunidad autónoma. En Andalucía, Madrid, Galicia y Cantabria existen bonificaciones del 99% en el ISD para descendientes y cónyuges. En otras comunidades el coste fiscal puede ser significativo. La planificación con tiempo permite aprovechar las bonificaciones disponibles.' ),
	array( 'q' => '¿Conviene hacer testamento aunque tenga poco patrimonio?',             'a' => 'Sí, siempre. El testamento evita el procedimiento de declaración de herederos abintestato (más caro y lento), permite favorecer a un cónyuge o pareja de hecho, asignar legados específicos y nombrar un albacea. Coste habitual: 50-90 € notarial.' ),
	array( 'q' => '¿Qué es la reserva de usufructo en una donación?',                     'a' => 'Donas la nuda propiedad de un bien (normalmente un inmueble) a tus hijos pero te reservas el derecho a usarlo y obtener sus frutos hasta tu fallecimiento. Permite reducir el coste fiscal de la donación y mantener el control del bien en vida.' ),
	array( 'q' => '¿Qué pasa con mi patrimonio si me caso en gananciales?',               'a' => 'Todos los bienes adquiridos durante el matrimonio (excepto herencias y donaciones) pasan a formar parte de la sociedad de gananciales — al 50% para cada cónyuge. Si quieres mantener separación de patrimonios o proteger un negocio personal, conviene firmar capitulaciones matrimoniales.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'patrimonio',
	'area_label'        => 'Gestión de Patrimonio',
	'area_num'          => '04 / 06',
	'author_img'        => 'remedios-blanco.jpg',

	'hero_title_main'   => 'Lo que construyes hoy',
	'hero_title_em'     => 'tiene que durar.',
	'hero_title_tail'   => '',
	'hero_lead'         => 'Planificación sucesoria, optimización fiscal, sociedades patrimoniales y blindaje del patrimonio personal y empresarial. Pensado a 10 años vista, no a fin de año.',
	'hero_cta_primary'  => 'Diseñar mi plan patrimonial',
	'microstats'        => array(
		array( 'PROTOCOLOS', '60+' ),
		array( 'HOLDINGS',   '35+' ),
		array( 'SUCESIONES', '90+' ),
	),

	'whatis_legal_ref'  => 'Planificación al amparo del Código Civil (sucesiones), Ley del Impuesto sobre Sucesiones y Donaciones (Ley 29/1987), Ley del IRPF, Ley del Impuesto sobre el Patrimonio y normativa autonómica de bonificaciones.',
	'whatis_pull'       => 'No es solo "qué hago con mi dinero". Es "qué pasa si yo no estoy".',
	'whatis_h2_main'    => 'Patrimonio bien diseñado:',
	'whatis_h2_em'      => 'menos impuestos, menos conflictos.',
	'whatis_p1'         => 'La gestión patrimonial no es solo invertir bien. Es estructurar tu patrimonio de modo que <strong>tribute lo justo</strong>, se transmita sin disputas familiares y esté protegido frente a contingencias profesionales o personales (divorcio, demandas, insolvencia).',
	'whatis_p2'         => 'Trabajamos con familias empresarias, profesionales liberales y particulares con patrimonio inmobiliario relevante. La planificación con tiempo permite aprovechar bonificaciones autonómicas que pueden suponer <strong>ahorros del 90% en sucesiones</strong>.',

	'author_chip'       => '+90 PLANIFICACIONES SUCESORIAS',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y pienso a 10 años vista.',
	'author_p1'         => 'La planificación patrimonial requiere paciencia y conocimiento del cliente. No basta con una hoja de cálculo: hay que entender la familia, el negocio, los planes a futuro, las relaciones entre los hijos, las obligaciones que ya existen.',
	'author_p2'         => 'Trabajamos en coordinación con tu asesor fiscal y, si lo tienes, con tu banca privada. <strong>Honorarios fijos por encargo</strong> o iguala anual para clientes con seguimiento continuado. Sin urgencia: la buena planificación se hace con tiempo.',

	'serv_eyebrow'      => 'SERVICIOS PRINCIPALES',
	'serv_h2_main'      => 'Seis frentes',
	'serv_h2_em'        => 'patrimonial-fiscales.',
	'serv_meta'         => 'Cada plan se diseña a medida del cliente y su familia. Honorarios cerrados por hito o iguala anual.',

	'vics_eyebrow'      => 'OPERACIONES RECIENTES',
	'vics_h2'           => 'Estructuras cerradas en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'AHORRO FISCAL', 'num' => '180.000 €', 'who' => 'Holding familiar · 3 hijos', 'where' => 'Operación privada · ENE 2025' ),
		array( 'head' => 'PROTOCOLO',     'num' => '5ª gen.',   'who' => 'Empresa familiar · Málaga', 'where' => 'Acuerdo firmado · OCT 2024' ),
		array( 'head' => 'SUCESIÓN',      'num' => '0 € ISD',   'who' => 'Patrimonio 2,4 M €',         'where' => 'Donación gradual · MAR 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Quieres dejar tu patrimonio',
	'hablemos_h2_em'    => 'bien colocado?',
	'hablemos_lead'     => 'Una conversación inicial de 30 minutos para entender tu situación. En la primera reunión salimos con un mapa claro y, si encaja, un presupuesto cerrado por escrito.',

	'form_select_legend'  => 'Lo que más te preocupa',
	'form_select_options' => array(
		array( 'sucesion',   'Sucesión' ),
		array( 'fiscal',     'Optimización fiscal' ),
		array( 'donacion',   'Donación' ),
		array( 'holding',    'Holding patrimonial' ),
		array( 'blindaje',   'Blindaje empresarial' ),
		array( 'inversion',  'Inversión inmobiliaria' ),
	),
);

include __DIR__ . '/inc/area-template-render.php';
