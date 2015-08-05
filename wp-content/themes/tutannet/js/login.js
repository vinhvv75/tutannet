jQuery(document).ready(function($){

// Login Toggle
$('a[data-toggle="login_wrap"]').click(function() {
	$('#login_wrapper').removeClass('is-disabled');
	$('#login_wrapper').removeClass('fadeOutDown');
	$('#login_wrapper').addClass('fadeInUp');
	var login = document.getElementsByTagName('a[data-toggle="login"]');
	console.log(login);
	if(login[0] != null) { $('a[data-toggle="login"]').click(); console.log('login'); } 
	else { $('a[data-toggle="profile"]').click(); console.log('profile'); }
});

// Login Toggle
$('a[data-toggle="login"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline, #registerform, #lostpasswordform').addClass('animated fadeOut');
	$('#site-section-nav, #cd-intro-tagline, #registerform, #lostpasswordform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline, #registerform, #lostpasswordform').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled fadeOut');
		$('#loginform').addClass('fadeIn');
	}, 500 );
});

// Register Toggle
$('a[data-toggle="register"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline, #loginform, #lostpasswordform').addClass('animated fadeOut');
	$('#site-section-nav, #cd-intro-tagline, #loginform, #lostpasswordform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline, #loginform, #lostpasswordform').addClass('is-disabled'); 
		$('#registerform').removeClass('is-disabled fadeOut');
		$('#registerform').addClass('fadeIn');
	}, 200 );
});

// Lost Password Toggle
$('a[data-toggle="lostpass"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline, #loginform, #registerform').addClass('animated fadeOut');
	$('#site-section-nav, #cd-intro-tagline, #loginform, #registerform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline, #loginform, #registerform').addClass('is-disabled'); 
		$('#lostpasswordform').removeClass('is-disabled fadeOut');
		$('#lostpasswordform').addClass('fadeIn');
	}, 200 );
});

//
$('a[data-toggle="profile"]').click(function() {
	$('#site-section-nav, #cd-intro-tagline').addClass('animated fadeOut');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline').addClass('is-disabled'); 
		$('#profileform').removeClass('is-disabled fadeOut');
		$('#profileform').addClass('fadeIn');
	}, 200 );
});

$('#login_close').click(function(){
	$('#login_wrapper').removeClass('fadeInUp');
	$('#login_wrapper').addClass('fadeOutDown');
	$('#site-section-nav, #cd-intro-tagline').removeClass('is-disabled fadeOut');
	setTimeout(function(){ 
		$('#login_wrapper').addClass('is-disabled'); 
		$('#profileform, #loginform, #registerform, #lostpasswordform').addClass('is-disabled fadeOut');
		$('#site-section-nav, #cd-intro-tagline').addClass('fadeIn');
	}, 200 );
});


}); // End