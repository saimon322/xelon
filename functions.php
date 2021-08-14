<?php
define("TEMPLATE_URL", get_template_directory_uri());
define("SERVER_PATH_TEMPLATE", get_template_directory());
define("SITE_PROTOCOL", isset($_SERVER["HTTPS"]) ? 'https' : 'http');
//----------------------------------------------------------------CLEANUP HEADER---------------------------------------------------------------------//
//add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'dns-prefetch');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('template_redirect', 'wp_shortlink_header', 11);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_filter('template_redirect', 'redirect_canonical');

add_action('wp_default_scripts', function ($scripts) {
    if ( ! empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});
// Отключаем сам REST API
//add_filter('rest_enabled', '__return_false');
// Отключаем фильтры REST API
//remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
//remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
//remove_action('template_redirect', 'rest_output_link_header', 11, 0);
//remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
//remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
//remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
//remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
//remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
//remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);
// Отключаем события REST API
//remove_action('init', 'rest_api_init');
//remove_action('rest_api_init', 'rest_api_default_filters', 10, 1);
//remove_action('parse_request', 'rest_api_loaded');
// Отключаем Embeds связанные с REST API
//remove_action('rest_api_init', 'wp_oembed_register_route');
//remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);
// removes oembed discorvery link
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
// Remove emoji script & dns-prefetch link
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('emoji_svg_url', '__return_false');

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_theme_support('post-thumbnails');

add_image_size('filter-thumbnail', 320, 240, true);

function wpse_wpautop_nobr($content)
{
    return wpautop($content, false);
}

add_filter('the_content', 'wpse_wpautop_nobr');
add_filter('the_excerpt', 'wpse_wpautop_nobr');
// Add menu for admin panel
add_theme_support('menus');
add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'top_header_menu' => 'Top menu in header',
        'header_menu'     => 'Menu in header',
        'footer_menu'     => 'Menu in footer',
        'lang_switch'     => 'Language switcher',
        'lang_menu'       => 'Languages bar'
    ));
});

add_filter('excerpt_length', function () {
    return 40;
});

add_filter('excerpt_more', function ($more) {
    return '...';
});


// Theme Options
if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

// Color Picker
add_filter('nav_menu_link_attributes', 'add_menuclass', 10, 4);

function add_menuclass($atts, $item, $args, $depth)
{
    
    $color = get_field('menu_color', $item);
    
    if ($color) {
        if ($color[0] == 'red') {
            $colors = '#c32b4a';
        } elseif ($color[0] == 'green') {
            $colors = '#1fb3a7';
        } elseif ($color[0] == 'blueberry') {
            $colors = '#5f4388';
        }
        
        $atts['style'] = 'color: ' . $colors . '; font-weight: bold';
        $atts['class'] = 'element-' . $item->ID;
        
        echo '<style> 
            .element-' . $item->ID . ':after {
                color: ' . $colors . ' !important;
                content: "";
                position: absolute;
                height: 15px;
                left: 10px;
                border-left: 2px solid;
                width: 5px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
            } 
            </style>';
    }
    
    return $atts;
}

// Set columns to be used in the Pages section
function custom_set_pages_columns($columns)
{
    return array(
        'cb'      => '<input type="checkbox" />',
        'page_id' => __('ID'),
        'title'   => __('Title'),
        'author'  => __('Author'),
        'date'    => __('Date')
    );
}

// Add the ID to the page ID column
function custom_set_pages_columns_page_id($column, $post_id)
{
    if ($column == 'page_id') {
        echo $post_id;
    }
}

// Add custom styles to the page ID column
function custom_admin_styling()
{
    echo '<style type="text/css">',
    'th#page_id { width:60px; }',
    '</style>';
}

// Add filters and actions
add_filter('manage_edit-page_columns', 'custom_set_pages_columns');
add_action('manage_pages_custom_column', 'custom_set_pages_columns_page_id', 10, 2);
add_action('admin_head', 'custom_admin_styling');


// Show ID Category in Admin
foreach (get_taxonomies() as $taxonomy) {
    add_action("manage_edit-${taxonomy}_columns", 't5_add_col');
    add_filter("manage_edit-${taxonomy}_sortable_columns", 't5_add_col');
    add_filter("manage_${taxonomy}_custom_column", 't5_show_id', 10, 3);
}
add_action('admin_print_styles-edit-tags.php', 't5_tax_id_style');

function t5_add_col($columns)
{
    return $columns + array('tax_id' => 'ID');
}

