<?php if ( $gateways ): ?>
	<div class="payments-list-head">
		<div class="wrap-line">
			<h4 class="head-line">
				<?php _e( 'Payment method', 'ami3' ) ?>:
			</h4>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-60">
			<div class="col-sm-52 col-sm-offset-8">
				<div class="payments-list">
					<?php

					$i = 0;

					foreach ( $gateways as $k => $v ) {

						if ( $k == 'promo_code' ) {
							continue;
						}

						$i ++;

						$checked = ( $fields[ 'type' ] == '' && $i == 1 ) ? 'checked="checked"' : "";
						$checked = ( $fields[ 'type' ] == $k ) ? 'checked="checked"' : $checked;

						if ( 'paypal' == $k ) { ?>
							<div class="col-sm-36 item">
								<div class="box-radio">
									<label class="pull-left" for="<?php echo $k ?>"><input form="form_delivery" id="<?php echo $k ?>" type="radio" name="type" value="<?php echo $k ?>" required="required" <?php echo $checked; ?>><?php _e( 'PayPal', 'ami3' ) ?>
									</label>
									<div class="pull-right info">
										<span class="wrap-img"><img src="<?php echo $v[ 'logo' ] ?>?1000" alt=""></span>
									</div>
								</div>
								<div class="payments-field <?php echo $k ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/img/cart/pay_pal_info.jpg?1000" alt="">
									<div class="text-info"><?php _e( 'You will be redirected to PayPal to complete your purchase securely.', 'ami3' ); ?></div>
								</div>
							</div>
							<div class="col-sm-23 col-sm-offset-1">
								<?php if ( cz( 'tp_paypal_info_enable' ) && cz( 'tp_paypal_info_text' ) ): ?>
									<div class="payments-list--info">
										<div class="text"><span>*</span>
											<?php echo cz( 'tp_paypal_info_text' ); ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php } elseif ( 'cc' == $k && in_array($v['type'], array_keys(ads_ccard_form_access()))) { ?>

							<div class="col-sm-36 item">
								<div class="box-radio">
									<label class="pull-left" for="<?php echo $k ?>">
                                        <input form="form_delivery" id="<?php echo $k ?>" type="radio" name="type" value="<?php echo $k ?>" required="required" <?php echo $checked; ?>>
                                        <?php echo isset($v['title']) && ! empty($v['title']) ? $v['title'] : __( 'Credit Card', 'ami3' ) ?>
									</label>
									<div class="pull-right info">
										<span class="wrap-img"><img src="<?php echo $v[ 'logo' ] ?>?1000" alt=""></span>
									</div>
								</div>
								<div class="payments-field <?php echo $k ?>">
                                    <div class="card">
										<div class="col-xs-60 card_number">
											<input form="form_delivery" class="form-control" id="number" type="text" inputmode="numeric" pattern="[0-9]*" name="number" placeholder="<?php _e( 'Card number', 'ami3' ) ?>" required="required">
										</div>
										<div class="col-xs-60 col-md-29 col-lg-34 name_on_card "><i class="icon"></i>
											<input class="form-control" type="text" name="name_card" placeholder="<?php _e( 'Name on card', 'ami3' ) ?>" required="required">
										</div>
										<div class="col-xs-30 col-md-18 col-lg-14">
											<div class="form-control date">
												<input class="" type="number" name="exp_month" pattern="^(0[1-9]|1[0-2])$" placeholder="MM" required="required">
												<span class="separator">/</span>
												<input class="" type="number" name="exp_year" pattern="^([1-2][0-9])$" placeholder="YY" required="required">
											</div>

										</div>
										<div class="col-xs-30 col-md-13 col-lg-12 cvc">
											<input class="form-control" type="number" name="cvv" placeholder="<?php _e( 'CVC', 'ami3' ) ?>" required="required">
										</div>
									</div>
                                    <?php if ($v['type'] == 'squareup'):?>
                                        <input type="hidden" id="card-nonce" name="nonce">
                                    <?php endif;?>
								</div>
							</div>
							<div class="col-sm-23 col-sm-offset-1">
								<?php if ( cz( 'tp_credit_card_info_enable' ) && cz( 'tp_credit_card_info_text' ) ): ?>
									<div class="payments-list--info">
										<div class="text"><span>*</span>
											<?php echo cz( 'tp_credit_card_info_text' ); ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php } else { ?>
							<div class="col-sm-36 item">
								<div class="box-radio">
									<label class="pull-left" for="<?php echo $k ?>"><input form="form_delivery" id="<?php echo $k ?>" type="radio" name="type" value="<?php echo $k ?>" <?php echo $checked; ?>><?php echo $v[ 'title' ]; ?>
									</label>
									<div class="pull-right info">
										<span class="wrap-img"><img src="<?php echo $v[ 'logo' ] ?>?1000" alt=""></span>
									</div>
								</div>
								<div class="payments-field <?php echo $k ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/img/cart/pay_pal_info.jpg?1000" alt="">
									<div class="text-info"><?php _e( 'You will be redirected to complete your purchase securely.', 'ami3' ); ?></div>
								</div>
							</div>
							<div class="col-sm-23 col-sm-offset-1">
                                <?php if ( cz( 'tp_credit_card_info_enable' ) && cz( 'tp_credit_card_info_text' ) ): ?>
                                    <div class="payments-list--info">
                                        <div class="text"><span>*</span>
                                            <?php echo cz( 'tp_credit_card_info_text' ); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
							</div>
						<?php }
					} ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>