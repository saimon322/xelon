<?php
/**
 * Template Name: Pricing page calc
 */

get_header(); ?>

<div class="xln-page">
	<section class="pricing-banner">
		<div class="xln-container">
            <div class="xln-content">
                <?php if (get_field('intro_title')): ?>
                    <h1><?php echo get_field('intro_title'); ?></h1>
                <?php endif; ?>
                <?php if ($icons = get_field('intro_icons')) : ?>
                    <div class="pricing-banner__icons">
                        <?php foreach ($icons as $icon_src) : ?>
                            <img src="<?php echo $icon_src; ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (get_field('intro_subtitle')) : ?>
                    <p><?php echo get_field('intro_subtitle'); ?></p>
                <?php endif; ?>
            </div>

			<div class="pricing-banner-form">
				<p class="pricing-banner-form__title">
					<?php echo get_field('form_title'); ?>
				</p>
				<form action="#" class="pricing-banner-form__form">
                    <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                    <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
					<div class="form-block">
						<input type="email" name="email" id="send_email" placeholder="Email*" class="form-input">
						<label for="email" class="form-label">Email*</label>
						<div class="msg"></div>
					</div>
                    <?php $button = get_field('form_button') ? get_field('form_button') : 'Senden'; ?>
					<input type="submit" class="xln-button xln-button--green send-subscribe" value="<?php echo $button; ?>">
				</form>
				<div class="pricing-banner-form__footer">
					<div class="signups-title">
						<span><?php echo get_field('form_signups_label'); ?></span>
					</div>
					<?php echo do_shortcode('[signups]'); ?>
				</div>
			</div>

		</div>
	</section><!-- /.pricing-banner -->

	<section class="pricing-about">
		<div class="xln-container">
            <div class="xln-content">
                <?php if (get_field('plan_title')) : ?>
                    <h2><?php echo get_field('plan_title'); ?></h2>    
			    <?php endif; ?>
                <?php if (get_field('plan_subtitle')) : ?>
                    <p><?php echo get_field('plan_subtitle'); ?></p>
                <?php endif; ?>
            </div>
			<?php if ($columns = get_field('plan_columns')) : ?>
				<div class="pricing-about__content">
					<div class="xln-about-items">
						<?php foreach ($columns as $column) : ?>
							<div class="xln-about-item">
								<div class="xln-about-item__icon">
									<img src="<?php echo $column['icon']; ?>" alt="">
								</div>
								<h3 class="xln-about-item__title"><?php echo $column['text']['title']; ?></h3>
								<p class="xln-about-item__text"><?php echo $column['text']['description']; ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section><!-- /.pricing-about -->

	<section class="pricing-calc">
		<?php if (get_field('calc_title')) : ?>
			<div class="xln-content">
				<div class="xln-container">
					<h2 class="xln-content__title">
						<?php if (get_field('calc_title_icon')) : ?>
							<img src="<?php echo get_field('calc_title_icon'); ?>" alt="">
						<?php endif; ?>
						<?php echo get_field('calc_title'); ?>
					</h2>
					<?php if (get_field('calc_desc')) : ?>
						<p><?php echo get_field('calc_desc'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="calc">
			<div class="calc__container xln-container">
				<div class="calc-section calc-servers">
					<div class="calc-section__header calc-block">
						<div class="calc-row">
							<div class="calc-section__title">
								<?php echo get_field('infrastructure')['title']; ?> 
								<span> (<span class="calc-servers-counter">1</span>)<span>
							</div>
							<div class="calc-section__total calc-total">
								<div class="calc-total__item">
									<div class="calc-total__title">
										Pro Stunde:
									</div>
									<div class="calc-total__value">
										<span class="calc-total-hour">0</span> CHF
									</div>
								</div>
								<div class="calc-total__item">
									<div class="calc-total__title">
										Für 30 Tage:
									</div>
									<div class="calc-total__value">
										<span class="calc-total-month">0</span> CHF
									</div>
								</div>
							</div>
							<div class="calc-section__toggler">
								<svg width="24" height="24">
									<use xlink:href="#calc-arrow"></use>
								</svg>
							</div>
						</div>
					</div>
					<div class="calc-section__content">
						<div class="calc-block calc-server">
							<div class="calc-block__title">
								Server #<span>1</span>
							</div>
							<div class="calc-row">
                                <?php
								if ($types = get_field('infrastructure')['types']): ?>
                                    <div class="calc-item">
                                        <div class="calc-item__title">Type:</div>
                                        <div class="calc-select">
                                            <div class="calc-select__current"></div>
                                            <div class="calc-select__items">
                                                <? foreach ($types as $item) :
                                                    $type = $item['type'];
                                                    $title = $item['title'];
                                                    $per_hour = $item['extra_per_hour'];
                                                    $per_month = $item['extra_per_month'];
                                                    ?>
                                                    <div class="calc-select__item" 
                                                         data-type="<?php echo $type; ?>" 
                                                         data-hour="<?php echo $per_hour; ?>" 
                                                         data-month="<?php echo $per_month; ?>">
                                                        <svg width="24" height="24">
                                                            <use xlink:href="#calc-<?php echo $type; ?>"></use>
                                                        </svg>
                                                        <span>
                                                            <?php echo $title; ?>
                                                        </span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <span class="calc-select__btn">
                                                <svg width="24" height="24">
                                                    <use xlink:href="#calc-arrow"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>

								<?php
								if ($server = get_field('infrastructure')['server']) :
									foreach ($server as $item) :
										$title = $item['title'];
										$type = $item['type'];
										$optional = $item['optional'];
                                        $disabled = $item['disabled'] ? ' calc-item--disabled' : '';
										$min = $item['min'];
										$max = $item['max'];
										$inc = $item['increment'];
										$per_hour = $item['per_hour'];
										$per_month = $item['per_month'];
										?>
										<div class="calc-item<?php echo $disabled; ?>"
                                             data-hour="<?php echo $per_hour; ?>" 
                                             data-month="<?php echo $per_month; ?>"
                                             data-type="<?php echo $type; ?>">
											<div class="calc-item__title">
												<?php echo $title; ?>
												<?php if ($optional) : ?>
													<div class="calc-item__toggler"><span></span></div>
												<?php endif; ?>
											</div>
											<div class="calc-counter">
                                                <span class="calc-counter__button calc-minus">
                                                    <svg width="16" height="16">
                                                        <use xlink:href="#calc-minus"></use>
                                                    </svg>
                                                </span> 
                                                <input
                                                    type="number"
                                                    value="<?php echo $min; ?>"
                                                    min="<?php echo $min; ?>"
                                                    max="<?php echo $max; ?>"
                                                    step="<?php echo $inc; ?>"
                                                    class="calc-counter__input"
												> 
                                                <span class="calc-counter__button calc-plus">
                                                    <svg width="16" height="16">
                                                        <use xlink:href="#calc-plus"></use>
                                                    </svg>
                                                </span>
											</div>
										</div>
									<?php
									endforeach;
								endif; ?>
							</div>
							<div class="calc-block__total calc-total">
								<div class="calc-total__item">
									<div class="calc-total__title">
										<svg width="16" height="16">
											<use xlink:href="#calc-clock"></use>
										</svg>
										Pro Stunde:
									</div>
									<div class="calc-total__value">
										<span class="calc-total-hour">0</span> CHF
									</div>
								</div>
								<div class="calc-total__item">
									<div class="calc-total__title">
										<svg width="16" height="16">
											<use xlink:href="#calc-calendar"></use>
										</svg>
										Für 30 Tage:
									</div>
									<div class="calc-total__value">
										<span class="calc-total-month">0</span> CHF
									</div>
								</div>
							</div>
							<div class="calc-block__buttons">
								<div class="calc-block__button calc-block__button--remove">
									<svg width="24" height="42">
										<use xlink:href="#calc-remove"></use>
									</svg>
									Entfernen
								</div>
								<div class="calc-block__button calc-block__button--add">
									<svg width="24" height="42">
										<use xlink:href="#calc-add"></use>
									</svg>
									Server hinzufügen
								</div>
							</div>
						</div>
					</div>
					<div class="calc-section__footer">
						<div class="calc-section__total calc-total">
							<div class="calc-total__item">
								<div class="calc-total__title">
									<svg width="16" height="16">
										<use xlink:href="#calc-clock"></use>
									</svg>
									Pro Stunde:
								</div>
								<div class="calc-total__value">
									<span class="calc-total-hour">0</span> CHF
								</div>
							</div>
							<div class="calc-total__item">
								<div class="calc-total__title">
									<svg width="16" height="16">
										<use xlink:href="#calc-calendar"></use>
									</svg>
									Für 30 Tage:
								</div>
								<div class="calc-total__value">
									<span class="calc-total-month">0</span> CHF
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="calc-section calc-network">
					<div class="calc-section__header calc-block">
						<div class="calc-row">
							<div class="calc-section__title">
								<?php echo get_field('networking')['title']; ?>
							</div>
							<div class="calc-section__total calc-total">
								<div class="calc-total__item">
									<div class="calc-total__title">
										Pro Stunde:
									</div>
									<div class="calc-total__value">
										<span class="calc-total-hour">0</span> CHF
									</div>
								</div>
								<div class="calc-total__item">
									<div class="calc-total__title">
										Für 30 Tage:
									</div>
									<div class="calc-total__value">
										<span class="calc-total-month">0</span> CHF
									</div>
								</div>
							</div>
							<div class="calc-section__toggler">
								<svg width="24" height="24">
									<use xlink:href="#calc-arrow"></use>
								</svg>
							</div>
						</div>
					</div>
					<div class="calc-section__content">
						<?php
						if ($network = get_field('networking')['group']['network_items']) :
							foreach ($network as $item) :
								$title = $item['title'];
								$min = $item['min'];
								$max = $item['max'];
								$inc = $item['increment'];
								$per_hour = $item['per_hour'];
								$per_month = $item['per_month'];
								?>
								<div class="calc-block calc-service">
									<div class="calc-row">
										<div class="calc-block__title"><?php echo $title; ?></div>
										<div class="calc-item" data-hour="<?php echo $per_hour; ?>" data-month="<?php echo $per_month; ?>">
											<div class="calc-item__title">
												Anzahl
											</div>
											<div class="calc-counter">
                                                <span class="calc-counter__button calc-minus">
                                                    <svg width="16" height="16">
                                                        <use xlink:href="#calc-minus"></use>
                                                    </svg>
                                                </span> 
                                                <input
                                                    type="number"
                                                    value="1"
                                                    min="<?php echo $min; ?>"
                                                    max="<?php echo $max; ?>"
                                                    step="<?php echo $inc; ?>"
                                                    class="calc-counter__input"
												> 
                                                <span class="calc-counter__button calc-plus">
                                                    <svg width="16" height="16">
                                                        <use xlink:href="#calc-plus"></use>
                                                    </svg>
                                                </span>
											</div>
										</div>
										<div class="calc-block__total calc-total">
											<div class="calc-total__item">
												<div class="calc-total__title">
													<svg width="16" height="16">
														<use xlink:href="#calc-clock"></use>
													</svg>
													Pro Stunde:
												</div>
												<div class="calc-total__value">
													<span class="calc-total-hour">0</span> CHF
												</div>
											</div>
											<div class="calc-total__item">
												<div class="calc-total__title">
													<svg width="16" height="16">
														<use xlink:href="#calc-calendar"></use>
													</svg>
													Für 30 Tage:
												</div>
												<div class="calc-total__value">
													<span class="calc-total-month">0</span> CHF
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							endforeach;
						endif; ?>

						<?php if ($wan = get_field('networking')['group']['wan']) : ?>
							<div class="calc-block calc-wan">
								<div class="calc-row">
									<div class="calc-block__title">
										WAN (#<span>1</span>)
									</div>
									<div class="calc-item">
										<div class="calc-item__title">Type:</div>
										<div class="calc-select">
											<div class="calc-select__current"></div>
											<div class="calc-select__items">
												<?php
												foreach ($wan as $item) :
													$title = $item['title'];
													$per_hour = $item['per_hour'];
													$per_month = $item['per_month'];
													?>
													<div class="calc-select__item" data-hour="<?php echo $per_hour; ?>"
													     data-month="<?php echo $per_month; ?>">
														<span><?php echo $title; ?></span>
													</div>
												<?php
												endforeach; ?>
											</div>
											<span class="calc-select__btn">
	                                            <svg width="24" height="24">
	                                                <use xlink:href="#calc-arrow"></use>
	                                            </svg>
	                                        </span>
										</div>
									</div>
									<div class="calc-block__total calc-total">
										<div class="calc-total__item">
											<div class="calc-total__title">
												<svg width="16" height="16">
													<use xlink:href="#calc-clock"></use>
												</svg>
												Pro Stunde:
											</div>
											<div class="calc-total__value">
												<span class="calc-total-hour">0</span> CHF
											</div>
										</div>
										<div class="calc-total__item">
											<div class="calc-total__title">
												<svg width="16" height="16">
													<use xlink:href="#calc-calendar"></use>
												</svg>
												Für 30 Tage:
											</div>
											<div class="calc-total__value">
												<span class="calc-total-month">0</span> CHF
											</div>
										</div>
									</div>
								</div>
								<div class="calc-block__buttons">
									<div class="calc-block__button calc-block__button--remove">
										<svg width="24" height="42">
											<use xlink:href="#calc-remove"></use>
										</svg>
										Entfernen
									</div>
									<div class="calc-block__button calc-block__button--add">
										<svg width="24" height="42">
											<use xlink:href="#calc-add"></use>
										</svg>
										Server hinzufügen
									</div>
								</div>
							</div>
						<?php endif; ?>

					</div>
					<div class="calc-section__footer">
						<div class="calc-section__total calc-total">
							<div class="calc-total__item">
								<div class="calc-total__title">
									<svg width="16" height="16">
										<use xlink:href="#calc-clock"></use>
									</svg>
									Pro Stunde:
								</div>
								<div class="calc-total__value">
									<span class="calc-total-hour">0</span> CHF
								</div>
							</div>
							<div class="calc-total__item">
								<div class="calc-total__title">
									<svg width="16" height="16">
										<use xlink:href="#calc-calendar"></use>
									</svg>
									Für 30 Tage:
								</div>
								<div class="calc-total__value">
									<span class="calc-total-month">0</span> CHF
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="calc-footer">
					<div class="calc-footer__total calc-total">
						<div class="calc-total__item">
							<div class="calc-total__title">
								Total pro Stunde:
							</div>
							<div class="calc-total__value">
								<span class="calc-total-hour">0</span> CHF
							</div>
						</div>
						<div class="calc-total__item">
							<div class="calc-total__title">
								Total für 30 Tage:
							</div>
							<div class="calc-total__value">
								<span class="calc-total-month">0</span> CHF
							</div>
						</div>
					</div>
                    
                    <?php $buttons = get_field('footer_buttons');
                    if ($buttons): ?>
                        <div class="calc-footer__buttons">
                            <?php foreach ($buttons as $button): ?>
                                <a href="<?php echo esc_url($button['button']['url']); ?>"
                                   target="<?php echo esc_attr($button['button']['target'] ?: '_self'); ?>"
                                   class="<?php echo esc_attr($button['color']); ?>">
                                    <?php echo esc_html($button['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>    
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</section><!-- /.pricing-calc -->
</div>

<?php get_footer(); ?>
