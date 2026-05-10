<?php
/**
 * Template Name: Contratos mercantiles Málaga v2 (sub-área Mercantil)
 * @package Morillo
 */
get_header();
$theme_uri  = get_template_directory_uri();
$bg_webp_lg = $theme_uri . '/assets/img/hero/area-mercantil.webp';
$bg_webp_md = $theme_uri . '/assets/img/hero/area-mercantil-1280.webp';
$bg_webp_sm = $theme_uri . '/assets/img/hero/area-mercantil-720.webp';

$servicios = array(
	array( 'n' => '01', 't' => 'Compraventa empresarial', 'd' => 'SPA (share purchase agreement) o APA (asset purchase agreement). Garantías, manifestaciones, cláusulas de earn-out, cierre escalonado.', 'tag' => 'SPA · APA · earn-out · cierre' ),
	array( 'n' => '02', 't' => 'Distribución y agencia', 'd' => 'Contratos de distribución exclusiva, agencia comercial, comisión mercantil. Cumplimiento de Ley del Contrato de Agencia (Ley 12/1992).', 'tag' => 'Exclusiva · agencia · comisión' ),
	array( 'n' => '03', 't' => 'Suministro y prestación de servicios', 'd' => 'Contratos B2B continuados: suministro de bienes, externalización de servicios, mantenimiento, SaaS. Penalizaciones, SLA, terminación anticipada.', 'tag' => 'B2B · SLA · terminación' ),
	array( 'n' => '04', 't' => 'Joint-venture y consorcios', 'd' => 'Acuerdos de colaboración entre empresas. Reparto de inversión, control corporativo, salida y disolución. UTE para licitaciones públicas.', 'tag' => 'JV · UTE · consorcio' ),
	array( 'n' => '05', 't' => 'Franquicia', 'd' => 'Acuerdo de franquicia y manuales asociados. Cumplimiento del RD 201/2010, registro en RFE, cláusulas de no competencia post-contractual.', 'tag' => 'RD 201/2010 · RFE · no-competencia' ),
	array( 'n' => '06', 't' => 'Resolución de conflictos contractuales', 'd' => 'Reclamación por incumplimiento, terminación unilateral, indemnización por clientela en agencia. Mediación previa o procedimiento judicial.', 'tag' => 'Incumplimiento · clientela · mediación' ),
);
$relacionadas = array(
	array( 'n' => '03', 't' => 'Derecho Mercantil', 'd' => 'Concurso, conflictos societarios, M&A',           'href' => '/derecho-mercantil/' ),
	array( 'n' => '04', 't' => 'Gestión de Patrimonio', 'd' => 'Estructura patrimonial óptima para contratos B2B', 'href' => '/gestion-de-patrimonio/' ),
	array( 'n' => '02', 't' => 'Derecho Bancario', 'd' => 'Productos bancarios para empresas y reclamaciones',  'href' => '/derecho-bancario/' ),
);
$faqs = array(
	array( 'q' => '¿Cuándo conviene un abogado para un contrato mercantil?',          'a' => 'Siempre que el importe supere los 10.000 €, el contrato dure más de 1 año, o haya pluralidad de partes. Una hora de revisión inicial (200-400 €) puede ahorrarte un litigio futuro de 30.000 €. La firma sin revisión es de los errores más caros que hace una pyme.' ),
	array( 'q' => '¿Qué cláusulas son las más críticas?',                              'a' => 'Objeto detallado, precio y forma de pago, plazo, exclusividad si aplica, penalizaciones por incumplimiento, fuero y ley aplicable, confidencialidad, cláusula de resolución (¿qué pasa si una parte incumple?) y mecanismo de resolución de disputas (arbitraje vs jurisdicción).' ),
	array( 'q' => '¿Es mejor arbitraje o jurisdicción ordinaria?',                    'a' => 'Arbitraje: más rápido (3-6 meses vs 1-2 años), confidencial, único laudo (no apelable), pero coste fijo elevado (5.000-15.000 €). Jurisdicción: más lento, abierto al público, coste menor por escalado, recursos hasta TS. Para B2B con cuantía media-alta solemos recomendar arbitraje.' ),
	array( 'q' => '¿Qué es la indemnización por clientela en un contrato de agencia?', 'a' => 'Cuando un agente comercial termina su contrato (por causa imputable al empresario o expiración), tiene derecho a una indemnización por la clientela aportada al empresario. Cuantía máxima: media de las últimas 5 anualidades (art. 28 Ley 12/1992). Es una indemnización IRRENUNCIABLE en contrato.' ),
	array( 'q' => '¿Cuánto cuesta redactar un contrato mercantil?',                   'a' => 'Contratos sencillos (suministro, prestación de servicios B2B): 400-800 €. Contratos complejos (distribución exclusiva, JV, franquicia): 1.500-4.000 €. SPA en M&A: 5.000-25.000 € según envergadura. Te entrego presupuesto cerrado tras la primera reunión.' ),
	array( 'q' => '¿Puedo usar plantillas de internet para mis contratos?',           'a' => 'Para contratos de bajísima cuantía (<3.000 €) y baja complejidad, quizás. Para todo lo demás, NO. Las plantillas suelen tener cláusulas obsoletas, fuero incorrecto para tu caso o lagunas que el contrato deja a la regulación supletoria — que casi siempre te perjudica.' ),
);
$provincias = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza');

