<?php

/*

 *

 * Slider Block

 * 

 */
$slider = get_field('slider');
//print_r($slider);
?>

<section class="slider">

    <div class="slider__wrapper">

        <div class="swiper slider__main swiper">

            <div class="swiper-wrapper">
                <?
                function get_youtube_id_from_url($url)
                {
                    if (stristr($url,'youtu.be/'))
                        {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
                    else 
                        {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
                }
                
                

                if ($slider) {
                    foreach ($slider as $key => $value) {
                ?>

                        <div class="swiper-slide slider__item">
                            <?
                            if ($value['link'] != "") {
                            ?>
                                <div class="slider__video">
                                    <?
                                    //if (strpos($value['link'],"youtube" !== false)) 
                                    if(1==1)
                                    {
                                    ?>
                                        <video class="sliderVideo" data-video="<?= $value['link'] ?>" data-videomobile="<?= $value['link'] ?>" data-poster="<?= $value['slider_img'] ?>" data-postermobile="<?= $value['slider_responsive_image'] ?>" playsinline="true" autoplay autobuffer="autobuffer" muted="true" preload="metadata" src="<?= $value['link'] ?>" loop></video>
                                    <?
                                    
                                    }
                                    else
                                    {
                                        //echo $value['link'];
                                        echo '<iframe data-url="'.$value['link'].'" src="https://www.youtube.com/embed/'.get_youtube_id_from_url($value['link']).'?playlist='.get_youtube_id_from_url($value['link']).'&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                                    }
                                    ?>
                                </div>
                            <?
                            } else {
                            ?>
                                <div class="slider__img">
                                    <picture>

                                        <source media="screen and (min-width: 768px)" srcset="<?= $value['slider_img'] ?>">

                                        <source media="screen and (max-width: 768px)" srcset="<?= $value['slider_responsive_image'] ?>">

                                        <img class=" lazyloaded" src="<?= $value['slider_img'] ?>" alt="">

                                    </picture>

                                </div>
                            <? } ?>
                            <div class="slider__content">

                                <span><?= $value['slider_title'] ?></span>

                                <p><?= $value['slider_sub_title'] ?></p>
                                <?
                                /*
                                if ($value['link'] == "") {

                                    */

                                ?>
                                    <a href="<?= $value['slider_link'] ?>" class="btn btn__slider">

                                        <span><?= __("Explore", "TheCode") ?></span>

                                        <img src="<?= asset('img/svg/btn-arrow.svg') ?>" alt="">

                                    </a>
                                <? /* } */?>
                            </div>

                        </div>



                <?
                    }
                }
                ?>

            </div>

            <div class="slider__nav">

                <div class="slider__nav__left">

                    <img src="<?= asset('img/svg/slider-arrow-left.svg') ?>" alt="">

                </div>

                <div class="swiper-pagination"></div>

                <div class="slider__nav__right">

                    <img src="<?= asset('img/svg/slider-arrow-right.svg') ?>" alt="">

                </div>

            </div>



        </div>

    </div>

</section>