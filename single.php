<?php
get_header ();
$blog = get_field('blog', 'option'); 
$author = $post->post_author; 
$author_url = get_author_posts_url($author);
$author_name = get_the_author_meta('display_name', $author);
$author_post = get_field('business_position', 'user_'.$author);
$author_img = get_field('profile_img', 'user_'.$author); ?>

<div class="xln-page">
    <div class="xln-single-post">
        <div class="xln-container">
            <ul class="breadcrumbs">
                <li><a href="<?=home_url( '/blog' )?>">
                    <span>Xelon</span> Blog</a>
                </li>
                <div class="breadcrumbs__sep"></div>
                <li><?php the_title();?></li>
            </ul>

            <div class="xln-single-header">
                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id( $post->ID ), 'full', false) ?>" alt=""
                    class="xln-single-header__bg">
                <div class="xln-single-header__content">
                    <h1 class="xln-single-header__title">
                        <?php the_title();?>
                    </h1>
                </div>
            </div>

            <div class="xln-single-container">
                <div class="xln-single-main">
                    <div class="xln-single-author-bar">
                        <div class="xln-single-author-bar__item">
                            Author:
                            <a href="<?= $author_url; ?>">
                                <?= $author_name; ?>
                            </a>
                        </div>

                        <div class="xln-single-author-bar__item">
                            Category:
                            <span class="xln-single-author-bar__cats">
                                <?php if ($tags = get_the_tags()): ?>
                                    <?php foreach ($tags as $tag): ?>
                                        <a href="<?php echo get_category_link($tag->term_id)?>">
                                            <?= $tag->name; ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="xln-single-author-bar__item">
                            <?php echo get_the_date('F d, Y'); ?>
                        </div>
                    </div>

                    <div class="xln-single-content content">
                        <?php if(have_posts()): 
                            while(have_posts()):  
                                the_post();
                                $content = the_content();
                                echo wpautop($content);
                            endwhile;
                        endif; ?>
                    </div>

                    <div class="xln-single-author">
                        <?php if($author_img): ?>
                            <div class="xln-single-author__photo">
                                <img src="<?= wp_get_attachment_image_url($author_img, 'full', true); ?>" 
                                    alt="<?= $author_name; ?>">
                            </div>
                        <?php endif; ?>
                        <div class="xln-single-author__info">
                            <div class="xln-single-author__name">
                                <?= $author_name; ?>
                            </div>
                            <div class="xln-single-author__post">
                                <?= $author_post; ?>
                            </div>
                        </div>
                        <a href="<?= $author_url; ?>" class="xln-single-author__link">
                            All posts by <?= $author_name; ?>
                            <svg width="14" height="14">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="xln-single-aside">
                    <div class="xln-single-share">
                        <div class="xln-single-share__title">
                            Feel free to Share:
                        </div>
                        <div class="xln-single-share__list" id="share"></div>
                    </div>
                </div>
            </div>
        </div>
            
        <?php include 'template-parts/subscribe-form.php' ?>
    </div>

    <?php $related_posts = get_field('related_posts');
        if( $related_posts ): ?>
        <section class="xln-news xln-featured-news">
            <div class="xln-news__container xln-container">
                <h2 class="xln-news__title">
                    <?= $blog['related_posts']['title']; ?>
                </h2>
                <div class="xln-news__content">
                    <?php foreach( $related_posts as $post ):
                        setup_postdata($post); 
                        get_template_part('template-parts/blog-archive-single');
                    endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer (); ?>
