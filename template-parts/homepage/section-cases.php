<section class="xln-cases">
    <?php if(have_rows('cases')): ?>
    <?php while(have_rows('cases')): the_row(); ?>
        <div class="xln-case">
            <div class="xln-case__container xln-container">
                <div class="xln-case__img">
                    <img src="<?=get_sub_field('img')?>" alt="">
                </div>
                <div class="xln-case__content">
                    <?php $case_content = get_sub_field('content'); ?>
                    <div class="xln-case__subtitle"><?=$case_content['subtitle']?></div>
                    <h3 class="xln-case__title"><?=$case_content['title']?></h3>
                    <div class="xln-case__text">
                        <?=$case_content['text']?>
                    </div>

                    <?php $case_review = get_sub_field('review'); ?>
                    <div class="xln-case__review xln-case-review">
                        <div class="xln-case-review__photo">
                            <img src="<?=$case_review['photo']?>" alt="">
                        </div>
                        <div class="xln-case-review__header">
                            <div class="xln-case-review__author">
                                <div class="xln-case-review__name"><?=$case_review['author']['name']?></div>
                                <div class="xln-case-review__post"><?=$case_review['author']['position']?></div>
                            </div>
                            <div class="xln-case-review__company">
                                <img src="<?=$case_review['company_logo']?>" alt="">
                            </div>
                        </div>
                        <div class="xln-case-review__text">
                            <?=$case_review['author']['text']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>