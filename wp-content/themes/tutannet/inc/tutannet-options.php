<?php
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
    
    $imagepath =  get_template_directory_uri() . '/inc/option-framework/images/';
     
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
    $options_categories[]= __( 'Chọn chuyên mục', 'tutannet' );
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->slug] = $category->cat_name;
	}
	
	// Pull all the post of slected category into an array	
	function options_posts($cat_name) {
		$options_posts_array = array();
		$args = array( 'category_name' => $cat_name, 'posts_per_page' => -1, 'post_status'=>'publish' );
		$options_posts_obj = get_posts( $args );
		$options__posts_array[]= __( 'Chọn bài đăng', 'tutannet' );
		foreach ($options_posts_obj as $post) {
			$options_posts_array[$post->ID] = $post->post_title;
		}
		return $options_posts_array;
	}
	
	//Slide options for homepage slider
    $options_slides = array();
    $options_slides[0] = __( 'Select no.of slides', 'tutannet' );
    for($i=1;$i<=6;$i++)
    {
        $options_slides[$i] = $i ;
    }
    
    //No.of posts for homepage blocks
    $options_block_posts = array();
    $options_block_posts[-1]= __( '-- All posts --', 'tutannet' );
    for($i=4;$i<=10;$i++)
    {
        $options_block_posts[$i] = $i ;
    }    
    
    //Footer Pattern
	$footer_pattern = array(
        'column4' => $imagepath . 'footers/footer-4.png',
        'column3' => $imagepath . 'footers/footer-3.png',
		'column2' => $imagepath . 'footers/footer-2.png', 
        'column1' => $imagepath . 'footers/footer-1.png',		   
		);
        
    //Post Templates
    $post_template = array(
        'default-template' => $imagepath.'post_template/post-templates-icons-0.png',
        'style1-template' => $imagepath.'post_template/post-templates-icons-1.png', 
        );
    
    //Post sidebar
    $post_sidebar = array(
        'right-sidebar'=>$imagepath.'right-sidebar.png',
        'left-sidebar'=>$imagepath.'left-sidebar.png',
        'no-sidebar'=>$imagepath.'no-sidebar.png',
        );

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
    
    //Traslations Array
    $translation_name = array(
                            __( "You are here", "tutannet" ),__( "Editor Pick`s", "tutannet" ),__( "Home", "tutannet" ),__( "Review overview", "tutannet" ),__( "Summary", "tutannet" ),
                            __( "Search results for", "tutannet" ),__( "Tagged", "tutannet" ),__( "Next article", "tutannet" ),__( "Previous article", "tutannet" ),__( "Via", "tutannet" ),__( "Source", "tutannet" ),__( "Advertisement", "tutannet" ),__( "Top arrow", "tutannet" ),
                            __( "Copyright", "tutannet" )
                            );
    $translation_id = array(
                            'you_are_here','editor_picks','home','review_overview','summary','search_results_for','tagged','next_article','previous_article','via','source','advertisement','top_arrow','copyright'
                            );
    $trans_count = count($translation_id);

	$options = array();

