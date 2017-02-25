<?php
/**
 * DOWNLOAD NOW - WooCommerce - Functions
 * 
 * Various functions.
 * 
 * @version	2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_enqueue_scripts', 'somdn_get_script_assets' );

function somdn_get_script_assets() {

	if ( ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'download-now-woocommerce' ) ) {
		/**
		 * If the current admin page is this plugin's settings page
		 */
		wp_enqueue_script( 'somdn-settings-script', plugins_url('/assets/js/somdn-settings-script.js', dirname(__FILE__) ), 'jquery' , '1.0.0', true );
		 
		wp_register_style( 'somdn-settings-style', plugins_url('/assets/css/somdn-settings-style.css', dirname(__FILE__) ) );
		wp_enqueue_style( 'somdn-settings-style' );
	}

	wp_register_style( 'somdn-admin-style', plugins_url('/assets/css/somdn-admin-style.css', dirname(__FILE__) ) );
	wp_enqueue_style( 'somdn-admin-style' );

}


add_action( 'wp_enqueue_scripts', 'somdn_load_scripts' );

function somdn_load_scripts() {

		wp_enqueue_script( 'somdn-script', plugins_url('/assets/js/somdn_script.js', dirname(__FILE__) ), 'jquery' , '1.0.0', true );
		wp_register_style( 'somdn-style', plugins_url('/assets/css/somdn-style.css', dirname(__FILE__) ) );
		wp_enqueue_style( 'somdn-style' );

}

add_filter( 'woocommerce_is_purchasable', 'somdn_prevent_purchase', 10, 2 );

function somdn_prevent_purchase( $purchasable, $product ) {

	//return $purchasable = false;

	$productID = $product->id;
	$downloadable = $product->downloadable;

	if ( ! somdn_is_product_valid( $productID, $downloadable ) ) {
		return $purchasable;
	} else {
		$purchasable = false;
	}

	$purchasable = somdn_is_purchasable_compat( $purchasable );

	return $purchasable;

}

function somdn_is_product_valid( $productID, $downloadable ) {

	$_product = wc_get_product( $productID );

	if ( ! $_product->is_type( 'simple' ) ) {
		return false;
	}

	$genoptions = get_option( 'somdn_gen_settings' );

	// ignore and return if product is not downloadable;
	if ( $downloadable != 'yes' ) {
		return false;
	}
	
	$somdn_indy = isset( $genoptions['somdn_indy_items'] ) ? $genoptions['somdn_indy_items'] : false ;
	
	if ( $somdn_indy ) {
	
		$included = get_post_meta( $productID, 'somdn_included', true );
	
		if ( empty( $included  ) || ! $included ) {
			return false;
		}
	
	}
	
	$product = wc_get_product( $productID );
	$downloads = $product->get_files();
	$downloads_count = count( $downloads );

	if ( $downloads_count <= 0 )  {
		return false;
	}

	// ignore and return if product has variations
	if ( $product->variation_id != '' ) {
		return false;
	}

	$price = get_post_meta( $productID, '_regular_price', true);
	$sale = get_post_meta( $productID, '_sale_price', true);

	$onsaleticked = isset( $genoptions['somdn_include_sale_items'] ) ? $genoptions['somdn_include_sale_items'] : false ;
	if ( ! somdn_is_product_free( $price, $sale, $onsaleticked ) ) {
		return false;
	}

	if ( ! somdn_is_product_valid_compat( $productID ) ) {
		return false;
	}

	$requirelogin = isset( $genoptions['somdn_require_login'] ) ? true : false ;
	if ( ! is_user_logged_in() && $requirelogin ) {
		return false;
	}

	return true;

}

function somdn_is_product_free( $price, $sale, $onsaleticked ) {

	if ( ( $price <= 0.0 ) || ( $onsaleticked == true && ( $sale != NULL && $sale <= 0.0 ) ) ) {
		return true;
	}

	return false;

}

add_filter( 'woocommerce_product_add_to_cart_text' , 'somdn_change_read_more' );

function somdn_change_read_more( $text ) {

	global $product;

	$productID = $product->id;
	$downloadable = $product->downloadable;

	if ( ! somdn_is_product_valid( $productID, $downloadable ) ) {
		return $text;
	}
	
	$options = get_option( 'somdn_gen_settings' );
	$newtext = ( isset( $options['somdn_read_more_text'] ) && $options['somdn_read_more_text'] ) ? $options['somdn_read_more_text']: false ;
	
	if ( $newtext ) {
		return $newtext;
	} else {
		return $text;
	}
	
}

function somdn_get_available_downloads_text() {

	$multioptions = get_option( 'somdn_multi_settings' );

	if ( ! isset( $multioptions['somdn_available_downloads_text'] ) || ! $multioptions['somdn_available_downloads_text'] ) {
		$available_downloads_text = 'Available Downloads:';
	} else {
		$available_downloads_text = isset( $multioptions['somdn_available_downloads_text'] ) ? $multioptions['somdn_available_downloads_text'] : 'Available Downloads:' ;
	} ?>
	
	<div class="somdn-available-downloads">
		<span><?php echo $available_downloads_text; ?></span>
	</div>
	
<?php

}

function somdn_get_plugin_link_full() {
	return '?page=download-now-woocommerce';
}

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}
