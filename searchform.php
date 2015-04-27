<?php
/**
 * The template for searchforms
 *
 * @package kouki
 */

$search_text = __( 'Type and press enter to search.', 'kouki' ); ?>

<form method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>/">

  <input type="text" value="<?php echo $search_text; ?>"   name="s" id="s"
  onblur="if (this.value == '')   {this.value = '<?php echo $search_text; ?>';}"
  onfocus="if (this.value == '<?php echo $search_text; ?>'){this.value = '';}" />

  <input type="hidden" id="searchsubmit" />

</form>