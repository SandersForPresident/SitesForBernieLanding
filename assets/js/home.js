(function ($) {
  $(document).ready(function () {
    $('#typed-headline span').typed({
      strings: ['iowa', 'nurses', 'veterans', 'you'],
      backDelay: 2000,
      backSpeed: 20,
      typeSpeed: 20,
      showCursor: false
    });
    $('#banner .btn, #get-site').click(function () {
      $('html,body').animate({
        scrollTop: $('#claim').offset().top
      }, 1000);
    });
  });
})(jQuery);
