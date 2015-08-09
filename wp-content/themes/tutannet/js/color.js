/**
*  Color js for TuTanNet
* 
*/

jQuery(document).ready(function($){

colorThief = new ColorThief();
var bgFull1 = colorThief.getColor(document.getElementById('cd-intro-img')),
	bgFull2 = getAverageRGB(document.getElementById('cd-intro-img'),0,-1,-1),
	bgTop = getAverageRGB(document.getElementById('cd-intro-img'),70,-1,70),
	bgBottom = getAverageRGB(document.getElementById('cd-intro-img'),-100,-1,100),
	colorBgFull1 = $c.complement(bgFull1).a,
	colorBgFull2 = getContrastRGB(bgFull1),
	colorBgFull3 = getContrastRGB(bgFull2),
	colorBgTop = getContrastRGB(bgTop),
	colorBgBottom = getContrastRGB(bgBottom),
	textSecondaryColor = getContrastRGB(colorBgFull1);
	primaryColor = 'rgb('+bgFull1[0]+','+bgFull1[1]+','+bgFull1[2]+')',
	secondaryColor = 'rgb('+colorBgFull1[0]+','+colorBgFull1[1]+','+colorBgFull1[2]+')',
	borderColor = (getContrastRGBo(bgFull1,0.4)),
	
	sectionItem = document.getElementsByClassName('site-section-nav-item'),
	textSectionItem = $(sectionItem).find('b'),
	iconSectionItem = $(sectionItem).find('i'),

	introNav = document.getElementById('site-intro-nav'),
	textIntroNav = $(introNav).find('a'),

	searchTagCloud = document.getElementById('search_tag_cloud'),
	textSearchTagCloud = $(searchTagCloud).find('a'),
	
	searchForm = document.getElementById('searchform'),
	inputGroupSearchForm = $('#searchform .input-group'),
	iconSearchForm = document.getElementById('iconSearchForm'),
	buttonSearchForm = document.getElementById('buttonSearchForm')
	;
	
	console.log(colorBgFull3);
	console.log(colorBgFull2);


for (var i=0;i<textSectionItem.length; i++) {
    textSectionItem[i].style.color = primaryColor;
}

for (var i=0;i<iconSectionItem.length; i++) {
    iconSectionItem[i].style.color = primaryColor;
}

for (var i=0;i<textIntroNav.length; i++) {
    textIntroNav[i].style.color = colorBgFull2;
}

for (var i=0;i<textSearchTagCloud.length; i++) {
    textSearchTagCloud[i].style.color = colorBgFull2;
    textSearchTagCloud[i].style.borderColor = borderColor;    
}

inputGroupSearchForm[0].style.borderColor = iconSearchForm.style.color = secondaryColor;  

//$(inputGroupSearchForm).find('input')[0].style.backgroundColor = iconSearchForm.style.backgroundColor = textSecondaryColor;

console.log(inputGroupSearchForm[0]);

$(buttonSearchForm).hover(function(){
	  iconSearchForm.style.color = textSecondaryColor;
      $(this).css({"background-color": secondaryColor});
      }, function(){
      iconSearchForm.style.color = secondaryColor;
      $(this).css({"background-color": "white"});
      
}); 

$(textSearchTagCloud).hover(function(){
      $(this).css({"color": textSecondaryColor, "background-color": secondaryColor, "border-color": secondaryColor});
      }, function(){
      $(this).css({"color": colorBgFull2, "background-color": "transparent", "border-color": borderColor});
});
      
            
      



}); // End


function getAverageRGB(imgEl,slidepoint,canvas_width,canvas_height) {
    
    var blockSize = 5, // only visit every 5 pixels
        defaultRGB = {R:0,G:0,B:0}, // for non-supporting envs
        canvas = document.createElement('canvas'),
        context = canvas.getContext && canvas.getContext('2d'),
        data, width, height,
        i = -4,
        length,
        rgb = {R:0,G:0,B:0},
        count = 0;
        
    if (!context) {
        return defaultRGB;
    }
    
    if (canvas_height = -1) {
    	height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
    }
    else { height = canvas.height = canvas_height; }
    
    if (canvas_width = -1) {
    	width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;
    }
    else { height = canvas.width = canvas_width; }
    
    
    
    context.drawImage(imgEl, 0, slidepoint);
    
    try {
        data = context.getImageData(0, 0, width, height);
    } catch(e) {
        /* security error, img on diff domain */alert('x');
        return defaultRGB;
    }
    
    length = data.data.length;
    
    while ( (i += blockSize * 4) < length ) {
        ++count;
        rgb.R += data.data[i];
        rgb.G += data.data[i+1];
        rgb.B += data.data[i+2];
    }
    
    // ~~ used to floor values
    rgb.R = ~~(rgb.R/count);
    rgb.G = ~~(rgb.G/count);
    rgb.B = ~~(rgb.B/count);
    
    return rgb;
}



function isDarkRGB(rgb) {
	var c = 'rgb('+rgb[0]+','+rgb[1]+','+rgb[2]+')';    
	var o = Math.round(((parseInt(rgb[0]) * 299) + (parseInt(rgb[1]) * 587) + (parseInt(rgb[2]) * 114)) /1000);    
	return (o >= 128) ? 'false' : 'true';
}
function isDarkHex(hexcolor) {
	var r = parseInt(hexcolor.substr(0,2),16);
	var g = parseInt(hexcolor.substr(2,2),16);
	var b = parseInt(hexcolor.substr(4,2),16);
	var yiq = ((r*299)+(g*587)+(b*114))/1000;
	return (yiq >= 128) ? 'false' : 'true';
}
function getContrastRGB(rgb){
	var c = 'rgb('+rgb[0]+','+rgb[1]+','+rgb[2]+')';    
	var o = Math.round(((parseInt(rgb[0]) * 299) + (parseInt(rgb[1]) * 587) + (parseInt(rgb[2]) * 114)) /1000);    
	return (o >= 128) ? 'black' : 'white';
}
function getContrastRGBo(rgb,opacity){
	var c = 'rgb('+rgb[0]+','+rgb[1]+','+rgb[2]+')';    
	var o = Math.round(((parseInt(rgb[0]) * 299) + (parseInt(rgb[1]) * 587) + (parseInt(rgb[2]) * 114)) /1000);    
	return (o >= 128) ? 'rgba(0,0,0,'+opacity+')' : 'rgba(255,255,255,'+opacity+')';
}
function getContrastHex(hexcolor){
	var r = parseInt(hexcolor.substr(0,2),16);
	var g = parseInt(hexcolor.substr(2,2),16);
	var b = parseInt(hexcolor.substr(4,2),16);
	var yiq = ((r*299)+(g*587)+(b*114))/1000;
	return (yiq >= 128) ? 'black' : 'white';
}



function isDay() {
	var hr = (new Date()).getHours();
	if (hr >=6 && hr <= 18) {
		return true;
	}
	else {
		return false;
	}
}




