<?php get_header() ?>
	<div class="container">
		<div class="row b-topImg">
			<div class="b-topImg__item">
				<a href="<?php echo cz('tp_img_product_cat_url'); ?>"
				   title=""> <img src="<?php echo cz('tp_img_product'); ?>?100"
								  class="img-responsive" alt="">
					<div <?php if ( !cz('shop_now_text') && !cz('id_video_youtube_home') ) echo 'style="display: none;"'; ?> class="topImg__content--big">
						<div class="topImg__content__text"><?php echo cz('tp_img_product_text'); ?></div>
						<div <?php if ( !cz('shop_now_text') ) echo 'style="display: none;"'; ?> class="topImg__content__btn"><?php echo cz('shop_now_text'); ?></div>
						<div <?php if ( !cz('id_video_youtube_home') ) echo 'style="display: none;"'; ?>
							class="btn b-topImg__btn--play_video" data-toggle="modal" data-target="#prHome_video" onclick="return false;">
							<i class="ico_play"></i><?php _e( 'View Video', 'ami3' ) ?></div>
					</div>
				</a>
			</div>
			<div class="b-topImg__mini hidden-xs">
				<div class="b-topImg__mini__item">
					<a href="<?php echo cz('tp_img_product_cat1_url'); ?>"
					   title="<?php echo cz('tp_img_product_cat1_title'); ?>">
						<img src="<?php echo cz('tp_img_product_cat1'); ?>?100"
							 class="img-responsive">
						<?php if ( cz('tp_img_product_cat1_text') ): ?>
						<div class="topImg__content">
							<div class="topImg__content__text"><?php echo cz('tp_img_product_cat1_text'); ?></div>
							<div class="topImg__content__btn--mini"><i class="ico-ar"></i></div>
						</div>
						<?php endif; ?>
					</a>
				</div>
				<div class="b-topImg__mini__item">
					<a href="<?php echo cz('tp_img_product_cat2_url'); ?>"
					   title="<?php echo cz('tp_img_product_cat2_title'); ?>">
						<img src="<?php echo cz('tp_img_product_cat2'); ?>?100"
							 class="img-responsive">
						<?php if ( cz('tp_img_product_cat2_text') ): ?>
							<div class="topImg__content">
								<div class="topImg__content__text"><?php echo cz('tp_img_product_cat2_text'); ?></div>
								<div class="topImg__content__btn--mini"><i class="ico-ar"></i></div>
							</div>
						<?php endif; ?>
					</a>
				</div>
			</div>
		</div>
	</div>

<?php get_template_part( 'products/countdown' ) ?>

<?php get_template_part( 'products/features' ) ?>

	<!-- TOP SELLING PRODUCTS -->
	<div class="content-from-cat">
		<div class="container">
			<h3 class="text-uppercase"><?php _e( 'Top Selling Products', 'ami3' ); ?></h3>
			<?php get_template_part( 'products/main', 'topselling' ) ?>
		</div>
	</div>

	<!-- BEST DEALS -->
	<div class="content-from-cat">
		<div class="container">
			<h3 class="text-uppercase"><?php _e( 'Best Deals', 'ami3' ); ?></h3>
			<?php get_template_part( 'products/main', 'bestdials' ) ?>
		</div>
	</div>

	<!-- NEW ARRIVALS -->
	<div class="content-from-cat">
		<div class="container">
			<h3 class="text-uppercase"><?php _e( 'New Arrivals', 'ami3' ); ?></h3>
			<?php get_template_part( 'products/main', 'arrivals' ) ?>
		</div>
	</div>

<?php get_template_part( 'products/main', 'recently' ) ?>
<?php get_template_part( 'content' ) ?>
<?php get_footer() ?>