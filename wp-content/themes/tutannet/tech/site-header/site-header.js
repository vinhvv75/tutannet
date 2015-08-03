jQuery(document).ready(function($){
//	if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
//		var MQL = 1170;
//	
//		primary navigation slide-in effect
//		if($(window).width() > MQL) {
//			var headerHeight = $('#site-header').height();
//			$(window).on('scroll',
//			{
//		        previousTop: 0
//		    }, 
//		    function () {
//			    var currentTop = $(window).scrollTop();
//			    check if user is scrolling up
//			    if (currentTop < this.previousTop ) {
//			    	if scrolling up...
//			    	if (currentTop > 0 && $('#site-header').hasClass('is-fixed')) {
//			    		$('#site-header').addClass('is-visible');
//			    	} else {
//			    		$('#site-header').removeClass('is-visible is-fixed');
//			    	}
//			    } else {
//			    	if scrolling down...
//			    	$('#site-header').removeClass('is-visible');
//			    	if( currentTop > headerHeight && !$('#site-header').hasClass('is-fixed')) $('#site-header').addClass('is-fixed');
//			    }
//			    this.previousTop = currentTop;
//			});
//		}
//	
//		open/close primary navigation
//		$('#site-primary-nav-trigger').on('click', function(){
//			$('.cd-menu-icon').toggleClass('is-clicked'); 
//			$('#site-header').toggleClass('menu-is-open');
//			
//			in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
//			if( $('#site-primary-nav').hasClass('is-visible') ) {
//				$('#site-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
//					$('body').removeClass('overflow-hidden');
//				});
//			} else {
//				$('#site-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
//					$('body').addClass('overflow-hidden');
//				});	
//			}
//		});
//	});
	
	
	var secondaryNav = $('#site-section-nav'),
		secondaryNavTopPosition = secondaryNav.offset().top,
		taglineOffesetTop = $('#cd-intro-tagline').offset().top + $('#cd-intro-tagline').height() + parseInt($('#cd-intro-tagline').css('paddingTop').replace('px', '')),
		contentSections = $('.cd-section');
	
	$(window).on('scroll', function(){
		//on desktop - assign a position fixed to logo and action button and move them outside the viewport
		( $(window).scrollTop() > taglineOffesetTop ) ? $('#site-logo, #site-toolbar').addClass('is-hidden') : $('#site-logo, #site-toolbar').removeClass('is-hidden');
		
		//on desktop - fix secondary navigation on scrolling
		if($(window).scrollTop() > secondaryNavTopPosition ) {
			//fix secondary navigation
			secondaryNav.addClass('is-fixed');
			secondaryNav.addClass('repainted');
			//push the .cd-main-content giving it a top-margin
			$('.cd-main-content').addClass('has-top-margin');	
			//on Firefox CSS transition/animation fails when parent element changes position attribute
			//so we to change secondary navigation childrens attributes after having changed its position value
			setTimeout(function() {
	            secondaryNav.addClass('animate-children');
	            $('#site-logo').addClass('slide-in');
				$('#site-toolbar').addClass('slide-in');
	        }, 50);
		} else {
			secondaryNav.removeClass('is-fixed');
			secondaryNav.removeClass('repainted');
			$('.cd-main-content').removeClass('has-top-margin');
			setTimeout(function() {
	            secondaryNav.removeClass('animate-children');
	            $('#site-logo').removeClass('slide-in');
				$('#site-toolbar').removeClass('slide-in');
	        }, 50);
		}

		//on desktop - update the active link in the secondary fixed navigation
		updateSecondaryNavigation();
	});

	function updateSecondaryNavigation() {
		contentSections.each(function(){
			var actual = $(this),
				actualHeight = actual.height() + parseInt(actual.css('paddingTop').replace('px', '')) + parseInt(actual.css('paddingBottom').replace('px', '')),
				actualAnchor = secondaryNav.find('a[href="#'+actual.attr('id')+'"]');
			if ( ( actual.offset().top - secondaryNav.height() <= $(window).scrollTop() ) && ( actual.offset().top +  actualHeight - secondaryNav.height() > $(window).scrollTop() ) ) {
				actualAnchor.addClass('active');
			}else {
				actualAnchor.removeClass('active');
			}
		});
	}

	//on mobile - open/close secondary navigation clicking/tapping the site-section-nav-trigger
	$('#site-section-nav-trigger').on('click', function(event){
		event.preventDefault();
		$(this).toggleClass('menu-is-open');
		secondaryNav.find('ul').toggleClass('is-visible');
	});

	//smooth scrolling when clicking on the secondary navigation items
	secondaryNav.find('ul a').on('click', function(event){
        event.preventDefault();
        var target= $(this.hash);
        $('body,html').animate({
        	'scrollTop': target.offset().top - secondaryNav.height() + 1
        	}, 400
        ); 
        //on mobile - close secondary navigation
        $('#site-section-nav-trigger').removeClass('menu-is-open');
        secondaryNav.find('ul').removeClass('is-visible');
    });

    //on mobile - open/close primary navigation clicking/tapping the menu icon
	$('#site-intro-nav').on('click', function(event){
		if($(event.target).is('#site-intro-nav')) $(this).children('ul').toggleClass('is-visible');
	});
});