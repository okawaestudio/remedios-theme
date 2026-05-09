<?php
/**
 * Front page (Home) — v2.0 sistema editorial Tailscale-style.
 *
 * Orquestador minimal: header-v2 + 14 partials + footer-v2.
 * El resto del sitio sigue usando header.php / footer.php sin tocar.
 *
 * @package Morillo
 */

get_header( 'v2' );

get_template_part( 'patterns/hero-v2' );
get_template_part( 'patterns/stats-bar-v2' );
get_template_part( 'patterns/sobre-v2' );
get_template_part( 'patterns/areas-grid-v2' );
get_template_part( 'patterns/proceso-v2' );
get_template_part( 'patterns/equipo-v2' );
get_template_part( 'patterns/cifras-v2' );
get_template_part( 'patterns/casos-v2' );
get_template_part( 'patterns/cta-hablemos-v2' );
get_template_part( 'patterns/form-consulta-v2' );
get_template_part( 'patterns/resenas-v2' );
get_template_part( 'patterns/lead-magnet-v2' );
get_template_part( 'patterns/blog-teaser-v2' );

get_footer( 'v2' );
