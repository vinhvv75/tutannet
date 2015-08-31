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
    	<a class="cd-article-close" href="#0"></a>
    </div> <!-- cd-folding-panel -->
    
    <div class="cd-quick-view">
    	<div class="cd-slider-wrapper">
    		<ul class="cd-slider">
    			<li class="selected"><img src="" alt=""><a href="#" class="play"><i class="fa fa-play-circle-o"></i></a></li>
    		</ul> <!-- cd-slider -->
     
    		<ul class="cd-slider-navigation">
    			<!--<li><a class="cd-next" href="#0">Prev</a></li>-->
    			<!--<li><a class="cd-prev" href="#0">Next</a></li>-->
    		</ul> <!-- cd-slider-navigation -->
    	</div> <!-- cd-slider-wrapper -->
     
    	<div class="cd-item-info">
    		<h2>Cover Title</h2>
    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing...</p>
     
    		<ul class="cd-item-action">
    			<li><button class="listen">Lắng nghe</button></li>					
    			<li><a href="#0">Đọc thêm</a></li>	
    		</ul> <!-- cd-item-action -->
    	</div> <!-- cd-item-info -->
    	<a href="#0" class="cd-close">Đóng</a>
    </div> <!-- cd-quick-view -->
	
    <header id="site-header" role="banner" class="hidden-md hidden-lg top">    
            
        				        
	</header><!-- #masthead -->
	

	
	    
	