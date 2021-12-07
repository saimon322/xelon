<section class="xln-banner">
    <div class="xln-container">
        <div class="xln-banner__wrapper">
            <div class="xln-banner__content">
                <h1 class="xln-banner__title">
                    <?=get_field('banner_title')?>
                </h1>
                <div class="xln-banner__text">
                    <?=get_field('banner_text')?>
                </div>
                <?php $banner_form = get_field('banner_form'); ?>
                <form action="#" class="xln-banner__form email-form" id="hp-hero-signup">
                    <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                    <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                    <div class="email-form__box">
                        <div class="form-block">
                            <input type="email" name="email" placeholder="Email*" class="form-input">
                            <label class="form-label">Email*</label>
                        </div>
                        <input type="submit" class="xln-button xln-button--green send-subscribe" value="<?=$banner_form['button']?>">
                    </div>
                    <div class="msg"></div>
                </form>
                <?php /* ?>
                <div class="xln-banner__signups">
                    <p><?=$banner_form['signups_label']?></p>
                    <?php echo do_shortcode('[signups]'); ?>
                </div>
                <?php */ ?>
            </div>
            <div class="xln-banner__media">
                <?php $banner_img = get_field('banner_img');
                if ($banner_img): ?>
                    <img src="<?=$banner_img?>" class="xln-banner__img">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>