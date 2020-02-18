<?php

/*
	
@package sunsettheme
	
	========================
		AJAX FUNCTIONS
	========================
*/
add_action( 'wp_ajax_nopriv_prizesite_save_new_candidate_data', 'save_candidate_data' );
add_action( 'wp_ajax_prizesite_save_new_candidate_data', 'save_candidate_data' );

add_action( 'wp_ajax_nopriv_prizesite_check_candidate_data', 'check_candidate_data' );
add_action( 'wp_ajax_prizesite_check_candidate_data', 'check_candidate_data' );

add_action( 'wp_ajax_nopriv_prizesite_save_new_query_data', 'save_query_data' );
add_action( 'wp_ajax_prizesite_save_new_query_data', 'save_query_data' );

add_action( 'wp_ajax_nopriv_prizesite_save_new_verification_data', 'save_verification_data' );
add_action( 'wp_ajax_prizesite_save_new_verification_data', 'save_verification_data' );

add_action( 'wp_ajax_nopriv_prizesite_get_new_verification_data', 'get_verification_data' );
add_action( 'wp_ajax_prizesite_get_new_verification_data', 'get_verification_data' );

add_action( 'wp_ajax_nopriv_prizesite_resend_new_email', 'resend_email' );
add_action( 'wp_ajax_prizesite_resend_new_email', 'resend_email' );

add_action( 'wp_ajax_nopriv_prizesite_save_muftrewards_user_data', 'save_mr_user_data' );
add_action( 'wp_ajax_prizesite_save_muftrewards_user_data', 'save_mr_user_data' );

add_action( 'wp_ajax_nopriv_prizesite_verify_mr_user_data', 'verify_mr_user_data' );
add_action( 'wp_ajax_prizesite_verify_mr_user_data', 'verify_mr_user_data' );

add_action( 'wp_ajax_nopriv_prizesite_signin_muftrewards_user_data', 'signin_mr_user_data' );
add_action( 'wp_ajax_prizesite_signin_muftrewards_user_data', 'signin_mr_user_data' );

add_action( 'wp_ajax_nopriv_prizesite_update_share_count_data', 'update_share_count_data' );
add_action( 'wp_ajax_prizesite_update_share_count_data', 'update_share_count_data' );

add_action( 'wp_ajax_nopriv_prizesite_save_new_comment_data', 'save_comment_data' );
add_action( 'wp_ajax_prizesite_save_new_comment_data', 'save_comment_data' );

function save_candidate_data(){

	$code = wp_strip_all_tags($_POST["passCode"]);
	$hash = wp_strip_all_tags($_POST["hash"]);
	$verification_id = zlib_decode( hex2bin( $hash ) );
	$is_verified = -100;
	$number = "";
	$email = "";
	$city = "";
	$area = "";
	$return_value = 0;
	
	$query = new WP_Query(array(
		'post_type' => 'prizesite-verify',
		'post_status' => 'publish',
		'p'	=>	$verification_id,
		'post_per_page' => 1
	));
	
	if( $query->have_posts() ) {
		$query->the_post();
		$passcode = get_post_meta(get_the_ID(), '_verify_passcode_value_key', true);
		if( $code == $passcode ){
			$is_verified = 1;
			$number = get_the_title();
			$email = get_post_meta(get_the_ID(), '_verify_email_value_key', true);
			$ipaddress = get_post_meta(get_the_ID(), '_verify_ip_value_key', true);
			$details = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}"));
			$area = $details->city;
			$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ipaddress);
            $res = json_decode($res);
            $city = $res->city;
			update_post_meta(get_the_ID(), '_verify_verified_value_key', "Yes");
		} else {
			$return_value = $is_verified;
		}
	}

	wp_reset_query();
	
	if( $is_verified == 1 ) {
		$args = array(
			'post_title' => $number,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'prizesite-contact'
		);
	
		$postID = wp_insert_post( $args );
		update_post_meta( $postID, '_contact_ip_value_key', $ipaddress );
		update_post_meta( $postID, '_contact_email_value_key', $email );
		update_post_meta( $postID, '_contact_city_value_key', $city );
		update_post_meta( $postID, '_contact_area_value_key', $area );
		$return_value = $postID;
	}

	echo $return_value;

	die();

}

