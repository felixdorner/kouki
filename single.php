<?php
/**
 * The template to display single posts.
 *
 * @package kouki
 */

get_header(); ?>

  <main role="main">
    <?php while ( have_posts() ) : the_post();
      get_template_part( 'content', 'single' );
    endwhile; ?>
  </main>

<?php get_footer(); ?>