<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'kouki' ); ?></a>

	<div id="site-wrapper" class="wrapper m-top-bar">

	<header class="top-bar" role="banner" >

		<div class="tb-logo">

			<?php
			if ( has_custom_logo() ) :
				the_custom_logo();
			elseif ( of_get_option( 'kouki_logo' ) ) :
				$kouki_logo = of_get_option( 'kouki_logo' ); ?>
				<a href="<?php echo esc_url(home_url()); ?>" class="logo">
					<img src="<?php echo esc_url( $kouki_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php endif; ?>

			<?php if ( current_theme_supports( 'custom-header', 'header-text' ) ) : ?>
				<?php if ( display_header_text() ) { ?>
					<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>
			<?php else : ?>
				<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>

		</div>

		<div class="navigation-toggle-wrapper">
			<button class="primary-nav-trigger" href="javascript:void(0)" aria-label="<?php esc_attr_e( 'Open menu', 'kouki' ); ?>" aria-expanded="false" aria-controls="menu">
				<span class="menu-icon" aria-label="<?php esc_attr_e( 'Menu toggle icon', 'kouki' ); ?>" role="img"></span>
			</button>
			<nav id="menu" class="t-lightweight" role="navigation">
				<span class="menu-detail"></span>
				<ul>
					<?php wp_nav_menu( array(
						'theme_location' => 'main',
						'container'      => false,
						'items_wrap'     => '%3$s'
					) ); ?>
				</ul>
			</nav>
		</div>

	</header>

	<main id="main" role="main">
