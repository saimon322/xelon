<?php
global $wp_query;
get_header(); ?>
<div class="xln-page">
    <div class="blog-header">
        <div class="xln-container">
            <h1 class="blog-header__title">
                Welcome to <span>Xelon</span> Blog
            </h1>
        </div>
    </div>
    <section class="xln-news xln-featured-news">
        <div class="xln-featured-news__container xln-container">
            <h2 class="xln-news__title">
                Featured posts
            </h2>
            <div class="xln-news__content">
                <div class="xln-news-item">
                    <a href="#" class="xln-news-item__img-wrapper">
                        <img src="img/base/news-1.jpg" alt="news" class="xln-news-item__img">
                    </a>
                    <div class="xln-news-item__content">
                        <div class="xln-news-item__tags">
                            <a href="#" class="xln-news-item__tag">
                                Tech
                            </a>
                            <a href="#" class="xln-news-item__tag">
                                Blog
                            </a>
                            <a href="#" class="xln-news-item__tag">
                                HQ Updates
                            </a>
                        </div>
                        <a href="#" class="xln-news-item__title">
                            In 2021, be prepared for perfidious cyber attacks such as ransomware
                        </a>
                        <p class="xln-news-item__text">
                            We’ll be presenting the 2020 Benefits plans at the All Hands next week. All individuals responsible for text overflow
                        </p>
                        <div class="xln-news-item__info">
                            <div class="xln-news-item__info-item">
                                Michael Dudli
                            </div>
                            <div class="xln-news-item__info-item">
                                Tue, 06 Apr
                            </div>
                            <div class="xln-news-item__info-item">
                                2 mins read
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xln-news-item">
                    <a href="#" class="xln-news-item__img-wrapper">
                        <img src="img/base/news-2.jpg" alt="news" class="xln-news-item__img">
                    </a>
                    <div class="xln-news-item__content">
                        <div class="xln-news-item__tags">
                            <a href="#" class="xln-news-item__tag">
                                Tech
                            </a>
                            <a href="#" class="xln-news-item__tag">
                                Blog
                            </a>
                            <a href="#" class="xln-news-item__tag">
                                HQ Updates
                            </a>
                        </div>
                        <a href="#" class="xln-news-item__title">
                            The myth of too little bandwidth - what internet speed does the cloud need?
                        </a>
                        <p class="xln-news-item__text">
                            Great work facilitating the sync today. I took some notes to keep track of all action items. Feel free text overflow
                        </p>
                        <div class="xln-news-item__info">
                            <div class="xln-news-item__info-item">
                                Michael Dudli
                            </div>
                            <div class="xln-news-item__info-item">
                                Tue, 06 Apr
                            </div>
                            <div class="xln-news-item__info-item">
                                2 mins read
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xln-news-item">
                    <a href="#" class="xln-news-item__img-wrapper">
                        <img src="img/base/news-3.jpg" alt="news" class="xln-news-item__img">
                    </a>
                    <div class="xln-news-item__content">
                        <div class="xln-news-item__tags">
                            <a href="#" class="xln-news-item__tag">
                                Tech
                            </a>
                            <a href="#" class="xln-news-item__tag">
                                Blog
                            </a>
                            <a href="#" class="xln-news-item__tag">
                                HQ Updates
                            </a>
                        </div>
                        <a href="#" class="xln-news-item__title">
                            A guide to cloud migration in SMEs - why and how cloud migration works
                        </a>
                        <p class="xln-news-item__text">
                            Bummer I had to miss your presentation! I just got a chance to step out of our leadership mind-meld text overflow
                        </p>
                        <div class="xln-news-item__info">
                            <div class="xln-news-item__info-item">
                                Michael Dudli
                            </div>
                            <div class="xln-news-item__info-item">
                                Tue, 06 Apr
                            </div>
                            <div class="xln-news-item__info-item">
                                2 mins read
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.xln-news -->
    <section class="xln-info-block half-bg">
        <div class="xln-container">
            <div class="xln-info-block__wrapper">
                <div class="xln-info-block__main">
                    <h3 class="xln-info-block__title">
                        Subscribe to our monthly newsletter now!
                    </h3>
                    <div class="xln-info-block__text">
                        Stay up to date! We will inform you whenever we publish<br> a new post from the Xelon, It or Business world
                    </div>
                </div>
                <div class="xln-info-block__form">
                    <div class="email-form">
                        <div class="form-block form-block--big  ">
                            <input type="email" name="email" placeholder="Email*" class="form-input">
                            <label class="form-label">Your Email</label>
                            <div class="msg"></div>
                        </div>
                        <input type="submit" class="xln-button xln-button--green" value="Send">
                    </div>
                    <div class="checkboks custom-sq">
                        <input type="checkbox" class="checked-checkbox" name="myCheckboxes" id="box10"
                               checked="checked" value="true">
                        <label for="box10" class="checkboks-text">
                            Ich stimme der Verarbeitung meiner personenbezogenen Daten zu und habe die
                            <a href="https://xelon.one-pix.com/data-protection/">Datenschutzerklärung</a>
                            gelesen und akzeptiere sie.
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="xln-news">
        <div class="xln-news__container xln-container">
            <div class="xln-news-search">
                <form action="<?= esc_url(home_url('/')); ?>" class="xln-news-search__form">
                    <input type="text" placeholder="Search Post" name="s" class="xln-news-search__input">
                    <button type="submit" class="xln-button xln-news-search__button">
                        <img src="img/icon/search.svg" alt="">
                    </button>
                </form>
            </div>
            <div class="xln-news__tags inline-scroll">
                <?php if ($categories = get_categories()): ?>
                    <div class="inline-scroll__content">
                        <?php foreach ($categories as $category): ?>
                            <button class="xln-news__tag <?= is_category($category->term_id) ? 'xln-active' : ''; ?>"
                                    data-cat="<?= $category->term_id; ?>">
                                <?= $category->name; ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="inline-scroll__arrows">
                    <button class="inline-scroll__arrow inline-scroll__arrow--prev">
                        <svg width='13px' height='22px'>
                            <use xlink:href='#arrow-left'></use>
                        </svg>
                    </button>
                    <button class="inline-scroll__arrow inline-scroll__arrow--next">
                        <svg width='13px' height='22px'>
                            <use xlink:href='#arrow-right'></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="xln-news__content">
                <?php if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/blog-archive-single');
                    endwhile;
                endif;
                ?>
            </div>
            <?php if ( ! empty($wp_query->max_num_pages)): ?>
                <div class="xln-news__pagination xln-pagination">
                    <?php custom_pagination_for_ajax($wp_query->max_num_pages, 1); ?>
                </div>
            <?php endif; ?>
            <div class="xln-news__footer">
                <a href="#" class="xln-news__button xln-button xln-button--big">Zum Xelon Blog</a>
            </div>
        </div>
    </section><!-- /.xln-news -->
</div>
<?php get_footer(); ?>


