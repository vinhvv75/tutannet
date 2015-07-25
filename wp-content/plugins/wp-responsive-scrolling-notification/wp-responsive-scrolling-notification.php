<?php
/*
Plugin Name: WP Responsive Scrolling Notification
Plugin URI: http://suoling.net/wp-responsive-scrolling-notification
Description: This plugin help you to add a Notification box when user scrolling the page, the notification support HTML and WordPress shortcode. So you can put any content in it, like a Youtube video or others.
Author: suifengtec
Version: 1.0
Author URI: http://suoling.net/
*/
defined('ABSPATH') or exit;

if ( ! function_exists( 'get_plugins' ) )
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );



add_action( 'init', 'wprsn_load_textdomain');
function wprsn_load_textdomain(){
    load_plugin_textdomain('wprsn', false, dirname( plugin_basename( __FILE__ ) ) . '/lang');
}


if (!class_exists('WP_R_S_N')){

class WP_R_S_N {
	function WP_R_S_N() {
        add_action( 'admin_init', array( &$this, 'admin_init' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'enqueue_admin_scripts' ) );
		add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
		add_action( 'wp_footer', array( &$this, 'add_notification' ) );
	}

	function admin_init() {
		register_setting( 'wprsn_options', 'wprsn_notify_content', 'trim');
		register_setting( 'wprsn_options', 'wprsn_setting');
	}
    function enqueue_admin_scripts(){
        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style('wprsn-admin-css', plugins_url('css/wprsn.admin.css', __FILE__));
        wp_enqueue_style('wprsn-css', plugins_url('css/wprsn.css', __FILE__));
        wp_enqueue_style('wprsn-admin-animate-css', plugins_url('css/animate.min.css', __FILE__));
        wp_enqueue_script('jquery-cookie', plugins_url('js/jquery.cookie.js', __FILE__), array('jquery'));
        wp_enqueue_script('wprsn-scroll-notify-js', plugins_url('js/jquery.wprsn.min.js', __FILE__), array('jquery'));


        wp_enqueue_script('modernizr-css3', plugins_url('js/modernizr.custom.wprsn.js', __FILE__), array("jquery"));
        wp_enqueue_script('wprsn-admin-js', plugins_url('js/wprsn.admin.js', __FILE__), array('jquery', 'wp-color-picker'));


    }
function wprsn_equeue_scripts(){
                wp_register_style('animate-css', plugins_url('css/animate.min.css', __FILE__));
                wp_enqueue_style('animate-css');
                wp_enqueue_style('wprsn-css', plugins_url('css/wprsn.css', __FILE__));
                wp_enqueue_script('modernizr-f-css3', plugins_url('js/modernizr.custom.wprsn.js', __FILE__), array("jquery"));
                wp_enqueue_script('jquery-cookie', plugins_url('js/jquery.cookie.js', __FILE__), array('jquery'));
                wp_enqueue_script('wprsn-scroll-notify-js', plugins_url('js/jquery.wprsn.min.js', __FILE__), array('jquery'));
                wp_enqueue_script('wprsn-js', plugins_url('js/wprsn.admin.js', __FILE__), array('jquery'));
}
	function admin_menu() {
        $wprsn_menu_text=__('Notification','wprsn');
		add_submenu_page( 'options-general.php', $wprsn_menu_text,
			$wprsn_menu_text, 'manage_options', 'wprsn-notify', array( &$this, 'options_panel' ) );
	}


	function add_notification() {
        $wprsn_setting = get_option('wprsn_setting');
        $wprsn_postid = $wprsn_setting["wprsn_postid"];
        if($wprsn_postid!=""){
            if(is_single($wprsn_postid)||is_page($wprsn_postid)){
                $this->wprsn_add_content();
            }
        }else if (!is_admin()&&!is_feed()&&!is_trackback() ) {
                $this->wprsn_add_content();
		}
	}



    function wprsn_add_content(){
        $wprsn_notify_content = get_option('wprsn_notify_content');
        $wprsn_setting = get_option('wprsn_setting');

        if($wprsn_setting){
            if($wprsn_setting["wprsn_alive"]=="on"){
                $this->wprsn_equeue_scripts();
                $output = '';
                if($wprsn_setting["wprsn_s_image"]!=""){    /*image exists*/
                    if($wprsn_setting["wprsn_s_imagelink"]!=""){/*image target url exists*/
                        $output.= '<div id="wprsn-notification" data-background="'.$wprsn_setting["wprsn_s_background"].'" data-opacity="'.$wprsn_setting["wprsn_s_opacity"].'" data-color="'.$wprsn_setting["wprsn_s_color"].'" data-width="'.$wprsn_setting["wprsn_s_width"].'" data-height="'.$wprsn_setting["wprsn_s_height"].'"  data-imagewidth="'.$wprsn_setting["wprsn_s_imagewidth"].'" data-imagefloat="'.$wprsn_setting["wprsn_s_float"].'" data-position="'.$wprsn_setting["wprsn_s_position"].'" data-positiontop="'.$wprsn_setting["wprsn_s_positiontop"].'" data-positionright="'.$wprsn_setting["wprsn_s_positionright"].'" data-positionbottom="'.$wprsn_setting["wprsn_s_positionbottom"].'" data-positionleft="'.$wprsn_setting["wprsn_s_positionleft"].'" data-from="'.$wprsn_setting["wprsn_s_from"].'" data-to="'.$wprsn_setting["wprsn_s_to"].'" data-easein="'.$wprsn_setting["wprsn_s_easein"].'" data-easeout="'.$wprsn_setting["wprsn_s_easeout"].'" data-autohidedelay="'.$wprsn_setting["wprsn_s_autohidedelay"].'" data-initshow="'.$wprsn_setting["wprsn_s_initshow"].'" data-cookie="'.$wprsn_setting["wprsn_s_closecookie"].'" data-days="'.$wprsn_setting["wprsn_s_days"].'" data-closebutton="'.$wprsn_setting["wprsn_s_closebutton"].'" class="wprsn-notification"><a href="'.$wprsn_setting["wprsn_s_imagelink"].'"><img src="'.$wprsn_setting["wprsn_s_image"].'" class="wprsn-image" alt="'.$wprsn_setting["wprsn_s_imagetitle"].'" title="'.$wprsn_setting["wprsn_s_imagetitle"].'" /></a>'.do_shortcode($wprsn_notify_content).'</div>';
                    }else{/*image without url*/
                        $output.= '<div id="wprsn-notification" data-background="'.$wprsn_setting["wprsn_s_background"].'" data-opacity="'.$wprsn_setting["wprsn_s_opacity"].'" data-color="'.$wprsn_setting["wprsn_s_color"].'" data-width="'.$wprsn_setting["wprsn_s_width"].'" data-height="'.$wprsn_setting["wprsn_s_height"].'"  data-imagewidth="'.$wprsn_setting["wprsn_s_imagewidth"].'" data-imagefloat="'.$wprsn_setting["wprsn_s_float"].'" data-position="'.$wprsn_setting["wprsn_s_position"].'" data-positiontop="'.$wprsn_setting["wprsn_s_positiontop"].'" data-positionright="'.$wprsn_setting["wprsn_s_positionright"].'" data-positionbottom="'.$wprsn_setting["wprsn_s_positionbottom"].'" data-positionleft="'.$wprsn_setting["wprsn_s_positionleft"].'" data-from="'.$wprsn_setting["wprsn_s_from"].'" data-to="'.$wprsn_setting["wprsn_s_to"].'" data-easein="'.$wprsn_setting["wprsn_s_easein"].'" data-easeout="'.$wprsn_setting["wprsn_s_easeout"].'" data-autohidedelay="'.$wprsn_setting["wprsn_s_autohidedelay"].'" data-initshow="'.$wprsn_setting["wprsn_s_initshow"].'" data-cookie="'.$wprsn_setting["wprsn_s_closecookie"].'" data-days="'.$wprsn_setting["wprsn_s_days"].'" data-closebutton="'.$wprsn_setting["wprsn_s_closebutton"].'" class="wprsn-notification"><img src="'.$wprsn_setting["wprsn_s_image"].'" class="wprsn-image" alt="'.$wprsn_setting["wprsn_s_imagetitle"].'" title="'.$wprsn_setting["wprsn_s_imagetitle"].'" />'.do_shortcode($wprsn_notify_content).'</div>';
                    }
                }else{/*without image*/
                        $output.= '<div id="wprsn-notification" data-background="'.$wprsn_setting["wprsn_s_background"].'" data-opacity="'.$wprsn_setting["wprsn_s_opacity"].'" data-color="'.$wprsn_setting["wprsn_s_color"].'" data-width="'.$wprsn_setting["wprsn_s_width"].'" data-height="'.$wprsn_setting["wprsn_s_height"].'"  data-imagewidth="'.$wprsn_setting["wprsn_s_imagewidth"].'" data-imagefloat="'.$wprsn_setting["wprsn_s_float"].'" data-position="'.$wprsn_setting["wprsn_s_position"].'" data-positiontop="'.$wprsn_setting["wprsn_s_positiontop"].'" data-positionright="'.$wprsn_setting["wprsn_s_positionright"].'" data-positionbottom="'.$wprsn_setting["wprsn_s_positionbottom"].'" data-positionleft="'.$wprsn_setting["wprsn_s_positionleft"].'" data-from="'.$wprsn_setting["wprsn_s_from"].'" data-to="'.$wprsn_setting["wprsn_s_to"].'" data-easein="'.$wprsn_setting["wprsn_s_easein"].'" data-easeout="'.$wprsn_setting["wprsn_s_easeout"].'" data-autohidedelay="'.$wprsn_setting["wprsn_s_autohidedelay"].'" data-initshow="'.$wprsn_setting["wprsn_s_initshow"].'" data-cookie="'.$wprsn_setting["wprsn_s_closecookie"].'" data-days="'.$wprsn_setting["wprsn_s_days"].'" data-closebutton="'.$wprsn_setting["wprsn_s_closebutton"].'" class="wprsn-notification">'.do_shortcode($wprsn_notify_content).'</div>';
                }
                echo $output;

            }
        }
    }

	function options_panel() {
		$wprsn_position_arr = array(
            array(
                'text' => 'topLeft',
                'value' => 'topLeft'
            ),
            array(
                'text' => 'topRight',
                'value' => 'topRight'
            ),
            array(
                'text' => 'bottomLeft',
                'value' => 'bottomLeft'
            ),
            array(
                'text' => 'bottomRight',
                'value' => 'bottomRight'
            ),
            array(
                'text' => 'topAll',
                'value' => 'topAll'
            ),
            array(
                'text' => 'bottomAll',
                'value' => 'bottomAll'
            )
        );
		$wprsn_easein_arr = array(
            array(
                'text' => 'random',
                'value' => 'random'
            ),
            array(
                'text' => 'fadeIn',
                'value' => 'fadeIn'
            ),
            array(
                'text' => 'wobble',
                'value' => 'wobble'
            ),
            array(
                'text' => 'tada',
                'value' => 'tada'
            ),
            array(
                'text' => 'shake',
                'value' => 'shake'
            ),
            array(
                'text' => 'swing',
                'value' => 'swing'
            ),
            array(
                'text' => 'pulse',
                'value' => 'pulse'
            ),
            array(
                'text' => 'fadeInLeft',
                'value' => 'fadeInLeft'
            ),
            array(
                'text' => 'fadeInRight',
                'value' => 'fadeInRight'
            ),
            array(
                'text' => 'fadeInUp',
                'value' => 'fadeInUp'
            ),
            array(
                'text' => 'fadeInDown',
                'value' => 'fadeInDown'
            ),
             array(
                'text' => 'fadeInLeftBig',
                'value' => 'fadeInLeftBig'
            ),
            array(
                'text' => 'fadeInRightBig',
                'value' => 'fadeInRightBig'
            ),
            array(
                'text' => 'fadeInUpBig',
                'value' => 'fadeInUpBig'
            ),
            array(
                'text' => 'fadeInDownBig',
                'value' => 'fadeInDownBig'
            ),
             array(
                'text' => 'bounceInLeft',
                'value' => 'bounceInLeft'
            ),
            array(
                'text' => 'bounceInRight',
                'value' => 'bounceInRight'
            ),
            array(
                'text' => 'bounce',
                'value' => 'bounce'
            ),
            array(
                'text' => 'bounceInUp',
                'value' => 'bounceInUp'
            ),
            array(
                'text' => 'bounceInDown',
                'value' => 'bounceInDown'
            ),
            array(
                'text' => 'rollIn',
                'value' => 'rollIn'
            ),
            array(
                'text' => 'rotateIn',
                'value' => 'rotateIn'
            ),
            array(
                'text' => 'rotateInDownLeft',
                'value' => 'rotateInDownLeft'
            ),
            array(
                'text' => 'rotateInDownRight',
                'value' => 'rotateInDownRight'
            ),
            array(
                'text' => 'rotateInUpLeft',
                'value' => 'rotateInUpLeft'
            ),
            array(
                'text' => 'rotateInUpRight',
                'value' => 'rotateInUpRight'
            ),
            array(
                'text' => 'flipInX',
                'value' => 'flipInX'
            ),
            array(
                'text' => 'flipInY',
                'value' => 'flipInY'
            ),
            array(
                'text' => 'lightSpeedIn',
                'value' => 'lightSpeedIn'
            )
        );
		$wprsn_easeout_arr = array(
            array(
                'text' => 'random',
                'value' => 'random'
            ),
            array(
                'text' => 'fadeOut',
                'value' => 'fadeOut'
            ),
            array(
                'text' => 'fadeOutLeft',
                'value' => 'fadeOutLeft'
            ),
            array(
                'text' => 'fadeOutRight',
                'value' => 'fadeOutRight'
            ),
            array(
                'text' => 'fadeOutUp',
                'value' => 'fadeOutUp'
            ),
            array(
                'text' => 'fadeOutDown',
                'value' => 'fadeOutDown'
            ),
             array(
                'text' => 'fadeOutLeftBig',
                'value' => 'fadeOutLeftBig'
            ),
            array(
                'text' => 'fadeOutRightBig',
                'value' => 'fadeOutRightBig'
            ),
            array(
                'text' => 'fadeOutUpBig',
                'value' => 'fadeOutUpBig'
            ),
            array(
                'text' => 'fadeOutDownBig',
                'value' => 'fadeOutDownBig'
            ),
             array(
                'text' => 'bounceOutLeft',
                'value' => 'bounceOutLeft'
            ),
            array(
                'text' => 'bounceOutRight',
                'value' => 'bounceOutRight'
            ),
            array(
                'text' => 'bounceOutUp',
                'value' => 'bounceOutUp'
            ),
            array(
                'text' => 'bounceOutDown',
                'value' => 'bounceOutDown'
            ),
            array(
                'text' => 'rollOut',
                'value' => 'rollOut'
            ),
            array(
                'text' => 'rotateOut',
                'value' => 'rotateOut'
            ),
            array(
                'text' => 'rotateOutDownLeft',
                'value' => 'rotateOutDownLeft'
            ),
            array(
                'text' => 'rotateOutDownRight',
                'value' => 'rotateOutDownRight'
            ),
            array(
                'text' => 'rotateOutUpLeft',
                'value' => 'rotateOutUpLeft'
            ),
            array(
                'text' => 'rotateOutUpRight',
                'value' => 'rotateOutUpRight'
            ),
            array(
                'text' => 'flipOutX',
                'value' => 'flipOutX'
            ),
            array(
                'text' => 'flipOutY',
                'value' => 'flipOutY'
            ),
            array(
                'text' => 'lightSpeedOut',
                'value' => 'lightSpeedOut'
            )
        );

		$wprsn_notify_content = get_option('wprsn_notify_content');
        $wprsn_setting = get_option('wprsn_setting');
        ?>
	<div class="wrap wprsn-admin">
				<h2><?php _e('Notification Options','wprsn'); ?></h2>
				<form name="dofollow" action="options.php" method="post" id="notify-form">
                <div class="wprsn-form-content">
                    <h4 class="wprsn-admin-title"><?php _e('Notification Image (optional):','wprsn'); ?></h4>
                    <input type="text" class="wprsn-image-input" name="wprsn_setting[wprsn_s_image]" data-name="wprsn_setting[wprsn_s_image]" value="<?php echo $wprsn_setting["wprsn_s_image"] ?>" /> <a class="button" id="upload_notify_image" href="#"> <?php _e('Upload Image','wprsn'); ?></a><br />
                    <?php _e('image width:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_imagewidth]" data-name="wprsn_setting[wprsn_s_imagewidth]" value="<?php echo $wprsn_setting["wprsn_s_imagewidth"] ?>" />
                    <?php _e('image title:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_imagetitle]" data-name="wprsn_setting[wprsn_s_imagetitle]" value="<?php echo $wprsn_setting["wprsn_s_imagetitle"]; ?>" />
                    <?php _e('image float:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_float]" data-name="wprsn_setting[wprsn_s_float]" value="<?php echo $wprsn_setting["wprsn_s_float"]; ?>" />
                    <?php _e('image link to:','wprsn'); ?><input type="text" class="biggest-text widefat" name="wprsn_setting[wprsn_s_imagelink]" data-name="wprsn_setting[wprsn_s_imagelink]" value="<?php echo $wprsn_setting["wprsn_s_imagelink"]; ?>" />

                    <h4 class="wprsn-admin-title"><?php _e('Notification Text (optional):','wprsn'); ?></h4>
                    <textarea type="textarea" cols="60" rows="3" id="wprsn-content" class="wprsn-content" autocomplete="off" name="wprsn_notify_content" data-name="wprsn_notify_content" value=""><?php echo $wprsn_notify_content; ?></textarea><br />

                    <h4 class="wprsn-admin-title"><?php _e('Global setting:','wprsn'); ?></h4>

                <?php settings_fields('wprsn_options');
		if($wprsn_setting){ ?>

                    <?php _e('opacity(0.1-1):','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_opacity]" data-name="wprsn_setting[wprsn_s_opacity]" value="<?php echo $wprsn_setting["wprsn_s_opacity"]; ?>" />
                    <?php _e('background:','wprsn'); ?><input type="text" class="wprsn-color-picker tiny-text widefat" name="wprsn_setting[wprsn_s_background]" data-name="wprsn_setting[wprsn_s_background]" value="<?php echo $wprsn_setting["wprsn_s_background"]; ?>" />
                    <?php _e('font color:','wprsn'); ?><input type="text" class="wprsn-color-picker tiny-text widefat" name="wprsn_setting[wprsn_s_color]" data-name="wprsn_setting[wprsn_s_color]" value="<?php echo $wprsn_setting["wprsn_s_color"]; ?>" />
                    <?php _e('width:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_width]" data-name="wprsn_setting[wprsn_s_width]" value="<?php echo $wprsn_setting["wprsn_s_width"]; ?>" />
                    <?php _e('height:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_height]" data-name="wprsn_setting[wprsn_s_height]" value="<?php echo $wprsn_setting["wprsn_s_height"]; ?>" />

                    <?php _e('position top:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positiontop]" data-name="wprsn_setting[wprsn_s_positiontop]" value="<?php echo $wprsn_setting["wprsn_s_positiontop"]; ?>" />
                    <?php _e('position right:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positionright]" data-name="wprsn_setting[wprsn_s_positionright]" value="<?php echo  $wprsn_setting["wprsn_s_positionright"]?>" />
                   <?php _e('position bottom:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positionbottom]" data-name="wprsn_setting[wprsn_s_positionbottom]" value="<?php echo  $wprsn_setting["wprsn_s_positionbottom"]?>" />
                    <?php _e('position left:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positionleft]" data-name="wprsn_setting[wprsn_s_positionleft]" value="<?php echo  $wprsn_setting["wprsn_s_positionleft"]?>" />



                   <?php _e('Appear from (scrollTop):','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_from]" data-name="wprsn_setting[wprsn_s_from]" value="<?php echo  $wprsn_setting["wprsn_s_from"]?>" />
                    to:<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_to]" data-name="wprsn_setting[wprsn_s_to]" value="<?php echo  $wprsn_setting["wprsn_s_to"]?>" />
                    <?php _e('Animation ease in:','wprsn'); ?>
                    <select name="wprsn_setting[wprsn_s_easein]" data-name="wprsn_setting[wprsn_s_easein]">

                    <?php for( $i=0; $i<count($wprsn_easein_arr); $i++ ) {
	                	$wprsn_easein = '<option '. ( $wprsn_setting["wprsn_s_easein"] == $wprsn_easein_arr[$i]['value'] ? 'selected="selected"' : '' ) . '>'. $wprsn_easein_arr[$i]['text']. '</option>';
                             echo $wprsn_easein;
                    } ?>
                    </select>

                     <?php _e('ease out:','wprsn'); ?><select name="wprsn_setting[wprsn_s_easeout]" data-name="wprsn_setting[wprsn_s_easeout]">
                    <?php
                	for( $i=0; $i<count($wprsn_easeout_arr); $i++ ) {
	                	$gwedtgdsrwe = '<option '
                             . ( $wprsn_setting["wprsn_s_easeout"] == $wprsn_easeout_arr[$i]['value'] ? 'selected="selected"' : '' ) . '>'
                             . $wprsn_easeout_arr[$i]['text']
                             . '</option>';
                             echo $gwedtgdsrwe;
                    }
                ?>
                </select>
                    <?php _e('autohide delay:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_autohidedelay]" data-name="wprsn_setting[wprsn_s_autohidedelay]" value="<?php  echo $wprsn_setting["wprsn_s_autohidedelay"]; ?>" />
                    <br>
                    <?php _e('post/page ID:','wprsn'); ?><input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_postid]" data-name="wprsn_setting[wprsn_postid]" value="<?php  echo $wprsn_setting["wprsn_postid"]; ?>" />
                    <br /><span class="wprsn-check-label"> <?php _e('make the notification visible when page loaded.','wprsn'); ?></span> <input class="wprsn-checkbox" name="wprsn_setting[wprsn_s_initshow]" type="checkbox"<?php  echo checked('on', $wprsn_setting["wprsn_s_initshow"], false); ?>/>
                   <br /><span class="wprsn-check-label"><?php _e('Display close button?','wprsn'); ?></span> <input class="wprsn-checkbox" name="wprsn_setting[wprsn_s_closebutton]" type="checkbox"<?php  echo checked('on', $wprsn_setting["wprsn_s_closebutton"], false); ?>/>
                    <span class="wprsn-check-label"><?php _e('After close, store it in cookie?','wprsn'); ?></span> <input class="wprsn-checkbox" name="wprsn_setting[wprsn_s_closecookie]" type="checkbox"<?php  echo checked('on', $wprsn_setting["wprsn_s_closecookie"], false); ?>/>
                    <?php _e('Do not show it again after:','wprsn'); ?><input name="wprsn_setting[wprsn_s_days]" class="tiny-text" type="text" value="<?php  echo $wprsn_setting["wprsn_s_days"]; ?>" /><?php _e('days','wprsn'); ?>
                   <br /><span class="wprsn-check-label"><?php _e('Displays in frontend now?','wprsn'); ?></span> <input class="wprsn-checkbox" name="wprsn_setting[wprsn_alive]" type="checkbox"<?php  echo checked('on', $wprsn_setting["wprsn_alive"], false); ?>/></div>


            <?php }else{ ?>



                    background:<input type="text" class="wprsn-color-picker tiny-text widefat" name="wprsn_setting[wprsn_s_background]" data-default-color="#8f3baa"  data-name="wprsn_setting[wprsn_s_background]" value="#8f3baa" />
                    font color:<input type="text" class="wprsn-color-picker tiny-text widefat" name="wprsn_setting[wprsn_s_color]" data-default-color="#ffffff" data-name="wprsn_setting[wprsn_s_color]" value="#ffffff" />
                    width:<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_width]" data-name="wprsn_setting[wprsn_s_width]" value="auto" />
                    height:<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_height]" data-name="wprsn_setting[wprsn_s_height]" value="auto" />
                    position top: <input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positiontop]" data-name="wprsn_setting[wprsn_s_positiontop]" value="" />
                    position right: <input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positionright]" data-name="wprsn_setting[wprsn_s_positionright]" value="12" />
                    position bottom: <input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positionbottom]" data-name="wprsn_setting[wprsn_s_positionbottom]" value="12" />
                    position left: <input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_positionleft]" data-name="wprsn_setting[wprsn_s_positionleft]" value="" />
                    Appear from (scrollTop):<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_from]" data-name="wprsn_setting[wprsn_s_from]" value="1" />
                    to:<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_to]" data-name="wprsn_setting[wprsn_s_to]" value="all" />
                    Animation ease in:<select name="wprsn_setting[wprsn_s_easein]" data-name="wprsn_setting[wprsn_s_easein]">
                    <?php
 					for( $i=0; $i<count($wprsn_easein_arr); $i++ ) {
	                	$output .= '<option '
                             . ( $wprsn_setting["wprsn_s_easein"] == $wprsn_easein_arr[$i]['value'] ? 'selected="selected"' : '' ) . '>'
                             . $wprsn_easein_arr[$i]['text']
                             . '</option>';
                    }?>
                    </select>
                    ease out:<select name="wprsn_setting[wprsn_s_easeout]" data-name="wprsn_setting[wprsn_s_easeout]">
                    <?php
                    for( $i=0; $i<count($wprsn_easeout_arr); $i++ ) {
	                	$wprsn_easyout = '<option '
                             . ( $wprsn_setting["wprsn_s_easeout"] == $wprsn_easeout_arr[$i]['value'] ? 'selected="selected"' : '' ) . '>'
                             . $wprsn_easeout_arr[$i]['text']
                             . '</option>';
                             echo $wprsn_easyout;
                    }
                  ?></select>
                    autohide delay:<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_s_autohidedelay]" data-name="wprsn_setting[wprsn_s_autohidedelay]" value="4000" />
                    post/page ID:<input type="text" class="tiny-text widefat" name="wprsn_setting[wprsn_postid]" data-name="wprsn_setting[wprsn_postid]" value="" />
                    <br />When page loaded, make the notification visible? <input class="wprsn-checkbox" name="wprsn_setting[wprsn_s_initshow]" type="checkbox"/>
                    <br />Display close button? <input class="wprsn-checkbox" name="wprsn_setting[wprsn_s_closebutton]" type="checkbox" checked="checked" />
                    After close, store it in cookie? <input class="wprsn-checkbox" name="wprsn_setting[wprsn_s_closecookie]" type="checkbox" />
                    Do not show it again for: <input name="wprsn_setting[wprsn_s_days]" class="tiny-text" type="text" value="30" /> days
                    <br />Make it alive in frontend now? <input class="wprsn-checkbox" name="wprsn_setting[wprsn_alive]" type="checkbox" checked="checked" />
                    </div>
				<?php
		}
		?>
        <br /><input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes'); ?>" /> <?php _e('(preview available after save)','wprsn'); ?>
				</form>
		<?php
		if($wprsn_setting){
			if($wprsn_setting["wprsn_s_image"]!=""){
				if($wprsn_setting["wprsn_s_imagelink"]!=""){
					$output.= '<div id="wprsn-notification" data-background="'.$wprsn_setting["wprsn_s_background"].'" data-opacity="'.$wprsn_setting["wprsn_s_opacity"].'" data-color="'.$wprsn_setting["wprsn_s_color"].'" data-width="'.$wprsn_setting["wprsn_s_width"].'" data-height="'.$wprsn_setting["wprsn_s_height"].'"  data-imagewidth="'.$wprsn_setting["wprsn_s_imagewidth"].'" data-imagefloat="'.$wprsn_setting["wprsn_s_float"].'" data-position="'.$wprsn_setting["wprsn_s_position"].'" data-positiontop="'.$wprsn_setting["wprsn_s_positiontop"].'" data-positionright="'.$wprsn_setting["wprsn_s_positionright"].'" data-positionbottom="'.$wprsn_setting["wprsn_s_positionbottom"].'" data-positionleft="'.$wprsn_setting["wprsn_s_positionleft"].'" data-from="'.$wprsn_setting["wprsn_s_from"].'" data-to="'.$wprsn_setting["wprsn_s_to"].'" data-easein="'.$wprsn_setting["wprsn_s_easein"].'" data-easeout="'.$wprsn_setting["wprsn_s_easeout"].'" data-autohidedelay="'.$wprsn_setting["wprsn_s_autohidedelay"].'" data-initshow="'.$wprsn_setting["wprsn_s_initshow"].'" data-cookie="off" data-days="'.$wprsn_setting["wprsn_s_days"].'" data-closebutton="'.$wprsn_setting["wprsn_s_closebutton"].'" class="wprsn-notification"><a href="'.$wprsn_setting["wprsn_s_imagelink"].'"><img src="'.$wprsn_setting["wprsn_s_image"].'" class="wprsn-image" alt="'.$wprsn_setting["wprsn_s_imagetitle"].'" title="'.$wprsn_setting["wprsn_s_imagetitle"].'" /></a>'.do_shortcode($wprsn_notify_content).'</div>';
				}else{
					$output.= '<div id="wprsn-notification" data-background="'.$wprsn_setting["wprsn_s_background"].'" data-opacity="'.$wprsn_setting["wprsn_s_opacity"].'" data-color="'.$wprsn_setting["wprsn_s_color"].'" data-width="'.$wprsn_setting["wprsn_s_width"].'" data-height="'.$wprsn_setting["wprsn_s_height"].'"  data-imagewidth="'.$wprsn_setting["wprsn_s_imagewidth"].'" data-imagefloat="'.$wprsn_setting["wprsn_s_float"].'" data-position="'.$wprsn_setting["wprsn_s_position"].'" data-positiontop="'.$wprsn_setting["wprsn_s_positiontop"].'" data-positionright="'.$wprsn_setting["wprsn_s_positionright"].'" data-positionbottom="'.$wprsn_setting["wprsn_s_positionbottom"].'" data-positionleft="'.$wprsn_setting["wprsn_s_positionleft"].'" data-from="'.$wprsn_setting["wprsn_s_from"].'" data-to="'.$wprsn_setting["wprsn_s_to"].'" data-easein="'.$wprsn_setting["wprsn_s_easein"].'" data-easeout="'.$wprsn_setting["wprsn_s_easeout"].'" data-autohidedelay="'.$wprsn_setting["wprsn_s_autohidedelay"].'" data-initshow="'.$wprsn_setting["wprsn_s_initshow"].'" data-cookie="off" data-days="'.$wprsn_setting["wprsn_s_days"].'" data-closebutton="'.$wprsn_setting["wprsn_s_closebutton"].'" class="wprsn-notification"><img src="'.$wprsn_setting["wprsn_s_image"].'" class="wprsn-image" alt="'.$wprsn_setting["wprsn_s_imagetitle"].'" title="'.$wprsn_setting["wprsn_s_imagetitle"].'" />'.do_shortcode($wprsn_notify_content).'</div>';
				}
			}else{
					$output.= '<div id="wprsn-notification" data-background="'.$wprsn_setting["wprsn_s_background"].'" data-opacity="'.$wprsn_setting["wprsn_s_opacity"].'" data-color="'.$wprsn_setting["wprsn_s_color"].'" data-width="'.$wprsn_setting["wprsn_s_width"].'" data-height="'.$wprsn_setting["wprsn_s_height"].'"  data-imagewidth="'.$wprsn_setting["wprsn_s_imagewidth"].'" data-imagefloat="'.$wprsn_setting["wprsn_s_float"].'" data-position="'.$wprsn_setting["wprsn_s_position"].'" data-positiontop="'.$wprsn_setting["wprsn_s_positiontop"].'" data-positionright="'.$wprsn_setting["wprsn_s_positionright"].'" data-positionbottom="'.$wprsn_setting["wprsn_s_positionbottom"].'" data-positionleft="'.$wprsn_setting["wprsn_s_positionleft"].'" data-from="'.$wprsn_setting["wprsn_s_from"].'" data-to="'.$wprsn_setting["wprsn_s_to"].'" data-easein="'.$wprsn_setting["wprsn_s_easein"].'" data-easeout="'.$wprsn_setting["wprsn_s_easeout"].'" data-autohidedelay="'.$wprsn_setting["wprsn_s_autohidedelay"].'" data-initshow="'.$wprsn_setting["wprsn_s_initshow"].'" data-cookie="off" data-days="'.$wprsn_setting["wprsn_s_days"].'" data-closebutton="'.$wprsn_setting["wprsn_s_closebutton"].'" class="wprsn-notification">'.do_shortcode($wprsn_notify_content).'</div>';
			}
		}
		echo $output;
	}
}

    add_option( 'wprsn_notify_content', '');
	add_option( 'wprsn_setting', '');

	$cq_scroll_notify = new WP_R_S_N();
}
