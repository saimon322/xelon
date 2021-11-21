<?php
global $wp_query;
$term        = get_queried_object();
$paged       = ($match_page[1]) ? $match_page[1] : 1;
$url_current = SITE_PROTOCOL . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
get_header(); ?>
<div class="xln-page">
    <section class="xln-news">
        <div class="xln-news__container xln-container">
            <div class="xln-news__content">
                <?php
                $args = array(
                    'paged'          => $paged,
                    'cat'            => $wp_query->queried_object->term_id,
                    'post_type'      => 'post',
                    'posts_per_page' => -1
                );
                
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        get_template_part('template-parts/blog-archive-single');
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section><!-- /.xln-news -->
</div>
<?php get_footer(); ?>


