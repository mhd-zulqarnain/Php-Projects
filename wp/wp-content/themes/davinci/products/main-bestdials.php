<?php
/**
 * Author: Vitaly Kukin
 * Date: 04.06.2015
 * Time: 15:42
 */
global $GLOBAL, $img_size;
if( !isset($GLOBAL['id_post_show']) ) $GLOBAL['id_post_show'] = array();

$args = array(
	'post_type'         => 'product',
	'posts_per_page'    => 8,
	'_orderby'          => 'discount',
	'_order'            => 'DESC',
	'post__not_in'		=> $GLOBAL['id_post_show']
);

query_posts($args);

echo '<div class="row">';

$i = 0;

if( have_posts() ) : while ( have_posts() ) : the_post();
	$GLOBAL['id_post_show'][] = $post->ID;
	$i++;

	if( $i == 1 || $i == 5 ) {

		$img_size = 'ads-big';

		$class = ( $i == 1 ) ? 'hidden-sm' : 'col-sm-20 hidden-xs';

		echo '<div class="col-lg-15 col-md-15 ' . $class . '"><div class="item-sp item-lg">';

		get_template_part( 'products/product' );

		echo '</div></div>';
	}
	else {
		
		$img_size = 'ads-medium';

		if( $i == 2 || $i == 6 ) {

			$class = ( $i == 6 ) ? 'three-item-last' : '';

			echo '<div class="three-item ' . $class . ' col-lg-15 col-md-15 col-sm-20">';
		}

		echo '<div class="item-sp item-sm">';

		get_template_part( 'products/product' );

		echo '</div>';

		if( $i == 4 || $i == 8 ) {
			echo '</div>';
		}
	}

endwhile; endif;

if( !in_array( $i, array(0,1,4,5,8) ) ) echo '</div>';

echo '</div>';

wp_reset_query();