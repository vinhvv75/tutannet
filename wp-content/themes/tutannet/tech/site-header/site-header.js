jQuery(document).ready(function($){
	
	var secondaryNav = $('#site-section-nav'),
		secondaryNavTopPosition = secondaryNav.offset().top,
		OffesetTop = $('#site-section-nav').offset().top,
		contentSections = $('.cd-section'), block_index = 0, block_cat_name = $('.section-name')[block_index],
		section_title = document.getElementById('section-title');

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
		( $(window).scrollTop() > OffesetTop ) ? $('#site-logo, #site-toolbar, #site-intro-nav').addClass('is-hidden') : $('#site-logo, #site-toolbar, #site-intro-nav').removeClass('is-hidden');
				
		//on desktop - fix secondary navigation on scrolling
		if($(window).scrollTop() > secondaryNavTopPosition ) {
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

		//on desktop - update the active link in the secondary fixed navigation
		updateSecondaryNavigation();
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