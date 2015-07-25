<?php
add_action('admin_init', 'best_magazine_meta_init');

function best_magazine_meta_init()
{

    wp_enqueue_script('best_magazine_meta_js', get_template_directory_uri() . '/admin/includes/meta/meta.js', array('jquery'));
    wp_enqueue_style('best_magazine_meta_css', get_template_directory_uri() . '/admin/includes/meta/meta.css');

    foreach (array('post', 'page') as $type) {
        add_meta_box('best_magazine_all_meta', __('Magazine Custom Meta Box','best-magazine'), 'best_magazine_meta_setup', $type, 'normal', 'high');
    }

    add_action('save_post', 'best_magazine_meta_save');
}

function best_magazine_meta_setup()
{
    global $post,$best_magazine_options;
	extract($best_magazine_options);
    $meta = get_post_meta($post->ID, 'best_magazine_meta_date', TRUE);
	if( gettype ($post->ID) == 'integer' ){
		$meta=array(
			'layout' =>  $default_layout ,
			'content_width' =>  $content_area ,
			'main_col_width' =>  $main_column ,
			'pr_widget_area_width' =>  $pwa_width,
			'fullwidthpage' => $full_width,
			'blogstyle' => $blog_style,
			'showthumb' => '',
			'blog_perpage' =>get_option( 'posts_per_page', 2 ),
			'showtitle' => '',
			'showdesc' => '',
			'detect_portrait' => '',
			'thumbsize' => '2',
			'static_pages_on' => '',			
			'all_categories_on' => '',
			'tags_on' => '',
			'archives_on' => '',
			'authors_on' => '',
			'blog_posts_on' => '',
			'category_tabs_mst_pop'=> '',
			'categories'=>'',
			'hide_category_tabs_mst_pop'=>''
		);
		
	}
	else
	{
		$meta_if_par_not_initilas=array(
			'layout' =>  $default_layout ,
			'content_width' =>  $content_area,
			'main_col_width' =>  $main_column ,
			'pr_widget_area_width' =>  $pwa_width,
			'fullwidthpage' => $full_width,
			'blogstyle' => $blog_style,
			'showthumb' => '',
			'blog_perpage' => get_option( 'posts_per_page', 2 ),
			'showtitle' => '',
			'showdesc' => '',
			'detect_portrait' => '',
			'thumbsize' => '2',
			'static_pages_on' => '',			
			'all_categories_on' => '',
			'tags_on' => '',
			'archives_on' => '',
			'authors_on' => '',
			'blog_posts_on' => '',
		    'category_tabs_mst_pop'=> '',
			'categories'=>'',
			'hide_category_tabs_mst_pop'=>''	
		);
		
		foreach($meta_if_par_not_initilas as $key=>$meta_if_par_not_initila){
			
			if(!isset($meta[$key])){
				$meta[$key]=$meta_if_par_not_initila;
			}
		
		}
	
		
	}

    // instead of writing HTML here, lets do an include
   require_once('meta.php');

    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="best_magazine_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function best_magazine_meta_save($post_id)
{
    // authentication checks

    // check user permissions
    if (isset($_POST['post_type']) && $_POST['post_type'] == 'page') {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    } else {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }

    $current_data = get_post_meta($post_id, 'best_magazine_meta_date', TRUE);
	if(isset($_POST['best_magazine_meta_date']))
   	 $new_data = $_POST['best_magazine_meta_date'];
	else 
     $new_data = ''; 
   
    if (gettype ($post_id) == 'integer') {
        if(is_null($new_data)){ 
			 delete_post_meta($post_id, 'best_magazine_meta_date');
		}
        else{ 
		update_post_meta($post_id, 'best_magazine_meta_date', $new_data);
		add_post_meta($post_id, 'best_magazine_meta_date', $new_data, TRUE);
		}
    } elseif (!is_null($new_data)) {
       update_post_meta($post_id, 'best_magazine_meta_date', $new_data);
		
    }  
    return $post_id;
}

