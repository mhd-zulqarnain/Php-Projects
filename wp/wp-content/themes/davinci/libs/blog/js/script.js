/**
 * Created by pavel on 26.01.2016.
 */
jQuery( function($) {

	$('.blog-item-main').on('click','.product_blog img', function(){
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			$(button).attr('src', attachment.url);
			$(button).prev().val(attachment.id);
			wp.media.editor.send.attachment = send_attachment_bkp;
		};
		wp.media.editor.open(button);
		return false;
	});

	/*$('.cz_remove_file').click(function(){
		var r = confirm("Уверены?");
		if (r == true) {
			var src = $(this).parent().prev().attr('data-src');
			$(this).parent().prev().attr('src', src);
			$(this).prev().prev().val('');
		}
		return false;
	});*/

	$('.blog-item-remote' ).on('click', function(){
		$(this).closest('tr').remove();
		return false;
	});
	$('.add-blog-item' ).on('click', function(){
		var $btn = $(this);
		if($btn.hasClass('disabled'))
			return false;
		var key = $btn.addClass('disabled').data('key');
		key++;
		$(this ).data('key', key);

		$.ajax( {
			url     : ajaxurl,
			type    : "POST",
			async   : true,
			data    : {
				key : key,
				action   : "item_blog"
			},
			success : function(data){
				$('.blog-item-main tbody' ).append(data);
				//tinyMCE.init({ selector: 'blog-item-title-' +key});
				//tinyMCE.execCommand('mceAddEditor', true, 'blog-item-title-' + key);
				//tinyMCE.init({ selector: 'blog-item-desc-' +key});
				//tinyMCE.execCommand('mceAddEditor', false, 'blog-item-desc-' + key);
				tinymce.init({
					selector: '[id="blog-item-title-' +key+'"]'
				});
				tinymce.init({
					selector: '[id="blog-item-desc-' +key+'"]'
				});
				$btn.removeClass('disabled');
			}
		} );
		return false;
	});

});

