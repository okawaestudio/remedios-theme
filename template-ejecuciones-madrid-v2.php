<?php
/**
 * Template Name: Ejecuciones hipotecarias Madrid v2 (sub-área Civil)
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-civil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-civil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-civil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Oposición a la ejecución', 'd' => 'Por defectos formales (notificación incorrecta, vencimiento anticipado abusivo) o sustantivos (cláusulas suelo, IRPH, comisiones). Plazo: 10 días desde notificación.', 'tag' => 'Plazo 10 días · cláusulas · forma' ),
	array( 'n' => '02', 't' => 'Reclamación de cláusulas abusivas', 'd' => 'Antes, durante o después de la ejecución: cláusula suelo, IRPH, intereses moratorios, vencimiento anticipado. Pueden suspender o anular la ejecución completa.', 'tag' => 'Suelo · IRPH · vencimiento' ),
	array( 'n' => '03', 't' => 'Dación en pago', 'd' => 'Negociación con el banco para entregar la vivienda y cancelar la deuda total (sin que quede saldo pendiente). Alternativa a la subasta cuando el banco está dispuesto.', 'tag' => 'Negociación · cancelación · alternativa' ),
	array( 'n' => '04', 't' => 'Suspensión por concurso o LSO', 'd' => 'Presentación de concurso de persona natural o solicitud de Ley de Segunda Oportunidad: paraliza automáticamente la ejecución hipotecaria.', 'tag' => 'Concurso · LSO · BEPI' ),
	array( 'n' => '05', 't' => 'Defensa en subasta', 'd' => 'Estrategia para evitar la adjudicación al banco al 70% del valor (art. 670 LEC). Puja de terceros, refinanciación, mejora del lance.', 'tag' => '70% LEC · puja · refinanciación' ),
	array( 'n' => '06', 't' => 'Procedimiento de liberación de fiadores', 'd' => 'Acción para liberar a familiares fiadores cuando el deudor principal entra en concurso o cumple los requisitos de la Ley de Vivienda 12/2023.', 'tag' => 'Fiador · LSO · vivienda' ),
);
$relacionadas = array(
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Reclamación de cláusulas abusivas (suelo, IRPH, gastos)', 'href' => '/derecho-bancario/' ),
	array( 'n' => '01', 't' => 'Ley de Segunda Oportunidad', 'd' => 'Cancelación legal de deudas si la vivienda no es suficiente', 'href' => '/ley-de-segunda-oportunidad/' ),
	array( 'n' => '05', 't' => 'Derecho Civil', 'd' => 'Otros procedimientos civiles relacionados',                  'href' => '/derecho-civil/' ),
);
$faqs = array(
	array( 'q' => 'Acabo de recibir el auto de ejecución. ¿Tengo tiempo para hacer algo?', 'a' => 'Sí, pero corre. Tienes 10 días desde la notificación para presentar oposición (art. 695 LEC). Después de ese plazo, el procedimiento avanza casi sin posibilidad de detenerlo. Llámanos el mismo día que recibas la notificación.' ),
	array( 'q' => '¿Puedo evitar perder la vivienda?',                                     'a' => 'Depende. Vías habituales: (1) reclamación de cláusulas abusivas en el contrato hipotecario que paralicen el procedimiento, (2) negociación de dación en pago con el banco, (3) refinanciación, (4) presentación de concurso de persona natural o LSO si la deuda total te supera. Cada caso es distinto.' ),
	array( 'q' => '¿Qué es la dación en pago?',                                            'a' => 'Acuerdo con el banco para entregar la vivienda y cancelar la deuda íntegramente, sin que quede saldo pendiente. NO es un derecho automático: el banco solo acepta cuando el inmueble cubre la deuda y la subasta no le interesa estratégicamente. Negociamos el acuerdo y revisamos las condiciones (despido del fiador, daciones parciales).' ),
	array( 'q' => '¿Qué pasa si el banco se queda la vivienda en subasta?',                'a' => 'El art. 670 LEC permite al banco adjudicarse el inmueble por el 70% del valor de tasación si nadie mejora la oferta. Si la deuda es mayor al 70%, queda un saldo pendiente que el banco te seguirá reclamando — salvo que activemos LSO o presentemos concurso para cancelarlo.' ),
	array( 'q' => '¿Soy fiador y mi familiar no puede pagar. ¿Qué hago?',                  'a' => 'Eres responsable solidario y el banco puede embargar tus bienes (sueldo, cuentas, vehículos). Pero existen vías: (1) negociar reducción del aval, (2) si el deudor principal entra en LSO, podemos liberarte como fiador en algunos supuestos, (3) presentar tu propio concurso de persona natural si la deuda te impide vivir.' ),
	array( 'q' => '¿Cuánto tarda una ejecución hipotecaria en Madrid?',                    'a' => 'Desde la primera providencia hasta el lanzamiento: 18-30 meses en juzgados de Madrid capital, 12-20 meses en municipios pequeños. Si oponemos cláusulas abusivas, el plazo se alarga (la cuestión se eleva a TJUE en algunos casos). Tiempo que aprovechamos para negociar dación o LSO.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'ejecuciones-madrid',
	'area_label'        => 'Ejecuciones Hipotecarias en Madrid',
	'area_num'          => '',
	'parent_label'      => 'Derecho Civil',
	'parent_url'        => home_url( '/derecho-civil/' ),
	'eyebrow_override'  => 'SUB-ÁREA · EJECUCIONES HIPOTECARIAS · MADRID',

	'hero_title_main'   => 'Pueden detener',
	'hero_title_em'     => 'la ejecución de tu hipoteca.',
	'hero_lead'         => 'Oposición por cláusulas abusivas (suelo, IRPH, vencimiento), dación en pago negociada o suspensión vía concurso/LSO. 10 días desde la notificación para actuar — llámanos hoy.',
	'hero_cta_primary'  => 'Análisis urgente',
	'microstats'        => array(
		array( 'PLAZO',     '10 días' ),
		array( 'PARALIZADAS','60+' ),
		array( 'DACIONES',  '25+' ),
	),

	'whatis_legal_ref'  => 'Defensa al amparo de la Ley de Enjuiciamiento Civil (procedimiento de ejecución hipotecaria), STJUE 14/03/2013 (cláusulas abusivas), STC 14/2017, Ley 5/2019 reguladora de los contratos de crédito inmobiliario y Ley 12/2023 por el Derecho a la Vivienda.',
	'whatis_pull'       => 'Cuando llega la notificación de ejecución, el reloj corre. Pero todavía hay margen — siempre que se actúe en plazo.',
	'whatis_h2_main'    => 'Tienes 10 días',
	'whatis_h2_em'      => 'para detener el procedimiento.',
	'whatis_p1'         => 'El art. 695 LEC concede 10 días desde la notificación de la ejecución para presentar oposición. Pasado ese plazo, el procedimiento avanza casi automáticamente hasta la subasta y el lanzamiento. La <strong>velocidad es crítica</strong>: cada día cuenta.',
	'whatis_p2'         => 'Si tu hipoteca tiene cláusulas abusivas (cláusula suelo, IRPH, vencimiento anticipado abusivo, intereses moratorios), podemos paralizar el procedimiento — y en muchos casos anular la deuda parcialmente. Si no encajas en cláusulas abusivas, evaluamos dación en pago o concurso de persona natural / LSO.',

	'author_chip'       => '+60 EJECUCIONES PARALIZADAS',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y entiendo la urgencia.',
	'author_p1'         => 'En ejecuciones hipotecarias trabajamos en <strong>modo urgencia</strong>: análisis de la documentación en 24-48h, preparación de la oposición en 5 días y presentación dentro del plazo legal de 10 días.',
	'author_p2'         => 'Sede física en Madrid (Calle Valenzuela 8). Coordinamos con tu banco directamente para negociar dación en pago cuando es la mejor opción. <strong>Honorarios cerrados</strong> con presupuesto inicial; si la oposición prospera, las costas las paga el banco.',

	'serv_eyebrow'      => 'SERVICIOS',
	'serv_h2_main'      => 'Seis vías',
	'serv_h2_em'        => 'de defensa hipotecaria.',
	'serv_meta'         => 'Cada caso se evalúa según el contrato hipotecario, la fase del procedimiento y la situación económica global del cliente.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Ejecuciones paralizadas o resueltas.',
	'vics_cards'        => array(
		array( 'head' => 'PARALIZADA',  'num' => 'IRPH nulo', 'who' => 'Hipoteca Caixabank · 165.000 €',   'where' => 'JPI nº 21 Madrid · OCT 2024' ),
		array( 'head' => 'DACIÓN',      'num' => '0 € deuda', 'who' => 'Negociación con BBVA · vivienda',  'where' => 'Acuerdo extrajudicial · NOV 2024' ),
		array( 'head' => 'CLÁUSULA SUELO','num'=> '34.200 €', 'who' => 'Devolución que canceló la ejecución','where'=>'JPI nº 5 Madrid · MAR 2025' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Has recibido',
	'hablemos_h2_em'    => 'una notificación de ejecución?',
	'hablemos_lead'     => 'Llámanos directamente al teléfono del despacho. En ejecuciones cada día cuenta — el plazo de oposición son 10 días. Si no es urgente, escríbenos y respondemos en 24h.',

	'form_select_legend'  => 'Tu situación',
	'form_select_options' => array(
		array( 'notificada',  'Ejecución notificada' ),
		array( 'preaviso',    'Carta del banco' ),
		array( 'subasta',     'Subasta señalada' ),
		array( 'lanzamiento', 'Lanzamiento' ),
		array( 'fiador',      'Soy fiador' ),
		array( 'preventiva',  'Consulta preventiva' ),
	),
);
include __DIR__ . '/inc/area-template-render.php';
