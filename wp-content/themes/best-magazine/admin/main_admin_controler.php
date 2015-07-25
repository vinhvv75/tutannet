<?php 
global $best_magazine_options;

/* if set true show web-dorado logo in admin panel if false don't show */
$best_magazine_show_logo=true; 

$best_magazine_web_dor='http://web-dorado.com';

/* initial menu */
add_action('admin_menu','best_magazine_theme_admin_menu');

/* include functions_class */
require_once( 'includes/class_functions_for_admin.php' );

/* include meta */
require_once('includes/meta/meta-functions.php');

/* include layout page class */
require_once( 'layout_page.php' );

/* include General Settings page class */
require_once( 'general_settings_page.php' );

/* include Home page class */
require_once( 'home_page.php' );

/* include Integration page class */
require_once( 'color_control.php' );

/* include Integration page class */
require_once( 'typography_page.php' );

/* include Integration page class */
require_once( 'slider_page.php' );

/* include widgets */
require_once( 'widgets/widgets.php' );

/* include Licensing */
require_once( 'licensing.php' );

/* set classes objects */
	$best_magazine_admin_helepr_functions = new best_magazine_admin_helper_class();

	$best_magazine_layout_page = new best_magazine_layout_page_class();

	$best_magazine_general_settings_page = new best_magazine_general_settings_page_class();

	$best_magazine_home_page = new best_magazine_home_page_class();

	$best_magazine_color_control_page = new best_magazine_color_control_page_class();

	$best_magazine_typography_page = new best_magazine_typography_page_class();

	$best_magazine_slider_page = new best_magazine_slider_page_class();

	$best_magazine_licensing_page = new best_magazine_licensing_page_class();

require_once( 'option-output.php' );

function best_magazine_theme_admin_menu(){
	$theme_name=__('Theme Best Magazine', 'best-magazine' );
	$web_dor_theme_option=add_theme_page( $theme_name, $theme_name, 'edit_theme_options', "web_dorado_theme", 'best_magazine_admin_options_page' );
	add_action('admin_print_styles-' . $web_dor_theme_option, 'best_magazine_theme_admin_scripts');
}

/*###############################################################################*/
function best_magazine_get_option_parameters() {
	global  $best_magazine_layout_page,				
			$best_magazine_general_settings_page,	
			$best_magazine_home_page,			
			$best_magazine_color_control_page,
			$best_magazine_typography_page,
			$best_magazine_slider_page,
			$best_magazine_licensing_page;
	$options=array();
	
	foreach($best_magazine_layout_page->options_themeoptions as $kay => $x)
		$options[$kay] = $x;
	foreach($best_magazine_general_settings_page->options_generalsettings as $kay =>  $x)	
		$options[$kay] = $x;
	foreach($best_magazine_home_page->options_homepage as $kay =>  $x)	
		$options[$kay] = $x;
	foreach($best_magazine_typography_page->options_typography  as $kay => $x)	
		$options[$kay] = $x;
	foreach($best_magazine_slider_page->options_slider  as $kay => $x){
		if($kay == "imgs_url"){
		    foreach($x["option"]  as $kays => $y)
				$options[$kays] = $y;
		}	
		$options[$kay] = $x;
    }
    return apply_filters( 'best_magazine_get_option_parameters', $options );
}

