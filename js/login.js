$(document).ready(function() {
  $('#login-form').submit(function(e) {
    $('#form-error').toggle(false);
    e.preventDefault();
    var username = $('#username').val(),
        password = $('#password').val();
    $.ajax({
      type: 'POST',
      url: 'ajax/index.php',
      data: '&username=' + username + '&password=' + password,
      success: function(data) {
        if (data.status === 'success') {
          console.log('worked');
          window.location.replace('calculateJourny.php');
        } else {
          console.log('didnt');
          $('#form-error').toggle(true);
          $('#error-message').text(data.message);
        }

      },
    });
    return false;

  });
});