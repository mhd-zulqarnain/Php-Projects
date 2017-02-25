<?php
/**
 * DOWNLOAD NOW - WooCommerce - Downloader
 * 
 * Functions to action the file download.
 * 
 * @version	2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

function somdn_is_download_valid( $product_id ) {

	$product = wc_get_product( $product_id );
	$downloadable = $product->downloadable;
	$pagelink = get_permalink( $product_id );
	if ( ! $pagelink ) {
		$pagelink = get_home_url();
	}

	if ( ! somdn_is_product_valid( $product_id, $downloadable ) ) {
		wp_redirect( $pagelink );
		exit();	
	}

}

function somdn_count_download( $product_id ) {

	$download_count = get_post_meta( $product_id, 'somdn_dlcount', true );

	$download_count++;

	update_post_meta( $product_id, 'somdn_dlcount', $download_count );

}

function somdn_get_file_paths( $downloads ) {

	$download_files = array();

	foreach ( $downloads as $key => $each_download )  {
	
		array_push( $download_files, $each_download['file'] );

	}
	
	return $download_files;

}

function somdn_is_local_file( $url ){
	$headers = get_headers( $url );
	return stripos( $headers[0], '200 OK' ) ? false : true ;
}

function somdn_show_pdf( $file, $product_id ) {

	//write_log( 'Download Now - show pdf' );

	if( somdn_is_local_file( $file ) ) {
		$duplicate_file = somdn_duplicate_pdf( $file, $product_id );
		if ( ! $duplicate_file ) {
			somdn_woo_download( $file, $product_id );
			return;			
		}
	} else {
		somdn_woo_download( $file, $product_id );
		return;
	}

	$google_path = 'https://docs.google.com/viewerng/viewer?url=' . $duplicate_file;
	//echo '<script>window.open("' . $google_path . '")</script>';

	somdn_count_download( $product_id );
	
	wp_redirect( $google_path );
	//wp_redirect( get_the_permalink( $product_id ) . '?somdn_pdf=' . $google_path );
	//write_log( 'Download Now - redirect' );
	exit();

}

function somdn_duplicate_pdf( $file, $product_id ) {


	$dn_folder= wp_upload_dir()['basedir'] . '/download-now-uploads';

	if ( ! file_exists( $dn_folder ) ) {
		mkdir( $dn_folder, 0777, true );
	}

	$path = parse_url( $file, PHP_URL_PATH );

	$uri = ltrim($path, '/');
	$abs_filepath = $_SERVER['DOCUMENT_ROOT'] . $path;

	$now = DateTime::createFromFormat('U.u', microtime(true));
	$code1 = $now->format("uGyidms");
	$code2 = $now->format("dsiuG");
	$downloadID = get_current_user_id() . $code1 . $code2;

	$newfileurl = wp_upload_dir()['baseurl'] . '/download-now-uploads/' . $downloadID . '.pdf';

	$newfile = wp_upload_dir()['basedir'] . '/download-now-uploads/' . $downloadID . '.pdf';

	if ( ! copy( $abs_filepath, $newfile ) ) {
		return false;
	} else {
		return $newfileurl;
	}

}

function somdn_woo_download( $file_path, $product_id, $force = false ) {

	$filename = basename( $file_path );

	if ( strstr( $filename, '?' ) ) {
		$filename = current( explode( '?', $filename ) );
	}
	
	if ( $force ) {
		$file_download_method = apply_filters( 'woocommerce_file_download_method', 'force', $product_id );
	} else {
		$file_download_method = apply_filters( 'woocommerce_file_download_method', get_option( 'woocommerce_file_download_method', 'force' ), $product_id );
	}

	somdn_count_download( $product_id );

	// Add action to prevent issues in IE
	add_action( 'nocache_headers', array( 'WC_Download_Handler', 'ie_nocache_headers_fix' ) );
	
	// Trigger download via one of the methods
	do_action( 'woocommerce_download_file_' . $file_download_method, $file_path, $filename );

}

add_action( 'admin_post_nopriv_somdn_download_single', 'somdn_download_single' );
add_action( 'admin_post_somdn_download_single', 'somdn_download_single' );

function somdn_download_single() {

	$product_id = $_POST['product'];
	
	somdn_is_download_valid( $product_id );

	$product = get_product( $product_id );
	$downloadable = $product->downloadable;
	$title = preg_replace('/[^a-z\d]+/i', '-', get_the_title( $product_id ) );

	$downloads = $product->get_files();
	$downloads_count = count( $downloads );
	$is_single_download = ( 1 == $downloads_count ) ? true : false ;

	foreach ( $downloads as $key => $each_download )  {

		$file_path = $each_download['file'];

	}
	
	$pdf = isset( $_POST['pdf'] ) ? true : false ;

	if ( $pdf ) {
		somdn_show_pdf( $file_path, $product_id );
	} else {
		somdn_woo_download( $file_path, $product_id );
	}

}

add_action( 'admin_post_nopriv_somdn_download_multi_single', 'somdn_download_multi_single' );
add_action( 'admin_post_somdn_download_multi_single', 'somdn_download_multi_single' );

function somdn_download_multi_single() {

	//write_log( 'Download Now - multi download' );

	$product_id = $_POST['product'];
	$product_file = $_POST['productfile'];

	somdn_is_download_valid( $product_id );

	$product = get_product( $product_id );
	$downloadable = $product->downloadable;
	$title = preg_replace('/[^a-z\d]+/i', '-', get_the_title( $product_id ) );

	$downloads = $product->get_files();
	$downloads_count = count( $downloads );

	$product_file = $product_file - 1;

	$for_count = 0;

	foreach ( $downloads as $key => $each_download )  {

		if ( $for_count == $product_file ) {

			$file_path = $each_download['file'];
			break;

		}

		$for_count++;

	}

	$pdf = isset( $_POST['pdf'] ) ? true : false ;

	if ( $pdf ) {
		somdn_show_pdf( $file_path, $product_id );
	} else {
		somdn_woo_download( $file_path, $product_id );
	}

}

add_action( 'admin_post_nopriv_somdn_download_multi_checked', 'somdn_download_multi_checked' );
add_action( 'admin_post_somdn_download_multi_checked', 'somdn_download_multi_checked' );

function somdn_download_multi_checked() {

	$product_id = $_POST['product'];
	
	somdn_is_download_valid( $product_id );

	$product = get_product( $product_id );
	$downloadable = $product->downloadable;
	$title = preg_replace('/[^a-z\d]+/i', '-', get_the_title( $product_id ) );

	$downloads = $product->get_files();
	$downloads_count = count( $downloads );
	
	$download_files = somdn_get_file_paths( $downloads );
	
	$checked_downloads = array();
	
	$checked_count = 0;
	$checked_total = 0;
	$all_checked = false;
	
	while ( $checked_count < $downloads_count ) {
	
		$checkbox_number = $checked_count + 1;
	
		$checkbox_id = 'somdn-download-file-' . strval( $checkbox_number );
		
		$checkbox = ( isset( $_POST[$checkbox_id] ) && $_POST[$checkbox_id] ) ? $_POST[$checkbox_id] : false ;
		
		if ( $checkbox ) {

			array_push( $checked_downloads, $download_files[$checked_count] );
	
			$checked_total++;
		}
		
		$checked_count++;
		
	}

	if ( $checked_total == $downloads_count ) {
		$all_checked = true;
	}
	
	$downloadall = ( ( isset( $_POST['somdn-download-files-all'] ) && $_POST['somdn-download-files-all'] ) || $all_checked ) ? true : false ;

	if ( $downloadall ) {
		somdn_download_all_files( $product_id );
		return;
	}

	if ( $checked_total <= 0 ) {
		echo somdn_checkbox_download_error();
		return;	
	}

	$file_path = somdn_zip_all_download_files( $checked_downloads, $title );
	
	somdn_woo_download( $file_path, $product_id );
	
}

add_action( 'admin_post_nopriv_somdn_download_all_files', 'somdn_download_all_files' );
add_action( 'admin_post_somdn_download_all_files', 'somdn_download_all_files' );


function somdn_download_all_files( $product_id = '' ) {
	
	if ( ! $product_id ) {
		$product_id = $_POST['product'];
	}
	
	somdn_is_download_valid( $product_id );

	$product = get_product( $product_id );
	$downloadable = $product->downloadable;
	$title = preg_replace('/[^a-z\d]+/i', '-', get_the_title( $product_id ) );

	$downloads = $product->get_files();
	$downloads_count = count( $downloads );
	
	$download_files = somdn_get_file_paths( $downloads );
		
	$file_path = somdn_zip_all_download_files( $download_files, $title );

	somdn_woo_download( $file_path, $product_id );

}

function somdn_zip_all_download_files( $downloads, $title ) {

	$zip_path = wp_upload_dir()['basedir'] . '/download-now-uploads';

	if ( ! file_exists( $zip_path ) ) {
		mkdir( $zip_path, 0777, true );
	}
	
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$code1 = $now->format("uGyidms");
	$code2 = $now->format("dsiuG");
	$downloadID = get_current_user_id() . $code1 . $code2;
	
	$zip_path = $zip_path . '/' . $title . '-' . $downloadID . '.zip';

	$files = array();

	foreach ( $downloads as $download )  {

		$path = parse_url( $download, PHP_URL_PATH );
		$abs_filepath = $_SERVER['DOCUMENT_ROOT'] . $path;
		array_push( $files, $abs_filepath );

	}

	$files_to_zip = $files;

	$result = somdn_create_zip( $files_to_zip, $zip_path );

	$fileurl = wp_upload_dir()['baseurl'] . '/download-now-uploads/' . $title . '-' . $downloadID . '.zip';

	$file_path = $fileurl;
	
	return $file_path;

}

/* creates a compressed zip file */
function somdn_create_zip( $files = array(), $destination = '', $overwrite = false, $distill_subdirectories = true ) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		foreach($valid_files as $file) {
		    if ($distill_subdirectories) {
		        $zip->addFile($file, basename($file) );
		    } else {
		        $zip->addFile($file, $file);
		    }
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		//print_r($zip);
		
		//$newfilepath = $zip['filename'];
		$newfilepath = $zip->filename;
		
		//close the zip -- done!
		$zip->close();
		
		//check to make sure the file exists
		if ( file_exists($destination) ) {
			return $newfilepath;
		} else {
			return false;
		}
	}
	else
	{
		return false;
	}
}

