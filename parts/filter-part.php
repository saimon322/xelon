<?php 
	$redirect_link = get_field('redirect_link');
 ?>

<div class="f-item d-flex">
	<?php 
		$thumbnail_img = get_post_thumbnail_id( $post->ID );
		$square = get_field('square_image', $post->ID);
		$toShow = $square ? $square : $thumbnail_img;
	 ?>
	<div class="f-item-img">
        <? echo wp_get_attachment_image($toShow, array(385, 240), false, array(
            'alt' => get_the_title(),
        )) ?>
		<div class="item-overlay">
			<div class="item-view d-flex">
				<div class="date">
					<?php echo get_the_date(); ?>
				</div>
				<div class="view-post d-flex">
					<? //= gt_get_post_view(); ?>
					<a href="<?php echo get_author_posts_url($post->post_author); ?>" class="filter-author-link"><?php the_author_meta('display_name', $post->post_author ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="f-item-bottom d-flex align-center">
		<div class="bottom-row d-flex">
			<div class="item-name">
				<a href="<?php the_permalink();?>" class="item-link"><?php the_title(); ?></a>
			</div>
			<div class="bookmark"></div>
		</div>
	</div>
</div>