<?php
/**
 * Template Name: Desahucios Madrid v2 (sub-área Civil)
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-civil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-civil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-civil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Desahucio por impago', 'd' => 'Procedimiento monitorio + verbal de desahucio. Lanzamiento ejecutivo en juzgado correspondiente. Recuperación de la vivienda en 4-12 meses según juzgado.', 'tag' => 'Monitorio · verbal · lanzamiento' ),
	array( 'n' => '02', 't' => 'Desahucio por expiración', 'd' => 'Cuando termina la duración legal del contrato (5 años LAU 2019) y el inquilino no se va. Procedimiento más rápido que el de impago.', 'tag' => 'LAU · 5 años · prórroga' ),
	array( 'n' => '03', 't' => 'Reclamación de rentas atrasadas', 'd' => 'Acumulada al desahucio o procedimiento monitorio independiente. Recuperamos también gastos de luz, agua y comunidad si quedan impagados.', 'tag' => 'Rentas · suministros · comunidad' ),
	array( 'n' => '04', 't' => 'Defensa del inquilino', 'd' => 'Frente a desahucios injustos: enervación, oposición por defectos formales, alegación de cláusulas abusivas en el contrato. Suspensiones por vulnerabilidad.', 'tag' => 'Enervación · oposición · vulnerabilidad' ),
	array( 'n' => '05', 't' => 'Redacción y revisión de contratos LAU', 'd' => 'Cláusulas blindadas para propietario o inquilino: actualización IPC, fianzas adicionales, garantías, prohibición de subarriendo, régimen de obras.', 'tag' => 'IPC · fianza · obras' ),
	array( 'n' => '06', 't' => 'Procedimiento exprés ocupaciones', 'd' => 'Si el ocupante no acredita título habilitante (Ley 5/2018). Vía civil exprés alternativa o complementaria a la vía penal por usurpación.', 'tag' => 'Ley 5/2018 · usurpación · exprés' ),
);
$relacionadas = array(
	array( 'n' => '06', 't' => 'Derecho Penal', 'd' => 'Ocupaciones ilegales por vía penal (allanamiento, usurpación)', 'href' => '/derecho-penal/ocupaciones-ilegales-madrid/' ),
	array( 'n' => '05', 't' => 'Derecho Civil', 'd' => 'Otros procedimientos civiles relacionados',                  'href' => '/derecho-civil/' ),
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Si el desahucio es por ejecución hipotecaria',           'href' => '/derecho-civil/ejecuciones-hipotecarias-madrid/' ),
);
$faqs = array(
	array( 'q' => '¿Cuánto tarda un desahucio por impago en Madrid?',                  'a' => 'Entre 4 y 8 meses si no hay oposición y el inquilino no enerva. Con oposición y juicio verbal: 9-15 meses. Madrid tiene los juzgados más saturados de España, por lo que los plazos se alargan; en municipios pequeños del extrarradio puede ser más rápido.' ),
	array( 'q' => '¿Qué es la enervación?',                                            'a' => 'El inquilino puede paralizar el desahucio pagando la renta atrasada antes de la vista judicial. Solo se puede enervar UNA VEZ por contrato; si vuelve a impagar, el siguiente desahucio ya no se puede paralizar y procede el lanzamiento.' ),
	array( 'q' => 'Mi inquilino dice que es vulnerable. ¿Puede paralizar el desahucio?', 'a' => 'Tras los Reales Decretos COVID y la Ley 12/2023 de Vivienda, los juzgados pueden suspender el lanzamiento de inquilinos vulnerables (familias con menores, mayores de 65, dependientes) hasta que servicios sociales ofrezca alternativa habitacional. Habitualmente 1-3 meses adicionales.' ),
	array( 'q' => '¿Cuánto cuesta un desahucio?',                                      'a' => 'Honorarios cerrados desde 600-900 € + IVA según juzgado y complejidad. A esto se suma la tasa judicial (300 €) y procurador (200-400 €). Costas: si ganamos sin allanamiento, el inquilino paga las costas — recuperables si tiene patrimonio.' ),
	array( 'q' => '¿Puedo cortar el agua o la luz al inquilino que no paga?',          'a' => 'NO. Es delito de coacciones (art. 172 CP) y puede valerle al propietario una denuncia penal y costas adicionales. La única vía legal es el procedimiento judicial de desahucio. Aguantar la frustración mientras tramita es parte del coste.' ),
	array( 'q' => '¿Qué pasa con la fianza?',                                          'a' => 'La fianza (1 mensualidad de renta para vivienda habitual, art. 36 LAU) está destinada a cubrir desperfectos y rentas pendientes. Tras el lanzamiento la imputamos a la deuda; si queda un saldo a favor del propietario, se reclama por vía monitoria.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'desahucios-madrid',
	'area_label'        => 'Desahucios y Arrendamientos en Madrid',
	'area_num'          => '',
	'parent_label'      => 'Derecho Civil',
	'parent_url'        => home_url( '/derecho-civil/' ),
	'eyebrow_override'  => 'SUB-ÁREA · DESAHUCIOS · MADRID',

	'hero_title_main'   => 'Tu inquilino no paga.',
	'hero_title_em'     => 'Recuperamos tu vivienda.',
	'hero_lead'         => 'Procedimiento monitorio de desahucio por impago, expiración del contrato u ocupación. Defendemos también al inquilino frente a desahucios injustos. Madrid: 4-12 meses según juzgado.',
	'hero_cta_primary'  => 'Iniciar el desahucio',
	'microstats'        => array(
		array( 'DESAHUCIOS', '95+' ),
		array( 'PLAZO MAD',  '4–12m' ),
		array( 'ÉXITO',      '92%' ),
	),

	'whatis_legal_ref'  => 'Asesoramiento al amparo de la Ley de Arrendamientos Urbanos (Ley 29/1994), Ley de Enjuiciamiento Civil (procedimiento verbal de desahucio), Ley 5/2018 de procedimiento exprés y Ley 12/2023 por el Derecho a la Vivienda.',
	'whatis_pull'       => 'En desahucios, lo importante no es la sentencia: es el día del lanzamiento. Y eso depende del juzgado.',
	'whatis_h2_main'    => 'Madrid: la jurisdicción',
	'whatis_h2_em'      => 'más saturada de España.',
	'whatis_p1'         => 'Madrid concentra <strong>el 25% de los desahucios civiles del país</strong>. Los juzgados de Primera Instancia están saturados y los plazos se alargan. Conocemos los criterios y la velocidad de cada juzgado de la capital y de los municipios del Sur (Móstoles, Fuenlabrada, Leganés, Getafe).',
	'whatis_p2'         => 'Tramitamos desahucios para propietarios y defendemos a inquilinos en situación de vulnerabilidad. La Ley de Vivienda 12/2023 ha añadido suspensiones por vulnerabilidad que conviene conocer antes de presentar la demanda — para que la estrategia procesal sea realista.',

	'author_chip'       => '+95 DESAHUCIOS · MADRID',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y conozco los juzgados de Madrid.',
	'author_p1'         => 'Sede física en Calle Valenzuela 8, 1ª Derecha (28014 Madrid). Esto nos permite presentar escritos en mano cuando es crítico, asistir a vistas presenciales y desplazarnos a recibir lanzamientos junto al procurador y la comisión judicial.',
	'author_p2'         => 'Trabajamos con <strong>honorarios cerrados</strong> en desahucios estándar y con presupuesto adicional si surge oposición compleja. Te entrego presupuesto por escrito antes de presentar la demanda — sin sorpresas en costas o gastos sobrevenidos.',

	'serv_eyebrow'      => 'SERVICIOS',
	'serv_h2_main'      => 'Seis frentes',
	'serv_h2_em'        => 'arrendaticios.',
	'serv_meta'         => 'Asesoramiento desde la redacción del contrato hasta el lanzamiento del inquilino moroso.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Desahucios cerrados en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'LANZAMIENTO',     'num' => '4 meses', 'who' => 'Vivienda Móstoles · 14 mensualidades',  'where' => 'JPI nº 3 Móstoles · ENE 2025' ),
		array( 'head' => 'RENTAS COBRADAS', 'num' => '18.420 €', 'who' => 'Reclamación + lanzamiento Madrid',     'where' => 'JPI nº 19 Madrid · NOV 2024' ),
		array( 'head' => 'EXPIRACIÓN',      'num' => '7 meses', 'who' => 'Inquilino sin enervación posible',     'where' => 'JPI nº 5 Leganés · OCT 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Tu inquilino',
	'hablemos_h2_em'    => 'no paga o no se va?',
	'hablemos_lead'     => 'Cuéntanos los detalles (cuándo dejó de pagar, si está en vivienda habitual, si has avisado por burofax). En 24h te decimos plazos estimados y coste — siempre por escrito.',

	'form_select_legend'  => 'Tu situación',
	'form_select_options' => array(
		array( 'impago',         'Impago de rentas' ),
		array( 'expiracion',     'Fin de contrato' ),
		array( 'ocupacion',      'Ocupación sin contrato' ),
		array( 'inquilino',      'Soy el inquilino' ),
		array( 'contrato',       'Redactar contrato' ),
		array( 'reclamacion',    'Reclamar rentas atrasadas' ),
	),
);
include __DIR__ . '/inc/area-template-render.php';
