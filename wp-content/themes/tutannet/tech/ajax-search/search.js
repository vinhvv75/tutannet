jQuery(document).ready(function($){


// Search Toggle
$('a[data-toggle="search_wrap"]').click(function() {
	$('#site-header-secondary').addClass('fadeOut');
	$('#login_wrapper').removeClass('fadeInUp');
	$('#login_wrapper').addClass('fadeOutDown');
	setTimeout(function(){ 
		$('#site-header-secondary, #login_wrapper').addClass('is-disabled'); 
		$('#search_wrapper').removeClass('is-disabled');
		$('#search_wrapper').removeClass('fadeOut');
		$('#search_wrapper').addClass('fadeIn');
	}, 500 );
});

// Close
$('button[data-toggle="search_close"]').click(function(){
	$('#search_wrapper').removeClass('fadeIn');
	$('#search_wrapper').addClass('fadeOut');
	$('#site-header-secondary').removeClass('is-disabled fadeOut');
	setTimeout(function(){ 
		$('#search_wrapper').addClass('is-disabled');
		$('#site-header-secondary').addClass('fadeIn');
	}, 500 );
});




}); // End

