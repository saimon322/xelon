<?php
/**
 * Template Name: Solutions Home
 */
get_header();
?>


<section class="page-position">
  <div class="position-text">
    <div class="container">
      <h1><?php echo the_field('solutions_title');?></h1>
      <p><?php echo the_field('textsolutions_text');?>
      </p>
    </div>
  </div>
</section>

<section class="solution-type">
  <div class="container">
    <div class="st-row">
      <?php if( have_rows('solutions_buttons') ): ?>
        <?php while ( have_rows('solutions_buttons') ) : the_row(); ?>
      <a href="<?php echo the_sub_field('solution_btn_link');?>" class="st-item">
          <?php
          $solution_btn_icon = get_sub_field('solution_btn_icon');
          if( !empty($solution_btn_icon) ): ?>
            <img src="<?php echo $solution_btn_icon['url']; ?>" alt="<?php echo $solution_btn_icon['alt']; ?>">
          <?php endif; ?>
          <p><?php echo the_sub_field('solution_btn_text');?></p>
        </a>
        <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="page-template-page-about-us">
  <div class="facts">
    <div class="container">
      <div class="facts-area">
        <h2 class="like-header"><?php echo the_field('ff_title');?></h2>
        <div class="loop d-flex facts-item-row">
          <div class="facts-item d-flex">
            <div class="f-item-logo">
              <img src="<?php echo TEMPLATE_URL; ?>/img/icons/user.svg" witdh="50" height=50 alt="user">
            </div>
            <div class="f-item-block d-flex flex-direction">
              <div class="f-item-count">
                <?php the_field('customers_count'); ?>
              </div>
              <div class="f-item-txt">
                <?php the_field('customer_text'); ?>
              </div>
            </div>
          </div>
          <div class="facts-item d-flex">
            <div class="f-item-logo">
              <img src="<?php echo TEMPLATE_URL; ?>/img/icons/earth.svg" witdh="50" height=50 alt="earth">
            </div>
            <div class="f-item-block d-flex flex-direction">
              <div class="f-item-count">
                <?php the_field('countries_count'); ?>
              </div>
              <div class="f-item-txt">
                <?php the_field('countries_text'); ?>
              </div>
            </div>
          </div>
          <div class="facts-item d-flex">
            <div class="f-item-logo">
              <img src="<?php echo TEMPLATE_URL; ?>/img/icons/location.svg" witdh="50" height=50 alt="location">
            </div>
            <div class="f-item-block d-flex flex-direction">
              <div class="f-item-count">
                <?php the_field('swiss_count'); ?>
              </div>
              <div class="f-item-txt">
                <?php the_field('swiss_text'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-customer-project" style="position: relative; z-index: 1;">
  <?php include 'components/customer-projects.php' ?>
</section>

<section class="page-story">
  <div class="bg-upper"></div>
  <div class="page-position">
    <div class="position-comment">
      <div class="container">
        <div class="pc-row">
          <?php
          $story_c_avatar = get_field('story_c_avatar');
          if( !empty($story_c_avatar) ): ?>
            <img src="<?php echo $story_c_avatar['url']; ?>" alt="<?php echo $story_c_avatar['alt']; ?>">
          <?php endif; ?>
          <div class="pc-text">
            <h4><?php echo the_field('story_c_name'); ?></h4>
            <p class="info"><?php echo the_field('story_c_post'); ?></p>
            <p class="text"><?php echo the_field('story_c_text'); ?></p>
            <div class="pc-brands">
              <?php if( have_rows('story_c_brands') ): ?>
                <?php while ( have_rows('story_c_brands') ) : the_row(); ?>
                  <?php
                  $story_brand_img = get_sub_field('story_c_brands_logo');
                  if( !empty($story_brand_img) ): ?>
                    <img src="<?php echo $story_brand_img['url']; ?>" alt="<?php echo $story_brand_img['alt']; ?>">
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php else : ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
