<?php
add_action('init', 'dav_lang_init');
function dav_lang_init()
{
    load_theme_textdomain('ami3', get_template_directory() . '/lang');
}

function dav_setup_theme_notice_error(){

	$class = 'notice notice-error';
	$message = __( 'Error!', 'ami3' ) . ' ' . __('AliDropship Plugin was not activated!', 'ami3');

	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
}

function dav_wp_seo(){

	$seo = '<title>' . wp_title('', false) . '</title>';

	if( class_exists('\models\seo\Meta') ){
		$seo = \models\seo\Meta::block();
	}

	echo $seo;
}

function dav_setup_theme() {

	$plugins = (array)get_site_option('active_plugins', array());

	if( in_array('alids/alids.php', $plugins) )
		return false;

	if( in_array('wp-dropship-pro/wp-dropship-pro.php', $plugins) )
		return false;

	$foo = array('davinci');

	$themes = wp_get_themes();

	$too = array();

	foreach( $themes as $key => $val ) {

		if( ! in_array($key, $foo) )
			$too[] = $key;
	}

	if( count($too) > 0 ) {
		switch_theme( current($too) );

		add_action( 'admin_notices', 'dav_setup_theme_notice_error' );
	}

	return true;
}
//add_action('after_setup_theme', 'dav_setup_theme', 0);

include( __DIR__ . '/libs/fb_pixel.php' );
include( __DIR__ . '/libs/fix.php' );
include( __DIR__ . '/libs/customization/init.php' );
include( __DIR__ . '/libs/contact-form.php' );
include( __DIR__ . '/libs/breadcrumbs.php' );
include( __DIR__ . '/libs/pagination.php' );
include( __DIR__ . '/libs/comment-form.php' );
include( __DIR__ . '/libs/dav_list_review.php' );
//include( __DIR__ . '/libs/in.wigwtads.php' );
include( __DIR__ . '/libs/util.php' );
include( __DIR__ . '/libs/seo.php' );
include( __DIR__ . '/libs/icon.php' );


if ( defined('ADS_ERROR') && !ADS_ERROR ) {
	include( __DIR__ . '/libs/alids.php' );
}

if ( is_admin() ) {
    dav_lang_init();
	include( __DIR__ . '/libs/create_page_template.php' );
	include( __DIR__ . '/libs/option_blog.php' );
}
/**
 * Remove adminbar for subscribers
 */
