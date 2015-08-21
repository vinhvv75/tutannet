<?php
/*
Template Name: Tin-Tuc-Phat-Su
*/
?>

<section class="block-news clearfix">
	<div id="section-intro">
		<h2 class="section-name"><span>Tin Tức Phật Sự</span></h2>
	</div>
	      <?php 
	      	  echo '<div class="tutannet-container">';
	      	  echo '<div id="news-content" class="section-content col-md-12 col-lg-12">';
	          $month = date('m');
	          $year = date('Y');
	          
	          $category = get_category(get_category_by_slug( 'tin-tuc-phat-su' ));
	          $posts_count = $category->category_count;
	          	          
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
	          
	          $block_news_featured_query = new WP_Query($block_news_args);                      
	          $featured_news = '';
	          if($block_news_featured_query->have_posts()){
	          	while($block_news_featured_query->have_posts()){
	          		$block_news_featured_query->the_post();
	          		if (in_category( 'noi-bat' )) {
	          		  	$featured_news .= '<li><a post-title="'. get_the_title() .'" rel="'. get_the_ID() .'" href="'. get_the_permalink() .'" data-toggle="instant-article">'. get_the_title() .'</a></li><div rel="'. get_the_ID() .'"></div>';
	          		  }
	          	}	
	          }
	          
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
	          	      
	          	        if ($b_counter == 0) {
	          	        	echo '<div class="featured-post col-xs-12 col-sm-12 col-md-8 col-lg-8 wow fadeInUp" data-wow-delay="0.5s">';
	          	        }
	          	        	
	          	        if ($b_counter > 0 && $b_counter <= 2 ) {
	          	        	echo '<div class="featured-post col-xs-12 col-sm-12 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="0.5s">';
	          	        }
	          	        
	          	        ?>
	          	        
	          	        
	          	        
	          	        <?php 
	          	        	if ($b_counter >= 3) {
	          	        		echo '<div class="single-post col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">';
	          	        	}
	          	        ?>
          	        			<li id="news-<?php echo $b_counter;?>" class="cd-item">
          	        				<?php
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
          	        			  	<div id="instant-article-<?php the_ID();?>" rel="<?php the_ID();?>"></div>
          	        			</li>
          	        	<?php if ($b_counter == 0) {
          	        			echo '</div>';
          	        			echo '<div class="monthly col-xs-12 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
          	        				<div class="monthly-info">
          	        					<h1><span>Tháng</span>'. date('m') .'<span>'. date('Y') .'</span></h1>
          	        					<h2>Tin&nbsp;nổi&nbsp;bật</h2>
          	        					<ul>
          	        						'. $featured_news .'
          	        					</ul>
          	        					'.tutannet_loadmore('tin-tuc-phat-su').'
          	        				</div>
          	        			</div>';	
          	        		  }
          	        		  if ($b_counter >= 1) {echo '</div>';} // col
          	        		  if ($b_counter > 1 && $b_counter == $total_posts_block_news) {echo '</div>';} // news content     
          	        		       	        		  	          	        
	          	} // while
	          	
	          } // if
	          	echo '</div>'; // tutannet-container
	          	
	         ?>
</section><!--#section1-->