<?php
class best_magazine_slider_page_class{

	public $shorthomepage;
	public $options_slider;	

	function __construct(){
		$this->shortslider = "";
		
		$this->options_slider = array(
		
			"image_height" => array(
				"name" => "image_height",
				"title" => __("Slider Height", "best-magazine" ),
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("The height of the slider can be customized. You need to specify the height in the box provided.", "best-magazine" ),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => '450'
			),
			
			"animation_speed" => array(
				"name" => "animation_speed",
				"title" => __("Animation Speed", "best-magazine" ),
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("When using an animation for the slider, you can control its speed. You can use the provided box to fill in the optimal speed.", "best-magazine" ),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => '800'			
			),
			
			"slideshow_interval" => array(
				"name" => "slideshow_interval",
				"title" => __("Pause Time", "best-magazine" ),
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("The timing for the slider animation can be customized. You can adjust it providing timing in the corresponding box.", "best-magazine" ),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => '5000'			
			),
			
			
			"stop_on_hover" => array(
				"name" => "stop_on_hover",
				"title" => __("Stop animation while hovering", "best-magazine" ),
				'type' => 'checkbox',
				"sanitize_type" => "sanitize_text_field",
				"description" =>__( "By default slider animation is constant. However you can choose it to stop while hovering, checking the box for this option.", "best-magazine" ),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => false			
			),
						
			"effect" => array(
				"name" => "effect",
				"title" => __("Effect", "best-magazine" ),
				'type' => 'select',
				"sanitize_type" => "sanitize_text_field",
				"description" => __("The animation of the slider can be customized with the help of various effects. You can choose the slider animation effect from the list included below.", "best-magazine" ),
				"valid_options" => array(
					"none" => "None",
					"cubeH"  =>  "Cube Horizontal",
					"cubeV"  =>  "Cube Vertical",
					"fade"  =>  "Fade",
					"sliceH"  =>  "Slice Horizontal",
					"sliceV"  =>  "Slice Vertical",
					"slideH"  =>  "Slide Horizontal",
					"slideV"  =>  "Slide Vertical",
					"scaleOut"  =>  "Scale Out",
					"scaleIn"  =>  "Scale In",
					"blockScale"  =>  "Block Scale",
					"kaleidoscope"  =>  "Kaleidoscope",
					"fan"  =>  "Fan",
					"blindH"  =>  "Blind Horizontal",
					"blindV"  =>  "Blind Vertical",
					"random"  =>  "Random"		
				),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => 'random'			
			),
			
			"title_position" => array(
				"name" => "title_position",
				"title" => __("Title Position", "best-magazine" ),
				'type' => 'radio',
				"sanitize_type" => "sanitize_text_field",
				"description" => "",
				"valid_options" => array(
					"left-top" => "left-top",
					"center-top"  =>  "center-top",
					"right-top"  =>  "right-top",
					"left-middle"  =>  "left-middle",
					"center-middle"  =>  "center-middle",
					"right-middle"  =>  "right-middle",
					"left-bottom"  =>  "left-bottom",
					"center-bottom"  =>  "center-bottom",
					"right-bottom"  =>  "right-bottom"	
				),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => 'right-top'			
			),
			
			"description_position" => array(
				"name" => "description_position",
				"title" => __("Description Position", "best-magazine" ),
				'type' => 'radio',
				"sanitize_type" => "sanitize_text_field",
				"description" => "",
				"valid_options" => array(
					"left-top" => "left-top",
					"center-top"  =>  "center-top",
					"right-top"  =>  "right-top",
					"left-middle"  =>  "left-middle",
					"center-middle"  =>  "center-middle",
					"right-middle"  =>  "right-middle",
					"left-bottom"  =>  "left-bottom",
					"center-bottom"  =>  "center-bottom",
					"right-bottom"  =>  "right-bottom"	
				),
				'section' => 'slider',
				'tab' => 'slider',
				'default' => 'right-bottom'			
			),
			
			"imgs_url" => array(
				"name" => "imgs_url",
				"title" => "",
				'type' => 'file_upload',
				"sanitize_type" => "esc_url_raw",
				"option" => array(
					"imgs_href" => array(
						"name" => "imgs_href",
						"title" => "",
						'type' => 'text_slider',
						"sanitize_type" => "esc_url_raw",
						"description" => "",
						'section' => 'slider',
						'tab' => 'slider',
						'default' => array()			
					),
					
					"imgs_title" => array(
						"name" => "imgs_title",
						"title" => "",
						'type' => 'text_slider',
						"sanitize_type" => "sanitize_text_field",
						"description" => "",
						'section' => 'slider',
						'tab' => 'slider',
						'default' => array()			
					),
					
					"imgs_description" => array(
						"name" => "imgs_description",
						"title" => "",
						'type' => 'textarea_slider',
						"sanitize_type" => "sanitize_html_field",
						"description" => "",
						'section' => 'slider',
						'tab' => 'slider',
						'default' => array("Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.","Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.")		
					)
				),
				"description" => "",
				'section' => 'slider',
				'tab' => 'slider',
				'default' =>  array(get_template_directory_uri()."/images/slide_1.jpg",get_template_directory_uri()."/images/slide_2.jpg")		
			)			
						
		);
		
	}
}

 

