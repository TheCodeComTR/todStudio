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
$langSlug = ICL_LANGUAGE_CODE == "en" ? "" : "/" . ICL_LANGUAGE_CODE;
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
            'footerMain'   => __('footer Main', 'textdomain'), // 'textdomain' değişkeni burada kullanılmalı
            'footerBottom'   => __('footer Bottom', 'textdomain'), // 'textdomain' değişkeni burada kullanılmalı
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

/*
function acf_set_featured_image($value, $post_id, $field)
{
    $value = get_field('_thumbnail_id', 'options'); // get image from optionspage
    add_post_meta($post_id, '_thumbnail_id', $value);
    return $value;
}
add_filter('acf/update_value/key=field_5dc3135e281b9', 'acf_set_featured_image', 10, 3);


function acf_set_featured_image( $value, $post_id, $field  ){
    
    if($value != ''){
        //Add the value which is the image ID to the _thumbnail_id meta data for the current post
        add_post_meta($post_id, '_thumbnail_id', $value);
    }
 
    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=areashome', 'acf_set_featured_image', 10, 3);
*/


//shop block
//render Callback
function my_acf_block_render_callback($block)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/blocks/{$slug}.php"))) {
        include(get_theme_file_path("/blocks/{$slug}.php"));
    }
}

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{
    // Check function exists
    if (function_exists('acf_register_block')) {

        // Register a Banner block
        acf_register_block(array(
            'name'              => 'shopbanner',
            'title'             => __('Banner Block'),
            'description'       => __('Add Banner Block'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-category', // Add to the custom category
            'icon'              => '<svg width="24" height="25" xmlns="http://www.w3.org/2000/svg" fill="none"><defs><clipPath id="clip0_1146_18088"><rect id="svg_1" fill="white" height="25" width="87"/></clipPath></defs><g><title>Layer 1</title><path stroke="null" id="svg_5" fill="#3D3935" d="m19.84165,3.20036c0,-0.01023 -0.14867,-0.37528 -0.40501,-0.4401c-0.16577,-0.04094 -0.38282,-0.03753 -0.66989,0.16887c-1.59109,4.7166 -4.1477,11.08107 -6.05323,15.43259c-0.47511,0.95872 -1.00319,0.96889 -1.49367,0c-1.88672,-4.32256 -4.44678,-10.76375 -6.02758,-15.44112c-0.02051,-0.04264 -0.34692,-0.24393 -0.6289,-0.17058c-0.26831,0.06482 -0.40503,0.43328 -0.40503,0.44522c0.75537,2.94426 5.37646,16.63348 6.00023,17.94871c0.70923,1.49595 2.87284,1.49595 3.6111,0c0.6357,-1.28964 5.18503,-15.04881 6.07197,-17.9453l0,0.00171z"/></g></svg>',
            'keywords'          => array('banner'),
            'align'           => 'full',
            'post_types'        => array('post'),
            'supports'        => array(
                'align'        => array('full'),
                'align'        => false,
            ),
        ));
    }
}
function cmToinch($c)
{
    //echo ICL_LANGUAGE_CODE."xxx";
    $c = strtolower($c);
    if (ICL_LANGUAGE_CODE == 'us-en') {
        if (str_contains($c, "x")) {

            $d = explode("x", $c);
            return round($d[0] / (2.54), 1) . "x" . round($d[1] / (2.54), 1);
        } else {
            return round($c / (2.54), 1);
        }
    } else {
        return $c;
    }
}

function productNameinch($c)
{
    return $c;
    //preg_match('/([0-9]+x[0-9]+)/i', $c, $matches);
    //return cmToinch($matches[0])." ".str_replace($matches[0],"",$c);
}
//do_action( 'wpml_switch_language', "gcc-en" );
//echo ICL_LANGUAGE_CODE;


function pagenation($total, $perPage)
{
    //echo $total."---".$perPage;
    //$total = 1750; // Toplam veri sayısı
    //$perPage = 50; // Sayfa başına gösterilecek öğe sayısı
    $totalPages = ceil($total / $perPage); // Toplam sayfa sayısı
    $current = isset($_GET['pg']) ? (int)$_GET['pg'] : 1; // Geçerli sayfa

    // Sayfa numaralandırmayı ayarlamak için değişkenler
    $range = 3; // Aktif sayfanın çevresinde kaç sayfa gösterilecek
    $pagination = [];

    // İlk sayfa her zaman eklenmeli
    $pagination[] = 1;

    // Önceki sayfalardan belirli bir aralık eklenmeli
    $start = max(2, $current - $range);
    $end = min($totalPages - 1, $current + $range);

    if ($start > 2) {
        $pagination[] = '...';
    }

    for ($i = $start; $i <= $end; $i++) {
        $pagination[] = $i;
    }

    if ($end < $totalPages - 1) {
        $pagination[] = '...';
    }

    // Son sayfa her zaman eklenmeli
    if ($totalPages > 1) {
        $pagination[] = $totalPages;
    }

    // HTML Çıktısı
    echo '<ul class="pagination">';
    echo $current > 1 ? '<li class="pagination-prev"><a href="' . addOrUpdateCurrentUrlParam("pg", ($current - 1)) . '"><img src="/wp-content/themes/vitra/assets/img/svg/arrow-left.svg" alt=""> <span>Previous</span></a></li>' : '<li><span class="disabled">Previous</span></li>';

    foreach ($pagination as $page) {
        if ($page == '...') {
            echo '<li><span>...</span></li>';
        } elseif ($page == $current) {
            echo '<li><a class="active" href="' . addOrUpdateCurrentUrlParam("pg",  $page) . '">' . $page . '</a></li>';
        } else {
            echo '<li><a href="' . addOrUpdateCurrentUrlParam("pg",  $page) . '">' . $page . '</a></li>';
        }
    }

    echo $current < $totalPages ? '<li class="pagination-next"><a href="' . addOrUpdateCurrentUrlParam("pg", ($current + 1)) . '"><img src="/wp-content/themes/vitra/assets/img/svg/arrow-right.svg" alt=""> <span>Next</span></a></li>' : '<li><span class="disabled">Next</span></li>';
    echo '</ul>';
}

add_filter('rank_math/frontend/canonical', function ($canonical) {
    $template_slug = get_page_template_slug(get_the_ID());
    //echo $template_slug;
    if ($template_slug == "page-product-lists.php" && isset($_GET) && count($_GET) == 1) {
        foreach ($_GET as $key => $value) {
            // Eğer URL'de parametre varsa, canonical URL'yi temizle
            //echo "<br>key: $key, value: $value<br>";
            if($key == "cate")
            {
                 return $canonical; 
                //$cType  = get_term_by('slug', $value, 'area');
                //return getTitleAndDescription("Areaofuse", $cType->name, "title");
            }
            if (strpos($value, "-") === false) 
            {
                //echo findOriginalData($value)."*************";
                //echo "parametre var";
                //echo "parametre var".$canonical."?".$key."=".$value;
                return $canonical . "?" . $key . "=" . $value;
            } 
            else 
            {
                //echo "parametre yok";
            }
            //strpos($value, "pg") !== false ? $canonical = remove_query_arg("pg", $canonical) : null;
        }

        // Eğer URL'de parametre varsa, canonical URL'yi temizle
        //$canonical = remove_query_arg(array_keys($_GET), $canonical);
    }
    // Eğer URL'de parametre yoksa, canonical URL'yi olduğu gibi bırak





    return $canonical; // Diğer sayfalarda varsayılan devam eder
});

add_filter('rank_math/frontend/title', function ($title) {
    $template_slug = get_page_template_slug(get_the_ID());
    global $colorGrup;
    //print_r($title);
    if ($template_slug == "page-product-lists.php" && isset($_GET) && count($_GET) == 1) {
    
        foreach ($_GET as $key => $value) 
        {
            // Eğer URL'de parametre varsa, canonical URL'yi temizle
            if (strpos($value, "-") === false) 
            {
                if($key == "t-area-of-use")
                {
                    $cType  = get_term_by('slug', $value, 'area');
                    //echo "varxxx".$value.$cType->name;
                    return getTitleAndDescription("Areaofuse", $cType->name, "title");
                }

                $filterData = getFilterData();
                foreach ($filterData as $valx) 
                {
                    //if ($valx['filter_value'] == "") continue;
                    //echo $valx->filter_value."\n<br>";
                   
                    
                    if (slugify($valx->filter_value) === $value) {
                        //echo "varxxx";
                        $titleData = getTitleAndDescription($valx->filter_type, $valx->filter_value, "title");
                        return $titleData;
                    }
                    
                }
            } else {
                //echo "parametre yok";
            }
            //strpos($value, "pg") !== false ? $canonical = remove_query_arg("pg", $canonical) : null;
        }
    }
    return $title;
});


add_filter('rank_math/frontend/description', function ($title) {
    $template_slug = get_page_template_slug(get_the_ID());
    global $colorGrup;
    //print_r($title);
    if ($template_slug == "page-product-lists.php" && isset($_GET) && count($_GET) == 1) {
        $parent_id = wp_get_post_parent_id(get_the_ID());
        foreach ($_GET as $key => $value) 
        {
            // Eğer URL'de parametre varsa, canonical URL'yi temizle
            if (strpos($value, "-") === false) 
            {
                if($key == "t-area-of-use")
                {
                    $cType  = get_term_by('slug', $value, 'area');
                    //print_r($cType->name);
                    return getTitleAndDescription("Areaofuse", $cType->name, "desc");
                }

                $filterData = getFilterData();
                //print_r($filterData );
                foreach ($filterData as $valx) {
                    //if ($valx['filter_value'] == "") continue;
                    if (slugify($valx->filter_value) === $value) {
                        $titleData = getTitleAndDescription($valx->filter_type, $valx->filter_value, "desc", $parent_id);
                        return $titleData;
                    }
                }
            } 
            else 
            {
                //echo "parametre yok";
            }
            //strpos($value, "pg") !== false ? $canonical = remove_query_arg("pg", $canonical) : null;
        }
    }
    return $title;
});




function getFilterData()
{
    global $wpdb;
    $filterData = $wpdb->get_results("
SELECT 'seriesName' AS filter_type, seriesName AS filter_value, COUNT(*) AS count 
FROM wp_vitra_products where lang = 'en' AND  productID != 0   
GROUP BY seriesName 

UNION ALL

SELECT 
'ColourGroup' AS filter_type, main AS filter_value, COUNT(*) AS count 
FROM `wp_vitra_products` as v 
left join wp_vitra_products_hex_code as vc on v.ColourEN = vc.colouren
WHERE  lang = 'en' AND  productID != 0
GROUP BY main

UNION ALL

SELECT 'Brightness' AS filter_type, Brightness AS filter_value, COUNT(*) AS count 
FROM wp_vitra_products  where lang = 'en' AND  productID != 0   
GROUP BY Brightness 

UNION ALL

SELECT 'UsagePlace' AS filter_type, UsagePlace AS filter_value, COUNT(*) AS count 
FROM wp_vitra_products  where lang = 'en'  AND  productID != 0   
GROUP BY UsagePlace   

UNION ALL

SELECT 'Texture' AS filter_type, Texture AS filter_value, COUNT(*) AS count 
FROM wp_vitra_products  where lang = 'en'  AND  productID != 0   
GROUP BY Texture 

UNION ALL

SELECT 'size' AS filter_type, Size AS filter_value, COUNT(*) AS count 
FROM wp_vitra_products where lang = 'en' AND  productID != 0   
GROUP BY Size

UNION ALL

SELECT 'Areaofuse' AS filter_type, Areaofuse AS filter_value, COUNT(*) AS count 
FROM wp_vitra_products where lang = 'en' AND  productID != 0   
GROUP BY Areaofuse;
 ");
 
    return $filterData;
}

function findOriginalValue($array, $slugKey)
{
    foreach ($array as $value) {
        if ($value['val'] == "") continue;
        if (slugify($value['val']) === $slugKey) {
            //print_r( $value); //." yyyy--- <br>";
            return $value; // Eşleşen orijinal değeri döndür
        }
    }
    return null; // Eğer eşleşme yoksa null döndür
}

function findOriginalData($slugKey)
{
    global $filterData;
    if (!isset($filterData)) {
        $filterData = getFilterData();
        echo "<br>filterData yokkkk!<br>";
    }
    //print_r($filterData);
    foreach ($filterData as $value) {
        if ($value->filter_value == "") continue;
        if (slugify($value->filter_value) === $slugKey) {
            return $value; // Eşleşen orijinal değeri döndür
        }
    }
}

function getTitleAndDescription($type, $title, $src)
{
    $currentID = get_the_ID();
    $parent_id = wp_get_post_parent_id($currentID);
        //echo $parent_id."xxx";
    $parent_id = intval($parent_id);
    $titleArray = array(
        "seriesName" =>  array(
            "title" => "{title} Concrete-Look Tiles",
            "description" => "Explore the {desc} series from VitrA Tiles."
        ),
        "ColourGroup" => array(
            "title" => "{title} Tiles",
            //"description" => "Add character with {desc} tiles from VitrA Tiles. Find your tone, enhance your space, and visit the curated collection get offer today",
            "description" => "Add character with {desc} tiles VitrA Tiles. Find your tone, enhance your space, and visit the curated collection get offer today"

        ),
        "Brightness" => array(
            "title" => "{title} Finish Tiles",
            //"description" => "Brighten your space with {desc} finish tiles from VitrA Tiles. Discover perfect light harmony and choose from our designer collection today",
            "description" => "Brighten your space with {desc} finish tiles from VitrA Tiles. Discover perfect light harmony and choose from our designer collection today"
        ),
        "UsagePlace" => array(
            "title" => "High-Performance Tiles for {title} Use",
            //"description" => "Discover high-performance by VitrA Tiles for perfect {desc} coverage. Elevate your everyday living with premium surfaces",
            "description" => "Discover high-performance by VitrA Tiles for perfect {desc} coverage. Elevate your everyday living with premium surfaces"
        ),
        "Texture" => array(
            "title" => "{title} Tiles for Modern Spaces",
            //"description" => "Discover {desc} tiles in the collection by VitrA Tiles. Design with depth and shop our refined finishes for every interior",
            "description" => "Bring raw, urban character indoors with {desc} Tiles from VitrA-authentic matte surfaces that deliver depth and timeless appeal."
        ),
        "size" => array(
            "title" => "{title} Format Tiles for Contemporary Homes",
            //"description" => "Explore {desc} format tiles by VitrA Tiles. Flexible sizes, elegant finishes, and timeless design for modern interior concepts",
            "description" => "The versatile {desc} Format Tiles brings timeless elegance to kitchens, bathrooms, and living spaces alike."
        ),
        "Areaofuse" => array(
            "title" => "Tiles for {title} Interiors",
            "description" => "Durable and Stylish, These Tiles are perfect for enhancing your {desc} Interiors"
        ),
        "product_type" => array(// bakılacak @TheCodeEfe @todo 
            "title" => "{title} Concrete-Look Tiles",
            "description" => "Explore the iconic {desc} series from VitrA Tiles. Curated tile design meets surface performance for interiors that speak your style"
            
        )
    );
    $titleArray2 = array(
        "seriesName" =>  array(
            "title" => "{title} {CategoryName} Concrete-Look Tiles", 
            // ok yapıldı  desc bakılacak
            //"description" => "Explore the iconic {title} series from VitrA Tiles. Curated tile design meets surface performance for interiors that speak your style"
            //"description" => "Explore the {title} {CategoryName} series from VitrA Tiles."
            "description" => "Embrace industrial chic with {title} {CategoryName}, designed for urban interiors that demand strength and style."
        ),
        "ColourGroup" => array(
            "title" => "{title} {CategoryName} for Modern Interiors",
            //"description" => "Add character with {title} {CategoryName} from VitrA Tiles. Find your tone, enhance your space, and visit the curated collection get offer today",
            "description" => "Add character with {title} {CategoryName} VitrA Tiles. Find your tone, enhance your space, and visit the curated collection get offer today"
        ),
        "Brightness" => array(
            "title" => "{title} Finish {CategoryName}",
            //"description" => "Brighten your space with {title} finish tiles from VitrA Tiles. Discover perfect light harmony and choose from our designer collection today",
            "description" => "Brighten your space with {title} finish {CategoryName} from VitrA Tiles. Discover perfect light harmony and choose from our designer collection today"
        ),
        "UsagePlace" => array(
            "title" => "{CategoryName} for {title} Use",
            //"description" => "Discover high-performance {CategoryName} by VitrA Tiles for perfect {title} coverage. Elevate your everyday living with premium surfaces",
            "description" => "Discover high-performance {CategoryName} for {title} Use by VitrA Tiles for perfect Floor Wall coverage. Elevate your everyday living with premium surfaces."
        ),
        "Texture" => array(
            "title" => "{title} {CategoryName} for Modern Spaces",
            //"description" => "Discover {title} tiles in the {CategoryName} collection by VitrA Tiles. Design with depth and shop our refined finishes for every interior",
            "description" => "Bring raw, urban character indoors with {title} {CategoryName} from VitrA—authentic matte surfaces that deliver depth and timeless appeal."
        ),
        "size" => array(
            "title" => "{title} Format {CategoryName} for Contemporary Homes",
            //"description" => "Explore {title} format {CategoryName} tiles by VitrA Tiles. Flexible sizes, elegant finishes, and timeless design for modern interior concepts",
            "description" => "The refined {title} Format {CategoryName} allows endless design possibilities, from subtle accents to bold feature walls."
        ),
        "Areaofuse" => array(
            "title" => "{CategoryName} for {title} Interiors",
            //"description" => "VitrA Tiles offers durable and stylish {CategoryName} tiles for your {title}. Shape your project with tailored surfaces built to inspire",
            "description" => "Elegant and long-lasting {CategoryName} for {title} Interiors"
        ),
        "product_type" => array(
            "title" => "{CollectionName} {title}",
            "description" => "Explore the iconic {CollectionName} series from VitrA Tiles. Curated tile design meets surface performance for interiors that speak your style"
        )
    );
    if($parent_id > 0 && isset($titleArray2[$type]))
    {
        if ($src == "title") 
        {
            $titleData = $titleArray2[$type]["title"];
            $titleData = str_replace("{CategoryName}", get_the_title($currentID), $titleData);
            $titleData = str_replace("{title}", $title, $titleData);
            //echo $titleData ."xxxxy".get_the_title($currentID).$parent_id;
            return $titleData . " | VitrA Tiles";
        } 
        else 
        {
            $titleData = $titleArray2[$type]['description'];
            $titleData = str_replace("{CategoryName}", get_the_title($currentID), $titleData);
            $titleData = str_replace("{title}", $title, $titleData);
            return $titleData;
        }

    }
   
    
    if ($src == "title") 
    {
        $titleData = $titleArray[$type]["title"]. " | VitrA Tiles";
        $titleData = str_replace("{title}", $title, $titleData);

    } 
    else 
    {
        $titleData = $titleArray[$type]['description'];
        $titleData = str_replace("{desc}", $title, $titleData);
    }
    /*
$titleData = $titleArray[$type];
    if (isset($titleData['category_name'])) {
        $titleData['category_name'] = get_the_title($parent_id);
    }
    if (isset($titleData['collection_name'])) {
        $titleData['collection_name'] = get_the_title($parent_id);
    }
*/

    return  $titleData ;
}

/*
Base Rule
Title Alternatifleri

{Category Name}  for Modern Interiors | VitrA 	Transform your space with premium {category name} from VitrA Tiles. Discover timeless style and visit the full collection and get offer today!
Get Offer For Stylish {Category Name} | VitrA 	Explore modern and durable {category name}  crafted by VitrA Tiles. Find your ideal surface solution and bring your project to life
Premium {Category Name}  Collection | VitrA 	VitrA Tiles offers elegant {category name} for every design need. Discover textures, colors, and finishes curated for inspired interiors



Usage Place = Floor

https://vitra.thecode.com.tr/products-list/?t-usage-place=floor

Title: High-Performance Tiles for Floor Use
Description: Need robust floor coverage? VitrA Tiles pairs high-traffic durability with refined aesthetics to enhance modern living spaces.

(Aynı URL iki kez listede yer aldığı için aynı başlık ve açıklama geçerlidir.)

Product Type = BetonX

https://vitra.thecode.com.tr/products-list/?product_type=betonx
Title: BetonX Concrete-Look Tiles
Description: Embrace industrial chic with BetonX—concrete-look porcelain tiles engineered for urban interiors that demand strength and style.

Brightness = Glossy

https://vitra.thecode.com.tr/products-list/?t-brightness=glossy
Title: Glossy Finish Tiles
Description: Add depth and luminosity with VitrA’s glossy-finish tiles. Reflective surfaces amplify light to create an airy, sophisticated ambience.

Area of Use = Pool

https://vitra.thecode.com.tr/products-list/?t-area-of-use=pool
Title: Pool-Grade Tiles for Wet Areas
Description: Slip-resistant, chemical-resilient pool tiles by VitrA ensure lasting beauty and secure grip for pools, spas, and other wet zones.

Size = 10×20 cm

https://vitra.thecode.com.tr/products-list/?t-size=10x20
Title: 10×20 cm Format Tiles for Contemporary Homes
Description: The versatile 10×20 cm format unlocks creative layouts in both compact and expansive rooms. Choose from a rich palette of colours and finishes.

Texture = Cement Texture

https://vitra.thecode.com.tr/products-list/?t-texture=cement_texture
Title: Cement Texture Tiles for Modern Spaces
Description: Bring raw, urban character indoors with cement-texture tiles from VitrA—authentic matte surfaces that deliver depth and timeless appeal

Başka bir varyasyon ya da ek filtre ihtiyacı olursa haberleşmek üzere,



/*
Title: {Color} {Category Name} for Modern Interiors
Description: Add character with {color} {category name} from VitrA Tiles. Find your tone, enhance your space, and visit the curated collection get offer today

Title: {Texture} {Category Name} for Modern Spaces
Description: Discover {texture} texture tiles in the {category name} collection by VitrA Tiles. Design with depth and shop our refined finishes for every interior

Title: {Brightness} Finish {Category Name} Tiles
Description: Brighten your space with {brightness} finish tiles from VitrA Tiles. Discover perfect light harmony and choose from our designer collection today

Title: {Category Name} for {Area of Use} Interiors
Description: VitrA Tiles offers durable and stylish {category name} tiles for your {area of use}. Shape your project with tailored surfaces built to inspire

Title: {Category Name}  for {Usage Place} Use	
Description: Discover high-performance {category name}  by VitrA Tiles for perfect {usage place} coverage. Elevate your everyday living with premium surfaces	

Title: {Size} {Category Name}  for Contemporary Homes
Description: Explore {size} format {category name} tiles by VitrA Tiles. Flexible sizes, elegant finishes, and timeless design for modern interior concepts

Title: {Collection Name} {Category Name} 
Desc : Explore the iconic {collection name} series from VitrA Tiles. Curated tile design meets surface performance for interiors that speak your style



//https://docs.google.com/spreadsheets/d/1SPydFAP42sZXYrDRQ7zUXlQGPzmfp0bM1WFLjBq3294/edit?gid=0#gid=0



@bende - session cookie'de secure,httponly attribute'ların eklenmesi - devam ediyor.
@bende - content security policy uygulanması - devam ediyor
- wordpress versiyonunun güncellenmesi - kapatılmış
- kullanılmayan wordpress pluginlerin disable edilmesi - mevcutta açık pluginler görünüyor fakat kullanıldığını beyan ediyorsanız güncel tutulması önemli
- /wp-admin/admin-ajax.php'e dışarıdan erişimin kapatılması - kapatılmış
- wp-cron.php'e dışarıdan erişimin kapatılması - kapatılmış
- versiyon bilgisi içerdiği için feed dizininin dışarıdan erişime kapatılması(saldırganlar bu şekilde versiyon bilgisini elde edip zafiyet tespit edebilir) – kapatılmış
*/
 
/*
add_action('send_headers', function() {
    $csp  = "default-src 'self'; ";
    $csp .= "script-src 'self' 'unsafe-inline' https://www.google.com https://www.gstatic.com https://www.youtube.com https://www.googletagmanager.com https://www.google-analytics.com https://gateway.efilli.com/ https://cdn.jsdelivr.net/ https://bundles.efilli.com/; ";
    $csp .= "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; ";
    $csp .= "img-src 'self' data: https://www.google.com https://www.gstatic.com https://www.google-analytics.com https://i.ytimg.com https://www.vitratiles.com; ";
    $csp .= "font-src 'self' https://fonts.gstatic.com data:; ";
    $csp .= "frame-src 'self' https://www.youtube.com https://www.google.com https://www.googletagmanager.com; ";
    $csp .= "connect-src 'self' https://www.google-analytics.com https://www.google.com https://www.googletagmanager.com https://cdn.jsdelivr.net https://gateway.efilli.com https://consent.efilli.com https://consent2.efilli.com https://ipapi.co;";
    $csp .= "object-src 'none'; ";
    $csp .= "base-uri 'self'; ";
    $csp .= "form-action 'self' https://www.google.com;";
    
    header("Content-Security-Policy: $csp");
});
*/

add_filter( 'http_request_timeout', function( $timeout ) {
    return 30; // saniye
});