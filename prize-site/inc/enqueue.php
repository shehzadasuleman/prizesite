<?php
/*
@package prizesite
    ==========================
     ADMIN ENQUEUE FUNCTIONS
    ==========================
*/

function prizesite_load_admin_scripts( $hook ) {

    if('toplevel_page_shahzada_prizesite' != $hook) {
        return;
    }
    wp_register_style( 'prizesite_admin',get_template_directory_uri().'/css/prizesite.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style( 'prizesite_admin' );

    wp_enqueue_media();
    
    wp_register_script( 'prizesite-admin-script', get_template_directory_uri() . '/js/prizesite.admin.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'prizesite-admin-script' );
}

add_action('admin_enqueue_scripts', 'prizesite_load_admin_scripts');

/*
@package prizesite
    ==============================
      FRONTEND ENQUEUE FUNCTIONS
    ==============================
*/

function prizesite_load_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0', 'all' );
    wp_enqueue_style( 'prizesite', get_template_directory_uri() . '/css/prizesite.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
    wp_enqueue_style( 'prizesite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'prizesite-index', get_template_directory_uri() . '/css/index.css', array(), '1.0.0', 'all' );

	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery-3.3.1.min.js', false, '3.3.1', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script( 'prizesite-js', get_template_directory_uri() . '/js/prizesite.js', array('jquery'), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'prizesite_load_scripts' );