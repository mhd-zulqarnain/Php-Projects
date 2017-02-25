<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> class="no-js" itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="utf-8">
	<meta content="True" name="HandheldFriendly">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php dav_wp_seo() ?>

	<link rel="shortcut icon" href="<?php echo cz( 'tp_favicon' ); ?>" />

	<link href="<?php echo get_template_directory_uri(); ?>/css/ic.css?1000" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css?1000" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css?100" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->    <!--[if lt IE 7]>
	<link href="<?php echo get_template_directory_uri(); ?>/css/ic-ie7.css" rel="stylesheet">    <![endif]-->

	<?php wp_head(); ?>
	<?php if ( cz( 'tp_head_ga' ) ): ?>
		<script>
			(function ( i, s, o, g, r, a, m ) {
				i[ 'GoogleAnalyticsObject' ] = r;
				i[ r ] = i[ r ] || function () {
						(i[ r ].q = i[ r ].q || []).push( arguments )
					}, i[ r ].l = 1 * new Date();
				a = s.createElement( o ),
					m = s.getElementsByTagName( o )[ 0 ];
				a.async = 1;
				a.src   = g;
				m.parentNode.insertBefore( a, m )
			})( window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga' );

			ga( 'create', '<?php echo cz( 'tp_head_ga' );?>', 'auto' );
			ga( 'send', 'pageview' );

		</script>
	<?php endif; ?>

	<?php if ( cz( 'tp_facebook_pixel' ) ): ?>
		<!-- Facebook Pixel Code -->
		<script>
			!function ( f, b, e, v, n, t, s ) {
				if ( f.fbq )return;
				n = f.fbq = function () {
					n.callMethod ?
						n.callMethod.apply( n, arguments ) : n.queue.push( arguments )
				};
				if ( !f._fbq )f._fbq = n;
				n.push    = n;
				n.loaded  = !0;
				n.version = '2.0';
				n.queue   = [];
				t         = b.createElement( e );
				t.async   = !0;
				t.src     = v;
				s         = b.getElementsByTagName( e )[ 0 ];
				s.parentNode.insertBefore( t, s )
			}( window,
				document, 'script', 'https://connect.facebook.net/en_US/fbevents.js' );

			fbq( 'init', '<?php echo cz( 'tp_facebook_pixel' );?>' );
			fbq( 'track', "PageView" );
			
			<?php do_action('dav_fb_pixel') ?>

		</script>
		<noscript><img height="1" width="1" style="display:none"
		               src="https://www.facebook.com/tr?id=<?php echo cz( 'tp_facebook_pixel' );?>&ev=PageView&noscript=1"
			/></noscript>
		<!-- End Facebook Pixel Code -->
	<?php endif; ?>

	<style>
		.content-viewed h3 {
			border-top: 2px solid <?php echo cz('tp_color'); ?>;
		}

		.abous_b1 {
			background: url(<?php echo cz('tp_bg1_about'); ?>?1000) center center no-repeat;
			background-size: cover;
		}

		.page-thank-order {
			background: url(<?php echo cz('tp_bg_thankyou'); ?>?1000) center top no-repeat;
			background-size: cover;
			min-height: 550px;
			padding: 40px 0;
		}

		.search-form .btn-danger {
			background: #fff;
			color: <?php echo cz('tp_color'); ?>;
			border-color: <?php echo cz('tp_color'); ?>;
		}

		.search-form .btn-danger:hover {
			background-color: <?php echo cz('tp_color'); ?>;
			border-color: <?php echo cz('tp_color'); ?>;
			color: #fff;
		}

		.header .shipping {
			background: <?php echo cz('tp_img_right_bg_color'); ?>;
		}

		[class^="icofeatures-"], [class*=" icofeatures-"] {
			color: <?php echo cz('features_color'); ?>;
		}

		.header .menu-dropdown .submenu:hover .cat-item > a, .header .subnav a:hover {

			color: <?php echo cz('tp_color'); ?>;
		}

		.header .menu-dropdown .submenu:hover span[class*=main-el-]:before {
			border-left-color: <?php echo cz('tp_color'); ?>;
		}

		.content-from-cat h3 {
			border-top: 2px solid <?php echo cz('tp_color'); ?>;
		}

		.search-form .btn-danger {

		}

		.b-content h1, .b-content h2,
		.b-social__head {
			border-top: 2px solid <?php echo cz('tp_color'); ?>;
		}

		<?php if( function_exists('ads_is_url') ) : ?>
		<?php

		$slug = get_query_var('pagename', '');
		$bg_hide_pages = array('about-us', 'thankyou', 'cart' );

		if( ads_is_url(cz('tp_bg_body')) && !in_array($slug, $bg_hide_pages) ):

		?>

		@media (min-width: 768px) {
			body {
				background: <?php echo ads_is_url(cz('tp_bg_body'))?'url('.cz('tp_bg_body').'?1000)':'#fff'; ?>;
				background-attachment: fixed;
				background-repeat: no-repeat;
				background-size: inherit;
				background-position: top center;
			}

			.bg-wraper {
				position: fixed;
				margin: auto;
				left: 0;
				height: 100%;
				z-index: -1;
				right: 0;
				top: 0;
				bottom: 0;
			}

			.bg-inner {
				background: #FFF;
				width: 102%;
				height: 100%;
				position: relative;
				left: -1%;
			}

			.header {
				background: none;
				border: none;
			}

			.header .container {
				background: #f6f6f6;
				border-color: #d0d0d0;
				border-bottom-width: 1px;
				border-bottom-style: solid;
			}

			.header .shipping {
				float: right;
			}
		}

		<?php endif; ?>

		<?php endif; ?>

		.features h3 {
			color: <?php echo cz('tp_color_head_features');?> !important;
		}

		[class^="icofeatures-"], [class*=" icofeatures-"] {
			color: <?php echo cz('tp_color_features');?> !important;
		}

		#clock .clock .item {
			background: <?php echo cz('tp_color_countdown'); ?>;
			border: 1px solid <?php echo cz('tp_color_countdown'); ?>;
		}

		.content-countdown .color {
			color: <?php echo cz('tp_color_text_countdown'); ?>;
		}

		.header .cart a,
		.topImg__content__btn--mini,
		.topImg__content--big .topImg__content__btn {
			background: <?php echo cz('tp_buttons_colors'); ?>;
		}

		.header .cart a:hover,
		.topImg__content__btn--mini:hover,
		.topImg__content--big .topImg__content__btn:hover {
			background-color: <?php echo cz('tp_buttons_colors_hover'); ?>;
		}

		.item-cat .price, .item-sp .price {
			color: <?php echo cz('tp_color_price_product');?>;
		}

		<?php if(!cz('tp_best_price_guarantee')):?>
		.b-add_order__total dd span:after,
		.b-add_order__total dd:after{
			background: none
		}
		<?php endif; ?>

		<?php echo cz('tp_style');?>

	</style>
	<?php echo cz( 'tp_head' ); ?>