$cfg = array(
	'slug_area'         => 'contratos-mercantiles-malaga',
	'area_label'        => 'Contratos Mercantiles en Málaga',
	'area_num'          => '',
	'parent_label'      => 'Derecho Mercantil',
	'parent_url'        => home_url( '/derecho-mercantil/' ),
	'eyebrow_override'  => 'SUB-ÁREA · CONTRATOS MERCANTILES · MÁLAGA',

	'hero_title_main'   => 'Tu contrato',
	'hero_title_em'     => 'es tu mejor seguro.',
	'hero_lead'         => 'Redacción y revisión de contratos mercantiles para autónomos, pymes y empresas familiares de Málaga: compraventa, distribución, agencia, suministro, joint-venture y franquicia.',
	'hero_cta_primary'  => 'Revisión gratuita',
	'microstats'        => array(
		array( 'CONTRATOS', '500+' ),
		array( 'PYMES',     '120+' ),
		array( 'M&A',       '15+' ),
	),

	'whatis_legal_ref'  => 'Asesoramiento al amparo del Código de Comercio, Código Civil (parte general de obligaciones), Ley 12/1992 del Contrato de Agencia, Ley 7/1996 de Comercio Minorista y normativa europea de contratos mercantiles.',
	'whatis_pull'       => 'Una hora de revisión te puede ahorrar un pleito de cinco años. Y mucho dinero.',
	'whatis_h2_main'    => 'Málaga: epicentro',
	'whatis_h2_em'      => 'tecnológico y turístico.',
	'whatis_p1'         => 'Málaga concentra una <strong>economía dinámica</strong>: Polo Digital, hotelería, turismo y construcción. Eso significa muchos contratos mercantiles: SaaS B2B, contratos de distribución, alquileres turísticos, joint-ventures, contratos de obra. Bien planteados, son tu protección. Mal planteados, tu pesadilla.',
	'whatis_p2'         => 'Sede física en Calle Cárcer 1, 1º Izquierda (29008 Málaga). Atendemos en persona reuniones de negociación con la otra parte cuando es estratégico — el contrato se cierra mejor en una sala de reuniones que por email.',

	'author_chip'       => '+500 CONTRATOS REVISADOS',
	'author_h2_em'      => 'Remedios Morillo',
	'author_h2_rest'    => ', y conozco la economía malagueña.',
	'author_p1'         => 'Hemos asesorado a empresas malagueñas del Polo Digital, hostelería, restauración, distribución alimentaria y construcción. Conozco las particularidades del mercado local: estacionalidad turística, dependencia de plataformas (Booking, Uber Eats), riesgos del IVA en contratos B2B con clientes intracomunitarios.',
	'author_p2'         => 'Trabajamos con <strong>honorarios cerrados</strong> por contrato o iguala mensual para empresas con flujo regular de operaciones. Plantilla propia de cláusulas adaptada a la jurisprudencia más reciente — no contratos genéricos descargados.',

	'serv_eyebrow'      => 'SERVICIOS',
	'serv_h2_main'      => 'Seis tipos',
	'serv_h2_em'        => 'de contrato mercantil.',
	'serv_meta'         => 'Cada contrato se redacta o revisa adaptado al sector, la cuantía y la duración. Sin plantillas genéricas.',

	'vics_eyebrow'      => 'CASOS RECIENTES',
	'vics_h2'           => 'Operaciones cerradas en 2024-2025.',
	'vics_cards'        => array(
		array( 'head' => 'M&A',         'num' => '1,2 M €',   'who' => 'Compraventa pyme tech · Polo Digital', 'where' => 'Operación privada · MAY 2024' ),
		array( 'head' => 'DISTRIBUCIÓN','num' => '12 países', 'who' => 'Exclusiva agroalimentaria · Málaga',   'where' => 'Acuerdo cerrado · ENE 2025' ),
		array( 'head' => 'CLIENTELA',   'num' => '85.000 €',  'who' => 'Indemnización agente comercial',       'where' => 'JM nº 1 Málaga · NOV 2024' ),
	),
	'vics_more_label'   => 'Ver todos los casos',

	'hablemos_h2_main'  => '¿Tienes un contrato',
	'hablemos_h2_em'    => 'que firmar o revisar?',
	'hablemos_lead'     => 'Mándanos el borrador o cuéntanos qué necesitas. En 24h te decimos qué cambios introduciríamos y qué riesgos te ahorra cada uno — siempre por escrito.',

	'form_select_legend'  => 'Tipo de necesidad',
	'form_select_options' => array(
		array( 'redaccion',  'Redactar contrato' ),
		array( 'revision',   'Revisar contrato' ),
		array( 'm-and-a',    'M&A · compraventa' ),
		array( 'distribuc',  'Distribución / agencia' ),
		array( 'franquicia', 'Franquicia' ),
		array( 'conflicto',  'Conflicto contractual' ),
	),
);
include __DIR__ . '/inc/area-template-render.php';
