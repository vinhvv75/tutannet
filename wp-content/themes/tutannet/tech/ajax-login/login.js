jQuery(document).ready(function($){

// Login Toggle
$('a[data-toggle="login_wrap"]').click(function() {
	$('#login_wrapper').removeClass('is-disabled');
	$('#login_wrapper').removeClass('fadeOutDown');
	$('#login_wrapper').addClass('fadeInUp');
	$('#site-header-secondary, #search_wrapper').addClass('fadeOut');
	$('#site-header-secondary, #search_wrapper').addClass('is-disabled');
	var login = $('#login_wrapper').find('#loginform');
	if(login.length != 0) { $('a[data-toggle="login"]').click(); } 
	else { $('a[data-toggle="profile"]').click(); }
});

// Login Toggle
$('a[data-toggle="login"]').click(function() {
	$('#registerform, #lostpasswordform').addClass('fadeOut');
	$('#registerform, #lostpasswordform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-header-secondary, #registerform, #lostpasswordform').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled fadeOut');
		$('#loginform').addClass('fadeIn');
	}, 500 );
});

// Register Toggle
$('a[data-toggle="register"]').click(function() {
	$('#loginform, #lostpasswordform').addClass('fadeOut');
	$('#loginform, #lostpasswordform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#loginform, #lostpasswordform').addClass('is-disabled'); 
		$('#registerform').removeClass('is-disabled fadeOut');
		$('#registerform').addClass('fadeIn');
	}, 200 );
});

// Lost Password Toggle
$('a[data-toggle="lostpass"]').click(function() {
	$('#loginform, #registerform').addClass('fadeOut');
	$('#loginform, #registerform').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-header-secondary, #loginform, #registerform').addClass('is-disabled'); 
		$('#lostpasswordform').removeClass('is-disabled fadeOut');
		$('#lostpasswordform').addClass('fadeIn');
	}, 200 );
});

//
$('a[data-toggle="profile"]').click(function() {
	$('#site-header-secondary').addClass('fadeOut');
	setTimeout(function(){ 
		$('#profileform').removeClass('is-disabled fadeOut');
		$('#profileform').addClass('fadeIn');
	}, 200 );
});

$('button[data-toggle="login_close"]').click(function(){
	$('#login_wrapper').removeClass('fadeInUp');
	$('#login_wrapper').addClass('fadeOutDown');
	$('#site-header-secondary').removeClass('is-disabled fadeOut');
	setTimeout(function(){ 
		$('#login_wrapper').addClass('is-disabled'); 
		$('#profileform, #loginform, #registerform, #lostpasswordform').addClass('is-disabled fadeOut');
		$('#site-header-secondary').addClass('fadeIn');
	}, 200 );
});


}); // End