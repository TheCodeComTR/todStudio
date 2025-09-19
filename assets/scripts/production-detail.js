$(function () {
  // Show more toggle
  $('#pd-show-more-btn').on('click', function () {
    var $row = $('#pd-more-row');
    var $fade = $('#pd-gallery-fade');
    var $btn = $(this);
    $row.toggleClass('is-open');
    if ($row.hasClass('is-open')) {
      $row.css('display', 'grid');
      $fade.hide();
      $btn.find('img').css('transform', 'rotate(180deg)');
      $btn.find('.label').text('HIDE');
    } else {
      $row.css('display', 'none');
      $fade.show();
      $btn.find('img').css('transform', '');
      $btn.find('.label').text('SHOW MORE');
    }
  });

  // Related Swiper init
  try {
    if (window.Swiper) {
         var heroSlider = new Swiper('.swiperHero', {
          spaceBetween: 0,
          centeredSlides: false,
          loop:true,
          direction: 'horizontal',
          loopedSlides: 5,
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          resizeObserver:true,
        });
      var autoplayMs = 4000;
      var relatedSlider = new Swiper('.pd-related-swiper', {
        slidesPerView: "auto",
        spaceBetween: 16,
        loop: false,
        pagination: {
          el: '.pd-related-pagination',
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '"><span class="fill"></span></span>';
          },
        },
        //autoplay: { delay: autoplayMs, disableOnInteraction: false },
        /*breakpoints: {
          0: { slidesPerView: 1.2, spaceBetween: 12 },
          576: { slidesPerView: 2, spaceBetween: 12 },
          768: { slidesPerView: 3, spaceBetween: 16 },
          1200: { slidesPerView: 4, spaceBetween: 16 },
          1400: { slidesPerView: 4.5, spaceBetween: 16 },
        },*/
        on: {
          init: function () {
            // reset then start first bar
            $('.pd-related-pagination .fill').css('width', '0%');
          },
          slideChangeTransitionStart: function () {
            $('.pd-related-pagination .fill').css('width', '0%');
          },
          autoplayTimeLeft: function (s, time, progress) {
            var $active = $('.pd-related-pagination .swiper-pagination-bullet').eq(s.realIndex).find('.fill');
            var pct = Math.max(0, Math.min(100, (1 - progress) * 100));
            $active.css('width', pct + '%');
          },
        },
      });
      	heroSlider.controller.control = relatedSlider;
		relatedSlider.controller.control = heroSlider;
    }
  } catch (e) {
    // ignore
  }

  // Open video modal from hero and video thumb
  function openVideo(src) {
    var $modal = $('#pd-video-modal');
    var video = $('#pd-video')[0];
    if (!src) return;
    video.src = src;
    $modal.addClass('is-open');
    video.play();
  }

  function closeVideo() {
    var $modal = $('#pd-video-modal');
    var video = $('#pd-video')[0];
    video.pause();
    video.currentTime = 0;
    $modal.removeClass('is-open');
  }

  $('.pd-hero-play').on('click', function () {
    openVideo($(this).data('video-src'));
  });

  $('.pd-thumb.is-video').on('click', function () {
    openVideo($(this).data('video-src'));
  });

  $('#pd-video-backdrop, #pd-video-close').on('click', function () {
    closeVideo();
  });

  $(document).on('keyup', function (e) {
    if (e.key === 'Escape') {
      closeVideo();
    }
  });

  // Image Gallery Modal Functions
  let currentImageIndex = 0;
  let imageGallery = [];

  function initImageGallery() {
    // Collect all gallery images
    imageGallery = [];
    $('.pd-thumb img').each(function() {
      const src = $(this).attr('src');
      const alt = $(this).attr('alt');
      if (src && !imageGallery.find(img => img.src === src)) {
        imageGallery.push({ src, alt });
      }
    });
  }

  function openImageModal(index) {
    if (imageGallery.length === 0) return;
    
    currentImageIndex = index || 0;
    const image = imageGallery[currentImageIndex];
    
    $('#image-modal-main').attr('src', image.src).attr('alt', image.alt);
    $('#image-modal').addClass('is-open');
    
    // Update navigation buttons
    updateNavigationButtons();
    
    // Prevent body scroll
    $('body').addClass('modal-open');
  }

  function closeImageModal() {
    $('#image-modal').removeClass('is-open');
    $('body').removeClass('modal-open');
  }

  function nextImage() {
    if (imageGallery.length === 0) return;
    currentImageIndex = (currentImageIndex + 1) % imageGallery.length;
    const image = imageGallery[currentImageIndex];
    $('#image-modal-main').attr('src', image.src).attr('alt', image.alt);
    updateActiveThumbnail();
  }

  function prevImage() {
    if (imageGallery.length === 0) return;
    currentImageIndex = currentImageIndex === 0 ? imageGallery.length - 1 : currentImageIndex - 1;
    const image = imageGallery[currentImageIndex];
    $('#image-modal-main').attr('src', image.src).attr('alt', image.alt);
    updateActiveThumbnail();
  }
  
  function updateNavigationButtons() {
    const $prev = $('#image-modal-prev');
    const $next = $('#image-modal-next');
    
    if (imageGallery.length <= 1) {
      $prev.hide();
      $next.hide();
    } else {
      $prev.show();
      $next.show();
    }
  }

  function updateActiveThumbnail() {
    $('.image-modal-thumb').removeClass('active');
    $(`.image-modal-thumb[data-index="${currentImageIndex}"]`).addClass('active');
  }

  // Event listeners for image modal
  $('.pd-thumb img').on('click', function() {
    const src = $(this).attr('src');
    const index = imageGallery.findIndex(img => img.src === src);
    if (index !== -1) {
      openImageModal(index);
    }
  });

  $('#image-modal-backdrop, #image-modal-close').on('click', function() {
    closeImageModal();
  });

  $('#image-modal-next').on('click', function(e) {
    e.stopPropagation();
    nextImage();
  });

  $('#image-modal-prev').on('click', function(e) {
    e.stopPropagation();
    prevImage();
  });

  $(document).on('click', '.image-modal-thumb', function(e) {
    e.stopPropagation();
    const index = parseInt($(this).data('index'));
    currentImageIndex = index;
    const image = imageGallery[currentImageIndex];
    $('#image-modal-main').attr('src', image.src).attr('alt', image.alt);
    updateActiveThumbnail();
  });

  // Keyboard navigation for image modal
  $(document).on('keyup', function (e) {
    if ($('#image-modal').hasClass('is-open')) {
      if (e.key === 'Escape') {
        closeImageModal();
      } else if (e.key === 'ArrowLeft') {
        prevImage();
      } else if (e.key === 'ArrowRight') {
        nextImage();
      }
    }
  });

  // Initialize image gallery on page load
  initImageGallery();

     $('.pd-related-card').on('click', function () {

      var $el = jQuery(this);
      var d = $el.data();

        //jQuery('#detail-image').attr('src', d.image);
        jQuery('#detail-about').text(d.about);
        jQuery('#detail-title').text(d.title);
        jQuery('#detail-scriptwriter').text(d.scriptwriter);
        jQuery('#detail-directors').text(d.directors);
        jQuery('#detail-genre').text(d.genre);
        jQuery('#detail-total').text(d.total_episodes);
        jQuery('#detail-year').text(d.year_of_production);
        jQuery('#detail-company').text(d.production_company);
        jQuery('#detail-cast').text(d.cast);

   });



		var productThumbs = new Swiper('.product-thumbs', {
			spaceBetween: 0,
			centeredSlides: true,
			loop: true,
			slideToClickedSlide: true,
			direction: 'horizontal',
			slidesPerView: 5,
			loopedSlides: 5,
		});

});


