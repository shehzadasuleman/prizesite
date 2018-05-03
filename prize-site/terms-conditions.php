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
<div>
    <div class="col-lg-12 col-xs-12 col-centered main-content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 actual-content">
                <h1 class="site-description"><?php bloginfo( 'description' ) ?></h1>
                <h2 class="site-title"><?php bloginfo( 'name' ) ?></h2>
            </div>
            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2 user-info-content" >
                <div class="row">
                    <div class="col-xl-6 offset-xl-2 col-lg-6 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-10 offset-1 input-content-mobile">
                        <label for="ex2">Your Mobile Number</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-xl-4 offset-xl-0 col-lg-4 offset-lg-0 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-1 user-info-button">
                        <button type="button" class="btn btn-primary btn-md">Start Winning</button>
                    </div>
                </div>
                <div class="row">
                    <div class="custom-control custom-checkbox user-info-chkbox terms-conditions col-xl-8 offset-xl-2 col-lg-9 offset-lg-2 col-md-9 offset-md-2 col-sm-9 offset-sm-2 col-11 offset-1">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1"></label><a href="terms-conditions.html">I agree to terms and conditions. Don't worry, we will never share your details.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clients-content">
        <div class="row top-content">
            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
                <h2><?php print $hsMainDesc; ?></h2>
            </div>
        </div>
        <div class="row middle-content">
            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-10 offset-1">
                <div class="row">
                    <div class="col-lg-6 each-content">
                        <div class="row heading">
                            <div class="col-lg-4 col-md-4 col-sm-4 offset-sm-1 col-4 heading-img">
                                <img alt="img-post-1" class="img-thumbnail" src="<?php print $s1_picture ?>"/>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 heading-data">
                                <h2><?php print $homeStory1Heading ?></h2>
                                <p><?php print $homeStory1Description ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 each-content">
                        <div class="row heading">
                            <div class="col-lg-4 col-md-4 col-sm-4 offset-sm-1 col-4 heading-img">
                                <img alt="img-post-2" class="img-thumbnail" src="<?php print $s2_picture ?>"/>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 heading-data">
                                <h2><?php print $homeStory2Heading ?></h2>
                                <p><?php print $homeStory2Description ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bottom-content">
            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                        <h1><?php print $homeBottomContentHeading ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
                <div class="row">
                    <div class="col-lg-12 offset-lg-0 col-md-12 offset-md-0">
                        <h3><?php print $homeBottomContentDescription ?></h3>
                    </div>
                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                        <img alt="img-content-cover" class="img-thumbnail" src="<?php print $bci_picture ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>