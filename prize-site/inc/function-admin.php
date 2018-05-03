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
    add_submenu_page('shahzada_prizesite', 'Prizesite Home Options', 'Home', 'manage_options', 'shahzada_prizesite', 'prizesite_theme_create_page');
    add_submenu_page( 'shahzada_prizesite', 'Prizesite Theme Options', 'Theme Options', 'manage_options', 'shahzada_prizesite_theme', 'prizesite_theme_options_page' );

    //Activate Custom Settings
    add_action('admin_init', 'prizesite_custom_settings');
}

add_action('admin_menu', 'prizesite_add_admin_page');

function prizesite_theme_create_page() {
    //generation of our admin page
    require_once(get_template_directory() . '/inc/templates/prizesite-admin.php');
}

function prizesite_theme_options_page() {
    //generation of our admin page
    require_once(get_template_directory() . '/inc/templates/prizesite-theme-support.php');
}

//Populating Custom Settings
function prizesite_custom_settings() {
    //Register Field
    register_setting('prizesite-settings-group', 'homestories_main_description');
    register_setting('prizesite-settings-group', 'homestories1_image');
    register_setting('prizesite-settings-group', 'homestories1_heading');
    register_setting('prizesite-settings-group', 'homestories1_description');
    register_setting('prizesite-settings-group', 'homestories2_image');
    register_setting('prizesite-settings-group', 'homestories2_heading');
    register_setting('prizesite-settings-group', 'homestories2_description');
    register_setting('prizesite-settings-group', 'homebottomcontent_cover_image');
    register_setting('prizesite-settings-group', 'homebottomcontent_heading');
    register_setting('prizesite-settings-group', 'homebottomcontent_description');

    //Add settings section
    add_settings_section('prizesite-home-stories-options', 'Home Stories Options', 'prizesite_homestories_options', 'shahzada_prizesite');
    add_settings_section('prizesite-home-bottomcontent-options', 'Home Bottom Content Options', 'prizesite_bottomcontent_options', 'shahzada_prizesite');

    //Add field in the section
    add_settings_field('homestories-main_description', 'Home Stories Main Content', 'prizesite_homestories_main_description', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homestories1-image', 'Home Story 1 Image', 'prizesite_homestories1_image', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homestories1-heading', 'Home Story 1 Heading', 'prizesite_homestories1_heading', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homestories1-description', 'Home Story 1 Description', 'prizesite_homestories1_description', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homestories2-image', 'Home Story 2 Image', 'prizesite_homestories2_image', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homestories2-heading', 'Home Story 2 Heading', 'prizesite_homestories2_heading', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homestories2-description', 'Home Story 2 Description', 'prizesite_homestories2_description', 'shahzada_prizesite', 'prizesite-home-stories-options');
    add_settings_field('homebottomcontent-cover-image', 'Home Bottom Content Image', 'prizesite_homebottomcontent_image', 'shahzada_prizesite', 'prizesite-home-bottomcontent-options');
    add_settings_field('homebottomcontent-heading', 'Home Bottom Content Heading', 'prizesite_homebottomcontent_heading', 'shahzada_prizesite', 'prizesite-home-bottomcontent-options');
    add_settings_field('homebottomcontent-description', 'Home Bottom Content Description', 'prizesite_homebottomcontent_description', 'shahzada_prizesite', 'prizesite-home-bottomcontent-options');

    //Theme Support Options
	register_setting( 'prizesite-theme-support', 'prizesite_custom_header' );
	
	add_settings_section( 'prizesite-theme-options', 'Theme Options', 'prizesite_theme_options', 'shahzada_prizesite_theme' );
	
	add_settings_field( 'prizesite-custom-header', 'Custom Header', 'prizesite_custom_header_callback', 'shahzada_prizesite_theme', 'prizesite-theme-options' );
}

//Page Functions
function prizesite_homestories_options() {
    echo 'Customize your Home Stories content';
}
function prizesite_bottomcontent_options() {
    echo 'Customize your Home Bottom content';
}
function prizesite_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

