<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kouki
 */

if ( ! function_exists( 'kouki_paging_nav' ) ) {
  /**
   * Display navigation to next/previous set of posts when applicable.
   * @since 1.0.0
   */
  function kouki_paging_nav() { ?>

    <nav class="pagination">

      <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous pad-1">
          <?php next_posts_link( __( 'Older Posts', 'kouki' ) ); ?>
        </div>
      <?php endif; ?>

      <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next pad-1">
          <?php previous_posts_link( __( 'Newer posts', 'kouki' ) ); ?>
        </div>
      <?php endif; ?>

    </nav>

  <?php
  }
}

if ( ! function_exists( 'kouki_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 * @uses the_post_pagination()
	 * @since 2.0.0
	 */
	function kouki_post_nav() {
		$args = array(
			'next_text' => '%title&nbsp;&rarr;',
			'prev_text' => '&larr;&nbsp;%title',
			);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'kouki_post_meta' ) ) {
  /**
   * Post Meta
   * @since 1.7.0
   */
  function kouki_post_meta() {

    /**
     * Check for theme-options and echo the right meta-data for posts.
     */
    $post_show_author = of_get_option( 'kouki_post_show_author' );
    $post_show_category = of_get_option( 'kouki_post_show_category' );
    $post_show_date = of_get_option( 'kouki_post_show_date' );
    $post_show_comments = of_get_option( 'kouki_post_show_comments' );
    if ( $post_show_author || $post_show_category || $post_show_date || $post_show_comments ) { ?>

      <p class="meta">
        <?php
        if ( $post_show_author || $post_show_date || $post_show_category ) { _e( 'Posted ', 'kouki' ); }
        if ( $post_show_author ) { _e( 'by ', 'kouki' ); ?> <?php the_author_posts_link(); ?><?php _e( ' ', 'kouki' ); }
        if ( $post_show_date ) { _e( 'on', 'kouki' ); ?> <a href="<?php the_permalink(); ?>"><?php the_time( 'M j, Y ' ); ?></a> <?php }
        if ( $post_show_category && get_the_category() ) { _e( 'in', 'kouki' ); ?> <?php the_category( ', ' ); }
        if ( ( $post_show_author || $post_show_date || $post_show_category ) && $post_show_comments ) { echo "<br>"; }
        if ( $post_show_comments ) { ?> <a href="<?php comments_link(); ?>"><?php comments_number(__( 'No Comments', 'kouki' ), __( 'One Comment', 'kouki' ), __( '% Comments', 'kouki' ) ); ?></a> <?php } ?>
      </p>

    <?php }

  }
}
