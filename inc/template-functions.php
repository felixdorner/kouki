<?php

/*----------------------------------------------------------------------------*/
/* Functions which enhance the theme by hooking into WordPress
/*----------------------------------------------------------------------------*/

/**
 * Adds custom classes to the array of body classes
 */
function kouki_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter( 'body_class', 'kouki_body_classes' );

/**
 * Replaces the excerpt ellipsis with a Read More link
 */
function kouki_new_excerpt_more( $more ) {
	global $post;
	return ' &hellip; <a class="more-link" href="'. get_permalink( $post->ID ) .'">'. __( 'Read More &rarr;', 'kouki' ) .'</a>';
}
add_filter( 'excerpt_more', 'kouki_new_excerpt_more' );

/**
 * Remove WP Gallery Styles
 */
add_filter( 'use_default_gallery_style', '__return_false' );

// Adds gallery shortcode defaults of size="kouki_thumb_medium"
function kouki_gallery_atts( $out, $pairs, $atts ) {
	$atts = shortcode_atts( array(
		'size' => 'kouki_thumb_medium',
	), $atts );
	$out['size'] = $atts['size'];
	return $out;
}
add_filter( 'shortcode_atts_gallery', 'kouki_gallery_atts', 10, 3 );
