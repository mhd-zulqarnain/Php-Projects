<?php if ( file_exists( dirname( __FILE__ ) . '/tpl/_list_order.php' ) ) {
	include dirname( __FILE__ ) . '/tpl/_list_order.php';
} ?>

<div class="take-checkout">
	<div class="col-sm-41"></div>
	<div class="col-sm-19">
		<div class="num ">
			<div class="name"><?php _e( 'Number of products', 'ami3' ) ?>:</div>
			<div class="value"><span class="js-page-total_count"></span></div>
		</div>
		<div class="total">
			<div class="name"><?php _e( 'Total price', 'ami3' ) ?>:</div>
			<div class="value"><span class="js-cur_salePrice"></span></div>
		</div>
	</div>

</div>

<div class="continue_shopping"><span>‹</span> <a href="/" class="link_continue_shopping" data-dismiss="modal">
		<?php _e( 'Continue shopping', 'ami3' ) ?>
	</a>
</div>
<form id='form_delivery' class="" action="" method="POST">

	<?php if ( file_exists( dirname( __FILE__ ) . '/tpl/_form.php' ) ) {
		include dirname( __FILE__ ) . '/tpl/_form.php';
	} ?>

	<?php if ( isOneFreeShipping() ): ?>
		<div class="shipping">
			<div class="wrap-line">
				<h4 class="head-line">
					<?php _e( 'Shipping', 'ami3' ) ?>:
				</h4>
			</div>
			<div class="row">
				<div class="form-group col-sm-30">
					<div class="col-sm-44 col-sm-offset-16">
						<div class="text"><?php _e( 'Free worldwide shipping', 'ami3' ); ?></div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( file_exists( dirname( __FILE__ ) . '/tpl/_payment.php' ) ) {
		include dirname( __FILE__ ) . '/tpl/_payment.php';
	} ?>


	<div class="b-cart-total col-sm-60">
		<div class="row">
			<div class="col-xs-60 col-sm-30 ">
				<?php if ( isPromocodesEnabled() ): ?>
					<a href="#" class="js-b-coupon"><?php _e( 'Have a promotional code?', 'ami3' ) ?></a>
					<div class="b-coupon" style="display: none;">
						<label for="discount"><?php _e( 'Promo code', 'ami3' ) ?></label>

						<div class="b-coupon__discount">
							<input form="form_delivery" id="discount" type="text" name="discount" placeholder="<?php _e( 'Enter promo code', 'ami3' ) ?>">

							<div class="b-coupon__msg b-coupon__msg--err" style="display: none;"><?php _e( 'Code does not exist', 'ami3' ) ?></div>
							<div class="b-coupon__msg b-coupon__msg--valid" style="display: none;"><?php _e( 'Code Accepted', 'ami3' ) ?></div>
						</div>
						<button class="btn b-coupon__btn js-coupon__btn"><?php _e( 'Apply', 'ami3' ) ?></button>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-xs-30 pull-right col-sm-30 ">
				<dl class="b-cart-total_count pull-right">
					<dt><?php _e( 'List price', 'ami3' ) ?>:</dt>
					<dd><strike><span class="js-page-total_price"></span></strike>
					</dd>
				</dl>
				<dl class="b-cart-total_count pull-right">
					<dt><?php _e( 'You save', 'ami3' ) ?>:</dt>
					<dd class="js-page-total_save"></dd>
				</dl>
				<dl class="b-cart-total_count pull-right">
					<dt><?php _e( 'Shipping', 'ami3' ) ?>:</dt>
					<dd class="js-total_shipping"><?php _e( 'Free', 'ami3' ) ?></dd>
				</dl>
				<dl class="b-cart-total_price pull-right grand-total">
					<dt><?php _e( 'Total price', 'ami3' ) ?>:</dt>
					<dd class="numb js-cur_salePrice"></dd>
				</dl>
			</div>
		</div>
	</div>
	<?php if(cz('tp_readonly_read_required')): ?>
	<div class="readonly_checkbox clearfix">
		<label for="readonly_checkbox">
			<input id="readonly_checkbox" type="checkbox" readonly><?php echo cz('tp_readonly_read_required_text') ?>
		</label>
	</div>
	<?php endif; ?>

	<div class="col-md-60 b-cart-btn_active">
		<div class="pull-left">
			<span>‹</span> <a href="/" class="link_continue_shopping" data-dismiss="modal">
				<?php _e( 'Continue shopping', 'ami3' ) ?>
			</a>
		</div>
        <button type="submit" id="process-checkout" form="form_delivery" name="ads_checkout" class="btn btn_orange pull-right">
			<?php _e( 'Proceed to Pay', 'ami3' ) ?>
		</button>
	</div>
</form>