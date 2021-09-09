<?php
/**
* Template Name: Product page - Cloud/Dedicated server
*/
get_header();
?>
<section class="main-page-block green">
	<div class="container">
		<div class="page-row d-flex align-center padding-15">
			<?php
				$p_ds_img = get_field('p_ds_img');
				$p_ds_img_src = wp_get_attachment_image_url($p_ds_img, 'full', true);
				$p_ds_title = get_field('p_ds_title');
				$p_ds_subtitle = get_field('p_ds_subtitle');
				$p_ds_content = get_field('p_ds_content');
				$p_ds_link = get_field('p_ds_link');
				$ds_change_color = get_field('ds_change_color');
			?>
			<div class="page-left page-40">
				<div class="page-left-img">
					<img src="<?php echo $p_ds_img_src; ?>" alt="<?php echo $p_ds_title; ?>">
				</div>
			</div>
			<div class="page-right page-60">
				<span class="light-header <?php if($ds_change_color[0] == 'red') { echo "rose-c"; } elseif ($ds_change_color[0] == 'green') { echo "green-c"; } elseif ($ds_change_color[0] == 'blueberry') echo "blueberry-c";
						 ?>"><?php echo $p_ds_title; ?></span>
				<div class="content-column d-flex content-fluid">
					<h1 class="like-header <?php if($ds_change_color[0] == 'red') { echo "rose-c"; } elseif ($ds_change_color[0] == 'green') { echo "green-c"; } elseif ($ds_change_color[0] == 'blueberry') echo "blueberry-c";
						 ?>">
						<?php echo $p_ds_subtitle; ?>
					</h1>
					<div class="content-text">
						<?php echo $p_ds_content; ?>
					</div>
					<a href="<?php echo $p_ds_link; ?>" class="<?php if($ds_change_color[0] == 'red') { echo "xln-button"; } elseif ($ds_change_color[0] == 'green') { echo "xln-button"; } elseif ($ds_change_color[0] == 'blueberry') echo "xln-button";
					 ?>"><?php  get_field('pr_link_ds_name') ? the_field('pr_link_ds_name') : print('Dedicated Server konfigurieren') ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="persp-describe">
	<div class="container">
		<div class="loop d-flex justify-center">
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php 
						$p_ds_img_1 = get_field('p_ds_img_1');
						$p_ds_img_1_src = wp_get_attachment_image_url($p_ds_img_1, 'full', true);
					 ?>
					<img src="<?php echo $p_ds_img_1_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('p_ds_title_1'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('p_ds_content_1'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php 
						$p_ds_img_2 = get_field('p_ds_img_2');
						$p_ds_img_2_src = wp_get_attachment_image_url($p_ds_img_2, 'full', true);
					 ?>
					<img src="<?php echo $p_ds_img_2_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('p_ds_title_2') ?>
				</div>
				<div class="item-description">
					<?php echo the_field('p_ds_content_2'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php 
						$p_ds_img_3 = get_field('p_ds_img_3');
						$p_ds_img_3_src = wp_get_attachment_image_url($p_ds_img_3, 'full', true);
					 ?>
					<img src="<?php echo $p_ds_img_3_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('p_ds_title_3') ?>
				</div>
				<div class="item-description">
					<?php echo the_field('p_ds_content_3'); ?>
				</div>
			</div>
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
				<?php if( have_rows('add_core_card') ): ?>
                    <?php while( have_rows('add_core_card') ): the_row();
                        $core_title = get_sub_field('core_title');
                        $core_describtion = get_sub_field('core_describtion');
                        $core_content = get_sub_field('core_content');
                        $core_price = get_sub_field('core_price');
                        $core_link = get_sub_field('core_link');
                        $ds_change_color_r = get_sub_field('ds_change_color_r');
                    ?>
                    <div class="ds-item d-flex flex-direction">
                        <h3 class="ds-item-title">
                            <?php echo $core_title; ?>
                        </h3>
                        <div class="ds-item-desc">
                            <?php echo $core_describtion; ?>
                        </div>
                        <div class="ds-item-content">
                            <?php echo $core_content; ?>
                        </div>
                        <div class="ds-price-row d-flex">
                            <div class="ds-price-t <?php if($ds_change_color_r[0] == 'red') { echo "rose-c"; } elseif ($ds_change_color_r[0] == 'green') { echo "green-c"; } elseif ($ds_change_color_r[0] == 'blueberry') echo "blueberry-c";
                             ?>">
                                <?php echo $core_price; ?>
                            </div>
                            <div class="ds-configure">
                                <a href="<?php echo $core_link;?>" target="_blank" class="<?php if($ds_change_color_r[0] == 'red') { echo "xln-button"; } elseif ($ds_change_color_r[0] == 'green') { echo "xln-button"; } elseif ($ds_change_color_r[0] == 'blueberry') echo "xln-button";
                             ?>"><?php $field = get_field('pr_configure_button_ds');
                             $field ? the_field('pr_configure_button_ds') : print('Konfiguration starten'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="advanced-options d-flex align-center">
	<div class="container">
		<div class="advanced-items d-flex flex-direction align-center">
			<h2 class="adv-title">
				<?php echo the_field('adv_title'); ?>
			</h2>
			<div class="adv-desc">
				<?php echo the_field('adv_describtion'); ?>
			</div>
			<div class="adv-conf">
				<a href="<?php echo the_field('adv_link'); ?>" class="xln-button xln-button--white open-popup-contact"><?php echo the_field('configure_your_setup'); ?></a>
			</div>
		</div>
	</div>
</section>
<section class="faq-vdc">
	<div class="container">
		<div class="accordion-area d-flex justify-center">
			<div class="accordion-section">
				<h2 class="like-header">
					<?php echo the_field('adv_acc_title_1'); ?>
                </h2>
				<?php if( have_rows('adv_accordion_1') ): ?>
				<?php while( have_rows('adv_accordion_1') ): the_row();

					$adv_question = get_sub_field('adv_question');
					$adv_answer = get_sub_field('adv_answer');
				?>
				<div class="faq-accordion">
					<div class="accordion">
						<?php echo $adv_question; ?>
					</div>
					<div class="panel">
						<?php echo  $adv_answer; ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="accordion-section">
				<h2 class="like-header">
					<?php echo the_field('adv_acc_title_2'); ?>
                </h2>
				<?php if( have_rows('adv_accordion_2') ): ?>
				<?php while( have_rows('adv_accordion_2') ): the_row();

					$adv_question = get_sub_field('adv_question_2');
					$adv_answer = get_sub_field('adv_answer_2');
				?>
				<div class="faq-accordion">
					<div class="accordion">
						<?php echo $adv_question; ?>
					</div>
					<div class="panel">
						<?php echo  $adv_answer; ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="adv-page-client partners">
	<div class="container">
		<h2 class="like-header">
			<?php echo the_field('our_clients', 'option'); ?>
        </h2>
		<div class="partners-slider">
			<?php if( have_rows('p_slider', 'option') ): ?>
			<?php while( have_rows('p_slider', 'option') ): the_row();
				$p_slider_image = get_sub_field('p_img');
				$p_img = wp_get_attachment_image_src( $p_slider_image, 'full', true );
			?>
			<div class="p-slider-item">
				<img src="<?php echo $p_img[0];?>" alt="partners">
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>		
	</div>
</section>
<?php get_footer();?>