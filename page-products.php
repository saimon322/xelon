<?php
/**
 * Template Name: Platforms page
 */

get_header(); ?>

<div class="xln-page">
    <section class="products-banner">
        <div class="products-banner__bg">
            <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/base/products-banner.jpg" alt="Background banner">
        </div>
        <div class="xln-container">
            <div class="products-banner__content">
                <h1 class="products-banner__title">
					<?= get_field( 'platforms_page_banner_title' ) ?>
                </h1>
                <div class="products-banner__text">
					<?= get_field( 'platforms_page_banner_text' ) ?>
                </div>
            </div>
            <div class="products-banner-form">

                <form action="#" class="products-banner-form__form xln-get-started__form">
                    <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                    <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                    <div class="form-block">
                        <input type="email" id="send_email" name="email" placeholder="Email*" class="form-input">
                        <label class="form-label">Email*</label>
                        <div class="msg"></div>
                    </div>
	                <?php $popup_thanks = get_field( 'popup_thanks', 'options' ) ?>
                    <input type="submit" name="subscribe-form" id="vdc-send-modal" class="xln-button xln-button--green send-subscribe"
                           value="<?= $popup_thanks['button'] ? $popup_thanks['button'] : 'Senden' ?>">
                </form>
				<?php /*
                <div class="products-banner-form__signups">
                    <div class="signups-title">
                        <span>oder registrieren Sie sich mit</span>
                    </div>
                    <div class="signups">
                        <a href="#" class="signup">
                            <img src="img/icon/google.svg" alt="">
                            <span>Google</span>
                        </a>
                        <a href="#" class="signup">
                            <img src="img/icon/github.svg" alt="">
                            <span>GitHub</span>
                        </a>
                    </div>
                </div>
                */ ?>
            </div>
        </div>
    </section>

    <section class="products-advantages">
        <div class="xln-container">
            <div class="products-advantages__list">
				<?php foreach ( get_field( 'platforms_page_advantages' ) as $adv ): ?>
                    <div class="products-advantage">
                        <div class="products-advantage__icon">
                            <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/adv-<?= $adv['icon']?>.svg" alt="icon">
                        </div>
                        <div class="products-advantage__title">
							<?= $adv['title'] ?>
                        </div>
                        <div class="products-advantage__text">
	                        <?= $adv['text'] ?>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="products-review">
        <div class="xln-container">
            <div class="products-review__wrapper">
                <div class="products-review__text">
                    <?= get_field('platforms_page_review_text') ?>
                </div>
                <div class="products-review__author">
                    <div class="products-review__author-photo">
                        <img src="<?= get_field('platforms_page_review_author_photo') ?>" alt="">
                    </div>
                    <div class="products-review__author-info">
                        <div class="products-review__author-name">
	                        <?= get_field('platforms_page_review_author_name') ?>
                        </div>
                        <div class="products-review__author-post">
	                        <?= get_field('platforms_page_review_author_job') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products-platforms">
        <div class="xln-container">
            <h1 class="products-platforms__title">
                Plattform-Features
            </h1>
            <div class="products-platforms__wrapper">
                <div class="products-platforms__nav products-platforms-nav">
                    <div class="products-platforms-nav__wrapper">
                        <div class="products-platforms-nav__header">
                            <div class="products-platforms-nav__title">
                                Choose
                            </div>
                            <div class="products-platforms-nav__btn">
                                <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/menu-btn.svg"
                                     alt="open menu">
                                <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/menu-cross.svg"
                                     alt="close menu">
                            </div>
                        </div>
                        <div class="products-platforms-nav__list">
	                        <?php foreach (get_field('platforms_page_features') as $feature_block_key => $feature_block) : ?>
                                <a href="#feature-block-<?= $feature_block_key ?>" class="products-platforms-nav__item">
                                    <?= $feature_block['block_title'] ?>
                                    <svg width="10" height="18">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="products-platforms__content">
                    <?php foreach (get_field('platforms_page_features') as $feature_block_key => $feature_block) : ?>
                        <div class="products-platform" id="feature-block-<?= $feature_block_key ?>">
                            <div class="products-platform__header">
                                <h2 class="products-platform__title">
                                    <?= $feature_block['block_title'] ?>
                                </h2>
                                <div class="products-platform__text">
	                                <?= $feature_block['block_description'] ?>
                                </div>
                            </div>
                            <div class="products-platform__features products-platform__features--<?= $feature_block['block_size'] ?>">
	                            <?php foreach ($feature_block['block_cards'] as $feature_card) : ?>
		                            <?php if(empty($feature_card['card_link'])) : ?>
                                        <div class="products-feature">
		                            <?php else: ?>
                                        <a href="<?= $feature_card['card_link'] ?>" class="products-feature products-feature--link">
                                            <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/arrow-up-right.svg" alt="" class="products-feature__arrow">
		                            <?php endif; ?>
                                            <div class="products-feature__header">
                                                <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/platform-<?= $feature_card['card_icon'] ?>.svg" alt=""
                                                     class="products-feature__icon">
                                                <div class="products-feature__title">
	                                                <?= $feature_card['card_title'] ?>
                                                </div>
                                            </div>
                                            <div class="products-feature__text">
	                                            <?= $feature_card['card_description'] ?>
                                            </div>
		                            <?php if(empty($feature_card['card_link'])) : ?>
                                        </div>
		                            <?php else: ?>
                                        </a>
		                            <?php endif; ?>

	                            <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
