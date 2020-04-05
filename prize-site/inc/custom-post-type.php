<?php

/*
	
@package prizesitetheme
	
	===============================
		THEME CUSTOM POST TYPES
	===============================
*/

$contact = get_option( 'ps_activate_contact' );
if( @$contact == 1 ){
	add_action( 'init', 'prizesite_contact_custom_post_type' );
	add_filter( 'manage_prizesite-contact_posts_columns', 'prizesite_set_contact_columns' );
	add_action( 'manage_prizesite-contact_posts_custom_column', 'prizesite_contact_custom_column', 10, 2 );
	add_action( 'add_meta_boxes', 'prizesite_contact_add_meta_box' );
	add_action( 'save_post', 'prizesite_save_contact_bulk_data');
}
/* CONTACT CPT */
function prizesite_contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Candidates',
		'singular_name' 	=> 'Candidate',
		'menu_name'			=> 'Candidates',
		'name_admin_bar'	=> 'Candidate'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg"><path d="M657 896q-162 5-265 128h-134q-82 0-138-40.5t-56-118.5q0-353 124-353 6 0 43.5 21t97.5 42.5 119 21.5q67 0 133-23-5 37-5 66 0 139 81 256zm1071 637q0 120-73 189.5t-194 69.5h-874q-121 0-194-69.5t-73-189.5q0-53 3.5-103.5t14-109 26.5-108.5 43-97.5 62-81 85.5-53.5 111.5-20q10 0 43 21.5t73 48 107 48 135 21.5 135-21.5 107-48 73-48 43-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-1024-1277q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm704 384q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5zm576 225q0 78-56 118.5t-138 40.5h-134q-103-123-265-128 81-117 81-256 0-29-5-66 66 23 133 23 59 0 119-21.5t97.5-42.5 43.5-21q124 0 124 353zm-128-609q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181z" fill="#fff"/></svg>'),
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-contact', $args );
	
}

function prizesite_set_contact_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Phone Number';
	$newColumns['email'] = 'Email Address';
	$newColumns['ip'] = 'IP Address';
	$newColumns['city'] = 'City';
	$newColumns['utmsource'] = 'Campaign Source';
	$newColumns['utmmedium'] = 'Campaign Medium';
	$newColumns['utmcampaign'] = 'Campaign Name';
	$newColumns['userid'] = 'User Id';
	return $newColumns;
}

function prizesite_contact_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'ip' :
			echo get_post_meta( $post_id, '_contact_ip_value_key', true);
			break;
		case 'email' :
			echo get_post_meta( $post_id, '_contact_email_value_key', true);
			break;
		case 'city' :
			echo get_post_meta( $post_id, '_contact_city_value_key', true);
			break;
		case 'area' :
			echo get_post_meta( $post_id, '_contact_area_value_key', true);
			break;
		case 'utmsource' :
			echo get_post_meta( $post_id, '_contact_source_value_key', true);
			break;
		case 'utmmedium' :
			echo get_post_meta( $post_id, '_contact_medium_value_key', true);
			break;
		case 'utmcampaign' :
			echo get_post_meta( $post_id, '_contact_campaign_value_key', true);
			break;
		case 'userid' :
			echo get_post_meta( $post_id, '_contact_userid_value_key', true);
			break;
	}
	
}

/* Contact META BOXES */
function prizesite_contact_add_meta_box() {
	add_meta_box( 'contact_ip', 'IP Address', 'prizesite_contact_ip_callback', 'prizesite-contact' );
	add_meta_box( 'contact_email', 'Email Address', 'prizesite_contact_email_callback', 'prizesite-contact' );
	add_meta_box( 'contact_city', 'City', 'prizesite_contact_city_callback', 'prizesite-contact' );
	add_meta_box( 'contact_area', 'Area', 'prizesite_contact_area_callback', 'prizesite-contact' );
	add_meta_box( 'contact_utmsource', 'Campaign Source', 'prizesite_contact_source_callback', 'prizesite-contact' );
	add_meta_box( 'contact_utmmedium', 'Campaign Medium', 'prizesite_contact_medium_callback', 'prizesite-contact' );
	add_meta_box( 'contact_utmcampaign', 'Campaign Name', 'prizesite_contact_campaign_callback', 'prizesite-contact' );
	add_meta_box( 'contact_userid', 'User Id', 'prizesite_contact_userid_callback', 'prizesite-contact' );
}
function prizesite_contact_ip_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_ip_data', 'prizesite_contact_ip_meta_box_nonce' );

	$ip_value = get_post_meta( $post->ID, '_contact_ip_value_key', true );
	
	echo '<label for="prizesite_contact_ip_field">IP Address: </label>';
	echo '<input type="text" id="prizesite_contact_ip_field" name="prizesite_contact_ip_field" value="' . esc_attr( $ip_value ) . '" size="25" />';
}
function prizesite_contact_email_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_email_data', 'prizesite_contact_email_meta_box_nonce' );

	$email_value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
	echo '<label for="prizesite_contact_email_field">Email Address: </label>';
	echo '<input type="text" id="prizesite_contact_email_field" name="prizesite_contact_email_field" value="' . esc_attr( $email_value ) . '" size="25" />';
}
function prizesite_contact_city_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_city_data', 'prizesite_contact_city_meta_box_nonce' );

	$city_value = get_post_meta( $post->ID, '_contact_city_value_key', true );
	
	echo '<label for="prizesite_contact_city_field">City: </label>';
	echo '<input type="text" id="prizesite_contact_city_field" name="prizesite_contact_city_field" value="' . esc_attr( $city_value ) . '" size="25" />';
}
function prizesite_contact_area_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_area_data', 'prizesite_contact_area_meta_box_nonce' );

	$area_value = get_post_meta( $post->ID, '_contact_area_value_key', true );
	
	echo '<label for="prizesite_contact_area_field">Area: </label>';
	echo '<input type="text" id="prizesite_contact_area_field" name="prizesite_contact_area_field" value="' . esc_attr( $area_value ) . '" size="25" />';
}
function prizesite_contact_source_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_source_data', 'prizesite_contact_source_meta_box_nonce' );

	$source_value = get_post_meta( $post->ID, '_contact_source_value_key', true );
	
	echo '<label for="prizesite_contact_source_field">Campaign Source: </label>';
	echo '<input type="text" id="prizesite_contact_source_field" name="prizesite_contact_source_field" value="' . esc_attr( $source_value ) . '" size="25" />';
}
function prizesite_contact_medium_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_medium_data', 'prizesite_contact_medium_meta_box_nonce' );

	$medium_value = get_post_meta( $post->ID, '_contact_medium_value_key', true );
	
	echo '<label for="prizesite_contact_medium_field">Campaign Medium: </label>';
	echo '<input type="text" id="prizesite_contact_medium_field" name="prizesite_contact_medium_field" value="' . esc_attr( $medium_value ) . '" size="25" />';
}
function prizesite_contact_campaign_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_campaign_data', 'prizesite_contact_campaign_meta_box_nonce' );

	$campaign_value = get_post_meta( $post->ID, '_contact_campaign_value_key', true );
	
	echo '<label for="prizesite_contact_campaign_field">Campaign Name: </label>';
	echo '<input type="text" id="prizesite_contact_campaign_field" name="prizesite_contact_campaign_field" value="' . esc_attr( $campaign_value ) . '" size="25" />';
}
function prizesite_contact_userid_callback( $post ) {
	wp_nonce_field( 'prizesite_save_contact_userid_data', 'prizesite_contact_userid_meta_box_nonce' );

	$userid_value = get_post_meta( $post->ID, '_contact_userid_value_key', true );
	
	echo '<label for="prizesite_contact_userid_field">User Id: </label>';
	echo '<input type="text" id="prizesite_contact_userid_field" name="prizesite_contact_userid_field" value="' . esc_attr( $userid_value ) . '" size="25" />';
}
function prizesite_save_contact_bulk_data( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if( isset( $_POST['prizesite_contact_ip_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_ip_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_ip_field'] );

		update_post_meta( $post_id, '_contact_ip_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_email_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_email_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_email_field'] );

		update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_city_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_city_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_city_field'] );

		update_post_meta( $post_id, '_contact_city_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_area_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_area_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_area_field'] );

		update_post_meta( $post_id, '_contact_area_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_source_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_source_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_source_field'] );

		update_post_meta( $post_id, '_contact_source_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_medium_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_medium_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_medium_field'] );

		update_post_meta( $post_id, '_contact_medium_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_campaign_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_campaign_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_campaign_field'] );

		update_post_meta( $post_id, '_contact_campaign_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_contact_userid_meta_box_nonce'] ) && isset( $_POST['prizesite_contact_userid_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_contact_userid_field'] );

		update_post_meta( $post_id, '_contact_userid_value_key', $my_data );
	}
}

