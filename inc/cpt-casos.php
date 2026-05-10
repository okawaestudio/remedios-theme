<?php
/**
 * CPT casos_exito + taxonomía area_practica + metabox de custom fields.
 *
 * Editar desde /wp-admin/edit.php?post_type=casos_exito
 *
 * @package Morillo
 */

defined( 'ABSPATH' ) || exit;

/* ---------------------------------------------------------------
 * Registrar CPT casos_exito
 * ------------------------------------------------------------- */
add_action( 'init', function () {
	register_post_type( 'casos_exito', array(
		'labels' => array(
			'name'                  => 'Casos de éxito',
			'singular_name'         => 'Caso de éxito',
			'menu_name'             => 'Casos de éxito',
			'add_new'               => 'Añadir caso',
			'add_new_item'          => 'Añadir nuevo caso',
			'edit_item'             => 'Editar caso',
			'new_item'              => 'Nuevo caso',
			'view_item'             => 'Ver caso',
			'view_items'            => 'Ver casos',
			'search_items'          => 'Buscar casos',
			'not_found'             => 'No hay casos.',
			'not_found_in_trash'    => 'No hay casos en la papelera.',
			'all_items'             => 'Todos los casos',
			'attributes'            => 'Atributos del caso',
			'item_published'        => 'Caso publicado.',
			'item_updated'          => 'Caso actualizado.',
		),
		'public'              => true,
		'has_archive'         => false,           // no /casos_exito/ archive — usamos la página /casos-de-exito/
		'rewrite'             => array( 'slug' => 'caso-exito', 'with_front' => false ),
		'show_in_rest'        => true,            // editor Gutenberg
		'menu_position'       => 22,
		'menu_icon'           => 'dashicons-awards',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'taxonomies'          => array( 'area_practica' ),
	) );

	register_taxonomy( 'area_practica', 'casos_exito', array(
		'labels' => array(
			'name'              => 'Áreas de práctica',
			'singular_name'     => 'Área de práctica',
			'menu_name'         => 'Áreas',
			'all_items'         => 'Todas las áreas',
			'edit_item'         => 'Editar área',
			'view_item'         => 'Ver área',
			'add_new_item'      => 'Añadir área',
			'search_items'      => 'Buscar áreas',
		),
		'hierarchical'      => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'area-practica' ),
	) );
} );

/* ---------------------------------------------------------------
 * Términos por defecto de la taxonomía (se crean si no existen)
 * ------------------------------------------------------------- */
add_action( 'init', function () {
	$terms = array(
		'segunda-oportunidad' => 'Ley de Segunda Oportunidad',
		'bancario'            => 'Bancario',
		'mercantil'           => 'Mercantil',
		'civil'               => 'Civil',
		'penal'               => 'Penal',
		'patrimonio'          => 'Patrimonio',
	);
	foreach ( $terms as $slug => $name ) {
		if ( ! term_exists( $slug, 'area_practica' ) ) {
			wp_insert_term( $name, 'area_practica', array( 'slug' => $slug ) );
		}
	}
}, 11 );

/* ---------------------------------------------------------------
 * Metabox: campos custom del caso
 * ------------------------------------------------------------- */
add_action( 'add_meta_boxes', function () {
	add_meta_box(
		'morillo_caso_meta',
		'Datos del caso',
		'morillo_caso_meta_render',
		'casos_exito',
		'normal',
		'high'
	);
} );

