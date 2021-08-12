<?php
/**
 * Template Name: Pricing: Managed Services
 */

get_header(); ?>

<?php if( have_rows('price_links') ): ?>
<section class="price-bar">
	<div class="container">
		<ul class="d-flex">
		<?php while ( have_rows('price_links') ) : the_row(); 
		if(get_sub_field('active')) { $class = ' class="active"'; } else { $class = ''; } ?>

		<li<?php echo $class; ?>><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>

		<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php endif; ?>

<section class="s-price-header" style='background:url(<?php the_field('header_image'); ?>) no-repeat scroll center center; background-size: cover;'>
	<div class="container">
		<div class="d-flex">
			
			<div class="col">
				<div class="price-header-text">
					<h1><?php the_title(); ?></h1>
					<p><?php the_field('text_header'); ?></p>
					<?php 
					$images = get_field('logos_price', 'option');
					if( $images ): ?>
					<div class="logos-price d-flex">
						<?php foreach( $images as $image ): ?>
						
						<div class="logos-one">
							<img src="<?php echo $image['url']; ?>" alt="logos">
						</div>

						<?php endforeach; ?>
					</div>	
					<?php endif; ?>
				</div>
			</div>

			<div class="col"></div>

		</div>
	</div>
</section>

<section class="s-price-block">
	<div class="container">
		<div class="d-flex">

	        <?php if( have_rows('blocks') ): ?>
	        <?php while ( have_rows('blocks') ) : the_row(); ?>

	        <div class="col">
	          <div class="price-blocks">
	          	<div class="price-blocks-eh">
		          	<h3><?php the_sub_field('title'); ?></h3>
		          	<p><?php the_sub_field('text'); ?></p> 
	          	</div>
	            <div class="price-blocks-bot">
	              <span>from<br><?php the_sub_field('price'); ?></span>
	              <a href="<?php the_sub_field('url'); ?>">Schedule a call</a> 
	            </div>
	          </div>
	        </div>

	        <?php endwhile; ?>
	        <?php endif; ?>			

		</div>
	</div>
</section>

<?php include 'components/form-steps.php' ?>

<?php get_footer(); ?>