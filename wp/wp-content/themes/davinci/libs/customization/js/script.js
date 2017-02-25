jQuery( function($) {
    $('.cz_color').wpColorPicker({
        defaultColor: false,
        change: function(event, ui){ },
        clear: function(){ },
        hide: true,
        palettes: true
    });

    $('.cz_upload_file').click(function(e) {
        e.preventDefault();
        var button = $(this);
        var custom_uploader = wp.media({
            multiple: false
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $(button).parent().prev().attr('src', attachment.url);
                $(button).prev().val(attachment.url);
            })
            .open();

        return false;
    });

    $('.cz_remove_file').click(function(){
        var r = true;//confirm("Уверены?");
        if (r == true) {
            var src = $(this).parent().prev().attr('data-src');
            $(this).parent().prev().attr('src', src);
            $(this).prev().prev().val('');
        }
        return false;
    });
});