<?php $platforms = get_field('platforms'); ?>
<section class="products-platforms">
    <div class="xln-container">
        <?php if ($platforms['title']): ?>
            <h2 class="products-platforms__title">
                <?= $platforms['title']; ?>
            </h2>
        <?php endif; ?>
        <div class="products-platforms__wrapper">
            <div class="products-platforms__nav products-platforms-nav">
                <div class="products-platforms-nav__wrapper">
                    <div class="products-platforms-nav__header">
                        <?php if ($platforms['nav_title']): ?>
                            <div class="products-platforms-nav__title">
                                <?= $platforms['nav_title']; ?>
                        </div>
                        <?php endif; ?>
                        <div class="products-platforms-nav__btn">
                            <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/menu-btn.svg" alt="">
                            <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/menu-cross.svg" alt="">
                        </div>
                    </div>
                    <div class="products-platforms-nav__list">
                        <?php if ($platforms['list']): ?>
                            <?php foreach ($platforms['list'] as $platform_key => $platform) : ?>
                                <a href="#platform-<?= $platform_key ?>" class="products-platforms-nav__item">
                                    <?= $platform['title'] ?>
                                    <svg width="10" height="18">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="products-platforms__content">
                <?php if ($platforms['list']): ?>
                    <?php foreach ($platforms['list'] as $platform_key => $platform) : ?>
                        <div class="products-platform" id="platform-<?= $platform_key ?>">
                            <div class="products-platform__header">
                                <h2 class="products-platform__title">
                                    <?= $platform['title'] ?>
                                </h2>
                                <div class="products-platform__text">
                                    <?= $platform['description'] ?>
                                </div>
                            </div>
                            <div class="products-platform__features products-platform__features--<?= $platform['size'] ?>">
                                <?php foreach ($platform['features'] as $feature) : ?>
                                    <?php if(empty($feature['link'])) : ?>
                                        <div class="products-feature">
                                    <?php else: ?>
                                        <a href="<?= $feature['link'] ?>" class="products-feature products-feature--link">
                                            <img src="<?= TEMPLATE_URL ?>/xln-layout/dist/img/icon/arrow-up-right.svg" alt="" class="products-feature__arrow">
                                    <?php endif; ?>
                                            <div class="products-feature__header">
                                                <img src="<?= $feature['icon'] ?>" alt="" class="products-feature__icon">
                                                <div class="products-feature__title">
                                                    <?= $feature['title'] ?>
                                                </div>
                                            </div>
                                            <div class="products-feature__text">
                                                <?= $feature['description'] ?>
                                            </div>
                                    <?php if(empty($feature['link'])) : ?>
                                        </div>
                                    <?php else: ?>
                                        </a>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>