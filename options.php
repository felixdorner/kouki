<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$theme = wp_get_theme();
	$themename = $theme->Name;
	$themename = preg_replace("/\W/", "", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	// Array for numbers
	$numbers = array(
		'two' => __('Two', 'kouki'),
		'three' => __('Three', 'kouki')
	);

	// Array for Buttons
	$buttons = array(
		'btn-neutral' => __('Neutral', 'kouki'),
		'btn-positive' => __('Positive', 'kouki'),
		'btn-negative' => __('Negative', 'kouki'),
		'btn-extra' => __('Extra', 'kouki')
	);

	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';

	$options = array();

	$options[] = array( "name" => __('General','kouki'),
						"type" => "heading");	

	$options[] = array( "name" => __('Logo','kouki'),
						"desc" => __('Upload a custom logo.','kouki'),
						"id" => "kouki_logo",
						"type" => "upload");

	$options[] = array( "name" => __('Favicon','kouki'),
						"desc" => __('Upload a custom favicon.','kouki'),
						"id" => "kouki_favicon",
						"type" => "upload");

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

	$options[] = array( "name" => __('Module: CTA Background','kouki'),
						"desc" => __('Select a background-color for the call-to-action module if activated.','kouki'),
						"id" => "kouki_cta_bg",
						"std" => "#eeeeee",
						"type" => "color");

	$options[] = array( "name" => __('Module: CTA Text','kouki'),
						"desc" => __('Select a text-color for the call-to-action module if activated.','kouki'),
						"id" => "kouki_cta_color",
						"std" => "#c0c0c0",
						"type" => "color");

	$options[] = array( "name" => __('Footer Background','kouki'),
						"desc" => __('Select a background-color for the footer.','kouki'),
						"id" => "kouki_footer_bg",
						"std" => "#f5f5f5",
						"type" => "color");

	$options[] = array( "name" => __('Footer Text','kouki'),
						"desc" => __('Select a text-color for the footer.','kouki'),
						"id" => "kouki_footer_color",
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

	$options[] = array( "name" => __('Logo Font','kouki'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the logo. Hint: Leave blank if you do not want to load this style.','kouki'),
						"id" => "kouki_logo_font",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Front Page','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Hero Message','kouki'),
						"desc" => __('Here you can include a bold statement to introduce your site. If nothing is typed, the section will not be displayed.','kouki'),
						"id" => "kouki_message",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => __('Project Count','kouki'),
						"desc" => __('How many projects do you like to display? This theme uses the portolio post-type of the Jetpack plugin. Hint: This section only displays projects, which are tagged as "featured"! If zero is typed, the section will not be displayed.','kouki'),
						"id" => "kouki_home_project_count",
						"std" => "6",
						"type" => "text");

	$options[] = array( "name" => __('Section Title: Recent-News','kouki'),
						"desc" => __('Set a title for the recent-news section. If nothing is typed, the title will not be displayed.','kouki'),
						"id" => "kouki_home_blog_title",
						"std" => "Recent News",
						"type" => "text");

	$options[] = array( "name" => __('Post Count','kouki'),
						"desc" => __('How many articles do you like to show on the front-page? If zero is typed, the whole section including the title set above will not be displayed.','kouki'),
						"id" => "kouki_home_post_count",
						"std" => "4",
						"type" => "text");

	$options[] = array( "name" => __('Show Featured Image','kouki'),
						"desc" => __('Check this box to show the featured image for posts on the front-page.','kouki'),
						"id" => "kouki_home_post_show_featured_image",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Portfolio','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Project Columns','kouki'),
						"desc" => __('Select the number of columns in which to display your projects on home- & archive-pages.','kouki'),
						"id" => "kouki_project_columns",
						"std" => "two",
						"type" => "radio",
						"options" => $numbers );

	$options[] = array( "name" => __('Show Project-Type','kouki'),
						"desc" => __('Check this box if you like to display the project-type.','kouki'),
						"id" => "kouki_portfolio_show_type",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Portfolio-Tags','kouki'),
						"desc" => __('Check this box to show the portfolio-tags below the content of single portfolio items.','kouki'),
						"id" => "kouki_portfolio_show_tags",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Show Featured Image','kouki'),
						"desc" => __('Check this box to show the featured image on single portfolio items.','kouki'),
						"id" => "kouki_portfolio_show_featured_image",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Posts','kouki'),
						"type" => "heading");

	$options[] = array( "name" => __('Enable Full-Width','kouki'),
						"desc" => __('Check this box to make your posts span the width of the page. The sidebar will disappear.','kouki'),
						"id" => "kouki_full_width",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "On which page you are displaying the blog?",
						"desc" => "This is used to show the right title at the top of your blog-page.",
						"id" => "kouki_blog_page",
						"type" => "select",
						"options" => $options_pages);

	$options[] = array( "name" => __('Show Full Posts','kouki'),
						"desc" => __('Check this box to show the full post on index and archive pages instead of the excerpt.','kouki'),
						"id" => "kouki_show_full_post",
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

	$options[] = array( "name" => __('Module CTA: Your promotion text','kouki'),
						"desc" => __('Type a little text to advertise your call-to-action button. If nothing is typed, this section will not be displayed.','kouki'),
						"id" => "kouki_cta_text",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Module CTA: Button-label','kouki'),
						"desc" => __('Enter a name for your call-to-action button.','kouki'),
						"id" => "kouki_cta_button_label",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Module CTA: Button-link','kouki'),
						"desc" => __('Enter a link for the button.','kouki'),
						"id" => "kouki_cta_button_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Module CTA: Button-Style','kouki'),
						"desc" => __('Select a style for your Button.','kouki'),
						"id" => "kouki_cta_button_style",
						"std" => "btn-positive",
						"type" => "radio",
						"options" => $buttons );

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
function kouki_customizer_register($wp_customize) {
	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	$options = optionsframework_options();

	/* Fonts */

	$wp_customize->add_section( 'kouki_fonts', array(
		'title' => __( 'Fonts', 'kouki' ),
		'priority' => 20
	) );

	$wp_customize->add_setting( 'kouki[kouki_primary_font]', array(
		'default' => $options['kouki_primary_font']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'kouki_primary_font', array(
			'label' => __( 'Primary Font', 'kouki' ),
			'section' => 'kouki_fonts',
			'settings' => 'kouki[kouki_primary_font]',
			'type' => $options['kouki_primary_font']['type'],
			'priority' => 1
		) );

	$wp_customize->add_setting( 'kouki[kouki_secondary_font]', array(
		'default' => $options['kouki_secondary_font']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'kouki_secondary_font', array(
			'label' => __( 'Secondary Font', 'kouki' ),
			'section' => 'kouki_fonts',
			'settings' => 'kouki[kouki_secondary_font]',
			'type' => $options['kouki_secondary_font']['type'],
			'priority' => 2
		) );

	$wp_customize->add_setting( 'kouki[kouki_logo_font]', array(
		'default' => $options['kouki_logo_font']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'kouki_logo_font', array(
			'label' => __( 'Logo Font', 'kouki' ),
			'section' => 'kouki_fonts',
			'settings' => 'kouki[kouki_logo_font]',
			'type' => $options['kouki_logo_font']['type'],
			'priority' => 3
		) );

	$wp_customize->get_section( 'kouki_fonts' )->description = __( 'Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for texts.', 'kouki' );

	/* Colors */

	$wp_customize->add_section( 'kouki_colors', array(
		'title' => __( 'Colors', 'kouki' ),
		'priority' => 30
	) );

	$wp_customize->add_setting( 'kouki[kouki_text_color]', array(
		'default' => $options['kouki_text_color']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
			'label'   => __( 'Text Color', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_text_color]',
			'priority' => 1
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_headline_color]', array(
		'default' => $options['kouki_headline_color']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headline_color', array(
			'label'   => __( 'Headline Color', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_headline_color]',
			'priority' => 2
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_link_color]', array(
		'default' => $options['kouki_link_color']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label'   => __( 'Link Color', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_link_color]',
			'priority' => 3
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_btn_positive]', array(
		'default' => $options['kouki_btn_positive']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_positive', array(
			'label'   => __( 'Positive Buttons', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_btn_positive]',
			'priority' => 4
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_btn_negative]', array(
		'default' => $options['kouki_btn_negative']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_negative', array(
			'label'   => __( 'Negative Buttons', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_btn_negative]',
			'priority' => 5
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_btn_extra]', array(
		'default' => $options['kouki_btn_extra']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_extra', array(
			'label'   => __( 'Extra Buttons', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_btn_extra]',
			'priority' => 6
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_meta_color]', array(
		'default' => $options['kouki_meta_color']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_color', array(
			'label'   => __( 'Meta Text', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_meta_color]',
			'priority' => 7
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_cta_color]', array(
		'default' => $options['kouki_cta_color']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_color', array(
			'label'   => __( 'Module: CTA Text', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_cta_color]',
			'priority' => 10
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_cta_bg]', array(
		'default' => $options['kouki_cta_bg']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg', array(
			'label'   => __( 'Module: CTA Background', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_cta_bg]',
			'priority' => 11
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_footer_color]', array(
		'default' => $options['kouki_footer_color']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
			'label'   => __( 'Footer Text', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_footer_color]',
			'priority' => 12
		) ) );

	$wp_customize->add_setting( 'kouki[kouki_footer_bg]', array(
		'default' => $options['kouki_footer_bg']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
			'label'   => __( 'Footer Background', 'kouki' ),
			'section' => 'kouki_colors',
			'settings'   => 'kouki[kouki_footer_bg]',
			'priority' => 13
		) ) );

	$wp_customize->get_section( 'kouki_colors' )->description = __( 'Change theme colors.', 'kouki' );

	/* Remove */
	$wp_customize->remove_section( 'title_tagline');
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');

}
