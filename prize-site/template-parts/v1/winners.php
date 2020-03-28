<?php
/*
@package prizesitetheme
*/
?>
<?php
    //New Changes
    date_default_timezone_set('Asia/Karachi');
    $curr_time=time();
    $curr_date = date("F j, Y");
    $right_ads_banner_1 = get_template_directory_uri() . '/img/Ads/Slider/Desktop/right-desktop-ad1.jpg';
    $right_ads_banner_2 = get_template_directory_uri() . '/img/Ads/Slider/Desktop/right-desktop-ad2.jpg';
    $right_ads_banner_3 = get_template_directory_uri() . '/img/Ads/Slider/Desktop/right-desktop-ad3.jpg';
    $ads_slide_timer = get_option( 'prizesite_winners_ad_timer' );
    $check_draw_ad_timer = get_option( 'prizesite_check_ad_timer' );
    $next_draw_message = get_option( 'prizesite_next_draw_message' );
    $current_draw_prize = get_option( 'prizesite_current_draw_prize' );
    $mobile_ad = get_template_directory_uri() . '/img/Ads/Slider/Check-MobAd.jpg';
    $ads_url_xml = get_template_directory_uri() . "/ads.xml";
?>
<script type="text/javascript">var ad_timer = "<?= $check_draw_ad_timer ?>";</script>
<!-- Facebook Plugin Starts-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Facebook Plugin Ends-->

<!--
<div class="winners-main-content">
    <div class="row winners-cover-ad-banner-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-cover-ad-banner">
			<p><a target="_blank" href="http://www.dpbolvw.net/click-8787409-11337760" target="_top">
            <img src="http://www.lduhtrp.net/image-8787409-11337760" alt="" border="0"/></a></p>
		</div>
    </div>
</div>
-->
<div class="row">
    <div class="carousel-ad-info col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
        <p>Advertisement</p>
    </div>
    <div id="dailydraw-top-desktop-carousel" class="carousel slide carousel-fade col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
        <div class="adplugg-tag" data-adplugg-zone="dd_desktop_top_bar_zone"></div>
    </div>
    <div id="dailydraw-top-mobile-carousel" class="carousel slide carousel-fade col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
        <div class="adplugg-tag" data-adplugg-zone="dd_mobile_top_bar_zone"></div>
    </div>
</div>
<!--/.Carousel Wrapper-->

