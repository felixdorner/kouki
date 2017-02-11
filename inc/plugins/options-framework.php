<?php
/**
 * Apply style options from the options framework
 *
 * @package kouki
 * @subpackage Options Framework
 * @since 1.0.0
 */

function kouki_theme_styles() { ?>

  <style type="text/css" media="screen">

    /**
     * Text Colors
     */
    <?php $text_color = of_get_option('kouki_text_color'); ?>
    <?php if ($text_color) : ?>
      body {
        color: <?php echo esc_attr($text_color); ?>;
      }
    <?php endif; ?>

    <?php $headline_color = of_get_option('kouki_headline_color'); ?>
    <?php if ($headline_color) : ?>
      h1, h2, h3, h4, h5, h6, .widgetitle
      h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
        color: <?php echo esc_attr($headline_color); ?>;
      }
    <?php endif; ?>

    <?php $link_color = of_get_option('kouki_link_color'); ?>
    <?php if ($link_color) : ?>
      a {
        color: <?php echo esc_attr($link_color); ?>;
      }
    <?php endif; ?>

    <?php $btn_neutral = of_get_option('kouki_text_color'); ?>
    <?php if ($btn_neutral) : ?>
      a.btn-neutral,
      .pagination a,
      #infinite-handle span {
        color: <?php echo esc_attr($btn_neutral); ?>;
        border: 1px solid <?php echo esc_attr($btn_neutral); ?>;
      }
    <?php endif; ?>

    <?php $btn_positive = of_get_option('kouki_btn_positive'); ?>
    <?php if ($btn_positive) : ?>
      a.btn-positive,
      input[type=submit] {
        color: <?php echo esc_attr($btn_positive); ?>;
        border: 1px solid <?php echo esc_attr($btn_positive); ?>;
      }
    <?php endif; ?>

    <?php $btn_negative = of_get_option('kouki_btn_negative'); ?>
    <?php if ($btn_negative) : ?>
      a.btn-negative {
        color: <?php echo esc_attr($btn_negative); ?>;
        border: 1px solid <?php echo esc_attr($btn_negative); ?>;
      }
    <?php endif; ?>

    <?php $btn_extra = of_get_option('kouki_btn_extra'); ?>
    <?php if ($btn_extra) : ?>
      a.btn-extra {
        color: <?php echo esc_attr($btn_extra); ?>;
        border: 1px solid <?php echo esc_attr($btn_extra); ?>;
      }
    <?php endif; ?>

    <?php $meta_color = of_get_option('kouki_meta_color'); ?>
    <?php if ($meta_color) : ?>
      .meta, .sticky-tag {
        color: <?php echo esc_attr($meta_color); ?>;
      }
    <?php endif; ?>

    /**
     * Fonts
     */
    <?php $primary_font = of_get_option('kouki_primary_font'); ?>
    <?php if ($primary_font) : ?>
      body, h2.meta  {
        font-family: '<?php echo esc_attr($primary_font); ?>';
      }
    <?php endif; ?>

    <?php $secondary_font = of_get_option('kouki_secondary_font'); ?>
    <?php if ($secondary_font) : ?>
      h1, h2, h3, h4, h5, h6, blockquote, .widgetitle {
        font-family: '<?php echo esc_attr($secondary_font); ?>';
      }
    <?php endif; ?>

  </style>

<?php }
add_action( 'wp_head', 'kouki_theme_styles' );

/**
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( ! function_exists( 'of_get_option' ) ) {

  function of_get_option( $name, $default = false ) {
    $optionsframework_settings = get_option( 'optionsframework' );
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];

    if ( get_option( $option_name ) ) {
      $options = get_option( $option_name );
    }

    if ( isset( $options[$name] ) ) {
      return $options[$name];
    } else {
      return $default;
    }
  }

}
