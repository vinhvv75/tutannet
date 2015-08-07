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

	
	
     
    
    
    <div class="tutannet-container">
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
    ?>
    <section id="cd-intro">
    	<img id="cd-intro-img" src="<?php echo get_template_directory_uri();?>/img/intro-background.jpg"/>
    	
    	<?php include('tech/ajax-search/search.php'); ?>

    	<?php include('tech/ajax-login/login.php'); ?>
    	
		<!--<div id="cd-intro-tagline">
			<h1 id="headline" class="cd-headline rotate-1">-->
				<!--<span>My favourite food is</span>-->
				<!--<span class="cd-words-wrapper">
					<b class="is-visible">Kẻ thù lớn nhất của đời người là chính mình</b>
				    <b>Ngu dốt lớn nhất của đời người là dối trá</b>
				    <b>Thất bại lớn nhất của đời người là tự đại</b>
				    <b>Bi ai lớn nhất của đời người là ghen tị</b>
				    <b>Sai lầm lớn nhất của đời người là đánh mất mình</b>
				    <b>Tội lỗi lớn nhất của đời người là bất hiếu</b>
				    <b>Đáng thương lớn nhất của đời người là tự ti</b>
				    <b>Đáng khâm phục lớn nhất của đời người là vươn lên sau khi ngã</b>
				    <b>Phá sản lớn nhất của đời người là tuyệt vọng</b>
				    <b>Tài sản lớn nhất của đời người là sức khoẻ, trí tuệ</b>
				    <b>Món nợ lớn nhất của đời người là tình cảm</b>
				    <b>Lễ vật lớn nhất của đời người là khoan dung</b>
				    <b>Khiếm khuyết lớn nhất của đời người là kém hiểu biết</b>
				    <b>An ủi lớn nhất của đời người là bố thí.</b>
				</span>-->
			<!--</h1>-->
		<!--</div> -->
		<!-- #site-intro-tagline -->
		<div id="site-header-secondary" class="animated">
		<!-- Nav tabs -->
		<div id="site-section-nav">
			<a href="#0" id="site-section-nav-trigger"><span></span></a>
			<div id="section-title" class="is-hidden disable-select animated">
				Tổng Quan <?php // Default ?>
			</div>
		    <nav id="section-navigation" role="navigation">
		         <ul class="container" role="tablist">
		    	    <?php 
		    	    	if(is_user_logged_in()):
		    	    		global $current_user;
		    	    		get_currentuserinfo();
		    	     ?>
		    	    <li class="site-section-nav-item" role="presentation" class="active"><a href="#goi-y-cho-ban" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Thư Viện Cá Nhân</b><span><?php echo get_avatar( $current_user->ID ); ?></span></a></li>
		    	    <?php endif; ?>
		    	    
		    	    <li class="site-section-nav-item" role="presentation" class="active"><a href="#tong-quan" aria-controls="tong-quan" role="tab" data-toggle="tab"><b>Tổng Quan</b><span><i class="fa fa-newspaper-o"></i></span></a></li>
		    	    
		    	    <li class="site-section-nav-item" role="presentation"><a href="#section1" aria-controls="section1" role="tab" data-toggle="tab"><b>Tin Tức Phật Sự</b><span><i class="fa fa-newspaper-o"></i></span></a></li>
		    	    
		    	    <li class="site-section-nav-item" role="presentation"><a href="#section2" aria-controls="section2" role="tab" data-toggle="tab"><b>Phật Giáo và Xã Hội</b><span><i class="fa fa-newspaper-o"></i></span></a></li>
		    	    
		    	    <li class="site-section-nav-item"  role="presentation"><a href="#section3" aria-controls="section3" role="tab" data-toggle="tab"><b>Phật Học</b><span><i class="fa fa-newspaper-o"></i></span></a></li>
		    	    
		    	    <li class="site-section-nav-item" role="presentation"><a href="#section4" aria-controls="section4" role="tab" data-toggle="tab"><b>Hoạt Động Chùa Từ Tân</b><span><i class="fa fa-newspaper-o"></i></span></a></li>
		    	  </ul>
		    </nav><!-- #site-navigation -->
		</div>
		</div><!-- #site-header-secondary -->
    </section>
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="cd-folding-panel">
				<div class="fold-left"></div> 
				<div class="fold-right"></div> 
				<div class="cd-fold-content">
					<div class="instant-article"></div>
				</div>
				<a class="cd-close" href="#0"></a>
			</div>
			
			
			  	
			
			<div class="tab-content container">
              	<?php 
              		if(is_user_logged_in()):				
              	 ?>
              	<div role="tabpanel" class="tab-pane animated fadeIn <?php if(is_user_logged_in()) {echo 'active';}?>" id="goi-y-cho-ban">
              	  <section class="block-overview row row-eq-height wow fadeInUp clearfix" data-wow-delay="0.5s">
              	  		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              	  			<?php 
              	  				if(!empty($block1_cat)):
              	      				$block1_args = array(
              	              			                      'category_name'=>'tin-tuc-phat-su',
              	              			                      'post_status'=>'publish',
              	              			                      'posts_per_page'=>5,
              	              			                      'order'=>'DESC'
              	              			                      );
              	              		echo '<h2 class="block-cat-name"><span>Thư Viện Cá Nhân</span></h2>';
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
              		</div><!--#goi-y-cho-ban-->
              		<?php endif; ?>
              	
              	<div role="tabpanel" class="tab-pane animated fadeIn <?php if(!is_user_logged_in()) {echo 'active';}?>" id="tong-quan">
	              <section class="block-overview row row-eq-height wow fadeInUp clearfix" data-wow-delay="0.5s">
	              		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
	              			<?php 
	              				if(!empty($block1_cat)):
		              				$block1_args = array(
				              			                      'category_name'=>'tin-tuc-phat-su',
				              			                      'post_status'=>'publish',
				              			                      'posts_per_page'=>5,
				              			                      'order'=>'DESC'
				              			                      );
				              		echo '<h2 class="block-cat-name"><span>Tổng Quan</span></h2>';
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
              	<div role="tabpanel" class="tab-pane animated fadeIn" id="section1">
	              <section class="first-block row row-eq-height wow fadeInUp clearfix" data-wow-delay="0.5s">
		          	      <?php 
		          	          if(!empty($block1_cat)):
		          	              $posts_for_block1 = of_get_option('posts_for_block1');
		          	              $block1_args = array(
		          	                                  'category_name'=>$block1_cat,
		          	                                  'post_status'=>'publish',
		          	                                  'posts_per_page'=>$posts_for_block1,
		          	                                  'order'=>'DESC'
		          	                                  );
		          	              echo '<h2 class="block-cat-name"><span>'. esc_attr($category_info_1->name) .'</span></h2>';
		          	              $block1_query = new WP_Query($block1_args);
		          	              $b_counter = -1;
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
		          	      			
									<?php if($b_counter == 0){ 
										echo '<div class="leftposts-wrapper col-sm-5 col-md-4 col-lg-4 hidden-xs wow fadeInLeft">';
											if(has_post_thumbnail()):  
										    	echo '<div class="post-image easeOutCirc"><a href="' . get_the_permalink() . '">';
										    	echo '<img src="' . esc_url( $b1_big_image_path[0] ) . '" alt="' . esc_attr($b1_image_alt) . '" />';
										    	echo '</a></div>';
										    endif;
										echo '</div>';
										echo '<div class="rightposts-wrapper col-sx-12 col-sm-7 col-md-8 col-lg-4 wow fadeInRight cd-main">
											<div id="instant-container-1" class="cd-gallery">'; 
									  	echo '<div class="featuredposts-wrapper row">';} 
									  	if ($b_counter > 0 && $b_counter == 1){ echo '<div class="blockposts-wrapper row">';} ?>	          	      			
		          	                  <li id="news-<?php echo $b_counter;?>" class="cd-item">
		          	                  	<div class="post-desc-wrapper">
		          	                  	    <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
		          	                  	    <h3 class="post-title"><a post-title="<?php the_title();?>"; rel="<?php the_ID();?>" href="<?php the_permalink();?>" src="<?php echo esc_url( $b1_small_image_path[0] );?>" ><?php the_title();?></a></h3>
		          	                  	    <div class="post-content"><?php the_excerpt() ?></div>
		          	                  	</div>
		          	                  	<div id="instant-article-<?php the_ID();?>" rel="<?php the_ID();?>"></div>
		          	                  </li>
		          	      			<?php  
		          	      				if($b_counter == 0){ echo '</div>';}
		          	      				if($b_counter>0 && $b_counter==$total_posts_block1){echo '</div>';} ?>
		          	      	<?php
		          	              	}
		          	              }
		          	              echo '</div>';
		          	              echo '</div>';
		          	              echo '</div>';
		          	              endif;
		          	      	?>
		          	<div class="postimages-wrapper col-lg-4 hidden-xs hidden-sm hidden-md"><div id="first_block_imageHolder" class="animated"></div></div>
	              </section>
	          </div>
              <div role="tabpanel" class="tab-pane animated fadeIn" id="section2">      
	              <section class="second-block clearfix wow fadeInLeft" data-wow-delay="0.5s">
	                    <?php 
	                        if(!empty($block2_cat)):
	                            $posts_for_block2 = of_get_option('posts_for_block2');
	                            echo '<div class="second-block-wrapper">';
	                            echo '<h3 class="block-cat-name"><span>'.esc_attr($category_info_2->name).' </span></h3>'; 
	                            echo '<div class="block-post-wrapper clearfix">';                           
	                            $block2_args = array(
	                                                'category_name'=>$block2_cat,
	                                                'post_status'=>'publish',
	                                                'posts_per_page'=>$posts_for_block2,
	                                                'order'=>'DESC'
	                                                );
	                            $block2_query = new WP_Query($block2_args);
	                            $b_counter = 0;
	                            $total_posts_block2 = $block2_query->found_posts;
	                            if($block2_query->have_posts()){
	                                while($block2_query->have_posts()){
	                                    $b_counter++;
	                                    $block2_query->the_post();
	                                    $b2_image_id = get_post_thumbnail_id();
	                                    $b2_big_image_path = wp_get_attachment_image_src($b2_image_id,'tutannet-block-big-thumb',true);
	                                    $b2_small_image_path = wp_get_attachment_image_src($b2_image_id,'tutannet-block-small-thumb',true);
	                                    $b2_image_alt = get_post_meta($b2_image_id,'_wp_attachment_image_alt',true);
	                    ?>
	                                <?php if($b_counter==1){echo '<div class="leftposts-wrapper">';} if($b_counter>1 && $b_counter==2){echo '<div class="rightposts-wrapper">';}?>
	                                <div class="single_post clearfix <?php if($b_counter==1){echo 'first-post non-zoomin';}?>">
	                                    <?php if(has_post_thumbnail()): ?>   
	                                        <div class="post-image"><a href="<?php the_permalink();?>"><img src="<?php if($b_counter <=1){echo esc_url( $b2_big_image_path[0] );}else{ echo esc_url( $b2_small_image_path[0] ) ;}?>" alt="<?php echo esc_attr($b2_image_alt);?>" /></a>
	                                        </div>                                
	                                            
	                                    <?php endif ; ?>
	                                        <div class="post-desc-wrapper">
	                                            <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                                            <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
	                                        </div>
	                                        <?php if($b_counter ==1 ):?><div class="post-content"><?php echo '<p>'. tutannet_word_count( get_the_content(), 25 ) .'</p>' ;?></div><?php endif ;?>
	                                </div>
	                                <?php if($b_counter==1){echo '</div>';} if($b_counter>1 && $b_counter==$total_posts_block2){echo '</div>';}?>                    
	                    <?php                    
	                                }
	                            }
	                            echo '</div>';
	                            echo '</div>';
	                            endif ;
	                    ?>
	              </section>
			  </div>
			  <div role="tabpanel" class="tab-pane animated fadeIn" id="section3">
	              <section class="third-block clearfix wow fadeInUp" data-wow-delay="0.5s">
	                    <?php 
	                        if(!empty($block3_cat)):
	                                $posts_for_block3 = of_get_option('posts_for_block3');
	                                echo '<div class="first-block-wrapper">';
	                                echo '<h2 class="block-cat-name"><span>'.esc_attr($category_info_3->name).'</span></h2>';                            
	                                echo '<div class="block-post-wrapper clearfix">';
	                                $block3_args = array(
	                                                    'category_name'=>$block3_cat,
	                                                    'post_status'=>'publish',
	                                                    'posts_per_page'=>$posts_for_block3,
	                                                    'order'=>'DESC'
	                                                    );
	                            $block3_query = new WP_Query($block3_args);
	                            $b_counter = 0;
	                            $total_posts_block3 = $block3_query->found_posts;
	                            if($block3_query->have_posts()){
	                                while($block3_query->have_posts()){
	                                    $b_counter++;
	                                    $block3_query->the_post();
	                                    $b3_image_id = get_post_thumbnail_id();
	                                    $b3_big_image_path = wp_get_attachment_image_src($b3_image_id,'tutannet-block-big-thumb',true);
	                                    $b3_small_image_path = wp_get_attachment_image_src($b3_image_id,'tutannet-block-small-thumb',true);
	                                    $b3_image_alt = get_post_meta($b3_image_id,'_wp_attachment_image_alt',true);
	                    ?>
	                        <?php if($b_counter==1){echo '<div class="toppost-wrapper">';} if($b_counter> 2 && $b_counter==3){echo '<div class="bottompost-wrapper">';}?>
	                        <div class="single_post clearfix <?php if($b_counter <= 2){echo 'top-post non-zoomin';}?>">
	                            <?php if(has_post_thumbnail()): ?>   
	                                <div class="post-image"><a href="<?php the_permalink();?>"><img src="<?php if($b_counter <=2){echo esc_url( $b3_big_image_path[0] );}else{ echo esc_url( $b3_small_image_path[0] ) ;}?>" alt="<?php echo esc_attr($b3_image_alt);?>" /></a>
	                                </div>                               
	                            <?php endif ; ?>
	                                <div class="post-desc-wrapper">
	                                    <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                                    <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
	                                </div>
	                                <?php if($b_counter <=2 ):?><div class="post-content"><?php echo '<p>'. tutannet_word_count( get_the_content(), 25) .'</p>' ;?></div><?php endif ;?>
	                        </div>
	                        <?php 
	                            if($b_counter%2==0){echo '<div class="clearfix"></div>';}
	                            if($b_counter >2 && $b_counter==$total_posts_block3){echo '</div>';}
	                            if($b_counter==2){echo '</div>';}
	                        ?>
	                    <?php
	                                }
	                            }
	                            echo '</div>';
	                            echo '</div>';
	                        endif;
	                    ?>
	              </section>
	          </div>
              <div role="tabpanel" class="tab-pane animated fadeIn" id="section4">
	              <section class="forth-block clearfix wow fadeInRight" data-wow-delay="0.5s">
	                    <?php 
	                        if(!empty($block4_cat)):
	                            $posts_for_block4 = of_get_option('posts_for_block4');
	                            echo '<div class="second-block-wrapper">';
	                            echo '<h3 class="block-cat-name"><span>'.esc_attr($category_info_4->name).'</span></h3>';                            
	                            echo '<div class="block-post-wrapper clearfix">';
	                            $block4_args = array(
	                                                'category_name'=>$block4_cat,
	                                                'post_status'=>'publish',
	                                                'posts_per_page'=>$posts_for_block4,
	                                                'order'=>'DESC'
	                                                );
	                            $block4_query = new WP_Query($block4_args);
	                            $b_counter = 0;
	                            $total_posts_block4 = $block4_query->found_posts;
	                            if($block4_query->have_posts()){
	                                while($block4_query->have_posts()){
	                                    $b_counter++;
	                                    $block4_query->the_post();
	                                    $b4_image_id = get_post_thumbnail_id();
	                                    $b4_big_image_path = wp_get_attachment_image_src($b4_image_id,'tutannet-block-big-thumb',true);
	                                    $b4_image_alt = get_post_meta($b4_image_id,'_wp_attachment_image_alt',true);
	                    ?>
	                                <div class="single_post non-zoomin clearfix">
	                                    <?php if(has_post_thumbnail()): ?>   
	                                        <div class="post-image">
	                                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url( $b4_big_image_path[0] );?>" alt="<?php echo esc_attr($b4_image_alt);?>" /></a>
	                                        </div>                                
	                                    <?php endif ; ?>
	                                        <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                                        <div class="block-poston"><?php do_action('tutannet_home_posted_on');?></div>
	                                </div>
	                                <?php if($b_counter%2==0){echo '<div class="clearfix"></div>';}?>                    
	                    <?php                    
	                                }
	                            }
	                            echo '</div>';
	                            echo '</div>';
	                            endif ;
	                    ?>
	              </section> 
	        	</div> 
	        	
	        	<div role="tabpanel" class="tab-pane fade in" id="section_search">
	        	    <section class="search_block clearfix wow fadeInUp container" data-wow-delay="0.5s">
	        	    	
	        	    </section> 
	        		</div> 
        	</div><!-- tab content -->    			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
wp_reset_query();
?>
</div>
<?php get_footer(); ?>