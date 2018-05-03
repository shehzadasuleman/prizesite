<?php get_header(); ?>
<?php 
    $hsMainDesc = esc_attr( get_option( 'homestories_main_description' ));
    $s1_picture = esc_attr( get_option( 'homestories1_image' ) );
    $s2_picture = esc_attr( get_option( 'homestories2_image' ) );
    $homeStory1Heading = esc_attr( get_option( 'homestories1_heading' ));
    $homeStory2Heading = esc_attr( get_option( 'homestories2_heading' ));
    $homeStory1Description= esc_attr( get_option( 'homestories1_description' ));
    $homeStory2Description= esc_attr( get_option( 'homestories2_description' ));
    $homeBottomContentHeading = esc_attr( get_option( 'homebottomcontent_heading' ));
    $homeBottomContentDescription= esc_attr( get_option( 'homebottomcontent_description' ));
    $bci_picture = esc_attr( get_option( 'homebottomcontent_cover_image' ) );
?>
<?php get_footer(); ?>