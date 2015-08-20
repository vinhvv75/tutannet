<form id="login_wrapper" class="row is-disabled animated fast" action='<?php echo $home; ?>/wp-login.php' method="post">
	<div id="profileform" class="is-disabled animated fast">
		<?php wp_nonce_field( 'ajax-logout-nonce', 'logoutsecurity' ); ?>	
		<a class="is-disabled" data-toggle="profile"></a>	
		<?php 
			global $current_user;
			get_currentuserinfo();
			$user_info = get_userdata($current_user->ID)
		?>
		<div class="profile_avatar"><?php echo get_avatar( $current_user->ID ); ?></div>
		<h2><?php echo $current_user->user_login; ?></h2>
		<div class="user_role"><span>
		<?php 
			$user_role = $current_user->roles[0];
			$user_role_name =''; 
			if ($user_role == 'administrator') {$user_role_name = 'Quản lý';}
			else if ($user_role == 'editor') {$user_role_name = 'Biên tập viên';}
			else if ($user_role == 'author') {$user_role_name = 'Tác giả';}
			else if ($user_role == 'contributor') {$user_role_name = 'Cộng tác viên';}
			else if ($user_role == 'subscriber') {$user_role_name = 'Thành viên';}  
			echo $user_role_name;?>
		</span></div>
		<?php if ($user_role != 'subscriber'): ?>
		<div id="user_posts">
		<?php 
		$user_post_count = count_user_posts( $current_user->ID , 'post');
		if ($user_post_count > 0) {
			echo '<span>Bạn đã đăng <b>'.$user_post_count.'</b> bài.</span><br/>';
			echo '<span>Xin chân thành cảm ơn sự đóng góp của bạn.</span>';
		}
		else {
			echo '<span>Chúng tôi rất hoan hỉ được cộng tác cùng bạn.</span><br/>';
			echo '<span>Hãy bắt đầu đăng bài viết cho ChuaTuTan.net.</span>';
		}
		?>
		</div>
		<?php endif; ?>
			
		<?php
		$home = site_url();
		$profilelink = $home."/wp-admin";
		$outred = $home;
		$redto = wp_logout_url($outred);
		?>		
		<div class="nav hidden-xs hidden-sm">
			<a href="<?php echo $profilelink; ?>">
				<span class="fa-stack fa-lg">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-briefcase fa-stack-1x"></i>
				</span><span>Quản Trị</span>
			</a>
			<a href="<?php echo $redto; ?>">
				<span class="fa-stack fa-lg">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-sign-out fa-stack-1x"></i>
				</span><span>Đăng xuất</span>
			</a>
			<a data-toggle="login_close" href="#">
				<span class="fa-stack fa-lg">
			  		<i class="fa fa-circle fa-stack-2x"></i>
			  		<i class="fa fa-close fa-stack-1x"></i>
				</span><span>Đóng lại</span>
			</a>
		</div>
				
		<div class="row login_tool hidden-md hidden-lg">
			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default" data-toggle="admin"><span><i class="fa fa-briefcase fa-fw"></i></span><span>Quản trị</span></button>
			  <button type="button" class="btn btn-default" onclick="location.href = '<?php echo $redto; ?>';"><span><i class="fa fa-sign-out fa-fw"></i></span><span>Đăng xuất</span></button>
			  <button type="button" class="btn btn-default" data-toggle="login_close"><span><i class="fa fa-close fa-fw"></i></span><span>Đóng lại</span></button>
			</div>
		</div>
	</div>
</form>