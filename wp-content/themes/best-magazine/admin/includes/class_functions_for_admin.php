<?php 

class best_magazine_admin_helper_class{
	
	private $params;
	private $one_time_use;
	private $most_uses_variables;
	public  $best_magazine_mainl_url;
	function __construct($initial_params=array()){
		
		$defaults= array(
			"textarea_width"=>"440",
			"textarea_height"=>"220",
			"input_size"=>"36",
			"select_width"=>"240",
			"upload_size" => "36"
		);
		$this->best_magazine_mainl_url='http://web-dorado.com/';
		$this->params=$this->marge_params($defaults,$initial_params);	
		$this->one_time_use['uses_upload']=1;	
		$this->one_time_use['uses_checkboxs_scripts']=1;
		$this->one_time_use['uses_select_category_scripts']=1;
		$this->one_time_use['uses_open_or_hide_parametr']=1;		
		$this->most_uses_variables['categories']=get_categories('hide_empty=0');
	}

	
	public function only_select($select,$local_params=NULL){
	    global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		?>
		<div class="param_gorup_div">
			<div class="block">		
				<div class="optioninput"> 		
					<select name="<?php echo 'theme_best_magazine_options[' .$select['name']. ']'; ?>" id="<?php echo $select['name'] ?>" style="width:<?php echo $params["select_width"] ?>px;">
					<?php foreach($select['valid_options'] as $key => $value){ ?>
						<option value="<?php echo $key ?>" <?php selected( $best_magazine_options[$select['name']], $key); ?>><?php echo ($value!="")? esc_html($value) : "(no title)"; ?></option>
					<?php } ?>
					</select>																
				</div>
			</div>
		</div>
		<?php
	}
	
