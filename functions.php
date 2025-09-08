<?php

/**
 * WPPack
 * 
 * @see https://github.com/thecode/wppack
 * @package wppack
 * @since 1.2.0
 *
 */


define('THEMEDIR', dirname(__FILE__)) . "";
define('VIEWDIR', dirname(__FILE__) . '/views');
//$langSlug = ICL_LANGUAGE_CODE == "en" ? "" : "/" . ICL_LANGUAGE_CODE;
/// asset


add_theme_support('post-thumbnails');


function asset($req)
{
    return get_template_directory_uri() . "/assets/" . $req;
}

//add_action("wp_ajax_search", array($this, "_filter_places"));
//add_action("wp_ajax_nopriv__filter_places", array($this, "_filter_places"));

// Disable use XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable X-Pingback to header
add_filter('wp_headers', 'disable_x_pingback');
function disable_x_pingback($headers)
{
    unset($headers['X-Pingback']);

    return $headers;
}

add_filter('xmlrpc_methods', function ($methods) {
    unset($methods['pingback.ping']);
    return $methods;
});
function block_frames()
{
    header('X-FRAME-OPTIONS: SAMEORIGIN');
}
add_action('send_headers', 'block_frames', 10);




add_action('wp_ajax_search', 'my_ajax_search');
add_action('wp_ajax_nopriv_search', 'my_ajax_search');

function my_ajax_search()
{
    $posted = array_merge($_GET, $_POST);
    $s = $posted['s'];
    $data = array();
    global $wpdb;
    $postData = $wpdb->get_results("
    select t1.ID, t1.post_title, t1.post_content from wp_vitra_products vp 
    left join wp_posts t1 on t1.ID = vp.collectionID 
    where vp.collectionID is not null and (vp.productCode like '%$s%' or productDefinition like '%$s%') and t1.post_status = 'publish'
    GROUP by collectionID 
    ");
    //print_r(($postData));
    //print_r(json_encode($postData));
    /*
    global $wp_query;
    $args = array(
        'post_status'       => 'publish',
       // 'post_type' => array('post','news','page'),
        'posts_per_page'    => -1,
        'meta_query'        => array(
            array(
                'key'       => 'title',
                'value'     => "a",
                'compare'   => 'LIKE'
            )
        )
        );
    $my_query = get_posts( $args );
    */
    $stype =  intval(@$_POST['sType']);
    $the_query = new WP_Query(array('post_status' => 'publish', 'posts_per_page' => -1, 's' => esc_attr($s), 'post_type' => array('page', 'post', 'news', 'catalog', 'collection')));


    if ($the_query->have_posts()) :
        $data['page'] = array();
        $other = array("page", "post", "news");
        while ($the_query->have_posts()): $the_query->the_post();
            $type = get_post_type();
            $type = in_array($type, $other) ? "other" : $type;
            $collect['url']   = esc_url(get_permalink());
            $collect['title'] = get_the_title();
            $collect['ID']    = get_the_ID();
            $collect['desc']  = wp_trim_words(get_the_excerpt(), $num_words = 16, $more = null);
            $collect['img']   = get_the_post_thumbnail_url();
            if ($type == "catalog") {
                $pdf = get_field('catalogue');
                $collect['url'] = $pdf['catalog-file'];
            } else if ($type == "other") {
                $collect['img'] = get_the_post_thumbnail_url(null, 'full');
            }
            $collect['type']  = $type;
            //$sayx  = count($data[$type]);

            $data[$type][] =  $collect;



        endwhile;
        wp_reset_postdata();
    endif;
    if ($stype == 1) {
        echo json_encode($data);
    } else {
        return $data;
    }
    die();


    // Make your response and echo it.

    // Don't forget to stop execution afterward.
    wp_die();
}

/// view



function view($file = "")
{

    if (file_exists(VIEWDIR . "/" . $file . ".php")) :
        include VIEWDIR . "/" . $file . ".php";
    else :
        echo "view not found!";
    endif;
}


add_theme_support('post-thumbnails');
set_post_thumbnail_size(640, 640, array('left', 'top'));
add_image_size("blog", 290, 220, true); // "left" ve "top" seçenekleri eklenmemeli
add_image_size("thumbBlog", 328, 185, true); // "left" ve "top" seçenekleri eklenmemeli



// Menüler

function register_my_menus()

{

    register_nav_menus(

        array(

            'navbar'   => __('Navbar Menu', 'textdomain'), // 'textdomain' değişkeni burada kullanılmalı
            'footerMain'   => __('footer Main', 'textdomain') // 'textdomain' değişkeni burada kullanılmalı
        )

    );
}

add_action('init', 'register_my_menus');

add_action('init', 'setupThema');
function setupThema()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
}

