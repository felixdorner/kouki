<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package kouki
 */

get_header(); ?>
  
  <main id="main" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content', 'page' ); ?>     
    <?php endwhile; // end of the loop. ?>

  </main><!-- #main -->
  

<?php get_footer(); ?>