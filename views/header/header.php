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
    <!------Resetcss------>
    <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
    <!------SwiperCss------>
    <link rel="stylesheet" href="<?= asset('css/swiper-bundle.min.css') ?>">
    <!------select2------>
    <link rel="stylesheet" href="<?= asset('css/select2.min.css') ?>">
    <!------Style------>
    <link rel="stylesheet" href="<?= asset('css/style.css?v=' . time()) ?>">
	<script src="https://bundles.efilli.com/vitratiles.com.prod.js" async></script>

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NW9MDTN');</script>
<!-- End Google Tag Manager →-->
    <script>
		var country = '<?=__("Country","TheCode")?>*';
	</script>
    <?php
    wp_head();

    //$child_items = [];
    //print_r($navbar_items);

    $navbar   = getAllMenu('navbar');

    /*define("ICL_LANGUAGE_CODE", "en");
    if (ICL_LANGUAGE_CODE == "en") {
        $langcode = "title";
        $lang2    = "title";
    } else if (ICL_LANGUAGE_CODE == "ru") {
        $langcode = "ru-title";
        $lang2    = "ru-Upper";
    } {
        $langcode = "tr-title";
        $lang2    = "tr-title";
    }*/
    $langSlug = ICL_LANGUAGE_CODE == "en"?"/":"/".ICL_LANGUAGE_CODE."/";
    $current_language = apply_filters('wpml_current_language', NULL);	  
	$menuLocations = get_nav_menu_locations();
    $menu_id = icl_object_id($menuLocations['navbar'], 'nav_menu', true, $current_language);
    $navbar_items = wp_get_nav_menu_items($menu_id);
    $child_items = [];
    //print_r($navbar_items);
    // pull all child menu items into separate object
    $subtree = [];
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
    //print_r($subtree['1034']);
    // push child items into their parent item in the original object
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
    $HeaderTopMenu = get_field('header_top_menu', 'option');
    $langDetails = wpml_get_language_information(get_the_ID());
	  //print_r($langDetails);
    ?>
    

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW9MDTN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <header class="header">

        <div class="header__wrapper">
            <div class="header__top">
                <div class="header__top__country toggleCountry" id="">
                    <img src="<?= asset('img/svg/web.svg') ?>" alt="">
                    <span>Global<? //$langDetails['display_name']?></span>
                </div>
                <div class="header__top__menu">
                    <?
                    foreach ($HeaderTopMenu as $key => $menuItem) {
                    ?>
                        <a href="<?= $menuItem['menu_link'] ?>"><img src="<?= $menuItem['menu_icon'] ?>" alt="<?= $menuItem['menu_title'] ?>"></a>
                    <?
                    }
                    ?>

                </div>
            </div>
            <div class="header__main">
                <div class="logo">
                    <a href="<?php echo $langSlug==""?"/":$langSlug; ?>">
                        <img src="<?= asset('img/svg/logo.svg') ?>" alt="Logo">
                    </a>
                </div>
                <div class="header__main__menu">
                    <nav class="menu">
                        <ul class="menu__list">
                            <?
                            if ($navbar_items) :
                                foreach ($navbar_items as  $item) :
                                    $parentID = $item->ID;
                                    $postID = $item->object_id;
                            ?>
                                    <li class="menu__list__item <?= implode(' ', $item->classes) ?>">
                                        <a href="<?= $item->url ?>" ><?= $item->title ?></a>
                                        <?
                                        $subs = $item->child_items;
                                        if ($subs) :
                                        ?>
                                            <div class="subMenu megaMenu">
                                                <div class="megaMenu__wrapper">
                                                    <div class="container">
                                                        <div class="megaMenu__items">
                                                            
                                                            <?
                                                            if (in_array('megamenu-second', $item->classes)){
                                                                echo '<div class="megaMenu-second-grid">';
                                                                foreach ($subs as $sub) {
                                                                    $image = get_field("image", $sub->ID);
                                                                    if ($image) {
                                                                        echo '</div>';
                                                                        echo '<div class="megaMenu-second-grid">';
                                                                        echo '<a href="' . $sub->url . '"><img src="' . $image . '"/><span>' . $sub->title . '</span></a>';
                                                                    } else {
                                                                        
                                                                    echo '<a href="' . $sub->url . '">' . $sub->title . '</a>';
                                                                }
                                                                }
                                                            } else{
                                                            foreach ($subs as $sub) :
                                                                $image = get_field("image", $sub->ID);
                                                                //print_r($image);
                                                            ?>
                                                                <div class="megaMenu__items__col">
                                                                    <?
                                                                    if ($image) {
                                                                    ?>
                                                                        <img src="<?= $image ?>" alt="<?= $sub->title ?>">
                                                                    <?
                                                                    } else {
                                                                      

                                                                    ?>
                                                                        <div class="megaMenu__items__title">
                                                                            <span><?= $sub->title ?></span>
                                                                        </div>
                                                                        <?
                                                                        $subID =  $sub->ID;
                                                                        if (count((array)$subtree[$subID]) > 0) {
																			 
                                                                        ?>
                                                                            <ul class="megaMenu__items__menu">
                                                                                <? foreach ($subtree[$subID] as $submenu) { 
																				$nurl = $langSlug.ltrim($submenu->url,"/");
																				 if(strpos($submenu->url, "http") !== false)
																				 {
																					 $nurl = $submenu->url;
																				 }
																				?>
                                                                                    <li><a data-lang="<?=$langSlug?>" href="<?=$nurl ?>"><?= $submenu->title ?></a></li>
                                                                                <? } ?>
                                                                            </ul>
                                                                    <?
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            <?
                                                            endforeach;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                        endif;
                                        ?>
                                    </li>
                            <?
                                endforeach;
                            endif;
                            ?>
                        </ul>

                    </nav>

                </div>

                <div class="header__main__search">

                    <a href="#" class="searchBtn">

                        <img src="<?= asset('img/svg/search.svg') ?>" alt="">

                        <span><?= __("Search", "TheCode") ?></span>

                    </a>

                </div>

                <div class="header__main__responsive">

                    <a href="#" class="header__main__responsive__search searchBtn">

                        <img src="<?= asset('img/svg/search.svg') ?>" alt="">

                    </a>

                    <div class="header__main__responsive__burger" id="burger">

                        <img src="<?= asset('img/svg/burger.svg') ?>" alt="">

                    </div>

                </div>

            </div>

            <div class="mobileMenu">

                <div class="mobileMenu__head">

                    <a href="#" class="mobileMenu__head__logo">

                        <img src="<?= asset('img/svg/logo.svg') ?>" alt="">

                    </a>

                    <div class="mobileMenu__head__title">

                        <img src="<?= asset('img/svg/arrow-left.svg') ?>" alt="" id="goBack">

                        <span></span>

                    </div>

                    <div class="mobileMenu__head__close">

                        <img src="<?= asset('img/svg/close.svg') ?>" alt="">

                    </div>

                </div>

                <div class="mobileMenu__nav">

                    <nav class="mobileMenu__nav__menu">

                        <ul class="mobileMenu__nav__menu__list">
                        <?
                            if ($navbar_items) :
                                foreach ($navbar_items as  $item) :
                                    $parentID = $item->ID;
                                    $postID = $item->object_id;
                                    $subs = $item->child_items;
                            ?>
                            <li class="mobileMenu__nav__menu__list__item <?= implode(' ', $item->classes) ?>">
                                
                            <?
                                
                                if ($subs) {
                                    if (in_array('megamenu-second', $item->classes)){
                                        ?>
                                        <div class="megaMenu">

                                        <div class="megaMenu__lists">
                                            <?
                                            foreach ($subs as $sub) :
                                                $image = get_field("image", $sub->ID);
                                                //print_r($image);
                                            ?>
                                            <div class="megaMenu__lists__item">
                                                <?
                                                if ($image) {
                                                ?>
                                                    <a href="<?= $sub->url ?>"><img src="<?= $image ?>"/><span><?= $sub->title ?></span></a>

                                                <?
                                                } else {
                                                ?>

                                                <a href="<?= $sub->url ?>" class="megaMenu__lists__title">

                                                    <span><?= $sub->title ?></span>


                                                </a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <?
                                            endforeach;
                                            ?>
                                        </div>

                                        </div>
                                        <?
                                    }
                                ?>
                                <div class="mobileMenu__nav__menu__list__item__title">

                                    <a href="<?= $item->url ?>"><span><?= $item->title ?></span></a>

                                    <img src="<?= asset('img/svg/arrowRight.svg') ?>" alt="">

                                </div>
                                <div class="megaMenu">

                                    <div class="megaMenu__lists">
                                        <?
                                         foreach ($subs as $sub) :
                                             $image = get_field("image", $sub->ID);
                                             //print_r($image);
                                        ?>
                                        <div class="megaMenu__lists__item">
                                            <?
                                            if ($image) {
                                            ?>
                                                <img src="<?= $image ?>" alt="<?= $sub->title ?>">
                                            <?
                                            } else {
                                            ?>

                                            <div class="megaMenu__lists__title">

                                                <span><?= $sub->title ?></span>

                                                <div class="plusminus"></div>

                                            </div>
                                            <?
                                              $subID =  $sub->ID;
                                              if (count((array)$subtree[$subID]) > 0) {
                                            ?>
                                            <div class="megaMenu__lists__menu">

                                                <ul>
                                                <? foreach ($subtree[$subID] as $submenu) { 
                                                    $nurl = $langSlug.ltrim($submenu->url,"/");
													if(strpos($submenu->url, "http") !== false)
													{
														$nurl = $submenu->url;
													}
                                                    ?>
                                                    <li class="megaMenu__lists__menu__item"><a href="<?= $null ?>"><?= $submenu->title ?></a></li>
                                                <? } ?>
                                                </ul>

                                            </div>
                                            <?
                                                }
                                                }
                                            ?>
                                        </div>
                                        <?
                                        endforeach;
                                        ?>
                                    </div>

                                </div>
                                <?
                                }else{
                                    ?>
                                    <a href="<?= $item->url ?>"><?= $item->title ?></a>
                                    <?
                                }
                                ?>
                            </li>
                            <?
                            endforeach;
                        endif;
                            ?>
                        </ul>
						 <div class="mobileMenu__lang toggleCountry">
                            <img src="<?= asset('img/lang/country.svg'); ?>" alt="">
                            <span>
					            Global <?//= $langDetails['display_name']?>
                            </span>
                        </div>
                    </nav>

                </div>

            </div>

        </div>

    </header>

    <?php
    //print_r($item);
    ?>