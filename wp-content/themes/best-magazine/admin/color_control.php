<?php
/*
authors :	Davit Sargsyan 
			Dianna Arakelyan
			Narek Mehrabyan
			Hakop Griqoryan
			Sona Martirosyan
*/

class best_magazine_color_control_page_class{

	public $options_colorcontrol;
	
	
	/***********************************/
	/* 			INITIAL PAGE		   */
	/***********************************/
		
	function __construct(){

		// customize
		add_action( 'customize_preview_init', array($this,'magazine_customize_preview_js') );

	

	}

	
	/***********************************/
	/* 		 BACK END ADMIN HTML       */
	/***********************************/
	
	public function dorado_theme_admin_color_control(){
		?>
		<div style="margin: 0 auto;width:90%;padding-bottom:0px; padding-top:0px;">		
			<div class="optiontitle" style="">
				  <p style="font-size:15px;font-weight:bold;color: #333;"><?php echo __('The color customization parameters are disabled in free version. Please buy the commercial version in order to enable this functionality.','best-magazine'); ?></p>
				  <img src="<?php echo get_template_directory_uri(); ?>/images/color.jpg" width="100%" style="border-bottom: 1px solid rgb(206, 206, 206);">
			</div>
	     </div>
	<?php }

	/***********************************/
	/*SCRIPT FOR DEFAUL COLORED SCHEME */
	/***********************************/

	public function magazine_customize_preview_js() {
	wp_enqueue_script( 'magazine-customizerfunction', get_template_directory_uri() . '/scripts/theme-customizerfunctions.js' );
	 	wp_enqueue_script( 'magazine-customizer', get_template_directory_uri() . '/scripts/theme-customizer.js', array( 'customize-preview' ) , '20130916', true );
	?><script>curent_template_url='<?php echo get_template_directory_uri('template_url');  ?>'</script><?php
	}




	/***********************************/
	/*SCRIPT FOR DEFAUL COLORED SCHEME */
	/***********************************/

	private function default_themes_jquery($array_of_colors=NULL){
		// print array if it not set
		if($array_of_colors===NULL){
			echo "\$array_of_colors=array(<br>array(<br>";
			foreach($this->options_colorcontrol as $key=>$special_color){
				if($special_color['type']=='picker'){
					echo "	\"".$special_color['var_name']."\" => \"".$special_color['std']."\", <br>";
				}
			}
			echo "),<br>array(<br>";
				foreach($this->options_colorcontrol as $key=>$special_color){
					if($special_color['type']=='picker'){
						echo "	\"".$special_color['var_name']."\" => \"".$special_color['std']."\", <br>";
					}
				}
			die();
		
		}
		// print qjeru and initial colors standart themes
		else
		{	
		echo '<script>jQuery(document).ready(function(){
		jQuery("#color_scheme").change(function () {
		var bkg = jQuery("#color_scheme option:selected").val();  ';
		
		foreach($array_of_colors as $key=>$colors){
		echo 'if (bkg == "Theme-'.($key+1).'") {';
		foreach($colors as $key=>$color){	
		echo 'jQuery("#'.$key.'").iris("color", "'.$color.'"); ';
		
		}
		echo " }";
		}
		
		echo "});  });</script>";
		
		}
		
		
	}
	/***********************************/
	/*HTML FOR DEFAUL COLORED SCHEME */
	/***********************************/

	private function default_theme_select($array_of_colors=NULL){
		$count_of_selects=count($array_of_colors);

		
		echo '<select name="color_scheme" id="color_scheme">';
		
		for($i=1;$i<=$count_of_selects;$i++){
			$selected='';
			$selected=selected($this->options_colorcontrol['color_scheme']['std'], 'Theme-'.$i );
			echo '<option value="Theme-'.$i.'" '.$selected.'>Theme-'.$i.'</option>';
			
		}
		
		echo '</select>';
		
		
	}
	
	/***********************************/
	/*  REQUERD FUNCTION  FOR COLORS   */
	/***********************************/

	private function get_option_type($type=''){
		$cur_type_elements=array();
		$k=0;
		foreach( $this->options_colorcontrol as $option ){
			
			if(isset($type) && isset($option['type']) && $option['type'] == $type ){
			
				$cur_type_elements[$k]=$option;
				$k++;
			}
			
		}
		return $cur_type_elements;
	}
	
	/***********************************/
	/*  REQUERD FUNCTION  FOR COLORS   */
	/***********************************/
	
	private function negativeColor($color)
	{
		//get red, green and blue
		$r = substr($color, 0, 2);
		$g = substr($color, 2, 2);
		$b = substr($color, 4, 2);
		
		//revert them, they are decimal now
		$r = 0xff-hexdec($r);
		$g = 0xff-hexdec($g);
		$b = 0xff-hexdec($b);
		
		//now convert them to hex and return.
		return dechex($r).dechex($g).dechex($b);
	}
	
	/***********************************/
	/*  REQUERD FUNCTION  FOR COLORS   */
	/***********************************/
	
	private function ligthest_brigths($color,$pracent=15){
	
		$new_color=$color;
		if(!(strlen($new_color==6) || strlen($new_color)==7))
		{
			return $color;
		}
		$color_vandakanishov=strpos($new_color,'#');
		if($color_vandakanishov == false) {
			$new_color= str_replace('#','',$new_color);
		}
		$color_part_1=substr($new_color, 0, 2);
		$color_part_2=substr($new_color, 2, 2);
		$color_part_3=substr($new_color, 4, 2);
		$color_part_1=dechex( (int) (hexdec( $color_part_1 ) + (( 255-( hexdec( $color_part_1 ) ) ) * $pracent / 100 )));
		$color_part_2=dechex( (int) (hexdec( $color_part_2)  + (( 255-( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
		$color_part_3=dechex( (int) (hexdec( $color_part_3 ) + (( 255-( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
		$new_color=$color_part_1.$color_part_2.$color_part_3;
		if($color_vandakanishov == false){
			return $new_color;
		}
		else{
			return '#'.$new_color;
		}
	}
	
	/***********************************/
	/*  REQUERD FUNCTION  FOR COLORS   */
	/***********************************/
	
	private function hex_to_rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';
		//Return default if no color provided
		if(empty($color))
			return $default; 
		//Sanitize  color if "#" is provided 
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}
		//Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
		   $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
		   $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
		   return $default;
		}
		//Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);
		//Check if opacity is set(rgba or rgb)
		if($opacity){
			if(abs($opacity) > 1)
			$opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
		} else {
			$output = 'rgb('.implode(",",$rgb).')';
		}
		
		//Return rgb(a) color string
		return $output;
	}
	
	
	private function darkest_brigths($color,$pracent){

	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) - (hexdec( $color_part_1 )* $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  - (( ( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) - (( ( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	if(strlen($color_part_1)<2) $color_part_1="0".$color_part_1;
	if(strlen($color_part_2)<2) $color_part_2="0".$color_part_2;
	if(strlen($color_part_3)<2) $color_part_3="0".$color_part_3;

	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}

}
		
}
 
