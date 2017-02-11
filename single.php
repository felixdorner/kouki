<?php
/**
 * The template to display single posts.
 *
 * @package kouki
 */

get_header(); ?>

  <main>
    <?php while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', 'single' );
    endwhile; ?>
  </main>

<?php get_footer(); ?>
