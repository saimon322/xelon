<?php
get_header ();
$blog = get_field('blog', 'option'); ?>

<div class="xln-page">
    <div class="xln-single-post">
        <div class="xln-container">
            <ul class="breadcrumbs">
                <li><a href="<?=home_url( '/blog' )?>">Xelon Blog</a></li>
                <div class="breadcrumbs__sep">
                    <svg width='24px' height='24px'>
                        <use xlink:href='#arrow-back'></use>
                    </svg>
                </div>
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
                            <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                <?php the_author_meta('display_name', $post->post_author ); ?>
                            </a>
                        </div>

                        <div class="xln-single-author-bar__item">
                            Category:
                            <span class="xln-single-author-bar__cats">
                                <?php $category = get_the_category();
                                foreach ($category as $cat ) { ?>
                                    <a href="<?php echo get_category_link($cat->cat_ID)?>"><?php echo $cat->cat_name; ?></a>
                                <?php } ?>
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
                        <?php $author = $post->post_author; 
                            $author_name = get_the_author_meta('display_name', $author);
                            $author_post = get_field('business_position', 'user_'.$author); ?>
                        <div class="xln-single-author__photo">
                            <img src="img/base/review-author.jpg" alt="">
                        </div>
                        <div class="xln-single-author__info">
                            <div class="xln-single-author__name">
                                <?= $author_name; ?>
                            </div>
                            <div class="xln-single-author__post">
                                <?= $author_post; ?>
                            </div>
                        </div>
                        <a href="#" class="xln-single-author__link">
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

                    <div class="xln-single-banner">

                    </div>
                </div>
            </div>
            
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
                                <div class="form-block form-block--big">
                                    <input type="email" name="email" placeholder="<?= $subscribe_form['email_placeholder']; ?>" class="form-input">
                                    <label class="form-label"><?= $subscribe_form['email_placeholder']; ?></label>
                                </div>
                                <input type="submit" class="xln-button xln-button--green send-subscribe" value="<?= $subscribe_form['button']; ?>">
                                <div class="msg"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="xln-news xln-featured-news">
        <div class="xln-news__container xln-container">
            <h2 class="xln-news__title">
                <?= $blog['related_posts']['title']; ?>
            </h2>
            <div class="xln-news__content">
                <?php $featured_posts = $blog['related_posts']['posts']; 
                if( $featured_posts ):
                    foreach( $featured_posts as $post ):
                        setup_postdata($post); 
                        get_template_part('template-parts/blog-archive-single');
                    endforeach;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section><!-- /.xln-news -->

    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer (); ?>
