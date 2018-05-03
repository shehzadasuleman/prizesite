<h1>Prize Site Theme Support</h1>
<?php settings_errors(); ?>
<?php
    /*
    $userDescription = esc_attr( get_option( 'user_description' ));
    */
?>
<form method="post" action="options.php" class="prizesite-general-form">
    <?php settings_fields('prizesite-theme-support'); ?>
    <?php do_settings_sections('shahzada_prizesite_theme'); ?>
    <?php submit_button();?>
</form>