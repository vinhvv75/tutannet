<?php

class best_magazine_home_page_class{
	
	public $homepage;
	public $shorthomepage;
	public $options_homepage;
	
	function __construct(){
		$this->shorthomepage = "";
		$frst_post_wordpress='';
		$post_in_array=get_posts( array('posts_per_page' => 1));
		if($post_in_array)
			$frst_post_wordpress=$post_in_array[0]->ID;
		unset($post_in_array);	
		
		$this->options_homepage = array(
		
			"hide_slider" => array(
				"name" => "hide_slider",
				"title" => __("Slider",'best-magazine'),
				'type' => 'checkbox',
				"description" => __("Check the box to display the homepage slider.",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => true	
			),
			
			"hide_top_posts" => array(
				"name" => "hide_top_posts",
				"title" => __("Top Posts",'best-magazine'),
				'type' => 'checkbox_open',
				'fild_count' => '2',
				"description" => __("Check the box to display the top posts from the homepage.",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => true	
			),
			
			"top_post_cat_name" => array(
				"name" => "top_post_cat_name",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("Name of top post category",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => ''	
			),
			
			"top_post_categories" => array(
				"name" => "top_post_categories",
				"title" => "",
				'type' => 'checkboxes',
				"valid_options" => get_categories('hide_empty=0'),
				"description" => __("Select the categories from which you want the homepage top posts to be selected (the posts are selected automatically).",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => ''
			),

			"hide_category_tabs_posts" => array(
				"name" => "hide_category_tabs_posts",
				"title" => __("Category Tabs",'best-magazine'),
				'type' => 'checkbox_open',
				'fild_count' => '2',
				"description" => __("Check the box to display the category tabs from the homepage.",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => true
			),
			
			"category_tabs_name" => array(
				"name" => "category_tabs_name",
				"title" => __("Name of category tabs post",'best-magazine'),
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => "",
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => ''
			),
			
			"home_page_tabs_exclusive" => array(
				"name" => "home_page_tabs_exclusive",
				"title" => "",
				'type' => 'selects',
				"description" => "",
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => '{"1":"random","2":"popular","3":"recent"}'
			),
			
			"hide_video_post" => array(
				"name" => "hide_video_post",
				"title" => __("Video Post",'best-magazine'),
				'type' => 'checkbox_open',
				'fild_count' => '2',
				"description" => __("Check the box to display the video-related post from the homepage.",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => true
			),
			
			"video_post_name" => array(
				"name" => "video_post_name",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("Name of video post",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' =>'MOST POPULAR'
			),
			
			"home_video_post" => array(
				"name" => "home_video_post",
				"title" => "",
				'type' => 'select',
				"valid_options" => $this->get_all_posts_in_select(),
				"description" => __("Select post for displaying in video us page",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' =>  $frst_post_wordpress
			),
			
			"hide_content_posts" => array(
				"name" => "hide_content_posts",
				"title" => __("Content Top Posts",'best-magazine'),
				'type' => 'checkbox_open',
				'fild_count' => '2',
				"description" => __("Check the box to select the categories from which top posts will be displayed.",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => true
			),
			
			"content_post_cat_name" => array(
				"name" => "content_post_cat_name",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("Name of top post category",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => ''
			),
			
			"content_post_categories" => array(
				"name" => "content_post_categories",
				"title" => "",
				'type' => 'checkboxes',
				"valid_options" => get_categories('hide_empty=0'),
				"description" => __("Select the categories.",'best-magazine'),
				'section' => 'homepage',
				'tab' => 'homepage',
				'default' => ''
			)
		);
	}


	private function get_all_posts_in_select(){
		$args= array(
				'posts_per_page'   => 3000,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				 );
		$posts_array_custom=array();
		
	
		$posts_array = get_posts( $args );

			foreach($posts_array as $post){
				$posts_array_custom[$post->ID]=$post->post_title;
			}
		return $posts_array_custom;
	}
	

}
 