function check_candidate_data(){

	$ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
	
	$retrieve_date = getdate();

	$number = wp_strip_all_tags($_POST["phNumber"]);
	$status = "";
	$return_value = 0;

	global $wpdb;
    $title_exists = $wpdb->get_results( 
        "
        SELECT ID
        FROM $wpdb->posts
        WHERE  
            post_title = '" . $number . "'
        AND
            post_type = '" . 'prizesite-contact' .  "'    
        "
    );
    if(count($title_exists) <= 0){
		$return_value = -100;
	}
	
	if ($return_value != -100) {
		$query = new WP_Query(array(
			'post_type' => 'prizesite-winners',
			'post_status' => 'publish',
			'day'       => $retrieve_date['mday'],
			'year'       => $retrieve_date['year'],
			'month'       => $retrieve_date['mon'],
			'post_per_page' => 10
		));
		
		$date_to_match = $retrieve_date['mday']." - ".$retrieve_date['mon']." - ".$retrieve_date['year'];
		$return_value = -200;
		if($query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			$title = get_post_meta(get_the_ID(), '_winners_actualnumber_value_key', true);
			if($title == $number && $date_to_match == get_the_Date("j - n - Y")){
				$return_value = -300;
			}
		endwhile;
		endif;
		wp_reset_query();

		if($return_value == -200) {
			$status = "NOT WON";
		} else if($return_value == -300) {
			$status = "WON";
		}

		$args = array(
			'post_title' => $number,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'prizesite-prizecheck'
		);
	
		$postID = wp_insert_post( $args );
		update_post_meta( $postID, '_prizecheck_status_value_key', $status );
		update_post_meta( $postID, '_prizecheck_ip_value_key', $ipaddress );
	} else {
		$args = array(
			'post_title' => $number,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'prizesite-prizecheck'
		);
	
		$postID = wp_insert_post( $args );
		update_post_meta( $postID, '_prizecheck_status_value_key', "NOT REGISTERED" );
		update_post_meta( $postID, '_prizecheck_ip_value_key', $ipaddress );
	}

	echo $return_value;

	die();

}

function save_query_data(){

	$name = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$number = wp_strip_all_tags($_POST["phNumber"]);
	$question = wp_strip_all_tags($_POST["question"]);
	
	$args = array(
		'post_title' => $name,
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'prizesite-queries'
	);
	
	$postID = wp_insert_post( $args );
	update_post_meta( $postID, '_queries_email_value_key', $email );
	update_post_meta( $postID, '_queries_number_value_key', $number );
	update_post_meta( $postID, '_queries_question_value_key', $question );

	echo $postID;

	die();

}

function save_verification_data(){

	$number = wp_strip_all_tags($_POST["phNumber"]);
	$email = wp_strip_all_tags($_POST["emailAddress"]);
	$passcode = mt_rand();
	$verified = "No";
	$is_duplicate = 0;
	$is_already_exists = 0;

	$ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
		$ipaddress = 'UNKNOWN';
		
	global $wpdb;
    $title_exists = $wpdb->get_results( 
        "
        SELECT ID
        FROM $wpdb->posts
        WHERE  
            post_title = '" . $number . "'
        AND
            post_type = '" . 'prizesite-contact' .  "'    
        "
	);
	
    if(count($title_exists) > 0){
		$postID = -100;
		$is_already_exists = 1;
	}

	if ( $is_already_exists != 1 ) {

		global $wpdb;
		$title_exists = $wpdb->get_results( 
			"
			SELECT ID
			FROM $wpdb->posts
			WHERE  
				post_title = '" . $number . "'
			AND
				post_type = '" . 'prizesite-verify' .  "'    
			"
		);

		if(count($title_exists) > 0){
			$is_duplicate = 1;
		}

		if( $is_duplicate == 0 ) {
			$args = array(
				'post_title' => $number,
				'post_author' => 1,
				'post_status' => 'publish',
				'post_type' => 'prizesite-verify'
			);
		
			$postID = wp_insert_post( $args );
			update_post_meta( $postID, '_verify_ip_value_key', $ipaddress );
			update_post_meta( $postID, '_verify_email_value_key', $email );
			update_post_meta( $postID, '_verify_passcode_value_key', $passcode );
			update_post_meta( $postID, '_verify_verified_value_key', $verified );
		}
	
		if ( $is_duplicate == 0 ) {
			echo $postID.'-'.bin2hex(zlib_encode($postID, ZLIB_ENCODING_DEFLATE));
		} elseif ( $is_duplicate == 1 ) {
			echo $title_exists[0]->ID.'-'.bin2hex(zlib_encode($title_exists[0]->ID, ZLIB_ENCODING_DEFLATE));
		}

		$to = $email;
		$subject = "Muftpaise Verification Alert";
		$message = "Hi there,\n\nThe details for your requested verification code are as follows, if you have not requested this verification code, please report it at contact@muftpaise.com.\n\nVerification Code: ".$passcode.".";
		wp_mail( $to, $subject, $message);

	} elseif ( $is_already_exists == 1 ) {
		echo $postID;
	}

	die();

}

function get_verification_data(){

	$hash = wp_strip_all_tags($_POST["hash"]);
	$verification_id = zlib_decode( hex2bin( $hash ) );

	$query = new WP_Query(array(
		'post_type' => 'prizesite-verify',
		'post_status' => 'publish',
		'p'	=>	$verification_id,
		'post_per_page' => 1
	));

	if( $query->have_posts() ) {
		$query->the_post();
		$email = get_post_meta(get_the_ID(), '_verify_email_value_key', true);
		$return_value = get_the_ID()."-".$email;
		echo $return_value;
	} else {
		$return_value = -100;
		echo $return_value;
	}

	wp_reset_query();
}

function resend_email(){
    $hash = wp_strip_all_tags($_POST["hash"]);
    $verification_id = zlib_decode( hex2bin( $hash ) );
    $email = "";

    $query = new WP_Query(array(
        'post_type' => 'prizesite-verify',
        'post_status' => 'publish',
        'p'    =>    $verification_id,
        'post_per_page' => 1
    ));

    if( $query->have_posts() ) {

        $query->the_post();
        $email = get_post_meta(get_the_ID(), '_verify_email_value_key', true);
        $passcode = get_post_meta(get_the_ID(), '_verify_passcode_value_key', true);
        $to = str_replace("0", "", $email);
        $subject = "Muftpaise Verification Alert";
        $message = "Hi there,\n\nThe details for your requested verification code are as follows, if you have not requested this verification code, please report it at contact@muftpaise.com.\n\nVerification Code: ".$passcode.".";
        $return_value = wp_mail( $to, $subject, $message);
        echo $return_value;
    } else {
        $return_value = -100;
        echo $return_value;
    }
}

function save_mr_user_data(){

	$fname = wp_strip_all_tags($_POST["fName"]);
	$lname = wp_strip_all_tags($_POST["lName"]);
	$number = wp_strip_all_tags($_POST["phNumber"]);
	$email = wp_strip_all_tags($_POST["emailAddress"]);
	$password = wp_strip_all_tags($_POST["password"]);
	$dailydraw = wp_strip_all_tags($_POST["enterDraw"]);
	$passcode = mt_rand();
	$verified = 0;
	$is_duplicate = 0;
	$is_already_exists = 0;

	global $wpdb;
    $title_exists = $wpdb->get_results( 
        "
        SELECT ID
        FROM $wpdb->posts
        WHERE  
            post_title = '" . $email . "'
        AND
            post_type = '" . 'prizesite-mrusers' .  "'    
        "
	);

	if(count($title_exists) > 0){
		$postID = -100;
		$is_already_exists = 1;
	}

	if ( $is_already_exists != 1 ) {
		$args = array(
			'post_title' => $email,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'prizesite-mrusers'
		);
	
		$postID = wp_insert_post( $args );
		update_post_meta( $postID, '_mrusers_fname_value_key', $fname );
		update_post_meta( $postID, '_mrusers_lname_value_key', $lname );
		update_post_meta( $postID, '_mrusers_password_value_key', $password );
		update_post_meta( $postID, '_mrusers_phnumber_value_key', $number );
		update_post_meta( $postID, '_mrusers_verificationcode_value_key', $passcode );
		update_post_meta( $postID, '_mrusers_emailverified_value_key', $verified );
		update_post_meta( $postID, '_mrusers_dailydraw_value_key', $dailydraw );

		echo $postID.'-'.bin2hex(zlib_encode($postID, ZLIB_ENCODING_DEFLATE));

	} else {
		$is_verified = get_post_meta($title_exists[0]->ID,'_mrusers_emailverified_value_key',true);
		if( $is_verified == 0 ) {
			echo $title_exists[0]->ID.'-'.bin2hex(zlib_encode($title_exists[0]->ID, ZLIB_ENCODING_DEFLATE));
		} elseif ( $is_verified == 1 ) {
			echo $postID;
		}
	}

	$to = $email;
	$subject = "Muftpaise Verification Alert";
	$message = "Hi there,\n\nThe details for your requested verification code are as follows, if you have not requested this verification code, please report it at contact@muftpaise.com.\n\nVerification Code: ".$passcode.".";
	wp_mail( $to, $subject, $message);

	die();

}

function verify_mr_user_data(){

	$code = wp_strip_all_tags($_POST["passCode"]);
	$hash = wp_strip_all_tags($_POST["hash"]);
	$verification_id = zlib_decode( hex2bin( $hash ) );
	$is_verified = -100;
	$return_value = 0;
	
	$query = new WP_Query(array(
		'post_type' => 'prizesite-mrusers',
		'post_status' => 'publish',
		'p'	=>	$verification_id,
		'post_per_page' => 1
	));
	
	if( $query->have_posts() ) {
		$query->the_post();
		$passcode = get_post_meta(get_the_ID(), '_mrusers_verificationcode_value_key', true);
		if( $code == $passcode ){
			$is_verified = 1;
			$daily_draw = get_post_meta(get_the_ID(), '_mrusers_dailydraw_value_key', true);
			if ( $daily_draw == 1 ) {
				$number = get_post_meta(get_the_ID(), '_mrusers_phnumber_value_key', true);
				$email = get_the_title(get_the_ID());

				$is_already_exists = 0;

				$ipaddress = '';
				if (isset($_SERVER['HTTP_CLIENT_IP']))
					$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
					$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else if(isset($_SERVER['HTTP_X_FORWARDED']))
					$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				else if(isset($_SERVER['HTTP_FORWARDED']))
					$ipaddress = $_SERVER['HTTP_FORWARDED'];
				else if(isset($_SERVER['REMOTE_ADDR']))
					$ipaddress = $_SERVER['REMOTE_ADDR'];
				else
					$ipaddress = 'UNKNOWN';

				$details = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}"));
				$area = $details->city;
				$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ipaddress);
				$res = json_decode($res);
				$city = $res->city;
					
				global $wpdb;
				$title_exists = $wpdb->get_results( 
					"
					SELECT ID
					FROM $wpdb->posts
					WHERE  
						post_title = '" . $number . "'
					AND
						post_type = '" . 'prizesite-contact' .  "'    
					"
				);
	
				if(count($title_exists) > 0){
					$is_already_exists = 1;
				}

				if ( $is_already_exists != 1 ) {
						$args = array(
							'post_title' => $number,
							'post_author' => 1,
							'post_status' => 'publish',
							'post_type' => 'prizesite-contact'
						);
					
						$postID = wp_insert_post( $args );
						update_post_meta( $postID, '_contact_ip_value_key', $ipaddress );
						update_post_meta( $postID, '_contact_email_value_key', $email );
						update_post_meta( $postID, '_contact_city_value_key', $city );
						update_post_meta( $postID, '_contact_area_value_key', $area );
				}
			}
			update_post_meta(get_the_ID(), '_mrusers_emailverified_value_key', $is_verified);
			$return_value = get_the_ID();
		} else {
			$return_value = $is_verified;
		}
	}

	echo $return_value;

	die();

}

