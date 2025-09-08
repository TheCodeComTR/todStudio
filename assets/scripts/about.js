(function() {
  // Awards parallax + sonsuz marquee scroll (scroll konumuna bağlı)
  var container = document.getElementById('awards-parallax');
  if (!container) return;

  var rows = Array.prototype.slice.call(container.querySelectorAll('.awards-row'));

  // Her satırın içeriğini kopyalayarak (3x) sonsuz akış için yeterli genişlik oluştur
  rows.forEach(function(row) {
    var track = row.querySelector('.awards-track');
    if (!track) return;
    var html = track.innerHTML;
    track.innerHTML = html + html + html; // görünür set orta olsun
  });

  var REPEAT_COUNT = 3; // içerik 3 kez tekrarlandı
  var BASE_PX_PER_SEC = 40; // otomatik akış hızı
  var lastTime = performance.now();
  var lastScrollY = window.pageYOffset || document.documentElement.scrollTop || 0;

  var states = rows.map(function(row) {
    var track = row.querySelector('.awards-track');
    var speed = parseFloat(row.getAttribute('data-speed') || '0.3');
    var singleWidth = (track.scrollWidth / REPEAT_COUNT) || 1;
    return {
      row: row,
      track: track,
      speed: speed, // işaret yönü belirler
      singleWidth: singleWidth,
      baseShift: -singleWidth, // ikinci tekrar viewportta olsun
      offset: 0
    };
  });

  function recalc() {
    states.forEach(function(s) {
      s.singleWidth = (s.track.scrollWidth / REPEAT_COUNT) || 1;
      s.baseShift = -s.singleWidth;
      s.offset = 0;
    });
  }

  function step(now) {
    var dt = (now - lastTime) / 1000;
    lastTime = now;

    var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
    var scrollDelta = scrollY - lastScrollY;
    lastScrollY = scrollY;

    states.forEach(function(s) {
      var dir = s.speed >= 0 ? 1 : -1;
      var autoMove = BASE_PX_PER_SEC * Math.abs(s.speed) * dt; // zaman tabanlı hareket
      var scrollBoost = scrollDelta * 0.5 * Math.abs(s.speed); // scroll ile hız kazancı
      s.offset = (s.offset + autoMove + Math.abs(scrollBoost)) % s.singleWidth;
      // translate: baseShift ile ortalanmış başla, yönüne göre kaydır
      var translate = s.baseShift + (dir * s.offset);
      s.track.style.transform = 'translate3d(' + translate + 'px,0,0)';
      s.track.style.willChange = 'transform';
    });

    requestAnimationFrame(step);
  }

  // Başlat
  recalc();
  requestAnimationFrame(step);
  window.addEventListener('resize', function() { recalc(); });
  window.addEventListener('load', recalc);
})();