	public function only_radio($option){
	   global $best_magazine_options;
	   $valid_options = array();
	   $valid_options = $option['valid_options'];
	   $optionname = $option['name'];
	   $fieldtype = $option['type'];
	   $fieldname = 'theme_best_magazine_options[' . $optionname . ']';
	   if (  $option['name']=='default_layout') { ?>
			<script type="text/javascript">
			jQuery( document ).ready(function() {
				showRadioValue(<?php echo $best_magazine_options[$optionname] ?>);
			});
			function showRadioValue(rad){
				if(rad<1){
					return;
				} 
				
				for(var i = 1; i <= 4; ++i){
					jQuery(".form-table .param_gorup_div").eq(i).parent().parent().css("display","none");
				}
				switch(rad){
					case 1:
					jQuery(".form-table .param_gorup_div").parent().parent().eq(1).show();
					break;
					case 2:
					jQuery(".form-table .param_gorup_div").parent().parent().eq(1).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(2).show();
					break;
					case 3:
					jQuery(".form-table .param_gorup_div").parent().parent().eq(1).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(2).show();
					break;
					case 4:
					jQuery(".form-table .param_gorup_div").parent().parent().eq(1).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(2).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(3).show();
					break;
					case 5:
					jQuery(".form-table .param_gorup_div").parent().parent().eq(1).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(2).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(3).show();
					break;
					case 6:
					jQuery(".form-table .param_gorup_div").parent().parent().eq(1).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(2).show();
					jQuery(".form-table .param_gorup_div").parent().parent().eq(3).show();
					break;

				}
			}
			</script>
			<?php

			foreach ( $valid_options as $valid_option ) { ?>
				<div class="sprite_layouts">
					<div style="background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 <?php echo -($valid_option['name']-1)*48; ?>px;"></div>
						<input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $best_magazine_options[$optionname] ); ?> value="<?php echo $valid_option['name']; ?>" onclick="javascript:showRadioValue(<?php echo esc_js($valid_option['name']); ?>)">
				</div>
			<?php }  ?>
		<?php }
		elseif ( 'radio' == $fieldtype && ( $option['name']=='title_position' || $option['name']=='description_position')){
		  $i=1; 
			foreach ( $valid_options as $key=>$valid_option ) { ?>
					<input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $key == $best_magazine_options[$optionname] ); ?> value="<?php echo esc_attr($key); ?>" />
					<?php
					if($i==3 || $i==6)
						echo '<br>';
					$i++;
			}
		}else{
			foreach ( $valid_options as $valid_option ) {
				?>
				<input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $best_magazine_options[$optionname] ); ?> value="<?php echo esc_attr($valid_option['name']); ?>" />
				<span>
				<?php echo $valid_option['title']; ?>
				<?php if ( $valid_option['description'] ) { ?>
					<span style="padding-left:5px;"><em><?php echo esc_html($valid_option['description']); ?></em></span>
				<?php } ?>
				</span>
				<br />
				<?php
			}
		}
	}
	
	public function only_input($input,$local_params=NULL){
		global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params; ?>
		<div class="param_gorup_div">
			<div class="block">
				<div class="optioninput">
					<input type="text" name="<?php echo 'theme_best_magazine_options[' .$input['name']. ']'; ?>" id="<?php echo $input['name']; ?>" value="<?php echo esc_attr($best_magazine_options[$input['name']]); ?>" size="<?php echo $params["input_size"]; ?>">
                    <?php if(isset($input['extend_simvol'])){echo $input['extend_simvol']; } ?>
				</div>
			</div>
		</div>  
		<?php		
	}
	public function only_textarea($textarea,$local_params=NULL){
	    global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		?>
            <div>
                <div class="block">
                    <div class="optioninput">
                    	<textarea name="<?php echo 'theme_best_magazine_options[' .$textarea['name']. ']'; ?>" id="<?php echo $textarea['name'] ?>"  style="width:<?php echo $params["textarea_width"] ?>px; height:<?php echo $params["textarea_height"] ?>px;"><?php echo esc_textarea(stripslashes($best_magazine_options[$textarea['name']])); ?></textarea>
                    </div>
                </div>
            </div>
       	<?php

		
	}
	public function only_checkbox($checkbox,$local_params=NULL){
	    global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params; ?>
		<div class="param_gorup_div">
			<div class="block margin">
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo 'theme_best_magazine_options[' .$checkbox['name']. ']'; ?>"  />
					<input type="checkbox" class="checkbox" name="<?php echo 'theme_best_magazine_options[' .$checkbox['name']. ']'; ?>" id="<?php echo $checkbox['name'] ?>" <?php checked($best_magazine_options[$checkbox['name']]); ?>>
				</div>
			</div>
		</div>	
		<?php		
	}
	
	public function only_button($option){
	    global $best_magazine_options;
		$optionname = $option['name'];
		?>
		<script>
			jQuery(document).ready(function () {
				jQuery('.form-table tr:nth-of-type(3),.form-table tr:nth-of-type(4),.form-table tr:nth-of-type(5),.form-table tr:nth-of-type(6),.form-table tr:nth-of-type(7)').hide();
				jQuery('.graphic_selector .graphic_select_border').click(function () {
					select_graphic(this);
				});
				jQuery('.fontselector').on('change',function () {
					font_style(this, 'font-family')
				});
				jQuery('.letter_spacing').on('change',function () {
					font_style(this, 'letter-spacing')
				});
				jQuery('.text_transform').on('change',function () {
					font_style(this, 'text-transform')
				});
				jQuery('.font_variant').on('change',function () {
					font_style(this, 'font-variant')
				});
				jQuery('.font_weight').on('change',function () {
					font_style(this, 'font-weight')
				});
				jQuery('.font_style').on('change',function () {
					font_style(this, 'font-style')
				});
				
			});
			function font_style(element, property) {
				var currentSelect = jQuery(element).attr("id");
				var selectedOption = '#' + currentSelect + ' option:selected';
				var previewProp = jQuery(selectedOption).val();
				jQuery(element).parent().parent().parent().find('.optioninput-preview').css(property, previewProp);
			}
		
			function select_graphic(ClickedLayout) {
				if (!jQuery(ClickedLayout).hasClass('disabled_option')) {
					jQuery(ClickedLayout).parent().parent().find('.graphic_select_border').removeClass('selectedgraphic');
					jQuery(ClickedLayout).addClass('selectedgraphic');
					jQuery(ClickedLayout).parent().find('.graphic_select_input').attr("checked", "checked");
		
				}
			}
			
			function toggle(showElement) {
				//jQuery(showElement).removeClass('active_button');
				var index_of_cur = jQuery(showElement).parent().parent().parent().index();
				//alert(index_of_cur);
				if (jQuery(showElement).hasClass('active_button')) {
					 for(var i=1; i<=5; i++){
						jQuery(showElement).parent().parent().parent().parent().find(jQuery('tr:nth-of-type('+(parseInt(index_of_cur+i+1))+')')).fadeOut();
					}
					jQuery(showElement).removeClass('active_button');
				} else {
					jQuery(showElement).addClass('active_button');
					for(var i=1; i<=5; i++){
						jQuery(showElement).parent().parent().parent().parent().find(jQuery('tr:nth-of-type('+(parseInt(index_of_cur+i+1))+')')).fadeIn();
					}
				}
			}
		</script>
		<div class="font_preview_wrap">
			<label class="typagrphy_label" for="" style="font-size:18px;font-size: 20px;font-family: Segoe UI;"><?php echo __("Preview","best-magazine"); ?></label>
			<div class="font_preview">
				<div class="optioninput-preview"  style="font-size: 16px; margin-top: 14px;margin-bottom: 23px; font-family: <?php  if ($best_magazine_options['type_'.$optionname.'_font'] != "") {   echo htmlspecialchars(stripslashes($best_magazine_options["type_".$optionname."_font"])); } else {   echo "Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif";  } ?>;font-weight:<?php if ($best_magazine_options["type_".$optionname."_weight"] != "") {    echo $best_magazine_options["type_".$optionname."_weight"];   } else {    echo "normal";   } ?>; letter-spacing:<?php if ($best_magazine_options["type_".$optionname."_kern"] != "") {    echo $best_magazine_options["type_".$optionname."_kern"];    } else {   echo "0.00em";  } ?>; text-transform:<?php if ($best_magazine_options["type_".$optionname."_transform"] != "") {  echo $best_magazine_options["type_".$optionname."_transform"];  } else {   echo "none";   } ?>; font-variant:<?php if ($best_magazine_options["type_".$optionname."_variant"] != "") {    echo $best_magazine_options["type_".$optionname."_variant"]; } else {   echo "normal";   } ?>; font-style:<?php if ($best_magazine_options["type_".$optionname."_style"] != "") {   echo $best_magazine_options["type_".$optionname."_style"];   } else {   echo "normal";} ?>;">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
					labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
					laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
					voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
					non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>
		</div>
		<a href="javascript:;" style="text-decoration:none;">
			<span id="type_headers_set_styling_button"  class="button"  onclick="toggle(this)"><?php echo __("Edit Font Styling","best-magazine"); ?></span>
		</a>
	<?php	
	}
	
	public function checkbox_open($checkbox,$local_params=NULL){
	    global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;

		if($this->one_time_use['uses_checkboxs_scripts']){
		?>
        <script>
			function refresh_input(cur_element){
			  var input_string='';
			  var checkboxses_main_div=jQuery(cur_element).parent().parent();
			  
			  jQuery(checkboxses_main_div).find("input[type=checkbox]").each(function() {
				  if(this.checked)
				 	 input_string=input_string+this.value+",";
			  });	
			  
			  checkboxses_main_div.find("input[type=hidden]").val(input_string);					
			}
		</script>
             <?php
			$this->one_time_use['uses_checkboxs_scripts']=0;
			$this->print_javascript('uses_open_or_hide_parametr');
		}
		$this->print_javascript_def($checkbox['fild_count']);
		?>
		<div class="param_gorup_div">
			<div class="block margin">
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo 'theme_best_magazine_options[' .$checkbox['name']. ']'; ?>"  />
					<input type="checkbox" onclick="open_or_hide_param(this,<?php echo $checkbox['fild_count']; ?>)" class="checkbox with_input" name="<?php echo 'theme_best_magazine_options[' .$checkbox['name']. ']'; ?>" id="<?php echo $checkbox['name'] ?>" <?php checked($best_magazine_options[$checkbox['name']]); ?>>
				</div>
			</div>
		</div>	
		<?php		
	}
	
	public function only_upload($upload,$local_params=NULL){
		global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;
		if($upload['name']=='imgs_url'){
		$imgs_url = $best_magazine_options[$upload['name']];
		$imgs_href = $best_magazine_options[$upload['option']['imgs_href']['name']];
		$imgs_title = $best_magazine_options[$upload['option']['imgs_title']['name']];
		$imgs_description = $best_magazine_options[$upload['option']['imgs_description']['name']];

		echo "<table class='slide_tab'>";
        if(!(count($imgs_url)==1 && $imgs_url[0]=='')) for($i=0;$i<count($imgs_url);$i++){
           if (isset($imgs_url[$i]) && $imgs_url[$i] != ""){	?>
			<tr class="slide-from-base">
			    <td width="20%" valign="middle"></td>
				<td>
					<input size="36" value="<?php echo esc_attr( $imgs_url[$i] ); ?>" class="upload image_links_group" id="ct_image_link_<?php echo $i ?>" name="<?php echo 'theme_best_magazine_options[' .$upload['name']. ']['.$i.']' ?>">
					<input type="submit" class="update-button" value="<?php echo esc_attr_e("Update image","best-magazine"); ?>"><input class="remove-image" value="<?php echo esc_attr_e("Remove image","best-magazine"); ?>" type="submit" />
				</td>
			</tr>
			<tr rel="<?php echo $i ?>"><td width="20%" valign="middle"><h3></h3></td><td><img style="width:80%;" src="<?php echo esc_url( $imgs_url[$i] ); ?>" /></td></tr>
			<tr>
				<td width="20%" valign="middle"><h2><?php echo __("The URL of image when clicked","best-magazine"); ?></h2></td>
				<td><input  type="text" name="<?php echo 'theme_best_magazine_options[' .$upload['option']['imgs_href']['name']. ']['.$i.']' ?>" class="image_href_group" value="<?php if(isset($imgs_href[$i])) echo esc_attr( $imgs_href[$i] ); ?>" /></td>
			</tr>
			<tr>
				<td width="20%"  valign="middle">
					<h2><?php echo __("Image Title","best-magazine"); ?></h2>
				</td>
				<td><input  type="text"  name="<?php echo 'theme_best_magazine_options[' .$upload['option']['imgs_title']['name']. ']['.$i.']' ?>" class="image_title_group" value="<?php if(isset($imgs_title[$i])) echo esc_attr( $imgs_title[$i] ); ?>" /></td>
			</tr>
			<tr>
				<td width="20%"  valign="middle">
					<h2><?php echo __("Image Description","best-magazine"); ?></h2>
				</td>
				<td>
					<textarea class="image_description_group" name="<?php echo 'theme_best_magazine_options[' .$upload['option']['imgs_description']['name']. ']['.$i.']' ?>"><?php if(isset($imgs_description[$i])) echo esc_textarea( $imgs_description[$i] ); ?></textarea>
				</td>
			</tr>	
			
			<?php 
			   }
			} ?>
			<tr id="add-image-line">
				<td width="20%"  valign="middle"><h2><?php echo __("Image","best-magazine"); ?>
				<span class="hasTip" style="cursor: pointer;color: #3B5998;" title="<?php echo __("Using this option you can add images for the slider.","best-magazine"); ?>">[?]</span>
				</h2></td>
				<td><input class="upload-button" type="button" id="slides-img-add-button" value="<?php echo esc_attr_e("Upload New Image","best-magazine"); ?>" /></td>
			</tr>
		</table>
        <script type="text/javascript">
		jQuery(document).ready(function(){ 
		     jQuery( ".slide_tab" ).parent().attr("colspan","2");
		     jQuery( ".slide_tab" ).parent().prev().remove();
			 
			var j=jQuery('tr.slide-from-base').length;
			jQuery('#add-image-line .upload-button').click(function(){
				var button="add";
				tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");  
				add_image=send_to_editor ;
			window.send_to_editor = function(html) { 
				  imgurl = jQuery("img",html).attr("src");
				  var tr='<tr class="new"><td width="30%" valign="middle"><h2><?php echo __("Image","best-magazine"); ?></h2></td><td><input size="36" value="'+imgurl+'" class="upload image_links_group" id="ct_image_link_'+j+'" name="<?php echo 'theme_best_magazine_options[' .$upload['name']. ']' ?>['+j+']" /><input type="submit" class="update-button" value="<?php echo esc_attr_e("Update image","best-magazine"); ?>"><input class="remove-image" value="<?php echo esc_attr_e("Remove image","best-magazine"); ?>" type="submit" /></td></tr> <tr class="new" rel="'+j+'"><td width="30%" valign="middle"><h2></h2></td><td><img style="width:80%;" src="'+imgurl+'" /></td></tr><tr class="new"><td width="30%" valign="middle"><h2><?php echo __("The URL of image when clicked","best-magazine"); ?></h2></td><td><input type="text" class="image_href_group" name="<?php echo 'theme_best_magazine_options[' .$upload['option']['imgs_href']['name']. ']' ?>['+j+']" value="" /></td></tr><tr><td width="30%"  valign="middle"><h2><?php echo __("Image Title","best-magazine"); ?></h2></td><td><input  type="text" class="image_title_group"  name="<?php echo 'theme_best_magazine_options[' .$upload['option']['imgs_title']['name']. ']' ?>['+j+']" value="" /></td></tr><tr class="new"><td width="30%"  valign="middle"><h2><?php echo __("Text on images","best-magazine"); ?></h2></td><td><textarea class="image_description_group" name="<?php echo 'theme_best_magazine_options[' .$upload['option']['imgs_description']['name']. ']' ?>['+j+']"></textarea></td></tr>';
				  jQuery("#add-image-line").before(tr);		
				  j++;
				  tb_remove();  
			  };
			  return false; 	
			});
			
			// add element
			jQuery(document).on("click" , ".update-button",  function(){
				var i=jQuery(this).parents("tr").next().attr("rel");
				var button="update";
				tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");  	
			
				window.send_to_editor = function(html) { 
					updateurl = jQuery("img",html).attr("src"); 
					jQuery("#ct_image_link_"+i).attr("value",updateurl);
					jQuery("#ct_image_link_"+i).attr("name","ct_image_link_"+i);
					jQuery("tr[rel='"+i+"']").find("img").attr("src",updateurl);
					tb_remove();  
				};

				return false; 	
			});	

			// remove element
			jQuery(document).on("click" , ".remove-image",  function(){
				jQuery(this).parent().parent().next().next().next().next().remove();
				jQuery(this).parent().parent().next().next().next().remove();
				jQuery(this).parent().parent().next().next().remove();
				jQuery(this).parent().parent().next().remove();
				jQuery(this).parent().parent().remove();
				return false;
			});
			
		});
		</script>  		
		<?php
		}else{
		?>
        <div class="param_gorup_div">
            <div class="optioninput" id="upload_images">
                <input type="text" class="upload" id="<?php echo $upload["name"] ?>" name="<?php echo 'theme_best_magazine_options[' .$upload["name"]. ']'; ?>" size="<?php echo $params["upload_size"]?>" value="<?php echo esc_attr( $best_magazine_options[$upload["name"]] ); ?>"/>
                <input class="upload-button" type="button" value="<?php echo esc_attr_e("Upload Image","best-magazine"); ?>"/>
            </div>
        </div>
        <?php 
		}
		
	}
	
	
	public function only_color($color,$local_params=NULL){
		global $best_magazine_options;
		if($local_params!=NULL)
			$params=$this->marge_params($this->params,$local_params);
		else
			$params=$this->params;

		?>
		<div class="optioninput">
			<div style="position: relative; top: 5px;">
				<input type="text" id="<?php echo $color['name']; ?>" name="<?php echo 'theme_best_magazine_options[' .$color['name']. ']' ; ?>"   value="<?php echo esc_attr( $best_magazine_options[$color['name']] ); ?>" style="background-color:<?php echo esc_attr($best_magazine_options[$color['name']]); ?>;">
			</div>
		</div>
		
		<script  type="text/javascript">jQuery(document).ready(function() {
					jQuery('#<?php echo $color['name']; ?>').wpColorPicker();
				});
		</script>

		<?php 		
	}
	public function select_typography($select,$class=''){
		global $best_magazine_options;
		?>
		<label class="<?php echo $select['name'] ?>" for="<?php echo $select['name'] ?>"><?php echo esc_html($select['title']); ?></label>
		<select class="<?php echo $class ?>" name="<?php echo 'theme_best_magazine_options[' .$select['name']. ']'; ?>" id="<?php echo $select['name'] ?>" style="width:120px;">
		<?php
		foreach($select['valid_options'] as $key => $value){ ?>
			<option value="<?php echo $key ?>" <?php selected( $best_magazine_options[$select['name']], $key); ?>><?php echo esc_html($value); ?></option>
			<?php } ?>
		</select>																
		<?php
	}
	
	public function checkbox_category_checkboxses($checkbox_last,$local_params=NULL){
	    global $best_magazine_options;
		if($this->one_time_use['uses_checkboxs_scripts']){
		?>
        <script>
			function refresh_input(cur_element){
			  var input_string='';
			  var checkboxses_main_div=jQuery(cur_element).parent().parent();
			  
			  jQuery(checkboxses_main_div).find("input[type=checkbox]").each(function() {
				  if(this.checked)
				 	 input_string=input_string+this.value+",";
			  });	
			  
			  checkboxses_main_div.find("input[type=hidden]").val(input_string);					
			}
		</script>
             <?php
			$this->one_time_use['uses_checkboxs_scripts']=0;			
		}
		?>
        
         <div>
            <div class="open_hide">
                <div class="optiondescreption">
                    <p><?php //echo $checkbox_last['description'] ?></p>
                </div>
                <div class="block">
                
                <?php
                $selected_categories=explode(',',$best_magazine_options[$checkbox_last['name']]);
                $cats = $checkbox_last['valid_options'];
                foreach ($cats as $categs) { ?>
					<div class="optioninput checkbox_for_posts home_p">								
					<input onchange="refresh_input(this)" value="<?php echo $categs->cat_ID ?>" type="checkbox" class="checkbox" <?php checked( in_array($categs->cat_ID,$selected_categories), true ); ?> id="<?php echo $checkbox_last['name'] . $categs->cat_ID; ?>"/>
					</div>
					<label for="<?php echo $checkbox_last['name'] . $categs->cat_ID; ?>"> <?php echo $categs->cat_name; ?></label>                
					<br />
                <?php } ?>
                <input type="hidden" name="<?php echo 'theme_best_magazine_options[' .$checkbox_last['name']. ']'; ?>" value="<?php echo esc_attr($best_magazine_options[$checkbox_last['name']]); ?>"  />
                </div>
            </div>
        
        </div>
        
        <?php
		
	}

	
	public function category_select_with_checkboxse($select,$local_params=NULL){
		global $best_magazine_options;
		if($this->one_time_use['uses_select_category_scripts']){
		?>
		<script>
			function create_select(select_id){
				var Select_options_sp=jQuery('.select_cat_for_home').eq(0).html();
				jQuery('#category_select_list').append('<select class="select_cat_for_home" onchange="if_last_add_refresh_input(this)">'+Select_options_sp+'</select>').append(jQuery('.remov_img').eq(0).clone()).append('<div style="clear:both"></div>');
				if_last_add_refresh_input();
			} 			
			function if_last_add_refresh_input(){
				var selected_categories={}
				var sp_coount_select=1;
					jQuery('.select_cat_for_home').each(function(index, element) {
						
						selected_categories[''+sp_coount_select+'']=jQuery(this).val();	
						sp_coount_select++;		
					});	
				
				jQuery('#home_page_tabs_exclusive').val(JSON.stringify(selected_categories));
			}			
			function sp_remove_select_element(element){
					if(jQuery('.remov_img').length>1){
					jQuery(element).prev().remove();
					jQuery(element).next().remove();
					jQuery(element).remove();
					}
					if_last_add_refresh_input();
			}
		</script>
		<?php 	
		$this->one_time_use['uses_checkboxs_scripts']=0;
	} ?>
		<div>
		<div class="open_hide">
			<div class="optiondescreption">
				<p><?php $select['description'] ?></p>
			</div>
			<div class="clear"></div>
			<div class="category_select_list" id="category_select_list">
				<?php $categorys=$this->most_uses_variables['categories'];
				$category_id_array[]='random'; // this varable use for check if in bas category exsist or no
				$category_id_array[]='popular';
				$category_id_array[]='recent';
				$user_selected_category_not_exsist=1;// ete category ka jnjel es inq@ caountov cuyc a talu vor ka bayc lav chi lini tra hamar ka es popoxakan@
				foreach($categorys as $category){
					$category_id_array[]=$category->cat_ID;
				}
				$user_selected_categories=json_decode(stripslashes($best_magazine_options[$select['name']]));
				if(count($user_selected_categories)>=1){
				foreach($user_selected_categories as $user_selected_categorie){
					if(in_array($user_selected_categorie,$category_id_array)){
						$user_selected_category_not_exsist=0;
				?>
				
				<select onchange="if_last_add_refresh_input(this)" class="select_cat_for_home" >
				<?php if(!(isset($local_params['dont_show_recent']) && $local_params['dont_show_recent']==1)){ ?>
				<option <?php selected($user_selected_categorie,'random'); ?>   value="random"><?php echo __('Random Posts','best-magazine'); ?></option>
				<option <?php selected($user_selected_categorie,'popular'); ?>   value="popular"><?php echo __('Popular Posts','best-magazine'); ?></option>
				<option <?php selected($user_selected_categorie,'recent'); ?>   value="recent"><?php echo __('Recent Posts','best-magazine'); ?></option>
				<?php }?>
					<?php foreach($categorys as $category) {?>
					<option <?php selected($user_selected_categorie,$category->cat_ID); ?>  value="<?php echo $category->cat_ID ?>"><?php echo esc_html($category->name); ?></option>
					<?php } ?>
				</select>	<img onclick="sp_remove_select_element(this)"  class="remov_img" src="<?php echo get_template_directory_uri().'/images/delete_el_hover.png'; ?>" />
			<div style="clear:both"></div>
			<?php } }} if($user_selected_category_not_exsist) {?>
				<select onchange="if_last_add_refresh_input(this)" class="select_cat_for_home" >
				<?php if(!(isset($local_params['dont_show_recent']) && $local_params['dont_show_recent']==1)){ ?>
				<option value="random"><?php echo __('Random Posts','best-magazine'); ?></option>
				<option value="popular"><?php echo __('Popular Posts','best-magazine'); ?></option>
				<option value="recent"><?php echo __('Recent Posts','best-magazine'); ?></option>
				<?php }?>
					<?php foreach($categorys as $category) {?>
					<option <?php selected($user_selected_categories,$category->cat_ID); ?>  value="<?php echo $category->cat_ID ?>"><?php echo esc_html($category->name); ?></option>
					<?php } ?>
				</select>	<img onclick="sp_remove_select_element(this)"  class="remov_img" src="<?php echo get_template_directory_uri().'/images/delete_el_hover.png'; ?>" />
			<div style="clear:both"></div>
			<?php } ?>
			</div>
			<input type="button" value="<?php echo esc_attr_e("Add Category","best-magazine"); ?>" onclick="create_select()" />
			<input type="hidden" id="home_page_tabs_exclusive" name="<?php echo 'theme_best_magazine_options[' .$select['name']. ']'; ?>" value='<?php echo esc_attr($best_magazine_options[$select['name']]); ?>' />
		</div>
		
	  </div>
	<div style="clear:both"></div>
	<?php 
	
	}
	
	
	public function integretion_adsens($checkbox,$radio_select_type,$array_of_options,$local_params=NULL){
		if($local_params!=NULL){
			$params=$this->marge_params($this->params,$local_params);
		}
		else{
			$params=$this->params;
		}
		
		if($this->one_time_use['uses_select_category_scripts']){
		?>
        <script>
			jQuery( document ).ready(function() {
				jQuery('.radio_for_hide_or_show').each(function() {
					if(jQuery(this).is(':checked')){
						jQuery(this).parent().parent().parent().find('.radio_'+this.value).show();
					}
					else{
						jQuery(this).parent().parent().parent().find('.radio_'+this.value).hide();
					}
                });
				jQuery('.radio_for_hide_or_show').change(function() {
					jQuery('.radio_for_hide_or_show').each(function() {
							if(jQuery(this).is(':checked')){
								jQuery(this).parent().parent().parent().find('.radio_'+this.value).show();
							}
							else{
								jQuery(this).parent().parent().parent().find('.radio_'+this.value).hide();
							}
                	});
                });

            });
		</script>
        <?php } ?>
		<div class="param_gorup_div">
			<div class="optiontitle">
				<h3><?php echo $checkbox['name'] ?></h3>
			</div>
			<div class="block margin">
				<div class="optioninput checkbox">
					<input type="hidden" value="" name="<?php echo 'theme_best_magazine_options[' .$checkbox['name']. ']'; ?>"  />
					<input type="checkbox" onclick="open_or_hide_param(this)" class="checkbox with_input" name="<?php echo 'theme_best_magazine_options[' .$checkbox['name']. ']'; ?>" id="<?php echo $checkbox['name'] ?>" <?php checked($checkbox['default'], "on"); ?> />
				</div>
				<div class="optiondescreption">
					<p><?php echo esc_html($checkbox['description']); ?></p>
				</div> 		
			</div> 
			<div class="block open_hide">
            
            <div class="radio_div">
           		<div class="radio_description">
					<p><?php echo esc_html($radio_select_type['description']); ?></p>
				</div> 
                <div class="radio_select">
				<?php foreach($radio_select_type['values'] as $key => $radio_value){ ?>
                
                    <input class="radio_for_hide_or_show" type="radio" id='<?php echo $radio_select_type['name']; echo esc_attr($radio_value); ?>' value="<?php echo esc_attr($radio_value); ?>" name="<?php echo 'theme_best_magazine_options[' .$radio_select_type['name']. ']'; ?>" <?php checked($radio_select_type['default'], $radio_value) ?>  />
                    <label for="<?php echo $radio_select_type['name']; echo esc_attr($radio_value); ?>"><?php echo esc_html($radio_select_type['values_description'][$key]); ?></label>
                <?php } ?>
                </div>
            </div>
            <?php
			foreach($radio_select_type['values'] as $key => $radio_value){
			?><div class="radio_inner_parametrs radio_<?php echo esc_attr($radio_value); ?>" ><?php
				foreach($array_of_options[$key] as $array_of_option){
					/*ttt!!! array dereferencing?*/
					$this->$array_of_option['type']($array_of_option['variable'],$local_params);
				}					
			?></div><?php 
			}
			?>
			</div>
		</div>
		<?php 
	}
	
	
	private function print_javascript($key){
		if($this->one_time_use[$key]){
			?>
			<script>
			function open_or_hide_param(cur_element,count){
				var index_of_cur = jQuery(cur_element).parent().parent().parent().parent().parent().index();
				
				if(cur_element.checked){
				   for(var i=1; i<=count; i++){
						jQuery(cur_element).parent().parent().parent().parent().parent().parent().find(jQuery('tr:nth-of-type('+(parseInt(index_of_cur+i+1))+')')).show();
					}
				}
				else
				{
				   for(var i=1; i<=count; i++){
						jQuery(cur_element).parent().parent().parent().parent().parent().parent().find(jQuery('tr:nth-of-type('+(parseInt(index_of_cur+i+1))+')')).hide();
				    }
				}
			}
			</script>
			<?php	
			$this->one_time_use[$key]=0;
			}
	}
	
	private function print_javascript_def($fild_count){
			?>
			<script>
			jQuery(document).ready(function() {
				jQuery('.with_input').each(function(){open_or_hide_param(this, <?php echo $fild_count; ?>)})
			});
			</script>
			<?php	
	}
	
	private function marge_params($param_begin_low_prioritet,$param_last_high_priorete){
		$new_param=array();
		foreach($param_begin_low_prioritet as $key=>$value){
			if(isset($param_last_high_priorete[$key])){
				$new_param[$key]=$param_last_high_priorete[$key];
			}
			else{
				$new_param[$key]=$value;
			}
		}
		return $new_param;
	}
	
}



?>