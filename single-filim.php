<?php
/* Template Name: Production Detail */

view('header/header');
$seasons = get_field('film_block');
//print_r($seasons);
/*
$video = get_field("trailer");
$mimg  = get_field("main-img");
$director = get_field("director");
$scriprwriter = get_field("scriprwriter");
$cast = get_field("cast");
$presented = get_field("presented");
$genre = get_field("genre");
$language = get_field("language");
$episode = get_field("episode");
$year = get_field("year");
$company = get_field("company");

$awards = get_field("awards");
$subtitles = get_field("subtitles");
$audio_languages = get_field("audio_languages");
$thumbnails = get_field("thumbnails");
$related = get_field("related");

$season = get_field("season");


if (is_array($video)) {
    $trailer = $video[0]['url'];
}
    */
?>
<style>
    .pd-related-swiper .swiper-slide {
        width: 289px;
        height: auto;

    }

    .pd-related .pd-related-card img {
        width: auto;
        height: 413px;
    }

    .pd-main .hero .hero-container img,
    .hero .hero-container video {
        object-fit: contain;
    }

    .hero .hero-container {
        background-color: black;
    }
</style>
<main class="pd-main">
    <!-- Hero (same structure as index.html, image replaced with video) -->
    <section class="hero">
        <div class="hero-container">
            <div class="swiper swiperHero">
                <div class="swiper-wrapper">
                    <?
                    foreach( $seasons as $season) {
                        $imageMobile = $season['hero_mobile'];
                        $imageDesktop = $season['hero'];
                        $trailer = $season['video'];
                    ?>
                    <div class="swiper-slide">
                        <video src="<?= $trailer ?>" muted  loop playsinline preload="metadata" poster="<?= $imageDesktop ?>"></video>
                    </div>
                    <?
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="hero-content">
            <h1 id="detail-title"><?= get_the_title(); ?></h1>
            <?= get_the_content(); ?>
        </div>
    </section>

    <!-- Info grid -->
    <section class="pd-info">
        <div class="pd-info-card">
            <div class="pd-info-icon"><img src="<?= asset('images/director.svg') ?>" alt="directors"></div>
            <div class="pd-info-text">
                <div class="pd-info-title">Directors</div>
                <div class="pd-info-value" id="detail-directors"><?= $director ?></div>
            </div>
        </div>
        <div class="pd-info-card">
            <div class="pd-info-icon"><img src="<?= asset('images/writer.svg') ?>" alt="scriptwriter"></div>
            <div class="pd-info-text">
                <div class="pd-info-title">Scriptwriter</div>
                <div class="pd-info-value" id="detail-scriptwriter"><?= $scriprwriter ?></div>
            </div>
        </div>
        <div class="pd-info-card">
            <div class="pd-info-icon"><img src="<?= asset('images/cast.svg') ?>" alt="cast"></div>
            <div class="pd-info-text">
                <div class="pd-info-title">Cast</div>
                <div class="pd-info-value" id="detail-cast"><?= $cast ?></div>
            </div>
        </div>
        <div class="pd-info-card pd-info-stats">
            <ul>
                <? if ($episode): ?>
                    <li>
                        <img src="<?= asset('images/genre.svg') ?>" alt="genre">
                        <div class="pd-info-kv">
                            <div class="pd-info-kv-label">GENRE</div>
                            <div class="pd-info-kv-value" id="detail-genre"><?= $genre ?></div>
                        </div>
                    </li>
                <?
                endif;
                if ($episode): ?>
                    <li>
                        <img src="<?= asset('images/episodes.svg') ?>" alt="total episodes">
                        <div class="pd-info-kv">
                            <div class="pd-info-kv-label">TOTAL EPISODES</div>
                            <div class="pd-info-kv-value" id="detail-total"><?= $episode ?></div>
                        </div>
                    </li>
                <?
                endif;
                if ($year): ?>
                    <li>
                        <img src="<?= asset('images/year-of-production.svg') ?>" alt="year of production">
                        <div class="pd-info-kv">
                            <div class="pd-info-kv-label">YEAR OF PRODUCTION</div>
                            <div class="pd-info-kv-value" id="detail-year"><?= $year ?></div>
                        </div>
                    </li>
                <?
                endif;
                ?>
                <?
                if ($company): ?>
                    <li>
                        <img src="<?= asset('images/company.svg') ?>" alt="production company">
                        <div class="pd-info-kv">
                            <div class="pd-info-kv-label">PRODUCTION COMPANY</div>
                            <div class="pd-info-kv-value" id="detail-company"><?= $company ?></div>
                        </div>
                    </li>
                <? endif;
                ?>
                <?
                if ($presented): ?>
                    <li>
                        <img src="<?= asset('images/company.svg') ?>" alt="production company">
                        <div class="pd-info-kv">
                            <div class="pd-info-kv-label">Presented by</div>
                            <div class="pd-info-kv-value"><?= $presented ?></div>
                        </div>
                    </li>
                <? endif;
                if ($language == ""):
                ?>
                    <li>
                        <img src="<?= asset('images/languages.svg') ?>" alt="awards">
                        <div class="pd-info-kv">
                            <div class="pd-info-kv-label">Orginal language</div>
                            <div class="pd-info-kv-value"><?= $language ?></div>
                        </div>
                    </li>
                <?
                endif;
                ?>
            </ul>
        </div>
    </section>
<?
if($seasons){
?>
    <section class="pd-related">
        <h2>Season</h2>
        <div class="swiper pd-related-swiper">
            <div class="swiper-wrapper">

                <? foreach ($seasons as $key => $seasonx) { ?>
                    <div class="swiper-slide">
                        <a 
                            href="#" 
                            class="pd-related-card",
                            data-image="<?= $seasonx['hero'] ?>"
                            data-title="<?= $seasonx['name'] ?>"
                            data-about="<?= $seasonx['about_film'] ?>"
                            data-directors="<?= $seasonx['directors'] ?>"
                            data-scriptwriter="<?= $seasonx['scriptwriter'] ?>"
                            data-cast="<?= $seasonx['cast'] ?>"
                            data-genre="<?= $seasonx['genre'] ?>"
                            data-total_episodes="<?= $seasonx['total_episodes'] ?>"
                            data-year_of_production="<?= $seasonx['year_of_production'] ?>"
                            data-production_company="<?= $seasonx['production_company'] ?>"
                        >
                        
                            <img src="<?= $seasonx['hero_mobile'] ?>" alt="thumb <?= $key + 1 ?>">
                            <span class="pd-related-caption"><?= $seasonx['name'] ?> SEASON</span>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="pd-related-pagination"></div>
        </div>
    </section>
<?
}
?>
<?
/*
if ($season):
?>
    <section class="pd-related">
        <h2>Season</h2>
        <div class="swiper pd-related-swiper">
            <div class="swiper-wrapper">

                <? foreach ($season as $key => $seasonx) { ?>
                    <div class="swiper-slide">
                        <a href="#" class="pd-related-card">
                            <img src="<?= $seasonx['image'] ?>" alt="thumb <?= $key + 1 ?>">
                            <span class="pd-related-caption"><?= $seasonx['name'] ?> SEASON</span>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="pd-related-pagination"></div>
        </div>
    </section>
<?endif;
*/?>
    <?/*
    <!-- Subtitles / audio languages -->
    <section class="pd-badges" style="display: none;">
        <div class="pd-badge">
            <img src="<?= asset('images/subtitles.svg') ?>" alt="subtitles">
            <div class="pd-badge-body">
                <div class="pd-badge-label">SUBTITLES</div>
                <div class="pd-badge-text">English (CC), Türkçe, Dansk, Deutsch, Español (España), Español (Latinoamérica), Français, Indonesia, Italiano, Magyar, Nederlands, Norsk Bokmål, Polski, Português (Brasil), Português (Portugal), Română, Suomi, Svenska, Čeština, Ελληνικά, Русский, עברית, हिन्दी, ไทย, 한국어, 日本語</div>
            </div>
        </div>
        <div class="pd-badge">
            <img src="<?= asset('images/languages.svg') ?>" alt="audio languages">
            <div class="pd-badge-body">
                <div class="pd-badge-label">AUDIO LANGUAGES</div>
                <div class="pd-badge-text">English, English [Audio Description], English Dialogue Boost: Medium, English Dialogue Boost: High, Türkçe, Dansk, Deutsch, Español (España), Español (Latinoamérica), Français, Italiano, Magyar, Nederlands, Norsk Bokmål, Polski, Português (Brasil), Português (Portugal), Română, Suomi, Svenska, Čeština, Ελληνικά, Русский, Українська, עברית, हिन्दी, ไทย, 한국어</div>
            </div>
        </div>
    </section>

    <!-- Thumbnails / video gallery -->
    <section class="pd-gallery" style="display: none;">
        <div class="pd-gallery-row">
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/07c93a65909c1e6ee5d36b65240600534a2c622a.jpg') ?>" alt="thumb 1"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/913c086623de2819792b081fb0100fc95b348f2a.jpg') ?>" alt="thumb 2"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/b576fffebc802b461800cfb30fbb260de90c36de.jpg') ?>" alt="thumb 3"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/63021997dca35d3a6210e3c021d74b30429eecd8%20(1).jpg') ?>" alt="thumb 4"></div>
        </div>
        <div class="pd-gallery-row">
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/63021997dca35d3a6210e3c021d74b30429eecd8.jpg') ?>" alt="thumb 5"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/cd102407b0449f81f6468abe99ec133c8fa2b8e2.jpg') ?>" alt="thumb 6"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/06785d709bbdfa48f6ca820f57fc1b69a0e99115.jpg') ?>" alt="thumb 7"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/da7b49d504832c10917ad17f7750c2ecdc8377de.jpg') ?>" alt="thumb 8"></div>
        </div>
        <div class="pd-gallery-row is-collapsible" id="pd-more-row">
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/07c93a65909c1e6ee5d36b65240600534a2c622a.jpg') ?>" alt="thumb 9"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/913c086623de2819792b081fb0100fc95b348f2a.jpg') ?>" alt="thumb 10"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/b576fffebc802b461800cfb30fbb260de90c36de.jpg') ?>" alt="thumb 11"></div>
            <div class="pd-thumb"><img src="<?= asset('images/thumbs/cd102407b0449f81f6468abe99ec133c8fa2b8e2.jpg') ?>" alt="thumb 12"></div>
        </div>
        <div class="pd-gallery-fade" id="pd-gallery-fade"></div>
        <div class="pd-show-more">
            <button id="pd-show-more-btn">
                <img src="<?= asset('images/show-more.svg') ?>" alt="arrow"><span class="label">SHOW MORE</span>
            </button>
        </div>
    </section>
    */ ?>
    <?php
    $current_id = get_the_ID();
    $categories = wp_get_post_categories($current_id);
    //print_r($categories);
    $args = [
        'post_type'      => 'filim',
        'posts_per_page' => 20,
        'post__not_in'   => [$current_id],
        'category__in'   => $categories
    ];

    $related_query = new WP_Query($args);

    if ($related_query->have_posts()): ?>
        <!-- Related -->
        <section class="pd-related">
            <h2>Related</h2>
            <div class="swiper pd-related-swiper">
                <div class="swiper-wrapper">

                    <?php while ($related_query->have_posts()): $related_query->the_post(); ?>
                        <div class="swiper-slide">
                            <a href="<?php the_permalink(); ?>" class="pd-related-card">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php endif; ?>
                                <span class="pd-related-caption"><?php the_title(); ?></span>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="pd-related-pagination"></div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Video modal -->
    <div class="pd-video-modal" id="pd-video-modal" aria-hidden="true">
        <div class="pd-video-backdrop" id="pd-video-backdrop"></div>
        <div class="pd-video-dialog" role="dialog" aria-modal="true">
            <button class="pd-video-close" id="pd-video-close" aria-label="Close">
                <img src="<?= asset('images/close-button.svg') ?>" alt="close">
            </button>
            <video id="pd-video" controls playsinline preload="metadata"></video>
        </div>
    </div>
</main>
<?php
//view('blocks/newsletter');
view('footer/footer');
?>