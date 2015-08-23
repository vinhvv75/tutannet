<?php

function wpmediacategory_update_count_callback( $terms = array(), $taxonomy = 'gallery' ) {
	global $wpdb;

	// default taxonomy
	$taxonomy = 'gallery';
	// add filter to change the default taxonomy
	$taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );

	// select id & count from taxonomy
	$query = "SELECT term_taxonomy_id, MAX(total) AS total FROM ((
	SELECT tt.term_taxonomy_id, COUNT(*) AS total FROM $wpdb->term_relationships tr, $wpdb->term_taxonomy tt WHERE tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = %s GROUP BY tt.term_taxonomy_id
	) UNION ALL (
	SELECT term_taxonomy_id, 0 AS total FROM $wpdb->term_taxonomy WHERE taxonomy = %s
	)) AS unioncount GROUP BY term_taxonomy_id";
	$rsCount = $wpdb->get_results( $wpdb->prepare( $query, $taxonomy, $taxonomy ) );
	// update all count values from taxonomy
	foreach ( $rsCount as $rowCount ) {
		$wpdb->update( $wpdb->term_taxonomy, array( 'count' => $rowCount->total ), array( 'term_taxonomy_id' => $rowCount->term_taxonomy_id ) );
	}
}


/** register taxonomy for attachments */
add_action( 'init', 'create_media_category_taxonomy' );

// create media category taxonomy"
function create_media_category_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	
	$taxonomy = apply_filters( 'wpmediacategory_taxonomy', 'gallery' );
	
	$labels = array(
		'name'              => _x( 'Bộ sưu tập', 'taxonomy general name' ),
		'singular_name'     => _x( 'Bộ sưu tập', 'taxonomy singular name' ),
		'search_items'      => __( 'Tìm bộ sưu tập' ),
		'all_items'         => __( 'Tất cả bộ sưu tập' ),
		'parent_item'       => __( 'Bộ sưu tập chính' ),
		'parent_item_colon' => __( 'Bộ sưu tập chính:' ),
		'edit_item'         => __( 'Chỉnh sửa bộ sưu tập' ),
		'update_item'       => __( 'Cập nhật bộ sưu tập' ),
		'add_new_item'      => __( 'Thêm bộ sưu tập mới' ),
		'new_item_name'     => __( 'Tên bộ sưu tập mới' ),
		'menu_name'         => __( 'Bộ sưu tập' ),
	);

	$args = array(
		'hierarchical'      => true,
		'public' 			=> true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery' ),
		'update_count_callback' => 'wpmediacategory_update_count_callback'
	);

	register_taxonomy( 'gallery', array( 'attachment' ), $args );
}


/** change default update_count_callback for category taxonomy */
function wpmediacategory_change_category_update_count_callback() {
	global $wp_taxonomies;

	// Default taxonomy
	$taxonomy = 'gallery';
	// Add filter to change the default taxonomy
	$taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );

	if ( $taxonomy == 'gallery' ) {
		if ( ! taxonomy_exists( 'gallery' ) )
			return false;

		$new_arg = &$wp_taxonomies['gallery']->update_count_callback;
		$new_arg = 'wpmediacategory_update_count_callback';
	}
}
add_action( 'init', 'wpmediacategory_change_category_update_count_callback', 100 );


