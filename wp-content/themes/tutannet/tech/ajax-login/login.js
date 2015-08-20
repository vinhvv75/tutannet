jQuery(document).ready(function($){

// Login Toggle
$('a[data-toggle="login_wrap"], a[data-toggle="register_wrap"]').click(function() {
	$('#site-intro-img').addClass('is-invisible');
	$('#login_wrapper').removeClass('is-disabled fadeOut').addClass('fadeIn');
	$('#site-header-secondary, #search_wrapper, #arrow-button').addClass('fadeOut');
	$('body').addClass('overflow-hidden');
	$('#site-logo').addClass('small');
	setTimeout(function(){
		$('#site-intro-slides').removeClass('slow slideInUp').addClass('slideOutDown');
	}, -2000);
	setTimeout(function(){
		$('#site-header-secondary, #search_wrapper, #arrow-button, #site-intro-slides').addClass('is-disabled');
	}, 500);
	var login = $('#login_wrapper').find('#loginform');
	if(login.length != 0) { 
		if($(this).attr('data-toggle') == 'register_wrap') {$('a[data-toggle="register"]').click();}
		else {$('a[data-toggle="login"]').click();} 
	} 
	else { $('a[data-toggle="profile"]').click(); }
});

$('a[data-toggle="register_wrap"]').click(function(){
	$('#site-intro-img').addClass('is-invisible');
	$('#login_wrapper').removeClass('is-disabled fadeOut').addClass('fadeIn');
	$('#site-header-secondary, #search_wrapper, #arrow-button').addClass('fadeOut');
	$('body').addClass('overflow-hidden');
	$('#site-logo').addClass('small');
	setTimeout(function(){
		$('#site-intro-slides').removeClass('slow slideInUp').addClass('slideOutDown');
	}, -2000);
	setTimeout(function(){
		$('#site-header-secondary, #search_wrapper, #arrow-button, #site-intro-slides').addClass('is-disabled');
	}, 500);
	$('a[data-toggle="register"]').click();
});

// Login Toggle
$('a[data-toggle="login"], button[data-toggle="login"]').click(function() {
	backTop();
	$('#registerform, #lostpasswordform').addClass('fadeOut').removeClass('fadeIn');
	setTimeout(function(){ 
		$('#registerform, #lostpasswordform').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 200 );
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
		$('#loginform, #registerform').addClass('is-disabled'); 
		$('#lostpasswordform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 200 );
});

// Profile Toggle
$('a[data-toggle="profile"]').click(function() {
	backTop();
	setTimeout(function(){ 
		$('#profileform').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 200 );
});

$('button[data-toggle="admin"]').click(function(){
	window.location = getBaseUrl() + "/wp-admin";
});

$('button[data-toggle="login_close"], a[data-toggle="login_close"]').click(function(){
	$('#site-intro-img').removeClass('is-invisible');
	$('#profileform, #loginform, #registerform, #lostpasswordform').addClass('fadeOut');
	$('#login_wrapper').removeClass('fadeIn').addClass('fadeOut');
	$('#site-header-secondary, #arrow-button').removeClass('is-disabled fadeOut');
	$('#site-intro-slides').removeClass('is-disabled slideOutDown').addClass('slideInUp');
	$('body').removeClass('overflow-hidden');
	$('#site-logo').removeClass('small');
	setTimeout(function(){ 
		$('#login_wrapper, #profileform, #loginform, #registerform, #lostpasswordform').addClass('is-disabled');
		$('#site-header-secondary').addClass('fadeIn');
	}, 500 );
});


function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}

function backTop() {
	$('body,html').animate({
	    scrollTop: 0
	}, 800);
}


}); // End