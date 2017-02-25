<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 04.01.2016
 * Time: 16:07
 */

define( 'TEMPLATE_DIR', preg_replace('/^https?:/', '', get_template_directory_uri() ));
define( 'IMG_DIR', TEMPLATE_DIR . '/img/' );
define( 'S_URL_LIB', TEMPLATE_DIR .'/libs/customization/' );


class czOptions {
	protected $field_options = 'cz_options';
	protected $data          = array();

	public function __construct() {
		$theme               = wp_get_theme();
		$this->field_options = 'cz_' . $theme->get( 'Name' );

		$this->data = get_site_option( $this->field_options );
		$options    = $this->get_defaults();
		$this->data = wp_parse_args( $this->data, $options );
	}
	
	public function _parse_args( $args, $defaults ) {

		foreach ( $defaults as $k => $v ) {

			if( isset( $args[$k] ) )
				$defaults[$k] = esc_attr($args[$k]);
		}

		return $defaults;
	}

	public function __get( $name ) {

		if ( array_key_exists( $name, $this->data ) ) {
			return $this->stripslashes( $this->data[ $name ] );
		} else {
			throw new \Exception( 'Getting unknown property:' . $name );
		}

		return null;
	}

	private function stripslashes( $data ) {
		if ( is_array( $data ) ) {
			foreach ( $data as $k => $v ) {
				$data[ $k ] = $this->stripslashes( $v );
			}
		} else {
			$data = stripslashes( html_entity_decode($data, ENT_QUOTES) );
		}

		return $data;
	}

	public function data() {
		$data = $this->data;

		foreach ( $data as $k => $v ) {
			$data[ $k ] = $this->dataFilter($v);
		}

		return $data;
	}

	private function dataFilter($data){
		if ( is_array( $data ) ) {
			foreach ( $data as $k => $v ) {
				$data[ $k ] = $this->dataFilter( $v );
			}
		} else {
			$data = stripslashes( html_entity_decode($data, ENT_QUOTES) );
		}

		return $data;
	}
	
	public function get_defaults() {
		$defaults = include dirname( __FILE__ ) . '/defaults.php';
		return apply_filters( 'cz_fields', $defaults );
	}

	public static function getTemplateField($pagename){
		$file = dirname( __FILE__ ) . '/template/' . $pagename . '.php';
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

if ( is_admin() ) {
	require( dirname( __FILE__ ) . '/menu.php' );
	require( dirname( __FILE__ ) . '/class.CZ.AdminTpl.php' );
	require( dirname( __FILE__ ) . '/class.CZ.Settings.php' );
	require( dirname( __FILE__ ) . '/core.php' );
}


add_action( 'init', 'init_cz' );
function init_cz() {
	global $cz_data;
	$cz      = new czOptions();
	$cz_data = $cz->data();
}


if ( ! function_exists( 'cz' ) ) {
	function cz( $name ) {
		global $cz_data;

        if (!isset($cz_data[$name])) {
            return '';
        }

		return $cz_data[ $name ];
	}
}

/*
 * add new fields
 * */
/*
add_filter('cz_fields', 'cz_fields_test');
function cz_fields_test($fields){
	$fields['cz_test'] = 'test';
	return $fields;
}
add_filter('cz_list_menu', 'test_cz_menu');

function test_cz_menu($v){
	$v['czsubscribe']    = array(
		'tmp'         => 'cz_test_menu',
		'title'       => __( 'Test', 'cz' ),
		'description' => __( 'Test settings', 'cz' ),
		'icon'        => 'home',
		'submenu'     => array()
	);
	return $v;
}

function cz_test_menu(){
	$cz = new czSettings();
	?>
		$cz->block( array(
			$cz->row( array(
				$this->textField( 'tp_img_product_cat1_url', array(
					'label'  => __( 'Category URL', 'ami3' ),
					'screen' => S_URL_LIB . 'img/logo.jpg'

				) ),
				$cz->textField( 'tp_img_product_cat1_title', array(
					'label'  => __( 'Sticker text', 'ami3' ),
					'screen' => ''
				) )
			) ),
				$cz->row( array(
					$cz->textField( 'tp_img_product_cat1_url', array(
						'label'  => __( 'Category URL', 'ami3' ),
						'screen' => S_URL_LIB . 'img/logo.jpg'

					) ),
					$cz->textField( 'tp_img_product_cat1_title', array(
						'label'  => __( 'Sticker text', 'ami3' ),
						'screen' => ''
					) )
				) )
			)
		);
	<?php
}
*/
