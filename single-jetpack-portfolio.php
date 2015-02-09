<?php
/**
 * The template to display single portfolio posts.
 *
 * @package kouki
 */

get_header();

while ( have_posts() ) : the_post(); ?>

  <article>

    <?php if ( has_post_thumbnail() && of_get_option('kouki_portfolio_show_featured_image') ) : ?>
      <div class="aligncenter">
        <?php echo get_the_post_thumbnail( $post->ID, 'kouki_thumb_large' ) ?>
      </div>
    <?php endif; ?>

    <header class="pad-2-1-1 aligncenter">
      <h1><?php the_title(); ?></h1>
      <?php echo get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<p class="meta">', _x(', ', '', 'kouki' ), '</p>' ); ?>
    </header>

    <div class="post col-12 pad-0-1-1">
      <?php the_content(); ?>
    </div>

    <?php if ( of_get_option('kouki_portfolio_show_tags') ) {
      echo get_the_term_list( get_the_ID(), 'jetpack-portfolio-tag', '<p class="meta m-0 pad-0-1-1 aligncenter">#', _x(' #', '', 'kouki' ), '</p>' );
    } ?>


    <?php if ( comments_open() || '0' != get_comments_number() ) : ?>
      <div id="comments" class="col-12 pad-0-1-2">
        <?php comments_template(); ?>
      </div>
    <?php endif; ?>

  </article>

<?php endwhile;

get_footer(); ?>