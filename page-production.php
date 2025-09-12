<?php
/* Template Name: Production List */

view('header/header');
?>

<main>
    <section class="hero">
        <div class="hero-container">
            <img src="<?= asset('images/hero_section.jpg') ?>" alt="hero">
        </div>
        <div class="hero-content">
            <h1><?=get_the_title();?></h1>
            <?=get_the_content();?>
        </div>
    </section>
    <?php
    $categories = ['series', 'life-style', 'kids'];

    foreach ($categories as $cat_slug):
        $category = get_category_by_slug($cat_slug);
        if (!$category) continue;

        $args = [
            'post_type'      => 'filim',
            'posts_per_page' => 5,
            'post_status'    => 'publish',
            'tax_query'      => [
                [
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => $cat_slug,
                ]
            ],
        ];

        $filim_query = new WP_Query($args);
        if (!$filim_query->have_posts()) continue;
    ?>


        <section class="productions">
            <div class="productions-header">
                <div class="productions-header-left">
                    <h2><?= esc_html($category->name) ?></h2>
                    <p><?= esc_html($category->description) ?></p>
                </div>
                <div class="productions-header-right">
                    <button class="slider-prev">
                        <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                    </button>
                    <button class="slider-next">
                        <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                    </button>
                </div>
            </div>
            <div class="custom-slider <?= esc_attr($cat_slug) ?>-slider">
                <div class="slider-viewport">
                    <div class="slider-track">
                        
                        <?php while ($filim_query->have_posts()): $filim_query->the_post(); ?>
                            <div class="slider-slide">
                                <div class="slider-slide-content" style="--bg-image: url('<?= has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : asset('images/placeholder.png') ?>');">
                                    <div class="slider-slide-left">
                                        <img src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : asset('images/placeholder.png') ?>" alt="production">
                                    </div>
                                    <div class="slider-slide-right">
                                        <div class="slider-slide-right-header">
                                            <h3><?php the_title(); ?></h3>
                                            <?php the_content( ); ?>
                                        </div>
                                        <div class="slider-slide-right-content">
                                            <div class="slider-slide-right-content-item">
                                                <div class="slider-slide-right-content-item-left">
                                                    <img src="<?= asset('images/director.svg') ?>" alt="director">
                                                </div>
                                                <div class="slider-slide-right-content-item-right">
                                                    <div class="slider-slide-right-content-item-header">
                                                        Directors
                                                    </div>
                                                    <div class="slider-slide-right-content-item-content">
                                                        Mustafa Kotan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider-slide-right-content-item">
                                                <div class="slider-slide-right-content-item-left">
                                                    <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                                </div>
                                                <div class="slider-slide-right-content-item-right">
                                                    <div class="slider-slide-right-content-item-header">
                                                        Cast
                                                    </div>
                                                    <div class="slider-slide-right-content-item-content">
                                                        Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider-slide-right-content-item-flex">
                                                <div class="slider-slide-right-content-item-flex-item">
                                                    <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                                    Thriller
                                                </div>
                                                <div class="slider-slide-right-content-item-flex-item">
                                                    <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                                    2022
                                                </div>
                                                <div class="slider-slide-right-content-item-flex-item">
                                                    <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                                    01.48
                                                </div>
                                            </div>

                                            <div class="see-details">
                                                <a href="<?php the_permalink(); ?>">
                                                    SEE DETAILS
                                                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </section>

    <?php wp_reset_postdata();
    endforeach; ?>

</main>
<?php
//view('blocks/newsletter');
view('footer/footer');
?>