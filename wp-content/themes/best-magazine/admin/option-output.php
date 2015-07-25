<?php

function best_magazine_setting_callback( $option ) {

global $best_magazine_admin_helepr_functions;
	$best_magazine_options = best_magazine_get_options();
	$option_parameters = best_magazine_get_option_parameters();
	$optionname = $option['name'];
	$optiontitle = $option['title'];
	$fieldtype = $option['type'];
	$fieldname = 'theme_best_magazine_options[' . $optionname . ']';

	switch($fieldtype){
	case 'checkbox' : {
	    echo $best_magazine_admin_helepr_functions->only_checkbox($option);
		break;
	}
	case 'text' : {
	    echo $best_magazine_admin_helepr_functions->only_input($option);
		break;
	}
	case 'radio' : {
	    echo $best_magazine_admin_helepr_functions->only_radio($option);
		break;
	}
	case 'select' : {
		echo $best_magazine_admin_helepr_functions->only_select($option);
		break;
	}
	case 'textarea' : { 
		echo $best_magazine_admin_helepr_functions->only_textarea($option);
		break;
	} 
	case 'checkbox_open' : { 
		echo $best_magazine_admin_helepr_functions->checkbox_open($option);
		break;
	}  
	case 'checkboxes' : { 
		echo $best_magazine_admin_helepr_functions->checkbox_category_checkboxses($option);
		break;
	}   
	case 'file_upload' : { 
		echo $best_magazine_admin_helepr_functions->only_upload($option);
		break;
	}    
	case 'selects' : { 
		echo $best_magazine_admin_helepr_functions->category_select_with_checkboxse($option);
		break;
	}     
	case 'picker' : { 
		echo $best_magazine_admin_helepr_functions->only_color($option);
		break;
	}      
	case 'select_typography' : { 
		echo $best_magazine_admin_helepr_functions->select_typography($option,$option['class']);
		break;
	}      
	case 'button' : { 
	    echo $best_magazine_admin_helepr_functions->only_button($option);
		break;
	}      
  }
	// Output the setting description
	if(isset($option['description'])){ ?>
	<span class="description"><?php echo $option['description']; ?></span>
	<?php }
  
}
?>