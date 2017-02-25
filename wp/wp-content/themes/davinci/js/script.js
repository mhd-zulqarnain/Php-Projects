!function ( e ) {
	e( [ "jquery" ], function ( e ) {
		return function () {
			function t( e, t, n ) {
				return f( {
					type            : O.error,
					iconClass       : g().iconClasses.error,
					message         : e,
					optionsOverride : n,
					title           : t
				} )
			}

			function n( t, n ) {
				return t || (t = g()), v = e( "#" + t.containerId ), v.length ? v : (n && (v = c( t )), v)
			}

			function i( e, t, n ) {
				return f( {
					type            : O.info,
					iconClass       : g().iconClasses.info,
					message         : e,
					optionsOverride : n,
					title           : t
				} )
			}

			function o( e ) {
				w = e
			}

			function s( e, t, n ) {
				return f( {
					type            : O.success,
					iconClass       : g().iconClasses.success,
					message         : e,
					optionsOverride : n,
					title           : t
				} )
			}

			function a( e, t, n ) {
				return f( {
					type            : O.warning,
					iconClass       : g().iconClasses.warning,
					message         : e,
					optionsOverride : n,
					title           : t
				} )
			}

			function r( e ) {
				var t = g();
				v || n( t ), l( e, t ) || u( t )
			}

			function d( t ) {
				var i = g();
				return v || n( i ), t && 0 === e( ":focus", t ).length ? void h( t ) : void(v.children().length && v.remove())
			}

			function u( t ) {
				for ( var n = v.children(), i = n.length - 1; i >= 0; i-- )l( e( n[ i ] ), t )
			}

			function l( t, n ) {
				return t && 0 === e( ":focus", t ).length ? (t[ n.hideMethod ]( {
					duration : n.hideDuration,
					easing   : n.hideEasing,
					complete : function () {
						h( t )
					}
				} ), !0) : !1
			}

			function c( t ) {
				return v = e( "<div/>" ).attr( "id", t.containerId ).addClass( t.positionClass ).attr( "aria-live", "polite" ).attr( "role", "alert" ), v.appendTo( e( t.target ) ), v
			}

			function p() {
				return {
					tapToDismiss      : !0,
					toastClass        : "toast",
					containerId       : "toast-container",
					debug             : !1,
					showMethod        : "fadeIn",
					showDuration      : 300,
					showEasing        : "swing",
					onShown           : void 0,
					hideMethod        : "fadeOut",
					hideDuration      : 1e3,
					hideEasing        : "swing",
					onHidden          : void 0,
					extendedTimeOut   : 1e3,
					iconClasses       : {
						error   : "toast-error",
						info    : "toast-info",
						success : "toast-success",
						warning : "toast-warning"
					},
					iconClass         : "toast-info",
					positionClass     : "toast-top-right",
					timeOut           : 5e3,
					titleClass        : "toast-title",
					messageClass      : "toast-message",
					target            : "body",
					closeHtml         : '<button type="button">&times;</button>',
					newestOnTop       : !0,
					preventDuplicates : !1,
					progressBar       : !1
				}
			}

			function m( e ) {
				w && w( e )
			}

			function f( t ) {
				function i( t ) {
					return !e( ":focus", l ).length || t ? (clearTimeout( O.intervalId ), l[ r.hideMethod ]( {
						duration : r.hideDuration,
						easing   : r.hideEasing,
						complete : function () {
							h( l ), r.onHidden && "hidden" !== b.state && r.onHidden(), b.state = "hidden", b.endTime = new Date, m( b )
						}
					} )) : void 0
				}

				function o() {
					(r.timeOut > 0 || r.extendedTimeOut > 0) && (u = setTimeout( i, r.extendedTimeOut ), O.maxHideTime = parseFloat( r.extendedTimeOut ), O.hideEta = (new Date).getTime() + O.maxHideTime)
				}

				function s() {
					clearTimeout( u ), O.hideEta = 0, l.stop( !0, !0 )[ r.showMethod ]( {
						duration : r.showDuration,
						easing   : r.showEasing
					} )
				}

				function a() {
					var e = (O.hideEta - (new Date).getTime()) / O.maxHideTime * 100;
					f.width( e + "%" )
				}

				var r = g(), d = t.iconClass || r.iconClass;
				if ( "undefined" != typeof t.optionsOverride && (r = e.extend( r, t.optionsOverride ), d = t.optionsOverride.iconClass || d), r.preventDuplicates ) {
					if ( t.message === C )return;
					C = t.message
				}
				T++, v = n( r, !0 );
				var u = null, l = e( "<div/>" ), c = e( "<div/>" ), p = e( "<div/>" ), f = e( "<div/>" ), w = e( r.closeHtml ), O = {
					intervalId  : null,
					hideEta     : null,
					maxHideTime : null
				}, b  = { toastId : T, state : "visible", startTime : new Date, options : r, map : t };
				return t.iconClass && l.addClass( r.toastClass ).addClass( d ), t.title && (c.append( t.title ).addClass( r.titleClass ), l.append( c )), t.message && (p.append( t.message ).addClass( r.messageClass ), l.append( p )), r.closeButton && (w.addClass( "toast-close-button" ).attr( "role", "button" ), l.prepend( w )), r.progressBar && (f.addClass( "toast-progress" ), l.prepend( f )), l.hide(), r.newestOnTop ? v.prepend( l ) : v.append( l ), l[ r.showMethod ]( {
					duration : r.showDuration,
					easing   : r.showEasing,
					complete : r.onShown
				} ), r.timeOut > 0 && (u = setTimeout( i, r.timeOut ), O.maxHideTime = parseFloat( r.timeOut ), O.hideEta = (new Date).getTime() + O.maxHideTime, r.progressBar && (O.intervalId = setInterval( a, 10 ))), l.hover( s, o ), !r.onclick && r.tapToDismiss && l.click( i ), r.closeButton && w && w.click( function ( e ) {
					e.stopPropagation ? e.stopPropagation() : void 0 !== e.cancelBubble && e.cancelBubble !== !0 && (e.cancelBubble = !0), i( !0 )
				} ), r.onclick && l.click( function () {
					r.onclick(), i()
				} ), m( b ), r.debug && console && console.log( b ), l
			}

			function g() {
				return e.extend( {}, p(), b.options )
			}

			function h( e ) {
				v || (v = n()), e.is( ":visible" ) || (e.remove(), e = null, 0 === v.children().length && (v.remove(), C = void 0))
			}

			var v, w, C, T = 0, O = {
				error   : "error",
				info    : "info",
				success : "success",
				warning : "warning"
			}, b           = {
				clear        : r,
				remove       : d,
				error        : t,
				getContainer : n,
				info         : i,
				options      : {},
				subscribe    : o,
				success      : s,
				version      : "2.1.0",
				warning      : a
			};
			return b
		}()
	} )
}( "function" == typeof define && define.amd ? define : function ( e, t ) {
	"undefined" != typeof module && module.exports ? module.exports = t( require( "jquery" ) ) : window.toastr = t( window.jQuery )
} );

