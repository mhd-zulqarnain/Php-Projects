<?php
/**
 * Author: Vitaly Kukin
 * Date: 20.07.2015
 * Time: 10:28
 */
?>

<?php get_header() ?>

	<!-- BREADCRUMBS -->
	<div class="breadcrumbs hidden-xs">
		<div class="container">
			<?php dav_breadcrumbs() ?>
		</div>
	</div>

<?php // get_template_part('products/countdown') ?>

	<!-- COLLECTION -->
	<div class="collection">
		<div class="container">
			<div class="row page-cat-main">
				<div class="col-lg-60 page-cat-product">
					<?php global $wp_query; ?>
					<h1><?php _e( 'Search Result for', 'ami3' ) ?>: <?php the_search_query() ?> (<?php echo $wp_query->found_posts; ?>)</h1>
					<?php get_template_part( 'products/cat', 'sort' ); ?>

					<?php
					$i = 0;

					if ( have_posts() ) : while ( have_posts() ) : the_post();

						$i ++;

						if ( $i == 1 ) {
							echo '<div class="row">';
						}

						echo '<div class="col-lg-15 col-sm-20 col-xs-30"><div class="item-cat">';

						get_template_part( 'products/product' );

						echo '</div></div>';

						if ( $i == 4 ) {
							echo '</div>';
							$i = 0;
						}

					endwhile; ?>
						<div class="clearfix"></div>
					<?php else: ?>
						<div class="back_btn">
							<a href="<?php echo esc_url(home_url('/product/'))?>" class="btn btn-default btn-danger"><?php _e( 'Continue shopping', 'ami3' ); ?></a>
						</div>
					<?php endif; ?>


					<?php get_template_part( 'products/pagination' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer() ?>