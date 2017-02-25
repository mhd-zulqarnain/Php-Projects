<?php

/**
 * Author: Vitaly Kukin
 * Date: 24.09.2014
 * Time: 12:14
 * Description: Show settings from Admin Class
 */
class czSettings extends czAdminTpl {

	function __construct() {
		parent::__construct();
	}

	/**
	 * list menu
	 * @return array
	 */
	public function listMenu() {
		$listMenu = array(
			'czbase' => array(
				'tmp'         => 'tmplGeneral',
				'title'       => __( 'General', 'ami3' ),
				'description' => __( 'Some basic configuration settings.', 'ami3' ),
				'icon'        => 'tachometer',
				'submenu'     => array()
			),

			'czhead'          => array(
				'tmp'         => 'tmplHead',
				'title'       => __( 'Head', 'ami3' ),
				'description' => __( 'Use this section to add and edit scripts and styles.', 'ami3' ),
				'icon'        => 'life-ring',
				'submenu'     => array()
			),
			'czheader'        => array(
				'tmp'         => 'tmplHeader',
				'title'       => __( 'Header', 'ami3' ),
				'description' => __( 'Header main elements settings.', 'ami3' ),
				'icon'        => 'cog',
				'submenu'     => array()
			),
			'czhome'          => array(
				'tmp'         => 'tmplHome',
				'title'       => __( 'Home', 'ami3' ),
				'description' => __( 'Home page main settings.', 'ami3' ),
				'icon'        => 'home',
				'submenu'     => array()
			),
			'czsingleproduct' => array(
				'tmp'         => 'tmplSingleProduct',
				'title'       => __( 'Single product', 'ami3' ),
				'description' => __( 'Single product page main settings.', 'ami3' ),
				'icon'        => 'book',
				'submenu'     => array()
			),
			'czCart' => array(
				'tmp'         => 'tmplCart',
				'title'       => __( 'Checkout', 'ami3' ),
				'description' => __( 'Checkout page settings', 'ami3' ),
				'icon'        => 'shopping-cart',
				'submenu'     => array()
			),
			'czabout'         => array(
				'tmp'         => 'tmplAbout',
				'title'       => __( 'About Us', 'ami3' ),
				'description' => __( 'About us page settings.', 'ami3' ),
				'icon'        => 'users',
				'submenu'     => array()
			),
			'czthankyou'      => array(
				'tmp'         => 'tmplThankyou',
				'title'       => __( 'Thank You', 'ami3' ),
				'description' => __( 'Thank you page settings.', 'ami3' ),
				'icon'        => 'smile-o ',
				'submenu'     => array()
			),
			'czsocial'        => array(
				'tmp'         => 'tmplSocial',
				'title'       => __( 'Social Media', 'ami3' ),
				'description' => __( 'Social media pages integration.', 'ami3' ),
				'icon'        => 'hand-o-right ',
				'submenu'     => array()
			),
			/*	'czcontactform' => array(
					'tmp'         => 'tmplContactForm',
					'title'       => __( 'Contact Form', 'ami3' ),
					'description' => __( 'Contact email settings.', 'ami3' ),
					'icon'        => 'comments',
					'submenu'     => array()
				),*/
			'czsubscribe'     => array(
				'tmp'         => 'tmplSubscribe',
				'title'       => __( 'Subscribe Form', 'ami3' ),
				'description' => __( 'Subscription form settings for collecting users’ emails.', 'ami3' ),
				'icon'        => 'envelope',
				'submenu'     => array()
			),
			'czfooter'        => array(
				'tmp'         => 'tmplFooter',
				'title'       => __( 'Footer', 'ami3' ),
				'description' => __( 'Footer options and settings.', 'ami3' ),
				'icon'        => 'bars',
				'submenu'     => array()
			)
		);

		return apply_filters( 'cz_list_menu', $listMenu );
	}

