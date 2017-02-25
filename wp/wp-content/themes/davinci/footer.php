<!-- FOOTER -->
<div class="footer">
	<?php if ( cz( 'tp_footer_payment_methods' ) || cz( 'tp_footer_delivery_methods' ) ): ?>
		<div class="content-partners">
			<div class="container">
				<?php if ( cz( 'tp_footer_payment_methods' ) ): ?>

					<ul class="col-lg-30">
						<li><span><?php _e( 'Payment Methods:', 'ami3' ) ?></span>
						<li><i class="partner p-master"></i></li>
						<li><i class="partner p-visa"></i></li>
						<li><i class="partner p-wunion"></i></li>
						<li><i class="partner p-maestro"></i></li>
						<li><i class="partner p-paypal"></i></li>
						<li><i class="partner p-discover"></i></li>
						<li><i class="partner p-ae"></i></li>
					</ul>
				<?php endif; ?>
				<?php if ( cz( 'tp_footer_delivery_methods' ) ): ?>
					<ul class="col-lg-30">
						<li><span><?php _e( 'Delivery Methods:', 'ami3' ) ?></span>
						<li><i class="partner p-ems"></i></li>
						<li><i class="partner p-ups"></i></li>
						<li><i class="partner p-dhl"></i></li>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="content-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-29 col-sm-60">
					<div class="row hidden-xs">
						<div class="col-lg-20 col-sm-20">
							<h3 class="text-uppercase"><?php _e( 'Company Info', 'ami3' ) ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location'  => 'footer1',
								'menu'            => '',
								'container'       => false,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'info',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => '__return_empty_string',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 1,
								'walker'          => '',
							) );

							?>

						</div>
						<div class="col-lg-20 col-sm-20">
							<h3 class="text-uppercase"><?php _e( 'Purchase Info', 'ami3' ) ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location'  => 'footer2',
								'menu'            => '',
								'container'       => false,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'info',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => '__return_empty_string',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 1,
								'walker'          => '',
							) );

							?>

						</div>
						<div class="col-lg-20 col-sm-20">
							<h3 class="text-uppercase"><?php _e( 'Customer Service', 'ami3' ) ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location'  => 'footer3',
								'menu'            => '',
								'container'       => false,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'info',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => '__return_empty_string',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 1,
								'walker'          => '',
							) );
							?>

						</div>
					</div>
					<div class="row visible-xs">

						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel mobile-munu-box">
								<h3 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="text-uppercase"><?php _e( 'Company Info', 'ami3' ) ?></h3>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="">
										<?php
										wp_nav_menu( array(
											'theme_location'  => 'footer1',
											'menu'            => '',
											'container'       => false,
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'info',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => '__return_empty_string',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 1,
											'walker'          => '',
										) );

										?></div>
								</div>
							</div>


							<div class="panel mobile-munu-box">
								<h3 class="text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php _e( 'How to Buy', 'ami3' ) ?></h3>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="">
										<?php
										wp_nav_menu( array(
											'theme_location'  => 'footer2',
											'menu'            => '',
											'container'       => false,
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'info',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => '__return_empty_string',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 1,
											'walker'          => '',
										) );

										?>
									</div>
								</div>
							</div>
							<div class="panel mobile-munu-box">
								<h3 class="text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><?php _e( 'Customer Service', 'ami3' ) ?></h3>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="">
										<?php
										wp_nav_menu( array(
											'theme_location'  => 'footer3',
											'menu'            => '',
											'container'       => false,
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'info',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => '__return_empty_string',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 1,
											'walker'          => '',
										) );
										?></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-29 col-lg-offset-2 col-sm-60">
					<div class="col-sm-60 b-confidence">
						<h3><?php _e( cz( 'tp_confidence' ), 'ami3' ); ?></h3>
						<ul class="row">
							<?php if ( cz( 'tp_confidence_img_1' ) ): ?>
								<li class="col-xs-20 col-sm-10 col-md-20">
									<img class="img-responsive" src="<?php echo cz( 'tp_confidence_img_1' ); ?>?1000" alt="">
								</li>
							<?php endif; ?>
							<?php if ( cz( 'tp_confidence_img_2' ) ): ?>
								<li class="col-xs-20 col-sm-10 col-sm-offset-1 col-md-20 col-md-offset-0">
									<img class="img-responsive" src="<?php echo cz( 'tp_confidence_img_2' ); ?>?1000" alt="">
								</li>
							<?php endif; ?>
							<?php if ( cz( 'tp_confidence_img_3' ) ): ?>
								<li class="col-xs-20 col-sm-10 col-sm-offset-1 col-md-20 col-md-offset-0">
									<img class="img-responsive" src="<?php echo cz( 'tp_confidence_img_3' ); ?>?1000" alt="">
								</li>
							<?php endif; ?>
						</ul>
					</div>

				</div>
			</div>
			<div class="row">
				<?php
				$sub = cz( 'tp_subscribe' );
				if ( $sub ):
					?>
					<div class="col-lg-29 col-sm-60 b-subscribe">
						<h3><?php _e( 'Stay Up To Date', 'ami3' ) ?></h3>

						<?php echo $sub; ?>
					</div>
				<?php endif; ?>


				<?php if ( is_enableSocial() ): ?>
					<div class="col-lg-29 col-lg-offset-2">
						<div class="col-sm-60 social">
							<h3><?php _e( 'Stay Connected', 'ami3' ) ?></h3>
							<ul>
								<?php if ( cz( 's_link_fb' ) ): ?>
									<li><a href="<?php echo cz( 's_link_fb' ); ?>" target="_blank"
									       rel="nofollow"><span class="ic icon-facebook"></span></a>
									</li>
								<?php endif; ?>
								<?php if ( cz( 's_link_in' ) ): ?>
									<li><a href="<?php echo cz( 's_link_in' ); ?>" target="_blank"
									       rel="nofollow"><span class="ic icon-instagramm"></span></a>
									</li>
								<?php endif; ?>
								<?php if ( cz( 's_link_tw' ) ): ?>
									<li><a href="<?php echo cz( 's_link_tw' ); ?>" target="_blank" rel="nofollow">
											<span class="ic icon-twitter"></span></a></li>
								<?php endif; ?>
								<?php if ( cz( 's_link_gl' ) ): ?>
									<li>
										<a href="<?php echo cz( 's_link_gl' ); ?>"
										   target="_blank" rel="nofollow"><span
												class="ic icon-gplus"></span></a></li>
								<?php endif; ?>
								<?php if ( cz( 's_link_pt' ) ): ?>
									<li><a href="<?php echo cz( 's_link_pt' ); ?>" target="_blank" rel="nofollow">
											<span class="ic icon-pinterest"></span></a></li>
								<?php endif; ?>
								<?php if ( cz( 's_link_yt' ) ): ?>
									<li><a href="<?php echo cz( 's_link_yt' ); ?>" target="_blank" rel="nofollow">
											<span class="ic ic_tybe"></span></a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="content-copyright" itemscope itemtype="http://schema.org/Organization">
		<div class="container text-center" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<?php echo str_replace( '{{YEAR}}', date( 'Y' ), cz( 'tp_copyright' ) ); ?>
			<div class="content-copyright--color text-center" itemprop="streetAddress"><?php echo cz( 'tp_address' ); ?></div>
			<div class="content-copyright--color text-center"><?php echo cz( 'tp_copyright__line' ); ?></div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<?php if ( cz( 's_fb_apiid' ) ): ?>
	<div id="fb-root"></div>
	<script>(function ( d, s, id ) {
			var js, fjs = d.getElementsByTagName( s )[ 0 ];
			if ( d.getElementById( id ) ) return;
			js     = d.createElement( s );
			js.id  = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
			fjs.parentNode.insertBefore( js, fjs );
		}( document, 'script', 'facebook-jssdk' ));</script>
<?php endif; ?>
<?php echo cz( 'tp_footer_script' ); ?>
<div class="bg"></div>
<?php
if(is_home()){
	get_template_part( 'tpl/widget/_video' );
}

?>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,300,400,600,700,800'
      rel='stylesheet' type='text/css'>
<link href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'
      rel='stylesheet' type='text/css'>

<?php if(is_single()): ?>
	<link href="<?php echo get_template_directory_uri(); ?>/css/fotorama.css?1000" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/baguetteBox.css?1000" rel="stylesheet">
<?php endif; ?>

</body>
</html>