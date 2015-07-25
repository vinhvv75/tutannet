<?php 

/// licensing 

class best_magazine_licensing_page_class{

	
function dorado_theme_admin_licensing(){
global $best_magazine_web_dor;

$text='
<div id="main_licensing_page" style="width: 95%;margin: 0 auto;"> 
<p>'.
__("This theme is the non-commercial version of the News Magazine theme. You will be able to use it free of charge. It comes with a large number of features. Some of the advanced features are not available for this option. If you want to use those features, you are required to purchase a license.", "best-magazine" ).'</p>
<table class="data-bordered" style="width:543px;color: #555;text-align:center;margin: 0px auto;">
<thead>
<tr> <th scope="col" class="top first" nowrap="nowrap">'.__("Features of the Theme", "best-magazine" ).'</th>
<th scope="col" class="top notranslate" nowrap="nowrap">'.__("Free", "best-magazine" ).'</th>
<th scope="col" class="top notranslate" nowrap="nowrap">'.__("Pro Version", "best-magazine" ).'</th>
</tr>
</thead>
<tbody>
<tr class="">
<td>'.__("WordPress 3.4+ ready +", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("SEO-friendly", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("Custom favicon and logo", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("Possibility to add custom CSS", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("Featured animated slider", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("30 pre-installed fonts", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("Widgets for AdSense, Advertisements and Random posts", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("Child theme support", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("6 built in customizable layouts", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("Social sharing integration", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("Possibility to add custom codes", "best-magazine" ).'</td>
<td class="icon-replace no">'.__("no", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("Full SEO management", "best-magazine" ).'</td>
<td class="icon-replace no">'.__("no", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("Color customization possibility", "best-magazine" ).'</td>
<td class="icon-replace no">'.__("no", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="alt">
<td>'.__("8 different page templates", "best-magazine" ).'</td>
<td class="icon-replace no">'.__("no", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>
<tr class="">
<td>'.__("Built-in shortcodes for Editor", "best-magazine" ).'</td>
<td class="icon-replace no">'.__("no", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>

<tr class="alt">
<td>'.__("Support upon request in 24 hours", "best-magazine" ).'</td>
<td class="icon-replace no">'.__("no", "best-magazine" ).'</td>
<td class="icon-replace yes">'.__("yes", "best-magazine" ).'</td>
</tr>

<tr class="">
<td>'.__("Buy using PayPal or Credit Card", "best-magazine" ).'</td>
<td class="price" style="text-align:center; color:#FF7721; text-shadow: 1px 1px #aaa; font-size:20px;">'.__("Free", "best-magazine" ).'</td>
<td>
<div class="buy_theme" style="float:left;"><a href="'.$best_magazine_web_dor.'/wordpress-themes/best-magazine.html" target="_blank"><div></div></a></div>
</td>
</tr>
</tbody>
</table>
	</div >';
	return $text;
}



}


?>