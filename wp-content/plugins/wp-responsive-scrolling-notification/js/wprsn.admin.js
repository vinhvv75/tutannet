jQuery(document).ready(function ($) {
    var media_frame, _currentInput;
    $('#upload_notify_image').on('click', _upload);
    function _upload(event){
        if ( media_frame ) {
            media_frame.remove();
        }
        media_frame = wp.media.frames.media_frame = wp.media({
            className: 'media-frame',
            frame: 'select',
            multiple: false,
            title: 'Select a image for the Notification',
            library: {
                type: 'image'
            },
            button: {
                text:  'Use this image'
            }
        });

        _currentInput = jQuery(event.target).prev('input');
        media_frame.on('select', function(){
            var media_attachment = media_frame.state().get('selection').first().toJSON();
            _currentInput.val(media_attachment.url);
        });

        // Now that everything has been set, let's open up the frame.
        media_frame.open();
        return false;
    }

    $('.wprsn-color-picker').wpColorPicker();

    var _notificationBox = $('#wprsn-notification');
    var _easein = _notificationBox.data('easein');
    if(Modernizr.csstransitions){
        _notificationBox.show().addClass('animated '+ _easein);
    }else{
        _notificationBox.show().animate({opacity: 1}, 400);
    }

    $("#wprsn-content").focus(function() {
        if($(this).val()=="Add the Notification content here..."){
            var $this = $(this);
            $this.select();
            // Work around Chrome's little problem
            $this.mouseup(function() {
                // Prevent further mouseup intervention
                $this.unbind("mouseup");
                return false;
            });
        }
    });
    _resetNotifyName();
	function _resetNotifyName(){
        jQuery('.wprsn-form-content').each(function(index) {
        	$(this).find('.notify-num').html(index+1);
        	if(index==0) $(this).find('.remove-notification').hide();
        	else $(this).find('.remove-notification').show();
            $(this).find('.wprsn-form-content').each(function() {
                $(this).find('input').each(function() {
                    var _name = $(this).data('name')+'['+index+'][]';
                    $(this).attr('name', _name);
                })
            });
        });
    }
});