<?php

/*
	
@package prizesitetheme
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$header = get_option( 'prizesite_custom_header' );
if( @$header == 1 ){
	add_theme_support( 'custom-header' );
}

add_theme_support( 'post-thumbnails' );

/* Activate Nav Menu Option */
function prizesite_register_nav_menu() {
	register_nav_menu( 'primary', 'Prizesite Header Navigation Menu' );
}
function prizesite_register_term_menu() {
	register_nav_menu( 'secondary', 'Prizesite Terms Navigation Menu' );
}
add_action( 'after_setup_theme', 'prizesite_register_nav_menu' );
add_action( 'after_setup_theme', 'prizesite_register_term_menu' );

/*
	==================================
		BLOG LOOP CUSTOM FUNCTIONS
	==================================
*/
function prizesite_posted_meta() {
    return 'Category name and publishing time';
}
function prizesite_posted_footer() {
    return 'Tags List and comment link';
}