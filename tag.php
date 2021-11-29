<?php 
$term = get_queried_object();
$paged = ( $match_page[1] ) ? $match_page[1] : 1;
$url_current = SITE_PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
get_header (); ?>

<div class="xln-page">
    <div class="xln-single-tag">
        <section class="blog-header">
            <div class="xln-container">
                <h1 class="blog-header__title">
                    <?php echo single_cat_title(); ?>
                </h1>
            </div>
        </section>
        <section class="xln-news">
            <div class="xln-news__container xln-container">
                <div class="xln-news__content">
                    <?php
                    $args = array(
                        'paged' => $paged,
                        'tag_id' => $wp_query->queried_object->term_id,
                        'post_type' => 'post',
                        'posts_per_page' => -1
                    );

                    $query = new WP_Query($args);
                    if($query->have_posts()) :
                        while($query->have_posts()) :
                            $query->the_post();
                            get_template_part('template-parts/blog-archive-single');
                        endwhile;
                        wp_reset_query();
                    endif;
                    ?>	
                </div>
            </div>
        </section>
                
        <?php include 'template-parts/subscribe-form.php' ?>
    </div>
</div>
<?php get_footer (); ?>