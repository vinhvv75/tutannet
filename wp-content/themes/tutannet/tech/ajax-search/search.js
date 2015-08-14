jQuery(document).ready(function($){


// Search Toggle
$('a[data-toggle="search_wrap"]').click(function() {
	$('body,html').animate({
	    scrollTop: 0
	}, 800);
	$('#site-header-secondary').addClass('fadeOut');
	$('#login_wrapper').removeClass('fadeInUp').addClass('fadeOutDown');
	$('#site-intro-img').removeClass('is-blurred');
	setTimeout(function(){ 
		$('#site-header-secondary, #login_wrapper').addClass('is-disabled'); 
		$('#search_wrapper').removeClass('is-disabled fadeOut').addClass('fadeIn');
		$('#site-logo').addClass('small');
	}, 500 );
});

// Close
$('button[data-toggle="search_close"]').click(function(){
	$('#search_wrapper').removeClass('fadeIn').addClass('fadeOut');
	$('#site-header-secondary').removeClass('is-disabled fadeOut');
	setTimeout(function(){ 
		$('#search_wrapper').addClass('is-disabled');
		$('#site-header-secondary').addClass('fadeIn');
		$('#site-logo').removeClass('small');
	}, 500 );
});




}); // End

