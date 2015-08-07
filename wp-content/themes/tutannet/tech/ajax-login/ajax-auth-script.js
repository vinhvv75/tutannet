jQuery(document).ready(function ($) {

	// Perform AJAX login/register on form submit
	$('form#loginform, form#registerform, form#forgot_password').on('submit', function (e) {
        if (!$(this).valid()) return false;
        $('p.status', this).show().text(ajax_auth_object.loadingmessage);
		if ($(this).attr('id') == 'loginform') {
			action = 'ajaxlogin';
			username = 	$('form#loginform #user_login').val();
			password = $('form#loginform #user_pass').val();
			email = '';
			remember = $('form#loginform #remember').val();
			security = $('form#loginform #security').val();
		}
		else if ($(this).attr('id') == 'registerform') {
			action = 'ajaxregister';
			username = $('form#registerform #user_login').val();
			password = $('form#registerform #signonpassword').val();
        	email = $('form#registerform #user_email').val();
        	remember = false;
        	security = $('form#registerform #signonsecurity').val();
		}  
		else if ($(this).attr('id') == 'lostpasswordform') {
			action = 'ajaxforgotpassword';
			username = $('form#lostpasswordform #user_login').val();
			password = '';
			email = '';
			remember = '';
			security = ('form#lostpasswordform #forgotsecurity').val();
		
		}
		ctrl = $(this);
		$.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': action,
                'username': username,
                'password': password,
				'email': email,
				'remember': remember,
                'security': security
            },
            success: function (data) {
				$('p.status', ctrl).text(data.message);
				if (data.loggedin == true) {
                	document.location.href = ajax_auth_object.redirecturl;
                }
                if ($(this).attr('id') == 'registerform') {
                	$('a[data-toggle="login"]').click();		
                }
            }
        });
        e.preventDefault();
        return false;
    });
	 
	// Client side form validation
    if(jQuery('#forgot_password').length) {
		jQuery('#forgot_password').validate();
	}
	
    if (jQuery("#registerform").length) 
		jQuery("#registerform").validate(
		{ 
			rules:{
			password2:{ equalTo:'#signonpassword' 
			}	
		}
	});
    
    if (jQuery("#loginform").length)  {
			jQuery("#loginform").validate();
		}

}); // End