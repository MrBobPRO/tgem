//AJAX request setup
$.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// Set navbar position fixed on scroll
let fixed_navbar = document.getElementById("fixed_navbar_container");
let home_page = fixed_navbar.classList.contains("home-navbar-container--fixed");
    
window.onscroll = function () {
    // If it is HOME PAGE
    if (home_page) {
        if (document.body.scrollTop > 177 || document.documentElement.scrollTop > 177) {
            fixed_navbar.classList.add("navbar-container--visible");
        } else {
            fixed_navbar.classList.remove("navbar-container--visible");
        }
    }
    // Else if its not HOME PAGE
    else {
        if (document.body.scrollTop > 91 || document.documentElement.scrollTop > 91) {
            fixed_navbar.classList.add("navbar-container--visible");
        } else {
            fixed_navbar.classList.remove("navbar-container--visible");
        }
    }
}


//--------------Home main Owl Carousel start----------------
var home__carousel = $('#home__carousel');
if (home__carousel) home__carousel.owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1,
    dots: false
});
//--------------Home main Owl Carousel end----------------

//--------------Home Services Owl Carousel start----------------
var services__carousel = $('#services__carousel');
if (services__carousel) services__carousel.owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    items: 3,
    dots: false
});
//--------------Home main Owl Carousel end----------------