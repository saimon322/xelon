<?php
/**
* Template Name: Product page - vDC
*/
get_header();
?>
<section class="main-page-block green">
	<div class="container">
		<div class="page-row d-flex align-center padding-15">
			<?php
				$dcp_img = get_field('dcp_img');
				$dcp_img_src = wp_get_attachment_image_url($dcp_img, 'full', true);
				$dcp_title = get_field('dcp_title');
				$dcp_subtitle = get_field('dcp_subtitles');
				$dcp_content = get_field('dcp_content');
                $dcp_btn_url = get_field('dcp_btn_url');
			?>
			<div class="page-left page-40">
				<div class="page-left-img">
					<img src="<?php echo $dcp_img_src; ?>" alt="<?php echo $dcp_title; ?>">
				</div>
			</div>
			<div class="page-right page-60">
				<span class="light-header"><?php echo $dcp_title; ?></span>
				<div class="content-column d-flex content-fluid">
					<h1 class="like-header">
						<?php echo $dcp_subtitle; ?>
					</h1>
					<div class="content-text">
						<?php echo $dcp_content; ?>
					</div>
					<a href="<?php echo $dcp_btn_url ;?>" class="xln-button open-popup-link"><?php echo the_field('try_for_free', 'option'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <div class="persp-area">
				<div class="persp">
								<div class="for-try">
												<a href="#" class="basic-btn">Try now for FREE</a>
								</div>
				</div>
</div> -->
<section class="persp-describe">
	<div class="container">
		<div class="loop d-flex justify-center">
			<div class="column-item d-flex">
				<div class="item-pattern">
                  <?php
                  $dcp_img1 = get_field('dcp_img1');
                  if( !empty($dcp_img1) ): ?>
                    <img src="<?php echo $dcp_img1['url']; ?>" alt="<?php echo $dcp_img1['alt']; ?>">
                  <?php endif; ?>
				</div>
				<div class="item-title">
					<?php echo the_field('dcp_f_title_1'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('dcp_f_content_1'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
                  <?php
                  $dcp_img2 = get_field('dcp_img2');
                  if( !empty($dcp_img2) ): ?>
                    <img src="<?php echo $dcp_img2['url']; ?>" alt="<?php echo $dcp_img2['alt']; ?>">
                  <?php endif; ?>
				</div>
				<div class="item-title">
					<?php echo the_field('dcp_f_title_2') ?>
				</div>
				<div class="item-description">
					<?php echo the_field('dcp_f_content_2'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
                  <?php
                  $dcp_img3 = get_field('dcp_img3');
                  if( !empty($dcp_img3) ): ?>
                    <img src="<?php echo $dcp_img3['url']; ?>" alt="<?php echo $dcp_img3['alt']; ?>">
                  <?php endif; ?>
				</div>
				<div class="item-title">
					<?php echo the_field('dcp_f_title_3') ?>
				</div>
				<div class="item-description">
					<?php echo the_field('dcp_f_content_3'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="recomendation">
	<div class="container">
		<div class="recomendation-area d-flex">
			<?php
				$dcr_img = get_field('dcr_img');
				$dcr_img_src = wp_get_attachment_image_url($dcr_img, 'full', true);
				$dcr_title = get_field('dcr_title');
				$dcr_subtitle = get_field('dcr_subtitle');
				$dcr_content = get_field('dcr_content');
                $dcr_btn_url = get_field('dcr_btn_url');
			?>
			<div class="page-left page-50">
				<span class="light-header"><?php echo $dcr_title; ?></span>
				<div class="content-column d-flex content-fluid padding-15">
					<div class="like-header">
						<?php echo $dcr_subtitle; ?>
					</div>
					<div class="content-text">
						<?php echo $dcr_content; ?>
					</div>
					<a href="<?php echo $dcr_btn_url; ?>" class="xln-button open-popup-link"><?php echo the_field('try_for_free', 'option'); ?></a>
				</div>
			</div>
			<div class="page-right page-50">
				<div class="page-right-img">
					<img src="<?php echo $dcr_img_src; ?>" alt="<?php echo $dcr_title; ?>">
				</div>
			</div>
		</div>
	</div>
</section>

  <section class="feature">
    <div class="container">
      <div class="loop vdc-row d-flex justify-center">
        <div class="page-30">
          <div class="item-feature d-flex">
            <div class="item-logo">
              <?php
              $ls_image_1 = get_field('ls_image_1');
              $ls_image_1_src = wp_get_attachment_image_url($ls_image_1, 'full', true);
              ?>
              <img src="<?php echo $ls_image_1_src; ?>" alt="<?php echo the_field('ls_title_1'); ?>">
            </div>
            <div class="item-f-content">
              <div class="item-f-title">
                <?php echo the_field('ls_title_1'); ?>
              </div>
              <div class="item-f-content">
                <?php echo the_field('ls_content_1'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="page-30">
          <div class="item-feature d-flex">
            <div class="item-logo">
              <?php
              $ls_image_2 = get_field('ls_image_2');
              $ls_image_2_src = wp_get_attachment_image_url($ls_image_2, 'full', true);
              ?>
              <img src="<?php echo $ls_image_2_src; ?>" alt="<?php echo the_field('ls_title_2'); ?>">
            </div>
            <div class="item-f-content">
              <div class="item-f-title">
                <?php echo the_field('ls_title_2'); ?>
              </div>
              <div class="item-f-content">
                <?php echo the_field('ls_content_2'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="page-30">
          <div class="item-feature d-flex">
            <div class="item-logo">
              <?php
              $ls_image_3 = get_field('ls_image_3');
              $ls_image_3_src = wp_get_attachment_image_url($ls_image_3, 'full', true);
              ?>
              <img src="<?php echo $ls_image_3_src; ?>" alt="<?php echo the_field('ls_title_3'); ?>">
            </div>
            <div class="item-f-content">
              <div class="item-f-title">
                <?php echo the_field('ls_title_3'); ?>
              </div>
              <div class="item-f-content">
                <?php echo the_field('ls_content_3'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="page-30">
          <div class="item-feature d-flex">
            <div class="item-logo">
              <?php
              $ls_image_4 = get_field('ls_image_4');
              $ls_image_4_src = wp_get_attachment_image_url($ls_image_4, 'full', true);
              ?>
              <img src="<?php echo $ls_image_4_src; ?>" alt="<?php echo the_field('ls_title_4'); ?>">
            </div>
            <div class="item-f-content">
              <div class="item-f-title">
                <?php echo the_field('ls_title_4'); ?>
              </div>
              <div class="item-f-content">
                <?php echo the_field('ls_content_4'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="page-30">
          <div class="item-feature d-flex">
            <div class="item-logo">
              <?php
              $ls_image_5 = get_field('ls_image_5');
              $ls_image_5_src = wp_get_attachment_image_url($ls_image_5, 'full', true);
              ?>
              <img src="<?php echo $ls_image_5_src; ?>" alt="<?php echo the_field('ls_title_5'); ?>">
            </div>
            <div class="item-f-content">
              <div class="item-f-title">
                <?php echo the_field('ls_title_5'); ?>
              </div>
              <div class="item-f-content">
                <?php echo the_field('ls_content_5'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="page-30">
          <div class="item-feature d-flex">
            <div class="item-logo">
              <?php
              $ls_image_6 = get_field('ls_image_6');
              $ls_image_6_src = wp_get_attachment_image_url($ls_image_6, 'full', true);
              ?>
              <img src="<?php echo $ls_image_6_src; ?>" alt="<?php echo the_field('ls_title_6'); ?>">
            </div>					<div class="item-f-content">
              <div class="item-f-title">
                <?php echo the_field('ls_title_6'); ?>
              </div>
              <div class="item-f-content">
                <?php echo the_field('ls_content_6'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!--<div class="feature">
	<div class="container">
		<div class="loop vdc-row d-flex justify-center">
			<div class="page-30">
				<div class="item-feature d-flex">
					<div class="item-logo">
						<?php
/*							$ls_image_1 = get_field('ls_image_1');
							$ls_image_1_src = wp_get_attachment_image_url($ls_image_1, 'full', true);
						*/?>
						<img src="<?php /*echo $ls_image_1_src; */?>" alt="">
					</div>
					<div class="item-f-content">
						<div class="item-f-title">
							<?php /*echo the_field('ls_title_1'); */?>
						</div>
						<div class="item-f-content">
							<?php /*echo the_field('ls_content_1'); */?>
						</div>
					</div>
				</div>
				<div class="item-feature d-flex">
					<div class="item-logo">
						<?php
/*							$ls_image_2 = get_field('ls_image_2');
							$ls_image_2_src = wp_get_attachment_image_url($ls_image_2, 'full', true);
						*/?>
						<img src="<?php /*echo $ls_image_2_src; */?>" alt="">
					</div>
					<div class="item-f-content">
						<div class="item-f-title">
							<?php /*echo the_field('ls_title_2'); */?>
						</div>
						<div class="item-f-content">
							<?php /*echo the_field('ls_content_2'); */?>
						</div>
					</div>
				</div>
			</div>
          <div class="page-30">
            <div class="item-feature d-flex">
              <div class="item-logo">
                <?php
/*                $ls_image_3 = get_field('ls_image_3');
                $ls_image_3_src = wp_get_attachment_image_url($ls_image_3, 'full', true);
                */?>
                <img src="<?php /*echo $ls_image_3_src; */?>" alt="">
              </div>
              <div class="item-f-content">
                <div class="item-f-title">
                  <?php /*echo the_field('ls_title_3'); */?>
                </div>
                <div class="item-f-content">
                  <?php /*echo the_field('ls_content_3'); */?>
                </div>
              </div>
            </div>
            <div class="item-feature d-flex">
              <div class="item-logo">
                <?php
/*                $ls_image_4 = get_field('ls_image_4');
                $ls_image_4_src = wp_get_attachment_image_url($ls_image_4, 'full', true);
                */?>
                <img src="<?php /*echo $ls_image_4_src; */?>" alt="">
              </div>
              <div class="item-f-content">
                <div class="item-f-title">
                  <?php /*echo the_field('ls_title_4'); */?>
                </div>
                <div class="item-f-content">
                  <?php /*echo the_field('ls_content_4'); */?>
                </div>
              </div>
            </div>
          </div>
			<div class="page-30">
				<div class="item-feature d-flex">
					<div class="item-logo">
						<?php
/*							$ls_image_5 = get_field('ls_image_5');
							$ls_image_5_src = wp_get_attachment_image_url($ls_image_5, 'full', true);
						*/?>
						<img src="<?php /*echo $ls_image_5_src; */?>" alt="">
					</div>
					<div class="item-f-content">
						<div class="item-f-title">
							<?php /*echo the_field('ls_title_5'); */?>
						</div>
						<div class="item-f-content">
							<?php /*echo the_field('ls_content_5'); */?>
						</div>
					</div>
				</div>
				<div class="item-feature d-flex">
					<div class="item-logo">
						<?php
/*							$ls_image_6 = get_field('ls_image_6');
							$ls_image_6_src = wp_get_attachment_image_url($ls_image_6, 'full', true);
						*/?>
						<img src="<?php /*echo $ls_image_6_src; */?>" alt="">
					</div>					<div class="item-f-content">
					<div class="item-f-title">
						<?php /*echo the_field('ls_title_6'); */?>
					</div>
					<div class="item-f-content">
						<?php /*echo the_field('ls_content_6'); */?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>-->
<section class="faq-vdc">
<div class="container">
	<div class="faq-area padding-15">
		<div class="like-header"><?php echo the_field('vdc_c_title'); ?></div>
	</div>
	<div class="accordion-area loop d-flex justify-center">
		<?php if( have_rows('vdc_faq') ): ?>
		<?php while( have_rows('vdc_faq') ): the_row();
			
		$faq_title = get_sub_field('faq_title');
		$faq_content = get_sub_field('faq_content');
		?>
		<div class="faq-accordion">
			<div class="accordion">
				<?php echo $faq_title; ?>
			</div>
			<div class="panel">
				<?php echo $faq_content; ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
</section>
<section class="persp-second-wrap">
  <img src="https://xelon-test.bitcat.agency/wp-content/themes/xelon/img/persp2.png">
  <a href="<?php echo the_field('vdc_btn_url'); ?>" class="btn-persp"><?php echo the_field('vdc_btn_text'); ?></a>
</section>

<section class="adv-page-client partners" style="padding-top: 80px;">
	<div class="container">
		<div class="like-header">
			<?php echo the_field('our_clients', 'option'); ?>
		</div>
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

<?php get_footer(); ?>