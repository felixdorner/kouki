<?php
/**
 * Custom comment output
 *
 * @package kouki
 * @since 1.0.0
 */
function kouki_comment( $comment, $args, $depth ) {

  $GLOBALS['comment'] = $comment; ?>

  <li <?php comment_class( 'pad-1' ); ?> id="li-comment-<?php comment_ID() ?>">

    <div class="comment-block" id="comment-<?php comment_ID(); ?>">

      <?php echo get_avatar( $comment->comment_author_email, 75 ); ?>

      <div class="comment-wrap inline">

        <div class="comment-info m-0-0-1">
          <?php printf( __( '<h4 class="comment-cite">%s</h4>', 'kouki' ), get_comment_author_link() ) ?>
          <a class="comment-time meta" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __( '%1$s', 'kouki' ), get_comment_date() ) ?></a>
        </div>

        <div class="comment-content">
          <?php comment_text() ?>
          <p class="reply meta">
            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
          </p>
        </div>

        <?php if ( $comment->comment_approved == '0' ) : ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kouki' ) ?></em>
        <?php endif; ?>

      </div>

    </div>

<?php
}