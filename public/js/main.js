// --------------AJAX request setup start--------------
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// --------------AJAX request setup end--------------


// --------------Set navbar position fixed on scroll start--------------
let fixed_navbar = document.getElementById("fixed_navbar_container");
let home_page = fixed_navbar.classList.contains("home-navbar-container--fixed");

window.onscroll = function () { // If it is HOME PAGEaside-toggler
    if (home_page) {
        if (document.body.scrollTop > 177 || document.documentElement.scrollTop > 177) {
            fixed_navbar.classList.add("navbar-container--visible");
        } else {
            fixed_navbar.classList.remove("navbar-container--visible");
        }
    }
    // Else if its not HOME PAGE else {
    if (document.body.scrollTop > 91 || document.documentElement.scrollTop > 91) {
        fixed_navbar.classList.add("navbar-container--visible");
    } else {
        fixed_navbar.classList.remove("navbar-container--visible");
    }
}

// --------------Set navbar position fixed on scroll end--------------


// --------------Aside start--------------
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
// ----------------Aside end----------------


// --------------Mobile menu start--------------
let mobile_menu = document.getElementById("mobile_menu");

// Show Aside
document.querySelectorAll(".mobile-menu-toggler").forEach(item => {
    item.addEventListener("click", event => {
        mobile_menu.classList.add("mobile-menu--visible");
    })
});

// Hide Aside
document.querySelectorAll("*[data-action='hide-mobile-menu']").forEach(item => {
    item.addEventListener("click", event => {
        mobile_menu.classList.remove("mobile-menu--visible");
    })
});
// --------------Mobile menu start--------------


// ----------------Search Popup start----------------
let search_popup = document.getElementById("search_popup");
document.querySelectorAll(".search-toggler").forEach(item => {
    item.addEventListener("click", event => {
        search_popup.classList.add("search-popup--visible");
    })
});

// hide Search Popup
let search_hide_btn = document.getElementById("hide_search_btn");
search_hide_btn.addEventListener("click", event => {
    search_popup.classList.remove("search-popup--visible");
});


// ----------------Search Popup утв----------------


// --------------Scroll Top start----------------
function scroll_top() {
    let body = document.body;
    body.scrollIntoView({block: "start", behavior: "smooth"});
}

let scroll_top_btn = document.getElementById("scroll_top");
scroll_top_btn.addEventListener("click", scroll_top);
// --------------Scroll Top end----------------


// --------------Home main Owl Carousel start----------------
let home__carousel = $("#home__carousel");
if (home__carousel[0]) 
    home__carousel.owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 9000,
        nav: false,
        items: 1,
        dots: false
    });


// --------------Home main Owl Carousel end----------------


// --------------Home Services Owl Carousel start----------------
let services__carousel = $("#services__carousel");
if (services__carousel[0]) 
    services__carousel.owlCarousel({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3500,
        margin: 20,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 3
            }
        }
    });


// --------------Home main Owl Carousel end----------------


// --------------Google Maps start----------------
let map = document.getElementById("map");
if (map) {
    let map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 38.550527,
                lng: 68.736801
            },
            zoom: 15,
            mapTypeControl: false,
            streetViewControl: false
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: false,
            animation: google.maps.Animation.BOUNCE,
            position: {
                lat: 38.550527,
                lng: 68.736801
            },
            // icon: '/img/main/marker.png'
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
}
// --------------Google Maps end----------------


// --------------Counter start----------------
if ($('.count-box').length) {
    $('.count-box').appear(function () {

        var $t = $(this),
            n = $t.find(".count-text").attr("data-stop"),
            r = parseInt($t.find(".count-text").attr("data-speed"), 10);

        if (! $t.hasClass("counted")) {
            $t.addClass("counted");
            $({countNum: $t.find(".count-text").text()}).animate({
                countNum: n
            }, {
                duration: r,
                easing: "linear",
                step: function () {
                    $t.find(".count-text").text(Math.floor(this.countNum));
                },
                complete: function () {
                    $t.find(".count-text").text(this.countNum);
                }
            });
        }

    }, {accY: 0});
}
// --------------Counter end----------------


// ----------------Wow animation start----------------
if ($('.wow').length) {
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true // act on asynchronously loaded content (default is true)
    });
    wow.init();
}
// ----------------Wow animation end----------------
