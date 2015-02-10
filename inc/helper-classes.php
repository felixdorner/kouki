<?php
/**
 * Helper Classes
 *
 * @package kouki
 */

/**
 * Custom Pagination
 */

if ( ! function_exists( 'kouki_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function kouki_paging_nav() { ?>

  <nav class="pagination" role="navigation">
  
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

<?php }
endif;