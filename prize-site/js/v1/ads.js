jQuery(document).ready(function($) {

    function changeFacebookFrameSize(){
        $("#winners-fb-review .fb-post iframe").css("min-width","");
        var divWidth = $("#winners-fb-review").width();
        $("#winners-fb-review .fb-post iframe").css("max-width",divWidth);
        $("#winners-fb-mob-review .fb-post iframe").css("min-width","");
        var divMobWidth = $("#winners-right-ad").width();
        $("#winners-fb-mob-review .fb-post iframe").css("max-width",divMobWidth);
    }
    setTimeout(changeFacebookFrameSize, 5000);

    $(window).resize(function(){
        changeFacebookFrameSize();
    });

    // sleep time expects milliseconds
    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }
    
    var newWindowWidth = $(window).width();
    if ( window.location.pathname == "/wordpress/v1/winners" ) {
        if (newWindowWidth < 576) {
            $("#dailydraw-top-mobile-carousel").css({ "display": "none" });
            sleep(1000).then(() => {
                $( "#dailydraw-top-mobile-carousel" ).slideDown(6000);
            });
        } else {
            $("#dailydraw-top-desktop-carousel").css({ "display": "none" });
            sleep(1000).then(() => {
                $( "#dailydraw-top-desktop-carousel" ).slideDown(6000);
            });
        }
    }
});