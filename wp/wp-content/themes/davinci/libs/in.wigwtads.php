<?php

/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.02.2016
 * Time: 13:58
 */
class inWigwtads {
	private $token;
	private $client_secret;
	public  $redirect_uri;
	public  $userId = null;
	public  $clientId;
	public  $full_name;

	/**
	 * @param $token
	 * @param $user
	 * @param $clientId
	 * @param $client_secret
	 *
	 * @throws Exception
	 */
	function __construct() {
		$this->token = cz('inwidget_token');
		$this->client_secret = cz('inwidget_client_secret');
		$this->clientId = cz('inwidget_clientId');
		$this->full_name = cz('inwidget_full_name');
		$this->userId = cz('inwidget_id');
		$this->redirect_uri = get_site_url() . '/wp-admin/admin.php?page=customization&czpage=czinstagram';
	}

	/**
	 * Get basic information about a user. To get information about the owner of the access token, you can use self instead of the user-id.
	 * @return Array
	 */
	//TODO add cache
	public function getUser() {
		$url = "https://api.instagram.com/v1/users/{$this->userId}/";
		$url .= "?access_token=" . $this->token;

		return $this->cUrl( $url )->data;
	}

	/**
	 * Get the most recent media published by a user. To get the most recent media published by the owner of the access token, you can use self instead of the user-id.
	 *
	 * @param $count - Count of media to return.
	 * @param $minId - Return media later than this min_id.
	 * @param $maxId - Return media earlier than this max_id.
	 *
	 * @return Array
	 */
	//TODO add cache
	public function getMedia( $count = false, $minId = false, $maxId = false ) {
		$url = "https://api.instagram.com/v1/users/{$this->userId}/media/recent/";
		$url .= "?access_token=" . $this->token;
		if ( $count ) {
			$url .= "&count=" . $count;
		}
		if ( $minId ) {
			$url .= "&min_id=" . $minId;
		}
		if ( $maxId ) {
			$url .= "&max_id=" . $maxId;
		}

		return $this->cUrl( $url );
	}

	/**
	 * Search for a user by name.
	 *
	 * @param $q - A query string.
	 *
	 * @return Array
	 */
	public function getSearch( $q ) {
		$url = "https://api.instagram.com/v1/users/search";
		$url .= "?q=" . $q;
		$url .= "?access_token=" . $this->token;

		return $this->cUrl( $url );
	}

	/**
	 * @param $url - A query url
	 *
	 * @return Array
	 */
	private function cUrl( $url ) {
		$ch = curl_init( $url ); // Инициализируем сессию cURL
		// Устанавливаем параметры cURL
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 ); // Возвращает веб-страницу
		curl_setopt( $ch, CURLOPT_TIMEOUT, 20 ); // Таймаут ответа
		$result = curl_exec( $ch ); // Выполняем запрос
		curl_close( $ch ); // Завершаем сессию cUrl
		return json_decode( $result );
	}

	public function getAccessToken( $code ) {
		{
			/*https://api.instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=REDIRECT-URI&response_type=token*/
			$post = 'client_id=' . $this->clientId . '&client_secret=' . $this->client_secret . '&grant_type=authorization_code&redirect_uri=' . $this->redirect_uri . '&code=' . $code;

			$ch   = curl_init( 'https://api.instagram.com/oauth/access_token' ); // Инициализируем сессию cURL
			// Устанавливаем параметры cURL
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 ); // Возвращает веб-страницу
			curl_setopt( $ch, CURLOPT_TIMEOUT, 20 ); // Таймаут ответа
			$result = curl_exec( $ch ); // Выполняем запрос
			curl_close( $ch ); // Завершаем сессию cUrl
			$rez = json_decode( $result );

			if( isset($rez->code) ){
				$cz = new czSettings();
				$cz->inwidget_token = '';
				$cz->save();
				return false;
			}

			return $rez;
		}
	}

	public function generateToken($code){
		$rez = $this->getAccessToken( $code );
		if($rez){
			$cz = new czSettings();
			$cz->inwidget_token = $rez->access_token;
			$cz->inwidget_user = $rez->user->username;
			$cz->inwidget_full_name = $rez->user->full_name;
			$cz->inwidget_id = $rez->user->id;
			$cz->save();

		}

	}

	public function clearToken(){
		$cz = new czSettings();
		$cz->inwidget_token = '';
		$cz->inwidget_clientId = '';
		$cz->inwidget_user = '';
		$cz->inwidget_link = '';
		$cz->inwidget_full_name = '';
		$cz->inwidget_id = '';
		$cz->inwidget_title = '';
		$cz->save();
	}

}

function inwidget_code() {

	if (! isset( $_GET[ 'code' ] ) ) {
		return;
	}

	$code = trim(strip_tags($_GET[ 'code' ]));
	$in = new inWigwtads();
	$in->generateToken($code);
	header("Location: /wp-admin/admin.php?page=customization&czpage=czinstagram");
}

add_action( 'init', 'inwidget_code' );


function cz_instagram_menu() {
	$cz = new czSettings();
	$in = new inWigwtads();


	$clientId = $cz->inwidget_clientId;
	$client_secret = $cz->inwidget_client_secret;

	if(empty($clientId) || empty($client_secret)){
		$in->clearToken();
		$token = sprintf ('<div class="cz-main-field"><a href="https://www.instagram.com/developer/">%1$s</a><br><b>%2$s</b></div>',
			__('add Valid redirect URIs', 'ami3'),
			$in->redirect_uri
		);
	}else{
		$token = !$cz->inwidget_token ?
			sprintf ('<div class="cz-main-field"><a href="%1$s">%2$s</a></div>',
				"https://api.instagram.com/oauth/authorize/?client_id=".cz('inwidget_clientId')."&redirect_uri=".$in->redirect_uri."&response_type=code",
				__('Authorization', 'ami3')
			)
			:'';
	}

	$cz->block( array(
			$cz->row($cz->textField( 'inwidget_title', array(
				'label' => __( 'Widget title', 'ami3' ),
			) )),
			$cz->row($cz->textField( 'inwidget_link', array(
				'label' => __( 'Link to profile', 'ami3' ),
			) )),
			$cz->row( array(
				$cz->textField( 'inwidget_clientId', array(
					'label'  => __( 'client ID', 'ami3' )

				) ),
				$cz->textField( 'inwidget_client_secret', array(
					'label'  => __( 'client secret', 'ami3' )
				) )
			) ),
			$cz->row($token)
		)
	);
}

function cz_fields_instagram( $fields ) {
	$fields[ 'inwidget_code' ] = '';
	$fields[ 'inwidget_token' ] = '';
	$fields[ 'inwidget_client_secret' ] = '';
	$fields[ 'inwidget_clientId' ] = '';
	$fields[ 'inwidget_user' ] = '';
	$fields[ 'inwidget_link' ] = '';
	$fields[ 'inwidget_full_name' ] = '';
	$fields[ 'inwidget_id' ] = '';
	$fields[ 'inwidget_title' ] = '';

	return $fields;
}
add_filter( 'cz_fields', 'cz_fields_instagram' );

function instagram_cz_menu( $v ) {
	$v[ 'czinstagram' ] = array(
		'tmp'         => 'cz_instagram_menu',
		'title'       => __( 'Instagram', 'ami3' ),
		'description' => __( 'Instagram settings', 'ami3' ),
		'icon'        => 'home',
		'submenu'     => array()
	);

	return $v;
}
add_filter( 'cz_list_menu', 'instagram_cz_menu' );

