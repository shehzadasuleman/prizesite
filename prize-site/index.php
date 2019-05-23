<?php get_header(); ?>
<?php 
    $urlparts = parse_url(home_url());
    $domain = 'http:'.$urlparts['host'].'/wordpress/v1';
    $current_uri=$_SERVER['REQUEST_URI'];
    $logo_url = get_template_directory_uri() . '/img/logo.png';
    $background_url = get_template_directory_uri() . '/img/cover.jpg';
    $message_contact_url = get_template_directory_uri() . '/img/img01.png';
    $facebook_url = get_template_directory_uri() . '/img/facebook.svg';
    $instagram_url = get_template_directory_uri() . '/img/instagram.svg';
    $close_url = get_template_directory_uri() . '/img/close.svg';
    $current_page = explode('?',$current_uri);
    $onhold_notification_enabler = get_option( 'prizesite_onhold_notification_enabler' );
    $onhold_notification_message = get_option( 'prizesite_onhold_notification' );
    $onhold_page_enabler = get_option( 'prizesite_onhold_page_enabler' );
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
<div id="wrapper">
    <header id="header" style="background-image: url(<?php print $background_url ?>);">
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
                        wp_nav_menu( array(
                            'theme_location' => 'v1-primary-menu',
                            'container' => false,
                            'menu_class' => 'main-navigation'
                        ) );
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
    <main id="main">
        <?php if ( "/wordpress/v1" == $current_uri || $current_page[0] == "/wordpress/v1" ):?>
                <section class="info-block" id="infoblock">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1>Join Pakistan's<br> only <span class="slogan">Free</span><br> daily cash<br> draw site</h1>
                                
                                <?php
                                $category_id = get_cat_ID('V1 Home Descriprtion');
                                query_posts("cat=$category_id&posts_per_page=1");
                                if (have_posts()) {
                                    the_post(); ?>
                                    <div class="text-wrapper">
                                        <strong class="text"><?php the_title(); ?></strong>
                                        <?php $excerpt_content = get_the_excerpt(); ?>
                                        <a href="#" class="btn green"><?php echo $excerpt_content; ?></a>
                                    </div>
                                    <div class="text-holder">
                                        <p><?php the_content(); ?></p>
                                    </div>
                                <?php } wp_reset_query(); ?>
                            </div>
                            <div class="col">
                                <div class="time-block">
                                    <div class="timer-wrapper">
                                        <div class="timer">
                                            <span class="title">Next draw</span>
                                            <div id="defaultCountdown"></div>
                                        </div>
                                        <button type="sumbit" class="btn" data-toggle="modal" data-target="#popup-registration-modal">Enter daily lucky draw for free</button>
                                    </div>
                                </div>
                                <form id="prizesite-lucky-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                    <div class="form-group">
                                        <div class="input-wrap">
                                            <label for="no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                                            <input type="text" id="no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
                                            <span class="label">Don't worry, we'll never pass this on.</span>
                                            <span class="error-message" id="error-msg">Please enter a phone number</span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="check-box-div">
                                        <div class="input-wrap">
                                            <input id="agree" type="checkbox">
                                            <label id="check-label-box" for="agree" class="check-label">
                                                <?php
                                                    wp_nav_menu( array(
                                                        'theme_location' => 'v1-secondary-menu',
                                                        'container' => false,
                                                        'items_wrap' => '%3$s'
                                                    ) );
                                                ?>
                                            </label>
                                            <span class="error-message" id="error-chk-box-msg">Please agree to our Terms & Conditions</span>
                                        </div>
                                    </div>
                                    <button type="sumbit" class="btn">Enter daily lucky draw for free</button>
                                </form>
                                <div class="alert alert-danger hidden" id="v1-danger-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>Failure! </strong>
                                    Unable to save your Information, Please try again later.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="messages-block">
                    <div class="container">
                        <div class="message-box left">
                            <div class="message gray">
                                <span class="text">What's the catch? How can it be free to enter?</span>
                            </div>
                        </div>
                        <div class="message-box right">
                            <div class="message green">
                                <span class="text">We make money through ad revenue on the site, which is generated by the traffic caused by users checking if they've won. So, the more people come back to check everyday, the more money we can give away for free.</span>
                            </div>
                            <a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
                        </div>
                        <div class="message-box left">
                            <div class="message gray">
                                <span class="text">How are the winning mobile numbers chosen?</span>
                            </div>
                        </div>
                        <div class="message-box right">
                            <div class="message green">
                                <span class="text">Mobile numbers are randomly selected from the list of registered mobile numbers everyday. The selected numbers are then given free money. So, if your number is not in our system, it will not be picked.</span>
                            </div>
                            <a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
                        </div>
                        <div class="message-box left">
                            <div class="message gray">
                                <span class="text">Fm just going to get loads of spam aren't I?</span>
                            </div>
                        </div>
                        <div class="message-box right">
                            <div class="message green">
                                <span class="text">Definitely not. We will never share your details and will only use your mobile number to send you daily reminders to make sure you check if you have won. We may also send you the occasional updates.</span>
                            </div>
                            <a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
                        </div>
                        <div class="message-box left">
                            <div class="message gray">
                                <span class="text">How do I check if I have won?</span>
                            </div>
                        </div>
                        <div class="message-box right">
                            <div class="message green">
                                <span class="text">Just visit our winners page everyday to check if you have won. You'll get a daily reminder to check the site to see if your mobile number has won in the draws. It take less than a minute to check:)</span>
                            </div>
                            <a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
                        </div>
                        <div class="message-box left">
                            <div class="message gray">
                                <span class="text">How do I claim when I win?</span>
                            </div>
                        </div>
                        <div class="message-box right">
                            <div class="message green">
                                <span class="text">If you win, claim your prize by sending us a text message saying "WINNER" on our company mobile number shown on the page when you win your prize.</span>
                            </div>
                            <a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
                        </div>
                    </div>
                </section>
                <aside class="aside">
                    <div class="container">
                        <div class="text-holder">
                            <p>Thanks for reading all the way down. All that's left to do is sign up and see for yourself. Good Luck!</p>
                        </div>
                        <div class="btn-holder">
                            <button type="sumbit" class="btn" data-toggle="modal" data-target="#popup-registration-modal">Enter daily lucky draw for free</button>
                        </div>
                    </div>
                </aside>
        <?php elseif ( "/wordpress/v1/whats-the-catch" == $current_uri || strpos($current_uri, "/wordpress/v1/whats-the-catch") !== false ):?>
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/whats-the-catch', get_post_format() );

                        endwhile;
                    endif;
                ?>
        <?php elseif ( "/wordpress/v1/contact-us" == $current_uri || strpos($current_uri, "/wordpress/v1/contact-us") !== false ):?>
                    <?php
                        if (have_posts() ):
                            while( have_posts() ): the_post();

                                get_template_part( 'template-parts/v1/contactus', get_post_format() );

                            endwhile;
                        endif;
                    ?>
        <?php elseif ( "/wordpress/v1/winners" == $current_uri || strpos($current_uri, "/wordpress/v1/winners") !== false ):?>
                    <?php
                        if (have_posts() ):
                            while( have_posts() ): the_post();

                                get_template_part( 'template-parts/v1/winners', get_post_format() );

                            endwhile;
                        endif;
                    ?>
        <?php elseif ( "/wordpress/v1/failure-confirmation-page" == $current_uri || strpos($current_uri, "/wordpress/v1/failure-confirmation-page") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/failure-confirmation', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/success-confirmation-page" == $current_uri || strpos($current_uri, "/wordpress/v1/success-confirmation-page") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/success-confirmation', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/not-registered" == $current_uri || strpos($current_uri, "/wordpress/v1/not-registered") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/not-registered', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/try-tomorrow" == $current_uri || strpos($current_uri, "/wordpress/v1/try-tomorrow") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/did-not-won', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/won" == $current_uri || strpos($current_uri, "/wordpress/v1/won") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/won', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/terms-and-conditions" == $current_uri || strpos($current_uri, "/wordpress/v1/terms-and-conditions") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/termsconditions', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/cookies-policy" == $current_uri || strpos($current_uri, "/wordpress/v1/cookies-policy") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/cookies-policy', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/privacy-policy" == $current_uri || strpos($current_uri, "/wordpress/v1/privacy-policy") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/privacy-policy', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/past-winners" == $current_uri || strpos($current_uri, "/wordpress/v1/past-winners") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/past-winners', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/faqs" == $current_uri || strpos($current_uri, "/wordpress/v1/faqs") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/faqs', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php elseif ( "/wordpress/v1/404" == $current_uri || strpos($current_uri, "/wordpress/v1/404") !== false ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/404', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php else: ?>
        <script type="text/javascript">window.location = 'http://localhost/wordpress/v1/404';</script>
        <?php endif; ?>
    </main>
    
    <?php if ( $onhold_notification_enabler == 1 ) { ?>
        <div id="onhold-notification" class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $onhold_notification_message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
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
                                <h3>Register once, for a chance to win everyday!</h3>
                                <form id="prizesite-lucky-form-popup" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                    <div class="form-group">
                                        <div class="input-wrap">
                                            <label for="popup-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                                            <input type="text" id="popup-no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
                                            <span class="label">Don't worry, we'll never pass this on.</span>
                                            <span class="error-message" id="popup-error-msg">Please enter a phone number</span>
                                        </div>
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
                                    </div>
                                    </div>
                                    <button type="sumbit" class="btn">Enter daily lucky draw for free</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
<?php get_footer(); ?>