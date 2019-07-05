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
?>
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
					<a target="_blank"  href="https://www.foodpanda.pk/contents/deals"><img alt="Food Panda Ad" src="/wp-content/themes/prize-site/img/foodpanda.jpg"></a><br/><br/>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 recent-winners-content">
                    <form id="prizesite-lucky-form-verification" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <div class="row">
                            <div class="input-content-mobile">                                
								<h2>Enter verification code to confirm your registeration!</h2><br/>
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
                    <div class="col-xl-12 description">
                        <?php
                            $category_id = get_cat_ID('Verification Description');
                            query_posts("cat=$category_id&posts_per_page=1");
                            if (have_posts()) {
                                the_post(); ?>
                                <h5>
                                    <?php the_content(); ?>
                                </h5>
                            <?php } wp_reset_query(); ?>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                        <p><a target="_blank"  href="https://www.youtube.com/watch?v=xJyCU8WgQp8"><img src="/wp-content/themes/prize-site/img/bykea.jpg"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>