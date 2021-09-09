<?php
/**
* Template Name: Product page - Dedicated infrastructure
*/
get_header();
?>
<section class="main-page-block green">
	<div class="container">
		<div class="page-row d-flex align-center padding-15">
			<?php
				$di_img = get_field('di_img');
				$di_img_src = wp_get_attachment_image_url($di_img, 'full', true);
				$di_title = get_field('di_title');
				$di_subtitle = get_field('di_subtitle');
				$di_content = get_field('di_content');
				$di_link = get_field('di_link');
			?>
			<div class="page-left page-40">
				<div class="page-left-img">
					<img src="<?php echo $di_img_src; ?>" alt="<?php echo $di_title;?>">
				</div>
			</div>
			<div class="page-right page-60">
				<span class="light-header blueberry-c"><?php echo $di_title;?></span>
				<div class="content-column d-flex content-fluid">
					<h1 class="like-header blueberry-c">
						<?php echo $di_subtitle; ?>
					</h1>
					<div class="content-text">
						<?php echo $di_content; ?>
					</div>
					<a href="<?php echo $di_link; ?>" class="xln-button open-popup-contact"><?php echo the_field('contact_us_btn', 'option'); ?></a>
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
						$di_f_img_1 = get_field('di_f_img_1');
						$di_f_img_1_src = wp_get_attachment_image_url($di_f_img_1, 'full', true);
					?>
					<img src="<?php echo $di_f_img_1_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('di_f_title_1'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('di_f_content_1'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$di_f_img_2 = get_field('di_f_img_2');
						$di_f_img_2_src = wp_get_attachment_image_url($di_f_img_2, 'full', true);
					?>
					<img src="<?php echo $di_f_img_2_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('di_f_title_2'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('di_f_content_2'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$di_f_img_3 = get_field('di_f_img_3');
						$di_f_img_3_src = wp_get_attachment_image_url($di_f_img_3, 'full', true);
					?>
					<img src="<?php echo $di_f_img_3_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('di_f_title_3'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('di_f_content_3'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="feature-infrastructure page-padding">
	<div class="container">
		<div class="fi-row d-flex align-center">
			<div class="fi-banner page-30">
				<?php
					$fi_block_img = get_field('fi_block_img');
					$fi_block_img_src = wp_get_attachment_image_url($fi_block_img, 'full', true);
				?>
				<img src="<?php echo $fi_block_img_src; ?>" class="img-responsive" alt="slider">
			</div>
			<div class="fi-feature-block d-flex loop justify-center page-70">
				<?php if( have_rows('fi_add_card') ): ?>
				<?php while( have_rows('fi_add_card') ): the_row();
				// vars
				$fin_item_img = get_sub_field('fin_item_img');
				$fin_item_img_src = wp_get_attachment_image_url($fin_item_img, 'full', true);
				$fin_item_title = get_sub_field('fin_item_title');
				$fin_item_content = get_sub_field('fin_item_content');
				?>
				<div class="fi-b-item d-flex">
					<div class="fi-b-item-pattern">
						<img src="<?php echo $fin_item_img_src; ?>" alt="feature">
					</div>
					<div class="fi-b-content">
						<div class="fi-b-item-title">
							<?php echo $fin_item_title; ?>
						</div>
						<div class="fi-item-desc">
							<?php echo $fin_item_content; ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="faq-vdc">
	<div class="container">
		<div class="faq-area padding-15">
			<h2 class="like-header"><?php echo the_field('di_faq_title'); ?></h2>
		</div>
		<div class="accordion-area loop d-flex justify-center">
			<?php if( have_rows('di_faq_repeater') ): ?>
			<?php while( have_rows('di_faq_repeater') ): the_row();
				
			$faq_title = get_sub_field('di_faq_question');
			$faq_content = get_sub_field('di_faq_answer');
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
				<img src="<?php echo $p_img[0];?>" alt="clients">
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>