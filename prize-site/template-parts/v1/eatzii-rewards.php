<?php
/*
@package prizesitetheme
*/
$current_uri=$_SERVER['REQUEST_URI'];
$url_components = parse_url($current_uri);
parse_str($url_components['query'], $params); 
$customercode = $params['customercode'];
$eatzii_logo_url = get_template_directory_uri() . "/img/eatzii/Eatzii-Logo-thumbnail.jpg";
$eatzii_reward1_url = get_template_directory_uri() . "/img/eatzii/reward1.jpg";
$eatzii_reward2_url = get_template_directory_uri() . "/img/eatzii/reward2.jpg";
$eatzii_reward3_url = get_template_directory_uri() . "/img/eatzii/reward3.jpg";
$eatzii_reward4_url = get_template_directory_uri() . "/img/eatzii/reward4.jpg";
$eatzii_reward5_url = get_template_directory_uri() . "/img/eatzii/reward5.jpg";
$eatzii_reward6_url = get_template_directory_uri() . "/img/eatzii/reward6.jpg";
$eatzii_reward7_url = get_template_directory_uri() . "/img/eatzii/reward7.jpg";
$eatzii_reward8_url = get_template_directory_uri() . "/img/eatzii/reward8.jpg";
$eatzii_reward9_url = get_template_directory_uri() . "/img/eatzii/reward9.jpg";
$eatzii_reward10_url = get_template_directory_uri() . "/img/eatzii/reward10.jpg";
?>
<img src="<?php echo $eatzii_logo_url ?>" alt="">
<div id="eatzi-rewards-section">
    <div class="banner" >
        <div class="container"><br/>
            <?php 
                $title_exists = $wpdb->get_results( $wpdb->prepare(
                    "
                    SELECT *
                    FROM wp_postmeta
                    WHERE  
                    meta_key = '" . "_etzireward_customercode_value_key" . "'
                    AND
                    meta_value = '" . $customercode .  "'
                    "
                ));
                if( count($title_exists) > 0 ) {
                    $customer_name = get_post_meta($title_exists[0]->post_id,'_etzireward_firstname_value_key',true);
                    $orders = get_post_meta($title_exists[0]->post_id,'_etzireward_orders_value_key',true);
            ?>
                    <h1 class="font-weight-semibold">Hi <?php echo $customer_name; ?>..</h1>
                    <?php if ( $orders % 10 === 0 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Congratulation! You have won a free Meal on us!</h6>
                        <img src="<?php echo $eatzii_reward10_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 1 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 4 more orders for a free Burger on us!</h6>
                        <img src="<?php echo $eatzii_reward1_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 2 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 3 more orders for a free Burger on us!</h6>
                        <img src="<?php echo $eatzii_reward2_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 3 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 2 more orders for a free Burger on us!</h6>
                        <img src="<?php echo $eatzii_reward3_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 4 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 1 more orders for a free Burger on us!</h6>
                        <img src="<?php echo $eatzii_reward4_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 5 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Congratulation! You have won a free Burger on us!</h6>
                        <img src="<?php echo $eatzii_reward5_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 6 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 4 more orders for a free Meal on us!</h6>
                        <img src="<?php echo $eatzii_reward6_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 7 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 3 more orders for a free Meal on us!</h6>
                        <img src="<?php echo $eatzii_reward7_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 8 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 2 more orders for a free Meal on us!</h6>
                        <img src="<?php echo $eatzii_reward8_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 9 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Just make 1 more orders for a free Meal on us!</h6>
                        <img src="<?php echo $eatzii_reward9_url ?>" alt="" class="img-fluid">
                    <?php } ?>
            <?php } else { ?>
                <h1 class="font-weight-semibold">No such customer code exists</h1>
            <?php } ?>
        </div>
    </div>
    <br/><br/>
    <section class="contact-details" id="contact-details-section">
        <div class="row text-center">
            <div class="col-12 col-md-12 col-lg-12 grid-margin">
                <h5 class="pb-2">Our Details</h5>
                <p class="text-muted m-0">Timings: 3:00 pm till 1:00 am</p>
                <p class="text-muted m-0">Call Now for Delivery: 0320-4717764</p>
                <p class="text-muted">43 Alamgir Road<br> near Krishan Nagar Bazar<br> Lahore, Pakistan</p>
                <div class="d-flex justify-content-center">
                    <a href="https://www.facebook.com/eatziifoods/" target="_blank"><i class="fab fa-facebook-f mdi"></i></a>
                </div>
            </div>
        </div>  
    </section>
    <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2020<a href="https://www.facebook.com/eatziifoods/" class="px-1">Eatzii.</a>All rights reserved.</p>
    </footer>
</div>