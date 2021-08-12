<?php
/**
* Template Name: Product Solutions
*/
get_header();
?>
<section class="solutions-page main-info-block right-start padding-15">
	<div class="container">
		<div class="info-flex d-flex">
			<?php 

				$sol_img = get_field('sol_img');
				$sol_img_src = wp_get_attachment_image_url($sol_img, 'full', true);
				$sol_title = get_field('sol_title');
				$sol_subtitle = get_field('sol_subtitle');
				$sol_content = get_field('sol_content');
				$sol_link = get_field('sol_link');
				$sol_check_colors = get_field('sol_check_colors');
				$sol_link_name = get_field('sol_link_name');
			 ?>
			<div class="page-40">
				<img src="<?php echo $sol_img_src; ?>" class="img-height" alt="<?php echo $sol_title ?>">
			</div>
			<div class="page-60">
				<div class="content-column d-flex">
					<h1 class="light-header item-center

					<?php 

						if($sol_check_colors[0] == 'red') {
							echo "rose-c";
						} elseif ($sol_check_colors[0] == 'green') {
							echo "green-c";
						} elseif ($sol_check_colors[0] == 'blueberry')
							echo "blueberry-c";
					 ?>
			
					">
						<?php echo $sol_title; ?>
					</h1>
					<div class="like-header

						<?php 

							if($sol_check_colors[0] == 'red') {
								echo "rose-c";
							} elseif ($sol_check_colors[0] == 'green') {
								echo "green-c";
							} elseif ($sol_check_colors[0] == 'blueberry')
								echo "blueberry-c";
						 ?>

					">
						<?php echo $sol_subtitle; ?>
					</div>
					<div class="info-content">
						<?php echo $sol_content; ?>
					</div>
					<?php if (is_page(706)) { ?>
					<a href="<?php echo $sol_link; ?>" class=" <?php if($sol_check_colors[0] == 'red') { echo "danger-btn"; } elseif ($sol_check_colors[0] == 'green') { echo "success-btn"; } elseif ($sol_check_colors[0] == 'blueberry') echo "bluberry-btn";?> item-center open-popup-contact"><?php echo $sol_link_name; ?></a>
				<?php } else { ?>
					<a href="<?php echo $sol_link; ?>" class=" <?php if($sol_check_colors[0] == 'red') { echo "danger-btn"; } elseif ($sol_check_colors[0] == 'green') { echo "success-btn"; } elseif ($sol_check_colors[0] == 'blueberry') echo "bluberry-btn";?> item-center"><?php echo $sol_link_name; ?></a>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="solutions-page feature">
	<div class="container">
		<div class="loop d-flex justify-center">
			<div class="item-feature d-flex">
				<div class="item-logo">
					<?php 
						$per_img_1 = get_field('per_img_1');
						$per_img_1_src = wp_get_attachment_image_url($per_img_1, 'full', true);
					 ?>
					<img src="<?php echo $per_img_1_src; ?>" alt="<?php echo the_field('per_title_1'); ?>">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('per_title_1'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('per_content_1'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<?php 
						$per_img_2 = get_field('per_img_2');
						$per_img_2_src = wp_get_attachment_image_url($per_img_2, 'full', true);
					 ?>
					<img src="<?php echo $per_img_2_src; ?>" alt="<?php echo the_field('per_title_2'); ?>">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('per_title_2'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('per_content_2'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<?php 
						$per_img_3 = get_field('per_img_3');
						$per_img_3_src = wp_get_attachment_image_url($per_img_3, 'full', true);
					 ?>
					<img src="<?php echo $per_img_3_src; ?>" alt="<?php echo the_field('per_title_3'); ?>">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('per_title_3'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('per_content_3'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="support-you" id="hy-quessions-scroll">
	<div class="like-header">
		<?php echo the_field('support_block_page_title'); ?>
	</div>
	<div class="loop solution-include-pages d-flex">
	<?php

		if( have_rows('support_you') ): ?>
			<?php while( have_rows('support_you') ): the_row();

			// $sy_img = get_sub_field('sy_img');
			// $sol_img = wp_get_attachment_image_src( $sy_img, 'full', true );
			$sy_header = get_sub_field('sy_header');
			$sy_content = get_sub_field('sy_content');
			$sy_link_name = get_sub_field('sy_link_name');
			$sy_link = get_sub_field('sy_link');
			$sy_color = get_sub_field('sy_color');

			?>
		<div class="sol-item d-flex flex-direction">
			<?php /* 
			<div class="sol-item-img">
				<img src="<?php echo $sol_img[0];?>" class="img-responsive" alt="">
			</div>
			*/ ?>
			<div class="sol-content d-flex flex-direction">
				<div class="sol-content-header 

					<?php 

						if($sy_color[0] == 'red') {
							echo "rose-c";
						} elseif ($sy_color[0] == 'green') {
							echo "green-c";
						} elseif ($sy_color[0] == 'blueberry')
							echo "blueberry-c";
					 ?>


				">
					<?php echo $sy_header; ?>
				</div>
				<div class="sol-content-text">
					<?php echo $sy_content; ?>
				</div>
				<a href="<?php echo $sy_link;?>" class="

			
					<?php 

						if($sy_color[0] == 'red') {
							echo "danger-btn";
						} elseif ($sy_color[0] == 'green') {
							echo "success-btn";
						} elseif ($sy_color[0] == 'blueberry')
							echo "bluberry-btn";
					 ?>

				 item-center"><?php echo $sy_link_name; ?></a>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php include 'components/hy-quessions.php' ?>

<section class="page-customer-project">
  <?php include 'components/customer-projects.php' ?>
</section>
<section class="solutions-page partners">
  <div class="like-header"><?php echo the_field('our_clients', 'option'); ?></div>
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
</section>
<?php get_footer(); ?>