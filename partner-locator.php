<?php
/**
 * Template Name: Partner Locator
 */

get_header(); ?>

<section class="s-partner-locator">
    <h3 class="d-none">Block</h3>
	<div class="col">

		<div class="tab_content map-pl">

			<?php 
			$args = array(
				'post_type'  => 'partners',
				'posts_per_page' => -1,       
			); 
			$the_query = new WP_Query( $args ); 
			while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

			<div class="tab_item"><?php the_field('map'); ?></div>

			<?php endwhile; wp_reset_postdata();  ?>

		</div>

	</div>
	<div class="col">

		<div class="content-pl">
			<div class="content-pl-left">
				<div class="content-pl-text">
					<h1><?php the_field('title'); ?></h1>
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="content-pl-right">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_field('title'); ?>">
			</div>
		</div>

		<div class="parter-area">
		
			<div class="filter-pl">
				<div class="quicksearch-wrap">
					<i class="las la-search"></i>
					<input type="text" class="quicksearch" placeholder="Suchen" />
				</div>

				<select name="services[]" multiple="multiple" class="group-services" value-group="services">
	                <?php 
	                    $field_key = "field_5f588951cbdf1";
	                    $field = get_field_object($field_key);
	                    foreach ( $field['choices'] as $k => $v ) {
	                        echo '<option value=".' . $k . '">' . $v . '</option>';
	                    }
	                ?>
			    </select>

			</div>

			<div class="want-pl">
				<div class="want-pl-title">
					<i class="las la-star"></i>
					<span><?php the_field('title_want_partner'); ?></span>
				</div>
				<a class="wpl-btn popup-open-pl" href="#plform2" data-custom="want-partner"><?php the_field('text_btn2'); ?></a>
			</div>

			<div class="tabs">

				<?php $btn = get_field('text_btn');
				$args = array(
					'post_type'  => 'partners',
					'posts_per_page' => -1,       
				); 
				$the_query = new WP_Query( $args ); 
				while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

				<?php $out = '';
				$services = get_field('services');
				if( $services ): ?>
			    <?php foreach( $services as $service ): 
			        $out .= $service['value']." ";
			    endforeach; ?>
				<?php endif; ?>

				<?php $out2 = '';
				$labels = get_field('label');
				if( $labels ): ?>
			    <?php foreach( $labels as $label ): 
		    	if($label['value'] == 'hero') {$c = ' class="lhero"';} else {$c = '';}
		    	$out2 .= '<span'.$c.'>'.$label['label'].'</span> ';
			    endforeach; ?>
				<?php endif; ?>

				<div class="tab partner-locate-one <?php echo trim($out, ' '); ?>">
					<div class="img-pl">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					</div>
					<div class="title-pl filter-search">
						<div class="title-pl-label">
							<h3><?php the_title(); ?></h3>
							<?php echo trim($out2, ' '); ?>
						</div>
						<?php the_content(); ?>
					</div>
					<div class="address-pl filter-search">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plocate.png" alt="<?php the_title(); ?>">
						<span><?php the_field('locate'); ?></span>
					</div>
					<div class="contact-pl">
						<a class="xln-button popup-open-pl" href="#plform"><?php echo $btn; ?></a>
					</div>
				</div>

				<?php endwhile; wp_reset_postdata();  ?>

				<div class="noresult-pl" style="display:none;">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cube-pl.png" alt="<?php the_field('title_noresult'); ?>">
					<div class="noresult-pl-text">
						<h3><?php the_field('title_noresult'); ?></h3>
						<p><?php the_field('text_noresult'); ?></p>
					</div>
				</div>

			</div>

		</div>

	</div>
</section>

<section class="popup-pl mfp-hide" id="plform">
	<?php echo do_shortcode(''. get_field('form_popup') .'' ); ?>
</section>

<section class="popup-pl mfp-hide" id="plform2">
	<?php echo do_shortcode(''. get_field('form_popup2') .'' ); ?>
</section>

<?php get_footer(); ?>

<script>
    document.addEventListener('wpcf7mailsent', function(event) {
    	$.magnificPopup.close();
    }, false);
</script>