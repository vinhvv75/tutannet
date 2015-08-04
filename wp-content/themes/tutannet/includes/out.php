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
if ($data['inred'] != "") {
    $redirect = $data['inred'];
}

$rme = "0";

$reglink = $home.'/wp-signup.php';

$passlink = $home.'/wp-login.php?action=lostpassword';

$extra = "";
if (isset($_GET['failed_login'])) {
	$extra = "style = \"color: red;\"";
}

$blog_url = site_url();
?>
<form name="loginform" id="loginform" class="is-disabled animated" action='<?php echo $home; ?>/wp-login.php' method="post">
	  <div class="input-group margin-bottom-sm login_field">
	  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
	  <input class="form-control" type="text" placeholder="Tên đăng nhập" name='log' id='user_login' <?php echo $extra; ?> />
	</div>
	<div class="input-group login_field">
	  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
	  <input class="form-control" type="password" <?php echo $extra; ?> name='pwd' id='user_pass' placeholder="Mật khẩu" />
	</div>
	
	<div class="checkbox-inline"
		<label>
		<input name='rememberme' type='checkbox' id='rememberme' value="forever" />
		Ghi nhớ tôi 
	    </label>
	</div><br/><br/>
	
	<input type="submit" name="login-submit" class="btn btn-success" id="login-submit"  value="Đăng nhập"  /><br/><br/>
	<input type="hidden" name="curl" value="<?php echo curPageURL(); ?>" />
	<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
	<input type='hidden' name='testcookie' value='1' />
	<a href="<?php echo $reglink ?>"><span class="fa-stack fa-lg">
	  <i class="fa fa-circle fa-stack-2x"></i>
	  <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
	</span>Đăng ký thành viên</a><span> | </span>
	<a href="<?php echo $passlink ?>">Quên mật khẩu ?</a><br/>
</form><!-- Login Form -->
    	
    	
    	