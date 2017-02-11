<?php
/**
 * The content template to display single articles.
 *
 * @package kouki
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( has_post_thumbnail() && of_get_option( 'kouki_post_show_featured_image' ) ) : ?>
    <div class="pad-0-1 aligncenter">
      <?php echo get_the_post_thumbnail( $post->ID, 'kouki_thumb_large' ) ?>
      <?php echo wpautop( kouki_post_thumbnail_caption() ); ?>
    </div>
  <?php endif; ?>

  <div class="hentry__inside">

    <header class="pad-2-1-1 aligncenter">
      <h1><?php the_title(); ?></h1>
      <?php kouki_post_meta(); ?>
    </header>

    <div class="entry-content col-12 pad-0-1-1">
      <?php the_content(); ?>
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . __( 'Pages:', 'kouki' ),
          'after'  => '</div>',
        ) );
      ?>
    </div>

    <?php if ( get_the_tags() && of_get_option( 'kouki_post_show_tags' ) ) {
      the_tags( '<p class="meta m-0 pad-0-1-1 aligncenter">#',' #','</p>' );
     } ?>

    <?php if ( comments_open() || '0' != get_comments_number() ) : ?>
      <div id="comments" class="col-12 pad-0-1-2">
        <?php comments_template(); ?>
      </div>
    <?php endif; ?>

    <div class="col-12 pad-0-1-2">
      <?php kouki_post_nav(); ?>
    </div>

  </div>

</article>