jQuery( function ( $ ) {
	window.ga = window.ga || function () {

		};
	$( '.js-more' ).on( 'click', function () {
		$( this ).parent().hide().closest( '.b-content' ).css( {
			height : 'auto'
		} );
	} );

	$( '.js-dropdown' ).on( 'click', function () {
		var box_dropdown = $( this ).data( 'dropdown' );
		if ( box_dropdown ) {
			$( this ).closest( box_dropdown ).toggleClass( 'open' );
			return false;
		} else {
			$( this ).parent().toggleClass( 'open' );
		}

	} );

	$( 'html' ).click( function ( e ) {
		if ( $( e.target ).closest( '.header_search' ).length ) {
			e.stopPropagation();
		}
		else {
			$( '.header_search' ).removeClass( 'open' );
		}
	} );

	//TODO
	isMobile    = $( 'html' ).hasClass( 'mobile' );
	var $window = $( window ),
		dbtn    = $( '.header a.tbtn' ),
		nav     = $( '.menu-dropdown' ),
		subnav  = nav.find( '.subcat-item' ),
		clock   = $( '#clock' );

	if ( !isMobile ) {
		$window.load( function () {
			var h = nav.height() + 0.5;
			subnav.each( function () {
				$( this ).css( { 'min-height' : h } );
			} );
		} );
	}


	$( 'select#sortby' ).on( 'change', function () {

		var path = location.protocol + '//' + location.host + location.pathname,
			par  = $( this ).val();

		window.location.href = path + '?orderby=' + par;
	} );

	$( document ).on('click', function ( e ) {

		if ( $( e.target ).closest( '.menu-dropdown' ).length ) {
			e.stopPropagation();
		}
		else {
			if ( nav.hasClass( 'open' ) ) {
				$( '.bg' ).removeClass( 'open' );
				nav.removeClass( 'open' );
			}

		}
	} );

	$( '.bg' ).on('click', function ( e ) {

		$( '.bg' ).removeClass( 'open' );
		nav.removeClass( 'open' );
	} );

	dbtn.on( 'click', function ( e ) {
		e.preventDefault();

		nav.toggleClass( 'open' );
		$( '.bg' ).toggleClass( 'open' );
		e.stopPropagation();
	} );

	function isURL( str ) {

		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
		return regexp.test( str );
	}

	if ( clock.length != 0 && clock.data( 'time' ).length != 0 ) {

		var timeend  = clock.data( 'time' );
		var template = $( "#clock-template" ).html();
		clock.countdown( timeend ).on( 'update.countdown', function ( event ) {
			var $this = $( this ).html( event.strftime( template ) );
		} );
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

	window.CartHeader = (function () {
		var $this, $body = $( 'body' );
		return {
			$cart_info       : '',
			init             : function () {
				$this            = this;
				$this.$cart_info = $( '.js-cart-info' );

				$body.on( 'cart:update cart:change', function ( e ) {
					$this.render( e.cart );
				} );

				$body.on( 'cart:add', function ( e ) {
					$this.render( e.cart );
				} );
			},
			render           : function ( obj ) {
				$this.updateTotalItems( obj );
				$('.js-total_quantity_value').text( obj.quantity );
			},
			updateTotalItems : function ( obj ) {
				$( '.js-cart-info' ).find( 'a' ).text( obj.quantity + ' ' + obj.pluralize_text );
			}
		};

	})();

	$( CartHeader.init() );

	var notifi_add_cart_mobi = (function () {
		var $this, $body = $( 'body' );
		var _timeout     = null;
		return {
			$el      : '',
			template : '',
			init     : function () {
				$this          = this;
				$this.template = $( '#notif_add_cart_template' ).html();
				$this.el       = '.notif-add-cart';
				$this.$el      = $( '.notif-add-cart' );

				$( 'html' ).click( function ( e ) {
					if ( !$( e.target ).closest( $this.el ).length ) {
						$this.hide();
					}
				} );

				$body.on( 'cart:add', function ( e ) {
					$this.render( e.cart );
					$this.show();
					clearTimeout( _timeout );
					_timeout = setTimeout( function () {
						$this.hide( 400 );
					}, 3000 );
				} );

			},
			render   : function ( obj ) {

				var template = $this.template;
				obj.items    = [ obj.items[ obj.items.length - 1 ] ];
				if ( template )
					$this.$el.html( templateToData( template, obj.items ) );

			},
			show     : function () {
				$this.$el.show( 100 );
			},
			hide     : function () {
				$this.$el.hide( 200 );
			}
		};

	})();

	if ( isMobile ) {
		$( notifi_add_cart_mobi.init() );
	}

	var pageCart = (function () {
		var $this, $grand_total, $body = $( 'body' );
		var fields                     = [
			{
				name : 'Subtotal',
				el   : '.js-page-total_price',
				data : 'cur_price'
			},
			{
				name : 'Total savings',
				el   : '.js-page-total_save',
				data : 'cur_save'
			},
			{
				name : 'Total price:',
				el   : '.js-cur_salePrice',
				data : 'cur_salePrice'
			},
			{
				name : 'Subtotal',
				el   : '.js-page-total_count',
				data : 'quantity'
			},
			{
				name : 'item/items',
				el   : '.js-page-total_count_items',
				data : 'text_count_items'
			},
			{
				name : 'shipping',
				el   : '.js-total_shipping',
				data : 'cur_shipping_total'
			}

		];
		return {
			init            : function () {

				if ( !$( '.page-checkout' ).length ) {
					return;
				}

				$this        = this;
				$this.$el    = $( '.page-checkout' );
				$grand_total = $( '.js-page_cart_grand_total' );

				$this.notify();

				$( 'body' ).on( 'cart:change cart:update', function ( e ) {
					$this.renderFields( $this.filterFields( e ) );
				} );

				$( 'body' ).on( 'keyup', '[name="phone_number"]', function ( e ) {
					var ignore = [ 37, 39, 8, 46, 32 ];

					if ( ignore.indexOf( e.keyCode ) !== -1 )
						return;
					var val = $( this ).val();
					$( this ).val( val.replace( /\D+/g, "" ) );
				} );


			},
			renderFields    : function ( e ) {
				var obj = e.cart;

				fields.forEach( function ( field ) {
					$this.$el.find( field.el ).text( obj[ field.data ] );
				} );
			},
			filterFields    : function ( e ) {
				e.cart[ 'cur_price' ] = $this.filterCur_price( e.cart );
				e.cart[ 'cur_save' ]  = $this.filterCur_save( e.cart );

				return e;
			},
			filterCur_price : function ( cart ) {
				var cur_price = cart.cur_price;
				var re        = /0\.00/;
				$( '.js-page-total_save-item' ).show();
				if ( re.test( cart.cur_price ) ) {
					$( '.js-page-total_save-item' ).hide();
					cur_price = '';
				}

				return cur_price;
			},
			filterCur_save  : function ( cart ) {
				var cur_save = cart.cur_save;
				var re       = /0\.00/;
				$( '.js-page-total_price-item' ).show();
				if ( re.test( cart.cur_save ) ) {
					$( '.js-page-total_price-item' ).hide();
					cur_save = '';
				}
				return cur_save;
			},
			notify          : function () {
				var alert = $( document ).find( '#ads-notify' );

				if ( alert.length && alert.html() ) {
					toastr.options = {
						"closeButton"       : true,
						"debug"             : false,
						"newestOnTop"       : false,
						"progressBar"       : false,
						"positionClass"     : "toast-top-full-width",
						"preventDuplicates" : false,
						"showDuration"      : "300",
						"hideDuration"      : "3000",
						"timeOut"           : "5000",
						"extendedTimeOut"   : "1000",
						"showEasing"        : "swing",
						"hideEasing"        : "linear",
						"showMethod"        : "fadeIn",
						"hideMethod"        : "fadeOut"
					};

					toastr.info( alert.html() );
				}
			}

		}

	})();

	pageCart.init();

	var payments = (function () {
		var $this;
		return {
			init      : function () {
				$this = this;
				$( '.payments-list .box-radio' ).on( 'click', function () {
					var payments = $( 'input[type="radio"]', this ).prop( 'checked', true ).val();
					$this.activeTab( payments );
				} );

				var payments = $( 'input[type="radio"]:checked', '.payments-list .box-radio' ).val();
				$this.activeTab( payments );
			},
			activeTab : function ( payments ) {
				if ( $( '.payments-field.' + payments + ':hidden' ).length ) {
					$( '.payments-field' ).hide( 200 );
					$( '.payments-field.' + payments ).show( 300 );
				}
			}
		}
	})();

	payments.init();

	/**
	 * Cart
	 */
	var pageOrders = (function () {
		var $this;
		var _timeout = null;
		var fields   = [
			{
				name : 'Price',
				el   : '.js-total_salePrice',
				data : 'total_salePrice'
			},
			{
				name : 'Amount price',
				el   : '.js-total_price',
				data : 'total_price'
			}
		];
		var $body    = $( 'body' );

		function showEmptyCart() {
			$( '#basket-content' ).html( '' );
			$( '.empty_cart' ).show();
		}


		function order_list() {
			if ( $( '.page-checkout .head-list' ).is( ':visible' ) ) {
				$( '[data-open="head-list"]' ).hide();
			}
		}

		return {
			init : function () {
				$this = this;

				$( 'body' ).on( 'click', '.page-checkout .head-list', function () {
					var i = $( this );
					if ( !i.hasClass( 'open' ) ) {
						i.addClass( 'open' );
						$( '.text', this ).text( 'Hide order summary' );
						$( '[data-open="head-list"]' ).show();
					} else {
						i.removeClass( 'open' );

						$( '.text', this ).text( 'Show order summary' );
						$( '[data-open="head-list"]' ).hide();
					}

				} );

				order_list();
				$( window ).resize( function ( e ) {
					var windowsize = $window.width();
					if ( windowsize > 768 ) {
						$( '[data-open="head-list"]' ).show();
					}
				} );

				$this.el  = '.js-page-cart-list';
				$this.$el = $( $this.el );
				if ( !$this.$el.length ) {
					return;
				}

				$this.templateCartItem   = $( '#page_cart_item_template' ).html();
				$this.templateDetails    = $( '#page_cart_details_template' ).html();
				$this.templateDetailsImg = $( '#page_cart_details_img_template' ).html();


				$( 'body' ).on( 'cart:update cart:shipping', function ( e ) {

					if ( e.cart.items.length == 0 ) {
						showEmptyCart();
					} else {
						$this.render( $this.format( e.cart ) );
					}

				} );

				$( 'body' ).on( 'cart:change', function ( e ) {
					$this.renderFields( e );
				} );

				$( 'body' ).on( 'click', '.js-remove-item', function ( e ) {
					e.preventDefault();
					var order_id = $( this ).closest( '.cart-item' ).hide( 500 ).data( 'key' );
					adsCart.remove( order_id );
				} );

				$( 'body' ).on( 'keyup mouseup', $this.el + ' input[name="quantity"]', function () {
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

				$( 'body' ).on( 'change', $this.el + ' .js-item-shipping', function () {
					var shipping = $( this ).find( 'option:selected' ).val();
					var order_id = $( this ).closest( '.cart-item' ).data( 'key' );
					adsCart.newShipping( order_id, shipping );
				} );
			},

			renderFields      : function ( e ) {
				var obj      = $this.format( e.cart ),
					order_id = e.order_id,
					i,
					dataItem;

				var $item = $( $this.$el.find( '[data-key="' + order_id + '"]' ) );

				for ( i in obj.items ) {
					if ( obj.items[ i ][ 'order_id' ] == order_id ) {
						dataItem = obj.items[ i ];
					}
				}

				fields.forEach( function ( field ) {
					$item.find( field.el ).text( dataItem[ field.data ] );
				} );
			},
			render            : function ( obj ) {
				var template = $this.templateCartItem;
				$this.$el.html( templateToData( template, obj.items ) );
			},
			format            : function ( obj ) {

				if ( obj.items ) {
					obj.items.forEach( function ( item ) {
						item.details     = $this.formatDetails( item.details );
						item.shipping    = $this.formatShipping( item );
						item.total_price = $this.formatTotal_price( item );
					} );
				}

				return obj;
			},
			formatTotal_price : function ( item ) {

				var total_price = item.total_price;
				var re          = /0\.00/;
				if ( re.test( item.total_price ) )
					total_price = '';
				return total_price;
			},
			formatShipping    : function ( item ) {
				var availableShipping = item.availableShipping;
				var shipping_method   = item.shipping_method;
				var shipping          = '';

				if ( 0 == availableShipping.length )
					return davLang.free;

				shipping += '<select class="js-item-shipping" name="no-shipping">';
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

				var data = [];
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

			}
			,
			formatDetailsImg  : function ( url ) {
				var template = $this.templateDetailsImg;
				return templateToData( template, [ { url : url } ] );
			}
		}
	})
	();

	pageOrders.init();

	var field = (function () {
		var $this;
		var obj = {
			'field' : '.field'
		};


		return {
			init : function () {
				$this = this;
//TODO
				setInterval( function () {
					$( 'input', obj.field ).each( function () {
						if ( $( this ).val() != '' ) {
							$( this ).addClass( 'js-not_empty_field' );
						} else {
							$( this ).removeClass( 'js-not_empty_field' );
						}
					} );
				}, 100 );

				$( '.page-checkout textarea' ).keyup( function () {
					$( this ).height( 40 );
					$( this ).height( this.scrollHeight );
				} );
			}
		}
	})();

	field.init();


	function adsJSON( data ) {

		try {
			var response = $.parseJSON( data );
		}
		catch ( e ) {
			console.log( e );
			return false;
		}

		return response;
	}
} );

/**
 * quantity item btn
 */
jQuery( function ( $ ) {
	var options = {
		el     : '.select_quantity, .js-s_q',
		add    : '.js-quantity_add',
		remove : '.js-quantity_remove',
		input  : 'input'
	};

	var $body = $( 'body' );
	$body.on( 'click', options.add, function ( e ) {
		e.preventDefault();
		set( 1, this )
	} );

	$body.on( 'click', options.remove, function ( e ) {
		e.preventDefault();
		set( -1, this )
	} );

	function set( change, $this ) {
		var $input = $( $this ).closest( options.el ).find( options.input );
		var v      = $input.val();
		v          = (v = parseInt( v ) + change) > 0 ? v : 1;
		$input.val( v )
			.trigger( 'mouseup' );

	}
} );



/**
 * menu scroll fixed
 */
(function ( $ ) {
	var $memu = $( '.header.fix_menu' );

	if ( $memu.length ) {
		var topPos = $memu.offset().top;
		$( window ).scroll( function () {
			var top         = $( document ).scrollTop();
			var height_menu = $memu.height();

			if ( top > topPos && $( window ).width() >= '1024' ) {
				$( '.menu-dropdown' ).addClass( 'js-hide' ).removeClass( 'open' );
				$memu.addClass( 'fixed' );
				$( 'body' ).css( 'padding-top', height_menu );
			}
			else {
				$( '.menu-dropdown' ).removeClass( 'js-hide' );
				$memu.removeClass( 'fixed' );
				$( 'body' ).css( 'padding-top', 0 );
			}
		} );
	}
})( jQuery );

/**
 * scroller top page
 */
(function ( $ ) {
    var upArrow = {
        option : {
            block : "scroller"
        },
        init   : function ( config ) {
            if ( config && typeof (config) == 'object' ) {
                $.extend( upArrow.config, config );
            }
            upArrow.block = upArrow.option.block;
            $( 'body' ).append( '<div id="' + upArrow.block + '" class="b-top" style="display: none;"><span class="b-top-but"></span></div>' );
            upArrow.$block = $( '#' + upArrow.block );
            $( window ).scroll( function () {
                if ( $( this ).scrollTop() > 0 ) {
                        upArrow.$block.fadeIn();
                } else {
                        upArrow.$block.fadeOut();
                }
            } );
            upArrow.$block.click( function () {
                $( 'body,html' ).animate( {
                        scrollTop : 0
                }, 400 );
                return false;
            } );
        }
    };
    $( upArrow.init() );

})( jQuery );

/**
 * subscribe
 */
(function ( $ ) {
    'use strict';

    $( '.subscribe-form' ).on( 'submit', function () {
        $( this ).css( { "cursor" : "wait" } );
        $( '[type="submit"]', this ).addClass( 'disabled' );
    } );
})( jQuery );

(function ( $ ) {

	$( '.js-b-coupon' ).on( 'click', function ( e, i ) {
            e.preventDefault();
            $( this ).hide();
            $( '.b-coupon' ).show( 100 );
	} )


	var card = (function () {
            var $this;
            var obj    = {
                    card : '.card'
            };
            var single = [];

            var createField = function ( name ) {
                var field     = $( name );
                this.required = field.is( '[required="required"]:not("select"):visible' );
                this.pattern  = field.attr( 'pattern' );
            };

            createField.prototype.pattern  = /^[A-z0-9-_+. ,@]{1,}$/ig;
            createField.prototype.valid    = false;
            createField.prototype.required = true;
            createField.prototype.nullify  = function () {
                this.valid = false;
            };

            return {
                init : function () {
                    $this                 = this;
                    single[ 'exp_month' ] = new createField( 'exp_month' );

                    $( '[name="exp_month"]' ).on( 'keyup blur change', function ( e ) {
                            var value = $( this ).val();
                            value     = value.replace( '/\D/', '' );
                            value     = value.substr( 0, 2 );
                            value     = value > 12 ? 12 : value;
                            $( this ).val( value );
                            if ( $( this ).val().length >= 2 )
                                    $( '[name="exp_year"]' ).focus();

                    } );

                    $( '[name="exp_year"]' ).on( 'keyup blur change', function ( e ) {
                        console.log( e );

                        var value = $( this ).val();
                        value     = value.replace( '/\D/', '' );
                        value     = value.substr( 0, 2 );
                        value     = value > 99 ? 99 : value;
                        $( this ).val( value );
                        if ( $( this ).val().length >= 2 )
                                $( '[name="cvv"]' ).focus();


                        if ( e.keyCode == 8 && value == '' ) {
                                var b = $( this ).data( 'b' );
                                b++;
                                $( this ).data( 'b', b );
                        } else {
                                $( this ).data( 'b', 0 );
                        }
                        if ( $( this ).data( 'b' ) > 1 ) {
                                $( this ).data( 'b', 0 );
                                $( '[name="exp_month"]' ).focus();
                        }
                    } );

                    $( '[name="cvv"]' ).on( 'keyup blur change', function ( e ) {
                        var value = $( this ).val();
                        value     = value.replace( '/\D/', '' );
                        value     = value.substr( 0, 3 );
                        value     = value > 999 ? 999 : value;
                        $( this ).val( value );

                        if ( e.keyCode == 8 && value == '' ) {
                                var b = $( this ).data( 'b' );
                                b++;
                                $( this ).data( 'b', b );
                        } else {
                                $( this ).data( 'b', 0 );
                        }
                        if ( $( this ).data( 'b' ) > 1 ) {
                                $( this ).data( 'b', 0 );
                                $( '[name="exp_year"]' ).focus();
                        }
                    } );
                }
            }
	})();

	card.init();

	$( 'body' ).on( 'click', '[href="#box-review"]', function () {
            $( '[href="#details"]' ).click();
            if ($('#box-review').length > 0) {
                var top = $( '#box-review' ).offset().top - 100;
                $( 'body,html' ).stop().animate( {
                    scrollTop : top
                }, 0 );
            }
            return false;
	} );



	$(document).mouseup(function (e) {
            var container = $('.mobile-search');
            if (container.has(e.target).length === 0){
                if (!$(e.target).hasClass( "b-sth" )){
                    $('.mobile-search').hide();
                }
            }
	});

	jQuery('.b-sth').on('click', function(){
            if (jQuery('.mobile-search').is(":visible") == false){
                jQuery('.mobile-search').show(200);
                return false;
            }
	});

	jQuery('.mobile-search').on('click','.close', function(){
            jQuery('.mobile-search').hide();
            jQuery('.mobile-search input').val('');
	});

	var autoLoadProductScroll = (function() {
            var $this;
            var url = '';
            var inProgress = false;

            return {
                init: function(){
                    $this = this;
                    url = $('.next.page-numbers').attr('href');
                    $(window).scroll(function() {
                        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 800 && !inProgress) {
                            if (url){
                                $this.load();
                            }
                        }
                    });

                    $('.loadPloduct').on('click', function (  ) {
                        if (url) {
                            $this.load();
                        }
                    });

                    $('.pagination').hide();
                    $('.wrap-loadProduct').show();
                },
                load: function() {
                    inProgress = true;
                    $.ajax({
                        url     : url,
                        success : function ( data ) {
                            var body = $('<div/>').html(data).contents();
                            url = body.find('.next.page-numbers').attr('href');
                            if (!url) {
                                $('.wrap-loadProduct').hide();
                            }
                            $('.list_product').append(body.find('.list_product').html());
                            $('.pagination').html(body.find('.pagination').html());

                            inProgress = false;
                        }
                    });
                }
            }
	})();

	if($(window).width() < 768 && ($('body').hasClass('tax-product_cat') || $('body').hasClass('post-type-archive-product'))){
            autoLoadProductScroll.init();
	}

	var selectRegion = (function () {
            var $this;
            var state = {
                country    : '',
                regionList : false
            };

            function setRegion() {
                state.regionList = false;
                $.ajax( {
                    url      : alidAjax.ajaxurl,
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    data     : {
                        action  : "ads_rg_list",
                        country : state.country
                    },
                    success  : function ( data ) {
                        /*console.log(data );*/
                        state.regionList = !$.isArray(data) ? data : false;
                        render();
                    }
                } );
            }

            function renderInputRegion() {
                var stateText = $('#js-stateText');
                var dataState = stateText.data('state-value');
                stateText.show().attr('name','state');
                $( '#js-stateSelect' ).hide().attr('name','');
                stateText.val(dataState);
                stateText.attr('data-state-value', '');
            }

            function renderSelectRegion() {
                var select = $( '#js-stateSelect' );
                var stateText = $('#js-stateText');
                var dataState = stateText.attr('data-state-value');

                $( '#js-stateText' ).hide().attr('name','');
                $( '#js-stateText' ).closest('div').removeClass('js-valid js-invalid js-invalid_empty');
                $( '#js-stateText + span' ).hide();

                var option = '';

                for ( var key in state.regionList ) {
                    option += '<option value="' + key + '">' + state.regionList[ key ] + '</option>';
                }

                select.attr('name', 'state').html(option).show();

                if ($('#js-stateText').attr('data-state-value').length > 0) {
                    $('#js-stateSelect option:contains("' + $('#js-stateText').attr('data-state-value') + '")').prop('selected', 'selected');
                }

                stateText.val(dataState);
                stateText.attr('data-state-value', '');
            }

            function render() {
                if ( state.regionList ) {
                    renderSelectRegion();
                } else {
                    renderInputRegion();
                }
            }

            function setData() {
                state.country = $( '[name="country"] option:selected' ).val();
                setRegion();
            }

            return {
                init: function() {
                    this.register();
                    setData();
                    $('[name="country"]').on('change', function () {
                        $('[name="state"]').data('state-value', '');
                        setData();
                    });
                },
                register: function() {
                    var registerBox = $('input[name=register]');
                    var passBlock = $('#password-block');
                    var passwordFields = $('.password_fields');
                    var country = $('select[name="country"]');

                    if (registerBox.length == 0) {
                        if (typeof country.attr('data-country-value') != 'undefined') {
                            $('select[name="country"] option[value="' + country.attr('data-country-value') + '"]').prop('selected', 'selected');
                        }
                    }

                    registerBox.change(function() {
                        if (this.checked) {
                            $.each(passwordFields, function(index, value) {
                                $(value).prop('required', 'required');
                            });
                            passBlock.fadeIn('slow');
                        } else {
                            $.each(passwordFields, function(index, value) {
                                $(value).removeProp('required');
                            });
                            passBlock.fadeOut('slow');
                        }
                    });
                }
            }
	})();

	selectRegion.init();

	var readonly_checkbox = (function (  ) {
            return {
                init: function(){
                    var box = $('.readonly_checkbox');
                    if(box.length == 0) {
                        return;
                    }

                    $('[name="ads_checkout"]').attr('disabled', true);
                    $('#readonly_checkbox').on('change', function (e) {
                        var check = $('#readonly_checkbox').is(':checked');
                        console.log( check );
                        $('[name="ads_checkout"]').attr('disabled', !check);
                    });
                }
            }
	})();
	readonly_checkbox.init();

	$('body').on('click', '.dropdown-toggle', function(){
            if( $(this).data('toggle') == 'dropdown' ) {
                var p = $(this).parent();

                setTimeout( function(){
                    if( p.hasClass('dropdown') && ! p.hasClass('open') ){
                        p.addClass('open');
                    }
                }, 200);
            }
	});

})( jQuery );

if(jQuery('body.cart').length){
    webshims.polyfill( 'forms' );
}