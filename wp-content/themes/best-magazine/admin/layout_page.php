<?php

class best_magazine_layout_page_class{

	public $options_themeoptions;
	
	
	/***********************************/
	/* 			INITIAL PAGE		   */
	/***********************************/
	
	function __construct(){
			
		$this->options_themeoptions = array (
		
			'default_layout' => array(
				'name' => 'default_layout',
				'title' => __( 'Choose Default Layout', 'best-magazine' ),
				'type' => 'radio',
				'valid_options' => array(
					'1' => array(
						'name' => '1',
						'title' => __( 'No Sidebar', 'best-magazine' )
					),
					'2' => array(
						'name' => '2',
						'title' => __( 'One right', 'best-magazine' )
					),
					'3' => array(
						'name' => '3',
						'title' => __( 'One left', 'best-magazine' )
					),
					'4' => array(
						'name' => '4',
						'title' => __( 'Two right', 'best-magazine' )
					),
					'5' => array(
						'name' => '5',
						'title' => __( 'two left', 'best-magazine' )
					),
					'6' => array(
						'name' => '6',
						'title' => __( 'One right and one left', 'best-magazine' )
					)
				),
				'description' => __( 'Here you can select the default layout for pages and posts on the website.', 'best-magazine' ),
				'section' => 'layout_editor',
				'tab' => 'layout_editor',
				'default' => '2'
			),
			 
			'full_width' => array(
				'name' => 'full_width',
				'title' => __( 'Full Width', 'best-magazine' ),
				'type' => 'checkbox',
				'valid_options' => array(
					'on' => array(
						'name' => 'on',
						'title' => __( 'One', 'best-magazine' )
					)
				),
				'description' => __( 'You can choose full width for pages and posts on the website.', 'best-magazine' ),
				'section' => 'layout_editor',
				'tab' => 'layout_editor',
				'default' => false
			),	  
		
			'content_area' => array(
				'name' => 'content_area',
				'title' => __( 'Content Area Width', 'best-magazine' ),
				'type' => 'text',
				'valid_options' => '',
				"sanitize_type" => "sanitize_text_field",
				'description' => __( 'Specify the width of the Content Area', 'best-magazine' ),
				'section' => 'layout_editor',
				'tab' => 'layout_editor',
				'default' => '1024',
				"extend_simvol" => "px"
			),		   
		
			 'main_column' => array(
				'name' => 'main_column',
				'title' => __( 'Main Column Width', 'best-magazine' ),
				'type' => 'text',
				"sanitize_type" => "sanitize_text_field",
				'valid_options' =>'',
				'description' => __( 'Specify the width of the Main Column', 'best-magazine' ),
				'section' => 'layout_editor',
				'tab' => 'layout_editor',
				'default' => '67',
				"extend_simvol" => "%"
			),	 
		
			'pwa_width' => array(
				'name' => 'pwa_width',
				'title' => __( 'Primary Widget Area width', 'best-magazine' ),
				'type' => 'text',
				'valid_options' => '',
				"sanitize_type" => "sanitize_text_field",
				'description' => __( 'Specify the width of the Primary Widget Area', 'best-magazine' ),
				'section' => 'layout_editor',
				'tab' => 'layout_editor',
				'default' => '16',
				"extend_simvol" => "%"
			),  
		);
	
	
	}
		
	
	/***********************************/
	/* 		 FRONT END LAYOUT    	   */
	/***********************************/
	
	public function update_layout_editor(){
		global $best_magazine_options;
		extract($best_magazine_options);

		if ($full_width)
		{
			$content_width ='100%';
			$them_content_are_width='100%';
			?><script>var full_width_magazine=1</script><?php echo "\r\n";
			
		}
		else {
			$content_width	=$content_area . "px;";
			$them_content_are_width=$content_area . "px;";
			?><script> var full_width_magazine=0</script><?php echo "\r\n";
		}
		switch ($default_layout) {
			//set styles leauts
			case 1:
				?><style type="text/css">
	#sidebar1,
	#sidebar2 {
		display:none;
	}
	#blog, .blog{
		display:block; 
		float:left;
	}
	
