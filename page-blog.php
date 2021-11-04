<?php
/**
* Template Name: Blog
*/
$add_custom_post = get_field('add_custom_post');
get_header();
?>

<?php
if( $add_custom_post ): ?>
<section class="s-recom-news">
  <div class="container">
      <h1 class="d-none">News</h1>
      <h2 class="like-header">
        <?php echo the_field('title_recom'); ?>
      </h2>
      <div class="recom-news-row d-flex">
      <?php $n = 1; foreach( $add_custom_post as $post): ?>
      <?php setup_postdata($post);  ?>

      <?php
        $thumbnail_img = get_post_thumbnail_id( $post->ID );
        $square = get_field('square_image', $post->ID);
        $toShow = $square ? $square : $thumbnail_img;
       ?>

      <?php if($n == 1) { ?>

      <div class="col">
        <a class="post-feature" href="<?php the_permalink();?>" style='background:url(<?php echo wp_get_attachment_image_url($toShow, array(590, 440), false) ?>) no-repeat scroll center center; background-size: cover;'>
          <h3><?php the_title(); ?></h3>
          <div class="item-overlay">
            <div class="item-view d-flex">
              <div class="date">
                <?php echo get_the_date(); ?>
              </div>
              <div class="view-post d-flex">
                <div class="filter-author-link"><?php the_author_meta('display_name', $post->post_author ); ?></div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col">

      <?php } if($n > 1) { ?>

      <a class="post-recom" href="<?php the_permalink();?>">
          <? echo wp_get_attachment_image($toShow, array(130, 130), false, array(
              'alt' => get_the_title(),
          )) ?>
        <div class="post-recom-text">
          <h3><?php the_title(); ?></h3>
          <div class="recom-text-bot">
             <div class="filter-author-link"><?php the_author_meta('display_name', $post->post_author ); ?></div>
             <div class="date"><?php echo get_the_date(); ?></div>
          </div>
        </div>
      </a>

      <?php } ?>

      <?php $n++; endforeach; ?>
       </div>
      </div>

  </div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php include 'template-parts/subscribe-form.php' ?>

<section class="all-news posts-3col">
	<div class="container">
		<div class="all-news-area">
			<h2 class="like-header">
				<?php echo the_field('all_news'); ?>
			</h2>
			<?php include 'filter.php'; ?>
		</div>
	</div>
</section>

  <section class="about-us-team">
    <div class="container">
      <h2><?php echo the_field('browse_by_author', 'option'); ?></h2>
      <div class="aut-slider">
        <?php
        if( have_rows('addAuthors', 'option') ): ?>
          <?php while( have_rows('addAuthors', 'option') ): the_row();
            $b_img = get_sub_field ('b_img');
            $sb_img = wp_get_attachment_image_url($b_img, 'filter-thumbnail', true);
            $name = get_sub_field('b_name');
            $b_position = get_sub_field('b_position');
            $author_blog_link = get_sub_field('author_blog_link');
            ?>
            <a href="<?php echo $author_blog_link; ?>" class="aut-item">
              <figure style="background: url('<?php echo $sb_img; ?>') no-repeat center / cover;"></figure>
              <div class="aut-item-body">
                <p class="name"><?php echo $name; ?></p>
                <p class="post"><?php echo $b_position; ?></p>
              </div>
            </a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>