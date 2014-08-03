<?php
/**
 * The Header for our theme
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */
// Set features
$features = array();
?><!DOCTYPE html >
<!--[if lt IE 7]>      <html ng-app="marioaguiar" class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html ng-app="marioaguiar" class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html ng-app="marioaguiar" class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			<?php
				if ( is_front_page() )
					_e('Portfolio of Front-End, WordPress and Drupal Developer Mario Aguiar.');
				else
					wp_title( '::', true, 'right' ) . _e('Front-End, WordPress and Drupal Developer Mario Aguiar.');
			?>
		</title>
		<meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<?php wp_head(); ?>
	</head>
	<?php
		// Set features
		if ( is_home() )
			$features[] = 'zebra';
		elseif ( is_single() )
			$features[] = 'code';

		$features = implode(" ", $features);
	?>
	<body data-features="<?php echo $features; ?>" <?php body_class(); ?> ng-class="bodyClass">

		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

		<div id="top">
			<h1 class="screenReader"><?php bloginfo( 'name' ); ?></h1>

			<?php wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'container' => 'nav',
						'container_id' => 'menu',
					)
				);
			?>
		</div>
