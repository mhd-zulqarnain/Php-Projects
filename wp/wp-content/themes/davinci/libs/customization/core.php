<?php

if( !function_exists('pr') ){

	function pr($any){
		print_r( "<pre>" );
		print_r( $any );
		print_r( "</pre>" );
	}
}

/**
 * Validate is URL
 * @param $url
 * @return int
 */
 if( !function_exists('is_url') ){
	 
	function is_url($url){
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
}

/**
*	add scripts and styles to admin
*/
function cz_load_admin(){
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );

	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}


	wp_register_script( 'ajaxQueue', S_URL_LIB.'js/jquery.ajaxQueue.min.js', array( 'jquery' ), '0.1.2' );
	wp_register_script( 'bootstrap', S_URL_LIB.'js/bootstrap.min.js', array( 'jquery' ), '3.0' );
	wp_register_script( 'cz-script', S_URL_LIB.'js/script.js', array( 'bootstrap', 'ajaxQueue' ), '1.1' );
	
	wp_register_style( 'bootstrap', S_URL_LIB.'css/bootstrap.min.css', "", '3.0' );
	wp_register_style( 'font-awesome', S_URL_LIB.'css/font-awesome.min.css', array(), '4.0' );
	wp_register_style( 'cz-style', S_URL_LIB.'css/style.css', array('font-awesome', 'bootstrap'), '1.3' );

	$screen = get_current_screen();

    if( $screen->id == 'toplevel_page_customization' ){
		wp_enqueue_style( 'cz-admin' );
		wp_enqueue_script( 'cz-script' );

	wp_enqueue_style( 'cz-style' );
	}
	
}
if ( is_admin() && isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'customization' ) {
	add_action('admin_print_scripts', 'cz_load_admin');
}