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
    wp_enqueue_style( 'dataTables-bootstrap', get_template_directory_uri() . '/css/v1/dataTables.bootstrap4.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'prizesite', get_template_directory_uri() . '/css/prizesite.css', array(), '1.0.0', 'all' );
    //wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
    // New Design - Start
    wp_enqueue_style( 'Sans-Pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900' );
    wp_enqueue_style( 'Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900' );
    // New Design - End
    //wp_enqueue_style( 'prizesite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'prizesite-font-awesome-4.7.0', 'https://use.fontawesome.com/releases/v5.0.7/css/all.css' );
    wp_enqueue_style( 'prizesite-index', get_template_directory_uri() . '/css/index.css', array(), '1.0.0', 'all' );
    // New Design - Start
    wp_enqueue_style( 'prizesite-v1-index', get_template_directory_uri() . '/css/v1/index.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'prizesite-main', get_template_directory_uri() . '/css/main.css', array(), '3.0.3', 'all' );
    wp_enqueue_style( 'prizesite-eatzii-rewards', get_template_directory_uri() . '/css/v1/eatzii.css', array(), '1.0.0', 'all' );
    // New Design - End
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery-3.3.1.min.js', false, '3.3.1', true );
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script( 'jquery-dataTables', get_template_directory_uri() . '/js/v1/jquery.dataTables.min.js', array('jquery'), '1.10.19', true );
    wp_enqueue_script( 'dataTables-bootstrap', get_template_directory_uri() . '/js/v1/dataTables.bootstrap4.min.js', array('jquery'), '1.10.19', true );
    // New Design - Start
    wp_enqueue_script( 'jquery-main', get_template_directory_uri() . '/js/jquery.main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-plugin', get_template_directory_uri() . '/js/jquery.plugin.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.js', array('jquery'), '2.0.2', true );
    wp_enqueue_script( 'redirect-js', get_template_directory_uri() . '/js/v1/jquery.redirect.js', array('jquery'), '1.1.3', 'all' );
    
    // New Design - End
    wp_enqueue_script( 'prizesite-js', get_template_directory_uri() . '/js/prizesite.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'prizesite-v1-js', get_template_directory_uri() . '/js/v1/prizesite.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'faqs-js', get_template_directory_uri() . '/js/v1/faqs.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'ads-js', get_template_directory_uri() . '/js/v1/ads.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'contests-js', get_template_directory_uri() . '/js/v1/contests.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'jquery-qrcode-js', get_template_directory_uri() . '/js/v1/jquery-qrcode.js', array('jquery'), '0.17.0', 'all' );
    wp_enqueue_script( 'qrcode-js', get_template_directory_uri() . '/js/v1/qrcode.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'scanner-js', get_template_directory_uri() . '/js/v1/scanner.js', array('jquery'), '1.0.0', 'all' );
    wp_enqueue_script( 'muft-rewards-js', get_template_directory_uri() . '/js/v1/muft-rewards.js', array('jquery'), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'prizesite_load_scripts' );