<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 22.06.2016
 * Time: 11:07
 */
?>
<?php
echo '<form class="subscribe-form form-inline" method="post" accept-charset="UTF-8"
            action="https://www.aweber.com/scripts/addlead.pl">
	<input type="hidden" name="meta_web_form_id" value="509496166"/>
	<input type="hidden" name="meta_split_id" value=""/>
	<input type="hidden" name="listname" value="awlist3960106"/>
	<input type="hidden" name="redirect" value="' . get_site_url() . '/subscription"/>
	<input type="hidden" name="meta_adtracking" value="World_Of_Harry_Potter"/>
	<input type="hidden" name="meta_message" value="1001"/>
	<input type="hidden" name="meta_required" value="email"/>
	<input type="hidden" name="meta_tooltip" value=""/>
	<div class="form-group">
		<input type="email" name="email" value="" class="form-control" id="email"
		       placeholder="' . __( 'Please enter you email', 'ami3' ) . '"
		       required="required">
		<button name="submit" type="submit" value="Submit"
		        class="btn btn-default rippler rippler-default">' . __( 'Subscribe', 'ami3' ) . '</button>
	</div>
	<p>
		<small>' . __( 'Register now to get updates on promotions and coupons.', 'ami3' ) . '</small>
	</p>
</form>';