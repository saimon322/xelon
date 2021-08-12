<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
get_header (); ?>


<div id="author" class="author-page">
	<div class="container">
		<div class="author-page-row d-flex  padding-15">
			<div class="author-posts">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php include 'parts/author-part.php' ?>
				<?php endwhile; else: ?>
					<div><?php _e('No posts by this author.'); ?></p>
				<?php endif; ?>
			</div>
			<div class="author-card">
				<div class="author-img">
					<?php 
						$user_id = get_the_author_meta('ID');
						$user_img = get_field('profile_img', 'user_'.$user_id);
						$user_ava = wp_get_attachment_image_url($user_img, 'full', true);

						if ($user_img) { ?>
						<img src="<?echo $user_ava; ?>" alt="<?php echo $curauth->nickname; ?>">
					<?php } ?>
				</div>
				<div class="author-card-item">
					<div class="author-name">
						<?php echo $curauth->display_name; ?>
					</div>
					<div class="author-card-position">
						<?php 
							$user_id = get_the_author_meta('ID');
							echo the_field('business_position', 'user_'.$user_id);
						 ?>					
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>



<?php get_footer (); ?>