function morillo_caso_meta_render( $post ) {
	wp_nonce_field( 'morillo_caso_meta', 'morillo_caso_meta_nonce' );
	$cifra      = get_post_meta( $post->ID, '_morillo_cifra',       true );
	$ref        = get_post_meta( $post->ID, '_morillo_ref',         true );
	$subetiq    = get_post_meta( $post->ID, '_morillo_subetiqueta', true );
	$juzgado    = get_post_meta( $post->ID, '_morillo_juzgado',     true );
	$fecha      = get_post_meta( $post->ID, '_morillo_fecha',       true );
	?>
	<style>
		.morillo-caso-fields { display: grid; grid-template-columns: 1fr 1fr; gap: 16px 24px; padding: 8px 0; }
		.morillo-caso-fields .full { grid-column: 1 / -1; }
		.morillo-caso-fields label { display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px; color: #1d2327; }
		.morillo-caso-fields input[type=text] { width: 100%; padding: 6px 10px; }
		.morillo-caso-fields .help { font-size: 12px; color: #646970; margin-top: 4px; font-weight: normal; }
	</style>
	<div class="morillo-caso-fields">
		<div>
			<label for="m_cifra">Cifra recuperada / cancelada</label>
			<input type="text" id="m_cifra" name="m_cifra" value="<?php echo esc_attr( $cifra ); ?>" placeholder="14.860 €">
			<div class="help">El importe destacado del caso. Acepta texto libre (€, %, "24 días", "0 € deuda"…).</div>
		</div>
		<div>
			<label for="m_ref">ID expediente</label>
			<input type="text" id="m_ref" name="m_ref" value="<?php echo esc_attr( $ref ); ?>" placeholder="EXP-LSO-2024-118">
			<div class="help">Identificador interno del caso.</div>
		</div>
		<div>
			<label for="m_subetiqueta">Sub-etiqueta del área</label>
			<input type="text" id="m_subetiqueta" name="m_subetiqueta" value="<?php echo esc_attr( $subetiq ); ?>" placeholder="Bancario · Revolving">
			<div class="help">Etiqueta visible arriba en la card. Si la dejas vacía, se usa el nombre del Área seleccionada.</div>
		</div>
		<div>
			<label for="m_juzgado">Juzgado / Sede del procedimiento</label>
			<input type="text" id="m_juzgado" name="m_juzgado" value="<?php echo esc_attr( $juzgado ); ?>" placeholder="JM nº 6 Madrid">
			<div class="help">Aparece abajo izquierda de la card.</div>
		</div>
		<div class="full">
			<label for="m_fecha">Fecha de la resolución</label>
			<input type="text" id="m_fecha" name="m_fecha" value="<?php echo esc_attr( $fecha ); ?>" placeholder="MAR 2025" style="max-width: 200px;">
			<div class="help">Formato libre. Recomendado: <code>MES AÑO</code> en mayúsculas (ej: MAR 2025).</div>
		</div>
	</div>
	<p style="margin-top: 14px; padding: 12px; background: #f6f7f7; border-left: 3px solid #2271b1; font-size: 13px; color: #1d2327;">
		<strong>Recuerda:</strong> en la sidebar derecha selecciona el <strong>Área de práctica</strong>
		(Bancario, LSO, etc.) — es lo que filtra el caso en /casos-de-éxito/ y lo asocia a la página de su área.
	</p>
	<?php
}

add_action( 'save_post_casos_exito', function ( $post_id ) {
	if ( ! isset( $_POST['morillo_caso_meta_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['morillo_caso_meta_nonce'], 'morillo_caso_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	$fields = array( 'cifra', 'ref', 'subetiqueta', 'juzgado', 'fecha' );
	foreach ( $fields as $f ) {
		if ( isset( $_POST[ "m_$f" ] ) ) {
			update_post_meta( $post_id, "_morillo_$f", sanitize_text_field( wp_unslash( $_POST[ "m_$f" ] ) ) );
		}
	}
} );

/* ---------------------------------------------------------------
 * Helper para los templates: devuelve los casos formateados.
 *
 * @param array $args Sobreescribe: posts_per_page, area (term slug)
 * @return array de casos con keys: ref, area_label, amount, title, desc, where, date, area_slug
 * ------------------------------------------------------------- */
function morillo_get_casos( $args = array() ) {
	$defaults = array(
		'posts_per_page' => 9,
		'area'           => null,   // null = todos
	);
	$a = wp_parse_args( $args, $defaults );

	$query_args = array(
		'post_type'      => 'casos_exito',
		'post_status'    => 'publish',
		'posts_per_page' => intval( $a['posts_per_page'] ),
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	if ( $a['area'] ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'area_practica',
				'field'    => 'slug',
				'terms'    => $a['area'],
			),
		);
	}

	$q = new WP_Query( $query_args );
	$casos = array();
	if ( $q->have_posts() ) {
		while ( $q->have_posts() ) { $q->the_post();
			$id    = get_the_ID();
			$terms = get_the_terms( $id, 'area_practica' );
			$term  = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0] : null;
			$subetiqueta = get_post_meta( $id, '_morillo_subetiqueta', true );

			$casos[] = array(
				'ref'        => get_post_meta( $id, '_morillo_ref',     true ),
				'area_label' => $subetiqueta ?: ( $term ? $term->name : '' ),
				'area_slug'  => $term ? $term->slug : '',
				'amount'     => get_post_meta( $id, '_morillo_cifra',   true ),
				'title'      => get_the_title(),
				'desc'       => has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 32, '…' ),
				'where'      => get_post_meta( $id, '_morillo_juzgado', true ),
				'date'       => get_post_meta( $id, '_morillo_fecha',   true ),
			);
		}
		wp_reset_postdata();
	}
	return $casos;
}
