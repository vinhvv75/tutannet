jQuery(document).ready(function($){

// Login Toggle
$('a[data-toggle="login_wrap"]').click(function() {
	$('#login_wrapper').removeClass('is-disabled');
	$('#login_wrapper').addClass('fadeInUp');
	$('a[data-toggle="login"]').click();
});

// Login Toggle
$('a[data-toggle="login"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline, #registerform, #lostpasswordform').addClass('animated fadeOut');
	$('#registerform, #lostpasswordform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline, #registerform, #lostpasswordform').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled fadeOut');
		$('#loginform').addClass('fadeIn');
	}, 500 );
});

// Register Toggle
$('a[data-toggle="register"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline, #loginform, #lostpasswordform').addClass('animated fadeOut');
	$('#loginform, #lostpasswordform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline, #loginform, #lostpasswordform').addClass('is-disabled'); 
		$('#registerform').removeClass('is-disabled fadeOut');
		$('#registerform').addClass('fadeIn');
	}, 200 );
});

// Lost Password Toggle
$('a[data-toggle="lostpass"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline, #loginform, #registerform').addClass('animated fadeOut');
	$('#loginform, #registerform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline, #loginform, #registerform').addClass('is-disabled'); 
		$('#lostpasswordform').removeClass('is-disabled fadeOut');
		$('#lostpasswordform').addClass('fadeIn');
	}, 200 );
});


}); // End