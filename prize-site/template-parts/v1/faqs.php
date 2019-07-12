<?php
/*
@package prizesitetheme
*/
$category_id = get_cat_ID('English Questions');
$english_post_count = get_category( $category_id )->category_count;
$category_id = get_cat_ID('Urdu Questions');
$urdu_post_count = get_category( $category_id )->category_count;
$share_url = get_template_directory_uri() . '/img/share.png';
$share_rotate_url = get_template_directory_uri() . '/img/share-rotate.png';
$share_urdu_url = get_template_directory_uri() . '/img/share-urdu.png';
?>
<script type="text/javascript">
var english_questions_count = "<?= $english_post_count ?>";
var urdu_questions_count = "<?= $urdu_post_count ?>";
</script>
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
								<div class="col col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6">
									<h1><?php echo the_title(); ?></h1>
								</div>
								<div id="faq-tabs" class="col col-12 col-sm-6 col-md-8 col-lg-6 col-xl-6">
									<div class="container">
											<ul class="nav nav-tabs">
												<li class="nav-item"><a id="english-tab-link" class="nav-link active" data-toggle="tab" href="#english-tab">English</a></li>
												<li class="nav-item"><a id="urdu-tab-link" class="nav-link" data-toggle="tab" href="#urdu-tab">اردو</a></li>
											</ul>
											<div class="tab-content">
												<div id="english-tab" class="tab-pane fade show active">
													<div class="wrapper center-block">
														<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
															<?php
                                								$category_id = get_cat_ID('English Questions');
																query_posts("cat=$category_id&posts_per_page=-1");
																$index = 1;
                                									while (have_posts()) {
																		the_post(); 
																		$english_content_id = "content".$index."English"; ?>
                                    									<div class="panel panel-default">
																			<div class="panel-heading-english active" role="tab" id="<?php echo the_slug(); ?>">
																				<h4 class="panel-title">
																					<span><?php the_title(); ?></span>
																				</h4>
																			</div>
																			<div id="<?php echo $english_content_id; ?>" class="panel-collapse-english show" role="tabpanel" aria-labelledby="<?php echo $english_heading_id ?>">
																				<div class="panel-body">
																					<?php the_content(); ?>
																				</div>
																			</div>
																			<?php $slug = the_slug(); $share_link = "http://localhost/wordpress/v1/faqs#".$slug; ?>
																			<div class="panel-footer">
																				<a class="share-link-btn" type="sumbit" data-toggle="modal" data-target="#share-queries-modal" title="Share" href="<?php echo $share_link; ?>"><img class="share-icon-link" src="<?php print $share_url ?>" alt="share icon"><label>Share</label></a>
																			</div>
																		</div>
																	<?php
															 			$index = $index + 1;
																	} 
															 		wp_reset_query(); ?>
														</div>
													</div>
												</div>
												<div id="urdu-tab" class="tab-pane fade">
													<div class="wrapper center-block">
															<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
																<?php
																	$category_id = get_cat_ID('Urdu Questions');
																	query_posts("cat=$category_id&posts_per_page=-1");
																	$index = 1;
																	while (have_posts()) {
																			the_post();
																			$urdu_content_id = "content".$index."Urdu";?>
																			<div class="panel panel-default">
																				<div class="panel-heading-urdu" role="tab" id="<?php echo the_slug(); ?>">
																					<h4 class="panel-title">
																						<span><?php the_title(); ?></span>
																					</h4>
																				</div>
																				<div id="<?php echo $urdu_content_id; ?>" class="panel-collapse-urdu show" role="tabpanel" aria-labelledby="<?php echo $urdu_heading_id; ?>">
																					<div class="panel-body">
																						<?php the_content(); ?>
																					</div>
																				</div>
																				<?php $slug = the_slug(); $share_link = "http://localhost/wordpress/v1/faqs#".$slug; ?>
																				<div class="panel-footer">
																					<a class="share-link-btn" type="sumbit" data-toggle="modal" data-target="#share-queries-modal" title="Share" href="<?php echo $share_link; ?>"><img class="share-icon-link" src="<?php print $share_url ?>" alt="share icon"><label>Share</label></a>
																				</div>
																			</div>
																<?php
																		$index = $index + 1;
																} 
																wp_reset_query(); ?>
															</div>
													</div>
												</div>
											</div>
											<div class="new-question-block">
												<div class="row">
													<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 remove-padding"><span id='faqs-question-label'>Did we answer your question?</span></div>
													<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-3 remove-padding"><button id="new-question-yes" type="submit" data-toggle="modal" data-target="#found-queries-modal">Yes</button></div>
													<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-3 remove-padding"><button id="new-question-no" type="submit" data-toggle="modal" data-target="#add-queries-modal">No</button></div>
												</div>
											</div>
											<strong class="title">Thanks for reading all the way down. All that's left to do is sign up and see for yourself. Good Luck!</strong>
											<button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
									</div>
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
                        <input type="text" id="no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
                        <span class="label">Don't worry, we'll never pass this on.</span>
                        <span class="error-message" id="error-msg">Please enter a phone number</span>
					</div>
					<div class="input-wrap">
                        <label for="email" class="label-text">Your email address (myemail@domain.com)</label>
                        <input type="text" id="email" class="form-control" >
                        <span class="label">Don't worry, we'll never pass this on.</span>
                        <span class="error-message" id="email-error-msg">Please enter a valid email address</span>
						<span class="error-message" id="email-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
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
		</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="add-queries-modal" tabindex="-1" role="dialog" aria-labelledby="addQueriesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="add-queries-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="col">
					<h3>Provide information to get feedback from us!</h3>
					<form id="prizesite-query-form" class="query-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
						<div class="form-group">
							<div class="input-wrap">
									<label for="query-name" class="label-text">Your Name</label>
									<input type="text" id="query-name" class="form-control" >
									<span class="error-message" id="name-error-msg">Please enter your name</span>
							</div>
							<div class="input-wrap">
									<label for="query-email" class="label-text">Your Email</label>
									<input type="text" id="query-email" class="form-control" >
									<span class="error-message" id="email-error-msg">Please enter your email</span>
									<span class="error-message" id="email-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
							</div>
							<div class="input-wrap">
									<label for="query-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
									<input type="text" id="query-no" class="form-control" >
									<span class="label">Don't worry, we'll never pass this on.</span>
									<span class="error-message" id="no-error-msg">Please enter a phone number</span>
									<span class="error-message" id="no-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
							</div>
							<div class="input-wrap">
									<label for="query-question" class="label-text">Your Question</label>
									<textarea id="query-question" class="form-control" rows="3" cols="20"></textarea>
									<span class="error-message" id="question-error-msg">Please enter your question</span>
							</div>
							<button id="add-query-btn" type="sumbit" class="btn">Send Question</button>
						</div>
					</form>
				</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="found-queries-modal" tabindex="-1" role="dialog" aria-labelledby="foundQueriesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<?php $category_id = get_cat_ID('Query Found');
    				query_posts("cat=$category_id&posts_per_page=1");
    				if (have_posts()) {
      			the_post(); ?>
	  				<div class="col">
							<h3><?php the_title() ?></h3>
							<?php the_content() ?>
						</div>
				<?php } wp_reset_query(); ?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="success-queries-modal" tabindex="-1" role="dialog" aria-labelledby="successQueriesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="success-queries-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<?php $category_id = get_cat_ID('Query Success');
    				query_posts("cat=$category_id&posts_per_page=1");
    				if (have_posts()) {
      			the_post(); ?>
	  				<div class="col">
							<h3><?php the_title() ?></h3>
							<?php the_content() ?>
						</div>
				<?php } wp_reset_query(); ?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	  </div>
    </div>
  </div>
</div>

<div class="modal" id="failure-queries-modal" tabindex="-1" role="dialog" aria-labelledby="failureQueriesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="failure-queries-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<?php $category_id = get_cat_ID('Query Failure');
    				query_posts("cat=$category_id&posts_per_page=1");
    				if (have_posts()) {
      			the_post(); ?>
	  				<div class="col">
							<h3><?php the_title() ?></h3>
							<?php the_content() ?>
						</div>
				<?php } wp_reset_query(); ?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="share-queries-modal" tabindex="-1" role="dialog" aria-labelledby="shareQueriesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="share-queries-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		<div class="col">
				<h3>Share the link below with your friends for them to see the answer</h3>
				<div class="form-group">
					<div class="input-wrap">
						<input type="text" id="query-url" class="form-control" readonly>
						<a id="copy-url-btn" type="sumbit" class="btn" href="#">Copy URL</a>
					</div>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>