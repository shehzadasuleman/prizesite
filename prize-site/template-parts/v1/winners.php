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
?>

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

                    <form id="prizesite-lucky-form-check" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <div class="row remove-margin">
                            <div class="input-content-mobile">                                
								<h2>Enter your Number below to see if you won in today's draw!</h2><br/>
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
                    </form>

                    <div id="mob-carousel-right-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                        <!--Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#mob-carousel-right-ads" data-slide-to="0" class="active"></li>
                            <li data-target="#mob-carousel-right-ads" data-slide-to="1"></li>
                            <li data-target="#mob-carousel-right-ads" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php print $right_ads_banner_1 ?>" alt="First right slide"></a>
                            </div>
                            <!--/First slide-->
                            <!--Second slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.youtube.com/watch?v=XsbnIpFBD54"><img id="carousel-slide-two" class="d-block w-100" src="<?php print $right_ads_banner_2 ?>" alt="Second right slide"></a>
                            </div>
                            <!--/Second slide-->
                            <!--Third slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.servis.com/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-three" class="d-block w-100" src="<?php print $right_ads_banner_3 ?>" alt="Third right slide"></a>
                            </div>
                            <!--/Third slide-->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a id="mob-right-prev-btn" class="carousel-control-prev" href="#mob-carousel-right-ads" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a id="mob-right-next-btn" class="carousel-control-next" href="#mob-carousel-right-ads" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>

                   	<div>
                        <div class="col-xl-12 description">
                        <?php
                            $category_id = get_cat_ID('Winner Description');
                            query_posts("cat=$category_id&posts_per_page=1");
                            if (have_posts()) {
                                the_post(); ?>
                                <h5>
                                    <?php the_content(); ?>
                                </h5>
                        <?php } wp_reset_query(); ?>
                        <hr/>
                        </div>
                    </div>
                </div>
				<div id="winners-right-ad" class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                    <div id="carousel-right-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                        <!--Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-right-ads" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-right-ads" data-slide-to="1"></li>
                            <li data-target="#carousel-right-ads" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php print $right_ads_banner_1 ?>" alt="First right slide"></a>
                            </div>
                            <!--/First slide-->
                            <!--Second slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.youtube.com/watch?v=XsbnIpFBD54"><img id="carousel-slide-two" class="d-block w-100" src="<?php print $right_ads_banner_2 ?>" alt="Second right slide"></a>
                            </div>
                            <!--/Second slide-->
                            <!--Third slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.servis.com/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-three" class="d-block w-100" src="<?php print $right_ads_banner_3 ?>" alt="Third right slide"></a>
                            </div>
                            <!--/Third slide-->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a id="right-prev-btn" class="carousel-control-prev" href="#carousel-right-ads" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a id="right-next-btn" class="carousel-control-next" href="#carousel-right-ads" role="button" data-slide="next">
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
		<div class="btn-holder">
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