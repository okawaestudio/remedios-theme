<?php
/** HABLEMOS v2.4 — split 5/7, lista de garantías mejorada, form con 52 provincias. */
defined( 'ABSPATH' ) || exit;

$provincias = array(
	'A Coruña', 'Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila',
	'Badajoz', 'Barcelona', 'Bizkaia', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria',
	'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gipuzkoa', 'Girona',
	'Granada', 'Guadalajara', 'Huelva', 'Huesca', 'Illes Balears', 'Jaén',
	'La Rioja', 'Las Palmas', 'León', 'Lleida', 'Lugo', 'Madrid', 'Málaga',
	'Melilla', 'Murcia', 'Navarra', 'Ourense', 'Palencia', 'Pontevedra',
	'Salamanca', 'Santa Cruz de Tenerife', 'Segovia', 'Sevilla', 'Soria',
	'Tarragona', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Zamora', 'Zaragoza',
);

$garantias = array(
	'Confidencial',
	'Sin compromiso',
	'Sin coste si no hay viabilidad',
);
?>
<section class="v2-section v2-section--white v2-hablemos" id="contacto-home">
	<div class="v2-container">
		<div class="v2-hablemos__grid">
			<div class="v2-hablemos__left">
				<span class="v2-eyebrow">HABLEMOS</span>
				<h2 class="v2-hablemos__title">¿Crees que <em>tu caso encaja?</em></h2>
				<p class="v2-hablemos__lead">
					Análisis de viabilidad gratuito y honesto en menos de 24 horas.
					Te llamo yo o te respondo por escrito, como prefieras.
				</p>

				<ul class="v2-hablemos__guarantees" role="list">
					<?php foreach ( $garantias as $g ) : ?>
						<li class="v2-hablemos__guarantee">
							<span class="v2-hablemos__guarantee-icon" aria-hidden="true">
								<svg width="14" height="14" viewBox="0 0 16 16" fill="none">
									<path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
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
			</div>

			<div class="v2-hablemos__form-card">
				<form class="v2-form-stack" method="post" action="#" novalidate>
					<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">

					<div class="v2-form-row">
						<div class="v2-field">
							<input type="text" name="nombre" id="v2-nombre" placeholder=" " required>
							<label for="v2-nombre" class="v2-field__label">Nombre*</label>
						</div>
						<div class="v2-field">
							<input type="tel" name="telefono" id="v2-telefono" placeholder=" " required>
							<label for="v2-telefono" class="v2-field__label">Teléfono*</label>
						</div>
					</div>

					<div class="v2-form-row">
						<div class="v2-field">
							<input type="email" name="email" id="v2-email" placeholder=" " required>
							<label for="v2-email" class="v2-field__label">Email*</label>
						</div>
						<div class="v2-field v2-field--select">
							<select name="provincia" id="v2-provincia" required>
								<option value="" disabled selected>—</option>
								<?php foreach ( $provincias as $prov ) : ?>
									<option value="<?php echo esc_attr( strtolower( $prov ) ); ?>"><?php echo esc_html( $prov ); ?></option>
								<?php endforeach; ?>
							</select>
							<label for="v2-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
						</div>
					</div>

					<fieldset class="v2-fieldset">
						<legend class="v2-fieldset__legend">Importe aproximado de deuda</legend>
						<div class="v2-radios">
							<input type="radio" name="importe" id="imp-1" value="<8000"><label for="imp-1">&lt; 8.000 €</label>
							<input type="radio" name="importe" id="imp-2" value="8000-15000"><label for="imp-2">8.000 – 15.000 €</label>
							<input type="radio" name="importe" id="imp-3" value="15000-100000"><label for="imp-3">15.000 – 100.000 €</label>
							<input type="radio" name="importe" id="imp-4" value=">100000"><label for="imp-4">&gt; 100.000 €</label>
						</div>
					</fieldset>

					<div class="v2-field">
						<textarea name="mensaje" id="v2-mensaje" rows="4" placeholder=" "></textarea>
						<label for="v2-mensaje" class="v2-field__label">Cuéntanos brevemente tu situación</label>
					</div>

					<label class="v2-checkbox">
						<input type="checkbox" name="acepto" required>
						<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
					</label>

					<div>
						<button type="submit" class="v2-btn v2-btn--primary v2-btn--lg">
							Pedir consulta gratuita
							<span class="v2-arrow" aria-hidden="true">→</span>
						</button>
					</div>

					<p class="v2-form-microcopy">Sin compromiso. Tus datos no se ceden a terceros.</p>
				</form>
			</div>
		</div>
	</div>
</section>
