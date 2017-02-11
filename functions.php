<?php
/**
 * Functions
 *
 * @package kouki
 */

/**
 * Set the content width based on the theme's design and stylesheet
 */
if ( ! isset( $content_width ) ) {
  $content_width = 740; /* pixels */
}

/*-----------------------------------------------------------------------------------*/
/* Setup
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'kouki_setup' ) ) :
/**
 * Sets up kouki's defaults and registers support for various WordPress features
 */
function kouki_setup() {

  /*
   * Admin functionality
   */
  if( is_admin() ) {

    /**
     * Add styles to post editor (editor-style.css)
     */
    add_editor_style();
  }

  /*
   * Make theme available for translation
   */
  load_theme_textdomain( 'kouki', get_template_directory() . '/languages' );

  /**
   * Add default posts and comments RSS feed links to head
   */
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'kouki_thumb_large', 1200 );
  add_image_size( 'kouki_thumb_regular', 600 );

  /**
   * Register main navigation
   */
  register_nav_menu( 'main', 'Top-Bar' );

  /**
   * Enable HTML5 markup
   */
  add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery'
  ) );


} endif;
add_action( 'after_setup_theme', 'kouki_setup' );

/*-----------------------------------------------------------------------------------*/
/* Widgets
/*-----------------------------------------------------------------------------------*/

/**
 * Register widget area
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
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

/*-----------------------------------------------------------------------------------*/
/* Scripts & Styles
/*-----------------------------------------------------------------------------------*/

function kouki_scripts() {

  wp_enqueue_style( 'kouki-style', get_stylesheet_uri(), array(), '20170210' );
  wp_enqueue_script( 'kouki-js', get_template_directory_uri().'/assets/js/theme.js', array( 'jquery', 'jquery-masonry' ), '20160628', true );
  if ( is_singular() && comments_open() ) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'kouki_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Google Fonts
/*-----------------------------------------------------------------------------------*/

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

/*-----------------------------------------------------------------------------------*/
/* Includes
/*-----------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/back-compat.php';
require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/plugins/plugin-activation.php';
require get_template_directory() . '/inc/plugins/options-framework.php';
require get_template_directory() . '/inc/plugins/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Lightbox init based on theme options
/*-----------------------------------------------------------------------------------*/

if ( ( function_exists( 'of_get_option' ) ) && ( !of_get_option( 'kouki_lightbox' ) ) ) {

  function kouki_lightbox() {
    wp_enqueue_script( 'kouki-lightbox', get_template_directory_uri() . '/assets/js/imagelightbox.min.js', array('jquery'), '20160128', true );
    wp_enqueue_script( 'kouki-lightbox-init', get_template_directory_uri().'/assets/js/lightbox-init.js', array('jquery'), '20160628', true );
  }
  add_action( 'wp_enqueue_scripts', 'kouki_lightbox' );

}

/*-----------------------------------------------------------------------------------*/
/* Font Awesome init based on theme options
/*-----------------------------------------------------------------------------------*/

if ( ( function_exists( 'of_get_option' ) ) && (
  ( of_get_option( 'kouki_behance' ) ) xor
  ( of_get_option( 'kouki_dribbble' ) ) xor
  ( of_get_option( 'kouki_facebook' ) ) xor
  ( of_get_option( 'kouki_instagram' ) ) xor
  ( of_get_option( 'kouki_linkedin' ) ) xor
  ( of_get_option( 'kouki_mail' ) ) xor
  ( of_get_option( 'kouki_pinterest' ) ) xor
  ( of_get_option( 'kouki_rss' ) ) xor
  ( of_get_option( 'kouki_soundcloud' ) ) xor
  ( of_get_option( 'kouki_tumblr' ) ) xor
  ( of_get_option( 'kouki_twitter' ) )
) ) {

  function kouki_fontawesome() {
    wp_enqueue_style( 'kouki-font-awesome', get_template_directory_uri() . "/assets/fonts/font-awesome/font-awesome.min.css", array(), '4.7.0' );
  }
  add_action( 'wp_enqueue_scripts', 'kouki_fontawesome' );

}

/**
 * IMPORTANT NOTE:
 * Do not add any custom code here. Please use a child theme so that your
 * customizations aren't lost after updates.
 * http://codex.wordpress.org/Child_Themes
 */
