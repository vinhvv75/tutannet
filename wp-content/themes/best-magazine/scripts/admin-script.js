jQuery(document).ready(function ($) {
	/* set uploader size in resizing*/
	tb_position = function() {
		var tbWindow = jQuery('#TB_window'),
			width = jQuery(window).width(),
			H = jQuery(window).height(),
			W = ( 850 < width ) ? 850 : width,
			adminbar_height = 0;

		if ( jQuery('#wpadminbar').length ) {
			adminbar_height = parseInt(jQuery('#wpadminbar').css('height'), 10 );
		}

		if ( tbWindow.size() ) {
			tbWindow.width( W - 50 ).height( H - 45 - adminbar_height );
			jQuery('#TB_iframeContent').width( W - 50 ).height( H - 75 - adminbar_height );
			tbWindow.css({'margin-left': '-' + parseInt( ( ( W - 50 ) / 2 ), 10 ) + 'px'});
			if ( typeof document.body.style.maxWidth !== 'undefined' )
				tbWindow.css({'top': 20 + adminbar_height + 'px', 'margin-top': '0'});
		}
	};
	
	/*setup the var*/
	jQuery('.upload-button:not("#main_slider_div .upload-button")').click(function () {
		window.parent.uploadID = jQuery(this).prev('input');
		/*grab the specific input*/
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	window.send_to_editor = function (html) {
		imgurl = jQuery('img', html).attr('src');
		window.parent.uploadID.val(imgurl);
		/*assign the value to the input*/
		tb_remove();
	};
	
});