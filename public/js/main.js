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

//--------------Scroll Top start----------------
function scroll_top() {
  let body = document.body;
  body.scrollIntoView({ block: "start", behavior: "smooth" });
}

let scroll_top_btn = document.getElementById("scroll_top");
scroll_top_btn.addEventListener("click", scroll_top);
//--------------Scroll Top end----------------


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
  autoplay: true,
  autoplaySpeed: 3500,
  margin: 20,
  nav: false,
  items: 3,
  dots: false
});
//--------------Home main Owl Carousel end----------------


//--------------Google Maps start----------------
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 38.550527, lng: 68.736801},
    zoom: 16,
    mapTypeControl: false,
    streetViewControl: false
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: false,
    animation: google.maps.Animation.BOUNCE,
    position: {lat: 38.550527, lng: 68.736801},
    //  icon: '/img/main/marker.png'
  });
  marker.addListener('click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
//--------------Google Maps end----------------


//--------------Gallery plugin start----------------
lc_lightbox('.gallery__element', {
  wrap_class: 'lcl_fade_oc',
  gallery : true, 
  thumb_attr: 'data-lcl-thumb', 
  skin: 'dark',
  // more options here
}); 
//--------------Gallery plugin end----------------