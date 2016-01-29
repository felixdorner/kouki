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
 * Show blog description
 */
if ( ! of_get_option('kouki_blog_description') ) { ?> 
  <h1 class="pad-1-1-2 aligncenter">
    <?php bloginfo( 'description' ); ?>
  </h1>
<?php } ?>

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