<?php
/**
 * Template Name: Kubernetes
 */
$wlc_txt = get_field('wlc_txt');
$wlc_desc_text = get_field('wlc_desc_text');
$wlc_text_btn = get_field('wlc_text_btn');

get_header(); ?>

<section class="welcome">
  <!--<div class="wlc-hidden-bg"></div>-->
  <div class="container">
    <div class="wlc-box d-flex align-center padding-15">
      <div class="wlc-content page-40 d-flex">
        <h1 class="like-header">
        <?php echo $wlc_txt; ?>
        </h1>
        <div class="wlc-text">
          <?php echo $wlc_desc_text; ?>
        </div>
        <div class="wlc-text">
          <div class="d-flex flex-row">
            <?php 
            $button_1 = get_field('product_button_1', 'options'); 
            $button_2 = get_field('product_button_2', 'options');
            ?>
            <?php if ($button_1): ?>
              <a href="<?php echo $button_1['url']; ?>"
                target="<?php echo $button_1['target']; ?>"
                class="xln-button">
                <?php echo $button_1['title']; ?>
              </a>
            <?php endif; ?>
            <?php if ($button_2): ?>
              <a href="<?php echo $button_2['url']; ?>"
                target="<?php echo $button_2['target']; ?>"
                class="xln-button xln-button--white">
                <?php echo $button_2['title']; ?>
              </a>
            <?php endif; ?>    
          </div>                    
        </div>
      </div>
      <div class="wlc-banner">
        <img src="<?php echo TEMPLATE_URL; ?>/img/Kubernetes2.png" class="img-height" alt="slider">
      </div>
      <div class="wlc-banner-big-scr page-60">        
        <img src="<?php echo TEMPLATE_URL; ?>/img/Kubernetes2.png" class="img-height" alt="slider">
      </div>
    </div>
  </div>
</section>





<section class="s-serv-features s-kubernetes-features">
  <div class="container">
    <h2><?php the_field('blocks_title') ?></h2>
    <div class="d-flex">
      
        <?php if( have_rows('blocks') ): ?>
        <?php while ( have_rows('blocks') ) : the_row(); ?>

        <div class="col">
          <div class="serv-features">
            <div class="serv-features-img">
              <img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" />
            </div>
            <h3><?php the_sub_field('title'); ?></h3>
            <p><?php the_sub_field('text'); ?></p>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>     

    </div>
  </div>
</section>

<section class="s-ms-ti">
  <div class="container">
    <div class="d-flex">
      <div class="col">
        <div class="ms-ti-text">
          <h3><?php the_field('title_ti'); ?></h3>
          <p><?php the_field('text_ti'); ?></p>
        </div>
      </div>
      <div class="col">
        <img src="<?php the_field('img_ti'); ?>" alt="<?php the_field('title_ti'); ?>">
      </div>
    </div>
  </div>
</section>

<section class="s-serv-features s-kubernetes-features s-gallery-slider">
  <div class="container">
    <h2 style="margin: 0 0 10px;"><?php the_field('title_g') ?></h2>
    <p><?php the_field('text_g') ?></p>

    <div class="gallery-slider-wrap">
    <?php 
  $images = get_field('gallery');
      if( $images ): ?>
    <div class="gallery-slider">
      <?php foreach( $images as $image ): ?>

      <div class="gallery-one">
        <img src="<?php echo $image['url']; ?>" alt="logos">
        <p><?php echo $image['description']; ?></p>
      </div>

      <?php endforeach; ?>
    </div>  
    <?php endif; ?> 
    </div>
        
  </div>
</section>

<section class="s-ms-blocks2">
  <div class="container">
    <h2><?php the_field('title_list') ?></h2>
    <div class="d-flex">
      
        <?php if( have_rows('blocks_list') ): ?>
        <?php while ( have_rows('blocks_list') ) : the_row(); ?>

        <div class="col">
          <div class="ms-blocks2-one">
            <div class="ms-blocks2-title serv-inc-title">
              <img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" />
              <h3><?php the_sub_field('title'); ?></h3>
            </div>
            <p><?php the_sub_field('text'); ?></p>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>     

    </div>
  </div>
</section>

<section class="s-kubernetes-btn">
    <h3 class="d-none">Block</h3>
  <div class="container">
    <div class="d-flex">
      
        <?php if( have_rows('blocks_b') ): $first = true; ?>
        <?php while ( have_rows('blocks_b') ) : the_row(); ?>

        <div class="col">
          <div class="kubernetes-btn">
            <p><?php the_sub_field('text'); ?></p>
            <a href="<?php the_sub_field('url'); ?>" 
               class="xln-button <?php echo !$first ? 'xln-button--white' : '' ?>">
                <?php the_sub_field('btn_text'); ?>
            </a>
          </div>
        </div>
        <?php $first = false; ?>
        <?php endwhile; ?>
        <?php endif; ?>     

    </div>
  </div>
</section>

<?php if(get_field('title_logos')) {
  $tl = get_field('title_logos');
} else {
  $tl = get_field('our_clients','option');
}?>
<section class="product partners padding-15">
  <div class="container">
    <div class="like-header">
      <?php echo $tl; ?>
    </div>
    <?php include 'components/our-clients.php' ?>
  </div>
</section>

<?php include 'components/testimonials.php' ?>
<?php include 'components/footer-form.php' ?>

<?php get_footer(); ?>