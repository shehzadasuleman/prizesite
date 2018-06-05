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
	}

	echo $postID;

	die();

}

function check_candidate_data(){
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
		
		$return_value = -200;
		if($query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			$title = get_the_title();
			if($title == $number){
				$return_value = -300;
			}
		endwhile;
		endif;
		wp_reset_query();

		if($return_value == -100 || $return_value == -200) {
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
	}

	echo $return_value;

	die();

}





















