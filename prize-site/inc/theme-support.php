<?php

/*
	
@package prizesitetheme
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$header = get_option( 'custom_header' );
if( @$header == 1 ){
	add_theme_support( 'custom-header' );
}
/* Activate Nav Menu Option */
function prizesite_register_nav_menu() {
	register_nav_menu( 'primary', 'Prizesite Header Navigation Menu' );
}
add_action( 'after_setup_theme', 'prizesite_register_nav_menu' );