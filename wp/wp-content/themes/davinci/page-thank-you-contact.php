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

<!-- THANK YOU -->
<div class="page-content">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post() ?>

            <div class="page-thank">
                <div class="page-thank__top">
                    <div class="page-thank__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/main/mail.png" class="img-responsive">
                    </div>
                    <div class="page-thank__text">
                        <h3><?php _e('Thank you for contacting us', 'ami3'); ?>.</h3>
                        <p><?php _e('We\'ll get back to you as soon as possible', 'ami3'); ?>.</p>
                    </div>
                </div>
                <div class="page-thank__back_btn">
                <a href="/" class="btn btn-default btn-danger rippler rippler-default"><?php _e('Back to the site', 'ami3'); ?></a>
                </div>
            </div>

        <?php endwhile; endif; ?>

    </div>
</div>
<?php get_footer() ?>
