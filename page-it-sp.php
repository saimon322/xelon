<?php
/**
* Template Name: IT Service Provider
*/ 
get_header(); 
$wlc_text_btn = get_field('wlc_text_btn');
?>

<section class="s-it-sp-header" style='background:url(<?php the_field('header_img'); ?>) no-repeat scroll center bottom; background-size: 75%;'>	
	<div class="container">
		<h1><?php the_field('title_header'); ?></h1>
		<p><?php the_field('text_header'); ?></p>
        <div class="wlc-text">
            <div class="d-flex flex-row">
                <form method="POST" class="send-modal-data" id="form-hero">
                    <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
                    <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
                    <input type="email" name="email" class="simple-input email-input-home" placeholder="Email" style="width: 280px"/>
                    <button class="xln-button send-subscribe" style="width: 150px"><?php echo $wlc_text_btn; ?></button>
                    <div class="msg"></div>
                </form>
            </div>
            <div style="margin: 20px auto 0; color: #000; font-size: 12px; max-width: 370px;"><?php the_field('wlc_under_form') ?></div>
        </div>
	</div>
</section>

<section class="s-it-sp-usercases s-serv-need">
	<div class="container">
		<h2><?php the_field('title_usercases'); ?></h2>
		<p><?php the_field('text_usercases'); ?></p>
		<div class="d-flex">

	        <?php if( have_rows('usercases') ): ?>
	        <?php while ( have_rows('usercases') ) : the_row(); ?>

	        <div class="col">
	          <div class="usercases-one serv-need">
	          	<div class="usercases-one-eh">
		            <h3><?php the_sub_field('title'); ?></h3>
		            <?php if( have_rows('list') ): ?>
		            <ul>
		            <?php while ( have_rows('list') ) : the_row(); 
		                if(get_sub_field('check')) { $icon = '<i class="las la-check"></i>'; } else { $icon = '<i class="las la-times"></i>'; }?>

		                <li><?php echo $icon; ?><?php the_sub_field('text'); ?></li>

		            <?php endwhile; ?>
		            </ul>
		            <?php endif; ?>
	            </div>
	            <?php if(get_sub_field('text_btn')) { ?>
	            <div class="usercases-btn">
	            	<a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text_btn'); ?></a>
	            </div>
	            <?php } ?>
	          </div>
	        </div>

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
		<h2 class="like-header">
			<?php echo $tl; ?>
		</h2>
		<?php include 'template-parts/our-clients.php' ?>
	</div>
</section>

<section class="s-it-sp-benefits">
	<div class="container">
		<h2><?php the_field('title_benefits'); ?></h2>
		<ul class="d-flex">

	        <?php if( have_rows('benefits') ): ?>
	        <?php while ( have_rows('benefits') ) : the_row(); ?>

	          <li><i class="las la-check"></i><?php the_sub_field('title'); ?></li>

	        <?php endwhile; ?>
	        <?php endif; ?> 

		</ul>
	</div>
</section>

<section class="page-customer-project">
  <?php include 'template-parts/customer-projects.php' ?>
</section>

<?php include 'template-parts/testimonials.php' ?>
<?php include 'template-parts/footer-form.php' ?>

<?php get_footer(); ?>