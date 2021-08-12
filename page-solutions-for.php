<?php
/**
 * Template Name: Solutions For
 */
get_header();
?>

<section class="page-promotions">
  <div class="solutions-page main-info-block right-start padding-15">
    <div class="rectangle"></div>
    <div class="container">
      <div class="info-flex d-flex">
        <div class="page-40">
          <?php
          $sf_image = get_field('sf_image');
          if( !empty($sf_image) ): ?>
            <img src="<?php echo $sf_image['url']; ?>" alt="<?php echo $sf_image['alt']; ?>">
          <?php endif; ?>
        </div>
        <div class="page-60">
          <div class="content-column d-flex">
            <h1 class="like-header item-center green-c"><?php echo the_field('sf_title');?></h1>
            <div class="small-header green-c"><?php echo the_field('sf_subtitle');?></div>
            <div class="info-content">
              <p><?php echo the_field('sf_text');?></p>
            </div>
            <a href="<?php echo the_field('sf_btn_url');?>" class="danger-btn"><?php echo the_field('sf_btn_text');?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="solutions-page feature">
    <div class="container">
      <div class="loop d-flex justify-center">
        <?php if( have_rows('sf_features') ): ?>
          <?php while ( have_rows('sf_features') ) : the_row(); ?>
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $sf_features_icon = get_sub_field('sf_features_icon');
            if( !empty($sf_features_icon) ): ?>
              <img src="<?php echo $sf_features_icon['url']; ?>" alt="<?php echo $sf_features_icon['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_sub_field('sf_features_title');?>
            </div>
          </div>
        </div>
          <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="solutions-page second main-info-block right-start padding-15">
    <div class="container">
      <div class="info-flex d-flex">
        <div class="page-60">
          <div class="content-column d-flex">
            <h1 class="like-header item-center green-c"><?php the_field('sf_text_block_title');?></h1>
            <div class="small-header green-c"><?php the_field('sf_text_block_subtitle');?></div>
            <div class="info-content">
              <p><?php the_field('sf_text_block_text');?></p>
            </div>
            <a href="<?php the_field('sf_text_block_btn_url');?>" class="success-btn"><?php the_field('sf_text_block_btn_text');?></a>
          </div>
        </div>
        <div class="page-40">
          <?php
          $sf_text_block_image = get_field('sf_text_block_image');
          if( !empty($sf_text_block_image) ): ?>
            <img src="<?php echo $sf_text_block_image['url']; ?>" alt="<?php echo $sf_text_block_image['alt']; ?>">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="feature for-page">
  <div class="container">
    <div class="loop vdc-row d-flex justify-center">
      <div class="page-30">
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $ls_image_1 = get_field('ls_image_1');
            if( !empty($ls_image_1) ): ?>
              <img src="<?php echo $ls_image_1['url']; ?>" alt="<?php echo $ls_image_1['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('ls_title_1'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('ls_content_1'); ?>
            </div>
          </div>
        </div>
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $ls_image_2 = get_field('ls_image_2');
            if( !empty($ls_image_2) ): ?>
              <img src="<?php echo $ls_image_2['url']; ?>" alt="<?php echo $ls_image_2['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('ls_title_2'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('ls_content_2'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="page-30">
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $ls_image_3 = get_field('ls_image_3');
            if( !empty($ls_image_3) ): ?>
              <img src="<?php echo $ls_image_3['url']; ?>" alt="<?php echo $ls_image_3['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('ls_title_3'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('ls_content_3'); ?>
            </div>
          </div>
        </div>
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $ls_image_4 = get_field('ls_image_4');
            if( !empty($ls_image_4) ): ?>
              <img src="<?php echo $ls_image_4['url']; ?>" alt="<?php echo $ls_image_4['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('ls_title_4'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('ls_content_4'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="page-30">
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $ls_image_5 = get_field('ls_image_5');
            if( !empty($ls_image_5) ): ?>
              <img src="<?php echo $ls_image_5['url']; ?>" alt="<?php echo $ls_image_5['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('ls_title_5'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('ls_content_5'); ?>
            </div>
          </div>
        </div>
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $ls_image_6 = get_field('ls_image_6');
            if( !empty($ls_image_6) ): ?>
              <img src="<?php echo $ls_image_6['url']; ?>" alt="<?php echo $ls_image_6['alt']; ?>">
            <?php endif; ?>
          </div>					<div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('ls_title_6'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('ls_content_6'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="page-promotions">
  <div class="solutions-page main-info-block right-start padding-15">
    <div class="container">
      <div class="info-flex d-flex">
        <div class="page-40">
          <?php
          $sf_text_block2_image = get_field('sf_text_block2_image');
          if( !empty($sf_text_block2_image) ): ?>
            <img src="<?php echo $sf_text_block2_image['url']; ?>" alt="<?php echo $sf_text_block2_image['alt']; ?>">
          <?php endif; ?>
        </div>
        <div class="page-60">
          <div class="content-column d-flex">
            <div class="small-header green-c"><?php the_field('sf_text_block2_title');?></div>
            <div class="info-content">
              <p><?php the_field('sf_text_block2_text');?></p>
            </div>
            <a href="<?php the_field('sf_text_block2_btn_url');?>" class="danger-btn"><?php the_field('sf_text_block2_btn_text');?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
