<?php
/**
 * Template Name: Front page
 */

get_header(); ?>

<?php $login_link = get_field('login_link', 'options'); 
      $signup_modal = get_field('signup_modal', 'options'); 
      $contacts_modal = get_field('contacts_modal', 'options'); 
      $consult_link = get_field('consult_link', 'options'); ?>

<div class="xln-page">
    <section class="xln-banner">
        <div class="xln-container">
            <div class="xln-banner__wrapper">
                <div class="xln-banner__content">
                    <h1 class="xln-banner__title">
                        <?=get_field('banner_title')?>
                    </h1>
                    <div class="xln-banner__text">
                        <?=get_field('banner_text')?>
                    </div>
                    <?php if ($contacts_modal): ?>
                        <a href="<?=get_field('banner_button')['url']?>"
                            class="xln-banner__button xln-button xln-button--green">
                                <?=get_field('banner_button')['title']?>
                                <img src="<?=get_template_directory_uri()?>/xln-layout/dist/img/icon/button-arrow.svg" alt="">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="xln-banner__media">
                    <?php
                    $banner_anim_mobile = get_field('banner_anim_mobile');
                    $banner_anim_desktop = get_field('banner_anim_desktop');
                    if ($banner_anim_mobile): ?>
                        <img src="<?=$banner_anim_mobile?>" 
                            class="xln-banner__anim xln-banner__anim--mobile">
                    <?php endif;
                    if ($banner_anim_desktop): ?>
                        <img src="<?=$banner_anim_desktop?>" 
                            class="xln-banner__anim xln-banner__anim--desktop">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-get-started">
        <div class="xln-get-started__wrapper">
                <div class="xln-get-started__container xln-container">
                <div class="xln-get-started__img">
                    <img src="<?=get_field('get_started_img')?>" alt="">
                </div>
                <?php $get_started_form = get_field('get_started_form')?>
                <div class="xln-get-started__content">
                    <h2 class="xln-get-started__title">Get started!</h2>
                    <div class="xln-get-started__text">
                        <?=$get_started_form['text']?>
                    </div>
                    <form action="#" class="xln-get-started__form">
                        <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                        <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                        <div class="form-block">
                            <input type="email" id="send_email" name="email" placeholder="Email*" class="form-input">
                            <label class="form-label">Email*</label>
                            <div class="msg"></div>
                        </div>
                        <input type="submit" 
                               class="xln-button xln-button--green send-subscribe" 
                               value="<?=$get_started_form['button']?>">
                    </form>
                    <?php /* ?>
                    <div class="xln-get-started__signups">
                        <p><?=$get_started_form['signups_label']?></p>
                        <?php echo do_shortcode('[signups]'); ?>
                    </div>
                    <?php */ ?>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-customers">
        <div class="xln-container">
            <h2 class="xln-customers__title">
                <?=get_field('customers_title')?>
            </h2>
            <div class="xln-customers__content">
                <?php $customers = get_field('customers');
                if($customers): ?>
                    <div class="xln-customers__list">
                        <?php foreach($customers as $customer): ?>
                            <div class="xln-customers__item">
                                <img src="<?=esc_url($customer['url'])?>" 
                                        title="<?=esc_attr($customer['title'])?>" 
                                        alt="<?=esc_attr($customer['alt'])?>">
                            </div>                            
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    </section>

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

    <section class="xln-info-block">
        <div class="xln-container">
            <div class="xln-info-block__wrapper">
                <div class="xln-info-block__main">
                    <h2 class="xln-info-block__title">
                        <?=get_field('action_title')?>
                    </h2>
                    <div class="xln-info-block__text">
                        <?=get_field('action_text')?>
                    </div>
                </div>
                <div class="xln-info-block__buttons">
                    <?php if ($signup_modal): ?>
                        <a href="<?=get_field('action_sign_up_button')['url']?>"
                            class="xln-button xln-button--green">
                                <?=get_field('action_sign_up_button')['title']?>
                        </a>
                    <?php endif; ?>
                    <?php if ($contacts_modal): ?>
                        <a href="<?=get_field('action_contact_button')['url']?>"
                            class="xln-button xln-button--opacity">
                                <?=get_field('action_contact_button')['title']?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

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

    <section class="xln-certificates">
        <div class="xln-container">
            <h2 class="xln-certificates__title">
                <?=get_field('certificates_title')?>
            </h2>

            <?php $certificates = get_field('certificates');
            if($certificates): ?>
                <ul class="xln-certificates__list">
                    <?php foreach($certificates as $certificate): ?>
                        <div class="xln-certificates__item">
                            <img src="<?=esc_url($certificate['url'])?>" 
                                title="<?=esc_attr($certificate['title'])?>" 
                                alt="<?=esc_attr($certificate['alt'])?>">
                        </div>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>
    
    <section class="xln-news">
        <div class="xln-container">
            <h2 class="xln-news__title">
                News
            </h2>
            <div class="xln-news__tags">
                <?php $news_tags = get_field('news_tags'); ?>
                <?php foreach ($news_tags as $news_tag):
                    $tag = get_tag($news_tag); ?>
                    <button class="xln-news__tag <?php echo $news_tags[0] == $news_tag ? 'xln-active' : '' ?>"
                            data-cat="<?php echo $news_tag; ?>">
                        <?php echo $tag->name; ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="xln-news__content">
                <?php $args = array(
                    'posts_per_page' => 3,
                    'post_type'      => 'post',
                    'tag__in'        => $news_tags[0],
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()):
                    while ($query->have_posts()) :
                        $query->the_post(); ?>
                        <div class="xln-news-item">
                            <div class="xln-news-item__wrapper">
                                <div class="xln-news-item__main">
                                    <a href="<?php the_permalink(); ?>" class="xln-news-item__img-wrapper">
                                        <?php the_post_thumbnail('large', array('class' => 'xln-news-item__img')); ?>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="xln-news-item__title">
                                        <?php the_title(); ?>
                                    </a>
                                    <div class="xln-news-item__text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                <div class="xln-news-item__info">
                                    <div class="xln-news-item__info-item">
                                        <?php the_author(); ?>
                                    </div>
                                    <div class="xln-news-item__info-item">
                                        <?php the_date('D, d M'); ?>
                                    </div>
                                    <div class="xln-news-item__info-item">
                                        <?php echo estimated_reading_time(get_the_content()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
            <div class="xln-news__pagination xln-pagination">
                <?php custom_pagination_for_ajax($query->max_num_pages, 1); ?>
            </div>
            <?php wp_reset_postdata();
            $news_link = get_field('news_link');
            if ($news_link):
                $link_url = $news_link['url'];
                $link_title  = $news_link['title'];
                $link_target = $news_link['target'] ? $link['target'] : '_self';
                ?>
                <div class="xln-news__footer">
                    <a href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"
                    class="xln-news__button xln-button xln-button--big">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

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
</div>

<?php get_footer(); ?>
