<?php
/**
 * Custom Template for popup page
 * File: popup-genesis-template.php
 *
 */

// Add custom body class to the head
add_filter( 'body_class', 'cc_add_body_popup_class' );

function cc_add_body_popup_class( $classes ) {
	$classes[] = 'pop-up';
return $classes;
}

// add close button
add_action ( 'genesis_after_content', 'cc_close_window' );

function cc_close_window() {
	echo '<a class="close-popup" href="JavaScript:window.close()"><span>&times;</span></a>';
}

// Remove header, navigation, breadcrumbs, footer widgets, footer
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_before_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
remove_action(' genesis_after_post_content', 'genesis_post_meta' );
remove_action(' genesis_before_post_content', 'genesis_post_info' );

remove_filter( 'plugin_row_meta', 'cc_popup_meta_links', 5  );

remove_action( 'genesis_entry_header', 'cc_goback', 15 );
remove_action( 'genesis_entry_footer', 'cc_goback', 15 );

genesis();