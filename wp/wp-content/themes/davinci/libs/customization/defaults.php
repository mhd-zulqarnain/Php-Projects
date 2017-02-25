<?php
/**
 * Autor: Pavel Shishkin
 * Date: 30.06.2016
 * Time: 19:04
 */

return array(
	'tp_head'                 => '',
	'tp_style'                => '',


	/*base*/
	'tm_show_blog_comment'    => true,
	'tp_head_ga'              => '',
	'tp_facebook_pixel'       => '',
	'tp_create'               => true,
	'tp_dev'                  => false,
	'tp_color'                => '#005E8E',
	'tp_color_countdown'      => '#C36833',
	'tp_color_text_countdown' => '#EEA12D',
	'tp_color_features'       => '#007CB1',
	'tp_color_price_product'  => '#FF6E00',
	'fix_menu'                => false,
	'tp_logo_img'             => IMG_DIR . 'main/logo.png',
	'tp_favicon'              => TEMPLATE_DIR . '/favicon.ico',
	'tp_bg_body'              => '#fff',
	's_mail'                  => 'support@' . dav_get_host(),
	's_phone'                 => '1 (716) 235 57 71',
	'tp_img_banner'           => IMG_DIR . 'unnamed.png',
	'tp_link_banner'          => 'product/',
	'tp_coupon'               => false,
	'tp_img_left_cart'        => IMG_DIR . 'main/mcafee-seal.png',
	'tp_img_right'            => IMG_DIR . 'main/free-shipping.jpg',
	'tp_img_right_bg_color'   => '#005E8E',
	'tp_buttons_colors'       => '#FF8D38',
	'tp_buttons_colors_hover' => '#FF6E01',
	'tp_menu_close'           => false,
	'tp_show_discount'        => true,
	/*home*/
	'id_video_youtube_home'   => 'rsbZbmMk3BY',

	'tp_img_product'         => IMG_DIR . 'slider/slide-1.jpg',
	'tp_img_product_cat_url' => 'product',
	'shop_now_text'          => __( 'Shop Now', 'ami3' ),
	'tp_img_product_text'    => __( 'We offer best service and great prices on high quality products!', 'ami3' ),


	'tp_img_product_cat1'       => IMG_DIR . 'slider/mini-1.jpg',
	'tp_img_product_cat1_url'   => 'product_cat/magic-wands',
	'tp_img_product_cat1_title' => __( 'Go shopping', 'ami3' ),
	'tp_img_product_cat1_text'  => __( 'Buy with confidence using the world’s most popular and secure payment methods', 'ami3' ),

	'tp_img_product_cat2'       => IMG_DIR . 'slider/mini-2.jpg',
	'tp_img_product_cat2_url'   => 'product_cat/costumes',
	'tp_img_product_cat2_title' => __( 'Go shopping', 'ami3' ),
	'tp_img_product_cat2_text'  => __( 'Our Buyer Protection covers your purchase from click to delivery', 'ami3' ),

	'countdown'      => true,
	'countdown_text' => __( 'Super Sale up to', 'ami3' ) . ' <span class="color sale">80%</span> ' . __( 'off all items!', 'ami3' ) . ' <span class="color">' . __( 'limited time offer', 'ami3' ) . '</span>',

	'features'               => true,
	'features_color'         => '#007CB1',
	'tp_color_head_features' => '#007CB1',
	'features_1_head'        => __( '<b>700+</b> Clients Love Us!', 'ami3' ),
	'features_1_text'        => __( 'We offer best service and great prices on high quality products', 'ami3' ),
	'features_2_head'        => __( 'Shipping to <b>185</b> Countries', 'ami3' ),
	'features_2_text'        => __( 'Our store operates worldwide and you can enjoy free delivery of all orders', 'ami3' ),
	'features_3_head'        => __( '<b>100%</b> Safe Payment', 'ami3' ),
	'features_3_text'        => __( 'Buy with confidence using the world’s most popular and secure payment methods', 'ami3' ),
	'features_4_head'        => __( '<b>2000+</b> Successful Deliveries', 'ami3' ),
	'features_4_text'        => __( 'Our Buyer Protection covers your purchase from click to delivery', 'ami3' ),

	'tp_home_article' => '',

	/*cart*/

	'tp_phone_number_required' => false,
	'tp_description_required'  => false,

	'tp_readonly_read_required'      => false,
	'tp_readonly_read_required_text' => __( 'I have read the', 'ami3' ) . ' <a href="' . home_url( '/terms-and-conditions/' ) . '">' . __( 'Terms & Conditions', 'ami3' ) . '</a>',

	'tp_paypal_info_enable' => true,
	'tp_paypal_info_text'   => __( 'You can pay with your credit card without creating a PayPal account', 'ami3' ),

	'tp_credit_card_info_enable'            => true,
	'tp_credit_card_info_text'              => __( 'All transactions are secure and encrypted. Credit card information is never stored.', 'ami3' ),

	/*Checkout _sidebar*/
	'sidebar_safe_shopping_guarantee_show'  => true,
	'sidebar_safe_shopping_guarantee'       => __( 'SAFE SHOPPING GUARANTEE', 'ami3' ),
	'sidebar_safe_shopping_guarantee_img_1' => IMG_DIR . 'trust/mcafee.svg',
	'sidebar_safe_shopping_guarantee_img_2' => IMG_DIR . 'trust/norton.svg',
	'sidebar_safe_shopping_guarantee_img_3' => IMG_DIR . 'trust/truste.svg',

	/*single product*/
	'tp_share'                              => false,
	'tp_tab_shipping'                       => true,
	'tp_tab_item_specifics'                 => true,
	'tp_tab_item_review'                    => true,
	'tp_shipping_details'                   => true,
	'tp_single_buyer_protection'            => true,
	'tp_single_shipping_payment_content'    => czOptions::getTemplateField( 'tm_single_shipping_payment_content' ),
	'tp_best_price_guarantee'               => true,
	'tp_comment_flag'                       => true,
	'tp_show_quantity_orders'               => true,
	'tp_pack'                               => false,
	/*SEO*/
	'tp_home_seo_title'                     => '',
	'tp_home_seo_description'               => '',
	'tp_home_seo_keywords'                  => '',

	'tp_seo_products_title'       => __( 'All products', 'ami3' ),
	'tp_seo_products_description' => __( 'All products – choose the ones you like and add them to your shopping cart', 'ami3' ),
	'tp_seo_products_keywords'    => '',

	/*about*/
	'tp_bg1_about'                => IMG_DIR . 'about/bg_block1.jpg',
	'tp_about_b1_title'           => __( 'About Us', 'ami3' ),
	'tp_about_b1_description'     => __( 'Welcome to', 'ami3' ) . ' ' . dav_get_host() . '. ' .
	                                 __( 'We are a team of enthusiastic developers and entrepreneurs who decided to convert their common experience into this web store. We hope you’ll like it as much as we do and have a great shopping experience here. Our prime goal is to create a shop in which you can easily find whatever product you need', 'ami3' ),

	'meet_our_team'           => true,
	'tp_about_b5_title'       => __( 'MEET OUR TEAM', 'ami3' ),
	'tp_about_b5_description' => __( 'Our team is made up of experienced developers, designers and marketers who do their best to create the interface comfortable to use. It is vital for us to make your shopping easy and pleasant.', 'ami3' ),

	'tp_mt1_img_1'  => IMG_DIR . 'about/1.jpg',
	'tp_mt1_name_1' => __( 'Oprah Phillips', 'ami3' ),
	'tp_mt1_cus_1'  => __( 'Customer Support Specialist', 'ami3' ),

	'tp_mt1_img_2'  => IMG_DIR . 'about/2.jpg',
	'tp_mt1_name_2' => __( 'Samantha Bailey', 'ami3' ),
	'tp_mt1_cus_2'  => __( 'Customer Support Specialist', 'ami3' ),

	'tp_mt1_img_3'  => IMG_DIR . 'about/3.jpg',
	'tp_mt1_name_3' => __( 'Nataly Robinson', 'ami3' ),
	'tp_mt1_cus_3'  => __( 'Customer Support Manager', 'ami3' ),

	'tp_mt1_img_4'  => IMG_DIR . 'about/4.jpg',
	'tp_mt1_name_4' => __( 'Anton Martin', 'ami3' ),
	'tp_mt1_cus_4'  => __( 'Customer Support Specialist', 'ami3' ),

	'tp_mt1_img_5'                  => IMG_DIR . 'about/5.jpg',
	'tp_mt1_name_5'                 => __( 'Amber Lee', 'ami3' ),
	'tp_mt1_cus_5'                  => __( 'Customer Support Specialist', 'ami3' ),

	/*thankyou*/
	'tp_bg_thankyou'                => IMG_DIR . 'main/bg_page_thank.jpg',
	'tp_thankyou_fail_no_head_tag'  => '',
	'tp_thankyou_fail_no_head'      => __( 'Thank you for your order!', 'ami3' ),
	'tp_thankyou_fail_no_text'      => '<p>' . __( 'Your payment was accepted and you will get notification on your email address.', 'ami3' ) .
	                                   '</p><p>*' . __( 'Please note that if you’ve ordered more than 2 items, you might not get all of them at the same time due to varying locations of our storehouses.', 'ami3' ) . '</p>',
	'tp_thankyou_fail_yes_head_tag' => '',
	'tp_thankyou_fail_yes_head'     => '<p>' . __( 'We are sorry, we were unable to successfully process this transaction.', 'ami3' ) . '</p>',
	'tp_thankyou_fail_yes_text'     => '',

	/*social*/
	's_title_social_box'            => __( 'join us on social media', 'ami3' ),
	's_link_fb'                     => '',
	's_fb_apiid'                    => '',
	's_fb_name_widget'              => '',

	's_link_in'     => '',
	's_in_name_api' => '',

	's_link_tw'           => 'https://twitter.com/',
	's_link_gl'           => 'https://plus.google.com/',
	's_link_pt'           => 'https://www.pinterest.com/',
	's_link_yt'           => 'https://www.youtube.com/',

	/*contact form*/
	's_send_mail'         => 'support@' . dav_get_host(),
	's_send_from'         => 'support@' . dav_get_host(),

	/*subscribe*/
	'tp_subscribe'        => czOptions::getTemplateField( 'tp_subscribe' ),
	/*footer*/
	'tp_confidence'       => __( 'BUY WITH CONFIDENCE', 'ami3' ),
	'tp_confidence_img_1' => IMG_DIR . 'main/confidence1.png',
	'tp_confidence_img_2' => IMG_DIR . 'main/confidence2.png',
	'tp_confidence_img_3' => IMG_DIR . 'main/confidence3.png',

	'tp_copyright'               => __( '© Copyright {{YEAR}}. All Rights Reserved', 'ami3' ),
	'tp_address'                 => '101 California Street, Suite 2710, San Francisco, CA 94111',
	'tp_copyright__line'         => dav_get_host(),
	'tp_footer_script'           => '',
	'tp_footer_payment_methods'  => true,
	'tp_footer_delivery_methods' => true
);
