

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
		
		<div class="row login_tool hidden-md hidden-lg">
			<div class="btn-group" role="group" aria-label="...">
			  <!--<button type="button" class="btn btn-default" data-toggle="register"><span><i class="fa fa-flag fa-fw"></i></span><span>Đăng ký</span></button>
			  <button type="button" class="btn btn-default" data-toggle="lostpass"><span><i class="fa fa-lock fa-fw"></i></span><span>Quên mật khẩu</span></button>-->
			  <button type="button" class="btn btn-default" data-toggle="login_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
			</div>
		</div>
		<a class="login_close animated is-disabled hidden-xs hidden-sm" data-toggle="login_close" href="#">
			<span class="fa-stack fa-sm">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-close fa-stack-1x fa-inverse"></i>
			</span>
		</a>
	</div>
	<div class="col-xs-2 col-md-4 col-lg-4"></div>
</form>