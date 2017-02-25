<?php

class adsProductTM extends \ads\adsProduct {
	public  $is_free_shipping = false;
	public  $price_shipping   = false;
	private $product          = '';

	public function __construct( $args = array() ) {
		$post_id = '';
		parent::__construct( $post_id, $args );
	}

	public function starRating( $count = false ) {
		$number = floatval( $this->getRate() );
		$max    = 5;

		$int  = intval( $number );
		$star = array();

		for ( $i = 0; $i < $int; $i ++ ) {
			$star[] = 'full';
		}

		if ( $int != $number ) {
			$star[] = 'half';
		}

		$empty = $max - count( $star );
		for ( $i = 0; $i < $empty; $i ++ ) {
			$star[] = 'no';
		}

		$star = implode( '"></span><span class="star star-', $star );

		$method = $count ? '<span class="call-item"> (' . $count . ')</span>' : '';

		return '<div class="stars"><span class="star star-' . $star . '"></span>' . $method . '</div>';
	}

	public function ratingPercentage() {
		$number = floatval( $this->getRate() );
		$max    = 5;

		return ( $number * 100 ) / $max;
	}

	private function getSave( $_salePrice, $_price ) {

		$savePercent = $_price > 0 && $_salePrice > 0 ? round( ( ( $_price - $_salePrice ) / $_price ) * 100 ) : false;
		if ( $savePercent && $savePercent > 0 ) {
			$_save = $_price - $_salePrice;
			$save  = ads_price_out_current_front( $_save );
		} else {
			$savePercent = '';
			$save        = '';
			$_save       = false;
		}

		return array(
			'savePercent' => $savePercent,
			'save'        => $save,
			'_save'       => $_save
		);
	}

	function singleProduct() {

		$currency   = $this->getCurrency();
		$_price_nc  = $this->getPrice();
		$_salePrice_nc  = $this->getSalePrice();

		$_price     = function_exists( 'ads_price_convert' ) ? ads_price_convert( $_price_nc, $currency ) : 0;
		$_salePrice = function_exists( 'ads_price_convert' ) ? ads_price_convert( $_salePrice_nc, $currency ) : 0;

		if ( $_salePrice < $_price ) {
			$price = ads_price_out_current_front( $_price );
		} else {
			$price = false;
		}

		$salePrice = ads_price_out_current_front( $_salePrice );

		$skuAttr = $this->getSkuAttr();
		if ( $skuAttr ) {
			foreach ( $skuAttr as $k=>$v ) {
				$skuAttr[$k][ '_price_nc' ] = $skuAttr[$k][ 'price' ];
				$skuAttr[$k][ '_salePrice_nc' ] = $skuAttr[$k][ 'salePrice' ];

				$skuAttr[$k][ 'price' ]     = ads_price_convert( $v[ 'price' ], $currency );
				$skuAttr[$k][ 'salePrice' ] = ads_price_convert( $v[ 'salePrice' ], $currency );


				$skuAttr[$k][ 'discount' ] = '';
				$skuAttr[$k][ 'save' ]     = '';
				if ( $skuAttr[$k][ 'price' ] > 0 ) {
					$skuAttr[$k][ '_save_nc' ] = $skuAttr[$k][ '_price_nc' ] - $skuAttr[$k][ '_salePrice_nc' ];
					$skuAttr[$k][ 'save' ]     = ads_price_out_current_front( $skuAttr[$k][ 'price' ] - $skuAttr[$k][ 'salePrice' ] );
					$skuAttr[$k][ 'discount' ] = round( ( ( $skuAttr[$k][ 'price' ] - $skuAttr[$k][ 'salePrice' ] ) / $skuAttr[$k][ 'price' ] ) * 100 );
				}
				$skuAttr[$k][ '_price' ]     = $skuAttr[$k][ 'price' ];
				$skuAttr[$k][ 'price' ]      = ads_price_out_current_front( $skuAttr[$k][ 'price' ] );
				$skuAttr[$k][ '_salePrice' ] = $skuAttr[$k][ 'salePrice' ];
				$skuAttr[$k][ 'salePrice' ]  = ads_price_out_current_front( $skuAttr[$k][ 'salePrice' ] );
			}
		}

		/*вывод цены первой вариации*/
		$sku = $this->getSku();

		if ( ! empty( $sku ) && $skuAttr ) {
			$attrPrice  = $skuAttr;
			$attrPrice  = array_shift( $attrPrice );
			$_salePrice = $attrPrice[ '_salePrice' ];
			$_salePrice_nc = $attrPrice[ '_salePrice_nc' ];
			$salePrice  = $attrPrice[ 'salePrice' ];
			$_price     = $attrPrice[ '_price' ];
			$_price_nc  = $attrPrice[ '_price_nc' ];
			$price      = $attrPrice[ 'price' ];
		}

		$saveInfo = $this->getSave( $_salePrice, $_price );
		$saveInfo_nc = $this->getSave( $_salePrice_nc, $_price_nc );

		$shipping = $this->getShipping();
		$_save_nc  = $_price_nc - $_salePrice_nc;
		$this->product = $foo = array(
			'price'         => $price,
			'salePrice'     => $salePrice,
			'_price'        => $_price,
			'_price_nc'     => $_price_nc,
			'_salePrice'    => $_salePrice,
			'_salePrice_nc' => $_salePrice_nc,
			'savePercent'   => $saveInfo[ 'savePercent' ],
			'save'          => $saveInfo[ 'save' ],
			'_save'         => $saveInfo[ '_save' ],
			'_save_nc'      => $saveInfo_nc[ '_save' ],
			'currency'      => $currency,
			'quantity'      => $this->getQuantity(),

			'shipping'         => $shipping,
			'renderShipping'   => $this->renderShipping( $shipping ),
			'currency_shipping'=> ADS_MAIN_CUR,
			'is_free_shipping' => $this->is_free_shipping,
			'price_shipping'   => $this->price_shipping,

			'rate'            => $this->getRate(),
			'promotionVolume' => $this->getPromotionVolume(),

			'pack'   => $this->getPack(),
			'attrib' => $this->getAttributes(),

			'gallery' => $this->getGallery(),
			'sku'     => $sku,
			'skuAttr' => $skuAttr
		);

		return $foo;
	}

