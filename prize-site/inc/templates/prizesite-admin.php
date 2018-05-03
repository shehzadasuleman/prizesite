<h1>Prize Site Home Options</h1>
<?php settings_errors(); ?>
<?php
    /*
    $firstName = esc_attr( get_option( 'first_name' ));
    $lastName = esc_attr( get_option( 'last_name' ));
    $fullname = $firstName . ' ' . $lastName;
    $userDescription = esc_attr( get_option( 'user_description' ));
    */
?>
<form method="post" action="options.php" class="prizesite-general-form">
    <?php settings_fields('prizesite-settings-group'); ?>
    <?php do_settings_sections('shahzada_prizesite'); ?>
    <?php submit_button();?>
</form>