<div class="row">
	<div class="col-md-60 b-sidebar_checkout-confidence">
		<div class="b-sidebar_checkout-confidence__inner">
			<h4 class="b-sidebar_checkout-confidence__head"><?php _e( 'SHOP WITH CONFIDENCE', 'ami3' ); ?></h4>

			<div class="b-sidebar_checkout-confidence__top">
				<div class="b-sidebar_checkout-confidence__top__img">
					<img
						src="<?php echo get_template_directory_uri(); ?>/img/main/confidence_lock.png?1000"
						alt="">
				</div>
				<div class="b-sidebar_checkout-confidence__top__text">
					<span><?php _e( 'SHOPPING ON', 'ami3' ); ?></span><br> <?php echo dav_get_host(); ?> <?php _e( 'IS SAFE AND SECURE. GUARANTEED!', 'ami3' ); ?>
				</div>
			</div>

			<div class="b-sidebar_checkout-confidence__text"><?php _e( 'You\'ll pay nothing if unauthorized charges are made to your credit card as a result of shopping at', 'ami3' ); ?> <?php echo dav_get_host(); ?>
			</div>

			<?php if(cz('sidebar_safe_shopping_guarantee_show')): ?>
				<h5><?php echo cz('sidebar_safe_shopping_guarantee'); ?></h5>
				<div class="checkout-guarantee">
					<?php if(cz('sidebar_safe_shopping_guarantee_img_1')): ?>
						<img src="<?php echo cz('sidebar_safe_shopping_guarantee_img_1');?>?1000" alt="">
					<?php endif; ?>
					<?php if(cz('sidebar_safe_shopping_guarantee_img_2')): ?>
						<img src="<?php echo cz('sidebar_safe_shopping_guarantee_img_2');?>?1000" alt="">
					<?php endif; ?>
					<?php if(cz('sidebar_safe_shopping_guarantee_img_3')): ?>
						<img src="<?php echo cz('sidebar_safe_shopping_guarantee_img_3');?>?1000" alt="">
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="b-sidebar_checkout-confidence__text">
				<?php _e( 'All information is encrypted and transmitted without risk using a Secure Sockets Layer (SSL) protocol.', 'ami3' ); ?>
			</div>
		</div>

	</div>
	<div class="col-md-60 b-sidebar_checkout-privacy_policy">
		<div class="b-sidebar_checkout-privacy_policy__inner">
			<h4 class="b-sidebar_checkout-privacy_policy__head"><?php _e( 'PRIVACY POLICY', 'ami3' ); ?> </h4>

			<div class="b-sidebar_checkout-privacy_policy__text">
				<?php echo dav_get_host() . ' '; ?>

				<?php _e( 'respects your privacy. We don\'t rent or sell your personal information to anyone.', 'ami3' ); ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ) ?>"><?php _e( 'Read our Privacy Policy', 'ami3' ); ?> »</a>
		</div>

	</div>
	<div class="col-md-60 b-sidebar_checkout-buyer_protection">
		<div class="b-sidebar_checkout-buyer_protection__inner">
			<h4 class="b-sidebar_checkout-buyer_protection__head">
				<i class="icon"></i><?php _e( 'Buyer Protection', 'ami3' ); ?></h4>
			<ul>
				<li>
					<b><?php _e( 'Full Refund', 'ami3' ); ?></b> <?php _e( 'if you don\'t receive your order', 'ami3' ); ?>
				</li>
				<li>
					<b><?php _e( 'Refund or Keep', 'ami3' ); ?></b> <?php _e( 'items not as described', 'ami3' ); ?>
				</li>
			</ul>
		</div>

	</div>
</div>
