<?php
/**
 * Template Name: Position
 * Template Post Type: post, page, product
 */
get_header();
?>

  <section class="page-position">
    <?php
    $ph_img = get_field('position_head_img');
    if( !empty($ph_img) ): ?>
    <div class="position-head" style="background-image: url('<?php echo $ph_img['url']; ?>');">
      <?php endif; ?>
      <div class="container">
        <div class="h-row">
          <h1><?php echo the_field('position_head_title'); ?></h1>
        </div>
      </div>
    </div>

    <div class="position-text">
      <div class="container">
        <div class="position-text-wrap">
          <?php echo the_field('position_text'); ?>
        </div>
        <div class="pt-row">
          <a href="<?php echo the_field('position_btn_back_url'); ?>" class="btn-back"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="48" height="48"><path d="M490.667 234.667H158.17l112.915-112.915c8.331-8.331 8.331-21.839 0-30.17s-21.839-8.331-30.17 0L91.582 240.915a21.56 21.56 0 00-1.413 1.563c-.202.246-.378.506-.568.759-.228.304-.463.601-.674.917-.203.303-.379.618-.564.929-.171.286-.351.566-.509.861-.169.317-.313.643-.465.966-.145.308-.299.611-.43.926-.13.314-.235.635-.349.953-.122.338-.251.672-.356 1.018-.096.318-.167.642-.248.963-.089.353-.188.702-.259 1.061-.074.372-.117.747-.171 1.122-.045.314-.105.623-.136.941a21.331 21.331 0 00-.105 2.083l-.001.022.001.022c.001.695.037 1.39.105 2.083.031.318.091.627.136.941.054.375.097.75.171 1.122.071.36.17.708.259 1.061.081.322.151.645.248.963.105.346.234.68.356 1.018.114.318.219.639.349.953.131.316.284.618.43.926.152.323.296.649.465.966.158.295.338.575.509.861.186.311.361.626.564.929.211.316.447.613.674.917.19.253.365.513.568.759.446.544.916 1.067 1.413 1.563l149.333 149.333c8.331 8.331 21.839 8.331 30.17 0s8.331-21.839 0-30.17L158.17 277.333h332.497c11.782 0 21.333-9.551 21.333-21.333s-9.551-21.333-21.333-21.333zM21.333 85.333C9.551 85.333 0 94.885 0 106.667v298.667c0 11.782 9.551 21.333 21.333 21.333 11.782 0 21.333-9.551 21.333-21.333V106.667c.001-11.782-9.551-21.334-21.333-21.334z"/></svg> <?php echo the_field('position_btn_back'); ?></a>
          <a href="<?php echo the_field('position_btn_apply_url'); ?>" class="btn-next open-popup-link"><?php echo the_field('position_btn_apply'); ?></a>
        </div>
      </div>
    </div>

    <div class="position-info">
      <div class="container">
        <?php if( have_rows('info_item') ): ?>
          <?php $i = 1; ?>
          <?php while ( have_rows('info_item') ) : the_row(); ?>
            <div class="pi-item<?= $i == 1 ? ' active' : '' ?>">
              <h3><?php echo the_sub_field('info_title'); ?></h3>
              <div class="pi-item-text"<?= $i == 1 ? ' style="display: block;"' : '' ?>>
                <?php echo the_sub_field('info_text'); ?>
              </div>
            </div>
            <?php $i++ ?>
          <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <div class="pt-row">
          <a href="<?php echo the_field('position_btn_back_url1'); ?>" class="btn-back"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="48" height="48"><path d="M490.667 234.667H158.17l112.915-112.915c8.331-8.331 8.331-21.839 0-30.17s-21.839-8.331-30.17 0L91.582 240.915a21.56 21.56 0 00-1.413 1.563c-.202.246-.378.506-.568.759-.228.304-.463.601-.674.917-.203.303-.379.618-.564.929-.171.286-.351.566-.509.861-.169.317-.313.643-.465.966-.145.308-.299.611-.43.926-.13.314-.235.635-.349.953-.122.338-.251.672-.356 1.018-.096.318-.167.642-.248.963-.089.353-.188.702-.259 1.061-.074.372-.117.747-.171 1.122-.045.314-.105.623-.136.941a21.331 21.331 0 00-.105 2.083l-.001.022.001.022c.001.695.037 1.39.105 2.083.031.318.091.627.136.941.054.375.097.75.171 1.122.071.36.17.708.259 1.061.081.322.151.645.248.963.105.346.234.68.356 1.018.114.318.219.639.349.953.131.316.284.618.43.926.152.323.296.649.465.966.158.295.338.575.509.861.186.311.361.626.564.929.211.316.447.613.674.917.19.253.365.513.568.759.446.544.916 1.067 1.413 1.563l149.333 149.333c8.331 8.331 21.839 8.331 30.17 0s8.331-21.839 0-30.17L158.17 277.333h332.497c11.782 0 21.333-9.551 21.333-21.333s-9.551-21.333-21.333-21.333zM21.333 85.333C9.551 85.333 0 94.885 0 106.667v298.667c0 11.782 9.551 21.333 21.333 21.333 11.782 0 21.333-9.551 21.333-21.333V106.667c.001-11.782-9.551-21.334-21.333-21.334z"/></svg> <?php echo the_field('position_btn_back1'); ?></a>
          <a href="<?php echo the_field('position_btn_apply_url1'); ?>" class="btn-next"><?php echo the_field('position_btn_apply1'); ?></a>
        </div>
      </div>
    </div>

    <div class="position-comment">
      <div class="container">
        <div class="pc-row">
          <?php
          $position_c_img = get_field('position_comment_img');
          if( !empty($position_c_img) ): ?>
          <img src="<?php echo $position_c_img['url']; ?>" alt="<?php echo $position_c_img['alt']; ?>">
          <?php endif; ?>
          <div class="pc-text">
            <h4><?php echo the_field('position_c_name'); ?></h4>
            <p class="info"><?php echo the_field('position_c_post'); ?></p>
            <p class="text"><?php echo the_field('position_c_text'); ?></p>
            <p class="pc-contact">
              <a href="mailto:<?php echo the_field('position_c_email'); ?>"><?php echo the_field('position_c_email'); ?></a>
              <a href="<?php echo the_field('position_c_linked'); ?>">LinkedIn</a>
            </p>
          </div>
        </div>
      </div>
    </div>

  </section>

<?php get_footer(); ?>