	.container{
		width:<?php echo esc_html( $them_content_are_width ); ?>;
	}        
	#blog, .blog{
		width:100%;
	}               
</style>
<?php
	break;
case 2:
?>

<style type="text/css">
	#sidebar2{
		display:none;
	} 
	#sidebar1 {
		display:block;
		float:right;
	}
	.blog,#content{
		display:block;
		float:left;
	} 
	.container{
		width:<?php echo esc_html( $them_content_are_width ); ?>
	}
	.blog, #content{
		width:<?php echo esc_html( $main_column ); ?>%;
	}
	#sidebar1{
		width:<?php echo (100  - esc_html( $main_column )); ?>%;
	}
</style>
<?php
	break;
case 3:
?>
<style type="text/css">
	#sidebar2{
		display:none;
	} 
	#sidebar1 {
		display:block;
		float:left;
	} 
	.blog, #content{
		display:block;
		float:left;
	}
	.container{
		width:<?php echo esc_html( $them_content_are_width ); ?>
	}
	.blog, #content{
		width:<?php echo esc_html( $main_column ) ; ?>%;
	}
	#sidebar1{
		width:<?php echo (100 -  esc_html( $main_column )); ?>%;
	}
	#top-page .blog,#top-page #blog{
		left:<?php echo  (100 -  esc_html( $main_column )) ; ?>%;
	}    
</style>
<?php
	break;
case 4:
?>
<style type="text/css">
	#sidebar2{
		display:block;
		float:right;
	} 
	#sidebar1 {
		display:block; float:right;
	} 
	#blog, .blog,#content{
		display:block;
		float:left;
	}
	.container{
		width:<?php echo esc_html( $them_content_are_width ); ?>
	}
	.blog,#content{
		width:<?php echo esc_html( $main_column ) ; ?>%;
	}
	#sidebar1{
		width:<?php echo esc_html( $pwa_width ) ; ?>%;
	}
	#sidebar2{
		width:<?php echo (100  - esc_html( $pwa_width ) - esc_html( $main_column )); ?>%;
	}
</style>
<?php
	break;
case 5:
?>
<style type="text/css">
	#sidebar2{
		display:block;
		float:left;
	} 
	#sidebar1 {
		display:block;
		float:left;
	} 
	.blog,#content{
		display:block;
	}
	#content{
		float:right;
	}
	.container{
	width:<?php echo esc_html( $them_content_are_width ); ?>
	}
	.blog,#content{
	width:<?php echo esc_html( $main_column ) ; ?>%;
	}
	#blog{
		float:right;
	}
	#sidebar1{
	width:<?php echo esc_html( $pwa_width ) ; ?>%;
	}
	#sidebar2{
	width:<?php echo (100 - esc_html( $pwa_width ) - esc_html( $main_column )); ?>%;
	}
	
</style>
<?php
	break;
case 6:
?>
<style type="text/css">
	#sidebar2{
		display:block;
		float:right;
	} 
	#sidebar1 {
		display:block;
		float:left; 
	} 
	.blog, #content{
		display:block;
		float:left;
	}    			       
	.container{
		width:<?php echo esc_html( $them_content_are_width ); ?>
	}
	.blog, #content{
		width:<?php echo esc_html( $main_column ) ; ?>%;
	}
	#sidebar1{
		width:<?php echo esc_html( $pwa_width ) ; ?>%;
	}
	#sidebar2{
		width:<?php echo (100  - esc_html( $pwa_width ) - esc_html( $main_column )); ?>%;
	}       
	#top-page .blog,#top-page #blog{
		left:<?php echo esc_html( $pwa_width ) ; ?>%;
	}     
</style><?php
					break;
			}
		}
}
 