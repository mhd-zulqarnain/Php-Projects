/**
 * Created by sunfun on 18.01.17.
 */
function isURL( str ) {

	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	return regexp.test( str );
}

var templateToData = function ( template, data ) {
	var i        = 0,
		len      = data.length,
		fragment = '';

	function replace( obj ) {
		var t, key, reg;

		for ( key in obj ) {
			reg = new RegExp( '{{' + key + '}}', 'ig' );
			t   = (t || template).replace( reg, obj[ key ] );
		}
		return t;
	}

	for ( ; i < len; i++ ) {
		fragment += replace( data[ i ] );
	}

	return fragment;
};
/******************/

/*MODAL CART*/
jQuery( function ( $ ) {


	var modal_car = (function () {
		var $this;
		var fields = [
			{
				name : 'Total price',
				el   : '.js-cur_salePrice',
				data : 'cur_salePriceFree'
			},
			{
				name : 'total count',
				el   : '.js-total_count',
				data : 'quantity'
			}
		];
		var $body  = $( 'body' );
		return {
			init : function () {
				$this     = this;
				$this.el  = '#prModalCart';
				$this.$el = $( $this.el );
				if ( !$this.$el.length ) {
					return;
				}

				$body.on( 'cart:change cart:update', function ( e ) {
					$this.renderFields( e );
				} );

				$body.on( 'cart:add', function ( e ) {
					$this.renderFields( e );
					$this.$el.modal( 'show' )
				} );

			},

			renderFields : function ( e ) {
				var obj = e.cart;

				fields.forEach( function ( field ) {
					$this.$el.find( field.el ).text( obj[ field.data ] );
				} );
			}
		}
	})();

	modal_car.init();

	var modal_car_items = (function () {
		var $this;
		var _timeout = null;
		var fields   = [
			{
				name : 'Amount Price',
				el   : '.js-total_salePrice',
				data : 'total_salePrice'
			},
			{
				name : 'Amount price',
				el   : '.js-total_price',
				data : 'total_price'
			},
			{
				name : 'Amount price',
				el   : '.js-modal_quantity',
				data : 'quantity'
			}
		];
		var $body    = $( 'body' );
		return {
			init : function () {
				$this     = this;
				$this.el  = '#cart_itemes';
				$this.$el = $( $this.el );
				if ( !$this.$el.length ) {
					return;
				}

				$this.templateCartItem   = $( '#modal_cart_item_template' ).html();
				$this.templateDetails    = $( '#modal_cart_details_template' ).html();
				$this.templateDetailsImg = $( '#modal_cart_details_img_template' ).html();


				$body.on( 'cart:add cart:shipping', function ( e ) {
					$this.render( $this.format( e ) );
				} );

				$body.on( 'cart:change', function ( e ) {
					$this.renderFields( e );
				} );

				$body.on( 'click', '.js-remove-item', function ( e ) {
					e.preventDefault();
					var order_id = $( this ).closest( '.cart-item' ).hide( 500 ).data( 'key' );
					adsCart.remove( order_id );
				} );

				$body.on( 'keyup mouseup', $this.el + ' input[name="modal_quantity"]', function () {
						clearTimeout( _timeout );

						var _this = this;
						_timeout  = setTimeout( function () {
							var quantity = parseInt( $( _this ).val() );
							quantity     = quantity > 0 ? quantity : 1;
							var order_id = $( _this ).closest( '.cart-item' ).data( 'key' );
							adsCart.newQuantity( order_id, quantity );
						}, 400 );
					}
				);

				$body.on( 'change', '.js-modal-shipping', function () {
					var shipping = $( this ).find( 'option:selected' ).val();
					var order_id = $( this ).closest( '.cart-item' ).data( 'key' );
					adsCart.newShipping( order_id, shipping );
				} );
			},

			renderFields      : function ( e ) {
				var obj      = e.cart,
					order_id = e.order_id,
					i,
					dataItem;

				var $item = $( $this.$el.find( '[data-key="' + order_id + '"]' ) );

				for ( i in obj.items ) {
					if ( obj.items[ i ][ 'order_id' ] == order_id ) {
						dataItem             = obj.items[ i ];
						dataItem.total_price = $this.filterTotal_price( dataItem );
					}
				}

				fields.forEach( function ( field ) {
					$item.find( field.el ).text( dataItem[ field.data ] );
				} );
			},
			render            : function ( e ) {
				var template = $this.templateCartItem;
				var obj      = e.cart,
					order_id = e.info.order_id,
					i,
					dataItem = '';

				if ( !obj.items )return;
				for ( i in obj.items ) {
					if ( obj.items[ i ][ 'order_id' ] == order_id ) {
						dataItem = obj.items[ i ];
					}
				}
				console.log( dataItem );
				if ( dataItem )
					$this.$el.html( templateToData( template, [ dataItem ] ) );
			},
			format            : function ( e ) {


				var obj = e.cart;
				if ( obj.items ) {
					obj.items.forEach( function ( item ) {
						item.details     = $this.formatDetails( item.details );
						item.shipping    = $this.formatShipping( item );
						item.total_price = $this.filterTotal_price( item );
					} );
				}
				e.cart = obj;
				return e;
			},
			filterTotal_price : function ( cart ) {
				var cur_price = cart.total_price;
				var re        = /0\.00/;
				if ( re.test( cart.total_price ) ) {
					cur_price = '';
				}

				return cur_price;
			},
			formatShipping    : function ( item ) {
				var availableShipping = item.availableShipping;
				var shipping_method   = item.shipping_method;
				var shipping          = '';

				if ( 0 == availableShipping.length )
					return davLang.free;

				shipping += '<select class="js-modal-shipping" name="modal_shipping">';
				for ( var k in availableShipping ) {
					if ( availableShipping.hasOwnProperty( k ) ) {
						var selected = k == shipping_method ? 'selected' : '';
						shipping += '<option value="' + k + '" data-info="' + availableShipping[ k ][ 'time' ] + '" ' + selected + '>' +
							availableShipping[ k ][ 'cur_cost' ] + ' ' + davLang[ k ] + '</option>';
					}
				}
				shipping += '</select>';
				return shipping;
			},
			formatDetails     : function ( details ) {

				var template = $this.templateDetails;
				var data     = [];
				var key;
				for ( key in details ) {

					if ( isURL( details[ key ] ) )
						details[ key ] = $this.formatDetailsImg( details[ key ] );

					data.push( {
						title     : key,
						variation : details[ key ]
					} );
				}

				return templateToData( template, data );

			},
			formatDetailsImg  : function ( url ) {
				var template = $this.templateDetailsImg;
				return templateToData( template, [ { url : url } ] );
			}
		}
	})();

	modal_car_items.init();
	/*END MODAL CART*/
} );

