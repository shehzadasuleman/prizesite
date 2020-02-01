<?php
/*
@package prizesitetheme
*/
?>
<?php
    date_default_timezone_set('Asia/Karachi');
    $left_ads_banner_1 = get_template_directory_uri() . '/img/Ads/Slider/Desktop/left-desktop-ad1.jpg';
    $left_ads_banner_2 = get_template_directory_uri() . '/img/Ads/Slider/Desktop/left-desktop-ad2.jpg';
    $left_ads_banner_3 = get_template_directory_uri() . '/img/Ads/Slider/Desktop/left-desktop-ad3.jpg';
    $share_url = get_template_directory_uri() . '/img/share.png';
    $comment_url = get_template_directory_uri() . '/img/comment.png';
    $ads_slide_timer = get_option( 'prizesite_winners_ad_timer' );
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params); 
    $contest_id = $params['id'];
    $share_count = get_post_meta($contest_id,'_contests_sharecount_value_key',true);
    if ( $share_count == "" ) { $share_count = 0; }
    $end_date = get_post_meta($contest_id,'_contests_enddate_value_key',true);
?>
<script type="text/javascript">var share_count = "<?= $share_count ?>";
var contest_id = "<?= $contest_id ?>";
var end_date = "<?= $end_date ?>" + " 23:59:59"; 
</script>
<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">
                <div id="winners-left-ad" class="col-xl-3 col-lg-3 col-md-4 col-sm-4 img-content">
                    <div id="carousel-left-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                        <!--Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-left-ads" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-left-ads" data-slide-to="1"></li>
                            <li data-target="#carousel-left-ads" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php print $left_ads_banner_1 ?>" alt="First left slide"></a>
                            </div>
                            <!--/First slide-->
                            <!--Second slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.youtube.com/watch?v=XsbnIpFBD54"><img id="carousel-slide-two" class="d-block w-100" src="<?php print $left_ads_banner_2 ?>" alt="Second left slide"></a>
                            </div>
                            <!--/Second slide-->
                            <!--Third slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.servis.com/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-three" class="d-block w-100" src="<?php print $left_ads_banner_3 ?>" alt="Third left slide"></a>
                            </div>
                            <!--/Third slide-->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a id="left-prev-btn" class="carousel-control-prev" href="#carousel-left-ads" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a id="left-next-btn" class="carousel-control-next" href="#carousel-left-ads" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                </div>
                <?php if ( $contest_id != 0) { ?>
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 contest-block">
                        <div id="view-live-content" class="view-live-content">
                            <?php 
                                wp_reset_query();
                                $query = new WP_Query(array(
                                    'post_type' => 'prizesite-contests',
                                    'post_status' => 'publish',
                                    'p'	=>	$contest_id,
                                    'posts_per_page' => 1
                                ));
                            ?>

                            <?php if( $query->have_posts() ) {
                                $query->the_post();
                                $contest_title = get_the_title( get_the_ID() );
                                $contest_description = get_the_content( get_the_ID() );
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                                $title_exists = $wpdb->get_results(
                                    "
                                    SELECT *
                                    FROM $wpdb->posts
                                    WHERE  
                                        post_title = '" . $contest_id .  "'
                                    AND
                                        post_type = '" . 'prizesite-comments' .  "'
                                    "
                                );
                                $comment_count = count($title_exists);
                                ?>
                                <div id="live-contest-header" class="row">
                                    <div class="col-12">
                                        <h2><?php echo $contest_title; ?></h2>
                                    </div>
                                </div>
                                <div id="live-contest-status" class="row">
                                    <div class="col-2 remove-padding live-status">
                                        <p>LIVE</p>
                                    </div>
                                    <div id="live-countdown" class="col-10 vertical-line">
                                        <label>TIME REMAINING : </label>
                                        <label id="countdown-days">0</label><span> days</span>
                                        <label id="countdown-hours">0</label><span> hours</span>
                                        <label id="countdown-mins">0</label><span> mins</span>
                                        <label id="countdown-secs">0</label><span> secs</span>
                                    </div>
                                </div>
                                <div id="live-contest-info">
                                    <div class="card col-xl-8 col-lg-8 col-md-11 col-sm-12 col-12 remove-padding">
                                        <img class="card-img-top" src="<?php echo $thumbnail_url; ?>" alt="<?php echo $contest_title . " Image"; ?>">
                                        <div class="card-body">
                                            <?php echo $contest_description; ?>
                                        </div>
                                        <div class="info-footer">
                                            <a class="share-link-btn col-xl-4 col-lg-3 col-md-3 col-sm-3 col-3 remove-padding" type="button" data-toggle="modal" data-target="#comment-contest-modal" title="Comment"><img class="comment-icon-link" src="<?php print $comment_url ?>" alt="comment icon"><label>Comment</label></a>
                                            <a class="share-link-btn col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 remove-padding" type="button" data-toggle="modal" data-target="#share-contest-modal" title="Share" href="<?php echo $share_link; ?>"><img class="share-icon-link" src="<?php print $share_url ?>" alt="share icon"><label>Share</label></a>
                                            <p class="col-xl-4 col-lg-5 col-md-5 col-sm-5 col-5 remove-padding" style="float:right;"><label><?php echo $comment_count; ?> Comment<?php if( $comment_count > 1 ) { echo "s"; } ?></label><label id="share-counter"><?php echo $share_count; ?> Share<?php if( $share_count > 1 ) { echo "s"; } ?></label></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } wp_reset_query(); ?>
                                <div class="view-comments" class="row">
                                    <h4>Comments</h4>
                                    <div id="comments-block" class="col-xl-8 col-lg-8 col-md-11 col-sm-12 col-12 remove-padding">
                                            <?php
                                                $title_exists = $wpdb->get_results(
                                                "
                                                SELECT *
                                                FROM $wpdb->posts
                                                WHERE  
                                                    post_title = '" . $contest_id .  "'
                                                AND
                                                    post_type = '" . 'prizesite-comments' .  "'
                                                "
                                            );
                                            $comment_index = 0;
                                            if( count($title_exists) == 0 ) {
                                            ?>
                                                <div class="card">
                                                    <div class="card-body" style="text-align:center">
                                                        <p class="card-text">No Comments Exists</p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            while( $comment_index < count($title_exists) ) {
                                                $comment_name = get_post_meta($title_exists[$comment_index]->ID,'_comments_name_value_key',true);
                                                $comment_text = get_post_meta($title_exists[$comment_index]->ID,'_comments_commenttext_value_key',true);
                                                $comment_date = get_the_date('d-m-Y', $title_exists[$comment_index]->ID);
                                                $comment_time = get_the_time('', $title_exists[$comment_index]->ID);
                                            ?>
                                                <div class="comment">
                                                    <div class="comment-header">
                                                        <p><label class="text-uname"><?php echo $comment_name; ?></label><label class="text-comment"><?php echo $comment_text; ?></label></p>
                                                    </div>
                                                    <label class="text-detail"><i class="fas fa-calendar"></i><?php echo $comment_date; ?><i class="fas fa-clock"></i><?php echo $comment_time; ?></label>
                                                </div>
                                            <?php
                                                $comment_index = $comment_index + 1;
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        <div id="mob-carousel-left-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                            <!--Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#mob-carousel-left-ads" data-slide-to="0" class="active"></li>
                                <li data-target="#mob-carousel-left-ads" data-slide-to="1"></li>
                                <li data-target="#mob-carousel-left-ads" data-slide-to="2"></li>
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
                            <a id="mob-left-prev-btn" class="carousel-control-prev" href="#mob-carousel-left-ads" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a id="mob-left-next-btn" class="carousel-control-next" href="#mob-carousel-left-ads" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="share-contest-modal" tabindex="-1" role="dialog" aria-labelledby="shareContestLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="share-contest-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		<div class="col">
                <h3>Share the link below with your friends for them to see contest!</h3>
                <form id="prizesite-contest-share-form" class="query-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <div class="form-group">
                        <div class="input-wrap">
                            <input type="text" id="contest-url" class="form-control" readonly value="<?php echo $url; ?>">
                            <button id="copy-contest-url-btn" type="sumbit" class="btn">Copy URL</button>
                        </div>
                    </div>
                </form>
			</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="comment-contest-modal" tabindex="-1" role="dialog" aria-labelledby="commentContestLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="comment-contest-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		<div class="col">
                <h3>Add Comment to Enter Lucky Draw</h3>
                <form id="prizesite-contest-comment-form" class="query-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <div class="form-group">
                        <div class="input-wrap">
                            <label for="comment-name" class="label-text">Name</label>
                            <input type="text" id="comment-name" class="form-control" >
                            <span class="error-message" id="comment-name-error-msg">Please enter your name.</span>
                            <span class="error-message" id="comment-name-invalid-msg">Name must contain only letters.</span>
                        </div>
                        <div class="input-wrap">
                            <label for="comment-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                            <input type="text" id="comment-no" class="form-control" >
                            <span class="label">You will not be able to claim the prize if number is not correct.</span>
                            <span class="error-message" id="comment-no-error-msg">Please enter a phone number</span>
                            <span class="error-message" id="comment-number-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
                        </div>
                        <div class="input-wrap">
                            <label for="comment-text" class="label-text">Your Comment</label>
                            <textarea id="comment-text" class="form-control" rows="5" cols="20"></textarea>
                            <span class="error-message" id="comment-text-error-msg">Please enter your comment</span>
                        </div>
                        <button id="add-comment-btn" type="sumbit" class="btn">Enter Lucky Draw</button>
                    </div>
                </form>
			</div>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="success-comment-modal" tabindex="-1" role="dialog" aria-labelledby="successCommentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="success-comment-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<?php $category_id = get_cat_ID('Comment Success');
    				query_posts("cat=$category_id&posts_per_page=1");
    				if (have_posts()) {
      			the_post(); ?>
	  				<div class="col">
							<h3><?php the_title() ?></h3>
							<?php the_content() ?>
						</div>
				<?php } wp_reset_query(); ?>
				<button id="success-modal-close-btn" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	  </div>
    </div>
  </div>
</div>

<div class="modal" id="failure-comment-modal" tabindex="-1" role="dialog" aria-labelledby="failureCommentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button id="failure-comment-close" type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<?php $category_id = get_cat_ID('Comment Failure');
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