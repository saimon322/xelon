<?php
/**
* Template Name: Product
*/
get_header();
?>
<div class="main-info-block left-start bluberry padding-15">
	<div class="container">
		<div class="info-flex d-flex">
			<?php 

				$pr_img = get_field('pr_img');
				$pr_img_src = wp_get_attachment_image_url($pr_img, 'full', true);
				$pr_title = get_field('pr_title');
				$pr_content = get_field('pr_content');
				$pr_link = get_field('pr_link');

			 ?>
			<div class="page-60">
				<div class="content-column d-flex">
					<h1 class="like-header item-center black-c">
						<?php echo $pr_title; ?>
					</h1>
					<div class="info-content">
						<?php echo $pr_content; ?>
					</div>
					<a href="<?php echo $pr_link; ?>" class="blue-btn item-center"><?php echo the_field('compare', 'option') ?></a>
				</div>
			</div>
			<div class="page-40">
				<img src="<?php echo $pr_img_src; ?>" class="img-height" alt="<?php echo $pr_title; ?>">
			</div>
		</div>
	</div>
</div>
<div class="main-info-block right-start padding-15">
	<div class="container">
		<div class="info-flex d-flex">
			<?php 

				$pr_img_vs = get_field('pr_img_vs');
				$pr_img_vs_src = wp_get_attachment_image_url($pr_img_vs, 'full', true);
				$pr_title_vs = get_field('pr_title_vs');
				$pr_content_vs = get_field('pr_content_vs');
				$pr_link_vs = get_field('pr_link_vs');

			 ?>
			<div class="page-40">
				<img src="<?php echo $pr_img_vs_src; ?>" class="img-height" alt="<?php echo $pr_title_vs; ?>">
			</div>
			<div class="page-60">
				<div class="content-column d-flex">
					<div class="like-header item-center green-c">
						<?php echo $pr_title_vs; ?>
					</div>
					<div class="info-content">
						<?php echo $pr_content_vs; ?>
					</div>
					<a href="<?php echo $pr_link_vs;?>" class="xln-button item-center"><?php echo the_field('learn_more', 'option') ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-info-block left-start bluberry padding-15">
	<div class="container">
		<div class="info-flex d-flex">
			<?php 

				$pr_img_ds = get_field('pr_img_ds');
				$pr_img_ds_src = wp_get_attachment_image_url($pr_img_ds, 'full', true);
				$pr_title_ds = get_field('pr_title_ds');
				$pr_content_ds = get_field('pr_content_ds');
				$pr_link_ds = get_field('pr_link_ds');

			 ?>
			<div class="page-60">
				<div class="content-column d-flex">
					<div class="like-header item-center blueberry-c">
						<?php echo $pr_title_ds; ?>
					</div>
					<div class="info-content">
						<?php echo $pr_content_ds; ?>
					</div>
					<a href="<?php the_field('pr_link_ds' ) ?>" class="xln-button item-center"><?php the_field('learn_more', 'option') ?></a>
				</div>
			</div>
			<div class="page-40">
				<img src="<?php echo $pr_img_ds_src; ?>" class="img-height" alt="<?php echo $pr_title_ds; ?>">
			</div>
		</div>
	</div>
</div>
<div class="main-info-block right-start padding-15">
	<div class="container">
		<div class="info-flex d-flex">
			<?php 

				$pr_img_ms = get_field('pr_img_ms');
				$pr_img_ms_src = wp_get_attachment_image_url($pr_img_ms, 'full', true);
				$pr_title_ms = get_field('pr_title_ms');
				$pr_content_ms = get_field('pr_content_ms');
				$pr_link_ms = get_field('pr_link_ms');

			 ?>
			<div class="page-40">
				<img src="<?php echo $pr_img_ms_src; ?>" class="img-height" alt="<?php echo $pr_title_ms; ?>">
			</div>
			<div class="page-60">
				<div class="content-column d-flex">
					<div class="like-header item-center rose-c">
						<?php echo $pr_title_ms; ?>
					</div>
					<div class="info-content">
						<?php echo $pr_content_ms; ?>
					</div>
					<a href="<?php echo $pr_link_ms; ?>" class="xln-button item-center"><?php echo the_field('learn_more', 'option') ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="product-table" id="scroll-to-table">
	<?php include 'components/product-table.php' ?>
</div>
<div class="feature">
	<div class="container">
		<div class="loop d-flex justify-center">
			<div class="item-feature d-flex">
				<div class="item-logo">
					<img src="<?php echo TEMPLATE_URL; ?>/img/icons/p1.svg" alt="feature">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('ft_title_1'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('ft_content_1'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<img src="<?php echo TEMPLATE_URL; ?>/img/icons/p2.svg" alt="feature">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('ft_title_2'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('ft_content_2'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<img src="<?php echo TEMPLATE_URL; ?>/img/icons/p3.svg" alt="feature">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('ft_title_3'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('ft_content_3'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<img src="<?php echo TEMPLATE_URL; ?>/img/icons/p4.svg" alt="feature">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('ft_title_4'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('ft_content_4'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<img src="<?php echo TEMPLATE_URL; ?>/img/icons/p5.svg" alt="feature">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('ft_title_5'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('ft_content_5'); ?>
					</div>
				</div>
			</div>
			<div class="item-feature d-flex">
				<div class="item-logo">
					<img src="<?php echo TEMPLATE_URL; ?>/img/icons/p6.svg" alt="feature">
				</div>
				<div class="item-f-content">
					<div class="item-f-title">
						<?php echo the_field('ft_title_6'); ?>
					</div>
					<div class="item-f-content">
						<?php echo the_field('ft_content_6'); ?>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="product partners padding-15">
	<div class="container">
		<div class="like-header">
			<?php echo the_field('our_clients', 'option'); ?>
		</div>
		<?php include 'components/our-clients.php' ?>
	</div>
</section>
<div class="page-customer-project">
  <?php include 'components/customer-projects.php' ?>
</div>
<?php get_footer(); ?>