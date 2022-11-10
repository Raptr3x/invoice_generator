$('#password, #repassword').on('keyup', function () {
    if ($('#password').val() != $('#repassword').val()) {
        $('#display_error').html('Passwords must match').addClass('incorrect');
        $('#register-button').prop( "disabled", true );
    } else {
        $('#display_error').html('');
        $('#register-button').prop( "disabled", false);
    }
});

window.addEventListener('load', (event) => {
  var scrollpos = window.scrollY;
  var header = document.getElementById("header");
  var navcontent = document.getElementById("nav-content");
  var navaction = document.getElementById("navAction");
  var brandname = document.getElementById("brandname");
  var toToggle = document.querySelectorAll(".toggleColour");

  document.addEventListener("scroll", function () {
    /*Apply classes for slide in bar*/
    scrollpos = window.scrollY;

    if (scrollpos > 10) {
      document.getElementById("logo-img").src="assets/logo.png";
      if($("#nav-content>ul>li>a").hasClass('text-white')){
        $("#nav-content>ul>li>a").toggleClass('text-white');
        $("#nav-content>ul>li>a").toggleClass('text-black');
      }
      header.classList.add("bg-white");
      navaction.classList.remove("bg-white");
      navaction.classList.add("gradient");
      navaction.classList.remove("text-gray-800");
      navaction.classList.add("text-white");
      //Use to switch toggleColour colours
      for (var i = 0; i < toToggle.length; i++) {
        toToggle[i].classList.add("text-gray-800");
        toToggle[i].classList.remove("text-white");
      }
      header.classList.add("shadow");
      navcontent.classList.remove("bg-gray-100");
      navcontent.classList.add("bg-white");
    } else {

      document.getElementById("logo-img").src="assets/logo_white.png";
      if($("#nav-content>ul>li>a").hasClass('text-black')){
        $("#nav-content>ul>li>a").toggleClass('text-white');
        $("#nav-content>ul>li>a").toggleClass('text-black');
      }
      header.classList.remove("bg-white");
      navaction.classList.remove("gradient");
      navaction.classList.add("bg-white");
      navaction.classList.remove("text-white");
      navaction.classList.add("text-gray-800");
      //Use to switch toggleColour colours
      for (var i = 0; i < toToggle.length; i++) {
        toToggle[i].classList.add("text-white");
        toToggle[i].classList.remove("text-gray-800");
      }

      header.classList.remove("shadow");
      navcontent.classList.remove("bg-white");
      navcontent.classList.add("bg-gray-100");
    }
  });

  var navMenuDiv = document.getElementById("nav-content");
  var navMenu = document.getElementById("nav-toggle");

  document.onclick = check;
  function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    //Nav Menu
    if (!checkParent(target, navMenuDiv)) {
      // click NOT on the menu
      if (checkParent(target, navMenu)) {
        // click on the link
        if (navMenuDiv.classList.contains("hidden")) {
          navMenuDiv.classList.remove("hidden");
          $('#nav-content>ul>li>a').removeClass('text-white');
          $('#nav-content>ul>li>a').addClass('text-black');
        } else {
            $('#nav-content>ul>li>a').removeClass('text-black');
            $('#nav-content>ul>li>a').addClass('text-white');
          navMenuDiv.classList.add("hidden");
        }
      } else {
        // click both outside link and outside menu, hide menu
        navMenuDiv.classList.add("hidden");
      }
    }
  }
  function checkParent(t, elm) {
    while (t.parentNode) {
      if (t == elm) {
        return true;
      }
      t = t.parentNode;
    }
    return false;
  }
});