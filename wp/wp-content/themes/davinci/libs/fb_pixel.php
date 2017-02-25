<?php
/**
 * Author: Vitaly Kukin
 * Date: 03.10.2016
 * Time: 9:34
 */

function dav_fb_pixel() {

    global $wp;

    if( is_singular('product') ) {

        global $post;

        $ids = array($post->ID);

        if( isset($_SESSION['CART']) ) {

            foreach( $_SESSION['CART'] as $item )
                if( ! in_array( $post->ID, $ids ) )
                    $ids[] = $item['post_id'];
        }

        ?>

        fbq(
            'track',
            'ViewContent',
            {
                content_ids: [<?php echo $post->ID ?>],
                content_name: '<?php echo addslashes($post->post_title) ?>',
                content_type: 'product',
                value: <?php echo $post->salePrice ?>,
                currency: '<?php echo ADS_CUR ?>'
            }
        );

        function loadJQuery(){

            var waitForLoad = function () {
                if (typeof jQuery != "undefined") {
                    jQuery(function($){

                        $('body').on( 'cart:add cart:shipping', function ( e ) {

                            var obj = e.cart,
                                total = obj.cur_salePrice.match(/-?\d+\.\d+/);

                            fbq('track', 'AddToCart', {
                                content_ids: [<?php echo implode(',', $ids) ?>],
                                content_type: 'product',
                                value: total[0],
                                currency: '<?php echo ADS_CUR ?>'
                            });

                        });
                    });
                }
                else {
                    window.setTimeout(waitForLoad, 500);
                }
            };
            window.setTimeout(waitForLoad, 500);
        }

        window.onload = loadJQuery;
        
        <?php
    }

    elseif(
        isset( $wp->query_vars[ "pagename" ] ) &&
        $wp->query_vars[ "pagename" ] == 'thankyou' &&
        isset($_GET['h']) && ! empty($_GET['h'])
    ) {

        $pay = new \Gate\Payment();

        $data = $pay->findOne( $_GET['h'] );

        if( $data && $data->status == 'paid') {
            
            $orders = $pay->get_orders( $data->id );
            
            $ids = array();
            
            if( $orders ) foreach( $orders as $order ){
                $ids[] = $order->productId;
            }
            
            ?>
            fbq(
                'track',
                'Purchase',
                {
                    content_ids: [<?php echo implode(',', $ids) ?>],
                    content_type: 'product',
                    value: <?php echo $data->amount_clean ?>,
                    currency: '<?php echo $data->currency_code ?>'
                }
            );
            <?php
        }
    }
}
add_action('dav_fb_pixel', 'dav_fb_pixel');