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

  function getSiteByState(code) {
    for (var i = 0; i < window.sites.length; i++) {
      if (code.toUpperCase() === window.sites[i].state) {
        return window.sites[i];
      }
    }
    return null;
  }

  function buildMap () {
    var colors = window.sites.reduce(function (map, site) {
      if (site.state) {
        map[site.state.toLowerCase()] = '#147fd7';
      }
      return map;
    }, {});

    $('#map').vectorMap({
      map: 'usa_en',
      colors: colors,
      enableZoom: false,
      backgroundColor: null,
      onRegionClick: function (element, code, region) {
        var site = getSiteByState(code);
        if (site) {
          window.location = site.url;
        } else {
          $('html, body').animate({
            scrollTop: $('#claim').offset().top
          });
          $('#claim-form input[name=organization]').val('State of ' + region);
          $('#claim-form input[name=cause]').val('Local Communities');
          $('#claim-form input[name=url]').val(code);
        }
      }
    });
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
    buildMap();

    $('#banner .btn, #get-site').click(function () {
      $('html,body').animate({
        scrollTop: $('#claim').offset().top
      }, 1000);
    });
  });
})(jQuery);
