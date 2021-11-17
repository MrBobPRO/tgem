//--------------AJAX request setup start--------------
$.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//--------------AJAX request setup end--------------


//--------------Set navbar position fixed on scroll start--------------
let fixed_navbar = document.getElementById("fixed_navbar_container");
let home_page = fixed_navbar.classList.contains("home-navbar-container--fixed");

window.onscroll = function () {
    // If it is HOME PAGEaside-toggler
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
//--------------Set navbar position fixed on scroll end--------------


//--------------Aside start--------------
let aside = document.getElementById("aside");

// Show Aside
document.querySelectorAll(".aside-toggler").forEach(item => {
  item.addEventListener("click", event => {
    aside.classList.add("aside--visible");
  })
});

// Hide Aside
document.querySelectorAll("*[data-action='hide-aside']").forEach(item => {
  item.addEventListener("click", event => {
    aside.classList.remove("aside--visible");
  })
});
//----------------Aside end----------------


//----------------Search Popup start----------------
let search_popup = document.getElementById("search_popup");
document.querySelectorAll(".search-toggler").forEach(item => {
  item.addEventListener("click", event => {
    search_popup.classList.add("search-popup--visible");
  })
});

//hide Search Popup
let search_hide_btn = document.getElementById("hide_search_btn");
search_hide_btn.addEventListener("click", event => {
  search_popup.classList.remove("search-popup--visible");
});


//----------------Search Popup утв----------------


//--------------Scroll Top start----------------
function scroll_top() {
  let body = document.body;
  body.scrollIntoView({ block: "start", behavior: "smooth" });
}

let scroll_top_btn = document.getElementById("scroll_top");
scroll_top_btn.addEventListener("click", scroll_top);
//--------------Scroll Top end----------------


//--------------Home main Owl Carousel start----------------
let home__carousel = $("#home__carousel");
if (home__carousel[0]) home__carousel.owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1,
    dots: false
});
//--------------Home main Owl Carousel end----------------


//--------------Home Services Owl Carousel start----------------
let services__carousel = $("#services__carousel");
if (services__carousel[0]) services__carousel.owlCarousel({
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
let map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 38.550527, lng: 68.736801},
    zoom: 15,
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