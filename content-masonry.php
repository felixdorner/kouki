<?php
/**
 * The template to display articles in a masonry layout.
 *
 * @package kouki
 */
?>

<article id="post-<?php the_ID(); ?>" class="js-item col-6 pad-1">

	<?php if ( has_post_thumbnail() ) : ?>
    <div class="m-0-0-1 aligncenter">
      <a href="<?php the_permalink(); ?>">
      	<?php echo get_the_post_thumbnail( $post->ID, 'kouki_thumb_medium' ) ?>
      </a>
    </div>
  <?php endif; ?>

	<header class="aligncenter">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'content', 'post-meta' ); ?>
	</header>

  <?php if ( of_get_option('kouki_show_full_post') ) :
	  the_content();
  else :
    the_excerpt();
  endif; ?>

</article>