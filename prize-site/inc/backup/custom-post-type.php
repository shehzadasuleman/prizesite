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
	//add_action( 'manage_prizesite-contact_posts_custom_column', 'prizesite_contact_custom_column', 10, 2 );
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
	//$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function prizesite_contact_custom_column( $column, $post_id ){
	
	switch( $column ){
			
		case 'email' :
			//email column
			echo 'email address';
			break;
	}
	
}

add_action( 'init', 'prizesite_winners_custom_post_type' );
add_filter( 'manage_prizesite-winners_posts_columns', 'prizesite_set_winners_columns' );

/* CONTACT CPT */
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
	//$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function prizesite_winners_custom_column( $column, $post_id ){
	
	switch( $column ){
			
		case 'email' :
			//email column
			echo 'email address';
			break;
	}
	
}