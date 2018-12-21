<?php
/*
@package prizesitetheme
*/
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
                            $category_id = get_cat_ID('WTC Header');
                            query_posts("cat=$category_id&posts_per_page=1");
                            if (have_posts()) {
								the_post(); ?>
								<div class="col">
									<h1><?php echo get_the_title(); ?></h1>
								</div>
								<div class="col">
									<div class="header">
										<p><?php echo get_the_content(); ?></p>
									</div>
						<?php } wp_reset_query(); ?>
									<div class="text-holder">
						<?php
                            $category_id = get_cat_ID('WTC Points');
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
									<button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
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
			<h3>Register once, for a chance to win everyday!</h3>
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
						<label for="agree" class="check-label">
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