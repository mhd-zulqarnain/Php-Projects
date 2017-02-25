<?php
/**
 * Author: Vitaly Kukin
 * Date: 08.06.2015
 * Time: 9:18
 */
?>

<?php get_header() ?>

	<!-- BREADCRUMBS -->
	<div class="breadcrumbs hidden-xs">
		<div class="container">
			<?php dav_breadcrumbs() ?>
		</div>
	</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>

	<?php
	global $review, $product;
	$review = new adsFeedBackTM( $post->ID );

	$info = new adsProductTM( array(
		'attributes' => true,
		'alimeta'    => true
	) );
	$info->setData( $post );

	$product = $info->singleProduct();

	?>
	<!-- SINGLE -->
	<div class="product-content" itemscope itemtype="http://schema.org/Product">
		<div class="container">
			<form id="form_singleProduct" action=""  method="POST" class="cart-form">
				<input type="hidden" name="post_id" value="<?php echo $post->ID ?>">
				<?php echo $info->getHiddenFiends(); ?>
				<div class="row">
					<div class="col-lg-44 col-xs-60 product-content-left">


						<div class="clearfix">
							<div class="wrap-tumb">
								<?php dav_theGalleryFotorama( 'productSlider', $product['gallery'] , get_the_title() ) ?>
							</div>
							<div class="wrap-meta">
								<h1 itemprop="name"><?php the_title() ?></h1>

								<div class="rate">
									<?php if ( $product['rate'] > 0 ):
										echo $info->starRating() ?>
										<strong><?php echo $info->ratingPercentage() ?>%</strong>
										<?php _e( 'of buyers enjoyed this product!', 'ami3' ) ?>
									<?php endif; ?>
									<?php if ( $product[ 'promotionVolume' ] > 0 && cz( 'tp_show_quantity_orders' ) ): ?>
										<span class="color-blue">
	                                        <?php printf(
		                                        _n( '%s order', '%s orders', $product[ 'promotionVolume' ], 'ami3' ),
		                                        $product[ 'promotionVolume' ]
	                                        ); ?>
	                                    </span>
									<?php endif; ?>
								</div>
								<div class="meta" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<div>
										<meta itemprop="price" content="<?php echo $product['_salePrice_nc']; ?>"/>
										<meta itemprop="priceCurrency" content="<?php echo $product[ 'currency' ]; ?>"/>

											<dl data-productPriceBox="price" style="display:none;">
												<dt><?php _e( 'List price', 'ami3' ) ?>:</dt>
												<dd>
													<strike><span data-singleProduct="price"></span></strike>
												</dd>
											</dl>


										<dl data-productPriceBox="salePrice" style="display:none;">
											<dt>
												<?php _e( 'Price', 'ami3' ); ?>:
											</dt>
											<dd>
											<span class="price color-orange color-custom" data-singleProduct="savePrice"></span>
												<?php if ( cz( 'tp_shipping_details' ) && isOneFreeShipping() ): ?>
													<span class="price_shipping">& <b><?php _e( 'FREE Shipping', 'ami3' ); ?></b></span>
												<?php endif ?>
											</dd>
										</dl>
										<dl data-productPriceBox="savePercent" style="display:none;">
											<dt>
												<?php _e( 'You save', 'ami3' ); ?>:
											</dt>
											<dd class="js-you_save"><span class="color-orange color-custom" data-singleProduct="save"></span> (<span data-singleProduct="savePercent"></span>%)</dd>
										</dl>

										<?php
										$hghf = '';
										if ( ! cz( 'tp_shipping_details' ) || isOneFreeShipping() ) {
											$hghf = 'style="display:none;"';
										} ?>
										<dl class="shipping-method" <?php echo $hghf; ?>>
											<dt>
												<?php _e( 'Shipping', 'ami3' ); ?>:
											</dt>
											<dd>
												<?php echo $product[ 'renderShipping' ]; ?>
											</dd>
										</dl>

										<?php if ( $product[ 'quantity' ] > 0 && $product[ 'quantity' ] < 15 ) : ?>
											<div class="meta_only" data-productPriceBox="quantity" itemprop="availability" href="http://schema.org/InStock">
												<?php _e( 'Only', 'ami3' ) ?>
												<span data-singleProduct="quantity"><?php echo $product[ 'quantity' ]; ?></span>
												<?php _e( 'left in stock.', 'ami3' ) ?>
											</div>
										<?php endif; ?>

										<?php if ( $product[ 'quantity' ] == 0 ) : ?>
											<div class="meta_only" data-productPriceBox="quantity" itemprop="availability" href="http://schema.org/InStock">
												<?php _e( 'Out of stock.', 'ami3' ) ?>
											</div>
										<?php endif; ?>
									</div>
									<?php

									if ( ! empty( $product[ 'sku' ] ) && $product[ 'skuAttr' ] ) {

										echo '<div class="sku-listing">';
										dav_showSKU( $product[ 'sku' ], $product[ 'skuAttr' ], get_the_title() );
										echo '</div>';
									}

									?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-offset-1 col-lg-15 col-xs-60">
						<div class="row">
							<div class="col-lg-60">
								<div class="b-add_order">
									<div class="">
										<dl class="b-add_order__total" data-productPriceBox="totalPrice" style="display: none;">
											<dt><?php _e( 'Total Price', 'ami3' ); ?>:</dt>
											<dd class="color-orange color-custom">
												<span class="total-price" data-singleProduct="totalPrice"></span>
											</dd>
										</dl>
										<?php if ( $product[ 'quantity' ] != 0 ) : ?>

											<dl class="b-add_order__quantity">
												<dt><?php _e( 'Quantity', 'ami3' ); ?>:</dt>
												<dd>
													<div class="select_quantity">
														<button type="button" class="select_quantity__btn js-quantity_remove">
															<i class="ico--remove"></i></button>
														<input class="js-single-quantity" name="quantity" type="text" value="1" min="1" max="9999"
														       maxlength="5" autocomplete="off" />
														<button type="button" class="select_quantity__btn js-quantity_add">
															<i class="ico--add"></i></button>
													</div>
												</dd>
											</dl>

										<?php endif; ?>
									</div>

									<?php if ( $product[ 'quantity' ] != 0 ) : ?>
										<div class="b-add_order__btn">
											<input type="hidden" name="post_id" value="<?php echo $post->ID ?>">

											<button type="button" id="addToCart" onclick="ga('send', 'event', 'Add to Cart', 'Click')"
											        class="btn btn-lg b-add_order__btn_addcart js-addToCart">
												<i class="ico_singl_cart"></i>
												<?php _e( 'Add to Cart', 'ami3' ) ?>
											</button>
											<?php if ( dav_isExpressCheckoutEnabled() ): ?>
												<button type="submit" id="buyNow" class="btn btn-lg b-add_order__btn_paypal rippler rippler-default" name="pay_express_checkout">
													<?php _e( 'Cheсk out with', 'ami3' ) ?>
													<i class="ico_singl_paypal"></i>
												</button>
											<?php endif; ?>
										</div>
									<?php endif; ?>

									<ul class="b-add_order__advantage">
										<?php if ( $product['is_free_shipping'] ): ?>
											<li class="b-add_order__advantage__item--world">
												<b><?php _e( 'Free', 'ami3' ); ?></b> <?php _e( 'Worldwide Shipping', 'ami3' ); ?>
											</li>
										<?php endif; ?>
										<li class="b-add_order__advantage__item--guarantee">
											<b>100%</b> <?php _e( 'Money Back Guarantee', 'ami3' ); ?>
										</li>
										<li class="b-add_order__advantage__item--secure">
											<b>100%</b> <?php _e( 'Secure Payments', 'ami3' ); ?>
										</li>
									</ul>
								</div>
							</div>
							<?php if ( cz( 'tp_share' ) ): ?>
								<div class="col-lg-60 text-center"> <?php get_template_part( 'products/share', 'button' ); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</form>
			<div class="row">
				<?php if ( cz( 'tp_single_buyer_protection' ) ): ?>
					<div class="bp-horizontal hidden-xs col-sm-60">
						<div class="bp-info">
							<div class="row">
								<div class="col-sm-offset-3 col-sm-30">
									<div class="bp-icon-left">
										<span class="bp-icon"></span>
									</div>
									<div class="bp-text-right">
										<h3 class="bp-info__h3 pull-left"><?php _e( 'Buyer Protection', 'ami3' ) ?></h3>
										<ul class="bp-info-list">
											<li class="bp-info-item">
												<strong><?php _e( "Full Refund", 'ami3' ) ?></strong>
												<?php _e( "if you don't receive your order.", 'ami3' ) ?>
											</li>
											<li class="bp-info-item">
												<strong><?php _e( 'Refund & Keep', 'ami3' ) ?></strong>
												<?php _e( 'items, if not as described.', 'ami3' ) ?>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-sm-offset-4 col-sm-20">
									<div class="bp-icon-left">
										<span class="ic icon-flight"></span>
									</div>
									<div class="bp-text-right">
										<h3><?php _e( 'Free Shipping Worldwide', 'ami3' ) ?></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="col-lg-44 col-xs-60">
					<div class="tabs" role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#details" aria-controls="details" role="tab" data-toggle="tab">
									<?php _e( 'Product Details', 'ami3' ) ?>
								</a>
							</li>
							<?php if ( cz( 'tp_tab_item_review' ) ): ?>
								<li role="presentation">
									<a href="#box-review">
										<?php _e( 'Reviews', 'ami3' ) ?>
										<span>(<?php echo $review->countFeedback(); ?>)</span> </a>
								</li>
							<?php endif; ?>
							<?php if ( cz( 'tp_tab_item_specifics' ) ): ?>
								<li role="presentation">
									<a href="#specifics" aria-controls="specifics" role="tab" data-toggle="tab">
										<?php _e( 'Item Specifics', 'ami3' ) ?></a>
								</li>
							<?php endif; ?>

							<?php if ( cz( 'tp_tab_shipping' ) ): ?>
								<li role="presentation">
									<a href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab">
										<?php _e( 'Shipping and Free Returns', 'ami3' ) ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="details">

								<?php if ( $post->post_content != '' ) : ?>

									<h2 class="colored"><?php _e( 'Product Description', 'ami3' ) ?></h2>
									<div class="content" itemprop="description" itemtype="http://schema.org/Product">

										<?php the_content() ?>

									</div>

								<?php endif; ?>
								<!---->
								<?php if ( $review->countFeedback() ) : ?>
									<h2 class="colored"><?php _e( 'Reviews', 'ami3' ); ?>
										<span>(<?php echo $review->countFeedback(); ?>)</span>
									</h2>
									<div class="row">
										<div class="col-sm-30">
											<div class="row b-average_star_rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
												<div class="col-xs-30 col-sm-27 col-lg-30 stars_big">
													<div class="stars_big text-center">

														<?php
														$averageStar = $review->averageStar();
														$review->renderStarRating( $averageStar );
														?>

													</div>
												</div>
												<div class="col-xs-30 col-sm-33 col-lg-30 b-average_star_rating__text" property="aggregateRating"
												     typeof="AggregateRating">
													<?php _e( 'Average Star Rating', 'ami3' ); ?>:<br>
													<?php $stat = $review->getStat();
													printf(
														'<b><span itemprop="ratingValue">%1$s</span> %3$s 
														<span itemprop="bestRating">5</span> 
														(<span itemprop="reviewCount">%2$s</span> %4$s)</b>',
														$averageStar,
														$review->countFeedback(),
														__( 'out of', 'ami3' ),
														__( 'Ratings', 'ami3' )
													);
													?>
												</div>
											</div>

										</div>
										<div id="box-review" class="col-sm-30 b-feedback-rating_stat">
											<h3 class="b-feedback-rating_stat__head">
												<?php _e( 'Feedback Rating for This Product', 'ami3' ); ?>
											</h3>
											<table class="b-feedback-rating_stat__table">
												<tr>
													<td rowspan="2"
													    class="name"><?php printf( '<b>%2$s</b> (%1$s&percnt;)', $stat[ 'positive' ], __( 'Positive', 'ami3' ) ); ?>
													</td>
													<td>
														<?php printf( ' <span>5 %2$s (%1$s)</span>', $stat[ 'stars' ][ 5 ][ 'count' ], __( 'Stars', 'ami3' ) ); ?>
														<div class="progress">
															<div class="progress-bar" role="progressbar"
															     aria-valuenow="<?php echo $stat[ 'stars' ][ 5 ][ 'percent' ]; ?>"
															     aria-valuemin="0" aria-valuemax="100"
															     style="width: <?php echo $stat[ 'stars' ][ 5 ][ 'percent' ]; ?>%;">
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<?php printf( ' <span>4 %2$s (%1$s)</span>', $stat[ 'stars' ][ 4 ][ 'count' ], __( 'Stars', 'ami3' ) ); ?>

														<div class="progress">
															<div class="progress-bar" role="progressbar"
															     aria-valuenow="<?php echo $stat[ 'stars' ][ 4 ][ 'percent' ]; ?>"
															     aria-valuemin="0" aria-valuemax="100"
															     style="width: <?php echo $stat[ 'stars' ][ 4 ][ 'percent' ]; ?>%;">
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="name"><?php printf( '<b>%2$s</b> (%1$s&percnt;)', $stat[ 'neutral' ], __( 'Neutral', 'ami3' ) ); ?>

													</td>
													<td>
														<?php printf( ' <span>3 %2$s (%1$s)</span>', $stat[ 'stars' ][ 3 ][ 'count' ], __( 'Stars', 'ami3' ) ); ?>
														<div class="progress">
															<div class="progress-bar" role="progressbar"
															     aria-valuenow="<?php echo $stat[ 'stars' ][ 3 ][ 'percent' ]; ?>"
															     aria-valuemin="0" aria-valuemax="100"
															     style="width: <?php echo $stat[ 'stars' ][ 3 ][ 'percent' ]; ?>%;">
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td rowspan="2"
													    class="name"><?php printf( '<b>%2$s</b> (%1$s&percnt;)', $stat[ 'negative' ], __( 'Negative', 'ami3' ) ); ?>

													</td>
													<td>
														<?php printf( ' <span>2 %2$s (%1$s)</span>', $stat[ 'stars' ][ 2 ][ 'count' ], __( 'Stars', 'ami3' ) ); ?>

														<div class="progress">
															<div class="progress-bar" role="progressbar"
															     aria-valuenow="<?php echo $stat[ 'stars' ][ 2 ][ 'percent' ]; ?>"
															     aria-valuemin="0" aria-valuemax="100"
															     style="width: <?php echo $stat[ 'stars' ][ 2 ][ 'percent' ]; ?>%;">
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<?php printf( ' <span>1 %2$s (%1$s)</span>', $stat[ 'stars' ][ 1 ][ 'count' ], __( 'Stars', 'ami3' ) ); ?>

														<div class="progress">
															<div class="progress-bar" role="progressbar"
															     aria-valuenow="<?php echo $stat[ 'stars' ][ 1 ][ 'percent' ]; ?>"
															     aria-valuemin="0" aria-valuemax="100"
															     style="width: <?php echo $stat[ 'stars' ][ 1 ][ 'percent' ]; ?>%;">
															</div>
														</div>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="row">
										<?php comments_template( '/review-single.php' ); ?>
									</div>
								<?php endif; ?>
								<!---->
							</div>

							<?php if ( cz( 'tp_tab_item_specifics' ) ): ?>
								<div role="tabpanel" class="tab-pane" id="specifics">
									<?php if ( $product['attrib'] ) : ?>
										<h2 class="colored"><?php _e( 'Item Specifics', 'ami3' ) ?></h2>
										<?php
										foreach ( $product['attrib'] as $k => $attr ) {
											printf(
												'<div class="row attrib">
                                                <div class="col-xs-20 text-right"><strong>%1$s:</strong>&nbsp;</div>
                                                <div class="col-xs-40">&nbsp;%2$s</div></div>',
												$attr[ 'name' ],
												$attr[ 'value' ]
											);
										}
										?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( cz( 'tp_tab_shipping' ) ): ?>
								<div role="tabpanel" class="tab-pane" id="shipping">
									<?php if ( file_exists( dirname( __FILE__ ) . '/products/_pack.php' ) ) {
										include dirname( __FILE__ ) . '/products/_pack.php';
									} ?>
									<?php echo cz( 'tp_single_shipping_payment_content' ) ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-lg-offset-1 col-lg-15 col-xs-60">
					<?php get_template_part( 'products/product', 'related' ); ?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif; ?>

<?php get_template_part( 'products/main', 'recently' ) ?>
<?php get_template_part( 'tpl/widget/_modal_add_cart' ); ?>
<?php get_footer() ?>