//AJAX request setup
$.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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