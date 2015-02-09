<?php
/**
 * Helper Classes
 *
 * @package kouki
 */

/**
 * This class checks if the full-width option of
 * the theme is disabled and opens a wrapping div.
 */
if ( ! function_exists( 'kouki_layout_before' ) ) :

  /**
   * Code before content on pages with sidebar/full-width option
   */
  function kouki_layout_before( $query = false ) {

    /**
     * Check theme-options if the layout is full-width. If full-width is disabled
     * we put a div around content and sidebar. This will allow us to position elements
     * without any floats next to each other with the help of a script.
     *
     * @link assets/js/kouki.js
     */
    $layout_full_width = of_get_option( 'kouki_full_width' );
    if( $layout_full_width == false ) { ?>

    <div data-bikeshedding="nospace" class="inline-holder">

    <?php }

    /**
     * Here we apply the right classes to the main wrapper of articles.
     */
    $fw = ( $layout_full_width ) ? "col-12 inline-holder" : "col-8 inline v-top"; ?>

    <main class="<?php echo $fw; ?>" role="main">

  <?php }

endif;

/**
 * This class checks if the full-width option of the theme is disabled,
 * closes the wrapping div and displays the sidebar.
 */
if ( ! function_exists( 'kouki_layout_after' ) ) :

  /**
   * Code after content on pages with sidebar/full-width option
   */
  function kouki_layout_after( $query = false ) { ?>

    </main>

    <?php
    $layout_full_width = of_get_option( 'kouki_full_width' );
    if( $layout_full_width == false ) {

      /**
       * If full-width is disabled we display the sidebar...
       */
      get_sidebar();
      /**
       * ...and close the div we openend in the beginning.
       */
      ?> </div>

    <?php }

  }

endif;

/**
 * Custom Pagination
 */

if ( ! function_exists( 'kouki_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function kouki_paging_nav() { ?>

  <nav data-bikeshedding="nospace" class="pagination col-12" role="navigation">

    <?php if ( get_next_posts_link() && get_previous_posts_link() ) : ?>
      <div class="inline col-6 pad-1-1-2 alignleft">
        <?php if ( 'jetpack-portfolio' == get_post_type() ) { ?>
          <?php next_posts_link( __( 'Older Projects', 'kouki' ) ); ?>
        <?php } else { ?>
          <?php next_posts_link( __( 'Older Posts', 'kouki' ) ); ?>
        <?php } ?>
      </div>
    <?php elseif ( get_next_posts_link() ) : ?>
      <div class="inline col-12 pad-1-1-2 alignleft">
        <?php if ( 'jetpack-portfolio' == get_post_type() ) { ?>
          <?php next_posts_link( __( 'Older Projects', 'kouki' ) ); ?>
        <?php } else { ?>
          <?php next_posts_link( __( 'Older Posts', 'kouki' ) ); ?>
        <?php } ?>
      </div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() && get_next_posts_link() ) : ?>
      <div class="inline col-6 pad-1-1-2 alignright">
        <?php if ( 'jetpack-portfolio' == get_post_type() ) { ?>
          <?php previous_posts_link( __( 'Newer posts', 'kouki' ) ); ?>
        <?php } else { ?>
          <?php previous_posts_link( __( 'Newer posts', 'kouki' ) ); ?>
        <?php } ?>
      </div>
    <?php elseif ( get_previous_posts_link() ) : ?>
      <div class="inline col-12 pad-1-1-2 alignright">
        <?php if ( 'jetpack-portfolio' == get_post_type() ) { ?>
          <?php previous_posts_link( __( 'Newer posts', 'kouki' ) ); ?>
        <?php } else { ?>
          <?php previous_posts_link( __( 'Newer posts', 'kouki' ) ); ?>
        <?php } ?>
      </div>
    <?php endif; ?>

  </nav>

<?php }
endif;