<?php
/**
 * The template for displaying comments.
 *
 * @package kouki
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>

  <h3 class="comments-title m-0-0-1">
  	<?php
  		printf( _n( 'One thought', '%1$s thoughts', get_comments_number(), 'kouki' ),
  			number_format_i18n( get_comments_number() ));
  	?>
  </h3>

  <ol class="comment-list">
  	<?php
  		wp_list_comments( array(
  			'style'      => 'ol',
  			'short_ping' => true,
  			'avatar_size'=> 70,
  			'callback'    => 'kouki_comment'
  		) );
  	?>
  </ol>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
  	<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'kouki' ); ?></h1>
  	<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'kouki' ) ); ?></div>
  	<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'kouki' ) ); ?></div>
  </nav>
  <?php endif; // Check for comment navigation. ?>

  <?php if ( ! comments_open() ) : ?>
  <p class="no-comments"><?php _e( 'Comments are closed.', 'kouki' ); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php $comments_args = array(  
  'title_reply'=> __( 'Reply', 'kouki' ),
  'comment_notes_before' => '',
  'comment_notes_after' => '',
  'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' =>	'<p class="comment-form-author">
								<input id="author" name="author" placeholder="' . __( 'Name', 'kouki' ) . ( $req ? '*' : '' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
								'"size="30" aria-required="true" required /></p>',
		'email' =>	'<p class="comment-form-email">
								<input id="email" name="email" placeholder="' . __( 'Email', 'kouki' ) . ( $req ? '*' : '' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
								'" size="30" aria-required="true" required /></p>',
		'url' =>		'<p class="comment-form-url"><label for="url">
								<input id="url" name="url" placeholder="' . __( 'Website', 'kouki' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
								'" size="30" /></p>'
		)),
  'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . __( 'Comment', 'kouki' ) . '"aria-required="true" required cols="45" rows="8"></textarea></p>',
	);
comment_form( $comments_args );?>
