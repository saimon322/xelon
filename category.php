<?php
global $wp_query;
get_header();
$paged = ($wp_query->query_vars['paged']) ?? 1;
$blog  = get_field('blog', 'option'); ?>
<div class="xln-page">
    <div class="blog-header">
        <div class="xln-container">
            <h1 class="blog-header__title">
                <?= $blog['title']; ?>
            </h1>
        </div>
    </div>
    <section class="xln-news xln-featured-news">
        <div class="xln-news__container xln-container">
            <h2 class="xln-news__title">
                <?= $blog['featured_posts']['title']; ?>
            </h2>
            <div class="xln-news__content">
                <?php $featured_posts = $blog['featured_posts']['posts'];
                if ($featured_posts):
                    foreach ($featured_posts as $post):
                        setup_postdata($post);
                        get_template_part('template-parts/blog-archive-single');
                    endforeach;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section><!-- /.xln-news -->
    <?php $subscribe_form = $blog['subscribe_form']; ?>
    <section class="xln-info-block half-bg">
        <div class="xln-container">
            <div class="xln-info-block__wrapper">
                <div class="xln-info-block__main">
                    <h3 class="xln-info-block__title">
                        <?= $subscribe_form['title']; ?>
                    </h3>
                    <div class="xln-info-block__text">
                        <?= $subscribe_form['text']; ?>
                    </div>
                </div>
                <div class="xln-info-block__form">
                    <form action="#" class="email-form email-form--blue">
                        <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                        <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                        <div class="form-block form-block--big  ">
                            <input type="email" name="email" placeholder="<?= $subscribe_form['email_placeholder']; ?>" class="form-input">
                            <label class="form-label"><?= $subscribe_form['email_placeholder']; ?></label>
                        </div>
                        <input type="submit" class="xln-button xln-button--green send-subscribe" value="<?= $subscribe_form['button']; ?>">
                        <div class="msg"></div>
                    </form>
                    <div class="checkboks custom-sq">
                        <input type="checkbox" class="checked-checkbox" name="myCheckboxes" id="box10"
                               checked="checked" value="true">
                        <label for="box10" class="checkboks-text">
                            <?php echo replace_p(get_field('footer_checkbox_text', 'option')); ?>
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
                        <img src="<?= get_template_directory_uri(); ?>/xln-layout/dist/img/icon/search.svg" alt="">
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
                <?php $query = new WP_Query([
                    'paged'          => $paged,
                    'cat'            => $wp_query->queried_object->term_id,
                    'post_type'      => 'post',
                    'posts_per_page' => 9,
                ]);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/blog-archive-single');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <?php if ( ! empty($wp_query->max_num_pages)): ?>
                <div class="xln-news__pagination xln-pagination">
                    <?php custom_pagination_for_ajax($wp_query->max_num_pages, 1); ?>
                </div>
            <?php endif; ?>
        </div>
    </section><!-- /.xln-news -->
</div>
<?php get_footer(); ?>


