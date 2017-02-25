<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.08.2015
 * Time: 10:03
 */
?>
<?php get_header() ?>

<!-- BREADCRUMBS -->
<div class="breadcrumbs hidden-xs">
    <div class="container">
        <?php dav_breadcrumbs() ?>
    </div>
</div>

<!-- SUBSCRIPTION -->
<div class="page-content">
    <div class="container">
            <div class="page-thank">
                <div class="page-thank__top page-thank__top--order">
                    <div class="page-thank__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/main/mail.png" class="img-responsive">
                    </div>
                    <div class="page-thank__text">
                        <h3><?php _e('Thank you for subscribing to our newsletter', 'ami3'); ?>!</h3>
                        <p><?php _e('You have been successfully added to our mailing list, keeping you up-to-date with our latest news, sales and coupons', 'ami3'); ?></p>
                    </div>
                </div>
                <div class="page-thank__back_btn page-thank__back_btn--order">
                    <a href="/" class="btn btn-default btn-danger rippler rippler-default"><?php _e('Back to the site', 'ami3'); ?></a>
                </div>
            </div>
    </div>
</div>
<?php get_footer() ?>