// load code that is only needed in the admin section
if ( is_admin() ) {


	/** Custom walker for wp_dropdown_categories, based on https://gist.github.com/stephenh1988/2902509 */
	class wpmediacategory_walker_gallery_filter extends Walker_CategoryDropdown{

		function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
			$pad = str_repeat( '&nbsp;', $depth * 3 );
			$cat_name = apply_filters( 'list_cats', $category->name, $category );

			if( ! isset( $args['value'] ) ) {
				$args['value'] = ( $category->taxonomy != 'gallery' ? 'slug' : 'id' );
			}

			$value = ( $args['value']=='slug' ? $category->slug : $category->term_id );
			if ( 0 == $args['selected'] && isset( $_GET['category_media'] ) && '' != $_GET['category_media'] ) {
				$args['selected'] = $_GET['category_media'];
			}

			$output .= '<option class="level-' . $depth . '" value="' . $value . '"';
			if ( $value === (string) $args['selected'] ) {
				$output .= ' selected="selected"';
			}
			$output .= '>';
			$output .= $pad . $cat_name;
			if ( $args['show_count'] )
				$output .= '&nbsp;&nbsp;(' . $category->count . ')';

			$output .= "</option>\n";
		}

	}


	/** Add a gallery filter */
	function wpmediacategory_add_gallery_filter() {
		global $pagenow;
		if ( 'upload.php' == $pagenow ) {
			// Default taxonomy
			$taxonomy = 'gallery';
			// Add filter to change the default taxonomy
			$taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );
			$dropdown_options = array(
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'show_option_all' => __( 'Xem tất cả bộ sưu tập' ),
				'hide_empty'      => false,
				'hierarchical'    => true,
				'orderby'         => 'name',
				'show_count'      => true,
				'walker'          => new wpmediacategory_walker_gallery_filter(),
				'value'           => 'slug'
			);
			wp_dropdown_categories( $dropdown_options );
		}
	}
	add_action( 'restrict_manage_posts', 'wpmediacategory_add_gallery_filter' );


	/** Add custom Bulk Action to the select menus */
	function wpmediacategory_custom_bulk_admin_footer() {
		// default taxonomy
		$taxonomy = 'gallery';
		// add filter to change the default taxonomy
		$taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );
		$terms = get_terms( $taxonomy, 'hide_empty=0' );
		if ( $terms && ! is_wp_error( $terms ) ) :

			echo '<script type="text/javascript">';
			echo 'jQuery(window).load(function() {';
			echo 'jQuery(\'<optgroup id="wpmediacategory_optgroup1" label="' .  html_entity_decode( __( 'Categories' ), ENT_QUOTES, 'UTF-8' ) . '">\').appendTo("select[name=\'action\']");';
			echo 'jQuery(\'<optgroup id="wpmediacategory_optgroup2" label="' .  html_entity_decode( __( 'Categories' ), ENT_QUOTES, 'UTF-8' ) . '">\').appendTo("select[name=\'action2\']");';

			// add categories
			foreach ( $terms as $term ) {
				$sTxtAdd = esc_js( __( 'Add' ) . ': ' . $term->name );
				echo "jQuery('<option>').val('wpmediacategory_add_" . $term->term_taxonomy_id . "').text('" . $sTxtAdd . "').appendTo('#wpmediacategory_optgroup1');";
				echo "jQuery('<option>').val('wpmediacategory_add_" . $term->term_taxonomy_id . "').text('" . $sTxtAdd . "').appendTo('#wpmediacategory_optgroup2');";
			}
			// remove categories
			foreach ( $terms as $term ) {
				$sTxtRemove = esc_js( __( 'Remove' ) . ': ' . $term->name );
				echo "jQuery('<option>').val('wpmediacategory_remove_" . $term->term_taxonomy_id . "').text('" . $sTxtRemove . "').appendTo('#wpmediacategory_optgroup1');";
				echo "jQuery('<option>').val('wpmediacategory_remove_" . $term->term_taxonomy_id . "').text('" . $sTxtRemove . "').appendTo('#wpmediacategory_optgroup2');";
			}
			// remove all categories
			echo "jQuery('<option>').val('wpmediacategory_remove_0').text('" . esc_js(  __( 'Delete all' ) ) . "').appendTo('#wpmediacategory_optgroup1');";
			echo "jQuery('<option>').val('wpmediacategory_remove_0').text('" . esc_js(  __( 'Delete all' ) ) . "').appendTo('#wpmediacategory_optgroup2');";
			echo "});";
			echo "</script>";

		endif;
	}
	add_action( 'admin_footer-upload.php', 'wpmediacategory_custom_bulk_admin_footer' );


	/** Handle the custom Bulk Action */
	function wpmediacategory_custom_bulk_action() {
		global $wpdb;

		if ( ! isset( $_REQUEST['action'] ) ) {
			return;
		}

		// is it a category?
		$sAction = ( $_REQUEST['action'] != -1 ) ? $_REQUEST['action'] : $_REQUEST['action2'];
		if ( substr( $sAction, 0, 16 ) != 'wpmediacategory_' ) {
			return;
		}

		// security check
		check_admin_referer( 'bulk-media' );

		// make sure ids are submitted.  depending on the resource type, this may be 'media' or 'post'
		if( isset( $_REQUEST['media'] ) ) {
			$post_ids = array_map( 'intval', $_REQUEST['media'] );
		}

		if( empty( $post_ids ) ) {
			return;
		}

		$sendback = admin_url( "upload.php?editCategory=1" );

		// remember pagenumber
		$pagenum = isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 0;
		$sendback = esc_url( add_query_arg( 'paged', $pagenum, $sendback ) );

		// remember orderby
		if ( isset( $_REQUEST['orderby'] ) ) {
			$sOrderby = $_REQUEST['orderby'];
			$sendback = esc_url( add_query_arg( 'orderby', $sOrderby, $sendback ) );
		}
		// remember order
		if ( isset( $_REQUEST['order'] ) ) {
			$sOrder = $_REQUEST['order'];
			$sendback = esc_url( add_query_arg( 'order', $sOrder, $sendback ) );
		}
		// remember author
		if ( isset( $_REQUEST['author'] ) ) {
			$sOrderby = $_REQUEST['author'];
			$sendback = esc_url( add_query_arg( 'author', $sOrderby, $sendback ) );
		}

		foreach( $post_ids as $post_id ) {

			if ( is_numeric( str_replace( 'wpmediacategory_add_', '', $sAction ) ) ) {
				$nCategory = str_replace( 'wpmediacategory_add_', '', $sAction );

				// update or insert category
				$wpdb->replace( $wpdb->term_relationships,
					array(
						'object_id'        => $post_id,
						'term_taxonomy_id' => $nCategory
					),
					array(
						'%d',
						'%d'
					)
				);

			} else if ( is_numeric( str_replace( 'wpmediacategory_remove_', '', $sAction ) ) ) {
				$nCategory = str_replace( 'wpmediacategory_remove_', '', $sAction );

				// remove all categories
				if ( $nCategory == 0 ) {
					$wpdb->delete( $wpdb->term_relationships,
						array(
							'object_id' => $post_id
						),
						array(
							'%d'
						)
					);
				// remove category
				} else {
					$wpdb->delete( $wpdb->term_relationships,
						array(
							'object_id'        => $post_id,
							'term_taxonomy_id' => $nCategory
						),
						array(
							'%d',
							'%d'
						)
					);
				}

			}
		}

		wpmediacategory_update_count_callback();

		wp_redirect( $sendback );
		exit();
	}
	add_action( 'load-upload.php', 'wpmediacategory_custom_bulk_action' );


	/** Display an admin notice on the page after changing category */
	function wpmediacategory_custom_bulk_admin_notices() {
		global $post_type, $pagenow;

		if ( $pagenow == 'upload.php' && $post_type == 'attachment' && isset( $_GET['editCategory'] ) ) {
			echo '<div class="updated"><p>' . __( 'Settings saved.' ) . '</p></div>';
		}
	}
	add_action( 'admin_notices', 'wpmediacategory_custom_bulk_admin_notices' );


	/** Changing categories in the 'grid view' */
	function wpmediacategory_ajax_query_attachments() {

		if ( ! current_user_can( 'upload_files' ) ) {
			wp_send_json_error();
		}

		$taxonomies = get_object_taxonomies( 'attachment', 'names' );

		$query = isset( $_REQUEST['query'] ) ? (array) $_REQUEST['query'] : array();

		$defaults = array(
			's', 'order', 'orderby', 'posts_per_page', 'paged', 'post_mime_type',
			'post_parent', 'post__in', 'post__not_in'
		);
		$query = array_intersect_key( $query, array_flip( array_merge( $defaults, $taxonomies ) ) );

		$query['post_type'] = 'attachment';
		$query['post_status'] = 'inherit';
		if ( current_user_can( get_post_type_object( 'attachment' )->cap->read_private_posts ) )
			$query['post_status'] .= ',private';
			
		$query['tax_query'] = array( 'relation' => 'AND' );

		foreach ( $taxonomies as $taxonomy ) {				
			if ( isset( $query[$taxonomy] ) && is_numeric( $query[$taxonomy] ) ) {
				array_push( $query['tax_query'], array(
					'taxonomy' => $taxonomy,
					'field'    => 'id',
					'terms'    => $query[$taxonomy]
				));	
			}
			unset ( $query[$taxonomy] );
		}

		$query = apply_filters( 'ajax_query_attachments_args', $query );
		$query = new WP_Query( $query );

		$posts = array_map( 'wp_prepare_attachment_for_js', $query->posts );
		$posts = array_filter( $posts );

		wp_send_json_success( $posts );
	}
	add_action( 'wp_ajax_query-attachments', 'wpmediacategory_ajax_query_attachments', 0 );


	/** Custom walker for wp_dropdown_categories for media grid view filter */
	class wpmediacategory_walker_category_mediagridfilter extends Walker_CategoryDropdown {

		function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
			$pad = str_repeat( '&nbsp;', $depth * 3 );

			$cat_name = apply_filters( 'list_cats', $category->name, $category );

			// {"term_id":"1","term_name":"no category"}
			$output .= ',{"term_id":"' . $category->term_id . '",';

			$output .= '"term_name":"' . $pad . esc_attr( $cat_name );
			if ( $args['show_count'] ) {
				$output .= '&nbsp;&nbsp;('. $category->count .')';
			}
			$output .= '"}';
		}

	}


	/** Save categories from attachment details on insert media popup */
	function wpmediacategory_save_attachment_compat() {

		if ( ! isset( $_REQUEST['id'] ) ) {
			wp_send_json_error();
		}

		if ( ! $id = absint( $_REQUEST['id'] ) ) {
			wp_send_json_error();
		}

		if ( empty( $_REQUEST['attachments'] ) || empty( $_REQUEST['attachments'][ $id ] ) ) {
			wp_send_json_error();
		}
		$attachment_data = $_REQUEST['attachments'][ $id ];

		check_ajax_referer( 'update-post_' . $id, 'nonce' );

		if ( ! current_user_can( 'edit_post', $id ) ) {
			wp_send_json_error();
		}

		$post = get_post( $id, ARRAY_A );

		if ( 'attachment' != $post['post_type'] ) {
			wp_send_json_error();
		}

		/** This filter is documented in wp-admin/includes/media.php */
		$post = apply_filters( 'attachment_fields_to_save', $post, $attachment_data );

		if ( isset( $post['errors'] ) ) {
			$errors = $post['errors']; // @todo return me and display me!
			unset( $post['errors'] );
		}

		wp_update_post( $post );

		foreach ( get_attachment_taxonomies( $post ) as $taxonomy ) {		
			if ( isset( $attachment_data[ $taxonomy ] ) ) {
				wp_set_object_terms( $id, array_map( 'trim', preg_split( '/,+/', $attachment_data[ $taxonomy ] ) ), $taxonomy, false );
			} else if ( isset($_REQUEST['tax_input']) && isset( $_REQUEST['tax_input'][ $taxonomy ] ) ) {
				wp_set_object_terms( $id, $_REQUEST['tax_input'][ $taxonomy ], $taxonomy, false );
			} else {
				wp_set_object_terms( $id, '', $taxonomy, false );
			}
		}

		if ( ! $attachment = wp_prepare_attachment_for_js( $id ) ) {
			wp_send_json_error();
		}
		
		wp_send_json_success( $attachment );
	}
	add_action( 'wp_ajax_save-attachment-compat', 'wpmediacategory_save_attachment_compat', 0 );


	/** Add category checkboxes to attachment details on insert media popup */
	function wpmediacategory_attachment_fields_to_edit( $form_fields, $post ) {	
		
		foreach ( get_attachment_taxonomies( $post->ID ) as $taxonomy ) {
			$terms = get_object_term_cache( $post->ID, $taxonomy );
			
			$t = (array)get_taxonomy( $taxonomy );
			if ( ! $t['public'] || ! $t['show_ui'] ) {
				continue;
			}
			if ( empty($t['label']) ) {
				$t['label'] = $taxonomy;
			}
			if ( empty($t['args']) ) {
				$t['args'] = array();
			}
			
			if ( false === $terms ) {
				$terms = wp_get_object_terms($post->ID, $taxonomy, $t['args']);
			}
				
			$values = array();
		
			foreach ( $terms as $term ) {
				$values[] = $term->slug;
			}
				
			$t['value'] = join(', ', $values);
			$t['show_in_edit'] = false;
			
			if ( $t['hierarchical'] ) {
				ob_start();
				
					wp_terms_checklist( $post->ID, array( 'taxonomy' => $taxonomy, 'checked_ontop' => false, 'walker' => new wpmediacategory_walker_media_taxonomy_checklist() ) );
					
					if ( ob_get_contents() != false ) {
						$html = '<ul class="term-list">' . ob_get_contents() . '</ul>';
					} else {
						$html = '<ul class="term-list"><li>No ' . $t['label'] . '</li></ul>';
					}
				
				ob_end_clean();
				
				$t['input'] = 'html';
				$t['html'] = $html; 
			}
		
			$form_fields[$taxonomy] = $t;
		}

		return $form_fields;
	}
	add_filter( 'attachment_fields_to_edit', 'wpmediacategory_attachment_fields_to_edit', 10, 2 );


	/** Custom walker for wp_dropdown_categories for media grid view filter */
	class wpmediacategory_walker_media_taxonomy_checklist extends Walker {

		var $tree_type = 'gallery';
		var $db_fields = array(
			'parent' => 'parent',
			'id'     => 'term_id'
		); 

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "$indent<ul class='children'>\n";
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
		}

		function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
			extract( $args );
			
			// Default taxonomy
			$taxonomy = 'gallery';
			// Add filter to change the default taxonomy
			$taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );

			$name = 'tax_input[' . $taxonomy . ']';

			$class = in_array( $category->term_id, $popular_cats ) ? ' class="popular-category"' : '';
			$output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" . '<label class="selectit"><input value="' . $category->slug . '" type="checkbox" name="' . $name . '[' . $category->slug . ']" id="in-' . $taxonomy . '-' . $category->term_id . '"' . checked( in_array( $category->term_id, $selected_cats ), true, false ) . disabled( empty( $args['disabled'] ), false, false ) . ' /> ' . esc_html( apply_filters( 'the_category', $category->name ) ) . '</label>';
		}

		function end_el( &$output, $category, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}
	}

}
?>