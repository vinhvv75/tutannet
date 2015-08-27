jQuery(document).ready(function ($) {

	var	siteContent = $('.cd-gallery'), 
		newsPostsLeft, newsPostsDisplayed = 0, newsMonthDisplay = 0, autoAppend = true, monthnum, yearnum;
	
	$.ajax( {
	  type: 'GET',
	  dataType: 'json',
	  url: getBaseUrl() + '/wp-json/wp/v2/terms/category/?per_page=100',
	  success: function ( data ) {
	  	for (var i=0;i<data.length;i++) {
	  		if (data[i].slug == 'tin-tuc-phat-su') {
	  			newsPostsLeft = data[i].count;
	  		}
	  	}	  	
	  } 
	});
		
	// News Section	
	siteContent.on('click', 'a[data-toggle="load_news"]', function(e) {
		$(this).remove();
		var date = new Date(), thisMonth = date.getMonth() + 1, thisYear = date.getFullYear();
		$('#tin-tuc-phat-su').append(
			'<section class="block-news clearfix">' +
				'<div id="section-intro">' +
					'<h2 class="section-name"><span>Tin Tức Phật Sự</span></h2>' +
				'</div>' +
				'<div class="tutannet-container">' +
					'<div id="news-content" class="section-content col-md-12 col-lg-12">' +
						'<a data-toggle="load_news_posts" monthnum="0'+thisMonth+'" yearnum="'+thisYear+'"></a>' +
					'</div>' +
				'</div>' +
			'</section>'
		);
		$('a[data-toggle="load_news_posts"]').click();
	});
    
    
        
	siteContent.on('click', 'a[data-toggle="load_news_posts"]', function (e) {
		monthnum = $(this).attr('monthnum'); 
		yearnum = $(this).attr('yearnum');
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '', monthColor;
		$(this).remove();
	    e.preventDefault();
	    
	    
	    switch (parseInt(monthnum) ){
	    	case 1:
	    		monthColor = '#EFCC00';
	    		break;
	    	case 2:
	    		monthColor = '#29AB87';
	    		break;
	    	case 3:
	    		monthColor = '#1F75FE';
	    		break;
	    	case 4:
	    		monthColor = '#DAA520';
	    		break;
	    	case 5:
	    		monthColor = '#EA2C06';
	    		break;
	    	case 6:
	    		monthColor = '#E8236C';
	    		break;
	    	case 7:
	    		monthColor = '#27BB00';
	    		break;
	    	case 8:
	    		monthColor = '#C21E56';
	    		break;
	    	case 9:
	    		monthColor = '#D67B0D';
	    		break;
	    	case 10:
	    		monthColor = '#E63E62';
	    		break;
	    	case 11:
	    		monthColor = '#800080';
	    		break;
	    	case 12:
	    		monthColor = '#EE9D00';
	    		break;
	    	default:
	    		monthColor = '#000000';
	    		break;
	    }
	    
	    $.ajax( {
	      type: 'GET',
	      dataType: 'json',
	      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
	      data: {
	          filter: {
	          'posts_per_page': -1,
	          'category_name': 'tin-tuc-phat-su',
	          'monthnum': monthnum,
	          'year': yearnum,
	          }
	      },
	      success: function ( data ) {
	      	if (data.length > 0) {
	      		newsPostsLeft -= data.length;
	      		newsPostsDisplayed += data.length;
	      		newsMonthDisplay++;
	      				      			      	
		        for (i=0; i<data.length;i++) {
			        var post = data[i], date = new Date(post.date), dateString, tag = '#', tagString = '';
			        
			        date.setDate(date.getDate());
			        
			        dateString = ('0' + date.getDate()).slice(-2) + '.'
			                     + ('0' + (date.getMonth()+1)).slice(-2) + '.'
			                     + date.getFullYear();
			                     
			        if (post.tags) {			
			        	tag = getBaseUrl() + 'tag/' + post.tags[0].slug;
			        	tagString = post.tags[0].name;
			        }
			        
			        if (post.is_featured) {
			        	featured += '<li><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></li>';
			        } 
			        
			        
			        if (post.is_featured && forfeatured) {
			        	firstFeaturedPost += render(true);
			        	forfeatured = false;
			        } 
			        else if (post.is_featured && !forfeatured) {
			        	featuredPosts += render(false);
			        }
			        else {
			      		content += render(false);
			    	}
			    	
		        } // end for
		        
		        var monthFeatured = 
		        '<div class="monthly-month col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn">' +
		        	'<h1><span>Tháng</span>'+ monthnum +'<span class="year">'+ yearnum +'</span></h1>' +
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
		        
		        previousYear();
		        if (newsPostsLeft > 0) {
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
						'<a href="#" data-toggle="load_news_posts" monthnum="'+monthnum+'" yearnum="'+yearnum+'">Xem lại tin tức tháng trước</a>' +
						'</div>';
				}
			} // end if
			else {
				previousYear();
				if (newsPostsLeft > 0) {
				    content =
				    	'<a href="#" data-toggle="load_news_posts" monthnum="'+monthnum+'" yearnum="'+yearnum+'"></a>';
				}
			}
			var theMonth = parseInt(monthnum) + 1;
			if (theMonth % 2 == 0) {				
				monthFeatured += firstFeaturedPost + monthlyContent;
			} else { monthFeatured += monthlyContent + firstFeaturedPost; }
			monthFeatured += '</div>';
			
			
			finalContent += monthFeatured + featuredPosts + content;
			
			$('#news-content').append(finalContent);
			
			
			if (data.length <= 5 && newsPostsLeft > 0 && autoAppend) {				
				$('a[data-toggle="load_news_posts"]').click();
				if (newsPostsDisplayed >= 10) {
					autoAppend = false;
				}
			}
			
			function render(featured) {
				var postrender = '<li id="news-'+ post.id +'" class="news-item">';
				
				if (featured) {
					postrender += '<div class="featured-post col-xs-12 col-sm-6 col-md-8 col-lg-8 wow fadeIn" data-wow-delay="0.2s">';
				} else {
					postrender += '<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.2s">';
				}
				
				postrender += 
							'<div class="post-image easeOutCirc">' +
							'<a post-title="'+ post.title.rendered +'" rel="'+ post.id +'">' +
							'<img src="' + post.featured_image_thumbnail_url + '" alt="' + post.title.rendered + '" />' +
							'</a></div>' +
							'<div class="post-desc-wrapper">' +
								'<div class="block-poston">' +
									'<span class="posted-on">' + dateString +'</span>' +
									'<span class="tagged_on"><a href="'+ tag + '">' + tagString +'</a></span>' + 
								'</div>' +
								'<h3 class="post-title"><a style="color:'+ monthColor +';" post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></h3>' +
								'<div class="post-content">'+ post.excerpt.rendered +'</div>' +
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
	  // End News Section 
	  
	  
	  
	  
	  function previousYear() {
	  	var month = parseInt(monthnum) - 1;
	  	if (month == 0) {
	  		month = 12;
	  		var year = parseInt(yearnum) - 1;
	  		yearnum = year;
	  	}
	  	monthnum = '0' + month;
	  }

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


