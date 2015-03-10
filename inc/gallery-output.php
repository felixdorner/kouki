<?php

// Remove WP Gallery Styles
add_filter( 'use_default_gallery_style', '__return_false' );

//Adds gallery shortcode defaults of size="kouki_thumb_medium"
add_filter( 'shortcode_atts_gallery', 'kouki_gallery_atts', 10, 3 );
function kouki_gallery_atts( $out, $pairs, $atts ) {

  $atts = shortcode_atts( array(
      'size' => 'kouki_thumb_medium',
       ), $atts );

  $out['size'] = $atts['size'];

  return $out;

}

// Gallery Masonry TODO: Kill path to js file? Debug?
// add_action( 'wp_enqueue_scripts', 'kouki_gallery_masonry_js');
// function kouki_gallery_masonry_js() {

//   global $post;

//   if( has_shortcode( $post->post_content, 'gallery') ) {
//     wp_enqueue_script('initMasonry');
//   }
// }