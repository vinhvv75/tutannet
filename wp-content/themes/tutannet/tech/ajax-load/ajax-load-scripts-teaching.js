jQuery(document).ready(function ($) {

	var	siteContent = $('.cd-gallery'), 
		teachingPostsLeft, teachingPostsDisplayed = 0, teachingMonthDisplay = 0, autoAppend = true, monthnum, yearnum, colorThief = new ColorThief(), n = 1;
	
	$.ajax( {
	  type: 'GET',
	  dataType: 'json',
	  url: getBaseUrl() + '/wp-json/wp/v2/terms/category/?per_page=100',
	  success: function ( data ) {
	  	for (var i=0;i<data.length;i++) {
	  		if (data[i].slug == 'phat-hoc') {
	  			teachingPostsLeft = data[i].count;
	  		}
	  	}	  	
	  } 
	});
	
	
	// Teaching Section	
	siteContent.on('click', 'a[data-toggle="load_teaching"]', function(e) {
		$(this).remove();
		var date = new Date(), thisMonth = date.getMonth() + 1, thisYear = date.getFullYear();
		$('#phat-hoc').append(
			'<section class="block-teaching clearfix">' +
				'<div id="section-intro">' +
					'<h2 class="section-name"><span>Phật học</span></h2>' +
				'</div>' +
				'<div class="tutannet-container">' +
					'<div id="teaching-content" class="section-content col-md-12 col-lg-12">' +
						'<a data-toggle="load_teaching_posts" monthnum="0'+thisMonth+'" yearnum="'+thisYear+'"></a>' +
					'</div>' +
				'</div>' +
			'</section>'
		);
		$('a[data-toggle="load_teaching_posts"]').click();
	});
	
	siteContent.on('click', 'a[data-toggle="load_teaching_posts"]', function (e) {
		monthnum = $(this).attr('monthnum'); 
			yearnum = $(this).attr('yearnum');
			var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '', monthColor;
			$(this).remove();
		    e.preventDefault();
		    
		    $.ajax( {
		      type: 'GET',
		      dataType: 'json',
		      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
		      data: {
		          filter: {
		          'posts_per_page': 10,
		          'category_name': 'phat-hoc',
		          'paged': n,
		          }
		      },
		      success: function ( data ) {
		      	n++;
		      	if (data.length > 0) {
		      		teachingPostsLeft -= data.length;
		      		teachingPostsDisplayed += data.length;
		      		teachingMonthDisplay++;
		      				      				      			      	
			        for (i=0; i<data.length;i++) {
				        var post = data[i];
				                     
				        if (post.tags) {			
				        	tag = getBaseUrl() + 'tag/' + post.tags[0].slug;
				        	tagString = post.tags[0].name;
				        }
				        
				        if (post.is_featured) {
				        	featured += '<li><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></li>';
				        } 
				        
				        
				        if (post.is_featured && forfeatured) {
				        	firstFeaturedPost += 
				        		'<li id="teaching-'+ post.id +'" class="teaching-item" cover-color>' +
				        		'<div class="first-featured-post col-xs-12 col-sm-6 col-md-8 col-lg-8 wow fadeIn" data-wow-delay="0.2s">' +
				        		'<div class="post-image easeOutCirc">' +
				        				'<a post-title="'+ post.title.rendered +'" rel="'+ post.id +'">' +
				        				'<img src="' + post.featured_image_thumbnail_url + '" alt="' + post.title.rendered + '" />' +
				        				'</a></div>' +
				        				'<div class="post-desc-wrapper">' +
				        					'<div class="block-poston">' +
				        						'<span class="tagged_on"><a href="'+ tag + '">' + tagString +'</a></span>' + 
				        					'</div>' +
				        					'<h3 class="post-title"><a style="color:'+ monthColor +';" post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></h3>' +
				        					'<div class="post-content">'+ post.excerpt.rendered +'</div>' +
				        				'</div>' +
				        				'<div id="instant-article-'+ post.id +' rel="'+ post.id +'"></div>' +
				        			'</div>' + 
				        		'</li>'
				        		
				        	;
				        	
				        	
				        	forfeatured = false;
				        } 
				        else if (post.is_featured && !forfeatured) {
				        	featuredPosts += render(true);
				        }
				        else {
				      		content += render(false);
				    	}
				    	
			        } // end for
			        
			        var monthFeatured = 
			        '<div class="monthly-month col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn">' +
			        	'<h1></h1>' +
			        '</div>' +
			        	'<div class="featured col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">';
			        
		        	monthlyContent +=
		        	'<div class="monthly col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.2s">' +
		        		'<div class="monthly-month">'
		        			;
		        			
		        	if (featured != '') {
		        		monthlyContent +=
		        		'<h3>Tin&nbsp;nổi&nbsp;bật</h3>' +
		        		'<ul>' +
		        			featured +
		        		'</ul>';
		        	}
		        	
		        	monthlyContent +=
		        		'</div>' +
		        	'</div>';
			        
			        if (teachingPostsLeft > 0) {
						content +=
							'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
							'<a href="#" data-toggle="load_teaching_posts" >Đọc thêm</a>' +
							'</div>';
					}
				} // end if
				else {
					if (teachingPostsLeft > 0) {
					    content =
					    	'<a href="#" data-toggle="load_teaching_posts"></a>';
					}
				}

				monthFeatured += firstFeaturedPost;
				monthFeatured += '</div>';
				
				
				finalContent += monthFeatured + featuredPosts + content;
				
				
				
				var renderContent = function(){
					var r = $.Deferred();
					$('#teaching-content').append(finalContent);
					
					setTimeout(function () {
					    r.resolve();
					  }, 2500);
					
					
					return r;
				};
				
				var getColor = function(){
					var postImg = getAllElementsWithAttribute('cover-image'),
						postDesc = getAllElementsWithAttribute('cover-desc'),
						postTitle = getAllElementsWithAttribute('cover-title'),
						postTag = getAllElementsWithAttribute('cover-tag');
					if (postImg.length != 0 ) {
						for (var i=0; i < postImg.length; i++) {						
							var postColorThief = colorThief.getColor(postImg[i]),
								postColor = 'rgb(' + postColorThief[0] + ',' + postColorThief[1] + ',' + postColorThief[2] + ')',
								coverColor = tinycolor(postColor),
								saturate = coverColor.saturate().toHexString()
								tetrad = coverColor.tetrad(),
								tetradColors = tetrad.map(function(t) { return t.toHexString(); }),
								monochromatic = coverColor.monochromatic(),
								monochromaticColors = monochromatic.map(function(t) { return t.toHexString(); }),
								analogous = coverColor.analogous(),
								analogousColors = analogous.map(function(t) { return t.toHexString(); })
								;
								
								if (coverColor.isDark()) {
									mostReadable = tinycolor.mostReadable(coverColor, monochromaticColors,{includeFallbackColors:false,level:"AAA",size:"small"}).toHexString();
									mostReadable2 = tinycolor.mostReadable(coverColor, monochromaticColors,{includeFallbackColors:true,level:"AAA",size:"small"}).toHexString();
								} else {
									mostReadable = tinycolor.mostReadable(coverColor, tetradColors,{includeFallbackColors:false,level:"AAA",size:"small"}).toHexString();
									mostReadable2 = tinycolor.mostReadable(coverColor, tetradColors,{includeFallbackColors:true,level:"AAA",size:"small"}).toHexString();
								}								
								
								console.log(coverColor);
								console.log(mostReadable);
								
								$(postDesc[i]).css("background-color", saturate);
								if ($(postDesc[i]).hasClass('featured-cover')) {
									$(postDesc[i]).css("background-color", "transparent");
								}
																
								if (postImg[i].width > postImg[i].height) {
									$(postImg[i]).css("transform", "translateX(-25%)");
								}
								
								mostReadable3 = tinycolor(mostReadable);
								
								$(postTitle[i]).css("color", mostReadable);
								if ($(postTitle[i]).hasClass('featured-cover')) {
									$(postTitle[i]).css("color", mostReadable3.darken(10).toHexString());
								}
								$(postTag[i]).css("color", mostReadable2);
								
						}
					}
				};
				
				function getAllElementsWithAttribute(attribute)
				{
				  var matchingElements = [];
				  var allElements = document.getElementsByTagName('*');
				  for (var i = 0, n = allElements.length; i < n; i++)
				  {
				    if (allElements[i].getAttribute(attribute) !== null)
				    {
				      matchingElements.push(allElements[i]);
				    }
				  }
				  return matchingElements;
				}
				
				renderContent().done(getColor());
				
		        	
				
				
				if (data.length <= 5 && teachingPostsLeft > 0 && autoAppend) {				
					$('a[data-toggle="load_teaching_posts"]').click();
					if (teachingPostsDisplayed >= 10) {
						autoAppend = false;
					}
				}
				
				function render(featured) {
					var postrender = '<li id="teaching-'+ post.id +'" class="teaching-item" cover-color>';
					
					if (featured) {
						postrender += '<div class="featured-post col-xs-12 col-sm-6 col-md-3 col-lg-3 wow fadeIn" data-wow-delay="0.2s">';
					} else {
						postrender += '<div class="single-post col-xs-12 col-sm-6 col-md-3 col-lg-3 wow fadeIn" data-wow-delay="0.2s">';
					}
					
					postrender += 
								'<div class="post-image easeOutCirc">' +
								'<a post-title="'+ post.title.rendered +'" rel="'+ post.id +'">' +
								'<img cover-image src="' + post.featured_image_thumbnail_url + '" alt="' + post.title.rendered + '" />' +
								'</a></div>'
								;
									
									
					if (featured) {				
						postrender += 
						'<div class="post-desc-wrapper featured-cover" cover-desc>' +
							'<div class="block-poston">' +
								'<span class="tagged_on"><a cover-tag href="'+ tag + '">' + tagString +'</a></span>' + 
							'</div>' +
						'<h3 class="post-title"><a cover-title class="featured-cover" post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></h3>';
					} else {
						postrender += 
						'<div class="post-desc-wrapper" cover-desc>' +
							'<div class="block-poston">' +
								'<span class="tagged_on"><a cover-tag href="'+ tag + '">' + tagString +'</a></span>' + 
							'</div>' +
						'<h3 class="post-title"><a cover-title post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></h3>';
					}
					postrender +=
//									'<div class="post-content">'+ post.excerpt.rendered +'</div>' +
								'</div>' +
								'<div id="instant-article-'+ post.id +' rel="'+ post.id +'"></div>' +
							'</div>' + 
						'</li>';
					
					return postrender;
				} // end function render
		      },	      
		      cache: false
		    });    	
	});
	
	
}); // End


function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}

function backTop() {
	$(this).tab('show');
	$('body,html').animate({
		scrollTop: 780
	}, 800);
}