/*
=========================================================================================================
*/

add_action( 'init', 'prizesite_winners_custom_post_type' );
add_filter( 'manage_prizesite-winners_posts_columns', 'prizesite_set_winners_columns' );
add_action( 'manage_prizesite-winners_posts_custom_column', 'prizesite_winners_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_winners_add_meta_box' );
add_action( 'save_post', 'bulk_save_winners_custom_fields', 10, 2);

/* WINNER CPT */
function prizesite_winners_custom_post_type() {
	$labels = array(
		'name' 				=> 'Winners',
		'singular_name' 	=> 'Winner',
		'menu_name'			=> 'Winners',
		'name_admin_bar'	=> 'Winner'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 27,
		'menu_icon'			=> 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path fill="black" d="M522 883q-74-162-74-371h-256v96q0 78 94.5 162t235.5 113zm1078-275v-96h-256q0 209-74 371 141-29 235.5-113t94.5-162zm128-128v128q0 71-41.5 143t-112 130-173 97.5-215.5 44.5q-42 54-95 95-38 34-52.5 72.5t-14.5 89.5q0 54 30.5 91t97.5 37q75 0 133.5 45.5t58.5 114.5v64q0 14-9 23t-23 9h-832q-14 0-23-9t-9-23v-64q0-69 58.5-114.5t133.5-45.5q67 0 97.5-37t30.5-91q0-51-14.5-89.5t-52.5-72.5q-53-41-95-95-113-5-215.5-44.5t-173-97.5-112-130-41.5-143v-128q0-40 28-68t68-28h288v-96q0-66 47-113t113-47h576q66 0 113 47t47 113v96h288q40 0 68 28t28 68z"/></svg>'),
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-winners', $args );
	
}

function prizesite_set_winners_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Phone Number';
	$newColumns['prizeamount'] = 'Prize Amount';
	$newColumns['prizeclaimed'] = 'Prize Claimed';
	$newColumns['actualnumber'] = 'Actual Number';
	$newColumns['userid'] = 'User Id';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function prizesite_winners_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'prizeamount' :
			echo implode(" ", get_post_meta( $post_id, '_winners_prizeamount_value_key'));
			break;
		case 'prizeclaimed' :
			echo get_post_meta( $post_id, '_winners_prizeclaimed_value_key', true);
			break;
		case 'actualnumber' :
			echo get_post_meta( $post_id, '_winners_actualnumber_value_key', true);
			break;
		case 'userid' :
			echo get_post_meta( $post_id, '_winners_userid_value_key', true);
			break;
	}
	
}

/* WINNERS META BOXES */
function prizesite_winners_add_meta_box() {
	add_meta_box( 'winners_prizeamount', 'Prize Amount', 'prizesite_winners_prizeamount_callback', 'prizesite-winners' );
	add_meta_box( 'winners_prizeclaimed', 'Prize Claimed', 'prizesite_winners_prizeclaimed_callback', 'prizesite-winners' );
	add_meta_box( 'winners_actualnumber', 'Actual Number', 'prizesite_winners_actualnumber_callback', 'prizesite-winners' );
	add_meta_box( 'winners_userid', 'User Id', 'prizesite_winners_userid_callback', 'prizesite-winners' );
}

function prizesite_winners_prizeamount_callback( $post ) {
	wp_nonce_field( 'bulk_save_winners_custom_fields', 'prizesite_winners_prizeamount_meta_box_nonce' );

	$amount_value = get_post_meta( $post->ID, '_winners_prizeamount_value_key', true );
	
	echo '<label for="prizesite_winners_prizeamount_field">Prize Amount: </label>';
	echo '<input type="text" id="prizesite_winners_prizeamount_field" name="prizesite_winners_prizeamount_field" value="' . esc_attr( $amount_value ) . '" size="25" />';
}

function prizesite_winners_prizeclaimed_callback( $post ) {
	wp_nonce_field( 'bulk_save_winners_custom_fields', 'prizesite_winners_prizeclaimed_meta_box_nonce' );

	//$claimed_value = get_post_meta( $post->ID, '_winners_prizeclaimed_value_key', true);
	
	echo '<label for="prizesite_winners_prizeclaimed_field">Prize Claimed: </label>';
	echo '<input type="text" id="prizesite_winners_prizeclaimed_field" name="prizesite_winners_prizeclaimed_field" value="' . esc_attr( get_post_meta( $post->ID, '_winners_prizeclaimed_value_key', true) ) . '" size="25" />';
}

function prizesite_winners_actualnumber_callback( $post ) {
	wp_nonce_field( 'bulk_save_winners_custom_fields', 'prizesite_winners_actualnumber_meta_box_nonce' );

	$actual_value = get_post_meta( $post->ID, '_winners_actualnumber_value_key', true );
	
	echo '<label for="prizesite_winners_actualnumber_field">Actual Number: </label>';
	echo '<input type="text" id="prizesite_winners_actualnumber_field" name="prizesite_winners_actualnumber_field" value="' . esc_attr( $actual_value ) . '" size="25" />';
}

function prizesite_winners_userid_callback( $post ) {
	wp_nonce_field( 'bulk_save_winners_custom_fields', 'prizesite_winners_userid_meta_box_nonce' );

	$userid_value = get_post_meta( $post->ID, '_winners_userid_value_key', true );
	
	echo '<label for="prizesite_winners_userid_field">User Id: </label>';
	echo '<input type="text" id="prizesite_winners_userid_field" name="prizesite_winners_userid_field" value="' . esc_attr( $userid_value ) . '" size="25" />';
}

function bulk_save_winners_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_winners_prizeamount_meta_box_nonce'] ) && isset( $_POST['prizesite_winners_prizeamount_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_winners_prizeamount_field'] );

		update_post_meta( $post_id, '_winners_prizeamount_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_winners_prizeclaimed_meta_box_nonce'] ) && isset( $_POST['prizesite_winners_prizeclaimed_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_winners_prizeclaimed_field'] );

		update_post_meta( $post_id, '_winners_prizeclaimed_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_winners_actualnumber_meta_box_nonce'] ) && isset( $_POST['prizesite_winners_actualnumber_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_winners_actualnumber_field'] );

		update_post_meta( $post_id, '_winners_actualnumber_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_winners_userid_meta_box_nonce'] ) && isset( $_POST['prizesite_winners_userid_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_winners_userid_field'] );

		update_post_meta( $post_id, '_winners_userid_value_key', $my_data );
	}
}

/*
=========================================================================================================
*/

/* Prize Check CPT */

add_action( 'init', 'prizesite_prizecheck_custom_post_type' );
add_filter( 'manage_prizesite-prizecheck_posts_columns', 'prizesite_set_prizecheck_columns' );
add_action( 'manage_prizesite-prizecheck_posts_custom_column', 'prizesite_prizecheck_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_prizecheck_add_meta_box' );
add_action( 'save_post', 'bulk_save_prizecheck_custom_fields', 10, 2);

