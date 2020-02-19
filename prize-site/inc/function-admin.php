<?php
/*
@package prizesite
    ==========================
        ADMIN PAGE
    ==========================
*/

function prizesite_add_admin_page() {

    //Generate prizesite Admin Page
     add_menu_page( 'prizesite Theme Options', 'prizesite', 'manage_options', 'shahzada_prizesite',  'prizesite_theme_create_page', get_template_directory_uri() . '/img/prizesite-icon.png', 110 );

    //Generate prizesite Admin Sub Pages
    add_submenu_page( 'shahzada_prizesite', 'Prizesite Theme Options', 'Theme Options', 'manage_options', 'shahzada_prizesite', 'prizesite_theme_create_page' );
    add_submenu_page( 'shahzada_prizesite', 'Prizesite Contact Form', 'Contact Form', 'manage_options', 'shahzada_prizesite_theme_contact', 'prizesite_contact_form_page' );
    add_submenu_page( 'shahzada_prizesite', 'Prizesite Daily Draw Options', 'Daily Draw Options', 'manage_options', 'shahzada_prizesite_theme_dailydraw', 'prizesite_dailydraw_form_page' );

    //Activate Custom Settings
    add_action('admin_init', 'prizesite_custom_settings');
}

add_action('admin_menu', 'prizesite_add_admin_page');

function prizesite_theme_create_page() {
    //generation of our admin page
    require_once(get_template_directory() . '/inc/templates/prizesite-theme-support.php');
}

function prizesite_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/prizesite-contact-form.php' );
}

function prizesite_dailydraw_form_page() {
	require_once( get_template_directory() . '/inc/templates/prizesite-dailydraw-options.php' );
}

