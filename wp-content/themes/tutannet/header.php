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
	
    <header id="site-header" role="banner" class="top">    
        <a id="site-logo" class="animated fadeInLeft">
        	<!--<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/cd-logo.svg"/></a>-->
        	<span class="logo-menu-icon"></span>
        </a>
        
        <nav>
        	<ul id="site-primary-nav" class="visible-xs visible-sm is-visible">
        		<!--<li class="cd-label">Chuyên mục</li>-->
        		<?php 
        			if(is_user_logged_in()):
        				global $current_user;
        				get_currentuserinfo();
        		 ?>
        		<li class="active" role="presentation"><a href="#thu-vien-ca-nhan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Thư Viện Cá Nhân</b></a></li>
        		<?php endif; ?>
        		
        		<li class="<?php if(!is_user_logged_in()) { echo 'active'; }?>" role="presentation" ><a href="#tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Tổng Quan</b></a></li>
        		
        		<li role="presentation"><a href="#tin-tuc-phat-su" aria-controls="section1" role="tab" data-toggle="tab"><b>Tin Tức Phật Sự</b></a></li>
        		
        		<li role="presentation"><a href="#phat-giao-va-xa-hoi" aria-controls="section2" role="tab" data-toggle="tab"><b>Phật Giáo và Xã Hội</b></a></li>
        		
        		<li role="presentation"><a href="#phat-hoc" aria-controls="section3" role="tab" data-toggle="tab"><b>Phật Học</b></a></li>
        		
        		<li role="presentation"><a href="#hoat-dong-chua-tu-tan" aria-controls="section4" role="tab" data-toggle="tab"><b>Hoạt Động Chùa Từ Tân</b></a></li>
        	</ul>
        </nav><!-- site-primary-nav -->
                
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
        	<a id="toolbar-trigger" href="#" class="visible-xs" data-toggle="toolbar_wrap"><span class="toolbar-menu-icon"></span></a>
        	<a id="login_toolbar" href="#" class="cd-btn hidden-xs" data-toggle="login_wrap" title="<?php 
        		if(is_user_logged_in()) {
        			global $current_user;
        			get_currentuserinfo();
        		    echo 'Xin chào, ' . $current_user->user_login;		
        		} else {
        		    echo 'Đăng nhập | Đăng ký';
        		}
        	
        	
        	?>"><i class="fa fa-user"></i></a>
        	
        	<a id="search_toolbar" href="#" class="cd-btn hidden-xs" data-toggle="search_wrap" title="Tìm kiếm bài đọc"><i class="fa fa-search"></i></a>
        	<a href="#" class="cd-btn hidden-xs" data-toggle="tab" title="Thông báo và Sự kiện"><i class="fa fa-sun-o"></i></a>
        </div><!-- #site-toolbar -->
        				        
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">
	
	<div id="login_open">
		<?php include('tech/ajax-login/login.php'); ?>
	</div>
	<div id="search_open">
		<?php include('tech/ajax-search/search.php'); ?>
	</div>
	
	<div class="tutannet-container">
		
	    <?php 
	    	$block1_cat = of_get_option('featured_block_1');
	    	if(!empty($block1_cat)):
	    	      $category_info_1 = get_category_by_slug($block1_cat);
	    	endif;
	    	$block2_cat = of_get_option('featured_block_2');
	    	if(!empty($block2_cat)):
	    	      $category_info_2 = get_category_by_slug($block2_cat);
	    	endif;
	    	$block3_cat = of_get_option('featured_block_3');
	    	if(!empty($block3_cat)):
	    	      $category_info_3 = get_category_by_slug($block3_cat);
	    	endif;
	    	$block4_cat = of_get_option('featured_block_4');
	    	if(!empty($block4_cat)):
	    	      $category_info_4 = get_category_by_slug($block4_cat);
	    	endif;
	    	$block5_cat = of_get_option('featured_block_5');
	    	if(!empty($block5_cat)):
	    	      $category_info_5 = get_category_by_slug($block5_cat);
	    	endif;
	    ?>
	    <div id="site-header-secondary" class="animated fadeIn">
		    <!-- Nav tabs -->
		    <div id="site-section-nav">
		    	<div id="section-title" class="is-hidden disable-select animated">
		    		Tổng Quan <?php // Default ?>
		    	</div>
		        <nav id="section-navigation" role="navigation">
		             <ul class="container" role="tablist">
		        	    <?php 
		        	    	if(is_user_logged_in()):
		        	    		global $current_user;
		        	    		get_currentuserinfo();
		        	     ?>
		        	    <li class="site-section-nav-item active" role="presentation"><a href="#thu-vien-ca-nhan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Thư Viện Cá Nhân</b><span class="site-section-nav-avatar"><?php echo get_avatar( $current_user->ID ); ?></span></a></li>
		        	    <?php endif; ?>
		        	    
		        	    <li class="site-section-nav-item <?php if(!is_user_logged_in()) { echo 'active'; }?>" role="presentation" ><a href="#tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Tổng Quan</b><span><i class="fa fa-newspaper-o"></i></span></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#tin-tuc-phat-su" aria-controls="section1" role="tab" data-toggle="tab"><b>Tin Tức Phật Sự</b><span ><i class="fa fa-newspaper-o"></i></span></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#phat-giao-va-xa-hoi" aria-controls="section2" role="tab" data-toggle="tab"><b>Phật Giáo và Xã Hội</b><span ><i class="fa fa-newspaper-o"></i></span></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#phat-hoc" aria-controls="section3" role="tab" data-toggle="tab"><b>Phật Học</b><span ><i class="fa fa-newspaper-o"></i></span></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#hoat-dong-chua-tu-tan" aria-controls="section4" role="tab" data-toggle="tab"><b>Hoạt Động Chùa Từ Tân</b><span ><i class="fa fa-newspaper-o"></i></span></a></li>
		        	  </ul>
		        </nav><!-- #site-navigation -->
		    </div>
	    </div><!-- #site-header-secondary -->
	    
	    
	    
	    <section id="site-intro">
	    	<img id="site-intro-img" src="<?php echo get_template_directory_uri();?>/img/intro-background.jpg"/>	
			
	    </section>
	