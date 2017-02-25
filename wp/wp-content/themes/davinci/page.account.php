<?php

/**
 * Description of account
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> Jan 4, 2017 11:49:51 AM
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
            <?php dav_account_page();?>
        </div>
    </div>
</div>

<?php get_footer(); ?>