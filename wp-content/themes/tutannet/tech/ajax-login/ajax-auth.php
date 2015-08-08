<?php
function ajax_auth_init(){	
	
	wp_register_script('validate-script', get_template_directory_uri() . '/tech/ajax-login/jquery.validate.min.js', array('jquery') ); 
    wp_enqueue_script('validate-script');
    
    wp_register_script('validate-script-tooltip', get_template_directory_uri() . '/tech/ajax-login/jquery-validate.bootstrap-tooltip.min.js', array('jquery') );
    wp_enqueue_script('validate-script-tooltip');
    
    wp_register_script('validate-script-vi', get_template_directory_uri() . '/tech/ajax-login/jquery-validate.bootstrap-tooltip.min.js', array('jquery') );
    wp_enqueue_script('validate-script-vi');
    
    wp_register_script('ajax-auth-script', get_template_directory_uri() . '/tech/ajax-login/ajax-auth-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-auth-script');
    

    wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => site_url(),
        'loadingmessage' => __('Đang gửi thông tin, xin vui lòng chờ...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
	// Enable the user with no privileges to run ajax_register() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
	// Enable the user with no privileges to run ajax_forgotPassword() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxforgotpassword', 'ajax_forgotPassword' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}
  
function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
  	// Call auth_user_login
	auth_user_login($_POST['username'], $_POST['password'], $_POST['remember'], 'Đăng nhập'); 
	
    die();
}

function ajax_register(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security' );
		
    // Nonce is checked, get the POST data and sign user on
    $info = array();
  	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']);
    $info['user_pass'] = sanitize_text_field($_POST['password']);
	$info['user_email'] = sanitize_email( $_POST['email']);
		
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;		
		if(in_array('empty_user_login', $error)) {
			echo json_encode(array('loggedin'=>false, 'message'=>__('Xin lỗi, thông tin đăng nhập không hợp lệ.')));
		}
		else if(in_array('existing_user_login',$error)) {
			echo json_encode(array('loggedin'=>false, 'message'=>__('Xin lỗi, tên đăng nhập này đã tồn tại.')));
		}
        else if(in_array('existing_user_email',$error)) {
        	echo json_encode(array('loggedin'=>false, 'message'=>__('Xin lỗi, thư điện tử này đã tồn tại.')));
        }
//        else echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_messages($error))));
    } else {
      wp_insert_user( $info );
      echo json_encode(array('loggedin'=>true, 'message'=>__('Đăng ký thành công.')));
    }

    die();
}

function auth_user_login($user_login, $password, $remember, $login)
{
	$info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = $remember;
	
	$user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('Sai tên đăng nhập hoặc mật khẩu.')));
    } else {
		wp_set_current_user($user_signon->ID); 
        echo json_encode(array('loggedin'=>true, 'message'=>__($login.' thành công.')));
    }
	
	die();
}

function ajax_forgotPassword(){
	 
	// First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-forgot-nonce', 'security' );
	
	global $wpdb;
	
	$account = $_POST['user_login'];
	
	if( empty( $account ) ) {
		$error = 'Xin nhập tên đăng nhập hoặc thư điện tử.';
	} else {
		if(is_email( $account )) {
			if( email_exists($account) ) 
				$get_by = 'email';
			else	
				$error = 'Không có thành viên hợp với thư điện tử này.';			
		}
		else if (validate_username( $account )) {
			if( username_exists($account) ) 
				$get_by = 'login';
			else	
				$error = 'Không có thành viên hợp với tên đăng nhập này.';				
		}
		else
			$error = 'Tên đăng nhập hoặc thư điện tử không hợp lệ.';		
	}	
	
	if(empty ($error)) {
		// lets generate our new password
		//$random_password = wp_generate_password( 12, false );
		$random_password = wp_generate_password();
 
			
		// Get user data by field and data, fields are id, slug, email and login
		$user = get_user_by( $get_by, $account );
			
		$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
			
		// if  update user return true then lets send user an email containing the new password
		if( $update_user ) {
			
			$from = 'WRITE SENDER EMAIL ADDRESS HERE'; // Set whatever you want like mail@yourdomain.com
			
			if(!(isset($from) && is_email($from))) {		
				$sitename = strtolower( $_SERVER['SERVER_NAME'] );
				if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					$sitename = substr( $sitename, 4 );					
				}
				$from = 'admin@'.$sitename; 
			}
			
			$to = $user->user_email;
			$subject = 'Mật khẩu mới';
			$sender = 'Gửi từ: '.get_option('name').' <'.$from.'>' . "\r\n";
			
			$message = 'Mật khẩu mới của bạn là: '.$random_password;
				
			$headers[] = 'MIME-Version: 1.0' . "\r\n";
			$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers[] = "X-Mailer: PHP \r\n";
			$headers[] = $sender;
				
			$mail = wp_mail( $to, $subject, $message, $headers );
			if( $mail ) 
				$success = 'Thành công. Kiểm tra hộp thư điện tử của bạn để xem mật khẩu mới.';
			else
				$error = 'Hệ thống không thể gửi mật khẩu mới vào hộp thư điện tử của bạn.';						
		} else {
			$error = 'Có lỗi trong khi cập nhật mật khẩu mới.';
		}
	}
	
	if( ! empty( $error ) )
		echo json_encode(array('loggedin'=>false, 'message'=>__($error)));
			
	if( ! empty( $success ) )
		echo json_encode(array('loggedin'=>false, 'message'=>__($success)));
				
	die();
}
?>