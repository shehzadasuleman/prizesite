<?php
/*
@package prizesitetheme
*/

$message = esc_attr(get_option('prizesite_dailydraw_message'));
?>
<section class="about-block">
	<div class="container">
		<div class="time-block">
			<div class="timer-wrapper">
				<div class="timer">
					<span class="title">Next draw</span>
					<div id="defaultCountdown"></div>
				</div>
				<button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
			</div>
		</div>
		<div class="row">
			<?php
				$category_id = get_cat_ID('MR Header');
				query_posts("cat=$category_id&posts_per_page=1");
				if (have_posts()) {
					the_post(); ?>
					<div class="col">
						<h1><?php echo get_the_title(); ?></h1>
					</div>
					<div class="col">
						<div class="header">
							<?php echo get_the_content(); ?>
						</div>
			<?php } wp_reset_query(); ?>
						<div class="text-holder">
			<?php
				$category_id = get_cat_ID('MR Points');
				query_posts("cat=$category_id&posts_per_page=3");
			
				if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<strong class="title"><?php echo get_the_title(); ?></strong>
					<p><?php echo get_the_content(); ?></p>
			<?php
				endwhile;
				endif;
				wp_reset_query();
			?>
						</div>
				<button type="sumbit" class="btn" data-toggle="modal" data-target="#muftrewards-signup-registration-modal">Register Now to stay informed</button>
			</div>
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

