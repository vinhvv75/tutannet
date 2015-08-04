<?php 


    if(is_user_logged_in()) {
	    include "in.php";		
	} else {
        include "out.php";
	}

function my_front_end_login_fail() {
    // Get the reffering page, where did the post submission come from?
    $referrer = $_SERVER['HTTP_REFERER'];
 
    // if there's a valid referrer, and it's not the default log-in screen
    if(!empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin')){
        // let's append a query string to the URL for the plugin to use
        wp_redirect($referrer . '?failed_login&failed_login'); 
    exit;
    }
}

if ($data['wplogin'] == "1") {
    // hook failed login
    add_action('wp_login_failed', 'my_front_end_login_fail'); 
}

?>