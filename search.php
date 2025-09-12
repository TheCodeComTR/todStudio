<?php
view('header/header');
?>
<main>
    <!-- Search Input Section -->
    <section class="search-input-section">
        <div class="container">
            <div class="search-bar-container">
                <div class="search-input-container">
                    <img src="<?= asset('images/search.svg')?>" alt="search" class="search-input-icon">
                    <input type="text" class="search-input" placeholder="Zamanın Kapıları" value="Zamanın Kapıları">
                </div>
                <button class="search-btn">
                    SEARCH
                    <img src="<?= asset('images/sorgu.svg')?>" alt="search">
                </button>
            </div>
            <div class="search-results-info">
                <span class="result-count">32</span> results found with "<span class="search-query">Zamanın
                    Kapıları</span>"
            </disv>
        </div>
    </section>

    <!-- Search Results List -->
    <section class="search-results-list">
        <div class="container">
            <div class="results-list">
                <!-- Sonuçlar JavaScript ile dinamik olarak yüklenecek -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <!-- Sayfalama butonları JavaScript ile dinamik olarak oluşturulacak -->
            </div>
        </div>
    </section>
</main>
<?php
view('footer/footer');
?>