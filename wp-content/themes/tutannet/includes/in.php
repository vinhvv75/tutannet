

<form name="loginform" id="loginform" class="is-disabled animated" action='<?php echo $home; ?>/wp-login.php' method="post">
<a class='login_link'>Xin Chào 
<?php 
global $current_user;
get_currentuserinfo();
echo $current_user->user_login;
?>
</a>
<?php
$home = site_url();
$profilelink = $home."/wp-admin/profile.php";
$profiletext = "Your Profile";
$outred = '';
$redto = wp_logout_url($outred);
    echo "<a class='wplb_link' href='".$profilelink."'>".$profiletext."</a>\n";
	echo "<a class='wplb_link' href='".$redto."'>Đăng xuất</a>\n";
?>
</form>