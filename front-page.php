<?php
/**

 * 

 * 

 * 

 */


view('header/header');
?>
<main>
	<!-- Hero Slider -->
	<section class="hero">
		<div class="swiper hero-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="hero-container">
						<img src="<?= asset('images/sliders/slider-1.png')?>" alt="Zamanin Kapilari">
					</div>
					<div class="hero-content">
						<h1>LOREM IPSUM DOLOR SIT</h1>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="hero-container">
						<img src="<?= asset('images/sliders/slider-1.png')?>" alt="The Lumina Chronicles">
					</div>
					<div class="hero-content">
						<h1>LOREM IPSUM DOLOR SIT</h1>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="hero-container">
						<img src="<?= asset('images/sliders/slider-1.png')?>" alt="Serap">
					</div>
					<div class="hero-content">
						<h1>LOREM IPSUM DOLOR SIT</h1>
					</div>
				</div>
			</div>
			<div class="hero-pagination swiper-pagination"></div>
			<button class="hero-prev" aria-label="Previous">
				<img src="<?= asset('images/arrow_white.svg')?>" alt="prev">
			</button>
			<button class="hero-next" aria-label="Next">
				<img src="<?= asset('images/arrow_white.svg')?>" alt="next">
			</button>
		</div>
	</section>

	<!-- Metrics (Company Stats layout) -->
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

	<!-- Series Slider (Swiper like PD related) -->
	<section class="productions">
		<div class="productions-header">
			<div class="productions-header-left">
				<h2>Series</h2>
				<p>Curabitur sit ipsum integer id egestas nibh.</p>
			</div>
			<div class="productions-header-right">
				<a href="#" class="see-all"><img src="<?= asset('images/film_rulo.svg')?>" alt="arrow"> See All</a>
			</div>
		</div>
		<div class="swiper series-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png')?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/39b3b20407d9d119f7d8e914b3049e3f501bac4a.jpg')?>" alt="The Lumina Chronicles">
						<span class="swiper-caption">THE LUMINA CHRONICLES</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/26da47b7b731d60d5b8802bd9463da1289d5ad46.png')?>" alt="Serap">
						<span class="swiper-caption">SERAP</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/77cbc70ffef6ab3084120705e8ea91829c594a5c.png')?>" alt="Donum Noktasi">
						<span class="swiper-caption">DÖNÜM NOKTASI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/42b443d04eeb3954572dd36b78b0683d1c3f57df.png')?>" alt="Erkek Severse">
						<span class="swiper-caption">ERKEK SEVERSE</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png')?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
			</div>
			<div class="series-pagination swiper-pagination"></div>
		</div>
	</section>

	<!-- Life Style -->
	<section class="productions">
		<div class="productions-header">
			<div class="productions-header-left">
				<h2>Life Style</h2>
				<p>Ut egestas velit porta quisque vitae mollis nam</p>
			</div>
			<div class="productions-header-right">
				<a href="#" class="see-all"><img src="<?= asset('images/popcorn.svg')?>" alt="arrow"> See All</a>
			</div>
		</div>
		<div class="swiper life-style-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png')?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/39b3b20407d9d119f7d8e914b3049e3f501bac4a.jpg')?>" alt="The Lumina Chronicles">
						<span class="swiper-caption">THE LUMINA CHRONICLES</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/26da47b7b731d60d5b8802bd9463da1289d5ad46.png')?>" alt="Serap">
						<span class="swiper-caption">SERAP</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/77cbc70ffef6ab3084120705e8ea91829c594a5c.png')?>" alt="Donum Noktasi">
						<span class="swiper-caption">DÖNÜM NOKTASI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/42b443d04eeb3954572dd36b78b0683d1c3f57df.png')?>" alt="Erkek Severse">
						<span class="swiper-caption">ERKEK SEVERSE</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png')?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
			</div>
			<div class="life-style-pagination swiper-pagination"></div>
		</div>
	</section>

	<!-- Kids -->
	<section class="productions">
		<div class="productions-header">
			<div class="productions-header-left">
				<h2>Kids</h2>
				<p>Morbi consequat enim ut integer pellentesque quis</p>
			</div>
			<div class="productions-header-right">
				<a href="#" class="see-all"><img src="<?= asset('images/kite.svg')?>" alt="arrow"> See All</a>
			</div>
		</div>
		<div class="swiper kids-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png')?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/39b3b20407d9d119f7d8e914b3049e3f501bac4a.jpg')?>" alt="The Lumina Chronicles">
						<span class="swiper-caption">THE LUMINA CHRONICLES</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/26da47b7b731d60d5b8802bd9463da1289d5ad46.png')?>" alt="Serap">
						<span class="swiper-caption">SERAP</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/77cbc70ffef6ab3084120705e8ea91829c594a5c.png')?>" alt="Donum Noktasi">
						<span class="swiper-caption">DÖNÜM NOKTASI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/42b443d04eeb3954572dd36b78b0683d1c3f57df.png')?>" alt="Erkek Severse">
						<span class="swiper-caption">ERKEK SEVERSE</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png')?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
			</div>
			<div class="kids-pagination swiper-pagination"></div>
		</div>
	</section>

	<!-- Who We Are -->
	<section class="about-section features-section bg-dark">
		<div class="about-container">
			<div class="feature-row">
				<div class="feature-media">
					<img src="<?= asset('images/Tod_Studios.png')?>" alt="brand">
				</div>
				<div class="feature-text">
					<h3>Who We Are</h3>
					<p>Auctor ut senectus ac non diam maecenas pellentesque. Elementum dapibus ac in rhoncus. Congue
						duis vitae lobortis nam magna quam egestas lacinia curabitur. Vitae proin amet convallis
						integer sed. A nisl accumsan velit facilisi. Feugiat vitae cursus egestas lobortis enim
						pellentesque. Faucibus eu elementum egestas commodo faucibus eget vitae. Neque tristique
						justo vel volutpat pretium in odio sed suspendisse. Eget volutpat luctus quam sodales dictum
						sem. </p>
					<div class="see-details"><a href="#">DETAILS <img src="<?= asset('images/arrow_white.svg')?>" alt=""></a></div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
//view('blocks/newsletter');
view('footer/footer');
?>