function t5_show_id($v, $name, $id)
{
    return 'tax_id' === $name ? $id : $v;
}

function t5_tax_id_style()
{
    print '<style>#tax_id{width:4em}</style>';
}

// Create Taxonomy
// add_action( 'init', 'create_taxonomy' );
// function create_taxonomy(){

//     register_taxonomy( 'taxonomy', [ 'post' ], [
//         'label'                 => '',
//         'labels'                => [
//             'name'              => 'Taxonomy',
//             'singular_name'     => 'Taxonomy',
//             'search_items'      => 'Search Taxonomy',
//             'all_items'         => 'All Taxonomy',
//             'view_item '        => 'View Taxonomy',
//             'parent_item'       => 'Parent Taxonomy',
//             'parent_item_colon' => 'Parent Taxonomy:',
//             'edit_item'         => 'Edit Taxonomy',
//             'update_item'       => 'Update Taxonomy',
//             'add_new_item'      => 'Add New Taxonomy',
//             'new_item_name'     => 'New General Name',
//             'menu_name'         => 'General',
//         ],
//         'description'           => '',
//         'public'                => true,
//         'hierarchical'          => false,

//         'rewrite'               => true,
//         'capabilities'          => array(),
//         'meta_box_cb'           => null,
//         'show_admin_column'     => false,
//         'show_in_rest'          => null,
//         'rest_base'             => null,
//     ] );
// }

// View Post Count
function gt_get_post_view()
{
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    $view  = '<div class="view-icon"></div>';
    
    return "$count $view";
}

function gt_set_post_view()
{
    $key     = 'post_views_count';
    $post_id = get_the_ID();
    $count   = (int)get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}

function gt_posts_column_views($columns)
{
    $columns['post_views'] = 'Views';
    
    return $columns;
}

function gt_posts_custom_column_views($column)
{
    if ($column === 'post_views') {
        echo gt_get_post_view();
    }
}

add_filter('manage_posts_columns', 'gt_posts_column_views');
add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');

// Filter

function js_variables()
{
    $variables = array(
        'ajax_url' => admin_url('admin-ajax.php'),
    );
    echo '<script type="text/javascript">window.wp_data = ' . json_encode($variables) . ';</script>';
}

add_action('wp_head', 'js_variables');


function get_projects()
{
    global $post;
    $service_id  = $_POST['service_id'] ? $_POST['service_id'] : '';
    $country_id  = $_POST['country_id'] ? $_POST['country_id'] : '';
    $paged       = $_POST['paged'] ? $_POST['paged'] : 1;
    $return_html = '';
    $args        = array(
        'post_type' => 'post',
        'paged'     => $paged,
        'cat'       => '277, 278, 49',
    );
    if ( ! empty($country_id) && ! empty($service_id)) {
        $args['relation'] = 'AND';
    }
    if ( ! empty($service_id)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'terms'    => $service_id,
            'cat'      => '277, 278, 49',
        );
    }
    if ( ! empty($country_id)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'projects_country',
            'terms'    => $country_id,
            'cat'      => '277, 278, 49',
        );
    }
    $projects  = new WP_Query($args);
    $max_pages = $projects->max_num_pages;
    if ($projects->have_posts()):
        $return_html .= '<div class="filter-item-block d-flex">';
        while ($projects->have_posts()): $projects->the_post();
            
            $thumbnail_img = get_post_thumbnail_id($post->ID);
            $square        = get_field('square_image', $post->ID);
            $toShow        = $square ? $square : $thumbnail_img;
            
            $title         = get_the_title();
            $permalink     = get_the_permalink();
            $redirect_link = get_field('redirect_link');
            $date          = get_the_date();
            $view          = gt_get_post_view();
            
            $return_html .= '<div class="f-item d-flex">';
            $return_html .= '<div class="f-item-img">';
            $return_html .= wp_get_attachment_image($toShow, array(385, 240), false, array('alt' => $title));
            $return_html .= '<div class="item-overlay">';
            $return_html .= '<div class="item-view d-flex">';
            $return_html .= '<div class="date">';
            $return_html .= $date;
            $return_html .= '</div>';
            $return_html .= '<div class="view-post d-flex">';
            $return_html .= '<a href="' . get_author_posts_url($post->post_author) . '" class="filter-author-link" > ' . get_the_author() . ' </a>';
            $return_html .= '</div>';
            $return_html .= '</div>';
            $return_html .= '</div>';
            $return_html .= '</div>';
            
            $return_html .= '<div class="f-item-bottom d-flex align-center">';
            $return_html .= '<div class="bottom-row d-flex">';
            $return_html .= '<div class="item-name">';
            $return_html .= '<a href="' . $permalink . '" class="item-link">';
            $return_html .= $title;
            $return_html .= '</a>';
            $return_html .= '</div>';
            $return_html .= '<div class="bookmark"></div>';
            
            $return_html .= '</div>';
            $return_html .= '</div>';
            
            $return_html .= '</div>';
        endwhile;
        $return_html .= '</div>';
    endif;
    if ($paged < $max_pages) {
        $next_page     = $paged + 1;
        $show_more_btn = get_field('show_more_filter', 'option');
        $return_html   .= '<div id="load-more-events" class="blue-btn load-more" data-page="' . $next_page . '" data-service-id="' . $service_id . '" data-country-id="' . $country_id . '">' . $show_more_btn . '</div>';
    }
    wp_reset_postdata();
    echo $return_html;
    wp_die();
}


