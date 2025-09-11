<?php
/* Template Name: About Page */

view('header/header');
?>

<main>
    <!-- Hero -->
    <section class="hero">
        <div class="hero-container">
            <img src="<?= asset('images/about-bg.png')?>" alt="hero">
        </div>
        <div class="hero-content">
            <h1>About</h1>
            <p>TOD Studios is the original content label of the digital entertainment platform TOD and beIN Media Group. </p>
        </div>
    </section>

    <!-- Intro / Text Blocks -->
    <section class="about-section about-intro bg-dark">
        <div class="about-container">
            <div class="intro-text">
                
                <p>Established with a bold vision to create high-quality, locally rooted and globally relevant productions, TOD Studios develops original series, lifestyle, documentaries and sports content tailored to today’s diverse audiences. With a strong focus on storytelling, creative talent, and production excellence, TOD Studios aims to become a leading force in MENA and Turkiye’s content ecosystem, offering compelling stories that resonate across borders.</p>

            </div>

            <div class="intro-highlight">
                <h3>LOREM PELLENTESQUE ARCU UT NIBH DOLOR CONVALLIS</h3>
                <p>Enim nisl ac porttitor ipsum ullamcorper. Elementum ipsum nulla consectetur orci imperdiet elit tincidunt. Eu vel eget venenatis urna accumsan mauris vestibulum duis. Sed vitae pretium diam gravida. Porttitor id ut condimentum in sit. Facilisis feugiat posuere egestas in.</p>
            </div>

            <div class="about-metrics">
                <div class="metric">
                    <div class="metric-label">Enim vulputate sit amet</div>
                    <div class="metric-value">800+</div>
                    <div class="metric-caption">Aenean massa turpis lacus</div>
                </div>
                <div class="metric">
                    <div class="metric-label">In turpis pharetra lorem</div>
                    <div class="metric-value">128</div>
                    <div class="metric-caption">Adipiscing accumsan ultricies nisl</div>
                </div>
                <div class="metric">
                    <div class="metric-label">Ac sed neque adipiscing</div>
                    <div class="metric-value">48+</div>
                    <div class="metric-caption">Penatibus volutpat lorem malesuada</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards (Parallax Rows) -->
    <section class="about-section awards-section">
        <div class="about-container">
            <div class="section-header">
                <h2>AWARDS</h2>
                <p>Maecenas mauris sem arcu amet cursus.</p>
            </div>
            <div class="awards-parallax" id="awards-parallax">
                <div class="awards-row" data-speed="0.35">
                    <div class="awards-track">
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                    </div>
                </div>
                <div class="awards-row" data-speed="-0.35">
                    <div class="awards-track">
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                        <div class="award-card"><img src="<?= asset('images/award.svg')?>" alt="award"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company stats line -->
    <section class="about-section company-stats bg-dark">
        <div class="about-container stats-row">
            <div class="brand-block">
                <h3>TOD STUDIOS</h3>
                <p>Maecenas mauris sem arcu amet cursus.</p>
            </div>
            <div class="stats">
                <div class="counter">
                    <div class="icon"><img src="<?= asset('images/film.svg')?>" alt="movies"></div>
                    <div class="value">96</div>
                    <div class="name">NUMBER OF MOVIES</div>
                </div>
                <div class="counter">
                    <div class="icon"><img src="<?= asset('images/streamline.svg')?>" alt="viewers"></div>
                    <div class="value">128K</div>
                    <div class="name">NUMBER OF VIEWERS</div>
                </div>
                <div class="counter">
                    <div class="icon"><img src="<?= asset('images/date.svg')?>" alt="hours"></div>
                    <div class="value">32K</div>
                    <div class="name">HOUR TIME</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features / Image + Text blocks -->
    <section class="about-section features-section">
        <div class="about-container">
            <div class="feature-row">
                <div class="feature-media">
                    <img src="<?= asset('images/Tod_Studios.png')?>" alt="tod studios">
                </div>
                <div class="feature-text">
                    <h3>EGET TELLUS SCELERISQUE SIT SIT SENECTU NULLA SIT</h3>
                    <p>Vulputate vestibulum dui ultricies amet. Amet augue vitae hendrerit sit. Nunc interdum ornare gravida phasellus sit. Et etiam elit ut massa semper. Dolor magna tincidunt venenatis risus consequat elementum rhoncus. Quis vel vitae eros ac in leo ultricies enim. Adipiscing integer in habitant tincidunt in elit.</p>
                </div>
            </div>
            <div class="feature-row reverse">
                <div class="feature-text">
                    <h3>SEMPER NUNC AC LIBERO NISL EGET SED TURPIS TINCIDUNT ORCI</h3>
                    <p>Sed mauris sagittis at eget lacus a. Nunc imperdiet cursus scelerisque sed duis orci leo fringilla. Morbi sodales ornare nibh vitae pellentesque convallis nam ac. Eleifend vitae integer a. Nulla quam sagittis quam dui erat tempus elementum donec velit ut. Nibh ut lectus cras donec sed et. Blandit mauris a auctor et odio ultricies.</p>
                </div>
                <div class="feature-media">
                    <img src="<?= asset('images/Tod_Studios.png')?>" alt="tod studios">
                </div>
            </div>
        </div>
    </section>
</main>

<?php
//view('blocks/newsletter');
view('footer/footer');
?>