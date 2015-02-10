<?php
/**
 * The template to display meta-data.
 *
 * @package kouki
 */
?>

<p class="meta">
  <?php
  /**
   * Check for theme-options and echo the right meta-data for posts.
   */
  $post_show_author = of_get_option( 'kouki_post_show_author' );
	$post_show_category = of_get_option( 'kouki_post_show_category' );
	$post_show_date = of_get_option( 'kouki_post_show_date' );
	$post_show_comments = of_get_option( 'kouki_post_show_comments' );
  if( $post_show_author || $post_show_date || $post_show_category ){ _e( 'Posted ', 'kouki' ); }
	if( $post_show_author ) { _e( 'by ', 'kouki' ); ?> <?php the_author_posts_link(); ?><?php _e( ' ', 'kouki' ); }
	if( $post_show_date ) { _e( 'on', 'kouki' ); ?> <a href="<?php the_permalink(); ?>"><?php the_time( 'M j, Y ' ); ?></a> <?php }
	if( $post_show_category && get_the_category() ) { _e( 'in', 'kouki' ); ?> <?php the_category( ', ' ); }
	if(( $post_show_author || $post_show_date || $post_show_category ) && $post_show_comments ) { echo "<br>"; }
  if( $post_show_comments ) { ?>
		<a href="<?php comments_link(); ?>"><?php comments_number(__( 'No Comments', 'kouki' ), __( 'One Comment', 'kouki' ), __( '% Comments', 'kouki' )); ?></a>
	<?php } ?>
</p>