function best_magazine_get_settings_page_tabs() {
	$tabs = array( 
        'layout_editor' => array(
			'name' => 'layout_editor',
			'title' => __( 'Layout Editor', 'best-magazine' ),
			'sections' => array(
				'layout_editor' => array(
					'name' => 'layout_editor',
					'title' => __( 'Layout Editor', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' => best_magazine_text()
		),
        'general' => array(
			'name' => 'general',
			'title' => __( 'General', 'best-magazine' ),
			'sections' => array(
				'general' => array(
					'name' => 'general',
					'title' => __( 'General', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' => best_magazine_text()
		),
        'homepage' => array(
			'name' => 'homepage',
			'title' => __( 'Homepage', 'best-magazine' ),
			'sections' => array(
				'homepage' => array(
					'name' => 'homepage',
					'title' => __( 'Homepage', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' => best_magazine_text()
		),
        'color_control' => array(
			'name' => 'color_control',
			'title' => __( 'Color Control', 'best-magazine' ),
			'sections' => array(
				'color_control' => array(
					'name' => 'color_control',
					'title' => __( 'Color Control', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' => best_magazine_text()
		),
        'typography' => array(
			'name' => 'typography',
			'title' => __( 'Typography', 'best-magazine' ),
			'sections' => array(
				'text_headers' => array(
					'name' => 'text_headers',
					'title' => __( 'Typography - Text Headers', 'best-magazine' ),
					'description' => ''
				),
				'primary_font' => array(
					'name' => 'primary_font',
					'title' => __( 'Typography - Primary Font' , 'best-magazine'),
					'description' => ''
				),
				'secondary_font' => array(
					'name' => 'secondary_font',
					'title' => __( 'Typography - Secondary Font' , 'best-magazine'),
					'description' => ''
				),
				'inputs_textareas' => array(
					'name' => 'inputs_textareas',
					'title' => __( 'Typography - Inputs and Text Areas', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' => best_magazine_text()
		),
        'slider' => array(
			'name' => 'slider',
			'title' => __( 'Slider', 'best-magazine' ),
			'sections' => array(
				'slider' => array(
					'name' => 'slider',
					'title' => __( 'Slider', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' => best_magazine_text()
		),
        'licensing' => array(
			'name' => 'licensing',
			'title' => __( 'Licensing', 'best-magazine' ),
			'sections' => array(
				'licensing' => array(
					'name' => 'licensing',
					'title' => __( 'Licensing', 'best-magazine' ),
					'description' => ''
				)
			),
			'description' =>  ''
		)
    );
	return apply_filters( 'best_magazine_get_settings_page_tabs', $tabs );
}

function register_my_setting() {
	global $best_magazine_tabs,$option_parameters;
	$best_magazine_tabs = best_magazine_get_settings_page_tabs();

	$option_parameters = best_magazine_get_option_parameters();
		register_setting(  'theme_best_magazine_options',  'theme_best_magazine_options',  'best_magazine_options_validate' ); 
	foreach ( $best_magazine_tabs as $tab ) {
		$tabname = $tab['name'];
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $section ) {
			$sectionname = $section['name'];
			$sectiontitle = $section['title'];

			add_settings_section(
				// $sectionid
				'best_magazine_' . $sectionname . '_section',
				// $title
				$sectiontitle,
				// $callback
				'best_magazine_sections_callback',
				// $pageid
				'best_magazine_' . $tabname . '_tab'
			);
		}
	}
	foreach ( $option_parameters as $option ) {
		if(isset($option['name']) && isset($option['title']) && isset($option['tab']) && isset($option['section']) && isset($option['type'])){
			$optionname = $option['name'];
			$optiontitle = $option['title'];
			$optiontab = $option['tab'];
			$optionsection = $option['section'];
			$optiontype = $option['type'];
			if ( 'custom' != $optiontype ) {
				add_settings_field(
					/* $setting id */
					'best_magazine_setting_' . $optionname,
					/* $title */
					$optiontitle,
					/* $callback */
					'best_magazine_setting_callback',
					/* $page id */
					'best_magazine_' . $optiontab . '_tab',
					/* $section id */
					'best_magazine_' . $optionsection . '_section',
					/* $args */
					$option
				);
			} 
			if ( 'custom' == $optiontype ) {
				add_settings_field(
					/* $setting id */
					'best_magazine_setting_' . $optionname,
					/* $title */
					$optiontitle,
					/* $callback */
					'best_magazine_setting_' . $optionname,
					/* $page id */
					'best_magazine_' . $optiontab . '_tab',
					/* $section id */
					'best_magazine_' . $optionsection . '_section'
				);
			}
		}	
	}
} 
add_action( 'admin_init', 'register_my_setting' );


function best_magazine_sections_callback( $section_passed ) {
	global $best_magazine_tabs;
	$best_magazine_tabs = best_magazine_get_settings_page_tabs();
	foreach ( $best_magazine_tabs as $tabname => $tab ) {
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $sectionname => $section ) {
			if ( 'best_magazine_' . $sectionname . '_section' == $section_passed['id'] ) { ?>
				<p> <?php echo $section['description']; ?> </p>
			<?php
			}
		}
	}
}

function best_magazine_licensing_text() {
	global $best_magazine_licensing_page;
	$desr = $best_magazine_licensing_page -> dorado_theme_admin_licensing();
	return $desr;
}

function best_magazine_color_text() {
	global $best_magazine_color_control_page;
	$desr = $best_magazine_color_control_page -> dorado_theme_admin_color_control();
	return $desr;
}

function best_magazine_text() {
	global $best_magazine_web_dor;
	$best_magazine_tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'layout_editor';
	switch($best_magazine_tab){
		case 'layout_editor':{
			$tab = '2';
			$text = __('This section allows you to make changes in default layout of the theme.', 'best-magazine' );
			break;
		}
		case 'general':{
			$tab = '3';
			$text = __('This section allows you to make changes in overall content of the site.', 'best-magazine' );
			break;
		}
		case 'homepage':{
			$tab = '4';
			$text = __('This section allows you to customize the homepage. ', 'best-magazine' );
			break;
		}
		case 'color_control':{
			$tab = '6';
			$text = __('This section allows you customize the color features. ', 'best-magazine' );
			break;
		}
		case 'typography':{
			$tab = '7';
			$text = __('This section allows you to change the font styles.', 'best-magazine' );
			break;
		}
		case 'slider':{
			$tab = '8';
			$text = __('This section allows you customize the slider.', 'best-magazine' );
			break;
		}
		default	:{
		    $tab = '';
			$text = '';
		}	
	}
	$text = '<table align="center" width="90%" style="margin-top:2%;border-bottom: rgb(111, 111, 111) solid 2px;">
				<tbody>
				    <tr>   
                      <td style="font-size:14px; font-weight:bold">
					     <a href="'.$best_magazine_web_dor.'/wordpress-themes-guide-step-1.html" target="_blank" style="color:#126094; text-decoration:none;">'.__("User Manual", "best-magazine" ).'</a><br />'.$text .'
                         <a href="'.$best_magazine_web_dor.'/wordpress-theme-options/3-'.$tab.'.html" target="_blank" style="color:#126094; text-decoration:none;">'.__("More...", "best-magazine" ).'</a>
					    </td>   
                      <td  align="right" style="font-size:16px;">
                           <a href="'.$best_magazine_web_dor.'/wordpress-themes/best-magazine.html" target="_blank" style="color:red; text-decoration:none;">
                              <img src="'.get_template_directory_uri().'/images/header.png" border="0" alt="" width="215">
                           </a>
                       </td>
                    </tr>
				</tbody>
			</table>';
	return $text;
}

function best_magazine_options_validate( $input ) {
	$valid_input = best_magazine_get_options();
	$settingsbytab = best_magazine_get_settings_by_tab();
	$option_parameters = best_magazine_get_option_parameters();
	$option_defaults = best_magazine_get_option_defaults();
	$tabs = best_magazine_get_settings_page_tabs();
	
	$submittype = 'submit';	
	foreach ( $tabs as $tab ) {
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$resetname] ) ) {
			$submittype = 'reset';
		}
	}
	
	$submittab = 'layout_editor';	
	foreach ( $tabs as $tab ) {
		$submitname = 'submit-' . $tab['name'];
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$submitname] ) || ! empty($input[$resetname] ) ) {
			$submittab = $tab['name'];
		}
	}
	
	global $wp_customize;
	$tabsettings = ( isset ( $wp_customize ) ? $settingsbytab['all'] : $settingsbytab[$submittab] );
	
	foreach ( $tabsettings as $setting ) {
		
		if ( 'submit' == $submittype ) {
		
			$optiondetails = $option_parameters[$setting];
			$valid_options = ( isset( $optiondetails['valid_options'] ) ? $optiondetails['valid_options'] : false );
			
			if ( 'checkbox' == $optiondetails['type'] || 'checkbox_open' == $optiondetails['type'] ) {
				$valid_input[$setting] = ( ( isset( $input[$setting] ) && true == $input[$setting] ) ? true : false );
			}
			else if ( 'selects' == $optiondetails['type'] ) {
					$valid_input[$setting] = $input[$setting];
			}
			else if ( 'checkboxes' == $optiondetails['type'] ) {
			    $input[$setting]=explode(',',$input[$setting]);
			    foreach($valid_options as $valid_option){
					$valid_input[$setting] = ( in_array( $valid_option->term_id, $input[$setting] ) ? $input[$setting] : $valid_input[$setting] );
				}
				$valid_input[$setting] = implode(',',$valid_input[$setting]);
			}
			else if ( 'radio' == $optiondetails['type'] ) {
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			else if ( 'select' == $optiondetails['type'] || 'select_typography' == $optiondetails['type'] ) {
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			else if ( ( 'text' == $optiondetails['type'] || 'textarea' == $optiondetails['type']) ) {
				if ( 'sanitize_text_field' == $optiondetails['sanitize_type'] ) {
					$valid_input[$setting] = wp_filter_nohtml_kses( $input[$setting] );
				}
				if ( 'sanitize_html_field' == $optiondetails['sanitize_type'] ) {
					$valid_input[$setting] = wp_filter_kses( $input[$setting] );
				}
				if ( 'esc_url_raw' == $optiondetails['sanitize_type'] ) {
					$valid_input[$setting] = esc_url_raw( $input[$setting] );
				}
				if ( 'css' == $optiondetails['sanitize_type'] ) {
					$valid_input[$setting] = wp_strip_all_tags( str_replace("\n", "",$input[$setting]) );
				}
			}
			else if (  'file_upload' == $optiondetails['type'] || 'text_slider' == $optiondetails['type'] || 'textarea_slider' == $optiondetails['type'] ) {
			 
			if(is_array($input[$setting])){
			   $input[$setting] = array_values($input[$setting]);
			   for($i=0; $i<count($input[$setting]); $i++){
				 if ( 'sanitize_text_field' == $optiondetails['sanitize_type']) {
				   $valid_input[$setting][$i] = wp_filter_nohtml_kses( str_replace(array("\n", "\r"), "",$input[$setting][$i] ));
				 }
				 elseif ( 'sanitize_html_field' == $optiondetails['sanitize_type'] ) {
				   $valid_input[$setting][$i] = wp_filter_kses( str_replace(array("\n", "\r"), "",$input[$setting][$i]) );
				}
				 elseif ( 'esc_url_raw' == $optiondetails['sanitize_type']) {
				   $valid_input[$setting][$i] = esc_url_raw( $input[$setting][$i] );
				 }
			   }
			  } else{
				if ( 'sanitize_text_field' == $optiondetails['sanitize_type'] ) {
				  $valid_input[$setting] = wp_filter_nohtml_kses( $input[$setting] );
			    }
			    if ( 'sanitize_html_field' == $optiondetails['sanitize_type'] ) {
				  $valid_input[$setting] = wp_filter_kses( $input[$setting] );
			    }
			    if ( 'esc_url_raw' == $optiondetails['sanitize_type'] ) {
				  $valid_input[$setting] = esc_url_raw( $input[$setting] );
			    }
			  }
			}
		} 
		elseif ( 'reset' == $submittype ) {
			$valid_input[$setting] = $option_defaults[$setting];
		}
	}
	
	return $valid_input;		

}

function best_magazine_get_settings_by_tab() {
	$tabs = best_magazine_get_settings_page_tabs();
	$settingsbytab = array();
	foreach ( $tabs as $tab ) {
		$tabname = $tab['name'];
		$settingsbytab[] = $tabname;
	}
	$option_parameters = best_magazine_get_option_parameters();
	foreach ( $option_parameters as $option_parameter ) {
		$optiontab = $option_parameter['tab'];
		$optionname = $option_parameter['name'];
		$settingsbytab[$optiontab][] = $optionname;
		$settingsbytab['all'][] = $optionname;
	}
	return $settingsbytab;
}


function best_magazine_get_option_defaults() {
    $option_parameters = best_magazine_get_option_parameters();
	$option_defaults = array();
	foreach ( $option_parameters as $option_parameter ) {
		$name = $option_parameter['name'];
		if(isset($option_parameter['default']))
			$option_defaults[$name] = $option_parameter['default'];
	}
     return apply_filters( 'best_magazine_option_defaults', $option_defaults );
}

function best_magazine_options_init() {
	  global $best_magazine_options;
     $best_magazine_options = wp_parse_args(get_option( 'theme_best_magazine_options',array() ),  best_magazine_get_option_defaults() );
}
add_action('after_setup_theme','best_magazine_options_init', 10,2 );



function best_magazine_get_current_tab() {

	$page = 'web_dorado_theme';
	if ( isset( $_GET['page'] ) && 'best_magazine-reference' == $_GET['page'] ) {
		$page = 'best_magazine-reference';
	}
    if ( isset( $_GET['tab'] ) ) {
        $current = $_GET['tab'];
    } else {
		$best_magazine_options = best_magazine_get_options();
		$current = "layout_editor";
    }	
	return apply_filters( 'best_magazine_get_current_tab', $current );
}


function best_magazine_admin_options_page_tabs() {

	$page = 'web_dorado_theme';

    $current = best_magazine_get_current_tab();
	
	$tabs = best_magazine_get_settings_page_tabs();
    
    $links = array();

    foreach( $tabs as $tab ) {
		$tabname = $tab['name'];
		$tabtitle = $tab['title'];
        if ( $tabname == $current ) {
            $links[] = "<a class='nav-tab nav-tab-active' href='?page=$page&tab=$tabname'>$tabtitle</a>";
        } else {
            $links[] = "<a class='nav-tab' href='?page=$page&tab=$tabname'>$tabtitle</a>";
        }
    }
    
    echo '<div id="icon-themes" class="icon32"><br /></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach ( $links as $link )
        echo $link;
    echo '</h2>';
    echo $tabs[$current]['description'];
}

function best_magazine_get_options() {
	$option_defaults = best_magazine_get_option_defaults();
	global $best_magazine_options;
	$best_magazine_options = wp_parse_args( get_option( 'theme_best_magazine_options', array() ), $option_defaults );
	return $best_magazine_options;
}

function best_magazine_admin_options_page() {
	$currenttab = best_magazine_get_current_tab();
	$tabs = best_magazine_get_settings_page_tabs();
	$settings_section = 'best_magazine_' . $currenttab . '_tab'; ?>
	<div style="background:url(<?php echo get_template_directory_uri(); ?>/images/Optimize.png) no-repeat; width:100%; height:72px;"></div>
		<div class="wrap">
			<?php best_magazine_admin_options_page_tabs(); 
				if ( isset( $_GET['settings-updated'] ) ) {
					echo "<div class='updated'><p>".__('Theme settings updated successfully.', 'best-magazine' )."</p></div>";
				} ?>
		 <form action="options.php" method="post">
			<?php 
				settings_fields('theme_best_magazine_options');
				do_settings_sections( $settings_section );  
				$tab = ( isset( $_GET['tab'] ) ? $_GET['tab'] : 'layout_editor' ); 
				if ($currenttab == 'licensing')
					echo best_magazine_licensing_text();
				elseif ($currenttab == 'color_control'){
					echo best_magazine_color_text();
				}else { ?>
					<div class="down_buttons">
						<input name="theme_best_magazine_options[submit-<?php echo $tab; ?>]" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'best-magazine'); ?>" />
						<input name="theme_best_magazine_options[reset-<?php echo $tab; ?>]" type="submit" class="button-secondary" value="<?php esc_attr_e('Reset Defaults', 'best-magazine'); ?>" />
					</div>
				<?php } ?>
		 </form>
		 </div>
	<?php 
}


function best_magazine_theme_admin_scripts(){
	$admin_stylesheet = get_template_directory_uri() . '/admin/css/best-magazine-admin.css';
	wp_enqueue_style( 'best_magazine_admin_stylesheet', $admin_stylesheet, '', false );
	wp_enqueue_script( 'common' );
	wp_enqueue_script('best-magazine-admin-script',get_template_directory_uri().'/scripts/admin-script.js', array('jquery'));
	wp_print_scripts('editor');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	wp_admin_css();
	wp_enqueue_script('utils');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_style( 'wp-color-picker' );
}



?>