jQuery(document).ready(function ($) {

	// Perform AJAX login/register on form submit
	$('form#loginform, form#registerform, form#lostpasswordform').on('submit', function (e) {
        if (!$(this).valid()) return false;
//        $(this).find('.status').html('<span class="help-block">' + ajax_auth_object.loadingmessage + '</span>');
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
			remember = false;
			security = $('form#lostpasswordform #forgotsecurity').val();
		
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
				$('p.status', ctrl).html('<span class="help-block">' + data.message + '</span>');
				if (data.loggedin == true) {
                	document.location.href = ajax_auth_object.redirecturl;
                }
                if (data.loggedin == false) {
                	ctrl.find('.input-group').removeClass('has-success');
                }
                if ($(this).attr('id') == 'registerform') {
                	$('a[data-toggle="login"]').click();		
                }
            }
        });
        e.preventDefault();
        return false;
    });
    
    
    // override jquery validate plugin defaults
    $.validator.setDefaults({
    	rules: {
    	  field: {
    	    required: true
    	  }
    	},
        highlight: function(element) {
            $(element).closest('.input-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.input-group').removeClass('has-error').addClass('has-success');
            $('p.status').html('<span class="help-block">Hãy nhập đầy đủ thông tin.</span>');
        },
        success: function(element) {
            $(element).closest('.input-group').removeClass('has-error').addClass('has-success');
            $('p.status').html('<span class="help-block">Thông tin vừa nhập đã hợp lệ.</span>');
        },
         errorElement: 'span',
         errorClass: 'help-block',
         errorPlacement: function(error, element) {
         	$('p.status').html(error);    
         }
    });
	 
	// Client side form validation
	
    if (jQuery("#registerform").length) 
		jQuery("#registerform").validate(
		{ 
			rules:{
				signonpassword: { rangelength: [6, 12] },
				password2: { equalTo:'#signonpassword' }
		}
	});
    
    if (jQuery("#loginform").length)  {
			jQuery("#loginform").validate();
		}
	
	if(jQuery('#lostpasswordform').length) {
		jQuery('#lostpasswordform').validate();
	}

}); // End