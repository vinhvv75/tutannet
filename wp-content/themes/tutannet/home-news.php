<?php
/*
Template Name: Home News
*/
?>

<section class="block-news clearfix">
	<div class="row">
		<h2 class="section-name"><span>Tin Tức Phật Sự</span></h2>
	</div>
	      <?php 
	      	  echo '<div class="row">';
	      	  echo '<div id="news-sidebar" class="section-sidebar col-md-2 col-lg-2"></div>';
	      	  echo '<div id="news-content" class="section-content col-md-10 clo-lg-10">';
	          $block_news_args = array(
	                                'category_name'=>'tin-tuc-phat-su',
	                                'post_status'=>'publish',
	                                'posts_per_page'=>-1,
	                                'order'=>'DESC',
	                                'date_query' => array(
	                                		array(
	                                			'year'  => $today['year'],
	                                		),
	                                	),
	                                );
	          $block_news_query = new WP_Query($block_news_args);
	          $b_counter = 0;
	          $total_posts_block_news = $block_news_query->found_posts;
	          if($block_news_query->have_posts()){
	          	while($block_news_query->have_posts()){
	          	      $b_counter++;
	          	      $block_news_query->the_post();
	          	        $b_news_image_id = get_post_thumbnail_id();
	          	        $b_news_big_image_path = wp_get_attachment_image_src($b_news_image_id,'tutannet-block-big-thumb',true);
	          	        $b_news_small_image_path = wp_get_attachment_image_src($b_news_image_id,'tutannet-block-small-thumb',true);
	          	        $b_news_image_alt = get_post_meta($_news_image_id,'_wp_attachment_image_alt',true);
	          	        $post_format = get_post_format();
	          	        $has_gallery = has_shortcode( $post->post_content, 'gallery' );
	          	        
	          	        if($b_counter == 1):
	          	        	echo '
	          	        		<div class="row">
	          	        		    <div class="featured-post single-post col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="1s">
	          	        	';
	          	        ?>
	          	        
	          	        <?php endif; 
	          	        	if($b_counter > 1 && $b_counter == 2) {echo '<div class="featured-post single-post col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="1s">';}
	          	        	if ($b_counter > 2 && $b_counter == 3) {
	          	        		echo '<div class="row">';
	          	        	}
	          	        	if ($b_counter >= 3) {
	          	        		if ($b_counter % 7 == 0 && $post_format != 'gallery') {echo '<div class="single-post col-xs-12 col-sm-6 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="1s>';}
	          	        		else if ($post_format == 'gallery' && $has_gallery == true) {
	          	        			if ($b_counter % 2 == 0) {
	          	        				echo '<div class="single-post col-xs-12 col-sm-6 col-md-3 col-lg-3 hidden-md hidden-lg wow fadeInUp" data-wow-delay="1s">';
	          	        					echo '<div class="post-desc-wrapper">';
	          	        						tutannet_askmembership_post();
	          	        					echo '</div>';		   
	          	        				echo '</div>';
	          	        			}		          	          	        			
	          	        			echo '<div class="single-post gallery-post col-xs-12 col-sm-12 col-md-9 col-lg-9 wow fadeInUp" data-wow-delay="1s">';
	          	        		} 
	          	        		else {echo '<div class="single-post col-xs-12 col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-delay="1s">';} 
	          	        	}
	          	        ?>
          	        			<li id="news-<?php echo $b_counter;?>" class="cd-item">
          	        				<?php
          	        				if ($post_format == 'gallery' && $has_gallery == true) {
      	        					 	tutannet_gallery_post();
          	        				} else {
          	        				
          	        				if(has_post_thumbnail()): 
          	        					   	echo '<div class="post-image easeOutCirc">'; 
          	        					   	echo '<a post-title="'. get_the_title().'" rel="'. get_the_ID().'">';
          	        					   	echo '<img src="' . esc_url( $b_news_big_image_path[0] ) . '" alt="' . esc_attr($b_news_image_alt) . '" />';
          	        					   	echo '</a></div>';
          	        					   endif;
          	        				?>
          	        			  	<div class="post-desc-wrapper">
          	        			  	    <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
          	        			  	    <h3 class="post-title"><a post-title="<?php the_title();?>"; rel="<?php the_ID();?>" href="<?php the_permalink();?>" src="<?php echo esc_url( $b_news_small_image_path[0] );?>" ><?php the_title();?></a></h3>
          	        			  	    <div class="post-content"><?php the_excerpt() ?></div>
          	        			  	</div>
          	        			  	<?php } ?>
          	        			  	<div id="instant-article-<?php the_ID();?>" rel="<?php the_ID();?>"></div>
          	        			</li>
          	        	<?php if ($b_counter == 1) {echo '</div>';}
          	        		  if ($b_counter == 2) {
          	        		  	echo '</div>';
          	        		  	echo '</div>'; // row
          	        		  }	 
          	        		  if ($b_counter >= 3) {echo '</div>';} // col
          	        		  if ($post_format == 'gallery' && $has_gallery == true) {
	          	        		  if ($b_counter >=3 && $b_counter % 2 != 0) {
	          	        		  			echo '<div class="single-post col-xs-12 col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-delay="1s">';
	          	        		  				echo '<div class="post-desc-wrapper">
	          	        		  				    <div class="block-poston">'. tutannet_posted_on() .'</div>
	          	        		  				    <h3 class="post-title"><a post-title="'. get_the_title().'" rel="'. get_the_ID() .'" href="'. get_the_permalink() .'" >'. get_the_title() .'</a></h3>
	          	        		  				    <div class="post-content">'. get_the_excerpt() .'</div>
	          	        		  				</div>';
	          	        		  			echo '</div>';
	          	        		  }
	          	        	}
          	        		  if ($b_counter > 3 && $b_counter == $total_posts_block_news) {echo '</div>';} // row
          	        		  
          	        	?>
	          	        	
	          	        
	          	        <?php
	          	        
	          	} // while
	          } // if
	          		echo '</div>'; // row
	          	echo '</div>'; // news content
	          echo '</div>'; // row		          	          
	         ?>
</section><!--#section1-->