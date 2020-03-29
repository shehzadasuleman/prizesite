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
    $ajax_admin_url = admin_url('admin-ajax.php');
?>
<script type="text/javascript">var ajax_admin_url = "<?= $ajax_admin_url ?>";</script>
<div class="winners-main-content">
    <div class="row winners-cover-ad-banner-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-cover-ad-banner">
			<!--p><a target="_blank" href="http://www.dpbolvw.net/click-8787409-11337760" target="_top">
<img src="http://www.lduhtrp.net/image-8787409-11337760" alt="" border="0"/></a></p-->
		</div>
    </div>
</div>


<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">
                <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
					<!-- Left Side Ad -->
					<a target="_blank"  href="https://www.foodpanda.pk/contents/deals"><img alt="Food Panda Ad" src="/wordpress/wp-content/themes/prize-site/img/Ads/Slider/MobAds1.jpg"></a><br/><br/>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 recent-winners-content">
                    <?php
                    $category_id = get_cat_ID('Verification Description');
                    query_posts("cat=$category_id&posts_per_page=1");
                    if (have_posts()) {
                        the_post(); ?>
                    <form id="prizesite-lucky-form-verification" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <div class="row">
                            <div class="input-content-mobile">                                
								<h2 id="verification-title"><?php the_title(); ?></h2><br/>
                            </div><br/>
							<div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 input-content-mobile">
								<div class="input-wrap">
									<label for="passcode-no" class="label-text">Verification code (XXXXXXXX)</label>
									<input type="text" id="passcode-no" class="form-control" placeholder="">
                                    <span class="error-message" id="check-error-msg">Please enter verification code</span>
                                </div>
							</div>
						    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 check-prize-btn-box">
                                <button type="submit" class="check-prize-btn btn btn-primary">Confirm Registration</button><br/><br/>
                            </div>
						</div>
					</form>
                    <div class="alert alert-danger hidden" id="verification-failure-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Failure! </strong>
                        Unable to verify code, Please try again later.
                    </div>
                    <div class="alert alert-danger hidden" id="verification-passcode-failure-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Try Again! </strong>
                        Verification code did not matched.
                    </div>
                    <div class="alert alert-danger hidden" id="verification-retrieve-data-error">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        Unable to retrieve data from server.
                    </div>
                    <div class="alert alert-danger hidden" id="verification-retrieve-data-failure">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Try Again! </strong>
                        No data exists for this varification.
                    </div>
                    <div class="col-xl-12 description">
                        <h5>
                            <form id="prizesite-verification-email-resend" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                <strong>Click <button type="submit" class="resend-email-btn">here</button> to resend the email.</strong> <?php the_content(); ?>
                            </form>
                        </h5>
                    </div>
                    <?php } wp_reset_query(); ?>
                    <div class="alert alert-danger hidden" id="verification-resend-email-error">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Try Again! </strong>
                        No data exists for this varification.
                    </div>
                    <div class="alert alert-danger hidden" id="verification-resend-email-failure">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Try Again! </strong>
                        Unable to resend email now.
                    </div>
                    <div class="alert alert-danger hidden" id="verification-resend-email-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        A new email has been sent.
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                        <p><a target="_blank"  href="https://www.youtube.com/watch?v=xJyCU8WgQp8"><img src="/wordpress/wp-content/themes/prize-site/img/Ads/Slider/MobAds2.jpg"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>