if ( is_user_logged_in() && ! current_user_can( "level_2" ) ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

/**
 * Register primary menu
 */
register_nav_menus( array(
	'primary'  => 'Main Menu',
	'top_menu' => 'Top Menu',
	'footer1'  => 'Footer 1',
	'footer2'  => 'Footer 2',
	'footer3'  => 'Footer 3'
) );


/**
 * Add theme support for Featured Images
 */
add_image_size( 'smallest', 50, 50, true );
add_image_size( 'gallery', 200, 200, true );
add_image_size( 'medium-set', 450, 450 );
add_image_size( 'big-blog', 824, 349, true );
add_image_size( 'min-blog', 285, 177, true );
add_theme_support( 'post-thumbnails', array( 'post', 'product' ) );

/**
 * Enqueue script
 */
function dav_enqueue_script() {

	wp_register_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
	wp_register_script( 'fotorama', get_template_directory_uri() . '/js/fotorama.js', array( 'jquery' ), '2.8.1', true );
	wp_register_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array( 'jquery' ), '2.0', true );
	wp_register_script( 'social', get_template_directory_uri() . '/js/social.js', array( 'jquery' ), '1.0', true );
	wp_register_script( 'stickr', get_template_directory_uri() . '/js/jquery.stickr.min.js', array( 'jquery' ), '1.0', true );
	wp_register_script( 'polyfiller', get_template_directory_uri() . '/js/polyfiller.js?1000', array( 'jquery' ), '1.0', true );
    wp_register_script( 'baguetteBox', get_template_directory_uri() . '/js/baguetteBox.js', array(), '1.0', true );
    wp_register_script( 'baguetteInit', get_template_directory_uri() . '/js/baguetteInit.js', array('baguetteBox'), '1.0', true);
	wp_register_script( 'formatPrice', get_template_directory_uri() . '/js/formatPrice.js', array( 'jquery' ), '1.0', true);
	wp_register_script( 'currencyPrice', get_template_directory_uri() . '/js/currencyPrice.js', array('jquery' , 'formatPrice'), '1.0', true);
	wp_register_script( 'productSingle', get_template_directory_uri() . '/js/product-single.js', array('jquery','ami3','formatPrice', 'currencyPrice'), '1.0', true);

	wp_register_script( 'ami3', get_template_directory_uri() . '/js/script.js', array(
		'Bootstrap',
		'countdown',
		'front-cart',
        'front-abandoned',
		'stickr',
		'currencyPrice',
		'formatPrice'
	), '1.0', true );

	wp_localize_script( 'formatPrice', 'alidAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_localize_script( 'formatPrice', 'ADSCacheCurrency', currencyInfo() );

	wp_localize_script( 'ami3', 'davLang',
		dav_shippingList() );



	if ( is_singular( 'product' ) ) {
		wp_enqueue_script( 'fotorama' );
		wp_enqueue_script( 'baguetteInit' );
		wp_enqueue_script( 'productSingle' );
	}

	if ( is_singular() ) {
		wp_enqueue_script( 'social' );
	}

	$pagename = get_query_var( 'pagename' );
	if ( $pagename == 'cart' ) {
		wp_enqueue_script( 'polyfiller' );
		wp_enqueue_script( array( 'front-coupon', 'front-validateForm' ) );
	}

    if ( $pagename == 'account' ) {
        wp_enqueue_script( 'front-account' );
    }

    if ( $pagename == 'orders') {
        wp_enqueue_script( 'front-orders' );
        wp_enqueue_script( 'front-pagination' );
    }

	wp_enqueue_script( 'ami3');
}

add_action( 'wp', 'dav_enqueue_script', 1 );


function dav_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'dav_excerpt_length' );

/**
 * Excerpt after text
 *
 * @param $more
 *
 * @return string
 */
function dav_excerpt_more( $more ) {
	return "...";
}

add_filter( 'excerpt_more', 'dav_excerpt_more' );

/**
 * Enable responsive video (bootstrap only)
 *
 * @param $html
 * @param $url
 * @param $attr
 * @param $post_ID
 *
 * @return string
 */
function dav_oembed_filter( $html, $url, $attr, $post_ID ) {
	return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'dav_oembed_filter', 10, 4 );

/**
 * Search form hook
 *
 * @param $form
 *
 * @return string
 */
function dav_search_form( $form ) {

	ob_start();

	?>
	<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>">
		<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s"/>
		<button type="submit" id="searchsubmit"><span class="fa fa-search"></span></button>
	</form>

	<?php

	$return = ob_get_contents();
	ob_end_clean();

	return $return;
}

add_filter( 'get_search_form', 'dav_search_form' );


/**
 * Convert post_content \n
 *
 * @param $content
 *
 * @return mixed
 */
if ( ! function_exists( 'nl2br_content' ) ) {
	function nl2br_content( $content ) {
		$content = apply_filters( 'the_content', $content );

		return str_replace( ']]>', ']]>', $content );
	}
}

/**
 * Get text before tag <!--more-->
 *
 * @param $post_id
 *
 * @return mixed
 */
function dav_get_content( $post_id ) {

	$post = get_post_field( 'post_content', $post_id );
	$post = get_extended( $post );

	return $post[ 'main' ];
}

add_action( 'ads_after_content', function () {
	get_template_part( 'products/features' );
} );

