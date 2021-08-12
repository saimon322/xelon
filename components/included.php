<section class="s-serv-inc">
    <h3 class="d-none">Block</h3>
  <div class="container">
    <h2><?php the_field('title_i','option') ?></h2>
    <div class="d-flex">
      
        <?php if( have_rows('blocks_i','option') ): ?>
        <?php while ( have_rows('blocks_i','option') ) : the_row(); ?>

        <div class="col">
          <div class="serv-inc">
            <div class="serv-inc-title">
              <img src="<?php the_sub_field('img'); ?>" alt="<?php the_sub_field('title'); ?>" />
              <h3><?php the_sub_field('title'); ?></h3>
            </div>
            <p><?php the_sub_field('text'); ?></p>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>     

    </div>
  </div>
</section>