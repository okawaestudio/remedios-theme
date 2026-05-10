<?php
/**
 * Partial común para templates de área (Mercantil, Patrimonio, Civil, Penal).
 *
 * Espera variables definidas por el template que lo incluye:
 *   $bg_webp_lg, $bg_webp_md, $bg_webp_sm, $theme_uri
 *   $servicios, $relacionadas, $faqs, $provincias
 *
 * Y el siguiente array $cfg con copy específico del área:
 *   - slug_area:        slug de la página (para schema y form ids)
 *   - area_label:       label de área para crumbs y eyebrow
 *   - area_num:         "03 / 06" para el eyebrow
 *   - area_label_short: para microstat label (opcional)
 *
 *   - hero_title_main:  primera parte del H1
 *   - hero_title_em:    parte en italic + accent dorado
 *   - hero_title_tail:  cierre del H1 (ej. "para tu empresa.")
 *   - hero_lead:        párrafo lead bajo el H1
 *   - hero_cta_primary: texto del CTA primario
 *
 *   - microstats:       array de 3 [label, value]
 *
 *   - whatis_legal_ref: texto del bloque "Sobre el área" legal-ref
 *   - whatis_pull:      frase pull body
 *   - whatis_h2_main:   H2 del bloque "¿qué es?"
 *   - whatis_h2_em:     parte italic del H2
 *   - whatis_p1:        primer párrafo
 *   - whatis_p2:        segundo párrafo
 *
 *   - author_chip:      chip "+N CASOS" sobre la foto
 *   - author_h2_em:     "Remedios Morillo"
 *   - author_h2_rest:   ", y conozco la economía real."
 *   - author_p1:        primer párrafo del bio
 *   - author_p2:        segundo párrafo
 *
 *   - serv_eyebrow:     eyebrow del bloque servicios
 *   - serv_h2_main:     H2 servicios
 *   - serv_h2_em:       parte italic
 *   - serv_meta:        texto aside derecho del head
 *
 *   - vics_eyebrow:     eyebrow casos recientes
 *   - vics_h2:          H2 banda navy
 *   - vics_cards:       array de 3 [head, num, who, where]
 *   - vics_more_label:  CTA inverse-ghost
 *
 *   - hablemos_h2_main: H2 hablemos
 *   - hablemos_h2_em:   parte italic
 *   - hablemos_lead:    párrafo lead
 *   - form_select_legend: legend del fieldset radios
 *   - form_select_options: array [value, label]
 */
