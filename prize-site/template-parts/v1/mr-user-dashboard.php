<?php
/*
@package prizesitetheme
*/

$signout_url = get_template_directory_uri() . '/img/signout.png';
if ( session_status() == PHP_SESSION_ACTIVE) {
  if ( ( $_SESSION["mr-user"] != "" ) && ( $_SESSION["mr-user-fname"] != "" ) && ( $_SESSION["mr-user-hashcode"] != "" ) ) {
    $status = "True";
  } else {
    $status = "False";
  }
}

if(array_key_exists('mr-user-signout', $_POST)) { 
  signout(); 
}

function signout() { 
  $_SESSION["mr-user"] = "";
  $_SESSION["mr-user-fname"] = "";
	$_SESSION["mr-user-hashcode"] ="";
?>
<script type="text/javascript">window.location = 'http://localhost/wordpress/v1/muft-rewards';</script>
<?php
}
?>
<?php if ( $status == "True" ):?>
  <section id="mr-user-dashboard" class="about-block">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Hi <?php echo $_SESSION["mr-user-fname"] ?>...</h2>
        </div>
        <div class="col">
          <form method="post"> 
            <button id="mr-user-signout" type="submit" class="btn-outline-danger" name="mr-user-signout" ><img src="<?php print $signout_url; ?>" alt="Sign Out" title="Sign Out"/></button>
            <!--<input id="mr-user-signout" type="submit" class="btn btn-outline-danger" name="mr-user-signout" value="Sign Out"/>-->
          </form>
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
              $category_id = get_cat_ID('MR Dashboard Points');
              query_posts("cat=$category_id&posts_per_page=1");
            
              if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <strong class="title"><?php echo get_the_title(); ?></strong>
                <p><?php echo get_the_content(); ?></p>
            <?php
              endwhile;
              endif;
              wp_reset_query();
            ?>
              </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif ( $status == "False" ):?>
    <?php
        $category_id = get_cat_ID('Login-Not-Performed');
        query_posts("cat=$category_id&posts_per_page=1");
        if (have_posts()) { the_post(); ?>
            <div class="main-content">
                <div class="row cover-ad-banner-parent">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 cover-ad-banner">
                        <h1 style="color:red;margin-bottom:0%"><?php the_title(); ?></h1>
                        <h2><?php the_content(); ?></h2>
                    </div>
                </div>
            </div>
    <?php } wp_reset_query(); ?>
<?php endif; ?>

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