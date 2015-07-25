<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
<?php 
global  $best_magazine_layout_page,		// leayut class varaible
		$best_magazine_typography_page,	// typagraphi class varaible
		$best_magazine_color_control_page,// color control class varaible
		$best_magazine_home_page,			// home page class varaible
		$best_magazine_general_settings_page,
		$best_magazine_options;
	extract($best_magazine_options);
  ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="initial-scale=1.0" />
<meta name="HandheldFriendly" content="true"/>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
wp_get_post_tags('type=monthly&format=link'); // geting posts tags	
$best_magazine_layout_page->update_layout_editor(); // set layout stles for customized layuting
$best_magazine_typography_page->print_fornt_end_style_typography(); // fonts styles for customized fonts
$best_magazine_general_settings_page->favicon_img(); // favicon function print favicon html located front_end/front_end_functions.php
wp_head(); // wordpress standart scripts meta and ather..
?></head>
<body <?php body_class(); ?>>

<?php $header_image = get_header_image(); ?>
<header>
 <?php if(! empty($header_image)){  ?>
   <div class="container">
	<a class="custom-header-a" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo header_image(); ?>" class="custom-header">	
	</a>
	</div>
		<?php
	} ?>
		<div id="header">
			<div id="header-top">
				<div class="container">
					<ul id="social">
						<li class="facebook"><a <?php if( $show_facebook_icon!='on' || $facebook_url == "" ){ echo "style=\"display:none;\""; } ?> href="<?php if( trim($facebook_url) ) { echo esc_url($facebook_url);} else { echo "javascript:;";}?>"  target="_blank" title="Facebook"><?php echo __('Our facebook page','best-magazine'); ?></a></li>
						<li class="twitter"><a <?php if( $show_twitter_icon!='on' || $twitter_url == ""){ echo "style=\"display:none;\""; } ?> href="<?php if( trim($twitter_url) ){ echo esc_url($twitter_url);} else { echo "javascript:;";}?>" target="_blank" title="Twitter"><?php echo __('Our twitter page','best-magazine'); ?></a></li>
						<li class="gplus"><a <?php if( $show_google_icon!='on' || $google_url == "" ) { echo "style=\"display:none;\""; } ?>  href="<?php if( trim($google_url) ) { echo esc_url($google_url);} else { echo "javascript:;";}?>" target="_blank" title="Google +"><?php echo __('Our Google plus page','best-magazine'); ?></a></li>
						<li class="rss"><a <?php if( $show_rss_icon!='on' || $rss_url == "" ) { echo "style=\"display:none;\""; } ?>  href="<?php if( trim($rss_url) ) { echo esc_url($rss_url);} else { echo "javascript:;";}?>" target="_blank" title="Rss"><?php echo __('Our RSS','best-magazine'); ?></a></li>
					</ul>
					<div id="search-block">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="container">
				<div id="header-middle">
				 <?php if(trim($logo_img)){?> 
					<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name', 'display' ); ?>">
						<img id="site-title" src="<?php echo esc_url( $logo_img ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				<?php }
				else{ ?>
					<h1><a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name', 'display' ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a></h1>
				<?php } ?>
					<div class="clear"></div>
					<p id="site_desc"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
				</div>
			</div>
			<div class="phone-menu-block">
				<nav id="top-nav">
					<div class="container">
 					<?php  wp_nav_menu(	array(
										'theme_location'  => 'primary-menu',
										'container'       => false,
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'top-nav-list',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="top-nav-list" class=" %2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									)); ?>				</div>
				</nav>
			</div>
		</div>	
	