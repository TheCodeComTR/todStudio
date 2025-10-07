<?php
/* Template Name: Contact Page */

view('header/header');

$phone = get_field('phone_number');
$mail = get_field('mail_address');
$map = get_field('map_street');
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
            <?
            if($phone){
            ?>
            <div class="contact-card">
                <div class="contact-card-icon"><img src="<?= asset('images/phone.svg')?>" alt="phone"></div>
                <div class="contact-card-body">
                    <div class="contact-card-value">+90 212 222 xx xx</div>
                    <div class="contact-card-label">PHONE NUMBER</div>
                </div>
            </div>
            <?
            }
            if($mail){
            ?>
            <div class="contact-card">
                <div class="contact-card-icon"><img src="<?= asset('images/mail.svg')?>" alt="mail"></div>
                <div class="contact-card-body">
                    <div class="contact-card-value"><a href="mailto:info@todstudios.com">info@todstudios.com</a></div>
                    <div class="contact-card-label">MAIL ADDRESS</div>
                </div>
            </div>
            <?
            }
            ?>
            <a href="#contactForm" class="contact-card" style="text-decoration: none;">
                <div class="contact-card-icon"><img src="<?= asset('images/contact-form-second.svg')?>" alt="map"></div>
                <div class="contact-card-body">
                    <div class="contact-card-value">GET IN TOUCH</div>
                    <div class="contact-card-label">Contact Form</div>
                </div>
            </a>

        </div>
    </section>

    <!-- Form + text block -->
    <section class="contact-form-section" id="contactForm">
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
                <h3>Have questions?</h3>
                <p>We believe communication is more than an exchange. It’s the foundation of lasting connections. Every message opens the door to something meaningful.</p>
            </div>
        </div>
    </section>
</main>
<?php
//view('blocks/newsletter');
view('footer/footer');
?>