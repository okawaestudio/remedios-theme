<?php
/**
 * Footer
 * @package Morillo
 */
?>
</main><!-- /#main -->

<footer class="site-footer">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<?php morillo_logo( 220, 'cream' ); ?>
			<p class="site-footer__tag">
				<?php esc_html_e( 'Despacho de abogados especialista en la Ley de la Segunda Oportunidad y derecho bancario, con sede en Madrid y Málaga.', 'morillo' ); ?>
			</p>
			<address class="site-footer__addr">
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>"><?php echo esc_html( MORILLO_PHONE ); ?></a>
				<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>"><?php echo esc_html( MORILLO_EMAIL ); ?></a>
			</address>

			<div class="site-footer__offices">
				<?php foreach ( morillo_offices() as $o ) : ?>
					<div class="site-footer__office">
						<span class="site-footer__office-city"><?php echo esc_html( $o['city'] ); ?></span>
						<a href="<?php echo esc_url( $o['maps'] ); ?>" target="_blank" rel="noopener" class="site-footer__office-addr">
							<?php echo esc_html( $o['address'] ); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="site-footer__col">
			<h4><?php esc_html_e( 'Áreas', 'morillo' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>"><?php esc_html_e( 'Ley Segunda Oportunidad', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>"><?php esc_html_e( 'Derecho Bancario', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>"><?php esc_html_e( 'Derecho Civil', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>"><?php esc_html_e( 'Derecho Penal', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>"><?php esc_html_e( 'Derecho Mercantil', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>"><?php esc_html_e( 'Gestión de Patrimonio', 'morillo' ); ?></a></li>
			</ul>
		</div>

		<div class="site-footer__col">
			<h4><?php esc_html_e( 'Despacho', 'morillo' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>"><?php esc_html_e( 'Casos de éxito', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Contacto', 'morillo' ); ?></a></li>
			</ul>
		</div>

		<div class="site-footer__col">
			<h4><?php esc_html_e( 'Legal', 'morillo' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/aviso-legal/' ) ); ?>"><?php esc_html_e( 'Aviso legal', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>"><?php esc_html_e( 'Privacidad', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/politica-de-cookies/' ) ); ?>"><?php esc_html_e( 'Cookies', 'morillo' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/declaracion-de-accesibilidad/' ) ); ?>"><?php esc_html_e( 'Accesibilidad', 'morillo' ); ?></a></li>
			</ul>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="container site-footer__bottom-inner">
			<span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> Remedios Morillo · <?php esc_html_e( 'Todos los derechos reservados', 'morillo' ); ?></span>
			<span><?php esc_html_e( 'Diseño y desarrollo por', 'morillo' ); ?> <a href="https://okawa.es" target="_blank" rel="noopener">Okawa Studio</a></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
