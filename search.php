<?php get_header(); ?>

<h1 class="pad-2-1 aligncenter">
	<?php esc_html_e( 'Search Results', 'kouki' ); ?>
</h1>

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
