<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.08.2015
 * Time: 16:43
 */
?>

<?php get_header() ?>

<!-- BREADCRUMBS -->
<div class="breadcrumbs hidden-xs">
    <div class="container">
        <?php dav_breadcrumbs() ?>
    </div>
</div>

<!-- CONTACT-US -->
<div class="page-content">
    <div class="container">
        <h1><?php _e('Contact Us', 'ami3'); ?></h1>
        <div class="row page-contact">
            <div class="col-sm-29">
                <div role="form" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <?php dav_contact_form();?>
                </div>
            </div>
            <div class="col-sm-20 col-sm-offset-4 address">
                <p><?php _e('Have any questions or need to get more information about a product? Either way, you’re in the right spot', 'ami3'); ?>.</p>
                <?php if(cz('s_mail')): ?>
                <p><a href="mailto:<?php echo cz('s_mail'); ?>" target="_blank"> <?php echo cz('s_mail'); ?></a></p>
                <?php endif; ?>
                <?php if(cz('s_link_fb')): ?>
                <p><a href="<?php echo cz('s_link_fb'); ?>" target="_blank" rel="nofollow">
                        <span class="ic icon-facebook rippler rippler-default"><?php _e('Like Us', 'ami3'); ?></span></a></p>
                <?php endif; ?>
                <?php if(cz('s_link_in')): ?>
                <p><a href="<?php echo cz('s_link_in'); ?>" target="_blank" rel="nofollow">
                        <span class="ic icon-instagramm rippler rippler-default"><?php _e('Find us', 'ami3'); ?></span></a></p>
                <?php endif; ?>
                <?php if(cz('s_link_tw')): ?>
                <p><a href="<?php echo cz('s_link_tw'); ?>" target="_blank" rel="nofollow">
                        <span class="ic icon-twitter rippler rippler-default"><?php _e('Follow Us', 'ami3'); ?></span></a></p>
                <?php endif; ?>
                <?php if(cz('s_link_gl')): ?>
                <p><a href="<?php echo cz('s_link_gl'); ?>" target="_blank" rel="nofollow">
                        <span class="ic icon-gplus rippler rippler-default"><?php _e('Join Us', 'ami3'); ?></span></a></p>
                <?php endif; ?>
                <?php if(cz('s_link_pt')): ?>
                <p><a href="<?php echo cz('s_link_pt'); ?>" target="_blank" rel="nofollow">
                        <span class="ic icon-pinterest rippler rippler-default"><?php _e('Add Us', 'ami3'); ?></span></a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
