<?php $banner = get_field('banner'); ?>
<section class="products-banner">
    <?php if ($banner['bg']): ?>
        <div class="products-banner__bg">
            <img src="<?= $banner['bg']; ?>" alt="">    
        </div>
    <?php endif; ?>
    <div class="xln-container">
        <div class="products-banner__content">
            <?php if ($banner['title']): ?>
                <h1 class="products-banner__title">
                    <?= $banner['title'] ?>
                </h1>
            <?php endif; ?>
                
            <?php if ($banner['text']): ?>
                <div class="products-banner__text">
                    <?= $banner['text'] ?>
                </div>    
            <?php endif; ?>
        </div>
        <form method="POST"
            class="products-banner__form email-form email-form--white"
            id="products-banner-signup"
            data-portal-id="3366455"
            data-form-id="6a2775e6-69c3-443c-ab12-1d97f9b3113e">
            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
            <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
            <div class="email-form__box">
                <div class="form-block">
                    <input type="email" name="email" placeholder="Email*" class="form-input">
                    <label class="form-label">Email*</label>
                </div>
                <input type="submit" class="xln-button xln-button--green send-subscribe"
                        value="<?= $banner['btn'] ?>">
            </div>
            <div class="msg"></div>
        </form>
        <?php /* $signups = get_field('signups', 'options');
        if ($signups):  ?>
            <div class="products-banner__signups">
                <div class="signups-title">
                    <span>oder registrieren Sie sich mit</span>
                </div>
                <?php echo do_shortcode('[signups]'); ?>
            </div>
        <?php endif; */ ?>
        </div>
    </div>
</section>