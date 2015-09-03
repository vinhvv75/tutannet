jQuery(document).ready(function ($) {
newsPostsLeft = 0, teachingPostsLeft = 0, mediaPostsLeft = 0, activitiesCLBTNPTPostsLeft = 0, activitiesCLBTTBTPostsLeft = 0, activitiesCLBTKCPostsLeft = 0, activitiesBQTPostsLeft = 0, activitiesKTTPostsLeft = 0;

$.ajax( {
  type: 'GET',
  dataType: 'json',
  url: getBaseUrl() + '/wp-json/wp/v2/terms/category/?per_page=100',
  success: function ( data ) {
  	for (var i=0;i<data.length;i++) {
  		if (data[i].slug == 'tin-tuc-phat-su') {
  			newsPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'phat-hoc') {
  			teachingPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'phap-am') {
  			mediaPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'clb-thanh-nien-phat-tu') {
  			activitiesCLBTNPTPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'clb-tu-thien-ben-thuong') {
  			activitiesCLBTTBTPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'clb-thien-khi-cong') {
  			activitiesCLBTKCPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'dt-tu-bat-quan-trai') {
  			activitiesBQTPostsLeft = data[i].count;
  		}
  		if (data[i].slug == 'dt-tu-thien') {
  			activitiesKTTPostsLeft = data[i].count;
  		}
  	}	  	
  } 
});


}); // End