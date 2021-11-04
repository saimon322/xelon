<section class="products-advantages">
    <div class="xln-container">
        <div class="products-advantages__list">
            <?php if(get_field('advantages')): ?>
                <?php foreach(get_field('advantages') as $adv): ?>
                    <div class="products-advantage">
                        <div class="products-advantage__icon">
                            <img src="<?= $adv['icon']?>" alt="">
                        </div>
                        <div class="products-advantage__title">
                            <?= $adv['title'] ?>
                        </div>
                        <div class="products-advantage__text">
                            <?= $adv['text'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>