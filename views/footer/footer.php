<?php

/**

 * Footer part

 *  

 */


wp_footer();

//$menuLocations = get_nav_menu_locations();
//$navbar_items = wp_get_nav_menu_items($menuLocations['footerMain']);
?>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-left">
            <div class="footer-brand">
                <img src="<?= asset('logo/logo.svg') ?>" alt="TOD Studios" class="footer-logo">
            </div>
            <ul class="footer-social" style="display: none;">
                <li><a href="#" aria-label="Facebook"><img src="<?= asset('images/social-medias/facebook.svg') ?>" alt="facebook"></a></li>
                <li><a href="#" aria-label="Instagram"><img src="<?= asset('images/social-medias/instagram.svg') ?>" alt="instagram"></a></li>
                <li><a href="#" aria-label="X"><img src="<?= asset('images/social-medias/twitter.svg') ?>" alt="x"></a></li>
                <li><a href="#" aria-label="LinkedIn"><img src="<?= asset('images/social-medias/linkedin.svg') ?>" alt="linkedin"></a></li>
                <li><a href="#" aria-label="YouTube"><img src="<?= asset('images/social-medias/youtube.svg') ?>" alt="youtube"></a></li>
            </ul>
            <div class="footer-copy">© <?=date("Y")?></div>
        </div>
        <div class="footer-right">
            <nav class="footer-nav">
                <a href="/">HOME</a>
                <a href="/productions/">PRODUCTIONS</a>
                <a href="/about/">ABOUT</a>
                <a href="/contact/">CONTACT</a>
            </nav>
            <div class="footer-legal" style="display: none;">
                <a href="#">Cookie Policy</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Personal Data Protection</a>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="<?= asset('scripts/global.js') ?>"></script>
<script src="<?= asset('scripts/index.js?v=123') ?>"></script>
<script src="<?= asset('scripts/production-detail.js')?>?v=<?=time()?>" ></script>

</body>

</html>