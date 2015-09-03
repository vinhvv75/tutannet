jQuery(document).ready(function ($) {

	var	siteContent = $('.cd-gallery'), 
		activitiesPostsDisplayed = 0, autoAppend = true, colorThief = new ColorThief(), n = 1;
		
	
	// activities Section	
	siteContent.on('click', 'a[data-toggle="load_activities"]', function(e) {
		$(this).remove();
		$('#hoat-dong-chua-tu-tan').append(
			'<section class="section-block block-activities clearfix">' +
				'<div class="tutannet-container">' +
					'<div id="section-intro">' +
						'<h2 class="section-name"><span>Hoạt Động Chùa Từ Tân</span></h2>' +
					'</div>' +
					'<div id="activities-content" class="section-content col-md-12 col-lg-12">' +
						'<a data-toggle="load_activities_CLBTNPT"></a>' +
						'<a data-toggle="load_activities_CLBTTBT"></a>' +
						'<a data-toggle="load_activities_CLBTKC"></a>' +
						'<a data-toggle="load_activities_BQT"></a>' +
						'<a data-toggle="load_activities_KTT"></a>' +
					'</div>' +
				'</div>' +
			'</section>'
		);
		$('a[data-toggle="load_activities_CLBTNPT"]').click();
		$('a[data-toggle="load_activities_CLBTTBT"]').click();
		$('a[data-toggle="load_activities_CLBTKC"]').click();
		$('a[data-toggle="load_activities_BQT"]').click();
		$('a[data-toggle="load_activities_KTT"]').click();
	});
	
	siteContent.on('click', 'a[data-toggle="load_activities_CLBTNPT"]', function (e) {
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '', monthColor;
		$(this).remove();
	    e.preventDefault();
	    
	    var monthFeatured = 
	    '<div class="monthly-month col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeIn">' +
	    	'<h1>CLB Thanh Niên Phật Tử</h1>' +
	    	'<h2>Giới thiệu</h2>' +
	    	'<p>Nhằm trang bị và phát triển những kỹ năng sống cho giới trẻ cũng như xây dựng đời sống tâm linh, hướng thượng và bảo vệ những truyền thống văn hóa tốt đẹp của dân tộc trong  tầng lớp sinh viên, học sinh, thanh thiếu niên – những chủ nhân tương lai của đất nước trước sự du nhập của những trào lưu văn hóa khác nhau trong xã hội hiện đại.\n' +
	    	'Thượng Tọa Thích Viên Giác – Trụ Trì Chùa Từ Tân đã thành lập Câu Lạc Bộ Thanh Niên Phật Tử. Đây cũng là nơi các bạn trẻ được học hỏi giáo lý đạo Phật, phụng sự Tam Bảo, tu tập Thiền định và rèn luyện sức khỏe.</p>' +
	    	'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" data-backdrop="false">' +
	    	  'Đọc thêm' +
	    	'</button>' +
	    	'<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
	    	  '<div class="modal-dialog" role="document">' +
	    	    '<div class="modal-content">' +
	    	      '<div class="modal-header">' +
	    	        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
	    	        '<h4 class="modal-title" id="myModalLabel">Câu Lạc Bộ Thanh Niên Phật Tử Từ Tân</h4>' +
	    	      '</div>' +
	    	      '<div class="modal-body">' +
	    	        '<p>Nhằm trang bị và phát triển những kỹ năng sống cho giới trẻ cũng như xây dựng đời sống tâm linh, hướng thượng và bảo vệ những truyền thống văn hóa tốt đẹp của dân tộc trong  tầng lớp sinh viên, học sinh, thanh thiếu niên – những chủ nhân tương lai của đất nước trước sự du nhập của những trào lưu văn hóa khác nhau trong xã hội hiện đại.</p>' + 
	    	        	'<p>Thượng Tọa Thích Viên Giác – Trụ Trì Chùa Từ Tân – 90/153 Trường Chinh, Phường 12, Q. Tân Bình, TP.HCM đã thành lập Câu Lạc Bộ Thanh Niên Phật Tử TP.HCM từ năm 2006 (nay đổi tên thành Câu Lạc Bộ Thanh Niên Phật Tử Từ Tân từ năm 2013). Đây cũng là nơi các bạn trẻ được học hỏi giáo lý đạo Phật, phụng sự Tam Bảo, tu tập Thiền định và rèn luyện sức khỏe.<p>' +
	    	        	'<p>Nội dung hoạt động</p>' +
	    	        	'<p><b>1. Sinh hoạt tu học:</b></p>' +
	    	        	'<p>Mỗi thời khóa sinh hoạt tu học của CLB bắt đầu từ 8 giờ - 12 giờ sáng chủ nhật hằng tuần tại Chánh điện 2 chùa Từ Tân, chương trình cụ thể gồm các nội dung:</p>' +
	    	        	'<p>a. Lễ Phật, tụng Kinh.</p>' +
	    	        	'<p>b. Thiền tọa, Thiền hành.</p>' +
	    	        	'<p>c. Pháp thoại.</p>' +
	    	        	'<p>d. Giải đáp các vấn đề của cuộc sống qua cách nhìn của đạo Phật.</p>' +
	    	        	'<p>e. Rèn luyện thể lực bằng khí công.</p>' +
	    	        	'<p>f. Văn nghệ và sinh hoạt tập thể.</p>' +
	    	        	'<p><b>2. Phụng sự:</b></p>' +
	    	        	'<p>CLB tham gia phụng sự các Phật sự tại chùa như: Hành Hương Thập Tự, Lễ Rước Đàn Dược Sư Cầu Quốc Thái Dân An, các khóa Tu Bát Quan Trai và các khóa tu Thiền diễn ra hàng tháng...</p>' + 
	    	        	'<p>Đặc biệt vào những  dịp Đại lễ, CLB sẽ đóng vai trò tích cực vào công tác tổ chức với các hoạt động chính như: Thiền trà, Tọa đàm, lễ hội ẩm thực chay và Văn nghệ mừng đại lễ…</p>' +
	    	        	'<ul>' +
	    	        	'<li><b>- Tết Nguyên Đán: 04-06-15/01 Âm Lịch</b></li>' +
	    	        	'<li><b>- Đại Lễ Phật Đản: 15/04 Âm Lịch</b></li>' +
	    	        	'<li><b>- Đại Lễ Vu Lan: 15/07 Âm Lịch</b></li>' +
	    	        	'<li><b>- Đại Lễ Phật Thành Đạo: 08/12 Âm Lịch</b></li>' +
	    	        	'</ul>' +
	    	        	'<p><b>3. Từ Thiện:</b></p>' +
	    	        	'<p>Các hoạt động từ thiện như: phóng sanh, hiến máu nhân đạo, quyên góp cứu trợ đồng bào lũ lụt… được tổ chức hợp lý sao cho vừa thực sự có ý nghĩa tích cực, vừa giúp thành viên tăng trưởng được lòng Từ Bi.</p>' +
	    	        	'<p><b>4. Tổ chức lễ Hằng Thuận (lễ cưới):</b></p>' +
	    	        	'<p>Các bạn thanh niên nam nữ có nguyện vọng được làm lễ cưới tại chùa sẽ được CLB hỗ trợ công tác tổ chức. Với những trường hợp đặc biệt khó khăn CLB sẽ hỗ trợ hoàn toàn chí phí tổ chức.</p>' +
	    	        	'<p><b>Câu Lạc Bộ Thanh Niên Phật Tử Từ Tân</b> luôn hoan hỷ đón chào các bạn trẻ có thiện chí muốn tham gia vào CLB. Và hy vọng đây sẽ là nơi giúp các bạn tu tập rèn luyện đạo đức và hoàn thiện bản thân ngày một tốt hơn, là mái ấm gia đình để các bạn chia sẻ tình thương, những khó khăn, trở ngại và giúp các bạn vươn lên trong cuộc sống.</p>' +	
	    	      '</div>' +
	    	   '</div>' +
	    	  '</div>' +
	    	'</div>' +
	    	'<a href="#" data-toggle="load_activities_CLBTNPT_posts"></a>'
	    ;
	    
	   
	   
	   $('a[data-toggle="load_activities_CLBTNPT_posts"]').click( function(e) {
		    $.ajax( {
		      type: 'GET',
		      dataType: 'json',
		      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
		      data: {
		          filter: {
		          'posts_per_page': 10,
		          'category_name': 'clb-thanh-nien-phat-tu',
		          'paged': n,
		          }
		      },
		      success: function ( data ) {
		      	n++;
		      	if (data.length > 0) {
		      		activitiesCLBTNPTPostsLeft -= data.length;
		      		activitiesPostsDisplayed += data.length;
		      			      				      				      			      	
			        for (i=0; i<data.length;i++) {
				        var post = data[i];
				        
				       content += render();
				    	
			        } // end for
			        		        
			        
			        if (activitiesCLBTNPTPostsLeft > 0) {
						content +=
							'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
							'<a href="#" data-toggle="load_activities_CLBTNPT_posts" >Đọc thêm</a>' +
							'</div>';
					}
				} // end if
				else {
					if (activitiesCLBTNPTPostsLeft > 0) {
					    content =
					    	'<a href="#" data-toggle="load_activities_CLBTNPT_posts"></a>';
					}
				}
				
				if (data.length <= 5 && activitiesCLBTNPTPostsLeft > 0 && autoAppend) {				
					$('a[data-toggle="load_activities_CLBTNPT_posts"]').click();
					if (activitiesPostsDisplayed >= 10) {
						autoAppend = false;
					}
				} 	
				
				function render() {
					var postrender = '<li id="activities-'+ post.id +'" class="activities-item">' +
									 	'<div class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></div>' +
									'</li>';
					
					return postrender;
				} // end function render
		      },	      
		      cache: false
		    }); 
	    }); 
	    finalContent += monthFeatured + content + '</div>';
	    
	    $('#activities-content').append(finalContent);
	    
	    $('a[data-toggle="load_activities_CLBTNPT_posts"]').click();
	    
	    
	});
	
	siteContent.on('click', 'a[data-toggle="load_activities_CLBTTBT"]', function (e) {
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '', monthColor;
		$(this).remove();
	    e.preventDefault();
	    
	    var monthFeatured = 
	    	'<div class="monthly-month col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeIn">' +
	    		'<h1>CLB Từ Thiện Bến Thương</h1>' +
	    		'<h2>Giới thiệu</h2>' +
	    		'<p>Cuộc sống sẽ ý nghĩa hơn nếu chúng ta đem những tình thương chia sẽ với những mảnh đời bất hạnh và kém may mắn và cả những hoàn cảnh thật sự khó khăn và đang cần sự giúp đỡ và chia sẻ trong cuộc đời này. Với tôn chỉ “Lá lành đùm lá rách”, Clb Từ Thiện Bến Thương hy vọng sẽ làm cho cuộc sống trở nên ý nghĩa hơn.</p>' +
	    		'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CLBTTBT" data-backdrop="false">' +
	    		  'Đọc thêm' +
	    		'</button>' +
	    		'<div class="modal fade" id="CLBTTBT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
	    		  '<div class="modal-dialog" role="document">' +
	    		    '<div class="modal-content">' +
	    		      '<div class="modal-header">' +
	    		        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
	    		        '<h4 class="modal-title" id="myModalLabel">Câu Lạc Bộ Từ Thiện Bến Thương</h4>' +
	    		      '</div>' +
	    		      '<div class="modal-body">' +
	    		        '<p>Kính thưa quý Phật tử, quý thân hữu, các nhà hảo tâm,</p>' + 
	    		        	'<p>Câu lạc bộ Từ Thiện Bến Thương Chùa Từ Tân xin gởi tới quý Phật tử thân hữu gần xa trong và ngoài nước lời chúc sức khỏe, an lạc, thành đạt và lời chào trân trọng nhất.<p>' +
	    		       	'<p>Cuộc sống sẽ ý nghĩa hơn nếu chúng ta đem những tình thương chia sẽ với những mảnh đời bất hạnh và kém may mắn và cả những hoàn cảnh thật sự khó khăn và đang cần sự giúp đỡ và chia sẻ trong cuộc đời này. Với tôn chỉ “Lá lành đùm lá rách”, Clb Từ Thiện Bến Thương hy vọng sẽ làm cho cuộc sống trở nên ý nghĩa hơn.</p>' +
	    		       	
	    		       	'<p>Một cây làm chẳng nên non,</p>' +
	    		       	
	    		       '<p>Ba cây chụm lại nên hòn núi cao,</p>' +
	    		       	
	    		       	'<p>Một biển cả mênh mông, môt dòng sông rộng mở cũng cần có nhiều nguồn nước mới tạo nên. Chúng tôi, Ban chủ nhiệm Clb Từ Thiện Bến Thương rất mong có nhiều gương mặt của Quý Phật tử thân hữu gần xa trong các hoạt động từ thiện. Và trên hết là thêm một tấm lòng, để cùng đồng cảm, đồng tâm hiệp lực, cùng hòa chung nhịp đập, để tăng thêm sức mạnh, thêm niềm tin để Clb Từ Thiện Bến Thương phát triển mạnh và đóng góp nhiều thành quả tốt đẹp cho những người gặp hoàn cảnh bất hạnh và đau thương.</p>' +
	    		       	
	    		       	'<p>Ngoài ra, Clb Từ Thiện Bến Thương sẽ tổ chức các buổi sinh hoạt cộng đồng, giao lưu văn hóa, học tập đạo lý để tăng trưởng tình thân và nâng cao trí tuệ, cảm xúc tâm linh.</p>' +
	    		       	
	    		       	'<p>Clb Từ Thiện Bến Thương rất trân trọng và hoan nghênh “Tâm lòng vàng” của quý Phật tử gần xa tham gia đóng góp tịnh tài, tịnh vật để giúp cho người nghèo có hoàn cảnh bất hạnh và kém may mắn được có thêm nghị lực và an lành hơn trong cuộc sống của mình.</p>' +
	    		       	
	    		       	'<p>Trân trọng,</p>' +
	    		       	
	    		       	'<p>Ban Chủ Nhiệm</p>' +	
	    		      '</div>' +
	    		   '</div>' +
	    		  '</div>' +
	    		'</div>'
	    	;
	    
	    $.ajax( {
	      type: 'GET',
	      dataType: 'json',
	      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
	      data: {
	          filter: {
	          'posts_per_page': 10,
	          'category_name': 'clb-tu-thien-ben-thuong',
	          'paged': n,
	          }
	      },
	      success: function ( data ) {
	      	n++;
	      	if (data.length > 0) {
	      		activitiesCLBTTBTPostsLeft -= data.length;
	      		activitiesPostsDisplayed += data.length;
	      			      				      				      			      	
		        for (i=0; i<data.length;i++) {
			        var post = data[i];
			        
			       content += render();
			    	
		        } // end for
		        		        
		        
		        if (activitiesCLBTNPTPostsLeft > 0) {
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
						'<a href="#" data-toggle="load_activities_CLBTTBT_posts" >Đọc thêm</a>' +
						'</div>';
				}
			} // end if
			else {
				if (activitiesCLBTNPTPostsLeft > 0) {
				    content =
				    	'<a href="#" data-toggle="load_activities_CLBTTBT_posts"></a>';
				}
			}
			
			finalContent += monthFeatured + content + '</div>';
			
			$('#activities-content').append(finalContent);
			
			if (data.length <= 5 && activitiesCLBTTBTPostsLeft > 0 && autoAppend) {				
				$('a[data-toggle="load_activities_CLBTTBT_posts"]').click();
				if (activitiesPostsDisplayed >= 10) {
					autoAppend = false;
				}
			}
			
			function render() {
				var postrender = '<li id="activities-'+ post.id +'" class="activities-item">' +
								 	'<div class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></div>' +
								'</li>';
				
				return postrender;
			} // end function render
	      },	      
	      cache: false
	    });    	
	});
	
	siteContent.on('click', 'a[data-toggle="load_activities_CLBTKC"]', function (e) {
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '';
		$(this).remove();
	    e.preventDefault();
	    
	    var monthFeatured = 
	    '<div class="monthly-month col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeIn">' +
	    	'<h1>CLB Thiền - Khí Công</h1>' +
	    	'<h2>Giới thiệu</h2>' +
	    	'<p>Đạo Tràng Thiền & Khí Công được thành lập từ nhu cầu, tập luyện để duy trì, bảo vệ và tăng cường sức khỏe cho quần chúng cũng như Phật Tử trong các Đạo tràng của Chùa Từ Tân, HT Trụ Trì đả sắp xếp thời khóa tập luyện, vào 5h30 chiều thứ năm hàng tuần, Phật Tử từ độ tuổi thanh niên trở lên tập trung về Chùa Từ Tân cùng nhau tập luyện những động tác khởi động nhẹ, các thế khí công, các động tác yoga... đầy bổ ích  cho Thân và Tâm, sau những giờ tập luyện HT Trụ Trì còn hướng dẫn Thiền Buông Thư, đây là phương pháp thiền nhẹ nhàng  thanh thản đêm lại hiệu qua cao cho cho việc thanh lọc cơ thể, để cho hàng Phật Tử sau một tuần vật lộn với công việc giờ đây được tập luyện thư giãn, trong thân thể như có một nguồn sức sống mới mạnh  khoẻ, tinh thần phấn chấn, mọi lo toan của cuộc sống cũng tan biến theo từng hơi thở và động tác nhịp nhàng.</p>' +
	    	'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CLBTKC" data-backdrop="false">' +
	    	  'Đọc thêm' +
	    	'</button>' +
	    	'<div class="modal fade" id="CLBTKC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
	    	  '<div class="modal-dialog" role="document">' +
	    	    '<div class="modal-content">' +
	    	      '<div class="modal-header">' +
	    	        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
	    	        '<h4 class="modal-title" id="myModalLabel">Câu Lạc Bộ Thiền - Khí Công</h4>' +
	    	      '</div>' +
	    	      '<div class="modal-body">' +
	    	        '<p>Đạo Tràng Thiền & Khí Công được thành lập từ nhu cầu, tập luyện để duy trì, bảo vệ và tăng cường sức khỏe cho quần chúng cũng như Phật Tử trong các Đạo tràng của Chùa Từ Tân, HT Trụ Trì đả sắp xếp thời khóa tập luyện, vào 5h30 chiều thứ năm hàng tuần, Phật Tử từ độ tuổi thanh niên trở lên tập trung về Chùa Từ Tân cùng nhau tập luyện những động tác khởi động nhẹ, các thế khí công, các động tác yoga... đầy bổ ích  cho Thân và Tâm, sau những giờ tập luyện HT Trụ Trì còn hướng dẫn Thiền Buông Thư, đây là phương pháp thiền nhẹ nhàng  thanh thản đêm lại hiệu qua cao cho cho việc thanh lọc cơ thể, để cho hàng Phật Tử sau một tuần vật lộn với công việc giờ đây được tập luyện thư giãn, trong thân thể như có một nguồn sức sống mới mạnh  khoẻ, tinh thần phấn chấn, mọi lo toan của cuộc sống cũng tan biến theo từng hơi thở và động tác nhịp nhàng.</p>' +	
	    	      '</div>' +
	    	   '</div>' +
	    	  '</div>' +
	    	'</div>'
	    ;
	    
	    $.ajax( {
	      type: 'GET',
	      dataType: 'json',
	      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
	      data: {
	          filter: {
	          'posts_per_page': 10,
	          'category_name': 'clb-thien-khi-cong',
	          'paged': n,
	          }
	      },
	      success: function ( data ) {
	      	n++;
	      	if (data.length > 0) {
	      		activitiesCLBTTBTPostsLeft -= data.length;
	      		activitiesPostsDisplayed += data.length;
	      			      				      				      			      	
		        for (i=0; i<data.length;i++) {
			        var post = data[i];
			        
			       content += render();
			    	
		        } // end for		        
		        
		        
		        if (activitiesCLBTNPTPostsLeft > 0) {
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
						'<a href="#" data-toggle="load_activities_CLBTKC_posts" >Đọc thêm</a>' +
						'</div>';
				}
			} // end if
			else {
				if (activitiesCLBTNPTPostsLeft > 0) {
				    content =
				    	'<a href="#" data-toggle="load_activities_CLBTKC_posts"></a>';
				}
			}
			
			finalContent += monthFeatured + content + '</div>';
			
			$('#activities-content').append(finalContent);
			
			if (data.length <= 5 && activitiesCLBTTBTPostsLeft > 0 && autoAppend) {				
				$('a[data-toggle="load_activities_CLBTKC_posts"]').click();
				if (activitiesPostsDisplayed >= 10) {
					autoAppend = false;
				}
			}
			
			function render() {
				var postrender = '<li id="activities-'+ post.id +'" class="activities-item">' +
								 	'<div class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></div>' +
								'</li>';
				
				return postrender;
			} // end function render
	      },	      
	      cache: false
	    });    	
	});
	
	siteContent.on('click', 'a[data-toggle="load_activities_BQT"]', function (e) {
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '', monthColor;
		$(this).remove();
	    e.preventDefault();
	    
	    var monthFeatured = 
	    '<div class="monthly-month col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeIn">' +
	    	'<h1>Đạo Tràng Bát Quan Trai</h1>' +
	    	'<h2>Giới thiệu</h2>' +
	    	'<p>Bát Quan Trai giới là một phương pháp tu hành tích cực và thù thắng của người tại gia cư sĩ. Đời sống tại gia rất bận rộn phiền phức nhiêu khê, do đó ít có thì giờ để tiến tu đạo hạnh một cách tích cực, hầu tạo điều kiện giải thoát giác ngộ cho bản thân. Khoá tu Bát Quan Trai được tổ chức vào ngày mùng 1 và 15Âm lịch hằng tháng.</p>' +
	    	'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#DTBQT" data-backdrop="false">' +
	    	  'Đọc thêm' +
	    	'</button>' +
	    	'<div class="modal fade" id="DTBQT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
	    	  '<div class="modal-dialog" role="document">' +
	    	    '<div class="modal-content">' +
	    	      '<div class="modal-header">' +
	    	        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
	    	        '<h4 class="modal-title" id="myModalLabel">Đạo Tràng Tu Bát Quan Trai</h4>' +
	    	      '</div>' +
	    	      '<div class="modal-body">' +
	    	        '<p>Bát Quan Trai giới là một phương pháp tu hành tích cực và thù thắng của người tại gia cư sĩ. Đời sống tại gia rất bận rộn phiền phức nhiêu khê, do đó ít có thì giờ để tiến tu đạo hạnh một cách tích cực, hầu tạo điều kiện giải thoát giác ngộ cho bản thân. Khoá tu Bát Quan Trai được tổ chức vào ngày mùng 1 và 15Âm lịch hằng tháng.</p>' +	
	    	      '</div>' +
	    	   '</div>' +
	    	  '</div>' +
	    	'</div>' +
	    	'<a data-toggle="load_activities_BQT_posts"></a>'
	    ;
	    
	    $.ajax( {
	      type: 'GET',
	      dataType: 'json',
	      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
	      data: {
	          filter: {
	          'posts_per_page': 10,
	          'category_name': 'dt-tu-bat-quan-trai',
	          'paged': n,
	          }
	      },
	      success: function ( data ) {
	      	n++;
	      	if (data.length > 0) {
	      		activitiesBQTPostsLeft -= data.length;
	      		activitiesPostsDisplayed += data.length;
	      			      				      				      			      	
		        for (i=0; i<data.length;i++) {
			        var post = data[i];
			        
			       content += render();
			    	
		        } // end for
		        
		        if (activitiesBQTPostsLeft > 0) {
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
						'<a href="#" data-toggle="load_activities_BQT_posts" >Đọc thêm</a>' +
						'</div>';
				}
			} // end if
			else {
				if (activitiesBQTPostsLeft > 0) {
				    content =
				    	'<a href="#" data-toggle="load_activities_BQT_posts"></a>';
				}
			}
			
			finalContent += monthFeatured + content + '</div>';
			
			$('#activities-content').append(finalContent);
			
			if (data.length <= 5 && activitiesBQTPostsLeft > 0 && autoAppend) {				
				$('a[data-toggle="load_activities_BQT_posts"]').click();
				if (activitiesPostsDisplayed >= 10) {
					autoAppend = false;
				}
			}
			
			function render() {
				var postrender = '<li id="activities-'+ post.id +'" class="activities-item">' +
								 	'<div class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></div>' +
								'</li>';
				
				return postrender;
			} // end function render
	      },	      
	      cache: false
	    });    	
	});

	siteContent.on('click', 'a[data-toggle="load_activities_KTT"]', function (e) {
		var monthlyContent ='', firstFeaturedPost = '', featuredPosts = '', forfeatured = true, featured ='', quote = '', content= '', finalContent = '', monthColor;
		$(this).remove();
	    e.preventDefault();
	    
	    var monthFeatured = 
	    '<div class="monthly-month col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeIn">' +
	    	'<h1>Đạo Tràng Tu Thiền</h1>' +
	    	'<h2>Giới thiệu</h2>' +
	    	'<p>Hàng tháng, cứ đến hẹn lại về, không ai nhắc ai, từng hàng Phật Tử vẫn tấp nập quy tụ về chùa Từ Tân nằm 90/153 Trường Chinh, P12, Q Tân Bình để tham dự khoá tu Thiền 3 ngày 2 đêm tại đây. Chủ trì khoá tu là TT. Thích Chân Quang, TT.Thích Viên Giác và quý thầy cô thuộc chùa Phật Quang, núi Dinh, Bà Rịa Vũng Tàu.</p>' +
	    	'<p>Đường lối tu hành của khoá tu là pháp môn Thân Hành Niệm của Đức Phật, lấy Biết rõ toàn thân làm căn bản, Quán thân vô thường để phá chấp và biết rõ hơi thở để đưa tâm vào yên tĩnh. Ngoài sinh hoạt toạ Thiền, khoá tu còn có những thời khoá khác: tụng Kinh, tham vấn, kinh hành, thuyết giảng, tập khí công, hát nhạc đạo v.v…</p>' +
	    	'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#KTT" data-backdrop="false">' +
	    	  'Đọc thêm' +
	    	'</button>' +
	    	'<div class="modal fade" id="KTT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
	    	  '<div class="modal-dialog" role="document">' +
	    	    '<div class="modal-content">' +
	    	      '<div class="modal-header">' +
	    	        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
	    	        '<h4 class="modal-title" id="myModalLabel">Đạo Tràng Tu Thiền</h4>' +
	    	      '</div>' +
	    	      '<div class="modal-body">' +
	    	        '<p>Hàng tháng, cứ đến hẹn lại về, không ai nhắc ai, từng hàng Phật Tử vẫn tấp nập quy tụ về chùa Từ Tân nằm 90/153 Trường Chinh, P12, Q Tân Bình để tham dự khoá tu Thiền 3 ngày 2 đêm tại đây. Chủ trì khoá tu là TT. Thích Chân Quang, TT.Thích Viên Giác và quý thầy cô thuộc chùa Phật Quang, núi Dinh, Bà Rịa Vũng Tàu.</p>' +
	    	        '<p>Đường lối tu hành của khoá tu là pháp môn Thân Hành Niệm của Đức Phật, lấy Biết rõ toàn thân làm căn bản, Quán thân vô thường để phá chấp và biết rõ hơi thở để đưa tâm vào yên tĩnh. Ngoài sinh hoạt toạ Thiền, khoá tu còn có những thời khoá khác: tụng Kinh, tham vấn, kinh hành, thuyết giảng, tập khí công, hát nhạc đạo v.v…</p>' +
	    	        '<p>Với 8 thời toạ Thiền, mỗi thời chênh lệch từ 30 phút đến 40 phút nên các Thiền sinh dù mới đến hay đã tu tập lâu cũng có thể chấp nhận và vượt qua. Mỗi thiền sinh tham dự sẽ được sắp xếp vào một tổ nhất định để tổ trưởng và đồng đạo có thể dễ dàng hơn trong việc quản lý, nhắc nhở và sách tấn. Các thiền sinh tham dự buộc phải tu tập đầy đủ các thời khoá, giữ những oai nghi tối thiểu của người hành Thiền và sống hoà ái, tử tế với các huynh đệ. Nếu ở lại qua đêm thì mỗi Phật tử phải tự đem theo hành lý và đồ dùng cá nhân và phải bảo quản tư trang của mình.</p>' +
	    	        '<p>Khoá tu bắt đầu từ 6 giờ 30 tối thứ sáu cho đến 12 giờ trưa của ngày chủ nhật nên những Phật tử nào bận bịu với công việc cũng có thể sắp xếp thời gian để đến tham dự.</p>' +
	    	        '<p>Buổi tối thứ sáu gồm có các hoạt động: Ghi danh, Đọc kinh, Sinh hoạt nội bộ và Tọa Thiền. Khi đến ghi danh, các Phật tử chỉ việc nêu đủ họ tên, địa chỉ và tuỳ hỷ đóng góp cho khoá tu. Mỗi Phật tử ghi danh đều đuợc phát một thẻ enxin để sắp vào một nhóm thích hợp. Ngoài ra, còn để thống kê số lần tu tập của Phật tử để báo cáo và khen thưởng cuối năm cho những ai tinh tấn đi đều. Đọc kinh của khoá tu khác với đọc kinh của Chư Tăng ở bổn tự, đó là đọc kinh theo nhạc, gọi nôm na là “Hát kinh”. Với các bài kinh Tứ Diệu Đế, Lời khấn nguyện, Sám Hối được phổ nhạc và được hát trang trọng và đúng với nghi thức của kinh tụng xưa. Phần sinh hoạt nội bộ là phần thông báo về những nội quy của khoá tu, thiền sinh phải có ý thức tự giác giữ gìn nội quy để được ích lợi cho mình và những người khác. Toạ Thiền tối thứ sáu là lúc để quý thầy cô chỉ dẫn những Phật Tử mới đến với khoá tu, mới đến với con đường hành Thiền. Tối thứ sáu kết thúc lúc 9 giờ 30.</p>' +
	    	         
	    	        '<p>Qua đến ngày thứ bảy, các Phật tử sẽ bắt đầu lúc 3 giờ 45 với các thời khoá: Tọa Thiền, tập thể dục, tụng kinh, tham vấn, sinh hoạt thư giãn và thuyết pháp. Mỗi thời Thiền trong ngày đều có kinh hành và có 3 thời ở buổi sáng và trưa có thời tham vấn của Phật tử với TT. Chân Quang. Những câu hỏi bao gồm những thắc mắc trong vấn đề tu hành, tâm linh và cả những đời sống của thiền sinh. Tụng kinh gồm 2 thời và nghi thức vẫn y như ngày thứ sáu đễ giới thiệu trên. Văn nghệ, thư giãn được diễn ra vào buổi chiều của ngày sau khi kết thúc thời ngồi Thiền thứ 5 và chuẩn bị ăn chiều. Văn nghệ thư giãn bao gồm những hoạt động như học hát, xem phim Phật Giáo và văn nghệ. Buổi tối, vẫn với các hoạt động của ngày thứ sáu nhưng thêm vào đó là thời Thuyết giảng của TT. Thích Viên Giác, trụ trì bổn tự, nói về những kiến thức giáo lý và cuộc sống cho quý Phật tử. Kết thúc ngày bằng một buổi toạ Thiền 30 phút.</p>' +
	    	        '<p>Ngày chủ nhật cũng là ngày cuối cùng, cũng bắt đầu giống như ngày thứ 7. Và sau thời ngồi thiền cuối cùng của khoá là lễ bế mạc khoá tu với sự dặn dò của TT.Viên Giác và tiếng hát nồng ấm của bài “Chia tay”. Ai ai cũng hoan hỷ và hẹn gặp lại trong khoá tu kỳ sau.</p>' +	
	    	      '</div>' +
	    	   '</div>' +
	    	  '</div>' +
	    	'</div>'
	    ;
	    
	    $.ajax( {
	      type: 'GET',
	      dataType: 'json',
	      url: getBaseUrl() + '/wp-json/wp/v2/posts/',
	      data: {
	          filter: {
	          'posts_per_page': 10,
	          'category_name': 'dt-tu-thien',
	          'paged': n,
	          }
	      },
	      success: function ( data ) {
	      	n++;
	      	if (data.length > 0) {
	      		activitiesKTTPostsLeft -= data.length;
	      		activitiesPostsDisplayed += data.length;
	      			      				      				      			      	
		        for (i=0; i<data.length;i++) {
			        var post = data[i];
			        
			       content += render();
			    	
		        } // end for
		        
		        if (activitiesKTTPostsLeft > 0) {
					content +=
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.2s">' +
						'<a href="#" data-toggle="load_activities_KTT_posts" >Đọc thêm</a>' +
						'</div>';
				}
			} // end if
			else {
				if (activitiesKTTPostsLeft > 0) {
				    content =
				    	'<a href="#" data-toggle="load_activities_KTT_posts"></a>';
				}
			}
			
			finalContent += monthFeatured + content + '</div>';
			
			$('#activities-content').append(finalContent);
			
			if (data.length <= 5 && activitiesKTTPostsLeft > 0 && autoAppend) {				
				$('a[data-toggle="load_activities_KTT_posts"]').click();
				if (activitiesPostsDisplayed >= 10) {
					autoAppend = false;
				}
			}
			
			function render() {
				var postrender = '<li id="activities-'+ post.id +'" class="activities-item">' +
								 	'<div class="post-title"><a post-title="'+ post.title.rendered +'" rel="'+ post.id +'" href="'+ post.link +'" data-toggle="instant-article">'+ post.title.rendered +'</a></div>' +
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