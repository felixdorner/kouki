<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

	<title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php $logo_font = of_get_option('kouki_logo_font'); ?>
	<?php if ($logo_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($logo_font)); ?>:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic" />
	<?php endif; ?>

	<?php $primary_font = of_get_option('kouki_primary_font'); ?>
	<?php if ($primary_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($primary_font)); ?>:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic" />
	<?php endif; ?>

	<?php $secondary_font = of_get_option('kouki_secondary_font'); ?>
	<?php if ($secondary_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($secondary_font)); ?>:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic" />
	<?php endif; ?>

	<?php if (of_get_option( 'kouki_favicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo of_get_option( 'kouki_favicon' ); ?>" />
	<?php endif; ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class( 'boxed' ); ?>>

	<div class="wrapper m-top-bar fade">

	<header class="top-bar">

		<div class="tb-logo">

			<?php
			/**
			 * Check if there are uploaded logos.
			 */
			$logo = of_get_option( 'kouki_logo' );			
			if( $logo ) : ?>

				<a href="<?php echo home_url(); ?>" class="logo">
					<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>

				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>

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
