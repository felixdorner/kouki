<?php
/**
 * Custom Jetpack Scripts
 *
 * @package kouki
 * @subpackage Jetpack
 */

/**
 * Add theme support for Infinite Scroll.
 * @link http://jetpack.me/support/infinite-scroll/
 */
function kouki_jetpack_setup() {

  add_theme_support( 'infinite-scroll', array(
    'container' => 'content',
    'footer'    => 'page',
    'render'    => 'kouki_render_infinite_posts',
    'wrapper'   => 'new-infinite-posts',
    'type'      => 'click'
  ) );

}
add_action( 'after_setup_theme', 'kouki_jetpack_setup' );

/**
 * Render infinite posts by using template parts
 */
function kouki_render_infinite_posts() {

  while ( have_posts() ) : the_post();
    if ( 'jetpack-portfolio' == is_post_type_archive() ) {
      get_template_part( 'content', 'portfolio-thumbs' );
    } else {
      get_template_part( 'content', 'masonry' );
    }
  endwhile;

}

/**
 * Changes the text of the "Older posts" button in infinite scroll
 * for portfolio related views.
 */
function kouki_infinite_scroll_button_text( $js_settings ) {

  if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( array( 'jetpack-portfolio-type', 'jetpack-portfolio-tag' ) ) ) {
    $js_settings['text'] = esc_js( __( 'More Projects', 'kouki' ) );

  } else {
    $js_settings['text'] = esc_js( __( 'More Posts', 'kouki' ) );
  }

  return $js_settings;

}
add_filter( 'infinite_scroll_js_settings', 'kouki_infinite_scroll_button_text' );