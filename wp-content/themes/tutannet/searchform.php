<?php
/**
 * The template for search form.
 *
 * @package TuTanNet
 */
?>

<div class="search-icon">
    <i class="fa fa-search"></i>
    <div class="ak-search">
        <div class="close">&times;</div>
     <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
        <label>
            <span class="screen-reader-text"><?php _e( 'Search for:', 'tutannet' ) ?></span>
            <input type="search" title="<?php esc_attr_e( 'Search for:', 'tutannet' ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search content...', 'tutannet' );?>" class="search-field" />
        </label>
        <input type="submit" value="<?php esc_attr_e( 'Search', 'tutannet' ); ?>" class="search-submit" />
     </form>
     <div class="overlay-search"> </div> 
    </div>
</div> 
