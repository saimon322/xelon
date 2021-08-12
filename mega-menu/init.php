<?php

add_action('init', 'mega_menu_register_post_type');
function mega_menu_register_post_type()
{
    
    register_post_type('header_mega_menu', array(
        'labels'              => array(
            'name'              => 'Mega menu',
            'singular_name'     => 'Mega menu',
            'add_new'           => 'Add item',
            'add_new_item'      => 'Add item',
            'edit_item'         => 'Edit item',
            'new_item'          => 'New item',
            'parent_item_colon' => '',
            'menu_name'         => 'Mega menu'
        
        ),
        'public'              => true,
        'publicly_queryable'  => false,
        'show_in_nav_menus'   => false,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'show_in_menu'        => 'themes.php',
        'query_var'           => false,
        'rewrite'             => false,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor')
    ));
    
    require __DIR__ . '/mega-menu.php';
    
}

