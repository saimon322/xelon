<section class="products-advantages">
    <div class="xln-container">
        <div class="xln-advantages">
            <?php if(get_field('advantages')): ?>
                <?php foreach(get_field('advantages') as $adv): ?>
                    <div class="xln-advantage">
                        <div class="xln-advantage__icon">
                            <img src="<?= $adv['icon']?>" alt="">
                        </div>
                        <div class="xln-advantage__title">
                            <?= $adv['title'] ?>
                        </div>
                        <div class="xln-advantage__text">
                            <?= $adv['text'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>