<?php
	
/**
 *	Add menu items to admin_menu
 */
function cz_admin_menu(){

	if ( function_exists('add_menu_page') ){
		add_menu_page(
			__( 'Customization', 'ami3' ),
			__( 'Customization', 'ami3' ),
			'activate_plugins',
			'customization',
			'cz_admin_index_form'
		);
	}
}
add_action('admin_menu', 'cz_admin_menu');

/**
 * Create Admin interface
 */
function cz_admin_index_form(){

	$obj = new czSettings();

	try{
		$obj->getTemplate();
	}
	catch(Exception $e){}
}