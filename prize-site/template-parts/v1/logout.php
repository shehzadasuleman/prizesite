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
<div id="signin-form-title" class="row">
    <!--<div class="col-xl-4 col-lg-6 col-md-6 offset-xl-4 offset-lg-3 offset-md-3">-->
        <h3><?php the_title(); ?></h3>
    <!--</div>-->
</div>
<?php
} else {
?>
    <script type="text/javascript">window.location = 'http://localhost/wordpress/v1';</script>
<?php } ?>