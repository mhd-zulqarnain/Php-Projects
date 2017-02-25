<?php
/**
 * DOWNLOAD NOW - WooCommerce - Compatibility Functions
 * 
 * Functions for compatibility with other plugins.
 * 
 * @version	2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function somdn_is_product_valid_compat( $productID ) {

	if ( function_exists( 'wc_memberships' ) ) {
	
		$postype = get_post_type( $productID );
	
		if ( 'wc_membership_plan' == $postype ) {
			return false;
		}
	
		if ( ! somdn_is_user_member_purchase( $productID ) ) {
			return false;
		}
		
	}

	if ( class_exists( 'WC_Subscriptions_Product' ) ) {
	
		$subscriptions = array( 'subscription', 'variable-subscription' );
	
		if ( has_term( $subscriptions, 'product_type', $productID ) ) {
			return false;
		}
		
	}

	return true;

}

function somdn_is_user_member_purchase( $productID ) {

	//if ( wc_memberships_is_product_purchasing_restricted( $productID ) ) {}

	$has_access = current_user_can( 'wc_memberships_purchase_restricted_product', $productID );

	if ( $has_access ) {
		return true;
	} else {
		return false;
	}

	return true;

}

function somdn_is_purchasable_compat( $purchasable ) {

	if ( somdn_ti_wishlist_exists() && is_product() ) {
		$purchasable = true;
	}

	return $purchasable;

}

add_action('wp_head', 'somdn_purchasable_compat_head');

function somdn_purchasable_compat_head() {

	if ( ! is_product() ) {
		return;
	}

	$product = wc_get_product();

	if ( ! $product ) {
		global $product;
	}

	if ( ! $product ) {
		return;
	}

	$productID = $product->id;
	$downloadable = $product->downloadable;

	if ( somdn_is_product_valid( $productID, $downloadable ) ) {

		if ( somdn_ti_wishlist_exists() ) {
			somdn_ti_wishlist_header();
		}

	}

}

function somdn_ti_wishlist_exists() {
	if ( class_exists( 'TInvWL_Public_AddToWishlist' ) ) {
		return true;
	}		
}

function somdn_ti_wishlist_add_to_cart() {
	if ( somdn_ti_wishlist_exists() ) {
		$position = tinv_get_option( 'add_to_wishlist', 'position' );
			if ( 'shortcode' != $position ) {
				return true;
			}
	}	
}

function somdn_ti_wishlist_show_link() {
	//echo do_shortcode( '[ti_wishlists_addtowishlist]' );
}

function somdn_ti_wishlist_header() { ?>
<style>
	.single-product div.product form.cart { display: none!important; }
	.tinv-wraper.woocommerce.tinv-wishlist.tinvwl-shortcode-add-to-cart { padding-bottom: 15px; }
</style>
<?php
}

function somdn_hide_cart_style() { ?>
<style>
	.single-product div.product form.cart { display: none!important; }
</style>
<?php
}