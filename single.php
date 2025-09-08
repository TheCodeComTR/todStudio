<?

view('header/header');
view('blocks/breadcrump');

?>
<?php
while ( have_posts() ) :
	the_post();
?>

<section class="singleBlog">
        <div class="container">
            <div class="singleBlog__wrapperr">
                <div class="singleBlog__thumbnail">
                <?php
                    if ( ! post_password_required() && ! is_attachment() ) :
                        the_post_thumbnail('full');
                    endif;
                ?>
                </div>
                <div class="singleBlog__title">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </div>
                <div class="singleBlog__content">
                    <?php 
                        the_content();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
endwhile;
view('footer/footer');
?>