<?php
/**
 * The theme option name is set as 'kouki' here.
 *
 * This option name will be used later when we set up the options
 * for the front end theme customizer.
 */
function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');

	$optionsframework_settings['id'] = 'kouki';
	update_option('optionsframework', $optionsframework_settings);

}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 */
function optionsframework_options() {

	$options = array();

	$options[] = array( "name" => __('General','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Logo','kouki'),
						"desc" => __('Upload a custom logo.','kouki'),
						"id" => "kouki_logo",
						"type" => "upload");

	$options[] = array( "name" => __('Hide Description','kouki'),
						"desc" => __('Do you like to hide the blog description?','kouki'),
						"id" => "kouki_blog_description",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Deactivate Lightbox','kouki'),
						"desc" => __('Deactivate the lightbox feature in case you have issues with another lightbox plugin.','kouki'),
						"id" => "kouki_lightbox",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Colors','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Text Color','kouki'),
						"desc" => __('Select a text-color for your theme.','kouki'),
						"id" => "kouki_text_color",
						"std" => "#151515",
						"type" => "color");

	$options[] = array( "name" => __('Headline Color','kouki'),
						"desc" => __('Select a color for your headlines.','kouki'),
						"id" => "kouki_headline_color",
						"std" => "#151515",
						"type" => "color");

	$options[] = array( "name" => __('Link Color','kouki'),
						"desc" => __('Select a color for your links.','kouki'),
						"id" => "kouki_link_color",
						"std" => "#c0c0c0",
						"type" => "color");

	$options[] = array( "name" => __('Positive Buttons','kouki'),
						"desc" => __('Select a color for positive buttons.','kouki'),
						"id" => "kouki_btn_positive",
						"std" => "#2ecc71",
						"type" => "color");

	$options[] = array( "name" => __('Negative Buttons','kouki'),
						"desc" => __('Select a color for negative buttons.','kouki'),
						"id" => "kouki_btn_negative",
						"std" => "#ff4136",
						"type" => "color");

	$options[] = array( "name" => __('Extra Buttons','kouki'),
						"desc" => __('Select a color for extra buttons.','kouki'),
						"id" => "kouki_btn_extra",
						"std" => "#0d8eff",
						"type" => "color");

	$options[] = array( "name" => __('Meta Text','kouki'),
						"desc" => __('Select a color for meta texts, section dividers and other small texts.','kouki'),
						"id" => "kouki_meta_color",
						"std" => "#c0c0c0",
						"type" => "color");

	$options[] = array( "name" => __('Fonts','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Primary Font','kouki'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for texts.','kouki'),
						"id" => "kouki_primary_font",
						"std" => "Open Sans",
						"type" => "text");

	$options[] = array( "name" => __('Secondary Font','kouki'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for headings. Hint: Leave blank if you do not want to load this style.','kouki'),
						"id" => "kouki_secondary_font",
						"std" => "Julius Sans One",
						"type" => "text");

	$options[] = array( "name" => __('Posts','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Show Excerpts','kouki'),
						"desc" => __('Check this box to show the excerpt on index and archive pages instead of the full content.','kouki'),
						"id" => "kouki_show_excerpt",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Author','kouki'),
						"desc" => __('Check this box to show the author.','kouki'),
						"id" => "kouki_post_show_author",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Date','kouki'),
						"desc" => __('Check this box to show the publish date.','kouki'),
						"id" => "kouki_post_show_date",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Category','kouki'),
						"desc" => __('Check this box to show the category.','kouki'),
						"id" => "kouki_post_show_category",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Comment-Count','kouki'),
						"desc" => __('Check this box to show the comment count.','kouki'),
						"id" => "kouki_post_show_comments",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Tags','kouki'),
						"desc" => __('Check this box to show tags on single articles below the content.','kouki'),
						"id" => "kouki_post_show_tags",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Featured-Image','kouki'),
						"desc" => __('Check this box to show the featured image on single posts.','kouki'),
						"id" => "kouki_post_show_featured_image",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Footer','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Mail Icon','kouki'),
						"desc" => __('Enter your Email Address if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_mail",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('RSS Feed Icon','kouki'),
						"desc" => __('Enter the link to your RSS Feed if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_rss",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Behance Icon','kouki'),
						"desc" => __('Enter the link to your Behance page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_behance",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Dribbble Icon','kouki'),
						"desc" => __('Enter the link to your Dribbble page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_dribbble",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Facebook Icon','kouki'),
						"desc" => __('Enter the link to your Facebook page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_facebook",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Instagram Icon','kouki'),
						"desc" => __('Enter the link to your Instagram page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_instagram",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: LinkedIn Icon','kouki'),
						"desc" => __('Enter the link to your LinkedIn page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_linkedin",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Pinterest Icon','kouki'),
						"desc" => __('Enter the link to your Pinterest page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_pinterest",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: SoundCloud Icon','kouki'),
						"desc" => __('Enter the link to your SoundCloud page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_soundcloud",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Tumblr Icon','kouki'),
						"desc" => __('Enter the link to your Tumblr page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_tumblr",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Social: Twitter Icon','kouki'),
						"desc" => __('Enter the link to your Twitter page if you like to display the icon at the bottom of the footer.','kouki'),
						"id" => "kouki_twitter",
						"std" => "",
						"type" => "text" );

	$options[] = array( "name" => __('Footer-credits','kouki'),
						"desc" => __('The text will appear below the footer.','kouki'),
						"id" => "kouki_footer_credits",
						"std" => "",
						"type" => "textarea");

return $options;

}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */
add_action( 'customize_register', 'kouki_customizer_register' );
function kouki_customizer_register( $wp_customize ) {

	// Fonts

	$wp_customize->add_section( 'kouki_customizer_fonts', array(
		'title' => __( 'Fonts', 'kouki' ),
		'priority' => 20
	) );

	$wp_customize->add_setting( 'kouki[kouki_primary_font]', array(
		'default' => 'Open Sans',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'kouki_primary_font', array(
		'label' => __( 'Primary Font', 'kouki' ),
		'section' => 'kouki_customizer_fonts',
		'settings' => 'kouki[kouki_primary_font]',
		'type' => 'text',
		'priority' => 1
	) );

	$wp_customize->add_setting( 'kouki[kouki_secondary_font]', array(
		'default' => 'Julius Sans One',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'kouki_secondary_font', array(
		'label' => __( 'Secondary Font', 'kouki' ),
		'section' => 'kouki_customizer_fonts',
		'settings' => 'kouki[kouki_secondary_font]',
		'type' => 'text',
		'priority' => 2
	) );

	$wp_customize->get_section( 'kouki_customizer_fonts' )->description = __( 'Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for texts.', 'kouki' );

	// Colors

	$wp_customize->add_section( 'kouki_customizer_colors', array(
		'title' => __( 'Colors', 'kouki' ),
		'priority' => 30
	) );

	$wp_customize->add_setting( 'kouki[kouki_text_color]', array(
		'default' => '#151515',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'   => __( 'Text Color', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_text_color]',
		'priority' => 1
	) ) );

	$wp_customize->add_setting( 'kouki[kouki_headline_color]', array(
		'default' => '#151515',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headline_color', array(
		'label'   => __( 'Headline Color', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_headline_color]',
		'priority' => 2
	) ) );

	$wp_customize->add_setting( 'kouki[kouki_link_color]', array(
		'default' => '#C0C0C0',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'   => __( 'Link Color', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_link_color]',
		'priority' => 3
	) ) );

	$wp_customize->add_setting( 'kouki[kouki_btn_positive]', array(
		'default' => '#2ECC71',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_positive', array(
		'label'   => __( 'Positive Buttons', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_btn_positive]',
		'priority' => 4
	) ) );

	$wp_customize->add_setting( 'kouki[kouki_btn_negative]', array(
		'default' => '#FF4136',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_negative', array(
		'label'   => __( 'Negative Buttons', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_btn_negative]',
		'priority' => 5
	) ) );

	$wp_customize->add_setting( 'kouki[kouki_btn_extra]', array(
		'default' => '#0D8EFF',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_extra', array(
		'label'   => __( 'Extra Buttons', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_btn_extra]',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'kouki[kouki_meta_color]', array(
		'default' => '#C0C0C0',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_color', array(
		'label'   => __( 'Meta Text', 'kouki' ),
		'section' => 'kouki_customizer_colors',
		'settings'   => 'kouki[kouki_meta_color]',
		'priority' => 7
	) ) );

	$wp_customize->get_section( 'kouki_customizer_colors' )->description = __( 'Change theme colors.', 'kouki' );

	// Remove
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');

}
