/**
*  js for TuTanNet
* 
*/

jQuery(document).ready(function($){
welcomeScreen();
        
$('.search-icon i.fa-search').click(function() {
    $('.search-icon .ak-search').toggleClass('active');
});

$('.ak-search .close').click(function() {
    $('.search-icon .ak-search').removeClass('active');
});

$('.overlay-search').click(function() {
    $('.search-icon .ak-search').removeClass('active');
});

$('.nav-toggle').click(function() {
    $('.nav-wrapper .menu').slideToggle('slow');
    $(this).parent('.nav-wrapper').toggleClass('active');
});

$('.nav-wrapper .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

$('.nav-wrapper .sub-toggle').click(function() {
    $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
    $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
});

new WOW().init();
 
// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });    
    
});

// display post image & post excerpt when hover in first-block's blockposts-wrapper
$(".first-block .rightposts-wrapper .blockposts-wrapper .post-title a").hover(function(event){
    var img = $(this).attr("src");
    var excerpt = $(this).parents('li').find('.post-content').html();
    var ratio;
    $("#first_block_imageHolder").empty();
    if ($(this).parents('li').is(':first-child')) { ratio = 2; } 
    else { ratio = 1.5; }
    if ($(this).parents('li').is(':last-child')) {
    	$("#first_block_imageHolder").append('<div class="post-content">'+ excerpt +'</div>');
    	$("#first_block_imageHolder").append('<img src="'+ img +'" />');
    	ratio = 1.1;
    } else {
    	$("#first_block_imageHolder").append('<img src="'+ img +'" />');
    	$("#first_block_imageHolder").append('<div class="post-content">'+ excerpt +'</div>');
    }
    var position = $(this).offset().top - $(".first-block .postimages-wrapper").offset().top - $("#first_block_imageHolder").height()/ratio;
    $("#first_block_imageHolder").css({"top": position});
    $('#first_block_imageHolder').removeClass('fadeOutDown');
    $('#first_block_imageHolder').addClass('fadeInUp');
	}, function(){
		$('#first_block_imageHolder').removeClass('fadeInUp');
		$('#first_block_imageHolder').addClass('fadeOutDown');
}); 

// tab toggle in navigation, toolbar
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  e.target; // newly activated tab
  e.relatedTarget; // previous active tab
});
$('a[data-toggle="tab"]').click(function() {
	var top = $('.tab-content').offset().top - 30;
	$('html,body').animate({
	        scrollTop: top},
	        'slow');
	var section_title = document.getElementById('section-title');
	section_title.innerHTML = ($(this).find('b').html());
});

// initalize bootstrap tooltip
$('[data-toggle="tooltip"]').tooltip();
$('#site-toolbar a').tooltip({placement: "bottom", template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner" style="white-space: nowrap;"></div></div>'});

// remove tooltips
window.onload = function() { var alinks = document.getElementsByTagName("a"); for (var i = 0; i < alinks.length; i++) { alinks[i].removeAttribute("title"); } }

// Search Toggle
$('#search_toggle').click(function() {
	$('#site-section-nav, #cd-intro-tagline').addClass('animated fadeOut');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline').addClass('is-disable'); 
		$('#searchform').removeClass('is-disable');
		$('#searchform').addClass('fade in');
	}, 500 );
	$('#section_search').tab('show');
});


// Login Toggle
$('#login_toggle').click(function() {
	$('#site-section-nav, #cd-intro-tagline').addClass('animated fadeOut');
	setTimeout(function(){ 
		$('#site-section-nav, #cd-intro-tagline').addClass('is-disabled'); 
		$('#loginform').removeClass('is-disabled');
		$('#loginform').addClass('fadeIn');
	}, 500 );
});

//$('#login_toggle').popover(options);



