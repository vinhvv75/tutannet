jQuery(document).ready(function ($) {

//	$('a[data-toggle="loadmore"]').on('click', function (e) {
        
		$( 'a[data-toggle="login_wrap"]' ).on( 'click', function ( e ) {
			console.log('On load');
		    e.preventDefault();
		    $.ajax( {
		      type: 'GET',
		      dataType: 'json',
		      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
		      data: {
		          filter: {
		          'posts_per_page': -1,
		          'category_name': 'tin-tuc-phat-su',
		          }
		      },
		      success: function ( data ) {
		      	$('#news-content').append(
		      	'<div class="monthly col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">' +
		      		'<div class="monthly-info">' +
		      			'<h1><span>Tháng</span>'+ 08 +'<span>'+ 2015 +'</span></h1>' +
		      			'<h2>Tin&nbsp;nổi&nbsp;bật</h2>' +
		      			'<ul>' +
		      				'. $featured_news .' +
		      			'</ul>' +
		      		'</div>' +
		      	'</div>');	
		      	
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
			        			      	
			      	$('#news-content').append(
			      	'<li id="news-'+ post.id +'" class="cd-item">');			      	
			      				      			    
			        $('#news-content').append(
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
			        		'<div id="instant-article-'+ post.id +' rel="'+ post.id +'"></div></div></li>'
			        );
		        }
		
		      },
		      cache: false
		    });
		  });    

}); // End



function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}

function postTag() {

}
