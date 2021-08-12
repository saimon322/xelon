<?php
/**
* Template Name: Customers
*/ 
get_header(); ?>

<section class="s-header-sustomers">
	<div class="container">
        <h1 class="d-none"><?php the_field('title_ci'); ?></h1>
		<h2><?php the_field('title_ci'); ?></h2>
		<div class="d-flex">
			
	        <?php if( have_rows('customers') ): ?>
	        <?php while ( have_rows('customers') ) : the_row(); ?>

	        <div class="col">
	          <div class="sustomers-one">
	            <div class="sustomers-one-img">
	              <img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" />
	            </div>
	            <h3><?php the_sub_field('title'); ?></h3>
	            <p><?php the_sub_field('text'); ?></p>
	            <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text_url'); ?></a>
	          </div>
	        </div>

	        <?php endwhile; ?>
	        <?php endif; ?> 
			
	        <?php if( have_rows('industries') ): ?>
			<!--
	        <div class="col">
	        	<div class="d-flex">
			    <?php while ( have_rows('industries') ) : the_row(); ?>

			        <div class="col">
			          <a class="industries-one" href="<?php the_sub_field('url'); ?>">
			            <div class="industries-img">
			              <img src="<?php the_sub_field('img'); ?>" alt="" />
			            </div>
			            <h3><?php the_sub_field('title'); ?></h3>
			          </a>
			        </div>

			    <?php endwhile; ?>
	        	</div>
	        </div>
			-->
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

<section class="page-customer-project">
  <?php include 'components/customer-projects.php' ?>
</section>

<?php include 'components/testimonials.php' ?>

<?php get_footer(); ?>