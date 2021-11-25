<?php 
$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$author_id = get_the_author_meta('ID');
$author_name = $author->display_name;
get_header (); ?>

<div class="xln-page author-page">
	<div class="xln-container">
        <ul class="breadcrumbs">
            <li><a href="<?=home_url( '/blog' )?>">
                <span>Xelon</span> Blog</a>
            </li>
            <div class="breadcrumbs__sep"></div>
            <?php $prev_page = $_SERVER['HTTP_REFERER'];
            if ($prev_page) { ?>
                <li><a href="<?= $prev_page; ?>">
                    <?= get_the_title(url_to_postid($prev_page)); ?>
                </a></li>
                <div class="breadcrumbs__sep"></div>
            <?php }?>
            <li><?= $author_name; ?></li>
        </ul>
		<div class="author-page-wrapper">
			<div class="author-page-posts">
				<?php if ( have_posts() ) : 
                    while ( have_posts() ) : the_post();
                        get_template_part('template-parts/blog-archive-single');
                    endwhile; 
                else: ?>
					<div><?php _e('No posts by this author.'); ?></p>
				<?php endif; ?>
			</div>
			<div class="author-page-card">
				<div class="author-page-card__photo">
					<?php $author_img = get_field('profile_img', 'user_'.$author_id);
						$author_ava = wp_get_attachment_image_url($author_img, 'full', true);
						if ($author_img) { ?>
						    <img src="<?= $author_ava; ?>" alt="<?php echo $author_name; ?>">
					<?php } ?>
				</div>
				<div class="author-page-card__content">
					<div class="author-page-card__name">
						<?= $author_name; ?>
					</div>
					<div class="author-page-card__post">
						<?= get_field('business_position', 'user_'.$author_id); ?>					
					</div>					
					<div class="author-page-card__text">
						<?= get_field('text', 'user_'.$author_id); ?>					
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer (); ?>