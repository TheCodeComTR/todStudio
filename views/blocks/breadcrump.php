<?php

    /* breadcrump */
    $langcode = ICL_LANGUAGE_CODE == "en" ? 'title' : 'tr-title';
    global $post;
    $parents     = isset($post->post_parent)?get_the_title($post->post_parent):"";
    $getTitle    = get_the_title(); //Transliterator::create($langcode)->transliterate(get_the_title());
    $parentTitle =  Transliterator::create($langcode)->transliterate($parents);
    $colURl =  ICL_LANGUAGE_CODE == "en" ? '/collection/' : 'collection/';

?>



<section class="breadcrumb">

    <div class="container">

        <div class="breadcrumb__wrapper">

            <ol>
                <?php 
                echo '<li class="home"><a href="' . home_url() . '"><span>'.__("Home","TheCode").'</span></a></li>';
                    if (!is_front_page() && is_home()) {
                        /*if ($post->post_parent) 
                        {
                            echo ' <li><img src="' . asset('img/svg/LineArrowRight.svg') . '" alt=""><a data-id="parent" href="' . get_permalink($post->post_parent) . '"><span>' . $parentTitle . '</span></a></li>';
                        }*/
                        echo '<li data-id="ishome" ><h1>' . get_queried_object()->post_title . '</h1></li>';
                    } else if (is_category() || is_single()) {
                        /*
                        $categoriesBread = get_the_category();
                        if ($categoriesBread) {
                            $category_names = array();
                            foreach ($categoriesBread as $categoryBreadItem) {
                                $category_names[] = '<a href="' . esc_url(get_category_link($categoryBreadItem->term_id)) . '"><span>' . esc_html($categoryBreadItem->name) . '</span></a>';
                            }
                            echo '<li>' . implode(', ', $category_names) . '</li>';
                        }
                        */
                        //get_the_category(' &bull; ');
                        if (is_single()) {
                            //print_r($page);
                            if ($post->post_parent) {
                                echo ' <li><a data-id="parent" href="' . get_permalink($post->post_parent) . '"><span>' . $parentTitle . '</span></a></li>';
                            } else if($post->post_type == 'collection'){
                                echo ' <li><a data-id="collections" href="' . home_url() . $colURl.'"><span>'.__("Collections","TheCode").'</span></a></li>';
                            }
                            
                            //$nokta = strlen($getTitle)> 24?"...":"";
                            echo '<li data-id="single" class="active"><h1>' . $parents .'</h1></li>';
                        }
                    } elseif (is_archive()) {
                        echo ' <li data-id="archive" class="active"><h1>' . $getTitle . '</h1></li>';
                    } elseif (is_page()) {
                        if ($post->post_parent) {
                            echo ' <li><a data-id="parent" href="' . get_permalink($post->post_parent) . '"><span>' . $parentTitle . '</span></a></li>';
                        }
                        echo ' <li data-id="child2" class="active"><h1>' . $getTitle . '</h1></li>';
                    } elseif (is_search()) {
                        echo ' <li id="search"> <span>' . get_search_query() . '</span></li>';
                    }
                    elseif (is_404()) {
                        echo '<li data-id="404" class="active"><h1> 404</h1></li>';
                    }
                    
                    ?>

            </ol>

        </div>

    </div>



</section>