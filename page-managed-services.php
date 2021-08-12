<?php
/**
 * Template Name: Managed Services
 */
$wlc_txt = get_field('wlc_txt');
$wlc_desc_text = get_field('wlc_desc_text');
$wlc_link = get_field('wlc_link');

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
	   <a href="<?php echo $wlc_link; ?>" class="xln-button"><?php the_field('welcome_button'); ?></a>
      </div>
      <div class="wlc-banner">
        <img src="<?php echo TEMPLATE_URL; ?>/img/bg-ms.png" class="img-height" alt="slider">
      </div>
      <div class="wlc-banner-big-scr page-60">        
        <img src="<?php echo TEMPLATE_URL; ?>/img/bg-ms.png" class="img-height" alt="slider">
      </div>
    </div>
  </div>
</section>

<section class="s-price-block">
    <h3 class="d-none">Block</h3>
  <div class="container">
    <div class="d-flex">

          <?php if( have_rows('blocks_t') ): ?>
          <?php while ( have_rows('blocks_t') ) : the_row(); 
          if(get_sub_field('btn_text')) {
            $text_btn = get_sub_field('btn_text');
          } else {
            $text_btn = 'Get a Quote';
          }
          ?>

          <div class="col">
            <div class="price-blocks">
              <div class="price-blocks-eh">
                <h3><?php the_sub_field('title'); ?></h3>
                <p><?php the_sub_field('text'); ?></p> 
              </div>
              <div class="price-blocks-bot">
                <?php if(get_sub_field('text_bp')) {
                    echo '<span>' . 
                        get_sub_field('text_bp') . 
                        '<br>' . 
                        get_sub_field('price') . 
                        '</span>';
                } ?>
                <a href="<?php the_sub_field('url'); ?>" class="xln-button"><?php echo $text_btn; ?></a> 
              </div>
            </div>
          </div>

          <?php endwhile; ?>
          <?php endif; ?>     

    </div>
  </div>
</section>

<section class="s-ms-blocks2">
  <div class="container">
    <h2><?php the_field('title_p') ?></h2>
    <div class="d-flex">
      
        <?php if( have_rows('blocks_p') ): ?>
        <?php while ( have_rows('blocks_p') ) : the_row(); ?>

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

<section class="s-ms-ti" id="mSecurity">
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

<section class="s-serv-features s-kubernetes-features">
  <div class="container">
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

<!-- <div class="page-customer-project">
  <?php //include 'components/success-stories.php' ?>
</div> -->

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

<?php get_footer(); ?>