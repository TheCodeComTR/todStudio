<?php

/**
 * 
 * 
 */
?>
<!doctype html>
<html <?php language_attributes() ?>>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= asset('styles/global.css') . '?v=' . time() ?>">
    <link rel="stylesheet" href="<?= asset('styles/font.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <?
    global $post;
    //$template_slug = get_page_template_slug($post->ID);
    //echo 'Template slug: ' . $template_slug;

    if (is_page_template('page-about.php')) {
        echo '<link rel="stylesheet" href="' . asset('styles/about.css?v=') . time() . '">';
    } else if (is_page_template('page.contact.php') || is_page_template('page-contact.php')) {
        echo '<link rel="stylesheet" href="' . asset('styles/contact.css?v=13') . '">';
    } else if (is_page_template('page-production.php')) {

        echo '<link rel="stylesheet" href="' . asset('styles/production.css?v=') . time() . '">';
    } else if (is_page_template('category-filim.php')) {

        echo '<link rel="stylesheet" href="' . asset('styles/category.css?v=') . time() . '">';
    }


    if (is_singular('filim')) {
        echo '<link rel="stylesheet" href="' . asset('styles/production-detail.css?v=') . time() . '">';
    } else if (is_search()) {
        echo '<link rel="stylesheet" href="' . asset('styles/search-result.css?v=1') . '">';
    } else if (is_404()) {
        echo '<link rel="stylesheet" href="' . asset('styles/404.css?v=1') . '">';
    } else if (is_front_page()) {
        echo '<link rel="stylesheet" href="' . asset('styles/index.css?v=') . time() . '">';
    } else if (is_home() || is_single()) {
        echo '<link rel="stylesheet" href="' . asset('styles/blog.css?v=') . time() . '">';
    }



    wp_head();
    ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K674GQ34');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K674GQ34" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="header">
        <div class="header-menu header-item">
            <button id="menu-button">
                <img src="<?= asset('images/menu-icon.svg') ?>" alt="menu">
                MENU
            </button>
        </div>
        <div class="header-logo header-item">
            <a href="/"><img src="<?= asset('logo/logo.svg') ?>" alt="logo"></a>
        </div>
        <div class="header-search header-item">
            <button id="search-button">
                <img src="<?= asset('images/search.svg') ?>" alt="search">
                SEARCH
            </button>
        </div>
    </header>

    <!-- Offcanvas Menu -->
    <div class="offcanvas-overlay" id="offcanvas-overlay">
        <div class="offcanvas-menu">
            <nav class="offcanvas-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <button class="close-btn" id="close-btn">
                            <img src="<?= asset('images/close-button.svg') ?>" alt="close">
                            CLOSE
                        </button>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about/" class="nav-link">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact/" class="nav-link">CONTACT</a>
                    </li>
                </ul>
            </nav>
            <div class="offcanvas-social" style="display: none;">
                <a href="#" class="social-link">
                    <img src="<?= asset('images/social-medias/facebook.svg') ?>" alt="facebook">
                </a>
                <a href="#" class="social-link">
                    <img src="<?= asset('images/social-medias/instagram.svg') ?>" alt="instagram">
                </a>
                <a href="#" class="social-link">
                    <img src="<?= asset('images/social-medias/twitter.svg') ?>" alt="twitter">
                </a>
                <a href="#" class="social-link">
                    <img src="<?= asset('images/social-medias/linkedin.svg') ?>" alt="linkedin">
                </a>
                <a href="#" class="social-link">
                    <img src="<?= asset('images/social-medias/youtube.svg') ?>" alt="youtube">
                </a>
            </div>
        </div>
        <div class="offcanvas-backdrop"></div>
    </div>

    <!-- Search Offcanvas -->
    <div class="search-offcanvas-overlay" id="search-offcanvas-overlay">
        <div class="search-offcanvas">
            <div class="search-header">
                <div class="search-input-container">
                    <form action="<?php echo home_url('/'); ?>" method="get" class="search-form">

                        <img src="<?= asset('images/search.svg') ?>" alt="search" class="search-icon">
                        <input type="text" placeholder="SEARCH" class="search-input" id="search-input" name="s">
                        <button type="submit" class="search-close-btn" id="search-close-btn">
                            <span>
                                <img src="<?= asset('images/close-button.svg') ?>" alt="close">
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="search-buttons">
                <button class="search-category-btn">
                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    BENEATH THE SURFACE
                </button>
                <button class="search-category-btn">
                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    DOORS OF DESTINY
                </button>
                <button class="search-category-btn">
                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    IT HAPPENS
                </button>
            </div>
        </div>
        <div class="search-offcanvas-backdrop"></div>
    </div>