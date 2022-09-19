$("#login-button").click(function(event){
    event.preventDefault();
    $('.hidden').fadeIn(1000);
    $('form').fadeOut(500);
    $('.logged-in').addClass('hidden');
    $('.wrapper').addClass('form-success');
});