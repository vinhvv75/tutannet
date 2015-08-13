/**
*  Color js for TuTanNet
* 
*/

jQuery(document).ready(function($){

colorThief = new ColorThief();
var 
	//** Elements **//
	BGContainer = document.getElementById('site-intro'),
	sectionItem = document.getElementsByClassName('site-section-nav-item'),
	textSectionItem = $(sectionItem).find('b'),
	iconSectionItem = $(sectionItem).find('i'),

	introNav = document.getElementById('site-intro-nav'),
	textIntroNav = $(introNav).find('a'),


	// login_wrap
	loginWrap = document.getElementById('login_wrapper'),
	textLoginWrap = $(loginWrap).find('span'),
	userPosts = document.getElementById('user_posts'),
	iconLoginWrap = $(loginWrap).find('span i.fa-stack-1x'),
	
	// searchform_wrap
	searchTagCloud = document.getElementById('search_tag_cloud'),
	textSearchTagCloud = $(searchTagCloud).find('a'),
	searchForm = document.getElementById('searchform'),
	inputGroupSearchForm = $(searchForm).find('.input-group'),
	iconSearchForm = document.getElementById('iconSearchForm'),
	buttonSearchForm = document.getElementById('buttonSearchForm'),



	bgFull = colorThief.getColor(document.getElementById('site-intro-img')),
	bgFulltoString = 'rgb(' + bgFull[0] + ',' + bgFull[1] + ',' + bgFull[2] + ')',
	
	//** Colors **//
	primaryColor = tinycolor(bgFulltoString),
	tetrad = primaryColor.tetrad(),
	tetradColors = tetrad.map(function(t) { return t.toHexString(); }),
	
	mostReadable = tinycolor.mostReadable(primaryColor, tetradColors,{includeFallbackColors:false,level:"AAA",size:"small"}).toHexString();
	
	mostReadableFallback = tinycolor.mostReadable(primaryColor, tetradColors,{includeFallbackColors:true,level:"AAA",size:"small"}).toHexString()
		
	
	
	;
	
	
	console.log('  /********************/\n /   Color Analysis   /\n/********************/');
	console.log('Primary color:', primaryColor.toHexString());
	console.log('Tetrad colors: ' + tetradColors[0] + ' ' + tetradColors[1] + ' ' + tetradColors[2] + ' ' + tetradColors[3]);
	console.log('Most readable without fallback:', tinycolor.mostReadable(primaryColor, tetradColors,{includeFallbackColors:false,level:"AAA",size:"small"}).toHexString() );
	console.log('Most readable with FALLBACK:', tinycolor.mostReadable(primaryColor, tetradColors,{includeFallbackColors:true,level:"AAA",size:"small"}).toHexString() );
	console.log('\n');
	


//for (var i=0;i<textSectionItem.length; i++) {
//    textSectionItem[i].style.color = colorBgBottom;
//}
//
//for (var i=0;i<iconSectionItem.length; i++) {
//    iconSectionItem[i].style.color = colorBgBottom;
//}
//
//for (var i=0;i<textIntroNav.length; i++) {
//    textIntroNav[i].style.color = colorBgFull2;
//}
//
// paint search wrap
//iconSearchForm.style.color = secondaryColor;  
//$(buttonSearchForm).hover(function(){
//	  iconSearchForm.style.color = textSecondaryColor;
//      $(this).css({"background-color": secondaryColor});
//      }, function(){
//      iconSearchForm.style.color = secondaryColor;
//      $(this).css({"background-color": "rgba(255,255,255,0.8"});
//      
//});
//for (var i=0;i<textSearchTagCloud.length; i++) {
//    textSearchTagCloud[i].style.color = colorBgFull2;
//    textSearchTagCloud[i].style.borderColor = borderColor;    
//}
//$(textSearchTagCloud).hover(function(){
//      $(this).css({"color": textSecondaryColor, "background-color": secondaryColor, "border-color": secondaryColor});
//      }, function(){
//      $(this).css({"color": colorBgFull2, "background-color": "transparent", "border-color": borderColor});
//});


// paint login wrap
for (var i=0;i<iconLoginWrap.length; i++) {
    iconLoginWrap[i].style.color = primaryColor;
}
BGContainer.style.backgroundColor = primaryColor;
                
      



}); // End








