<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package TuTanNet
 */

if ( ! is_active_sidebar( 'tutannet-sidebar-1' ) ) {
	return;
}
?>
<div id="secondary-right-sidebar">
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'tutannet-sidebar-1' ); ?>
</div><!-- #secondary -->
</div>