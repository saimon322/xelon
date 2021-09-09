<?php
/**
 * Template Name: Story
 * Template Post Type: post, page, product
 */
get_header();
?>

<div class="page-story">

  <div class="ps-head">
    <div class="container">
      <div class="ps-row">
        <div class="head-left">
          <p class="pre-title"><?php echo the_field('story_title'); ?></p>
          <h1><?php echo the_field('story_subtitle'); ?></h1>
          <p class="text"><?php echo the_field('story_text'); ?></p>
        </div>
        <?php
        $story_img = get_field('story_img');
        if( !empty($story_img) ): ?>
          <img src="<?php echo $story_img['url']; ?>">
        <?php endif; ?>
      </div>
    </div>
    <div class="download-overlay">
      <div class="container">
        <div class="btn-wrap">
          <a href="<?php echo the_field('story_pdf'); ?>" class="btn-download" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="48" height="48"><path d="M490.667 234.667H158.17l112.915-112.915c8.331-8.331 8.331-21.839 0-30.17s-21.839-8.331-30.17 0L91.582 240.915a21.56 21.56 0 00-1.413 1.563c-.202.246-.378.506-.568.759-.228.304-.463.601-.674.917-.203.303-.379.618-.564.929-.171.286-.351.566-.509.861-.169.317-.313.643-.465.966-.145.308-.299.611-.43.926-.13.314-.235.635-.349.953-.122.338-.251.672-.356 1.018-.096.318-.167.642-.248.963-.089.353-.188.702-.259 1.061-.074.372-.117.747-.171 1.122-.045.314-.105.623-.136.941a21.331 21.331 0 00-.105 2.083l-.001.022.001.022c.001.695.037 1.39.105 2.083.031.318.091.627.136.941.054.375.097.75.171 1.122.071.36.17.708.259 1.061.081.322.151.645.248.963.105.346.234.68.356 1.018.114.318.219.639.349.953.131.316.284.618.43.926.152.323.296.649.465.966.158.295.338.575.509.861.186.311.361.626.564.929.211.316.447.613.674.917.19.253.365.513.568.759.446.544.916 1.067 1.413 1.563l149.333 149.333c8.331 8.331 21.839 8.331 30.17 0s8.331-21.839 0-30.17L158.17 277.333h332.497c11.782 0 21.333-9.551 21.333-21.333s-9.551-21.333-21.333-21.333zM21.333 85.333C9.551 85.333 0 94.885 0 106.667v298.667c0 11.782 9.551 21.333 21.333 21.333 11.782 0 21.333-9.551 21.333-21.333V106.667c.001-11.782-9.551-21.334-21.333-21.334z"/></svg><?php echo the_field('story_btn_download'); ?></a>
        </div>
      </div>
    </div>
  </div>

  <div class="page-position">
    <div class="position-text">
      <div class="container">
        <h2><?php echo the_field('story_overview_title'); ?></h2>
        <p><?php echo the_field('story_overview_text'); ?></p>
      </div>
    </div>

    <!-- <div id="pdfRequest-area" class="support-form pdf-form-wrap white-popup">
      <div class="tp-m-area">
        <div class="like-header"><?php the_field('pdf_form_title', 'option');?></div>
        <p class="subheader"><?php the_field('pdf_form_text', 'option');?></p>
        <form id="pdfRequest" class="tp-m-form" method="POST">
          <input type="hidden" id="pdfLink" value="<?php the_field('story_pdf');?>">
          <div class="tp-get-names d-flex">
            <div class="get-inputs">
              <input type="text" name="pr_name" id="pr_name" class="modal-input" placeholder="">
              <label for="pr_name" class="blue-label"><?php the_field('pdf_form_fn', 'option');?></label>
            </div>
            <div class="get-inputs">
              <input type="email" class="modal-input" name="pr_email" id="pr_email" placeholder="">
              <label for="pr_email" class="blue-label"><?php the_field('pdf_form_email', 'option');?></label>
            </div>
          </div>
          <div class="tp-get-names d-flex">
            <div class="get-inputs">
              <input type="text" class="modal-input" name="pr_company" id="pr_company" placeholder="">
              <label class="blue-label" for="pr_company"><?php the_field('pdf_form_company', 'option');?></label>
            </div>
            <div class="get-inputs">
              <input type="text" class="modal-input" name="pr_position" id="pr_position" placeholder="">
              <label class="blue-label" for="pr_position"><?php the_field('pdf_form_position', 'option');?></label>
            </div>
          </div>
          <div class="checkboks custom-sq">
            <input type="checkbox" id="pdCheck1" name="pdCheck1" class="checked-checkbox" value="true"/>
            <label for="pdCheck1" class="checkboks-text d-flex align-center"><?php the_field('pdf_form_c1', 'option');?></label>
          </div>
          <div class="checkboks custom-sq">
            <input type="checkbox" id="pdCheck2" name="pdCheck2" class="checked-checkbox" checked="checked" value="true"/>
            <label for="pdCheck2" class="checkboks-text d-flex align-center"><?php the_field('pdf_form_c2', 'option');?></label>
          </div>
          <div class="send-success-zone d-flex align-center">
            <button type="submit" class="xln-button pdf-submit"><?php the_field('pdf_form_btn', 'option');?></button>
            <div class="sucmsg8"></div>
          </div>
        </form>
      </div>
    </div> -->

    <div class="main-info-block left-start bluberry padding-15">
      <div class="container">
        <div class="info-flex d-flex">
          <div class="page-60">
            <div class="content-column d-flex">
              <p class="pre-title"><?php echo the_field('story_rp_title'); ?></p>
              <div class="like-header item-center blueberry-c">
                <?php echo the_field('story_rp_subtitle'); ?>         </div>
              <div class="info-content">
                <p><?php echo the_field('story_rp_text'); ?></p>
              </div>
              <a href="<?php echo the_field('story_rp_btn_url'); ?>" class="xln-button item-center"><?php echo the_field('story_rp_btn'); ?></a>
            </div>
          </div>
          <div class="page-40">
            <?php
            $story_rp_img = get_field('story_rp_img');
            if( !empty($story_rp_img) ): ?>
              <img src="<?php echo $story_rp_img['url']; ?>" alt="<?php echo $story_rp_img['alt']; ?>">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
      
    <div class="position-comment">
      <div class="container">
        <div class="pc-row">
          <?php
          $story_c_avatar = get_field('story_c_avatar');
          if( !empty($story_c_avatar) ): ?>
            <img src="<?php echo $story_c_avatar['url']; ?>" alt="<?php echo $story_c_avatar['alt']; ?>">
          <?php endif; ?>
          <div class="pc-text">
            <h4><?php echo the_field('story_c_name'); ?></h4>
            <p class="info"><?php echo the_field('story_c_post'); ?></p>
            <p class="text"><?php echo the_field('story_c_text'); ?></p>
            <div class="pc-brands">
              <?php if( have_rows('story_c_brands') ): ?>
                  <?php while ( have_rows('story_c_brands') ) : the_row(); ?>
                  <?php
                    $story_brand_img = get_sub_field('story_c_brands_logo');
                    if( !empty($story_brand_img) ): ?>
                      <img src="<?php echo $story_brand_img['url']; ?>" alt="<?php echo $story_brand_img['alt']; ?>">
                    <?php endif; ?>
                  <?php endwhile; ?>
              <?php else : ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $story_video = get_field('story_video');
  $story_video_img = get_field('story_video_image');
  if ($story_video) {?>

  <div class="ps-video">
    <div class="container">

        <div class="ytvideo" style="background-image: url(<?php echo $story_video_img['url']; ?>);" data-video="<?php echo $story_video; ?>"></div>
    </div>
  </div>

  <?php } ?>

  <!--<div class="have-you-quession pdf-request">
    <div class="container">
      <div class="q-area d-flex padding-15">
        <div class="q-left-side page-40">
          <div class="q-content">
            <div class="q-header">
              Order case study
            </div>
            <div class="q-describtion">
              Fill out the form now and receive the complete case study as a PDF by email:
            </div>
          </div>
        </div>
        <div class="q-right-side page-60">
          <div class="get-touch-area d-flex">
            <form id="pdfRequest" method="POST" class="d-flex form">
              <input type="text" class="simple-input" name="pr_name" id="pr_name" placeholder="Full name">
              <input type="text" class="simple-input" name="pr_email" id="pr_email" placeholder="Email address">
              <input type="text" class="simple-input" name="pr_company" id="pr_company" placeholder="Company">
              <input type="text" class="simple-input" name="pr_position" id="pr_position" placeholder="Position">
              <div class="checkboks custom-sq">
                <input type="checkbox" id="pdCheck1" name="pdCheck1" class="checked-checkbox" checked="checked" value="true"/>
                <label for="pdCheck1" class="checkboks-text d-flex align-center">I agree to receive information about H +.</label>
              </div>
              <div class="checkboks custom-sq">
                <input type="checkbox" id="pdCheck2" name="pdCheck2" class="checked-checkbox" checked="checked" value="true"/>
                <label for="pdCheck2" class="checkboks-text d-flex align-center">I would like to receive the monthly newsletter from Xelon.</label>
              </div>
              <div class="send-success-zone d-flex align-center">
                <button type="submit" class="xln-button pdf-submit">Send</button>
                <div class="sucmsg8"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <?php //include 'components/hy-quessions.php' ?>

  <div class="page-customer-project">
    <?php include 'components/customer-projects.php' ?>
  </div>

</div>

<?php get_footer(); ?>