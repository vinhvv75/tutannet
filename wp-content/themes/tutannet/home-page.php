<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TuTanNet
 */
get_header();
?>

<?php 
	$login_text = '';
	if(is_user_logged_in()):
		global $current_user;
		get_currentuserinfo();
		$login_text = 'Xin chào, ' . $current_user->user_login;
	endif;
 ?>

<div id="content" class="site-content">
    
    <div class="header-container">
	    <div id="site-menu" class="hidden-xs hidden-sm">
	    	<a data-toggle="test"><div id="site-menu-bg">
	    	
	    	</div></a>
	    	<nav id="tabs" class="section-navigation" role="navigation">
		    	<ul role="tablist">		
		    		    	   
		    	   <li><a href="#trang-chu"><b>Trang&nbsp;Chủ</b></a></li>
		    	   
		    	   <li><a href="tin-tuc-phat-su" data-toggle="tab"><b>Tin&nbsp;Tức Phật&nbsp;Sự</b></a></li>
		    	   
		    	   <li><a href="#phat-giao-va-xa-hoi"><b>Phật&nbsp;Giáo và&nbsp;Xã&nbsp;Hội</b></a></li>
		    	   
		    	   <li><a href="#phat-hoc"><b>Phật&nbsp;Học</b></a></li>
		    	   
		    	   <li><a href="#hoat-dong-chua-tu-tan"><b>Hoạt&nbsp;Động Chùa&nbsp;Từ&nbsp;Tân</b></a></li>
		    	   
		    	   <li><a href="#phap-am"><b>Pháp&nbsp;Âm</b></a></li>
		    	   
		    	   <li><a href="#cac-chua-he-phai"><b>Các&nbsp;chùa hệ&nbsp;phái</b></a></li>
		    	   
		    	   <li class="sub"><a href="#doi-net-ve-chua-tu-tan"><b>Đôi&nbsp;nét về chùa&nbsp;Từ&nbsp;Tân</b></a></li>
		    	   
		    	   <li class="sub" ><a href="#thu-vien-anh"><b>Thư&nbsp;Viện&nbsp;Ảnh</b></a></li>
		    	   
		    	   <li class="sub"><a href="#lien-he"><b>Liên&nbsp;hệ</b></a></li>
		    	 </ul>
	    	 </nav>
	    	 
	    </div>
	    <section id="site-intro">
	    	<div id="site-intro-main" class="anim row cd-main">
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
		    		<span id="arrow-text" class="animated fadeInDown">xem tiếp</span>
		    		<div id="arrow-button" class="animated fadeInUp">
			    		<svg style="cursor:pointer;" width="22" height="22" viewBox="0,0,22,22" data-reactid=".0.4.$/.0.0.6"><g stroke="none" stroke-width="1" fill="none" style="full-rule:evenodd;" data-reactid=".0.4.$/.0.0.6.0"><g fill="#FFFFFF" transform="rotate(0, 11, 11)" data-reactid=".0.4.$/.0.0.6.0.0"><g transform="translate(4.000000, 7.000000)" data-reactid=".0.4.$/.0.0.6.0.0.0"><rect transform="translate(4.242641, 4.092641) rotate(-45.000000) translate(-4.242641, -4.092641) " x="3.24264069" y="-0.757359313" width="2" height="9.7" data-reactid=".0.4.$/.0.0.6.0.0.0.0"></rect><rect transform="translate(9.727922, 4.070563) scale(-1, 1) rotate(-45.000000) translate(-9.727922, -4.070563)" x="8.72792206" y="-0.779437252" width="2" height="9.7" data-reactid=".0.4.$/.0.0.6.0.0.0.1"></rect></g></g></g></svg>
		    		</div>
		    		
		    		<?php include('tech/ajax-login/login.php'); ?>
		    		<?php include('tech/ajax-search/search.php'); ?>
		    		<div id="site-intro-slides" class="slow animated slideInUp"></div>	
		    		<!--<canvas id="star"></canvas>	    		-->
		    		
		    	</div><!-- #site-intro-main -->
		    	<div id="site-intro-content" class="cd-gallery">		    		
		    		 <div id="tin-tuc-phat-su" class="tab-content">
		    		 </div>	
		    		<?php get_footer(); ?>
		    	</div><!-- #site-intro-content -->			
	    	</div><!-- #site-intro-main -->			
	    </section>
    </div><!-- #header-container -->

</div><!-- #content -->

</div><!-- #page -->
</body>
</html>