add_action('wp_ajax_get_projects', 'get_projects');
add_action('wp_ajax_nopriv_get_projects', 'get_projects');

// Contact
add_action('wp_ajax_nopriv_send_email', 'send_email');
add_action('wp_ajax_send_email', 'send_email');
function send_email()
{
    
    $checkbox = $_POST['myCheckboxes'];
    
    $checkbox_hy = $_POST['myCheckboxesHy'];
    
    $checkbox_modal_2 = $_POST['modalCheckboks2'];
    
    $checkbox_subs = $_POST['subsCheckbox'];
    
    $checkbox_sp = $_POST['supportCheckbox'];
    
    $subCheck1 = $_POST['subCheck1'];
    
    $subCheck2 = $_POST['subCheck2'];
    
    $pdCheck1 = $_POST['pdCheck1'];
    
    $pdCheck2 = $_POST['pdCheck2'];
    
    //$headers = 'Content-Type: text/html; charset= "utf-8"';
    //$url = $_POST['url'];
    $name       = $_POST['name'];
    $fullname   = $_POST['fullname'];
    $spFullname = $_POST['spFullname'];
    $hy_name    = $_POST['hy_name'];
    $from       = 'contact@xelon.ch';
    $to         = 'contact@xelon.ch';
    $bcc        = 'sergii.kononenko@bitcat.agency';
    $email      = $_POST['email'];
    $hy_email   = $_POST['hy_email'];
    $spEmail    = $_POST['spEmail'];
    $modalEmail = $_POST['modalEmail'];
    $pageUrl    = $_POST['pageUrl'];
    $subsEmail  = $_POST['subsEmail'];
    $msg        = $_POST['msg'];
    $hy_msg     = $_POST['hy_msg'];
    $modalMsg   = $_POST['modalMsg'];
    $spMsg      = $_POST['spMsg'];
    $company    = $_POST['company'];
    $spCompany  = $_POST['spCompany'];
    
    if (empty($_POST['userCID'])) {
        $userCID = $_COOKIE['_ga'];
    } else {
        $userCID = $_POST['userCID'];
    }
    
    if ($pageUrl == 'http://www.xelon.ch/support/') {
        $to = 'support@xelon.ch';
    }
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8 \r\n";
    //$headers .= "From: yournick <yournick@yourmail.ru>\r\n";
    //$headers .= 'Cc: secondnick@example.com' . "\r\n";
    $headers .= "Bcc: " . $bcc . "\r\n";
    
    $aFullname   = $_POST['aFullname'];
    $aModalPhone = $_POST['aModalPhone'];
    $aModalMsg   = $_POST['aModalMsg'];
    $fileCv      = $_POST['fileCv'];
    
    $soFirstName = $_POST['soFirstName'];
    $soLastName  = $_POST['soLastName'];
    $soEmail     = $_POST['soEmail'];
    $soCompany   = $_POST['soCompany'];
    
    $pr_name     = $_POST['pr_name'];
    $pr_email    = $_POST['pr_email'];
    $pr_company  = $_POST['pr_company'];
    $pr_position = $_POST['pr_position'];
    
    $time = $_POST['time'];
    
    if ($hy_name) {
        $subject = '‘Any questions?’ form: ' . $_POST['hy_email'];
    } elseif ($name) {
        $subject = 'Footer form: ' . $_POST['email'];
    } elseif ($fullname) {
        $subject = 'Header form: ' . $_POST['modalEmail'];
    } elseif ($subsEmail) {
        $subject = 'New blog subscription: ' . $_POST['subsEmail'];
    } elseif ($spEmail) {
        $subject = 'Support form: ' . $_POST['spEmail'];
    } elseif ($aModalPhone) {
        $subject = 'HR application: ' . $_POST['aModalPhone'];
    } elseif ($soEmail) {
        $subject = 'New subscription: ' . $_POST['soEmail'];
    } elseif ($pr_email) {
        $subject = 'New PDF request: ' . $_POST['pr_email'];
    }
    
    $message = ( ! empty($name)) ? '<p><strong>User Name</strong> : ' . $name . '  </p>' : '';
    $message .= ( ! empty($email)) ? '<p><strong>User Email</strong> : ' . $email . '</p>' : '';
    $message .= ( ! empty($msg)) ? '<p><strong>User Message</strong> : ' . $msg . '</p>' : '';
    $message .= ( ! empty($checkbox)) ? '<p><strong>Checkboxs</strong> : ' . $checkbox . '</p>' : '';
    
    $message .= ( ! empty($hy_name)) ? '<p><strong>User Name</strong> : ' . $hy_name . '</p>' : '';
    $message .= ( ! empty($hy_email)) ? '<p><strong>User Email</strong> : ' . $hy_email . '</p>' : '';
    $message .= ( ! empty($hy_msg)) ? '<p><strong>User Message</strong> : ' . $hy_msg . '</p>' : '';
    $message .= ( ! empty($checkbox_hy)) ? '<p><strong>Checkbox</strong> : ' . $checkbox_hy . '</p>' : '';
    
    
    $message .= ( ! empty($fullname)) ? '<p><strong>Full Name</strong> : ' . $fullname . '  </p>' : '';
    $message .= ( ! empty($modalEmail)) ? '<p><strong>User Email</strong> : ' . $modalEmail . '  </p>' : '';
    $message .= ( ! empty($company)) ? '<p><strong>Company</strong> : ' . $company . '  </p>' : '';
    $message .= ( ! empty($modalMsg)) ? '<p><strong>User Message</strong> : ' . $modalMsg . '  </p>' : '';
    $message .= ( ! empty($checkbox_modal_2)) ? '<p><strong>Checkbox</strong> : ' . $checkbox_modal_2 . '</p>' : '';
    
    $message .= ( ! empty($subsEmail)) ? '<p><strong>User Email</strong> : ' . $subsEmail . '</p>' : '';
    $message .= ( ! empty($checkbox_subs)) ? '<p><strong>Checkbox</strong> : ' . $checkbox_subs . '</p>' : '';
    
    $message .= ( ! empty($spFullname)) ? '<p><strong>User Name</strong> : ' . $spFullname . '</p>' : '';
    $message .= ( ! empty($spEmail)) ? '<p><strong>User Email</strong> : ' . $spEmail . '</p>' : '';
    $message .= ( ! empty($spCompany)) ? '<p><strong>Company</strong> : ' . $spCompany . '  </p>' : '';
    $message .= ( ! empty($spMsg)) ? '<p><strong>User Message</strong> : ' . $spMsg . '</p>' : '';
    $message .= ( ! empty($checkbox_sp)) ? '<p><strong>Checkbox</strong> : ' . $checkbox_sp . '</p>' : '';
    
    $message .= ( ! empty($aFullname)) ? '<p><strong>User Name</strong> : ' . $aFullname . '</p>' : '';
    $message .= ( ! empty($aModalPhone)) ? '<p><strong>User Phone Number</strong> : ' . $aModalPhone . '</p>' : '';
    $message .= ( ! empty($aModalMsg)) ? '<p><strong>User Message</strong> : ' . $aModalMsg . '</p>' : '';
    $message .= ( ! empty($fileCv)) ? '<p><strong>User Uploaded CV</strong> : ' . $fileCv . '</p>' : '';
    
    $message .= ( ! empty($soFirstName)) ? '<p><strong>User First Name</strong> : ' . $soFirstName . '</p>' : '';
    $message .= ( ! empty($soLastName)) ? '<p><strong>User Last Name</strong> : ' . $soLastName . '</p>' : '';
    $message .= ( ! empty($soEmail)) ? '<p><strong>User Email</strong> : ' . $soEmail . '</p>' : '';
    $message .= ( ! empty($soCompany)) ? '<p><strong>Company</strong> : ' . $soCompany . '</p>' : '';
    $message .= ( ! empty($subCheck1)) ? '<p><strong>Checkbox 1</strong> : ' . $subCheck1 . '</p>' : '';
    $message .= ( ! empty($subCheck2)) ? '<p><strong>Checkbox 2</strong> : ' . $subCheck2 . '</p>' : '';
    
    $message .= ( ! empty($pr_name)) ? '<p><strong>User Name</strong> : ' . $pr_name . '</p>' : '';
    $message .= ( ! empty($pr_email)) ? '<p><strong>User Email</strong> : ' . $pr_email . '</p>' : '';
    $message .= ( ! empty($pr_company)) ? '<p><strong>Company</strong> : ' . $pr_company . '</p>' : '';
    $message .= ( ! empty($pr_position)) ? '<p><strong>Position</strong> : ' . $pr_position . '</p>' : '';
    $message .= ( ! empty($pdCheck1)) ? '<p><strong>Checkbox 1</strong> : ' . $pdCheck1 . '</p>' : '';
    $message .= ( ! empty($pdCheck2)) ? '<p><strong>Checkbox 2</strong> : ' . $pdCheck2 . '</p>' : '';
    
    $message .= ( ! empty($pageUrl)) ? '<p><strong>Page Url</strong> : ' . $pageUrl . '</p>' : '';
    $message .= ( ! empty($userCID)) ? '<p><strong>User CID</strong> : ' . $userCID . '</p>' : '';
    
    $message .= ( ! empty($time)) ? '<p><strong>Time</strong> : ' . $time . '</p>' : '';
    
    //$message .= (!empty($url)) ?  '<p><strong>Url:</strong> : '.$url .'</p>' : '';
    $message   .= '</body></html>';
    $send_mail = mail($to, $subject, $message, $headers);
    
    if ($send_mail) {
        $data = get_field('success_message', 'option');
        wp_send_json_success($data);
    }
    
    die();
}

