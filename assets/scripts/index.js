$(function () {
  /* HERO FULLSCREEN SWIPER */
  if (window.Swiper) {
    var heroSwiper = new Swiper(".hero-swiper", {
      loop: true,
      speed: 700,
      effect: "slide",
      autoplay: { delay: 5000, disableOnInteraction: false },
      pagination: {
        el: ".hero-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return (
            '<span class="' + className + '"><span class="fill"></span></span>'
          );
        },
      },
      navigation: { nextEl: ".hero-next", prevEl: ".hero-prev" },
      on: {
        init: function () {
          $(".hero-pagination .fill").css("width", "0%");
        },
        slideChangeTransitionStart: function () {
          $(".hero-pagination .fill").css("width", "0%");
        },
        autoplayTimeLeft: function (sw, time, progress) {
          var $active = $(".hero-pagination .swiper-pagination-bullet")
            .eq(sw.realIndex)
            .find(".fill");
          var pct = Math.max(0, Math.min(100, (1 - progress) * 100));
          $active.css("width", pct + "%");
        },
      },
    });
    function getSlidesPerView() {
      const slideWidth = 284; // px - görsel genişliğin
      const containerWidth =
        document.querySelector(".series-swiper").offsetWidth;
      return Math.floor(containerWidth / slideWidth);
    }
    // SERIES SWIPER (PD related ile aynı pagination animasyonu)
    var seriesSwiper = new Swiper(".series-swiper", {
      slidesPerView: "auto",
      spaceBetween: 16,
      loop: false,
      pagination: {
        el: ".series-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return (
            '<span class="' + className + '"><span class="fill"></span></span>'
          );
        },
      },
      autoplay: { delay: 4000, disableOnInteraction: false },
      /*breakpoints: {
        0: { slidesPerView: 1.2, spaceBetween: 12 },
        576: { slidesPerView: 2, spaceBetween: 12 },
        992: { slidesPerView: 3, spaceBetween: 16 },
        1280: { slidesPerView: 4, spaceBetween: 16 },
        1440: { slidesPerView: 4.5, spaceBetween: 16 },
        1920: { slidesPerView: 4.5, spaceBetween: 16 },
        2048: { slidesPerView: 6, spaceBetween: 24 },
        2560: { slidesPerView: 6, spaceBetween: 24 },
      },*/
      on: {
        init: function () {
          $(".series-pagination .fill").css("width", "0%");
          //alert("init223");
        },
        slideChangeTransitionStart: function () {
          $(".series-pagination .fill").css("width", "0%");
        },
        autoplayTimeLeft: function (s, time, progress) {
          var $active = $(".series-pagination .swiper-pagination-bullet")
            .eq(s.realIndex)
            .find(".fill");
          var pct = Math.max(0, Math.min(100, (1 - progress) * 100));
          $active.css("width", pct + "%");
        },
      },
    });

    var seriesSwiper = new Swiper(".life-style-swiper", {
      slidesPerView: "auto",
      spaceBetween: 16,
      loop: false,
      pagination: {
        el: ".life-style-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return (
            '<span class="' + className + '"><span class="fill"></span></span>'
          );
        },
      },
      //autoplay: { delay: 4000, disableOnInteraction: false },
      /*breakpoints: {
        0: { slidesPerView: 1.2, spaceBetween: 12 },
        576: { slidesPerView: 2, spaceBetween: 12 },
        992: { slidesPerView: 3, spaceBetween: 16 },
        1280: { slidesPerView: 4, spaceBetween: 16 },
        1440: { slidesPerView: 4.5, spaceBetween: 16 },
        1920: { slidesPerView: 4.5, spaceBetween: 16 },
        2048: { slidesPerView: 6, spaceBetween: 24 },
        2560: { slidesPerView: 6, spaceBetween: 24 },
      },*/
      on: {
        init: function () {
          $(".life-style-pagination .fill").css("width", "0%");
        },
        slideChangeTransitionStart: function () {
          $(".life-style-pagination .fill").css("width", "0%");
        },
        autoplayTimeLeft: function (s, time, progress) {
          var $active = $(".life-style-pagination .swiper-pagination-bullet")
            .eq(s.realIndex)
            .find(".fill");
          var pct = Math.max(0, Math.min(100, (1 - progress) * 100));
          $active.css("width", pct + "%");
        },
      },
    });

    var seriesSwiper = new Swiper(".kids-swiper", {
      slidesPerView: "auto",
      spaceBetween: 16,
      loop: false,
      pagination: {
        el: ".kids-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return (
            '<span class="' + className + '"><span class="fill"></span></span>'
          );
        },
      },
      autoplay: { delay: 4000, disableOnInteraction: false },
      /*breakpoints: {
        0: { slidesPerView: 1.2, spaceBetween: 12 },
        576: { slidesPerView: 2, spaceBetween: 12 },
        992: { slidesPerView: 3, spaceBetween: 16 },
        1280: { slidesPerView: 4, spaceBetween: 16 },
        1440: { slidesPerView: 4.5, spaceBetween: 16 },
        1920: { slidesPerView: 4.5, spaceBetween: 16 },
        2048: { slidesPerView: 6, spaceBetween: 24 },
        2560: { slidesPerView: 6, spaceBetween: 24 },
      },*/
      on: {
        init: function () {
          $(".kids-pagination .fill").css("width", "0%");
        },
        slideChangeTransitionStart: function () {
          $(".kids-pagination .fill").css("width", "0%");
        },
        autoplayTimeLeft: function (s, time, progress) {
          var $active = $(".kids-pagination .swiper-pagination-bullet")
            .eq(s.realIndex)
            .find(".fill");
          var pct = Math.max(0, Math.min(100, (1 - progress) * 100));
          $active.css("width", pct + "%");
        },
      },
    });
  }

  $(".productions").each(function () {
    var $section = $(this);
    var $viewport = $section.find(".slider-viewport");
    var $track = $viewport.find(".slider-track");
    var $slides = $track.find(".slider-slide");
    if (!$slides.length) return;

    // HTML tarafında --bg-image tanımlandığı için ekstra dönüştürme gerekmiyor

    var activeIndex = 0;
    var BASE_ALIGN_OFFSET = 48; // px: gözlemlenen sola kaymayı telafi eder

    function getTranslateX(el) {
      var t = window.getComputedStyle(el).transform;
      if (!t || t === "none") return 0;
      if (t.startsWith("matrix3d")) {
        var vals3d = t.replace("matrix3d(", "").replace(")", "").split(",");
        return parseFloat(vals3d[12]) || 0;
      }
      if (t.startsWith("matrix(")) {
        var vals2d = t.replace("matrix(", "").replace(")", "").split(",");
        return parseFloat(vals2d[4]) || 0;
      }
      return 0;
    }

    function logMeasurements(reason) {
      try {
        var $active = $slides.eq(activeIndex);
        var viewportRect = $viewport[0].getBoundingClientRect();
        var trackRect = $track[0].getBoundingClientRect();
        var activeRect = $active[0].getBoundingClientRect();
        var posLeft = $active.position().left;
        var offLeft = $active[0].offsetLeft;
        var gapStr = window.getComputedStyle($track[0]).gap || "0px";
        var gap = parseFloat(gapStr) || 0;
        var currentTX = getTranslateX($track[0]);
        var slidesMeta = [];
        $slides.each(function (i, el) {
          var rect = el.getBoundingClientRect();
          slidesMeta.push({
            i: i,
            left: $(el).position().left,
            offsetLeft: el.offsetLeft,
            width: $(el).outerWidth(true),
          });
        });
      } catch (e) {
        // console.warn("Slider Debug error:", e);
      }
    }

    function setActive(index) {
      var total = $slides.length;
      activeIndex = (index + total) % total;
      $slides.removeClass("is-active").eq(activeIndex).addClass("is-active");
    }

    function updatePosition() {
      var $active = $slides.eq(activeIndex);
      if (!$active.length) return;
      // Aktif slayttaki sol paneli (img kolonu) viewport soluna hizala
      var el = $track[0];
      var $target = $active.find(".slider-slide-left");
      var targetEl = $target[0] || $active[0];
      var viewportLeft = $viewport[0].getBoundingClientRect().left;
      var targetLeft = targetEl.getBoundingClientRect().left;
      var currentTX = getTranslateX(el);
      var delta = viewportLeft - targetLeft;
      var alignOffset = activeIndex === 0 ? 0 : BASE_ALIGN_OFFSET;
      var translateX = currentTX + delta + alignOffset;
      // console.log("Align using rects:", {
      //   viewportLeft: viewportLeft,
      //   targetLeft: targetLeft,
      //   currentTX: currentTX,
      //   delta: delta,
      //   alignOffset: alignOffset,
      //   nextTX: translateX,
      // });
      logMeasurements("before-apply");
      el.style.transform = "translate3d(" + translateX + "px,0,0)";
      el.style.webkitTransform = "translate3d(" + translateX + "px,0,0)";
      requestAnimationFrame(function () {
        logMeasurements("after-apply-raf");
      });
    }

    function goTo(index) {
      setActive(index);
      logMeasurements("goTo(" + index + ")");
      // Bir repaint sonrası ölçülerin güncel olduğundan emin olun
      requestAnimationFrame(updatePosition);
    }

    // Başlat
    setActive(0);
    logMeasurements("init");
    updatePosition();

    // Düğmeler
    $section.find(".slider-next").on("click", function () {
      goTo(activeIndex + 1);
    });
    $section.find(".slider-prev").on("click", function () {
      goTo(activeIndex - 1);
    });

    // Pencere yeniden boyutlandığında hizalamayı koru
    $(window).on("resize", function () {
      logMeasurements("resize");
      updatePosition();
    });

    // Görseller yüklendikten sonra tekrar hizala
    $(window).on("load", function () {
      logMeasurements("window.load");
      updatePosition();
    });
  });
});
