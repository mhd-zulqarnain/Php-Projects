<?php
/**
 * Author: Vitaly Kukin
 * Date: 04.06.2015
 * Time: 11:13
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

    <!-- SINGLE -->
    <div class="page-content">
        <div class="container">

            <?php if (have_posts()) : while (have_posts()) : the_post() ?>

                <h1><?php the_title() ?></h1>

                <?php the_content() ?>
                <a href="/" class="page-content_btn btn btn-default btn-danger"><?php _e( 'Go to Homepage', 'ami3' ); ?></a>
            <?php endwhile; endif; ?>

        </div>
    </div>

<?php get_footer() ?>