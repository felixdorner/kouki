<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package kouki
 *
 */
get_header(); ?>



<?php
/**
 * Check theme-options to find the page which outputs posts.
 * Then we apply the right title to the page.
 */
$blog_page_id = of_get_option( 'kouki_blog_page' );
if ( $blog_page_id ) {

	$blog_page = get_page( $blog_page_id ); ?>

	<h1 class="pad-2-1 aligncenter">
		<?php echo $blog_page->post_title; ?>
	</h1>

<?php } ?>



<?php kouki_layout_before(); ?>

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

<?php kouki_layout_after(); ?>



<?php get_footer(); ?>