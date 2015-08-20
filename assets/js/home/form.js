(function ($) {
  var DISALLOWED_URLS = ['www'];

  function validateUrl () {
    var $group = $('#claim-form .form-group.url'),
        site = $(this).val().trim();
    if (site.length === 0) {
      $group.removeClass('has-error').removeClass('has-success');
      return;
    } else if (DISALLOWED_URLS.indexOf(site) > -1) {
      $group.removeClass('has-success').addClass('has-error');
      $group.find('.help-block span').text(site)
    } else {
      $.post('/wp-admin/admin-ajax.php', {
        action: 'siteExists',
        nonce: $('#claim-form input[name=nonce]').val(),
        site: $(this).val()
      }, function (result) {
        result = JSON.parse(result);
        $group.find('.help-block span').text(site)
        if (result.exists) {
          $group.addClass('has-error').removeClass('has-success');
        } else {
          $group.removeClass('has-error').addClass('has-success');
        }
      });
    }
  }

  function handleFormSubmission () {
    if ($('#claim-form .form-group.has-error').length > 0) {
      return;
    }
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
  }


  $(document).ready(function () {
    $('#claim-form input[name=url]').keyup($.debounce(500, validateUrl));
    $('#claim-form').submit(handleFormSubmission);
  });
})(jQuery);
