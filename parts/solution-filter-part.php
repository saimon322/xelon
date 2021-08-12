<div class="s-f-item flex-direction d-flex">
	<?php 
		$thumbnail_img = get_the_post_thumbnail_url( $post->ID, 'filter-thumbnail' );
	 ?>
	<div class="s-f-img">
		<img src="<?php echo $thumbnail_img;?>" class="img-responsive" alt="<?php the_title(); ?>">
		<div class="item-overlay"></div>
	</div>
</div>