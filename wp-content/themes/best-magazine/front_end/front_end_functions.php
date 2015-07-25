<?php


	/**********************************************/
	/*DISPLAY POST INFORMATION(cate.,author,et...)*/
	/**********************************************/

function best_magazine_entry_meta(){
 echo '<div class="entry-meta">';
    printf( __( '<div class="entry-meta-cat"><span class="sep date"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep author"></span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span></div>', 'best-magazine' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'best-magazine' ), get_the_author() ) ),
		get_the_author()
	);
    
    $categories_list = get_the_category_list(', ' );
    echo '<div class="entry-meta-cat">';
	if ( $categories_list && !is_category() ) {
		echo '<span class="categories-links"><span class="sep category"></span> ' . $categories_list . '</span>';
	}
	$tag_list = get_the_tag_list( '', ' , ' );
	
	if ( $tag_list && !is_tag() ) {
		echo '<span class="tags-links"><span class="sep tag"> </span>' . $tag_list . '</span>';
	}
	echo '</div></div>';
}


	/***********************************/
	/* 		 	  SLIDSHOW		       */
	/***********************************/
	
function best_magazine_slideshow(){
global $best_magazine_options;
extract($best_magazine_options);


    if($hide_slider && is_home() && count($imgs_url) && is_array($imgs_url)){  	?>
	<script>
	var data = [];   
	var event_stack = []; 

	
	<?php

		if($imgs_url && is_array($imgs_url))
			$link_array=$imgs_url;
		else
			$link_array = array();	
		
		for($i=0;$i<count($link_array);$i++){
			echo 'data["'.$i.'"]=[];';
		}
		
		for($i=0;$i<count($link_array);$i++){
			echo 'data["'.$i.'"]["id"]="'.$i.'";';
			echo 'data["'.$i.'"]["image_url"]="'.$link_array[$i].'";';
		}
		
		if($imgs_description && is_array($imgs_description))
			$textarea_array = $imgs_description;
		else
			$textarea_array = array();

		for($i=0;$i<count($textarea_array);$i++){
			echo 'data["'.$i.'"]["description"]="'.$textarea_array[$i].'";';
		}

		if($imgs_title && is_array($imgs_title))
			$title_array = $imgs_title;
		else
			$title_array = array();
		
		for($i=0;$i<count($title_array);$i++){
		  if($title_array[$i]!=''){
				echo 'data["'.$i.'"]["alt"]="'.$title_array[$i].'";';
				echo 'data["'.$i.'"]["title"]="'.$title_array[$i].'";';
			 }else{
				echo 'data["'.$i.'"]["alt"]="";'; 
				echo 'data["'.$i.'"]["title"]="";'; 
			}
		} ?>
    </script>
	 
 <?php		
	$slideshow_title_position = explode('-', trim($title_position) );
	$slideshow_description_position = explode('-', trim($description_position) );
 ?>
 <style>
  .bwg_slideshow_image_wrap {
	height:<?php echo esc_html( $image_height ); ?>px;
	width:100% !important;
  }

  .bwg_slideshow_title_span {
	text-align: <?php echo esc_html( $slideshow_title_position[0] ); ?>;
	vertical-align: <?php echo esc_html( $slideshow_title_position[1] ); ?>;
  }
  .bwg_slideshow_description_span {
	text-align: <?php echo esc_html( $slideshow_description_position[0] ); ?>;
	vertical-align: <?php echo esc_html( $slideshow_description_position[1] ); ?>;
  }
</style>

<!--SLIDESHOW START-->
<div id="slideshow">
	<div class="container">
	<div class="slider_contener_for_exklusive">
	<div class="bwg_slideshow_image_wrap" id="bwg_slideshow_image_wrap_id">
      <?php 
	  $current_image_id=0;
      $current_pos =0;
	  $current_key=0; ?>
		<!--################# DOTS ################# -->

         <a id="spider_slideshow_left" onclick="bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) - iterator()) >= 0 ? (parseInt(jQuery('#bwg_current_image_key').val()) - iterator()) % data.length : data.length - 1, data); return false;"><span id="spider_slideshow_left-ico"><span><i class="bwg_slideshow_prev_btn fa"></i></span></span></a>
         <a id="spider_slideshow_right" onclick="bwg_change_image(parseInt(jQuery('#bwg_current_image_key').val()), (parseInt(jQuery('#bwg_current_image_key').val()) + iterator()) % data.length, data); return false;"><span id="spider_slideshow_right-ico"><span><i class="bwg_slideshow_next_btn fa "></i></span></span></a>
		<!--################################## -->

	  <!--################ IMAGES ################## -->
      <div id="bwg_slideshow_image_container"  width="100%" class="bwg_slideshow_image_container">        
        <div class="bwg_slide_container" width="100%">
          <div class="bwg_slide_bg">
            <div class="bwg_slider">
          <?php
		  if($imgs_href && is_array($imgs_href))
			$href_array = $imgs_href;
		  else
			$href_array = array();	

		  if($imgs_url && is_array($imgs_url))
			$image_rows = $imgs_url;
		  else
			$image_rows = array();	
			$i=0;

          foreach ($image_rows as $key => $image_row) {
            if ($i == $current_image_id) {
              $current_key = $key;
              ?>
              <span class="bwg_slideshow_image_span" id="image_id_<?php echo $i; ?>">
                <span class="bwg_slideshow_image_span1">
                  <span class="bwg_slideshow_image_span2">
					  <a href="<?php if(isset($href_array[$i])) echo esc_url( $href_array[$i] ); ?>" >
							<img id="bwg_slideshow_image" class="bwg_slideshow_image" src="<?php echo esc_attr( $image_row ); ?>" image_id="<?php echo $i; ?>" />
					  </a>
                  </span>
                </span>
              </span>
              <input type="hidden" id="bwg_current_image_key" value="<?php echo $key; ?>" />
              <?php
            }
            else {
              ?>
              <span class="bwg_slideshow_image_second_span" id="image_id_<?php echo $i; ?>">
                <span class="bwg_slideshow_image_span1">
                  <span class="bwg_slideshow_image_span2">
                    <a href="<?php if(isset($href_array[$i])) echo esc_url( $href_array[$i] ); ?>" ><img id="bwg_slideshow_image_second" class="bwg_slideshow_image" src="<?php echo esc_attr( $image_row ); ?>" /></a>
                  </span>
                </span>
              </span>
              <?php
            }
			$i++;
          }
          ?>
            </div>
          </div>
        </div>
      </div>
	
	<!--################ TITLE ################## -->
      <div class="bwg_slideshow_image_container" style="position: absolute;">
        <div class="bwg_slideshow_title_container">
          <div style="display:table; margin:0 auto;">
            <span class="bwg_slideshow_title_span">
            <?php if(isset($title_array[0])){ ?>
				<div class="bwg_slideshow_title_text" >
					<?php echo esc_html( $title_array[0] ); ?>
			   </div>
            <?php } ?>
            </span>
          </div>
        </div>
      </div>
	  <!--################ DESCRIPTION ################## -->
      <div class="bwg_slideshow_image_container" style="position: absolute;">
        <div class="bwg_slideshow_title_container">
          <div style="display:table; margin:0 auto;">
            <span class="bwg_slideshow_description_span">
			<?php if(isset($textarea_array[0])){ ?>
              <div class="bwg_slideshow_description_text">
                <?php echo  esc_html( $textarea_array[0] ); ?>        
			  </div>
			<?php } ?>  
            </span>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>
</div>

<!--SLIDESHOW END-->

<?php }

}

