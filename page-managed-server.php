<?php
/**
* Template Name: Product page - Managed server
*/
get_header();
?>
<section class="main-page-block green">
	<div class="container">
		<div class="page-row d-flex align-center padding-15">
			<?php
				$data_server_img = get_field('data_server_img');
				$data_server_img_src = wp_get_attachment_image_url($data_server_img, 'full', true);
				$data_server_title = get_field('data_server_title');
				$data_server_subtitle = get_field('data_server_subtitle');
				$data_server_content = get_field('data_server_content');
				$data_server_link = get_field('data_server_link');
				$p_ds_link = get_field('p_ds_link');
                $data_server_link_url = get_field('data_server_link_url');
			?>
			<div class="page-left page-40">
				<div class="page-left-img">
					<img src="<?php echo $data_server_img_src; ?>" alt="<?php echo $data_server_title; ?>">
				</div>
			</div>
			<div class="page-right page-60">
				<span class="light-header rose-c"><?php echo $data_server_title;?></span>
				<div class="content-column d-flex content-fluid">
					<h1 class="like-header rose-c">
						<?php echo $data_server_subtitle; ?>
					</h1>
					<div class="content-text">
						<?php echo $data_server_content; ?>
					</div>
					<a href="<?php echo $data_server_link_url; ?>" class="xln-button"><?php echo $data_server_link; ?></a>
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
						$data_s_img_1 = get_field('data_s_img_1');
						$data_s_img_1_src = wp_get_attachment_image_url($data_s_img_1, 'full', true);
					?>
					<img src="<?php echo $data_s_img_1_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('data_s_title_1'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('data_s_content_1'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$data_s_img_2 = get_field('data_s_img_2');
						$data_s_img_2_src = wp_get_attachment_image_url($data_s_img_2, 'full', true);
					?>
					<img src="<?php echo $data_s_img_2_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('data_s_title_2'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('data_s_content_2'); ?>
				</div>
			</div>
			<div class="column-item d-flex">
				<div class="item-pattern">
					<?php
						$data_s_img_3 = get_field('data_s_img_3');
						$data_s_img_3_src = wp_get_attachment_image_url($data_s_img_3, 'full', true);
					?>
					<img src="<?php echo $data_s_img_3_src; ?>" alt="slider">
				</div>
				<div class="item-title">
					<?php echo the_field('data_s_title_3'); ?>
				</div>
				<div class="item-description">
					<?php echo the_field('data_s_content_3'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="configure-now-scroll">
<div class="servers-page page-padding">
	<div class="container">
		<div class="like-header">
			<?php echo the_field('servers_title'); ?>
		</div>
		<div class="server-subtitle">
			<?php echo the_field('servers_subtitle'); ?>
		</div>
		<div class="our-absolute-container">
			<div class="loop ds-row-items d-flex justify-center">
				<?php if( have_rows('add_servers_item') ): ?>
				<?php while( have_rows('add_servers_item') ): the_row();
					$servers_title = get_sub_field('servers_title');
					$servers_describtion = get_sub_field('servers_describtion');
					$linux_logo = get_sub_field('linux_logo');
					$windows_logo = get_sub_field('windows_logo');
					$servers_b_description = get_sub_field('servers_b_description');
					$servers_link = get_sub_field('servers_link');
				?>
				<div class="ds-item d-flex flex-direction">
					<div class="ds-item-title">
						<?php echo $servers_title; ?>
					</div>
					<div class="ds-item-desc">
						<?php echo $servers_describtion; ?>
					</div>
					<div class="server-bottom d-flex flex-direction">
						<div class="server-logo d-flex justify-center">
							<?php
							if($linux_logo[0] == 'linux') {?>
							<div class="linux-logo">
								<img src="<?php echo TEMPLATE_URL; ?>/img/icons/linux.svg" width="32" height="32" alt="linux">
							</div>
							<?php } ?>
							<?php
							if($windows_logo[0] == 'windows') {?>
							<div class="windows-logo">
								<img src="<?php echo TEMPLATE_URL; ?>/img/icons/windows.svg" width="32" height="32" alt="linux">
							</div>
							<?php } ?>
						</div>
						<div class="ds-item-desc servers-content">
							<?php echo $servers_b_description; ?>
						</div>
						<div class="ds-configure">
							<a href="<?php echo $servers_link; ?>" class="xln-button open-popup-contact"><?php echo the_field('configure_btn', 'option'); ?></a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
</section>
<section class="free-consultation page-padding">
	<div class="container">
		<div class="fc-row d-flex align-center">
			<div class="fc-content">
				<div class="fc-title">
					<?php echo the_field('fc_title'); ?>
				</div>
				<div class="sub-title">
					<?php echo the_field('fc_subtitle'); ?>
				</div>
			</div>
			<div class="fc-call d-flex justify-center">
				<a href="<?php echo the_field('fc_btn_url'); ?>" class="xln-button xln-button--white open-popup-contact"><?php echo the_field('fc_btn'); ?></a>
			</div>
		</div>
	</div>
</section>
<section class="server-manage page-padding">
	<div class="container">
		<div class="from-left d-flex">
			<div class="page-left page-60">
				<div class="content-column d-flex content-fluid padding-15">
					<div class="left-side-title">
						<?php echo the_field('mgl_title'); ?>
					</div>
					<div class="left-side-content">
						<?php echo the_field('mgl_content');; ?>
					</div>
				</div>
			</div>
			<div class="page-right page-40">
				<div class="page-right-img">
					<?php
						$mgl_img = get_field('mgl_img');
						$mgl_img_src = wp_get_attachment_image_url($mgl_img, 'full', true);
					?>
					<img src="<?php echo $mgl_img_src; ?>"  alt="linux">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="server-manage page-padding">
	<div class="container">
		<div class="from-right d-flex">
			<div class="page-left-img page-40">				
				<?php
					$mgr_img = get_field('mgr_img');
					$mgr_img_src = wp_get_attachment_image_url($mgr_img, 'full', true);
				?>
				<img src="<?php echo $mgr_img_src; ?>"  alt="windows">
			</div>
			<div class="page-left page-60">
				<div class="content-column d-flex content-fluid padding-15">
					<div class="left-side-title">
						<?php echo the_field('mgr_title'); ?>
					</div>
					<div class="left-side-content">
						<?php echo the_field('mgr_content');; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="modules page-padding">
	<div class="container">
		<div class="module-head">
			<div class="like-header">
				<?php echo the_field('module_title'); ?>
			</div>
			<div class="accordion-section">
				<?php if( have_rows('modules_faq') ): ?>
				<?php while( have_rows('modules_faq') ): the_row();

					$module_question = get_sub_field('module_question');
					$module_answer = get_sub_field('module_answer');
				?>
				<div class="faq-accordion">
					<div class="accordion">
						<?php echo $module_question; ?>
					</div>
					<div class="panel">
						<?php echo  $module_answer; ?>
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