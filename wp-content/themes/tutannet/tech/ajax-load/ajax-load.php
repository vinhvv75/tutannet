<?php
function ajax_load_init(){
	wp_enqueue_script( 'ajax-load-more', plugins_url( '/core/js/ajax-load-more.min.js', __FILE__ ), array('jquery'),  '1.1', true );
	
	wp_localize_script(
		'ajax-load',
		'al_localize',
		array(
			'ajaxurl'   => admin_url('admin-ajax.php'),
			'alm_nonce' => wp_create_nonce( "ajax_load_more_nonce" )
		)
	);
	
	add_action( 'wp_ajax_nopriv_ajaxload', 'al_query_posts' );
	
}


function al_query_posts($section) {
		
		$nonce = $_GET['nonce'];
		
		if(!is_user_logged_in()){ // Skip nonce verification if user is logged in   		   
		   // check alm_settings for _alm_nonce_security
		   if(isset($options['_al_nonce_security']) & $options['_alm_nonce_security'] == '1'){        		   		   
   		   if (! wp_verify_nonce( $nonce, 'ajax_load_nonce' )) // Check our nonce, if they don't match then bounce!
   		      die('Error, could not verify WP nonce.');      		      
           }
      	} 
      	
      	if ($section == 'tin-tuc-phat-su') {
      		al_news()
      	}        

		
	   	exit;
}


function al_news() {
	$info = array();
//	$info['user_pass'] = sanitize_text_field($_POST['password']);
	
	$month = date('m');
	$year = date('Y');
	
	$block_news_args = array(
	                      'category_name'=>'tin-tuc-phat-su',
	                      'post_status'=>'publish',
	                      'posts_per_page'=>-1,
	                      'order'=>'DESC',
	                      'date_query' => array(
	                      		array(
	                      			'month'  => $month,
	                      			'year'	 => $year,
	                      		),
	                      	),
	                      );
	
	$block_news_query = new WP_Query($block_news_args);
	$total_posts_block_news = $block_news_query->found_posts;
	$b_counter = -1;
	if($block_news_query->have_posts()){
		while($block_news_query->have_posts()){
		      $b_counter++;
		      $block_news_query->the_post();
		      $b_news_image_id = get_post_thumbnail_id();
		      $b_news_big_image_path = wp_get_attachment_image_src($b_news_image_id,'tutannet-block-big-thumb',true);
		      $b_news_medium_image_path = wp_get_attachment_image_src($b_news_image_id,'tutannet-block-medium-thumb',true);
		      $b_news_image_alt = get_post_meta($_news_image_id,'_wp_attachment_image_alt',true);
		      $post_format = get_post_format();
		      $has_gallery = has_shortcode( $post->post_content, 'gallery' );
		      
		        if($b_counter == 0):
		        	echo '<div class="featured-post col-xs-12 col-sm-12 col-md-8 col-lg-8 wow fadeInUp" data-wow-delay="0.5s">';
		        ?>
		        
		        <?php endif; 
		        	if ($b_counter >= 1) {
		        		if ($b_counter % 10 == 0 && $post_format != 'gallery') {echo '<div class="single-post col-xs-12 col-sm-6 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="1s>';}
		        		else if ($post_format == 'gallery' && $has_gallery == true) {
		        			if ($b_counter % 3 == 0) {
	        					echo '<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">';
	        						tutannet_askmembership_post();
	        					echo '</div>';
	        				}
	        				else if ($b_counter % 2 == 0 && $b_counter % 4 != 0) {
	        					echo '<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">';
	        							tutannet_askmembership_post();
	        						echo '</div>';
	    						echo '<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">';
	    								tutannet_askmembership_post();
	    							echo '</div>';
	        				}
	        				echo '<div class="gallery-post col-xs-12 col-sm-12 col-md-12 col-lg-12 row row-eq-height wow fadeInUp" data-wow-delay="0.5s">';
		        			}
		        		else {echo '<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">';} 
		        	}
		        ?>
	        			<li id="news-<?php echo $b_counter;?>" class="cd-item">
	        				<?php
	        				if ($b_counter >= 1 && $post_format == 'gallery' && $has_gallery == true) {
	    					 	tutannet_gallery_post();
	        				} else {
	        				
	        				if(has_post_thumbnail()): 
	        					   	echo '<div class="post-image easeOutCirc">'; 
	        					   	echo '<a post-title="'. get_the_title().'" rel="'. get_the_ID().'">';
	        					   	echo '<img src="' . esc_url( $b_news_medium_image_path[0] ) . '" alt="' . esc_attr($b_news_image_alt) . '" />';
	        					   	echo '</a></div>';
	        					   endif;
	        				?>
	        			  	<div class="post-desc-wrapper">
	        			  	    <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
	        			  	    <h3 class="post-title"><a post-title="<?php the_title();?>" rel="<?php the_ID();?>" href="<?php the_permalink();?>" data-toggle="instant-article"><?php the_title();?></a></h3>
	        			  	    <div class="post-content"><?php the_excerpt() ?></div>
	        			  	</div>
	        			  	<?php } ?>
	        			  	<div id="instant-article-<?php the_ID();?>" rel="<?php the_ID();?>"></div>
	        			</li>
	        	<?php if ($b_counter == 0) {
	        			echo '</div>';
	        		  }
	        		  if ($b_counter >= 1) {echo '</div>';} // col
	        		  if ($b_counter > 1 && $b_counter == $total_posts_block_news) {echo '</div>';} // news content          	        		  	          	        
		} // while
	} // if

}
	
	





?>
