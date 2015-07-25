var window_cur_size = 'screen';

jQuery('document').ready(function(){
//var previus_view=document.getElementById('top_posts_web').innerHTML;
	screenSize=jQuery(".container").width();
	jQuery('.cont_vat_tab ul.content > li').filter(function() { return jQuery(this).css("display")!='none'}).addClass('active');
	jQuery('#wd-categories-tabs > .tabs > li').eq(0).addClass('active');
	sliderHeight=parseInt(jQuery("#slider-wrapper").height());
	sliderWidth=parseInt(jQuery("#slider-wrapper").width());
	sliderIndex=sliderHeight/sliderWidth;
	if(full_width_magazine)
		screenSize=jQuery("body").width();
	else
		screenSize=jQuery(".container").width();
	
	/*function load(){
		jQuery("body").removeClass("load")
	}*/
	
	if(jQuery(".container").hasClass("phone")){
		phone();		
	}
	else if(jQuery(".container").hasClass("tablet")){
		tablet();
	}
	else{checkMedia();}
	
	jQuery(window).resize(function(){checkMedia();});
	
	


	function checkMedia(){
		//################SCREEN
		if(jQuery('body').width()>=screenSize){screen();}
		//################TABLET
		if(jQuery('body').width()<screenSize && jQuery('body').width()>=640){tablet();}
		//################PHONE
		if(jQuery('body').width()<768){phone(false);}
		if(typeof(bwg_popup_resize)=='function')
			bwg_popup_resize();

	}

	function screen(){
		
		jQuery(".container").width(screenSize-10);
		
		jQuery(".container").removeClass("tablet");
		jQuery(".container").removeClass("phone");
		jQuery('.container>#content').before(jQuery('.container>#sidebar1'));
		jQuery("#header .phone-menu-block").removeClass("container").css({width:"auto"});
		jQuery(".container").width(jQuery("body").attr("screen-size"));
		jQuery("body header, body footer,#top-nav > div > ul,#top-nav > div > div > ul").not(".container").width("100%");
		
		jQuery(".blog").css('width','');
		

		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);	
		if(window_cur_size == 'phone'){
			jQuery("#header").find("#menu-button-block").remove();
			jQuery("#top-nav").css({"display":"block"});
			jQuery("#top-nav > div > ul  li.addedli,#top-nav > div > div > ul  li.addedli").remove();
			
			jQuery("#header-top .container").append(jQuery("#social"));
			jQuery("#header-middle").prepend(jQuery("#logo"));
			jQuery("aside .sidebar-container .widget-area").removeClass("clear");
			jQuery(".top-posts-block").width("100%");
			jQuery('#content').after(jQuery('#sidebar1'));
			jQuery('.added_not_exsisted_footer_sidbar').remove();
			
		}
		var max_height=[];
		jQuery('.cont_vat_tab ul.content> li').each(function(){
		   max_height.push(jQuery(this).height());
		})
		max_heightli = Math.max.apply(Math, max_height);
		jQuery('.cont_vat_tab ul.content').height(max_heightli);
		inserting_div_float_problem(jQuery('#sidebar-footer'));
		jQuery("#top-posts-contents-nav").css({"display":"none"});
	
		window_cur_size	= 'screen';
	}
	
	function tablet(){	
		jQuery(".container").removeClass("phone");
		jQuery('#content').after(jQuery('#sidebar1'));
		jQuery("#header .phone-menu-block").removeClass("container").css({width:"auto"});
		jQuery(".container").addClass("tablet");
		jQuery(".container").width(768);		
		jQuery(".container, #top-nav > div > ul,#top-nav > div > div > ul").width(768);
		jQuery(".tablet #blog,.tablet .blog,#top-posts .container.tablet,#header-top + .container.tablet").width(758);
		
		if(window_cur_size == 'phone'){
			jQuery('.container > #content').after(jQuery('.container > #sidebar1'));
			jQuery("#header").find("#menu-button-block").remove();
			jQuery("#top-nav").css({"display":"block"});
			jQuery("#top-nav > div > ul  li.addedli,#top-nav > div > div > ul  li.addedli").remove();
			
			jQuery("#header-top .container").append(jQuery("#social"));
			jQuery("#header-middle").prepend(jQuery("#logo"));
			jQuery("aside .sidebar-container .widget-area").removeClass("clear");
			jQuery(".top-posts-block").width("100%");
			jQuery('.added_not_exsisted_footer_sidbar').remove();
		}
		var max_height=[];
		jQuery('.cont_vat_tab ul.content> li').each(function(){
		   max_height.push(jQuery(this).height());
		})
		max_heightli = Math.max.apply(Math, max_height);
		jQuery('.cont_vat_tab ul.content').height(max_heightli);
		
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);

		window_cur_size	= 'tablet';
	}
	
	function phone(full){
		jQuery("#header .phone-menu-block").addClass("container");
		jQuery(".container").removeClass("tablet");
		jQuery(".container").addClass("phone");
		jQuery(".container, #top-nav > div > ul,#top-nav > div > div > ul").width("100%");
		
		if(jQuery('body').width()>320 && jQuery('body').width()<640){
			width="99%";
		}
		else if(jQuery('body').width()<=320){
			width="99%";
		}
		else{
			width="640px";
		}
			jQuery(".container").width(width);
			jQuery(".phone #blog,.phone .blog,#top-posts .container.phone,#header-top + .container.phone").width(width);
		
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);
		
		//### PHONE UNIQUE STYLES
		jQuery("#top-nav > div > ul  li.addedli,#top-nav > div.phone > div > ul  li.addedli").remove();
		jQuery("#top-nav > div.phone > ul  li:has(> ul),#top-nav > div.phone > div > ul  li:has(> ul)").each(function(){
				var strtext=jQuery(this).children("a").html();
				var strhref=jQuery(this).children("a").attr("href");
				var strlink='<a href="'+strhref+'">'+strtext+'</a>';
				jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');
		});
		if(window_cur_size != 'phone'){
			jQuery('.container>#content').after(jQuery('.container>#sidebar1'));
			jQuery('#content').after(jQuery('#sidebar1'));
			if(jQuery("#footer div.phone").length)
				jQuery("#footer div.phone").append(jQuery("#social"));
			else{
				jQuery("#footer > div").prepend("<div class='footer-sidbar added_not_exsisted_footer_sidbar'><div id='sidebar-footer' class='added_not_exsisted_footer phone container footer-sidbar'></div></div>")
				jQuery("#footer div.phone").append(jQuery("#social"));
				if(jQuery('body').width()>320 && jQuery('body').width()<640){width="99%";}else if(jQuery('body').width()<=320){width="99%";}else{width="640px";}
					jQuery(".container").width(width);

			}
			jQuery("#header-top .container").prepend(jQuery("#logo"));
		}
		
		for(var i=0;i<jQuery(".phone aside .sidebar-container .widget-area").length;i++){
			if (i%2 == 0){jQuery(".phone aside .sidebar-container .widget-area").eq(i).addClass("clear");}
		}
		
		
		jQuery("#header").find("#menu-button-block").remove();
		jQuery("#header .phone-menu-block").append('<div id="menu-button-block"><a href="#">Menu</a></div>');
		
		
		if(!jQuery("#top-nav").hasClass("open")){jQuery("#top-nav").css({"display":"none"})};
		jQuery(".phone #site-description p").css({"width":(jQuery(".container").width()-120)+"px"});
		jQuery(".phone .top-posts-block").width((jQuery("#top-posts-list li").length*255)+"px");
		var max_height=[];
		jQuery('.cont_vat_tab ul.content> li').each(function(){
		   max_height.push(jQuery(this).height());
		})
		max_heightli = Math.max.apply(Math, max_height);
		jQuery('.cont_vat_tab ul.content').height(max_heightli);
		window_cur_size	= 'phone';
	}
	
	
	function sliderSize(sHeight) {
		jQuery("#slider-wrapper").css('height',sHeight);
		//jQuery("#slideshow").css('height',(sHeight+170));
	}	
	function inserting_div_float_problem(main_div){
		jQuery(main_div).children('.clear:not(:last-child)').remove();
		var iner_elements=jQuery(main_div).children();
		var main_width=jQuery(main_div).width();
		var summary_width=0;
		for(i=0;i<iner_elements.length;i++){
			summary_width=summary_width+jQuery(iner_elements[i]).outerWidth();
			if(summary_width >= main_width){
				jQuery(iner_elements[i]).before('<div class="clear"></div>')
				summary_width=jQuery(iner_elements[i]).outerWidth();
			}
		}
	}
	
});