function signin_mr_user_data(){

	$email = wp_strip_all_tags($_POST["emailAddress"]);
	$password = wp_strip_all_tags($_POST["password"]);
	$postID = 0;

	global $wpdb;
    $title_exists = $wpdb->get_results( 
        "
        SELECT ID
        FROM $wpdb->posts
        WHERE  
            post_title = '" . $email . "'
        AND
            post_type = '" . 'prizesite-mrusers' .  "'    
        "
	);

	if(count($title_exists) == 0){
		$postID = -100;
	} elseif ( count($title_exists) == 1 ) {

		$db_password = get_post_meta($title_exists[0]->ID,'_mrusers_password_value_key',true);
		$db_fname = get_post_meta($title_exists[0]->ID,'_mrusers_fname_value_key',true);
		$db_emailverified = get_post_meta($title_exists[0]->ID,'_mrusers_emailverified_value_key',true);

		if ( $db_password == $password ) {
			if ( $db_emailverified == 1 ) {
				$postID = $title_exists[0]->ID.'-'.bin2hex(zlib_encode($title_exists[0]->ID, ZLIB_ENCODING_DEFLATE));
				$_SESSION["mr-user"] = $email;
				$_SESSION["mr-user-fname"] = $db_fname;
				$_SESSION["mr-user-hashcode"] = bin2hex(zlib_encode($title_exists[0]->ID, ZLIB_ENCODING_DEFLATE));
			} else {
				$postID = -300;
			}
		} else {
			$postID = -200;
		}

	}

	echo $postID;

	die();

}

