<?php
/**
* Template Name: About us
*/
get_header();
?>

<section class="about-us-welcome">
	<?php 
	$images = get_field('bg_header');
	if( $images ): ?>
	<div class="bg-slider-company">
		<?php foreach( $images as $image ):?>
		
		<div class="bg-one">
            <? echo wp_get_attachment_image($image['ID'], array(1900, 600), false, array(
                'alt' => 'welcome',
            )) ?>
		</div>

		<?php endforeach; ?>
	</div>	
	<?php endif; ?>

  <div class="about-us-bottom">
    <div class="container">
      <div class="aub-row">
        <?php
        $au_top_title = get_field('au_top_title');
        $au_top_content = get_field('au_top_content');
        $au_top_subtitle = get_field('au_top_subtitle');
        ?>
        <div class="aub-td">
        	<h1><?php echo $au_top_title; ?></h1>
        </div>
        <div class="aub-row-text">
          <p class="aub-row-text-item"><?php echo $au_top_content; ?></p>
          <div class="aub-author"><?php echo $au_top_subtitle; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if( have_rows('members') ): ?>
<section class="about-us-team">
  <div class="container">
    <?php
    $au_m_title = get_field('au_m_title');
    $au_m_content = get_field('au_m_content');
    ?>
    <h2><?php echo $au_m_title;?></h2>
    <p class="subtitle"><?php echo $au_m_content; ?></p>


    <div class="team-rows">
    	<div class="alm-reveal">
		<?php //echo do_shortcode('[ajax_load_more acf="true" acf_field_type="repeater" acf_field_name="members" post_type="post" posts_per_page="8" scroll="false" button_label="'.get_field('show_more','option').'" button_loading_label="'.get_field('show_more','option').'..."]'); ?>
    	<?php while ( have_rows('members') ) : the_row(); ?>
		<?php
		$image = get_sub_field('member_img');
		    $m_img = wp_get_attachment_image_url($image, 'filter-thumbnail', true);
		    $member_name = get_sub_field('member_name');
		    ?>
		      <div class="aut-item" style="display:none;">
		        <figure style="background: url('<?php echo $m_img;?>') no-repeat center / cover;"></figure>
		        <div class="aut-item-body">
		          <p class="name"><?php echo $member_name; ?></p>
		          <p class="post"><?php the_sub_field('member_job'); ?></p>
				  <?php if(get_sub_field('member_email')) { ?>
				  <p class="mail"><a href="mailto:<?php the_sub_field('member_email'); ?>"><?php the_sub_field('member_email'); ?></a></p>
				<?php } ?>
		          <a href="<?php the_sub_field('member_linkedin'); ?>" class="linked"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 552.77 552.77"><path d="M17.95 528.854h71.861c9.914 0 17.95-8.037 17.95-17.951V196.8c0-9.915-8.036-17.95-17.95-17.95H17.95C8.035 178.85 0 186.885 0 196.8v314.103c0 9.913 8.035 17.951 17.95 17.951zM17.95 123.629h71.861c9.914 0 17.95-8.036 17.95-17.95V41.866c0-9.914-8.036-17.95-17.95-17.95H17.95C8.035 23.916 0 31.952 0 41.866v63.813c0 9.914 8.035 17.95 17.95 17.95zM525.732 215.282c-10.098-13.292-24.988-24.223-44.676-32.791-19.688-8.562-41.42-12.846-65.197-12.846-48.268 0-89.168 18.421-122.699 55.27-6.672 7.332-11.523 5.729-11.523-4.186V196.8c0-9.915-8.037-17.95-17.951-17.95h-64.192c-9.915 0-17.95 8.035-17.95 17.95v314.103c0 9.914 8.036 17.951 17.95 17.951h71.861c9.915 0 17.95-8.037 17.95-17.951V401.666c0-45.508 2.748-76.701 8.244-93.574 5.494-16.873 15.66-30.422 30.488-40.649 14.83-10.227 31.574-15.343 50.24-15.343 14.572 0 27.037 3.58 37.393 10.741 10.355 7.16 17.834 17.19 22.436 30.104 4.604 12.912 6.904 41.354 6.904 85.33v132.627c0 9.914 8.035 17.951 17.949 17.951h71.861c9.914 0 17.949-8.037 17.949-17.951V333.02c0-31.445-1.982-55.607-5.941-72.48s-10.992-31.959-21.096-45.258z"/></svg></a>
		        </div>
		      </div>
    	<?php endwhile; ?>
    	</div>
    	<div class="alm-btn-wrap">
    		<button id="loadMembers" class="alm-load-more-btn more"><?php echo get_field('show_more','option'); ?></button>
    	</div>
    </div>

  </div>
</section>
<?php endif; ?>