/*-----------------------Basic Setting------------------------*/
	$options[] = array(
            'name' => __( 'Basic Settings', 'tutannet' ),
            'type' => 'heading'
            );
    /*----------------Background settings--------------------------*/
    $options[] = array(
            'name' => __( 'Background Settings', 'tutannet' ),
            'id'   => 'background_settings',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Background Settings', 'tutannet' ) ,
            'desc' => sprintf(__( 'Go to <a href="%s" target="_blank">customize page</a> to change the background settings', 'tutannet' ), esc_url(admin_url('/customize.php'))),
            'id'   => 'back_setting_option',    
            'type' => 'info',  
            );
    $options[] = array(
            'type' => 'groupend'
            );
    
    /*-------------------Website layout------------------------*/
    $options[] = array(
            'name' => __( 'Website Layout', 'tutannet' ),
            'id'   => 'website_layout',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Website layout', 'tutannet' ),
            'id' => 'website_layout_option',            
            'options' => array(
                    ' ' => __( 'Fullwidth', 'tutannet' ),
                    'boxed' => __( 'Boxed', 'tutannet' ),
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    $options[] = array(
            'type' => 'groupend'
            );
    
    
/*-----------------------Header Setting------------------------*/

	$options[] = array(
		    'name' => __( 'Header', 'tutannet' ),
            'type' => 'heading'
	        );    
    /*--------------Logo setting-------------------*/
    $options[] = array(
            'name' => __( 'Logo', 'tutannet' ),
            'id'   => 'logo',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Header Image', 'tutannet' ) ,
            'desc' => sprintf(__( 'Go to <a href="%s" target="_blank">customize page</a> to add Header Image', 'tutannet' ), esc_url(admin_url('/customize.php'))),
            'id'   => 'header_image',    
            'type' => 'info',  
            );

     $options[] = array(
            'name' => __( 'Favicon', 'tutannet' ),
            'desc' => __( 'Upload a favicon image (Standard size of the favicon is 16 x 16px)', 'tutannet' ),
            'id' => 'favicon_upload',
            'class' =>'sub-option',
            'type' => 'upload', 
            ); 
    
    $options[] = array(
            'name' => __( 'Logo Alt Attribute', 'tutannet' ),
            'desc' => __( 'Write ALT attribute for the logo', 'tutannet' ),
            'id' => 'logo_alt',
            'type' => 'text', 
            );
    
    $options[] = array(
            'name' => __( 'Logo Title Attribute', 'tutannet' ),
            'desc' => __( 'Write TITLE attribute for the logo', 'tutannet' ),
            'id' => 'logo_title',
            'type' => 'text', 
            );
    
    $options[] = array(
            'type' => 'groupend'
            );
    /*--------------Primary Nav setting-------------------*/
    $options[] = array(
            'name' => __( 'Mục Giới Thiệu', 'tutannet' ),
            'id'   => 'primary_nav',
            'type' => 'groupstart'
            );
    
    $options[] = array(
            'name' => __( 'Chọn Chuyên Mục', 'tutannet' ),
            'desc' => __( 'Chọn chuyên mục cho "Mục Giới Thiệu"', 'tutannet' ),    
            'id' => 'primary_nav_category',
            'type' => 'select',
            'options' => $options_categories,
            );   
    
    $options[] = array(
		    'name' => __('Bài Giới Thiệu Thứ Nhất', 'tutannet'),
		    'desc' => __('Chọn bài giới thiệu đầu tiên đăng trên danh mục giới thiệu trên trang chủ', 'tutannet'),
		    'id' => 'primay_nav_item1',
		    'type' => 'select',
		    'options' => options_posts(of_get_option('primary_nav_category')),
		    );
		    
	$options[] = array(
		    'name' => __('Bài Giới Thiệu Thứ Hai', 'tutannet'),
		    'desc' => __('Chọn bài giới thiệu thứ hai đăng trên danh mục giới thiệu trên trang chủ', 'tutannet'),
		    'id' => 'primay_nav_item2',
		    'type' => 'select',
		    'options' => options_posts(of_get_option('primary_nav_category')),
		    );
		    
	$options[] = array(
		    'name' => __('Bài Giới Thiệu Thứ Ba', 'tutannet'),
		    'desc' => __('Chọn bài giới thiệu thứ ba đăng trên danh mục giới thiệu trên trang chủ', 'tutannet'),
		    'id' => 'primay_nav_item3',
		    'type' => 'select',
		    'options' => options_posts(of_get_option('primary_nav_category')),
		    );
        
    $options[] = array(
            'type' => 'groupend'
            );


/*-----------------------Footer Setting------------------------*/
    $options[] = array(
            'name' => __( 'Footer', 'tutannet' ),
		    'type' => 'heading'
	       );
    
    $options[] = array(
            'name' => __( 'Footer Setting', 'tutannet' ),
            'id'   => 'footer_setting',
            'type' => 'groupstart'
            );
            
    $options[] = array(
            'name' => __( 'Footer Widget Option', 'tutannet' ),                
            'desc' => __( 'Show or hide the footer widter area', 'tutannet' ),
            'id' => 'footer_switch',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    
    $options[] = array(
            'name' => __( 'Footer Layout', 'tutannet' ),
            'desc' => __( 'Choose footer widget layout', 'tutannet' ),
            'id' => 'footer_layout',
            'std' => 'column4',
            'type' => 'images',
            'options' => $footer_pattern
            );
    
    $options[] = array(
            'type' => 'groupend'
            );
    
    $options[] = array(
            'name' => __( 'Sub-footer Setting', 'tutannet' ),
            'id'   => 'sub_footer_setting',
            'type' => 'groupstart'
            );    
            
    $options[] = array(
            'name' => __( 'Sub Footer Option', 'tutannet' ),                
            'desc' => __( 'Show or hide copy right and footer menu section', 'tutannet' ),
            'id' => 'sub_footer_switch',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    
    $options[] = array(
            'name' => __( 'Copyright text', 'tutannet' ),
            'desc' => __( 'Set footer copyright text', 'tutannet' ),
            'id' => 'mag_footer_copyright',
            'std' => __( get_bloginfo('name'), 'tutannet' ),
            'type' => 'text' 
            );
    
    $options[] = array(
            'name' => __( 'Copyright Option', 'tutannet' ),                
            'desc' => __( 'Show or hide the footer copyright example( Copyright &copy; current year )', 'tutannet' ),
            'id' => 'copyright_symbol',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'type' => 'groupend'
            );

    
/*-----------------------Layout Setting------------------------*/
    $options[] = array(
            'name' => __( 'Layout Settings', 'tutannet' ),
            'type' => 'heading',
            'static_text' =>'static',
            'id'=>'layout-settings'
	        );

/*-----------------------Homepage Settings------------------------*/
    $options[] = array(
            'name' => __( 'Homepage Settings', 'tutannet' ),
		    'type' => 'heading'
	       );
    
     $options[] = array(
            'name' => __( 'Slider Settings', 'tutannet' ),
            'id'   => 'slider_settings',
            'type' => 'groupstart'
            );            
    $options[] = array(
            'name' => __( 'Select Category', 'tutannet' ),
            'desc' => __( 'Select a category for homepage slider', 'tutannet' ),    
            'id' => 'homepage_slider_category',
            'type' => 'select',
            'options' => $options_categories
            );   
    $options[] = array(
            'name' => __( 'Show Pager', 'tutannet' ),                
            'desc' => __( 'Show or hide the slider pager', 'tutannet' ),
            'id' => 'slider_pager',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '0',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Controls', 'tutannet' ),                
            'desc' => __( 'Show or hide the slider controls', 'tutannet' ),
            'id' => 'slider_controls',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Auto Transition', 'tutannet' ),                
            'desc' => __( 'On or off the slider auto transition', 'tutannet' ),
            'id' => 'slider_auto_transition',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Title', 'tutannet' ),                
            'desc' => __( 'Show or hide slider`s Title/info', 'tutannet' ),
            'id' => 'slider_info',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Number of slides', 'tutannet' ),
            'desc' => __( 'Choose number of slides', 'tutannet' ),
            'id' => 'count_slides', 
            'type' => 'select',
            'options' => $options_slides
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
    $options[] = array(
            'name' => __( 'Blocks settings', 'tutannet' ),
            'id'   => 'blocks_settings',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Featured Block (First)', 'tutannet' ),
            'desc' => __( 'Select a category for first block in homepage', 'tutannet' ),    
            'id' => 'featured_block_1',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'tutannet' ),
            'desc' => __( 'Choose number of posts for block (first)', 'tutannet' ),
            'id' => 'posts_for_block1', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'name' => __( 'Featured Block (Second)', 'tutannet' ),
            'desc' => __( 'Select a category for second block in homepage', 'tutannet' ),    
            'id' => 'featured_block_2',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'tutannet' ),
            'desc' => __( 'Choose number of posts for block (second)', 'tutannet' ),
            'id' => 'posts_for_block2', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'name' => __( 'Featured Block (Third)', 'tutannet' ),
            'desc' => __( 'Select a category for third block in homepage', 'tutannet' ),    
            'id' => 'featured_block_3',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'tutannet' ),
            'desc' => __( 'Choose number of posts for block (third)', 'tutannet' ),
            'id' => 'posts_for_block3', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'name' => __( 'Featured Block (Fourth)', 'tutannet' ),
            'desc' => __( 'Select a category for fourth block in homepage', 'tutannet' ),    
            'id' => 'featured_block_4',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'tutannet' ),
            'desc' => __( 'Choose number of posts for block (fourth)', 'tutannet' ),
            'id' => 'posts_for_block4', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
    $options[] = array(
            'name' => __( 'Editor pick settings', 'tutannet' ),
            'id'   => 'editor_pick_setting',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Select Category', 'tutannet' ),
            'desc' => __( 'Select a category for editor pick in homepage sidebar', 'tutannet' ),    
            'id' => 'editor_pick_category',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'tutannet' ),
            'desc' => __( 'Choose number of posts for editor pick section', 'tutannet' ),
            'id' => 'posts_for_editor_pick', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'type' => 'groupend'
            );
              
/*------------------------Post Settings------------------------*/         
     $options[] = array(
            'name' => __( 'Post Settings', 'tutannet' ),
            'type' => 'heading'
            ); 
            
    $options[] = array(
            'name' => __( 'Additional Settings', 'tutannet' ),
            'id'   => 'post_settings',
            'type' => 'groupstart'
            );
            
    $options[] = array(
            'name' => __( 'Show Date', 'tutannet' ),                
            'desc' => __( 'Enable or disable the post date', 'tutannet' ),
            'id' => 'post_show_date',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
            
    $options[] = array(
            'name' => __( 'Show Post Views', 'tutannet' ),                
            'desc' => __( 'Enable or disable the post views', 'tutannet' ),
            'id' => 'show_post_views',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Comment Count', 'tutannet' ),                
            'desc' => __( 'Enable or disable comment number', 'tutannet' ),
            'id' => 'show_comment_count',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Author Under Title', 'tutannet' ),                
            'desc' => __( 'Shows or hide the author under the post title', 'tutannet' ),
            'id' => 'show_author_name',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Tags on Site', 'tutannet' ),                
            'desc' => __( 'Enable or disable the post tags', 'tutannet' ),
            'id' => 'show_tags_post',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Author Box', 'tutannet' ),                
            'desc' => __( 'Enable or disable the author box', 'tutannet' ),
            'id' => 'show_author_box',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Navigation in Posts', 'tutannet' ),                
            'desc' => __( 'Show or hide `next` and `previous` posts', 'tutannet' ),
            'id' => 'show_post_nextprev',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'type' => 'groupend'
            );
      /*------------------------Default site post template------------------------*/ 
    $options[] = array(
            'name' => __( 'Post Layout', 'tutannet' ),
            'id'   => 'post_template',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Default Post Template', 'tutannet' ),
            'desc' => __( "Setting this option will make all post pages, that don't have a post template associated to them, to be displayed using this template. This option is OVERWRITTEN by the `Post template` option from the backend - post add / edit page.", 'tutannet' ),
            'id' => 'global_post_template',
            'class'=>'post_template_image',
            'std' => 'default-template',
            'type' => 'images',
            'options' => $post_template
            );
    $options[] = array(
            'name' => __( 'Default Post Sidebar', 'tutannet' ),
            'desc' => __( "Setting this option will make all post pages, that don't have a post sidebar associated to them, to be displayed using this sidebar. This option is OVERWRITTEN by the `Post sidebar` option from the backend - post add / edit page.", 'tutannet' ),
            'id' => 'global_post_sidebar',
            'class'=>'post_sidebar_image',
            'std' => 'right-sidebar',
            'type' => 'images',
            'options' => $post_sidebar
            );
    $options[] = array(
            'type' => 'groupend'
            );
           /*------------------------Featured image settings------------------------*/ 
    $options[] = array(
            'name' => __( 'Featured images', 'tutannet' ),
            'id'   => 'featured_image',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Show Featured Image', 'tutannet' ),                
            'desc' => __( 'Show or hide featured image in post`s single page', 'tutannet' ),
            'id' => 'featured_image',
            'on' => __( 'Yes', 'tutannet'),
            'off' => __( 'No', 'tutannet'),
            'std' => '1',
            'type' => 'switch'
            );      
    $options[] = array(
            'type' => 'groupend'
            );
      
/*------------------Archive Page Settings---------------------*/
    $options[] = array(
            'name' => __( 'Archive Settings', 'tutannet' ),
            'type' => 'heading'
            ); 
            
    $options[] = array(
            'name' => __( 'Archive Style', 'tutannet' ),
            'id'   => 'archive_style',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Archive page template', 'tutannet' ),
            'desc' => __( "Define - Choose template for all archive pages", 'tutannet' ),
            'id' => 'global_archive_template',
            'class'=>'archive_post_template_image',
            'std' => 'default-template',
            'type' => 'images',
            'options' => $post_template
            );
    $options[] = array(
            'name' => __( 'Archive page sidebar', 'tutannet' ),
            'desc' => __( "Define - Choose sidebar for all archive pages", 'tutannet' ),
            'id' => 'global_archive_sidebar',
            'class'=>'archive_page_sidebar_image',
            'std' => 'right-sidebar',
            'type' => 'images',
            'options' => $post_sidebar
            );    
    $options[] = array(
            'type' => 'groupend'
            );

            
/*--------------------------MISC--------------------------*/        
    $options[] = array(
            'name' => __( 'MISC', 'tutannet' ),
            'type' => 'heading',
            'static_text' =>'static',
            'id'=>'misc'
	        );
    
    /*------------------------Excerpts Settings------------------------*/
    $options[] = array(
            'name' => __( 'Excerpts', 'tutannet' ),
            'type' => 'heading'
            );
    $options[] = array(
            'name' => __( 'Excerpts', 'tutannet' ),
            'id'   => 'excerpts',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Notice:', 'tutannet' ),
            'desc' => __( 'Adding a text as excerpt on post edit page (Excerpt box), will overwrite the theme excerpts', 'tutannet' ),
            'id' => 'excerpt_notice',
            'type' => 'info', 
            );
    $options[] = array(
            'name' => __( 'Excerpts Type', 'tutannet' ),
            'desc' => __( 'Define - type of excerpt for archives pages', 'tutannet' ),
            'id' => 'excerpt_type',            
            'options' => array(
                    ' '     => __( 'On Words', 'tutannet' ),
                    'letters' => __( 'On Letters', 'tutannet' ),                    
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    
    $options[] = array(
            'name' => __( 'Excerpt Length', 'tutannet' ),
            'desc' => __( 'Define - Excerpt length of words/letters for archive pages', 'tutannet' ),
            'id' => 'excerpt_lenght',
            'type' => 'text',
            'std' => 50, 
            );
    $options[] = array(
            'type' => 'groupend'
            );

/*------------------------Translations------------------------*/
    $options[] = array(
            'name' => __( 'Translations', 'tutannet' ),
            'type' => 'heading'
            );
    $options[] = array(
            'name' => __( 'Translations', 'tutannet' ),
            'id'   => 'translations',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Translate Your Theme', 'tutannet' ),
            'desc' => __( 'Translate your frontend easily without any external plugins. While you leave the box empty and the theme will load the default string', 'tutannet' ),
            'id' => 'translate_notice',
            'type' => 'info', 
            );
     for($i=0;$i<$trans_count;$i++)
     {
        $options[] = array(
            'name' => $translation_name[$i],
            'desc' => __( '', 'tutannet' ),
            'id' => 'trans_'.$translation_id[$i],
            'type' => 'text', 
            );
     }       
    $options[] = array(
            'type' => 'groupend'
            );
            
/*----------------------------------------------------------*/
	return $options;
}