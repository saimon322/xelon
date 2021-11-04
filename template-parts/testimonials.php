<?php if( have_rows('testimonials') ) { ?>
<section class="s-tm">
    <h3 class="d-none">Block</h3>
	<div class="container">
	<div class="customers">
		<h2 class="like-header">
			<?php echo get_field('t_title'); ?>
		</h2>
		<div class="slider-tm">

			<?php while( have_rows('testimonials') ): the_row();
				$t_ava = get_sub_field('t_img');
				$t_img = wp_get_attachment_image_src( $t_ava, 'filter-thumbnail', true );
				$t_name = get_sub_field('t_name');
				$t_text = get_sub_field('t_text');
				$t_logo = get_sub_field('t_logo');
				$t_logo2 = wp_get_attachment_image_src( $t_logo, 'medium', true );
				$t_content = get_sub_field('t_content');
			?>
			<div class="slider-item">
				<div class="slider-element d-flex">
					<div class="item-ava">
						<img src="<?php echo $t_ava; ?>" alt="slider">
					</div>
					<div class="item-content d-flex">
						<div class="item-name">
							<?php echo $t_name; ?>
						</div>
						<div class="item-desc">
							<?php echo $t_text; ?>
						</div>
						<div class="item-text">
							<?php echo $t_content; ?>
						</div>
						<img class="t-logo" src="<?php echo $t_logo2[0]; ?>" alt="<?php echo $t_name; ?>">
					</div>
				</div>
			</div>
			<?php endwhile; ?>

		</div>
	</div>
	
	</div>
</section>
<?php } else { ?>	

<?php if( have_rows('testimonials_slider','option') ) { ?>
<section class="s-tm">
    <h3 class="d-none">Block</h3>
	<div class="container">
	<div class="customers">
		<h2 class="like-header">
			<?php echo get_field('testimonials_slider_title','option'); ?>
		</h2>
		<div class="slider-tm">

			<?php while( have_rows('testimonials_slider','option') ): the_row();
				$t_ava = get_sub_field('t_img');
				$t_img = wp_get_attachment_image_src( $t_ava, 'filter-thumbnail', true );
				$t_name = get_sub_field('t_name');
				$t_text = get_sub_field('t_text');
				$t_logo = get_sub_field('t_logo');
				$t_content = get_sub_field('t_content');
			?>
			<div class="slider-item">
				<div class="slider-element d-flex">
					<div class="item-ava">
						<img src="<?php echo $t_ava; ?>" alt="slider">
					</div>
					<div class="item-content d-flex">
						<div class="item-name">
							<?php echo $t_name; ?>
						</div>
						<div class="item-desc">
							<?php echo $t_text; ?>
						</div>
						<div class="item-text">
							<?php echo $t_content; ?>
						</div>
						<img class="t-logo" src="<?php echo $t_logo; ?>" alt="<?php echo $t_name; ?>">
					</div>
				</div>
			</div>
			<?php endwhile; ?>

		</div>
	</div>
	
	</div>
</section>
<?php } } ?>	