add_action('wp_enqueue_scripts', 'my_register_javascript', 100);

function my_register_javascript()
{
    wp_register_script('mediaelement', plugins_url('wp-mediaelement.min.js', __FILE__), array('jquery'), '4.8.2', true);
    wp_enqueue_script('mediaelement');
}

function exclude_category($query)
{
    if ($query->is_home()) {
        $query->set('cat', '-215, -216, -282, -279, -283, -280, -281, -284, -221, -219, -286, -287, -285, -220, -222');
    }
    
    return $query;
}

add_filter('pre_get_posts', 'exclude_category');


// Projects Filter

function get_stories()
{
    global $post;
    $service_id  = $_POST['service_id'] ? $_POST['service_id'] : '';
    $country_id  = $_POST['country_id'] ? $_POST['country_id'] : '';
    $return_html = '';
    $args        = array(
        'post_type' => 'post',
        'cat'       => '-277, -278, -215, -49, -1',
    );
    if ( ! empty($country_id) && ! empty($service_id)) {
        $args['relation'] = 'AND';
    }
    if ( ! empty($service_id)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'terms'    => $service_id,
            'cat'      => '-277, -278, -215, -49, -1',
        );
    }
    if ( ! empty($country_id)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'projects_country',
            'terms'    => $country_id,
            'cat'      => '-277, -278, -215, -49, -1',
        );
    }
    $projects = new WP_Query($args);
    if ($projects->have_posts()):
        $return_html .= '<div class="cp-slider">';
        while ($projects->have_posts()): $projects->the_post();
            
            $permalink     = get_the_permalink();
            $title         = get_the_title();
            $story_rating  = get_field('story_rating', $post->ID);
            $cp_slider_btn = get_field('cp_slider_btn', 'option');
            $return_html   .= '
            
            <div class="cp-wrap">
              <div class="cp-item">
                <div class="figure-wrap">
                  <figure style="background: url(' . get_field('square_image', $post->ID) . ') no-repeat center / cover;"><div class="shadow"></div></figure>
                  <div class="fw-row">
                    <div class="fw-row-item">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 469.333 469.333" width="48" height="48"><path d="M234.667 170.667c-35.307 0-64 28.693-64 64s28.693 64 64 64 64-28.693 64-64-28.694-64-64-64z"/><path d="M234.667 74.667C128 74.667 36.907 141.013 0 234.667c36.907 93.653 128 160 234.667 160 106.773 0 197.76-66.347 234.667-160-36.907-93.654-127.894-160-234.667-160zm0 266.666c-58.88 0-106.667-47.787-106.667-106.667S175.787 128 234.667 128s106.667 47.787 106.667 106.667-47.787 106.666-106.667 106.666z"/></svg>
                      <p>' . (int)get_post_meta(get_the_ID(), 'post_views_count', true) . ' reads' . '</p>
                    </div>
                    <div class="fw-row-item">
                      <p>' . $story_rating . '</p>
                      <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 0 448.941 448.941" width="48"><path d="M448.941 168.353H287.603L224.471 0l-63.132 168.353H0l121.478 106.293-65.36 174.295 168.353-84.176 168.353 84.176-65.361-174.296z"/></svg>
                    </div>
                  </div>
                </div>
                <div class="cp-row">
                  <p>' . $title . '</p>
                  <a href="' . $permalink . '" class="btn-read">' . $cp_slider_btn . '</a>
                </div>
              </div>
            </div>
            
            ';
        
        endwhile;
        $return_html .= '</div>';
    endif;
    wp_reset_postdata();
    echo $return_html;
    wp_die();
}