<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">

                <div id="winners-fb-review" class="col-xl-3 col-lg-3 col-md-2 col-sm-2 remove-padding">
                    <!-- FACEBOOOK PLUGIN STARTS-->
                    <strong class="title">Facebook Reviews</strong>
                    <p>Here are some reviews left by some of our winners.</p>
                    <div class="fb-post" data-href="https://www.facebook.com/permalink.php?story_fbid=1794745310647847&amp;id=100003371854690" data-show-text="false"><blockquote cite="https://www.facebook.com/permalink.php?story_fbid=1794745310647847&amp;id=100003371854690" class="fb-xfbml-parse-ignore"><p>good work for people eran money</p>Posted by <a href="#" role="button">Ali Khan</a> on&nbsp;<a href="https://www.facebook.com/permalink.php?story_fbid=1794745310647847&amp;id=100003371854690">Tuesday, 6 November 2018</a></blockquote></div>
                    <br/>
                    <div class="fb-post" data-href="https://www.facebook.com/sohaibahmadbhatti/posts/10217963339294253" data-show-text="false"><blockquote cite="https://www.facebook.com/sohaibahmadbhatti/posts/10217963339294253" class="fb-xfbml-parse-ignore"><p>Friends Join it. its really works. I won 2 times here..</p>Posted by <a href="https://www.facebook.com/sohaibahmadbhatti">Sohaib Ahmad Bhatti</a> on&nbsp;<a href="https://www.facebook.com/sohaibahmadbhatti/posts/10217963339294253">Friday, 19 October 2018</a></blockquote></div>
                    <br/>
                    <div class="fb-post" data-href="https://www.facebook.com/misbahfarhan.misbahfarhan.7/posts/241609586635985" data-show-text="false"><blockquote cite="https://www.facebook.com/misbahfarhan.misbahfarhan.7/posts/241609586635985" class="fb-xfbml-parse-ignore"><p>It&#039;s work it&#039;s really work.I won the 250 balance thank you Muftpaise</p>Posted by <a href="https://www.facebook.com/misbahfarhan.misbahfarhan.7">Misbah Farhan Misbah Farhan</a> on&nbsp;<a href="https://www.facebook.com/misbahfarhan.misbahfarhan.7/posts/241609586635985">Monday, 9 July 2018</a></blockquote></div>
                    <br/><br/>
                    <!-- FACEBOOOK PLUGIN ENDS -->
				</div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 recent-winners-content">
                    <!-- New Changes -->
                    <div class="today-prize-block">
                        <p>Today's Prize<span class="btn green"><?php echo $current_draw_prize; ?></span></p>
                    </div>
                    <form id="prizesite-lucky-form-check" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <div class="row remove-margin">
                            <div class="input-content-mobile">                                
								<h2>Enter your Number below to see if you won in today's draw!</h2><?php echo $current_draw_message; ?><br/>
                            </div><br/>
							<div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 input-content-mobile">
								<div class="input-wrap">
									<label for="check-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
									<input type="text" id="check-no" class="form-control" placeholder="" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}">
                                    <span class="error-message" id="check-error-msg">Please enter a phone number</span>
                                </div>
							</div>
						    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 check-prize-btn-box">
                                <button type="submit" class="check-prize-btn btn btn-primary">Check If I Won Today</button><br/><br/>
                            </div>
                        </div>
                        <div class="next-draw-block">
                            <p>Next Draw</p>
                            <h3><?php echo $next_draw_message; ?></h3>
                        </div>						
                    </form>
                </div>
                <div id="dailydraw-right-mobile-carousel-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                    <?php
                        $xml=new SimpleXMLElement( $ads_url_xml, 0, 1);
                        $dailydraw_mobile_right_xml = $xml->xpath('/SiteAds/DailyDraw/Mobile/RightBanner');
                        $right_mobile_counter = 0;
                    ?>
                    <!--Indicators -->
                    <ol class="carousel-indicators">
                        <?php while( $right_mobile_counter < count($dailydraw_mobile_right_xml) ) { ?>
                                <li data-target="#dailydraw-right-mobile-carousel-ads" data-slide-to="<?php echo $right_mobile_counter; ?>" class="<?php if( $right_mobile_counter == 0 ) { echo "active"; } ?>"></li>
                        <?php $right_mobile_counter = $right_mobile_counter + 1; } ?>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <?php
                            $right_mobile_counter = 0;
                            foreach ($dailydraw_mobile_right_xml as $right_banner) { 
                        ?>
                                <div class="carousel-item <?php if( $right_mobile_counter == 0 ) { echo "active"; } ?>">
                                    <a id="<?php echo $right_banner->LinkId; ?>" target="_blank" href="<?php echo $right_banner->TargetUrl; ?>"><img class="d-block w-100" src="<?php echo $right_banner->ImageUrl; ?>" alt="<?php echo $right_banner->ImageTitle; ?>"></a>
                                </div>
                        <?php $right_mobile_counter = $right_mobile_counter + 1; } ?>
                    </div>
                    <!--Controls-->
                    <a id="right-prev-btn" class="carousel-control-prev" href="#dailydraw-right-mobile-carousel-ads" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a id="right-next-btn" class="carousel-control-next" href="#dailydraw-right-mobile-carousel-ads" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
				<div id="winners-right-ad" class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                    <div id="dailydraw-right-desktop-carousel-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                        <?php
                            $xml=new SimpleXMLElement( $ads_url_xml, 0, 1);
                            $dailydraw_desktop_right_xml = $xml->xpath('/SiteAds/DailyDraw/Desktop/RightBanner');
                            $right_desktop_counter = 0;
                        ?>
                        <!--Indicators -->
                        <ol class="carousel-indicators">
                            <?php while( $right_desktop_counter < count($dailydraw_desktop_right_xml) ) { ?>
                                    <li data-target="#dailydraw-right-desktop-carousel-ads" data-slide-to="<?php echo $right_desktop_counter; ?>" class="<?php if( $right_desktop_counter == 0 ) { echo "active"; } ?>"></li>
                            <?php $right_desktop_counter = $right_desktop_counter + 1; } ?>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <?php
                                $right_desktop_counter = 0;
                                foreach ($dailydraw_desktop_right_xml as $right_banner) { 
                            ?>
                                    <div class="carousel-item <?php if( $right_desktop_counter == 0 ) { echo "active"; } ?>">
                                        <a id="<?php echo $right_banner->LinkId; ?>" target="_blank" href="<?php echo $right_banner->TargetUrl; ?>"><img class="d-block w-100" src="<?php echo $right_banner->ImageUrl; ?>" alt="<?php echo $right_banner->ImageTitle; ?>"></a>
                                    </div>
                            <?php $right_desktop_counter = $right_desktop_counter + 1; } ?>
                        </div>
                        <!--Controls-->
                        <a id="right-prev-btn" class="carousel-control-prev" href="#dailydraw-right-desktop-carousel-ads" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a id="right-next-btn" class="carousel-control-next" href="#dailydraw-right-desktop-carousel-ads" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                    <div id="winners-fb-mob-review">
                        <strong class="title">Facebook Reviews</strong>
                        <p>Here are some reviews left by some of our winners.</p>
                        <div class="fb-post" data-href="https://www.facebook.com/permalink.php?story_fbid=1794745310647847&amp;id=100003371854690" data-show-text="false"><blockquote cite="https://www.facebook.com/permalink.php?story_fbid=1794745310647847&amp;id=100003371854690" class="fb-xfbml-parse-ignore"><p>good work for people eran money</p>Posted by <a href="#" role="button">Ali Khan</a> on&nbsp;<a href="https://www.facebook.com/permalink.php?story_fbid=1794745310647847&amp;id=100003371854690">Tuesday, 6 November 2018</a></blockquote></div>
                        <br/>
                        <div class="fb-post" data-href="https://www.facebook.com/sohaibahmadbhatti/posts/10217963339294253" data-show-text="false"><blockquote cite="https://www.facebook.com/sohaibahmadbhatti/posts/10217963339294253" class="fb-xfbml-parse-ignore"><p>Friends Join it. its really works. I won 2 times here..</p>Posted by <a href="https://www.facebook.com/sohaibahmadbhatti">Sohaib Ahmad Bhatti</a> on&nbsp;<a href="https://www.facebook.com/sohaibahmadbhatti/posts/10217963339294253">Friday, 19 October 2018</a></blockquote></div>
                        <br/>
                        <div class="fb-post" data-href="https://www.facebook.com/misbahfarhan.misbahfarhan.7/posts/241609586635985" data-show-text="false"><blockquote cite="https://www.facebook.com/misbahfarhan.misbahfarhan.7/posts/241609586635985" class="fb-xfbml-parse-ignore"><p>It&#039;s work it&#039;s really work.I won the 250 balance thank you Muftpaise</p>Posted by <a href="https://www.facebook.com/misbahfarhan.misbahfarhan.7">Misbah Farhan Misbah Farhan</a> on&nbsp;<a href="https://www.facebook.com/misbahfarhan.misbahfarhan.7/posts/241609586635985">Monday, 9 July 2018</a></blockquote></div>
                        <br/><br/>
                        <!-- FACEBOOOK PLUGIN ENDS -->
                    </div>
                </div>			
            </div>
        </div>
    </div>
</div>

<aside class="aside">
	<div class="container">
		<div class="text-holder">
			<p>Thanks for reading all the way down. All that's left to do is sign up and see for yourself. Good Luck!</p>
		</div>
		<div class="btn-holder left-right-padding">
        <button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
		</div>
	</div>
</aside>

<div class="modal" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
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
		</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="check-ad-modal" tabindex="-1" role="dialog" aria-labelledby="checkAdModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-content-info">
        <p>Please wait while we check</p>
      </div>
      <div class="modal-body">
	  	<div class="col">
          <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php echo $mobile_ad ?>" alt="Check Ad"></a>
		</div>
      </div>
    </div>
  </div>
</div>