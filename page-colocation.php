<?php
/**
* Template Name: Product page - Colocation
*/
$wlc_txt = get_field('wlc_txt');
$wlc_desc_text = get_field('wlc_desc_text');

get_header(); ?>

<section class="welcome">
  <div class="container">
    <div class="wlc-box d-flex align-center padding-15">
      <div class="wlc-content page-40 d-flex">
        <h1 class="like-header">
        <?php echo $wlc_txt; ?>
        </h1>
        <div class="wlc-text">
          <?php echo $wlc_desc_text; ?>
        </div>
      </div>
      <div class="wlc-banner">
        <img src="<?php echo TEMPLATE_URL; ?>/img/bg-colocation.png" class="img-height" alt="slider">
      </div>
      <div class="wlc-banner-big-scr page-60">        
        <img src="<?php echo TEMPLATE_URL; ?>/img/bg-colocation.png" class="img-height" alt="slider">
      </div>
    </div>
  </div>
</section>

<?php include 'components/servers-solution.php' ?>

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

<section class="our-ds page-padding" id="our-ds-scroll">
	<div class="container">
		<h2 class="like-header">
			<?php echo the_field('core_p_title'); ?>
		</h2>
		<div class="our-absolute-container">
			<div class="loop ds-row-items d-flex justify-center">
				<?php if( have_rows('colo_add_card') ): ?>
				<?php while( have_rows('colo_add_card') ): the_row();
					$ctable_title = get_sub_field('ctable_title');
					$ctabel_describtion = get_sub_field('ctabel_describtion');
					$ctabel_content = get_sub_field('ctabel_content');
					$ctabel_price = get_sub_field('ctabel_price');
					$ctabel_link = get_sub_field('ctabel_link');
					if(get_sub_field('configure_btn')) {
						$text_btn = get_sub_field('configure_btn');
					} else {
						$text_btn = get_field('configure_btn', 'option');
					}
				?>
				<div class="ds-item d-flex flex-direction">
					<h3 class="ds-item-title">
						<?php echo $ctable_title; ?>
					</h3>
					<div class="ds-item-desc">
						<?php echo $ctabel_describtion; ?>
					</div>
					<div class="ds-item-content">
						<?php echo $ctabel_content; ?>
					</div>
					<div class="ds-price-row d-flex">
						<div class="ds-price-t">
							<?php echo $ctabel_price; ?>
						</div>
						<div class="ds-configure">
							<a href="<?php echo $ctabel_link;?>" class="xln-button"><?php echo $text_btn; ?></a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>