<?php
/**
* The template for displaying the footer.
*
* @package kouki
*/
?>

<footer id="colophon" class="col-12 aligncenter">

	<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
		<hr>
	  <div class="footer-links">	  	
	  	<?php	dynamic_sidebar( 'footer-1' ); ?>
	  </div>
	<?php } ?>

	<div class="social pad-2-1-0">
		
		<hr>

		<?php
		$footer_credits = of_get_option( 'kouki_footer_credits' );
		$behance = of_get_option( 'kouki_behance' );
		$dribbble = of_get_option( 'kouki_dribbble' );
		$facebook = of_get_option( 'kouki_facebook' );
		$instagram = of_get_option( 'kouki_instagram' );
		$linkedin = of_get_option( 'kouki_linkedin' );
		$mail = of_get_option( 'kouki_mail' );
		$pinterest = of_get_option( 'kouki_pinterest' );
		$rss = of_get_option( 'kouki_rss' );
		$soundcloud = of_get_option( 'kouki_soundcloud' );
		$tumblr = of_get_option( 'kouki_tumblr' );
		$twitter = of_get_option( 'kouki_twitter' );
		?>

		<?php if( $behance ) { ?>
			<a href="<?php echo esc_url($behance); ?>"><i class="fa fa-behance"></i></a>
		<?php } ?>

		<?php if( $dribbble ) { ?>
			<a href="<?php echo esc_url($dribbble); ?>"><i class="fa fa-dribbble"></i></a>
		<?php } ?>

		<?php if( $facebook ) { ?>
			<a href="<?php echo esc_url($facebook); ?>"><i class="fa fa-facebook"></i></a>
		<?php } ?>

		<?php if( $instagram ) { ?>
			<a href="<?php echo esc_url($instagram); ?>"><i class="fa fa-instagram"></i></a>
		<?php } ?>

		<?php if( $linkedin ) { ?>
			<a href="<?php echo esc_url($linkedin); ?>"><i class="fa fa-linkedin"></i></a>
		<?php } ?>

		<?php if( $mail ) { ?>
			<a href="mailto:<?php echo esc_html($mail); ?>"><i class="fa fa-envelope-o"></i></a>
		<?php } ?>

		<?php if( $pinterest ) { ?>
			<a href="<?php echo esc_url($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
		<?php } ?>

		<?php if( $rss ) { ?>
			<a href="<?php echo esc_url($rss); ?>"><i class="fa fa-rss"></i></a>
		<?php } ?>

		<?php if( $soundcloud ) { ?>
			<a href="<?php echo esc_url($soundcloud); ?>"><i class="fa fa-soundcloud"></i></a>
		<?php } ?>

		<?php if( $tumblr ) { ?>
			<a href="<?php echo esc_url($tumblr); ?>"><i class="fa fa-tumblr"></i></a>
		<?php } ?>

		<?php if( $twitter ) { ?>
			<a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-twitter"></i></a>
		<?php } ?>

	</div>

	<div class="meta pad-0-1-2">

		<?php if( $footer_credits ) {
			echo esc_html( $footer_credits );
		} else { ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kouki' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'kouki' ), 'WordPress' ); ?></a> |
			<a href="<?php echo esc_url( __( 'http://felixdorner.com/', 'kouki' ) ); ?>">
				<?php printf( __( 'Theme by %s', 'kouki' ), 'Felix Dorner' ); ?>
			</a>
		<?php } ?>

	</div>

</footer>

</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>