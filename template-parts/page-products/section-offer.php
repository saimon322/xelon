<?php $offer = get_field('offer'); ?>
<section class="products-offer">
    <div class="xln-container">
        <div class="products-offer__content">
            <?php if ($offer['title']): ?>
                <h2 class="products-offer__title">
                    <?= $offer['title']; ?>
                </h2>
            <?php endif; ?>
            <form method="POST"
                class="products-offer__form email-form email-form--white"
                id="products-footer-signup"
                data-portal-id="3366455"
                data-form-id="42743e69-7709-45ac-b87f-b49202e27c95">
                <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                <div class="email-form__box">
                    <div class="form-block">
                        <input type="email" name="email" placeholder="Email*" class="form-input">
                        <label class="form-label">Email*</label>
                    </div>
                    <button type="submit" class="xln-button xln-button--green send-subscribe">
                        <?php if ($offer['btn']): ?>
                            <?= $offer['btn']; ?>
                        <?php endif; ?>
                        <svg width="9" height="14">
                            <use xlink:href='#arrow-right'></use>
                        </svg>
                    </button>
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </div>
</section>