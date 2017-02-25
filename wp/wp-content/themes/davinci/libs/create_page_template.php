<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 09.09.2015
 * Time: 8:51
 */

if ( isset( $_POST[ 'tp_create' ] ) && $_POST[ 'tp_create' ] == true && is_admin() ) {
	update_option( 'posts_per_rss', 20 );
	update_option( 'posts_per_page', 20 );
	update_option( 'comments_per_page', 50 );
	update_option( 'page_comments', 1 );
	update_option( 'show_on_front', 'posts' );
	//$wp_rewrite->set_permalink_structure( '/%category%/%postname%/' );
	$wp_rewrite->set_permalink_structure( '/%postname%/' );

	$page = new dav_PageTemplate();

	$page->addPage( array( 'title' => __('Subscription', 'ami3'), 'post_name' => 'subscription' ) );
	$page->addPage( array( 'title' => __('Thank you', 'ami3'), 'post_name' => 'thank-you-contact' ) );
	$page->addPage( array( 'title' => __('Payment methods', 'ami3'), 'post_name' => 'payment-methods' ) );
	$page->addPage( array( 'title' => __('Shipping & Delivery', 'ami3'), 'post_name' => 'shipping-delivery' ) );
	$page->addPage( array( 'title' => __('About Us', 'ami3'), 'post_name' => 'about-us' ) );
	$page->addPage( array( 'title' => __('Contact Us', 'ami3'), 'post_name' => 'contact-us' ) );
	$page->addPage( array( 'title' => __('Privacy Policy', 'ami3'), 'post_name' => 'privacy-policy' ) );
	$page->addPage( array( 'title' => __('Terms and Conditions', 'ami3'), 'post_name' => 'terms-and-conditions' ) );
	$page->addPage( array( 'title' => __('Refunds & Returns Policy', 'ami3'), 'post_name' => 'refund-policy' ) );
	$page->addPage( array( 'title' => __('Frequently Asked Questions', 'ami3'), 'post_name' => 'frequently-asked-questions' ) );
	$page->addPage( array( 'title' => __('Track your order', 'ami3'), 'post_name' => 'track-your-order' ) );
	$page->addPage( array( 'title' => __('Your shopping cart', 'ami3'), 'post_name' => 'cart' ) );
	$page->addPage( array( 'title' => __('Thank you page', 'ami3'), 'post_name' => 'thankyou' ) );
	$page->create();

	$memu   = array();
	$memu[] = array( 'title' => __( 'Home', 'ami3' ), 'url' => '/' );
	$memu[] = array( 'title' => __( 'Products', 'ami3' ), 'url' => '/product/' );
	$memu[] = array( 'title' => __( 'Shipping & Delivery', 'ami3' ), 'url' => '/shipping-delivery/' );
	$memu[] = array( 'title' => __( 'Returns Policy', 'ami3' ), 'url' => '/refund-policy/' );
	$memu[] = array( 'title' => __( 'About', 'ami3' ), 'url' => '/about-us/' );
	$memu[] = array( 'title' => __( 'Tracking', 'ami3' ), 'url' => '/track-your-order/' );
	$memu[] = array( 'title' => __( 'Contact', 'ami3' ), 'url' => '/contact-us/' );
	createMemu( $memu, 'Top Menu', 'top_menu' );

	$memu   = array();
	$memu[] = array( 'title' => __( 'About us', 'ami3' ), 'url' => '/about-us/' );
	$memu[] = array( 'title' => __( 'Privacy Policy', 'ami3' ), 'url' => '/privacy-policy/' );
	$memu[] = array( 'title' => __( 'Terms and Conditions', 'ami3' ), 'url' => '/terms-and-conditions/' );
	createMemu( $memu, 'Footer 1', 'footer1' );

	$memu   = array();
	$memu[] = array( 'title' => __( 'Payment methods', 'ami3' ), 'url' => '/payment-methods/' );
	$memu[] = array( 'title' => __( 'Shipping & Delivery', 'ami3' ), 'url' => '/shipping-delivery/' );
	$memu[] = array( 'title' => __( 'Returns Policy', 'ami3' ), 'url' => '/refund-policy/' );
	createMemu( $memu, 'Footer 2', 'footer2' );

	$memu   = array();
	$memu[] = array( 'title' => __( 'Contact Us', 'ami3' ), 'url' => '/contact-us/' );
	$memu[] = array( 'title' => __( 'Frequently Asked Questions', 'ami3' ), 'url' => '/frequently-asked-questions/' );
	createMemu( $memu, 'Footer 3', 'footer3' );

	$memu   = array();
	$memu[] = array( 'title' => __( 'Costumes', 'ami3' ), 'url' => '/product_cat/costumes/', 'slug' => 'costumes' );
	$memu[] = array( 'title' => __( 'Custom category', 'ami3' ), 'url' => '/product_cat/custom-category/', 'slug' => 'custom-category' );
	$memu[] = array( 'title' => __( 'Gifts', 'ami3' ), 'url' => '/product_cat/gifts/', 'slug' => 'gifts' );
	$memu[] = array( 'title' => __( 'Jewelry', 'ami3' ), 'url' => '/product_cat/jewelry/', 'slug' => 'jewelry' );
	$memu[] = array( 'title' => __( 'Men Clothing', 'ami3' ), 'url' => '/product_cat/men-clothing/', 'slug' => 'men-clothing' );
	$memu[] = array( 'title' => __( 'Phone Cases', 'ami3' ), 'url' => '/product_cat/phone-cases/', 'slug' => 'phone-cases' );
	$memu[] = array( 'title' => __( 'Posters', 'ami3' ), 'url' => '/product_cat/posters/', 'slug' => 'posters' );
	$memu[] = array( 'title' => __( 'T-shirts', 'ami3' ), 'url' => '/product_cat/t-shirts/', 'slug' => 't-shirts' );
	$memu[] = array( 'title' => __( 'Toys', 'ami3' ), 'url' => '/product_cat/toys/', 'slug' => 'toys' );
	$memu[] = array( 'title' => __( 'Women Clothing', 'ami3' ), 'url' => '/product_cat/women-clothing/', 'slug' => 'women-clothing' );
	if ( createMemu( $memu, 'Main Menu', 'primary' ) ) {
		add_action( 'init', 'createCategoryProduct', 10, $memu );
	}
}
//@TODO
function createCategoryProduct()
{
	$category   = array();
	$category[] = array( 'title' => __( 'Costumes', 'ami3' ), 'url' => '/product_cat/costumes/', 'slug' => 'costumes' );
	$category[] = array( 'title' => __( 'Custom category', 'ami3' ), 'url' => '/product_cat/custom-category/', 'slug' => 'custom-category' );
	$category[] = array( 'title' => __( 'Gifts', 'ami3' ), 'url' => '/product_cat/gifts/', 'slug' => 'gifts' );
	$category[] = array( 'title' => __( 'Jewelry', 'ami3' ), 'url' => '/product_cat/jewelry/', 'slug' => 'jewelry' );
	$category[] = array( 'title' => __( 'Men Clothing', 'ami3' ), 'url' => '/product_cat/men-clothing/', 'slug' => 'men-clothing' );
	$category[] = array( 'title' => __( 'Phone Cases', 'ami3' ), 'url' => '/product_cat/phone-cases/', 'slug' => 'phone-cases' );
	$category[] = array( 'title' => __( 'Posters', 'ami3' ), 'url' => '/product_cat/posters/', 'slug' => 'posters' );
	$category[] = array( 'title' => __( 'T-shirts', 'ami3' ), 'url' => '/product_cat/t-shirts/', 'slug' => 't-shirts' );
	$category[] = array( 'title' => __( 'Toys', 'ami3' ), 'url' => '/product_cat/toys/', 'slug' => 'toys' );
	$category[] = array( 'title' => __( 'Women Clothing', 'ami3' ), 'url' => '/product_cat/women-clothing/', 'slug' => 'women-clothing' );
	foreach ( $category as $key => $item ) {
		wp_insert_term(
			$item[ 'title' ],
			'product_cat',
			array(
				'description' => '',
				'slug'        => $item[ 'slug' ],
				'parent'      => 0
			)
		);

	}
}

