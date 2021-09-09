<?php
/**
* Template Name: Product page - Managed security
*/
get_header();
?>

<section class="main-page-block green">
	<div class="container">
		<div class="page-row d-flex align-center padding-15">
			<?php
				$msec_img = get_field('msec_img');
				$msec_img_src = wp_get_attachment_image_url($msec_img, 'full', true);
				$msec_title = get_field('msec_title');
				$msec_subtitle = get_field('msec_subtitle');
				$msec_content = get_field('msec_content');
                $msec_btn_url = get_field('msec_btn_url');
			?>
			<div class="page-left page-40">
				<div class="page-left-img">
					<img src="<?php echo $msec_img_src; ?>" alt="<?php echo $msec_title; ?>">
				</div>
			</div>
			<div class="page-right page-60">
				<span class="light-header rose-c"><?php echo $msec_title;?></span>
				<div class="content-column d-flex content-fluid">
					<h1 class="like-header rose-c">
						<?php echo $msec_subtitle; ?>
					</h1>
					<div class="content-text">
						<?php echo $msec_content; ?>
					</div>
					<a href="<?php echo $msec_btn_url; ?>" class="xln-button open-popup-contact"><?php echo the_field('contact_us_btn', 'option'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="persp-describe">
	<div class="container">
		<div class="loop d-flex justify-center">
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$msec_f_img_1 = get_field('msec_f_img_1');
						$msec_f_img_1_src = wp_get_attachment_image_url($msec_f_img_1, 'full', true);
					?>
					<img src="<?php echo $msec_f_img_1_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('msec_f_title_1'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('msec_f_content_1'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$msec_f_img_2 = get_field('msec_f_img_2');
						$msec_f_img_2_src = wp_get_attachment_image_url($msec_f_img_2, 'full', true);
					?>
					<img src="<?php echo $msec_f_img_2_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('msec_f_title_2'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('msec_f_content_2'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$msec_f_img_3 = get_field('msec_f_img_3');
						$msec_f_img_3_src = wp_get_attachment_image_url($msec_f_img_3, 'full', true);
					?>
					<img src="<?php echo $msec_f_img_3_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('msec_f_title_3'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('msec_f_content_3'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="green mscec">
	<div class="container">
		<div class="page-row d-flex padding-15">
			<?php
				$msec_b1_img = get_field('msec_b1_img');
				$msec_b1_img_src = wp_get_attachment_image_url($msec_b1_img, 'full', true);
				$msec_b1_title = get_field('msec_b1_title');
				$msec_b1_subtitle = get_field('msec_b1_subtitle');
				$msec_b1_content = get_field('msec_b1_content');
                $msec_b1_btn_url = get_field('msec_b1_btn_url');
			?>
			<div class="page-left page-60">
				<span class="light-header rose-c"><?php echo $msec_b1_title;?></span>
				<div class="content-column d-flex content-fluid">
					<div class="like-header rose-c">
						<?php echo $msec_b1_subtitle; ?>
					</div>
					<div class="content-text">
						<?php echo $msec_b1_content; ?>
					</div>
					<div class="accordion-area d-flex flex-direction">
						<?php if( have_rows('msec_b1_faq') ): ?>
						<?php while( have_rows('msec_b1_faq') ): the_row();
							
						$faq_title = get_sub_field('msec_b1_question');
						$faq_content = get_sub_field('msec_b1_answer');
						?>
						<div class="faq-accordion">
							<div class="accordion">
								<?php echo $faq_title; ?>
							</div>
							<div class="panel">
								<?php echo $faq_content; ?>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
								</div>
					<a href="<?php echo $msec_b1_btn_url; ?>" class="xln-button open-popup-contact"><?php echo the_field('contact_us_btn', 'option'); ?></a>
				</div>
			</div>
			<div class="page-right page-40">
				<div class="page-left-img">
					<img src="<?php echo $msec_b1_img_src; ?>" alt="<?php echo $faq_title; ?>" >
				</div>
			</div>
		</div>
	</div>
</section>

<section class="green mscec reverse">
	<div class="container">
		<div class="page-row d-flex padding-15">
			<?php
				$msec_b2_img = get_field('msec_b2_img');
				$msec_b2_img_src = wp_get_attachment_image_url($msec_b2_img, 'full', true);
				$msec_b2_title = get_field('msec_b2_title');
				$msec_b2_subtitle = get_field('msec_b2_subtitle');
				$msec_b2_content = get_field('msec_b2_content');
                $msec_b2_btn_url = get_field('msec_b2_btn_url');
			?>
			<div class="page-left page-40">
				<div class="page-left-img">
					<img src="<?php echo $msec_b2_img_src; ?>" alt="<?php echo $msec_b2_title; ?>">
				</div>
			</div>
			<div class="page-right page-60">
				<span class="light-header rose-c"><?php echo $msec_b2_title;?></span>
				<div class="content-column d-flex content-fluid">
					<div class="like-header rose-c">
						<?php echo $msec_b2_subtitle; ?>
					</div>
					<div class="content-text">
						<?php echo $msec_b2_content; ?>
					</div>
					<div class="accordion-area d-flex flex-direction">
						<?php if( have_rows('msec_b2_faq') ): ?>
						<?php while( have_rows('msec_b2_faq') ): the_row();
							
						$faq_title = get_sub_field('msec_b2_question');
						$faq_content = get_sub_field('msec_b2_answer');
						?>
						<div class="faq-accordion">
							<div class="accordion">
								<?php echo $faq_title; ?>
							</div>
							<div class="panel">
								<?php echo $faq_content; ?>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
								</div>
					<a href="<?php echo $msec_b2_btn_url; ?>" class="xln-button open-popup-contact"><?php echo the_field('contact_us_btn', 'option'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="green mscec">
	<div class="container">
		<div class="page-row d-flex padding-15">
			<?php
				$msec_b3_img = get_field('msec_b3_img');
				$msec_b3_img_src = wp_get_attachment_image_url($msec_b3_img, 'full', true);
				$msec_b3_title = get_field('msec_b3_title');
				$msec_b3_subtitle = get_field('msec_b3_subtitle');
				$msec_b3_content = get_field('msec_b3_content');
                $msec_b3_btn_url = get_field('msec_b3_btn_url');
			?>
			<div class="page-left page-60">
				<span class="light-header rose-c"><?php echo $msec_b3_title;?></span>
				<div class="content-column d-flex content-fluid">
					<div class="like-header rose-c">
						<?php echo $msec_b3_subtitle; ?>
					</div>
					<div class="content-text">
						<?php echo $msec_b3_content; ?>
					</div>
					<div class="accordion-area d-flex flex-direction">
						<?php if( have_rows('msec_b3_faq') ): ?>
						<?php while( have_rows('msec_b3_faq') ): the_row();
							
						$faq_title = get_sub_field('msec_b3_question');
						$faq_content = get_sub_field('msec_b3_answer');
						?>
						<div class="faq-accordion">
							<div class="accordion">
								<?php echo $faq_title; ?>
							</div>
							<div class="panel">
								<?php echo $faq_content; ?>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
								</div>
					<a href="<?php echo $msec_b3_btn_url; ?>" class="xln-button open-popup-contact"><?php echo the_field('contact_us_btn', 'option'); ?></a>
				</div>
			</div>
			<div class="page-right page-40">
				<div class="page-left-img">
					<img src="<?php echo $msec_b3_img_src; ?>" alt="<?php echo $faq_title; ?>">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="our-clients">
	<h2 class="like-header"><?php echo the_field('our_clients', 'option'); ?></h2>
	<div class="partners">
		<div class="partners-slider">
			<?php if( have_rows('p_slider', 'option') ): ?>
			<?php while( have_rows('p_slider', 'option') ): the_row();
				$p_slider_image = get_sub_field('p_img');
				$p_img = wp_get_attachment_image_src( $p_slider_image, 'full', true );
			?>
			<div class="p-slider-item">
				<img src="<?php echo $p_img[0];?>" alt="partners">
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>	