	public function getHiddenFiends( $product = false ) {

		$foo = array(
			'currency',
			'_price',
			'_price_nc',
			'_save',
			'_save_nc',
			'savePercent',
			'_salePrice',
			'_salePrice_nc',
			'price',
			'salePrice',
			'save',
			'currency_shipping'

		);

		$hidden  = '';
		$product = $product ? $product : $this->product;
		foreach ( $foo as $v ) {
			$hidden .= sprintf( '<input type="hidden" name="%1$s" value="%2$s">',
				$v,
				$product[ $v ]
			);
		}

		return $hidden;
	}

	public function singleProductMin() {

		$currency       = $this->getCurrency();
		$_price_nc      = $this->getPrice();
		$_salePrice_nc = $this->getSalePrice();

		$_price     = ads_price_convert( $_price_nc, $currency );
		$_salePrice = ads_price_convert( $_salePrice_nc, $currency );

		$price     = $_price !== $_salePrice ? ads_price_out_current_front( $_price ) : false;
		$salePrice = ads_price_out_current_front( $_salePrice );

		$discount = $_price > 0 && $_salePrice > 0 ? round( ( ( $_price - $_salePrice ) / $_price ) * 100 ) : false;
		$discount = ( $discount && $discount > 0 ) ? $discount : false;

		$thumb  = $this->getImageUrl( 'ads-medium' );

		return array(
			'_price_nc'       => $_price_nc,
			'_price'          => $_price,
			'price'           => $price,
			'_salePrice'      => $_salePrice,
			'_salePrice_nc'   => $_salePrice_nc,
			'salePrice'       => $salePrice,
			'currency'        => $currency,
			'discount'        => $discount,
			'thumb'           => $thumb,
			'promotionVolume' => $this->getPromotionVolume(),
			'rate'            => $this->getRate(),
		);
	}

