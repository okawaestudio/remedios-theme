<?php
/**
 * Template Name: Área de práctica
 *
 * Hero con bg image específico · Intro · Sub-secciones reales · Banks (si aplica) · FAQs · Form.
 * Mapeo por slug usando datos extraídos del sitio actual.
 *
 * @package Morillo
 */
get_header();

$pid       = get_the_ID();
$slug      = get_post_field( 'post_name', $pid );
$theme_uri = get_template_directory_uri();
$parent_id = wp_get_post_parent_id( $pid );
$parent    = $parent_id ? get_post( $parent_id ) : null;

/* ---------------------------------------------------------------
 * Mapping completo por slug — heros, sub-secciones, FAQs
 * ------------------------------------------------------------- */
$AREAS = array(
	'ley-de-segunda-oportunidad' => array(
		'hero_bg'   => 'hero/area-lso.jpg',
		'intro_h2'  => 'Recupera tu estabilidad financiera con la Ley de la Segunda Oportunidad',
		'intro_p1'  => 'Esta ley concursal permite obtener la cancelación total de sus deudas y empezar de nuevo sin ningún tipo de ataduras con las entidades bancarias. Gracias a ella, se pueden paralizar todos los embargos, condonación de deudas y aceptación de planes de pagos acordes a cada circunstancia económica.',
		'intro_p2'  => 'Se trata de un mecanismo jurídico diseñado para ofrecer soluciones a particulares y empresas que se encuentran en situación de insolvencia económica no disponiendo de un activo suficiente para hacer frente a las obligaciones financieras.',
		'intro_p3'  => 'El procedimiento puede parecer complejo, pero desde nuestro despacho te acompañamos de principio a fin, desde la recopilación de documentación hasta la negociación con los acreedores y la obtención del BEPI (Beneficio de Exoneración del Pasivo Insatisfecho), que es la clave para librarte definitivamente de tus deudas.',
		'intro_photo' => 'editorial/lso-personas.jpg',
		'intro_alt'   => 'Manos uniéndose · Ley de Segunda Oportunidad',
		'sections'  => array(),
		'faqs_title' => 'Ley de Segunda Oportunidad: requisitos',
		'faqs_lead'  => 'Estos son los requisitos básicos que la ley exige para poder acogerte al procedimiento.',
		'faqs' => array(
			array( 'q' => 'Estar en situación de insolvencia',     'a' => 'Debe tratarse de un deudor que no puede cumplir regularmente con sus obligaciones exigibles (insolvencia actual) o prevé que no podrá hacerlo (insolvencia inminente). Es el requisito básico para solicitar la declaración de concurso.' ),
			array( 'q' => 'Ser persona natural',                    'a' => 'Pueden acogerse tanto particulares como autónomos. También se permite la solicitud conjunta de ambos cónyuges (si ambos son deudores), especialmente en régimen de gananciales.' ),
			array( 'q' => 'Tener al menos dos acreedores diferentes', 'a' => 'No es suficiente tener una única deuda. La ley exige que existan deudas con al menos dos acreedores distintos, como pueden ser: entidades financieras, proveedores, organismos públicos, personas físicas…' ),
			array( 'q' => 'Actuar con buena fe',                    'a' => 'El deudor no podrá obtener la exoneración si incurre en alguna de las circunstancias recogidas en el artículo 487 TRLC.' ),
		),
	),

	'derecho-bancario' => array(
		'hero_bg'   => 'hero/area-bancario.webp',
		'intro_photo' => 'editorial/revolving.webp',
		'intro_alt'   => 'Reclamación bancaria',
		'intro_h2'  => 'Reclamaciones bancarias por las que ya hemos ganado sentencias firmes',
		'intro_p1'  => 'Llevamos años recurriendo cláusulas y productos abusivos de los principales bancos españoles. Cláusulas suelo, gastos de hipoteca, tarjetas revolving, IRPH, hipotecas multidivisa y comisiones bancarias indebidas son nuestros expedientes diarios.',
		'intro_p2'  => 'Trabajamos con honorarios mixtos (provisión inicial baja + a éxito), de manera que el cliente sabe desde el primer email cuánto va a pagar y por qué. Sin sorpresas en la minuta y sin compromisos a éxito 30%.',
		'sections'  => array(
			array( 'title' => 'Ley de Segunda Oportunidad', 'icon' => 'ley-2-oportunidad', 'href' => '/ley-de-segunda-oportunidad/',                  'desc' => 'Cancelación legal de deudas con bancos para personas físicas y autónomos. Acompañamos todo el proceso concursal hasta el BEPI.' ),
			array( 'title' => 'Tarjetas Revolving',         'icon' => 'tarjetas-revolving', 'href' => '/derecho-bancario/reclamar-tarjetas-revolving/', 'desc' => 'Anulación de tarjetas con TAE usuraria (Wizink, Carrefour, Cofidis…). Recuperación íntegra de los intereses pagados.' ),
			array( 'title' => 'Gastos Hipotecarios',        'icon' => 'gastos-hipotecarios', 'href' => '/derecho-bancario/gastos-hipotecarios-2/',     'desc' => 'Reclamación de gastos de formalización de hipoteca y comisión de apertura. Sentencias contra los principales bancos.' ),
		),
		'show_banks' => true,
	),

	'derecho-civil' => array(
		'hero_bg'   => 'hero/area-civil.webp',
		'intro_photo' => 'editorial/lso-firma.jpg',
		'intro_alt'   => 'Firma de documentos legales',
		'intro_h2'  => 'Asuntos civiles que tratamos cada día',
		'intro_p1'  => 'El derecho civil es transversal a la vida cotidiana: herencias, arrendamientos, ejecuciones hipotecarias, reclamaciones de cantidades, propiedad horizontal o responsabilidad civil.',
		'intro_p2'  => 'Acompañamos al cliente desde la primera consulta hasta la resolución, sea por vía amistosa o procesal. Cada expediente civil tiene matices únicos: por eso analizamos siempre la viabilidad antes de aceptar el encargo.',
		'sections' => array(
			array( 'title' => 'Ejecuciones Hipotecarias',    'icon' => 'ejecuciones-hipotecarias',    'href' => '/derecho-civil/ejecuciones-hipotecarias-madrid/',   'desc' => 'La ejecución hipotecaria es el procedimiento judicial por el cual se cobra la deuda de una hipoteca. Defendemos al cliente con oposición a la ejecución y acuerdos de quita.' ),
			array( 'title' => 'Desahucios y Arrendamientos', 'icon' => 'desahucios-y-arrendamientos', 'href' => '/derecho-civil/desahucios-y-arrendamientos-madrid/', 'desc' => 'La gestión de arrendamientos consiste en redactar, supervisar y asegurar el cumplimiento de los contratos entre arrendador y arrendatario, y procedimientos de desahucio.' ),
			array( 'title' => 'Herencias',                   'icon' => 'herencias',                   'href' => '/derecho-civil/herencias-malaga/',                   'desc' => 'La herencia es el conjunto de bienes, derechos y obligaciones que una persona deja al fallecer. Particiones, testamentos, declaraciones de herederos y conflictos sucesorios.' ),
		),
	),

	'derecho-mercantil' => array(
		'hero_bg'   => 'hero/area-mercantil.webp',
		'intro_photo' => 'editorial/lso-balanza.jpg',
		'intro_alt'   => 'Balanza de la justicia · Derecho mercantil',
		'intro_h2'  => 'Contratos, sociedades y concurso de acreedores',
		'intro_p1'  => 'Asesoramos a autónomos y pymes en la operativa diaria de su empresa: redacción y revisión de contratos mercantiles, asesoramiento societario continuado, conflictos entre socios, reclamación de impagos comerciales y procedimiento concursal.',
		'intro_p2'  => 'El concurso de acreedores no es el final; bien planificado es una herramienta para reorganizar la empresa y proteger su continuidad. Te explicamos las opciones reales antes de iniciar cualquier procedimiento.',
		'sections' => array(
			array( 'title' => 'Contratos Mercantiles',  'icon' => 'contratos-mercantiles', 'href' => '/derecho-mercantil/contratos-mercantiles-malaga/', 'desc' => 'Desde el despacho ofrecemos el asesoramiento jurídico individualizado de todo tipo de contratos entre empresarios: franquicias, compraventas de activos, colaboraciones, arrendamientos…' ),
			array( 'title' => 'Concurso de Acreedores', 'icon' => 'concurso-acreedores',   'href' => '/derecho-mercantil/concurso-de-acreedores/',     'desc' => 'Si eres autónomo o empresario y estás en quiebra, el concurso de acreedores es una solución vital para liquidar las deudas con trabajadores, entidades y terceras empresas.' ),
		),
		'show_banks' => true,
	),

	'derecho-penal' => array(
		'hero_bg'   => 'hero/area-penal.jpg',
		'intro_photo' => 'editorial/lso-personas.jpg',
		'intro_alt'   => 'Defensa legal',
		'intro_h2'  => 'Defensa penal con disponibilidad cuando más se necesita',
		'intro_p1'  => 'El derecho penal exige actuación rápida: detenciones, citaciones judiciales, juicios rápidos. Asesoramos al cliente desde el primer momento, con disponibilidad para asistencia letrada inmediata cuando es necesario.',
		'intro_p2'  => 'La confidencialidad es absoluta. Trabajamos cada caso con la máxima reserva y no publicamos detalles identificables sin autorización expresa por escrito.',
		'sections' => array(
			array( 'title' => 'Ocupaciones Ilegales', 'icon' => 'ocupaciones-ilegales', 'href' => '/derecho-penal/ocupaciones-ilegales-madrid/', 'desc' => 'El delito de usurpación se refiere al acto ilegal de apoderarse de un bien inmueble sin el consentimiento del propietario o sin contar con la debida autorización legal. Procedimientos de desalojo civil y penal.' ),
		),
	),

	'gestion-de-patrimonio' => array(
		'hero_bg'   => 'hero/area-patrimonio.jpg',
		'intro_photo' => 'editorial/lso-balanza.jpg',
		'intro_alt'   => 'Gestión de patrimonio',
		'intro_h2'  => 'Protege y planifica tu patrimonio con criterio jurídico',
		'intro_p1'  => 'El patrimonio de una empresa, una institución o persona física forma parte de su identidad. Estos bienes son historia pasada y presente y, por consiguiente, una oportunidad de futuro.',
		'intro_p2'  => 'El gestor de patrimonio combina derecho civil, fiscal y mercantil para proteger y transmitir activos con eficiencia. Trabajamos con personas con activos relevantes, familias empresariales y profesionales liberales que buscan planificar su patrimonio con visión a largo plazo.',
		'sections' => array(),
		'faqs_title' => '¿Tienes dudas? Aquí te las resolvemos',
		'faqs_lead'  => '',
		'faqs' => array(
			array( 'q' => '¿Qué es la gestión de patrimonio?',                                          'a' => 'Es el conjunto de servicios legales y financieros orientados a proteger, organizar y optimizar los bienes de una persona, familia o empresa, tanto presentes como futuros.' ),
			array( 'q' => '¿Por qué es importante contar con un abogado en la gestión de patrimonio?', 'a' => 'Porque garantiza que las decisiones se tomen con seguridad jurídica, evitando riesgos fiscales, sucesorios o contractuales, y asegurando la protección de los bienes frente a conflictos o reclamaciones.' ),
			array( 'q' => '¿Qué incluye la gestión patrimonial?',                                       'a' => 'Planificación sucesoria y herencias. Asesoramiento en inversiones y sociedades. Protección de bienes inmuebles. Fiscalidad y optimización tributaria. Prevención y resolución de conflictos legales.' ),
			array( 'q' => '¿Se puede proteger el patrimonio frente a deudas o embargos?',              'a' => 'Sí. Existen mecanismos legales (como capitulaciones matrimoniales, sociedades patrimoniales, donaciones planificadas o la Ley de Segunda Oportunidad) que permiten proteger parte del patrimonio frente a posibles deudas.' ),
			array( 'q' => '¿La gestión de patrimonio es solo para grandes fortunas?',                  'a' => 'No. Cualquier persona con bienes, inmuebles o negocio puede beneficiarse de una correcta planificación patrimonial para evitar conflictos futuros y optimizar la carga fiscal.' ),
			array( 'q' => '¿Es confidencial el servicio de gestión de patrimonio?',                    'a' => 'Sí. Toda la información y documentación está protegida por el deber profesional de secreto y confidencialidad del abogado.' ),
		),
	),

	/* ==================== SUB-PÁGINAS ==================== */

	'reclamar-tarjetas-revolving' => array(
		'hero_bg'     => 'hero/area-lso.jpg',
		'intro_photo' => 'editorial/revolving.webp',
		'intro_alt'   => 'Reclamar tarjeta revolving',
		'intro_h2'    => '¿Tienes una tarjeta revolving? Podrías estar pagando de más sin saberlo.',
		'intro_p1'    => 'Si tienes una tarjeta tipo Cofidis, Cetelem, Bankinter o Carrefour, seguramente lleves años pagando intereses abusivos que puedes recuperar. Estas tarjetas generan una relación crediticia envolvente, donde la deuda nunca termina de liquidarse. Lo que parece una solución rápida se convierte en una espiral.',
		'intro_p2'    => 'Las tarjetas revolving son productos que han sido objeto de múltiples sentencias por usura, en las que se reconoce el derecho del consumidor a recuperar los intereses pagados de más.',
		'intro_p3'    => 'Es importante actuar cuanto antes: si crees que estás atrapado en una deuda sin fin, podemos ayudarte a revisar tu contrato, reclamar lo cobrado indebidamente e incluso cancelar lo que te quede por pagar.',
	),

	'gastos-hipotecarios-2' => array(
		'hero_bg'     => 'hero/area-bancario.webp',
		'intro_photo' => 'editorial/lso-firma.jpg',
		'intro_alt'   => 'Gastos hipotecarios',
		'intro_h2'    => 'Recupera lo que el banco te cobró de más al firmar tu hipoteca',
		'intro_p1'    => 'Los gastos de formalización de hipoteca (notaría, registro, gestoría, tasación) y la comisión de apertura han sido declarados abusivos por sentencias firmes del Tribunal Supremo. Llevamos años recuperando esos importes para nuestros clientes con resoluciones favorables contra los principales bancos.',
		'intro_p2'    => 'La cuantía recuperable suele estar entre 1.500€ y 5.000€ por hipoteca, dependiendo del importe original y de cuándo se firmó. La acción no prescribe, así que aún es posible reclamar hipotecas firmadas hace años.',
	),

	'herencias-malaga' => array(
		'hero_bg'     => 'hero/area-civil.webp',
		'intro_photo' => 'editorial/lso-firma.jpg',
		'intro_alt'   => 'Herencias y testamentaría',
		'intro_h2'    => 'Herencias y sucesiones: lo que debes saber',
		'intro_p1'    => 'La herencia es el conjunto de bienes, derechos y obligaciones que una persona deja al fallecer. Desde el despacho asesoramos y representamos en procesos hereditarios tanto en la sucesión testamentaria como en la abintestato, siendo la primera cuando el causante deja un testamento válido, mientras que la segunda procede cuando no existe testamento.',
		'intro_p2'    => 'Nuestro trabajo incluye la gestión de la aceptación o renuncia de la herencia, el cálculo y liquidación del impuesto de sucesiones, la partición de bienes y, si es necesario, la defensa judicial frente a conflictos entre herederos.',
		'faqs_title'  => '¿Tienes dudas? Aquí te las resolvemos',
		'faqs_lead'   => '',
		'faqs' => array(
			array( 'q' => '¿Qué es la legítima y quiénes son los herederos forzosos?', 'a' => 'La legítima es la parte de la herencia que la ley reserva obligatoriamente para determinados familiares (hijos, padres y, en algunos casos, el cónyuge viudo). Esta porción no puede ser libremente dispuesta por el testador.' ),
			array( 'q' => '¿Puedo renunciar a una herencia?',                          'a' => 'Sí. El heredero puede renunciar ante notario. Esto ocurre a menudo cuando la herencia tiene más deudas que bienes.' ),
			array( 'q' => '¿Qué pasa si no hay testamento?',                            'a' => 'Se aplica la sucesión intestada o abintestato, regulada por el Código Civil. La ley establece el orden de herederos: primero descendientes, después ascendientes, luego cónyuge y por último parientes colaterales.' ),
			array( 'q' => '¿Cuánto cuesta el impuesto de sucesiones?',                  'a' => 'Depende de la comunidad autónoma, del valor de la herencia y del grado de parentesco. En Andalucía las bonificaciones para descendientes directos son muy elevadas, en muchos casos próximas al 99%.' ),
		),
	),

	'desahucios-y-arrendamientos-madrid' => array(
		'hero_bg'     => 'hero/area-civil.webp',
		'intro_photo' => 'editorial/lso-firma.jpg',
		'intro_alt'   => 'Desahucios y arrendamientos',
		'intro_h2'    => 'Arrendamientos y desahucios: tus derechos como propietario o inquilino',
		'intro_p1'    => 'La gestión de arrendamientos e inmuebles es una actividad clave dentro del sector inmobiliario y jurídico, que abarca desde la redacción y supervisión de contratos hasta el seguimiento del cumplimiento de las obligaciones entre arrendador y arrendatario.',
		'intro_p2'    => 'En este contexto, pueden surgir conflictos como la precariedad (ocupación sin título válido), el impago de rentas o el incumplimiento de condiciones contractuales, lo que obliga al propietario a iniciar procedimientos legales como el desahucio.',
		'intro_p3'    => 'Desde el despacho te ofrecemos asesoramiento completo: elaboración de contratos blindados, gestión de impagos, desahucios exprés, mediación entre arrendador e inquilino, y recuperación rápida del inmueble.',
		'faqs_title'  => 'Desahucios: preguntas frecuentes',
		'faqs' => array(
			array( 'q' => '¿Qué es un procedimiento de desahucio?',                    'a' => 'Es el procedimiento judicial que se inicia cuando el inquilino no paga la renta o incumple el contrato. El propietario puede recuperar la vivienda y reclamar las rentas adeudadas.' ),
			array( 'q' => '¿Cuánto tarda un desahucio en Madrid?',                      'a' => 'Un desahucio express por impago suele resolverse entre 4 y 8 meses, dependiendo de la carga del juzgado correspondiente. Si el inquilino no se opone formalmente, los plazos se reducen.' ),
			array( 'q' => '¿Puedo cobrar las rentas atrasadas?',                        'a' => 'Sí. El procedimiento de desahucio puede acumularse con la reclamación de las rentas debidas y otros gastos pendientes (suministros, daños, etc.).' ),
		),
	),

	'ejecuciones-hipotecarias-madrid' => array(
		'hero_bg'     => 'hero/area-lso.jpg',
		'intro_photo' => 'editorial/lso-balanza.jpg',
		'intro_alt'   => 'Ejecución hipotecaria',
		'intro_h2'    => 'Soluciones legales frente a ejecuciones hipotecarias',
		'intro_p1'    => 'La ejecución hipotecaria es el procedimiento judicial por el cual se cobra la deuda de una hipoteca. Se produce cuando hay un impago de varias cuotas consecutivas. Existen muchas salidas a esta situación tan delicada y métodos para paralizar que te arrebaten tu vivienda.',
		'intro_p2'    => 'Nuestra prioridad es preservar tu hogar. Por eso negociamos con los bancos, buscamos daciones en pago, reestructuraciones, moratorias y cualquier vía que evite perder tu vivienda. En caso de procedimiento judicial, defendemos tus intereses hasta el final.',
		'faqs_title'  => 'Ejecuciones hipotecarias: preguntas frecuentes',
		'faqs' => array(
			array( 'q' => '¿Qué es una ejecución hipotecaria?',                          'a' => 'Es el procedimiento judicial que inicia el banco cuando un deudor no paga la hipoteca. Tiene como objetivo recuperar la deuda a través de la venta forzosa del inmueble en pública subasta.' ),
			array( 'q' => '¿Puedo paralizar una ejecución hipotecaria?',                'a' => 'Sí. Existen mecanismos como la oposición a la ejecución por cláusulas abusivas, la suspensión por vulnerabilidad económica o la negociación de un acuerdo extrajudicial con el banco.' ),
			array( 'q' => '¿Qué es la dación en pago?',                                   'a' => 'Es entregar el inmueble al banco a cambio de la cancelación total de la deuda hipotecaria. Es una alternativa al procedimiento judicial y debe negociarse con la entidad.' ),
		),
	),

	'contratos-mercantiles-malaga' => array(
		'hero_bg'     => 'hero/area-lso.jpg',
		'intro_photo' => 'editorial/lso-firma.jpg',
		'intro_alt'   => 'Contratos mercantiles',
		'intro_h2'    => 'Contratos comerciales, con criterio legal',
		'intro_p1'    => 'Desde el despacho ofrecemos el asesoramiento jurídico individualizado de todo tipo de contratos entre empresarios: franquicias, compraventas de activos, colaboraciones entre empresas, contratos de suministros y la gestión de comercio internacional.',
		'intro_p2'    => 'Un contrato bien redactado es la mejor herramienta para prevenir disputas y proteger tus intereses. Nuestro objetivo es que cada acuerdo esté completamente adaptado a tus necesidades y se anticipe a posibles incumplimientos. Además, realizamos un seguimiento posterior para verificar su correcta ejecución.',
		'faqs_title'  => 'Contratos mercantiles: preguntas frecuentes',
		'faqs' => array(
			array( 'q' => '¿Qué es un contrato mercantil?',                              'a' => 'Es un acuerdo entre dos o más partes para realizar una actividad comercial, de prestación de servicios o de compraventa con fines empresariales.' ),
			array( 'q' => '¿Qué tipos de contratos mercantiles existen?',                'a' => 'Compraventa, suministro, distribución, franquicia, agencia, transporte, factoring, leasing, joint venture, prestación de servicios profesionales, entre otros.' ),
			array( 'q' => '¿Es obligatorio formalizar un contrato por escrito?',         'a' => 'Aunque la ley admite contratos verbales en algunos casos, formalizarlo por escrito es siempre recomendable: facilita la prueba en caso de disputa y permite anticipar todas las cláusulas relevantes.' ),
		),
	),

	'concurso-de-acreedores' => array(
		'hero_bg'     => 'hero/area-lso.jpg',
		'intro_photo' => 'editorial/lso-balanza.jpg',
		'intro_alt'   => 'Concurso de acreedores',
		'intro_h2'    => 'Concurso de acreedores: una herramienta para reorganizar tu empresa',
		'intro_p1'    => 'Si eres autónomo o empresario y estás en quiebra, el concurso de acreedores es una solución vital para liquidar las deudas contraídas con trabajadores, entidades y terceras empresas. Lo principal es presentar una reunificación acorde con el activo y el pasivo contraído.',
		'intro_p2'    => 'Este procedimiento permite paralizar embargos, suspender ejecuciones y reorganizar el negocio con apoyo judicial. Gestionamos todo el proceso: desde la solicitud del concurso voluntario, la elaboración del informe económico, la relación con acreedores, hasta la fase final.',
		'intro_p3'    => 'Nuestro objetivo es que salgas adelante o, si es necesario, que cierres tu empresa de forma ordenada y sin arrastrar deudas personales.',
		'faqs_title'  => 'Concurso de acreedores: preguntas frecuentes',
		'faqs' => array(
			array( 'q' => '¿Qué es un concurso de acreedores?',                          'a' => 'Es un procedimiento legal al que puede acudir una persona o empresa que no puede hacer frente a sus deudas. Su objetivo es reestructurar el pasivo o liquidar el patrimonio de forma ordenada.' ),
			array( 'q' => '¿Cuándo conviene presentar concurso voluntario?',             'a' => 'Cuando se prevé que la empresa no podrá cumplir con sus obligaciones de pago en los próximos 3 meses. Hacerlo a tiempo evita responsabilidades adicionales del administrador.' ),
			array( 'q' => '¿Qué pasa con mis deudas personales tras el concurso?',       'a' => 'Si cumples los requisitos de la Ley de Segunda Oportunidad, puedes obtener la exoneración total de las deudas restantes (BEPI), incluyendo deudas con Hacienda y Seguridad Social en muchos casos.' ),
		),
	),

	'ocupaciones-ilegales-madrid' => array(
		'hero_bg'     => 'hero/area-civil.webp',
		'intro_photo' => 'editorial/lso-personas.jpg',
		'intro_alt'   => 'Ocupaciones ilegales',
		'intro_h2'    => 'Asesoramiento especializado en casos de ocupación ilegal',
		'intro_p1'    => 'Desde el despacho actuamos con rapidez para denunciar el hecho ante los tribunales, solicitamos medidas cautelares para recuperar la posesión del inmueble lo antes posible y te acompañamos durante todo el proceso judicial.',
		'intro_p2'    => 'Nuestra experiencia nos permite identificar la vía más rápida (penal o civil) según el tipo de ocupación y las circunstancias del inmueble. Cada caso requiere una estrategia procesal específica.',
		'faqs_title'  => 'Ocupaciones: preguntas frecuentes',
		'faqs' => array(
			array( 'q' => '¿Qué es una ocupación ilegal de vivienda?', 'a' => 'Es cuando una persona entra y permanece en una vivienda sin autorización del propietario y sin título legal que lo justifique.' ),
			array( 'q' => '¿Qué hago si me han ocupado una vivienda?',  'a' => 'Lo primero es denunciar inmediatamente. Según el caso, se puede actuar por la vía penal (allanamiento de morada u ocupación ilegal) o por la vía civil para recuperar la posesión.' ),
			array( 'q' => '¿Qué diferencia hay entre allanamiento y ocupación?', 'a' => 'Allanamiento de morada: cuando se ocupa la vivienda habitual del propietario (delito grave). Ocupación de inmueble: cuando se ocupa una segunda residencia o inmueble desocupado (delito menor).' ),
		),
	),
);

