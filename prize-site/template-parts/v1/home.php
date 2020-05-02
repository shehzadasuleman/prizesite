<?php
/*
@package prizesitetheme
*/
$ads_slide_timer = get_option( 'prizesite_winners_ad_timer' );
$ads_url_xml = get_template_directory_uri() . "/ads.xml";
$message_contact_url = get_template_directory_uri() . '/img/img01.png';
?>
<div id="home-top-desktop-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
    <?php
        $xml=new SimpleXMLElement( $ads_url_xml, 0, 1);
        $home_desktop_top_xml = $xml->xpath('/SiteAds/Home/Desktop/TopBanner');
        $top_desktop_counter = 0;
    ?>
    <!--Indicators -->
    <ol class="carousel-indicators">
        <?php while( $top_desktop_counter < count($home_desktop_top_xml) ) { ?>
                <li data-target="#home-top-desktop-carousel" data-slide-to="<?php echo $top_desktop_counter; ?>" class="<?php if( $top_desktop_counter == 0 ) { echo "active"; } ?>"></li>
        <?php $top_desktop_counter = $top_desktop_counter + 1; } ?>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php
            $top_desktop_counter = 0;
            foreach ($home_desktop_top_xml as $top_banner) { 
        ?>
                <div class="carousel-item <?php if( $top_desktop_counter == 0 ) { echo "active"; } ?>">
                    <a id="<?php echo $top_banner->LinkId; ?>" href="<?php echo $top_banner->TargetUrl; ?>"><img class="d-block w-100" src="<?php echo $top_banner->ImageUrl; ?>" alt="<?php echo $top_banner->ImageTitle; ?>"></a>
                </div>
        <?php $top_desktop_counter = $top_desktop_counter + 1; } ?>
    </div>
</div>
<div id="home-top-mobile-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
    <?php
        $xml=new SimpleXMLElement( $ads_url_xml, 0, 1);
        $home_mobile_top_xml = $xml->xpath('/SiteAds/Home/Mobile/TopBanner');
        $top_mobile_counter = 0;
    ?>
    <!--Indicators -->
    <ol class="carousel-indicators">
        <?php while( $top_mobile_counter < count($home_mobile_top_xml) ) { ?>
                <li data-target="#home-top-mobile-carousel" data-slide-to="<?php echo $top_mobile_counter; ?>" class="<?php if( $top_mobile_counter == 0 ) { echo "active"; } ?>"></li>
        <?php $top_mobile_counter = $top_mobile_counter + 1; } ?>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php
            $top_mobile_counter = 0;
            foreach ($home_mobile_top_xml as $top_banner) { 
        ?>
                <div class="carousel-item <?php if( $top_mobile_counter == 0 ) { echo "active"; } ?>">
                    <a id="<?php echo $top_banner->LinkId; ?>" href="<?php echo $top_banner->TargetUrl; ?>"><img class="d-block w-100" src="<?php echo $top_banner->ImageUrl; ?>" alt="<?php echo $top_banner->ImageTitle; ?>"></a>
                </div>
        <?php $top_mobile_counter = $top_mobile_counter + 1; } ?>
    </div>
</div>
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
                            <input type="text" id="no" class="form-control" >
                            <span class="error-message" id="error-msg">Please enter a phone number</span>
                            <span class="error-message" id="number-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
                        </div>
                        <div class="input-wrap">
                            <label for="email" class="label-text">Your email address (myemail@domain.com)</label>
                            <input type="text" id="email" class="form-control" >
                            <span class="error-message" id="email-error-msg">Please enter a valid email address</span>
                            <span class="error-message" id="email-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
                        </div>
                        <span class="guarantee-message">We guarantee to never share your mobile number or email address</span>
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