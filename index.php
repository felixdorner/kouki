<?php get_header(); ?>

<?php if ( ! of_get_option('kouki_blog_description') ) { ?>
	<h1 class="pad-1-1-2 aligncenter">
		<?php bloginfo( 'description' ); ?>
	</h1>
<?php } ?>

<?php if ( have_posts() ) : ?>

	<div class="masonry-wrapper">
		<div id="content" class="js-masonry">
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'masonry' );
			endwhile; ?>
		</div>
	</div>

	<?php kouki_paging_nav();

else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>

<?php get_footer(); ?>
