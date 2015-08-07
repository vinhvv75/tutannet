

<form id="login_wrapper" class="row is-disabled animated" action='<?php echo $home; ?>/wp-login.php' method="post">

	<div class="col-xs-2 col-md-4 col-lg-4"></div>
	<div id="profileform" class="col-xs-8 col-md-4 col-lg-4 is-disabled animated">
		<a data-toggle="profile"></a>
		</a>
		<div class='login_link'>Xin Chào,  
		<?php 
		global $current_user;
		get_currentuserinfo();
		echo $current_user->user_login;
		?>
		</div>
		<?php
		$home = site_url();
		$profilelink = $home."/wp-admin";
		$outred = $home;
		$redto = wp_logout_url($outred);
		    echo "<br/><a class='wplb_link' href='".$profilelink."'>Truy Cập vào Trình Quản Trị</a><br/>";
			echo "<a class='wplb_link' href='".$redto."'>Đăng xuất</a>";
		?>
	
	</div>
	<div class="col-xs-2 col-md-4 col-lg-4"></div>
	<a href="#" class="login_close" data-toggle="login_close">
		<span class="fa-stack">
		  <i class="fa fa-square-o fa-stack-2x"></i>
		  <i class="fa fa-close fa-stack-1x"></i>
		</span>
	</a>
</form>