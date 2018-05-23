<?php
    /*
        This is the template for the header

        @package sunsettheme
    */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title>Prize Site</title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?> >
<?php 
    $logo_url = get_template_directory_uri() . '/img/logo.png';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-faded background-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a><img src="<?php print $logo_url ?>" class="logo" alt="Site Design"/></a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-content">   
            <?php
				wp_nav_menu( array(
				    'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'nav navbar-nav'
				) );
			?>
        </div>
</nav>