add_action( 'ads_before_content', function () {
	get_template_part( 'products/countdown' );
} );

/**
 * Name of post columns
 *
 * @param $columns
 *
 * @return array
 */
function dav_columns( $columns ) {

	unset( $columns[ 'cb' ], $columns[ 'title' ] );

	return array(
		       "cb"        => __( "Select All", "wp" ),
		       "thumbnail" => __( "Thumb", "ami3" ),
		       "title"     => __( "Title", "wp" ),
	       ) + $columns;
}

add_filter( "manage_edit-post_columns", "dav_columns" );

/**
 * Value of post columns
 *
 * @param $column
 */
function dav_custom_columns( $column ) {

	global $post;

	if ( "thumbnail" == $column ) {
		echo get_the_post_thumbnail( $post->ID, 'smallest' );
	}
}

add_action( "manage_post_posts_custom_column", "dav_custom_columns" );

function dav_sortby_show() {

	echo '<ul class="sortby">';
	echo '<li class="hidden-xs"><strong>' . __( 'Sort by', 'ami3' ) . '</strong></li>';

	sortby_show();

	echo '</ul>';
}

function sortby_show(
	$ico = array(
		'desc' => 'ic icon-desc',
		'asc'  => 'ic icon-asc',
	)
) {

	$orderby = function_exists('ads_get_orderby_param') ? ads_get_orderby_param() : '';
	$order   = function_exists('ads_get_order_param') ? ads_get_order_param() : '';

	$order = ( $order == 'asc' ) ? 'asc' : 'desc';

	$s = isset( $_GET[ 's' ] ) ? '&s=' . $_GET[ 's' ] : '';

	$list = function_exists('ads_sortby_list') ? ads_sortby_list() : array();

	foreach ( $list as $key => $val ) {

		$class = ( $key == $orderby ) ? 'active' : "";

		if ( is_array( $val[ 'order' ] ) ) {

			$o = ( $order == 'asc' ) ? 'desc' : 'asc';

			printf(
				'<li><a href="?orderby=%1$s&order=%2$s%5$s" class="%3$s">%4$s <span class="%6$s"></span></a></li>',
				$key, $o, $class, $val[ 'title' ], $s, $ico[ $o ]
			);
		} else {
			printf(
				'<li><a href="?orderby=%1$s%4$s" class="%2$s">%3$s <span class="%5$s"></span></a></li>',
				$key, $class, $val[ 'title' ], $s, $ico[ 'desc' ]
			);
		}
	}
}

function dav_single_term() {

	$title = single_term_title( '', false );

	$other_title = get_query_var( 'other_title', false );

	return ( $other_title ) ? $other_title : $title;
}

function dav_theGalleryFotorama( $id = 'productSlider', $items = array(), $alt = '' ) {

	if ( ! $items || count( $items ) == 0 ) {?>
		<div id="<?php echo $id ?>" class="fotorama">
		</div>
		<?php
		return false;
	}

	?>
	<div id="<?php echo $id ?>" class="fotorama">
		<?php

		foreach ( $items as $k => $item ) {
			printf(
				'<a href="%3$s" ><img src="%1$s?1000" class="img-responsive" alt="%2$s"></a><meta itemprop="image" content="%1$s" />',
				$item[ 'ads-large' ],
				$alt,
				$item[ 'full' ],
				$id
			);
		}
		?>
	</div>
	<?php
}

/**
 * Get count items in Basket
 *
 * @return int
 */
function dav_quantityOrders() {
	global $adsBasket;

	return $adsBasket->countItems();
}

/**
 * Show SKU parameters from product
 *
 * @param $sku
 */
