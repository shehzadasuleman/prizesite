<?php
/*
@package prizesitetheme
*/
$user = wp_get_current_user();
?>
<?php 
    if ( $user->ID === 0 ) {
?>
    <div id="signin-form-title" class="row">
        <!--<div class="col-xl-4 col-lg-6 col-md-6 offset-xl-4 offset-lg-3 offset-md-3">-->
            <h3><?php the_title(); ?></h3>
        <!--</div>-->
    </div>
    <div id="user-signin-form">
        <?php the_content(); ?>
    </div>
<?php
} else {
?>
    <div id="register-form-title" class="row">
        <!--<div class="col-xl-4 col-lg-6 col-md-6 offset-xl-4 offset-lg-3 offset-md-3">-->
        <h3>You are already logged in</h3>
        <!--</div>-->
    </div>
<?php } ?>