function best_magazine_top_posts(){
global $best_magazine_options;
extract($best_magazine_options);
 if (is_home() && $hide_top_posts) {
?>		
		<div id="top-posts">
		<?php 
				$wp_query = new WP_Query("posts_per_page=4&ignore_sticky_posts=1&cat=".$top_post_categories."");
				$curent_query_posts=$wp_query->get_posts();
				if(!isset($curent_query_posts[0]))
					$curent_query_posts[0]='';
				$expert_News_post_date=get_the_time( 'Y.m.d, l',$curent_query_posts[0]);
				unset($curent_query_posts);
				 ?>
			<div class="container">
				<h2><?php echo $top_post_cat_name; ?></h2>
				<span class="date"><?php echo $expert_News_post_date ?></span>
				<div id="top-posts-scroll">
					<span class="top-posts-left"><span>&laquo;<?php echo __('Left','best-magazine'); ?></span></span>
					<span class="top-posts-right"><span><?php echo __('Right','best-magazine'); ?>&raquo;</span></span>
		
					<div class="top-posts-wrapper">
						<div class="top-posts-block">
							<ul id="top-posts-list">
								
								<?php if($wp_query->have_posts()) {
									while ($wp_query->have_posts()) {
										
										$wp_query->the_post();
									?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
										<?php
										if(!has_post_thumbnail() && !$grab_image)
											$thumb_div_class = "no-image";
										else
											$thumb_div_class = "";
										?>
										<div class="image-block <?php echo $thumb_div_class; ?>">
											<?php 
												if($grab_image)
											   {
												echo best_magazine_display_thumbnail(240,100); 
											   }
											   else 
											   {
												echo best_magazine_thumbnail(240,100);
											   }  ?>
										</div>
									</a>
									<div class="text">
										<p><?php best_magazine_the_excerpt_max_charlength(140); ?></p>
										
									</div>
									
								</li>
								<?php } } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php }
}



