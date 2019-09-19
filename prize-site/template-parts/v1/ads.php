<?php
/*
@package prizesitetheme
*/
?>
<section class="about-block">
				<div class="container">
						<?php
                            $category_id = get_cat_ID('Ads');
                            query_posts("cat=$category_id&posts_per_page=-1");
                            while (have_posts()) { the_post(); ?>
							<div id="ads-row" class="Ads row" >
        						<div id="Ads-sidebar-content" class="col-xl-5 col-lg-5 col-md-4 col-sm-12 col-12 remove-padding">
									<!-- Show thumbnail Here -->
									<?php the_post_thumbnail(); ?>
								</div>
								<div id="Ads-content" class="col col-xl-7 col-lg-7 col-md-8 col-sm-12 col-12">
									<?php echo get_the_content(); ?></p>
								</div>
							</div>
						<?php } wp_reset_query(); ?>
						<div id="ads-register-btn" class="Ads row" >
							<div class="col-xl-5 col-lg-5 col-md-4 col-sm-12 col-12 remove-padding">
							</div>
							<div class="col col-xl-7 col-lg-7 col-md-8 col-sm-12 col-12">
								<strong class="title"><?php the_content(); ?></strong>
								<button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
							</div>
				</div>
			</section>

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