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
      var autoplayMs = 4000;
      var swiper = new Swiper('.pd-related-swiper', {
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
});


