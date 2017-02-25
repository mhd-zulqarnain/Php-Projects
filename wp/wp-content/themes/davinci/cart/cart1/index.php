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
	<div class="page-checkout cart1">
		<div class="container">
			<div class="title-page"><?php _e( 'Cart', 'ami3' ); ?></div>
			<div class="row">
				<div class="col-md-45">
					<?php if ( file_exists( dirname( __FILE__ ) . '/_cart.php' ) ) {
						include dirname( __FILE__ ) . '/_cart.php';
					} ?>
				</div>
				<div class="col-md-14 col-md-offset-1 right-column">
					<?php if ( file_exists( dirname( __FILE__ ) . '/tpl/_sidebar.php' ) ) {
						include dirname( __FILE__ ) . '/tpl/_sidebar.php';
					} ?>
				</div>
			</div>
		</div>
	</div>
	<div id="ads-notify" style="display:none"><?php echo $message; ?></div>
<?php get_footer() ?>