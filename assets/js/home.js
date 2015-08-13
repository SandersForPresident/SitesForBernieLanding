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

    $('#claim-form').submit(function () {
      var fields = {
        organization: $('#claim-form input[name=organization]').val(),
        cause: $('#claim-form input[name=cause]').val(),
        url: $('#claim-form input[name=url]').val(),
        contact_name: $('#claim-form input[name=contact_name]').val(),
        contact_email: $('#claim-form input[name=contact_email]').val(),
        message: $('#claim-form textarea[name=message]').val(),
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
      console.log('fields', fields);
      return false;
    });
  });
})(jQuery);
