<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TuTanNet
 */
get_header();
?>

	<?php 
		$block1_cat = of_get_option('featured_block_1');
		if(!empty($block1_cat)):
		      $category_info_1 = get_category_by_slug($block1_cat);
		endif;
		$block2_cat = of_get_option('featured_block_2');
		if(!empty($block2_cat)):
		      $category_info_2 = get_category_by_slug($block2_cat);
		endif;
		$block3_cat = of_get_option('featured_block_3');
		if(!empty($block3_cat)):
		      $category_info_3 = get_category_by_slug($block3_cat);
		endif;
		$block4_cat = of_get_option('featured_block_4');
		if(!empty($block4_cat)):
		      $category_info_4 = get_category_by_slug($block4_cat);
		endif;
		$block5_cat = of_get_option('featured_block_5');
		if(!empty($block5_cat)):
		      $category_info_5 = get_category_by_slug($block5_cat);
		endif;
	
		function catch_that_image() {
		  global $post, $posts;
		  $first_img = '';
		  ob_start();
		  ob_end_clean();
		  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		  $first_img = $matches[1][0];
		
		  if(empty($first_img)) {
		    $first_img = "/path/to/default.png";
		  }
		  return $first_img;
		}
	?>
	
	
	
	
     
    
    
        
	<div id="primary" class="content-area cd-main">
		<main id="main" class="site-main cd-gallery" role="main">
			
			
			
			
			  	
			
			<div class="tab-content container-fluid">
              	<?php 
              		if(is_user_logged_in()):				
              	 ?>
              	<div role="tabpanel" class="tab-pane animated fadeIn <?php if(is_user_logged_in()) {echo 'active';}?>" id="thu-vien-ca-nhan">
              	  <section class="block-overview row row-eq-height wow fadeInUp clearfix" data-wow-delay="0.5s">
              	  		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              	  			<?php 
              	  				if(!empty($block1_cat)):
              	      				$block1_args = array(
              	              			                      'category_name'=>$block1_cat,
              	              			                      'post_status'=>'publish',
              	              			                      'posts_per_page'=>5,
              	              			                      'order'=>'DESC'
              	              			                      );
              	              		echo '<h2 class="section-name"><span>Thư Viện Cá Nhân</span></h2>';
              	              		$block1_query = new WP_Query($block1_args);
              	              		          $b_counter = 0;
              	              		          $total_posts_block1 = $block1_query->found_posts;
              	              		          if($block1_query->have_posts()){
              	              		              while($block1_query->have_posts()){
              	              		                  $b_counter++;
              	              		                  $block1_query->the_post();
              	              		                  $b1_image_id = get_post_thumbnail_id();
              	              		                  $b1_big_image_path = wp_get_attachment_image_src($b1_image_id,'tutannet-block-big-thumb',true);
              	              		                  $b1_small_image_path = wp_get_attachment_image_src($b1_image_id,'tutannet-block-small-thumb',true);
              	              		                  $b1_image_alt = get_post_meta($b1_image_id,'_wp_attachment_image_alt',true);
              	              		  ?>	         
              	      					<?php if($b_counter == 1){ 
              	          							if(has_post_thumbnail()):  
              	          						    	echo '<a href="' . get_the_permalink() . '">';
              	          						    	echo '<img class="section-featured-image" src="' . esc_url( $b1_big_image_path[0] ) . '" alt="' . esc_attr($b1_image_alt) . '" />';
              	          						    	echo '</a>';
              	          						    endif;
              	          						echo '<div class="posts-wrapper wow fadeInLeft cd-main">';
              	          							echo '<h2> <span>'. esc_attr($category_info_1->name) .'</span></h2>';
              	          							echo '<div class="cd-gallery">'; 
              	      					  	}
              	      					?>
              	      		              <li class="cd-item">
              	      		              	<div class="post-desc-wrapper">
              	      		              	    <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
              	      		              	    <h3 class="post-title"><a post-title="<?php the_title();?>"; rel="<?php the_ID();?>" href="<?php the_permalink();?>" src="<?php echo esc_url( $b_overview_small_image_path[0] );?>" ><?php the_title();?></a></h3>
              	      		              	</div>
              	      		              	<div id="instant-article-<?php the_ID();?>" rel="<?php the_ID();?>"></div>
              	      		              </li>
              	      		  			<?php  
              	      		  				if($b_counter==$total_posts_block_overview){echo '</div>';} ?>
              	      			      	<?php
              	      			              	}
              	      			              }
              	      			              echo '</div>';
              	      			        	endif;
              	  			      	?>
              	  			</div>
              	  		<div class="col-lg-4">
              	  			
              	  		</div>
              	  		<div class="col-lg-4">
              	  			
              	  		</div>
              			</section>
              		</div><!--#thu-vien-ca-nhan-->
              		<?php endif; ?>
              	
              	<div role="tabpanel" class="tab-pane animated fadeIn <?php if(!is_user_logged_in()) {echo 'active';}?>" id="tong-quan">
	              <section class="block-overview row row-eq-height wow fadeInUp clearfix" data-wow-delay="0.5s">
	              		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
	              			<?php 
	              				if(!empty($block1_cat)):
		              				$block1_args = array(
				              			                      'category_name'=>$block1_cat,
				              			                      'post_status'=>'publish',
				              			                      'posts_per_page'=>5,
				              			                      'order'=>'DESC'
				              			                      );
				              		echo '<h2 class="section-name"><span>Tổng Quan</span></h2>';
				              		$block1_query = new WP_Query($block1_args);
				              		          $b_counter = 0;
				              		          $total_posts_block1 = $block1_query->found_posts;
				              		          if($block1_query->have_posts()){
				              		              while($block1_query->have_posts()){
				              		                  $b_counter++;
				              		                  $block1_query->the_post();
				              		                  $b1_image_id = get_post_thumbnail_id();
				              		                  $b1_big_image_path = wp_get_attachment_image_src($b1_image_id,'tutannet-block-big-thumb',true);
				              		                  $b1_small_image_path = wp_get_attachment_image_src($b1_image_id,'tutannet-block-small-thumb',true);
				              		                  $b1_image_alt = get_post_meta($b1_image_id,'_wp_attachment_image_alt',true);
				              		  ?>	         
		              					<?php if($b_counter == 1){ 
			              							if(has_post_thumbnail()):  
			              						    	echo '<a href="' . get_the_permalink() . '">';
			              						    	echo '<img class="section-featured-image" src="' . esc_url( $b1_big_image_path[0] ) . '" alt="' . esc_attr($b1_image_alt) . '" />';
			              						    	echo '</a>';
			              						    endif;
			              						echo '<div class="posts-wrapper wow fadeInLeft cd-main">';
			              							echo '<h2> <span>'. esc_attr($category_info_1->name) .'</span></h2>';
			              							echo '<div class="cd-gallery">'; 
		              					  	}
		              					?>
		              		              <li class="cd-item">
		              		              	<div class="post-desc-wrapper">
		              		              	    <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
		              		              	    <h3 class="post-title"><a post-title="<?php the_title();?>"; rel="<?php the_ID();?>" href="<?php the_permalink();?>" src="<?php echo esc_url( $b_overview_small_image_path[0] );?>" ><?php the_title();?></a></h3>
		              		              	</div>
		              		              	<div id="instant-article-<?php the_ID();?>" rel="<?php the_ID();?>"></div>
		              		              </li>
		              		  			<?php  
		              		  				if($b_counter==$total_posts_block_overview){echo '</div>';} ?>
		              			      	<?php
		              			              	}
		              			              }
		              			              echo '</div>';
		              			        	endif;
	              			      	?>
	              			</div>
	              		<div class="col-lg-4">
	              			
	              		</div>
	              		<div class="col-lg-4">
	              			
	              		</div>
              		</section>
              	</div><!--#tong-quan-->
              	
              	<div role="tabpanel" class="tab-pane animated fadeIn" id="tin-tuc-phat-su">
	            	<?php include "home-news.php"; ?>
	            </div>
              
              
	      
        	</div><!-- tab content -->    			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
wp_reset_query();
?>
</div>
<?php get_footer(); ?>