<?php
/** FOOTER v2.4 — bg navy, dos zonas (brand + nav), CTA Hablemos.
 *  Sin corchetes literales, eyebrows con hairline corta.
 */
defined( 'ABSPATH' ) || exit;
?>
<footer class="v2-footer" role="contentinfo">
	<div class="v2-container">

		<div class="v2-footer__brand-zone">
			<div class="v2-footer__brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="v2-footer__logo" aria-label="Remedios Morillo · Inicio">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/brand/logo-faldon-cream.svg' ); ?>"
					     alt="Remedios Morillo Abogados"
					     width="220" height="57" loading="lazy">
				</a>
				<p class="v2-footer__tagline">
					Defensa especializada en Ley de Segunda Oportunidad y derecho
					bancario. Madrid y Málaga.
				</p>
			</div>

			<div class="v2-footer__cta-stack">
				<a href="<?php echo esc_url( home_url( '/#contacto-home' ) ); ?>" class="v2-btn v2-btn--inverse-ghost v2-footer__cta">
					Hablemos
					<span class="v2-arrow" aria-hidden="true">→</span>
				</a>
				<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-footer__contact-phone"><?php echo esc_html( MORILLO_PHONE ); ?></a>
				<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="v2-footer__contact-email"><?php echo esc_html( MORILLO_EMAIL ); ?></a>
			</div>
		</div>

		<hr class="v2-footer__divider" aria-hidden="true">

		<div class="v2-footer__nav-zone">
			<div class="v2-footer__col">
				<h4 class="v2-footer__col-title">Áreas</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/ley-de-segunda-oportunidad/' ) ); ?>">Segunda Oportunidad</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-bancario/' ) ); ?>">Bancario</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-mercantil/' ) ); ?>">Mercantil</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-civil/' ) ); ?>">Civil</a></li>
					<li><a href="<?php echo esc_url( home_url( '/derecho-penal/' ) ); ?>">Penal</a></li>
					<li><a href="<?php echo esc_url( home_url( '/gestion-de-patrimonio/' ) ); ?>">Patrimonio</a></li>
				</ul>
			</div>

			<div class="v2-footer__col">
				<h4 class="v2-footer__col-title">Despacho</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>">Casos</a></li>
					<li><a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">Equipo</a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contacto</a></li>
				</ul>
			</div>

			<div class="v2-footer__col">
				<h4 class="v2-footer__col-title">Legal</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/aviso-legal/' ) ); ?>">Aviso legal</a></li>
					<li><a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">Privacidad</a></li>
					<li><a href="<?php echo esc_url( home_url( '/politica-de-cookies/' ) ); ?>">Cookies</a></li>
					<li><a href="<?php echo esc_url( home_url( '/declaracion-de-accesibilidad/' ) ); ?>">Accesibilidad</a></li>
				</ul>
			</div>

			<div class="v2-footer__col">
				<h4 class="v2-footer__col-title">Visítanos</h4>
				<div class="v2-footer__office">
					<span class="v2-footer__office-city">Madrid</span>
					<a href="https://maps.google.com/?q=Calle+Valenzuela+8+28014+Madrid" target="_blank" rel="noopener" class="v2-footer__office-addr">
						Calle Valenzuela 8<br>1ª Dcha · 28014
					</a>
				</div>
				<div class="v2-footer__office">
					<span class="v2-footer__office-city">Málaga</span>
					<a href="https://maps.google.com/?q=Calle+Cárcer+1+29008+Málaga" target="_blank" rel="noopener" class="v2-footer__office-addr">
						Calle Cárcer 1<br>1º Izda · 29008
					</a>
				</div>
			</div>
		</div>

		<hr class="v2-footer__divider v2-footer__divider--subtle" aria-hidden="true">

		<div class="v2-footer__bottom">
			<span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> Remedios Morillo Abogados</span>
			<span>L–V · 09.00 – 19.00</span>
		</div>
	</div>
</footer>
