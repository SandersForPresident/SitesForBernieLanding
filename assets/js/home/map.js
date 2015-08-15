(function ($) {
  var MAP_TYPE = 'usa_en',
      STATE_COLOR_TAKEN = '#147fd7';

  function getMapColors () {
    return window.sites.reduce(function (map, site) {
      if (site.state) {
        map[site.state.toLowerCase()] = STATE_COLOR_TAKEN;
      }
      return map;
    }, {});
  }

  function getSiteByState(code) {
    for (var i = 0; i < window.sites.length; i++) {
      if (code.toUpperCase() === window.sites[i].state) {
        return window.sites[i];
      }
    }
    return null;
  }

  function regionClickHandler (element, code, region) {
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

  $(document).ready(function () {
    $('#map').vectorMap({
      map: MAP_TYPE,
      enableZoom: false,
      backgroundColor: null,
      colors: getMapColors(),
      onRegionClick: regionClickHandler
    });
  });
})(jQuery);
