<?php
/**
 * The template to display posts in archives.
 *
 * @package kouki
 */

get_header(); ?>



<?php
/**
 * Here we check which title to display.
 */
global $post;
if( is_archive() && have_posts() ) : ?>

	<h1 class="pad-2-1 aligncenter">

		<?php
		if( is_category() ) :
			single_cat_title();

		elseif( is_tag() ) :
			printf( __( '#%s', 'kouki' ), single_tag_title( '', false ) );

		elseif( is_day() ) :
			the_time('M j, Y');

		elseif( is_month() ) :
			the_time( 'F Y' );

		elseif( is_year() ) :
			the_time( 'Y' );

		elseif( is_author() ) :
			$current_author = $wp_query->get_queried_object();
			_e( 'Author: ', 'kouki' ); echo $current_author->display_name;

		elseif( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) :
			_e( 'Archive', 'kouki' );

		else :
			the_title();

		endif; ?>

	</h1>

<?php endif; ?>

<main>

		<?php if ( have_posts() ) : ?>

			<div id="content" class="js-masonry">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'masonry' );
				endwhile; ?>
			</div>

			<?php kouki_paging_nav();

		else :

			/**
			 * If no posts, include the "No posts found" template.
			 */
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

</main>

<?php get_footer(); ?>