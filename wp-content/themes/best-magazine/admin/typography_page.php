<?php

class best_magazine_typography_page_class{
	public $options_typography;
	
	/***********************************/
	/* 			INITIAL PAGE		   */
	/***********************************/
	
	function __construct(){

		global $best_magazine_special_id_for_db;
			
		$this->options_typography = array(
		  	array(
		   
		  	"name" => "title",
           	"type" => "title",
			'tab' => 'typography'
			
			),

    		array( 
			    "name" =>'open',
				"type" => "open",
				'tab' => 'typography'
			),
			
			
			////////// HEADER PARAMETRS
			
			
			'type_headers_font'=>array(
				"name" =>'type_headers_font',	
				"title" => __("Select Font", "best-magazine" ),
				"type" => "select_typography",
				"class" => "fontselector",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->fonts_options(),
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => 'Segoe UI'
			),
			
			'headers_style_preview'=>array(
				"name" =>'headers',
				"title" => __("Edit Font Styling", "best-magazine" ),
				"type" => "button",
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => ''
			),

			'type_headers_kern'=>array(
				"name" =>'type_headers_kern',
				"title" => __("Letter Spacing", "best-magazine" ),
				"type" => "select_typography",
				"class" => "letter_spacing",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->inputs_kern(),
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => '0.00em'
			),

			'type_headers_transform'=>array(
				"name" =>'type_headers_transform',
				"title" => __("Text Transform", "best-magazine" ),
				"type" => "select_typography",
				"class" => "text_transform",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_transform(),
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => 'none'
			),

			'type_headers_variant'=>array(
				"name" =>'type_headers_variant',
				"title" => __("Variant", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_variant",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_variant(),
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_headers_weight'=>array(
				"name" =>'type_headers_weight',
				"title" => __("Weight", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_weight",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_weight(),
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_headers_style'=>array(
				"name" =>'type_headers_style',
				"title" => __("Style", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_style",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_stylee(),
				'section' => 'text_headers',
				'tab' => 'typography',
				'default' => 'normal'
			),
			
			
			////////// INPUTS PARAMETRS
			
			
			'type_inputs_font'=>array(
				"name" =>'type_inputs_font',
				"title" => __("Select Font", "best-magazine" ),
				"type" => "select_typography",
				"class" => "fontselector",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->fonts_options(),
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => 'Segoe UI'
			),
			
			'inputs_style_preview'=>array(
				"name" =>'inputs',
				"title" => __("Edit Font Styling", "best-magazine" ),
				"type" => "button",
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => ''
			),

			'type_inputs_kern' => array(
				"name" =>'type_inputs_kern',
				"title" => __("Letter Spacing", "best-magazine" ),
				"type" => "select_typography",
				"class" => "letter_spacing",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->inputs_kern(),
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => '0.00em'
			),

			'type_inputs_transform'=>array(
				"name" =>'type_inputs_transform',
				"title" => __("Text Transform", "best-magazine" ),
				"type" => "select_typography",
				"class" => "text_transform",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_transform(),
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => 'none'
			),

			'type_inputs_variant'=>array(
				"name" =>'type_inputs_variant',
				"title" => __("Variant", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_variant",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_variant(),
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_inputs_weight'=>array(
				"name" =>'type_inputs_weight',
				"title" => __("Weight", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_weight",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_weight(),
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_inputs_style'=>array(
				"name" =>'type_inputs_style',
				"title" => __("Style", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_style",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_stylee(),
				'section' => 'inputs_textareas',
				'tab' => 'typography',
				'default' => 'normal'
			),
			
			////////// LINKS PARAMETRS
			
			
			'type_primary_font'=>array(
				"name" =>'type_primary_font',
				"title" => __("Select Font", "best-magazine" ),
				"type" => "select_typography",
				"class" => "fontselector",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->fonts_options(),
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => 'Segoe UI'
			),

			'primary_font_style_preview'=>array(
				"name" =>'primary',
				"title" => __("Edit Font Styling", "best-magazine" ),
				"type" => "button",
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => ''
			),
			
			'type_primary_kern'=>array(
				"name" =>'type_primary_kern',
				"title" => __("Letter Spacing", "best-magazine" ),
				"type" => "select_typography",
				"class" => "letter_spacing",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->inputs_kern(),
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => '0.00em'
			),

			'type_primary_transform'=>array(
				"name" =>'type_primary_transform',
				"title" => __("Text Transform", "best-magazine" ),
				"type" => "select_typography",
				"class" => "text_transform",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_transform(),
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => 'none'
			),

			'type_primary_variant'=>array(
				"name" =>'type_primary_variant',
				"title" => __("Variant", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_variant",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_variant(),
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_primary_weight'=>array(
				"name" =>'type_primary_weight',
				"title" => __("Weight", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_weight",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_weight(),
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_primary_style'=>array(
				"name" =>'type_primary_style',
				"title" => __("Style", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_style",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_stylee(),
				'section' => 'primary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),
			
			
			////////// SECONDARY PARAMETRS
			
			
			'type_secondary_font'=>array(
				"name" =>'type_secondary_font',
				"title" => __("Select Font", "best-magazine" ),
				"type" => "select_typography",
				"class" => "fontselector",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->fonts_options(),
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => 'Segoe UI'
			),
			
			'secondary_font_font_style_preview'=>array(
				"name" =>'secondary',
				"title" => __("Edit Font Styling", "best-magazine" ),
				"type" => "button",
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_secondary_kern'=>array(
				"name" =>'type_secondary_kern',
				"title" => __("Letter Spacing", "best-magazine" ),
				"type" => "select_typography",
				"class" => "letter_spacing",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->inputs_kern(),
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => '0.00em'
			),

			'type_secondary_transform'=>array(
				"name" =>'type_secondary_transform',
				"title" => __("Text Transform", "best-magazine" ),
				"type" => "select_typography",
				"class" => "text_transform",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_transform(),
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => 'none'
			),

			'type_secondary_variant'=>array(
				"name" =>'type_secondary_variant',
				"title" => __("Variant", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_variant",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_variant(),
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_secondary_weight'=>array(
				"name" =>'type_secondary_weight',
				"title" => __("Weight", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_weight",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_weight(),
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),

			'type_secondary_style'=>array(
				"name" =>'type_secondary_style',
				"title" => __("Style", "best-magazine" ),
				"type" => "select_typography",
				"class" => "font_style",
				"sanitize_type" => "sanitize_text_field",
				"valid_options" => $this->text_stylee(),
				'section' => 'secondary_font',
				'tab' => 'typography',
				'default' => 'normal'
			),
			
			array(
				"name" =>'close',
				"type" => "close",
				'tab' => 'typography'
			)
		);
				
	}
	
	
	public function fonts_options(){
		  $font_choices[ 'Arial,Helvetica Neue,Helvetica,sans-serif' ] = 'Arial *';
		  $font_choices[ 'Arial Black,Arial Bold,Arial,sans-serif' ] = 'Arial Black *';
		  $font_choices[ 'Arial Narrow,Arial,Helvetica Neue,Helvetica,sans-serif' ] = 'Arial Narrow *';
		  $font_choices[ 'Courier,Verdana,sans-serif' ] = 'Courier *';
		  $font_choices[ 'Georgia,Times New Roman,Times,serif' ] = 'Georgia *';
		  $font_choices[ 'Times New Roman,Times,Georgia,serif' ] = 'Times New Roman *';
		  $font_choices[ 'Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Arial,sans-serif' ] = 'Trebuchet MS *';
		  $font_choices[ 'Verdana,sans-serif' ] = 'Verdana *';
		  $font_choices[ 'American Typewriter,Georgia,serif' ] = 'American Typewriter';
		  $font_choices[ 'Andale Mono,Consolas,Monaco,Courier,Courier New,Verdana,sans-serif' ] = 'Andale Mono';
		  $font_choices[ 'Baskerville,Times New Roman,Times,serif' ] = 'Baskerville';
		  $font_choices[ 'Bookman Old Style,Georgia,Times New Roman,Times,serif' ] = 'Bookman Old Style';
		  $font_choices[ 'Calibri,Helvetica Neue,Helvetica,Arial,Verdana,sans-serif' ] = 'Calibri';
		  $font_choices[ 'Cambria,Georgia,Times New Roman,Times,serif' ] = 'Cambria';
		  $font_choices[ 'Candara,Verdana,sans-serif' ] = 'Candara';
		  $font_choices[ 'Century Gothic,Apple Gothic,Verdana,sans-serif' ] = 'Century Gothic';
		  $font_choices[ 'Century Schoolbook,Georgia,Times New Roman,Times,serif' ] = 'Century Schoolbook';
		  $font_choices[ 'Consolas,Andale Mono,Monaco,Courier,Courier New,Verdana,sans-serif' ] = 'Consolas';
		  $font_choices[ 'Constantia,Georgia,Times New Roman,Times,serif' ] = 'Constantia';
		  $font_choices[ 'Corbel,Lucida Grande,Lucida Sans Unicode,Arial,sans-serif' ] = 'Corbel';
		  $font_choices[ 'Franklin Gothic Medium,Arial,sans-serif' ] = 'Franklin Gothic Medium';
		  $font_choices[ 'Garamond,Hoefler Text,Times New Roman,Times,serif' ] = 'Garamond';
		  $font_choices[ 'Gill Sans MT,Gill Sans,Calibri,Trebuchet MS,sans-serif' ] = 'Gill Sans MT';
		  $font_choices[ 'Helvetica Neue,Helvetica,Arial,sans-serif' ] = 'Helvetica Neue';
		  $font_choices[ 'Hoefler Text,Garamond,Times New Roman,Times,sans-serif' ] = 'Hoefler Text';
		  $font_choices[ 'Lucida Bright,Cambria,Georgia,Times New Roman,Times,serif' ] = 'Lucida Bright';
		  $font_choices[ 'Lucida Grande,Lucida Sans,Lucida Sans Unicode,sans-serif' ] = 'Lucida Grande';
		  $font_choices[ 'Palatino Linotype,Palatino,Georgia,Times New Roman,Times,serif' ] = 'Palatino Linotype';
		  $font_choices[ 'Tahoma,Geneva,Verdana,sans-serif' ] = 'Tahoma';
		  $font_choices[ 'Rockwell, Arial Black, Arial Bold, Arial, sans-serif' ] = 'Rockwell';
		  $font_choices[ 'Segoe UI' ] = 'Segoe UI';
		  return $font_choices;
	}
	
	/***********************************/
	/* 	  ADMIN REQUERID FUNCTIONS     */
	/***********************************/
	
	private function inputs_kern($start=-0.3,$trichqy=0.0500001,$count_of_select=26){
		$array_of_kern=array();
		for($i=0;$i<$count_of_select;$i++){
			$array_of_kern[number_format($start,2).'em']=number_format($start,2).'em';
			$start=$start+$trichqy;
		}
		return $array_of_kern;
	}
	private function text_transform(){
		return array('none'=>'None','uppercase'=>'Uppercase ','capitalize'=>'Capitalize ','lowercase'=>'Lowercase  ');
	}
	private function text_variant(){
		return array('normal'=>'Normal ','small-caps'=>'Small-Caps ');
	}
	private function text_weight(){
		return array('normal'=>'Normal ','bold'=>'Bold ','lighter'=>'Light  ');
	}
	private function text_stylee(){
		return array('normal'=>'Normal ','italic'=>'Italic ');
	}
	
	/***********************************/
	/*		FRONT END TYPAGRAPHY 	   */
	/***********************************/
	
	public function print_fornt_end_style_typography(){
		global $best_magazine_options;
		extract($best_magazine_options);
    
?>

<style type="text/css">
	h1, h2, h3, h4, h5, h6 {
		font-family: <?php echo esc_html( $type_headers_font ); ?>;
		font-weight: <?php echo esc_html( $type_headers_weight ); ?>;
		letter-spacing: <?php echo esc_html( $type_headers_kern ); ?>;
		text-transform: <?php echo esc_html( $type_headers_transform ); ?>;
		font-variant: <?php echo esc_html( $type_headers_variant ); ?>;
		font-style: <?php echo esc_html( $type_headers_style ); ?>;
	}

	.nav, .metabar, .subtext, .subhead, .widget-title, .reply a, .editpage, #page .wp-pagenavi, .post-edit-link, #wp-calendar caption, #wp-calendar thead th, .soapbox-links a, .fancybox, .standard-form .admin-links, .ftitle small {
		font-family: <?php echo esc_html( $type_headers_font ); ?>;
		font-weight: <?php echo esc_html( $type_headers_weight ); ?>;
		letter-spacing: <?php echo esc_html( $type_headers_kern ); ?>;
		text-transform: <?php echo esc_html( $type_headers_transform ); ?>;
		font-variant: <?php echo esc_html( $type_headers_variant ); ?>;
		font-style: <?php echo esc_html( $type_headers_style ); ?>;
	}

	body {
		font-family: <?php echo esc_html( $type_primary_font ); ?>;
		font-weight: <?php echo esc_html( $type_primary_weight ); ?>;
		letter-spacing: <?php echo esc_html( $type_primary_kern ); ?>;
		text-transform: <?php echo esc_html( $type_primary_transform ); ?>;
		font-variant: <?php echo esc_html( $type_primary_variant ); ?>;
		font-style: <?php echo esc_html( $type_primary_style ); ?>;
	}

	input, textarea {
		font-family: <?php echo esc_html( $type_inputs_font ); ?>;
		font-weight: <?php echo esc_html( $type_inputs_weight ); ?>;
		letter-spacing: <?php echo esc_html( $type_inputs_kern ); ?>;
		text-transform: <?php echo esc_html( $type_inputs_transform ); ?>;
		font-variant: <?php echo esc_html( $type_inputs_variant ); ?>;
		font-style: <?php echo esc_html( $type_inputs_style ); ?>;
	}
</style><?php
	}
}
 
