<?php
/**
 * Template Name: Customer Project
 */
$t_title = get_field('t_title');
$testimonials = get_field('testimonials');
get_header();
?>

  <div class="page-customer-project">

    <?php include 'template-parts/customer-projects.php' ?>


    <section class="block-testimotionals">
      <div class="customer-row">
        <div class="container">
          <h1 class="d-none">Customer Project</h1>
          <?php if($testimonials) { ?>
            <div class="customers">
              <h2 class="like-header">
                <?php echo $t_title; ?>
              </h2>
              <div class="slider">
                <?php if( have_rows('testimonials') ): ?>
                  <?php while( have_rows('testimonials') ): the_row();
                    $t_ava = get_sub_field('t_img');
                    $t_img = wp_get_attachment_image_src( $t_ava, 'full', true );
                    $t_name = get_sub_field('t_name');
                    $t_text = get_sub_field('t_text');
                    $t_logo = get_sub_field('t_logo');
                    $t_content = get_sub_field('t_content');
                    ?>
                    <div class="slider-item">
                      <div class="slider-element d-flex">
                        <div class="item-ava">
                          <img src="<?php echo $t_img[0]; ?>" alt="slider">
                        </div>
                        <div class="item-content d-flex">
                          <div class="item-name">
                            <?php echo $t_name; ?>
                          </div>
                          <div class="item-desc">
                            <?php echo $t_text; ?>
                          </div>
                          <div class="item-text">
                            <?php echo $t_content; ?>
                          </div>
                          <img class="t-logo" src="<?php echo $t_logo; ?>">
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <section class="page-promotions">
      <div class="block-questions">
        <div class="container">
          <h2><?php echo the_field('cp_q_title'); ?></h2>
          <p><?php echo the_field('cp_q_text'); ?></p>
          <a href="<?php echo the_field('cp_q_btn_url'); ?>" class="btn-contact"><?php echo the_field('cp_q_btn'); ?></a>
        </div>
      </div>
    </section>


    <section class="adv-page-client partners">
      <div class="container">
        <div class="partners-slider">
          <?php if( have_rows('p_slider', 'option') ): ?>
            <?php while( have_rows('p_slider', 'option') ): the_row();
              $p_slider_image = get_sub_field('p_img');
              $p_img = wp_get_attachment_image_src( $p_slider_image, 'full', true );
              ?>
              <div class="p-slider-item">
                <img src="<?php echo $p_img[0];?>" alt="partners">
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>

  </div>

<?php get_footer(); ?>