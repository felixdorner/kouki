<?php

/*----------------------------------------------------------------------------*/
/* Custom template tags for this theme
/*----------------------------------------------------------------------------*/

/**
 * Display navigation to next/previous set of posts when applicable
 */
if ( ! function_exists( 'kouki_paging_nav' ) ) {
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

/**
 * Display navigation to next/previous post when applicable
 */
if ( ! function_exists( 'kouki_post_nav' ) ) {
	function kouki_post_nav() {
		$args = array(
			'next_text' => '%title&nbsp;&rarr;',
			'prev_text' => '&larr;&nbsp;%title',
			);
		the_post_navigation( $args );
	}
}

/**
 * Post Meta
 */
if ( ! function_exists( 'kouki_post_meta' ) ) {
	function kouki_post_meta() {
		$post_show_author = of_get_option( 'kouki_post_show_author' );
		$post_show_category = of_get_option( 'kouki_post_show_category' );
		$post_show_date = of_get_option( 'kouki_post_show_date' );
		$post_show_comments = of_get_option( 'kouki_post_show_comments' );
		if ( $post_show_author || $post_show_category || $post_show_date || $post_show_comments ) { ?>
			<p class="meta">
				<?php
				if ( $post_show_author || $post_show_date || $post_show_category ) { esc_html_e( 'Posted ', 'kouki' ); }
				if ( $post_show_author ) { esc_html_e( 'by ', 'kouki' ); ?> <?php the_author_posts_link(); ?><?php esc_html_e( ' ', 'kouki' ); }
				if ( $post_show_date ) { esc_html_e( 'on', 'kouki' ); ?> <a href="<?php the_permalink(); ?>"><?php the_time( 'M j, Y ' ); ?></a> <?php }
				if ( $post_show_category && get_the_category() ) { esc_html_e( 'in', 'kouki' ); ?> <?php the_category( ', ' ); }
				if ( ( $post_show_author || $post_show_date || $post_show_category ) && $post_show_comments ) { echo "<br>"; }
				if ( $post_show_comments ) { ?> <a href="<?php comments_link(); ?>"><?php comments_number(__( 'No Comments', 'kouki' ), __( 'One Comment', 'kouki' ), __( '% Comments', 'kouki' ) ); ?></a> <?php } ?>
			</p>
		<?php }
	}
}

/**
 * Adds caption for featured images
 */
if ( ! function_exists( 'kouki_post_thumbnail_caption' ) ) {
	function kouki_post_thumbnail_caption() {
		global $post;

		$thumbnail_id    = get_post_thumbnail_id($post->ID);
		$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

		if ($thumbnail_image && isset($thumbnail_image[0])) {
			echo '<span class="featured-caption">'.$thumbnail_image[0]->post_excerpt.'</span>';
		}
	}
}
