<?php if( have_rows('blocks_b','option') ): ?>
<section class="s-block">
    <h3 class="d-none">Block</h3>
	<div class="container">
		<div class="block-row d-flex">
		<?php while ( have_rows('blocks_b','option') ) : the_row(); ?>
			<div class="col">
				<a class="block-one" href="<?php the_sub_field('url'); ?>">
                    <img src="<?php the_sub_field('img'); ?>">
					<div class="block-text">
						<h3><?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('text'); ?></p>
					</div>
				</a>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>