<?php
/** FORMULARIO v2 — estilo línea editorial. */
defined( 'ABSPATH' ) || exit;
?>
<section class="v2-section" id="contacto-home">
	<div class="v2-container">
		<div class="v2-form-section__grid">
			<div>
				<span class="v2-eyebrow">[09 — FORMULARIO]</span>
				<h2 class="v2-section__title">Cuéntanos tu situación.</h2>
				<p class="v2-form-microcopy" style="margin-top: var(--v2-s-5);">[ TU CONSULTA · RESPUESTA EN 24H ]</p>
				<p class="v2-form-microcopy">[ SIN COMPROMISO · SIN COSTE ]</p>
				<hr class="v2-rule" style="margin-top: var(--v2-s-5);">
				<p style="font-family: var(--v2-font-sans); color: var(--v2-ink-soft); font-size: var(--v2-fs-meta); line-height: 1.55;">
					Es totalmente confidencial. Te respondemos en menos de 24h. No usamos tu
					email para campañas — solo para responder a tu consulta.
				</p>
			</div>

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
					<div class="v2-field">
						<label for="v2-provincia" class="v2-field__label" style="position: static; transform: none; font-size: var(--v2-fs-meta); display: block; margin-bottom: 8px;">Provincia</label>
						<select name="provincia" id="v2-provincia" aria-label="Provincia">
							<option value="madrid">Madrid</option>
							<option value="malaga">Málaga</option>
							<option value="otra">Otra provincia</option>
						</select>
					</div>
				</div>

				<fieldset style="border:0;padding:0;margin:0;">
					<legend style="font-family: var(--v2-font-mono); font-size: var(--v2-fs-meta); text-transform: uppercase; letter-spacing: 0.06em; color: var(--v2-muted); margin-bottom: 12px;">Importe aproximado de deuda</legend>
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
					<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>" style="color:inherit;text-decoration:underline;">política de privacidad</a>.</span>
				</label>

				<div>
					<button type="submit" class="v2-btn v2-btn--primary">
						Pedir consulta gratuita
						<span class="v2-arrow" aria-hidden="true">→</span>
					</button>
				</div>

				<p class="v2-form-microcopy">Sin compromiso. Tus datos no se ceden a terceros.</p>
			</form>
		</div>
	</div>
</section>
