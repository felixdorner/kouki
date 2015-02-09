<?php
/**
 * The template to display single posts.
 *
 * @package kouki
 */

get_header();

  kouki_layout_before();

    while ( have_posts() ) : the_post();

      /**
       * Check theme-options if the layout is full-width and trigger templates
       */
      $layout_full_width = of_get_option( 'kouki_full_width' );

      if ( $layout_full_width == false ) :
        get_template_part( 'content', 'single' );
      else :
        get_template_part( 'content', 'single-full' );
      endif;

    endwhile;

  kouki_layout_after();

get_footer(); ?>