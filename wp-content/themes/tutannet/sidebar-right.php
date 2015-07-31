<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package TuTanNet
 */

if ( ! is_active_sidebar( 'tutannet-sidebar-right' ) ) {
	return;
}
?>

<div id="secondary-right-sidebar" class="widget-area" role="complementary">
	<div id="secondary">
		<?php dynamic_sidebar( 'tutannet-sidebar-right' ); ?>
	</div>
</div><!-- #secondary -->