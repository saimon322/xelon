<?php
/**
* Template Name: Page Support
*/
get_header();
?>
<section class="page-support">
	<div class="sp-bg-container"></div>
	<div class="container">
		<div class="page-support-row d-flex">
            <h1 class="d-none">Support</h1>
			<div class="page-50">
				<div class="sp-contact-cards d-flex flex-direction align-center justify-center">
					<div class="sp-black-card d-flex flex-direction">
						<div class="sp-bc-title">
							<?php echo the_field('sp_black_title'); ?>
						</div>
						<div class="sp-bc-subtitle">
							<?php echo the_field('sp_black_subtitle'); ?>	
						</div>
					</div>
					<div class="sp-blue-card d-flex flex-direction align-center justify-center">
						<div class="sp-bc-title">
							<?php echo the_field('sp_blue_title'); ?>
						</div>
						<div class="sp-bc-subtitle">
							<?php echo the_field('sp_blue_subtitle'); ?>
						</div>
						<div class="sp-bc-subtitle">
							<?php echo the_field('sp_blue_text'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="page-50">
				<div class="support-form">
					<div class="tp-m-area">
						<h2 class="like-header"><?php echo the_field('message_support_instantly', 'option'); ?></h2>
						<form id="support-form" class="tp-m-form" method="POST">
                            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
                            <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
							<div class="tp-get-names d-flex">
								<div class="get-inputs">
                                  <input type="text" name="spFullname" id="spFullname" class="modal-input" placeholder="<?php the_field('ph_full_name', 'option');?>">
                                  <label for="spFullname" class="blue-label"><?php echo the_field('full_name', 'option'); ?></label>
								</div>
								<div class="get-inputs">
									<input type="text" class="modal-input" name="spEmail" id="spEmail" placeholder="<?php the_field('ph_email', 'option');?>">
                                    <label for="spEmail" class="blue-label"><?php echo the_field('mh_email', 'option'); ?></label>
								</div>
							</div>
                            <div class="get-inputs">
                              <input type="text" class="modal-input" name="spCompany" id="spCompany" placeholder="">
                              <label class="blue-label" for="spCompany"><?php the_field('ph_company', 'option');?></label>
                            </div>
                            <div class="get-inputs">
                              <textarea class="modal-input" cols="40" rows="10" name="spMsg" id="spMsg" placeholder=""></textarea>
                              <label class="blue-label" for="spMsg"><?php the_field('ph_message', 'option');?></label>
                            </div>
							<div class="checkboks custom-sq">
								<input type="checkbox" id="box9" name="supportCheckbox" class="checked-checkbox" checked="checked" value="true"/>
								<label for="box9" class="checkboks-text d-flex align-center"><?php echo the_field('support_page_checkbox_text', 'option'); ?></label>
							</div>
							<div class="send-success-zone d-flex align-center">
							<button type="submit" class="xln-button support-submit"><?php echo the_field('message_support_btn', 'option'); ?></button>							
							<div class="sucmsg5"></div>									
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>