jQuery(document).ready(function ($) {

	var	siteContent = $('.cd-gallery'), 
		mediaPostsDisplayed = 0, autoAppend = true, colorThief = new ColorThief(), n = 1;
		
	
	// media Section	
	siteContent.on('click', 'a[data-toggle="load_media"]', function(e) {
		$(this).remove();
		$('#phap-am').append(
			'<section class="section-block block-media clearfix">' +
				'<div class="tutannet-container">' +
					'<div id="section-intro">' +
						'<h2 class="section-name"><span>Pháp âm</span></h2>' +
					'</div>' +
					'<div id="news-sidebar" class="section-sidebar col-md-4 col-lg-4">' +
					
					'</div>' +
					'<ul id="media-content" class="section-content cd-items col-md-8 col-lg-8">' +
						'<a data-toggle="load_media_posts"></a>' +
					'</ul>' +
				'</div>' +
			'</section>'
		);
		$('a[data-toggle="load_media_posts"]').click();
	});
	
	siteContent.on('click', 'a[data-toggle="load_media_posts"]', function (e) {
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '';
		$(this).remove();
	    e.preventDefault();
	    
	    $.ajax( {
	      type: 'GET',
	      dataType: 'json',
	      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
	      data: {
	          filter: {
	          'posts_per_page': 10,
	          'category_name': 'phap-am',
	          'paged': n,
	          }
	      },
	      success: function ( data ) {
	      	n++;
	      	if (data.length > 0) {
	      		mediaPostsLeft -= data.length;
	      		mediaPostsDisplayed += data.length;
	      			      				      				      			      	
		        for (i=0; i<data.length;i++) {
			        var post = data[i];
			    	content += render(false);
		        } // end for
		        
		        if (mediaPostsLeft > 0) {
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
						'<a href="#" data-toggle="load_media_posts" >Nghe thêm Pháp âm</a>' +
						'</div>';
				}
			} // end if
			else {
				if (mediaPostsLeft > 0) {
				    content =
				    	'<a href="#" data-toggle="load_media_posts"></a>';
				}
			}			
			
			finalContent += content;
			
			var renderContent = function(){
				var r = $.Deferred();
				$('#media-content').append(finalContent);
				
				setTimeout(function () {
				    r.resolve();
				  }, 2500);
				
				
				return r;
			};
			
			var getColor = function(){
				var postImg = getAllElementsWithAttribute('media-cover-image'),
					postCover = getAllElementsWithAttribute('media-cover');
				
				if (postImg.length != 0 ) {
					for (var i=0; i < postImg.length; i++) {						
						var postColorThief = colorThief.getColor(postImg[i]),
							postColor = 'rgb(' + postColorThief[0] + ',' + postColorThief[1] + ',' + postColorThief[2] + ')',
							coverColor = tinycolor(postColor),
							saturate = coverColor.saturate().toHexString()
							;
							
							$(postCover[i]).css('box-shadow', '7px 5px 0px 0px ' + saturate);
							$(postCover[i]).css('border-color', postColor);
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
			
			
			if (data.length <= 5 && mediaPostsLeft > 0 && autoAppend) {				
				$('a[data-toggle="load_media_posts"]').click();
				if (mediaPostsDisplayed >= 10) {
					autoAppend = false;
				}
			}
			
			function render(featured) {
				var postrender = '<div class="single-post col-md-3 col-lg-3">' + 
					'<li media-cover id="media-'+ post.id +'" class="media-item cd-item">';
				
				postrender += 
							'<img media-cover-image src="'+ post.featured_image_thumbnail_url +'" alt="' + post.title.rendered + '" excerpt="'+ post.excerpt.rendered +'">';

				postrender +=
						'<a href="#0" class="cd-trigger" data-toggle="open-vinyl">Xem chi tiết</a>' +
					'</li>' +
					'<h3 class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></h3>' +
					'</div>'
					;
				
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