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
			$kouki_logo = of_get_option( 'kouki_logo' );			
			if( $kouki_logo ) : ?>
				<a href="<?php echo esc_url(home_url()); ?>" class="logo">
					<img src="<?php echo esc_url( $kouki_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>				
			<?php else : ?>
				<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
		</div>

		<div class="navigation-toggle-wrapper">			
			<a class="primary-nav-trigger" href="javascript:void(0)">
				<span class="menu-icon"></span>
			</a>	
			<nav id="menu" class="t-lightweight">
				<span class="menu-detail"></span>
				<ul>
					<?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
		</div>

	</header>
