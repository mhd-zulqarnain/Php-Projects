<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 02.07.2015
 * Time: 12:34
 */
?>

<?php get_header() ?>

    <!-- BREADCRUMBS -->
    <div class="breadcrumbs hidden-xs">
	    <div class="container">
		    <?php dav_breadcrumbs() ?>
	    </div>
    </div>

    <!-- COLLECTION -->
    <div class="collection">
	    <div class="container">
		    <div class="row page-cat-main">
			    <div class="col-lg-47 page-cat-product">

				    <h1 class="hidden-xs"><?php _e('Products', 'ami3') ?></h1>

				    <?php get_template_part( 'products/cat', 'sort' ); ?>
				    <div class="list_product">
				    <?php

				    $i = 0;

				    if( have_posts() ) : while ( have_posts() ) : the_post();

					    $i++;

					    echo '<div class="col-lg-15 col-sm-20 col-xs-30"><div class="item-cat">';

					    get_template_part( 'products/product' );

					    echo '</div></div>';

				    endwhile; endif;

				    ?>
				    </div>
				    <?php get_template_part( 'products/pagination' ); ?>
				    <div class="clearfix wrap-loadProduct" style="display: none">
					    <button class="loadPloduct"><?php _e( 'Load more', 'ami3' ); ?></button>
				    </div>
			    </div>
			    <div class="col-lg-13 page-cat-sidebar">
				    <div class="left-sidebar">
					    <?php get_template_part( 'products/cat', 'menu' ); ?>
				    </div>
                    <?php get_template_part( 'products/cat', 'sidebar-ads' ); ?>
			    </div>
		    </div>
	    </div>
    </div>
<?php get_footer() ?>