if ( empty( $cfg ) ) { wp_die( 'area-template-render.php requiere $cfg' ); }
$slug = $cfg['slug_area'] ?? 'area';
?>
<article class="v2-lso v2-area"
         itemscope itemtype="https://schema.org/Service">
	<meta itemprop="name" content="<?php echo esc_attr( $cfg['area_label'] ); ?>">
	<div itemprop="provider" itemscope itemtype="https://schema.org/LegalService" style="display:none;">
		<meta itemprop="name" content="Remedios Morillo Abogados">
		<meta itemprop="telephone" content="<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
	</div>

	<!-- HERO -->
	<section class="v2-hero-bg v2-hero-bg--lso">
		<picture class="v2-hero-bg__picture" aria-hidden="true">
			<source type="image/webp"
			        srcset="<?php echo esc_url( $bg_webp_sm ); ?> 720w, <?php echo esc_url( $bg_webp_md ); ?> 1280w, <?php echo esc_url( $bg_webp_lg ); ?> 1920w"
			        sizes="100vw">
			<img src="<?php echo esc_url( $bg_webp_lg ); ?>" alt="" fetchpriority="high" decoding="async" width="1920" height="470">
		</picture>
		<div class="v2-hero-bg__overlay" aria-hidden="true"></div>
		<div class="v2-hero-bg__inner" data-stagger>
			<div class="v2-hero-bg__left">
				<nav class="v2-lso-bghero__crumbs" aria-label="Migas de pan">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
					<span aria-hidden="true">/</span>
					<?php if ( ! empty( $cfg['parent_label'] ) ) : ?>
						<a href="<?php echo esc_url( $cfg['parent_url'] ?? home_url( '/' ) ); ?>"><?php echo esc_html( $cfg['parent_label'] ); ?></a>
						<span aria-hidden="true">/</span>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>#areas">Áreas</a>
						<span aria-hidden="true">/</span>
					<?php endif; ?>
					<span aria-current="page"><?php echo esc_html( $cfg['area_label'] ); ?></span>
				</nav>
				<span class="v2-hero-bg__eyebrow"><?php
					if ( ! empty( $cfg['eyebrow_override'] ) ) {
						echo esc_html( $cfg['eyebrow_override'] );
					} else {
						echo 'ÁREA ' . esc_html( $cfg['area_num'] ) . ' · ' . esc_html( strtoupper( $cfg['area_label'] ) );
					}
				?></span>
				<h1 class="v2-hero-bg__title">
					<?php echo esc_html( $cfg['hero_title_main'] ); ?>
					<em class="v2-hero-bg__accent"><?php echo esc_html( $cfg['hero_title_em'] ); ?></em>
					<?php if ( ! empty( $cfg['hero_title_tail'] ) ) echo ' ' . esc_html( $cfg['hero_title_tail'] ); ?>
				</h1>
				<p class="v2-hero-bg__lead"><?php echo esc_html( $cfg['hero_lead'] ); ?></p>
				<div class="v2-hero-bg__ctas">
					<a class="v2-btn v2-btn--inverse" href="#contacto-form">
						<?php echo esc_html( $cfg['hero_cta_primary'] ); ?>
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
					<a class="v2-btn v2-btn--inverse-ghost v2-btn--mono" href="tel:<?php echo esc_attr( MORILLO_PHONE_RAW ); ?>">
						☎ <?php echo esc_html( MORILLO_PHONE ); ?>
					</a>
				</div>
				<div class="v2-hero-bg__microstats">
					<?php foreach ( $cfg['microstats'] as $ms ) : ?>
						<div class="v2-hero-bg__microstat">
							<span class="v2-hero-bg__microstat-label"><?php echo esc_html( $ms[0] ); ?></span>
							<span class="v2-hero-bg__microstat-value"><?php echo esc_html( $ms[1] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<form class="v2-hero-form" method="post" action="<?php echo morillo_form_action(); ?>" novalidate>
				<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<?php morillo_form_hidden_fields(); ?>
				<p class="v2-hero-form__eyebrow">CONSULTA GRATUITA</p>
				<h2 class="v2-hero-form__title">Cuéntanos tu caso.</h2>
				<p class="v2-hero-form__sub">Te respondemos en menos de 24h.</p>
				<div class="v2-hero-form__stack">
					<div class="v2-hero-form__field"><input type="text" name="hf_nombre" placeholder="Nombre" required></div>
					<div class="v2-hero-form__field"><input type="tel" name="hf_tel" placeholder="Teléfono" required></div>
					<div class="v2-hero-form__field"><input type="email" name="hf_email" placeholder="Email" required></div>
					<input type="hidden" name="hf_area" value="<?php echo esc_attr( $cfg['area_label'] ); ?>">
					<label class="v2-hero-form__checkbox">
						<input type="checkbox" name="hf_acepto" required>
						<span>Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-privacidad/' ) ); ?>">política de privacidad</a>.</span>
					</label>
					<button type="submit" class="v2-btn v2-btn--primary v2-btn--block v2-hero-form__submit">
						Pedir consulta gratuita
						<span class="v2-arrow" aria-hidden="true">→</span>
					</button>
				</div>
				<p class="v2-hero-form__microcopy">SIN COMPROMISO · CONFIDENCIAL</p>
			</form>
		</div>
	</section>

	<!-- ¿QUÉ ES? -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<div class="v2-lso-what__grid">
				<aside class="v2-lso-what__aside">
					<span class="v2-eyebrow">SOBRE EL ÁREA</span>
					<div class="v2-lso-what__legal-ref"><?php echo esc_html( $cfg['whatis_legal_ref'] ); ?></div>
					<div class="v2-lso-what__pull">
						<p class="v2-lso-what__pull-eyebrow">EN UNA FRASE</p>
						<p class="v2-lso-what__pull-body"><?php echo esc_html( $cfg['whatis_pull'] ); ?></p>
					</div>
				</aside>
				<div class="v2-lso-what__body">
					<h2 class="v2-lso-what__title">
						<?php echo esc_html( $cfg['whatis_h2_main'] ); ?>
						<em><?php echo esc_html( $cfg['whatis_h2_em'] ); ?></em>
					</h2>
					<p class="v2-lso-what__p"><?php echo $cfg['whatis_p1']; // copy con <strong> permitidos ?></p>
					<p class="v2-lso-what__p"><?php echo $cfg['whatis_p2']; ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- QUIÉN SE ENCARGA -->
	<section class="v2-section v2-section--cream-2 v2-lso-author"
	         itemscope itemtype="https://schema.org/Person">
		<meta itemprop="jobTitle" content="Abogada">
		<div class="v2-container">
			<div class="v2-sobre__grid">
				<div class="v2-sobre__photo-wrap">
					<figure class="v2-sobre__photo">
						<img src="<?php echo esc_url( $theme_uri . '/assets/img/team/remedios.jpg' ); ?>"
						     alt="Remedios Morillo, abogada especialista en <?php echo esc_attr( $cfg['area_label'] ); ?>"
						     loading="lazy" width="600" height="800" itemprop="image">
					</figure>
					<span class="v2-sobre__chip"><?php echo esc_html( $cfg['author_chip'] ); ?></span>
				</div>
				<div class="v2-sobre__body">
					<span class="v2-eyebrow">QUIÉN SE ENCARGA</span>
					<h2 class="v2-sobre__title">
						Soy <em itemprop="name"><?php echo esc_html( $cfg['author_h2_em'] ); ?></em><?php echo esc_html( $cfg['author_h2_rest'] ); ?>
					</h2>
					<p><?php echo $cfg['author_p1']; ?></p>
					<p><?php echo $cfg['author_p2']; ?></p>
					<a class="v2-link-mono" href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>">
						Conoce al despacho completo
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- SERVICIOS -->
	<section class="v2-section v2-section--white">
		<div class="v2-container">
			<header class="v2-lso-proc__head">
				<div>
					<span class="v2-eyebrow"><?php echo esc_html( $cfg['serv_eyebrow'] ); ?></span>
					<h2 class="v2-lso-proc__title">
						<?php echo esc_html( $cfg['serv_h2_main'] ); ?>
						<em><?php echo esc_html( $cfg['serv_h2_em'] ); ?></em>
					</h2>
				</div>
				<aside class="v2-lso-proc__meta"><?php echo esc_html( $cfg['serv_meta'] ); ?></aside>
			</header>
			<div class="v2-bancario__grid">
				<?php foreach ( $servicios as $s ) : ?>
					<article class="v2-bancario-card">
						<p class="v2-bancario-card__num"><?php echo esc_html( $s['n'] ); ?></p>
						<h3 class="v2-bancario-card__title"><?php echo esc_html( $s['t'] ); ?></h3>
						<p class="v2-bancario-card__desc"><?php echo esc_html( $s['d'] ); ?></p>
						<p class="v2-bancario-card__tag"><?php echo esc_html( $s['tag'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CASOS RECIENTES (banda navy) -->
	<section class="v2-section v2-section--navy v2-lso-vics">
		<div class="v2-container">
			<header class="v2-lso-vics__head">
				<span class="v2-eyebrow v2-eyebrow--light"><?php echo esc_html( $cfg['vics_eyebrow'] ); ?></span>
				<h2 class="v2-lso-vics__title"><?php echo esc_html( $cfg['vics_h2'] ); ?></h2>
			</header>
			<div class="v2-lso-vics__grid">
				<?php foreach ( $cfg['vics_cards'] as $v ) : ?>
					<article class="v2-lso-vic">
						<p class="v2-lso-vic__head"><?php echo esc_html( $v['head'] ); ?></p>
						<p class="v2-lso-vic__num"><?php echo esc_html( $v['num'] ); ?></p>
						<p class="v2-lso-vic__who"><?php echo esc_html( $v['who'] ); ?></p>
						<p class="v2-lso-vic__where"><?php echo esc_html( $v['where'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/casos-de-exito/' ) ); ?>" class="v2-btn v2-btn--inverse-ghost v2-lso-vics__more">
				<?php echo esc_html( $cfg['vics_more_label'] ); ?>
				<span class="v2-arrow" aria-hidden="true">→</span>
			</a>
		</div>
	</section>

	<!-- RESEÑAS iframe -->
	<section class="v2-section v2-section--cream v2-lso-reviews">
		<div class="v2-container">
			<header class="v2-lso-reviews__head">
				<span class="v2-eyebrow">OPINIONES</span>
				<h2 class="v2-lso-reviews__title">Opiniones reales, <em>sin filtrar</em>.</h2>
			</header>
			<div class="v2-lso-reviews__widget">
				<iframe class="lc_reviews_widget"
					src="https://reputationhub.site/reputation/widgets/review_widget/I09cC0fnhUb9b56hCVTu?widgetId=6863a50a151681172a7f056b"
					frameborder="0" scrolling="no" style="min-width: 100%; width: 100%;"
					title="Opiniones y reseñas de clientes" loading="lazy"></iframe>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="v2-section v2-section--white v2-lso-faq"
	         itemscope itemtype="https://schema.org/FAQPage">
		<div class="v2-container">
			<header class="v2-lso-faq__head">
				<span class="v2-eyebrow">PREGUNTAS FRECUENTES</span>
				<h2 class="v2-lso-faq__title">Resolvemos las dudas <em>más habituales</em>.</h2>
			</header>
			<div class="v2-lso-faq__list">
				<?php foreach ( $faqs as $f ) : ?>
					<details class="v2-lso-faq__item"
					         itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<summary class="v2-lso-faq__q">
							<span itemprop="name"><?php echo esc_html( $f['q'] ); ?></span>
							<span class="v2-lso-faq__icon" aria-hidden="true">
								<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 6l5 5 5-5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</span>
						</summary>
						<div class="v2-lso-faq__a"
						     itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<p itemprop="text"><?php echo esc_html( $f['a'] ); ?></p>
						</div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ÁREAS RELACIONADAS -->
	<section class="v2-section v2-section--cream-2">
		<div class="v2-container">
			<header class="v2-lso-rel__head">
				<span class="v2-eyebrow">TAMBIÉN TRABAJAMOS</span>
				<h2 class="v2-lso-rel__title">Áreas relacionadas</h2>
			</header>
			<div class="v2-lso-rel__grid">
				<?php foreach ( $relacionadas as $a ) : ?>
					<a class="v2-lso-rel__card" href="<?php echo esc_url( home_url( $a['href'] ) ); ?>">
						<div>
							<p class="v2-lso-rel__num">ÁREA <?php echo esc_html( $a['n'] ); ?></p>
							<p class="v2-lso-rel__t"><?php echo esc_html( $a['t'] ); ?></p>
							<p class="v2-lso-rel__d"><?php echo esc_html( $a['d'] ); ?></p>
						</div>
						<span class="v2-arrow" aria-hidden="true">→</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- HABLEMOS + FORM -->
	<section class="v2-section v2-section--cream v2-hablemos" id="contacto-form">
		<div class="v2-container">
			<div class="v2-hablemos__grid">
				<div class="v2-hablemos__left">
					<span class="v2-eyebrow">HABLEMOS</span>
					<h2 class="v2-hablemos__title">
						<?php echo esc_html( $cfg['hablemos_h2_main'] ); ?>
						<em><?php echo esc_html( $cfg['hablemos_h2_em'] ); ?></em>
					</h2>
					<p class="v2-hablemos__lead"><?php echo esc_html( $cfg['hablemos_lead'] ); ?></p>
					<ul class="v2-hablemos__guarantees" role="list">
						<?php foreach ( array( 'Confidencial', 'Sin compromiso', 'Trabajamos con honorarios cerrados' ) as $g ) : ?>
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
				</div>

				<div class="v2-hablemos__form-card">
					<form class="v2-form-stack" method="post" action="<?php echo morillo_form_action(); ?>" novalidate>
						<input type="text" name="hp_nombre" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;">
						<?php morillo_form_hidden_fields(); ?>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="text" name="nombre" id="<?php echo esc_attr( $slug ); ?>-nombre" placeholder=" " required>
								<label for="<?php echo esc_attr( $slug ); ?>-nombre" class="v2-field__label">Nombre*</label>
							</div>
							<div class="v2-field">
								<input type="tel" name="telefono" id="<?php echo esc_attr( $slug ); ?>-telefono" placeholder=" " required>
								<label for="<?php echo esc_attr( $slug ); ?>-telefono" class="v2-field__label">Teléfono*</label>
							</div>
						</div>
						<div class="v2-form-row">
							<div class="v2-field">
								<input type="email" name="email" id="<?php echo esc_attr( $slug ); ?>-email" placeholder=" " required>
								<label for="<?php echo esc_attr( $slug ); ?>-email" class="v2-field__label">Email*</label>
							</div>
							<div class="v2-field v2-field--select">
								<select name="provincia" id="<?php echo esc_attr( $slug ); ?>-provincia" required>
									<option value="" disabled selected>—</option>
									<?php foreach ( $provincias as $p ) : ?>
										<option value="<?php echo esc_attr( strtolower( $p ) ); ?>"><?php echo esc_html( $p ); ?></option>
									<?php endforeach; ?>
								</select>
								<label for="<?php echo esc_attr( $slug ); ?>-provincia" class="v2-field__label v2-field__label--floating">Provincia*</label>
							</div>
						</div>
						<?php if ( ! empty( $cfg['form_select_options'] ) ) : ?>
						<fieldset class="v2-fieldset">
							<legend class="v2-fieldset__legend"><?php echo esc_html( $cfg['form_select_legend'] ); ?></legend>
							<div class="v2-radios">
								<?php foreach ( $cfg['form_select_options'] as $i => $opt ) :
									$id = $slug . '-opt-' . $i;
								?>
									<input type="radio" name="opt" id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $opt[0] ); ?>"><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $opt[1] ); ?></label>
								<?php endforeach; ?>
							</div>
						</fieldset>
						<?php endif; ?>
						<div class="v2-field">
							<textarea name="mensaje" id="<?php echo esc_attr( $slug ); ?>-mensaje" rows="4" placeholder=" "></textarea>
							<label for="<?php echo esc_attr( $slug ); ?>-mensaje" class="v2-field__label">Cuéntanos brevemente tu situación</label>
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

</article>

<?php get_footer(); ?>
