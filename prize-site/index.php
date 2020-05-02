<?php get_header(); ?>
<?php 
    $urlparts = parse_url(home_url());
    $domain = 'http:'.$urlparts['host'].'/wordpress/v1';
    $current_uri=$_SERVER['REQUEST_URI'];
    $logo_url = get_template_directory_uri() . '/img/logo.png';
    $background_url = get_template_directory_uri() . '/img/cover.jpg';
    $facebook_url = get_template_directory_uri() . '/img/facebook.svg';
    $instagram_url = get_template_directory_uri() . '/img/instagram.svg';
    $close_url = get_template_directory_uri() . '/img/close.svg';
    $current_page = explode('?',$current_uri);
    $onhold_notification_enabler = get_option( 'prizesite_onhold_notification_enabler' );
    $onhold_notification_message = get_option( 'prizesite_onhold_notification' );
    $onhold_page_enabler = get_option( 'prizesite_onhold_page_enabler' );
    $ads_slide_timer = get_option( 'prizesite_winners_ad_timer' );
    $ads_banner_1 = get_template_directory_uri() . '/img/Ads/Slider/AdsBanner1.jpg';
    $ads_banner_2 = get_template_directory_uri() . '/img/Ads/Slider/AdsBanner2.jpg';
    $ads_banner_3 = get_template_directory_uri() . '/img/Ads/Slider/AdsBanner3.jpg';
    $ads_url_xml = get_template_directory_uri() . "/ads.xml";
    $user = wp_get_current_user();
    //echo $current_uri;
?>
<?php if ( $onhold_page_enabler == 1 ) { ?>
<div id="onhold-page" class="container" >
    <div class="row">
        <div class="col-md-6">
            <div class="error-template">
                <h1>
                    :) Oops!</h1>
                <h2>
                    Temporarily down for maintenance</h2>
                <h1>
                    We’ll be back soon!</h1>
                <div>
                    <p>
                        Sorry for the inconvenience but we’re performing some maintenance at the moment.
                        we’ll be back online shortly!</p>
                    <p>
                        — MuftPaise</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <svg class="svg-box" width="380px" height="500px" viewbox="0 0 837 1045" version="1.1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#3bafda" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#7266ba" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#f76397" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#00b19d" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#ffaa00" stroke-width="6" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>
        </div>
    </div>
