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
        <div class="products-banner-form">
            <form action="#" class="products-banner-form__form email-form">
                <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                <div class="form-block">
                    <input type="email" name="email" placeholder="Email*" class="form-input">
                    <label class="form-label">Email*</label>
                </div>
                <input type="submit" class="xln-button xln-button--green send-subscribe"
                        value="<?= $banner['btn'] ?>">
                <div class="msg"></div>
            </form>
            <?php /* $signups = get_field('signups', 'options');
            if ($signups):  ?>
                <div class="products-banner-form__signups">
                    <div class="signups-title">
                        <span>oder registrieren Sie sich mit</span>
                    </div>
                    <?php echo do_shortcode('[signups]'); ?>
                </div>
            <?php endif; */ ?>
        </div>
    </div>
</section>