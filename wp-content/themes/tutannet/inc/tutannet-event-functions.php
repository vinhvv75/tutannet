<?php

add_action( 'init', 'create_event_taxonomy' );
// create event taxonomy"
function create_event_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Chuyên mục sự kiện', 'taxonomy general name' ),
		'singular_name'     => _x( 'Chuyên mục sự kiện', 'taxonomy singular name' ),
		'search_items'      => __( 'Tìm chuyên mục sự kiện' ),
		'all_items'         => __( 'Tất cả chuyên mục sự kiện' ),
		'parent_item'       => __( 'Chuyên mục sự kiện chính' ),
		'parent_item_colon' => __( 'Chuyên mục sự kiện chính:' ),
		'edit_item'         => __( 'Chỉnh sửa chuyên mục sự kiện' ),
		'update_item'       => __( 'Cập nhật chuyên mục sự kiện' ),
		'add_new_item'      => __( 'Thêm chuyên mục sự kiện mới' ),
		'new_item_name'     => __( 'Tên chuyên mục sự kiện mới' ),
		'menu_name'         => __( 'Chuyên mục sự kiện' ),
	);

	$args = array(
		'hierarchical'      => true,
		'public' 			=> true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event' ),
	);

	register_taxonomy( 'event', array( 'post', 'event' ), $args );
}



add_action( 'init', 'codex_event_init' );
/**
 * Register a event post type.
 *
 */
function codex_event_init() {
	$labels = array(
		'name'               => _x( 'Sự kiện', 'post type general name', 'tutannet' ),
		'singular_name'      => _x( 'Sự kiện', 'post type singular name', 'tutannet' ),
		'menu_name'          => _x( 'Sự kiện', 'admin menu', 'tutannet' ),
		'name_admin_bar'     => _x( 'Sự kiện', 'add new on admin bar', 'tutannet' ),
		'add_new'            => _x( 'Thêm mới', 'event', 'tutannet' ),
		'add_new_item'       => __( 'Thêm sự kiện mới', 'tutannet' ),
		'new_item'           => __( 'Sự kiện mới', 'tutannet' ),
		'edit_item'          => __( 'Sửa sự kiện', 'tutannet' ),
		'view_item'          => __( 'Xem sự kiện', 'tutannet' ),
		'all_items'          => __( 'Tất cả sự kiện', 'tutannet' ),
		'search_items'       => __( 'Tìm kiếm sự kiện', 'tutannet' ),
		'parent_item_colon'  => __( 'Sự kiện chính:', 'tutannet' ),
		'not_found'          => __( 'không tìm thấy sự kiện.', 'tutannet' ),
		'not_found_in_trash' => __( 'Không tìm thấy sự kiện trong Thùng Rác.', 'tutannet' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Mô tả.', 'tutannet' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-star-filled',
		'register_meta_box_cb' => 'add_events_metaboxes',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'event', $args );
}


/*---------------Event Taxonomy Rest-------------------*/

function _add_event_api_arguments() {
	global $wp_taxonomies;

	if ( isset( $wp_taxonomies['event'] ) ) {
		$wp_taxonomies['event']->show_in_rest = true;
		$wp_taxonomies['event']->rest_base = 'event';
		$wp_taxonomies['event']->rest_controller_class = 'WP_REST_Terms_Controller';
	}
	
	global $wp_post_types;
	
	if ( isset( $wp_taxonomies['event'] ) ) {
		$wp_post_types['event']->show_in_rest = true;
		$wp_post_types['event']->rest_base = 'events';
		$wp_post_types['event']->rest_controller_class = 'WP_REST_Posts_Controller';
	}
}
add_action( 'init', '_add_event_api_arguments' );

function tutannet_rest_prepare_event( $data, $post, $request ) {
	$_data = $data->data;
	$thumbnail_id = get_post_thumbnail_id();
	$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'tutannet-block-medium-thumb' );
	$events = get_the_terms( $post->ID, 'event' );	
	
	if( has_term( '', 'event' ) ) {
	    $has_event = true;
	}
	
	if ( get_post_meta( $post->ID, '_location', true ) ) {
		$event_location = get_post_meta( $post->ID, '_location', true );
	}
	
	if ( get_post_meta( $post->ID, '_date', true ) ) {
		$event_date = get_post_meta( $post->ID, '_date', true );
	}
	
	if ( get_post_meta( $post->ID, '_hour', true ) ) {
		$event_hour = get_post_meta( $post->ID, '_hour', true );
	}
	
	if ( get_post_meta( $post->ID, '_end_date', true ) ) {
		$event_end_date = get_post_meta( $post->ID, '_end_date', true );
	}
	
	if ( get_post_meta( $post->ID, '_end_hour', true ) ) {
		$event_end_hour = get_post_meta( $post->ID, '_end_hour', true );
	}
	
	$_data['featured_image_thumbnail_url'] = $thumbnail[0];
	$_data['event_location'] = $event_location;
	$_data['event_date'] = $event_date;
	$_data['event_hour'] = $event_hour;
	$_data['event_end_date'] = $event_end_date;
	$_data['event_end_hour'] = $event_end_hour;	
	$_data['event_categories'] = $events;
	
	$data->data = $_data;
	return $data;
}
add_filter( 'rest_prepare_event', 'tutannet_rest_prepare_event', 10, 3 );


