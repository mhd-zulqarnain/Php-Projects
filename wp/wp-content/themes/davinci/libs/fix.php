<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.05.2016
 * Time: 15:00
 */
function remove_x_pingback( $headers ) {
	unset( $headers[ 'X-Pingback' ] );

	return $headers;
}

add_filter( 'wp_headers', 'remove_x_pingback' );

add_filter( 'xmlrpc_enabled', '__return_false' );

function chrome_fix() {
	if ( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Chrome' ) !== false ) {
		wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
	}
}

add_action( 'admin_enqueue_scripts', 'chrome_fix' );

/**
 * Remove scripts from header and put they to footer
 */
remove_action( 'wp_head', 'wp_print_scripts' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

add_action( 'wp_footer', 'wp_print_scripts', 5 );
add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

/**
 * Remove some meta at header
 */
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );