<?php

/**

 * Footer part

 *  

 */
$social = get_field('social_media_area', 'option');
$socialItems = $social['social-media'];

wp_footer();

//$menuLocations = get_nav_menu_locations();
//$navbar_items = wp_get_nav_menu_items($menuLocations['footerMain']);

$current_language = apply_filters('wpml_current_language', NULL);
$menuLocations = get_nav_menu_locations();
$menu_id = icl_object_id($menuLocations['footerMain'], 'nav_menu', true, $current_language);
$navbar_items = wp_get_nav_menu_items($menu_id);



//$current_language = apply_filters('wpml_current_language', NULL);
//$menu_id = icl_object_id($menuLocations['footerMain'], 'nav_menu', true, $current_language);
//	print_r($menuLocations['navbar']);
//$navbar_items = wp_get_nav_menu_items($menu_id);


$child_items = [];

foreach ($navbar_items as $key => $item) {
    if ($item->menu_item_parent) {
        array_push($child_items, $item);
        unset($navbar_items[$key]);
    }

    if (intval($item->menu_item_parent) > 0) {
        //echo $item->ID . " <br> \n";
        $subtree[$item->menu_item_parent][] =  $item;
        //array_push(  $subtree ,$item );
    }
}
foreach ($navbar_items as $item) {
    foreach ($child_items as $key => $child) {
        if ($child->menu_item_parent == $item->post_name) {
            if (!$item->child_items) {
                $item->child_items = [];
            }
            array_push($item->child_items, $child);
            unset($child_items[$key]);
        }
    }
}


//Footer bottom
$menu_id = icl_object_id($menuLocations['footerBottom'], 'nav_menu', true, $current_language);
$navbar_items_footerBottom = wp_get_nav_menu_items($menu_id);
$permalink = get_permalink();

//search Block
view('blocks/search');

?>

<div class="bgDark"></div>
<div class="productModal__bg"></div>
<section class="modal modal-qr">
    <div class="modal-overlay"></div>
    <div class="modal-wrapper">
        <div class="modal-header">
            <div class="modal-clos toggleQR">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.125 17.5781C19.5469 18.0469 19.5469 18.75 19.125 19.1719C18.6562 19.6406 17.9531 19.6406 17.5312 19.1719L12 13.5938L6.42188 19.1719C5.95312 19.6406 5.25 19.6406 4.82812 19.1719C4.35938 18.75 4.35938 18.0469 4.82812 17.5781L10.4062 12L4.82812 6.42188C4.35938 5.95312 4.35938 5.25 4.82812 4.82812C5.25 4.35938 5.95312 4.35938 6.375 4.82812L12 10.4531L17.5781 4.875C18 4.40625 18.7031 4.40625 19.125 4.875C19.5938 5.29688 19.5938 6 19.125 6.46875L13.5469 12L19.125 17.5781Z" fill="#3D3935" />
                </svg>
            </div>
        </div>
        <div class="modal-content">
            <p>
                Download QR Code
            </p>
            <img src="<?= asset('img/qr-code.png') ?>" alt="">
            <a href="#" class="btn btn__second btn__img">
                <span>Download QR code image</span>
            </a>
        </div>
    </div>
</section>
<section class="footer">

    <div class="footer__wrapper">

        <div class="footer__main">

            <div class="footer__main__logo">

                <a href="#">

                    <img src="<?= asset('img/svg/logo-white.svg') ?>" alt="logo">

                </a>

            </div>

            <div class="footer__main__menu">
                <?
                foreach ($navbar_items as $keyx => $item) {

                    $parentID = $item->ID;
                    $postID   = $item->object_id;
                    //$getTitle = Transliterator::create($langcode)->transliterate($item->title);
                ?>
                    <div class="footer__main__menu__item">

                        <div class="subtitle">

                            <span><?= $item->title ?></span>

                        </div>
                        <?
                        $menuID = $item->ID;
                        $subs = $subtree[$menuID]; //$navItem->child_items;
                        if ($subs) {
                            echo '<ul class="footer__main__menu__item__menu">';

                            foreach ($subs as $sub) {
                                echo '<li><a href="' . $sub->url . '">' . $sub->title . '</a></li>';
                            }

                            echo '</ul>';
                        }
                        ?>
                    </div>
                <?
                }
                ?>

            </div>

            <div class="footer__main__social">
                <?php
                foreach ($socialItems as $key => $value) {
                ?>
                    <a target="_blank" href="<?= $value['social-link'] ?>"><img src="<?= $value['social-icon'] ?>" alt="<?= $value['social-title'] ?>"></a>
                <?
                }
                ?>
            </div>

        </div>

        <div class="footer__btm">

            <div class="footer__btm__links">
                <ul>

                    <?
                    $counter = 0;
                    foreach ($navbar_items_footerBottom as $key => $item) {
                        $target = !empty($item->target) ? ' target="' . $item->target . '"' : '';
                        echo '<li class=""><a href="' . $item->url . '" ' . $target . '>' . $item->title . '</a></li>';
                        $counter++;
                        if ($counter % 4 == 0) {
                            echo '</ul><ul>';
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="footer__btm__copyright">

                <p><?= __("©VitrA All Rights Reserved", "TheCode") ?></p>

            </div>

        </div>

    </div>

</section>

<section class="modalCountry">
    <div class="modalCountry__overlay"></div>
    <div class="modalCountry__wrapper">
        <div class="modalCountry__header">
            <span>
                <?= _("Select Country") ?>
            </span>
            <div class="headerClose toggleCountry">
                <img src="<?= asset('img/lang/close.svg'); ?>" alt="">
            </div>
        </div>
        <div class="modalCountry__content">
            <ul>
                <li>
                    <a href="/">
                        <img src="<?= asset('img/lang/lang-global.svg'); ?>" alt="Global Language">
                        <span>Global</span>
                    </a>
                </li>
                <li>
                    <a href="/gcc-en/<? //apply_filters('wpml_permalink', $permalink, "gcc-en", false );
                                        ?>">
                        <img src="<?= asset('img/lang/gcc.svg'); ?>" alt="gcc" style="border-radius:10px;">
                        <span>Gulf Cooperation Council</span>
                    </a>
                </li>
                <li>
                    <a href="/de-de/<? //apply_filters('wpml_permalink', $permalink, "de-de", false );
                                    ?>">
                        <img src="<?= asset('img/lang/lang-al.svg'); ?>" alt="gcc" style="border-radius:10px;">
                        <span>Germany</span>
                    </a>
                </li>
                <li>
                    <a href="/us-en/<? //apply_filters('wpml_permalink', $permalink, "de-de", false );
                                    ?>">
                        <img src="<?= asset('img/lang/lang-us.svg'); ?>" alt="gcc" style="border-radius:10px;">
                        <span>USA</span>
                    </a>
                </li>
                <li>
                    <a href="/fr-fr/<? //apply_filters('wpml_permalink', $permalink, "de-de", false );?>">
                        <img src="<?= asset('img/lang/lang-fr.svg'); ?>" alt="gcc" style="border-radius:10px;">
                        <span>France</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<!---Jquery-->

<script src="<?= asset('js/jquery.min.js') ?>"></script>

<!---Swiper-->

<script src="<?= asset('js/swiper-bundle.min.js') ?>"></script>

<!---parallax-->

<script src="<?= asset('js/parallax.min.js') ?>"></script>

<!---select-->

<script src="<?= asset('js/select2.min.js') ?>"></script>

<!---Js-->

<script src="<?= asset('js/app.js?v=' . time()) ?>'); ?>"></script>

</body>



</html>