	/**
	 * Template Base
	 */
	function tmplGeneral() {
		$this->block(
		    $this->checkboxField(
		        'tp_show_discount',
                array( 'label' => __('Show discount information in the product list:   Show discount badges', 'ami3') )
            )
        );
		$this->block(
		    $this->checkboxField(
		        'tm_show_blog_comment',
                array( 'label' => __('Enable Facebook comments', 'ami3') )
            )
        );
		$this->block(
			array(
				$this->Button( 'tp_create', array(
					'label' => __( 'Add default pages and menus', 'ami3' ),
					'value' => true,
					'text'  => __( 'Create', 'ami3' )
				) )
			)
		);

		$this->block(
			array(
				$this->checkboxField( 'fix_menu', array(
					'label'       => __( 'Freeze top menu', 'ami3' ),
					'description' => __( 'Top menu will be fixed above while scrolling', 'ami3' )
				) ),
				/*$this->checkboxField( 'tp_coupon', array(
					'label'       => __( 'Promo codes', 'ami3' ),
					'description' => __( 'Promo code field will appear on checkout pages', 'ami3' )
				) ),*/
				$this->checkboxField( 'tp_menu_close', array(
					'label'       => __( 'Short sub-category menu', 'ami3' ),
					'description' => __( 'Show not all sub-categories', 'ami3' )
				) )
			)
		);

		$this->block(
			array(

				$this->row( array(
					$this->colorField( 'tp_color', array(
						'label' => __( 'Template color', 'ami3' ),
					) )
				) ),
				$this->row( array(
					$this->colorField( 'tp_buttons_colors', array(
						'label' => __( 'Buttons Colors', 'ami3' )
					) ),
					$this->colorField( 'tp_buttons_colors_hover', array(
						'label' => __( 'Buttons Colors (click)', 'ami3' )
					) ),
				) ),
				$this->row( array(
					$this->colorField( 'tp_color_countdown', array(
						'label' => __( 'Promo counter color', 'ami3' ),
					) )
				) ),
				$this->row( array(
					$this->colorField( 'tp_color_text_countdown', array(
						'label' => __( 'Promo counter text color', 'ami3' ),
					) )
				) ),
				$this->row( array(
					$this->colorField( 'tp_color_price_product', array(
						'label' => __( 'Prices color', 'ami3' ),
					) )
				) )
			)
		);

		$this->block(
			$this->uploadImgField( 'tp_favicon', array(
					'label'  => __( 'Favicon', 'ami3' ),
					'width'  => 16,
					'height' => 16,
				)
			)
		);

		$this->block(
			$this->uploadImgField( 'tp_bg_body', array(
					'label'  => __( 'Background image', 'ami3' ),
					'width'  => 1920,
					'height' => 1080,
				)
			)
		);

		$this->block(
			$this->row( array(
				$this->uploadImgField( 'tp_img_banner', array(
					'label'  => __( 'Banner image on a product page', 'ami3' ),
					'width'  => 232,
					'height' => 400,
				) ),
				$this->textField( 'tp_link_banner', array(
					'label' => __( 'Banner link', 'ami3' )
				) )
			) )
		);

		$this->block(
			array(
				$this->row( array(
					$this->textField( 'tp_head_ga', array(
						'label' => __( 'Google Analytics Tracking ID', 'ami3' ),
					) )
				) ),
				$this->row( array(
					$this->textField( 'tp_facebook_pixel', array(
						'label' => __( 'Facebook Pixel ID', 'ami3' ),
					) )
				) )
			)
		);

	}

	/**
	 * Template Header
	 */
	function tmplHead() {
		$this->block(
			array(
				$this->textTextArea( 'tp_head', array(
					'label' => __( '< head > tag container for head elements', 'ami3' ),
					'rows'  => 10
				) ),
				$this->textTextArea( 'tp_style', array(
					'label' => __( 'css style', 'ami3' ),
					'rows'  => 10
				) )
			)
		);
	}

	/**
	 * Template Header
	 */
	function tmplHeader() {

		$this->block(
			$this->row(
				array(
					$this->uploadImgField( 'tp_logo_img', array(
						'label'  => __( 'Website logo', 'ami3' ),
						'width'  => 190,
						'height' => 50,
					) ),
					$this->uploadImgField( 'tp_img_left_cart', array(
						'label'       => __( 'Additional image', 'ami3' ),
						'width'       => 157,
						'height'      => 86,
						'description' => __('Usually used for trusted seals, payment system logos, etc.', 'ami3')
					) )
				) ) );

		$this->block( $this->row( array(
				$this->textField( 's_mail', array(
					'label' => __( 'Contact email', 'ami3' ),
				) ),
				$this->textField( 's_phone', array(
					'label' => __( 'Contact phone', 'ami3' ),
				) )
			)
		) );

		$this->block( $this->row( array(
			$this->uploadImgField( 'tp_img_right', array(
				'label'  => __( 'Free shipping logo', 'ami3' ),
				'width'  => 156,
				'height' => 66,
			) ),
			$this->colorField( 'tp_img_right_bg_color', array(
				'label' => __( 'Logo background color', 'ami3' ),
			) )
		) ) );

	}

