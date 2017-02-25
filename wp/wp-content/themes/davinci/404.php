
<?php get_header() ?>

<!-- BREADCRUMBS -->
<div class="breadcrumbs hidden-xs">
    <div class="container">
        <?php  dav_breadcrumbs() ?>
    </div>
</div>

<?php  get_template_part('products/countdown') ?>

<!-- 404 -->
<div class="page-content">
    <div class="container">
       <div class="page-404">
            <div class="page-404__text">
                <h3><?php _e( '404 Page not found', 'ami3' ); ?>.</h3>
                <p><?php _e( 'Sorry, but the page you are looking for has not been found', 'ami3' ); ?>.<br>
                    <?php _e( 'Please check your spelling', 'ami3' ); ?>.</p>
            </div>
            <div class="page-404__back_btn">
                <a href="/" class="btn btn-default btn-danger"><?php _e( 'Go To Homepage', 'ami3' ); ?></a>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
