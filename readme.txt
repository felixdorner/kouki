=== Kouki WordPress Theme ===
Contributers: Felix Dorner
Donate link: http://drnr.co
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: gray, white, light, one-column, responsive-layout, custom-colors, custom-menu, editor-style, featured-images, theme-options, threaded-comments, translation-ready
Requires at least: 3.8
Tested up to: 4.2

A beautiful and minimal theme for personal blogs. Kouki is meant for publishers who like to display their content in a delightful and minimal way. Ideal for food blogs, photographers, minimalists, tumble logs and everyone else who likes an unobstrusive WordPress theme. Non-mandatory theme options help you to individualize the theme to your needs. Change colors, choose fonts from the Google libary and add social icons. The theme is responsive and looks good on small devices.

== Description ==

A beautiful and minimal theme for personal blogs. Kouki is meant for publishers who like to display their content in a delightful and minimal way. Ideal for food blogs, photographers, minimalists, tumble logs and everyone else who likes an unobstrusive WordPress theme. Non-mandatory theme options help you to individualize the theme to your needs. Change colors, choose fonts from the Google libary and add social icons. The theme is responsive and looks good on small devices.

== Installation ==
1. Sign into your WordPress dashboard, go to Appearance > Themes, and click Add New.
2. Click Upload.
3. Click Choose File and select the theme zip file.
4. Click Install Now.
5. After WordPress installs the theme, click Activate.
6. You've successfully installed your new theme!

== Frequently Asked Questions ==

= Where is the post meta like categories, tags & author?  =

You can control which meta data to output if you activate the theme options - else post meta is hidden.

= How to activate the theme options? =

1. On theme activation you will recognize a message recommending to install the Options Framework plugin.
2. Install & activate the plugin.
3. Find the options panel in your dashboard under 'Appearance' -> 'Theme Options'.

= How to show buttons? =

1. Add a link in the editor.
2. Switch from visual to text mode.
3. Add the desired classes to the link:
	a. btn btn-neutral
	b. btn btn-positive
	c. btn btn-negative
	d. btn btn-extra

= I need more help! What should I do? =

Ping me on Twitter (@felixdorner) and I'll try to help you.

== Screenshots ==

1. The theme home page filled with demo content.

== Change Log ==

= 1.6 =
* Translate "Read More &rarr;" in functions.php
* Add copyright statement
* Escaped the CSS theme options (style-options.php) on output.
* Escape all instances of home_url(); as esc_url( home_url(/) );
* Minor bugfixes

= 1.5 =
* Fixed php notices within options

= 1.4 =
* Options Framework is only recommended instead of required
* Implemented non-minified vendor scripts/styles
* Improved readme documentation
* Minor style improvements
* Bugfix: Double comment output on pages
* Added escaping for dynamic output

= 1.3 =
* Fixed bug on theme activation
* Added sanitization for customizer options
* Changed screenshot

= 1.2 =
* Improved concept

= 1.0 =
* Initial release

== Known issues ==
* Jetpack Infinite Scroll causes problems with the masonry structure