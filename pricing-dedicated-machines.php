<?php
/**
 * Template Name: Pricing: Dedicated Machines
 */

get_header(); ?>

<?php

	$priceDef = get_field('default_price_ds','option');
	if( have_rows('cpu_cores_ds','option') ) {
	while ( have_rows('cpu_cores_ds','option') ) : the_row();
		$value .= get_sub_field('value'). ',';
		if(get_sub_field('price')) {
			$price .= get_sub_field('price'). ',';
		} else {
			$price .= '0,';
		}
	endwhile;
	$cpu_value = trim($value, ',');
	$cpu_price = trim($price, ',');
	}

	if( have_rows('ram_gb_ds','option') ) {
	while ( have_rows('ram_gb_ds','option') ) : the_row();
		$value2 .= get_sub_field('value'). ',';
		if(get_sub_field('price')) {
			$price2 .= get_sub_field('price'). ',';
		} else {
			$price2 .= '0,';
		}
	endwhile;
	$ram_value = trim($value2, ',');
	$ram_price = trim($price2, ',');
	}

	if( have_rows('hard_drive_ds','option') ) {
	while ( have_rows('hard_drive_ds','option') ) : the_row();
		$value3 .= get_sub_field('value'). ',';
		if(get_sub_field('price')) {
			$price3 .= get_sub_field('price'). ',';
		} else {
			$price3 .= '0,';
		}
	endwhile;
	$hdd_value = trim($value3, ',');
	$hdd_price = trim($price3, ',');
	}

?>

<?php if( have_rows('price_links') ): ?>
<div class="price-bar">
	<div class="container">
		<ul class="d-flex">
		<?php while ( have_rows('price_links') ) : the_row(); 
		if(get_sub_field('active')) { $class = ' class="active"'; } else { $class = ''; } ?>

		<li<?php echo $class; ?>><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>

		<?php endwhile; ?>
		</ul>
	</div>
</div>
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
				<div class="price-calc calc-ds" data-dprice="<?php echo $priceDef; ?>">

					<div class="price-calc-sliders">
						<div class="price-val">
							<div class="price-calc-bar">
								<div class="price-calc-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons8-processor2.png" alt="processor">
									<span>CPU, Cores</span>
								</div>
								<span class="price-calc-input"></span>
							</div>
							<div id="calc-cpu" class="polzunok" data-value="[<?php echo $cpu_value; ?>]" data-price="[<?php echo $cpu_price; ?>]"></div>
						</div>

						<div class="price-val">
							<div class="price-calc-bar">
								<div class="price-calc-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons8-smartphone_ram2.png" alt="ram">
									<span>RAM, Gb</span>
								</div>
								<span class="price-calc-input"></span>
							</div>
							<div id="calc-ram" class="polzunok" data-value="[<?php echo $ram_value; ?>]" data-price="[<?php echo $ram_price; ?>]"></div>
						</div>

						<div class="price-val"> 
							<div class="price-calc-bar">
								<div class="price-calc-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons8-ssd2.png" alt="ssd">
									<span>Hard Drive</span>
								</div>
								<span class="price-calc-input"></span>
							</div>
							<div id="calc-hdd" class="polzunok" data-value="[<?php echo $hdd_value; ?>]" data-price="[<?php echo $hdd_price; ?>]"></div>
						</div>
					</div>

					<div class="price-res">
						<div class="price-calc-res">
							<p>ESTIMATED COST</p>
							<span><var style="font-style: normal;"><?php echo $priceDef; ?></var> CHF</span>
						</div>
						<a href="#">Order</a>
					</div>
															
				</div>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>