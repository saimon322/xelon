<?php
/**
 * Template Name: Servers
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
        <img src="<?php echo TEMPLATE_URL; ?>/img/Servers_1440.png" class="img-height" alt="slider">
      </div>
      <div class="wlc-banner-big-scr page-60">        
        <img src="<?php echo TEMPLATE_URL; ?>/img/Servers_1440.png" class="img-height" alt="slider">
      </div>
    </div>
  </div>
</section>

<section class="s-serv-blocks">
  <div class="container">
    <div class="d-flex">
      
        <?php if( have_rows('blocks') ): ?>
        <?php while ( have_rows('blocks') ) : the_row(); ?>

        <div class="col">
          <div class="serv-blocks">
            <img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" />
            <div class="serv-blocks-text">
              <h3><?php the_sub_field('title'); ?></h3>
              <p><?php the_sub_field('text'); ?></p> 
            </div>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>     

    </div>
  </div>
</section>

<?php include 'components/servers-solution.php' ?>

<?php if( have_rows('blocks_price__del') ): ?>
<section class="s-price-block s-pb-dark">
  <div class="container">

    <h2 class="like-header">
    <?php the_field('title_price'); ?>
    </h2>
    <div class="wlc-text">
      <?php the_field('subtitle_price'); ?>
    </div>

    <div class="d-flex">

          <?php while ( have_rows('blocks_price') ) : the_row(); 
          if(get_sub_field('btn_text')) {
            $text_btn = get_sub_field('btn_text');
          } else {
            $text_btn = 'Try for free!';
          }
          ?>

          <div class="col">
            <div class="price-blocks">
              <div class="price-blocks-eh">
                <h3><?php the_sub_field('title'); ?></h3>
                <?php the_sub_field('text'); ?>
              </div>
              <div class="price-blocks-bot">
                <span><?php the_sub_field('price'); ?></span>
                <a href="<?php the_sub_field('url'); ?>"><?php echo $text_btn; ?></a> 
              </div>
            </div>
          </div>

          <?php endwhile; ?>

    </div>
  </div>
</section>
<?php endif; ?>   

<section class="s-serv-features">
  <div class="container">
    <h2><?php the_field('title_f') ?></h2>
    <div class="d-flex">
      
        <?php if( have_rows('features') ): ?>
        <?php while ( have_rows('features') ) : the_row(); ?>

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

<?php 
$images = get_field('gallery');
    if( $images ): ?>
<section class="s-serv-features s-kubernetes-features">
	<div class="container">
		<h2 style="margin: 0 0 10px;"><?php the_field('title_g') ?></h2>
		<p><?php the_field('text_g') ?></p>

    <div class="gallery-slider-wrap">
		<div class="gallery-slider">
			<?php foreach( $images as $image ): ?>

			<div class="gallery-one">
				<img src="<?php echo $image['url']; ?>" alt="logos">
				<p><?php echo $image['description']; ?></p>
			</div>

			<?php endforeach; ?>
		</div>	
    </div>
				
	</div>
</section>
<?php endif; ?> 

<section class="s-serv-need">
  <div class="container">
    <h2><?php the_field('title_s') ?></h2>
    <p><?php the_field('text_s') ?></p>
	  

	  
	  
    <div class="d-flex">
      
        <?php if( have_rows('blocks_s') ): ?>
        <?php while ( have_rows('blocks_s') ) : the_row(); ?>

        <div class="col">
          <div class="serv-need">
            <h3><?php the_sub_field('title'); ?></h3>
            <?php if(get_sub_field('img')) { ?>
            <img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" />
            <?php } ?>
            <?php if(get_sub_field('text')) { ?>
            <p style="padding-bottom:20px"><?php the_sub_field('text'); ?></p>
            <?php } ?>
            <?php if( have_rows('list') ): ?>
            <ul>
            <?php while ( have_rows('list') ) : the_row(); 
                if(get_sub_field('check')) { $icon = '<i class="las la-check"></i>'; } else { $icon = '<i class="las la-times"></i>'; }?>

                <li><?php echo $icon; ?><?php the_sub_field('text'); ?></li>

            <?php endwhile; ?>
            </ul>
            <?php endif; ?>
			  
            <a href="<?php the_sub_field('url'); ?>" class="xln-button xln-button--green">
                <?php the_sub_field('btn_text'); ?>
            </a>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>     

    </div>
  </div>
</section>

<?php include 'components/included.php' ?>

<?php if(get_field('title_logos')) {
  $tl = get_field('title_logos');
} else {
  $tl = get_field('our_clients','option');
}?>
<section class="product partners padding-15">
  <div class="container">
    <h2 class="like-header">
      <?php echo $tl; ?>
    </h2>
    <?php include 'components/our-clients.php' ?>
  </div>
</section>

<?php include 'components/testimonials.php' ?>
<?php include 'components/footer-form.php' ?>

<?php get_footer(); ?>