function dav_showSKU( $sku, $skuAttr, $title ) {

	$foo = array();
	foreach ( $sku as $key => $value ) {
		$foo[ $value[ 'prop_id' ] ][ 'title' ]          = $value[ 'prop_title' ];
		$foo[ $value[ 'prop_id' ] ][ 'params' ][ $key ] = $value;
	}

	echo '<script type="text/javascript">
			window.skuAttr = ' . json_encode( $skuAttr ) . ';
			window.sku = ' . json_encode( $sku ) . ';
		</script>';

	foreach ( $foo as $i => $v ) {

		if ( ! empty( $v[ 'params' ] ) ) {

			$items = '';
			$value = '';
			$p     = 0;
			foreach ( $v[ 'params' ] as $keySku => $val ) {
				$p ++;
				if ( ! empty( $val ) ) {

					$class = '';
					if ( $p == 1 ) {
						$class = '';
					}

					$title   = isset( $val[ 'title' ] ) ? trim( $val[ 'title' ] ) : '';
					$img = ads_getImages($val[ 'img' ]);
					$img     = ( $img != '' && ads_is_url( $img ) ) ? $img : '';
					$img_big = isset( $val[ 'img_big' ] ) && $val[ 'img_big' ] != '' ? ads_getImages($val[ 'img_big' ]): false;
					$img_big = $img_big  && ads_is_url( $val[ 'img_big' ] ) ? $img_big : $img;

					if ( $img != '' ) {
						$items .= sprintf(
							'<span class="meta-item-img sku-set %7$s" data-set="%4$d" data-meta="%5$d">
                                     <img src="%1$s" data-img="%2$s" class="img-responsive" title="%3$s">
                                    <input type="hidden" name="sku-meta" value="%6$s" id="check-%4$d-%5$d">
                                </span>',
							$img, $img_big, $title, $i, $p, $keySku, $class
						);
					} else{
						$items .= sprintf(
							'<span class="meta-item sku-set %5$s" data-set="%2$d" data-meta="%3$d">%1$s
                            <input type="hidden" name="sku-meta" value="%4$s" id="check-%2$d-%3$d">
                            </span>',
							$title,
							$i,
							$p,
							$keySku,
							$class
						);
					}

					if ( $p == 1 ) {
						$value = $keySku;
					}
				}


			}

			if ( $items != '' ) {
				printf(
					'<dl class="item-sku">
                        <dt>%1$s:</dt><dd>%2$s<div class="sku-warning" style="display:none">%4$s: %1$s</div></dd>
                        <input type="hidden" id="set-%3$d" name="sku-meta-set[]" value="%5$s">
                    </dl>',
					$v[ 'title' ],
					$items,
					$i,
					__( 'Please select', 'ami3' ),
					$value
				);
			}
		}
	}
}

function dav_check_for_update( $checked_data ) {

	global $wp_version;

	if( function_exists('wp_get_theme') ) {
		$theme_data = wp_get_theme(get_option('template'));
		$theme_version = $theme_data->Version;
	}
	else {
		$theme_data = wp_get_theme();
		$theme_version = $theme_data->get( 'Version' );
	}

	$theme_base = get_option('template');

	$api_url = dav_updparam();

	$request = array(
		'slug' => $theme_base,
		'version' => $theme_version
	);
	// Start checking for an update
	$send_for_check = array(
		'body' => array(
			'action' => 'basic_check',
			'request' => serialize($request),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);
	$raw_response = wp_remote_post($api_url, $send_for_check);

	$response = '';

	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
		$response = unserialize($raw_response['body']);

	// Feed the update data into WP updater
	if (!empty($response))
		$checked_data->response[$theme_base] = (array)$response;

	return $checked_data;
}
add_filter('pre_set_site_transient_update_themes', 'dav_check_for_update');


/**
 * Take over the Theme info screen
 *
 * @param $def
 * @param $action
 * @param $args
 *
 * @return bool|mixed|WP_Error
 */
function dav_theme_api_call( $def, $action, $args ) {

	global $wp_version;

	if( function_exists('wp_get_theme') ) {
		$theme_data = wp_get_theme(get_option('template'));
		$theme_version = $theme_data->Version;
	}
	else {
		$theme_data = wp_get_theme();
		$theme_version = $theme_data->get( 'Version' );
	}

	$theme_base = get_option('template');

	$api_url = dav_updparam();

	if ($args->slug != $theme_base)
		return false;

	$args->slug      = $theme_base;
	$args->version   = $theme_version;
	$args->site      = get_bloginfo( 'url' );

	$request_string = array(
		'body'        => array(
			'action'  => $action,
			'request' => serialize( $args )
		),
		'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' )
	);

	$request = wp_remote_post($api_url, $request_string);

	if (is_wp_error($request)) {
		$res = new WP_Error('themes_api_failed',
			__('<p>An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a></p>', 'ami3'), $request->get_error_message());
	} else {
		$res = unserialize($request['body']);

		if ($res === false)
			$res = new WP_Error('themes_api_failed', __('An unknown error occurred', 'ami3'), $request['body']);
	}

	return $res;
}
add_filter('themes_api', 'dav_theme_api_call', 10, 3);

