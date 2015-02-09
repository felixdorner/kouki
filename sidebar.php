<?php
/**
* The Sidebar containing the main widget areas.
*
* @package kouki
*/
?>

<aside class="col-4 pad-1 inline">

  <?php
  if ( is_page() && is_active_sidebar( 'sidebar-page' ) ) :
    dynamic_sidebar( 'sidebar-page' );
  else :
    if (!dynamic_sidebar( 'sidebar' ));
  endif;
  ?>


</aside>