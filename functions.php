<?php

/*----------------------------------------------------------------------------*/
/* Theme works in WordPress 4.5 or later.
/*----------------------------------------------------------------------------*/

if ( version_compare( $GLOBALS['wp_version'], '4.5', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/*----------------------------------------------------------------------------*/
/* Setup
/*----------------------------------------------------------------------------*/

// Set the content width in pixels based on the theme's design and stylesheet
if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

if ( ! function_exists( 'kouki_setup' ) ) :
	function kouki_setup() {

		// Make theme available for translation
		load_theme_textdomain( 'kouki', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Add theme support for a custom site logo
		add_theme_support( 'custom-logo', array(
			'height'      => 72,
			'flex-width'  => true,
			'header-text' => array( 'site-title' )
		) );

		// Adds support for header images
		add_theme_support( 'custom-header' );

		// Add support for full and wide align images
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds
		add_theme_support( 'responsive-embeds' );

		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'kouki_thumb_large', 1200 );
		add_image_size( 'kouki_thumb_regular', 600 );

		// Register wp_nav_menu()
		register_nav_menu( 'main', 'Top-Bar' );

		// Enable HTML5 markup support
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

	} endif;
add_action( 'after_setup_theme', 'kouki_setup' );

/*----------------------------------------------------------------------------*/
/* Register widget area
/*----------------------------------------------------------------------------*/

function kouki_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer', 'kouki' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'kouki_widgets_init' );

/*----------------------------------------------------------------------------*/
/* Scripts & Styles
/*----------------------------------------------------------------------------*/

function kouki_scripts() {

	wp_enqueue_style( 'kouki-style', get_stylesheet_uri(), array(), '20210126' );
	wp_enqueue_script( 'kouki-js', get_template_directory_uri().'/assets/js/theme.js', array( 'jquery', 'jquery-masonry' ), '20210126', true );
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'kouki_scripts' );

/*----------------------------------------------------------------------------*/
/* Google Fonts
/*----------------------------------------------------------------------------*/

function kouki_fonts() {
	$primary_font = of_get_option( 'kouki_primary_font' );
	$secondary_font = of_get_option( 'kouki_secondary_font' );
	$primary_name = urlencode( $primary_font );
	$secondary_name = urlencode( $secondary_font );
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'kouki-primary-font', "$protocol://fonts.googleapis.com/css?family=$primary_name:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100 rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'kouki-secondary-font', "$protocol://fonts.googleapis.com/css?family=$secondary_name::400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100 rel='stylesheet' type='text/css" );
}

function kouki_base_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'kouki-open-sans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'kouki-julius-sans-one', "$protocol://fonts.googleapis.com/css?family=Julius+Sans+One:400' rel='stylesheet' type='text/css" );
}

if ( function_exists( 'of_get_option' ) ) :
	add_action( 'wp_enqueue_scripts', 'kouki_fonts' );
else :
	add_action( 'wp_enqueue_scripts', 'kouki_base_fonts' );
endif;

/*----------------------------------------------------------------------------*/
/* Body Open
/*----------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/*----------------------------------------------------------------------------*/
/* Skip Link
/*----------------------------------------------------------------------------*/

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function kouki_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'kouki_skip_link_focus_fix' );

/*----------------------------------------------------------------------------*/
/* Includes
/*----------------------------------------------------------------------------*/

require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/plugins/plugin-activation.php';
require get_template_directory() . '/inc/plugins/options-framework.php';
require get_template_directory() . '/inc/plugins/jetpack.php';

/*----------------------------------------------------------------------------*/
/* Lightbox init based on theme options
/*----------------------------------------------------------------------------*/

if ( ( function_exists( 'of_get_option' ) ) && ( !of_get_option( 'kouki_lightbox' ) ) ) {

	function kouki_lightbox() {
		wp_enqueue_script( 'kouki-lightbox', get_template_directory_uri() . '/assets/js/imagelightbox.min.js', array('jquery'), '20210122', true );
		wp_enqueue_script( 'kouki-lightbox-init', get_template_directory_uri().'/assets/js/lightbox-init.js', array('jquery'), '20210122', true );
	}
	add_action( 'wp_enqueue_scripts', 'kouki_lightbox' );

}

/*----------------------------------------------------------------------------*/
/* Remove Header Image Customizer controls
/*----------------------------------------------------------------------------*/

function kouki_customize_register( $wp_customize ) {
	$wp_customize->remove_control('header_image');
}
add_action( 'customize_register', 'kouki_customize_register' );

/**
 * IMPORTANT NOTE:
 * Do not add any custom code here. Please use a child theme so that your
 * customizations aren't lost after updates.
 * http://codex.wordpress.org/Child_Themes
 */
