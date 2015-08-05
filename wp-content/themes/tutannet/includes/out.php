<?php
if (!function_exists('curPageURL')) {
function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
	    $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
}

$home = site_url();
$redirect = $home;

$rme = "0";

$extra = "";
if (isset($_GET['failed_login'])) {
	$extra = "style = \"color: red;\"";
}

$blog_url = site_url();
?>
<div id="login_wrapper" class="is-disabled animated">
	<form name="loginform" id="loginform" class="is-disabled animated" action="login" method="post">
		<p class="status"></p>
		  <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
		  <div class="input-group margin-bottom-sm login_field">
		  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		  <input class="form-control required" type="text" placeholder="Tên đăng nhập" name="log" id="user_login" <?php echo $extra; ?> />
		</div>
		<div class="input-group login_field">
		  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
		  <input class="form-control required" type="password" <?php echo $extra; ?> name="pwd" id="user_pass" placeholder="Mật khẩu" />
		</div>
		
		<div class="checkbox">
			<label>
				<input name='remember' type='checkbox' id='remember' value="forever" />
				Ghi nhớ tôi 
		    </label>
		</div>
		<br class="clear"/>
		<div class="submit"><input type="submit" name="wp-submit" class="btn btn-success" id="wp-submit"  value="Đăng nhập"  /></div>
		<br class="clear"/>
		<input type="hidden" name="curl" value="<?php echo curPageURL(); ?>" />
		<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
		<input type='hidden' name='testcookie' value='1' />
		<div class="nav">
		<a data-toggle="register" href="#"><span class="fa-stack fa-lg">
		  <i class="fa fa-circle fa-stack-2x"></i>
		  <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
		</span>Đăng ký thành viên</a><span> | </span>
		<a data-toggle="lostpass" href="#">Quên mật khẩu ?</a>
		</div>
	</form><!-- Login Form -->
	
	<form name="registerform" id="registerform" class="is-disabled animated" action="register" method="post">
		<p class="status"></p>
		<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
		<div class="input-group margin-bottom-sm login_field">
			<span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
			<input class="form-control required" type="text" placeholder="Tên đăng nhập" name="user_login" id="user_login" <?php echo $extra; ?> />
		</div>
		<div class="input-group login_field">
			<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
			<input class="form-control required" type="email" <?php echo $extra; ?> name="user_email" id='user_email' placeholder="Thư điện tử" />
		</div>
		<div class="input-group login_field">
			<span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
			<input id="signonpassword" type="password" class="form-control required" name="signonpassword" placeholder="Mật khẩu"/>
		</div>
		<div class="input-group login_field">
			<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
			<input type="password" id="password2" class="form-control required" name="password2" placeholder="Xác nhận mật khẩu" />
		</div>
		<br class="clear"/>
		<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
		<div class="submit"><input name="wp-submit" id="wp-submit" class="btn btn-success" value="Đăng ký" type="submit"/></div>
		<br class="clear"/>
		<div class="nav">
		<a data-toggle="login" href="#"><span class="fa-stack fa-lg">
		  <i class="fa fa-circle fa-stack-2x"></i>
		  <i class="fa fa-coffee fa-stack-1x fa-inverse"></i>
		</span>Đăng nhập thành viên</a><span> |
		</span>
		<a data-toggle="lostpass" href="#">Quên mật khẩu ?</a>
		</div>
	</form><!-- Register Form -->
	
	<form name="lostpasswordform" id="lostpasswordform" class="is-disabled animated" action="<?php echo $home; ?>/wp-login.php?action=lostpassword" method="post">
		<div class="input-group margin-bottom-sm login_field">
			<span class="input-group-addon"><i class="fa fa-unlock fa-fw"></i></span>
			<input class="form-control" type="text" placeholder="Tên đăng nhập hoặc Thư điện tử" name="user_login" id='user_login' <?php echo $extra; ?> />
		</div>
		<br class="clear">
		<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
		<div class="submit"><input name="wp-submit" id="wp-submit" class="btn btn-success" value="Lấy mật khẩu mới" type="submit"/></div>
		<br class="clear"/>
		<p class="nav">
		<a data-toggle="login" href="#" class="login_field">
			<span class="fa-stack fa-lg">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-coffee fa-stack-1x fa-inverse"></i>
			</span>Đăng nhập thành viên
		</a>
		<br class="clear"/>
		<a data-toggle="register" href="#">
			<span class="fa-stack fa-lg">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
			</span>Đăng ký thành viên
		</a>
		</p>
	</form><!-- Lost Password Form -->	
</div>


    	
    	
    	