/**
*  js for TuTanNet
* 
*/

jQuery(document).ready(function($){
//welcomeScreen();




        
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




window.onload = function() { 
	// remove tooltips
	var alinks = document.getElementsByTagName("a"); for (var i = 0; i < alinks.length; i++) { alinks[i].removeAttribute("title"); } 	
}


$('a[data-toggle="tab"]').on('click', function(e){
	var tab = $(this).attr('href');
	if (tab = '#tin-tuc-phat-su') {
		$('a[data-toggle="load_news"]').click();
	}
	if (tab = '#phat-hoc') {
		$('a[data-toggle="load_teaching"]').click();
	}
	if (tab = '#phap-am') {
		$('a[data-toggle="load_media"]').click();
	}
	$('a[data-toggle="menu"]').click();
	$(this).tab('show');
	e.preventDefault();
	
});

function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}


function extractUrl(input)
{
 // remove quotes and wrapping url()
 return input.replace(/"/g,"").replace(/url\(|\)$/ig, "");
}




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

   
}); // End