	/**
	 * Template Social
	 */
	function tmplSocial() {

		$this->block( array(

			$this->row( array(
				$this->textField( 's_title_social_box', array(
					'label' => __( 'Social media section title', 'ami3' ),
				) )
			) )
		), array( 'title' => '' ) );

		$this->block( array(

			$this->row( array(
				$this->textField( 's_link_in', array(
					'label' => __( 'Instagram Account Link', 'ami3' ),
				) ),

				$this->textField( 's_in_name_api', array(
					'label' => __( 'Username', 'ami3' ),
				) )
			) )
		), array( 'title' => __( 'Instagram widget', 'ami3' ) ) );

		$this->block( array(

			$this->row( array(
				$this->textField( 's_link_fb', array(
					'label' => __( 'Fan page link', 'ami3' ),
				) ),

				$this->textField( 's_fb_name_widget', array(
					'label' => __( 'Widget title', 'ami3' ),
				) ),
				$this->textField( 's_fb_apiid', array(
					'label' => __( 'API ID', 'ami3' ),
				) )
			) )
		), array( 'title' => __( 'Facebook widget', 'ami3' ) ) );


		$this->block( array(
			$this->row( array(
				$this->textField( 's_link_tw', array(
					'label' => __( 'Twitter link', 'ami3' ),
				) ),
				$this->textField( 's_link_gl', array(
					'label' => __( 'Google plus link', 'ami3' ),
				) )
			) ),
			$this->row( array(
				$this->textField( 's_link_pt', array(
					'label' => __( 'Pinterest link', 'ami3' ),
				) ),
				$this->textField( 's_link_yt', array(
					'label' => __( 'YouTube link', 'ami3' ),
				) )
			) )
		), array( 'title' => __( 'Social pages links', 'ami3' ) ) );

	}

	/**
	 * Template Footer
	 */
	function tmplFooter() {

		$this->block( array(

			$this->row( $this->checkboxField( 'tp_footer_payment_methods', array(
				'label' => __( 'Payment methods', 'ami3' )
			) ) ),
			$this->row( $this->checkboxField( 'tp_footer_delivery_methods', array(
				'label' => __( 'Delivery Methods', 'ami3' )
			) ) ),
		), array( 'title' => __('Methods', 'ami3') ) );

		$this->block( array(

			$this->row( $this->textField( 'tp_confidence', array(
				'label' => __( 'Confidence', 'ami3' )
			) ) ),
			$this->row(
				array(
					$this->uploadImgField( 'tp_confidence_img_1', array(
						'label'  => __( 'Image 1', 'ami3' ),
						'width'  => 157,
						'height' => 67,
					) ),
					$this->uploadImgField( 'tp_confidence_img_2', array(
						'label'  => __( 'Image 2', 'ami3' ),
						'width'  => 157,
						'height' => 67,
					) ),
					$this->uploadImgField( 'tp_confidence_img_3', array(
							'label'  => __( 'Image 3', 'ami3' ),
							'width'  => 157,
							'height' => 67,
						)
					)
				)
			)
		), array( 'title' => __('Confidence', 'ami3') ) );


		$this->block(
			array(
				$this->row(
					$this->textTextArea( 'tp_copyright', array() )
				),
				$this->row(
					$this->textTextArea( 'tp_address', array() )
				),
				$this->row(
					$this->textTextArea( 'tp_copyright__line', array() )
				)
			),
			array( 'title' => __('Copyright', 'ami3') )
		);

		$this->block(
			$this->row(
				$this->textTextArea( 'tp_footer_script', array(
					'label' => __( 'Footer tag container', 'ami3' ),
					'rows'  => 20
				) )
			)
		);
	}

