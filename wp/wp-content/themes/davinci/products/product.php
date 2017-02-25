<?php
/**
 * Author: Vitaly Kukin
 * Date: 04.06.2015
 * Time: 14:06
 */

global $post, $img_size;

$info = new adsProductTM( array(
	'attributes' => true,
	'alimeta'    => true
) );
$info->setData( $post );

$product = $info->singleProductMin();

$img_size = ! empty( $img_size ) ? $img_size : 'ads-medium';

$thumb = $info->getImageUrl( $img_size );
if( $thumb )
	$thumb = sprintf( '<div class="thumb">
			<div class="thumb-box"><div class="thumb-wrap">
				<img src="%1$s?1000"></div></div></div>', $thumb );

?>
<div class="product-item" data-post_id="<?php echo intval($post->ID); ?>" data-currency="<?php echo $product[ 'currency' ]; ?>" data-price="<?php echo $product[ '_price_nc' ]; ?>" data-saleprice="<?php echo $product[ '_salePrice_nc' ]; ?>">
	<span itemscope itemtype="http://schema.org/Product">
<a href="<?php the_permalink() ?>" itemprop="url">

	<?php echo $thumb ?>
	<h4 itemprop="name"><?php the_title() ?></h4>
	<?php if ( $product[ 'discount' ] && cz('tp_show_discount')) {
		printf( '<div class="discount"><span><b>%1$s&percnt;</b> '.__('off', 'ami3').'</span></div>',
			$product[ 'discount' ]
		);
	} ?>
	<meta itemtype="http://schema.org/AggregateRating/ratingValue" content="<?php echo $product['rate']; ?>"/>
	<meta itemtype="http://schema.org/AggregateRating/reviewCount" content="5.0"/>
	<?php
	$promotionVolume = (cz('tp_show_quantity_orders') && $product['promotionVolume']) ? $product['promotionVolume']: false;
	echo $info->starRating( $promotionVolume );

	?>
	<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?php echo $product[ '_price_nc' ]; ?>">
			<meta itemprop="priceCurrency" content="<?php echo $product[ 'currency' ]; ?>"/>
		<?php if ( $product[ '_price' ] > 0 && $product[ '_price' ] !== $product[ '_salePrice' ]): ?>
			<small class="old js-price" ></small><br />
		<?php endif; ?>
		<span class="sale js-salePrice"></span>
	</div>
</a>
</span>
</div>
