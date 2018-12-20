jQuery(document).ready(function($) {

    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        var newWindowHeight = $(window).height();
        if (newWindowHeight < 700) {
            /*$("html, body").animate({ 
                scrollTop: $('.input-wrap').offset().top 
            }, 1000);*/
        }
    }

});