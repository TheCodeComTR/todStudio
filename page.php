<?php
/**

 * Page Template

 * 

 */


view('header/header');
view('blocks/breadcrump');
$hero = get_field('hero_img');
?>

<main class="page">
    <?
    if($hero){
    ?>
        <figure class="page__thumbnail">
            <img src="<?= $hero ?>" alt="">
        </figure>
    <?
    }
    ?>
        <div class="page__container">
            <div class="page__title">
                <span>
                    <?= the_title(); ?>
                </span>
            </div>
            <div class="page__content">
                <?= the_content(); ?>
            </div>
        </div>
       
    </main>
<?php

/**

 * Footer

 * 

 */

view('footer/footer');

