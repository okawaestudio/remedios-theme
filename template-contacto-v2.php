<?php
/**
 * Template Name: Contacto v2
 * @package Morillo
 */
get_header();
$theme_uri = get_template_directory_uri();
$provincias_form = array(
	'A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Bizkaia','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gipuzkoa','Girona','Granada','Guadalajara','Huelva','Huesca','Illes Balears','Jaén','La Rioja','Las Palmas','León','Lleida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Zamora','Zaragoza',
);
$sedes = array(
	array(
		'city'    => 'Madrid',
		'address' => 'Calle Valenzuela 8, 1ª Derecha',
		'cp'      => '28014 Madrid',
		'metro'   => 'Banco de España · Retiro',
		'maps'    => 'https://maps.google.com/?q=Calle+Valenzuela+8+28014+Madrid',
	),
	array(
		'city'    => 'Málaga',
		'address' => 'Calle Cárcer 1, 1º Izquierda',
		'cp'      => '29008 Málaga',
		'metro'   => 'Distrito Centro · La Merced',
		'maps'    => 'https://maps.google.com/?q=Calle+Cárcer+1+29008+Málaga',
	),
);
?>
<article class="v2-contacto"
         itemscope itemtype="https://schema.org/LegalService">
	<meta itemprop="name" content="Remedios Morillo Abogados">
	<meta itemprop="telephone" content="<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
	<meta itemprop="email" content="<?php echo esc_attr( MORILLO_EMAIL ); ?>">

	<section class="v2-section v2-section--cream">
		<div class="v2-container">
			<header class="v2-contacto__head">
				<nav class="v2-equipo__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page">Contacto</span>
				</nav>
				<span class="v2-eyebrow">CONTACTO</span>
				<h1 class="v2-contacto__title">
					Cuéntanos tu caso. <em>Respondemos en 24h.</em>
				</h1>
				<p class="v2-contacto__lead">
					Análisis gratuito y confidencial. Si encajas, te entregamos
					presupuesto cerrado por escrito. Si no encajas, te lo decimos
					sin facturarte.
				</p>
			</header>
		</div>
	</section>

	<section class="v2-section v2-section--white v2-hablemos" id="contacto-form">
		<div class="v2-container">
			<div class="v2-hablemos__grid">
				<div class="v2-hablemos__left">
					<span class="v2-eyebrow">CONTACTO DIRECTO</span>
					<h2 class="v2-hablemos__title">Tres formas de <em>llegar a nosotros</em>.</h2>
					<ul class="v2-hablemos__guarantees" role="list">
						<?php foreach ( array( 'Confidencial', 'Sin compromiso', 'Honorarios cerrados por escrito' ) as $g ) : ?>
							<li class="v2-hablemos__guarantee">
								<span class="v2-hablemos__guarantee-icon" aria-hidden="true">
									<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</span>
								<span class="v2-hablemos__guarantee-text"><?php echo esc_html( $g ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>" class="v2-hablemos__contact">
						<span class="v2-hablemos__contact-label">Llamar ahora</span>
						<span class="v2-hablemos__contact-value"><?php echo esc_html( MORILLO_PHONE ); ?></span>
					</a>
					<a href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>" class="v2-hablemos__contact">
						<span class="v2-hablemos__contact-label">Email directo</span>
						<span class="v2-hablemos__contact-value"><?php echo esc_html( MORILLO_EMAIL ); ?></span>
					</a>
					<div class="v2-hablemos__contact" style="border-bottom: 1px solid var(--v2-line);">
						<span class="v2-hablemos__contact-label">Horario de atención</span>
						<span class="v2-hablemos__contact-value">L–V · 09.00 – 19.00</span>
					</div>
				</div>

				<div class="v2-hablemos__form-card">
					<form class="v2-form-stack" method="post" action="#" novalidate>
						<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<div class="v2-form-row">
							<div class="v2-field"><input type="text" name="nombre" id="ct-nombre" placeholder=" " required><label for="ct-nombre" class="v2-field__label">Nombre*</label></div>
							<div class="v2-field"><input type="tel" name="telefono" id="ct-telefono" placeholder=" " required><label for="ct-telefono" class="v2-field__label">Teléfono*</label></div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field"><input type="email" name="email" id="ct-email" placeholder=" " required><label for="ct-email" class="v2-field__label">Email*</label></div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="ct-provincia" required>
									<option value="" disabled selected>—</option>
									<?php foreach ( $provincias_form as $p ) : ?>
										<option value="<?php echo esc_attr( strtolower( $p ) ); ?>"><?php echo esc_html( $p ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="ct-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend">Área de interés</legend>
							<div class="v2-radios">
								<input type="radio" name="area" id="ct-a1" value="lso"><label for="ct-a1">LSO</label>
								<input type="radio" name="area" id="ct-a2" value="bancario"><label for="ct-a2">Bancario</label>
								<input type="radio" name="area" id="ct-a3" value="mercantil"><label for="ct-a3">Mercantil</label>
								<input type="radio" name="area" id="ct-a4" value="civil"><label for="ct-a4">Civil</label>
								<input type="radio" name="area" id="ct-a5" value="penal"><label for="ct-a5">Penal</label>
								<input type="radio" name="area" id="ct-a6" value="patrimonio"><label for="ct-a6">Patrimonio</label>
							</div>
						</fieldset>
						<div class="v2-field">
							<textarea name="mensaje" id="ct-mensaje" rows="5" placeholder=" "></textarea>
							<label for="ct-mensaje" class="v2-field__label">Cuéntanos brevemente tu caso</label>
						</div>
						<label class="v2-checkbox">
							<input type="checkbox" name="acepto" required>
							<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
						</label>
						<div>
							<button type="submit" class="v2-btn v2-btn--primary v2-btn--lg">
								Enviar consulta
								<span class="v2-arrow" aria-hidden="true">→</span>
							</button>
						</div>
						<p class="v2-form-microcopy">Sin compromiso. Tus datos no se ceden a terceros.</p>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Sedes físicas -->
	<section class="v2-section v2-section--mist v2-contacto-sedes">
		<div class="v2-container">
			<header class="v2-contacto-sedes__head">
				<span class="v2-eyebrow">SEDES FÍSICAS</span>
				<h2 class="v2-contacto-sedes__title">Te recibimos en <em>Madrid o Málaga</em>.</h2>
				<p class="v2-contacto-sedes__sub">
					Atención presencial con cita previa. La gestión documental
					se hace por email; la presencia física es solo para vistas,
					reuniones estratégicas o firma de documentos.
				</p>
			</header>
			<div class="v2-contacto-sedes__grid">
				<?php foreach ( $sedes as $s ) : ?>
					<article class="v2-contacto-sede"
					         itemscope itemtype="https://schema.org/Place">
						<header class="v2-contacto-sede__head">
							<span class="v2-contacto-sede__city" itemprop="name"><?php echo esc_html( $s['city'] ); ?></span>
							<span class="v2-contacto-sede__metro"><?php echo esc_html( $s['metro'] ); ?></span>
						</header>
						<div class="v2-contacto-sede__body">
							<address class="v2-contacto-sede__addr"
							         itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
								<span itemprop="streetAddress"><?php echo esc_html( $s['address'] ); ?></span><br>
								<span itemprop="postalCode"><?php echo esc_html( $s['cp'] ); ?></span>
							</address>
							<a href="<?php echo esc_url( $s['maps'] ); ?>" target="_blank" rel="noopener" class="v2-link-mono">
								Ver en Google Maps
								<span class="v2-arrow" aria-hidden="true">→</span>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

</article>
<?php get_footer(); ?>
