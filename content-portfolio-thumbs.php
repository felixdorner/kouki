<?php
/**
 * The template used for displaying portfolio thumbs.
 *
 * @package kouki
 */

/**
 * Checking theme-options for the number of columns in which the
 * posts should be displayed and then applying the right classes.
 */
$project_columns = of_get_option( 'kouki_project_columns' );
if ( $project_columns == 'two' ) :
  $pc = 'col-6';
else :
  $pc = 'col-4';
endif;
?>

<article class="<?php echo $pc ?> aligncenter js-item">

  <a href="<?php the_permalink(); ?>" rel="bookmark">

    <?php
    /**
     * This code-part will help to check if there is a featured-image and display it.
     * If there is no image we will display a placeholder.
     */
    if ( has_post_thumbnail() ) {
      $thumb_medium_cropped = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'kouki_thumb_medium_cropped' );
      $thumb_medium_cropped = $thumb_medium_cropped[0]; ?>
      <img src="<?php echo $thumb_medium_cropped ?>" alt="<?php get_the_title() ?>" title="<?php get_the_title() ?>">
    <?php }

    else {
      echo ( '<img src="' . get_stylesheet_directory_uri() . '/assets/images/thumb-placeholder.png" />' );
    }

    /**
     * Here we display the caption with flexbox.
     */
    ?>
    <div class="inside flexbox">
      <div class="flexbox-child">

        <h3><?php the_title(); ?></h3>

        <?php if ( of_get_option( 'kouki_portfolio_show_type' ) ) { ?>

          <p class="meta">

          <?php
          $terms = wp_get_object_terms( $post->ID, 'jetpack-portfolio-type' );
          if ( $terms ) {
            foreach( $terms as $term )
            $term_names[] = $term->name;
            echo implode( ', ', $term_names );
          }
          ?>

          </p>

        <?php } ?>

      </div>
    </div>

  </a>

</article>