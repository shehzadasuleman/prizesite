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

function save_candidate_data(){

	$number = wp_strip_all_tags($_POST["phNumber"]);
	$is_duplicate = 0;

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
		$is_duplicate = 1;
	}
	
	if( $is_duplicate == 0 ) {
		$args = array(
			'post_title' => $number,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'prizesite-contact'
		);
	
		$postID = wp_insert_post( $args );
		update_post_meta( $postID, '_contact_ip_value_key', $ipaddress );
	}

	echo $postID;

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

	date_default_timezone_set('Asia/Karachi');
    $curr_time=time();
	$curr_date = date("Y/m/d",$curr_time);
	$threshold_time = strtotime($curr_date . " 13:00:00");

	$wp_today = getdate();
	
	$retrieve_date = $wp_today;
	if ($curr_time <= $threshold_time) {
		$retrieve_date['mday'] = $wp_today['mday'] - 1;
	}

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
			if($title == $number && $date_to_match == get_the_Date("d - n - Y")){
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





















