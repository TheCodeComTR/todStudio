<?php
/* Template Name: Production Detail */

view('header/header');
$seasons = get_field('film_block');
$seasonData = json_encode($seasons);

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


$filmArray['director'] = $director;
$filmArray['scriptwriter'] = $scriprwriter;
$filmArray['cast'] = $cast;
$filmArray['genre'] = $genre;
$filmArray['year'] = $year;
$filmArray['episode'] =  preg_replace('/(Season\s*\d+)/', '<br>$1', $episode);//$episode;
$filmArray['company'] = $company;
$filmArray['presented'] = $presented;
$filmArray['language'] = $language;
$filmArray = array_filter($filmArray);


$titleArray['director'] = "Directors";
$titleArray['scriptwriter'] = "Scriptwriter";
$titleArray['cast'] = "Cast";
$titleArray['genre'] = "Genre";
$titleArray['episode'] = "Total Episodes";
$titleArray['year'] = "Year of Production";
$titleArray['company'] = "Production Company";
$titleArray['presented'] = "Presented by";
$titleArray['language'] = "Orginal language";

if (is_array($video)) {
  $trailer = $video[0]['url'];
}

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
<script type="text/javascript">
  const seasonData = <?= $seasonData ?>;
  //console.log(seasonData);
</script>

<main class="pd-main">
  <!-- Hero (same structure as index.html, image replaced with video) -->
  <section class="hero">
    <div class="hero-container">
      <div class="swiper swiperHero">
        <div class="swiper-wrapper">
          <?
          if (is_array($seasons)) {

            foreach ($seasons as $season) {
              $imageMobile = $season['hero_mobile'];
              $imageDesktop = $season['hero'];
              $trailer = $season['video'];

              $poster = wp_is_mobile() ? $imageMobile : $imageDesktop;
          ?>
              <div class="swiper-slide">
                <?
                if ($trailer != "") {
                ?>
                  <media-theme
                    template="media-theme-sutro"
                    style=" height: 810px; width: 100%;--media-primary-color: #ffffff; --media-secondary-color: #ffffff; --media-accent-color: #ffffff;">
                    <video
                      slot="media"
                      src="<?= $trailer ?>"
                      playsinline
                      autoplay
                      muted
                      crossorigin="anonymous"
                      poster="<?= esc_url($poster) ?>"></video>
                  </media-theme>
                <?
                } else {
                ?>
                  <img src="<?= esc_url($poster) ?>" alt="hero image">
                <? } ?>
              </div>
            <?
            }
          } else { ?>
            <div class="swiper-slide">
              <?
              if (isset($video[0]['url']) && $video[0]['url'] != "") {

              ?>
                <media-theme
                  template="media-theme-sutro"
                  style=" height: 810px; width: 100%;--media-primary-color: #ffffff; --media-secondary-color: #ffffff; --media-accent-color: #ffffff;">
                  <video src="<?= $trailer ?>" autoplay muted loop playsinline preload="metadata" poster="<?= esc_url($mimg) ?>"></video>
                </media-theme>
              <? } else { ?>
                <img src="<?= esc_url($mimg) ?>" alt="hero image">
              <? } ?>
            </div>
          <?
          }
          ?>
        </div>
        <?
        if (is_array($seasons) && count($seasons) > 1)
        {
        ?>
        <div class="pd-related-pagination"></div>
        <?}?>
        <div class="singleFilmArrow">
          <div class="singleFilmArrow-next ">
            <img src="<?= asset('images/arrow_white.svg') ?>" alt="">
          </div>
          <div class="singleFilmArrow-prev">
            <img src="<?= asset('images/arrow_white.svg') ?>" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="hero-content">
      <h1 id="detail-title"><?= get_the_title(); ?></h1>
      <div id="detail-about"><?= get_the_content(); ?></div>
    </div>
  </section>

  <!-- Info grid -->

  <section class="pd-info">

    <?
    $art = 0;
    $totalArray = count($filmArray);
    foreach ($filmArray as $key => $value) {

      ++$art;
    ?>
      <div class="pd-info-card" data-id="<?= $totalArray ?>">
        <div class="pd-info-icon"><img src="<?= asset('images/' . $key . '.svg') ?>" alt="<?= $key ?>"></div>
        <div class="pd-info-text">
          <div class="pd-info-title"><?= $titleArray[$key] ?></div>
          <div class="pd-info-value" id="detail-<?= $key ?>"><?= $value ?></div>
        </div>
      </div>
    <?
      unset($filmArray[$key]);
      if ($totalArray > 4 && $art  == 3) 
      {
       break;
      }
      
    }
    ?>

    <?
    if($totalArray > 4){ 
    ?>

    <div class="pd-info-card pd-info-stats">
      <ul>
        <?
        foreach ($filmArray as $key => $value) {
          if ($value == "")  continue;
        ?>

          <li>
            <img src="<?= asset('images/' . $key . '.svg') ?>" alt="<?= $key ?>">
            <div class="pd-info-kv">
              <div class="pd-info-kv-label"><?= $titleArray[$key] ?></div>
              <div class="pd-info-kv-value" id="detail-<?= $key ?>"><?= $value ?></div>
            </div>
          </li>
        <? } ?>
      </ul>
    </div>
    <?
    }
    ?>
  </section>
  <?
  if ($seasons) {
  ?>
    <section class="pd-related">
      <h2>Season</h2>
      <div class="swiper pd-related-swiper">
        <div class="swiper-wrapper">

          <? foreach ($seasons as $key => $seasonx) { ?>
            <div class="swiper-slide">
              <a
                href="#"
                class="pd-related-card" ,
                data-key="<?= $key ?>">
                <img src="<?= $seasonx['hero_mobile'] ?>" alt="thumb <?= $key + 1 ?>">
                <span class="pd-related-caption"><?= $seasonx['name'] ?></span>
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
*/ ?>
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
      <div class="swiperHasArrow-box">
        <div class="swiper-button-next">
          <img src="<?= asset('images/arrow_white.svg') ?>" alt="">
        </div>
        <div class="swiper-button-prev">
          <img src="<?= asset('images/arrow_white.svg') ?>" alt="">
        </div>
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

<script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome/+esm"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome/menu/+esm"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome/media-theme-element/+esm"></script>

<template id="media-theme-sutro">
  <!-- Sutro -->
  <style>
    :host {
      --_primary-color: var(--media-primary-color, #fff);
      --_secondary-color: var(--media-secondary-color, transparent);
      --_accent-color: var(--media-accent-color, #fff);
    }

    media-controller {
      --base: 18px;

      font-size: calc(0.75 * var(--base));
      font-family: Roboto, Arial, sans-serif;
      --media-font-family: Roboto, helvetica neue, segoe ui, arial, sans-serif;
      -webkit-font-smoothing: antialiased;

      --media-primary-color: #fff;
      --media-secondary-color: transparent;
      --media-menu-background: rgba(28, 28, 28, 0.6);
      --media-text-color: var(--_primary-color);
      --media-control-hover-background: var(--media-secondary-color);

      --media-range-track-height: calc(0.125 * var(--base));
      --media-range-thumb-height: var(--base);
      --media-range-thumb-width: var(--base);
      --media-range-thumb-border-radius: var(--base);

      --media-control-height: calc(2 * var(--base));
    }

    media-controller[breakpointmd] {
      --base: 20px;
    }

    /* The biggest size controller is tied to going fullscreen
        instead of a player width. */
    media-controller[mediaisfullscreen] {
      --base: 24px;
    }

    .media-button {
      /* --media-control-hover-background: var(--_secondary-color); */
      --media-tooltip-background: rgb(28 28 28 / .24);
      --media-text-content-height: 1.2;
      --media-tooltip-padding: .7em 1em;
      --media-tooltip-distance: 8px;
      --media-tooltip-container-margin: 18px;
      position: relative;
      padding: 0;
      opacity: 0.9;
      transition: opacity 0.1s cubic-bezier(0.4, 0, 1, 1);
    }

    .media-button svg {
      fill: none;
      stroke: var(--_primary-color);
      stroke-width: 1;
      stroke-linecap: 'round';
      stroke-linejoin: 'round';
    }

    svg .svg-shadow {
      stroke: #000;
      stroke-opacity: 0.15;
      stroke-width: 2px;
      fill: none;
    }
  </style>

  <media-controller
    breakpoints="md:480"
    defaultsubtitles="{{defaultsubtitles}}"
    defaultduration="{{defaultduration}}"
    gesturesdisabled="{{disabled}}"
    hotkeys="{{hotkeys}}"
    nohotkeys="{{nohotkeys}}"
    defaultstreamtype="on-demand">
    <slot name="media" slot="media"></slot>
    <slot name="poster" slot="poster"></slot>
    <slot name="centered-chrome" slot="centered-chrome"></slot>
    <media-error-dialog slot="dialog"></media-error-dialog>

    <!-- Controls Gradient -->
    <style>
      .media-gradient-bottom {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: calc(8 * var(--base));
        pointer-events: none;
      }

      .media-gradient-bottom::before {
        content: '';
        --gradient-steps: hsl(0 0% 0% / 0) 0%, hsl(0 0% 0% / 0.013) 8.1%, hsl(0 0% 0% / 0.049) 15.5%,
          hsl(0 0% 0% / 0.104) 22.5%, hsl(0 0% 0% / 0.175) 29%, hsl(0 0% 0% / 0.259) 35.3%, hsl(0 0% 0% / 0.352) 41.2%,
          hsl(0 0% 0% / 0.45) 47.1%, hsl(0 0% 0% / 0.55) 52.9%, hsl(0 0% 0% / 0.648) 58.8%, hsl(0 0% 0% / 0.741) 64.7%,
          hsl(0 0% 0% / 0.825) 71%, hsl(0 0% 0% / 0.896) 77.5%, hsl(0 0% 0% / 0.951) 84.5%, hsl(0 0% 0% / 0.987) 91.9%,
          hsl(0 0% 0%) 100%;

        position: absolute;
        inset: 0;
        opacity: 0.7;
        background: linear-gradient(to bottom, var(--gradient-steps));
      }
    </style>
    <div class="media-gradient-bottom"></div>

    <!-- Settings Menu -->
    <style>
      media-settings-menu {
        --media-menu-icon-height: 20px;
        --media-menu-item-icon-height: 20px;
        --media-settings-menu-min-width: calc(10 * var(--base));
        --media-menu-transform-in: translateY(0) scale(1);
        --media-menu-transform-out: translateY(20px) rotate(3deg) scale(1);
        padding-block: calc(0.15 * var(--base));
        margin-right: 10px;
        margin-bottom: 17px;
        border-radius: 8px;
        z-index: 2;
        user-select: none;
      }

      media-settings-menu-item,
      [role='menu']::part(menu-item) {
        --media-icon-color: var(--_primary-color);
        margin-inline: calc(0.45 * var(--base));
        height: calc(1.6 * var(--base));
        font-size: calc(0.7 * var(--base));
        font-weight: 400;
        padding: 0;
        padding-left: calc(0.4 * var(--base));
        padding-right: calc(0.1 * var(--base));
        border-radius: 6px;
        text-shadow: none;
      }

      [slot='submenu']::part(back button) {
        font-size: calc(0.7 * var(--base));
      }

      media-settings-menu-item:hover {
        --media-icon-color: #000;
        color: #000;
        background-color: #fff;
      }

      media-settings-menu-item:hover [slot='submenu']::part(menu-item),
      [slot='submenu']::part(back indicator) {
        --media-icon-color: var(--_primary-color);
      }

      media-settings-menu-item:hover [slot='submenu']::part(menu-item):hover {
        --media-icon-color: #000;
        color: #000;
        background-color: #fff;
      }

      media-settings-menu-item[submenusize='0'] {
        display: none;
      }

      /* Also hide if only 'Auto' is added. */
      .quality-settings[submenusize='1'] {
        display: none;
      }
    </style>
    <media-settings-menu hidden anchor="auto">
      <media-settings-menu-item>
        Playback Speed
        <media-playback-rate-menu slot="submenu" hidden>
          <div slot="title">Playback Speed</div>
        </media-playback-rate-menu>
      </media-settings-menu-item>
      <media-settings-menu-item class="quality-settings">
        Quality
        <media-rendition-menu slot="submenu" hidden>
          <div slot="title">Quality</div>
        </media-rendition-menu>
      </media-settings-menu-item>
      <media-settings-menu-item>
        Subtitles/CC
        <media-captions-menu slot="submenu" hidden>
          <div slot="title">Subtitles/CC</div>
        </media-captions-menu>
      </media-settings-menu-item>
    </media-settings-menu>

    <!-- Control Bar -->
    <style>
      media-control-bar {
        position: absolute;
        height: calc(2 * var(--base));
        line-height: calc(2 * var(--base));
        bottom: var(--base);
        left: var(--base);
        right: var(--base);
      }
    </style>
    <media-control-bar>
      <!-- Play/Pause -->
      <style>
        @keyframes bounce-scale-play {
          0% {
            transform: scale(0.75, 0.75);
          }

          50% {
            transform: scale(115%, 115%);
          }

          100% {
            transform: scale(1, 1);
          }
        }

        .media-button {
          border-radius: 25%;
          backdrop-filter: blur(10px) invert(15%) brightness(80%) opacity(0);
          -webkit-backdrop-filter: blur(10px) invert(15%) brightness(80%) opacity(0);
          transition: backdrop-filter 0.3s, -webkit-backdrop-filter 0.3s, box-shadow 0.3s;
        }

        .media-button:hover {
          /* background-color: rgba(0, 0, 0, 0.05); */
          box-shadow: rgba(0, 0, 0, 0.3) 0px 0px 5px;
          /* hue-rotate(120deg) */
          backdrop-filter: blur(10px) invert(15%) brightness(80%) opacity(1);
          -webkit-backdrop-filter: blur(10px) invert(15%) brightness(80%) opacity(1);
          transition: backdrop-filter 0.3s, -webkit-backdrop-filter 0.3s;
        }

        media-play-button #icon-play {
          opacity: 0;
          transform-box: view-box;
          transform-origin: center center;
          transform: scale(0.5, 0.5);
          transition: all 0.5s;
        }

        media-play-button[mediapaused] #icon-play {
          opacity: 1;
          transform: scale(1, 1);
          animation: 0.35s bounce-scale-play ease-in-out;
        }

        @keyframes bounce-pause-left {
          0% {
            font-size: 10px;
          }

          50% {
            font-size: 3px;
          }

          100% {
            font-size: 4px;
          }
        }

        @keyframes bounce-pause-right {
          0% {
            font-size: 10px;
            transform: translateX(-8px);
          }

          50% {
            font-size: 3px;
            transform: translateX(1px);
          }

          100% {
            font-size: 4px;
            transform: translateX(0);
          }
        }

        media-play-button #pause-left,
        media-play-button #pause-right {
          /* Using font-size to animate height because using scale was resulting in unexpected positioning */
          font-size: 4px;
          opacity: 1;
          transform: translateX(0);
          transform-box: view-box;
        }

        media-play-button:not([mediapaused]) #pause-left {
          animation: 0.3s bounce-pause-left ease-out;
        }

        media-play-button:not([mediapaused]) #pause-right {
          animation: 0.3s bounce-pause-right ease-out;
        }

        media-play-button[mediapaused] #pause-left,
        media-play-button[mediapaused] #pause-right {
          opacity: 0;
          font-size: 10px;
        }

        media-play-button[mediapaused] #pause-right {
          transform-origin: right center;
          transform: translateX(-8px);
        }
      </style>
      <media-play-button mediapaused class="media-button">
        <svg slot="icon" viewBox="0 0 32 32">
          <!-- <use class="svg-shadow" xlink:href="#icon-play"></use> -->
          <g>
            <path
              id="icon-play"
              d="M20.7131 14.6976C21.7208 15.2735 21.7208 16.7265 20.7131 17.3024L12.7442 21.856C11.7442 22.4274 10.5 21.7054 10.5 20.5536L10.5 11.4464C10.5 10.2946 11.7442 9.57257 12.7442 10.144L20.7131 14.6976Z" />
          </g>
          <!-- <use class="svg-shadow" xlink:href="#icon-pause"></use> -->
          <g id="icon-pause">
            <rect id="pause-left" x="10.5" width="1em" y="10.5" height="11" rx="0.5" />
            <rect id="pause-right" x="17.5" width="1em" y="10.5" height="11" rx="0.5" />
          </g>
        </svg>
      </media-play-button>

      <!-- Volume/Mute -->
      <style>
        media-mute-button {
          position: relative;
        }

        media-mute-button .muted-path {
          transition: clip-path 0.2s ease-out;
        }

        media-mute-button #muted-path-2 {
          transition-delay: 0.2s;
        }

        media-mute-button .muted-path {
          clip-path: inset(0);
        }

        media-mute-button:not([mediavolumelevel='off']) #muted-path-1 {
          clip-path: inset(0 0 100% 0);
        }

        media-mute-button:not([mediavolumelevel='off']) #muted-path-2 {
          clip-path: inset(0 0 100% 0);
        }

        media-mute-button .muted-path {
          opacity: 0;
        }

        media-mute-button[mediavolumelevel='off'] .muted-path {
          opacity: 1;
        }

        media-mute-button .vol-path {
          opacity: 1;
          transition: opacity 0.4s;
        }

        media-mute-button[mediavolumelevel='off'] .vol-path {
          opacity: 0;
        }

        media-mute-button[mediavolumelevel='low'] #vol-high-path,
        media-mute-button[mediavolumelevel='medium'] #vol-high-path {
          opacity: 0;
        }

        media-volume-range {
          --media-range-track-background: rgba(255, 255, 255, 0.2);
          --media-range-thumb-opacity: 0;
        }

        @keyframes volume-in {
          0% {
            visibility: hidden;
            opacity: 0;
            transform: translateY(50%) rotate(1deg);
          }

          50% {
            visibility: visible;
            opacity: 1;
            transform: rotate(-2deg);
          }

          100% {
            visibility: visible;
            opacity: 1;
            transform: translateY(0) rotate(0deg);
          }
        }

        @keyframes volume-out {
          0% {
            visibility: visible;
            opacity: 1;
            transform: translateY(0) rotate(0deg);
          }

          50% {
            opacity: 1;
            transform: rotate(0deg);
          }

          100% {
            visibility: hidden;
            opacity: 0;
            transform: translateY(50%) rotate(1deg);
          }
        }

        .media-volume-range-wrapper {
          opacity: 0;
          visibility: hidden;

          position: absolute;
          top: -100%;
          left: calc(2 * var(--base));

          width: calc(10 * var(--base));
          height: calc(2.5 * var(--base));
          transform-origin: center left;
        }

        media-volume-range {
          /*
            Hide range and animation until mediavolume attribute is set.
            'visibility' didn't work, hovering over media-volume-range-wrapper
            caused it to show. Should require mute-button:hover.
          */
          opacity: 0;
          transition: opacity 0s 1s;

          width: calc(10 * var(--base));
          height: var(--base);
          padding: 0;
          border-radius: calc(0.25 * var(--base));
          overflow: hidden;
          background: rgba(0, 0, 0, 0.2);

          --media-range-bar-color: var(--media-accent-color);

          --media-range-padding-left: 0;
          --media-range-padding-right: 0;

          --media-range-track-width: calc(10 * var(--base));
          --media-range-track-height: var(--base);
          --media-range-track-border-radius: calc(0.25 * var(--base));
          --media-range-track-backdrop-filter: blur(10px) brightness(80%);

          /* This makes zero volume still show some of the bar.
             I can't make the bar have curved corners otherwise though. */
          --media-range-thumb-width: var(--base);
          --media-range-thumb-border-radius: calc(0.25 * var(--base));

          /* The Sutro design has a gradient like this, but not sure I like it */
          /* --media-range-thumb-box-shadow: 10px 0px 20px rgba(255, 255, 255, 0.5); */
        }

        media-volume-range[mediavolume] {
          opacity: 1;
        }

        [keyboardcontrol] media-volume-range:focus {
          /* TODO: This appears to be creating a think outline */
          outline: 1px solid rgba(27, 127, 204, 0.9);
        }

        media-mute-button:hover+.media-volume-range-wrapper,
        media-mute-button:focus+.media-volume-range-wrapper,
        media-mute-button:focus-within+.media-volume-range-wrapper,
        .media-volume-range-wrapper:hover,
        .media-volume-range-wrapper:focus,
        .media-volume-range-wrapper:focus-within {
          animation: 0.3s volume-in forwards ease-out;
        }

        .media-volume-range-wrapper:not(:hover, :focus-within) {
          animation: 0.3s volume-out ease-out;
        }

        /* When keyboard navigating the volume range and wrapper need to always be visible
          otherwise focus state can't land on it. This is ok when keyboard navigating because
          the hovering issues aren't a concern, unless you happen to be keyboard AND mouse navigating.
        */
        [keyboardcontrol] .media-volume-range-wrapper,
        [keyboardcontrol] .media-volume-range-wrapper:focus-within,
        [keyboardcontrol] .media-volume-range-wrapper:focus-within media-volume-range {
          visibility: visible;
        }
      </style>
      <media-mute-button class="media-button" notooltip>
        <use class="svg-shadow" xlink:href="#vol-paths"></use>
        <svg slot="icon" viewBox="0 0 32 32">
          <g id="vol-paths">
            <path
              id="speaker-path"
              d="M16.5 20.486v-8.972c0-1.537-2.037-2.08-2.802-.745l-1.026 1.79a2.5 2.5 0 0 1-.8.85l-1.194.78A1.5 1.5 0 0 0 10 15.446v1.11c0 .506.255.978.678 1.255l1.194.782a2.5 2.5 0 0 1 .8.849l1.026 1.79c.765 1.334 2.802.792 2.802-.745Z" />
            <path
              id="vol-low-path"
              class="vol-path"
              d="M18.5 18C19.6046 18 20.5 17.1046 20.5 16C20.5 14.8954 19.6046 14 18.5 14" />
            <path
              id="vol-high-path"
              class="vol-path"
              d="M18 21C20.7614 21 23 18.7614 23 16C23 13.2386 20.7614 11 18 11" />
            <path id="muted-path-1" class="muted-path" d="M23 18L19 14" />
            <path id="muted-path-2" class="muted-path" d="M23 14L19 18" />
          </g>
        </svg>
      </media-mute-button>
      <div class="media-volume-range-wrapper">
        <media-volume-range></media-volume-range>
      </div>

      <!-- Time Display -->
      <style>
        media-time-display {
          position: relative;
          padding: calc(0.5 * var(--base));
          font-size: calc(0.7 * var(--base));
          border-radius: calc(0.5 * var(--base));
        }

        media-controller[breakpointmd] media-time-display:not([showduration]) {
          display: none;
        }

        media-controller:not([breakpointmd]) media-time-display[showduration] {
          display: none;
        }
      </style>
      <media-time-display></media-time-display>
      <media-time-display showduration></media-time-display>

      <!-- Time Range / Progress Bar -->
      <style>
        media-time-range {
          height: calc(2 * var(--base));
          border-radius: calc(0.25 * var(--base));

          --media-range-track-backdrop-filter: invert(10%) blur(5px) brightness(110%);
          --media-range-track-background: rgba(255, 255, 255, 0.2);
          --media-range-track-pointer-background: rgba(255, 255, 255, 0.5);
          --media-range-track-border-radius: calc(0.25 * var(--base));

          --media-time-range-buffered-color: rgba(255, 255, 255, 0.4);
          --media-range-bar-color: var(--media-accent-color);

          --media-range-thumb-background: var(--media-accent-color);
          --media-range-thumb-transition: opacity 0.1s linear;
          --media-range-thumb-opacity: 0;

          --media-preview-thumbnail-border: calc(0.125 * var(--base)) solid #fff;
          --media-preview-thumbnail-border-radius: calc(0.5 * var(--base));
          --media-preview-thumbnail-min-width: calc(8 * var(--base));
          --media-preview-thumbnail-max-width: calc(10 * var(--base));
          --media-preview-thumbnail-min-height: calc(5 * var(--base));
          --media-preview-thumbnail-max-height: calc(7 * var(--base));
          --media-preview-box-margin: 0 0 -10px;
        }

        media-time-range:hover {
          --media-range-thumb-opacity: 1;
          --media-range-track-height: calc(0.25 * var(--base));
        }

        media-preview-thumbnail {
          margin-bottom: 5px;
        }

        media-preview-chapter-display {
          font-size: calc(0.6 * var(--base));
          padding-block: 0;
        }

        media-preview-time-display {
          font-size: calc(0.65 * var(--base));
          padding-top: 0;
        }
      </style>
      <media-time-range>
        <media-preview-thumbnail slot="preview"></media-preview-thumbnail>
        <media-preview-chapter-display slot="preview"></media-preview-chapter-display>
        <media-preview-time-display slot="preview"></media-preview-time-display>
      </media-time-range>

      <!-- Subtitles/CC Button -->
      <style>
        media-captions-button {
          position: relative;
        }

        media-controller:not([breakpointmd]) media-captions-button {
          display: none;
        }

        media-captions-button svg :is(path, rect) {
          stroke: none;
          fill: var(--_primary-color);
        }

        /* Disble the captions button when no subtitles are available */
        media-captions-button:not([mediasubtitleslist]) svg {
          opacity: 0.3;
        }

        media-captions-button #cc-underline {
          opacity: 1;
        }

        media-captions-button[mediasubtitleslist][aria-checked='true'] #cc-underline {
          opacity: 1;
        }

        media-captions-button #cc-underline {
          transition: clip-path 0.15s ease-out;
        }

        media-captions-button #cc-underline {
          clip-path: inset(0 100% 0 0);
        }

        media-captions-button[aria-checked='true'] #cc-underline {
          clip-path: inset(0 0 0 0);
        }
      </style>
      <media-captions-button class="media-button">
        <svg slot="icon" viewBox="0 0 32 32">
          <use class="svg-shadow" xlink:href="#cc-icon"></use>
          <g id="cc-icon">
            <path
              class="cc-c"
              d="M15.6634 14.3574H14.5636C14.4985 14.0523 14.3847 13.7842 14.2221 13.5532C14.0624 13.3222 13.8673 13.1283 13.6367 12.9715C13.409 12.8118 13.1562 12.692 12.8783 12.6122C12.6004 12.5323 12.3107 12.4924 12.0091 12.4924C11.4592 12.4924 10.961 12.6264 10.5146 12.8945C10.0711 13.1625 9.71776 13.5575 9.45463 14.0794C9.19445 14.6012 9.06436 15.2414 9.06436 16C9.06436 16.7586 9.19445 17.3988 9.45463 17.9206C9.71776 18.4425 10.0711 18.8375 10.5146 19.1055C10.961 19.3736 11.4592 19.5076 12.0091 19.5076C12.3107 19.5076 12.6004 19.4677 12.8783 19.3878C13.1562 19.308 13.409 19.1896 13.6367 19.0328C13.8673 18.8731 14.0624 18.6778 14.2221 18.4468C14.3847 18.2129 14.4985 17.9449 14.5636 17.6426H15.6634C15.5806 18.0903 15.4298 18.491 15.2111 18.8446C14.9923 19.1982 14.7203 19.499 14.3951 19.7471C14.0698 19.9924 13.7047 20.1792 13.2996 20.3075C12.8976 20.4358 12.4674 20.5 12.0091 20.5C11.2345 20.5 10.5456 20.3175 9.94246 19.9525C9.33932 19.5875 8.8648 19.0684 8.51888 18.3954C8.17296 17.7224 8 16.924 8 16C8 15.076 8.17296 14.2776 8.51888 13.6046C8.8648 12.9316 9.33932 12.4125 9.94246 12.0475C10.5456 11.6825 11.2345 11.5 12.0091 11.5C12.4674 11.5 12.8976 11.5642 13.2996 11.6925C13.7047 11.8208 14.0698 12.009 14.3951 12.2571C14.7203 12.5024 14.9923 12.8018 15.2111 13.1554C15.4298 13.5062 15.5806 13.9068 15.6634 14.3574Z" />
            <path
              class="cc-c"
              d="M24 14.3574H22.9002C22.8351 14.0523 22.7213 13.7842 22.5587 13.5532C22.399 13.3222 22.2039 13.1283 21.9733 12.9715C21.7456 12.8118 21.4928 12.692 21.2149 12.6122C20.937 12.5323 20.6473 12.4924 20.3457 12.4924C19.7958 12.4924 19.2976 12.6264 18.8511 12.8945C18.4077 13.1625 18.0543 13.5575 17.7912 14.0794C17.531 14.6012 17.4009 15.2414 17.4009 16C17.4009 16.7586 17.531 17.3988 17.7912 17.9206C18.0543 18.4425 18.4077 18.8375 18.8511 19.1055C19.2976 19.3736 19.7958 19.5076 20.3457 19.5076C20.6473 19.5076 20.937 19.4677 21.2149 19.3878C21.4928 19.308 21.7456 19.1896 21.9733 19.0328C22.2039 18.8731 22.399 18.6778 22.5587 18.4468C22.7213 18.2129 22.8351 17.9449 22.9002 17.6426H24C23.9172 18.0903 23.7664 18.491 23.5476 18.8446C23.3289 19.1982 23.0569 19.499 22.7316 19.7471C22.4064 19.9924 22.0413 20.1792 21.6362 20.3075C21.2341 20.4358 20.804 20.5 20.3457 20.5C19.5711 20.5 18.8822 20.3175 18.279 19.9525C17.6759 19.5875 17.2014 19.0684 16.8555 18.3954C16.5095 17.7224 16.3366 16.924 16.3366 16C16.3366 15.076 16.5095 14.2776 16.8555 13.6046C17.2014 12.9316 17.6759 12.4125 18.279 12.0475C18.8822 11.6825 19.5711 11.5 20.3457 11.5C20.804 11.5 21.2341 11.5642 21.6362 11.6925C22.0413 11.8208 22.4064 12.009 22.7316 12.2571C23.0569 12.5024 23.3289 12.8018 23.5476 13.1554C23.7664 13.5062 23.9172 13.9068 24 14.3574Z" />
            <rect id="cc-underline" x="8" y="23" width="16" height="1" rx="0.5" />
          </g>
        </svg>
      </media-captions-button>

      <!-- Settings Menu Button -->
      <style>
        media-settings-menu-button svg {
          transition: transform 0.1s cubic-bezier(0.4, 0, 1, 1);
          transform: rotateZ(0deg);
        }

        media-settings-menu-button[aria-expanded='true'] svg {
          transform: rotateZ(30deg);
        }
      </style>
      <media-settings-menu-button class="media-button">
        <svg slot="icon" viewBox="0 0 32 32">
          <use class="svg-shadow" xlink:href="#settings-icon"></use>
          <g id="settings-icon">
            <path
              d="M16 18C17.1046 18 18 17.1046 18 16C18 14.8954 17.1046 14 16 14C14.8954 14 14 14.8954 14 16C14 17.1046 14.8954 18 16 18Z" />
            <path
              d="M21.0176 13.0362L20.9715 12.9531C20.8445 12.7239 20.7797 12.4629 20.784 12.1982L20.8049 10.8997C20.8092 10.6343 20.675 10.3874 20.4545 10.2549L18.5385 9.10362C18.3186 8.97143 18.0472 8.9738 17.8293 9.10981L16.7658 9.77382C16.5485 9.90953 16.2999 9.98121 16.0465 9.98121H15.9543C15.7004 9.98121 15.4513 9.90922 15.2336 9.77295L14.1652 9.10413C13.9467 8.96728 13.674 8.96518 13.4535 9.09864L11.5436 10.2545C11.3242 10.3873 11.1908 10.6336 11.1951 10.8981L11.216 12.1982C11.2203 12.4629 11.1555 12.7239 11.0285 12.9531L10.9831 13.0351C10.856 13.2645 10.6715 13.4535 10.4493 13.5819L9.36075 14.2109C9.13763 14.3398 8.99942 14.5851 9 14.8511L9.00501 17.152C9.00559 17.4163 9.1432 17.6597 9.36476 17.7883L10.4481 18.4167C10.671 18.546 10.8559 18.7364 10.9826 18.9673L11.0313 19.0559C11.1565 19.284 11.2203 19.5431 11.2161 19.8059L11.1951 21.1003C11.1908 21.3657 11.325 21.6126 11.5456 21.7452L13.4615 22.8964C13.6814 23.0286 13.9528 23.0262 14.1707 22.8902L15.2342 22.2262C15.4515 22.0905 15.7001 22.0188 15.9535 22.0188H16.0457C16.2996 22.0188 16.5487 22.0908 16.7664 22.227L17.8348 22.8959C18.0534 23.0327 18.326 23.0348 18.5465 22.9014L20.4564 21.7455C20.6758 21.6127 20.8092 21.3664 20.8049 21.1019L20.784 19.8018C20.7797 19.5371 20.8445 19.2761 20.9715 19.0469L21.0169 18.9649C21.144 18.7355 21.3285 18.5465 21.5507 18.4181L22.6393 17.7891C22.8624 17.6602 23.0006 17.4149 23 17.1489L22.995 14.848C22.9944 14.5837 22.8568 14.3403 22.6352 14.2117L21.5493 13.5818C21.328 13.4534 21.1442 13.2649 21.0176 13.0362Z" />
          </g>
        </svg>
      </media-settings-menu-button>

      <!-- PIP/Mini Player Button -->
      <style>
        media-controller:not([breakpointmd]) media-pip-button {
          display: none;
        }
      </style>
      <media-pip-button class="media-button">
        <svg slot="icon" viewBox="0 0 32 32">
          <use class="svg-shadow" xlink:href="#pip-icon"></use>
          <g id="pip-icon">
            <path
              d="M12 22H9.77778C9.34822 22 9 21.6162 9 21.1429V10.8571C9 10.3838 9.34822 10 9.77778 10L22.2222 10C22.6518 10 23 10.3838 23 10.8571V12.5714" />
            <path
              d="M15 21.5714V16.4286C15 16.1919 15.199 16 15.4444 16H22.5556C22.801 16 23 16.1919 23 16.4286V17V21.5714C23 21.8081 22.801 22 22.5556 22H20.3333H17.6667H15.4444C15.199 22 15 21.8081 15 21.5714Z" />
          </g>
        </svg>
      </media-pip-button>

      <!-- Airplay Button -->
      <media-airplay-button class="media-button">
        <svg viewBox="0 0 32 32" aria-hidden="true" slot="icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M20.5 20h1.722c.43 0 .778-.32.778-.714v-8.572c0-.394-.348-.714-.778-.714H9.778c-.43 0-.778.32-.778.714v1.429" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.5 20H9.778c-.43 0-.778-.32-.778-.714v-8.572c0-.394.348-.714.778-.714h12.444c.43 0 .778.32.778.714v1.429" />
          <path stroke-linejoin="round" d="m16 19 3.464 3.75h-6.928L16 19Z" />
        </svg>
      </media-airplay-button>

      <!-- Cast Button -->
      <media-cast-button class="media-button">
        <svg slot="icon" viewBox="0 0 32 32">
          <use class="svg-shadow" xlink:href="#cast-icon"></use>
          <g id="cast-icon">
            <path
              d="M18.5 21.833h4.167c.46 0 .833-.373.833-.833V11a.833.833 0 0 0-.833-.833H9.333A.833.833 0 0 0 8.5 11v1.111m0 8.056c.92 0 1.667.746 1.667 1.666M8.5 17.667a4.167 4.167 0 0 1 4.167 4.166" />
            <path d="M8.5 15.167a6.667 6.667 0 0 1 6.667 6.666" />
          </g>
        </svg>
      </media-cast-button>

      <!-- Fullscreen Button -->
      <style>
        /* Having trouble getting @property to work in the shadow dom
           to clean this up. Like https://codepen.io/luwes/pen/oNRyZyx */

        media-fullscreen-button .fs-arrow {
          translate: 0% 0%;
        }

        media-fullscreen-button:hover .fs-arrow {
          animation: 0.35s up-left-bounce cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        media-fullscreen-button:hover #fs-enter-top,
        media-fullscreen-button:hover #fs-exit-bottom {
          animation-name: up-right-bounce;
        }

        media-fullscreen-button:hover #fs-enter-bottom,
        media-fullscreen-button:hover #fs-exit-top {
          animation-name: down-left-bounce;
        }

        @keyframes up-left-bounce {
          0% {
            translate: 0 0;
          }

          50% {
            translate: -4% -4%;
          }
        }

        @keyframes up-right-bounce {
          0% {
            translate: 0 0;
          }

          50% {
            translate: 4% -4%;
          }
        }

        @keyframes down-left-bounce {
          0% {
            translate: 0 0;
          }

          50% {
            translate: -4% 4%;
          }
        }

        @keyframes down-right-bounce {
          0% {
            translate: 0 0;
          }

          50% {
            translate: 4% 4%;
          }
        }
      </style>
      <media-fullscreen-button class="media-button">
        <svg slot="enter" viewBox="0 0 32 32">
          <use class="svg-shadow" xlink:href="#fs-enter-paths"></use>
          <g id="fs-enter-paths">
            <g id="fs-enter-top" class="fs-arrow">
              <path d="M18 10H22V14" />
              <path d="M22 10L18 14" />
            </g>
            <g id="fs-enter-bottom" class="fs-arrow">
              <path d="M14 22L10 22V18" />
              <path d="M10 22L14 18" />
            </g>
          </g>
        </svg>
        <svg slot="exit" viewBox="0 0 32 32">
          <use class="svg-shadow" xlink:href="#fs-exit-paths"></use>
          <g id="fs-exit-paths">
            <g id="fs-exit-top" class="fs-arrow">
              <path d="M22 14H18V10" />
              <path d="M22 10L18 14" />
            </g>
            <g id="fs-exit-bottom" class="fs-arrow">
              <path d="M10 18L14 18V22" />
              <path d="M14 18L10 22" />
            </g>
          </g>
        </svg>
      </media-fullscreen-button>
    </media-control-bar>
  </media-controller>
</template>


<?php
//view('blocks/newsletter');
view('footer/footer');
?>