function extractUrl(input)
{
 // remove quotes and wrapping url()
 return input.replace(/"/g,"").replace(/url\(|\)$/ig, "");
}

colorThief = new ColorThief();
var rgb = colorThief.getColor(document.getElementById('cd-intro-img'));
var c = $c.complement(rgb).a;
var rgb2 = getAverageRGB(document.getElementById('cd-intro-img'));
var c2 = $c.complement(rgb).a;

var text = document.getElementById('headline');
var text2 = document.getElementsByClassName('site-section-nav-item')
var text2_c = $(text2).find('b');
var text3 = document.getElementsByClassName('site-section-nav-item');
var text3_c = $(text3).find('i');
var text4 = document.getElementById('site-intro-nav');
var text4_c = $(text4).find('a');
//console.log(text3_c);
    
//text.style.color = 'rgb('+rgb.r+','+rgb.b+','+rgb.g+')';
//text.style.color = 'rgb('+rgb2[4][0]+','+rgb2[4][1]+','+rgb2[4][2]+')';

var textColor;
//if (isDark(rgb2,false)) { textColor = 'white'; } else { textColor = 'black';}
textColor = isDark(rgb2,true); 
//
console.log(textColor);
console.log(rgb);
console.log(c2)
//var primaryColor = 'rgb('+rgb2.r+','+rgb2.g+','+rgb2.b+')'; 
var primaryColor = 'rgb('+c2[0]+','+c2[1]+','+c2[2]+')'; 
text.style.color = primaryColor;
for (var i=0;i<text2_c.length; i++) {
    text2_c[i].style.color = textColor;
}

for (var i=0;i<text3_c.length; i++) {
    text3_c[i].style.color = textColor;
}

for (var i=0;i<text4_c.length; i++) {
    text4_c[i].style.color = textColor;
}
//
//var classImg = [];
//classImg = document.getElementsByClassName('section-featured-image');
//var rgb3 = colorThief.getColor(document.getElementsByClassName('section-featured-image'));
//var block_overview = $('#block-overview');
//var text3 = document.getElementsByTagName('h2');
//
//for (var i=0;i<classImg.length; i++) {
//    var rgb3 = [];
//    rgb3[i] = colorThief.getColor(classImg[i]);
//}
//
//console.log(rgb3[0]);
//console.log(rgb3[1]);
//console.log(rgb3[2]);
//
//console.log(text3[0]);
//console.log(text3[1]);
//console.log(text3[2]);
//
//for (var i=0;i<text3.length; i++) {
//    text3[i].style.color = 'rgb('+rgb3[i].r+','+rgb3.b[i]+','+rgb3[i].g+')';
//}
//
//console.log(text2);
//console.log(text2.length);
//console.log(text2[0]);
//console.log(text2[1]);
//
//
//console.log('Background Image Colors:');
//console.log(rgb2[0]);
//console.log(rgb2[1]);
//console.log(rgb2[2]);
//console.log(rgb2[3]);
//console.log(rgb2[4]);
//console.log('Selected Color:', rgb2[4][0], rgb2[4][1], rgb2[4][2]);
//console.log('Average Color:', rgb.r, rgb.g, rgb.b);



// scale section-featured-image's height to equal with its width
//var h = $('.section-featured-image').width();
//$('.section-featured-image').css({'height':h+'px'});

// welcome screen on console
function welcomeScreen() {
console.log('                                    ................                              _______      __ //            ________   __                                            ');
console.log('                                  .......................                        |  ___  \\    // \\             |        | |  |                                           ');
console.log('                           .........,,,,,,,...,,,,,................              |  |__| |   ____     _______   --|  |--  |  |      __   _\'| ______\'| _______   ______   ');
console.log('                       .......,,,                 ,,, .........                  |   ___/_  | _\\_|   |   __  \\    |  |    |  |___  | |  | | |  __  | |   __  \\ /  __  \\  ');
console.log('                   ......,,                          ,,,.........                |  |__|  | | |_\\__  |  | |  |    |  |    |  ___ | | |__| | | |__| | |  | |  | | |__| |  ');
console.log('               .......,,,                               ,,,,....                 |________| |____\\_| |__| |__|    |__|    |__| |_| |______| |_____ | |__| |__|  \\___| |  ');
console.log('        ...........,,,                                   ,,,,.......                                                                                            ____| |  ');
console.log('     .............,,,       	             /““            ,,,......                                                                                           |_____/   ');
console.log('             ...,,,                        /   |              ,,.....                       ________            ________                                                ');
console.log('       ........ ,,                         \\  ’/_______________________________            |        |   \\\\     |        | / \\                                           ');
console.log('          ... ,,,                          /  /“---------------------------------           --|  |-- _    _\'|   --|  |--  ___     _______                               ');
console.log('        ..... ,,                          /  /                                                |  |  | |  | |      |  |   / - \\   |   __  \\                              ');
console.log('  .......... ,,,                         ’  /    /    /    /    /    ’   ’   ’                |  |  | |__| |      |  |  / /_\\ \\  |  | |  |                              ');
console.log('       ...... ,,                        ”  /    /    /    /    /     ’   ’   ’                |__|  \\______/      |__| /__/ \\__\\ |__| |__|                              ');
console.log('..............,,                     __”__’    /    /    /    /     ‘   ”   ”                                                                                           ');
console.log('            __ ,                 ___”” __’  __”    ’    ’    ’     /   ”   ”                                                                                            ');
console.log('             \\  ,__         ___’‘__” __”   ’   ___” ___” ___”  ___’ __” ___”                               TuTanNet (c) 2015                                            ');
console.log('            | \\    “”______””  __” __”       __’                                   Powered by Wordpress & Very Grateful to many Open Sources and their Contributors.    ');
console.log('            |  \\___           __”                                                  Chuatutan.net is the official website of Tu Tan Monastery,                           ');
console.log('            “________________________________________________________________      located in 90/153 Canh Mang Thang 8, W. 12, Tan Binh Dist, HCM City, Vietnam         ');
console.log('             “   “  \\ “”| 0 |”’| U || 0 |”’| U || 0 |”’| U || 0 |”’| U || 0 |      under the direct guidance of Buddhist Master Thich Vien Giac.                        ');
console.log('             ;__ ;__ \\__| 0 |__| U || 0 |”’| U || 0 |”’| U || 0 |”’| U || 0 |      This project was crafted by whole hearts of us - Buddhist followers                  ');
console.log('               “------------------------------------------------------------       in order to bring useful information of the monastery\'s activities                   ');
console.log('                 _’----------------------------------------------------------      and depict the Teachings of Buddha that lead people to be enlightmmented:            ');
console.log('        -----“““---,,--------------------------------------------------------      right speech, right goals, a mind focused on what is real,                           ');
console.log('    ‘‘‘---“““----------------------------------------------------------------      a heart focused on loving others.\n                                                    ');


}

   
});