<div class="xln-news-item">
    <a href="<?php the_permalink(); ?>" class="xln-news-item__img-wrapper">
        <?php $thumbnail_img = get_post_thumbnail_id( $post->ID );
            $square = get_field('square_image', $post->ID);
            $toShow = $square ? $square : $thumbnail_img; ?>
        <img src="<?= wp_get_attachment_image_url($toShow, array(590, 440), false) ?>" alt=""
            class="xln-news-item__img">
    </a>
    <div class="xln-news-item__content">
        <div class="xln-news-item__tags">
            <?php $tags = wp_get_post_tags(get_the_ID(), array('fields' => 'all'));
            if ( ! empty($tags)): ?>
                <?php foreach ($tags as $tag):?>
                    <a href="<?php echo get_category_link($tag->term_id); ?>"
                        class="xln-news-item__tag">
                        <?php echo $tag->name; ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="xln-news-item__title">
            <?php the_title(); ?>
        </a>
        <div class="xln-news-item__text">
            <?php the_excerpt(); ?>
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