add_action('wp_ajax_get_stories', 'get_stories');
add_action('wp_ajax_nopriv_get_stories', 'get_stories');
/*
* Proper way to enqueue scripts and styles
*/
function bitcat_xelon_scripts_and_styles()
{
    wp_enqueue_style('xelon-style', get_template_directory_uri() . '/assets/css/style.css', array(), time());
    
    wp_enqueue_style('xelon-style-new', get_template_directory_uri() . '/xln-layout/dist/style.css', array(), time());
    
    wp_enqueue_script('defer-scripts', get_template_directory_uri() . '/assets/js/defer.js', array('jquery'), time(), true);
    
    // wp_enqueue_script('menu-scripts', get_template_directory_uri() . '/assets/js/mobile-menu.js', array('jquery'), '1.0.0', true);
    
    wp_enqueue_script('new-scripts', get_template_directory_uri() . '/xln-layout/dist/js/app.bundle.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('front-page-filter-js', get_template_directory_uri() . '/xln-layout/dist/js/filter.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('form-js', get_template_directory_uri() . '/xln-layout/dist/js/forms.js', array('jquery'), '1.0.0', true);
    
    
    wp_localize_script('front-page-filter-js', 'filter',
        array(
            'action'   => 'blog_filter',
            'ajax_url' => site_url() . '/wp-admin/admin-ajax.php',
            'nonce'    => wp_create_nonce('filter-nonce'),
        )
    );
    
    wp_localize_script('defer-scripts', 'promocode',
        get_current_page_promo()
    );
}

add_action('wp_enqueue_scripts', 'bitcat_xelon_scripts_and_styles');

function get_current_page_promo()
{
    $promocodes = get_field('promocodes', 'options');
    $page       = get_the_ID();
    $data       = array('status' => 'false');
    
    foreach ($promocodes as $promocode) {
        $pages = $promocode['pages'];
        
        if (in_array($page, $pages)) {
            return array(
                'status' => 'true',
                'promo'  => $promocode['promo'],
            );
        }
    }
    
    return $data;
}

// for single post filter by 1 row
function my_custom_posts_per_page($query)
{
    if ( ! is_admin() && is_singular('post')) {
        $query->set('posts_per_page', 4);
    }
}

add_filter('parse_query', 'my_custom_posts_per_page');


add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'page') {
        return false;
    }
    
    return $current_status;
}

