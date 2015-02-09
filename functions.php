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
  $content_width = 1200; /* pixels */
}

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
   * Enable support for Post Thumbnails on posts and pages
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'kouki_thumb_big', 1200 );
  add_image_size( 'kouki_thumb_medium', 800 );
  add_image_size( 'kouki_thumb_medium_cropped', 800, 533, true );
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

/**
 * Register widget area
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kouki_widgets_init() {

  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'description' => __( 'This is the default widget area for the sidebar. This will be displayed if the other sidebars have not been populated with widgets.', 'kouki' ),
    'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
    'after_widget' => '</div>',
    'before_title' => '<span class="widgetTitle">',
    'after_title' => '</span>'
  ));

  register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'sidebar-page',
    'description' => __( 'This is the a widget area for the sidebar. It will be displayed on pages.', 'kouki' ),
    'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
    'after_widget' => '</div>',
    'before_title' => '<span class="widgetTitle">',
    'after_title' => '</span>'
  ));

}
add_action( 'widgets_init', 'kouki_widgets_init' );

/**
 * Enqueue scripts & styles
 */
function kouki_scripts() {

  /**
   * Main Stylesheet
   */
  wp_enqueue_style( 'kouki-style', get_stylesheet_uri() );

  /**
   * FontAwesome Icons Stylesheet
   */
  wp_enqueue_style( 'kouki-font-awesome-css', get_template_directory_uri() . "/assets/fonts/font-awesome/font-awesome.min.css", array(), '4.1.0', 'screen' );

  /**
   * Load kouki's scripts
   */
  wp_enqueue_script( 'kouki-js', get_template_directory_uri().'/assets/js/theme.js', array( 'jquery', 'jquery-masonry' ), '20150209', true );

  /**
   * Load the comment reply script
   */
  if ( is_singular() && comments_open() ) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'kouki_scripts' );

/**
 * Load custom theme modules
 */
require get_template_directory() . '/inc/style-options.php';
require get_template_directory() . '/inc/helper-classes.php';
require get_template_directory() . '/inc/comments-output.php';
require get_template_directory() . '/inc/gallery-output.php';
require get_template_directory() . '/inc/jetpack-functions.php';

/**
 * Replaces the excerpt ellipsis with a Read More link
 */
function kouki_new_excerpt_more( $more ) {
  global $post;
  return ' &hellip; <p class="meta aligncenter"><a class="more-link" href="'. get_permalink( $post->ID ) . '">Read More &rarr;</a></p>';
}
add_filter( 'excerpt_more', 'kouki_new_excerpt_more' );

/**
 * Plugin Activation
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
function kouki_register_required_plugins() {

  $plugins = array(

    array(
      'name'      => 'Options Framework',
      'slug'      => 'options-framework',
      'required'  => true,
      'force_activation' => true,
    ),

    array(
      'name'      => 'Jetpack by WordPress.com',
      'slug'      => 'jetpack',
      'required'  => false,
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
if ( !function_exists( 'of_get_option' ) ) {
  function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option( 'optionsframework' );
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    if ( get_option( $option_name ) ) {
      $options = get_option( $option_name );
    }
    if ( isset($options[$name]) ) {
      return $options[$name];
    } else {
      return $default;
    }
  }
}

/**
 * Reset all queries in the footer
 */
function kouki_footer() {
  wp_reset_query();
  global $wp_query;
  global $post;
}
add_action( 'wp_footer','kouki_footer' );

