<?php if( have_rows('slider_fb') ) { ?>

<section class="s-allp-content">
  <h3 class="d-none">Block</h3>
  <div class="container">

    <div class="like-header"><?php the_field('title_fb'); ?></div>

      <div class="slider">
      <?php while ( have_rows('slider_fb') ) : the_row(); ?>
      <div class="d-flex">

          <?php if(get_sub_field('video_fb')): ?>
          <div class="col">

          <?php
            $video_embed_link = get_sub_field('video_fb');
            $video_block_img = get_sub_field('bg_video_fb');
            $video_block_img_src = wp_get_attachment_image_url($video_block_img, 'full', true);

          if ($video_embed_link_del) {?>
          <div class="ytvideo" style="background-image: url(<?php echo $video_block_img; ?>);" data-video="<?php echo $video_embed_link; ?>"></div>
          <?php } ?>

          <a class="popup-video slider-video" href="<?php echo $video_embed_link; ?>"><img src="<?php echo $video_block_img; ?>" alt="<?php the_field('title_fb'); ?>"/></a>

          </div>
          <?php endif; ?>

          <div class="col">
            <div class="allp-content2">
                 <?php the_sub_field('content_fb'); ?>
                <div class="allp-content-person">
                  <span><?php the_sub_field('name_fb'); ?></span>
                  <p><?php the_sub_field('position_fb'); ?></p>
                </div>
            </div>
          </div>

      </div>  
      <?php endwhile; ?>
      </div>
      
  </div>
</section>

<?php } else {  ?>

<?php if( have_rows('slider_fb','option') ): ?>
<section class="s-allp-content">
  <h3 class="d-none">Block</h3>
  <div class="container">

      <div class="like-header"><?php the_field('title_fb','option'); ?></div>

      <div class="slider">
      <?php while ( have_rows('slider_fb','option') ) : the_row(); ?>
      <div class="d-flex">

          <?php if(get_sub_field('video_fb','option')): ?>
          <div class="col">

          <?php
            $video_embed_link = get_sub_field('video_fb','option');
            $video_block_img = get_sub_field('bg_video_fb','option');
            $video_block_img_src = wp_get_attachment_image_url($video_block_img, 'full', true);

          if ($video_embed_link_del) {?>
          <div class="ytvideo" style="background-image: url(<?php echo $video_block_img; ?>);" data-video="<?php echo $video_embed_link; ?>"></div>
          <?php } ?>

          <a class="popup-video slider-video" href="<?php echo $video_embed_link; ?>"><img src="<?php echo $video_block_img; ?>" alt="<?php the_field('title_fb'); ?>"/></a>

          </div>
          <?php endif; ?>

          <div class="col">
            <div class="allp-content2">
                <?php the_sub_field('content_fb','option'); ?>
                <div class="allp-content-person">
                  <span><?php the_sub_field('name_fb','option'); ?></span>
                  <p><?php the_sub_field('position_fb','option'); ?></p>
                </div>
            </div>
          </div>

      </div>  
      <?php endwhile; ?>
      </div>

  </div>
</section>
<?php endif; } ?>