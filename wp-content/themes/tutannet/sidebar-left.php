<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package TuTanNet
 */

if ( ! is_active_sidebar( 'tutannet-sidebar-left' ) ) {
	return;
}
?>

<div id="secondary-left-sidebar" class="" role="complementary">
	<div id="secondary">
		<?php dynamic_sidebar( 'tutannet-sidebar-left' ); ?>
	</div>
</div><!-- #secondary -->