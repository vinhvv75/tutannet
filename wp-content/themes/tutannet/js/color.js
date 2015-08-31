/**
*  Color js for TuTanNet
* 
*/

jQuery(document).ready(function($){


var 
	//** Elements **//
	
	// site-intro
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
	inputSearchForm = document.getElementById('inputSearchForm');
	iconSearchForm = document.getElementById('iconSearchForm'),
	buttonSearchForm = document.getElementById('buttonSearchForm'),


	colorThief = new ColorThief(),
	bgFull = colorThief.getColor(document.getElementById('site-intro-img')),
	bgFulltoString = 'rgb(' + bgFull[0] + ',' + bgFull[1] + ',' + bgFull[2] + ')',
	
	//** Colors **//
	primaryColor = tinycolor(bgFulltoString),
	
	lightenColor30 = primaryColor.lighten(30).toHexString(),
	darkenColor30 = primaryColor.darken(30).toHexString(),
	
	tetrad = primaryColor.tetrad(),
	tetradColors = tetrad.map(function(t) { return t.toHexString(); }),
	
	analogous = primaryColor.analogous(),
	analogousColors = analogous.map(function(t) { return t.toHexString(); }),
	
	mostReadable = tinycolor.mostReadable(primaryColor, tetradColors,{includeFallbackColors:true,level:"AAA",size:"small"}).toHexString(),
	mostReadableTetrad = tinycolor.mostReadable(primaryColor, tetradColors,{includeFallbackColors:false,level:"AAA",size:"small"}).toHexString(),	
	mostReadableAnalogous = tinycolor.mostReadable(primaryColor, analogousColors,{includeFallbackColors:false,level:"AAA",size:"small"}).toHexString()
	
	
	;
	
	
//	console.log('  /********************/\n /   Color Analysis   /\n/********************/');
//	console.log('Primary Color: ' + primaryColor.toHexString());
//	console.log('Lighten Color (30): ' + lightenColor30);
//	console.log('Darken Color (30): ' + darkenColor30);
//	console.log('Tetrad Colors: ' + tetradColors[0] + ' ' + tetradColors[1] + ' ' + tetradColors[2] + ' ' + tetradColors[3]);
//	console.log('Analogous Colors: ' + analogousColors[0] + ' ' + analogousColors[1] + ' ' + analogousColors[2] + ' ' + analogousColors[3] + ' ' + analogousColors[4] + ' ' + analogousColors[5]);
//	
//	console.log('Most Readable with Fallback:', mostReadable);
//	console.log('Most Readable in Tetrad:', mostReadableTetrad);
//	console.log('Most Readable in Analogous:', mostReadableAnalogous);
//	console.log('\n');
	


// paint search wrap
var secondaryColor;
(mostReadable == "#ffffff") ? secondaryColor = lightenColor30 : secondaryColor = mostReadableAnalogous;

iconSearchForm.style.color = secondaryColor;
$(textSearchTagCloud).hover(function(){
      $(this).css({"color": mostReadable, "background-color": secondaryColor});
      }, function(){
      $(this).css({"color": "#000000", "background-color": "#FDF7F0"});
});

inputSearchForm.addEventListener("focus", function(){ 
	$(buttonSearchForm).css({"background-color": "rgba(255,255,255,1"}); 
});
inputSearchForm.addEventListener("blur", function(){ 
	$(buttonSearchForm).css({"background-color": "rgba(255,255,255,0.8"});
});


// paint login wrap
for (var i=0;i<iconLoginWrap.length; i++) {
    iconLoginWrap[i].style.color = primaryColor;
}
(mostReadable == "#000000") ? 
BGContainer.style.backgroundColor = darkenColor30 : document.getElementById('site-intro-img').style.opacity = "1";                



}); // End








