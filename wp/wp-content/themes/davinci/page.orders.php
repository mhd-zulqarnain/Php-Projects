<?php

/**
 * Description of page-orders
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> Jan 4, 2017 12:08:21 PM
 */

?>

<?php get_header(); ?>

<div class="breadcrumbs hidden-xs">
    <div class="container">
        <?php dav_breadcrumbs() ?>
    </div>
</div>

<!-- ACCOUNT -->
<div class="page-content">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="row page-contact">
            <?php $page = isset($_GET['ads-page']) ? $_GET['ads-page'] : 1;?>
            <?php dav_orders_page($page, $limit = 20); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>