<?php
/**
 * Seed: 9 casos representativos en CPT casos_exito.
 *
 * USAGE: wp eval-file wp-content/themes/morillo/tools/seed-casos.php
 *
 * Idempotente: si ya existe un caso con la misma _morillo_ref, lo
 * actualiza en lugar de duplicar.
 */

$seeds = array(
	array(
		'title'       => 'Autónomo, 5 acreedores, 7 meses',
		'content'     => 'Cancelación íntegra de deuda con bancos y AEAT vía concurso consecutivo. Cliente recuperó su actividad seis meses después.',
		'ref'         => 'EXP-LSO-2024-118', 'cifra' => '87.420 €',
		'sub'         => 'Segunda Oportunidad',
		'juzgado'     => 'JM nº 6 Madrid',   'fecha' => 'OCT 2025',
		'area'        => 'segunda-oportunidad',
	),
	array(
		'title'       => 'IRPH abusivo · CaixaBank',
		'content'     => 'Reclamación contra entidad por hipoteca con cláusula IRPH abusiva. Sentencia firme tras STJUE 2024.',
		'ref'         => 'EXP-IRPH-2023-044', 'cifra' => '14.860 €',
		'sub'         => 'Bancario · IRPH',
		'juzgado'     => 'AP Málaga',         'fecha' => 'ENE 2025',
		'area'        => 'bancario',
	),
	array(
		'title'       => 'Herencia conflictiva · 3 herederos',
		'content'     => 'Acuerdo extrajudicial tras dos meses de mediación. Reparto equilibrado evitando juicio y costas.',
		'ref'         => 'EXP-CIV-2024-067', 'cifra' => '52.300 €',
		'sub'         => 'Civil · Herencias',
		'juzgado'     => 'JPI Madrid',        'fecha' => 'NOV 2024',
		'area'        => 'civil',
	),
	array(
		'title'       => 'Madre con dos menores · LSO',
		'content'     => 'BEPI concedido en menos de 6 meses. Mecanismos de protección de la vivienda habitual aplicados.',
		'ref'         => 'EXP-LSO-2025-074', 'cifra' => '52.198 €',
		'sub'         => 'Segunda Oportunidad',
		'juzgado'     => 'JM nº 1 Tarragona', 'fecha' => 'MAY 2025',
		'area'        => 'segunda-oportunidad',
	),
	array(
		'title'       => 'Tarjeta revolving Cetelem 9 años',
		'content'     => 'Anulación íntegra por usura (TAE 27,8%). Devolución de intereses, comisiones y seguros desde origen.',
		'ref'         => 'EXP-REV-2025-052', 'cifra' => '22.140 €',
		'sub'         => 'Bancario · Revolving',
		'juzgado'     => 'JPI nº 4 Madrid',   'fecha' => 'OCT 2024',
		'area'        => 'bancario',
	),
	array(
		'title'       => 'Restauración · concurso voluntario',
		'content'     => 'Convenio aprobado con quita del 40% y espera de 4 años. Empresa en funcionamiento, 12 empleos preservados.',
		'ref'         => 'EXP-MERC-2024-021', 'cifra' => '380.000 €',
		'sub'         => 'Mercantil · Concurso',
		'juzgado'     => 'JM nº 2 Málaga',     'fecha' => 'OCT 2024',
		'area'        => 'mercantil',
	),
	array(
		'title'       => 'Accidente tráfico · baremo Ley 35/2015',
		'content'     => 'Acuerdo extrajudicial con compañía aseguradora. Indemnización por días de baja y secuelas permanentes.',
		'ref'         => 'EXP-CIV-2025-019',  'cifra' => '38.450 €',
		'sub'         => 'Civil · Tráfico',
		'juzgado'     => 'Acuerdo extrajudicial', 'fecha' => 'OCT 2024',
		'area'        => 'civil',
	),
	array(
		'title'       => 'Allanamiento · vivienda habitual Madrid centro',
		'content'     => 'Recuperación exprés de vivienda en Madrid centro. Procedimiento penal por delito flagrante.',
		'ref'         => 'EXP-PEN-2024-009',  'cifra' => '24 días',
		'sub'         => 'Penal · Ocupación',
		'juzgado'     => 'JI nº 4 Madrid',     'fecha' => 'ENE 2025',
		'area'        => 'penal',
	),
	array(
		'title'       => 'Gastos hipotecarios · Santander hipoteca de 240k',
		'content'     => 'Devolución íntegra de notaría, gestoría, registro y tasación. Hipoteca firmada en 2014.',
		'ref'         => 'EXP-GAS-2024-067',  'cifra' => '3.420 €',
		'sub'         => 'Bancario · Gastos',
		'juzgado'     => 'JPI nº 12 Madrid',   'fecha' => 'JUL 2024',
		'area'        => 'bancario',
	),
);

$created = 0; $updated = 0;
foreach ( $seeds as $s ) {
	// ¿Existe ya un caso con el mismo _morillo_ref?
	$existing = get_posts( array(
		'post_type'   => 'casos_exito',
		'meta_key'    => '_morillo_ref',
		'meta_value'  => $s['ref'],
		'numberposts' => 1,
		'post_status' => 'any',
	) );

	$post_arr = array(
		'post_type'    => 'casos_exito',
		'post_title'   => $s['title'],
		'post_content' => $s['content'],
		'post_status'  => 'publish',
	);

	if ( $existing ) {
		$post_arr['ID'] = $existing[0]->ID;
		wp_update_post( $post_arr );
		$post_id = $existing[0]->ID;
		$updated++;
		WP_CLI::log( "↻  {$s['ref']} (ID $post_id) actualizado" );
	} else {
		$post_id = wp_insert_post( $post_arr );
		$created++;
		WP_CLI::log( "✓  {$s['ref']} (ID $post_id) creado" );
	}

	// Custom fields
	update_post_meta( $post_id, '_morillo_cifra',       $s['cifra'] );
	update_post_meta( $post_id, '_morillo_ref',         $s['ref'] );
	update_post_meta( $post_id, '_morillo_subetiqueta', $s['sub'] );
	update_post_meta( $post_id, '_morillo_juzgado',     $s['juzgado'] );
	update_post_meta( $post_id, '_morillo_fecha',       $s['fecha'] );

	// Asignar término de la taxonomía area_practica
	wp_set_object_terms( $post_id, $s['area'], 'area_practica' );
}

WP_CLI::success( "$created creados · $updated actualizados" );
