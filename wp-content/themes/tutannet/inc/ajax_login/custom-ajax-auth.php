<?php
function ajax_auth_init(){	
	
	wp_register_script('validate-script', get_template_directory_uri() . '/inc/ajax_login/jquery.validate.js', array('jquery') ); 
    wp_enqueue_script('validate-script');

    wp_register_script('ajax-auth-script', get_template_directory_uri() . '/inc/ajax_login/ajax-auth-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-auth-script');

    wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => site_url(),
        'loadingmessage' => __('Đang gửi thông tin đăng ký, xin vui lòng chờ...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
	// Enable the user with no privileges to run ajax_register() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
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
//  	$info['user_login'] = sanitize_user($_POST['username']);
    $info['user_password'] = ($_POST['password']);
	$info['user_email'] = sanitize_email( $_POST['email']);
		
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;		
		if(in_array('empty_user_login', $error)) {
			echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
		}
		else if(in_array('existing_user_login',$error)) {
			echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('existing_user_login'))));
		}
        else if(in_array('existing_user_email',$error)) {
        	echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('existing_user_email'))));
        }
        else echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_messages($error))));
    } else {
      wp_insert_user( $info );
//      auth_user_login($info['user_login'], $info['user_password'], false, 'Đăng ký');
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
?>