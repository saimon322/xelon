<section class="xln-news">
    <div class="xln-container">
        <h2 class="xln-news__title">
            <?= get_field('news_title'); ?>
        </h2>
        <div class="xln-news__content">
            <?php $args = array(
                'posts_per_page' => 3,
                'cat'            => 278,
                'post_type'      => 'post',
                'post_status'=>'publish'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()) :
                    $query->the_post();
                    get_template_part('template-parts/blog-archive-single');
                endwhile;
            endif; ?>
        </div>
        <div class="xln-news__pagination xln-pagination">
            <?php custom_pagination_for_ajax($query->max_num_pages, 1); ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <div class="xln-news__footer">
            <a href="/category/blog/" class="xln-news__button xln-button xln-button--big">
                <?= get_field('news_link'); ?>
            </a>
        </div>
    </div>
</section>