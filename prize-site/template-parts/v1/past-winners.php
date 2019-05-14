<?php
/*
@package prizesitetheme
*/

$foodpanda_url = get_template_directory_uri() . '/img/foodpanda.jpg';
$error_message = esc_attr(get_option('prizesite_custom_filter_error_meesgae'));
date_default_timezone_set('Asia/Karachi');
$today = date("j F Y");
$yesterday = date('j F Y', strtotime('-1 days'));;

?>
<script type="text/javascript">var error_message = "<?= $error_message ?>";</script>
<div class="main-content">
    <div class="past-winners row">
        <div id="past-winners-sidebar-content" class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 remove-padding">
            <div class="row">
                <div class="col-12">
                    <p><a target="_blank"  href="https://www.youtube.com/watch?v=xJyCU8WgQp8"><img src="<?php echo $foodpanda_url ?>"></a></p>
                </div>
                <div id="past-winners-sidebar-content-fb-lg" class="col-12">
                    <!-- Facebook Page Plugin-->
                    <h3><p style="text-decoration:underline; color:black;">Our Winners Facebook Comments</p></h3>
                    <div class="fb-page" data-href="https://www.facebook.com/MuftPaise/" data-tabs="timeline" data-height="420" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MuftPaise/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MuftPaise/">MuftPaise</a></blockquote></div>
                    <!-- Facebook Page Plugin ends-->
                </div>
            </div>
        </div>
        <div id="past-winners-content" class="col col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
            <div class="page-content">
                <p class="header"><?php the_title(); ?></p>
                <p><?php the_content(); ?></p>
            </div>
            <table id="winners-data" class="table table-striped table-bordered responsive" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Winnner</th>
                        <th>Actual Number</th>
                        <th>Muft Paise Won</th>
                        <th>Claimed</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    wp_reset_query();
                    $query = new WP_Query(array(
                        'post_type' => 'prizesite-winners',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    ));
                    if($query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php   $post_date = get_the_date("j F Y"); ?>
                            <?php if ( ($post_date != $today) && ($post_date != $yesterday) ) { ?>
                                <tr>
                                        <td><?php echo $post_date; ?></td>
                                        <td><?php the_title(); ?></td>
                                        <td><?php echo get_post_meta( get_the_ID(), '_winners_actualnumber_value_key', true); ?></td>
                                        <td><?php echo get_post_meta( get_the_ID(), '_winners_prizeamount_value_key', true); ?></td>
                                        <?php $claim_value = strtoupper(get_post_meta( get_the_ID(), '_winners_prizeclaimed_value_key', true));
                                        if ( $claim_value == "YES" ) { ?>
                                            <td class="claim-status">
                                        <?php } else {  ?>
                                            <td>
                                        <?php } 
                                        echo get_post_meta( get_the_ID(), '_winners_prizeclaimed_value_key', true); ?></td>
                                </tr>
                            <?php } ?>
                    <?php
                    endwhile;
                    endif;
                    wp_reset_query();
                ?>
                </tbody>
            </table>
            <button id="past-winners-register-number-lg" type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
            <div id="past-winners-sidebar-content-fb-sm">
                <!-- Facebook Page Plugin-->
                <h3><p style="text-decoration:underline; color:black;">Our Winners Facebook Comments</p></h3>
                <div class="fb-page" data-href="https://www.facebook.com/MuftPaise/" data-tabs="timeline" data-height="420" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MuftPaise/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MuftPaise/">MuftPaise</a></blockquote></div>
                <!-- Facebook Page Plugin ends-->
            </div>
            <button id="past-winners-register-number-sm" type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
        </div>
    </div>
</div>

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