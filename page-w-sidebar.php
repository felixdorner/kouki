<?php
/**
 * Template Name: Page with Sidebar
 *
 * @package kouki
 */

get_header(); ?>

<div data-bikeshedding="nospace" class="inline-holder">

  <main class="col-8 inline v-top" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <article class="pad-1-0-1-1">

      <?php if ( has_post_thumbnail() && of_get_option('kouki_post_show_featured_image') ) : ?>
        <div class="m-0-0-1 aligncenter">
          <?php echo get_the_post_thumbnail( $post->ID, 'kouki_thumb_large' ) ?>
        </div>
      <?php endif; ?>

      <header class="pad-0-0-1 aligncenter">
        <h1><?php the_title(); ?></h1>
      </header>

      <div class="post pad-0-0-1">
        <?php the_content(); ?>
      </div>

      <?php if ( comments_open() || '0' != get_comments_number() ) : ?>
        <div id="comments" class="pad-0-0-2">
          <?php comments_template(); ?>
        </div>
      <?php endif; ?>

    </article>

  <?php endwhile; ?>

  </main>

  <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>