	/**
	 * Template About
	 */
	function tmplAbout() {
		$this->block(
			array(
				$this->uploadImgField( 'tp_bg1_about', array(
					'label'  => __( 'Background image', 'ami3' ),
					'width'  => 1920,
					'height' => 440,
				) ),
				$this->textField(
				    'tp_about_b1_title',
                    array( 'label' => __('Title', 'ami3') ) ),
				$this->textTextArea( 'tp_about_b1_description', array( 'label' => __('Description', 'ami3'), 'rows' => 5 ) ),
			), array( 'title' => __('About Us', 'ami3') )
		);

		$this->block(
			array(
				$this->checkboxField( 'meet_our_team', array( 'label' => __('Show', 'ami3') ) ),
				$this->textField( 'tp_about_b5_title', array( 'label' => __('Title', 'ami3') ) ),
				$this->textTextArea( 'tp_about_b5_description', array( 'label' => __('Description', 'ami3'), 'rows' => 5 ) ),
				$this->line(),
				$this->row(
					array(
						$this->uploadImgField( 'tp_mt1_img_1', array(
							'label'  => __( 'Photo', 'ami3' ),
							'width'  => 140,
							'height' => 140,
							'align'  => 'center'
						) ),
						$this->col(
							array(
								$this->textField( 'tp_mt1_name_1' ),
								$this->textField( 'tp_mt1_cus_1' )
							)
						)
					)
				),
				$this->line(),
				$this->row(
					array(
						$this->uploadImgField( 'tp_mt1_img_2', array(
							'label'  => __( 'Photo', 'ami3' ),
							'width'  => 140,
							'height' => 140,
							'align'  => 'center'
						) ),
						$this->col(
							array(
								$this->textField( 'tp_mt1_name_2' ),
								$this->textField( 'tp_mt1_cus_2' )
							)
						)
					)
				),
				$this->line(),
				$this->row(
					array(
						$this->uploadImgField( 'tp_mt1_img_3', array(
							'label'  => __( 'Photo', 'ami3' ),
							'width'  => 188,
							'height' => 188,
							'align'  => 'center'
						) ),
						$this->col(
							array(
								$this->textField( 'tp_mt1_name_3' ),
								$this->textField( 'tp_mt1_cus_3' )
							)
						)
					)
				),
				$this->line(),
				$this->row(
					array(
						$this->uploadImgField( 'tp_mt1_img_4', array(
							'label'  => __( 'Photo', 'ami3' ),
							'width'  => 140,
							'height' => 140,
							'align'  => 'center'
						) ),
						$this->col(
							array(
								$this->textField( 'tp_mt1_name_4' ),
								$this->textField( 'tp_mt1_cus_4' )
							)
						)
					)
				),
				$this->line(),
				$this->row(
					array(
						$this->uploadImgField( 'tp_mt1_img_5', array(
							'label'  => __( 'Photo', 'ami3' ),
							'width'  => 140,
							'height' => 140,
							'align'  => 'center'
						) ),
						$this->col(
							array(
								$this->textField( 'tp_mt1_name_5' ),
								$this->textField( 'tp_mt1_cus_5' )
							)
						)
					)
				)
			),
			array( 'title' => __('MEET OUR TEAM', 'ami3') )
		);
	}

	/**
	 * Template Thankyou
	 */
	function tmplThankyou() {
		$this->block( $this->uploadImgField( 'tp_bg_thankyou', array(
			'label'  => __( 'Background image', 'ami3' ),
			'width'  => 1920,
			'height' => 550,
		) )
		);

		$this->block(
			array(
				$this->textField( 'tp_thankyou_fail_no_head', array(
					'label' => __( 'Title', 'ami3' ),
					'rows'  => 10
				) ),
				$this->textTextArea( 'tp_thankyou_fail_no_text', array(
					'label' => __( 'Text', 'ami3' ),
					'rows'  => 10
				) ),
				$this->textTextArea( 'tp_thankyou_fail_no_head_tag', array(
					'label' => __( 'Conversion tracking script', 'ami3' ),
					'rows'  => 10
				) ),
			),
			array(
				'title' => __('Payment success', 'ami3')
			)
		);

		$this->block(
			array(
				$this->textField( 'tp_thankyou_fail_yes_head', array(
					'label' => __( 'Title', 'ami3' ),
					'rows'  => 10
				) ),
				$this->textTextArea( 'tp_thankyou_fail_yes_text', array(
					'label' => __( 'Text', 'ami3' ),
					'rows'  => 10
				) ),
				$this->textTextArea( 'tp_thankyou_fail_yes_head_tag', array(
					'label' => __( "Conversion tracking script", 'ami3' ),
					'rows'  => 10
				) ),
			),
			array(
				'title' => __('Payment fail', 'ami3')
			)
		);
	}

