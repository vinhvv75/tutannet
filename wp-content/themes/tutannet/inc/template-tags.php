<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package TuTanNet
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation clearfix" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'tutannet' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'tutannet' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'tutannet' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'tutannet_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function tutannet_post_navigation() {
    $trans_next = of_get_option( 'trans_next_article' );
    if( empty( $trans_next ) ){ $trans_next = __( 'Next article', 'tutannet' ); }
    $trans_prev = of_get_option( 'trans_previous_article' );
    if( empty( $trans_prev ) ){ $trans_prev = __( 'Previous article', 'tutannet' ) ; }
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'tutannet' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><div class="link-caption"><i class="fa fa-angle-left"></i>'.esc_attr( $trans_prev ).'</div>%link</div>', '%title' );
				next_post_link( '<div class="nav-next"><div class="link-caption">'.esc_attr( $trans_next ).'<i class="fa fa-angle-right"></i></div>%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'tutannet_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tutannet_posted_on() {
    $show_post_date = of_get_option('post_show_date');
    $show_author = of_get_option('show_author_name');
    
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    if($show_post_date==1){
	  $posted_on = sprintf(
    		_x( '%s', 'post date', 'tutannet' ),$time_string
    		
            //'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    	);	   
	} else {
        $posted_on = '';
    }
    
    
    if($show_author==1){
        $byline = sprintf(
    		_x( 'by %s', 'post author', 'tutannet' ),
    		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    	);
    } else {
        $byline='';
    }	

	echo '<span class="byline"> ' . $byline . ' - </span><span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'tutannet_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tutannet_entry_footer() {
    /*
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'tutannet' ), __( '1 Comment', 'tutannet' ), __( '% Comments', 'tutannet' ) );
		echo '</span>';
	}
    */    
    if('post'==get_post_type() && !is_tag() ){
        $trans_tagged = of_get_option( 'trans_tagged' );
        $tutannet_show_tags = of_get_option('show_tags_post');
         if($tutannet_show_tags!='0'){
            /* translators: used between list items, there is a space after the comma */
    		$tags_list = get_the_tag_list( '', __( ' ', 'tutannet' ) );
    		if ( $tags_list ) {
    		  if( empty( $trans_tagged ) ){
    		      printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'tutannet' ) . '</span>', $tags_list );
    		  } else {
    		      printf( '<span class="tags-links">' .esc_attr( $trans_tagged ).' %1$s </span>', $tags_list );
    		  }
    		}
        }
    }

	edit_post_link( __( 'Edit', 'tutannet' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'tutannet_the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function tutannet_the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( '%s', 'tutannet' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'tutannet' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'tutannet' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'tutannet' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tutannet' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'tutannet' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tutannet' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'tutannet' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'tutannet' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'tutannet' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'tutannet' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'tutannet' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'tutannet' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'tutannet' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tutannet_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'tutannet_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'tutannet_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so tutannet_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tutannet_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in tutannet_categorized_blog.
 */
function tutannet_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tutannet_categories' );
}
add_action( 'edit_category', 'tutannet_category_transient_flusher' );
add_action( 'save_post',     'tutannet_category_transient_flusher' );
