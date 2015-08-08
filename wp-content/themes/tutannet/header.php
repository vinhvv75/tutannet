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

<body>
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
        		<li class="animated fadeInDown"><a href="<?php echo get_permalink($nav_item1); ?>">Đôi nét về Chùa Từ Tân</a></li>
        		<li class="animated fadeInDown"><a href="<?php echo get_permalink($nav_item2); ?>">Các Chùa Hệ Phái</a></li>
        		<li class="animated fadeInDown"><a href="<?php echo get_permalink($nav_item3); ?>">Liên hệ</a></li>
        	</ul>
        </nav><!-- site-intro-nav-->
        
        <div id="site-toolbar" class="animated fadeInRight">
        	<div class="hidden-xs">
	        	<a id="login_toolbar" href="#" class="cd-btn" data-toggle="login_wrap" title="<?php 
	        		if(is_user_logged_in()) {
	        			global $current_user;
	        			get_currentuserinfo();
	        		    echo 'Xin chào, ' . $current_user->user_login;		
	        		} else {
	        		    echo 'Đăng nhập | Đăng ký';
	        		}
	        	
	        	
	        	?>"><i class="fa fa-user"></i></a>
	        	
	        	<a id="search_toolbar" href="#" class="cd-btn" data-toggle="search_wrap" title="Tìm kiếm bài đọc"><i class="fa fa-search"></i></a>
	        	<a href="#" class="cd-btn" data-toggle="tab" title="Thông báo và Sự kiện"><i class="fa fa-sun-o"></i></a>
        	</div>
        	<div class="visible-xs">
        		<div id="site-toolbar-xs" class="btn-group">
        		  <a id="site-toolbar-trigger" class="cd-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
        		    <i class="fa fa-reorder"></i></a>
        		  <ul class="dropdown-menu">
        		    <li><a class="cd-btn" data-toggle="login_wrap" href="#"><i class="fa fa-user"></i></a></li>
        		    <li><a class="cd-btn" data-toggle="search_wrap" href="#"><i class="fa fa-search"></i></a></li>
        		    <li><a class="cd-btn" data-toggle="notif_wrap" href="#"><i class="fa fa-sun-o"></i></a></li>
        		  </ul>
        		</div>
        	</div>
        </div><!-- #site-toolbar -->
        				        
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">