function somdn_checkbox_download_error() {

	ob_start(); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width">
	<meta name='robots' content='noindex,follow' />
	<title>Download Error</title>
	<style type="text/css">
		html {
			background: #f1f1f1;
		}
		body {
			background: #fff;
			color: #444;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			margin: 2em auto;
			padding: 1em 2em;
			max-width: 700px;
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.13);
			box-shadow: 0 1px 3px rgba(0,0,0,0.13);
		}
		h1 {
			border-bottom: 1px solid #dadada;
			clear: both;
			color: #666;
			font-size: 24px;
			margin: 30px 0 0 0;
			padding: 0;
			padding-bottom: 7px;
		}
		#error-page {
			margin-top: 50px;
		}
		#error-page p {
			font-size: 14px;
			line-height: 1.5;
			margin: 25px 0 20px;
		}
		#error-page code {
			font-family: Consolas, Monaco, monospace;
		}
		ul li {
			margin-bottom: 10px;
			font-size: 14px ;
		}
		a {
			color: #0073aa;
		}
		a:hover,
		a:active {
			color: #00a0d2;
		}
		a:focus {
			color: #124964;
		    -webkit-box-shadow:
		    	0 0 0 1px #5b9dd9,
				0 0 2px 1px rgba(30, 140, 190, .8);
		    box-shadow:
		    	0 0 0 1px #5b9dd9,
				0 0 2px 1px rgba(30, 140, 190, .8);
			outline: none;
		}
		.button {
			background: #f7f7f7;
			border: 1px solid #ccc;
			color: #555;
			display: inline-block;
			text-decoration: none;
			font-size: 13px;
			line-height: 26px;
			height: 28px;
			margin: 0;
			padding: 0 10px 1px;
			cursor: pointer;
			-webkit-border-radius: 3px;
			-webkit-appearance: none;
			border-radius: 3px;
			white-space: nowrap;
			-webkit-box-sizing: border-box;
			-moz-box-sizing:    border-box;
			box-sizing:         border-box;

			-webkit-box-shadow: 0 1px 0 #ccc;
			box-shadow: 0 1px 0 #ccc;
		 	vertical-align: top;
		}

		.button.button-large {
			height: 30px;
			line-height: 28px;
			padding: 0 12px 2px;
		}

		.button:hover,
		.button:focus {
			background: #fafafa;
			border-color: #999;
			color: #23282d;
		}

		.button:focus  {
			border-color: #5b9dd9;
			-webkit-box-shadow: 0 0 3px rgba( 0, 115, 170, .8 );
			box-shadow: 0 0 3px rgba( 0, 115, 170, .8 );
			outline: none;
		}

		.button:active {
			background: #eee;
			border-color: #999;
		 	-webkit-box-shadow: inset 0 2px 5px -3px rgba( 0, 0, 0, 0.5 );
		 	box-shadow: inset 0 2px 5px -3px rgba( 0, 0, 0, 0.5 );
		 	-webkit-transform: translateY(1px);
		 	-ms-transform: translateY(1px);
		 	transform: translateY(1px);
		}

			</style>
</head>
<body id="error-page">
	<p><p><strong>ERROR</strong>: please select at least 1 file to download.</p></p>
<p><a href='javascript:history.back()'>&laquo; Back</a></p></body>
</html>	
	
	
	<?php

	$error = ob_get_clean();

	return $error;

}