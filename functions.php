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

/************************************************************/
/*                                                          */
/*   THEME SETUP
/*                                                          */
/************************************************************/

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
    'gallery',
  ) );


} endif;
add_action( 'after_setup_theme', 'kouki_setup' );

/************************************************************/
/*                                                          */
/*   WIDGETS                                                */
/*                                                          */
/************************************************************/

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

/************************************************************/
/*                                                          */
/*   SCRIPTS & STYLES                                        */
/*                                                          */
/************************************************************/

function kouki_scripts() {

  wp_enqueue_style( 'kouki-font-awesome-css', get_template_directory_uri() . "/assets/fonts/font-awesome/font-awesome.min.css", array(), '4.1.0', 'screen' );
  wp_enqueue_style( 'kouki-style', get_stylesheet_uri() );
  wp_enqueue_script( 'kouki-lightbox', get_template_directory_uri() . '/assets/js/imagelightbox.min.js', array('jquery'), '1', true );
  wp_enqueue_script( 'kouki-js', get_template_directory_uri().'/assets/js/theme.js', array( 'jquery', 'jquery-masonry' ), '20150209', true );

  if ( is_singular() && comments_open() ) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'kouki_scripts' );

/**
 * Implement Google Fonts
 */
function kouki_fonts() {
  $primary_font = of_get_option('kouki_primary_font');
  $secondary_font = of_get_option('kouki_secondary_font');
  $primary_name = urlencode($primary_font);
  $secondary_name = urlencode($secondary_font);
  $protocol = is_ssl() ? 'https' : 'http';
  wp_enqueue_style( 'kouki-primary', "$protocol://fonts.googleapis.com/css?family=$primary_name:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100 rel='stylesheet' type='text/css" );
  wp_enqueue_style( 'kouki-secondary', "$protocol://fonts.googleapis.com/css?family=$secondary_name::400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100 rel='stylesheet' type='text/css" );
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

/************************************************************/
/*                                                          */
/*   INCLUDES & FUNCTIONS                                   */
/*                                                          */
/************************************************************/

require get_template_directory() . '/inc/style-options.php';
require get_template_directory() . '/inc/helper-classes.php';
require get_template_directory() . '/inc/comments-output.php';
require get_template_directory() . '/inc/gallery-output.php';
require get_template_directory() . '/inc/jetpack-functions.php';
require get_template_directory() . '/inc/extras.php';

/**
 * Replaces the excerpt ellipsis with a Read More link
 */
function kouki_new_excerpt_more( $more ) {
  global $post;
  return ' &hellip; <p class="aligncenter"><a class="more-link" href="'. get_permalink( $post->ID ) .'">'. __( 'Read More &rarr;', 'kouki' ) .'</a></p>';
}
add_filter( 'excerpt_more', 'kouki_new_excerpt_more' );

function kouki_new_content_more( $more ) {
  global $post;
  return '<p class="meta aligncenter"><a class="more-link" href="'. get_permalink( $post->ID ) .'">'. __( 'Read More &rarr;', 'kouki' ) .'</a></p>';
}
add_filter( 'the_content_more_link', 'kouki_new_content_more' );

/**
 * Adds caption for featured images
 * Usage - kouki_post_thumbnail_caption();
 */
function kouki_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="featured-caption">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

/************************************************************/
/*                                                          */
/*   PLUGINS                                                */
/*                                                          */
/************************************************************/

/**
 * Plugin Activation
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
function kouki_register_required_plugins() {

  $plugins = array(

    array(
      'name'      => 'Options Framework',
      'slug'      => 'options-framework',
      'required'  => false,
      'force_activation' => false,
    )    

  );

  $config = array(
    'domain'       => 'kouki',
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
    'strings'      => array(
        'page_title'                      => __( 'Install Required Plugins', 'kouki' ),
        'menu_title'                      => __( 'Install Plugins', 'kouki' ),
        'installing'                      => __( 'Installing Plugin: %s', 'kouki' ), // %s = plugin name.
        'oops'                            => __( 'Something went wrong with the plugin API.', 'kouki' ),
        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
        'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
        'return'                          => __( 'Return to Required Plugins Installer', 'kouki' ),
        'plugin_activated'                => __( 'Plugin activated successfully.', 'kouki' ),
        'complete'                        => __( 'All plugins installed and activated successfully. %s', 'kouki' ), // %s = dashboard link.
        'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
      )
  );

  tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'kouki_register_required_plugins' );

/**
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( ! function_exists( 'of_get_option' ) ) {
  
  function of_get_option( $name, $default = false ) {
    $optionsframework_settings = get_option( 'optionsframework' );
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    
    if ( get_option( $option_name ) ) {
      $options = get_option( $option_name );
    }
    
    if ( isset( $options[$name] ) ) {
      return $options[$name];
    } else {
      return $default;
    }
  }

}
