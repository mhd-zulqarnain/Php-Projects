<div class="modal fade b-modal_cart" id="prModalCart" tabindex="-1" role="dialog" aria-labelledby="prModalCartLabel"
     aria-hidden="true">
	<script id="modal_cart_details_img_template" type="text/template">
		<div class="details-img"><img src="{{url}}" class="img-responsive"></div>
	</script>
	<script id="modal_cart_details_template" type="text/template">
		<span class="details-title">{{title}}:</span>
		<span class="details-info">{{variation}}</span>
	</script>
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only"><?php _e( 'Close', 'ami3' ) ?></span>
				</button>
				<h4 class="modal-title" id="prModalCartLabel">
					<?php _e( 'Added to cart', 'ami3' ) ?>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row b-modal_cart-header hidden-xs">
					<div class="col-sm-10 col-xs-60 text-center"></div>
					<div class="col-sm-32 col-xs-30 text-center"><?php _e('Title', 'ami3'); ?></div>
					<div class="col-sm-10 col-xs-10 text-center"><?php _e('Quantity', 'ami3'); ?></div>
					<div class="col-sm-5 col-xs-10 text-center"><?php _e('Amount', 'ami3'); ?></div>
					<div class="col-sm-3 col-xs-3 text-center"></div>
				</div>
				<div id="cart_itemes">
					<script id="modal_cart_item_template" type="text/template">
						<div class="row b-modal_cart-item cart-item" data-key="{{order_id}}" data-post="{{post_id}}">
							<div class="col-sm-10 col-xs-60 text-center">
								<div class="thumb"><img src="{{thumb}}" class="img-responsive"></div>
							</div>
							<div class="col-sm-32 col-xs-60">
								<div class="col-lg-60 title-link"><a href="{{link}}" class="title-link">{{title}}</a></div>
								<div class="col-lg-60">
									<span class="shipping-name"><?php _e('Shipping', 'ami3'); ?>:</span>
									<span class="js-shipping shipping-method">{{shipping}}</span>
								</div>
								<div class="col-lg-60">{{details}}</div>
							</div>
							<div class="col-sm-10 col-xs-25 text-center">
								<div class="select_quantity">
									<button class="select_quantity__btn js-quantity_remove">
										<i class="ico--remove"></i></button>
									<input class="js-modal_quantity" name="modal_quantity" type="text" value="{{quantity}}" min="1" max="9999"
									       maxlength="5" autocomplete="off" />
									<button class="select_quantity__btn js-quantity_add">
										<i class="ico--add"></i></button>
								</div>
							</div>

							<div class="col-sm-5 col-xs-25">
								<strike class="price__old js-total_price">{{total_price}}</strike><span class="price js-total_salePrice">{{total_salePrice}}</span></div>
							<div class="col-sm-3 col-xs-10 text-center">
								<a href="#" class="remove-item js-remove-item"></a>
							</div>
						</div>
					</script>
				</div>


			</div>
			<div class="b-modal_cart-total col-xs-60">
				<div class="row">
					<div class="col-xs-60 ">
						<dl class="b-modal_cart-total_count pull-right">
							<dt><?php _e('Number of products', 'ami3'); ?>:</dt>
							<dd class="js-total_count">3</dd>
						</dl>
					</div>
					<div class="col-xs-60">
						<dl class="b-modal_cart-total_price pull-right grand-total">
							<dt><?php _e('Total price', 'ami3'); ?>:</dt>
							<dd class="numb js-cur_salePrice">{{cur_salePrice}}</dd>
						</dl>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-left continue_shopping">
					<span>&#8249;</span> <a class="link_continue_shopping" data-dismiss="modal">
						<?php _e( 'Continue shopping', 'ami3' ) ?>
					</a>
				</div>
				<a href="<?php echo esc_url( home_url( '/cart/' ) ) ?>" class="btn btn_orange pull-right" onclick = "ga('send', 'event', 'Proceed to Checkout', 'Click')"><?php _e( 'Proceed to Checkout', 'ami3' ) ?>
				</a>
			</div>
		</div>
	</div>
</div>