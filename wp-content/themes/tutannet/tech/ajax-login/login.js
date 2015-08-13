jQuery(document).ready(function($){

// Login Toggle
$('a[data-toggle="login_wrap"]').click(function() {
	$('#site-intro-img').addClass('is-blurred');
	$('#login_wrapper').removeClass('is-disabled fadeOutDown').addClass('fadeInUp');
	$('#site-header-secondary, #search_wrapper').addClass('is-disabled fadeOut');
	var login = $('#login_wrapper').find('#loginform');
	if(login.length != 0) { $('a[data-toggle="login"]').click(); } 
	else { $('a[data-toggle="profile"]').click(); }
});

// Login Toggle
$('a[data-toggle="login"], button[data-toggle="login"]').click(function() {
	backTop();
	$('#registerform, #lostpasswordform').addClass('fadeOutDown').removeClass('fadeInUp');
	setTimeout(function(){ 
		$('#registerform, #lostpasswordform').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled fadeOutDown').addClass('fadeInUp');
	}, 400 );
});

// Register Toggle
$('a[data-toggle="register"], button[data-toggle="register"]').click(function() {
	$('#loginform, #lostpasswordform').addClass('fadeOutDown').removeClass('fadeInUp');
	setTimeout(function(){ 
		$('#loginform, #lostpasswordform').addClass('is-disabled'); 
		$('#registerform').removeClass('is-disabled fadeOutDown').addClass('fadeInUp');
	}, 200 );
});

// Lost Password Toggle
$('a[data-toggle="lostpass"], button[data-toggle="lostpass"]').click(function() {
	$('#loginform, #registerform').addClass('fadeOutDown').removeClass('fadeInUp');
	setTimeout(function(){ 
		$('#loginform, #registerform').addClass('is-disabled'); 
		$('#lostpasswordform').removeClass('is-disabled fadeOutDown').addClass('fadeInUp');
	}, 200 );
});

// Profile Toggle
$('a[data-toggle="profile"]').click(function() {
	backTop();
	setTimeout(function(){ 
		$('#profileform').removeClass('is-disabled fadeOutDown').addClass('fadeInUp');
	}, 200 );
});

$('button[data-toggle="admin"]').click(function(){
	window.location = getBaseUrl() + "/wp-admin";
});

$('button[data-toggle="login_close"], a[data-toggle="login_close"]').click(function(){
	$('#site-intro-img').removeClass('is-blurred');
	$('#profileform, #loginform, #registerform, #lostpasswordform').addClass('fadeOutDown');
	$('#login_wrapper').removeClass('fadeInUp').addClass('fadeOutDown');
	$('#site-header-secondary').removeClass('is-disabled fadeOut');
	setTimeout(function(){ 
		$('#login_wrapper, #profileform, #loginform, #registerform, #lostpasswordform').addClass('is-disabled');
		$('#site-header-secondary').addClass('fadeIn');
	}, 400 );
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