<h1>Prizesite Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'prizesite-dailydraw-options' ); ?>
	<?php do_settings_sections( 'shahzada_prizesite_theme_dailydraw' ); ?>
	<?php submit_button(); ?>
</form>