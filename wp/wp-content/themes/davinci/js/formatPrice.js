(function ( $ ){
window.formatPrice = {};

window.formatPrice = (function(){
	var ADSCacheCurrency,
		ADScurrentCurrency,
		isInit = false;

	function tryJSON(data) {
		try {
			var response = $.parseJSON( data );
		}
		catch (e) {
			console.log(data);
			return false;
		}

		return response;
	}

	function searchNearest( value, inArray ) {
		var lastKey = false,
			lastDif = false;

		for(var k in inArray){

			var v = inArray[k];

			if ( v == value ) {
				return k;
			}

			var dif = Math.abs( value - v );
			if ( !lastKey || dif < lastDif ) {
				lastKey = k;
				lastDif = dif;
			}

		}

		return lastKey;
	}

	function ads_price_convert_current( price, priceCurrency ) {

		price = parseFloat( price );

		var currencyList = ADSCacheCurrency.ADS_CUVALUE,
			currencyProduct = currencyList[ priceCurrency ],
			currencyLocalValue = currencyList[ ADScurrentCurrency.ADS_CUR ];

		if ( ADScurrentCurrency.ADS_CUR == priceCurrency ) {
			return price;
		}

		var sub   = (currencyLocalValue > 0 && currencyProduct > 0) ? (currencyLocalValue/currencyProduct ) : 0;

		price = price * sub;

		return price;
	}

	function roundsCentPrice( price ) {

		if( price == 0 ) return price;

		if ( ADScurrentCurrency.ADS_PRICE_ROUNDING == 1 ) {
			price = Math.round( price );
		}

		var assignCents = ADScurrentCurrency.ADS_PRICE_ASSIGNCENTS ? ADScurrentCurrency.ADS_PRICE_ASSIGNCENTS.split( ',') : false;

		price   = parseFloat( price );
		var priceAR = price.toString().split( '.' );

		if (assignCents &&  parseInt( priceAR[ 0 ] ) == 0) {
                    assignCents.splice(assignCents.indexOf('00'), 1);
		}

		if ( assignCents ) {
			var lastPriceKey = searchNearest( priceAR[ 1 ], assignCents );
			priceAR[ 1 ] = assignCents[ lastPriceKey ];
		}

		price = priceAR[ 1 ] ? priceAR[ 0 ] + '.' + priceAR[ 1 ] : priceAR[ 0 ];

		return parseFloat(price);
	}

	function out_current_front( price, cur ) {

		cur = cur || ADScurrentCurrency.ADS_CUR || 'USD';

		var foo = ADSCacheCurrency.list_currency[cur];

		var assignCents = ADScurrentCurrency.ADS_PRICE_ASSIGNCENTS ? true : false;

		if( assignCents || ! ADScurrentCurrency.ADS_PRICE_ROUNDING ){
			price = parseFloat(price).toFixed(2);
		}else{
			price = parseFloat(price).toFixed(0);
		}

		if(typeof Intl == 'object'){
			price = new Intl.NumberFormat('en-IN').format(price);
		}
		return foo[ 'pos' ] == 'before' ? foo[ 'symbol' ] + price : price + foo[ 'symbol' ];
	}

	function convertPriceOut( price, priceCurrency , round ) {
                round = round || true;
		price = ads_price_convert_current(price, priceCurrency);

		if(round){
			price = roundsCentPrice( price );
		}

		price = out_current_front( price );

		return price;
	}

	function convertPrice( price, priceCurrency  ) {

		price = ads_price_convert_current(price, priceCurrency);
		price = roundsCentPrice( price );

		return price;
	}

	function outPrice( price ) {

		price = out_current_front( price );

		return price;
	}

	function getADScurrentCurrency() {
		$.ajax({
			url     : alidAjax.ajaxurl,
			type    : "POST",
			async   : true,
			data    : {
				action      : "ads_get_currency"
			},
			success : function (json) {
				ADScurrentCurrency = tryJSON(json);
				$('body').trigger( {
					type : "infoCurrency:done",
					info : ADScurrentCurrency
				});

				isInit = true;
			}
		});
	}

	return {
		init: function ( ) {
			console.log( 'formatPrice' );
			ADSCacheCurrency = window.ADSCacheCurrency;
			getADScurrentCurrency();

		},
		ADSCacheCurrency: function (  ) {
			return ADSCacheCurrency;
		},
		ADScurrentCurrency: function (  ) {
			return ADScurrentCurrency;
		},
		convertPriceOut: function ( price, priceCurrency, round ) {
                    round = round || true;
			return convertPriceOut( price, priceCurrency, round );
		},
		convertPrice: function ( price, priceCurrency ) {
			return convertPrice( price, priceCurrency );
		},
		outPrice: function ( price) {
			return outPrice( price);
		},
		isInit: function (  ) {
			return isInit;
		}


	}
})();

window.formatPrice.init();

})(jQuery);