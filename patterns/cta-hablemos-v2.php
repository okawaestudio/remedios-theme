<?php
/** CTA HABLEMOS v2 — banda navy + terminal mini-card. */
defined( 'ABSPATH' ) || exit;
?>
<section class="v2-cta-hablemos">
	<div class="v2-container">
		<div class="v2-cta-hablemos__grid">
			<div>
				<span class="v2-eyebrow v2-eyebrow--light">[08 — HABLEMOS]</span>
				<h2 class="v2-cta-hablemos__title">¿Crees que tu caso encaja?</h2>
				<p class="v2-cta-hablemos__lead">
					Análisis de viabilidad gratuito y honesto en menos de 24 horas.
					Confidencial · sin compromiso · sin discurso comercial.
				</p>
				<div class="v2-cta-hablemos__ctas">
					<a class="v2-btn v2-btn--inverse v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						Llamar ahora · <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
					<a class="v2-btn v2-btn--inverse-ghost" href="mailto:<?php echo esc_attr( MORILLO_EMAIL ); ?>">
						Email · <?php echo esc_html( MORILLO_EMAIL ); ?>
					</a>
				</div>
			</div>
			<aside class="v2-terminal" aria-label="Estado del despacho en tiempo real">
				<div class="v2-terminal__row">
					<span class="v2-terminal__label">[ ESTADO ]</span>
					<span class="v2-terminal__value v2-terminal__value--green" data-despacho-status>ATENDIENDO</span>
				</div>
				<div class="v2-terminal__row">
					<span class="v2-terminal__label">[ TIEMPO MEDIO ]</span>
					<span class="v2-terminal__value">4h 22min</span>
				</div>
				<div class="v2-terminal__row">
					<span class="v2-terminal__label">[ HORARIO ]</span>
					<span class="v2-terminal__value">L–V · 09–19</span>
				</div>
			</aside>
		</div>
	</div>
</section>
