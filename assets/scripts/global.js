// Offcanvas Menu Functionality
$('#menu-button').click(function() {
    $('#offcanvas-overlay').addClass('active');
    $('.offcanvas-backdrop').addClass('active');
    $('body').addClass('menu-open');
});

$('#close-btn').click(function() {
    $('#offcanvas-overlay').removeClass('active');
    $('.offcanvas-backdrop').removeClass('active');
    $('body').removeClass('menu-open');
});

$('.offcanvas-backdrop').click(function() {
    $('#offcanvas-overlay').removeClass('active');
    $('.offcanvas-backdrop').removeClass('active');
    $('body').removeClass('menu-open');
});

// ESC key to close menu
$(document).keyup(function(e) {
    if (e.keyCode === 27) { // ESC key
        $('#offcanvas-overlay').removeClass('active');
        $('.offcanvas-backdrop').removeClass('active');
        $('body').removeClass('menu-open');
    }
});

// Search Offcanvas Functionality
$('#search-button').click(function() {
    $('#search-offcanvas-overlay').addClass('active');
    $('.search-offcanvas-backdrop').addClass('active');
    $('body').addClass('menu-open');
    
    // Focus on search input after animation
    setTimeout(function() {
        $('#search-input').focus();
    }, 300);
});

$('#search-close-btn').click(function() {
    $('#search-offcanvas-overlay').removeClass('active');
    $('.search-offcanvas-backdrop').removeClass('active');
    $('body').removeClass('menu-open');
});

$('.search-offcanvas-backdrop').click(function() {
    $('#search-offcanvas-overlay').removeClass('active');
    $('.search-offcanvas-backdrop').removeClass('active');
    $('body').removeClass('menu-open');
});

// ESC key to close search
$(document).keyup(function(e) {
    if (e.keyCode === 27) { // ESC key
        $('#search-offcanvas-overlay').removeClass('active');
        $('.search-offcanvas-backdrop').removeClass('active');
        $('body').removeClass('menu-open');
    }
});

// Search category buttons functionality
$('.search-category-btn').click(function() {
    var categoryText = $(this).text().trim();
    $('#search-input').val(categoryText);
    $('#search-input').focus();
});
$(".hero-container video").click(function() {
    //alert("clicked");
   this.paused ? this.play() : this.pause();
});