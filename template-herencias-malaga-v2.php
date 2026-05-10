<?php
/**
 * Template Name: Herencias Málaga v2 (sub-área Civil)
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-civil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-civil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-civil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Aceptación de la herencia', 'd' => 'Pura y simple, a beneficio de inventario o renuncia. Te orientamos sobre la opción que más te conviene según el activo y el pasivo del causante.', 'tag' => 'Pura · beneficio · renuncia' ),
	array( 'n' => '02', 't' => 'Declaración de herederos abintestato', 'd' => 'Si el causante murió sin testamento. Acta notarial (descendientes, ascendientes, cónyuge) o procedimiento judicial (otros parentescos).', 'tag' => 'Sin testamento · notarial · judicial' ),
	array( 'n' => '03', 't' => 'Partición hereditaria', 'd' => 'Reparto de bienes entre coherederos. Cuaderno particional, mediación entre herederos en conflicto o procedimiento judicial de división.', 'tag' => 'Cuaderno · mediación · división' ),
	array( 'n' => '04', 't' => 'Reclamación de legítima', 'd' => 'Acciones para defender la legítima estricta o suplementaria. Reducción de donaciones inoficiosas que excedan los tercios de libre disposición.', 'tag' => 'Legítima · suplementaria · inoficiosa' ),
	array( 'n' => '05', 't' => 'Impuesto de Sucesiones', 'd' => 'Liquidación con bonificaciones autonómicas (Andalucía: 99% para descendientes y cónyuge). Aplazamiento, fraccionamiento y solicitud de prórroga si el plazo apremia.', 'tag' => 'ISD · bonificación · prórroga' ),
	array( 'n' => '06', 't' => 'Plusvalía municipal', 'd' => 'Reclamación si la herencia incluye inmuebles. Posible exención total tras STC 26/10/2021 si no hay incremento real de valor.', 'tag' => 'IIVTNU · STC · exención' ),
);
$relacionadas = array(
	array( 'n' => '04', 't' => 'Gestión de Patrimonio', 'd' => 'Planificación sucesoria previa para evitar conflictos', 'href' => '/gestion-de-patrimonio/' ),
	array( 'n' => '05', 't' => 'Derecho Civil', 'd' => 'Otros procedimientos civiles (desahucios, ejecuciones)',  'href' => '/derecho-civil/' ),
	array( 'n' => '03', 't' => 'Derecho Mercantil', 'd' => 'Sucesión empresarial y protocolo familiar',           'href' => '/derecho-mercantil/' ),
);
$faqs = array(
	array( 'q' => '¿Tengo que aceptar la herencia si me dejan deudas?',                'a' => 'No. Tienes tres opciones: aceptar pura y simplemente (asumes activo y pasivo con tu patrimonio personal), aceptar a beneficio de inventario (solo respondes con los bienes heredados) o renunciar (no recibes nada pero no asumes deudas). Si hay dudas, beneficio de inventario es la opción más segura.' ),
	array( 'q' => '¿Cuánto se paga de Impuesto de Sucesiones en Málaga?',              'a' => 'Andalucía aplica una bonificación del 99% en el ISD para descendientes, cónyuge y ascendientes (Grupos I y II) sin límite de patrimonio. En la práctica, los herederos directos pagan importes mínimos (en muchos casos 0 €) por el ISD en herencias en Málaga.' ),
	array( 'q' => '¿Cuánto tiempo tengo para liquidar los impuestos?',                 'a' => 'El plazo legal es de 6 meses desde el fallecimiento, prorrogables a 12 si lo solicitamos antes del 5º mes. Pasado el plazo sin liquidar, hay recargos del 5-20% más intereses. Por eso conviene actuar cuanto antes, especialmente si hay inmuebles que requieren tasación.' ),
	array( 'q' => '¿Qué hago si los demás herederos no se ponen de acuerdo?',          'a' => 'Tienes tres vías: (1) cuaderno particional notarial si todos firman, (2) mediación familiar para llegar a acuerdo extrajudicial, o (3) acción de división judicial de la herencia (procedimiento contencioso). La judicial dura 1-3 años y es la más cara — siempre intentamos las dos primeras antes.' ),
	array( 'q' => '¿Qué es la legítima en Andalucía?',                                 'a' => 'Andalucía sigue el Código Civil estatal: 2/3 del haber hereditario corresponden a los hijos como legítima (estricta + de mejora) y 1/3 es de libre disposición del causante. Si el testamento no respeta la legítima, los herederos forzosos pueden reclamar judicialmente.' ),
	array( 'q' => 'Heredé un piso pero no quiero quedármelo. ¿Qué opciones tengo?',    'a' => 'Lo habitual: venderlo y repartir el dinero entre coherederos. Si los demás quieren mantenerlo, pueden comprarte tu parte (extinción de condominio, fiscalmente más eficiente que una compraventa). Si no se ponen de acuerdo, se subasta judicialmente — última opción.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'herencias-malaga',
	'area_label'        => 'Herencias en Málaga',
	'area_num'          => '',
	'parent_label'      => 'Derecho Civil',
	'parent_url'        => home_url( '/derecho-civil/' ),
	'eyebrow_override'  => 'SUB-ÁREA · HERENCIAS · MÁLAGA',

	'hero_title_main'   => 'Tu herencia',
	'hero_title_em'     => 'sin sorpresas, sin pleitos.',
	'hero_lead'         => 'Aceptación, partición, declaración de herederos y reclamación de legítima. Coordinamos con notario y agencia tributaria. Aprovechamos la bonificación del 99% del ISD en Andalucía.',
	'hero_cta_primary'  => 'Consulta gratuita de herencia',
	'microstats'        => array(
		array( 'HERENCIAS', '180+' ),
		array( 'BONIF. ISD', '99%' ),
		array( 'PLAZO ISD',  '6 meses' ),
	),

	'whatis_legal_ref'  => 'Asesoramiento al amparo del Código Civil (sucesiones), Ley del ISD 29/1987, normativa autonómica de Andalucía (Ley 5/2021) y procedimiento de jurisdicción voluntaria notarial.',
	'whatis_pull'       => 'En Andalucía, una herencia bien planteada cuesta menos en impuestos y mucho menos en disgustos familiares.',
	'whatis_h2_main'    => 'Herencias en Málaga:',
	'whatis_h2_em'      => 'fiscalidad ventajosa, partición delicada.',
	'whatis_p1'         => 'En Málaga (y en toda Andalucía) la <strong>bonificación del 99% del ISD</strong> hace que la liquidación tributaria sea casi simbólica para hijos, cónyuges y padres. Pero el aspecto fiscal es solo una parte: la partición de bienes entre coherederos es donde aparecen los conflictos.',
	'whatis_p2'         => 'Llevamos más de <strong>180 herencias resueltas</strong> en juzgados de Málaga, Antequera, Marbella, Estepona y Vélez-Málaga. La mayoría se cierran por cuaderno notarial; cuando hay conflicto, mediamos primero y solo judicializamos si no hay alternativa.',

	'author_chip'       => '+180 HERENCIAS RESUELTAS',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y conozco los notarios de Málaga.',
	'author_p1'         => 'Trabajamos con notarías de Málaga capital y resto de la provincia. Coordinamos plazos del ISD, valoraciones de inmuebles, certificados de últimas voluntades y bancarios — para que tú no tengas que ir de despacho en despacho.',
	'author_p2'         => 'Honorarios <strong>cerrados por escrito</strong> antes de empezar. Tarifa adaptada al patrimonio y complejidad: herencias sencillas con dos herederos vs sucesiones con sociedades familiares y patrimonio en varias provincias.',

	'serv_eyebrow'      => 'SERVICIOS',
	'serv_h2_main'      => 'Seis servicios',
	'serv_h2_em'        => 'sucesorios.',
	'serv_meta'         => 'Cada herencia tiene su singularidad. Te asesoramos sobre la combinación de procedimientos más eficiente.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Herencias resueltas en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'PARTICIÓN',  'num' => '4 herederos', 'who' => 'Patrimonio 580.000 € · 2 inmuebles', 'where' => 'Cuaderno notarial · OCT 2024' ),
		array( 'head' => 'LEGÍTIMA',   'num' => '120.000 €',   'who' => 'Reclamación entre hermanos',         'where' => 'JPI nº 6 Málaga · ENE 2025' ),
		array( 'head' => 'BENEFICIO',  'num' => '0 € deuda',   'who' => 'Inventario · pasivo > activo',        'where' => 'Renuncia parcial · NOV 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Tienes una',
	'hablemos_h2_em'    => 'herencia pendiente?',
	'hablemos_lead'     => 'Cuéntanos qué situación tienes (con o sin testamento, número de herederos, tipo de bienes). En 24h te decimos los pasos y plazos — siempre por escrito.',

	'form_select_legend'  => '¿En qué fase estás?',
	'form_select_options' => array(
		array( 'recientes',    'Fallecimiento reciente' ),
		array( 'sin-testam',   'Sin testamento' ),
		array( 'particion',    'Partición' ),
		array( 'conflicto',    'Conflicto entre herederos' ),
		array( 'legitima',     'Reclamar legítima' ),
		array( 'isd',          'Impuesto de Sucesiones' ),
	),
);
include __DIR__ . '/inc/area-template-render.php';
