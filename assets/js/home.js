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

    zoomCarousel($('#content .slides .slide'));

    $('#banner .btn').click(function () {
      $('html,body').animate({
        scrollTop: $('#claim').offset().top
      }, 1000);
    });

    $('#map').vectorMap({
      map: 'usa_en',
      colors: {
        nc: '#147fd7',
        wa: '#147fd7',
        wi: '#147fd7'
      },
      enableZoom: false,
      backgroundColor: null,
      // hoverColor: '#147fd7',
      onRegionClick: function (element, code, region) {
        $('html, body').animate({
          scrollTop: $('#claim').offset().top
        });
        $('#claim-form input[name=organization]').val('State of ' + region);
        $('#claim-form input[name=cause]').val('Local Communities');
      }
    });
  });
})(jQuery);
