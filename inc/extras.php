<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package kouki
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 * @since 1.0.0
 */
function kouki_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'kouki_body_classes' );

/**
 * Replaces the excerpt ellipsis with a Read More link
 * @since 1.0.0
 */
function kouki_new_excerpt_more( $more ) {
  global $post;
  return ' &hellip; <p class="aligncenter"><a class="more-link" href="'. get_permalink( $post->ID ) .'">'. __( 'Read More &rarr;', 'kouki' ) .'</a></p>';
}
add_filter( 'excerpt_more', 'kouki_new_excerpt_more' );

// function kouki_new_content_more( $more ) {
//   global $post;
//   return '<p class="meta aligncenter"><a class="more-link" href="'. get_permalink( $post->ID ) .'">'. __( 'Read More &rarr;', 'kouki' ) .'</a></p>';
// }
// add_filter( 'the_content_more_link', 'kouki_new_content_more' );

/**
 * Adds caption for featured images
 * Usage - kouki_post_thumbnail_caption();
 * @since 1.0.0
 */
function kouki_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="featured-caption">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

/**
 * Remove WP Gallery Styles
 * @since 1.0.0
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Adds gallery shortcode defaults of size="kouki_thumb_medium"
 * @since 1.0.0
 */
function kouki_gallery_atts( $out, $pairs, $atts ) {

  $atts = shortcode_atts( array(
      'size' => 'kouki_thumb_medium',
       ), $atts );

  $out['size'] = $atts['size'];

  return $out;

}
add_filter( 'shortcode_atts_gallery', 'kouki_gallery_atts', 10, 3 );
