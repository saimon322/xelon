<?php
// $single_bg = get_field('single_header_background');
// $single_bg_img = wp_get_attachment_image_url( $single_bg, 'full', true );
$thumbnail_img = get_post_thumbnail_id( $post->ID );
get_header (); ?>
  <div class="single-post">
    <div class="single-post-bg d-flex align-center" style="background-image: linear-gradient(180deg, rgba(196, 196, 196, 0) -50%, rgba(30, 30, 30, 0.6) 80%), url(<?php echo wp_get_attachment_image_url($thumbnail_img, 'full', false) ?>);">
      <h1><?php the_title();?></h1>
    </div>
    <div class="author-bar padding-15">
      <div class="container">
        <div class="author-row d-flex align-center">
          <div class="auhot-row-1 d-flex">
            <div class="author-item">
              Author:	<a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author-link"><?php the_author_meta('display_name', $post->post_author ); ?></a>
            </div>
            <div class="author-item">
              Category: <?php
              $category = get_the_category();
              foreach ($category as $cat ) { ?>
                <a href="<?php echo get_category_link($cat->cat_ID)?>" class="author-link"><?php echo $cat->cat_name; ?></a>
              <?php } ?>
            </div>
          </div>
          <div class="author-item">
            <?php echo get_the_date('F d, Y'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="single-content padding-15">
      <div class="container">
        <ul class="breadcrumb" style="display: flex; list-style: none; margin: 0.9rem 0;">
          <li><a style="color: #0089fc;" href="<?=home_url()?>">Home</a> / </li>
          <li style="padding-left: 5px"><a style="color: #0089fc;" href="<?=home_url( '/blog' )?>">Blog</a> / </li>
          <li style="padding-left: 5px"><?php the_title();?></li>
        </ul>
        <div class="content" style="padding: 30px 0;">
          <?php
          if(have_posts()){ while(have_posts()){ the_post();
            $content = the_content();
            echo wpautop($content);
          }}
          ?>
        </div>
      </div>
    </div>
    <?php include 'components/subscribe-form.php' ?>

    <!--
    <div class="filter-posts">
      <div class="container">
        <?php //include 'filter.php' ?>
      </div>
    </div>
    -->

    <?php if( get_field('select_blocks') == 'RelatedPosts' ) {
    $posts = get_field('related_posts');
    if( $posts ): ?>
    <section class="s-related-post">
      <div class="container">
        <h2>Related News</h2>
        <div class="d-flex">
        <?php foreach( $posts as $post): ?>
        <?php setup_postdata($post); ?>

          <div class="col">
            <?php include 'parts/filter-part.php' ?>
          </div>

        <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; } ?> 

    <?php if( get_field('select_blocks') == 'ProductBlock' ) { ?>
    <section class="s-related-product">
      <div class="container">
        <div class="d-flex">
          <div class="col">
            <div class="related-product-text">
              <span><?php the_field('sub_title_product'); ?></span>
              <h3><?php the_field('title_product'); ?></h3>
              <p><?php the_field('text_product'); ?></p>
              <a href="<?php the_field('url_product'); ?>" class="xln-button">Learn More</a>
            </div>
           </div>
           <div class="col">
             <img src="<?php the_field('img_product'); ?>" alt="<?php the_field('title_product'); ?>">
           </div>
        </div>
      </div>
    </section>
    <?php } ?> 

    <?php if( wp_is_mobile() ) { ?>
    <div class="on-mobile">
      <div id="share"></div>
    </div>
    <?php } ?>
  </div>

  <?php if( !wp_is_mobile() ) { ?>
  <div class="on-desktop">
    <div id="share"></div>
  </div>
   <?php } ?>

<?php get_footer (); ?>