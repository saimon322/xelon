<section class="s-form-steps">
    <h3 class="d-none">Block</h3>
	<div class="container">
		<div class="d-flex">
			
			<div class="col">
				<div class="form-ask">
					<h3><?php the_field('title_form_pr','option'); ?></h3>

					<!-- <form id="hy-form" method="POST" class="d-flex form">
						<input type="text" class="simple-input" name="hy_name" id="hy_name" placeholder="Name">
						<input type="text" class="simple-input" name="hy_email" id="hy_email" placeholder="Email address">
						<textarea class="quession-input" id="hy_msg" name="hy_msg" placeholder="Your question"></textarea>
						<div class="checkboks custom-sq">
							<input type="checkbox" id="box3" name="myCheckboxesHy" class="checked-checkbox" checked="checked" value="true"/>
							<label for="box3" class="checkboks-text d-flex align-center">I've got the <a href="#">Data Protection</a> to the attention of the court.</label>
						</div>
						<div class="send-success-zone d-flex align-center">
							<button type="submit" class="xln-button hy-submit">Send message</button>
							<div class="sucmsg2"></div>								
						</div>
					</form> -->
					<?php echo do_shortcode(''. get_field('shotcode_form_pr','option') .'' ); ?>
				</div>

			</div>

			<div class="col">
				<div class="steps-list">
					<h3><?php the_field('title_steps_pr','option'); ?></h3>
			        <?php if( have_rows('steps_list','option') ): $i = 1; ?>
			        <ul>
			        <?php while ( have_rows('steps_list','option') ) : the_row(); ?>

			          	<li><span><?php echo $i; ?></span><?php the_sub_field('li'); ?></li>

			        <?php $i++; endwhile; ?>
			        </ul>
			        <?php endif; ?>	
				</div>
			</div>			

		</div>
	</div>
</section>