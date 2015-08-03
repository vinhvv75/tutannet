<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TuTanNet
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tutannet' ); ?></a>
    <?php 
        $tutannet_logo = get_theme_mod( 'header_image' );
        $branding_class = '';
        $tutannet_top_menu_switch = of_get_option( 'top_menu_switch' );
        $tutannet_logo_alt = of_get_option( 'logo_alt' );
        $tutannet_logo_title = of_get_option( 'logo_title' );
    ?>  
	
    <header id="site-header" role="banner">    
        <div id="site-logo" class="animated fadeInLeft">
        	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/cd-logo.svg"/></a>
        </div>
                
        <nav id="site-intro-nav" class="hidden-xs hidden-sm hidden-md">
        	<?php 
        		$nav_item1 = get_post(of_get_option('primay_nav_item1'));
        		$nav_item2 = get_post(of_get_option('primay_nav_item2'));
        		$nav_item3 = get_post(of_get_option('primay_nav_item3'));
        	?>
        	<ul>
        		<li class="animated fadeInDown"><a href="<?php echo get_permalink($nav_item1); ?>"><?php echo $nav_item1->post_title;?></a></li>
        		<li class="animated fadeInDown"><a href="<?php echo get_permalink($nav_item2); ?>"><?php echo $nav_item2->post_title;?></a></li>
        		<li class="animated fadeInDown"><a href="<?php echo get_permalink($nav_item3); ?>"><?php echo $nav_item3->post_title;?></a></li>
        	</ul>
        </nav><!-- site-intro-nav-->
        
        <div id="site-toolbar" class="animated fadeInRight">
        	<a href="#" class="cd-btn" data-toggle="tab" title="Thông báo và Sự kiện"><i class="fa fa-bell-o"></i></a>
        	<a id="search_toggle" href="#section_search" class="cd-btn" data-toggle="tab" title="Tìm kiếm bài đọc"><i class="fa fa-search"></i></a>
        	<a href="#" class="cd-btn" data-toggle="tab" title="Thông tin về chúng tôi"><i class="fa fa-reorder"></i></a>
        </div><!-- #site-toolbar -->				        
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">