</div>
<?php } else { ?>
    <?php if ( $onhold_notification_enabler == 1 ) { ?>
        <div id="onhold-notification" class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $onhold_notification_message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
<div id="wrapper">
    <?php if ( is_page('winners-2') || is_page('v1-contests') || is_page('whatsapp') || is_page('success-confirmation-page') 
    || is_page('view-contest') || is_page('live-contest') || is_page('v1') || is_page('register') || is_page('login') 
    || is_page('account') || is_page('password-reset') || is_page('terms-and-conditions-2') || is_page('cookies-policy') 
    || is_page('privacy-policy-2') || is_page('404-2') || is_page('you-number-is-already-part-of-the-prize-pool') 
    || is_page('verification') ) { ?>
        <header id="header" style="min-height:0px;">
    <?php } elseif ( is_page('whats-the-catch') || is_page('v1-faqs') || is_page('contact-us-2') || is_page('partners') ) { ?>
        <header id="header" style="background-image: url(<?php print $background_url ?>);">
    <?php } ?>
        <?php if ( !is_page('eatzii-rewards') ) { ?>
            <div class="header-holder">
                <div class="logo">
                    <a href="<?php print $domain ?>"><img src="<?php print $logo_url ?>" alt="image dscription"></a>
                </div>
                <a href="#" class="nav-opener">
                    <span class="menu">menu</span>
                    <span class="close"><img src="<?php print $close_url ?>" alt="image description"></span>
                </a>
                <div class="nav-holder">
                    <div class="nav-area">
                        <?php
                            if ( $user->ID === 0 ) {
                                wp_nav_menu( array(
                                    'theme_location' => 'v1-primary-menu',
                                    'container' => false,
                                    'menu_class' => 'main-navigation'
                                ) );
                            } elseif ( $user->ID > 0 ) {
                                wp_nav_menu( array(
                                    'theme_location' => 'v1-primary-menu-loggedin',
                                    'container' => false,
                                    'menu_class' => 'main-navigation'
                                ) );
                            }
                        ?>
                        <div class="btn-holder">
                        <button type="sumbit" class="btn" data-toggle="modal" data-target="#popup-registration-modal">Enter daily lucky draw for free</button>
                        </div>
                        <div class="social-block">
                            <strong class="title">Be our friend</strong>
                            <ul class="social-networks">
                                <li><a href="https://www.facebook.com/MuftPaise/" target="_blank"><img src="<?php print $facebook_url ?>" alt="image description"></a></li>
                                <li><a href="https://www.instagram.com/muftpaise/" target="_blank"><img src="<?php print $instagram_url ?>" alt="image description"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php } ?>
    <?php if ( is_page('v1-contests') || is_page('view-contest') || is_page('live-contest') ) { ?>
        <!--Carousel Wrapper-->
        <div class="row">
            <div id="carousel-example-1z" class="carousel slide carousel-fade col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                <!--Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php print $ads_banner_1 ?>" alt="First slide"></a>
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <a target="_blank" href="https://www.youtube.com/watch?v=XsbnIpFBD54"><img id="carousel-slide-two" class="d-block w-100" src="<?php print $ads_banner_2 ?>" alt="Second slide"></a>
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                        <a target="_blank" href="https://www.servis.com/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-three" class="d-block w-100" src="<?php print $ads_banner_3 ?>" alt="Third slide"></a>
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a id="prev-btn" class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a id="next-btn" class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
        </div>
        <!--/.Carousel Wrapper-->
    <?php } ?>
    <?php if ( is_page('whatsapp') ) { ?>
        <!--Carousel Wrapper-->
        <div class="row">
            <div id="carousel-example-1z" class="carousel slide carousel-fade col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                <!--Indicators -->
                <ol id="whatsapp-carousel-indicators" class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item whatsapp-carousel active">
                        <p>Pakistan's only FREE daily cash draw websit</p>
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item whatsapp-carousel">
                        <p>Never miss out on your prize</p>
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item whatsapp-carousel">
                        <p>Join our WhatsApp group for daily reminders</p>
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
            </div>
        </div>
        <!--/.Carousel Wrapper-->
    <?php } ?>
    <main id="main">
        <?php if ( is_page('v1') ) { ?>
            <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/home', get_post_format() );

                        endwhile;
                    endif;
                ?>
        <?php } elseif ( is_page('whats-the-catch') ) { ?>
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/whats-the-catch', get_post_format() );

                        endwhile;
                    endif;
                ?>
        <?php } elseif ( is_page('contact-us-2') ) { ?>
                    <?php
                        if (have_posts() ):
                            while( have_posts() ): the_post();

                                get_template_part( 'template-parts/v1/contactus', get_post_format() );

                            endwhile;
                        endif;
                    ?>
        <?php } elseif ( is_page('winners-2') ) { ?>
                    <?php
                        if (have_posts() ):
                            while( have_posts() ): the_post();

                                get_template_part( 'template-parts/v1/winners', get_post_format() );

                            endwhile;
                        endif;
                    ?>
        <?php } elseif ( is_page('you-number-is-already-part-of-the-prize-pool') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/failure-confirmation', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('success-confirmation-page') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/success-confirmation', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('not-registered') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/not-registered', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('did-not-won') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/did-not-won', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('won') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/won', get_post_format() );

                        endwhile;
                    endif;
                ?>
                </div>
        <?php } elseif ( is_page('terms-and-conditions-2') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/termsconditions', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('cookies-policy') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/cookies-policy', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('privacy-policy-2') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/privacy-policy', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('v1-past-winners') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/past-winners', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('v1-faqs') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/faqs', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('verification') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/verification', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('v1-ads') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/ads', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('v1-contests') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/contests', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('muft-rewards') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/muft-rewards', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('muft-rewards-term-conditions') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/mr-termsconditions', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('mr-verification') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/mr-verification', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('dashboard') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/mr-user-dashboard', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('whatsapp') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/whatsapp', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('view-contest') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/view-contests', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('live-contest') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/live-contest', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('partners') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/partners', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('register') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/register', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('login') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/login', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('account') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/account', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('password-reset') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/password-reset', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('logout') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/logout', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('eatzii-rewards') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();
                            get_template_part( 'template-parts/v1/eatzii-rewards', get_post_format() );
                        endwhile;
                    endif;
                ?>
            </div>
        <?php } elseif ( is_page('404-2') ) { ?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/404', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php } else { ?>
            <script type="text/javascript">window.location = 'http://localhost/wordpress/v1/404';</script>
        <?php } ?>
    </main>
</div>

<div class="modal" id="popup-registration-modal" tabindex="-1" role="dialog" aria-labelledby="popupRegistrationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div>
                            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col">
                                <div id="popup-progress-bar" class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span id="popup-progress-content">Progress ( 25% )</span></div>
                                </div>
                                <h3>Register once, for a chance to win everyday!</h3>
                                <form id="prizesite-lucky-form-popup" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                    <div class="form-group">
                                        <div class="input-wrap">
                                            <label for="popup-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                                            <input type="text" id="popup-no" class="form-control" >
                                            <span class="error-message" id="popup-error-msg">Please enter a phone number</span>
                                            <span class="error-message" id="popup-no-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
                                        </div>
                                        <div class="input-wrap">
                                            <label for="popup-email" class="label-text">Your email address (myemail@domain.com)</label>
                                            <input type="text" id="popup-email" class="form-control" >
                                            <span class="error-message" id="popup-email-error-msg">Please enter a valid email address</span>
                                            <span class="error-message" id="popup-email-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
                                        </div>
                                        <span class="guarantee-message">We guarantee to never share your mobile number or email address</span>
                                    </div>
                                    <div class="form-group" id="check-box-div">
                                        <div class="input-wrap">
                                            <input id="popup-agree" type="checkbox">
                                            <label id="popup-check-label-box" for="popup-agree" class="check-label">
                                            <?php
                                                wp_nav_menu( array(
                                                'theme_location' => 'v1-secondary-menu',
                                                    'container' => false,
                                                    'items_wrap' => '%3$s'
                                                ) );
                                            ?>
                                            </label>
                                            <span class="error-message" id="popup-error-chk-box-msg">Please agree to our Terms & Conditions</span>
                                    </div>
                                    </div>
                                    <button type="sumbit" class="btn">Enter daily lucky draw for free</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="modal" id="progress-modal" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span id="progress-content">Progress ( 25% )</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php get_footer(); ?>