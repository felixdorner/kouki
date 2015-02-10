<?php
/**
 * The template to display search-results.
 *
 * @package kouki
 */

get_header(); ?>

<h1 class="pad-2-1 aligncenter">
	<?php _e( 'Search Results', 'kouki' ); ?>
</h1>

<main role="main">

		<?php if ( have_posts() ) : ?>

			<div id="content" class="js-masonry">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'content', 'masonry' );
				endwhile; ?>
			</div>

			<?php kouki_paging_nav();

		else :

			/**
			 * If no posts, include the "No posts found" template.
			 */
			get_template_part( 'content', 'none' );

		endif; ?>

</main>

<?php get_footer(); ?>