function custom_excerpt_length($length)

{

    return 12; // İstediğiniz kelime sayısını buraya yazın

}

add_filter('excerpt_length', 'custom_excerpt_length');



function custom_excerpt_more($more)

{

    return '<span> ... </span>';
}

add_filter('excerpt_more', 'custom_excerpt_more');





/*Contact form 7 remove span*/

add_filter('wpcf7_form_elements', function ($content) {

    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);



    $content = str_replace('<br />', '', $content);

    $content = str_replace('<p>', '', $content);

    $content = str_replace('</p>', '', $content);

    // echo "efe";

    return $content;
});

apply_filters('wpcf7_remote_ip_addr', function ($content) {

    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
});




function getAllMenu($type)
{
    $menuLocations = get_nav_menu_locations();
    $navbar_items = wp_get_nav_menu_items($menuLocations[$type]);
    $allMenu = [];

    foreach ($navbar_items as $key => $item) {
        $ID = $item->ID;
        $parentID = $item->menu_item_parent;
        if ($item->menu_item_parent > 0) {
            $allMenu[$parentID]['subs'][$ID] = $item;
        } else {
            $allMenu[$ID]['main'] = $item;
        }
    }
    return $allMenu;
}
add_action('init', 'start_session_wp', 1);
function start_session_wp()
{
    if (!session_id()) {
        session_start();
    }
}
remove_action('wpcf7_swv_create_schema', 'wpcf7_swv_add_select_enum_rules', 20, 2);

/*
ini_set( 'error_reporting', -1 );
ini_set( 'display_errors', 'On' );

echo '<pre>';

add_action( 'parse_request', 'debug_404_rewrite_dump' );
function debug_404_rewrite_dump( &$wp ) {
    global $wp_rewrite;

    echo '<h2>rewrite rules</h2>';
    echo var_export( $wp_rewrite->wp_rewrite_rules(), true );

    echo '<h2>permalink structure</h2>';
    echo var_export( $wp_rewrite->permalink_structure, true );

    echo '<h2>page permastruct</h2>';
    echo var_export( $wp_rewrite->get_page_permastruct(), true );

    echo '<h2>matched rule and query</h2>';
    echo var_export( $wp->matched_rule, true );

    echo '<h2>matched query</h2>';
    echo var_export( $wp->matched_query, true );

    echo '<h2>request</h2>';
    echo var_export( $wp->request, true );

    global $wp_the_query;
    echo '<h2>the query</h2>';
    echo var_export( $wp_the_query, true );
}
add_action( 'template_redirect', 'debug_404_template_redirect', 99999 );
function debug_404_template_redirect() {
    global $wp_filter;
    echo '<h2>template redirect filters</h2>';
    echo var_export( $wp_filter[current_filter()], true );
}
add_filter ( 'template_include', 'debug_404_template_dump' );
function debug_404_template_dump( $template ) { 
    echo '<h2>template file selected</h2>';
    echo var_export( $template, true );
    
    echo '</pre>';
    exit();
}
*/




add_filter('http_request_timeout', function ($timeout) {
    return 30; // saniye
});
