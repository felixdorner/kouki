<section class="pad-2-1 aligncenter">

	<div class="hentry__inside">

		<?php if ( ! is_search() ) { ?>
		<header class="pad-2-1-1 aligncenter">
			<h1><?php esc_html_e( 'Nothing here', 'kouki' ); ?></h1>
		</header>
		<?php } ?>

		<div class="entry-content">
			<p><?php esc_html_e( 'Sorry, but what you are looking for could not be found.', 'kouki' ); ?></p>
			<p><?php get_search_form(); ?></p>
		</div>

	</div>

</section>