function prizesite_prizecheck_custom_post_type() {
	$labels = array(
		'name' 				=> 'Prize Checks',
		'singular_name' 	=> 'Prize Check',
		'menu_name'			=> 'Prize Checks',
		'name_admin_bar'	=> 'Prize Check'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 28,
		'menu_icon'			=> 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iMjUuNzU0cHgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMyIDI1Ljc1NDsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDMyIDI1Ljc1NCIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnIGlkPSJMYXllcl8xIi8+PGcgaWQ9ImNoZWNrIj48Zz48cG9seWdvbiBwb2ludHM9IjExLjk0MSwyNS43NTQgMCwxMy44MTIgNS42OTUsOC4xMTcgMTEuOTQxLDE0LjM2MyAyNi4zMDUsMCAzMiw1LjY5NSAxMS45NDEsMjUuNzU0ICAgIiBzdHlsZT0iZmlsbDojNEU0RTUwOyIvPjwvZz48L2c+PC9zdmc+',
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-prizecheck', $args );
	
}

function prizesite_set_prizecheck_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Phone Number';
	$newColumns['status'] = 'Status';
	$newColumns['ipaddress'] = 'IP Address';
	$newColumns['userid'] = 'User Id';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function prizesite_prizecheck_custom_column( $column, $post_id ){
	switch( $column ){
		case 'status' :
			echo get_post_meta( $post_id, '_prizecheck_status_value_key', true);
			break;
		case 'ipaddress' :
			echo get_post_meta( $post_id, '_prizecheck_ip_value_key', true);
			break;
		case 'userid' :
			echo get_post_meta( $post_id, '_prizecheck_userid_value_key', true);
			break;
	}
}

/* Prize Check META BOXES */
function prizesite_prizecheck_add_meta_box() {
	add_meta_box( 'prizecheck_status', 'Status', 'prizesite_prizecheck_status_callback', 'prizesite-prizecheck' );
	add_meta_box( 'prizecheck_ip', 'IP Address', 'prizesite_prizecheck_ip_callback', 'prizesite-prizecheck' );
	add_meta_box( 'prizecheck_userid', 'User Id', 'prizesite_prizecheck_userid_callback', 'prizesite-prizecheck' );
}

function prizesite_prizecheck_status_callback( $post ) {
	wp_nonce_field( 'prizesite_save_prizecheck_status_data', 'prizesite_prizecheck_status_meta_box_nonce' );

	$status_value = get_post_meta( $post->ID, '_prizecheck_status_value_key', true );
	
	echo '<label for="prizesite_prizecheck_status_field">Prize Status: </label>';
	echo '<input type="text" id="prizesite_prizecheck_status_field" name="prizesite_prizecheck_status_field" value="' . esc_attr( $status_value ) . '" size="25" />';
}

function prizesite_prizecheck_ip_callback( $post ) {
	wp_nonce_field( 'prizesite_save_prizecheck_ip_data', 'prizesite_prizecheck_ip_meta_box_nonce' );

	$ip_value = get_post_meta( $post->ID, '_prizecheck_ip_value_key', true );
	
	echo '<label for="prizesite_prizecheck_ip_field">Prize Status: </label>';
	echo '<input type="text" id="prizesite_prizecheck_ip_field" name="prizesite_prizecheck_ip_field" value="' . esc_attr( $ip_value ) . '" size="25" />';
}

function prizesite_save_prizecheck_status_data( $post_id ) {
	if( ! isset( $_POST['prizesite_prizecheck_status_meta_box_nonce'] )) {
		return;
	}

	if( ! isset( $_POST['prizesite_prizecheck_status_field'])) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['prizesite_prizecheck_status_field'] );

	update_post_meta( $post_id, '_prizecheck_status_value_key', $my_data );
}

function prizesite_prizecheck_userid_callback( $post ) {
	wp_nonce_field( 'prizesite_save_prizecheck_userid_data', 'prizesite_prizecheck_userid_meta_box_nonce' );

	$userid_value = get_post_meta( $post->ID, '_prizecheck_userid_value_key', true );
	
	echo '<label for="prizesite_prizecheck_userid_field">User Id: </label>';
	echo '<input type="text" id="prizesite_prizecheck_userid_field" name="prizesite_prizecheck_userid_field" value="' . esc_attr( $userid_value ) . '" size="25" />';
}

function bulk_save_prizecheck_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_prizecheck_status_meta_box_nonce'] ) && isset( $_POST['prizesite_prizecheck_status_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_prizecheck_status_field'] );
		update_post_meta( $post_id, '_prizecheck_status_value_key', $my_data );
	}

	if( isset( $_POST['prizesite_prizecheck_ip_meta_box_nonce'] ) && isset( $_POST['prizesite_prizecheck_ip_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_prizecheck_ip_field'] );
		update_post_meta( $post_id, '_prizecheck_ip_value_key', $my_data );
	}

	if( isset( $_POST['prizesite_prizecheck_userid_meta_box_nonce'] ) && isset( $_POST['prizesite_prizecheck_userid_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_prizecheck_userid_field'] );
		update_post_meta( $post_id, '_prizecheck_userid_value_key', $my_data );
	}
}

/*
=========================================================================================================
*/

/* Queries CPT */

add_action( 'init', 'prizesite_queries_custom_post_type' );
add_filter( 'manage_prizesite-queries_posts_columns', 'prizesite_set_queries_columns' );
add_action( 'manage_prizesite-queries_posts_custom_column', 'prizesite_queries_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_queries_add_meta_box' );
add_action( 'save_post', 'bulk_save_queries_custom_fields', 10, 2);

function prizesite_queries_custom_post_type() {
	$labels = array(
		'name' 				=> 'Queries',
		'singular_name' 	=> 'Query',
		'menu_name'			=> 'Queries',
		'name_admin_bar'	=> 'Query'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 27,
		'menu_icon'			=> get_template_directory_uri() . '/img/query.png',
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-queries', $args );
	
}

function prizesite_set_queries_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Name';
	$newColumns['email'] = 'Email';
	$newColumns['number'] = 'Phone Number';
	$newColumns['question'] = 'Question';
	$newColumns['notes'] = 'Notes';
	$newColumns['userresponded'] = 'User Responded';
	$newColumns['respondedon'] = 'Responded On';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function prizesite_queries_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'email' :
			echo implode(" ", get_post_meta( $post_id, '_queries_email_value_key'));
			break;
		case 'number' :
			echo get_post_meta( $post_id, '_queries_number_value_key', true);
			break;
		case 'question' :
			echo get_post_meta( $post_id, '_queries_question_value_key', true);
			break;
		case 'notes' :
			echo implode(" ", get_post_meta( $post_id, '_queries_notes_value_key'));
			break;
		case 'userresponded' :
			$userresponded_value = get_post_meta( $post_id, '_queries_userresponded_value_key', true );
			$checked = ( $userresponded_value == 1 ? 'Yes' : 'No' );
			echo $checked;
			break;
		case 'respondedon' :
			echo get_post_meta( $post_id, '_queries_respondedon_value_key', true);
			break;
	}
	
}

/* Queries META BOXES */
function prizesite_queries_add_meta_box() {
	add_meta_box( 'queries_email', 'Email', 'prizesite_queries_email_callback', 'prizesite-queries' );
	add_meta_box( 'queries_number', 'Phone Number', 'prizesite_queries_number_callback', 'prizesite-queries' );
	add_meta_box( 'queries_question', 'Question', 'prizesite_queries_question_callback', 'prizesite-queries' );
	add_meta_box( 'queries_notes', 'Notes', 'prizesite_queries_notes_callback', 'prizesite-queries' );
	add_meta_box( 'queries_userresponded', 'User Responded', 'prizesite_queries_userresponded_callback', 'prizesite-queries' );
	add_meta_box( 'queries_respondedon', 'Responded On', 'prizesite_queries_respondedon_callback', 'prizesite-queries' );
}

function prizesite_queries_email_callback( $post ) {
	wp_nonce_field( 'bulk_save_queries_email_fields', 'prizesite_queries_email_meta_box_nonce' );

	$email_value = get_post_meta( $post->ID, '_queries_email_value_key', true );
	
	echo '<input type="email" id="prizesite_queries_email_field" name="prizesite_queries_email_field" value="' . esc_attr( $email_value ) . '" size="40" />';
}

function prizesite_queries_number_callback( $post ) {
	wp_nonce_field( 'bulk_save_queries_number_fields', 'prizesite_queries_number_meta_box_nonce' );

	$number_value = get_post_meta( $post->ID, '_queries_number_value_key', true );
	
	echo '<input type="text" id="prizesite_queries_number_field" name="prizesite_queries_number_field" value="' . esc_attr( $number_value ) . '" size="40" />';
}

function prizesite_queries_question_callback( $post ) {
	wp_nonce_field( 'bulk_save_queries_question_fields', 'prizesite_queries_question_meta_box_nonce' );

	$question_value = get_post_meta( $post->ID, '_queries_question_value_key', true );
	
	echo '<textarea id="prizesite_queries_question_field" name="prizesite_queries_question_field" class="form-control" rows="3" cols="100">' . esc_attr( $question_value ) . '</textarea>';
}

function prizesite_queries_notes_callback( $post ) {
	wp_nonce_field( 'bulk_save_queries_notes_fields', 'prizesite_queries_notes_meta_box_nonce' );

	$notes_value = get_post_meta( $post->ID, '_queries_notes_value_key', true );
	
	echo '<textarea id="prizesite_queries_notes_field" name="prizesite_queries_notes_field" class="form-control" rows="3" cols="100">' . esc_attr( $notes_value ) . '</textarea>';
}

