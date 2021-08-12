<div class="success-stories">
  <div class="like-header">Success Stories</div>
  <div class="container">
    <div class="filtering filter-post">
      <div class="filter-line">
        <div class="filter-line">
          <ul class="filter">
            <li><div class="filter-link filter-active ">All</div></li>
            <?php
            $tax = 'category';
            $args = array(
                'taxonomy' => $tax,
                'hide_empty' => -1,
                'exclude' => array(277, 278, 215, 49, 1)
            );
            $terms = get_terms( $args );
            foreach ($terms as $term): ?>
              <li><div class="filter-link" data-service-id="<?php echo $term->term_id?>"><?php echo $term->name;?></div></li>
            <?php endforeach;?>

          </ul>
        </div>
      </div>
    </div>
    <?php $cp_slider_btn = get_field('cp_slider_btn', 'option');?>
    <?php
    $args = array(
        'post_type' => 'post',
        'cat' => '216, 282, 279, 283, 280, 281, 284, 221, 219, 286, 287, 285, 220, 222',
    );
    $projects = new WP_Query($args);
    if($projects->have_posts()) : ?>
    <div id="ajax-projects">
      <div class="cp-slider">
          <?php while($projects->have_posts()): $projects->the_post();?>
            <?php
            $thumbnail_img = get_post_thumbnail_id( $post->ID );
            $square = get_field('square_image', $post->ID);
            $toShow = $square ? $square : $thumbnail_img;
            $story_rating = get_field('story_rating', $post->ID);
            ?>
            <div class="cp-wrap">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                    <div class="cp-item">
                        <div class="figure-wrap">
                            <figure style="background: url(<?php echo wp_get_attachment_image_url($toShow, array(590, 440), false) ?>) no-repeat center / cover;"><div class="shadow"></div></figure>
                            <div class="fw-row">
                                <div class="fw-row-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 469.333 469.333" width="48" height="48"><path d="M234.667 170.667c-35.307 0-64 28.693-64 64s28.693 64 64 64 64-28.693 64-64-28.694-64-64-64z"/><path d="M234.667 74.667C128 74.667 36.907 141.013 0 234.667c36.907 93.653 128 160 234.667 160 106.773 0 197.76-66.347 234.667-160-36.907-93.654-127.894-160-234.667-160zm0 266.666c-58.88 0-106.667-47.787-106.667-106.667S175.787 128 234.667 128s106.667 47.787 106.667 106.667-47.787 106.666-106.667 106.666z"/></svg>
                                    <p><?php echo (int) get_post_meta(get_the_ID(), 'post_views_count', true) . ' reads';?></p>
                                </div>
                                <div class="fw-row-item">
                                    <p><?php echo $story_rating ?></p>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 0 448.941 448.941" width="48"><path d="M448.941 168.353H287.603L224.471 0l-63.132 168.353H0l121.478 106.293-65.36 174.295 168.353-84.176 168.353 84.176-65.361-174.296z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="cp-row">
                            <p><?php the_title(); ?></p>
                            <a href="<?php the_permalink() ?>" class="btn-read"><?php echo $cp_slider_btn; ?></a>
                        </div>
                    </div>
                </a>
            </div>
          <?php endwhile;?>
      </div>
    </div>
      <?php wp_reset_postdata();
    endif;?>

  </div>
</div>