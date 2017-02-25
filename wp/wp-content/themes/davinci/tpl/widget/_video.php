<?php
/**
 * Created by PhpStorm.
 * User: sunfun
 * Date: 07.09.16
 * Time: 12:45
 */

if(cz('id_video_youtube_home')):?>

<div class="modal fade b-modal_cart" id="prHome_video" tabindex="-1" role="dialog" aria-labelledby="prModalCartLabel"
	     aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only"><?php _e( 'Close', 'mic' ) ?></span>
</button>
<h4 class="modal-title" id="prModalCartLabel">
</h4>
</div>
<div class="modal-body">

	<div class="video-responsive">
		<div id="player_modal"></div>
	</div>
</div>
<div class="modal-footer">
	<a href="<?php echo esc_url( home_url( '/product/' ) ) ?>" class="btn_model_video">
		<?php _e( 'Start Shopping Now', 'ami3' ) ?></a>
</div>
</div>
</div>
</div>
<script>

	var player ={};

	jQuery( '#prHome_video' ).on( 'show.bs.modal', function ( e ) {
		if(!player.hasOwnProperty('playVideo')){
			var tag = document.createElement( 'script' );

			tag.src            = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName( 'script' )[ 0 ];
			firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );
		}else{
			player.playVideo();
		}


	} );
	jQuery( '#prHome_video' ).on( 'hidden.bs.modal', function ( e ) {
		player.stopVideo()
	} );

	function onPlayerReady(event) {
		event.target.playVideo();
	}

	function onYouTubeIframeAPIReady() {

		player = new YT.Player('player_modal', {
			height: '100%',
			width: '100%',
			videoId: '<?php echo cz('id_video_youtube_home');?>',
			playerVars: {
				HD:0,
				rel:0,
				showinfo:0,
				controls:0,
				modestbranding:1 },
			events: {
				'onReady': onPlayerReady
			}
		});


	}

</script>

	<?php endif; ?>