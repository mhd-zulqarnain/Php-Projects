<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 24.12.2015
 * Time: 11:31
 */
?>
<?php
/**
 * The title meta tag to page
 */
function dav_title() {

	global $page, $paged, $wp, $post;
	$title = '';
	$tPage = '';

	if ( $paged >= 2 || $page >= 2 ) {
		$tPage = ' - ' . sprintf( __( 'Page %s', 'ami3' ), max( $paged, $page ) );
	}

	if ( dav_is_home() ) {
		$title = cz( 'tp_home_seo_title' );
		echo $title . $tPage;

		return;
	}

	if ( is_single() && get_post_type() == 'product' ) {
		$obj = new adsProductTM();
		$obj->getById( $post->ID );
		$title = $obj->getSeoTitle();
		if ( ! $title ) {
			$nameProduct = single_post_title( '', false );
			$title       = $nameProduct . ' - ' . __( 'free shipping worldwide', 'ami3' );
		}
		echo $title . $tPage;

		return;
	}

	if ( is_tax( 'product_cat' ) ) {

		$title = get_query_var( 'seo_title' );

		if ( $title ) {
			echo $title;

			return;
		}

		$nameCat = dav_single_term();

		$title = __( 'Online shopping for ', 'ami3' ) . $nameCat . ' ' . __( 'with free worldwide shipping', 'ami3' );
		echo $title . $tPage;

		return;
	}

	if ( ! is_single() && ! is_tax( 'product_cat' ) && get_post_type() == 'product' ) {
		$title = cz( 'tp_seo_products_title' );
		echo $title . $tPage;

		return;
	}

	$slug = isset( $wp->query_vars[ "pagename" ] ) ? $wp->query_vars[ "pagename" ] : '';

	switch ( $slug ) {
		case 'about-us':
			$title = __( 'About us', 'ami3' );
			break;
		case 'cart':
			$title = __( 'Your shopping cart', 'ami3' );
			break;
		case 'contact-us':
			$title = __( 'Contact us', 'ami3' );
			break;
		case 'frequently-asked-questions':
			$title = __( 'FAQ – popular questions answered', 'ami3' );
			break;
		case 'payment-methods':
			$title = __( 'Payment methods available for you' );
			break;
		case 'shipping-delivery':
			$title = __( 'Our shipping methods and terms', 'ami3' );
			break;
		case 'subscription':
			$title = __( 'Thank you for subscription!', 'ami3' );
			break;
		case 'thankyou-contact':
			$title = __( 'Thank you for contacting us!', 'ami3' );
			break;
	}

	if ( $title ) {
		echo $title . $tPage;

		return;
	}

	wp_title( '|', true, 'right' );

	$site_name = get_bloginfo( 'name' );
	if ( $site_name ) {
		echo " $site_name" . $tPage;
	}

}

/**
 *
 */
function dav_description() {
	global $page, $paged, $wp, $post;
	$tPage = '';

	if ( $paged >= 2 || $page >= 2 ) {
		$tPage = ' - ' . sprintf( __( 'Page %s', 'ami3' ), max( $paged, $page ) );
	}
	$description = '';

	if ( dav_is_home() ) {
		$description = cz( 'tp_home_seo_description' );
		echo $description . $tPage;

		return;
	}

	if ( is_single() && get_post_type() == 'product' ) {
		$obj = new adsProductTM();
		$obj->getById( $post->ID );
		$description = $obj->getSeoDescription();
		if ( ! $description ) {
			$nameProduct = single_post_title( '', false );
			$description = __( 'Buy', 'ami3' ) . ' ' . $nameProduct . ' ' . __( 'at', 'ami3' ) . ' ' . dav_get_host() . '! ' .
			               __( 'Free shipping to 185 countries. 45 days money back guarantee.', 'ami3' );
		}
		echo $description . $tPage;

		return;
	}

	if ( is_tax( 'product_cat' ) ) {

		$description = get_query_var( 'seo_description' );
		if ( $description ) {
			echo $description;

			return;
		}
		$nameCat     = dav_single_term();
		$description = __( 'Great selection of', 'ami3' ) . ' ' . $nameCat . ' ' .
		               __( 'at affordable prices! Free shipping to 185 countries.
45 days money back guarantee. Friendly customer service.', 'ami3' );
		echo $description . $tPage;

		return;
	}

	if ( ! is_single() && ! is_tax( 'product_cat' ) && get_post_type() == 'product' ) {
		$description = cz( 'tp_seo_products_description' );
		echo $description . $tPage;

		return;
	}

	$slug = isset( $wp->query_vars[ "pagename" ] ) ? $wp->query_vars[ "pagename" ] : '';

	switch ( $slug ) {
		case 'about-us':
			$description = __( 'We are doing our best to make your shopping online effortless and carefree, we hope you enjoy your experience with us.', 'ami3' );
			break;
		case 'cart':
			$description = __( 'Add products to your shopping cart and buy easily anytime with free shipping worldwide.', 'ami3' );
			break;
		case 'contact-us':
			$description = __( 'If you have any questions just fill in the contact form and we will respond you promptly.', 'ami3' );
			break;
		case 'frequently-asked-questions':
			$description = __( 'Frequently asked questions answered by our store support team, find the questions you wanted to ask', 'ami3' );
			break;
		case 'payment-methods':
			$description = __( 'You can use these payment methods to pay for your purchases in this store', 'ami3' );
			break;
		case 'shipping-delivery':
			$description = __( 'Our shipping methods include DHL and EMS, terms of delivery depend on customer location and shipping service company', 'ami3' );
			break;
		case 'subscription':
			$description = __( 'Subscribe to our newsletter and get the latest updates on your favorite items in our store', 'ami3' );
			break;
		case 'thankyou-contact':
			$description = __( 'We are happy to get your feedback, our support team will revise your message and answer in the short run', 'ami3' );
			break;
	}

	echo $description . $tPage;

	return;
}

function dav_keywords() {
	global $post;
	$keywords = '';

	if ( dav_is_home() ) {
		echo cz( 'tp_home_seo_keywords' );

		return;
	}

	if ( is_single() && get_post_type() == 'product' ) {
		$obj = new adsProductTM();
		$obj->getById( $post->ID );
		$keywords = $obj->getSeoKeywords();
		if ( ! $keywords ) {
			$nameProduct = single_post_title( '', false );
			$nameProduct = trim( $nameProduct );
			$nameProduct = str_replace( array( ' ' ), ',', $nameProduct );
			$nameProduct = str_replace( array( ',,'), ',', $nameProduct );
			echo $nameProduct;
			return;
		}
	}

	/*products all*/
	if ( ! is_single() && ! is_tax( 'product_cat' ) && get_post_type() == 'product' ) {
		$keywords = cz( 'tp_seo_products_keywords' );
		if ( $keywords ) {
			echo $keywords;

			return;
		}

		return;
	}

	if ( is_tax( 'product_cat' ) ) {
		$keywords = get_query_var( 'seo_keywords' );
		if ( $keywords ) {
			echo $keywords;

			return;
		}

		return;
	}

	echo $keywords;
}