function best_magazine_content_posts_for_home() {
global $best_magazine_options,$wp_query,$paged;
extract($best_magazine_options);

if(is_home()){			
?><div id="blog" class="blog" ><?php

			 if(have_posts()) { 
					while (have_posts()) {
						the_post();
		
						?>
				<div class="blog-post home-post">				 
					<a class="title_href" href="<?php echo get_permalink() ?>">
					   <h2><?php the_title(); ?></h2>
					</a><?php  if($date_enable){ ?>
                         <div class="home-post-date">
                            <?php echo best_magazine_posted_on();?>
                         </div>
						<?php } 
					   if($grab_image)
					   {
			            echo best_magazine_display_thumbnail(150,150); 
			           }
				       else 
					   {
					    echo best_magazine_thumbnail(150,150);
				       }
					  if($blog_style) 
                        {
                           the_excerpt();
                        }
                        else 
                        {
                           the_content(__('More','best-magazine'));
					    }  
						 ?><div class="clear"></div>	
					
				</div>
				<?php 
				}
				if( $wp_query->max_num_pages > 1 ){ ?>
					<div class="page-navigation">
						<?php posts_nav_link(); ?>
					</div>	   
				<?php }
				
				} ?>
				<div class="clear"></div><?php
				wp_reset_query(); ?>			
			</div>
<?php }else{ ?>
   <div id="content">
     <?php 
		if(have_posts()) : while(have_posts()) : the_post(); ?>
		  <div class="single-post">
			 <h2><?php the_title(); ?></h2>
			 <div class="entry"><?php the_content(); ?></div>
		  </div>
		<?php endwhile; ?>
		   <div class="navigation">
				<?php posts_nav_link(); ?>
		   </div>

		<?php endif; ?>
		 <div class="clear"></div>
		 <?php  wp_reset_query();
			  if(comments_open())
			  {  ?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			
			<?php	}  ?>	
 </div>
 
 <?php 
 }			
 }
			
			
			
			
function best_magazine_content_posts() {
global $best_magazine_options,$wp_query,$paged;
extract($best_magazine_options);
		
		$cat_checked=0;
		$n_of_home_post=get_option( 'posts_per_page', 2);			
			if($hide_content_posts=='on' && $n_of_home_post!=0){ ?>
			
				<div id="blog" class="content-inner-block">
					
					<?php
						$wp_query = new WP_Query('posts_per_page='.($n_of_home_post).'&cat='.best_magazine_remove_last_comma($content_post_categories).'&paged='.$paged.'&order=DSEC');
					 if ($hide_content_posts == 'on') { ?>
					<div class="blog-post">
						<h2><?php echo $content_post_cat_name; ?></h2>
						<ul>
					<?php 
						 if(have_posts()) { 
									while ($wp_query->have_posts()) {
										$wp_query->the_post();
						?>
							<li>
								<h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>
								<p> <?php if($blog_style=="on") 
							{
							   best_magazine_the_excerpt_max_charlength(200);
							}
							else 
							{
							   the_content(); 
							}  ?></p>
							</li>
							<?php } }?>
						</ul>
					</div>
				 <?php } 
				 
				
				if($hide_content_posts=='on'){ ?>
					<div class="page-navigation">
						<?php posts_nav_link(); ?>
					</div>	   
				<?php } ?>
				 <div class="clear"></div>
				</div>
				
				
				<?php }
				wp_reset_query(); ?>			
			
		    <?php
			
}		


