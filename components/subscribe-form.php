<?php 

$sb_title = get_field('sb_title', 'option');
$sb_subtitle = get_field('sb_subtitle', 'option');
$checkbox_text = get_field('subscribe_checkbox_text', 'option');

?>
<section class="subscribe-area">
	<div class="container">
		<div class="q-area d-flex padding-15">
			<div class="q-left-side page-40">
				<div class="q-content">
					<div class="q-header">
						<?php echo $sb_title; ?>
					</div>
					<div class="q-describtion">
						<?php echo $sb_subtitle; ?>
					</div>
				</div>
			</div>
			<div class="q-right-side page-60">
				<div class="get-touch-area d-flex">
					<form id="subs-form" class="d-flex form">
                        <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
                        <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
						<div class="subs-flex d-flex align-center">
							<input type="text" name="subsEmail" id="subsEmail" class="simple-input" placeholder="<?php the_field('ph_email', 'option');?>">
							<button type="submit" class="xln-button subs-submit">Send</button>
							<div class="sucmsg4"></div>	
						</div>
						<div class="checkboks custom-sq">
							<input type="checkbox" id="box2" name="subsCheckbox" class="checked-checkbox" checked="checked" value="true" />
							<label for="box2" class="checkboks-text d-flex align-center"><?php echo $checkbox_text ; ?></label>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</div>
</section>