<?php
/**
 * The template to display 404 errors.
 *
 * @package kouki
 */

get_header();

  wunderbar_layout_before();

    get_template_part( 'content', 'none' );

  wunderbar_layout_after();

get_footer();

?>