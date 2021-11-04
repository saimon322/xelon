<?php
/**
 * Template Name: Front page old
 */

get_header(); ?>

<div class="xln-page">
    <section class="xln-banner">
        <div class="xln-container">
            <div class="xln-banner__wrapper">
                <div class="xln-banner__content">
                    <div class="xln-banner__main">
                        <h1 class="xln-banner__title">
                            <?php the_field('s1_h1'); ?>
                        </h1>
                        <div class="xln-banner__text">
                            <?php the_field('s1_text'); ?>
                        </div>
                        <?php
                        $images = get_field('s1_banner__imgs');
                        if ($images): ?>
                            <div class="xln-banner__imgs">
                                <?php foreach ($images as $image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>"
                                        class="xln-banner__attestat">
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="xln-banner-form">
                        <?php $banner_form = get_field('s1_form');
                        $headline = $banner_form['headline'];
                        $button = $banner_form['button'] ? $banner_form['button'] : 'Senden';
                        if ($headline):?>
                            <div class="xln-banner-form__title">
                                <?php echo $headline; ?>
                            </div>
                        <?php endif; ?>
                        <form action="#" class="xln-banner-form__form">
                            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                            <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                            <div class="form-block">
                                <input type="email" name="email" placeholder="Email*" class="form-input">
                                <label class="form-label">Email*</label>
                                <div class="msg"></div>
                            </div>
                            <div class="xln-banner-form__footer">
                                <input type="submit" class="xln-button xln-button--green send-subscribe" value="<?php echo $button; ?>">
                                <div class="signups-title">
                                    <span><?php echo $banner_form['signups_label']; ?></span>
                                </div>
                                <?php echo do_shortcode('[signups]'); ?>
                            </div>
                        </form>
                    </div>
                    <?php $button_mobile = $banner_form['button_mobile'];
                    if ($button_mobile): ?>
                        <a href="<?php echo $button_mobile['url']; ?>"
                        class="xln-banner__button xln-button xln-button--white"
                        target="<?php echo $button_mobile['target'] ? $button_mobile['target'] : '_self';?>">
                            <?php echo $button_mobile['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="xln-banner__media">
                    <?php
                    $s1_anim_mobile = get_field('s1_anim_mobile');
                    $s1_anim_desktop = get_field('s1_anim_desktop');
                    if ($s1_anim_mobile): ?>
                        <img src="<?php echo $s1_anim_mobile; ?>" 
                            class="xln-banner__anim xln-banner__anim--mobile">
                    <?php endif;
                    if ($s1_anim_desktop): ?>
                        <img src="<?php echo $s1_anim_desktop; ?>" 
                            class="xln-banner__anim xln-banner__anim--desktop">
                    <?php endif; ?>
                </div>
            </div>
    </section><!-- /.xln-banner -->
    
    <section class="xln-customers">
        <div class="xln-container">
            <?php $s2_headline = get_field('s2_headline');
            if ($s2_headline): ?>
                <h2 class="xln-customers__title">
                    <?php echo $s2_headline; ?>
                </h2>
            <?php endif; ?>
            <div class="xln-customers__content">
                <div class="xln-customers__slider-arrows xln-slider-arrows">
                    <button type="button"
                            class="xln-slider-arrow xln-slider-arrow--prev xln-customers__slider--prev">
                        <svg width='30px'
                            height='30px'>
                            <use xlink:href='#arrow-left'></use>
                        </svg>
                    </button>
                    <button type="button"
                            class="xln-slider-arrow xln-slider-arrow--next xln-customers__slider--next">
                        <svg width='30px'
                            height='30px'>
                            <use xlink:href='#arrow-right'></use>
                        </svg>
                    </button>
                </div>
                <div class="xln-customers__slider-wrapper">
                    <div class="xln-customers__slider">
                        <div class="xln-customers__slider-items">
                            <?php $s2_logos = get_field('s2_logos');
                            if ($s2_logos):
                                $logos_counter = 0;
                                foreach ($s2_logos as $logo): ?>
                                    <?php echo ($logos_counter % 2 == 0) && ($logos_counter != 0) ? '</div><div class="xln-customers__slider-items">' : ''; ?>
                                    <div class="xln-customers__slider-item">
                                        <img src="<?php echo $logo['gray_logo']['url']; ?>"
                                            alt="<?php echo $logo['origin_logo']['alt']; ?>"
                                            class="xln-customers__logo">
                                        <img src="<?php echo $logo['origin_logo']['url']; ?>"
                                            alt="<?php echo $logo['origin_logo']['alt']; ?>"
                                            class="xln-customers__logo">
                                    </div>
                                    <?php $logos_counter++;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="xln-slider-nav xln-customers__slider-nav">
            <button class="xln-slider-nav-dot"></button>
            <button class="xln-slider-nav-dot"></button>
            <button class="xln-slider-nav-dot"></button>
            <button class="xln-slider-nav-dot"></button>
            <button class="xln-slider-nav-dot"></button>
            <button class="xln-slider-nav-dot"></button>
            <button class="xln-slider-nav-dot"></button>
        </nav>
    </section><!-- /.xln-customers -->
    
    <section class="xln-about">
        <div class="xln-container">
            <div class="xln-about__titles">
                <?php $s3_subtitle = get_field('s3_subtitle');
                if ($s3_subtitle): ?>
                    <h3 class="xln-about__subtitle">
                        <?php echo $s3_subtitle; ?>
                    </h3>
                <?php endif;
                $s3_title = get_field('s3_title');
                if ($s3_title): ?>
                    <h2 class="xln-about__title">
                        <?php echo $s3_title; ?>
                    </h2>
                <?php endif; ?>
            </div>
            <div class="xln-about__content">
                <div class="xln-about__items xln-about-items">
                    <?php $s3_advantages = get_field('s3_advantages');
                    if ($s3_advantages):
                        foreach ($s3_advantages as $advantage): ?>
                            <div class="xln-about-item">
                                <div class="xln-about-item__icon">
                                    <img src="<?php echo $advantage['image']['url']; ?>"
                                        alt="<?php echo $advantage['image']['alt']; ?>"
                                        width='48px'
                                        height='48px'/>
                                </div>
                                <?php if ($advantage['title']): ?>
                                    <h3 class="xln-about-item__title">
                                        <?php echo $advantage['title']; ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ($advantage['text']): ?>
                                    <p class="xln-about-item__text">
                                        <?php echo $advantage['text']; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
                <div class="xln-content-box xln-about__content-box">
                    <?php $s3_baner = get_field('s3_baner');
                    if ($s3_baner): ?>
                        <div class="xln-content-box__text">
                            <?php echo $s3_baner; ?>
                        </div>
                    <?php endif; ?>
                    <?php $s3_button = get_field('s3_button');
                    if ($s3_button): ?>
                        <a href="#modal-signup"
                        class="xln-button xln-button--big xln-button--white ">
                            <?php the_field('s3_button'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!-- /.xln-about -->
    
    <section class="xln-platform">
        <div class="xln-container">
            <?php $s4_headline = get_field('s4_headline');
            if ($s4_headline): ?>
                <h2 class="xln-platform__title">
                    <?php echo $s4_headline ?>
                </h2>
            <?php endif; ?>
            <div class="xln-platform__content"
                data-tab-parent>
                <div class="xln-platform__schemes">
                    <?php $s4_schemes = get_field('s4_schemes');
                    if ($s4_schemes):
                        $s4_svg_desktop = $s4_schemes['svg_desktop'];
                        if ($s4_svg_desktop):
                            echo $s4_svg_desktop;
                        endif;
                        $s4_svg_mobile = $s4_schemes['svg_mobile'];
                        if ($s4_svg_mobile):
                            echo $s4_svg_mobile;
                        endif;
                    endif; ?>
                </div>
                <div class="xln-platform__items">
                    <?php $s4_platform = get_field('s4_platform');
                    if ($s4_platform):
                        foreach ($s4_platform as $key => $platform):
                            if (empty($key)) {
                                continue;
                            }
                            $headline = $platform['headline'];
                            $text     = $platform['text'];
                            $link     = $platform['inline_link'];
                            $button   = $platform['button'];
                            ?>
                            <div class="xln-platform-el"
                                data-tab-content="<?php echo $key; ?>">
                                <div class="xln-platform-el__header">
                                    <svg width="60"
                                        height="60"
                                        class="xln-platform-el__icon">
                                        <use xlink:href="#platform-<?php echo $key; ?>"></use>
                                    </svg>
                                    <?php if ($headline): ?>
                                        <h4 class="xln-platform-el__title">
                                            <?php echo $headline; ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="xln-platform-el__content">
                                    <?php if ($text): ?>
                                        <div class="xln-platform-el__text">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>"
                                        class="xln-platform-el__link link-arrow">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if ($button): ?>
                                    <a href="#modal-signup"
                                    class="xln-platform-el__button xln-button ">
                                        <?php echo $button; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </section><!-- /.xln-platform -->
    
    <section class="xln-tools">
        <div class="xln-container">
            <?php $s5_headline = get_field('s5_headline');
            if ($s5_headline): ?>
                <div class="xln-content">
                    <h2 class="xln-tools__title xln-content__title">
                        <?php echo $s5_headline ?>
                        <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/icon/rocket.svg" alt="">
                    </h2>
                </div>
            <?php endif; ?>
            <div class="xln-tools__content">
                <?php $s5_tools = get_field('s5_tools');
                if ($s5_tools):
                    foreach ($s5_tools as $tool): ?>
                        <div class="xln-tool">
                            <?php if ($tool['headline']): ?>
                                <img src="<?php echo $tool['image']['url']; ?>"
                                    alt="<?php echo $tool['image']['alt']; ?>"
                                    class="xln-tool__icon">
                            <?php endif; ?>
                            <div class="xln-tool__content">
                                <?php if ($tool['headline']): ?>
                                    <h4 class="xln-tool__title">
                                        <?php echo $tool['headline']; ?>
                                    </h4>
                                <?php endif; ?>
                                <?php if ($tool['text']): ?>
                                    <p class="xln-tool__text">
                                        <?php echo $tool['text']; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section><!-- /.xln-tools -->
    
    <section class="xln-service">
        <div class="xln-container">
            <div class="xln-service__mobile-title">
                <?php $s6_headline = get_field('s6_headline');
                if ($s6_headline): ?>
                    <h2>
                        <?php echo $s6_headline ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <?php $s6_services = get_field('s6_services');
        if ($s6_services): ?>
            <div class="xln-service__wrapper"
                data-tab-parent>
                <div class="xln-service__content">
                    <?php foreach ($s6_services as $service): ?>
                        <div class="xln-service__content-item"
                            data-tab-content="<?php echo strtolower($service['headline']); ?>">
                            <div class="xln-service__img-wrapper">
                                <?php if ($service['background']): ?>
                                    <img src="<?php echo $service['background']['url']; ?>"
                                        alt="<?php echo $service['background']['alt']; ?>"
                                        class="xln-service__img">
                                <?php endif; ?>
                            </div>
                            <div class="xln-service__comment-block"
                                data-position="<?php echo $service['positioning']; ?>">
                                <?php if ($service['text']): ?>
                                    <p class="xln-service__comment-text">
                                        <?php echo $service['text']; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ($service['has_author']): ?>
                                    <div class="xln-service__comment-info">
                                        <div class="xln-service__comment-info-text">
                                            <?php if ($service['name']): ?>
                                                <div class="xln-service__comment-extra">
                                                    <?php echo $service['name']; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($service['position']): ?>
                                                <div class="xln-service__comment-extra">
                                                    <?php echo $service['position']; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($service['logo']): ?>
                                            <img src="<?php echo $service['logo']['url']; ?>"
                                                alt="<?php echo $service['logo']['alt']; ?>"
                                                class="xln-service__company-logo">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="xln-service__main">
                    <div class="xln-service__main-wrapper">
                        <div class="xln-service__main-title">
                            <?php if ($s6_headline): ?>
                                <h2>
                                    <?php echo $s6_headline ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                        <div class="xln-service__selectors">
                            <?php foreach ($s6_services as $service): ?>
                                <div class="xln-service__button-wrapper">
                                    <button type="button"
                                            class="xln-service__button"
                                            data-tab-selector="<?php echo strtolower($service['headline']); ?>">
                                        <?php echo $service['headline']; ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="xln-service__slider-nav xln-slider-nav">
                            <button class="xln-slider-nav-dot"></button>
                            <button class="xln-slider-nav-dot"></button>
                            <button class="xln-slider-nav-dot"></button>
                            <button class="xln-slider-nav-dot"></button>
                            <button class="xln-slider-nav-dot"></button>
                            <button class="xln-slider-nav-dot"></button>
                        </div>
                        <?php $s6_button = get_field('s6_button');
                        if ($s6_button): ?>
                            <a href="#modal-signup"
                            class="xln-service__sign-up xln-button xln-button--big ">
                                <?php echo $s6_button ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section><!-- /.xln-service -->
    
    <section class="xln-offer">
        <div class="xln-container">
            <div class="xln-offer__wrapper">
                <div class="xln-offer-item__logo-wrapper">
                    <?php $s7_logo = get_field('s7_logo');
                    if ($s7_logo): ?>
                        <img src="<?php echo $s7_logo['url']; ?>"
                            alt="<?php echo $s7_logo['alt']; ?>">
                    <?php endif; ?>
                </div>
                <div class="xln-offer__slider">
                    <?php $s7_offer = get_field('s7_offer');
                    if ($s7_offer):
                        foreach ($s7_offer as $offer):
                            $headline = $offer['headline'];
                            $text   = $offer['text'];
                            $link   = $offer['link'];
                            ?>
                            <div class="xln-offer-item">
                                <div class="xln-offer-item__content">
                                    <?php if ($headline): ?>
                                        <h2 class="xln-offer-item__title">
                                            <?php echo $headline; ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if ($text): ?>
                                        <div class="xln-offer-item__text">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>"
                                        class="xln-platform-el__link link-arrow">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
                <div class="xln-offer__slider-nav xln-slider-nav">
                    <button class="xln-slider-nav-dot"></button>
                    <button class="xln-slider-nav-dot"></button>
                    <button class="xln-slider-nav-dot"></button>
                    <button class="xln-slider-nav-dot"></button>
                </div>
            </div>
            <div class="xln-offer-stat">
                <?php $s7_statistic_title = get_field('s7_statistic_title');
                if ($s7_statistic_title): ?>
                    <h2 class="xln-offer-stat__title">
                        <?php echo $s7_statistic_title; ?>
                    </h2>
                <?php endif; ?>
                <div class="xln-offer-stat__stats">
                    <?php $s7_statistic = get_field('s7_statistic');
                    if ($s7_statistic):
                        foreach ($s7_statistic as $stat):
                            $title = $stat['title'];
                            $number     = $stat['number'];
                            $plus       = $stat['plus'] ? '+' : '';
                            ?>
                            <div class="xln-offer-stat__item">
                                <div class="xln-offer-stat__number">
                                    <span><?php echo $number; ?></span>
                                    <?php echo $plus; ?>
                                </div>
                                <p class="xln-offer-stat__text">
                                    <?php echo $title; ?>
                                </p>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </section><!-- /.xln-offer -->
    
    <?php $news_tags = get_field('news_tags');
    if ($news_tags): ?>
        <section class="xln-news">
            <div class="xln-container">
                <h2 class="xln-news__title">
                    News
                </h2>
                <div class="xln-news__tags">
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
                                        <a href="<?php the_permalink(); ?>"
                                        class="xln-news-item__img-wrapper">
                                            <?php the_post_thumbnail('large', array('class' => 'xln-news-item__img')); ?>
                                        </a>
                                        <?php $tags = wp_get_post_tags(get_the_ID(), array('fields' => 'all'));
                                        if ( ! empty($tags)): ?>
                                            <div class="xln-news-item__tags">
                                                <?php foreach ($tags as $tag): ?>
                                                    <a href="<?php echo get_category_link($tag->term_id); ?>"
                                                    class="xln-news-item__tag">
                                                        <?php echo $tag->name; ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?php the_permalink(); ?>"
                                        class="xln-news-item__title">
                                            <?php the_title(); ?>
                                        </a>
                                        <p class="xln-news-item__text">
                                            <?php the_excerpt(); ?>
                                        </p>
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
                $news_link         = get_field('news_link');
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
        </section><!-- /.xln-news -->
    <?php endif; ?>
</div>

<?php get_footer(); ?>
