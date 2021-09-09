<?php
/**
 * Template Name: Pricing: Colocation
 */

get_header(); ?>

<?php if( have_rows('price_links_del') ): ?>
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
				</div>
			</div>

			<div class="col"></div>

		</div>
	</div>
</section>

<section class="our-ds page-padding" id="our-ds-scroll">
	<div class="container">
		<div class="our-absolute-container">
			<div class="loop ds-row-items d-flex justify-center">
				<?php if( have_rows('colo_add_card') ): ?>
				<?php while( have_rows('colo_add_card') ): the_row();
					$ctable_title = get_sub_field('ctable_title');
					$ctabel_content = get_sub_field('ctabel_content');
					$ctabel_price = get_sub_field('ctabel_price');
					$ctabel_link = get_sub_field('ctabel_link');
				?>
				<div class="ds-item d-flex flex-direction">
					<h3 class="ds-item-title">
						<?php echo $ctable_title; ?>
					</h3>
					<div class="ds-item-content">
						<?php echo $ctabel_content; ?>
					</div>
					<div class="ds-price-row d-flex">
						<div class="ds-price-t">
							<?php echo $ctabel_price; ?>
						</div>
						<div class="ds-configure">
							<a href="<?php echo $ctabel_link;?>" class="xln-button"><?php the_sub_field('btn_text'); ?></a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php include 'components/form-steps.php' ?>

<?php get_footer(); ?>