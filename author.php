<?php 
$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$author_id = get_the_author_meta('ID');
$author_name = $author->display_name;
get_header (); ?>


<div class="author-page">
	<div class="xln-container">
        <ul class="breadcrumbs">
            <li><a href="<?=home_url( '/blog' )?>">Xelon Blog</a></li>
            <div class="breadcrumbs__sep">
                <svg width='24px' height='24px'>
                    <use xlink:href='#arrow-back'></use>
                </svg>
            </div>
            <li><?= $author_name; ?></li>
        </ul>
		<div class="author-page-row d-flex">
			<div class="author-posts">
				<?php if ( have_posts() ) : 
                    while ( have_posts() ) : the_post();
                        get_template_part('template-parts/blog-archive-single');
                    endwhile; 
                else: ?>
					<div><?php _e('No posts by this author.'); ?></p>
				<?php endif; ?>
			</div>
			<div class="author-card">
				<div class="author-img">
					<?php 
						$author_img = get_field('profile_img', 'user_'.$author_id);
						$author_ava = wp_get_attachment_image_url($author_img, 'full', true);
						if ($author_img) { ?>
						<img src="<?echo $author_ava; ?>" alt="<?php echo $author->nickname; ?>">
					<?php } ?>
				</div>
				<div class="author-card-item">
					<div class="author-name">
						<?php echo $author_name; ?>
					</div>
					<div class="author-card-position">
						<?php 
							
							echo the_field('business_position', 'user_'.$author_id);
						 ?>					
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>



<?php get_footer (); ?>