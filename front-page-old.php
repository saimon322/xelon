<?php
/**
* Template Name: Home page
*/
preg_match('#page/(\d+)#', $_SERVER['REQUEST_URI'], $match_page);
$paged = isset($match_page[1]) ? $match_page[1] : 1;
$url_current = SITE_PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$wlc_txt = get_field('wlc_txt');
$wlc_desc_text = get_field('wlc_desc_text');
$wlc_text_btn = get_field('wlc_text_btn');
$elevator_header = get_field('elevator_header');
$elevator_text = get_field('elevator_text');
$countdown = get_field('countdown');
$ram = get_field('ram');
$uptime = get_field('uptime');
$deals_header = get_field('deals_header');
$deals_content = get_field('deals_content');
$deals_link = get_field('deals_link');
$wlc_link = get_field('wlc_link');
$t_title = get_field('t_title');
$testimonials = get_field('testimonials');
$block_title = get_field('block_title');
$block_description = get_field('block_description');
$block_link = get_field('block_link');
$c_map_img = get_field('c_map');
$c_map = wp_get_attachment_image_src( $c_map_img, 'full', true );
$read_all_news = get_field('read_all_news');
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
    
                        <a class="cta-primary" href="https://xelonag.pipedrive.com/scheduler/RpyOOri2/austausch" target="_blank" tabindex="0">Mit Ueli sprechen</a>
                        <a class="cta-secondary open-popup-link" href="#open-popup">Kostenlos registrieren</a>
    
                    </div>
                    
                </div>
			</div>
			<div class="wlc-banner">
				<img src="<?php echo TEMPLATE_URL; ?>/img/xillustration2.webp" class="img-height" alt="slider">
			</div>
			<div class="wlc-banner-big-scr page-60">				
				<img src="<?php echo TEMPLATE_URL; ?>/img/xillustration2.webp" class="img-height" alt="slider">
			</div>
		</div>
	</div>
	
</section>
<section class="partners item-center"  style="margin-bottom: 120px;">
    <div class="container">
        <div style="margin-bottom: 80px;text-align:center; font-weight:bold">
            Unsere Schweizer Kunden:
        </div>

        <div class="home_logo_header">

            <?php if( have_rows('logo_header') ): ?>
                <?php while( have_rows('logo_header') ): the_row();
                    $p_slider_image = get_sub_field('p_header_img');
                    $p_img = wp_get_attachment_image_src( $p_slider_image, 'medium', true );
                    ?>
                    <div class="home-logo-header-item">
                        <img src="<?php echo $p_img[0];?>" alt="partners">
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>


<?php include 'components/blocks3.php' ?>	


<section class="recent-news">
	<div class="rn-hidden-bg"></div>
	<div class="container">
		<div class="like-header">
			<?php the_field('recent_news_btn', 'option'); ?>
		</div>
		<?php include 'filter.php' ?>
	</div>
</section>
	
<?php include 'components/testimonials.php' ?>
<?php include 'components/footer-form.php' ?>

<?php get_footer(); ?>