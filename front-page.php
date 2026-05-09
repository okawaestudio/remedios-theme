<?php
/**
 * Front page (Home) — v2.1 (correcciones).
 *
 * Estructura matching staging migrado: hero full-bleed Madrid · sobre ·
 * áreas · equipo · hablemos+form · reseñas · footer.
 *
 * Los partials no incluidos (top-strip, proceso, cifras, casos, lead-magnet,
 * blog-teaser, form-consulta) siguen en patterns/ por si se reutilizan en
 * otras páginas; aquí solo dejamos de invocarlos.
 *
 * @package Morillo
 */

get_header( 'v2' );

get_template_part( 'patterns/hero-v2' );
get_template_part( 'patterns/sobre-v2' );
get_template_part( 'patterns/areas-grid-v2' );
get_template_part( 'patterns/equipo-v2' );
get_template_part( 'patterns/cta-hablemos-v2' );
get_template_part( 'patterns/resenas-v2' );

get_footer( 'v2' );
