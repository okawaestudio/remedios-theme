<?php
/** FOOTER v2 — banda navy con 4 cols + bottom bar. */
defined( 'ABSPATH' ) || exit;
?>
<footer class="v2-footer" role="contentinfo">
	<div class="v2-container">
		<div class="v2-footer__grid">

			<div>
				<h4>[REMEDIOS MORILLO ABOGADOS]</h4>
				<p class="v2-footer__brand-tag">
					Defensa especializada en Ley de Segunda Oportunidad y derecho bancario.
					Madrid · Málaga.
				</p>
				<div class="v2-footer__contact">
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">[ ☎ <?php echo esc_html( MORILLO_PHONE ); ?> ]</a>
					<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>">[ ✉ <?php echo esc_html( MORILLO_EMAIL ); ?> ]</a>
				</div>
				<?php foreach ( morillo_offices() as $o ) : ?>
					<div class="v2-footer__office">
						<span class="v2-footer__office-city">[<?php echo esc_html( strtoupper( $o['city'] ) ); ?>]</span>
						<a href="<?php echo esc_url( $o['maps'] ); ?>" target="_blank" rel="noopener" class="v2-footer__office-addr">
							<?php echo esc_html( $o['address'] ); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>

			<div>
				<h4>[ÁREAS]</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>">Ley Segunda Oportunidad</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>">Bancario</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>">Mercantil</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>">Civil</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>">Penal</a></li>
					<li><a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>">Patrimonio</a></li>
				</ul>
			</div>

			<div>
				<h4>[DESPACHO]</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">Casos</a></li>
					<li><a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">Equipo</a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contacto</a></li>
				</ul>
			</div>

			<div>
				<h4>[LEGAL]</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/aviso-legal/' ) ); ?>">Aviso legal</a></li>
					<li><a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">Privacidad</a></li>
					<li><a href="<?php echo esc_url( home_url( '/politica-de-cookies/' ) ); ?>">Cookies</a></li>
					<li><a href="<?php echo esc_url( home_url( '/declaracion-de-accesibilidad/' ) ); ?>">Accesibilidad</a></li>
				</ul>
			</div>
		</div>

		<div class="v2-footer__bottom">
			<span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> REMEDIOS MORILLO · DISEÑO Y DESARROLLO POR <a href="https://okawa.es" target="_blank" rel="noopener" style="color:inherit;">OKAWA STUDIO</a> · v2.0</span>
			<span>[ MADRID · MÁLAGA · L–V 09–19 ]</span>
		</div>
	</div>
</footer>
