<?php
/**
* Template Name: Contact Page
*/
get_header();
?>

<section class="contact-page padding-15">
  <div class="sp-bg-container"></div>
	<div class="container">
		<div class="cp-container">
			<h1 class="like-header">
				<?php the_title(); ?>
			</h1>
			<div class="cp-subtitle">
				<?php the_field('cp_c_subtitle'); ?>
			</div>
			<div class="cp-card-row d-flex align-center justify-center loop">
				<div class="cp-card-item">
					<div class="cp-card-logos d-flex">
						<?php 
							$cp_c_img_1 = get_field('cp_c_img_1');
							$cp_c_img_1_src = wp_get_attachment_image_url($cp_c_img_1, 'full', true);

							$cp_c_img_2 = get_field('cp_c_img_2');
							$cp_c_img_2_src = wp_get_attachment_image_url($cp_c_img_2, 'full', true);
						 ?>
						<div class="cp-card-logo-item" style="background-image: url(<?php echo $cp_c_img_1_src; ?>);"></div>
						<div class="cp-card-logo-item" style="background-image: url(<?php echo $cp_c_img_2_src; ?>);"></div>
					</div>
					<div class="cp-card-title">
						<?php echo the_field('cp_card_title');?>
					</div>
					<div class="cp-card-content">
						<?php echo the_field('cp_card_content'); ?>
					</div>
				</div>
				<div class="cp-card-item">
					<div class="cp-card-logos d-flex">
						<?php 
							$cp_c_img_3 = get_field('cp_c_img_3');
							$cp_c_img_3_src = wp_get_attachment_image_url($cp_c_img_3, 'full', true);
						 ?>
						<div class="cp-card-logo-item" style="background-image: url(<?php echo $cp_c_img_3_src; ?>);"></div>
					</div>
					<div class="cp-card-title">
						<?php echo the_field('cp_card_title_2');?>
					</div>
					<div class="cp-card-content">
						<?php echo the_field('cp_card_content_2'); ?>
					</div>
				</div>
				<div class="cp-card-item">
					<div class="cp-card-logos d-flex">
						<?php 
							$cp_c_img_4 = get_field('cp_c_img_4');
							$cp_c_img_4_src = wp_get_attachment_image_url($cp_c_img_4, 'full', true);
						 ?>
						<div class="cp-card-logo-item" style="background-image: url(<?php echo $cp_c_img_4_src; ?>);"></div>
					</div>
					<div class="cp-card-title">
						<?php echo the_field('cp_card_title_3');?>
					</div>
					<div class="cp-card-content">
						<?php echo the_field('cp_card_content_3'); ?>
					</div>
				</div>
				<div class="cp-card-item">
					<div class="cp-card-logos d-flex">
						<?php 
							$cp_c_img_5 = get_field('cp_c_img_5');
							$cp_c_img_5_src = wp_get_attachment_image_url($cp_c_img_5, 'full', true);
						 ?>
						<div class="cp-card-logo-item" style="background-image: url(<?php echo $cp_c_img_5_src; ?>);"></div>
					</div>
					<div class="cp-card-title">
						<?php echo the_field('cp_card_title_4');?>
					</div>
					<div class="cp-card-content">
						<?php echo the_field('cp_card_content_4'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="cp-use-here d-flex">
			<?php
                $cp_bottom_img_selector = 'cp_bottom_img';
                if(function_exists('weglot_get_current_language')){
                    $cp_bottom_img_selector = weglot_get_current_language() == 'en' ? 'cp_bottom_img_en' : 'cp_bottom_img';
                }
				$cp_bottom_img = get_field($cp_bottom_img_selector);
				$cp_bottom_img_src = wp_get_attachment_image_url($cp_bottom_img, 'full', true);
			 ?>
			 <div class="cp-bottom-img">			 	
			 		<img src="<?php echo $cp_bottom_img_src; ?>" alt="contact">
			 </div>
		</div>
	</div>
</section>

<?php get_footer(); ?>