</head>
<?php $pagename = get_query_var( 'pagename' ) ?>
<body <?php body_class( $pagename ); ?>>

<div class="bg-wraper container">
	<div class="bg-inner"></div>
</div>
<!-- HEADER -->
<div class="top-header hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-sm-60 col-md-30">
				<?php wp_nav_menu(
					array(
						'menu'       => 'Top Menu',
						'container'  => '',
						'menu_class' => '',
						'items_wrap' => '<ul>%3$s</ul>'
					)
				) ?>
			</div>
			<div class="col-sm-60 col-md-30  pull-right" itemscope itemtype="http://schema.org/Organization">
				<div class="row top-header__contact">
					<?php if ( cz( 's_mail' ) ): ?>
						<span class="top-header__mail" itemprop="email"><?php echo cz( 's_mail' ); ?></span><?php endif; ?>
					<?php if ( cz( 's_phone' ) ): ?>
						<span class="top-header__phone" itemprop="telephone"><?php echo cz( 's_phone' ); ?></span><?php endif; ?>
                    <div class="login-line">
                        <?php dav_login_button();?>
                    </div>
                    <div class="dropdown dropdown_currency">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" ajax_update="currency"></a>
						<ul class="dropdown-menu" role="menu">
							<?php
							if ( function_exists( 'ads_select_currency' ) ) {
								echo ads_select_currency();
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $class = ( ! dav_is_home() ) ? 'header-dropdown' : ''; ?>
<?php $fix_menu = cz( 'fix_menu' ) ? 'fix_menu' : '' ?>
<?php $tbtn = ! cz( 'fix_menu' ) && dav_is_home() ? 'hidden-lg' : '' ?>


<div class="header <?php echo $class ?> <?php echo $fix_menu; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-19 col-md-19 col-sm-25  col-xs-60 header-left">
				<div class="col-xs-60 col-sm-60">
					<a href="#" class="tbtn pull-left <?php echo $tbtn; ?>"> <span></span> <span></span> <span></span>
					</a> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="logo">
						<span class="logo-inner"><img src="<?php echo cz( 'tp_logo_img' ); ?>?1000" class="img-responsive"></span>
					</a>
				</div>
				<div class="visible-xs">
                    <?php dav_login_button();?>
                    <span>
                        <button form="search" class="b-sth" type="submit">
                            <span class="search-button-icon"></span>
                        </button>
                    </span>
				</div>
			</div>
			<div class="visible-xs">
				<div class="mobile-search">
					<form id="search" method="GET" action="<?php echo esc_url( home_url( '/' ) ) ?>" class="search">
						<div class="wrap">
							<input type="text" id="s" value="" name="s"
							       placeholder="<?php _e( "I'm shopping for...", 'ami3' ) ?>" required>
							<div class="close"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-25 col-md-25 col-sm-35 col-xs-60 pull-right">
				<div class="row">
					<div class="col-lg-20 col-md-20 col-xs-20 mcafee">
						<?php if ( cz( 'tp_img_left_cart' ) ): ?>
							<img src="<?php echo cz( 'tp_img_left_cart' ); ?>?1000" alt="">
						<?php endif; ?>
					</div>
					<div class="col-lg-20 col-md-20 col-xs-20 cart js-cart-info">

							<span class="items">
                                <?php
                                printf(
	                                '<a href="%1$s"><span class="js-total_quantity_value"></span>  %2$s</a>',
	                                esc_url( home_url( '/cart/' ) ),
                                        __('items','ami3')
                                ); ?>
                            </span>
					</div>
					<div class="col-lg-20 col-md-20 col-xs-20 shipping">
						<div class="shipping-img"><img src="<?php echo cz( 'tp_img_right' ); ?>?1000" alt=""></div>
					</div>
				</div>
			</div>
			<div class="col-lg-16 col-md-16 col-xs-60 pull-left hidden-xs">
				<form method="GET" action="<?php echo esc_url( home_url( '/' ) ) ?>" class="search-form form-inline">
					<div class="form-group">
						<input type="text" class="form-control" id="s" value="<?php the_search_query() ?>" name="s"
						       placeholder="<?php _e( "I'm shopping for...", 'ami3' ) ?>">
					</div>
					<button class="btn btn-default btn-danger" type="submit">
						<span class="ic icon-search"></span>
					</button>
				</form>
			</div>
		</div>
		<div class="menu-dropdown">
			<div class="visible-xs mobile-top_menu">
				<div class="dropdown dropdown_currency">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" ajax_update="currency"></a>
					<ul class="dropdown-menu" role="menu">
						<?php
						if ( function_exists( 'ads_select_currency' ) ) {
							echo ads_select_currency();
						}
						?>
					</ul>
				</div>
				<ul>
					<li class="menu-item"><a href="/"><?php _e( 'Home', 'ami3' ); ?></a></li>
				</ul>
			</div>

			<div class="visible-xs mobile-main-menu">
				<div class="head"><?php _e( 'All Categories', 'ami3' ); ?>:</div>
				<ul class="cat_menu-list">
					<?php
					$menuProduct = wp_list_categories(
						array(
							'child_of'            => 0,
							'current_category'    => 0,
							'depth'               => 0,
							'echo'                => 0,
							'exclude'             => '',
							'exclude_tree'        => '',
							'feed'                => '',
							'feed_image'          => '',
							'feed_type'           => '',
							'hide_empty'          => 1,
							'hide_title_if_empty' => false,
							'hierarchical'        => true,
							'order'               => 'ASC',
							'orderby'             => 'name',
							'separator'           => '<br />',
							'show_count'          => 1,
							'show_option_all'     => '',
							'show_option_none'    => '',
							'style'               => 'list',
							'taxonomy'            => 'product_cat',
							'title_li'            => '',
							'use_desc_for_title'  => 1,
						)
					);
					$menuProduct = preg_replace( "#<a([^>]*)>([^>]*)<\/a>\s*\(([^>]*)\)#", "<a$1><span>$2</span><i>($3)</i></a>", $menuProduct );
					echo $menuProduct;
					?>
				</ul>
			</div>
			<div class="visible-xs mobile-top_menu">
				<?php wp_nav_menu(
					array(
						'menu'       => 'Top Menu',
						'container'  => '',
						'menu_class' => '',
						'items_wrap' => '<ul>%3$s</ul>'
					)
				) ?>
			</div>
			<div class="hidden-xs">
				<?php
				$args = array(
					'theme_location' => 'primary',
					'menu_class'     => 'main-menu',
					'link_before'    => '<span class="main-el-icon"></span>'

				);
				wp_nav_menu( $args );
				?>
			</div>
		</div>
	</div>
</div>