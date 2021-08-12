<section class="s-fform">
    <h3 class="d-none">Block</h3>
	<div class="container">
		<div class="like-header">
			<?php the_field('adv_form_title','option'); ?>
			<span><?php the_field('adv_form_subtitle','option'); ?></span>
		</div>
    <div class="d-flex flex-row">
        <form method="POST" class="send-modal-data" id="form-blue">
            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
            <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
          <input type="text" class="simple-input email-input-home" placeholder="Email" />
          <button class="xln-button xln-button--green send-subscribe"><?php the_field('adv_form_button','option'); ?></button>
          <div class="success-msg">
                <div class="msg"></div>
            </div>
        </form>
    </div>
	</div>
</section>