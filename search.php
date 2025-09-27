<?php
view('header/header');
?>
<main>
    <? if (have_posts()) : ?>
        <!-- Search Input Section -->
        <section class="search-input-section">
            <div class="container">
                <form action="<?php echo home_url('/'); ?>" method="get" class="search-bar-container">
                    <div class="search-input-container">
                        <img src="<?= asset('images/search.svg') ?>" alt="search" class="search-input-icon">
                        <input type="text" class="search-input" placeholder="<?= get_search_query(); ?>" value="<?= get_search_query(); ?>" name="s">
                    </div>
                    <button class="search-btn">
                        SEARCH
                        <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                    </button>
                </form>
                <div class="search-results-info">
                    <span class="result-count"><?= $wp_query->found_posts; ?></span> results found with "<span class="search-query"><?= get_search_query(); ?></span>"
                </div>
            </div>
        </section>

        <!-- Search Results List -->
        <section class="search-results-list">
            <div class="container">
                <div class="results-list">
                    <? while (have_posts()) {
                        the_post(); ?>
                        <div class="result-item">
                            <a href="<? the_permalink(); ?>"><? the_title(); ?></a>
                            <p><?= get_the_excerpt(); ?></p>
                        </div>
                    <? } ?>
                <?php else : ?>
                    <section class="search-input-section">
                        <div class="container">
                            <form action="<?php echo home_url('/'); ?>" method="get" class="search-bar-container">
                                <div class="search-input-container">
                                    <img src="<?= asset('images/search.svg') ?>" alt="search" class="search-input-icon">
                                    <input type="text" class="search-input" placeholder="<?= get_search_query(); ?>" value="<?= get_search_query(); ?>" name="s">
                                </div>
                                <button class="search-btn">
                                    SEARCH
                                    <img src="<?= asset('images/sorgu.svg') ?>" alt="search">
                                </button>
                            </form>
                            <div class="search-results-info">
                                <span class="result-count"><?= $wp_query->found_posts; ?></span> results found with "<span class="search-query"><?= get_search_query(); ?></span>"
                            </div>
                        </div>
                    </section>
                    <div class="noResult">
                        <p>"<?php echo get_search_query(); ?>" için sonuç bulunamadı.</p>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <!-- Sayfalama butonları JavaScript ile dinamik olarak oluşturulacak -->
                </div>
            </div>
        </section>
    <? endif; ?>
</main>
<?php
view('footer/footer');
?>