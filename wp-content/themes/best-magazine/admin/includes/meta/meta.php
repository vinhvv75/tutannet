
	<script>
	jQuery(document).ready(function(){
		var value = jQuery("input:radio[name='best_magazine_meta_date[layout]']:checked").val();
   		if (value==1){
			jQuery(".class_for_js,.class_for_main_col").hide();
		}else if (value < 4) {
   			jQuery(".class_for_js").hide();
   			jQuery(".class_for_main_col").show();
   		}else
   			jQuery(".class_for_js,.class_for_main_col").show();
		jQuery("input:radio[name='best_magazine_meta_date[layout]']").click(function() {
   		var value = jQuery(this).val();
   		if (value==1){
			jQuery(".class_for_js,.class_for_main_col").hide();
		}else if (value < 4) {
   			jQuery(".class_for_js").hide();
   			jQuery(".class_for_main_col").show();
   		}else
   			jQuery(".class_for_js,.class_for_main_col").show();
		});
	});
	</script>

	<div class="t_news t_sitemap t_blog t_full t_gallery t_search t_login t_contact t_portfolio post_edit_page t_default t_mpopular">
		<table width="100%" style="margin:40px;">
 		<tr>
 		<td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 0;">
		</div>
            <input type="radio" name="best_magazine_meta_date[layout]" value="1" <?php checked($meta['layout'], "1" , true ); ?>/>
            <br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 -48px;">
		</div>
            <input type="radio" name="best_magazine_meta_date[layout]" value="2" <?php checked($meta['layout'], "2" , true ); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:46px; background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 -98px;">
		</div>
            <input type="radio" name="best_magazine_meta_date[layout]" value="3" <?php checked($meta['layout'], "3" , true ); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 -145px;">
		</div>
            <input type="radio" name="best_magazine_meta_date[layout]" value="4" <?php checked($meta['layout'], "4" , true ); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:46px; background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 -196px;">
		</div>
            <input type="radio" name="best_magazine_meta_date[layout]" value="5" <?php checked($meta['layout'], "5" , true ); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri(); ?>/images/sprite-layouts.png) no-repeat 0 -245px;">
		</div>
            <input type="radio" name="best_magazine_meta_date[layout]" value="6" <?php checked($meta['layout'], "6" , true ); ?> /><br>
                
		</td>
		</tr>
		</table>
        <?php
		
			global $best_magazine_admin_helepr_functions; 
		 ?>
        
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio post_edit_page">
			<input type="text" name="best_magazine_meta_date[content_width]" value="<?php if(!empty($meta['content_width'])) echo esc_attr( $meta['content_width'] ); else echo "1024"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Px &nbsp;&nbsp;&nbsp;<?php echo __(':Content Area Width','best-magazine'); ?></label>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio post_edit_page class_for_main_col">
			<input type="text" name="best_magazine_meta_date[main_col_width]" value="<?php if(!empty($meta['main_col_width'])) echo esc_attr( $meta['main_col_width'] ); else echo "66"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">% &nbsp;&nbsp;&nbsp;&nbsp;<?php echo __(':Main Column Width','best-magazine'); ?></label>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio class_for_js post_edit_page">
			<input type="text" name="best_magazine_meta_date[pr_widget_area_width]" value="<?php if(!empty($meta['pr_widget_area_width'])) echo esc_attr( $meta['pr_widget_area_width'] ); else echo "17"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">% &nbsp;&nbsp;&nbsp;&nbsp;<?php echo __(':Primary Widget Area Width','best-magazine'); ?></label>
		</div>
	</div>
		<div style="margin: 13px 0 11px 4px;" class="t_news t_sitemap t_blog t_gallery t_search t_login t_contact t_portfolio post_edit_page t_default t_mpopular">
			<label>
            <input type="hidden" name="best_magazine_meta_date[fullwidthpage]" value=" " />
			<input type="checkbox" name="best_magazine_meta_date[fullwidthpage]" <?php checked($meta['fullwidthpage'], "on" , true ); ?> />
			<?php echo __('Full Width Page','best-magazine'); ?></label><br/>
		</div>
		
		
        <div style="clear:both; display:block !important"></div>