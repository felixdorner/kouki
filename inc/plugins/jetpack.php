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
 * @since 1.0.0
 */
function kouki_jetpack_setup() {

  add_theme_support( 'infinite-scroll', array(
    'type'      => 'click',
    'container' => 'content',
    'render'    => 'kouki_render_infinite_posts',
    'wrapper'   => false,
    'footer'    => 'colophon',
    'footer_widgets' => 'footer-1'
  ) );

}
add_action( 'after_setup_theme', 'kouki_jetpack_setup' );

/**
 * Render infinite posts by using template parts
 * @since 1.0.0
 */
function kouki_render_infinite_posts() {

  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/content', 'masonry' );    
  }

}

/**
 * Changes the text of the "Older posts" button in infinite scroll
 * for portfolio related views.
 * @since 1.0.0
 */
function kouki_infinite_scroll_button_text( $js_settings ) {

  $js_settings['text'] = esc_js( __( 'More', 'kouki' ) );
  return $js_settings;

}
add_filter( 'infinite_scroll_js_settings', 'kouki_infinite_scroll_button_text' );