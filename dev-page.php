<?php
/**
* Template Name: Dev
*/
get_header();
?>
<div class="white-block white-projects">        
	<div class="wrapper filter-line">
        <div class="wrapper filter-line">
            <ul class="filter" style="display: flex;">
                <li style="margin: 0 10px; display: inline-block;"><a href="#">All</a></li>
                <?php
                $tax = 'general';
                $args = array(
                    'taxonomy' => $tax,
                    'hide_empty' => false,
                );
                $terms = get_terms( $args );
                foreach ($terms as $term): ?>
                    <li style="margin: 0 10px; display: inline-block;"><a href="#" data-service-id="<?php echo $term->term_id?>"><?php echo $term->name;?></a></li>
                <?php endforeach;?>
 
            </ul>
        </div>
    </div>
<?php
$args = array(
    'post_type' => 'post',
);
$projects = new WP_Query($args);
$max_pages = $projects->max_num_pages;
if($projects->have_posts()) : ?>
    <div class="projects" id="ajax-portfolio-container">
        <div class="project-block" >
            <?php while($projects->have_posts()): $projects->the_post();?>
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail('project-thumb')?>
                    <p class="title-events big-text"><?php the_title();?></p>
                </a>
            <?php endwhile;?>
        </div>
        <?php
        if($max_pages > 1){ ?> 
            <a id="load-more-events" href="#" class="btn btn-orange" data-page="2">Load More</a> 
        <?php }?>
    </div>
 
    <?php wp_reset_postdata();
endif;?>

<?php get_footer(); ?>