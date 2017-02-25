<?php

/**
 * Description of page-userlogin
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> Jan 4, 2017 2:09:01 PM
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
            <center>
                <?php
                    $args = array(
                        'echo'           => true,
                        'remember'       => true,
                        'redirect'       => get_bloginfo('url') . "/account", 
                        'form_id'        => 'loginform',
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'label_username' => __('Username:', 'mic'),
                        'label_password' => __('Password:', 'mic'),
                        'label_remember' => __('Remember Me', 'mic'),
                        'label_log_in'   => __('Log In', 'mic'),
                        'value_username' => '',
                        'value_remember' => false
                    );

                    if (get_current_user_id() == 0) {
                        wp_login_form($args);
                    }
                ?>
            </center>
        </div>
    </div>
</div>

<?php get_footer(); ?>