//Theme Support Functions
function prizesite_custom_header_callback() {
	$options = get_option( 'prizesite_custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="prizesite_custom_header" name="prizesite_custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

//Home Page Options
function prizesite_homestories_main_description() {
    $hsMainDesc = esc_attr( get_option( 'homestories_main_description' ));
    echo '<textarea rows="6" class="regular-text" name="homestories_main_description" placeholder="Main Content">'.$hsMainDesc.'</textarea>';
}
function prizesite_homestories1_image() {
    $picture = esc_attr( get_option( 'homestories1_image' ) );
    if (empty($picture)) {
        $picture = get_template_directory_uri() . '/img/default-placeholder.png';
    }
    echo '<input type="button" class="button button-secondary" value="Upload" id="s1-upload-button"><input type="hidden" id="story1-picture" name="homestories1_image" value="'.$picture.'" />
    <br><br><img class="img-thumbnail" id="story1-picture-preview" style="width:200px;height:200px;" alt="Story Image" src="'.$picture.'" />';
}
function prizesite_homestories2_image() {
	$picture = esc_attr( get_option( 'homestories2_image' ) );
    if (empty($picture)) {
        $picture = get_template_directory_uri() . '/img/default-placeholder.png';
    }
    echo '<input type="button" class="button button-secondary" value="Upload" id="s2-upload-button"><input type="hidden" id="story2-picture" name="homestories2_image" value="'.$picture.'" />
    <br><br><img class="img-thumbnail" id="story2-picture-preview" style="width:200px;height:200px;" alt="Story Image" src="'.$picture.'" />';
}
function prizesite_homestories1_heading() {
    $homeStory1Heading = esc_attr( get_option( 'homestories1_heading' ));
    echo '<input type="text" class="regular-text" name="homestories1_heading" value="'.$homeStory1Heading.'" placeholder="Add Heading" />';
}
function prizesite_homestories2_heading() {
    $homeStory2Heading = esc_attr( get_option( 'homestories2_heading' ));
    echo '<input type="text" class="regular-text" name="homestories2_heading" value="'.$homeStory2Heading.'" placeholder="Add Heading" />';
}
function prizesite_homestories1_description() {
    $homeStory1Description= esc_attr( get_option( 'homestories1_description' ));
    echo '<textarea rows="6" class="regular-text" name="homestories1_description" placeholder="Description">'.$homeStory1Description.'</textarea>';
}
function prizesite_homestories2_description() {
    $homeStory2Description= esc_attr( get_option( 'homestories2_description' ));
    echo '<textarea rows="6" class="regular-text" name="homestories2_description" placeholder="Description">'.$homeStory2Description.'</textarea>';
}
function prizesite_homebottomcontent_heading() {
    $homeBottomContentHeading = esc_attr( get_option( 'homebottomcontent_heading' ));
    echo '<input type="text" class="regular-text" name="homebottomcontent_heading" value="'.$homeBottomContentHeading.'" placeholder="Add Heading" />';
}
function prizesite_homebottomcontent_description() {
    $homeBottomContentDescription= esc_attr( get_option( 'homebottomcontent_description' ));
    echo '<textarea rows="6" class="regular-text" name="homebottomcontent_description" placeholder="Description">'.$homeBottomContentDescription.'</textarea>';
}
function prizesite_homebottomcontent_image() {
	$picture = esc_attr( get_option( 'homebottomcontent_cover_image' ) );
    if (empty($picture)) {
        $picture = get_template_directory_uri() . '/img/default-placeholder.png';
    }
    echo '<input type="button" class="button button-secondary" value="Upload" id="bci-upload-button"><input type="hidden" id="bci-picture" name="homebottomcontent_cover_image" value="'.$picture.'" />
    <br><br><img class="img-thumbnail" id="bci-picture-preview" style="width:350px;height:200px;" alt="Bottom Content Image" src="'.$picture.'" />';
}
//Sanitization Settings
/*function prizesite_sanitize_twitter_handler( $input ) {
    $output = sanitize_text_field( $input );            //wp-builtin function
    $output = str_replace('@', '', $output);
    return $output;
}*/