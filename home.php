<?php
/* Template Name: Blog Page */

view('header/header');
$blog_page_id = get_option('page_for_posts');
$blog_page = get_post($blog_page_id);
?>

 <main class="todBlog page">
        <section class="hero">
            <div class="hero-container">
                <?= get_the_post_thumbnail($blog_page_id, 'full'); ?>
            </div>
            <div class="hero-content">
                <div class="container">
                    <h1><?= esc_html(get_the_title($blog_page)); ?></h1>
                     <?= apply_filters('the_content', $blog_page->post_content); ?>
                </div>
            </div>
        </section>
        <section class="todBlog-content">
            <div class="container">
                <div class="todBlog-content-wrapper">
                    <? 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 9,
                        'paged'          => $paged,
                        'post_status'    => 'publish',
                    );

                    $blog_query = new WP_Query($args);

                    if ($blog_query->have_posts()) :

                    while ($blog_query->have_posts()) : $blog_query->the_post();
                    
                    $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');

                    $categories = get_the_category();
                    $cat_name = !empty($categories) ? $categories[0]->name : 'Genel';
                    ?>
                    <article id="post-<? the_ID(); ?>" class="todBlogItem" style="--bg: url('<?= esc_url($thumb_url); ?>');">
                        <a href="<? the_permalink(); ?>" class="todBlogItem-permalink"></a>
                        <div class="todBlogItem-thumbnail">
                            <img src="<?= esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>">
                            <div class="badge">
                                <span><?= $cat_name ?></span>
                            </div>
                        </div>
                        <div class="todBlogItem-content">
                            <h3><? the_title(); ?></h3>
                             <? the_excerpt(); ?>
                        </div>
                    </article>
                    <?
                    endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </section>
         <div class="pagination">
            <a href="#" class="page-btn loadMoreBtn">
                LOAD MORE
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.0547 10.2188L12.9297 16.9219C12.6953 17.1562 12.4141 17.25 12.1797 17.25C11.8984 17.25 11.6172 17.1562 11.3828 16.9688L4.25781 10.2188C3.78906 9.79688 3.78906 9.09375 4.21094 8.625C4.63281 8.15625 5.33594 8.15625 5.80469 8.57812L12.1797 14.5781L18.5078 8.57812C18.9766 8.15625 19.6797 8.15625 20.1016 8.625C20.5234 9.09375 20.5234 9.79688 20.0547 10.2188Z" fill="#3D3935" />
                </svg>
            </a>
        </div>
    </main>


<?php
view('footer/footer');
?>