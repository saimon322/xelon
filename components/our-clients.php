
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