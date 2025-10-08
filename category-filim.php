<?php
/* Template Name: Production Category */

view('header/header');

$cat = get_queried_object();
$category_slug = $cat->post_name; 

?>

<main class="categoryPage page">
    <section class="hero">
        <div class="hero-container">
            <?php the_post_thumbnail('full'); ?>
        </div>

        <div class="hero-content">
            <div class="container">
                <h1><?= get_the_title() ?></h1>
                <p>
                    <?= get_the_content() ?>
                </p>
            </div>
        </div>
    </section>
    <section class="categoryPage-content">
        <div class="container">
            <div class="categoryPage-wrapper">

                <?
                // Döngü başlangıcı
                $args = [
                    'post_type'      => 'filim',
                    'posts_per_page' => 150,
                    'post_status'    => 'publish',
                    'tax_query'      => [
                        [
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => $category_slug,
                        ]
                    ],
                    //'meta_key'       => 'year',           // ACF alanı
                    'orderby'        => 'menu_order', // sayısal sıralama tetikleyici
                    'order'          => 'asc',
                ];

                $filim_query = new WP_Query($args);
                if ($filim_query->have_posts()):
                    //setup_postdata($post);      
                    while ($filim_query->have_posts()): $filim_query->the_post();
                        $post = get_post(); // Mevcut postu al

                        //
                        //print_r($post);
                ?>
                        <a href="<? the_permalink()?>" class="catItem">
                            <div class="catItem-thumbnail">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </div>
                            <div class="catItem-title">
                                <span>
                                    <? the_title(); ?>
                                </span>
                            </div>
                        </a>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata(); // Döngü sonrası global $post'u sıfırla
                ?>

            </div>
            <div class="pagination">
               <?/* <a href="#" class="page-btn loadMoreBtn">
                    LOAD MORE

                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.0547 10.2188L12.9297 16.9219C12.6953 17.1562 12.4141 17.25 12.1797 17.25C11.8984 17.25 11.6172 17.1562 11.3828 16.9688L4.25781 10.2188C3.78906 9.79688 3.78906 9.09375 4.21094 8.625C4.63281 8.15625 5.33594 8.15625 5.80469 8.57812L12.1797 14.5781L18.5078 8.57812C18.9766 8.15625 19.6797 8.15625 20.1016 8.625C20.5234 9.09375 20.5234 9.79688 20.0547 10.2188Z" fill="#3D3935" />
                    </svg>

                </a>*/?>
            </div>
        </div>
    </section>
</main>
<?php
//view('blocks/newsletter');
view('footer/footer');
?>