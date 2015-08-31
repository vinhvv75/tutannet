<?php
/*
Plugin Name: Audio Album
Plugin URI: http://cubecolour.co.uk/audio-album
Description: Provides shortcodes to format native WordPress audio players as an album of tracks with additional info
Author: cubecolour
Version: 1.0.4
Author URI: http://cubecolour.co.uk/
License: GPLv2

  Copyright 2013 Michael Atkins
  
  michael@cubecolour.co.uk

  Licenced under the GNU GPL:

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// ==============================================
//	Get Plugin Version
// ==============================================

function cc_audioalbum_plugin_version() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}

// ==============================================
//	Add Links in Plugins Table
// ==============================================
 
add_filter( 'plugin_row_meta', 'cc_audioalbum_meta_links', 10, 2 );
function cc_audioalbum_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);
	
// create the links
	if ( $file == $plugin ) {
		
		$supportlink = 'https://wordpress.org/support/plugin/audio-album';
		$donatelink = 'http://cubecolour.co.uk/wp';
		$reviewlink = 'https://wordpress.org/support/view/plugin-reviews/audio-album#postform';
		$twitterlink = 'http://twitter.com/cubecolour';
		$iconstyle = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"';
		
		return array_merge( $links, array(
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . 'title="Audio Album Support"></span></a>',
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="Cubecolour on Twitter"></span></a>',
			'<a href="' . $reviewlink . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="Review Audio Album"></span></a>',
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="Donate"></span></a>'
		) );
	}
	
	return $links;
}

// ==============================================
// Register & enqueue the script for the popup
// ==============================================

function cc_audiotrackpopup_script() {
	wp_register_script( 'audiotrackpopup', plugins_url() . "/" . basename(dirname(__FILE__)) . '/js/audiotrackpopup.js', array('jquery'), cc_audioalbum_plugin_version(), false );
	wp_enqueue_script( 'audiotrackpopup' );
}
 
add_action('wp_enqueue_scripts', 'cc_audiotrackpopup_script');

// ==============================================
// Prevent unstyled players being shown until the page has fully loaded
// ==============================================

function cc_hide_audio_until_load() {
	echo "\n" . '<script type="text/javascript">jQuery(window).load(function() { jQuery("div.track").show(); });</script>' . "\n";
}

add_action('wp_head', 'cc_hide_audio_until_load');

// ==============================================
// Add stylesheet 
// if custom styles are to be added to the theme, unhook this by adding the following line to the theme's functions.php:
//		remove_action('wp_print_styles', 'cc_audioalbum_css');
// ==============================================

add_action('wp_print_styles', 'cc_audioalbum_css', 30);

function cc_audioalbum_css() {
	wp_enqueue_style('audioalbum.css', plugin_dir_url(__FILE__).'styles/' . 'audioalbum.css' , false, cc_audioalbum_plugin_version() );	
}

// ==============================================
// Shortcode to add Album Title
// Not required
// ==============================================

function cc_audioheading_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'		=> '',
		'label'		=> '',
		'catalog'	=> '',
	), $atts ) );

	return '<h1 class="audioheading">' . $title . '</h1><p class="audioheading">' . $label . ' <span>' . $catalog . '</span></p>';
}

add_shortcode( 'audioheading', 'cc_audioheading_shortcode' );

// ==============================================
// shortcode to add Album Header info and enclose the audio players
// do_shortcode($content) allows the shortcode for each track to be nested inside the album's Shortcode
// ==============================================

function cc_audioalbum_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'		=> '',
		'detail'	=> '',
		'date'		=> '',
	), $atts ) );

	return '<h2 class="audioalbum">' . $title . '</h2>'
	. '<p class="audioalbum">' . $detail . '<span>' . $date .'</span>' . do_shortcode($content) . '</p>';
}

add_shortcode( 'audioalbum', 'cc_audioalbum_shortcode' );

// ==============================================
// Shortcode to add each audio track inside the album
// ==============================================

function cc_audiotrack_shortcode( $atts, $content = null ) {

	$lyricslink= '';
	$popupbutton = '';
	$cc_siteurl = get_bloginfo('url');

	extract( shortcode_atts( array(

		'title' => '',
		'width' => '520',
		'height' => '400',
		'songwriter' => '',
		'buttontext' => 'lyrics',
		'buttonlink' => '#',
		'src' => '',
		'mp3' => '',
		'ogg' => '',
		'wma' => '',
		'm4a' => '',
		'wav' => '',
		'loop' => '',
		'autoplay' => '',
		'preload' => '',
				
	), $atts ) );

	$wpaudioshortcode = 'audio';

	
	if ($src!=''){
	$wpaudioshortcode .= ' src=" ' . esc_attr($src) . '"';
	}
	
	if ($mp3!=''){
	$wpaudioshortcode .= ' mp3=" ' . esc_attr($mp3) . '"';
	}

	if ($ogg!=''){
	$wpaudioshortcode .= ' ogg=" ' . esc_attr($ogg) . '"';
	}

	if ($wma!=''){
	$wpaudioshortcode .= ' wma=" ' . esc_attr($wma) . '"';
	}

	if ($m4a!=''){
	$wpaudioshortcode .= ' m4a=" ' . esc_attr($m4a) . '"';
	}

	if ($wav!=''){
	$wpaudioshortcode .= ' wav=" ' . esc_attr($wav) . '"';
	}
	
	if ($loop!=''){
	$wpaudioshortcode .= ' loop=" ' . esc_attr($loop) . '"';
	}
	
	if ($autoplay!=''){
	$wpaudioshortcode .= ' autoplay=" ' . esc_attr($autoplay) . '"';
	}
	
	if ($preload!=''){
	$wpaudioshortcode .= ' preload=" ' . esc_attr($preload) . '"';
	}

	if ($buttonlink !='#') {
		$popupbutton = '<a href="'. $cc_siteurl .'/?p=' . esc_attr($buttonlink) . '&pop=yes" class="info-popup" data-width="' . esc_attr($width) . '" data-height="' . esc_attr($height) . '">' . esc_attr($buttontext) . '</a>';
	}

	if ($songwriter !='') {
		$songwriter = '<span class="songwriter">(' . $songwriter . ')</span>';
	}


	$audiotrack = '<span class="songtitle">' . $title . '</span>' . $songwriter . '<span class="audiobutton">' . $popupbutton . '</span>';

// Shortcode Inception - call the native WP audio shortcode with all the attributes
	return '<div class="track" style="display:none;">' . $audiotrack . do_shortcode('[' . $wpaudioshortcode . ']') . '</div>';
}

add_shortcode( 'audiotrack', 'cc_audiotrack_shortcode' );

// ==============================================
// Bonus for Genesis users!
// If a Genesis child theme is being used, add a template for the popup
// ==============================================

if ( basename( get_template_directory() ) == 'genesis' ) {
	add_filter( 'template_include', 'cc_popup_audioalbum_template' );
}

function cc_popup_audioalbum_template( $template ) {
	if( isset( $_GET['pop']) && 'yes' == $_GET['pop'] )
		$template = plugin_dir_path( __FILE__ ) . 'popup-genesis-template.php';

	return $template;
}



