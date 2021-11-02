<?php $offer = get_field('offer'); ?>
<section class="products-offer">
    <div class="xln-container">
        <div class="products-offer__content">
            <?php if ($offer['title']): ?>
                <h2 class="products-offer__title">
                    <?= $offer['title']; ?>
                </h2>
            <?php endif; ?>
            <form action="#" class="products-offer__form email-form">
                <div class="form-block">
                    <input type="email" name="email" id="email" placeholder="Email*" class="form-input">
                    <label for="email" class="form-label">Email*</label>
                    <div class="msg"></div>
                </div>
                <button type="submit" class="xln-button xln-button--green">
                    <?php if ($offer['btn']): ?>
                        <?= $offer['btn']; ?>
                    <?php endif; ?>
                    <svg width="9" height="14">
                        <use xlink:href='#arrow-right'></use>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>