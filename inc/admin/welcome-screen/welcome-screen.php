<?php
/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class kouki_Welcome {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'kouki_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'kouki_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'kouki_welcome_style' ) );

		add_action( 'kouki_welcome', array( $this, 'kouki_welcome_intro' ), 				10 );		

	} // end constructor

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.7.0
	 */
	public function kouki_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // input var okay
			add_action( 'admin_notices', array( $this, 'kouki_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.7.0
	 */
	public function kouki_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Thanks for choosing Kouki! Visit the %swelcome screen%s to get started.', 'kouki' ), '<a href="' . esc_url( admin_url( 'themes.php?page=kouki-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=kouki-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Kouki', 'kouki' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css
	 * @return void
	 * @since  1.7.0
	 */
	public function kouki_welcome_style( $hook_suffix ) {		

		if ( 'appearance_page_kouki-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'kouki-welcome-screen', get_template_directory_uri() . '/inc/admin/css/welcome.css','20150916' );
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
		}
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.7.0
	 */
	public function kouki_welcome_register_menu() {
		add_theme_page( 'Kouki', 'Kouki', 'activate_plugins', 'kouki-welcome', array( $this, 'kouki_welcome_screen' ) );
	}

	/**
	 * The welcome screen
	 * @since 1.7.0
	 */
	public function kouki_welcome_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="wrap about-wrap">

			<?php
			/**
			 * @hooked kouki_welcome_intro - 10			 
			 */
			do_action( 'kouki_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Welcome screen intro
	 * @since 1.7.0
	 */
	public function kouki_welcome_intro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/intro.php' );
	}

}

$GLOBALS['kouki_Welcome'] = new kouki_Welcome();