add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type('partners', array(
        'label'               => null,
        'labels'              => array(
            'name'               => 'partner',
            'singular_name'      => 'Singular partner',
            'add_new'            => 'Add partner',
            'add_new_item'       => 'New partner',
            'edit_item'          => 'Edit post partner',
            'new_item'           => 'New partner',
            'view_item'          => 'View partner',
            'search_items'       => 'Search partners',
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Partners',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null,
        'exclude_from_search' => null,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => null,
        'show_in_nav_menus'   => true,
        'menu_position'       => 8,
        'menu_icon'           => null,
        'show_in_rest'        => false,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array('partnerscat'),
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'partners', 'with_front' => false), ///%jobscat%
        'query_var'           => true,
    ));
}

add_filter('weglot_words_translate', 'words_translate');
function words_translate($words)
{
    $words[] = "Mehr";
    $words[] = "Danke, wir melden uns in Kürze!";
    
    return $words;
}

add_filter('autoptimize_html_after_minify', 'codeless_remove_type_attr', 10, 2);
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

function replace_p($str)
{
    $str = str_replace('<p>', '', $str);
    $str = str_replace('</p>', '', $str);
    
    return $str;
}


function blog_filter()
{
    global $wp_query;
    
    if (wp_verify_nonce($_GET['nonce'], 'filter-nonce')) {
        die();
    }
    
    query_posts(array(
        'posts_per_page' => 3,
        'post_type'      => 'post',
        'tag__in'        => $_POST['category'],
        'paged'          => $_POST['paged'],
    ));
    ob_start();
    if (have_posts()) :
        while (have_posts()): the_post(); ?>
            <div class="xln-news-item">
                <div class="xln-news-item__wrapper">
                    <div class="xln-news-item__main">
                        <a href="<?php the_permalink(); ?>"
                           class="xln-news-item__img-wrapper">
                            <?php the_post_thumbnail('large', array('class' => 'xln-news-item__img')); ?>
                        </a>
                        <?php $tags = wp_get_post_tags(get_the_ID(), array('fields' => 'all'));
                        if ( ! empty($tags)): ?>
                            <div class="xln-news-item__tags">
                                <?php foreach ($tags as $tag): ?>
                                    <a href="<?php echo get_category_link($tag->term_id); ?>"
                                       class="xln-news-item__tag">
                                        <?php echo $tag->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>"
                           class="xln-news-item__title">
                            <?php the_title(); ?>
                        </a>
                        <p class="xln-news-item__text">
                            <?php the_excerpt(); ?>
                        </p>
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
        <?php endwhile;
    endif;
    $data['posts'] = ob_get_contents();
    
    ob_clean();
    ob_start();
    
    custom_pagination_for_ajax($wp_query->max_num_pages, $_POST['paged']);
    
    $data['pagination'] = ob_get_contents();
    ob_clean();
    
    wp_send_json($data, 200);
    
}