function prizesite_queries_userresponded_callback( $post ) {
	wp_nonce_field( 'bulk_save_queries_userresponded_fields', 'prizesite_queries_userresponded_meta_box_nonce' );

	$userresponded_value = get_post_meta( $post->ID, '_queries_userresponded_value_key', true );
	$checked = ( $userresponded_value == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="prizesite_queries_userresponded_field" name="prizesite_queries_userresponded_field" value="1" '.$checked.' /></label>';
}

function prizesite_queries_respondedon_callback( $post ) {
	wp_nonce_field( 'bulk_save_queries_respondedon_fields', 'prizesite_queries_respondedon_meta_box_nonce' );

	$respondedon_value = get_post_meta( $post->ID, '_queries_respondedon_value_key', true );
	
	echo '<input type="date" id="prizesite_queries_respondedon_field" name="prizesite_queries_respondedon_field" value="' . esc_attr( $respondedon_value ) . '" size="40" />';
}

function bulk_save_queries_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_queries_email_meta_box_nonce'] ) && isset( $_POST['prizesite_queries_email_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_queries_email_field'] );
		update_post_meta( $post_id, '_queries_email_value_key', $data );
	}

	if( isset( $_POST['prizesite_queries_number_meta_box_nonce'] ) && isset( $_POST['prizesite_queries_number_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_queries_number_field'] );
		update_post_meta( $post_id, '_queries_number_value_key', $data );
	}

	if( isset( $_POST['prizesite_queries_question_meta_box_nonce'] ) && isset( $_POST['prizesite_queries_question_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_queries_question_field'] );
		update_post_meta( $post_id, '_queries_question_value_key', $data );
	}

	if( isset( $_POST['prizesite_queries_notes_meta_box_nonce'] ) && isset( $_POST['prizesite_queries_notes_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_queries_notes_field'] );
		update_post_meta( $post_id, '_queries_notes_value_key', $data );
	}

	//if( isset( $_POST['prizesite_queries_userresponded_meta_box_nonce'] ) && isset( $_POST['prizesite_queries_userresponded_field']) ) {
		update_post_meta( $post_id, '_queries_userresponded_value_key', $_POST['prizesite_queries_userresponded_field'] );
	//}

	if( isset( $_POST['prizesite_queries_respondedon_meta_box_nonce'] ) && isset( $_POST['prizesite_queries_respondedon_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_queries_respondedon_field'] );
		update_post_meta( $post_id, '_queries_respondedon_value_key', $data );
	}
}

/*
===============================================================================================================
*/

/* Verification CPT */
add_action( 'init', 'prizesite_verify_custom_post_type' );
add_filter( 'manage_prizesite-verify_posts_columns', 'prizesite_set_verify_columns' );
add_action( 'manage_prizesite-verify_posts_custom_column', 'prizesite_verify_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_verify_add_meta_box' );
add_action( 'save_post', 'prizesite_save_verify_bulk_data');

/* Verification CPT */
function prizesite_verify_custom_post_type() {
	$labels = array(
		'name' 				=> 'Verifications',
		'singular_name' 	=> 'Verification',
		'menu_name'			=> 'Verifications',
		'name_admin_bar'	=> 'Verification'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> get_template_directory_uri() . '/img/verify.png',
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-verify', $args );
	
}

function prizesite_set_verify_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Phone Number';
	$newColumns['email'] = 'Email Address';
	$newColumns['passcode'] = 'Passcode';
	$newColumns['verified'] = 'Verified';
	$newColumns['utmsource'] = 'Campaign Source';
	$newColumns['utmmedium'] = 'Campaign Medium';
	$newColumns['utmcampaign'] = 'Campaign Name';
	return $newColumns;
}

function prizesite_verify_custom_column( $column, $post_id ){
	
	switch( $column ){
			
		case 'ip' :
			echo get_post_meta( $post_id, '_verify_ip_value_key', true);
			break;
		case 'email' :
			echo get_post_meta( $post_id, '_verify_email_value_key', true);
			break;
		case 'passcode' :
			echo get_post_meta( $post_id, '_verify_passcode_value_key', true);
			break;
		case 'verified' :
			echo get_post_meta( $post_id, '_verify_verified_value_key', true);
			break;
		case 'utmsource' :
			echo get_post_meta( $post_id, '_verify_source_value_key', true);
			break;
		case 'utmmedium' :
			echo get_post_meta( $post_id, '_verify_medium_value_key', true);
			break;
		case 'utmcampaign' :
			echo get_post_meta( $post_id, '_verify_campaign_value_key', true);
			break;
	}
	
}

/* Verification META BOXES */

function prizesite_verify_add_meta_box() {
	add_meta_box( 'verify_ip', 'IP Address', 'prizesite_verify_ip_callback', 'prizesite-verify' );
	add_meta_box( 'verify_email', 'Email Address', 'prizesite_verify_email_callback', 'prizesite-verify' );
	add_meta_box( 'verify_passcode', 'Passcode', 'prizesite_verify_passcode_callback', 'prizesite-verify' );
	add_meta_box( 'verify_verified', 'Verified', 'prizesite_verify_verified_callback', 'prizesite-verify' );
	add_meta_box( 'verify_utmsource', 'Campaign Source', 'prizesite_verify_source_callback', 'prizesite-verify' );
	add_meta_box( 'verify_utmmedium', 'Campaign Medium', 'prizesite_verify_medium_callback', 'prizesite-verify' );
	add_meta_box( 'verify_utmcampaign', 'Campaign Name', 'prizesite_verify_campaign_callback', 'prizesite-verify' );
}

function prizesite_verify_ip_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_ip_data', 'prizesite_verify_ip_meta_box_nonce' );

	$ip_value = get_post_meta( $post->ID, '_verify_ip_value_key', true );
	
	echo '<label for="prizesite_verify_ip_field">IP Address: </label>';
	echo '<input type="text" id="prizesite_verify_ip_field" name="prizesite_verify_ip_field" value="' . esc_attr( $ip_value ) . '" size="25" />';
}

function prizesite_verify_email_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_email_data', 'prizesite_verify_email_meta_box_nonce' );

	$email_value = get_post_meta( $post->ID, '_verify_email_value_key', true );
	
	echo '<label for="prizesite_verify_email_field">Email Address: </label>';
	echo '<input type="text" id="prizesite_verify_email_field" name="prizesite_verify_email_field" value="' . esc_attr( $email_value ) . '" size="25" />';
}

function prizesite_verify_passcode_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_passcode_data', 'prizesite_verify_passcode_meta_box_nonce' );

	$passcode_value = get_post_meta( $post->ID, '_verify_passcode_value_key', true );
	
	echo '<label for="prizesite_verify_passcode_field">Passcode: </label>';
	echo '<input type="text" id="prizesite_verify_passcode_field" name="prizesite_verify_passcode_field" value="' . esc_attr( $passcode_value ) . '" size="25" />';
}

function prizesite_verify_verified_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_verified_data', 'prizesite_verify_verified_meta_box_nonce' );

	$verified_value = get_post_meta( $post->ID, '_verify_verified_value_key', true );
	
	echo '<label for="prizesite_verify_verified_field">Verified: </label>';
	echo '<input type="text" id="prizesite_verify_verified_field" name="prizesite_verify_verified_field" value="' . esc_attr( $verified_value ) . '" size="25" />';
}

function prizesite_verify_source_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_source_data', 'prizesite_verify_source_meta_box_nonce' );

	$source_value = get_post_meta( $post->ID, '_verify_source_value_key', true );
	
	echo '<label for="prizesite_verify_source_field">Campaign Source: </label>';
	echo '<input type="text" id="prizesite_verify_source_field" name="prizesite_verify_source_field" value="' . esc_attr( $source_value ) . '" size="25" />';
}

function prizesite_verify_medium_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_medium_data', 'prizesite_verify_medium_meta_box_nonce' );

	$medium_value = get_post_meta( $post->ID, '_verify_medium_value_key', true );
	
	echo '<label for="prizesite_verify_medium_field">Campaign Medium: </label>';
	echo '<input type="text" id="prizesite_verify_medium_field" name="prizesite_verify_medium_field" value="' . esc_attr( $medium_value ) . '" size="25" />';
}

function prizesite_verify_campaign_callback( $post ) {
	wp_nonce_field( 'prizesite_save_verify_campaign_data', 'prizesite_verify_campaign_meta_box_nonce' );

	$campaign_value = get_post_meta( $post->ID, '_verify_campaign_value_key', true );
	
	echo '<label for="prizesite_verify_campaign_field">Campaign Name: </label>';
	echo '<input type="text" id="prizesite_verify_campaign_field" name="prizesite_verify_campaign_field" value="' . esc_attr( $campaign_value ) . '" size="25" />';
}

