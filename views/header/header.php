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

    <link rel="stylesheet" href="<?= asset('styles/global.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
    <?
    global $post;
    $template_slug = get_page_template_slug($post->ID);
    //echo 'Template slug: ' . $template_slug;

    if (is_page_template('page-about.php')) {
        echo '<link rel="stylesheet" href="' . asset('styles/about.css') . '">';
    } else if (is_page_template('page.contact.php') || is_page_template('page-contact.php')) {
        echo '<link rel="stylesheet" href="' . asset('styles/contact.css') . '">';
    } else if (is_page_template('page-production.php')) {

        echo '<link rel="stylesheet" href="' . asset('styles/production.css') . '">';
    }


    if (is_singular('filim')) 
    {
        echo '<link rel="stylesheet" href="' . asset('styles/production-detail.css') . '">';
    }
    else
    {
     echo '<link rel="stylesheet" href="' . asset('styles/index.css?v=') .time() . '">';
    }


    wp_head();
    ?>

</head>

<body>
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
                        <a href="/production/" class="nav-link">PRODUCTIONS</a>
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
                    <img src="<?= asset('images/search.svg') ?>" alt="search" class="search-icon">
                    <input type="text" placeholder="SEARCH" class="search-input" id="search-input">
                    <button class="search-close-btn" id="search-close-btn">
                        <span>
                            <img src="<?= asset('images/close-button.svg') ?>" alt="close">
                        </span>
                    </button>
                </div>
            </div>
            <div class="search-buttons">
                <button class="search-category-btn">
                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    SORGU
                </button>
                <button class="search-category-btn">
                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    ZAMANIN KAPILARI
                </button>
                <button class="search-category-btn">
                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    SERAP
                </button>
            </div>
        </div>
        <div class="search-offcanvas-backdrop"></div>
    </div>