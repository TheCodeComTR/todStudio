<?php
view('header/header')
?>
    <section class="notFound">
        <div class="notFound__wrapper">
            <div class="notFound__main">
                <div class="notFound__main__error">
                    <span>4</span>
                    <img src="<?= asset('img/error.png') ?>" alt="">
                    <span>4</span>
                </div>
                <div class="notFound__main__content">
                    <p>
                        Sorry. We could not find this page.
                    </p>
                    <a href="<?= get_home_url(); ?>" class="btn btn__second">Go back</a>
                </div>
            </div>
            <div class="notFound__check">
                <div class="notFound__check__title">
                    <span>Check out:</span>
                </div>
                <div class="notFound__check__lists">
                    <?
                    $args = array(
                        'post_parent' => 0, // required
                        'post_type' => 'collection', // required
                        'orderby' => 'menu_order', // to display according to hierarchy
                        'order' => 'ASC', // to display according to hierarchy
                        'posts_per_page' => 4, // to display all because default is 10
                    );
                    $query = new WP_Query($args);
                    ?>
                    <ul>
                        <?
                        while ($query->have_posts()) : $query->the_post();
                        ?>
                        <li><a href="<?= get_permalink(); ?>"><?= the_title(); ?></a></li>
                        <?endwhile;?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php
view('footer/footer')
?>