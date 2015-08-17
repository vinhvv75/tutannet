jQuery(document).ready(function($){
	
	var secondaryNav = $('#site-section-nav'),
		secondaryNavTopPosition = secondaryNav.offset().top,
		OffesetTop = $('#site-section-nav').offset().top,
		contentSections = $('.cd-section'), 
		block_cat_name = $('#section-name'),
		section_title = document.getElementById('section-title'),
		scroll = $(document).scrollTop(),
		headerHeight = $('#site-header').outerHeight();

	section_title.innerHTML = $(block_cat_name).find('span').html();

	var introSection = $('#cd-intro-img'),
			introSectionHeight = introSection.height(),
			//change scaleSpeed if you want to change the speed of the scale effect
			scaleSpeed = 0.3,
			//change opacitySpeed if you want to change the speed of opacity reduction effect
			opacitySpeed = 1; 
		
		//update this value if you change this breakpoint in the style.css file (or _layout.scss if you use SASS)
		var MQ = 1170;
	
		triggerAnimation();
		$(window).on('resize', function(){
			triggerAnimation();
		});
	
		//bind the scale event to window scroll if window width > $MQ (unbind it otherwise)
		function triggerAnimation(){
			if($(window).width()>= MQ) {
				$(window).on('scroll', function(){
					//The window.requestAnimationFrame() method tells the browser that you wish to perform an animation- the browser can optimize it so animations will be smoother
					window.requestAnimationFrame(animateIntro);
				});
			} else {
				$(window).off('scroll');
			}
		}
		//assign a scale transformation to the introSection element and reduce its opacity
		function animateIntro () {
			var scrollPercentage = ($(window).scrollTop()/introSectionHeight).toFixed(5),
				scaleValue = 1 - scrollPercentage*scaleSpeed;
			//check if the introSection is still visible
			if( $(window).scrollTop() < introSectionHeight) {
				introSection.css({
				    '-moz-transform': 'scale(' + scaleValue + ') translateZ(0)',
				    '-webkit-transform': 'scale(' + scaleValue + ') translateZ(0)',
					'-ms-transform': 'scale(' + scaleValue + ') translateZ(0)',
					'-o-transform': 'scale(' + scaleValue + ') translateZ(0)',
					'transform': 'scale(' + scaleValue + ') translateZ(0)',
					'opacity': 1 - scrollPercentage*opacitySpeed
				});
			}
		}
	
	
	// initalize bootstrap tooltip
	$('[data-toggle="tooltip"]').tooltip();
	$('#site-toolbar a').tooltip({placement: "bottom", template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner" style="white-space: nowrap;"></div></div>'});
	
	if ($(window).width() < 992 && scroll <= headerHeight) {
		$('#site-header, #site-logo').addClass('top').removeClass('fixed');
		$('#site-header').removeClass('is-open');
		$('#site-toolbar').addClass('is-disabled');
	}
						
	$(window).on('scroll', function(){
		//on desktop - assign a position fixed to logo and action button and move them outside the viewport
		( $(window).scrollTop() > OffesetTop && $(window).width() >= 992  ) ? $('#site-logo').addClass('is-hidden') : $('#site-logo').removeClass('is-hidden');	
						
		if ($(this).scrollTop() > 780) {
		         $('#section-name').addClass('fixed');
		      } else {
		          $('#section-name').removeClass('fixed');
		      }			
						
		//on desktop - fix secondary navigation on scrolling
		if($(window).scrollTop() > secondaryNavTopPosition && $(window).width() >= 992  ) {
			//fix secondary navigation
			secondaryNav.addClass('is-fixed');
			secondaryNav.addClass('repainted');
			
			if ( $(window).scrollTop() >= block_cat_name.offsetTop )
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
	        }, 50);
		}
		
		  var scrolled = $(document).scrollTop();
	      if ($(window).width() < 992) {
		      if (scrolled > headerHeight){
		      	$('#site-toolbar').removeClass('is-disabled');
		        $('#site-header, #site-logo, #site-toolbar').removeClass('fixed').addClass('off-canvas');
		        $('#site-header').removeClass('is-open');
		      } else {
		        $('#site-header, #site-logo, #site-toolbar').addClass('fixed').removeClass('off-canvas');
		      }
		
		      if (scrolled > scroll){
		      	$('#site-toolbar').removeClass('is-disabled');
		      	$('#site-header, #site-logo, #site-toolbar').removeClass('fixed').addClass('off-canvas');
		      	$('#site-header').removeClass('is-open');
		      } else {
		      	$('#site-header, #site-logo, #site-toolbar').addClass('fixed').removeClass('off-canvas');
		      }     
		      
		      if (scrolled <= headerHeight) {
		      	$('#site-header, #site-logo, #site-toolbar').addClass('top');
		      	$('#site-header').removeClass('is-open');
		      	if( $('#site-primary-nav').hasClass('is-visible') ) {
		      		$('#site-toolbar').addClass('is-disabled'); 
		      	} else { $('#site-toolbar').removeClass('is-disabled'); }
		      } else { 
		      	$('#site-header, #site-logo, #site-toolbar').removeClass('top');
		      	$('#site-primary-nav').removeClass('is-visible');
		      }
		      scroll = $(document).scrollTop(); 
	      } 
	

	});
	
	
//		secondaryNav
//		  .mouseenter(function() {
//		    if ( $('.section-navigation').hasClass('is-hidden') 
//		    	&& $(window).scrollTop() >= $(block_cat_name).offset().top ) 
//		    { setTimeout(function(){updateSectionNav(false);},100); }
//		  })
//		  .mouseleave(function() {
//		  	if ( $('#section-title').hasClass('is-hidden')
//		  		&& $(window).scrollTop() >= $(block_cat_name).offset().top ) 
//		  	{ setTimeout(function(){updateSectionNav(true);},400); }
//		  });
	
	
	function updateSectionNav(status) {
		if (status) {
			$('.section-navigation').addClass('is-hidden');
			$('#section-title').removeClass('is-hidden');
			$('#section-title').addClass('fadeIn');
		} else {
			$('.section-navigation').removeClass('is-hidden');
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
//	$('#site-intro-nav').on('click', function(event){
//		if($(event.target).is('#site-intro-nav')) $(this).children('ul').toggleClass('is-visible');
//	});
	
	//open/close primary navigation
	$('#site-logo').on('click', function(){
		if (scroll > headerHeight) { 
			$('#site-logo').toggleClass('top'); 
			$('#site-header').toggleClass('is-open');
		}
		
		var Top = 780;
		console.log($('#site-intro-slides')[0]);
		$('body,html').animate({
		    scrollTop: Top 
		}, 800);
		
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('#site-primary-nav').hasClass('is-visible') ) {
			$('#site-toolbar').removeClass('is-disabled');
			$('#site-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
			});
			
		} else {
			$('#site-toolbar').addClass('is-disabled');
			$('#site-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
			});	
		}
	});
	
	//open/close toolbar wrapper
	$('#toolbar-trigger').on('click', function(){
		$('.toolbar-menu-icon').toggleClass('is-clicked');
	});
	
	$('a[data-toggle="test"]').on('click', function(){
		console.log('true');
		$('#site-menu').toggleClass('col-md-2 col-lg-2').toggleClass('col-md-4 col-lg-4');
		$('#site-intro').toggleClass('col-md-10 col-lg-10').toggleClass('col-md-8 col-lg-8');
	});
	
	
}); // End