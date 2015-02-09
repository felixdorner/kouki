<?php
/**
 * The content template to display single articles.
 *
 * @package kouki
 */
?>

<article id="post-<?php the_ID(); ?>" class="pad-1-0-1-1">

  <?php if ( has_post_thumbnail() && of_get_option('kouki_post_show_featured_image') ) : ?>
    <div class="m-0-0-1 aligncenter">
      <?php echo get_the_post_thumbnail( $post->ID, 'kouki_thumb_large' ) ?>
    </div>
  <?php endif; ?>

  <header class="aligncenter">
    <h1><?php the_title(); ?></h1>
    <?php get_template_part( 'content', 'post-meta' ); ?>
  </header>

  <div class="post pad-0-0-1">
    <?php the_content(); ?>
  </div>

  <?php if ( get_the_tags() && of_get_option('kouki_post_show_tags') ) {
    the_tags( '<p class="meta m-0 pad-0-0-1 aligncenter">#',' #','</p>' );
   } ?>

  <?php if ( comments_open() || '0' != get_comments_number() ) : ?>
    <div id="comments" class="pad-0-0-2">
      <?php comments_template(); ?>
    </div>
  <?php endif; ?>

</article>