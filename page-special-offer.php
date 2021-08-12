<?php
/**
 * Template Name: Special offer
 */
get_header();
?>

<section class="page-special-offer">
  <div class="container">
    <div class="so-row">
      <div class="so-left">
        <div class="top-btn-wrap">
          <a href="<?php echo the_field('so_btn_back_url'); ?>" class="btn-back"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="48" height="48"><path d="M490.667 234.667H158.17l112.915-112.915c8.331-8.331 8.331-21.839 0-30.17s-21.839-8.331-30.17 0L91.582 240.915a21.56 21.56 0 00-1.413 1.563c-.202.246-.378.506-.568.759-.228.304-.463.601-.674.917-.203.303-.379.618-.564.929-.171.286-.351.566-.509.861-.169.317-.313.643-.465.966-.145.308-.299.611-.43.926-.13.314-.235.635-.349.953-.122.338-.251.672-.356 1.018-.096.318-.167.642-.248.963-.089.353-.188.702-.259 1.061-.074.372-.117.747-.171 1.122-.045.314-.105.623-.136.941a21.331 21.331 0 00-.105 2.083l-.001.022.001.022c.001.695.037 1.39.105 2.083.031.318.091.627.136.941.054.375.097.75.171 1.122.071.36.17.708.259 1.061.081.322.151.645.248.963.105.346.234.68.356 1.018.114.318.219.639.349.953.131.316.284.618.43.926.152.323.296.649.465.966.158.295.338.575.509.861.186.311.361.626.564.929.211.316.447.613.674.917.19.253.365.513.568.759.446.544.916 1.067 1.413 1.563l149.333 149.333c8.331 8.331 21.839 8.331 30.17 0s8.331-21.839 0-30.17L158.17 277.333h332.497c11.782 0 21.333-9.551 21.333-21.333s-9.551-21.333-21.333-21.333zM21.333 85.333C9.551 85.333 0 94.885 0 106.667v298.667c0 11.782 9.551 21.333 21.333 21.333 11.782 0 21.333-9.551 21.333-21.333V106.667c.001-11.782-9.551-21.334-21.333-21.334z"/></svg> <?php echo the_field('so_btn_back'); ?></a>
        </div>
        <?php
        $so_img = get_field('so_img');
        if( !empty($so_img) ): ?>
          <img src="<?php echo $so_img['url']; ?>" alt="<?php echo $so_img['alt']; ?>">
        <?php endif; ?>
        <h1><?php echo the_field('so_title');?></h1>
        <p><?php echo the_field('so_text');?></>
      </div>
      <div class="so-right">
        <div class="suppor-send-form white-popup">
          <div class="tp-m-area">
            <div class="like-header"><?php echo the_field('so_form_title', 'option');?></div>
            <p class="subheader"><?php echo the_field('so_form_subtitle', 'option');?></p>
            <form id="subscription-form" class="tp-m-form" method="POST">
                <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
                <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
              <div class="get-inputs">
                <input type="text" name="soFirstName" id="soFirstName" class="modal-input" placeholder="">
                <label for="soFirstName" class="blue-label"><?php echo the_field('so_form_fn', 'option');?></label>
              </div>
              <div class="get-inputs">
                <input type="text" class="modal-input" name="soLastName" id="soLastName" placeholder="">
                <label for="soLastName" class="blue-label"><?php echo the_field('so_form_ln', 'option');?></label>
              </div>
              <div class="get-inputs">
                <input type="email" class="modal-input" name="soEmail" id="soEmail" placeholder="">
                <label class="blue-label" for="soEmail"><?php echo the_field('so_form_email', 'option');?></label>
              </div>
              <div class="get-inputs">
                <input type="text" class="modal-input" name="soCompany" id="soCompany" placeholder="">
                <label class="blue-label" for="soCompany"><?php echo the_field('so_form_company', 'option');?></label>
              </div>
              <div class="checkboks custom-sq">
                <input type="checkbox" id="box10" name="subCheck1" class="checked-checkbox" value="true"/>
                <label for="box10" class="checkboks-text d-flex align-center"><?php echo the_field('so_form_c1', 'option');?></label>
              </div>
              <div class="checkboks custom-sq">
                <input type="checkbox" id="box11" name="subCheck2" class="checked-checkbox" checked="checked" value="true"/>
                <label for="box11" class="checkboks-text d-flex align-center"><?php echo the_field('so_form_c2', 'option');?></label>
              </div>
              <div class="send-success-zone d-flex align-center">
                <button type="submit" class="danger-btn subscribe-btn"><?php echo the_field('so_form_btn', 'option');?></button>
                <div class="sucmsg7"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>