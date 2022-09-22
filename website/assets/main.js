$('#password, #repassword').on('keyup', function () {
    if ($('#password').val() != $('#repassword').val()) {
        $('#pass_nonmatch').html('Passwords must match').addClass('incorrect');
        $('#register-button').prop( "disabled", true );
    } else {
        $('#pass_nonmatch').html('');
        $('#register-button').prop( "disabled", false);
    }
});