<div class="filtering filter-post">        
	<div class="filter-line">
        <div class="filter-line">
            <ul class="filter">
                <li><div class="filter-link filter-active">Alle</div></li>
                <?php
                $tax = 'category';
                $args = array(
                    'taxonomy' => $tax,
                    'hide_empty' => -1,
                    'include' => array(277, 278, 49),
                );
                $terms = get_terms( $args );
                foreach ($terms as $term): ?>
                    <li><div class="filter-link" data-service-id="<?php echo $term->term_id?>"><?php echo $term->name;?></div></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<?php
$args = array(
    'post_type' => 'post',
    'cat' => '277, 278, 49',
);
$projects = new WP_Query($args);
$max_pages = $projects->max_num_pages;
if($projects->have_posts()) : ?>
    <div class="projects" id="ajax-container">
        <div class="filter-item-block d-flex" >
            <?php while($projects->have_posts()): $projects->the_post();?>
                <?php gt_set_post_view(); ?>
                <?php 

                $template = 'page-solutions.php';

                if (is_page_template($template)) {?>
                    <?php include 'parts/filter-part.php' ?>    
                <?php } else { ?>
                    <?php include 'parts/filter-part.php' ?>
                <?php } ?>
            <?php endwhile;?>
        </div>
        <?php
        if( $max_pages > 1){ ?> 
            <div id="load-more-events" class="blue-btn load-more" data-page="2"><?php the_field('show_more_filter', 'option'); ?></div> 
        <?php }?>
    </div>
 
    <?php wp_reset_postdata();
endif;?>