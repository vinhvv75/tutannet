jQuery(document).ready(function(){
	jQuery('embed,object,iframe').wrap("<div class='video-container'></div>");
	var cat_tab_is_animated = 0;
	jQuery('#top-nav li:has(> ul)').addClass('haschild');
	
	jQuery("#top-nav > div > ul  li,#top-nav > div > div > ul  li").hover(function(){
		if(jQuery(this).parents(".container").hasClass("phone") ){return false;}
		jQuery(this).parent("ul").find("ul").slideUp(5);
		jQuery(this).parent("ul").children().removeClass("active");
		jQuery(this).addClass("active");
		if(jQuery(this).find("ul").length){jQuery(this).children("ul").stop().slideDown("slow").addClass("opensub");}
	},function(){
		if(jQuery(this).parents(".container").hasClass("phone")){return false;}
		jQuery(this).parent("ul").children().removeClass("active");
		jQuery(this).parent("ul").find("ul").stop().slideUp(50);
		jQuery(".opensub").removeClass("opensub");
	});
		

		jQuery("#top-nav > div > ul  li.haschild > a,#top-nav > div > div > ul  li.haschild > a").click(function(){
			if(jQuery(this).parents(".container").hasClass("phone")){
			if(jQuery(this).parent().hasClass("open")){
				jQuery(this).parent().parent().find(".haschild ul").slideUp(100);
				jQuery(this).parent().removeClass("open");
				return false;
			}
			jQuery(this).parent().parent().find(".haschild ul").slideUp(100);
			jQuery(this).parent().parent().find(".haschild").removeClass("open");
			jQuery(this).next("ul").slideDown("fast");
			jQuery(this).parent().addClass("open");
			return false;}
		});
		
		
		
		jQuery("#header .phone-menu-block").on("click","#menu-button-block", function(){
			if(jQuery("#top-nav").hasClass("open")){
				jQuery("#header #top-nav").slideUp("fast");
				jQuery("#top-nav").removeClass("open");
			}
			else{
				jQuery("#header #top-nav").slideDown("slow");
				jQuery("#top-nav").addClass("open");
			}
		});
		
		
		/*##########TOP POSTS#############*/
		function leftMove(){
			
			leftsize=jQuery('.top-posts-block').offset().left;
			if((jQuery('.top-posts-wrapper').offset().left-jQuery('.top-posts-block').width()+jQuery('.top-posts-wrapper').outerWidth())>=leftsize){
				clearInterval(goleft);
				return false;
			}
			jQuery('.top-posts-block').css({"left": "-=3px"});
			leftsize-=1;
		}
		
		
		function rightMove(){
			
			if(jQuery('.top-posts-block').offset().left>=jQuery('.top-posts-wrapper').offset().left){
				clearInterval(goleft);
				return false;
			}
			jQuery('.top-posts-block').css({"left": "+=3px"});
			leftsize-=1;
		}
		
		var mobile   = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent); 
		windowsPhone = /windows phone/i.test(navigator.userAgent); 
		var clickstart = mobile ? "touchstart" : "mousedown";
		var clickend = mobile ? "touchend" : "mouseup";

		
		if(windowsPhone){
			jQuery(".top-posts-right").click(function(event){
				leftsize=jQuery('.top-posts-block').offset().left;
				if((jQuery('.top-posts-wrapper').offset().left-jQuery('.top-posts-block').width()+jQuery('.top-posts-wrapper').outerWidth())>=leftsize){
					clearInterval(goleft);
					return false;
				}
				jQuery('.top-posts-block').animate({"left": "-=50px"},500);
				leftsize-=100;
			});
				
			jQuery(".top-posts-left").click(function(event){
				if(jQuery('.top-posts-block').offset().left>=jQuery('.top-posts-wrapper').offset().left){
				clearInterval(goleft);
				return false;
				}
				jQuery('.top-posts-block').animate({"left": "+=100px"},500);
				leftsize-=100;
			});
			
		}else{
			jQuery(".top-posts-right").bind(clickstart,function(event){
				goleft=setInterval(leftMove,5);
			}).bind(clickend,function(event) {
				clearInterval(goleft);
				return false;
			});
			
				
			jQuery(".top-posts-left").bind(clickstart,function(event){
				goright=setInterval(rightMove,5);
			}).bind(clickend,function(event) {
				clearInterval(goright);
				return false;
			});
		}
		
		
		
		
		/*##############CATEGORIES TABS####################*/
		
		jQuery("#wd-categories-tabs ul.tabs li a").click(function(){
				if(jQuery(this).parent().hasClass("active")){return false;}
				if(cat_tab_is_animated) return false;
				cat_tab_is_animated=1;
				jQuery("#wd-categories-tabs ul.tabs li").removeClass("active");
				var id=jQuery(this).attr("href").replace("#","");
				var width_of_catigory_tab_li=jQuery("#wd-categories-tabs ul.content > li.active").eq(0).width();
				jQuery(this).parent().addClass("active");
				if(jQuery("#wd-categories-tabs ul.content > li.active").eq(0).index()>jQuery("#categories-tabs-content-"+id).index()){
					jQuery("#wd-categories-tabs ul.content > li.active").animate({'left': width_of_catigory_tab_li+"px"},{duration:500,complete:function() { jQuery(this).removeClass("active");jQuery(this).css("display","none").css("left","0px"); cat_tab_is_animated=0;} });
					jQuery("#categories-tabs-content-"+id).attr('style','left:-'+width_of_catigory_tab_li+'px');
					jQuery("#categories-tabs-content-"+id).show();
					jQuery("#categories-tabs-content-"+id).animate({'left':'0px'},{duration:500,complete:function() { jQuery(this).addClass("active")} });
				}
				else{
					jQuery("#wd-categories-tabs ul.content > li.active").animate({'left':"-" + width_of_catigory_tab_li+"px"},{duration:500,complete:function() { jQuery(this).removeClass("active");jQuery(this).css("display","none").css("left","0px");cat_tab_is_animated=0; } });
					jQuery("#categories-tabs-content-"+id).attr('style','left:'+width_of_catigory_tab_li+'px');
					jQuery("#categories-tabs-content-"+id).show();
					jQuery("#categories-tabs-content-"+id).animate({'left':'0px'},{duration:500,complete:function() { jQuery(this).addClass("active"); cat_tab_is_animated=0;} });
				}
				
			return false;
		}).stop();
		
		/*CATEGORIES TABS PHONE*/
		var count=jQuery("#wd-categories-tabs ul.tabs li").length;
		count=count-1;
		function nextTab(count){
			if(count==0) return false;
			var isactive=jQuery("#wd-categories-tabs ul.tabs li.active").next().index();
			var width_of_catigory_tab_li=jQuery("#wd-categories-tabs ul.content > li.active").eq(0).width();
			if(cat_tab_is_animated) return false;
				cat_tab_is_animated=1;
			if(isactive==-1){isactive=0;}
				jQuery("#wd-categories-tabs ul.tabs li").removeClass("active");
				jQuery("#wd-categories-tabs ul.tabs li").eq(isactive).addClass("active");
				jQuery("#wd-categories-tabs ul.content > li.active").animate({'left': width_of_catigory_tab_li+"px"},{duration:500,complete:function() { jQuery(this).removeClass("active");jQuery(this).css("display","none").css("left","0px"); cat_tab_is_animated=0; } });
				jQuery("#wd-categories-tabs ul.content > li").eq(isactive).attr('style','left:-'+width_of_catigory_tab_li+'px');
				jQuery("#wd-categories-tabs ul.content > li").eq(isactive).show();
				jQuery("#wd-categories-tabs ul.content > li").eq(isactive).animate({'left':'0px'},{duration:500,complete:function() { jQuery(this).addClass("active"); cat_tab_is_animated=0;} });
		}
		
		function prevTab(count){
			if(count==0) return false;
			var isactive=jQuery("#wd-categories-tabs ul.tabs li.active").prev().index();
			var width_of_catigory_tab_li=jQuery("#wd-categories-tabs ul.content > li.active").eq(0).width();
			if(cat_tab_is_animated) return false;
				cat_tab_is_animated=1;
			if(isactive==-1){isactive=count;}
				jQuery("#wd-categories-tabs ul.tabs li").removeClass("active");
				jQuery("#wd-categories-tabs ul.tabs li").eq(isactive).addClass("active");
				
				jQuery("#wd-categories-tabs ul.content > li.active").animate({'left':'-'+ width_of_catigory_tab_li+"px"},{duration:500,complete:function() { jQuery(this).removeClass("active");jQuery(this).css("display","none").css("left","0px");cat_tab_is_animated=0; } });
				jQuery("#wd-categories-tabs ul.content > li").eq(isactive).attr('style','left:'+width_of_catigory_tab_li+'px');
				jQuery("#wd-categories-tabs ul.content > li").eq(isactive).show();
				jQuery("#wd-categories-tabs ul.content > li").eq(isactive).animate({'left':'0px'},{duration:500,complete:function() { jQuery(this).addClass("active"); cat_tab_is_animated=0;} });

		}
				
		jQuery(".categories-tabs-right").click(function(){nextTab(count);});
		jQuery(".categories-tabs-left").click(function(){prevTab(count);});
				
});


