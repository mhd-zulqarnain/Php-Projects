<div class="order-form">

	<div class="wrap-line">
		<h4 class="head-line">
			<?php _e( 'Please fill in your shipping details', 'ami3' ) ?>:
		</h4>
	</div>
    <?php
        $usr = array(
            'email'       => '',
            'name'        => '',
            'address'     => '',
            'city'        => '',
            'state'       => '',
            'country'     => '',
            'postal_code' => '',
            'phone'       => ''
        );

        if (class_exists('\models\account\User')) {
            $userModel = new \models\account\User();

            $usr = array(
                'email'       => $userModel->getEmail(),
                'name'        => trim($userModel->getFirst_name() . ' ' . $userModel->getLast_name()),
                'address'     => $userModel->getAddress(),
                'city'        => $userModel->getCity(),
                'state'       => $userModel->getState(),
                'country'     => $userModel->getAccount_country(),
                'postal_code' => $userModel->getPostal_code(),
                'phone'       => $userModel->getPhone_number()
            );
        }
    ?>
	<div class="form-horizontal b-form_order_details">
		<div class="row">
			<div class="form-group col-sm-30">
				<label for="email" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'Email', 'ami3' ) ?>:<span class="required_item">*</span></span>
				</label>

				<div class="col-sm-44">
					<input type="email" class="form-control" id="email" name="email"
                           required="required" value="<?php echo $usr['email'];?>">
					<span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>
			<div class="form-group col-sm-30">
				<label for="full_name" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'Full name', 'ami3' ) ?>:<span class="required_item">*</span></span>
				</label>
				<div class="col-sm-44">
					<input type="text" class="form-control" id="full_name" name="full_name"
                           required="required" value="<?php echo $usr['name'];?>">
					<span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>
			<hr class="col-sm-60 b-form_order_details_hr_dashed">
			<div class="form-group col-sm-30">
				<label for="address" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'Address', 'ami3' ) ?>:<span class="required_item">*</span></span>
				</label>

				<div class="col-sm-44">
					<input type="text" class="form-control" id="address" name="address"
                           required="required" value="<?php echo $usr['address'];?>">
					<span class="js-notifi_invalid"><?php _e( 'Invalid: Address', 'ami3' ); ?></span>
				</div>
			</div>
			<div class="form-group col-sm-30">
				<label for="city" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'City', 'ami3' ) ?>:<span class="required_item">*</span></span>
				</label>
				<div class="col-sm-44">
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $usr['city'];?>" required="required">
					<span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>

			<div class="form-group col-sm-30">
				<label for="country" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'Country', 'ami3' ) ?>:<span class="required_item">*</span></span>
				</label>

				<div class="col-sm-44 form-control-select">
                    <?php $themeObject = wp_get_theme();?>
					<select name="country" id="country" class="form-control" data-theme="<?php echo $themeObject->Name;?>" required="required"
                            data-country-value="<?php echo $usr['country']; ?>">
						<?php ads_get_list_contries() ?>
					</select> <span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>

			<div class="form-group col-sm-30">
				<label for="state" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'State/Region', 'ami3' ) ?>:<span class="required_item">*</span></span></label>

				<div class="col-sm-44">
					<select id="js-stateSelect" name="state" class="form-control" required="required" data-state-value="<?php echo $usr['state'];?>" style="display: none">

					</select>
					<input type="text" class="form-control" id="js-stateText" name="state" required="required"
                           data-state-value="<?php echo $usr['state'];?>">
					<span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>

			<div class="form-group col-sm-30">
				<label for="postal_code" class="col-sm-16 control-label">
					<span class="label_name"><?php _e( 'Postal code', 'ami3' ) ?>:<span class="required_item">*</span></span>
				</label>
				<div class="col-sm-44">
					<input type="text" class="form-control input_text" id="postal_code" name="postal_code"
                           required="required" value="<?php echo $usr['postal_code']; ?>">
					<span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>
			<div class="form-group col-sm-30">
				<?php
				$label ='';
				$required ='';

				if ( cz( 'tp_phone_number_required' ) ) {
					$label = '<span class="required_item">*</span>';
					$required = 'required="required"';
				}?>
				<label for="phone_number" class="col-sm-16 control-label">
												<span class="label_name"><?php _e( 'Phone', 'ami3' ) ?>:<?php echo $label; ?></span> </label>

				<div class="col-sm-44">
					<input type="tel" class="form-control input_text" id="phone_number" name="phone_number"
                           placeholder="" <?php echo $required; ?> value="<?php echo $usr['phone']; ?>">
					<span class="js-notifi_invalid"><?php _e( 'This field is required', 'ami3' ); ?></span>
				</div>
			</div>

			<div class="form-group col-sm-60">
				<?php
				$label ='';
				$required ='';

				if ( cz( 'tp_description_required' ) ) {
					$label = '<span class="required_item">*</span>';
					$required = 'required="required"';
				}?>
				<label for="description" class="col-sm-8 control-label">
					<span class="label_name"><?php _e( 'Additional details', 'ami3' ) ?>:<?php echo $label; ?></span> </label>
				<div class="col-sm-52">
					<textarea class="form-control" rows="3" id="description" name="description" placeholder="<?php _e( 'Please leave any questions or wishes regarding your order here', 'ami3' ); ?>" <?php echo $required; ?>></textarea>
				</div>

			</div>
            
        <?php
        if ( class_exists('\models\account\User') && get_option('users_can_register') == 1) {
            if ($userModel->getUser_id() == 0) : ?>
                <div class="col-md-30">
                    <div class="form-group">
                        <label for="register" class="col-sm-16 control-label">
                            <span class="label_name">
                                <?php echo __('Register me','ads');?>
                            </span>
                        </label>
                        <div class="col-sm-44">
                            <input type="hidden" name="register" value="0" />
                            <input type="checkbox" name="register" id="register" value="1" />
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <div class="col-md-30" id="password-block" style="display: none;">
                <div class="form-group">
                    <label for="password" class="col-sm-16 control-label">
                        <span class="label_name">
                            <?php echo __('Password', 'ads');?>
                        </span>
                    </label>
                    <div class="col-sm-44">
                        <input type="password" name="password" class="form-control input_text password_fields" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="repeatPassword" class="col-sm-16 control-label">
                        <span class="label_name">
                            <?php echo __('Confirm password', 'ads');?>
                        </span>
                    </label>
                    <div class="col-sm-44">
                        <input type="password" name="repeatPassword" class="form-control input_text password_fields" />
                    </div>
                </div>
            </div>
        <?php } ?>
		</div>
	</div>
</div>