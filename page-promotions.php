<?php
/**
 * Template Name: Promotions
 */
get_header();
?>

<div class="page-promotions">

  <section class="solutions-page main-info-block right-start padding-15">
    <div class="rectangle"></div>
    <div class="container">
      <div class="info-flex d-flex">
        <div class="page-40">
          <?php
          $ph_image = get_field('promotions_head_image');
          if( !empty($ph_image) ): ?>
          <img src="<?php echo $ph_image['url']; ?>" alt="<?php echo $ph_image['alt']; ?>">
          <?php endif; ?>
        </div>
        <div class="page-60">
          <div class="content-column d-flex">
            <h1 class="like-header item-center green-c"><?php echo the_field('promotions_head_title'); ?></h1>
            <div class="small-header green-c"><?php echo the_field('promotions_head_subtitle'); ?></div>
            <div class="info-content">
              <p><?php echo the_field('promotions_head_text'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="solutions-page feature">
    <div class="container">
      <div class="loop d-flex justify-center">
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $pf_image1 = get_field('promotions_f_image1');
            if( !empty($pf_image1) ): ?>
              <img src="<?php echo $pf_image1['url']; ?>" alt="<?php echo $pf_image1['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('promotions_f_title1'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('promotions_f_text1'); ?>
            </div>
          </div>
        </div>
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $pf_image2 = get_field('promotions_f_image2');
            if( !empty($pf_image2) ): ?>
              <img src="<?php echo $pf_image2['url']; ?>" alt="<?php echo $pf_image2['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('promotions_f_title2'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('promotions_f_text2'); ?>
            </div>
          </div>
        </div>
        <div class="item-feature d-flex">
          <div class="item-logo">
            <?php
            $pf_image3 = get_field('promotions_f_image3');
            if( !empty($pf_image3) ): ?>
              <img src="<?php echo $pf_image3['url']; ?>" alt="<?php echo $pf_image3['alt']; ?>">
            <?php endif; ?>
          </div>
          <div class="item-f-content">
            <div class="item-f-title">
              <?php echo the_field('promotions_f_title3'); ?>
            </div>
            <div class="item-f-content">
              <?php echo the_field('promotions_f_text3'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="support-you" id="hy-quessions-scroll">
    <h2 class="like-header">
      <?php echo the_field('promotions_cd_title'); ?>
    </h2>
    <div class="container">
      <div class="d-flex loop justify-center">
        <?php if( have_rows('promotions_deal_item') ): ?>
          <?php while( have_rows('promotions_deal_item') ): the_row();
            ?>
            <div class="col-item">
              <div class="deal-item">
                <h3 class="di-title"><?php echo the_sub_field('promotions_cd_title'); ?></h3>
                <p class="di-text"><?php echo the_sub_field('promotions_cd_text'); ?></p>
                <a href="<?php echo the_sub_field('promotions_cd_btn_url'); ?>" class="link-btn"><?php echo the_sub_field('promotions_cd_btn'); ?></a>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="block-questions">
    <div class="container">
      <h2><?php echo the_field('promotions_q_title'); ?></h2>
      <p><?php echo the_field('promotions_q_text'); ?></p>
      <div class="q-row">
        <a href="tel:<?php echo the_field('promotions_q_phone'); ?>"><?php echo the_field('promotions_q_phone'); ?></a>
        <span>|</span>
        <a href="mailto:<?php echo the_field('promotions_q_email'); ?>"><?php echo the_field('promotions_q_email'); ?></a>
      </div>
      <a href="<?php echo the_field('promotions_q_btn_url'); ?>" class="btn-contact"><?php echo the_field('promotions_q_btn'); ?></a>
    </div>
  </section>

  <br><br>

  <section class="page-customer-project">
    <?php include 'components/customer-projects.php' ?>
  </section>

  <section class="adv-page-client partners">
    <div class="container">
      <h2 class="like-header">
        <?php echo the_field('our_clients', 'option'); ?>
      </h2>
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