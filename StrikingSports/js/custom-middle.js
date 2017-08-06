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