function prizesite_save_verify_bulk_data( $post_id ) {
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_verify_ip_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_ip_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_ip_field'] );

		update_post_meta( $post_id, '_verify_ip_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_verify_email_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_email_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_email_field'] );

		update_post_meta( $post_id, '_verify_email_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_verify_passcode_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_passcode_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_passcode_field'] );

		update_post_meta( $post_id, '_verify_passcode_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_verify_verified_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_verified_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_verified_field'] );

		update_post_meta( $post_id, '_verify_verified_value_key', $my_data );
	}

	if(isset( $_POST['prizesite_verify_source_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_source_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_source_field'] );

		update_post_meta( $post_id, '_verify_source_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_verify_medium_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_medium_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_medium_field'] );

		update_post_meta( $post_id, '_verify_medium_value_key', $my_data );
	}
	if(isset( $_POST['prizesite_verify_campaign_meta_box_nonce'] ) && isset( $_POST['prizesite_verify_campaign_field']) ) {
		$my_data = sanitize_text_field( $_POST['prizesite_verify_campaign_field'] );

		update_post_meta( $post_id, '_verify_campaign_value_key', $my_data );
	}
}

/*
=========================================================================================================
*/

/* Contests CPT */

add_action( 'init', 'prizesite_contests_custom_post_type' );
add_filter( 'manage_prizesite-contests_posts_columns', 'prizesite_set_contests_columns' );
add_action( 'manage_prizesite-contests_posts_custom_column', 'prizesite_contests_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_contests_add_meta_box' );
add_action( 'save_post', 'bulk_save_contests_custom_fields', 10, 2);

function prizesite_contests_custom_post_type() {
	$labels = array(
		'name' 				=> 'Contests',
		'singular_name' 	=> 'Contest',
		'menu_name'			=> 'Contests',
		'name_admin_bar'	=> 'Contest'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 27,
		'menu_icon'			=> get_template_directory_uri() . '/img/contest.png',
		'supports'			=> array('title','editor','thumbnail')
	);
	
	register_post_type( 'prizesite-contests', $args );
	
}

function prizesite_set_contests_columns( $columns ){
	$newColumns = array();
	$newColumns['contestid'] = 'Contest ID';
	$newColumns['title'] = 'Title';
	$newColumns['ContestLiveDate'] = 'Contest Live Date';
	$newColumns['ContestEndDate'] = 'Contest End Date';
	$newColumns['PrizeMoney'] = 'Prize Money';
	$newColumns['WinnerChosen'] = 'Winner Chosen';
	$newColumns['ShareCount'] = 'Share Count';
	return $newColumns;
}

function prizesite_contests_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'contestid' :
			echo $post_id;
			break;
		case 'ContestLiveDate' :
			echo implode(" ", get_post_meta( $post_id, '_contests_livedate_value_key'));
			break;
		case 'ContestEndDate' :
			echo get_post_meta( $post_id, '_contests_enddate_value_key', true);
			break;
		case 'PrizeMoney' :
			echo get_post_meta( $post_id, '_contests_prizemoney_value_key', true);
			break;
		case 'WinnerChosen' :
			$winnerchosen_value = get_post_meta( $post_id, '_contests_winnerchosen_value_key', true );
			$checked = ( $winnerchosen_value == 1 ? 'Yes' : 'No' );
			echo $checked;
			break;
		case 'ShareCount' :
			echo get_post_meta( $post_id, '_contests_sharecount_value_key', true);
			break;
	}
	
}

/* Contests META BOXES */
function prizesite_contests_add_meta_box() {
	add_meta_box( 'contests_livedate', 'Contest Live Date', 'prizesite_contests_livedate_callback', 'prizesite-contests' );
	add_meta_box( 'contests_enddate', 'Contest End Date', 'prizesite_contests_enddate_callback', 'prizesite-contests' );
	add_meta_box( 'contests_prizemoney', 'Prize Money', 'prizesite_contests_prizemoney_callback', 'prizesite-contests' );
	add_meta_box( 'contests_sharecount', 'Share Count', 'prizesite_contests_sharecount_callback', 'prizesite-contests' );
	add_meta_box( 'contests_winnerchosen', 'Winner Chosen', 'prizesite_contests_winnerchosen_callback', 'prizesite-contests' );
	add_meta_box( 'contests_winnerchosentext', 'Winner Chosen Text', 'prizesite_contests_winnerchosentext_callback', 'prizesite-contests' );
	add_meta_box( 'contests_claimalert', 'Claim Alert', 'prizesite_contests_claimalert_callback', 'prizesite-contests' );
	add_meta_box( 'contests_contestinstruction', 'Contest Instruction', 'prizesite_contests_contestinstruction_callback', 'prizesite-contests' );
}

function prizesite_contests_livedate_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_livedate_fields', 'prizesite_contests_livedate_meta_box_nonce' );

	$livedate_value = get_post_meta( $post->ID, '_contests_livedate_value_key', true );
	
	echo '<input type="date" id="prizesite_contests_livedate_field" name="prizesite_contests_livedate_field" value="' . esc_attr( $livedate_value ) . '" size="40" />';
}

function prizesite_contests_enddate_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_enddate_fields', 'prizesite_contests_enddate_meta_box_nonce' );

	$enddate_value = get_post_meta( $post->ID, '_contests_enddate_value_key', true );
	
	echo '<input type="date" id="prizesite_contests_enddate_field" name="prizesite_contests_enddate_field" value="' . esc_attr( $enddate_value ) . '" size="40" />';
}

function prizesite_contests_prizemoney_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_prizemoney_fields', 'prizesite_contests_prizemoney_meta_box_nonce' );

	$prize_value = get_post_meta( $post->ID, '_contests_prizemoney_value_key', true );
	
	echo '<input type="text" id="prizesite_contests_prizemoney_field" name="prizesite_contests_prizemoney_field" value="' . esc_attr( $prize_value ) . '" size="40" />';
}

function prizesite_contests_sharecount_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_sharecount_fields', 'prizesite_contests_sharecount_meta_box_nonce' );

	$sharecount_value = get_post_meta( $post->ID, '_contests_sharecount_value_key', true );
	
	echo '<input type="text" id="prizesite_contests_sharecount_field" name="prizesite_contests_sharecount_field" value="' . esc_attr( $sharecount_value ) . '" size="40" />';
}

function prizesite_contests_winnerchosen_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_winnerchosen_fields', 'prizesite_contests_winnerchosen_meta_box_nonce' );

	$chosen_value = get_post_meta( $post->ID, '_contests_winnerchosen_value_key', true );
	$checked = ( $chosen_value == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="prizesite_contests_winnerchosen_field" name="prizesite_contests_winnerchosen_field" value="1" '.$checked.' /></label>';
}

function prizesite_contests_winnerchosentext_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_winnerchosentext_fields', 'prizesite_contests_winnerchosentext_meta_box_nonce' );

	$chosentext_value = get_post_meta( $post->ID, '_contests_winnerchosentext_value_key', true );
	echo '<input type="text" id="prizesite_contests_winnerchosentext_field" name="prizesite_contests_winnerchosentext_field" value="' . esc_attr( $chosentext_value ) . '" size="100" />';
}

function prizesite_contests_claimalert_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_claimalert_fields', 'prizesite_contests_claimalert_meta_box_nonce' );

	$chosentext_value = get_post_meta( $post->ID, '_contests_claimalert_value_key', true );
	echo '<input type="text" id="prizesite_contests_claimalert_field" name="prizesite_contests_claimalert_field" value="' . esc_attr( $chosentext_value ) . '" size="100" />';
}

function prizesite_contests_contestinstruction_callback( $post ) {
	wp_nonce_field( 'bulk_save_contests_contestinstruction_fields', 'prizesite_contests_contestinstruction_meta_box_nonce' );

	$contestinstruction_value = get_post_meta( $post->ID, '_contests_contestinstruction_value_key', true );
	echo '<textarea id="prizesite_contests_contestinstruction_field" name="prizesite_contests_contestinstruction_field" class="form-control" rows="5" cols="105">' . esc_attr( $contestinstruction_value ) . '</textarea>';
}

