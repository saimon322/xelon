<div class="have-you-quession">
	<div class="container">
		<div class="q-area d-flex padding-15">
			<div class="q-left-side page-40">
				<div class="q-content">
					<div class="q-header">
						<?php echo the_field('hy_title', 'option'); ?>
					</div>
					<div class="q-describtion">
						<?php echo the_field('hy_subtitle', 'option'); ?>
					</div>
				</div>
			</div>
			<div class="q-right-side page-60">
				<div class="get-touch-area d-flex">
					<form id="hy-form" method="POST" class="d-flex form">
                        <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
                        <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
						<input type="text" class="simple-input" name="hy_name" id="hy_name" placeholder="<?php the_field('ph_full_name', 'option');?>">
						<input type="text" class="simple-input" name="hy_email" id="hy_email" placeholder="<?php the_field('ph_email', 'option');?>">
						<textarea class="quession-input" id="hy_msg" name="hy_msg" placeholder="<?php the_field('ph_your_question', 'option');?>"></textarea>
						<div class="checkboks custom-sq">
							<input type="checkbox" id="box3" name="myCheckboxesHy" class="checked-checkbox" checked="checked" value="true"/>
							<label for="box3" class="checkboks-text d-flex align-center"><?php echo the_field('any_questions_checkbox_text', 'option'); ?></label>
						</div>
						<div class="send-success-zone d-flex align-center">
							<button type="submit" class="danger-btn hy-submit"><?php echo the_field('btn_send', 'option'); ?></button>
							<div class="sucmsg2"></div>								
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>