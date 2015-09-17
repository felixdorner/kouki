<?php
/**
 * Welcome screen intro template
 */
?>
<?php
$kouki = wp_get_theme( 'kouki' );

?>
<h1 style="margin-right: 0;"><?php echo '<strong>Kouki</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( $kouki['Version'] ) . '</sup>'; ?></h1>
<p style="font-size: 1.2em;margin: 0 0 2em;"><?php esc_html_e( 'Awesome! You\'ve decided to use Kouki as your theme.', 'kouki' ); ?></p>

<div id="col-container">
	<div id="col-right" style="padding-left: 30px;">		
		<h4 style="margin-top:0;"><?php esc_html_e( 'About this Theme', 'kouki' ); ?></h4>
		<p><?php echo esc_attr( $kouki['Description'] ); ?></p>
		<h4><?php esc_html_e( 'Recommended Plugins', 'kouki' ); ?></h4>		
		<p><?php echo sprintf( esc_html__( 'To get the most out of Kouki you should install and activate the following Plugin: %sOptions Framework%s', 'kouki' ), '<a href="https://wordpress.org/plugins/options-framework/">', '</a>' ); ?></p>
		<h4><?php esc_html_e( 'Can I Contribute?', 'kouki' ); ?></h4>
		<p><?php esc_html_e( 'Found a bug? Want to contribute a patch or create a new feature? GitHub is the place to go! Or would you like to translate Kouki in to your language? Get involved at Transifex.', 'kouki' ); ?></p>
		<p><a href="https://github.com/felixdorner/kouki" class="button"><?php esc_html_e( 'Kouki at GitHub', 'kouki' ); ?></a> <a href="https://www.transifex.com/felix-dorner/kouki" class="button"><?php _e( 'Kouki at Transifex', 'kouki' ); ?></a></p>
		<h4><?php esc_html_e( 'Are you enjoying Kouki?', 'kouki' ); ?></h4>
		<p><?php echo sprintf( esc_html__( 'Why not leave a review on %sWordPress.org%s? I would really appreciate it! :-)', 'kouki' ), '<a href="https://wordpress.org/themes/kouki">', '</a>' ); ?></p>
	</div>

	<div id="col-left">
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="kouki" class="image-50" width="440" />
	</div>
</div>

<p style="font-size: 1.2em; padding: 1.618em 0; margin: 1.618em 0 2.618em 0; border-top: 1px solid rgba(0,0,0,0.1); border-bottom: 1px solid rgba(0,0,0,0.1);">
	<?php echo sprintf( esc_html__( 'Looking for more themes? Take a look at my collection. %sMore themes &rarr;%s', 'kouki' ), '<a href="http://felixdorner.com" class="button-primary" style="float: right;">', '</a>' ); ?>
</p>

<p>And don't forget to follow the bird: <a style="text-decoration:none;" href="https://twitter.com/felixdorner"><i class="dashicons dashicons-twitter" style="margin-left:0.6em;"></i></a></p>