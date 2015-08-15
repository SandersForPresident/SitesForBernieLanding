(function ($) {
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

    setInterval(transition, 10000);
  }

  function updateBannerHeight () {
    var height = $(window).height() - $('header').height();
    $('#banner').css('height', height + 'px');
  }

  $(document).ready(function () {
    $('#typed-headline span').typed({
      strings: ['iowa', 'nurses', 'veterans', 'you'],
      backDelay: 2000,
      backSpeed: 20,
      typeSpeed: 20,
      showCursor: false
    });

    updateBannerHeight();
    $(window).on('resize', updateBannerHeight);

    zoomCarousel($('#banner .slides .slide'));
    $('#banner .btn, #get-site').click(function () {
      $('html,body').animate({
        scrollTop: $('#claim').offset().top
      }, 1000);
    });
  });
})(jQuery);
