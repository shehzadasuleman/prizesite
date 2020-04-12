<?php
/*
@package prizesitetheme
*/
$current_uri=$_SERVER['REQUEST_URI'];
$url_components = parse_url($current_uri);
parse_str($url_components['query'], $params); 
$customercode = $params['customercode'];
$eatzii_logo_url = get_template_directory_uri() . "/img/eatzii/Eatzii-Logo-thumbnail.jpg";
$eatzii_reward0_url = get_template_directory_uri() . "/img/eatzii/Reset.jpg";
$eatzii_reward1_url = get_template_directory_uri() . "/img/eatzii/first-order.jpg";
$eatzii_reward2_url = get_template_directory_uri() . "/img/eatzii/second-order.jpg";
$eatzii_reward3_url = get_template_directory_uri() . "/img/eatzii/third-order.jpg";
$eatzii_reward4_url = get_template_directory_uri() . "/img/eatzii/fourth-order.jpg";
$eatzii_reward5_url = get_template_directory_uri() . "/img/eatzii/fifth-order.jpg";
$eatzii_reward6_url = get_template_directory_uri() . "/img/eatzii/sixth-order.jpg";
$eatzii_reward7_url = get_template_directory_uri() . "/img/eatzii/seventh-order.jpg";
$eatzii_reward8_url = get_template_directory_uri() . "/img/eatzii/eigth-order.jpg";
$eatzii_reward9_url = get_template_directory_uri() . "/img/eatzii/nineth-order.jpg";
$eatzii_reward10_url = get_template_directory_uri() . "/img/eatzii/tenth-order.jpg";
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
                    <?php if ( $orders == 0 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Order away and get free burgers on 5th and 10th order.</h6>
                        <img src="<?php echo $eatzii_reward0_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 0 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">We hope you enjoyed your Free Zinger Burger :) Your
                        card will be reset on the next order so you can get another free Street burger on just 5 more orders. Enjoy!</h6>
                        <img src="<?php echo $eatzii_reward10_url ?>" alt="" class="img-fluid">
                        <?php update_post_meta( $title_exists[0]->post_id, '_etzireward_orders_value_key', 0 ); ?>
                    <?php } elseif ( $orders % 10 === 1 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Great to see you getting started on your loyalty card. You are just 4 orders away from free Street Burger.</h6>
                        <img src="<?php echo $eatzii_reward1_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 2 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Thank you for your custom! You are just 3 orders away from free Street Burger.</h6>
                        <img src="<?php echo $eatzii_reward2_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 3 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Amazing! You are now just 2 orders away from free Street Burger.</h6>
                        <img src="<?php echo $eatzii_reward3_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 4 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Almost there! One your next order get a Free Street Burger on us :)</h6>
                        <img src="<?php echo $eatzii_reward4_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 5 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">We hope you enjoyed your Free Street Burger :) Now you are on your way to get Free Zinger after just 5 more orders.</h6>
                        <img src="<?php echo $eatzii_reward5_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 6 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">We appreciate your loyalty and custom! Thank you! Just 4 more orders for your free Zinger.</h6>
                        <img src="<?php echo $eatzii_reward6_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 7 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Amazing! You are now just 3 orders away from free Zinger Burger.</h6>
                        <img src="<?php echo $eatzii_reward7_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 8 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Thank you for your custom! You are just 2 orders away from free Zinger.</h6>
                        <img src="<?php echo $eatzii_reward8_url ?>" alt="" class="img-fluid">
                    <?php } elseif ( $orders % 10 === 9 ) { ?>
                        <h6 class="font-weight-normal text-muted pb-3">Almost there! One your next order get a Free Zinger on us :)</h6>
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
                <p class="text-muted m-0">Call Now for Delivery: <a style="text-decoration: underline; font-weight: bold;" href="tel:03204717764">0320-4717764</a></p>
                <p class="text-muted m-0">Menu: <a style="text-decoration: underline; font-weight: bold;" download="eatzii-menu.jpg" href="http://uat.muftpaise.com/wp-content/themes/prize-site/img/eatzii/full-menu.jpg">Click here to download</a></p><br/>
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