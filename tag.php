<?php 
$term = get_queried_object();
$paged = ( $match_page[1] ) ? $match_page[1] : 1;
$url_current = SITE_PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
get_header (); ?>

<div id="category" class="current-category">
	<div class="container">
		<h1 class="like-h1"><?php echo single_cat_title(); ?></h1>
	</div>
	<div class="loop d-flex justify-center filtering">
		<?php
			$args = array(
				'paged' => $paged,
				'tag_id' => $wp_query->queried_object->term_id,
				'post_type' => 'post',
				'posts_per_page' => -1
			);

			$query = new WP_Query($args);
			if($query->have_posts()) :
				while($query->have_posts()) :
					$query->the_post();
					get_template_part('parts/filter', 'part');
				endwhile;
				wp_reset_query();
			endif;
			?>	
	</div>
	<?php include 'template-parts/subscribe-form.php' ?>
</div>
<?php get_footer (); ?>