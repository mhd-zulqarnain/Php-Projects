(function($) {
	
	$( 'a#somdn-sdbutton' ).click(function (e) {
		e.preventDefault();
		var form = $(this).closest('form');
		var form_id = $( form ).attr('id');
		$( '#' + form_id ).submit();
	});

	$( 'a.somdn-download-archive' ).click(function (e) {
		e.preventDefault();
		var form = $(this).closest('form.somdn-archive-download-form');
		$( form ).submit();
	});

	$( '[id^="somdn-md-link-"]' ).click(function (e) {
		e.preventDefault();
		var id = $(this).attr('id').replace(/somdn-md-link-/, '');
		$( '#somdn-md-form-' + id ).submit();
	});

	$( '#somdn-checkbox-form' ).on( 'submit', function(e) {
		if ( $( '#somdn-checkbox-form input:checked' ).length == 0 ) {
			e.preventDefault();
			$( '.somdn-form-validate' ).css( 'display', 'block' );
		} else {
			$( '.somdn-form-validate' ).css( 'display', 'none' );
		}
	});

	$( '#somdn-download-files-all' ).click(function() {
		var c = this.checked;
		$( '[id^="somdn-download-file-"]' ).prop( 'checked', c );
	});

})( jQuery );