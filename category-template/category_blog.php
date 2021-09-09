<?php 
$term = get_queried_object();
$paged = ( $match_page[1] ) ? $match_page[1] : 1;$url_current = SITE_PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$term = get_queried_object();
$term_id = $term->term_id;
$add_custom_post = get_term_meta( $term_id, 'add_custom_post', true);
get_header (); ?>

<section class="blog">
	<div class="container">
		<div class="blog-area">
			<h2 class="like-header">
				<?php echo single_cat_title(); ?>
			</h2>
			<div class="blog-loop loop d-flex justify-center">
			<?php


				$args = array(
					'paged' => $paged,
                    'post__in' => $add_custom_post,
                    'orderby' => 'post__in',
					'post_type' => 'post',
					'posts_per_page' => 3
				);

				$query = new WP_Query($args);
				if($query->have_posts()) :
					while($query->have_posts()) :
						$query->the_post();
						get_template_part('parts/blog', 'parts');
					endwhile;
					wp_reset_query();
				endif;
				?>	
			</div>
		</div>
	</div>
</section>
<?php include __DIR__ . '/../components/subscribe-form.php' ?>
<section class="all-news">
	<div class="container">
		<div class="all-news-area">
			<h2 class="like-header">
				<?php echo the_field('all_news', 'option'); ?>
			</h2>
			<?php require_once dirname(__FILE__).'/../filter.php'; ?>	
		</div>
	</div>
</section>
<?php include __DIR__ . '/../components/hy-quessions.php' ?>
<div class="browse-by-author">
	<div class="container">
			<h2 class="like-header">
				<?php echo the_field('browse_by_author', 'option'); ?>
			</h2>
			<div class="browse-slider d-flex">
			<?php 
			if( have_rows('addAuthors', 'option') ): ?>
				<?php while( have_rows('addAuthors', 'option') ): the_row();
					$b_img = get_sub_field ('b_img');
					$sb_img = wp_get_attachment_image_url($b_img, 'full', true);
					$name = get_sub_field('b_name');
					$b_position = get_sub_field('b_position');
				?>
										
					<div class="xh-item">
						<div class="xh-logo">
							<img src="<?php echo $sb_img; ?>" class="img-responsive" alt="">
						</div>
						<div class="xh-box">
							<div class="xh-title">
								<?php echo $name; ?>
							</div>
							<div class="xh-content">
								<?php echo $b_position; ?>
							</div>							
						</div>
					</div>

				<?php endwhile; ?>
				<?php endif; ?>
			</div>
	</div>
</div>
<?php get_footer (); ?>