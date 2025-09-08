<?php
/* Template Name: Production List */

view('header/header');
?>
<main>
    <section class="hero">
        <div class="hero-container">
            <img src="<?= asset('images/hero_section.jpg') ?>" alt="hero">
        </div>
        <div class="hero-content">
            <h1>Productions</h1>
            <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod nam proin egestas sed.
                Nibh ullamcorper quis ultrices diam morbi nisl lectus lacus. Proin purus nisi porta arcu eget
                pretium.</p>
        </div>
    </section>
    <section class="productions">
        <div class="productions-header">
            <div class="productions-header-left">
                <h2>Series</h2>
                <p>Cursus id ipsum integer id egestas nibh</p>
            </div>
            <div class="productions-header-right">
                <button class="slider-prev">
                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                </button>
                <button class="slider-next">
                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                </button>
            </div>
        </div>
        <div class="custom-slider">
            <div class="slider-viewport">
                <div class="slider-track">
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="productions">
        <div class="productions-header">
            <div class="productions-header-left">
                <h2>Series</h2>
                <p>Cursus id ipsum integer id egestas nibh</p>
            </div>
            <div class="productions-header-right">
                <button class="slider-prev">
                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                </button>
                <button class="slider-next">
                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                </button>
            </div>
        </div>
        <div class="custom-slider">
            <div class="slider-viewport">
                <div class="slider-track">
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="productions">
        <div class="productions-header">
            <div class="productions-header-left">
                <h2>Series</h2>
                <p>Cursus id ipsum integer id egestas nibh</p>
            </div>
            <div class="productions-header-right">
                <button class="slider-prev">
                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                </button>
                <button class="slider-next">
                    <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                </button>
            </div>
        </div>
        <div class="custom-slider">
            <div class="slider-viewport">
                <div class="slider-track">
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="--bg-image: url('../images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-slide">
                        <div class="slider-slide-content"
                            style="background-image: url('assets/images/productions/zamanin-kapilari.png');">
                            <div class="slider-slide-left">
                                <img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="production">
                            </div>
                            <div class="slider-slide-right">
                                <div class="slider-slide-right-header">
                                    <h3>Zamanın Kapıları</h3>
                                    <p>Tellus quisque commodo facilisi nam in. Dui sed consequat massa semper euismod
                                        nam proin egestas sed. Nibh ullamcorper quis ultrices diam morbi nisl lectus
                                        lacus. Proin purus nisi porta arcu eget pretium.</p>
                                </div>
                                <div class="slider-slide-right-content">
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/director.svg') ?>" alt="director">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Directors
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Mustafa Kotan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item">
                                        <div class="slider-slide-right-content-item-left">
                                            <img src="<?= asset('images/peoples.svg') ?>" alt="peoples">
                                        </div>
                                        <div class="slider-slide-right-content-item-right">
                                            <div class="slider-slide-right-content-item-header">
                                                Cast
                                            </div>
                                            <div class="slider-slide-right-content-item-content">
                                                Nilperi Sahinkaya, Hülya Duyar, Ahmet Kayakesen
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-slide-right-content-item-flex">
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/thriller.svg') ?>" alt="thriller">
                                            Thriller
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/date.svg') ?>" alt="thriller">
                                            2022
                                        </div>
                                        <div class="slider-slide-right-content-item-flex-item">
                                            <img src="<?= asset('images/clock.svg') ?>" alt="thriller">
                                            01.48
                                        </div>
                                    </div>

                                    <div class="see-details">
                                        <a href="#">
                                            SEE DETAILS
                                            <img src="<?= asset('images/arrow.svg') ?>" alt="arrow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
//view('blocks/newsletter');
view('footer/footer');
?>