$cfg = isset( $AREAS[ $slug ] ) ? $AREAS[ $slug ] : array();

$banks = array(
	array( 'name' => 'Santander', 'file' => 'santander.png' ),
	array( 'name' => 'BBVA',      'file' => 'bbva.png' ),
	array( 'name' => 'Caixabank', 'file' => 'caixabank.png' ),
	array( 'name' => 'Bankia',    'file' => 'bankia.png' ),
	array( 'name' => 'Bankinter', 'file' => 'bankinter.png' ),
	array( 'name' => 'Sabadell',  'file' => 'sabadell.png' ),
	array( 'name' => 'ING',       'file' => 'ing.png' ),
	array( 'name' => 'Abanca',    'file' => 'abanca.png' ),
	array( 'name' => 'Unicaja',   'file' => 'unicaja.png' ),
	array( 'name' => 'Kutxabank', 'file' => 'kutxabank.png' ),
);

$hero_bg     = ! empty( $cfg['hero_bg'] ) ? $theme_uri . '/assets/img/' . $cfg['hero_bg'] : '';
$intro_h2    = isset( $cfg['intro_h2'] ) ? $cfg['intro_h2'] : '';
$intro_p1    = isset( $cfg['intro_p1'] ) ? $cfg['intro_p1'] : '';
$intro_p2    = isset( $cfg['intro_p2'] ) ? $cfg['intro_p2'] : '';
$intro_p3    = isset( $cfg['intro_p3'] ) ? $cfg['intro_p3'] : '';
$intro_photo = ! empty( $cfg['intro_photo'] ) ? $theme_uri . '/assets/img/' . $cfg['intro_photo'] : '';
$intro_alt   = isset( $cfg['intro_alt'] )   ? $cfg['intro_alt'] : 'Imagen ilustrativa';
$sections    = isset( $cfg['sections'] ) ? $cfg['sections'] : array();
$show_banks  = ! empty( $cfg['show_banks'] );
$faqs        = isset( $cfg['faqs'] ) ? $cfg['faqs'] : array();
$faqs_title  = isset( $cfg['faqs_title'] ) ? $cfg['faqs_title'] : 'Preguntas frecuentes';
$faqs_lead   = isset( $cfg['faqs_lead'] ) ? $cfg['faqs_lead'] : '';

