<?php
/**
 * Apply style options from the options framework
 *
 * @package kouki
 * @subpackage Options Framework
 */

function kouki_theme_styles() { ?>

  <style type="text/css" media="screen">

    <?php $testimonials_bg = of_get_option('kouki_testimonials_bg'); ?>
    <?php if ($testimonials_bg) : ?>
      section.testimonials {
        background: <?php echo $testimonials_bg; ?>;
      }
    <?php endif; ?>

    <?php $cta_bg = of_get_option('kouki_cta_bg'); ?>
    <?php if ($cta_bg) : ?>
      .call-to-action {
        background: <?php echo $cta_bg; ?>;
      }
    <?php endif; ?>

    <?php $footer_bg = of_get_option('kouki_footer_bg'); ?>
    <?php if ($footer_bg) : ?>
      footer {
        background: <?php echo $footer_bg; ?>;
      }
    <?php endif; ?>

    /**
     * Text Colors
     */
    <?php $text_color = of_get_option('kouki_text_color'); ?>
    <?php if ($text_color) : ?>
      body, .tb-logo h1, .projects .meta {
        color: <?php echo $text_color; ?>;
      }
    <?php endif; ?>

    <?php $headline_color = of_get_option('kouki_headline_color'); ?>
    <?php if ($headline_color) : ?>
      h1, h2, h3, h4, h5, h6, .widgetitle
      h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
      .projects .meta {
        color: <?php echo $headline_color; ?>;
      }
    <?php endif; ?>

    <?php $link_color = of_get_option('kouki_link_color'); ?>
    <?php if ($link_color) : ?>
      a {
        color: <?php echo $link_color; ?>;
      }
    <?php endif; ?>

    <?php $btn_neutral = of_get_option('kouki_text_color'); ?>
    <?php if ($btn_neutral) : ?>
      a.btn-neutral,
      .pagination a,
      #infinite-handle span {
        color: <?php echo $btn_neutral; ?>;
        border: 1px solid <?php echo $btn_neutral; ?>;
      }
    <?php endif; ?>

    <?php $btn_positive = of_get_option('kouki_btn_positive'); ?>
    <?php if ($btn_positive) : ?>
      a.btn-positive,
      input[type=submit] {
        color: <?php echo $btn_positive; ?>;
        border: 1px solid <?php echo $btn_positive; ?>;
      }
    <?php endif; ?>

    <?php $btn_negative = of_get_option('kouki_btn_negative'); ?>
    <?php if ($btn_negative) : ?>
      a.btn-negative {
        color: <?php echo $btn_negative; ?>;
        border: 1px solid <?php echo $btn_negative; ?>;
      }
    <?php endif; ?>

    <?php $btn_extra = of_get_option('kouki_btn_extra'); ?>
    <?php if ($btn_extra) : ?>
      a.btn-extra {
        color: <?php echo $btn_extra; ?>;
        border: 1px solid <?php echo $btn_extra; ?>;
      }
    <?php endif; ?>

    <?php $meta_color = of_get_option('kouki_meta_color'); ?>
    <?php if ($meta_color) : ?>
      .meta, .wp-caption-text {
        color: <?php echo $meta_color; ?>;
      }
    <?php endif; ?>

    <?php $testimonials_color = of_get_option('kouki_testimonials_color'); ?>
    <?php if ($testimonials_color) : ?>
      section.testimonials,
      section.testimonials .meta,
      section.testimonials a {
        color: <?php echo $testimonials_color; ?>;
      }
    <?php endif; ?>

    <?php $cta_color = of_get_option('kouki_cta_color'); ?>
    <?php if ($cta_color) : ?>
      .call-to-action .meta,
      .call-to-action a.btn-neutral {
        color: <?php echo $cta_color; ?>;
      }
      .call-to-action a.btn-neutral {
        border: 1px solid <?php echo $cta_color; ?>;
      }
    <?php endif; ?>

    <?php $footer_color = of_get_option('kouki_footer_color'); ?>
    <?php if ($footer_color) : ?>
      footer, footer a, footer .meta {
        color: <?php echo $footer_color; ?>;
      }
    <?php endif; ?>

    /**
     * Fonts
     */
    <?php $logo_font = of_get_option('kouki_logo_font'); ?>
    <?php if ($logo_font) : ?>
      .tb-logo h1 {
        font-family: '<?php echo $logo_font; ?>';
      }
    <?php endif; ?>

    <?php $primary_font = of_get_option('kouki_primary_font'); ?>
    <?php if ($primary_font) : ?>
      body, h2.meta  {
        font-family: '<?php echo $primary_font; ?>';
      }
    <?php endif; ?>

    <?php $secondary_font = of_get_option('kouki_secondary_font'); ?>
    <?php if ($secondary_font) : ?>
      h1, h2, h3, h4, h5, h6, blockquote, .widgetitle {
        font-family: '<?php echo $secondary_font; ?>';
      }
    <?php endif; ?>

  </style>

<?php }
add_action( 'wp_head', 'kouki_theme_styles' );