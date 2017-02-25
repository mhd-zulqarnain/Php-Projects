(function($) {

	$( window ).load( function(){
		if(window.location.hash) {
		
			var hash = window.location.hash;
		
			var ww = $(window).width();
				
			if ( ww <= 782 ) {
				$('html, body').animate({ scrollTop: $(hash).offset().top - 60}, 100);
			} else {
				$('html, body').animate({ scrollTop: $(hash).offset().top - 50}, 100);
			}
		
		}	
	});

	$( document ).ready(function() {

		function gotoHash(id) {
			setTimeout(function() {
				var ww = $(window).width();
				var $target = $(id);
	
				if ( ww <= 782 ) {
					scrollOffset = 60;
				} else {
					scrollOffset = 50;
				}
	
			        y = $target.offset().top - scrollOffset;
			
				if ($target.length) {
					window.scrollTo(0, y);
				}
			});
		}
		
		$('a[href^="#"]').on('click', function() {
			gotoHash($(this).attr('href'));
		});

	});

})( jQuery );