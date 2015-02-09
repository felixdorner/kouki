<?php
/**
* The template for displaying the footer.
*
* @package kouki
*/
?>

<footer class="col-12 aligncenter">

	<?php
	$bottom_text = of_get_option( 'kouki_cta_text' );
	$bottom_button_label = of_get_option( 'kouki_cta_button_label' );
	$bottom_button_link = of_get_option( 'kouki_cta_button_link' );
	$bottom_button_style = of_get_option( 'kouki_cta_button_style' );
	if( $bottom_text ) : ?>

	  <div class="call-to-action pad-2-1-1">
	    <p class="meta">
	      <?php echo $bottom_text; ?>
	    </p>
	    <p>
	      <a href="<?php echo $bottom_button_link; ?>" class="btn <?php echo $bottom_button_style; ?>">
	        <?php echo $bottom_button_label; ?>
	      </a>
	    </p>
	  </div>

	<?php endif; ?>

	<div class="social pad-2-1-0">

		<?php
		$footer_credits = of_get_option('kouki_footer_credits');
		$behance = of_get_option('kouki_behance');
		$dribbble = of_get_option('kouki_dribbble');
		$facebook = of_get_option('kouki_facebook');
		$instagram = of_get_option('kouki_instagram');
		$linkedin = of_get_option('kouki_linkedin');
		$mail = of_get_option('kouki_mail');
		$pinterest = of_get_option('kouki_pinterest');
		$rss = of_get_option('kouki_rss');
		$soundcloud = of_get_option('kouki_soundcloud');
		$tumblr = of_get_option('kouki_tumblr');
		$twitter = of_get_option('kouki_twitter');
		?>

		<?php if( $behance ) { ?>
			<a href="<?php echo $behance ?>"><i class="fa fa-behance"></i></a>
		<?php } ?>

		<?php if( $dribbble ) { ?>
			<a href="<?php echo $dribbble ?>"><i class="fa fa-dribbble"></i></a>
		<?php } ?>

		<?php if( $facebook ) { ?>
			<a href="<?php echo $facebook ?>"><i class="fa fa-facebook"></i></a>
		<?php } ?>

		<?php if( $instagram ) { ?>
			<a href="<?php echo $instagram ?>"><i class="fa fa-instagram"></i></a>
		<?php } ?>

		<?php if( $linkedin ) { ?>
			<a href="<?php echo $linkedin ?>"><i class="fa fa-linkedin"></i></a>
		<?php } ?>

		<?php if( $mail ) { ?>
			<a href="mailto:<?php echo $mail ?>"><i class="fa fa-envelope-o"></i></a>
		<?php } ?>

		<?php if( $pinterest ) { ?>
			<a href="<?php echo $pinterest ?>"><i class="fa fa-pinterest"></i></a>
		<?php } ?>

		<?php if( $rss ) { ?>
			<a href="<?php echo $rss ?>"><i class="fa fa-rss"></i></a>
		<?php } ?>

		<?php if( $soundcloud ) { ?>
			<a href="<?php echo $soundcloud ?>"><i class="fa fa-soundcloud"></i></a>
		<?php } ?>

		<?php if( $tumblr ) { ?>
			<a href="<?php echo $tumblr ?>"><i class="fa fa-tumblr"></i></a>
		<?php } ?>

		<?php if( $twitter ) { ?>
			<a href="<?php echo $twitter ?>"><i class="fa fa-twitter"></i></a>
		<?php } ?>

	</div>

	<div class="meta pad-0-1-2">

		<?php if( $footer_credits ) {
			echo( $footer_credits );
		} else { ?>
			&copy; <?php echo date( 'Y' );?> <a href="<?php echo home_url(); ?>"><strong><?php bloginfo( 'name' ); ?></strong></a> - <?php _e( 'All Rights Reserved.', 'kouki' ); ?>
		<?php } ?>

	</div>

</footer>

</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>