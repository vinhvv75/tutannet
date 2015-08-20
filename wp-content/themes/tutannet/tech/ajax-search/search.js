jQuery(document).ready(function($){


// Search Toggle
$('a[data-toggle="search_wrap"]').click(function() {
	$('body,html').animate({
	    scrollTop: 0
	}, 800);
	$('#site-header-secondary').addClass('fadeOut');
	$('#login_wrapper').removeClass('fadeIn').addClass('fadeOut');
	$('#site-intro-img').removeClass('is-blurred');
	$('#arrow-button').addClass('fadeOut');
	$('body').addClass('overflow-hidden');
	$('#site-logo').addClass('small');
	setTimeout(function(){
		$('#site-intro-slides').removeClass('slow slideInUp').addClass('slideOutDown');
	}, -2000);
	setTimeout(function(){
		$('#arrow-button, #site-intro-slides').addClass('is-disabled');
		$('#site-header-secondary, #login_wrapper').addClass('is-disabled'); 
		$('#search_wrapper').removeClass('is-disabled fadeOut').addClass('fadeIn');
	}, 500);
});

// Close
$('button[data-toggle="search_close"]').click(function(){
	$('#search_wrapper').removeClass('fadeIn').addClass('fadeOut');
	$('#site-header-secondary').removeClass('is-disabled fadeOut');
	$('#arrow-button').removeClass('is-disabled fadeOut');
	$('body').removeClass('overflow-hidden');
	$('#site-intro-slides').removeClass('is-disabled slideOutDown').addClass('slideInUp');
	$('#site-logo').removeClass('small');
	setTimeout(function(){ 
		$('#search_wrapper').addClass('is-disabled');
		$('#site-header-secondary').addClass('fadeIn');
	}, 500 );
});




}); // End