add_action('wp_ajax_blog_filter', 'blog_filter');
add_action('wp_ajax_nopriv_blog_filter', 'blog_filter');

function custom_pagination_for_ajax($max_pages, $current)
{
    
    $arrow_left  = $current > 1 ? $current - 1 : 1;
    $arrow_right = ($current >= 1 && $max_pages != $current) ? $current + 1 : $max_pages;
    
    echo '
    <button class="xln-pagination__arrow xln-pagination__arrow--prev" data-paged="' . $arrow_left . '">
        <svg width="13px"
             height="22px">
            <use xlink:href="#arrow-left"></use>
        </svg>
    </button>
    ';
    
    echo '<ul class="xln-pagination__list">';
    if (($current >= $max_pages - 3) && ($current != 1)) {
        if ($max_pages > 5) {
            echo '<li class="xln-pagination__item"><button class="xln-pagination__page" data-paged="1">1</button></li>';
            echo '<li class="xln-pagination__item"><button class="xln-pagination__page">..</button></li>';
        }
        
        if ($max_pages > 4) {
            for ($i = $max_pages - 4; $i <= $max_pages; $i++) {
                $is_current = $current == $i ? 'xln-active' : '';
                echo '<li class="xln-pagination__item"><button class="xln-pagination__page ' . $is_current . '" data-paged="' . $i . '">' . $i . '</button></li>';
            }
        } else {
            for ($i = 1; $i <= $max_pages; $i++) {
                $is_current = $current == $i ? 'xln-active' : '';
                echo '<li class="xln-pagination__item"><button class="xln-pagination__page ' . $is_current . '" data-paged="' . $i . '">' . $i . '</button></li>';
            }
        }
        
        echo '
        <button class="xln-pagination__arrow xln-pagination__arrow--next" data-paged="' . $arrow_right . '">
            <svg width="13px"
                 height="22px">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </button>
        ';
        
        
        return;
    }
    
    if ($max_pages <= 5) {
        for ($i = 1; $i <= $max_pages; $i++) {
            $is_current = $current == $i ? 'xln-active' : '';
            echo '<li class="xln-pagination__item"><button class="xln-pagination__page ' . $is_current . '" data-paged="' . $i . '">' . $i . '</button></li>';
        }
    }
    
    if ($max_pages > 5) {
        $start = $current;
        $end   = $current + 3;
        if ($current != 1) {
            $start = $current - 1;
            $end   = $current + 2;
        }
        
        if ($current == 3) {
            $start = 1;
        }
        
        if ($current > 3) {
            echo '<li class="xln-pagination__item"><button class="xln-pagination__page" data-paged="1">1</button></li>';
            echo '<li class="xln-pagination__item"><span class="xln-pagination__page">..</span></li>';
        }
        
        for ($i = $start; $i < $end; $i++) {
            $is_current = $current == $i ? 'xln-active' : '';
            echo '<li class="xln-pagination__item"><button class="xln-pagination__page ' . $is_current . '" data-paged="' . $i . '">' . $i . '</button></li>';
        }
        
        echo '<li class="xln-pagination__item"><span class="xln-pagination__page">..</span></li>';
        echo '<li class="xln-pagination__item"><button class="xln-pagination__page" data-paged="' . $max_pages . '">' . $max_pages . '</button></li>';
    }
    echo '</ul>';
    
    echo '
    <button class="xln-pagination__arrow xln-pagination__arrow--next" data-paged="' . $arrow_right . '">
        <svg width="13px"
             height="22px">
            <use xlink:href="#arrow-right"></use>
        </svg>
    </button>
    ';
}

