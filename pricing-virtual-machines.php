<?php
/**
 * Template Name: Pricing: Virtual Machines
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

<section class="s-price-header">
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

			<div class="col">
				<div class="price-calc">

					<div class="price-calc-sliders">
						<div class="price-val">
							<div class="price-calc-bar">
								<div class="price-calc-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons8-processor1.png" alt="processor">
									<span>CPU, Cores</span>
								</div>
								<span class="price-calc-input"></span>
							</div>
							<div id="calc-cpu" class="polzunok"></div>
						</div>

						<div class="price-val">
							<div class="price-calc-bar">
								<div class="price-calc-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons8-smartphone_ram1.png" alt="smartphone">
									<span>RAM, Gb</span>
								</div>
								<span class="price-calc-input"></span>
							</div>
							<div id="calc-ram" class="polzunok"></div>
						</div>

						<div class="price-val">
							<div class="price-calc-bar">
								<div class="price-calc-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons8-ssd1.png" alt="ssd">
									<span>Hard Drive</span>
								</div>
								<span class="price-calc-input"></span>
							</div>
							<div id="calc-hdd" class="polzunok"></div>
						</div>
					</div>

					<div class="price-res">
						<div class="price-calc-res">
							<p>ESTIMATED COST</p>
							<span>480 CHF</span>
						</div>
						<a href="#">Try for FREE!</a>
					</div>
															
				</div>
			</div>

		</div>
	</div>
</section>


<?php include 'template-parts/included.php' ?>

<?php get_footer(); ?>