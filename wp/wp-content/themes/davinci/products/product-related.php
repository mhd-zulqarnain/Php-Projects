<?php
/**
 * Author: Vitaly Kukin
 * Date: 15.07.2015
 * Time: 12:53
 */
global $post;

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 3,
	'post__not_in' => array($post->ID)
);

if ( isset( $post->links ) && $post->links != '' ) {

	$links = explode( ',', $post->links );

	if ( ! empty( $links ) ) {

		$links = ads_shuffle_assoc( $links );
		$args  = array(
			'post_type'      => 'product',
			'posts_per_page' => 3,
			'_orderby'       => 'post_id',
			'_order'         => 'array',
			'post__in'       => $links
		);
	}
} else {

	/*rand product*/
	$terms = wp_get_post_terms( $post->ID, 'product_cat' );
	$terms = current( $terms );

	if ( $terms ) {
		$querystr = "	SELECT p.ID
					FROM {$wpdb->term_relationships} t INNER JOIN {$wpdb->posts} p ON p.ID = t.object_id
					WHERE p.ID NOT IN({$post->ID}) AND t.term_taxonomy_id={$terms->term_id} AND p.post_status = 'publish' AND p.post_type = 'product' 
					ORDER BY rand() LIMIT 3 ";

		$pageposts = $wpdb->get_results( $querystr );

		$post__in = array();
		foreach ( $pageposts as $sub ) {
			$post__in[] = $sub->ID;
		}

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => 3,
			'post__in'       => $post__in
		);
	}
}

$img_size = 'ads-medium';

query_posts( $args );

if ( have_posts() ) :

	printf( '<h3 class="related">%s</h3>', __( 'Related Products', 'ami3' ) );

	echo '<div class="row">';

	while ( have_posts() ) : the_post();

		echo '<div class="col-lg-60 col-sm-20 col-xs-30"><div class="item-cat related">';

		get_template_part( 'products/product' );

		echo '</div></div>';

	endwhile;

	echo '</div>';

endif;

wp_reset_query();