<?php
/**
 * The template to display posts in the Jetpack Portfolio types.
 *
 * @package kouki
 *
 */
get_header(); ?>

<main role="main">

  <h1 class="pad-2-1 aligncenter">
    <?php single_cat_title(); ?>
  </h1>

  <?php if ( have_posts() ) : ?>

    <div id="content" class="projects js-masonry">

      <?php while ( have_posts() ) : the_post();
        get_template_part( 'content', 'portfolio-thumbs' );
      endwhile; ?>

    </div>

    <?php kouki_paging_nav();

  else:
    /**
     * If no posts, include the "No posts found" template.
     */
    get_template_part( 'content', 'none' );

  endif; ?>

</main>

<?php get_footer(); ?>