function bulk_save_contests_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_contests_livedate_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_livedate_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_contests_livedate_field'] );
		update_post_meta( $post_id, '_contests_livedate_value_key', $data );
	}

	if( isset( $_POST['prizesite_contests_enddate_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_enddate_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_contests_enddate_field'] );
		update_post_meta( $post_id, '_contests_enddate_value_key', $data );
	}

	if( isset( $_POST['prizesite_contests_prizemoney_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_prizemoney_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_contests_prizemoney_field'] );
		update_post_meta( $post_id, '_contests_prizemoney_value_key', $data );
	}

	if( isset( $_POST['prizesite_contests_sharecount_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_sharecount_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_contests_sharecount_field'] );
		update_post_meta( $post_id, '_contests_sharecount_value_key', $data );
	}

	if( isset( $_POST['prizesite_contests_winnerchosentext_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_winnerchosentext_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_contests_winnerchosentext_field'] );
		update_post_meta( $post_id, '_contests_winnerchosentext_value_key', $data );
	}

	if( isset( $_POST['prizesite_contests_claimalert_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_claimalert_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_contests_claimalert_field'] );
		update_post_meta( $post_id, '_contests_claimalert_value_key', $data );
	}

	if( isset( $_POST['prizesite_contests_contestinstruction_meta_box_nonce'] ) && isset( $_POST['prizesite_contests_contestinstruction_field']) ) {
		$data = $_POST['prizesite_contests_contestinstruction_field'];
		update_post_meta( $post_id, '_contests_contestinstruction_value_key', $data );
	}

	update_post_meta( $post_id, '_contests_winnerchosen_value_key', $_POST['prizesite_contests_winnerchosen_field'] );
}

/*
=========================================================================================================
*/

/* Contest Comments CPT */

add_action( 'init', 'prizesite_comments_custom_post_type' );
add_filter( 'manage_prizesite-comments_posts_columns', 'prizesite_set_comments_columns' );
add_action( 'manage_prizesite-comments_posts_custom_column', 'prizesite_comments_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_comments_add_meta_box' );
add_action( 'save_post', 'bulk_save_comments_custom_fields', 10, 2);

function prizesite_comments_custom_post_type() {
	$labels = array(
		'name' 				=> 'Contest Comments',
		'singular_name' 	=> 'Contest Comment',
		'menu_name'			=> 'Contest Comments',
		'name_admin_bar'	=> 'Contest Comment'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 27,
		'menu_icon'			=> get_template_directory_uri() . '/img/comments.png',
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-comments', $args );
	
}

function prizesite_set_comments_columns( $columns ){
	$newColumns = array();
	$newColumns['commentid'] = 'Comment ID';
	$newColumns['title'] = 'Contest ID';
	$newColumns['commenttext'] = 'Comment';
	$newColumns['name'] = 'Name';
	$newColumns['PhoneNo'] = 'Phone Number';
	$newColumns['ipaddress'] = 'IP Address';
	$newColumns['userid'] = 'User Id';
	return $newColumns;
}
function prizesite_comments_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'commentid' :
			echo $post_id;
			break;
		case 'commenttext' :
			echo implode(" ", get_post_meta( $post_id, '_comments_commenttext_value_key'));
			break;
		case 'name' :
			echo get_post_meta( $post_id, '_comments_name_value_key', true);
			break;
		case 'PhoneNo' :
			echo get_post_meta( $post_id, '_comments_phoneno_value_key', true);
			break;
		case 'ipaddress' :
			echo get_post_meta( $post_id, '_comments_ipaddress_value_key', true);
			break;
		case 'userid' :
			echo get_post_meta( $post_id, '_comments_userid_value_key', true);
			break;
	}
	
}

/* Comments META BOXES */
function prizesite_comments_add_meta_box() {
	add_meta_box( 'comments_commenttext', 'Comment', 'prizesite_comments_commenttext_callback', 'prizesite-comments' );
	add_meta_box( 'comments_contesttitle', 'Contest Title', 'prizesite_comments_contesttitle_callback', 'prizesite-comments' );
	add_meta_box( 'comments_name', 'Name', 'prizesite_comments_name_callback', 'prizesite-comments' );
	add_meta_box( 'comments_phoneno', 'Phone Number', 'prizesite_comments_phoneno_callback', 'prizesite-comments' );
	add_meta_box( 'comments_city', 'City', 'prizesite_comments_city_callback', 'prizesite-comments' );
	add_meta_box( 'comments_ipaddress', 'IP Address', 'prizesite_comments_ipaddress_callback', 'prizesite-comments' );
	add_meta_box( 'comments_area', 'Area', 'prizesite_comments_area_callback', 'prizesite-comments' );
	add_meta_box( 'comments_userid', 'User Id', 'prizesite_comments_userid_callback', 'prizesite-comments' );
}

function prizesite_comments_commenttext_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_commenttext_fields', 'prizesite_comments_commenttext_meta_box_nonce' );

	$id_value = get_post_meta( $post->ID, '_comments_commenttext_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_commenttext_field" name="prizesite_comments_commenttext_field" value="' . esc_attr( $id_value ) . '" size="100" />';
}

function prizesite_comments_contesttitle_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_contesttitle_fields', 'prizesite_comments_contesttitle_meta_box_nonce' );

	$title_value = get_post_meta( $post->ID, '_comments_contesttitle_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_contesttitle_field" name="prizesite_comments_contesttitle_field" value="' . esc_attr( $title_value ) . '" size="40" />';
}

function prizesite_comments_name_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_name_fields', 'prizesite_comments_name_meta_box_nonce' );

	$name_value = get_post_meta( $post->ID, '_comments_name_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_name_field" name="prizesite_comments_name_field" value="' . esc_attr( $name_value ) . '" size="40" />';
}

function prizesite_comments_phoneno_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_phoneno_fields', 'prizesite_comments_phoneno_meta_box_nonce' );

	$phoneno_value = get_post_meta( $post->ID, '_comments_phoneno_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_phoneno_field" name="prizesite_comments_phoneno_field" value="' . esc_attr( $phoneno_value ) . '" size="40" />';
}

function prizesite_comments_city_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_city_fields', 'prizesite_comments_city_meta_box_nonce' );

	$city_value = get_post_meta( $post->ID, '_comments_city_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_city_field" name="prizesite_comments_city_field" value="' . esc_attr( $city_value ) . '" size="40" />';
}

function prizesite_comments_ipaddress_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_ipaddress_fields', 'prizesite_comments_ipaddress_meta_box_nonce' );

	$ipaddress_value = get_post_meta( $post->ID, '_comments_ipaddress_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_ipaddress_field" name="prizesite_comments_ipaddress_field" value="' . esc_attr( $ipaddress_value ) . '" size="40" />';
}

function prizesite_comments_area_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_area_fields', 'prizesite_comments_area_meta_box_nonce' );

	$area_value = get_post_meta( $post->ID, '_comments_area_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_area_field" name="prizesite_comments_area_field" value="' . esc_attr( $area_value ) . '" size="40" />';
}

function prizesite_comments_userid_callback( $post ) {
	wp_nonce_field( 'bulk_save_comments_userid_fields', 'prizesite_comments_userid_meta_box_nonce' );

	$userid_value = get_post_meta( $post->ID, '_comments_userid_value_key', true );
	
	echo '<input type="text" id="prizesite_comments_userid_field" name="prizesite_comments_userid_field" value="' . esc_attr( $userid_value ) . '" size="40" />';
}

function bulk_save_comments_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_comments_commenttext_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_commenttext_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_commenttext_field'] );
		update_post_meta( $post_id, '_comments_commenttext_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_contesttitle_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_contesttitle_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_contesttitle_field'] );
		update_post_meta( $post_id, '_comments_contesttitle_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_name_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_name_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_name_field'] );
		update_post_meta( $post_id, '_comments_name_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_phoneno_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_phoneno_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_phoneno_field'] );
		update_post_meta( $post_id, '_comments_phoneno_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_city_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_city_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_city_field'] );
		update_post_meta( $post_id, '_comments_city_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_ipaddress_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_ipaddress_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_ipaddress_field'] );
		update_post_meta( $post_id, '_comments_ipaddress_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_area_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_area_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_area_field'] );
		update_post_meta( $post_id, '_comments_area_value_key', $data );
	}

	if( isset( $_POST['prizesite_comments_userid_meta_box_nonce'] ) && isset( $_POST['prizesite_comments_userid_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_comments_userid_field'] );
		update_post_meta( $post_id, '_comments_userid_value_key', $data );
	}
}

/*
=========================================================================================================
*/

/* Contest Winners CPT */

