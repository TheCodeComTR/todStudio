<?php
view('header/header')
?>
<main>
    <!-- 404 Error Content -->
    <section class="error-404">
        <div class="error-container">
            <img class="error-404-image" src="<?=asset('images/404.svg')?>" alt="404">
            <h1>404</h1>
            <p>Sorry. We could not find this page.</p>
            <div class="error-404-buttons">
                <a href="/" class="btn-home">Home Page <img src="<?=asset('images/home.svg')?>" alt="home"></a>
            </div>
        </div>
    </section>
</main>
<?php
view('footer/footer')
?>