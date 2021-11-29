<?php
global $wp_query;
get_header();
$paged = ($wp_query->query_vars['paged']) ?? 1;
$blog  = get_field('blog', 'option'); ?>
<div class="xln-page">
    <section class="blog-header">
        <div class="xln-container">
            <h1 class="blog-header__title">
                <?= $blog['title']; ?>
            </h1>
        </div>
    </section>
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
    <div class="half-bg">
        <?php include 'template-parts/subscribe-form.php' ?>
    </div>
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
                <?php if ($tags = get_tags()): ?>
                    <div class="inline-scroll__content">
                            <button class="xln-news__tag blog_cat <?= is_category(278) ? 'xln-active' : ''; ?>"
                                    data-cat="278">
                                Blog
                            </button>
                        <?php foreach ($tags as $tag): ?>
                            <button class="xln-news__tag blog_tag <?= is_tag($tag->term_id) ? 'xln-active' : ''; ?>"
                                    data-cat="<?= $tag->term_id; ?>">
                                <?= $tag->name; ?>
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
                    'post_status'=>'publish',
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