if (is_admin())
	$current = get_transient('update_themes');

function dav_shippingList(){
	return array(
		'free'          => __( 'FREE', 'ami3' ),
		'super_savings' => __( 'Super savings', 'ami3' ),
		'standard'      => __( 'Standard', 'ami3' ),
		'expedited'     => __( 'Expedited', 'ami3' ),
	);
}

function dav_get_list_contries( $selected = '' ) {
	if( function_exists('ads_get_list_contries') )
		ads_get_list_contries( $selected );
}

function dav_get_host() {
	$url = home_url();
	return parse_url($url, PHP_URL_HOST);
}

/**
 * dav_account_page
 * 
 * @return boolean
 */
function dav_account_page() {
    $form = '';
    $menu = '';
    $menus = models\account\Menu::getItems(
        false,
        array(
            models\account\Menu::ORDERS,
            models\account\Menu::LOGOUT
        )
    );

    if (!class_exists('\models\account\User')) {
        return false;
    }

    if (!class_exists('\models\account\RenderForm')) {
        return false;
    }

    $user = new \models\account\User();
    $accountData = $user->find();
    $menu = \models\account\RenderForm::showNavigation($menus);
    $form = \models\account\RenderForm::showForm($accountData);

    echo $menu . $form;
}

/**
 * dav_orders_page
 * 
 * @param int $page
 * @param int $limit
 */
function dav_orders_page($page, $limit) {
    $orders = '';
    $menu = '';
    $menus = models\account\Menu::getItems(
        models\account\Menu::ORDERS,
        array(
            models\account\Menu::ACCOUNT,
            models\account\Menu::ADDRESS,
            models\account\Menu::LOGOUT
        )
    );

    if (class_exists('\models\account\RenderForm')) {
        $ordersModel = new \models\account\Orders();
        $ordersData = $ordersModel->find($limit, $page);
        $countOrders = $ordersModel->count();
        $menu = \models\account\RenderForm::showNavigation($menus);
        $orders = \models\account\RenderForm::showOrders(
            $ordersData,
            $countOrders,
            $limit,
            $page
        );
    }

    echo $menu . $orders;
}

/**
 * dav_login_button
 * 
 * @return type
 */
function dav_login_button()
{
    $loginButton = '';
    if (class_exists('\models\account\RenderForm')) {
        $loginButton = \models\account\RenderForm::showLoginButton();
    }

    return $loginButton;
}

function currencyInfo(){

//	$listCurrency = ads_get_list_currency();
	$ADS_CUVALUE = unserialize(ADS_CUVALUE);

//	$foo['list_currency'] = $listCurrency;
	$foo['ADS_CUVALUE'] = $ADS_CUVALUE;
	$foo['ADS_CUVAL'] = ADS_CUVAL;
	$foo['ADS_CUR'] = ADS_CUR;
	return $foo;
}