jQuery( function ( $ ) {

	if ( $.fn.fotorama ) {
		$fotoramaDiv = $( '#productSlider.fotorama' ).fotorama( {
			minwidth         : 350,
			height           : 'auto',
			maxwidth         : '100%',
			shadows          : true,
			allowfullscreen  : true,
			nav              : 'thumbs',
			fit              : 'scaledown',
			loop             : true,
			thumbborderwidth : 1
		} );
	}

	var pageSingleProduct = (function () {
		var $this;
		var $body         = $( 'body' );
		var _timeout      = null;
		var _timeoutStage = null;

		var obj = {
			price       : '[data-singleProduct="price"]',
			salePrice   : '[data-singleProduct="savePrice"]',
			totalPrice  : '[data-singleProduct="totalPrice"]',
			quantity    : '[data-singleProduct="quantity"]',
			save        : '[data-singleProduct="save"]',
			savePercent : '[data-singleProduct="savePercent"]',
			_quantity   : '#form_singleProduct input[name="quantity"]',

			box : {
				price       : '[data-productPriceBox="price"]',
				salePrice   : '[data-productPriceBox="salePrice"]',
				savePercent : '[data-productPriceBox="savePercent"]',
				quantity    : '[data-productPriceBox="quantity"]',
				save        : '[data-productPriceBox="savePercent"]',
				totalPrice  : '[data-productPriceBox="totalPrice"]'
			}
		};

		var stage = {
			price     : $( '#form_singleProduct [name="price"]' ).val(),
			save      : $( '#form_singleProduct [name="save"]' ).val(),
			salePrice : $( '#form_singleProduct [name="salePrice"]' ).val(),

			_price        : $( '#form_singleProduct [name="_price"]' ).val(),
			_price_nc     : $( '#form_singleProduct [name="_price_nc"]' ).val(),
			_salePrice    : $( '#form_singleProduct [name="_salePrice"]' ).val(),
			quantity      : $( '[data-singleproduct="quantity"]' ).text(),
			_quantity     : $( '#form_singleProduct [name="quantity"]' ).val(),
			savePercent   : $( '#form_singleProduct [name="savePercent"]' ).val(),
			_salePrice_nc : $( '#form_singleProduct [name="_salePrice_nc"]' ).val(),
			_save         : $( '#form_singleProduct [name="_save"]' ).val(),
			_save_nc      : $( '#form_singleProduct [name="_save_nc"]' ).val(),

			currency          : $( '#form_singleProduct [name="currency"]' ).val(),
			currency_shipping : $( '#form_singleProduct [name="currency_shipping"]' ).val(),
			price_shipping    : $( '#form_singleProduct [data-singleproduct="shipping"] option:selected' ).data( 'price' ),
		};

		function getCurrency(  ) {
			stage.currency = $( '#form_singleProduct [name="currency"]' ).val();
			return stage.currency;
		}

		function getCurrencyShipping() {
			stage.currency_shipping = $( '#form_singleProduct [name="currency_shipping"]' ).val();
			return stage.currency_shipping;
		}

		function renderShipping(  ) {

			var shippingInput = $('input[data-singleproduct="single-shipping"]'),
				shippingSelect = $('select[data-singleproduct="single-shipping"]');

			if(shippingSelect.length){
				$(shippingSelect).find('option').each(function ( e, i ) {
					var _price_nc = $(this).attr('data-cost_nc');
					var _price = window.formatPrice.convertPriceOut( _price_nc , getCurrencyShipping(), false );

					var template = $(this).attr('data-template');
					template = template.replace(/{{\s*price\s*}}/, _price);
					$(this).text(template);
				});

			}else if(shippingInput.length){
				var _price_nc = shippingInput.attr('data-cost_nc');
				if(_price_nc >0){
					var valueBoxShipping = $('[data-singleproduct="single-shipping_value"]');

					var _price = window.formatPrice.convertPriceOut( _price_nc , getCurrencyShipping(), false );
					var template = shippingInput.attr('data-template');
					template = template.replace(/{{\s*price\s*}}/, _price);

					valueBoxShipping.text(template);
				}

			}
		}

		function renderPrice() {

			$( obj.salePrice ).text( stage.salePrice );
			$( obj.totalPrice ).text( stage.totalPrice );
			$( obj.box.totalPrice ).show();
			$( obj.price ).text( stage.price );

			$( obj.save ).text( stage.save );
			$( obj.savePercent ).text( stage.savePercent );
			$( obj.box.salePrice ).show();

			$( obj.quantity ).text( stage.quantity );

			if ( parseFloat( stage._price ) > 0 && stage._price != stage._salePrice ) {
				$( obj.box.price ).show();
			} else {
				$( obj.box.price ).hide();
			}

			if ( parseFloat( stage._price ) - parseFloat( stage._salePrice ) > 0 ) {
				$( obj.box.savePercent ).show();
			} else {
				$( obj.box.savePercent ).hide();
			}

			if ( stage.quantity < 15 ) {
				$( obj.box.quantity ).show();
			} else {
				$( obj.box.quantity ).hide();
			}
		}

		return {
			init     : function () {
				if($this){
					return;
				}
				$this = this;
				$( window ).load( function () {

				} );

				$body.on( 'keyup mouseup click', '#form_singleProduct input[name="quantity"]', function () {
						clearTimeout( _timeout );
						var _this = this;
						_timeout  = setTimeout( function () {
							var quantity = parseInt( $( _this ).val() );
							quantity     = quantity > 0 ? quantity : 1;
							$this.setStage( '_quantity', quantity );
							$this.setPrice();
						}, 100 );
					}
				);

				$( '[data-singleproduct="single-shipping"]' ).on( 'change', function () {
					var option = $( this ).find( 'option:selected' );
					$( '[data-singleproduct="shipping-info"]' ).html( option.data( 'info' ) );
				} );

				$this.setPrice();
			},
			setStage : function ( name, value, trigger ) {

				if ( typeof name === "object" ) {
					for ( var i in name ) {
						stage[ i ] = name[ i ];
					}
					trigger = value;
				} else {
					stage[ name ] = value;
				}

				if ( trigger !== true ) return;

				clearTimeout( _timeoutStage );
				_timeoutStage = setTimeout( function () {
					renderPrice();
					renderShipping();
				}, 100 );

			},
			setPrice : function () {

				var _price = window.formatPrice.convertPrice( stage._price_nc , getCurrency() );
				var price = window.formatPrice.outPrice( _price );

				var _salePrice = window.formatPrice.convertPrice( stage._salePrice_nc, getCurrency() );
				var salePrice = window.formatPrice.outPrice( _salePrice );
				var totalPrice = window.formatPrice.outPrice( _salePrice * stage._quantity);

				var _save = stage._price - stage._salePrice;
				var save = window.formatPrice.outPrice(_save, getCurrency());

				var savePercent = _price > 0 && _salePrice > 0 ? Math.round( ( ( _price - _salePrice ) / _price ) * 100 ) : '';


				$this.setStage( '_price', _price );
				$this.setStage( '_salePrice', _salePrice );
				$this.setStage( 'price', price );
				$this.setStage( 'salePrice', salePrice );
				$this.setStage( 'save', save );
				$this.setStage( 'totalPrice', totalPrice );
				$this.setStage( 'savePercent', savePercent, true );

			}
		}
	})();

	var changePriceSku = (function () {
		var $this, skuAttr, sku, currency;

		function setFirstSku( skuAttr ) {
			if ( typeof skuAttr == 'undefined' ) {
				return null
			}

			var name = Object.keys( skuAttr )[ 0 ], key;

			var names = name.split( ';' );

			for ( key in names ) {
				var sku = $( 'input[value="' + names[ key ] + '"]' ).closest( '.sku-set' );
				setSkuParamsActive( sku );
			}

			renderSkuActive();
		}


		function renderSkuActive() {
			var value = getSku( $( 'form.cart-form' ), false );
			if ( !value )return false;

			var foo = value.foo;

			$( '.sku-set' ).addClass( 'disabled' ).removeClass( 'active' );

			$.each( skuAttr, function ( skuAttrName, e ) {
				var sku = skuAttrName.split( ';' );

				var count = 0, l = foo.length;

				for ( var k in foo ) {
					if ( foo[ k ] == sku[ k ] ) {
						count++;
					}

					$( 'input[value="' + foo[ k ] + '"]' ).closest( '.sku-set' ).addClass( 'active' );
				}

				if ( count >= l - 1 ) {
					$.each( sku, function ( i ) {
						$( 'input[value="' + sku[ i ] + '"]' ).closest( '.sku-set' ).removeClass( 'disabled' );
					} );
				}

			} );

		}

		function changeSku() {

			var value = getSku( $( 'form.cart-form' ), false ),
				skuAttrName;

			if ( !value )return false;

			var foo     = value.foo;
			skuAttrName = foo.join( ';' );

			if ( typeof skuAttr[ skuAttrName ] == 'undefined' ) {
				console.log( 'no sku' );
				return;
			}

			$( 'body' ).trigger( {
				type        : "changeSku",
				foo         : foo,
				item        : skuAttr[ skuAttrName ],
				skuAttrName : skuAttrName
			} );

		}

		function setSkuParamsActive( skuSet ) {

			var pid       = $( skuSet ).data( 'set' ),
				variation = $( skuSet ).data( 'meta' ),
				skuval    = $( '#check-' + pid + '-' + variation ).val();

			$( '#set-' + pid ).val( skuval );

		}

		function setSkuPrice( e ) {
			var item = e.item;
			var data = {
				price         : item.price,
				_price        : item._price,
				_price_nc     : item._price_nc,
				salePrice     : item.salePrice,
				_salePrice    : item._salePrice,
				_salePrice_nc : item._salePrice_nc,
				quantity      : item.quantity,
				savePercent   : item.discount,
				_save         : item._price - item._salePrice,
				_save_nc      : item._price_nc - item._salePrice_nc,
				save          : item.save,
			};

			if ( data._save < 0 ) {
				data._save = 0
			}

			pageSingleProduct.setStage( data );
			pageSingleProduct.setPrice();

		}

		return {
			init : function () {
				if($this){
					return;
				}
				$this    = this;
				skuAttr  = window.skuAttr;
				sku      = window.sku;
				currency = $( '[name="currency"]' ).val();
				$( 'body' )
					.on( 'click', '.sku-set', function () {
						setSkuParamsActive( this );
						renderSkuActive();
						changeSku();
					} )
					.on( 'changeSku', setSkuPrice );

				setFirstSku( skuAttr );

			}
		}
	})();

	$('body').on('infoCurrency:done', function (  ) {
		console.log( 'infoCurrency' );
		changePriceSku.init();
		pageSingleProduct.init();
	});
	if(formatPrice.isInit()){
		console.log( 'isInit' );
		changePriceSku.init();
		pageSingleProduct.init();
	}
//установка картинки в слайдер
	$.fn.sku = function ( defaults ) {

		var options = $.extend( {
			item          : '.sku-set',
			slider        : '#productSlider .carousel-inner',
			productSlider : '#productSlider'
		}, defaults );

		var productSlider = $( options.productSlider ).data( 'fotorama' );

		var th = $( this );

		var setSKU = function () {
			th.on( 'click', options.item, function () {

				var imgSkuBig = $( this ).children( 'img' ).data( 'img' );

				if ( isURL( imgSkuBig ) ) {

					if ( imgSkuBig.indexOf( '_50x50.jpg' ) > 0 ) {
						imgSkuBig = imgSkuBig.replace( '_50x50.jpg', '' );
					}

					var activeIndex = false;
					jQuery.each( productSlider.data, function ( i, e ) {
						if ( e.img == imgSkuBig ) activeIndex = i;
					} );

					if ( !activeIndex ) {
						activeIndex = productSlider.push( { img : imgSkuBig, thumb : imgSkuBig } ).size;
						activeIndex--;
					}

					productSlider.show( {
						index : activeIndex, // The second frame.
						time  : 0 // Half-second transition.
					} );


				}
			} );
		};

		return this.each( setSKU );
	};

	$( 'form.cart-form' ).sku();

	/**
	 * Buy Now
	 */
	$( '#buyNow' ).on( 'click', function ( e ) {

		var error = getSku( $( this ).parents( 'form' ) );

		if ( error === false )
			e.preventDefault();
	} );

	/**
	 * $this is form sku params
	 *
	 * @param $this
	 * @param sticker
	 * @returns {*}
	 */
	function getSku( $this, sticker ) {

		var options = {
				line      : '.item-sku',
				error     : '.sku-warning',
				variation : '[name="sku-meta-set[]"]'
			},
			error   = false,
			foo     = [];

		$this.find( options.variation ).each( function () {

			if ( $( this ).val().length == 0 && sticker !== false ) {
				error = true;
				$( this ).parent( options.line ).find( 'dt' ).css( 'color', 'red' );
				$( this ).parent( options.line ).find( options.error ).css( 'display', 'block' );

				var text = $( this ).parent( options.line ).find( '.sku-warning' ).text();

				$.stickr( {
					note      : text,
					className : 'sticks',
					time      : 2000,
					speed     : 2000,
					position  : { top : 10, right : 10 }
				} );
			}
			else
				foo.push( $( this ).val() );
		} );

		if ( error ) return false;

		return { foo : foo }
	}

	/**
	 * Add product to cart
	 */
	$( '.js-addToCart' ).on( 'click', function ( e ) {
		e.preventDefault();
		addOrder( $( this ).parents( 'form' ) );

	} );

	function addOrder( $this ) {

		var options = {
			item     : '[name="quantity"]',
			post_id  : '[name="post_id"]',
			shipping : '[name="shipping"]'
		};

		var $sku = getSku( $this );

		if ( $sku === false ) return false;
		adsCart.add( {
			post_id   : $( options.post_id ).val(),
			quantity  : $( options.item ).val(),
			shipping  : $( options.shipping ).val(),
			variation : $sku.foo,
			title     : $sku.too
		} );

	}

} );

/*****/
(function ( $ ) {
	'use strict';

	$( function () {

		if ( $.fn.SocialShare ) {
			$( '[data-social]' ).SocialShare( {
				success : function () {
					$( '#social-alert' ).css( 'display', 'block' );
					//console.log('SocialShare Thank you for your share we are love you ^_^');
				},
				fail    : function () {
					$( '#social-alert' ).css( 'display', 'none' );
					//console.log('SocialShare Mya we are so sad');
				}
			} );
		}


	} );
}( jQuery ));