function createMemu( $memu, $menu_name, $location = false )
{
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	if ( !$menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		if ( $location ) {
			$locations              = get_theme_mod( 'nav_menu_locations' );
			$locations[ $location ] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}

		foreach ( $memu as $key => $item ) {
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'    => $item[ 'title' ],
				'menu-item-position' => $key,
				'menu-item-url'      => home_url( $item[ 'url' ] ),
				'menu-item-status'   => 'publish' ) );
		}

		return true;
	}

	return false;
}

class dav_PageTemplate
{
	private
		$_pages = array();

	function __construct()
	{
	}

	/**
	 * @param $page
	 * @throws Exception
	 */
	public function addPage( $page )
	{

		if ( empty( $page[ 'post_name' ] ) )
			throw new Exception( 'no post_name' );

		$page[ 'content' ] = $this->getContent( $page[ 'post_name' ] );

		array_push( $this->_pages, $page );
	}

	/**
	 * @return int|WP_Error
	 */
	public function create()
	{
		foreach ( $this->_pages as $page ) {

			$new_page = array(
				'post_type'    => 'page',
				'post_title'   => $page[ 'title' ],
				'post_name'    => $page[ 'post_name' ],
				'post_content' => $page[ 'content' ],
				'post_status'  => 'publish',
				'post_author'  => 1,
			);

			if ( !$this->issetPage( $page[ 'post_name' ] ) ) {
				wp_insert_post( $new_page );
			}
		}
	}

	/**
	 * @param $slug
	 * @return bool
	 */
	private function issetPage( $slug )
	{
		$args       = array(
			'pagename'           => $slug
		);

		$page_check = new WP_Query( $args );
		if ( $page_check->post ) return true;

		return false;
	}

	/**
	 * @param $pagename
	 * @return mixed|string
	 */
	private function getContent( $pagename )
	{
		$file = dirname( __FILE__ ) . '/pages_default/' . $pagename . '.php';
		if ( file_exists( $file ) ) {
			ob_start();
			include( $file );
			$text = ob_get_contents();
			ob_end_clean();

			return $text;
		}

		return '';
	}
}