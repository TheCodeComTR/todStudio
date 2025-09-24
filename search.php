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
                
                <div class="result-item">
                    <h3>TELLUS EGET ODIO</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            
                <div class="result-item">
                    <h3>MASSA ALIQUAM</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            
                <div class="result-item">
                    <h3>JUSTO DIAM</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            
                <div class="result-item">
                    <h3>NUNC VELIT</h3>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                </div>
            
                <div class="result-item">
                    <h3>CONSECTETUR ADIPISCING</h3>
                    <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
                </div>
            
                <div class="result-item">
                    <h3>ELIT SED DO</h3>
                    <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                </div>
            
                <div class="result-item">
                    <h3>EIUSMOD TEMPOR</h3>
                    <p>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                </div>
            
                <div class="result-item">
                    <h3>INCIDIDUNT UT</h3>
                    <p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                </div>
            
                <div class="result-item">
                    <h3>LABORE ET DOLORE</h3>
                    <p>Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            
                <div class="result-item">
                    <h3>MAGNA ALIQUA</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                </div>
            
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