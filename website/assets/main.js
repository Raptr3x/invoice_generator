$('#password, #repassword').on('keyup', function () {
    if ($('#password').val() != $('#repassword').val()) {
        $('#display_error').html('Passwords must match').addClass('incorrect');
        $('#register-button').prop( "disabled", true );
    } else {
        $('#display_error').html('');
        $('#register-button').prop( "disabled", false);
    }
});