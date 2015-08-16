<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TuTanNet
 */
?><!DOCTYPE html>
<html ng-app="tutannet" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	  
	 <base href="/tutannet/">
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
        		<?php 
        			if(is_user_logged_in()):
        				global $current_user;
        				get_currentuserinfo();
        		 ?>
        		<li class="active" role="presentation"><a href="#thu-vien-ca-nhan" aria-controls="tong-quan" role="tab" data-toggle="tab">Thư Viện Cá Nhân</a></li>
        		<?php endif; ?>
        		
        		<li class="<?php if(!is_user_logged_in()) { echo 'active'; }?>" role="presentation" ><a href="#tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab">Tổng Quan</a></li>
        		
        		<li role="presentation"><a href="tin-tuc-phat-su" aria-controls="section1" role="tab" data-toggle="tab">Tin Tức Phật Sự</a></li>
        		
        		<li role="presentation"><a href="#phat-giao-va-xa-hoi" aria-controls="section2" role="tab" data-toggle="tab">Phật Giáo và Xã Hội</a></li>
        		
        		<li role="presentation"><a href="#phat-hoc" aria-controls="section3" role="tab" data-toggle="tab">Phật Học</a></li>
        		
        		<li role="presentation"><a href="#hoat-dong-chua-tu-tan" aria-controls="section4" role="tab" data-toggle="tab">Hoạt Động Chùa Từ Tân</a></li>
        	</ul>
        </nav><!-- site-primary-nav -->
        				        
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">
	
	
	
	<div class="tutannet-container">
	    <div id="site-header-secondary" class="animated fadeIn is-disabled">
		    <!-- Nav tabs -->
		    <div id="site-section-nav">
		    	<div id="section-title" class="is-hidden disable-select animated">
		    		Tổng Quan <?php // Default ?>
		    	</div>
		        <nav class="section-navigation" role="navigation">
		             <ul class="container" role="tablist">
		        	    <?php 
		        	    	if(is_user_logged_in()):
		        	     ?>
		        	    <li class="site-section-nav-item active" role="presentation"><a href="#thu-vien-ca-nhan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Thư Viện Cá Nhân</b></a></li>
		        	    <?php endif; ?>
		        	    
		        	    <li class="site-section-nav-item <?php if(!is_user_logged_in()) { echo 'active'; }?>" role="presentation" ><a href="#tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Tổng Quan</b></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="tin-tuc-phat-su" aria-controls="section1" role="tab" data-toggle="tab"><b>Tin Tức Phật Sự</b></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#phat-giao-va-xa-hoi" aria-controls="section2" role="tab" data-toggle="tab"><b>Phật Giáo và Xã Hội</b></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#phat-hoc" aria-controls="section3" role="tab" data-toggle="tab"><b>Phật Học</b></a></li>
		        	    
		        	    <li class="site-section-nav-item" role="presentation"><a href="#hoat-dong-chua-tu-tan" aria-controls="section4" role="tab" data-toggle="tab"><b>Hoạt Động Chùa Từ Tân</b></a></li>
		        	  </ul>
		        </nav><!-- #site-navigation -->
		    </div>
	    </div><!-- #site-header-secondary -->
	    
	    
	    <div class="header-container row">
		    <div id="site-menu" class="hidden-xs hidden-sm col-md-2 col-lg-2">
		    	<div id="site-menu-bg">
		    	
		    	</div>
		    	<nav id="tabs" class="section-navigation" role="navigation">
			    	<ul role="tablist">
			    	   <?php 
			    	   	if(is_user_logged_in()):
			    	    ?>
			    	   <li class="active" role="presentation"><a href="#thu-vien-ca-nhan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Thư&nbsp;Viện Cá&nbsp;Nhân</b></a></li>
			    	   <?php endif; ?>
			    	   
			    	   <li class="<?php if(!is_user_logged_in()) { echo 'active'; }?>" role="presentation" ><a href="tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Tổng Quan</b></a></li>
			    	   
			    	   <li role="presentation"><a href="tin-tuc-phat-su" aria-controls="section1" role="tab" data-toggle="tab"><b>Tin&nbsp;Tức Phật&nbsp;Sự</b></a></li>
			    	   
			    	   <li role="presentation"><a href="#phat-giao-va-xa-hoi" aria-controls="section2" role="tab" data-toggle="tab"><b>Phật&nbsp;Giáo và&nbsp;Xã&nbsp;Hội</b></a></li>
			    	   
			    	   <li role="presentation"><a href="#phat-hoc" aria-controls="section3" role="tab" data-toggle="tab"><b>Phật&nbsp;Học</b></a></li>
			    	   
			    	   <li role="presentation"><a href="#hoat-dong-chua-tu-tan" aria-controls="section4" role="tab" data-toggle="tab"><b>Hoạt&nbsp;Động Chùa&nbsp;Từ&nbsp;Tân</b><span></a></li>
			    	 </ul>
		    	 </nav>
		    	 <nav id="site-intro-nav" role="navigation">
		    	 	<ul>
		    	 		<li><a href="#">Đôi&nbsp;nét về chùa&nbsp;Từ&nbsp;Tân</a></li>
		    	 		<li><a href="#">Các&nbsp;chùa hệ&nbsp;phái</a></li>
		    	 		<li><a href="#">Liên&nbsp;hệ</a></li>
		    	 	</ul>
		    	 </nav>
		    </div>
		    <section id="site-intro" class="col-md-10 col-lg-10">
		    	<div id="site-intro-main" class="row">
		    		<a id="site-logo" class="animated fadeInLeft">
		    			<!--<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/cd-logo.svg"/></a>-->
		    		</a>
		    	<div id="site-toolbar" class="animated fadeInRight">
	    			<a id="toolbar-trigger" href="#" class="visible-xs" data-toggle="toolbar_wrap"><span class="toolbar-menu-icon"></span></a>
	    			<a id="login_toolbar" href="#" class="cd-btn hidden-xs" data-toggle="login_wrap" title="<?php 
	    				if(is_user_logged_in()) {
	    				    echo $login_text;		
	    				} else {
	    				    echo 'Đăng nhập';
	    				}
	    			?>"><?php 
	    				if(is_user_logged_in()) {
	    					echo '<span class="site-section-nav-avatar">'.
	    						  get_avatar( $current_user->ID ).'</span>';		
	    				} else {
	    				    echo '<i class="fa fa-user"></i>';
	    				}
	    			?></a>
	    			
	    			<a id="search_toolbar" href="#" class="cd-btn hidden-xs" data-toggle="search_wrap" title="Tìm kiếm"><i class="fa fa-search"></i></a>
	    			<a id="tv_toolbar" href="#" class="cd-btn hidden-xs" data-toggle="tv_wrap" title="Trình diễn"><i class="fa fa-television"></i></a>
    		</div><!-- #site-toolbar -->
		    		<img id="site-intro-img" class="easeOutCirc" src="<?php echo get_template_directory_uri();?>/img/intro-background.jpg"/>	
		    		<!--<canvas id="star"></canvas>	    		-->
		    	</div><!-- #site-intro-main -->
		    	<?php include('tech/ajax-login/login.php'); ?>
		    	<?php include('tech/ajax-search/search.php'); ?>
		    	<div id="site-intro-slides" class="row">
				
		    	</div>			
		    </section>
	    </div>
	    
	