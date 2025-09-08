<?php
/* Template Name: About Page */

view('header/header');
?>

<main>
    <!-- Hero -->
    <section class="hero">
        <div class="hero-container">
            <img src="<?= asset('images/hero_section.jpg')?>" alt="hero">
        </div>
        <div class="hero-content">
            <h1>About</h1>
            <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus lacus. Proin purus nisi porta arcu eget pretium.</p>
        </div>
    </section>

    <!-- Intro / Text Blocks -->
    <section class="about-section about-intro bg-dark">
        <div class="about-container">
            <div class="intro-text">
                <p>Commodo et arcu nullam ornare. Viverra non lectus semper proin quis condimentum. Vitae magna quam vehicula mattis. Duis bibendum urna feugiat luctus feugiat. Platea in tempor volutpat iaculis nullam rutrum ullamcorper posuere. Quis purus fusce cras eu mi sociis. Eu nam arcu pellentesque sed lacus egestas amet interdum. Et mi non feugiat pharetra lobortis rutrum molestie consectetur. Non id sem malesuada elementum lectus.</p>
                <p>Ut non volutpat sit purus. A accumsan cras aliquam mi elementum. Tempus egestas amet sit vitae nec eleifend a elementum at. Pellentesque sagittis arcu pellentesque odio dolor. In convallis nullam pellentesque diam sit amet. At justo fermentum vivamus aliquam egestas facilisis. Integer imperdiet in in sit penatibus dui. Dolor volutpat auctor penatibus cras nec egestas amet ipsum. Pellentesque dictum odio aliquam sit varius cursus. Nunc venenatis morbi volutpat nunc lectus volutpat. Bibendum viverra eu curabitur ac magna habitant pharetra arcu. At sed ac integer vel facilisis non felis. Dictum dolor vivamus duis senectus mattis. Accumsan eget commodo tellus id nisl luctus et. Risus odio ultrices aliquet amet enim lorem lobortis iaculis.</p>
                <p>Fusce purus etiam consectetur purus. Ac facilisis sit sit mauris nec euismod enim eros eget leo. Integer dolor convallis vitae aliquam sagittis aliquam malesuada nisl. Sed at lectus nulla ornare. Sed imperdiet malesuada venenatis vehicula nunc laoreet faucibus.</p>
                <p>Eget lorem pretium fermentum nibh. Nulla nibh vel sit metus tincidunt tincidunt. Commodo purus amet phasellus amet penates. Platea amet eget quam molestie fusce cras lobortis gravida. Orci elementum nunc volutpat non nam. Sit at lacus finibus porta pretium amet a quam enim. Quisque ullamcorper enim nibh iaculis aliquet non et placerat blandit. Sit semper commodo tellus id quis ac lorem sit arcu.</p>
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
                    <img src="<?= asset('images/Tod_Studios.png')?>" tod studios">
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
                    <img src="<?= asset('images/Tod_Studios.png')?>" tod studios">
                </div>
            </div>
        </div>
    </section>
</main>

<?php
//view('blocks/newsletter');
view('footer/footer');
?>