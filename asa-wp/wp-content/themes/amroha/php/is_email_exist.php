<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/asa-wp/wp-config.php' ); //Change in LIVE
require_once( $_SERVER['DOCUMENT_ROOT'] . '/asa-wp/wp-includes/wp-db.php' ); //Change in LIVE
if (!$wpdb) {
    $wpdb = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
} else {
    global $wpdb;
}

$email = urldecode($_GET['email']);

global $wpdb;

$count = $wpdb->get_var( "SELECT COUNT(email) FROM amroha_users WHERE email = '{$email}'" );

if($count==0){
	echo "OK";
}
?>