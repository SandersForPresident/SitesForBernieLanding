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

    /* Form */
    $('#claim-form input[name=url]').keyup(function () {
      console.log($(this).val());
    })
    $('#claim-form input[name=url]').keyup($.debounce(250, function () {
      $.post('/wp-admin/admin-ajax.php', {
        action: 'siteExists',
        nonce: $('#claim-form input[name=nonce]').val(),
        site: $(this).val()
      }, function (result) {
        console.log('RESULT', result);
      });
    }));

    $('#claim-form').submit(function () {
      var fields = {
        organization: $('#claim-form input[name=organization]').val(),
        cause: $('#claim-form input[name=cause]').val(),
        role: $('#claim-form select[name=role]').val(),
        url: $('#claim-form input[name=url]').val(),
        contact_name: $('#claim-form input[name=contact_name]').val(),
        contact_email: $('#claim-form input[name=contact_email]').val(),
        message: $('#claim-form textarea[name=message]').val(),
        terms_agreed: $('#claim-form input[name=terms]').val()
      }
      $.post('/wp-admin/admin-ajax.php', {
        action: 'siteRequest',
        nonce: $('#claim-form input[name=nonce]').val(),
        site_request: fields
      }, function () {
        $('#claim-form').slideUp();
        $('#claim-form-success .highlight').text(fields.url + '.forberniesanders.com');
        $('#claim-form-success').show();
      });
      return false;
    });
  });
})(jQuery);
