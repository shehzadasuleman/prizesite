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
    /*setTimeout(changeAdsByScreenSize, 100);

    $(window).resize(function(){
        changeFacebookFrameSize();
        changeAdsByScreenSize();
    });
    
    function changeAdsByScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 576) {
            $("#carousel-example-1z #carousel-slide-one").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/MobAds1.jpg");
            $("#carousel-example-1z #carousel-slide-two").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/MobAds2.jpg");
            $("#carousel-example-1z #carousel-slide-three").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/MobAds3.jpg");
            
            $("#winners-fb-mob-review").css("display","block");
            $("#winners-fb-review").css("display","none");

            $("#carousel-right-ads").css("display","none");
            $("#mob-carousel-right-ads").css("display","block");
            $("#mob-carousel-right-ads #carousel-slide-one").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/right-mob-ad1.jpg");
            $("#mob-carousel-right-ads #carousel-slide-two").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/right-mob-ad2.jpg");
            $("#mob-carousel-right-ads #carousel-slide-three").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/right-mob-ad3.jpg");
        
            $("#carousel-left-ads").css("display","none");
            $("#mob-carousel-left-ads").css("display","block");
            $("#mob-carousel-left-ads #carousel-slide-one").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/left-mob-ad1.jpg");
            $("#mob-carousel-left-ads #carousel-slide-two").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/left-mob-ad2.jpg");
            $("#mob-carousel-left-ads #carousel-slide-three").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Mobile/left-mob-ad3.jpg");
        } else {
            $("#winners-fb-mob-review").css("display","none");
            $("#winners-fb-review").css("display","block");
            
            $("#carousel-example-1z #carousel-slide-one").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/AdsBanner1.jpg");
            $("#carousel-example-1z #carousel-slide-two").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/AdsBanner2.jpg");
            $("#carousel-example-1z #carousel-slide-three").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/AdsBanner3.jpg");
            
            $("#mob-carousel-right-ads").css("display","none");
            $("#carousel-right-ads").css("display","block");
            $("#carousel-right-ads #carousel-slide-one").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/right-desktop-ad1.jpg");
            $("#carousel-right-ads #carousel-slide-two").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/right-desktop-ad2.jpg");
            $("#carousel-right-ads #carousel-slide-three").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/right-desktop-ad3.jpg");

            $("#mob-carousel-left-ads").css("display","none");
            $("#carousel-left-ads").css("display","block");
            $("#carousel-left-ads #carousel-slide-one").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/left-desktop-ad1.jpg");
            $("#carousel-left-ads #carousel-slide-two").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/left-desktop-ad2.jpg");
            $("#carousel-left-ads #carousel-slide-three").attr("src", "/wordpress/wp-content/themes/prize-site/img/Ads/Slider/Desktop/left-desktop-ad3.jpg");
        }
    }*/
});