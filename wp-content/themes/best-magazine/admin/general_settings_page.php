<?php

class best_magazine_general_settings_page_class{
	public $options_generalsettings;

	
	/***********************************/
	/* 			INITIAL PAGE		   */
	/***********************************/
	

	function __construct(){

		global $best_magazine_admin_helepr_functions;
		
		$this->options_generalsettings = array(
			
			'custom_css_enable' => array(
				'name' => 'custom_css_enable',
				'title' => __( 'Custom CSS', 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				'valid_options' => '',
				'description' => __( 'Custom CSS will change the visual style of the website. The CSS code provided here can be applied to any page or post.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => false			
				),
			'custom_css_text' => array(
				'name' => 'custom_css_text',
				'title' => '',
				'type' => 'textarea',
				"sanitize_type" => "css",
				'valid_options' => '',
				'description' => __( 'Provide the custom CSS code below.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => ''			
				),
			'logo_img' => array(
				'name' => 'logo_img',
				'title' => __( 'Logo', 'best-magazine' ),
				'type' => 'file_upload',
				"sanitize_type" => "sanitize_text_field",
				'valid_options' => '',
				'description' => __( 'You can apply a custom logo image by clicking on the Upload Image button and uploading your image.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => ''			
				),
			'favicon_enable' => array(
				'name' => 'favicon_enable',
				'title' => __( 'Show Favicon', 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				'description' => __( 'Check the box to display the favicon.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => false		
				),
			'favicon_img' => array(
				'name' => 'favicon_img',
				'title' => '',
				'type' => 'file_upload',
				"sanitize_type" => "sanitize_text_field",
				'valid_options' => '',
				'description' => __( 'Click on the Upload Image button to upload the favicon image.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => ''			
				),
			'blog_style' => array(
				'name' => 'blog_style',
				'title' =>  __( 'Blog Style post format', 'best-magazine' ),
				'type' => 'checkbox',
				'valid_options' => '',
				'description' => __( 'Check the box to have short previews for the homepage/index posts.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true			
				),
			'grab_image' => array(
				'name' => 'grab_image',
				'title' =>  __( 'Grab the first post image', 'best-magazine' ),
				'type' => 'checkbox',
				'valid_options' => '',
				'description' => __( 'Enable this option if you want to use the images that are already in your post to create a thumbnail without using custom fields. In this case thumbnail images will be generated automatically using the first image of the post. Note that the image needs to be hosted on your own server.', 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true			
				),
			'show_twitter_icon' => array(
				"name" => "show_twitter_icon",
				"title" => __("Show Twitter Icon", 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				"description" => __("Check the box to display Twitter icon.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true	
			),
			
			'twitter_url' => array(
			    "name" => "twitter_url",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "esc_url_raw",
				"description" => __("Enter your Twitter Profile URL below.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => '#'
			),
			
			'show_rss_icon' => array(
			    "name" => "show_rss_icon",
				"title" => __("Show RSS Icon", 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				"description" => __("Check the box to display RSS feed icon.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true
			),
			
			'rss_url' => array(
				"name" => "rss_url",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "esc_url_raw",
				"description" => __("Enter your RSS URL below.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => '#'
			),
			
			'show_facebook_icon' => array(
				"name" => "show_facebook_icon",
				"title" => __("Show Facebook Icon", 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				"description" => __("Check the box to display Facebook icon.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true
			),
			
			'facebook_url' => array(
				"name" => "facebook_url",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "esc_url_raw",
				"description" => __("Enter your Facebook Profile URL below.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => '#'
			),	
			
			'show_google_icon' => array(
				"name" => "show_google_icon",
				"title" => __("Show Google+ Icon", 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				"description" => __("Check the box to display Google + icon.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true
			),
			'google_url' => array(
				"name" => "google_url",
				"title" => "",
				'type' => 'text',
				"sanitize_type" => "esc_url_raw",
				"description" => __("Enter your Google+ Profile URL below.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => '#'
			),

			'date_enable' => array(
				"name" => "date_enable",
				"title" => __("Display post meta information", 'best-magazine' ),
				'type' => 'checkbox',
				"description" => __("Choose whether to display the post meta information such as date, author and etc.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true
			),
			
			'footer_text_enable' => array(
				"name" => "footer_text_enable",
				"title" => __("Information in the Footer", 'best-magazine' ),
				'type' => 'checkbox_open',
				'fild_count' => '1',
				"description" => __("Check the box to display custom HTML for the footer.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => true
			),

			'footer_text' => array(
				"name" => "footer_text",
				"title" => __("Information in the Footer", 'best-magazine' ),
				'type' => 'textarea',
				"sanitize_type" => "sanitize_html_field",
				"description" => __("Here you can provide the HTML code to be inserted in the footer of your web site.", 'best-magazine' ),
				'section' => 'general',
				'tab' => 'general',
				'default' => '<span id="copyright">WordPress Themes by <a href="'.$best_magazine_admin_helepr_functions->best_magazine_mainl_url.'/wordpress-themes/best-magazine.html"  target="_blank" title="Web-Dorado">Web-Dorado</a></span>'
			)
		);
		
		
	}
	
	/***********************************/
	/* 	  FRONT END FAVICON HTML       */
	/***********************************/

	public function  favicon_img(){
		global $best_magazine_options;
		extract($best_magazine_options);
		if($favicon_enable=='on' && $favicon_img)
		{ ?><link rel="shortcut icon" href="<?php if(trim($favicon_img)) echo esc_url($favicon_img); ?>" type="image/x-icon" /><?php  }	
	
	}	

}
 