add_action( 'init', 'prizesite_cwinners_custom_post_type' );
add_filter( 'manage_prizesite-cwinners_posts_columns', 'prizesite_set_cwinners_columns' );
add_action( 'manage_prizesite-cwinners_posts_custom_column', 'prizesite_cwinners_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_cwinners_add_meta_box' );
add_action( 'save_post', 'bulk_save_cwinners_custom_fields', 10, 2);

function prizesite_cwinners_custom_post_type() {
	$labels = array(
		'name' 				=> 'Contest Winners',
		'singular_name' 	=> 'Contest Winner',
		'menu_name'			=> 'Contest Winners',
		'name_admin_bar'	=> 'Contest Winner'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 27,
		'menu_icon'			=> get_template_directory_uri() . '/img/contest-winner.png',
		'supports'			=> array('title','editor')
	);
	
	register_post_type( 'prizesite-cwinners', $args );
	
}

function prizesite_set_cwinners_columns( $columns ){
	$newColumns = array();
	$newColumns['contestwinnerid'] = 'Contest Winner ID';
	$newColumns['title'] = 'Contest ID';
	$newColumns['commentid'] = 'Comment ID';
	$newColumns['PhoneNo'] = 'Phone Number';
	$newColumns['claimed'] = 'Claimed';
	$newColumns['userid'] = 'User Id';
	return $newColumns;
}

function prizesite_cwinners_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'contestwinnerid' :
			echo $post_id;
			break;
		case 'PhoneNo' :
			echo implode(" ", get_post_meta( $post_id, '_cwinners_phoneno_value_key'));
			break;
		case 'commentid' :
			echo implode(" ", get_post_meta( $post_id, '_cwinners_commentid_value_key'));
			break;
		case 'claimed' :
			$claimed_value = get_post_meta( $post_id, '_cwinners_claimed_value_key', true );
			$checked = ( $claimed_value == 1 ? 'Yes' : 'No' );
			echo $checked;
			break;
		case 'userid' :
			echo implode(" ", get_post_meta( $post_id, '_cwinners_userid_value_key'));
			break;
	}
	
}

/* Contest Winners META BOXES */
function prizesite_cwinners_add_meta_box() {
	add_meta_box( 'cwinners_commentid', 'Comment ID', 'prizesite_cwinners_commentid_callback', 'prizesite-cwinners' );
	add_meta_box( 'cwinners_comment', 'Comment', 'prizesite_cwinners_comment_callback', 'prizesite-cwinners' );
	add_meta_box( 'cwinners_phoneno', 'Phone Number', 'prizesite_cwinners_phoneno_callback', 'prizesite-cwinners' );
	add_meta_box( 'cwinners_contesttitle', 'Contest Title', 'prizesite_cwinners_contesttitle_callback', 'prizesite-cwinners' );
	add_meta_box( 'cwinners_claimed', 'Claimed', 'prizesite_cwinners_claimed_callback', 'prizesite-cwinners' );
	add_meta_box( 'cwinners_userid', 'User Id', 'prizesite_cwinners_userid_callback', 'prizesite-cwinners' );
}

function prizesite_cwinners_commentid_callback( $post ) {
	wp_nonce_field( 'bulk_save_cwinners_commentid_fields', 'prizesite_cwinners_commentid_meta_box_nonce' );

	$commentid_value = get_post_meta( $post->ID, '_cwinners_commentid_value_key', true );
	
	echo '<input type="text" id="prizesite_cwinners_commentid_field" name="prizesite_cwinners_commentid_field" value="' . esc_attr( $commentid_value ) . '" size="40" />';
}

function prizesite_cwinners_comment_callback( $post ) {
	wp_nonce_field( 'bulk_save_cwinners_comment_fields', 'prizesite_cwinners_comment_meta_box_nonce' );

	$comment_value = get_post_meta( $post->ID, '_cwinners_comment_value_key', true );
	
	echo '<input type="text" id="prizesite_cwinners_comment_field" name="prizesite_cwinners_comment_field" value="' . esc_attr( $comment_value ) . '" size="40" />';
}

function prizesite_cwinners_phoneno_callback( $post ) {
	wp_nonce_field( 'bulk_save_cwinners_phoneno_fields', 'prizesite_cwinners_phoneno_meta_box_nonce' );

	$phoneno_value = get_post_meta( $post->ID, '_cwinners_phoneno_value_key', true );
	
	echo '<input type="text" id="prizesite_cwinners_phoneno_field" name="prizesite_cwinners_phoneno_field" value="' . esc_attr( $contestid_value ) . '" size="40" />';
}

function prizesite_cwinners_contesttitle_callback( $post ) {
	wp_nonce_field( 'bulk_save_cwinners_contesttitle_fields', 'prizesite_cwinners_contesttitle_meta_box_nonce' );

	$contesttitle_value = get_post_meta( $post->ID, '_cwinners_contesttitle_value_key', true );
	
	echo '<input type="text" id="prizesite_cwinners_contesttitle_field" name="prizesite_cwinners_contesttitle_field" value="' . esc_attr( $contesttitle_value ) . '" size="40" />';
}

function prizesite_cwinners_claimed_callback( $post ) {
	wp_nonce_field( 'bulk_save_cwinners_claimed_fields', 'prizesite_cwinners_claimed_meta_box_nonce' );

	$claimed_value = get_post_meta( $post->ID, '_cwinners_claimed_value_key', true );
	$checked = ( $claimed_value == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="prizesite_cwinners_claimed_field" name="prizesite_cwinners_claimed_field" value="1" '.$checked.' /></label>';
}

function prizesite_cwinners_userid_callback( $post ) {
	wp_nonce_field( 'bulk_save_cwinners_userid_fields', 'prizesite_cwinners_userid_meta_box_nonce' );

	$userid_value = get_post_meta( $post->ID, '_cwinners_userid_value_key', true );
	
	echo '<input type="text" id="prizesite_cwinners_userid_field" name="prizesite_cwinners_userid_field" value="' . esc_attr( $userid_value ) . '" size="40" />';
}

function bulk_save_cwinners_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_cwinners_commentid_meta_box_nonce'] ) && isset( $_POST['prizesite_cwinners_commentid_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_cwinners_commentid_field'] );
		update_post_meta( $post_id, '_cwinners_commentid_value_key', $data );
	}

	if( isset( $_POST['prizesite_cwinners_comment_meta_box_nonce'] ) && isset( $_POST['prizesite_cwinners_comment_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_cwinners_comment_field'] );
		update_post_meta( $post_id, '_cwinners_comment_value_key', $data );
	}

	if( isset( $_POST['prizesite_cwinners_phoneno_meta_box_nonce'] ) && isset( $_POST['prizesite_cwinners_phoneno_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_cwinners_phoneno_field'] );
		update_post_meta( $post_id, '_cwinners_phoneno_value_key', $data );
	}

	if( isset( $_POST['prizesite_cwinners_contesttitle_meta_box_nonce'] ) && isset( $_POST['prizesite_cwinners_contesttitle_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_cwinners_contesttitle_field'] );
		update_post_meta( $post_id, '_cwinners_contesttitle_value_key', $data );
	}

	update_post_meta( $post_id, '_cwinners_claimed_value_key', $_POST['prizesite_cwinners_claimed_field'] );

	if( isset( $_POST['prizesite_cwinners_userid_meta_box_nonce'] ) && isset( $_POST['prizesite_cwinners_userid_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_cwinners_userid_field'] );
		update_post_meta( $post_id, '_cwinners_userid_value_key', $data );
	}
}

/*
=========================================================================================================
*/

/* MR Users CPT */

add_action( 'init', 'prizesite_mrusers_custom_post_type' );
add_filter( 'manage_prizesite-mrusers_posts_columns', 'prizesite_set_mrusers_columns' );
add_action( 'manage_prizesite-mrusers_posts_custom_column', 'prizesite_mrusers_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'prizesite_mrusers_add_meta_box' );
add_action( 'save_post', 'bulk_save_mrusers_custom_fields', 10, 2);

function prizesite_mrusers_custom_post_type() {
	$labels = array(
		'name' 				=> 'MR Users',
		'singular_name' 	=> 'MR User',
		'menu_name'			=> 'MR Users',
		'name_admin_bar'	=> 'MR User'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 27,
		'menu_icon'			=> get_template_directory_uri() . '/img/mr-user.png',
		'supports'			=> array('title')
	);
	
	register_post_type( 'prizesite-mrusers', $args );
	
}

function prizesite_set_mrusers_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'User Name';
	$newColumns['fname'] = 'First Name';
	$newColumns['lname'] = 'Last Name';
	$newColumns['phnumber'] = 'Phone Number';
	$newColumns['etzivisits'] = 'Etzi Visits';
	$newColumns['emailverified'] = 'Email Verified';
	return $newColumns;
}