	/**
	 * Template Contact Form
	 */
	function tmplContactForm() {

		$this->block( array(
			$this->row( array(
				$this->textField( 's_send_mail', array(
					'label' => __( 'Receive emails to', 'ami3' )
				) ),
				$this->textField( 's_send_from', array(
					'label' => __( 'Sent emails from (for Mandrill)', 'ami3' )
				) ),
				$this->textField( 's_mandrill', array(
					'label' => __( 'Mandrill.com API Key', 'ami3' )
				) )
			) )
		) );
	}

	/**
	 * Template Subscribe
	 */
	function tmplSubscribe() {

		$this->block(
			$this->row(
				$this->textTextArea( 'tp_subscribe', array(
					'label' => __( 'Paste your ‘Autoresponder’ code here', 'ami3' ),
					'rows'  => 20
				) )
			)
		);
	}

	/**
	 * Template Settings
	 */
	function tmplHome() {

		$this->block(
			array(
				$this->row( array(
					$this->uploadImgField( 'tp_img_product', array(
						'label'  => __( 'Main image', 'ami3' ),
						'width'  => 570,
						'height' => 359,
					) ),
					$this->textTextArea( 'tp_img_product_text', array(
						'rows'  => 10,
						'label' => __( 'Description Text', 'ami3' )
					) )
				) ),
				$this->row( array(
					$this->textField( 'tp_img_product_cat_url', array(
						'label' => __( 'Category URL', 'ami3' )
					) ),
					$this->textField( 'shop_now_text', array(
						'label'       => __( 'Button text', 'ami3' ),
						'description' => __( 'The button sends users to the product catalogue', 'ami3' ),
					) )
				) )

			)
		);

		$this->block(
			array(
				$this->row(
					array(
						$this->uploadImgField( 'tp_img_product_cat1', array(
							'label'  => __( 'Top right image', 'ami3' ),
							'width'  => 316,
							'height' => 179,
						) )
					) ),
				$this->row(
					array(
						$this->textField( 'tp_img_product_cat1_url', array(
							'label' => __( 'Category URL', 'ami3' )
						) ),
						$this->textField( 'tp_img_product_cat1_title', array(
							'label' => __( 'Alt text', 'ami3' )
						) )
					)
				),
				$this->row(
					$this->textTextArea( 'tp_img_product_cat1_text', array(
						'label' => __( 'Description text', 'ami3' ),
						'rows'  => 5
					) )
				)
			)
		);

		$this->block(
			array(
				$this->row(
					array(
						$this->uploadImgField( 'tp_img_product_cat2', array(
							'label'  => __( 'Bottom right image', 'ami3' ),
							'width'  => 316,
							'height' => 179,
						) )
					) ),
				$this->row(
					array(
						$this->textField( 'tp_img_product_cat2_url', array(
							'label' => __( 'Category URL', 'ami3' )
						) ),
						$this->textField( 'tp_img_product_cat2_title', array(
							'label' => __( 'Alt text', 'ami3' )
						) )
					)
				),
				$this->row(
					$this->textTextArea( 'tp_img_product_cat2_text', array(
						'label' => __( 'Description text', 'ami3' )
					) )
				)
			)
		);

		$this->block( $this->textField( 'id_video_youtube_home', array(
			'label'       => __( 'YouTube Video ID', 'ami3' ),
			'description' => 'https://www.youtube.com/watch?v=<b>He5yBEmyjTA</b>'
		) ) );

		$this->block(
			array(
				$this->row( ( $this->checkboxField( 'countdown', array( 'label' => __('Enable counter','ami3') ) ) ) ),
				$this->row( $this->textField( 'countdown_text', array( 'label' => __('Text','ami3') ) ) ),

			),
			array( 'title' => __('Promo Counter','ami3') )
		);

		$this->block(
			array(
				$this->checkboxField( 'features', array( 'label' => __('Enable features', 'ami3') ) ),

				$this->colorField( 'tp_color_features', array(
					'label' => __( 'Features images color', 'ami3' ),
				) ),
				$this->colorField( 'tp_color_head_features', array(
					'label' => __( 'Features titles color', 'ami3' ),
				) ),
				$this->line(),
				$this->textField( 'features_1_head', array(
					'label' => __( 'Title 1', 'ami3' )
				) ),
				$this->textTextArea( 'features_1_text', array(
					'label' => __( 'Description 1', 'ami3' )
				) ),

				$this->line(),

				$this->textField( 'features_2_head', array(
					'label' => __( 'Title 2', 'ami3' )
				) ),
				$this->textTextArea( 'features_2_text', array(
					'label' => __( 'Description 2', 'ami3' )
				) ),

				$this->line(),

				$this->textField( 'features_3_head', array(
					'label' => __( 'Title 3', 'ami3' )
				) ),
				$this->textTextArea( 'features_3_text', array(
					'label' => __( 'Description 3', 'ami3' )
				) ),

				$this->line(),

				$this->textField( 'features_4_head', array(
					'label' => __( 'Title 4', 'ami3' )
				) ),
				$this->textTextArea( 'features_4_text', array(
					'label' => __( 'Description 4', 'ami3' )
				) ),
			),
			array( 'title' => __('Features','ami3') )
		);

		$this->block(
			array(
				$this->tinymce( 'tp_home_article',
					array(
						'rows'        => 30,
						'label'       => __('Article', 'ami3'),
						'description' => __( 'Add 300-500 words SEO article to your home page', 'ami3' )
					) )
			),
			array( 'title' => __('Article','ami3') )
		);

	}