while ( have_posts() ) : the_post(); ?>

<article class="ed-page ed-area">

	<!-- ============== PAGE HERO con foto temática de fondo + overlay azul ============== -->
	<section class="rm-page-hero" <?php if ( $hero_bg ) : ?>style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');"<?php endif; ?>>
		<div class="rm-page-hero__overlay" aria-hidden="true"></div>
		<div class="container rm-page-hero__inner">
			<nav class="rm-breadcrumb rm-breadcrumb--inverse" aria-label="<?php esc_attr_e( 'Migas de pan', 'morillo' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'morillo' ); ?></a>
				<span aria-hidden="true">/</span>
				<?php if ( $parent ) : ?>
					<a href="<?php echo esc_url( get_permalink( $parent ) ); ?>"><?php echo esc_html( get_the_title( $parent ) ); ?></a>
					<span aria-hidden="true">/</span>
				<?php endif; ?>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>

			<span class="rm-page-hero__eyebrow"><?php echo $parent ? esc_html__( 'Sub-área', 'morillo' ) : esc_html__( 'Área de práctica', 'morillo' ); ?></span>
			<h1 class="rm-page-hero__title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="rm-page-hero__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php elseif ( $intro_p1 ) : ?>
				<p class="rm-page-hero__lead"><?php echo esc_html( wp_trim_words( $intro_p1, 28, '…' ) ); ?></p>
			<?php endif; ?>
			<div class="rm-page-hero__ctas">
				<a href="#contacto-form" class="btn btn-primary">
					<?php esc_html_e( 'Consulta gratuita', 'morillo' ); ?> <?php morillo_arrow(); ?>
				</a>
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="btn btn-ghost-light">
					<?php echo esc_html( MORILLO_PHONE ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- ============== INTRO: texto + foto editorial ============== -->
	<?php if ( $intro_h2 || $intro_p1 ) : ?>
	<section class="ed-area__intro <?php echo $intro_photo ? 'ed-area__intro--split' : ''; ?>">
		<div class="container ed-area__intro-inner">
			<div class="ed-area__intro-text">
				<?php if ( $intro_h2 ) : ?>
					<span class="ed-eyebrow"><?php esc_html_e( 'Sobre el área', 'morillo' ); ?></span>
					<h2 class="ed-h-section ed-area__intro-title"><?php echo esc_html( $intro_h2 ); ?></h2>
				<?php endif; ?>
				<div class="ed-area__intro-prose">
					<?php if ( $intro_p1 ) : ?><p><?php echo esc_html( $intro_p1 ); ?></p><?php endif; ?>
					<?php if ( $intro_p2 ) : ?><p><?php echo esc_html( $intro_p2 ); ?></p><?php endif; ?>
					<?php if ( $intro_p3 ) : ?><p><?php echo esc_html( $intro_p3 ); ?></p><?php endif; ?>
				</div>
			</div>
			<?php if ( $intro_photo ) : ?>
				<div class="ed-area__intro-photo">
					<img src="<?php echo esc_url( $intro_photo ); ?>" alt="<?php echo esc_attr( $intro_alt ); ?>" loading="lazy" decoding="async">
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $sections ) ) : ?>
	<!-- ============== SUB-SECCIONES (estilo cards editoriales) ============== -->
	<section class="ed-area__sub">
		<div class="container">
			<header class="ed-area__sub-head">
				<span class="ed-eyebrow"><?php esc_html_e( 'Especialidades del área', 'morillo' ); ?></span>
				<h2 class="ed-h-section"><?php
					printf( esc_html__( 'Cómo te ayudamos en %s', 'morillo' ), esc_html( strtolower( get_the_title( $pid ) ) ) );
				?></h2>
			</header>
			<div class="ed-area__sub-grid" data-cols="<?php echo (int) count( $sections ); ?>">
				<?php foreach ( $sections as $i => $sa ) :
					$icon_path = get_template_directory() . '/assets/img/subareas/' . $sa['icon'] . '.svg';
					$svg_raw   = file_exists( $icon_path ) ? file_get_contents( $icon_path ) : '';
					$svg       = $svg_raw ? morillo_render_inline_svg(
						$svg_raw,
						array(
							'prefix' => 'subicon-' . preg_replace( '/[^a-z0-9]/i', '', $sa['icon'] ),
							'class'  => 'ed-area__sub-svg',
							'width'  => 36,
						)
					) : '';
				?>
					<a href="<?php echo esc_url( home_url( $sa['href'] ) ); ?>" class="ed-area__sub-card">
						<div class="ed-area__sub-head-row">
							<span class="ed-mono">0<?php echo esc_html( $i + 1 ); ?></span>
							<div class="ed-area__sub-icon"><?php echo $svg; ?></div>
						</div>
						<h3 class="ed-area__sub-title"><?php echo esc_html( $sa['title'] ); ?></h3>
						<p class="ed-area__sub-desc"><?php echo esc_html( $sa['desc'] ); ?></p>
						<span class="ed-area__sub-action"><?php esc_html_e( 'Ver detalle', 'morillo' ); ?> <span class="ed-btn__arrow">→</span></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $show_banks ) : ?>
	<!-- ============== RECLAMAMOS A ESTOS BANCOS ============== -->
	<section class="ed-area__banks">
		<div class="container">
			<header class="ed-area__banks-head">
				<span class="ed-eyebrow"><?php esc_html_e( 'Reclamamos a todos los bancos', 'morillo' ); ?></span>
				<h2 class="ed-h-section"><?php esc_html_e( 'Sentencias firmes contra las principales entidades.', 'morillo' ); ?></h2>
			</header>
			<div class="ed-area__banks-grid">
				<?php foreach ( $banks as $b ) : ?>
					<div class="ed-area__bank">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/banks/' . $b['file'] ); ?>" alt="<?php echo esc_attr( $b['name'] ); ?>" loading="lazy">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $faqs ) ) : ?>
	<!-- ============== FAQs editoriales ============== -->
	<section class="ed-area__faqs">
		<div class="container">
			<header class="ed-area__faqs-head">
				<span class="ed-eyebrow"><?php esc_html_e( 'Preguntas frecuentes', 'morillo' ); ?></span>
				<h2 class="ed-h-section"><?php echo esc_html( $faqs_title ); ?></h2>
				<?php if ( $faqs_lead ) : ?><p class="ed-body" style="margin-top:14px"><?php echo esc_html( $faqs_lead ); ?></p><?php endif; ?>
			</header>
			<div class="ed-area__faqs-list">
				<?php foreach ( $faqs as $i => $f ) : ?>
					<details class="ed-faq" <?php if ( $i === 0 ) echo 'open'; ?>>
						<summary class="ed-faq__q">
							<span class="ed-mono ed-faq__num">0<?php echo esc_html( $i + 1 ); ?></span>
							<span class="ed-faq__qtext"><?php echo esc_html( $f['q'] ); ?></span>
							<span class="ed-faq__plus" aria-hidden="true">+</span>
						</summary>
						<div class="ed-faq__a"><p><?php echo esc_html( $f['a'] ); ?></p></div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<script type="application/ld+json">
	<?php
	echo wp_json_encode( array(
		'@context' => 'https://schema.org',
		'@type'    => 'FAQPage',
		'mainEntity' => array_map( function( $f ) {
			return array(
				'@type' => 'Question',
				'name'  => $f['q'],
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $f['a'] ),
			);
		}, $faqs ),
	), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
	?>
	</script>
	<?php endif; ?>

	<?php morillo_reviews_section( array( 'compact' => true ) ); ?>

	<!-- ============== CONTACT EDITORIAL ============== -->
	<section class="ed-area__contact" id="contacto-form">
		<div class="container">
			<div class="ed-area__contact-grid">
				<div>
					<span class="ed-eyebrow"><?php esc_html_e( 'Hablemos', 'morillo' ); ?></span>
					<h2 class="ed-h-display ed-area__contact-title"><?php
						printf( esc_html__( '¿Tu situación de %s?', 'morillo' ), esc_html( strtolower( get_the_title( $pid ) ) ) );
					?></h2>
					<p class="ed-body"><?php esc_html_e( 'Cuéntanos tu caso. Análisis de viabilidad gratuito y honesto en menos de 24h. Confidencial · sin compromiso.', 'morillo' ); ?></p>
					<div class="ed-home__cta-row" style="margin-top:28px;">
						<a href="#ed-form" class="ed-btn ed-btn--primary">Pedir consulta <span class="ed-btn__arrow">→</span></a>
						<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="ed-btn ed-btn--ghost">Llamar al <?php echo esc_html( MORILLO_PHONE ); ?></a>
					</div>
				</div>
				<div id="ed-form">
					<?php morillo_contact_form( array(
						'eyebrow' => __( 'Formulario', 'morillo' ),
						'title'   => __( 'Cuéntanos tu situación', 'morillo' ),
						'lead'    => __( 'Confidencial · sin compromiso.', 'morillo' ),
					) ); ?>
				</div>
			</div>
		</div>
	</section>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>
