<?php
global $adsBasket;
$message  = isset( $_POST[ 'ads-error' ] ) ? $_POST[ 'ads-error' ][ 'message' ] : false;
$gateways = dav_listGateway();

$fields = array(
	'email'        => '',
	'full_name'    => '',
	'address'      => '',
	'city'         => '',
	'country'      => '',
	'state'        => '',
	'postal_code'  => '',
	'phone_number' => '',
	'description'  => '',
	'type'         => ''
);

foreach ( $fields as $k => $v ) {
	$fields[ $k ] = isset( $_POST[ $k ] ) ? esc_attr( $_POST[ $k ] ) : '';
}

?>
<?php get_header() ?>
	<!-- CHECKOUT -->
	<div class="page-checkout">
		<div class="container">
			<div class="row wrap-checkout">
				<div class="col-xs-60 col-md-30 pull-right box-right">
					<div class="bg"></div>
					<div class="row">
						<div class="col-xs-60 head-list">
							<div class="col-xs-40"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
								<span class="text"><?php _e( 'Show order summary', 'ami3' ); ?></span>
								<span class="icon-stage">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <i class="fa fa-angle-up" aria-hidden="true"></i></span>
							</div>
							<div class="col-xs-20 total_price">
								<div class="js-cur_salePrice"></div>
							</div>
						</div>
						<div class="col-xs-60 page-cart-list js-page-cart-list" data-open="head-list">

							<script id="page_cart_item_template" type="text/template">
								<div class="row cart-item" data-key="{{order_id}}" data-post="{{post_id}}">

									<div class="col-xs-60 col-sm-40">
										<div class="col-xs-20 text-center thumb-wrap">
											<span class="remove-item js-remove-item"><i class="fa fa-fw" aria-hidden="true"></i></span>
											<div class="thumb"><img src="{{thumb}}" class="img-responsive"></div>
										</div>
										<div class="col-xs-40">
											<a href="{{link}}" class="title-link">{{title}}</a>
										</div>
									</div>
									<div class="col-xs-20 col-sm-20 col-xs-push-40 col-sm-push-0">
										<div class="text-center">
											<div><strike class="price__old js-total_price">{{total_price}}</strike></div>
											<div><span class="price js-total_salePrice">{{total_salePrice}}</span></div>
										</div>
										<div class="text-center">
											<div class="select_quantity">
												<button class="select_quantity__btn js-quantity_remove">
													<i class="ico--remove">-</i></button>
												<input name="quantity" type="text" value="{{quantity}}" min="1" max="9999" maxlength="5"
												       autocomplete="off">
												<button class="select_quantity__btn select_quantity__btn--add js-quantity_add">
													<i class="ico--add">+</i></button>
											</div>
										</div>
									</div>
									<div class="col-xs-40 col-xs-pull-20 col-sm-pull-0 col-sm-60">
										<div class="info-product">
											<div class="details">{{details}}</div>
											<?php if ( ! isOneFreeShipping() ): ?>
												<div class="shipping">
													<span class="name"><?php _e( 'Shipping', 'ami3' ); ?>:</span>
													<span class="js-shipping method">{{shipping}}</span>
												</div>
											<?php endif; ?>
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
					</div>
					<?php if ( dav_isPromocodesEnabled() ): ?>
						<div class="discount" data-open="head-list">
							<div class="wrap">
								<div class="grup-input field b-coupon">
									<input form="form_delivery" id="discount" type="text" name="discount" placeholder="<?php _e( 'Gift card or discount code', 'ami3' ) ?>">
									<label for="discount"><?php _e( 'Gift card or discount code', 'ami3' ) ?></label>
									<div class="b-coupon__msg b-coupon__msg--err" style="display: none;"><?php _e( 'Code does not exist', 'ami3' ) ?></div>
									<div class="b-coupon__msg b-coupon__msg--valid" style="display: none;"><?php _e( 'Code Accepted', 'ami3' ) ?></div>
								</div>
								<button class="btn js-coupon__btn"><?php _e( 'Apply', 'ami3' ) ?></button>
							</div>
						</div>
					<?php endif; ?>
					<ul class="price-list" data-open="head-list">
						<li class="js-page-total_price-item">
							<div class="name"><?php _e( 'List price', 'ami3' ); ?>:</div>
							<div class="value"><span class="js-page-total_price"></span></div>
						</li>
						<li class="js-page-total_save-item">
							<div class="name"><?php _e( 'You save', 'ami3' ); ?>:</div>
							<div class="value"><span class="js-page-total_save"></span></div>
						</li>
						<li>
							<div class="name"><?php _e( 'Shipping', 'ami3' ); ?>:</div>
							<div class="value"><span class="js-total_shipping"></span></div>
						</li>
					</ul>
					<div class="total-price" data-open="head-list">
						<div class="name"><?php _e( 'Total price', 'ami3' ); ?>:</div>
						<div class="value"><span class="js-cur_salePrice"></span></div>
					</div>
				</div>
				<div class="col-xs-60 col-md-30 pull-left box-left">
					<form id="form_delivery" class="form" action="" method="POST" novalidate="novalidate">
						<h3><?php _e( 'Customer information', 'ami3' ); ?></h3>
						<div class="row">
							<div class="form-group col-xs-60 col-md-40">
								<div class="field">
									<input form="form_delivery" class="form-control" id="email" type="email" name="email" value="<?php echo( $fields[ 'email' ] ) ?>" placeholder="<?php _e( 'Email', 'ami3' ) ?>" required="required">
									<label class="control-label" for="email"><?php _e( 'Email', 'ami3' ) ?></label>
								</div>
							</div>
						</div>
						<h3><?php _e( 'Shipping address', 'ami3' ); ?></h3>
						<div class="row">
							<div class="form-group col-xs-60">
								<div class="field">
									<input form="form_delivery" class="form-control" id="full_name" type="text" name="full_name" value="<?php echo( $fields[ 'full_name' ] ) ?>" placeholder="<?php _e( 'Full Name', 'ami3' ) ?>" required="required">
									<label class="control-label" for="full_name"><?php _e( 'Full Name', 'ami3' ) ?></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-60">
								<div class="field">
									<input form="form_delivery" class="form-control" id="address" type="text" name="address" value="<?php echo( $fields[ 'address' ] ) ?>" placeholder="<?php _e( 'Address', 'ami3' ) ?>" required="required">
									<label class="control-label" for="address"><?php _e( 'Address', 'ami3' ) ?></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-30">
								<div class="field">
									<input form="form_delivery" class="form-control" id="city" type="text" name="city" value="<?php echo( $fields[ 'city' ] ) ?>" placeholder="<?php _e( 'City', 'ami3' ) ?>" required="required">
									<label class="control-label" for="city"><?php _e( 'City', 'ami3' ) ?></label>
								</div>
							</div>
							<div class="form-group col-xs-30">
								<div class="field">
									<select name="country" id="country" class="form-control" required="required">
										<?php dav_get_list_contries( $fields[ 'country' ] ) ?>
									</select>
									<label class="control-label" for="country"><?php _e( 'Country', 'ami3' ) ?></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-30">
								<div class="field">
									<input form="form_delivery" class="form-control" id="state" type="text" name="state" value="<?php echo( $fields[ 'state' ] ) ?>" placeholder="<?php _e( 'State/Region', 'ami3' ) ?>" required="required">
									<label class="control-label" for="state"><?php _e( 'State/Region', 'ami3' ) ?></label>
								</div>
							</div>
							<div class="form-group col-xs-30">
								<div class="field">
									<input form="form_delivery" class="form-control" id="postal_code" type="text" name="postal_code" value="<?php echo( $fields[ 'postal_code' ] ) ?>" placeholder="<?php _e( 'Postal code', 'ami3' ) ?>" required="required">
									<label class="control-label" for="postal_code"><?php _e( 'Postal code', 'ami3' ) ?></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-60">
								<div class="field">
									<input form="form_delivery" class="form-control" id="phone_number" type="tel" name="phone_number" value="<?php echo( $fields[ 'phone_number' ] ) ?>" placeholder="<?php _e( 'Phone (optional)', 'ami3' ) ?>">
									<label class="control-label" for="phone_number"><?php _e( 'Phone (optional)', 'ami3' ) ?></label>
								</div>
							</div>
						</div>
						<?php if ( isOneFreeShipping() ): ?>
							<h3><?php _e( 'Shipping method', 'ami3' ); ?></h3>
							<div class="row">
								<div class="field-group">
									<div class="box-radio">
										<label class="pull-left"><input form="form_delivery" type="radio" checked><?php _e( 'Free International Shipping', 'ami3' ) ?>
										</label>
										<div class="pull-right info">
											<span class="wrap-text"><?php _e( 'Free', 'ami3' ); ?></span></div>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( $gateways ): ?>
							<h3><?php _e( 'Payment method', 'ami3' ); ?></h3>
							<div class="info-head"><?php _e( 'All transactions are secure and encrypted. Credit card information is never stored.', 'ami3' ); ?></div>
							<div class="payments-list">
								<?php

								$i = 0;

								foreach ( $gateways as $k => $v ) {

									if( $k == 'promo_code' ) continue;

									$i++;

									$checked = ( $fields[ 'type' ]=='' && $i == 1 ) ? 'checked="checked"' : "";
									$checked = ( $fields[ 'type' ] == $k ) ? 'checked="checked"' : $checked;

									if ( 'paypal' == $k ) { ?>
										<div class="item">
											<div class="box-radio">
												<label class="pull-left" for="<?php echo $k ?>"><input form="form_delivery" id="<?php echo $k ?>" type="radio" name="type" value="<?php echo $k ?>" required="required" <?php echo $checked; ?>><?php _e( 'PayPal', 'ami3' ) ?>
												</label>
												<div class="pull-right info">
													<span class="wrap-img"><img src="<?php echo $v[ 'logo' ] ?>" alt=""></span>
												</div>
											</div>
											<div class="payments-field <?php echo $k ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/img/cart/pay_pal_info.jpg" alt="">
												<div class="text-info"><?php _e( 'You will be redirected to PayPal to complete your purchase securely.', 'ami3' ); ?></div>
											</div>
										</div>
									<?php } elseif ( 'cc' == $k && 'stripe' == $v[ 'type' ] ) { ?>
										<div class="item">
											<div class="box-radio">
												<label class="pull-left" for="<?php echo $k ?>"><input form="form_delivery" id="<?php echo $k ?>" type="radio" name="type" value="<?php echo $k ?>" required="required" <?php echo $checked; ?>><?php _e( 'Credit Card', 'ami3' ) ?>
												</label>
												<div class="pull-right info">
													<span class="wrap-img"><img src="<?php echo $v[ 'logo' ] ?>" alt=""></span>
												</div>
											</div>
											<div class="payments-field <?php echo $k ?>">
												<div class="card">
													<div class="col-xs-60 card_number">
														<input form="form_delivery" class="form-control" id="number" type="text" inputmode="numeric" pattern="[0-9]*" name="number" placeholder="<?php _e( 'Card number', 'ami3' ) ?>" required="required">
													</div>
													<div class="col-sm-30 col-xs-60 name_on_card "><i class="icon"></i>
														<input class="form-control" type="text" name="name_card" placeholder="<?php _e( 'Name on card', 'ami3' ) ?>" required="required">
													</div>
													<div class="col-xs-30 col-sm-15">
														<div class="form-control date">
															<input class="" type="number" name="exp_month" pattern="^(0[1-9]|1[0-2])$" placeholder="MM" required="required">
															<span class="separator">/</span>
															<input class="" type="number" name="exp_year" pattern="^([1-2][0-9])$" placeholder="YY" required="required">
														</div>

													</div>
													<div class="col-xs-30 col-sm-15 cvc">
														<input class="form-control" type="number" name="cvv" placeholder="<?php _e( 'CVC', 'ami3' ) ?>" required="required">
													</div>
												</div>
											</div>
										</div>
									<?php } else { ?>
										<div class="item">
											<div class="box-radio">
												<label class="pull-left" for="<?php echo $k ?>"><input form="form_delivery" id="<?php echo $k ?>" type="radio" name="type" value="<?php echo $k ?>" <?php echo $checked;?>><?php echo $v['title']; ?>
												</label>
												<div class="pull-right info">
													<span class="wrap-img"><img src="<?php echo $v[ 'logo' ] ?>" alt=""></span>
												</div>
											</div>
											<div class="payments-field <?php echo $k ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/img/cart/pay_pal_info.jpg" alt="">
												<div class="text-info"><?php _e( 'You will be redirected to complete your purchase securely.', 'ami3' ); ?></div>
											</div>
										</div>
									<?php }
								} ?>
							</div>
						<?php endif; ?>
						<div class="b-cart-btn_active">
							<div class="continue_shopping pull-left">
								<span>‹</span>
								<a href="/" class="link_continue_shopping"><?php _e( 'Continue shopping', 'ami3' ); ?></a>
							</div>
                            <button type="submit" id="process-checkout" form="form_delivery" name="ads_checkout" value="ads" class="btn pull-right"><?php _e( 'Сomplete order', 'ami3' ); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<div id="ads-notify" style="display:none"><?php echo $message; ?></div>
<?php get_footer() ?>