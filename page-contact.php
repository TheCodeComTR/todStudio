<?php
/* Template Name: Contact Page */

view('header/header');
?>
<main class="contact-main">
    <!-- Hero with map background -->
    <section class="hero hero--contact">
        <div class="hero-container">
            <img src="<?= asset('images/map.svg')?>" alt="map">
        </div>
        <div class="hero-content">
            <h1><?=get_the_title( )?></h1>
            <?=get_the_content( )?>
        </div>
    </section>

    <!-- Get in touch boxes -->
    <section class="contact-grid">
        <div class="contact-grid-inner">
            <div class="contact-lead-card">
                <h2 class="lead-title">GET IN TOUCH</h2>
                <div class="lead-text">Have questions? We’d love to help.</div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon"><img src="<?= asset('images/phone.svg')?>" alt="phone"></div>
                <div class="contact-card-body">
                    <div class="contact-card-value">+90 212 222 xx xx</div>
                    <div class="contact-card-label">PHONE NUMBER</div>
                </div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon"><img src="<?= asset('images/mail.svg')?>" alt="mail"></div>
                <div class="contact-card-body">
                    <div class="contact-card-value">info@todstudios.com</div>
                    <div class="contact-card-label">MAIL ADDRESS</div>
                </div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon"><img src="<?= asset('images/map-pin.svg')?>" alt="map"></div>
                <div class="contact-card-body">
                    <div class="contact-card-value">Quis pellentesque arcu molestie etiam</div>
                    <div class="contact-card-label">MAP STREET</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form + text block -->
    <section class="contact-form-section">
        <div class="contact-form-container">
            <!--<form class="contact-form" id="contact-form">
                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label>E-MAIL</label>
                    <input type="email" placeholder="Enter E-Mail" required>
                </div>
                <div class="form-group">
                    <label>MESSAGE</label>
                    <textarea rows="6" placeholder="Write Your Message" required></textarea>
                </div>
                <button type="submit" class="btn-send">
                    SEND MESSAGE <img src="<?= asset('images/mail-send-yellow.svg')?>" alt="send">
                </button>
            </form>--> 
            <?
            echo do_shortcode('[contact-form-7 id="6f34aed" title="Contact form" html_class="contact-form"]');
            ?>

            <div class="contact-copy">
                <div class="contact-copy-icon">
                    <img src="<?= asset('images/mail-send.svg')?>" alt="icon">
                </div>
                <h3>LOREM IPSUM DOLOR.</h3>
                <p> Faucibus eu elementum egestas commodo faucibus eget vitae. Neque tristique justo vel volutpat pretium in odio sed suspendisse. Eget volutpat luctus quam sodales dictum sem.</p>
            </div>
        </div>
    </section>
</main>
<?php
//view('blocks/newsletter');
view('footer/footer');
?>