jQuery(document).ready(function($){
	
	var secondaryNav = $('#site-section-nav'),
		secondaryNavTopPosition = secondaryNav.offset().top,
		OffesetTop = $('#site-section-nav').offset().top,
		contentSections = $('.cd-section'), block_index = 0, block_cat_name = $('.section-name')[block_index],
		section_title = document.getElementById('section-title'),
		scroll = $(document).scrollTop(),
		headerHeight = $('#site-header').outerHeight();

	section_title.innerHTML = $(block_cat_name).find('span').html();
	
	// tab toggle in navigation, toolbar
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  e.target; // newly activated tab
	  e.relatedTarget; // previous active tab
	});
	$('a[data-toggle="tab"]').click(function() {
		$('html,body').animate({
		        scrollTop: 0},
		        'slow');
		var section_title = document.getElementById('section-title');
		section_title.innerHTML = ($(this).find('b').html());
		block_index = $('#section-navigation ul').find($(this).parent()).index();
		block_cat_name = $('.section-name')[block_index];
	});
	
	// initalize bootstrap tooltip
	$('[data-toggle="tooltip"]').tooltip();
	$('#site-toolbar a, #login_wrapper a').tooltip({placement: "bottom", template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner" style="white-space: nowrap;"></div></div>'});
						
	$(window).on('scroll', function(){
		//on desktop - assign a position fixed to logo and action button and move them outside the viewport
		( $(window).scrollTop() > OffesetTop && $(window).width() >= 992  ) ? $('#site-logo, #site-toolbar, #site-intro-nav').addClass('is-hidden') : $('#site-logo, #site-toolbar, #site-intro-nav').removeClass('is-hidden');
						
		//on mobile - fix primary navigation on scrolling
//		( $(window).width() < 992 ) ? $('#site-logo, #site-toolbar, #site-intro-nav').removeClass('is-hidden') : $('#site-logo, #site-toolbar, #site-intro-nav').addClass('is-hidden');				
		
		//on desktop - fix secondary navigation on scrolling
		if($(window).scrollTop() > secondaryNavTopPosition && $(window).width() >= 992  ) {
			//fix secondary navigation
			secondaryNav.addClass('is-fixed');
			secondaryNav.addClass('repainted');
			
			if ( $(window).scrollTop() >= $(block_cat_name).offset().top )
			{
				updateSectionNav(true);	
			}
			else { updateSectionNav(false); }			
								
			
			if (isDay()) {
				secondaryNav.addClass('isDay');
			} else { secondaryNav.addClass('isNight'); }
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
			updateSectionNav(false);
			
			if (isDay()) {
				secondaryNav.removeClass('isDay');
			} else { secondaryNav.removeClass('isNight'); }
			$('.cd-main-content').removeClass('has-top-margin');
			setTimeout(function() {
	            secondaryNav.removeClass('animate-children');
	            $('#site-logo').removeClass('slide-in');
				$('#site-toolbar').removeClass('slide-in');
	        }, 50);
		}
		
		   var scrolled = $(document).scrollTop();
	      if ($(window).width() < 992) {
		      if (scrolled > headerHeight){
		        $('#site-header, #site-logo, #site-toolbar, #site-primary-nav-trigger').addClass('off-canvas');
		      } else {
		        $('#site-header, #site-logo, #site-toolbar, #site-primary-nav-trigger').removeClass('off-canvas');
		      }
		
		      if (scrolled > scroll){
		      	$('#site-header, #site-logo, #site-toolbar, #site-primary-nav-trigger').removeClass('fixed').addClass('off-canvas');
		      } else {
		      	$('#site-header, #site-logo, #site-toolbar, #site-primary-nav-trigger').addClass('fixed').removeClass('off-canvas');
		      }     
		      
		      if (scrolled <= headerHeight) {
		      	$('#site-header').addClass('top');
		      } else { 
		      	$('#site-header').removeClass('top');
		      }
		      scroll = $(document).scrollTop(); 
	      } 
	

	});
	
	
		secondaryNav
		  .mouseenter(function() {
		    if ( $('#section-navigation').hasClass('is-hidden') 
		    	&& $(window).scrollTop() >= $(block_cat_name).offset().top ) 
		    { setTimeout(function(){updateSectionNav(false);},100); }
		  })
		  .mouseleave(function() {
		  	if ( $('#section-title').hasClass('is-hidden')
		  		&& $(window).scrollTop() >= $(block_cat_name).offset().top ) 
		  	{ setTimeout(function(){updateSectionNav(true);},400); }
		  });
	
	
	function updateSectionNav(status) {
		if (status) {
			$('#section-navigation').addClass('is-hidden');
			$('#section-title').removeClass('is-hidden');
			$('#section-title').addClass('fadeIn');
		} else {
			$('#section-navigation').removeClass('is-hidden');
			$('#section-title').addClass('is-hidden');
			$('#section-title').removeClass('fadeIn');
		}
	}

	//smooth scrolling when clicking on the secondary navigation items
	secondaryNav.find('ul a').on('click', function(event){
        event.preventDefault();
        var target= $(this.hash);
        $('body,html').animate({
        	'scrollTop': target.offset().top - secondaryNav.height() + 1
        	}, 400
        ); 
    });

    //on mobile - open/close primary navigation clicking/tapping the menu icon
	$('#site-intro-nav').on('click', function(event){
		if($(event.target).is('#site-intro-nav')) $(this).children('ul').toggleClass('is-visible');
	});
	
	//open/close primary navigation
	$('#site-primary-nav-trigger').on('click', function(){
		$('.cd-menu-icon').toggleClass('is-clicked'); 
		$('.cd-header').toggleClass('menu-is-open');
		
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('#site-primary-nav').hasClass('is-visible') ) {
			$('#site-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('#site-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
			});	
		}
	});
	
	
});