	private function renderShipping( $shipping ) {

		$foo = dav_shippingList();

		$render = '';

		if ( is_array( $shipping ) && count( $shipping ) > 1 ) {

			$key                  = key( $shipping );
			$time                 = $shipping[ $key ][ 'time' ];
			$this->price_shipping = $shipping[ $key ][ 'cost' ];

			$render .= '<select data-singleProduct="single-shipping" name="shipping" >';

			foreach ( $shipping as $k => $v ) {
				if ( $k == 'free' ) {
					$this->is_free_shipping = true;
				}
				$render .= sprintf( '<option value="%1$s" data-info="%3$s" data-price="%5$s" data-cost_nc="%6$s" data-template="{{price}} %2$s">%4$s %2$s</option>',
					$k,
					$foo[ $k ],
					$v[ 'time' ],
					$v[ 'cur_cost' ],
					$v[ 'cost' ],
					$v[ '_cost_nc' ]
				);
			}

			$render .= '</select>';
			if ( ! empty( $time ) ) {
				$render .= '</select><p class="shipping-info" data-singleProduct="shipping-info">' . $time . '</p>';
			}


		} else {

			$key      = 'free';
			$time     = '';
			$cur_cost = '';
			$_cost_nc = 0;

			if ( is_array( $shipping ) && count( $shipping ) == 1 ) {

				$key      = key( $shipping );
				$time     = $shipping[ $key ][ 'time' ];
				$cur_cost = $shipping[ $key ][ 'cur_cost' ];
				$_cost_nc = $shipping[ $key ][ '_cost_nc' ];
			}

			if ( $key == 'free' ) {
				$cur_cost               = '';
				$this->is_free_shipping = true;
			}
			$this->price_shipping = isset( $shipping[ $key ][ 'cost' ] ) ? $shipping[ $key ][ 'cost' ] : 0;

			$render .= sprintf(
				'<span data-singleproduct="single-shipping_value">%4$s %1$s</span>%3$s
				<input data-singleproduct="single-shipping" data-template="{{price}} %1$s" type="hidden" name="shipping" value="%2$s" data-info="%4$s" data-cost_nc="%5$s">',
				$foo[ $key ],
				$key,
				! empty( $time ) ? sprintf( '<p class="shipping-info" data-info="shipping-info">%1$s</p>', $time ) : '',
				$cur_cost,
				$_cost_nc
			);
		}

		return $render;
	}

}


class adsFeedBackTM extends \ads\adsFeedback {

	public function __construct( $post_id ) {
		global $wp_query;
		$cpage = max( 1, get_query_var( 'cpage' ) );

		$posts_per_page = ( isset( $wp_query->query_vars[ 'comments_per_page' ] ) &&
		                    intval( $wp_query->query_vars[ 'comments_per_page' ] ) ) ?
			$wp_query->query_vars[ 'comments_per_page' ] :
			intval( get_option( 'comments_per_page' ) );

		parent::__construct( $post_id, $cpage, $posts_per_page );
	}

	static public function renderStarRating( $rating ) {
		$full_stars  = floor( $rating );
		$half_stars  = ceil( $rating - $full_stars );
		$empty_stars = 5 - $full_stars - $half_stars;

		echo str_repeat( '<span class="star star-full"></span>', $full_stars );
		echo str_repeat( '<span class="star star-half"></span>', $half_stars );
		echo str_repeat( '<span class="star star-no"></span>', $empty_stars );
	}
}

function ads_get_currency() {

	$list_currency = ads_get_list_currency();

	$html = sprintf( '<img src="%1$s"><span>(%2$s)</span> ',
		pachFlag( $list_currency[ ADS_CUR ][ 'flag' ] ) . '?100',
		trim( $list_currency[ ADS_CUR ][ 'symbol' ] ) );

	$foo = array(
		'ADS_CUR'               => ADS_CUR,
		'ADS_PRICE_ASSIGNCENTS' => ADS_PRICE_ASSIGNCENTS,
		'ADS_PRICE_ROUNDING'    => ADS_PRICE_ROUNDING,
		'ADS_MAIN_CUR'          => ADS_MAIN_CUR,
		'currency_shipping'     => ADS_MAIN_CUR,
		'html'                  => $html
	);

	echo json_encode( $foo );
	die();
}

add_action( 'wp_ajax_ads_get_currency', 'ads_get_currency' );
add_action( 'wp_ajax_nopriv_ads_get_currency', 'ads_get_currency' );
