<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kouki
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="site-wrapper" class="wrapper m-top-bar">

	<header class="top-bar">

		<div class="tb-logo">
			<?php
			/**
			 * Check if there is a uploaded logo
			 */
			$logo = of_get_option( 'kouki_logo' );			
			if( $logo ) : ?>
				<a href="<?php echo home_url(); ?>" class="logo">
					<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>				
			<?php else : ?>
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
		</div>

		<div class="navigation-toggle-wrapper">
			<a href="#menu" id="toggle"><span></span></a>
			<nav id="menu" class="t-lightweight" role="navigation">
				<ul>
					<?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
		</div>

	</header>
