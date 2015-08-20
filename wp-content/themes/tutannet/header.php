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
<?php 
	$login_text = '';
	if(is_user_logged_in()):
		global $current_user;
		get_currentuserinfo();
		$login_text = 'Xin chào, ' . $current_user->user_login;
	endif;
 ?>

<div id="page" class="hfeed site">
    <?php 
        $tutannet_logo = get_theme_mod( 'header_image' );
        $branding_class = '';
        $tutannet_top_menu_switch = of_get_option( 'top_menu_switch' );
        $tutannet_logo_alt = of_get_option( 'logo_alt' );
        $tutannet_logo_title = of_get_option( 'logo_title' );
    ?>  
    
    <div class="cd-folding-panel">
    	<div class="fold-left"></div> 
    	<div class="fold-right"></div> 
    	<div class="cd-fold-content">
    		<div class="instant-article"></div>
    	</div>
    	<a class="cd-close" href="#0"></a>
    </div>
	
    <header id="site-header" role="banner" class="hidden-md hidden-lg top">    
            
        <nav>
        	<ul id="site-primary-nav" class="visible-xs visible-sm is-visible">
        		<!--<li class="cd-label">Chuyên mục</li>-->
        		
        		<li class="<?php if(!is_user_logged_in()) { echo 'active'; }?>" role="presentation" ><a href="#tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab">Tổng Quan</a></li>
        		
        		<li role="presentation"><a href="tin-tuc-phat-su" aria-controls="section1" role="tab" data-toggle="tab">Tin Tức Phật Sự</a></li>
        		
        		<li role="presentation"><a href="#phat-giao-va-xa-hoi" aria-controls="section2" role="tab" data-toggle="tab">Phật Giáo và Xã Hội</a></li>
        		
        		<li role="presentation"><a href="#phat-hoc" aria-controls="section3" role="tab" data-toggle="tab">Phật Học</a></li>
        		
        		<li role="presentation"><a href="#hoat-dong-chua-tu-tan" aria-controls="section4" role="tab" data-toggle="tab">Hoạt Động Chùa Từ Tân</a></li>
        	</ul>
        </nav><!-- site-primary-nav -->
        				        
	</header><!-- #masthead -->
	

	
	    
	