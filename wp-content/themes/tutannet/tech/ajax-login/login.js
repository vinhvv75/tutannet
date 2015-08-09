jQuery(document).ready(function($){

// Login Toggle
$('a[data-toggle="login_wrap"]').click(function() {
	$('#login_wrapper').removeClass('is-disabled fadeOutDown').addClass('fadeInUp');
	$('#site-header-secondary, #search_wrapper').addClass('is-disabled fadeOut');
	var login = $('#login_wrapper').find('#loginform');
	if(login.length != 0) { $('a[data-toggle="login"]').click(); } 
	else { $('a[data-toggle="profile"]').click(); }
});

// Login Toggle
$('a[data-toggle="login"], button[data-toggle="login"]').click(function() {
	$('#registerform, #lostpasswordform').addClass('fadeOut').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-header-secondary, #registerform, #lostpasswordform').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 400 );
});

// Register Toggle
$('a[data-toggle="register"], button[data-toggle="register"]').click(function() {
	$('#loginform, #lostpasswordform').addClass('fadeOut').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#loginform, #lostpasswordform').addClass('is-disabled'); 
		$('#registerform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 200 );
});

// Lost Password Toggle
$('a[data-toggle="lostpass"], button[data-toggle="lostpass"]').click(function() {
	$('#loginform, #registerform').addClass('fadeOut').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#site-header-secondary, #loginform, #registerform').addClass('is-disabled'); 
		$('#lostpasswordform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 200 );
});

//
$('a[data-toggle="profile"]').click(function() {
	$('#site-header-secondary').addClass('fadeOut');
	setTimeout(function(){ 
		$('#profileform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 200 );
});

$('button[data-toggle="login_close"], a[data-toggle="login_close"]').click(function(){
	$('#login_wrapper').removeClass('fadeInUp').addClass('fadeOutDown');
	$('#site-header-secondary').removeClass('is-disabled fadeOut');
	setTimeout(function(){ 
		$('#login_wrapper').addClass('is-disabled'); 
		$('#profileform, #loginform, #registerform, #lostpasswordform').addClass('is-disabled fadeOut');
		$('#site-header-secondary').addClass('fadeIn');
	}, 400 );
});

$('#loginform, #registerform, #lostpasswordform, #profileform').mouseenter(function(){
	var login_close = $(this).find('.login_close')
	$(login_close).removeClass('is-disabled fadeOut').addClass('fadeIn');
}).mouseleave(function(){
	var login_close = $(this).find('.login_close')
	$(login_close).removeClass('fadeIn').addClass('fadeOut');
	setTimeout(function(){ $(login_close).addClass('is-disabled'); }, 200);
	
	
	
});


}); // End