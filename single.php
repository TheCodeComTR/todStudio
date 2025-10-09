<?

view('header/header');


?>
    <main class="todSingleBlog">
        <?
        while ( have_posts() ) :
        the_post();

        $current_post_id = get_the_ID();
        $categories = get_the_category();
        $cat_name = !empty($categories) ? $categories[0]->name : 'Genel';

        $category_ids = wp_list_pluck( $categories, 'term_id' );

        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        ?>
        <section class="todSingleBlog-content todPost"  style="--bg: url('<?= $thumb_url ?>');">
            <div class="container">
                <div class="todPost-wrapper">
                    <div class="todPost-content">
                        <div class="todPost-content-header">
                            <h1><? the_title(); ?></h1>
                            <? the_excerpt(); ?>
                            <div class="badge">
                                <span>
                                   <?= $cat_name ?>
                                </span>
                            </div>
                        </div>
                        <div class="todPost-content-box">
                            <? the_content(); ?>
                        </div>
                    </div>
                    <div class="todPost-thumbnail">
                        <img src="<?= $thumb_url ?>" alt="">
                    </div>
                </div>
            </div>
        </section>
        <?
        endwhile;

        ?>
        <section class="todSingleBlog-related todRelated">
            <div class="todRelated-header">
                <div class="container">
                    <div class="todRelated-header-wrapper">
                        <span>
                        Related
                        </span>
                        <div class="todRelated-arrow">
                            <div class="todRelated-arrow-next">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 12H1.50391" stroke="#FFBC00" stroke-width="2"/>
                                    <path d="M19 12H16" stroke="#FFBC00" stroke-width="2"/>
                                    <path d="M24 12H21" stroke="#FFBC00" stroke-width="2"/>
                                    <path d="M9.5 20L1.5 12L9.5 4" stroke="#FFBC00" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="todRelated-arrow-prev">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12H22.4946" stroke="#FFBC00" stroke-width="2"/>
                                    <path d="M5 12H8" stroke="#FFBC00" stroke-width="2"/>
                                    <path d="M0 12H3" stroke="#FFBC00" stroke-width="2"/>
                                    <path d="M14.5 20L22.5 12L14.5 4" stroke="#FFBC00" stroke-width="2"/>
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <?
            if ( ! empty( $category_ids ) ) :

            $args = array(
                'category__in'   => $category_ids,
                'post__not_in'   => array( $current_post_id ),
                'posts_per_page' => 3,
                'orderby'        => 'rand',
            );

            $related_query = new WP_Query( $args );

            if ( $related_query->have_posts() ) :

            ?>
            <div class="todRelated-slider">
                <div class="container">
                    <div class="todRelated-swiper swiper">
                        <div class="swiper-wrapper">
                            <?
                            while ( $related_query->have_posts() ) : $related_query->the_post();

                            $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                            ?>
                            <div class="swiper-slide ">
                                <article class="todBlogItem" style="--bg: url('<?= esc_url( $thumb_url ); ?>');">
                                    <a href="<?=  the_permalink(); ?>" class="todBlogItem-permalink"></a>
                                    <div class="todBlogItem-thumbnail">
                                        <img src="<?= esc_url( $thumb_url ); ?>" alt="">
                                        <div class="badge">
                                            <span><?= esc_html( $cat_name ); ?></span>
                                        </div>
                                    </div>
                                    <div class="todBlogItem-content">
                                        <h3><? the_title(); ?></h3>
                                        <? the_excerpt(); ?>
                                    </div>
                                </article>
                            </div>
                            <?
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?
            endif;
        endif;
            ?>
        </section>
    </main>
<?php

?>
<?php
view('footer/footer');
?>