<section class="facts">
	<div class="container">
		<div class="facts-area">
			<h2 class="like-header"><?php echo the_field('ff_title');?></h2>
			<div class="loop d-flex facts-item-row">
				<div class="facts-item d-flex">
					<div class="f-item-logo">
						<img src="<?php echo TEMPLATE_URL; ?>/img/icons/user.svg" height=50 alt="user">
					</div>
					<div class="f-item-block d-flex flex-direction">
						<div class="f-item-count">
							<?php the_field('customers_count'); ?>
						</div>
						<div class="f-item-txt">
							<?php the_field('customer_text'); ?>
						</div>
					</div>
				</div>
				<div class="facts-item d-flex">
					<div class="f-item-logo">
						<img src="<?php echo TEMPLATE_URL; ?>/img/icons/earth.svg" height=50 alt="earth">
					</div>
					<div class="f-item-block d-flex flex-direction">
						<div class="f-item-count">
							<?php the_field('countries_count'); ?>
						</div>
						<div class="f-item-txt">
							<?php the_field('countries_text'); ?>
						</div>
					</div>
				</div>
				<div class="facts-item d-flex">
					<div class="f-item-logo">
						<img src="<?php echo TEMPLATE_URL; ?>/img/icons/location.svg" height=50 alt="location">
					</div>
					<div class="f-item-block d-flex flex-direction">
						<div class="f-item-count">
							<?php the_field('swiss_count'); ?>
						</div>
						<div class="f-item-txt">
							<?php the_field('swiss_text'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="x-history">
	<div class="container">
		<div class="x-history-area">
			<h2 class="like-header"><?php echo the_field('xh_title'); ?></h2>
			<div class="xh-row d-flex">
				<?php if( have_rows('xelon_history_slider') ): ?>
				<?php while( have_rows('xelon_history_slider') ): the_row();
					$year = get_sub_field('h_year');
					$title = get_sub_field('h_title');
					$content = get_sub_field('h_content');
					$link = get_sub_field('h_link');
					$logo = get_sub_field('h_logo');
					$colors = get_sub_field('xh_color');
				?>
				<div class="xh-item-link">
					<div class="xh-item">
						<?php if($logo) { ?>
						<div class="xh-logo">
							<img src="<?php echo $logo; ?>" alt="<?php echo $title; ?>">
						</div>
						<?php } else { ?>
						<div class="xh-year
							<?php
								if($colors[0] == 'red') {
									echo 'xh-red-bg';
								} elseif ($colors[0] == 'green') {
									echo 'xh-green-bg';
								} elseif ($colors[0] == 'blue') {
									echo 'xh-blue-bg';
								} else {
									echo 'xh-red-bg';
								}
							?>
							align-center d-flex">
							<?php echo $year;?>
						</div>
						<?php } ?>
						<div class="xh-title">
							<?php echo $title; ?>
						</div>
						<div class="xh-content">
							<?php echo $content; ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="membership-certifications">
	<div class="container">
		<div class="m-cert-row">
			<h2 class="like-header">
				<?php echo the_field('mc_title'); ?>
			</h2>
			<div class="m-cert-loop loop d-flex justify-center padding-15">
				<?php if( have_rows('mcert') ): ?>
				<?php while( have_rows('mcert') ): the_row();
					$mc_title = get_sub_field('mc_title');
					$mc_logo = get_sub_field('mc_logo');
					//$mc_img = wp_get_attachment_image_url($mc_logo, array(60, 60), true);
					$mc_content = get_sub_field('mc_content');
					$mc_link = get_sub_field('mc_link');
				?>
				<a href="<?php echo $mc_link;?>" class="m-cert-link" rel="nofollow" target="_blank">
					<div class="m-cert-item">
						<div class="m-cert-head d-flex">
							<div class="m-cert-title">
								<?php echo $mc_title; ?>
							</div>
							<div class="m-cert-logo">
                                <? echo wp_get_attachment_image($mc_logo, 'small', false, array(
                                    'class' => 'img-responsive',
                                    'alt' => $mc_title,
                                )) ?>
							</div>
						</div>
						<div class="m-cert-content">
							<?php echo $mc_content; ?>
						</div>
					</div>
				</a>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="tech-partners">
	<div class="container">
		<div class="tp-area">
			<h2 class="like-header"><?php echo the_field('tp_title'); ?></h2>
			<div class="tp-loop loop d-flex justify-center">
				<?php if( have_rows('add_tech_partners') ): ?>
				<?php while( have_rows('add_tech_partners') ): the_row();
					$image = get_sub_field('tc_img');
					$tp_img = wp_get_attachment_image_url($image, 'full', true);
					$tc_link = get_sub_field('tc_link');
				?>
				<div class="tp-items">
					<a href="<?php echo $tc_link?>" rel="nofollow" class="tp-item-link">
						<img src="<?php echo $tp_img; ?>" class="img-responsive" alt="<?php echo the_field('tp_title'); ?>">
					</a>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php if(get_field('shortcode_instagram')) { ?>
<section class="about-us-team about-us-instagram">
	<div class="container">
		<?php if(get_field('title_insta_main')) { ?>
		<h2 class="like-header"><?php the_field('title_insta_main'); ?></h2>
		<?php } ?>
		<div class="insta-box">
			<div class="insta-bar">
				<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/instagram-icon.png" alt="<?php the_field('title_insta'); ?>"><?php the_field('title_insta'); ?></span>
				<a href="<?php the_field('link_instagram'); ?>" target="_blank"><?php the_field('text_link_insta'); ?></a>
			</div>
			<?php echo do_shortcode(''. get_field('shortcode_instagram') .'' ); ?>
		</div>
	</div>
</section>
<?php } ?>
<?php get_footer(); ?>