add_action( 'add_meta_boxes', 'add_event_metaboxes' );
function add_event_metaboxes() {
	add_meta_box(
		'event_info', 
		'Thông tin sự kiện', 
		'event_info', 
		'event', 
		'side', 
		'default');
}


// The Event Location Metabox

function event_info() {
	global $post;
	
	// Enqueue Datepicker + jQuery UI CSS
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'jquery-ui-datepicker-vi', get_template_directory_uri() . '/js/datepicker-vi.js', array('jquery-ui-datepicker') );
	wp_enqueue_style( 'jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);
		
	?>
	<script>
	jQuery(document).ready(function(){
	jQuery('.event_date').datepicker({
	dateFormat : 'dd/m - yy'
	});
	});
	</script>
	<?php
	
	wp_nonce_field( 'save_event_meta', 'eventmeta_noncename' );
	
	$location = get_post_meta($post->ID, '_location', true);
	$date = get_post_meta($post->ID, '_date', true);	
	$end_date = get_post_meta($post->ID, '_end_date', true);
	$hour = get_post_meta($post->ID, '_hour', true);	
	$end_hour = get_post_meta($post->ID, '_end_hour', true);
	
	// Echo out the field
	echo '<p><span class="dashicons dashicons-location" style="color: #82878C; margin-right: 5px;"></span><span>Địa điểm<span></p>';
	echo '<input type="text" name="location" value="' . $location  . '" class="widefat" />';
	echo '<br/><br/>';
		
	
	echo '<p><span class="dashicons dashicons-calendar-alt" style="color: #82878C;  margin-right: 5px;"></span><span>Ngày tổ chức</span></p>';
	echo '<input type="text" name="date" class="event_date" value="'. $date .'" />';
	echo '<br/>';
	
	echo '<p><span class="dashicons dashicons-clock" style="color: #82878C; margin-right: 5px;"></span><span>Thời gian tổ chức<span></p>';
	echo '<input type="text" name="hour" value="' . $hour  . '" />';
	echo '<br/><br/>';
	
	echo '<p><span class="dashicons dashicons-calendar-alt" style="color: #82878C;  margin-right: 5px;"></span><span>Ngày kết thúc</span></p>';
	echo '<input type="text" name="end_date" class="event_date" value="'. $end_date .'" />';
	echo '<br/>';
		
	echo '<p><span class="dashicons dashicons-clock" style="color: #82878C; margin-right: 5px;"></span><span>Thời gian kết thúc<span></p>';
	echo '<input type="text" name="end_hour" value="' . $end_hour  . '" />';
}


// Save the Metabox Data

function save_event_meta($post_id, $post) {
	
	if ( ! isset( $_POST['eventmeta_noncename'] ) ) {
		return;
	}
	
	if ( ! wp_verify_nonce( $_POST['eventmeta_noncename'], 'save_event_meta' ) ) {
		return;
	}
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	
	if ( ! isset( $_POST['location'] ) ) {
		return;
	}
	if ( ! isset( $_POST['date'] ) ) {
		return;
	}
	if ( ! isset( $_POST['end_date'] ) ) {
		return;
	}
	
	$location = sanitize_text_field($_POST['location']);
	$date = sanitize_text_field($_POST['date']);
	$end_date = sanitize_text_field($_POST['end_date']);
	$hour = sanitize_text_field($_POST['hour']);
	$end_hour = sanitize_text_field($_POST['end_hour']);
	
	update_post_meta( $post_id, '_location', $location );
	update_post_meta( $post_id, '_date', $date );
	update_post_meta( $post_id, '_end_date', $end_date );
	update_post_meta( $post_id, '_hour', $hour );
	update_post_meta( $post_id, '_end_hour', $end_hour );
}

add_action('save_post', 'save_event_meta'); // save the custom fields



?>