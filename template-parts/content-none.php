<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package kouki
 */
?>

<section class="pad-2-1 aligncenter">

	<div class="hentry__inside">
		
		<?php if ( ! is_search() ) { ?>	
		<header class="pad-2-1-1 aligncenter">		
			<h1><?php _e( 'Nothing here', 'kouki' ); ?></h1>
		</header>
		<?php } ?>

	  <p><?php _e( 'Sorry, but what you are looking for could not be found.', 'kouki' ); ?></p>
	  <p><?php get_search_form(); ?></p>

  </div>

</section>

