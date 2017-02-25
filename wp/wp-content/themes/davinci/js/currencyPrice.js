window.currencyPrice = {};

(function ( $ ){
	window.currencyPrice = (function(){

		function renderPriceListProduct( products ) {
			$.each(products, function ( i, e ) {
				var productItem = $('.product-item[data-post_id="'+e.post_id+'"]');
				productItem.find('.js-price').html( e.price );
				productItem.find('.js-salePrice').html( e.salePrice );
			});
		}

		function getInfoProduct( item ) {

			item.price = formatPrice.convertPriceOut(item.price, item.priceCurrency );
			item.salePrice = formatPrice.convertPriceOut(item.salePrice, item.priceCurrency);

			return item;
		}

		function listProduct(  ) {
			var products = [];
			var $products = $( '.product-item' );

			if ( !$products ) {
				return;
			}

			$products.each(function ( ) {
				var item = {
					post_id : $(this).data('post_id'),
					priceCurrency : $(this).data('currency'),
					price : $(this).data('price'),
					salePrice : $(this).data('saleprice')
				};
				products.push(getInfoProduct( item ));
			});

			renderPriceListProduct( products );
		}

		return {
			init: function ( ) {
				$('body').on('infoCurrency:done', function ( data ) {
					$('[ajax_update="currency"]').html(data.info.html);
				});

				$('body').on('infoCurrency:done', function ( data ) {
						listProduct();
				});
			}
		}
	})();

	window.currencyPrice.init();
})(jQuery);
