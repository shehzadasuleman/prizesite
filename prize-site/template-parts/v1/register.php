<?php
/*
@package prizesitetheme
*/
$user = wp_get_current_user();
$ads_url_xml = get_template_directory_uri() . "/ads.xml";
$ads_slide_timer = get_option( 'prizesite_winners_ad_timer' );
?>
<?php 
    if ( $user->ID === 0 ) {
?>
<div id="register-top-desktop-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
    <?php
        $xml=new SimpleXMLElement( $ads_url_xml, 0, 1);
        $home_desktop_top_xml = $xml->xpath('/SiteAds/Register/Desktop/TopBanner');
        $top_desktop_counter = 0;
    ?>
    <!--Indicators -->
    <ol class="carousel-indicators">
        <?php while( $top_desktop_counter < count($home_desktop_top_xml) ) { ?>
                <li data-target="#home-top-desktop-carousel" data-slide-to="<?php echo $top_desktop_counter; ?>" class="<?php if( $top_desktop_counter == 0 ) { echo "active"; } ?>"></li>
        <?php $top_desktop_counter = $top_desktop_counter + 1; } ?>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php
            $top_desktop_counter = 0;
            foreach ($home_desktop_top_xml as $top_banner) { 
        ?>
                <div class="carousel-item <?php if( $top_desktop_counter == 0 ) { echo "active"; } ?>">
                    <a id="<?php echo $top_banner->LinkId; ?>" target="_blank" href="<?php echo $top_banner->TargetUrl; ?>"><img class="d-block w-100" src="<?php echo $top_banner->ImageUrl; ?>" alt="<?php echo $top_banner->ImageTitle; ?>"></a>
                </div>
        <?php $top_desktop_counter = $top_desktop_counter + 1; } ?>
    </div>
</div>
<div id="register-top-mobile-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
    <?php
        $xml=new SimpleXMLElement( $ads_url_xml, 0, 1);
        $home_mobile_top_xml = $xml->xpath('/SiteAds/Register/Mobile/TopBanner');
        $top_mobile_counter = 0;
    ?>
    <!--Indicators -->
    <ol class="carousel-indicators">
        <?php while( $top_mobile_counter < count($home_mobile_top_xml) ) { ?>
                <li data-target="#home-top-mobile-carousel" data-slide-to="<?php echo $top_mobile_counter; ?>" class="<?php if( $top_mobile_counter == 0 ) { echo "active"; } ?>"></li>
        <?php $top_mobile_counter = $top_mobile_counter + 1; } ?>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php
            $top_mobile_counter = 0;
            foreach ($home_mobile_top_xml as $top_banner) { 
        ?>
                <div class="carousel-item <?php if( $top_mobile_counter == 0 ) { echo "active"; } ?>">
                    <a id="<?php echo $top_banner->LinkId; ?>" target="_blank" href="<?php echo $top_banner->TargetUrl; ?>"><img class="d-block w-100" src="<?php echo $top_banner->ImageUrl; ?>" alt="<?php echo $top_banner->ImageTitle; ?>"></a>
                </div>
        <?php $top_mobile_counter = $top_mobile_counter + 1; } ?>
    </div>
</div>
<div id="register-form-title" class="row">
    <!--<div class="col-xl-4 col-lg-6 col-md-6 offset-xl-4 offset-lg-3 offset-md-3">-->
    <h3><?php the_title(); ?></h3>
    <!--</div>-->
</div>
<div id="user-registration-form">
    <?php the_content(); ?>
</div>
<?php
} else {
?>
    <script type="text/javascript">window.location = 'http://localhost/wordpress/v1';</script>
<?php } ?>