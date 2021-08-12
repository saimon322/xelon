<?php if( have_rows('solution_s', 'option') ): ?>

<div class="solutions-page feature">
	<div class="container">
		<div class="loop d-flex justify-center">
			<?php while ( have_rows('solution_s', 'option') ) : the_row(); ?>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<?php 
						$per_img_1 = get_sub_field('img');
						$per_img_1_src = wp_get_attachment_image_url($per_img_1, 'full', true);
					 ?>
					<img src="<?php echo $per_img_1; ?>" alt="<?php the_sub_field('title'); ?>">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php the_sub_field('title'); ?>
					</div>
					<div class="item-f-content">
						<?php the_sub_field('text'); ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php endif; ?>