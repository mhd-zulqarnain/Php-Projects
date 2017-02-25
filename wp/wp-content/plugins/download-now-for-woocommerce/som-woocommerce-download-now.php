<?php
/**
 * Plugin Name: Download Now - WooCommerce
 * Plugin URI: https://www.squareonemedia.co.uk
 * Description: Allow users to instantly download your free digital products without going through the checkout.
 * Author: Square One Media
 * Author URI: https://www.squareonemedia.co.uk
 * Text Domain: download-now-woocommerce
 * Version: 2.3.2
 * Requires at least: 4.4
 * Tested up to: 4.7.2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VAYF6G99MCMHU
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SOMDN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SOMDN_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

include( SOMDN_PATH . 'includes/somdn-functions.php' );
include( SOMDN_PATH . 'includes/somdn-downloader.php' );
include( SOMDN_PATH . 'includes/somdn-download-page.php' );
include( SOMDN_PATH . 'includes/somdn-plugin-settings.php' );
include( SOMDN_PATH . 'includes/somdn-settings-tab-support.php' );
include( SOMDN_PATH . 'includes/somdn-compatibility.php' );
include( SOMDN_PATH . 'includes/somdn-meta.php' );
include( SOMDN_PATH . 'includes/somdn-doc-viewer-functions.php' );
include( SOMDN_PATH . 'somdn-custom-functions.php' );

register_activation_hook( __FILE__, 'somdn_activated' );
register_deactivation_hook( __FILE__, 'somdn_deactivated' );

function somdn_activated() {

	if ( ! wp_next_scheduled ( 'somdn_delete_download_files_event' ) ) {
		wp_schedule_event( time(), 'hourly', 'somdn_delete_download_files_event' );
	}

	$zip_path = wp_upload_dir()['basedir'] . '/download-now-uploads';

	if ( ! file_exists( $zip_path ) ) {
		mkdir( $zip_path, 0777, true );
	}

}

add_action('somdn_delete_download_files_event', 'somdn_delete_download_files');

function somdn_delete_download_files() {

	array_map( 'unlink', glob( wp_upload_dir()['basedir'] . '/download-now-uploads/*' ) );

	//$files = glob( wp_upload_dir()['basedir'] . '/download-now-uploads/*');
	//
	//foreach( $files as $file ){ // iterate files
	//	if( is_file( $file ) )
	//	unlink( $file ); // delete file
	//}

}

function somdn_deactivated() {

	wp_clear_scheduled_hook( 'somdn_delete_download_files_event' );
	
	array_map( 'unlink', glob( wp_upload_dir()['basedir'] . '/download-now-uploads/*' ) );

	$zip_path = wp_upload_dir()['basedir'] . '/download-now-uploads/';
	
	rmdir( $zip_path );

}