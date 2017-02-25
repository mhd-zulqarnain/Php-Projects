<?php
/**
 * Author: Vitaly Kukin
 * Date: 25.06.2015
 * Time: 11:44
 */

$current = get_queried_object();

$term_id = isset($current->term_id) ? $current->term_id : 0;


$args = array(
    'post_type'         => 'product',
    'posts_per_page'    => 3,
    '_orderby'          => 'promotionVolume',
    '_order'            => 'DESC'
);

if( $term_id != 0 )
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => $term_id,
		)
	);

query_posts($args);

if( have_posts() ) :

    printf('<h3>%s</h3>', __('Most Popular', 'ami3'));

    echo '<div class="row">';

    while ( have_posts() ) : the_post();

        echo '<div class="col-lg-60"><div class="item-cat">';

        get_template_part( 'products/product' );

        echo '</div></div>';

    endwhile;

    echo '</div>';

endif;

wp_reset_query();