//Populating Custom Settings
function prizesite_custom_settings() {
    //Register Field

    //Theme Support Options
    register_setting( 'prizesite-theme-support', 'prizesite_custom_header' );
    register_setting( 'prizesite-theme-support', 'prizesite_custom_filter_error_meesgae' );
    register_setting( 'prizesite-theme-support', 'prizesite_onhold_notification_enabler' );
    register_setting( 'prizesite-theme-support', 'prizesite_onhold_notification' );
    register_setting( 'prizesite-theme-support', 'prizesite_onhold_page_enabler' );
    register_setting( 'prizesite-theme-support', 'prizesite_past_winners_date' );
    register_setting( 'prizesite-theme-support', 'prizesite_winners_ad_timer' );
    register_setting( 'prizesite-theme-support', 'prizesite_dailydraw_message' );
	
	add_settings_section( 'prizesite-theme-options', 'Theme Options', 'prizesite_theme_options', 'shahzada_prizesite_theme' );
	
	add_settings_field( 'prizesite-custom-header', 'Custom Header', 'prizesite_custom_header_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-custom-filter-error-message', 'Custom Filteration Error Message', 'prizesite_custom_filter_error_message_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-onhold-notification-enabler', 'Enable On-hold Notification', 'prizesite_onhold_notification_enabler_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-onhold-notification', 'On-hold Notification Message', 'prizesite_onhold_notification_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-onhold-page-enabler', 'Enable On-hold Page', 'prizesite_onhold_page_enabler_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-past-winners-date', 'Past Winners Cut-off Date', 'prizesite_past_winners_date_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-winners-ad-timer', 'Winners Ads Timer', 'prizesite_winners_ad_timer_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
    add_settings_field( 'prizesite-dailydraw-message', 'Daily Draw Message', 'prizesite_dailydraw_message_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );

    //Contact Form Options
	register_setting( 'prizesite-contact-options', 'ps_activate_contact' );
	
	add_settings_section( 'prizesite-contact-section', 'Contact Form', 'prizesite_contact_section', 'shahzada_prizesite_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'prizesite_activate_contact', 'shahzada_prizesite_theme_contact', 'prizesite-contact-section' );

    // Daily Draw Options
    register_setting( 'prizesite-dailydraw-options', 'prizesite_next_draw_message' );
    register_setting( 'prizesite-dailydraw-options', 'prizesite_current_draw_prize' );
    register_setting( 'prizesite-dailydraw-options', 'prizesite_check_ad_timer' );

    add_settings_section( 'prizesite-dailydraw-options', 'Draw Options', 'prizesite_dailydraw_options', 'shahzada_prizesite_theme_dailydraw' );

    add_settings_field( 'prizesite-check-adtimer', 'Check Ad Timer', 'prizesite_check_adtimer_callback', 'shahzada_prizesite_theme_dailydraw', 'prizesite-dailydraw-options' );
    add_settings_field( 'prizesite-nextdraw-message', 'Next Draw Message', 'prizesite_next_draw_message_callback', 'shahzada_prizesite_theme_dailydraw', 'prizesite-dailydraw-options' );
    add_settings_field( 'prizesite-currentdraw-prize', 'Current Draw Prize', 'prizesite_current_draw_prize_callback', 'shahzada_prizesite_theme_dailydraw', 'prizesite-dailydraw-options' );
}

//Page Functions
function prizesite_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}
function prizesite_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}
function prizesite_dailydraw_options() {
	echo 'Activate and Deactivate specific Daily Draw Options';
}

//Theme Support Functions
function prizesite_custom_header_callback() {
	$options = get_option( 'prizesite_custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="prizesite_custom_header" name="prizesite_custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}
function prizesite_activate_contact() {
	$options = get_option( 'ps_activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="ps_activate_contact" value="1" '.$checked.' /></label>';
}

function prizesite_custom_filter_error_message_callback() {
    $error_message = esc_attr(get_option('prizesite_custom_filter_error_meesgae'));
    echo '<input type="text" value="'.$error_message.'" id="prizesite_custom_filter_error_meesgae" name="prizesite_custom_filter_error_meesgae" style="width:400px;"/>';
}

function prizesite_onhold_notification_enabler_callback() {
	$options = get_option( 'prizesite_onhold_notification_enabler' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="onhold_notification_enabler" name="prizesite_onhold_notification_enabler" value="1" '.$checked.' /></label>';
}

function prizesite_onhold_notification_callback() {
    $message = esc_attr(get_option('prizesite_onhold_notification'));
    echo '<textarea id="prizesite_onhold_notification" name="prizesite_onhold_notification" rows="4" cols="50">'.$message.'</textarea>';
}

function prizesite_onhold_page_enabler_callback() {
	$options = get_option( 'prizesite_onhold_page_enabler' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="onhold_page_enabler" name="prizesite_onhold_page_enabler" value="1" '.$checked.' /></label>';
}

function prizesite_past_winners_date_callback() {
    $date = get_option( 'prizesite_past_winners_date' );
    echo '<input type="date" id="prizesite_past_winners_date" name="prizesite_past_winners_date" value="' . esc_attr( $date ) . '" size="40" />';
}

function prizesite_winners_ad_timer_callback() {
    $timer = get_option( 'prizesite_winners_ad_timer' );
    echo '<input type="number" id="prizesite_winners_ad_timer" name="prizesite_winners_ad_timer" value="' . esc_attr( $timer ) . '" size="40" />msec<br>';
    echo '<label>1000 msec= 1 sec</label>';
}

function prizesite_dailydraw_message_callback() {
    $message = esc_attr(get_option('prizesite_dailydraw_message'));
    echo '<textarea id="prizesite_dailydraw_message" name="prizesite_dailydraw_message" rows="4" cols="50">'.$message.'</textarea>';
}

function prizesite_check_adtimer_callback() {
    $ad_timer = esc_attr(get_option('prizesite_check_ad_timer'));
    echo '<input type="number" id="prizesite_check_ad_timer" name="prizesite_check_ad_timer" value="' . esc_attr( $ad_timer ) . '" size="40" />msec<br>';
    echo '<label>1000 msec= 1 sec</label>';
}

function prizesite_next_draw_message_callback() {
    $next_message = esc_attr(get_option('prizesite_next_draw_message'));
    echo '<textarea id="prizesite_next_draw_message" name="prizesite_next_draw_message" rows="4" cols="50">'.$next_message.'</textarea>';
}

function prizesite_current_draw_prize_callback() {
    $prize_amount = esc_attr(get_option('prizesite_current_draw_prize'));
    echo '<input type="text" value="'.$prize_amount.'" id="prizesite_current_draw_prize" name="prizesite_current_draw_prize" style="width:330px;"/>';
}