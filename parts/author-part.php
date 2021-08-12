<div class="f-item d-flex">
	<?php 
		$thumbnail_img = get_the_post_thumbnail_url( $post->ID, '' );
	 ?>
	<div class="f-item-img">
		<img src="<?php echo $thumbnail_img;?>" alt="<?php the_title(); ?>">
		<div class="item-overlay">
			<div class="item-view d-flex">
				<div class="date">
					<?php echo get_the_date(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="f-item-bottom">
		<div class="bottom-row d-flex">
			<div class="item-name">
				<a href="<?php the_permalink();?>" class="item-link"><?php the_title(); ?></a>
			</div>
			<div class="bookmark"></div>
		</div>
		<div class="post-review">
			<?php echo the_excerpt(); ?>
		</div>
	</div>
</div>