<div class="modal" id="muftrewards-signup-registration-modal" tabindex="-1" role="dialog" aria-labelledby="muftrewardsSignupRegistrationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
          <div id="signup-popup-progress-bar" class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span id="signup-popup-progress-content">Progress ( 25% )</span></div>
          </div>
          <h3>Register once, to get stuff for free from brands you love for your loyalty!</h3>
          <form id="prizesite-signup-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
            <div class="form-group">
              <div class="input-wrap">
                  <label for="signup-fname" class="label-text">First Name</label>
                  <input type="text" id="signup-fname" class="form-control" >
                  <span class="error-message" id="fname-error-msg">Please enter first name</span>
                  <span class="error-message" id="signup-fname-invalid-msg">First name must contain only letters.</span>
              </div>
              <div class="input-wrap">
                  <label for="signup-lname" class="label-text">Last Name</label>
                  <input type="text" id="signup-lname" class="form-control" >
                  <span class="error-message" id="lname-error-msg">Please enter last name</span>
                  <span class="error-message" id="signup-lname-invalid-msg">Last name must contain only letters.</span>
              </div>
              <div class="input-wrap">
                  <label for="signup-username" class="label-text">Username should be email (myemail@domain.com)</label>
                  <input type="text" id="signup-username" class="form-control" >
                  <span class="error-message" id="username-error-msg">Please enter a username</span>
                  <span class="error-message" id="signup-username-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
              </div>
              <div class="input-wrap">
                  <label for="signup-password" class="label-text">Password</label>
                  <input type="password" id="signup-password" class="form-control" >
                  <span class="error-message" id="password-error-msg">Please enter a password</span>
                  <span class="error-message" id="signup-password-invalid-msg">Password should be 8 characters long.</span>
              </div>
              <div class="input-wrap">
                  <label for="signup-cpassword" class="label-text">Confirm Password</label>
                  <input type="password" id="signup-cpassword" class="form-control" >
                  <span class="error-message" id="cpassword-error-msg">Please enter confirm password</span>
                  <span class="error-message" id="signup-cpassword-invalid-msg">Password not matched.</span>
              </div>
              <div class="input-wrap">
                <label for="signup-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                <input type="text" id="signup-no" class="form-control" >
                <span class="error-message" id="no-error-msg">Please enter a phone number</span>
                <span class="error-message" id="signup-number-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
              </div>
              <span class="guarantee-message">We guarantee to never share your mobile number or email address</span>
            </div>
            <div class="form-group" id="check-box-div">
              <div class="input-wrap">
                <input id="signup-agree" type="checkbox">
                <label id="check-signup-label-box" for="signup-agree" class="check-label">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'v1-muftrewards-secondary-menu',
                            'container' => false,
                            'items_wrap' => '%3$s'
                        ) );
                    ?>
                  </label>
                  <span class="error-message" id="signup-error-chk-box-msg">Please agree to our Terms & Conditions</span>
              </div>
              <div class="input-wrap">
                <input id="agree-enter-draw" type="checkbox">
                <label id="check-enter-draw-label-box" for="agree-enter-draw" class="check-label">
                    Also, enter my mobile for <button type="button" id="show-draw-detail" >daily lucky draw</button>.
                            </label>
              </div>
            </div>
            <div id="signup-daily-draw-info" class="alert alert-info" role="alert">
                    <?php echo $message; ?>
            </div>
            <button type="sumbit" class="btn">Register</button>
          </form>
          <div class="alert alert-danger hidden" id="mr-signup-danger-alert">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Failure! </strong>
              Unable to save your Information, Please try again later.
          </div>
		    </div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="muftrewards-signin-registration-modal" tabindex="-1" role="dialog" aria-labelledby="muftrewardsSigninRegistrationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div class="col">
		  	<div id="signin-popup-progress-bar" class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span id="signin-popup-progress-content">Progress ( 25% )</span></div>
            </div>
			<h3>Register once, to get stuff for free from brands you love for your loyalty!</h3>
			<form id="prizesite-signin-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<div class="form-group">
					<div class="input-wrap">
              <label for="signin-username" class="label-text">Username should be email address</label>
              <input type="text" id="signin-username" class="form-control" >
              <span class="error-message" id="signin-username-error-msg">Please enter a username</span>
              <span class="error-message" id="signin-username-invalid-msg">Username not in required format.</span>
          </div>
					<div class="input-wrap">
              <label for="signin-password" class="label-text">Password</label>
              <input type="password" id="signin-password" class="form-control" >
              <span class="error-message" id="signin-password-error-msg">Please enter a password</span>
          </div>
				</div>
				<button type="sumbit" class="btn">Login</button>
      </form>
			<div class="forgot-password-block" >
				<a id="forgot-password-btn" href="" data-toggle="modal" data-target="#muftrewards-fp-registration-modal">Forgot Password?</a>
      </div>
      <div class="alert alert-danger hidden" id="mr-signin-danger-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Failure! </strong>Unable to validate your Information, Please try again later.
      </div>
      <div class="alert alert-danger hidden" id="mr-signin-wrong-password-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Failure! </strong>Invalid Password.
      </div>
      <div class="alert alert-danger hidden" id="mr-signin-invalid-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Failure! </strong>Invalid Username.
      </div>
		</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="muftrewards-fp-registration-modal" tabindex="-1" role="dialog" aria-labelledby="muftrewardsFPRegistrationModalLabel" aria-hidden="true">
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
			<h3>Enter registered email to get forgot password code!</h3>
			<form id="prizesite-fp-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<div class="form-group">
					<div class="input-wrap">
                        <label for="fp-username" class="label-text">Username should be email address</label>
                        <input type="text" id="fp-username" class="form-control" >
                        <span class="error-message" id="fp-username-error-msg">Please enter a username</span>
                        <span class="error-message" id="fp-username-invalid-msg">Username not in required format.</span>
                    </div>
				</div>
				<button type="sumbit" class="btn">Send Code</button>
            </form>
		</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="muftrewards-vc-registration-modal" tabindex="-1" role="dialog" aria-labelledby="muftrewardsVCRegistrationModalLabel" aria-hidden="true">
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
			<h3>Please copy verification code from your email and paste it in the box below to add new password!</h3>
			<form id="prizesite-fp-vc-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<div class="form-group">
					<div class="input-wrap">
						<label for="fp-passcode-no" class="label-text">Verification code (XXXXXXXX)</label>
						<input type="text" id="fp-passcode-no" class="form-control" placeholder="">
						<span class="error-message" id="fp-check-error-msg">Please enter verification code</span>
					</div>
				</div>
				<button type="sumbit" class="btn">Verify Code</button>
            </form>
		</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="muftrewards-new-fp-registration-modal" tabindex="-1" role="dialog" aria-labelledby="muftrewardsNewFPRegistrationModalLabel" aria-hidden="true">
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
			<h3>Register once, to get stuff for free from brands you love for your loyalty!</h3>
			<form id="prizesite-new-fp-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<div class="form-group">
					<div class="input-wrap">
                        <label for="new-fp-username" class="label-text">Username should be email address</label>
                        <input readonly type="text" id="new-fp-username" class="form-control" >
                        <span class="error-message" id="new-fp-username-error-msg">Please enter a username</span>
                        <span class="error-message" id="new-fp-username-invalid-msg">Username not in required format.</span>
                    </div>
					<div class="input-wrap">
                        <label for="new-fp-password" class="label-text">Password</label>
                        <input type="password" id="new-fp-password" class="form-control" >
                        <span class="error-message" id="new-fp-password-error-msg">Please enter a password</span>
                        <span class="error-message" id="new-fp-password-invalid-msg">Password not in required format.</span>
                    </div>
					<div class="input-wrap">
                        <label for="new-fp-cpassword" class="label-text">Confirm Password</label>
                        <input type="password" id="new-fp-cpassword" class="form-control" >
                        <span class="error-message" id="new-fp-cpassword-error-msg">Please enter confirm password</span>
                        <span class="error-message" id="new-fp-cpassword-invalid-msg">Password not matched.</span>
                    </div>
				</div>
				<button type="sumbit" class="btn">Change Password</button>
            </form>
		</div>
      </div>
    </div>
  </div>
</div>