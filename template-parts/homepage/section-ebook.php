<section class="xln-ebook">
    <div class="container">
        <div class="xln-ebook__wrapper">
            <?php $ebook_img = get_field('ebook_img');
            if ($ebook_img): ?>
                <div class="xln-ebook__img">
                    <img src="<?=$ebook_img;?>" alt="">
                </div>
            <?php endif; 

            $ebook_data = get_field('ebook_data');
            if ($ebook_data): ?>
            <div class="xln-ebook__content">
                <h3 class="xln-ebook__title"><?=$ebook_data['title']?></h3>
                <div class="xln-ebook__text">
                    <?=$ebook_data['text']?>
                </div>
                <a href="<?=$ebook_data['link']['url']?>" 
                    class="xln-ebook__button xln-button xln-button--green">
                    <?=$ebook_data['link']['title']?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>