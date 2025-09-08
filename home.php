<?php
view('header/header');
//get slider
$title = get_the_title(get_option('page_for_posts'));
$posts_page_id = get_option('page_for_posts');
$slider = get_field("blogSlider", $posts_page_id);
$categories = get_categories();
//print_r($categories);
?>

<section class="blog">
    <?php 
    //slider
    if( $slider ){
        ?>
        <div class="blog__slider">
            <div class="swiper singleBasin__slider__box">
                <div class="swiper-wrapper">
                    <?php 
                        foreach( $slider as $item){
                    ?>
                    <div class="swiper-slide singleBasin__slider__item">
                        <a href="<?= $item['sliderlink'] ?>"></a>
                        <img src="<?= $item['sliderimg'] ?>" alt="">
                        <div class="content">
                            <span><?= $item['text'] ?></span>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
                <div class="singleBasin__slider__navs">
                    <div class="swiper-button-prev"><img src="assets/img/svg/slider-arrow-left-dark.svg" alt=""></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"><img src="assets/img/svg/slider-arrow-right-dark.svg" alt=""></div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
        <div class="container">
            <div class="blog__wrapper">
                <div class="blog__title">
                    <h2>
                    <?= $title ?>
                    </h2>
        
                    <p>
                       <?
                       $page_for_posts_id = get_option('page_for_posts');
                       echo get_post_field( 'post_content', $page_for_posts_id );
                       ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="blog__tab">
            <a href="#" class="blog__tab__item active">
                <span>
                    Trending content
                </span>
            </a>
            <a href="#" class="blog__tab__item">
                <span>
                    Inspiration gallery
                </span>
            </a>
        </div>
        <div class="container">
            <div class="blog__content">
                <?php 
                foreach ($categories as $category) {
                   //print_r($posts);
                   //print_r($category);
                    ?>
                <div class="blog__card">
                    <div class="blog__card__header">
                        <span>
                        <?= esc_html($category->name) ?>
                        </span>
                        <?php /*
                        <a href="<?= get_category_link($category->term_id) ?>">View all</a>
                        */
                        ?>
                    </div>
                    <div class="blog__card__content">
                        <?php 
                            $args = array(
                                'category' => $category->term_id,
						        'posts_per_page' => 10,
                                'post_status' => 'publish',
                            );
                            $postsx = get_posts($args);
					   //print_r($posts);
                            if ($postsx) {
                                foreach ($postsx as $post) {
                                    setup_postdata($post);
                        ?>
                        <article class="blog__posts">
                            <a href="<?= get_permalink($post->ID) ?>">
                                <?php
                                    $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'medium_large');
                                ?>
                                <img src="<?= $thumbnail_url ?>" alt="">
                                <span><?= get_the_title($post->ID) ?></span>
                            </a>
                        </article>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php                    
                }
                ?>
            </div>
        </div>
</section>

<?php
view('footer/footer');
?>