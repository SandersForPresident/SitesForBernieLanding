(function ($) {
  var TRANSITION_DURATION = 10000;

  function zoomCarousel (slides) {
    var position = -1;

    function transition () {
      $(slides).removeClass('active');
      if (++position >= slides.length) {
        position = 0;
      }
      $(slides[position]).addClass('active');
    }

    transition();
    setInterval(transition, TRANSITION_DURATION);
  }

  function updateBannerHeight () {
    var height = $(window).height() - $('header').height();
    $('#banner').css('height', height + 'px');
  }

  $(window).on('resize', updateBannerHeight);
  $(document).ready(updateBannerHeight);
  $(document).ready(function () {
    zoomCarousel($('#banner .slides .slide'));
  })
})(jQuery);
