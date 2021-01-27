<?php

/*----------------------------------------------------------------------------*/
/* Kouki back compat functionality
/*----------------------------------------------------------------------------*/

/**
 * Prevents switching to this theme on old versions of WordPress.
 * Switches to the default theme.
 */
function kouki_switch_theme() {switch_theme( WP_DEFAULT_THEME );unset( $_GET['activated'] );
	add_action( 'admin_notices', 'kouki_upgrade_notice' );
}
add_action( 'after_switch_theme', 'kouki_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 */
function kouki_upgrade_notice() {
	$message = sprintf( __( 'Theme requires at least WordPress version 4.5. You are running version %s. Please upgrade and try again.', 'kouki' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.5.
 */
function kouki_customize() {
	wp_die( sprintf( __( 'Theme requires at least WordPress version 4.5. You are running version %s. Please upgrade and try again.', 'kouki' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'kouki_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.5.
 */
function kouki_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Theme requires at least WordPress version 4.5. You are running version %s. Please upgrade and try again.', 'kouki' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'kouki_preview' );
