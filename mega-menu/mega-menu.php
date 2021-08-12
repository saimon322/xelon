<?php

function the_mega_menu()
{
    $menu = new WP_Query(array(
        'post_type'      => 'header_mega_menu',
        'posts_per_page' => -1,
    
    ));
    
    echo '<ul class="main-menu__list">';
    
    if ($menu->have_posts()) {
        while ($menu->have_posts()) {
            $menu->the_post();
            get_menu_layout();
        }
    }
    
    echo '</ul>';
    
    wp_reset_postdata();
}

function get_menu_layout()
{
    $layout   = get_field('select_layout');
    $layout_link   = get_field('layout_link');
    $empty_mobile   = get_field('empty_mobile');
    
    file_put_contents(__DIR__.'/log.txt', print_r($layout_link, true), FILE_APPEND);
    
    $filename = __DIR__ . '/templates/' . $layout . '.php';
    
    if (file_exists($filename)) {
        $variables = get_field($layout);
        include $filename;
    }
}

add_filter('acf/fields/flexible_content/layout_title/name=content_items', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title($title, $field, $layout, $i)
{
    if ($text = get_sub_field('text')) {
        $title .= ' - <b>' . esc_html($text) . '</b>';
    }
    
    if ($text = get_sub_field('title')) {
        $title .= ' - <b>' . esc_html($text) . '</b>';
    }
    
    return $title;
}

function the_excerpt_max_charlength($charlength, $post_id)
{
    $excerpt = get_the_excerpt($post_id);
    $charlength++;
    
    if (mb_strlen($excerpt) > $charlength) {
        $subex   = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut   = -(mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}