function prizesite_mrusers_custom_column( $column, $post_id ){
	
	switch( $column ){
		case 'fname' :
			echo implode(" ", get_post_meta( $post_id, '_mrusers_fname_value_key'));
			break;
		case 'lname' :
			echo implode(" ", get_post_meta( $post_id, '_mrusers_lname_value_key'));
			break;
		case 'phnumber' :
			echo implode(" ", get_post_meta( $post_id, '_mrusers_phnumber_value_key'));
			break;
		case 'etzivisits' :
			echo implode(" ", get_post_meta( $post_id, '_mrusers_etzivisits_value_key'));
			break;
		case 'emailverified' :
			$emailverified_value = get_post_meta( $post_id, '_mrusers_emailverified_value_key', true );
			$checked = ( $emailverified_value == 1 ? 'Yes' : 'No' );
			echo $checked;
			break;
	}
	
}

/* MR Users META BOXES */
function prizesite_mrusers_add_meta_box() {
	add_meta_box( 'mrusers_fname', 'First Name', 'prizesite_mrusers_fname_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_lname', 'Last Name', 'prizesite_mrusers_lname_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_password', 'Password', 'prizesite_mrusers_password_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_phnumber', 'Phone Number', 'prizesite_mrusers_phnumber_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_etzicode', 'Etzi Code', 'prizesite_mrusers_etzicode_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_etzivisits', 'Etzi Visits', 'prizesite_mrusers_etzivisits_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_emailverified', 'Email Verified', 'prizesite_mrusers_emailverified_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_verificationcode', 'Verification Code', 'prizesite_mrusers_verificationcode_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_dailydraw', 'Enter Daily Draw', 'prizesite_mrusers_dailydraw_callback', 'prizesite-mrusers' );
	add_meta_box( 'mrusers_usertype', 'Client User', 'prizesite_mrusers_usertype_callback', 'prizesite-mrusers' );
}

function prizesite_mrusers_fname_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_fname_fields', 'prizesite_mrusers_fname_meta_box_nonce' );

	$fname_value = get_post_meta( $post->ID, '_mrusers_fname_value_key', true );
	
	echo '<input type="text" id="prizesite_mrusers_fname_field" name="prizesite_mrusers_fname_field" value="' . esc_attr( $fname_value ) . '" size="40" />';
}

function prizesite_mrusers_lname_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_lname_fields', 'prizesite_mrusers_lname_meta_box_nonce' );

	$lname_value = get_post_meta( $post->ID, '_mrusers_lname_value_key', true );
	
	echo '<input type="text" id="prizesite_mrusers_lname_field" name="prizesite_mrusers_lname_field" value="' . esc_attr( $lname_value ) . '" size="40" />';
}

function prizesite_mrusers_password_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_password_fields', 'prizesite_mrusers_password_meta_box_nonce' );

	$password_value = get_post_meta( $post->ID, '_mrusers_password_value_key', true );
	
	echo '<input type="password" id="prizesite_mrusers_password_field" name="prizesite_mrusers_password_field" value="' . esc_attr( $password_value ) . '" size="40" />';
}

function prizesite_mrusers_phnumber_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_phnumber_fields', 'prizesite_mrusers_phnumber_meta_box_nonce' );

	$phnumber_value = get_post_meta( $post->ID, '_mrusers_phnumber_value_key', true );
	
	echo '<input type="text" id="prizesite_mrusers_phnumber_field" name="prizesite_mrusers_phnumber_field" value="' . esc_attr( $phnumber_value ) . '" size="40" />';
}

function prizesite_mrusers_etzivisits_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_etzivisits_fields', 'prizesite_mrusers_etzivisits_meta_box_nonce' );

	$etzivisits_value = get_post_meta( $post->ID, '_mrusers_etzivisits_value_key', true );
	
	echo '<input type="text" id="prizesite_mrusers_etzivisits_field" name="prizesite_mrusers_etzivisits_field" value="' . esc_attr( $etzivisits_value ) . '" size="40" />';
}

function prizesite_mrusers_etzicode_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_etzicode_fields', 'prizesite_mrusers_etzicode_meta_box_nonce' );

	$etzicode_value = get_post_meta( $post->ID, '_mrusers_etzicode_value_key', true );
	if ( $etzicode_value != "" ) {
		echo '<img src="' . $etzicode_value . '" alt="Etzi Code" />';
	}
}

function prizesite_mrusers_emailverified_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_emailverified_fields', 'prizesite_mrusers_emailverified_meta_box_nonce' );

	$emailverified_value = get_post_meta( $post->ID, '_mrusers_emailverified_value_key', true );
	$checked = ( $emailverified_value == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="prizesite_mrusers_emailverified_field" name="prizesite_mrusers_emailverified_field" value="1" '.$checked.' /></label>';
}

function prizesite_mrusers_verificationcode_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_verificationcode_fields', 'prizesite_mrusers_verificationcode_meta_box_nonce' );

	$verificationcode_value = get_post_meta( $post->ID, '_mrusers_verificationcode_value_key', true );
	
	echo '<input readonly type="text" id="prizesite_mrusers_verificationcode_field" name="prizesite_mrusers_verificationcode_field" value="' . esc_attr( $verificationcode_value ) . '" size="40" />';
}

function prizesite_mrusers_dailydraw_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_dailydraw_fields', 'prizesite_mrusers_dailydraw_meta_box_nonce' );

	$dailydraw_value = get_post_meta( $post->ID, '_mrusers_dailydraw_value_key', true );
	$checked = ( $dailydraw_value == 1 ? 'checked' : '' );
	echo '<label><input readonly type="checkbox" id="prizesite_mrusers_dailydraw_field" name="prizesite_mrusers_dailydraw_field" value="1" '.$checked.' /></label>';
}

function prizesite_mrusers_usertype_callback( $post ) {
	wp_nonce_field( 'bulk_save_mrusers_usertype_fields', 'prizesite_mrusers_usertype_meta_box_nonce' );

	$usertype_value = get_post_meta( $post->ID, '_mrusers_usertype_value_key', true );
	$checked = ( $usertype_value == 1 ? 'checked' : '' );
	echo '<label><input readonly type="checkbox" id="prizesite_mrusers_usertype_field" name="prizesite_mrusers_usertype_field" value="1" '.$checked.' /></label>';
}

function bulk_save_mrusers_custom_fields( $post_id ) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if( isset( $_POST['prizesite_mrusers_fname_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_fname_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_fname_field'] );
		update_post_meta( $post_id, '_mrusers_fname_value_key', $data );
	}

	if( isset( $_POST['prizesite_mrusers_lname_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_lname_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_lname_field'] );
		update_post_meta( $post_id, '_mrusers_lname_value_key', $data );
	}

	if( isset( $_POST['prizesite_mrusers_password_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_password_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_password_field'] );
		update_post_meta( $post_id, '_mrusers_password_value_key', $data );
	}

	if( isset( $_POST['prizesite_mrusers_phnumber_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_phnumber_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_phnumber_field'] );
		update_post_meta( $post_id, '_mrusers_phnumber_value_key', $data );
	}

	if( isset( $_POST['prizesite_mrusers_etzicode_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_etzicode_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_etzicode_field'] );
		update_post_meta( $post_id, '_mrusers_etzicode_value_key', $data );
	}

	if( isset( $_POST['prizesite_mrusers_etzivisits_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_etzivisits_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_etzivisits_field'] );
		update_post_meta( $post_id, '_mrusers_etzivisits_value_key', $data );
	}

	if( isset( $_POST['prizesite_mrusers_verificationcode_meta_box_nonce'] ) && isset( $_POST['prizesite_mrusers_verificationcode_field']) ) {
		$data = sanitize_text_field( $_POST['prizesite_mrusers_verificationcode_field'] );
		update_post_meta( $post_id, '_mrusers_verificationcode_value_key', $data );
	}

	update_post_meta( $post_id, '_mrusers_emailverified_value_key', $_POST['prizesite_mrusers_emailverified_field'] );

	update_post_meta( $post_id, '_mrusers_dailydraw_value_key', $_POST['prizesite_mrusers_dailydraw_field'] );

	update_post_meta( $post_id, '_mrusers_usertype_value_key', $_POST['prizesite_mrusers_usertype_field'] );
}