<section class="xln-about">
    <div class="xln-container">
        <div class="xln-about__main">
            <h2 class="xln-about__title">
                <?=get_field('about_title')?>
            </h2>
            <div class="xln-about__text">
                <?=get_field('about_text')?>                    
            </div>
        </div>

        <?php $about_gallery = get_field('about_gallery');
        if($about_gallery): ?>
            <div class="xln-about__slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach($about_gallery as $about_img): ?>
                        <div class="xln-about__slider-item swiper-slide">
                            <div class="xln-about__slider-item-wrap">
                                <img src="<?=$about_img;?>"  alt="">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-nav">
                    <button class="swiper-arrow swiper-arrow--prev">
                        <svg width='13px' height='22px'>
                            <use xlink:href='#arrow-left'></use>
                        </svg>
                    </button>
                    <div class="swiper-pagination"></div>
                    <button class="swiper-arrow swiper-arrow--next">
                        <svg width='13px' height='22px'>
                            <use xlink:href='#arrow-right'></use>
                        </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?> 
    </div>
</section>   