function update_share_count_data(){

	$share_count = wp_strip_all_tags($_POST["shareCount"]);
	$contest_id = wp_strip_all_tags($_POST["constestID"]);

	$return_value = update_post_meta( $contest_id, '_contests_sharecount_value_key', ($share_count + 1) );

	echo $return_value;

	die();
}

function save_comment_data(){

	$ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
		$ipaddress = 'UNKNOWN';
		
	$number = wp_strip_all_tags($_POST["phNumber"]);
	$name = wp_strip_all_tags($_POST["name"]);
	$comment = wp_strip_all_tags($_POST["comment"]);
	$contest_id = wp_strip_all_tags($_POST["constestID"]);
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}"));
	$area = $details->city;
	$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ipaddress);
	$res = json_decode($res);
	$city = $res->city;
	$is_already_exists = 0;

	global $wpdb;
	$title_exists = $wpdb->get_results( 
		"
		SELECT ID
		FROM $wpdb->posts
		WHERE  
			post_title = '" . $contest_id . "'
		AND
			post_type = '" . 'prizesite-comments' .  "'    
		"
	);

	$comment_index = 0;
	while( $comment_index < count($title_exists) ){
		$record_number = get_post_meta($title_exists[$comment_index]->ID, '_comments_phoneno_value_key', true);
		if( $number == $record_number ) {
			$postID = -100;
			$is_already_exists = 1;
		}
		$comment_index = $comment_index + 1;
	}

	if ( $is_already_exists != 1 ) {

		$args = array(
			'post_title' => $contest_id,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'prizesite-comments'
		);
		
		$postID = wp_insert_post( $args );
		update_post_meta( $postID, '_comments_commenttext_value_key', $comment );
		update_post_meta( $postID, '_comments_contesttitle_value_key', get_the_title($contest_id) );
		update_post_meta( $postID, '_comments_phoneno_value_key', $number );
		update_post_meta( $postID, '_comments_name_value_key', $name );
		update_post_meta( $postID, '_comments_city_value_key', $city );
		update_post_meta( $postID, '_comments_ipaddress_value_key', $ipaddress );
		update_post_meta( $postID, '_comments_area_value_key', $area );
		
	}

	echo $postID;

	die();

}




















