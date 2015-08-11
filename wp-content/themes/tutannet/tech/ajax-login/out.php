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

$blog_url = site_url();
?>
<div id="login_wrapper" class="row is-disabled animated">
	<div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
	<form name="loginform" id="loginform" class="wrapper-is-open col-xs-10 col-sm-6 col-md-4 col-lg-4 is-disabled animated" action="login" method="post">
		<h2>Đăng nhập</h2>
		<p class="status"><span class="help-block">Hãy nhập đầy đủ thông tin.</span></p>		
		  <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
		  <div class="input-group margin-bottom-sm login_field">
		  <span class="input-group-addon"><i class="fa fa-street-view fa-fw"></i></span>
		  <input class="form-control required" type="text" placeholder="Tên đăng nhập" name="log" id="user_login" />
		</div>
		<div class="input-group login_field">
		  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
		  <input class="form-control required" type="password"  name="pwd" id="user_pass" placeholder="Mật khẩu" />
		</div>
		
		<div class="checkbox hidden-xs hidden-sm">
			<label>
				<input name='remember' type='checkbox' id='remember' value="forever" />
				Ghi nhớ thông tin đăng nhập
		    </label>
		</div>
		<div class="hidden-xs hidden-sm"><br/></div>
		<div class="submit">
			<button type="submit" class="btn btn-success">Đăng nhập</button>
		</div>
		<br class="clear"/>
		<input type="hidden" name="curl" value="<?php echo curPageURL(); ?>" />
		<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
		<input type='hidden' name='testcookie' value='1' />
		<div class="nav hidden-xs hidden-sm">
		<a data-toggle="register" href="#"><span class="fa-stack fa-lg">
		  <i class="fa fa-circle fa-stack-2x"></i>
		  <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
		</span>Đăng ký thành viên</a><span> | </span>
		<a data-toggle="lostpass" href="#">Quên mật khẩu ?</a>
		</div>
		<div class="row login_tool hidden-md hidden-lg">
			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default" data-toggle="register"><span><i class="fa fa-flag fa-fw"></i></span><span>Đăng ký</span></button>
			  <button type="button" class="btn btn-default" data-toggle="lostpass"><span><i class="fa fa-lock fa-fw"></i></span><span>Mật khẩu?</span></button>
			  <button type="button" class="btn btn-default" data-toggle="login_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
			</div>
		</div>
		<a class="login_close animated is-disabled hidden-xs hidden-sm" data-toggle="login_close" href="#">
			<span class="fa-stack fa-sm">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-close fa-stack-1x fa-inverse"></i>
			</span>
		</a>
	</form><!-- Login Form -->
	
	<form name="registerform" id="registerform" class="col-xs-10 col-sm-6 col-md-4 col-lg-4 is-disabled animated" action="register" method="post">
		<h2>Đăng ký</h2>
		<p class="status"><span class="help-block">Hãy nhập đầy đủ thông tin</span></p>
		<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
		<div class="input-group margin-bottom-sm login_field">
			<span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
			<input class="form-control required" type="text" placeholder="Tên đăng nhập" name="user_login" id="user_login"  />
		</div>
		<div class="input-group login_field">
			<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
			<input class="form-control required" type="email"  name="user_email" id='user_email' placeholder="Thư điện tử" />
		</div>
		<div class="input-group login_field">
			<span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
			<input id="signonpassword" type="password" class="form-control required" name="signonpassword" placeholder="Mật khẩu"/>
		</div>
		<div class="input-group login_field">
			<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
			<input type="password" id="password2" class="form-control required" name="password2" placeholder="Xác nhận mật khẩu" />
		</div>
		<br class="clear hidden-xs hidden-sm"/>
		<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
		<div class="submit">
			<button type="submit" class="btn btn-success">
				<i class="fa fa-paper-plane-o"></i> Đăng ký
			</button>
		</div>
		<br class="clear"/>
		<div class="nav hidden-xs hidden-sm">
		<a data-toggle="login" href="#"><span class="fa-stack fa-lg">
		  <i class="fa fa-circle fa-stack-2x"></i>
		  <i class="fa fa-coffee fa-stack-1x fa-inverse"></i>
		</span>Đăng nhập thành viên</a><span> |
		</span>
		<a data-toggle="lostpass" href="#">Quên mật khẩu ?</a>
		</div>
		<div class="row login_tool hidden-md hidden-lg">
			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default" data-toggle="login"><span><i class="fa fa-coffee fa-fw"></i></span><span>Đăng nhập</span></button>
			  <button type="button" class="btn btn-default" data-toggle="lostpass"><span><i class="fa fa-lock fa-fw"></i></span><span>Mật khẩu?</span></button>
			  <button type="button" class="btn btn-default" data-toggle="login_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
			</div>
		</div>
		<a class="login_close animated is-disabled hidden-xs hidden-sm" data-toggle="login_close" href="#">
			<span class="fa-stack fa-sm">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-close fa-stack-1x fa-inverse"></i>
			</span>
		</a>
	</form><!-- Register Form -->
	
	<form name="lostpasswordform" id="lostpasswordform" class="col-xs-10 col-sm-6 col-md-4 col-lg-4 is-disabled animated ajax-auth" action="forgotpassword" method="post">
		<h2>Khôi phục mật khẩu</h2>
		<p class="status"><span class="help-block">Hãy nhập đầy đủ thông tin</span></p>
		<?php wp_nonce_field('ajax-forgot-nonce', 'forgotsecurity'); ?>
		<div class="input-group margin-bottom-sm login_field">
			<span class="input-group-addon"><i class="fa fa-unlock fa-fw"></i></span>
			<input class="form-control required" type="text" placeholder="Tên đăng nhập hoặc Thư điện tử" name="user_login" id='user_login'  />
		</div>
		<br class="clear hidden-xs hidden-sm">
		<input type='hidden' name='redirect_to' value='<?php echo $redirect; ?>' />
		<div class="submit">
			<button type="submit" class="btn btn-success"> Lấy mật khẩu mới</button>
		</div>
		<br class="clear"/>
		<div class="nav hidden-xs hidden-sm">
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
		</div>
		<div class="row login_tool hidden-md hidden-lg">
			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default" data-toggle="login"><span><i class="fa fa-coffee fa-fw"></i></span><span>Đăng nhập</span></button>
			  <button type="button" class="btn btn-default" data-toggle="register"><span><i class="fa fa-flag fa-fw"></i></span><span>Đăng ký</span></button>
			  <button type="button" class="btn btn-default" data-toggle="login_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
			</div>
		</div>
		<a class="login_close animated is-disabled hidden-xs hidden-sm" data-toggle="login_close" href="#">
			<span class="fa-stack fa-sm">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-close fa-stack-1x fa-inverse"></i>
			</span>
		</a>
	</form><!-- Lost Password Form -->	
	<div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
</div>


    	
    	
    	