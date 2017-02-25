<div class="list-order hidden-xs">
	<div class="head">
		<div class="col-sm-10"></div>
		<div class="col-sm-30 col-lg-30"><?php _e( 'Product', 'ami3' ); ?></div>
		<div class="col-sm-8 col-lg-8 text-center"><?php _e( 'Quantity', 'ami3' ); ?></div>
		<div class="col-sm-8 col-lg-8"><?php _e( 'Amount', 'ami3' ); ?></div>
		<div class="col-sm-3"></div>
	</div>
</div>
<div class="page-cart-list js-page-cart-list">

	<script id="page_cart_item_template" type="text/template">
		<div class="row cart-item" data-key="{{order_id}}" data-post="{{post_id}}">
			<div class="hidden-xs desc">
				<div class="col-sm-10 text-center">
					<div class="im-wrap">
						<div class="thumb-wrap">
							<div class="thumb"><img src="{{thumb}}" class="img-responsive"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-30 col-lg-30">
					<a href="{{link}}" class="title-link">{{title}}</a>
					<div class="shipping">
						<span class="head"><?php _e( 'Shipping', 'ami3' ); ?>:</span>
						<?php if ( ! isOneFreeShipping() ): ?>
							<span class="js-shipping method">{{shipping}}</span>
						<?php else: _e( 'free', 'ami3' ); ?>
						<?php endif; ?>
					</div>
					<div class="details">{{details}}</div>
				</div>
				<div class="col-sm-8 col-lg-8">
					<div class="text-center">
						<div class="s_q js-s_q">
							<button class="_btn js-quantity_remove"><span>-</span></button>
							<input name="quantity" type="text" value="{{quantity}}" min="1" max="9999" maxlength="5"
							       autocomplete="off">
							<button class="_btn add js-quantity_add"><span>+</span></button>
						</div>
					</div>
				</div>
				<div class="col-sm-8 col-lg-8">
					<div class="">
						<div><strike class="price__old js-total_price">{{total_price}}</strike></div>
						<div><span class="price js-total_salePrice">{{total_salePrice}}</span></div>
					</div>
				</div>
				<div class="col-sm-3">
					<span class="remove-item js-remove-item"><i class="fa fa-fw" aria-hidden="true"></i></span>
				</div>
			</div>
			<!---->
			<div class="visible-xs mobile">
				<div class="col-xs-16 text-center">
					<div class="im-wrap">
						<span class="remove-item js-remove-item"><i class="fa fa-fw" aria-hidden="true"></i></span>
						<div class="thumb-wrap">
							<div class="thumb"><img src="{{thumb}}" class="img-responsive"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-29">
					<a href="{{link}}" class="title-link">{{title}}</a>
					<div class="details">{{details}}</div>
					<div class="shipping">
						<span class="head"><?php _e( 'Shipping', 'ami3' ); ?>:</span>
						<?php if ( ! isOneFreeShipping() ): ?>
							<span class="js-shipping method">{{shipping}}</span>
						<?php else: _e( 'free', 'ami3' ); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xs-15">
					<div class="">
						<div class="s_q js-s_q">
							<button class="_btn js-quantity_remove"><span>-</span></button>
							<input name="quantity" type="text" value="{{quantity}}" min="1" max="9999" maxlength="5"
							       autocomplete="off">
							<button class="_btn add js-quantity_add"><span>+</span></button>
						</div>
					</div>
					<div class="">
						<div><strike class="price__old js-total_price">{{total_price}}</strike></div>
						<div><span class="price js-total_salePrice">{{total_salePrice}}</span></div>
					</div>
				</div>
			</div>
		</div>
	</script>
	<script id="page_cart_details_img_template" type="text/template">
		<img src="{{url}}" class="img-responsive">
	</script>
	<script id="page_cart_details_template" type="text/template">
		<span>{{title}}</span>:<span class="text">{{variation}}</span>
	</script>
</div>
