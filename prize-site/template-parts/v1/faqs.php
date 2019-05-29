<?php
/*
@package prizesitetheme
*/
$category_id = get_cat_ID('English Questions');
$english_post_count = get_category( $category_id )->category_count;
$category_id = get_cat_ID('Urdu Questions');
$urdu_post_count = get_category( $category_id )->category_count;
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
																		$english_heading_id = "heading".$index."English";
																		$english_content_id = "content".$index."English";?>
                                    <div class="panel panel-default">
																			<div class="panel-heading-english <?php if( $index == 1 ) { echo "active"; } ?>" role="tab" id="<?php echo $english_heading_id; ?>">
																				<h4 class="panel-title">
																					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $english_content_id; ?>" aria-expanded="true" aria-controls="<?php echo $english_content_id; ?>">
																						<?php the_title(); ?>
																					</a>
																				</h4>
																			</div>
																			<div id="<?php echo $english_content_id; ?>" class="panel-collapse-english collapse <?php if( $index == 1 ) { echo "show"; } ?>" role="tabpanel" aria-labelledby="<?php echo $english_heading_id ?>">
																				<div class="panel-body">
																					<?php the_content(); ?>
																				</div>
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
																			$urdu_heading_id = "heading".$index."Urdu";
																			$urdu_content_id = "content".$index."Urdu";?>
																			<div class="panel panel-default">
																				<div class="panel-heading-urdu <?php if( $index == 1 ) { echo "active"; } ?>" role="tab" id="<?php echo $urdu_heading_id; ?>">
																					<h4 class="panel-title">
																						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $urdu_content_id; ?>" aria-expanded="true" aria-controls="<?php echo $urdu_content_id; ?>">
																							<?php the_title(); ?>
																						</a>
																					</h4>
																				</div>
																				<div id="<?php echo $urdu_content_id; ?>" class="panel-collapse-urdu collapse <?php if( $index == 1 ) { echo "show"; } ?>" role="tabpanel" aria-labelledby="<?php echo $urdu_heading_id; ?>">
																					<div class="panel-body">
																						<?php the_content(); ?>
																					</div>
																				</div>
																			</div>
																<?php
																		$index = $index + 1;
																} 
																wp_reset_query(); ?>
																<!--<div class="panel panel-default">
																	<div class="panel-heading-urdu" role="tab" id="headingTwoUrdu">
																		<h4 class="panel-title">
																			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoUrdu" aria-expanded="false" aria-controls="collapseTwoUrdu">
																			سوال # 2 یہاں جاتا ہے
																			</a>
																		</h4>
																	</div>
																	<div id="collapseTwoUrdu" class="panel-collapse-urdu collapse" role="tabpanel" aria-labelledby="headingTwoUrdu">
																		<div class="panel-body">
																		حرکت پذیری کلچر کی طرف سے، آپ کو اعلی زندگی کے الزامات ٹری امیرڈینڈ اشتھار اسکواڈ کے لئے استعمال کیا جاتا ہے. 3 بھیڑیوں کی چاند کی صفائی کے لئے، غیر مشابہت سکیٹ بورڈ ڈولور برتن. فوڈ ٹرک کی طرف سے استعمال کیا جاتا ہے. 3 وولف چاند کی لمبائی کا آغاز کرو، سنی غیر ملکی نے اس پر ایک پرندے ڈال دیا جس میں بلڈ اکیلے کافی نالہ منایا جاتا ہے. نیلی حرکت پذیر کیفیا ہیلیویٹیکا، کرافٹ بیئر لیبورڈ ویلز اورسنسن کی کریڈٹ کے بارے میں معلومات فراہم کرنے والے ہیں. اشتھاراتی وجوہات والا کسبی نائب Lomo. لیگنگ اوپیرا کرافٹ بیئر فارم ٹیبل فارم، خام ڈینم جمالیاتی سنگھ کی نچلیت آپ نے شاید ان کے بارے میں سنا نہیں لیتا ہے لیبل پائیدار وی ایچ ایس.
																		</div>
																	</div>
																</div>
																<div class="panel panel-default">
																	<div class="panel-heading-urdu" role="tab" id="headingThreeUrdu">
																		<h4 class="panel-title">
																			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeUrdu" aria-expanded="false" aria-controls="collapseThreeUrdu">
																			سوال # 3 یہاں جاتا ہے
																			</a>
																		</h4>
																	</div>
																	<div id="collapseThreeUrdu" class="panel-collapse-urdu collapse" role="tabpanel" aria-labelledby="headingThreeUrdu">
																		<div class="panel-body">
																		حرکت پذیری کلچر کی طرف سے، آپ کو اعلی زندگی کے الزامات ٹری امیرڈینڈ اشتھار اسکواڈ کے لئے استعمال کیا جاتا ہے. 3 بھیڑیوں کی چاند کی صفائی کے لئے، غیر مشابہت سکیٹ بورڈ ڈولور برتن. فوڈ ٹرک کی طرف سے استعمال کیا جاتا ہے. 3 وولف چاند کی لمبائی کا آغاز کرو، سنی غیر ملکی نے اس پر ایک پرندے ڈال دیا جس میں بلڈ اکیلے کافی نالہ منایا جاتا ہے. نیلی حرکت پذیر کیفیا ہیلیویٹیکا، کرافٹ بیئر لیبورڈ ویلز اورسنسن کی کریڈٹ کے بارے میں معلومات فراہم کرنے والے ہیں. اشتھاراتی وجوہات والا کسبی نائب Lomo. لیگنگ اوپیرا کرافٹ بیئر فارم ٹیبل فارم، خام ڈینم جمالیاتی سنگھ کی نچلیت آپ نے شاید ان کے بارے میں سنا نہیں لیتا ہے لیبل پائیدار وی ایچ ایس.
																		</div>
																	</div>
																</div>-->
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
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="col">
					<h3>Provide information to get feedback from us!</h3>
					<div id="query-success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
  					<strong>Success!</strong> Your question has been successfully sent.
					</div>
					<div id="query-error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
  					<strong>Error!</strong> While sending your question, please try after sometime.
					</div>
					<form id="prizesite-query-form" class="query-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
						<div class="form-group">
							<div class="input-wrap">
									<label for="query-name" class="label-text">Your Name</label>
									<input type="text" id="query-name" class="form-control" >
									<span class="error-message" id="name-error-msg">Please enter your name</span>
							</div>
							<div class="input-wrap">
									<label for="query-email" class="label-text">Your Email</label>
									<input type="email" id="query-email" class="form-control" >
									<span class="error-message" id="email-error-msg">Please enter your email</span>
							</div>
							<div class="input-wrap">
									<label for="query-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
									<input type="text" id="query-no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
									<span class="label">Don't worry, we'll never pass this on.</span>
									<span class="error-message" id="no-error-msg">Please enter a phone number</span>
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
      </div>
    </div>
  </div>
</div>