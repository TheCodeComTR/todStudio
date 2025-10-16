<?php

/**

 * 

 * 

 * 

 */


view('header/header');
$slider = get_field('slider');
?>
<style>
	.swiper-slide {
		width: 284px;
	}
</style>

<main>
	<!-- Hero Slider -->
	<section class="hero">
		<div class="swiper hero-swiper">
			<div class="swiper-wrapper">
				<?php
				foreach ($slider as $item) {
					$imageD = $item['slider-d-bg'];
					$imageM = $item['slider-m-bg'];
					$title = $item['title'];
					$cta = $item['cta'];

					if (wp_is_mobile()) {
						$show_image = $imageM;
					} else {
						$show_image = $imageD;
					}
				?>
					<div class="swiper-slide">
						<a href="<?= $cta ?>" class="hero-cta"></a>
						<div class="hero-container">
							<picture>
								<source media="(max-width:768px)" srcset="<?= $imageM ?>">
								<img src="<?= $imageD ?>" alt="">
							</picture>
						</div>
						<?/*<div class="hero-content">
							<h1><?= $title ?></h1>
						</div>*/?>
					</div>
				<?php
				}
				?>
			</div>
			<div class="hero-pagination swiper-pagination"></div>
			<button class="hero-prev" aria-label="Previous">
				<img src="<?= asset('images/arrow_white.svg') ?>" alt="prev">
			</button>
			<button class="hero-next" aria-label="Next">
				<img src="<?= asset('images/arrow_white.svg') ?>" alt="next">
			</button>
		</div>
	</section>
	<!-- Metrics (Company Stats layout) -->
	<?/*
	<section class="about-section company-stats bg-dark">
		<div class="about-container stats-row">
			<div class="brand-block">
				<h3>TOD STUDIOS</h3>
				<p>Maecenas mauris sem arcu amet cursus.</p>
			</div>
			<div class="stats">
				<div class="counter">
					<div class="icon"><img src="<?= asset('images/film.svg') ?>" alt="movies"></div>
					<div class="value">96</div>
					<div class="name">NUMBER OF MOVIES</div>
				</div>
				<div class="counter">
					<div class="icon"><img src="<?= asset('images/streamline.svg') ?>" alt="viewers"></div>
					<div class="value">128K</div>
					<div class="name">NUMBER OF VIEWERS</div>
				</div>
				<div class="counter">
					<div class="icon"><img src="<?= asset('images/date.svg') ?>" alt="hours"></div>
					<div class="value">32K</div>
					<div class="name">HOUR TIME</div>
				</div>
			</div>
		</div>
	</section>
	*/ ?>
	<?php
	// Gösterilecek kategoriler
	$categories = ['series', 'factual-lifestyle', 'kids'];

	foreach ($categories as $cat_slug):

		// Kategori bilgisi
		$category = get_category_by_slug($cat_slug);
		if (!$category) continue; // kategori yoksa atla

		$args = [
			'post_type'      => 'filim',
			'posts_per_page' => 15,
			'post_status'    => 'publish',
			'tax_query'      => [
				[
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $cat_slug,
				]
			],
			'meta_query' => [
				[
					'key'     => '_thumbnail_id',  // featured image alanı
					'compare' => 'EXISTS',         // sadece thumb’u olanları getir
				]
			],
			//'meta_key'       => 'year',           // ACF alanı
			'orderby'        => 'menu_order', // sayısal sıralama tetikleyici
			'order'          => 'desc',
		];

		$filim_query = new WP_Query($args);
		if ($filim_query->have_posts()): ?>

			<section class="productions swiperHasArrow">
				<div class="productions-header">
					<div class="productions-header-left">
						<h2><?= esc_html($category->name) ?></h2>
						<p><?= esc_html($category->description) ?></p>
					</div>
					<div class="productions-header-right">
						<a href="productions/<?= $category->slug ?>" class="see-all">
							<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.9999 1.5L5.92151 6.57843L10.9999 13.8333L16.0783 6.57843L10.9999 1.5Z" stroke="white" stroke-width="1.5"/>
								<path d="M1.5 13.1667L2.72476 11.942C3.22114 11.4456 3.89437 11.1667 4.59635 11.1667C5.55566 11.1667 6.33333 11.9444 6.33333 12.9037V13.5001C6.33333 14.7887 7.378 15.8334 8.66667 15.8334C9.85427 15.8334 10.8346 14.9462 10.9811 13.7984" stroke="white" stroke-width="1.5"/>
								<path d="M11 1.5V13.5" stroke="white" stroke-width="1.5"/>
								<path d="M16 6.5H6" stroke="white" stroke-width="1.5"/>
							</svg>
 							See All
						</a>
					</div>
				</div>

				<div class="swiper <?= esc_attr($cat_slug) ?>-swiper ">
					<div class="swiper-wrapper">
						<?php while ($filim_query->have_posts()): $filim_query->the_post(); 
						if (has_post_thumbnail()):
						?>
							<div class="swiper-slide">
								<a href="<?php the_permalink(); ?>" class="swiper-card">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('medium'); ?>
									<?php else: ?>
										<img src="<?= asset('images/poster.png') ?>" alt="<?php the_title(); ?>">
									<?php endif; ?>
									<span class="swiper-caption"><?php the_title(); ?></span>
								</a>
							</div>
						<?php endif; 
					endwhile; ?>
					</div>
					<div class="<?= esc_attr($cat_slug) ?>-pagination swiper-pagination"></div>
				</div>
				<div class="swiperHasArrow-box <?= esc_attr($cat_slug) ?>-swiper-arrow">
					<div class="swiper-button-next">
						<img src="https://todstudio.thecode.com.tr/wp-content/themes/todstudio/assets/images/arrow_white.svg" alt="">
					</div>
					<div class="swiper-button-prev">
						<img src="https://todstudio.thecode.com.tr/wp-content/themes/todstudio/assets/images/arrow_white.svg" alt="">
					</div>
				</div>
			</section>

	<?php
			wp_reset_postdata();
		endif;

	endforeach;
	/*
	?>
	<!-- Series Slider (Swiper like PD related) -->
	<section class="productions">
		<div class="productions-header">
			<div class="productions-header-left">
				<h2>Series</h2>
				<p>Curabitur sit ipsum integer id egestas nibh.</p>
			</div>
			<div class="productions-header-right">
				<a href="#" class="see-all"><img src="<?= asset('images/film_rulo.svg') ?>" alt="arrow"> See All</a>
			</div>
		</div>
		<div class="swiper series-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/39b3b20407d9d119f7d8e914b3049e3f501bac4a.jpg') ?>" alt="The Lumina Chronicles">
						<span class="swiper-caption">THE LUMINA CHRONICLES</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/26da47b7b731d60d5b8802bd9463da1289d5ad46.png') ?>" alt="Serap">
						<span class="swiper-caption">SERAP</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/77cbc70ffef6ab3084120705e8ea91829c594a5c.png') ?>" alt="Donum Noktasi">
						<span class="swiper-caption">DÖNÜM NOKTASI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/42b443d04eeb3954572dd36b78b0683d1c3f57df.png') ?>" alt="Erkek Severse">
						<span class="swiper-caption">ERKEK SEVERSE</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="Zamanin Kapilari">
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
				<a href="#" class="see-all"><img src="<?= asset('images/popcorn.svg') ?>" alt="arrow"> See All</a>
			</div>
		</div>
		<div class="swiper life-style-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/39b3b20407d9d119f7d8e914b3049e3f501bac4a.jpg') ?>" alt="The Lumina Chronicles">
						<span class="swiper-caption">THE LUMINA CHRONICLES</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/26da47b7b731d60d5b8802bd9463da1289d5ad46.png') ?>" alt="Serap">
						<span class="swiper-caption">SERAP</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/77cbc70ffef6ab3084120705e8ea91829c594a5c.png') ?>" alt="Donum Noktasi">
						<span class="swiper-caption">DÖNÜM NOKTASI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/42b443d04eeb3954572dd36b78b0683d1c3f57df.png') ?>" alt="Erkek Severse">
						<span class="swiper-caption">ERKEK SEVERSE</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="Zamanin Kapilari">
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
				<a href="#" class="see-all"><img src="<?= asset('images/kite.svg') ?>" alt="arrow"> See All</a>
			</div>
		</div>
		<div class="swiper kids-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/39b3b20407d9d119f7d8e914b3049e3f501bac4a.jpg') ?>" alt="The Lumina Chronicles">
						<span class="swiper-caption">THE LUMINA CHRONICLES</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/26da47b7b731d60d5b8802bd9463da1289d5ad46.png') ?>" alt="Serap">
						<span class="swiper-caption">SERAP</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/77cbc70ffef6ab3084120705e8ea91829c594a5c.png') ?>" alt="Donum Noktasi">
						<span class="swiper-caption">DÖNÜM NOKTASI</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/42b443d04eeb3954572dd36b78b0683d1c3f57df.png') ?>" alt="Erkek Severse">
						<span class="swiper-caption">ERKEK SEVERSE</span>
					</a>
				</div>
				<div class="swiper-slide">
					<a href="#" class="swiper-card">
						<img src="<?= asset('images/productions/zamanin-kapilari.png') ?>" alt="Zamanin Kapilari">
						<span class="swiper-caption">ZAMANIN KAPILARI</span>
					</a>
				</div>
			</div>
			<div class="kids-pagination swiper-pagination"></div>
		</div>
	</section>
 	*/ ?>
	<!-- Who We Are -->
	<section class="about-section features-section bg-dark">
		<div class="about-container">
			<div class="feature-row">
				<div class="feature-media">
					<img src="<?= asset('images/Tod_Studios.png') ?>" alt="brand">
				</div>
				<div class="feature-text">
					<h3>Who Are We</h3>
					<p>
						TOD Studios is the original content label of the digital entertainment platform TOD and beIN Media Group.

					</p>
					<div class="see-details"><a href="/about/">For More <img src="<?= asset('images/arrow_white.svg') ?>" alt=""></a></div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
//view('blocks/newsletter');
view('footer/footer');
?>