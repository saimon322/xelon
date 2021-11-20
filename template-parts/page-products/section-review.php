<?php $review = get_field('review'); ?>
<section class="products-review half-bg">
    <div class="xln-container">
        <div class="products-review__wrapper">
            <?php if ($review['text']): ?>
                <div class="products-review__text">
                    <?= $review['text']; ?>
                </div>
            <?php endif; ?>
            <div class="products-review__author">
                <?php if ($review['author_photo']): ?>
                    <div class="products-review__author-photo">
                        <img src="<?= $review['author_photo'] ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="products-review__author-info">
                    <?php if ($review['author_data']['name']): ?>
                        <div class="products-review__author-name">
                            <?= $review['author_data']['name'] ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($review['author_data']['post']): ?>                            
                        <div class="products-review__author-post">
                        <?= $review['author_data']['post'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>