jQuery(document).ready(function ($) {

	var	siteContent = $('.cd-gallery'), newsPostsLeft;
	
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
		var monthnum = $(this).attr('monthnum'), yearnum = $(this).attr('yearnum'), monthlyContent ='', finalContent = '';
		$(this).remove();
	    e.preventDefault();
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
	      				      	
		      	var featured ='', content= '';
		      	
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
			        			      	
			      	content += 
			      	'<li id="news-'+ post.id +'" class="cd-item">' +			      	
			        	'<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">' + 
			        		'<div class="post-image easeOutCirc">' +
			        		'<a post-title="'+ post.title.rendered +'" rel="'+ post.id +'">' +
			        		'<img src="' + post.featured_image_thumbnail_url + '" alt="' + post.title.rendered + '" />' +
			        		'</a></div>' +
			        		'<div class="post-desc-wrapper">' +
			        			'<div class="block-poston">' +
			        				'<span class="posted-on">' + dateString +'</span>' +
			        				'<span class="tagged_on"><a href="'+ tag + '">' + tagString +'</a></span>' + 
			        			'</div>' +
			        			'<h3 class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></h3>' +
			        			'<div class="post-content">'+ post.excerpt.rendered +'</div>' +
			        		'</div>' +
			        		'<div id="instant-article-'+ post.id +' rel="'+ post.id +'"></div>' +
			        	'</div>' + 
			        '</li>'
			        ;
		        } // end for
		        
	        	monthlyContent +=
	        	'<div class="monthly col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">' +
	        		'<div class="monthly-info">' +
	        			'<h1><span>Tháng</span>'+ monthnum +'<span>'+ yearnum +'</span></h1>';
	        			
	        	if (featured != '') {
	        		monthlyContent +=
	        		'<h2>Tin&nbsp;nổi&nbsp;bật</h2>' +
	        		'<ul>' +
	        			featured +
	        		'</ul>';
	        	}
	        	
	        	monthlyContent +=
	        		'</div>' +
	        	'</div>';
		        
		        if (newsPostsLeft > 0) {
			        var month = parseInt(monthnum) - 1;
			        monthnum = '0' + month;
			        if (month == 0) {
			        	month = 12;
			        	var year = parseInt(yearnum) - 1;
			        	yearnum = year;
			        }
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.5s">' +
						'<a href="#" data-toggle="load_news_posts" monthnum="'+monthnum+'" yearnum="'+yearnum+'">Xem lại tin tức tháng trước</a>' +
						'</div>'
					;
				}
			} // end if
			else {
				content +=
					'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.5s">' +
					'<a href="#" >Xin hết</a>' +
					'</div>'
				;
			}		
			finalContent += monthlyContent;		
			finalContent += content;
			$('#news-content').append(finalContent);
	      },	      
	      cache: false
	    });
	  });    

}); // End



function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}
