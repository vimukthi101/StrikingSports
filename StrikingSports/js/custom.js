$(document).ready(function() {
    "use strict";
	
    //LEFT MOBILE MENU OPEN
    $(".mob-menu").on('click', function() {
        $(".menu").css('left', '0px');
        $(".mob-menu").fadeOut("fast");
        $(".mob-close").fadeIn("20000");
    });
	
    //LEFT MOBILE MENU CLOSE
    $(".mob-close").on('click', function() {
        $(".mob-close").hide("fast");
        $(".menu").css('left', '-92px');
        $(".mob-menu").show("slow");
    });
	
 	//mega menu
    $(".tr-menu").hover(function() {
        $(".cat-menu").fadeIn(50);
    });
    $(".i-head-top").mouseleave(function() {
        $(".cat-menu").fadeOut("slow");
    });

    //PRE LOADING
    $('#status').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({
        'overflow': 'visible'
    });
});

//Slider
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
}