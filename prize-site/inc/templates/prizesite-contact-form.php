<h1>Prizesite Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'prizesite-contact-options' ); ?>
	<?php do_settings_sections( 'shahzada_prizesite_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>