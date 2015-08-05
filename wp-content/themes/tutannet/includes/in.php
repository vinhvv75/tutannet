

<form id="login_wrapper" class="is-disabled animated" action='<?php echo $home; ?>/wp-login.php' method="post">
<a id="login_close">
	<span class="fa-stack fa-lg">
		<i class="fa fa-circle fa-stack-2x"></i>
		<i class="fa fa-close fa-stack-1x fa-inverse"></i>
	</span>

<div id="profileform" class="is-disabled animated">
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
</form>