function estimated_reading_time($content)
{
    $word = str_word_count(strip_tags($content));
    $m    = floor($word / 200);
    
    if ( ! empty($m)) {
        $output = $m . ' min' . ($m == 1 ? '' : 's') . ' read';
    } else {
        $s      = floor($word % 200 / (200 / 60));
        $output = $s . ' second' . ($s == 1 ? '' : 's') . ' read';
    }
    
    return $output;
}

get_template_part('inc/class-footer-walker');
get_template_part('inc/class-top-header-walker');
get_template_part('mega-menu/init');

function mobile_lang_switcher()
{
    $request_url_services = Context_Weglot::weglot_get_context()->get_service('Request_Url_Service_Weglot');
    $language_services    = weglot_get_service('Language_Service_Weglot');
    $cur_lang             = $request_url_services->get_current_language();
    
    echo '<ul class="main-nav__langs">';
    
    foreach ($language_services->get_original_and_destination_languages($request_url_services->is_allowed_private()) as $language) {
        $link = $request_url_services->get_weglot_url()->getForLanguage($language);
        $name = strtoupper($language->getInternalCode());
        
        $class = $cur_lang->getInternalCode() == $language->getInternalCode() ? 'xln-active' : '';
        
        echo '<li class="main-nav__lang ' . $class . '">
                    <a href="' . $link . '"
                       data-wg-notranslate="true">' . $name . '
                    </a>
                </li>
        ';
    }
    
    echo '</ul>';
}

function desktop_lang_switcher()
{
    $request_url_services = Context_Weglot::weglot_get_context()->get_service('Request_Url_Service_Weglot');
    $language_services    = weglot_get_service('Language_Service_Weglot');
    $cur_lang             = $request_url_services->get_current_language();
    
    $cur_link = $request_url_services->get_weglot_url()->getForLanguage($cur_lang);
    $cur_name = $cur_lang->getLocalName();
    
    
    echo '<div class="top-header__langs top-langs">';
    echo '<a href="' . $cur_link . '"
                data-wg-notranslate="true"
                class="top-langs__button top-header__link">
                  ' . $cur_name . '
                  <svg width="10"
                       height="10">
                      <use xlink:href="#arrow-down"></use>
                  </svg>
             </a>';
    echo '<ul class="top-langs__list">';
    
    foreach ($language_services->get_original_and_destination_languages($request_url_services->is_allowed_private()) as $language) {
        $link = $request_url_services->get_weglot_url()->getForLanguage($language);
        $name = $language->getLocalName();
        
        echo '<li class="top-langs__item">
                  <a href="' . $link . '"
                     data-wg-notranslate="true">' . $name . '
                  </a>
              </li>';
    }
    
    echo '</div>';
    echo '</ul>';
}

if (wp_is_mobile()) {
    add_filter('show_admin_bar', '__return_false');
}

//Remove Google ReCaptcha code/badge everywhere apart from select pages
add_action('wp_print_scripts', function () {
    wp_dequeue_script('google-recaptcha');
    wp_dequeue_script('google-recaptcha-js');
    wp_dequeue_script('google-invisible-recaptcha');
});

add_shortcode( 'signups', 'get_signups' );
add_filter('widget_text', 'do_shortcode');

function get_signups(){
    $signups = get_field('signups', 'options');
    $result = '';
    
    if ($signups): 
        $promo = get_current_page_promo();
        $result .= '<div class="signups">';
        foreach ($signups as $signup): 
            $href = 'https://vdc.xelon.ch/login?';
            if ($promo['status'] == 'true') {
                $href .= 'promo=' . $promo['promo'] .= '&';
            }
            $href .= 'provider_name=' . $signup['type'];
            $result .= '<a href="' . $href . '"
                    class="signup"
                    target="_blank">
                        <img src="' . $signup['icon'] . '" alt="">' .
                        '<span>' . $signup['name'] . '</span>' .
                 '</a>';
        endforeach;
        $result .= '</div>';
    endif;
    
    return $result;
}