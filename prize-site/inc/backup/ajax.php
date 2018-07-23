<?php

/*
	
@package sunsettheme
	
	========================
		AJAX FUNCTIONS
	========================
*/
add_action( 'wp_ajax_nopriv_prizesite_save_new_candidate_data', 'save_candidate_data' );
add_action( 'wp_ajax_prizesite_save_new_candidate_data', 'save_candidate_data' );

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





