	/**
	 * Template Settings
	 */
	function tmplSingleProduct() {
		$this->block( $this->checkboxField( 'tp_pack', array( 'label' => __('Enable Packaging block','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_show_quantity_orders', array( 'label' => __('Enable quantity of orders','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_share', array( 'label' => __('Enable share button','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_tab_item_specifics', array( 'label' => __('Enable tab item specifics','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_tab_shipping', array( 'label' => __('Enable tab shipping and free returns','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_best_price_guarantee', array( 'label' => __('Enable best price guarantee','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_comment_flag', array( 'label' => __('Enable review flag','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_tab_item_review', array( 'label' => __('Enable tab item review','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_shipping_details', array( 'label' => __('Show shipping details on product page','ami3') ) ) );
		$this->block( $this->checkboxField( 'tp_single_buyer_protection', array( 'label' => __('Buyer protection','ami3') ) ) );
		$this->block( $this->textTextArea( 'tp_single_shipping_payment_content',
			array(
				'label' => __('Shipping & Payment','ami3'),
				'rows'  => 20
			) ) );
	}

	/**
	 * Template Settings
	 */
	function tmplCart() {
		$this->block( array(
			$this->checkboxField( 'tp_phone_number_required', array( 'label' => __('Phone number field required','ami3') ) ),
			$this->checkboxField( 'tp_description_required', array( 'label' => __('Description field required','ami3') ) ),
		) ,array('title'=> __('Fields options','ami3')));


		$this->block( array(
			$this->checkboxField( 'tp_readonly_read_required', array( 'label' => __('Enabled','ami3') ) ),
			$this->textTextArea( 'tp_readonly_read_required_text', array( 'label' => __('Text','ami3')) ),
		) ,array('title'=> __('Terms & Conditions Checkbox','ami3')));

		$this->block( array(
			$this->checkboxField( 'tp_paypal_info_enable', array( 'label' => __('Show the message on your checkout page','ami3') ) ),
			$this->textField( 'tp_paypal_info_text', array( 'label' => __('Additional information for PayPal payment method','ami3') ) ),
			$this->line(),
			$this->checkboxField( 'tp_credit_card_info_enable', array( 'label' => __('Show the message on your checkout page','ami3') ) ),
			$this->textField( 'tp_credit_card_info_text', array( 'label' => __('Additional information for Credit Cards payment method','ami3') ) ),
		) ,array('title'=> __('Additional information','ami3')));

		$this->block( array(
			$this->checkboxField( 'sidebar_safe_shopping_guarantee_show', array( 'label' => __( 'Enable SHOP WITH CONFIDENCE section', 'ami3' ) ) ),
			$this->textField( 'sidebar_safe_shopping_guarantee', array( 'label' => __( 'Title', 'ami3' ) ) ),
			$this->uploadImgField( 'sidebar_safe_shopping_guarantee_img_1', array(
					'label'  =>'',
					'width'  => 139,
					'height' => 48,
				) ),
			$this->uploadImgField( 'sidebar_safe_shopping_guarantee_img_2', array(
				'label'  =>'',
				'width'  => 139,
				'height' => 48,
			) ),
			$this->uploadImgField( 'sidebar_safe_shopping_guarantee_img_3', array(
				'label'  =>'',
				'width'  => 139,
				'height' => 48,
			) )

		), array( 'title' => __( 'Sidebar', 'ami3' ) ) );
	}


}