function best_magazine_home_video_post(){
global $best_magazine_options;
extract($best_magazine_options);

$magazin_home_video_post=get_post($home_video_post); 
if($magazin_home_video_post==NULL){
$magazin_home_video_post=get_posts();
$magazin_home_video_post=$magazin_home_video_post[0];
}
if ($hide_video_post == 'on' && $home_video_post){ ?>
<div id="videos-block" class="content-inner-block">
	<h2><?php echo $video_post_name; ?></h2>
	<span class="date"><?php echo get_the_time( 'Y.m.d, l',$magazin_home_video_post ); ?></span>
	<div class="full-width">
		<?php echo get_the_post_thumbnail( $home_video_post,array(260,220)); ?>
		      <h3><?php echo $magazin_home_video_post->post_title; ?></h3>
		<?php echo apply_filters('the_content',$magazin_home_video_post->post_content); ?>
		<div class="clear"></div>
	</div>
	<?php  ?>
</div>
<?php } 

}

function best_magazine_category_tab(){

global $best_magazine_options,$post;
extract($best_magazine_options);

$args = array(
  'orderby' => 'name',
  'order' => 'DSEC'
  );
$categories = get_categories($args);
 if ($hide_category_tabs_posts  == 'on'){  
	$count_of_posts=4; // count posts in category tabs this is static variable
	$user_selected_categories=json_decode(stripslashes($home_page_tabs_exclusive));// get user selected categoryes for category tabs
	$top_tabs_categorys = array(); // array for geting category requerid information by id
	$real_category_exsist=0; // if selected category not removed
	if( $home_page_tabs_exclusive == "" ){ // if category not selected
		$user_selected_categories=array();
		for($i=1; $i<count($categories); $i++){
			$user_selected_category = $categories[$i]->name;
			$user_selected_category_desc = $categories[$i]->description;
			$top_tabs_categorys[$i]['category_name']=$user_selected_category;
			$top_tabs_categorys[$i]['category_description']=$user_selected_category_desc;
			$top_tabs_categorys[$i]['query']='posts_per_page='.($count_of_posts).'&cat='.$categories[$i]->term_id.'&order=DSEC';
			if($i==4)
			  break;
		}
		
	}	
	foreach($user_selected_categories as $key=>$user_selected_categorie){							
		if(is_numeric($user_selected_categorie)){
			
			if(isset(get_category($user_selected_categorie)->name)){
				$user_selected_category = get_category($user_selected_categorie)->name;
				$user_selected_category_desc =get_category($user_selected_categorie)->description;
			}	
			else{
				$user_selected_category = "";
				$user_selected_category_desc = "";
			}
			$top_tabs_categorys[$key]['category_name']=$user_selected_category;
			$top_tabs_categorys[$key]['category_description']=$user_selected_category_desc;
			$top_tabs_categorys[$key]['query']='posts_per_page='.($count_of_posts).'&cat='.$user_selected_categorie.'&order=DSEC';
		}
		else
		{
			switch($user_selected_categorie){
				case 'random':{
					
					$top_tabs_categorys[$key]['category_name']=__('Random Posts','best-magazine');
					$top_tabs_categorys[$key]['query']='orderby=rand&ignore_sticky_posts=1&posts_per_page='.$count_of_posts;
					
					break;
				}
				case 'popular':{
					
					$top_tabs_categorys[$key]['category_name']=__('Popular Posts','best-magazine');
					$top_tabs_categorys[$key]['query']='meta_key=wpb_post_views_count&orderby=>meta_value&posts_per_page='.$count_of_posts;
					
					break;
				}
				case 'recent':{
					
					$top_tabs_categorys[$key]['category_name']=__('Recent Posts','best-magazine');
					if(isset($data))
					$top_tabs_categorys[$key]['query']='meta_key=wpb_post_views_count&orderby=>meta_value&numberposts='.$data["postsCount"];
					$args = array(
								'numberposts' => $count_of_posts,
								'offset' => 0,
								'category' => 0,
								'orderby' => 'post_date',
								'order' => 'DESC',
								'post_type' => 'post',
								'post_status' => 'draft, publish, future, pending, private',
								'suppress_filters' => true 
							);
					
						$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
						$recentList="";
						foreach( $recent_posts as $recent ){
							$img_html='';
							$img=wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]));
							if($img){
								$img_html="<div class=\"thumbnail-block\"> \r\n \t\t\t\t\t\t\t\t <a class=\"image-block\" href=\"".get_permalink($recent["ID"]) ."\">\r\n \t\t\t\t\t\t\t\t\t<img src=\"".esc_attr( $img[0] )."\" alt=\"". esc_attr( $recent["post_title"] )."\" />\r\n \t\t\t\t\t\t\t\t</a>\r\n \t\t\t\t\t\t\t</div>";
							}
							
							$recentList= "\t\t\t\t\t\t<li>\r\n \t\t\t\t\t\t\t".$img_html."\r\n \t\t\t\t\t\t\t<div class=\"text\">\r\n \t\t\t\t\t\t\t\t<a href=\"".get_permalink($recent["ID"]) ."\">\r\n \t\t\t\t\t\t\t\t\t<h3>".esc_attr( $recent["post_title"] )."</h3>\r\n \t\t\t\t\t\t\t\t</a>\r\n \t\t\t\t\t\t\t\t<p>".substr( strip_tags( $recent["post_content"] ),0,50)."...</p>\r\n \t\t\t\t\t\t\t\t<span class=\"date\">".esc_attr( $recent["post_date"] )."</span>\r\n \t\t\t\t\t\t\t</div>\r\n \t\t\t\t\t\t</li>";
						}
					$top_tabs_categorys[$key]['recent']=$recentList;
					break;
				}
			}
		}
		
	} 
 
 foreach($top_tabs_categorys as $key=>$top_tabs_category){
	if(!$top_tabs_category['category_name'])
		$real_category_exsist++;
 }
 if(count($top_tabs_categorys)!=$real_category_exsist){
 ?>
<div id="wd-categories-tabs" class="content-inner-block blog">
	<div class="tabs-block">
		<span class="categories-tabs-left"><span>&laquo;<?php echo __('Left','best-magazine'); ?></span></span>
		<span class="categories-tabs-right"><span><?php echo __('Right','best-magazine'); ?>&raquo;</span></span>
	</div>
	<ul class="tabs">
	<?php 
     foreach($top_tabs_categorys as $key=>$top_tabs_category){
				if($top_tabs_category['category_name']){
			?>
		<li <?php if($key==1) echo 'class="active"'; ?>>
			<a href="#<?php echo $key; ?>"><?php if(isset($top_tabs_category['category_name'])) echo esc_html( $top_tabs_category['category_name'] ); ?> <br>
				<span><?php if(isset($top_tabs_category['category_description'])) echo esc_html( $top_tabs_category['category_description'] ) ?></span>
			</a>
		</li>
			<?php } }?>
	</ul>
	
    <div class="cont_vat_tab">
	<ul class="content">
	<?php foreach($top_tabs_categorys as $key=>$top_tabs_category){  
	if($top_tabs_category['category_name']){
	?>
		<li <?php if($key==1) echo 'class="active"'; ?> id="categories-tabs-content-<?php echo $key; ?>">
			<ul>
				<?php
				if(isset($top_tabs_category['recent'])){
					echo $top_tabs_category['recent'];
				}
				else
				{
					$post = query_posts($top_tabs_category['query']);

					 if ( have_posts() ) : while ( have_posts() ) : the_post();
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							if(!has_post_thumbnail() && !$grab_image)
							    $thumb_div_class = "no-image";
							else
								$thumb_div_class = ""; ?>
							<li>
							<div class="thumbnail-block <?php echo $thumb_div_class; ?>">
									<a class="image-block" href="<?php echo get_permalink(); ?>"><?php
										if($grab_image)
									   {
										echo best_magazine_display_thumbnail(150,150); 
									   }
									   else 
									   {
										echo best_magazine_thumbnail(150,150);
									   } ?>
							</a>
								</div>
							<div class="text">
									<a href="<?php echo get_permalink()?>">
										<h3><?php echo get_the_title()?></h3>
									</a>
									<p><?php echo substr( strip_tags( get_the_excerpt() ),0,50)?>...</p>
									<span class="date"><?php echo get_the_time( 'Y.m.d, l' )?> </span>
								</div>
							</li><?php
					 endwhile;endif;	
					wp_reset_query();
					}
				 ?>
			</ul>
		</li>
		<?php } }?>
		</ul>
        </div>	
	</div>
    <div class="clear"></div>
	<?php }
 }
}	


?>