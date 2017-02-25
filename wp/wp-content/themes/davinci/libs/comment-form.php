<?php
/**
 * Author: Vitaly Kukin
 * Date: 20.07.2015
 * Time: 13:25
 */

	function dav_list_comment( $comment, $args, $depth ) {

        $GLOBALS['comment'] = $comment;
        
        ?>

        <li <?php comment_class('feedback-one polosa'); ?> id="li-comment-<?php comment_ID() ?>">

            <div id="comment-<?php comment_ID(); ?>">

                <?php

                if( $comment->user_id > 0 ) {
                    $user = get_userdata( $comment->user_id );
                    $username = (!empty($user->first_name) || !empty($user->last_name)) ?
                        $user->first_name . " " . $user->last_name : $user->display_name;
                }
                else {
                    $username = $comment->comment_author;
                }
                ?>

                <h3>
                    <?php printf(__('<cite class="fn">%s</cite>'), $username); ?></br>
                    <small>
                        <?php printf(
                            __('<small>%1$s at %2$s</small>', 'ami3'),
                            get_comment_date(),  get_comment_time()
                        );

                        edit_comment_link(__('Edit', 'ami3'),'  ','') ?>
                    </small>
                </h3>

                <?php comment_text(); ?>

                <?php if ($comment->comment_approved == '0') : ?>
                    <p><em><?php _e('Your comment is awaiting moderation.', 'ami3') ?></em></p>
                <?php endif; ?>

            </div>
        </li>

        <?php
    }

	add_filter('comment_form_default_fields','dav_comment_fields');
	function dav_comment_fields($fields) {

        unset($fields['url']);

        return $fields;
    }

	//output comments
	function dav_show_comment($comment, $args, $depth){

        $GLOBALS['comment'] = $comment;

        ?>

        <div class="text" id="comment-<?php comment_ID(); ?>">

            <?php comment_text(); ?>

            <div class="author"><?php comment_author(); ?></div>

        </div>

    <?php
    }

	function dav_comment_form( $post_id = null, $args = array() ) {

        global $id;

        if ( null === $post_id )
            $post_id = $id;
        else
            $id = $post_id;

        $commenter 		= wp_get_current_commenter();
        $user 			= wp_get_current_user();
        $user_identity 	= $user->exists() ? $user->display_name : '';
        $req 			= get_option( 'require_name_email' );
        $aria_req 		= ( $req ? " aria-required='true'" : '' );
        $fields 		=  array(
            'author' => '<label for="author" class="col-sm-10 control-label">' . __('Name (required)', 'ami3' ) . '</label>
						<div class="col-sm-offset-1 col-sm-49"><input class="form-control" id="author" name="author" type="text"
						value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '/></div>',
            'email'  => '<label for="email" class="col-sm-10 control-label">' . __('Email (required)', 'ami3' ) . '</label>
						<div class="col-sm-offset-1 col-sm-49"><input class="form-control" id="email" name="email" type="text"
						value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . '/></div>',
        );

        $defaults = array(
            'fields' 			=> apply_filters( 'comment_form_default_fields', $fields )
        ,'comment_field' 	=> '<label for="comment" class="col-sm-10 control-label">' . __('Comment', 'ami3' ) . '</label>
                                <div class="col-sm-offset-1 col-sm-49">
                                    <textarea class="form-control" name="comment" id="comment" aria-required="true" rows="8"></textarea>
                                    </div>'
        ,'must_log_in' 		=> '<p>' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ami3' ),
                    wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>'
        ,'logged_in_as' 	=> '<p>' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'ami3' ),
                    admin_url( 'profile.php' ), $user_identity,
                    wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>'
        ,'comment_notes_before' => ''
        ,'comment_notes_after' => ''
        ,'id_form' => 'commentform'
        ,'id_submit' => 'submit'
        ,'title_reply' => '<h2>' . __("Leave a Review", 'ami3') . '</h2>'
        ,'title_reply_to' => __( "Leave a Reply to %s", 'ami3' )
        ,'cancel_reply_link' => __( "Cancel reply", 'ami3' )
        ,'label_submit' => __("Send", 'ami3')
        );
        $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

        if ( comments_open( $post_id ) ) :

            do_action( 'comment_form_before' );

            comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
            <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>

            <?php

            if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) :

                echo $args['must_log_in'];

                do_action( 'comment_form_must_log_in_after' );

            else :

                ?>

                <form class="form-horizontal" action="<?php echo site_url( '/wp-comments-post.php' ); ?>"
                      method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">

                    <?php
                    do_action( 'comment_form_top' );

                    if ( is_user_logged_in() ) :

                        echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

                        do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

                    else :

                        echo $args['comment_notes_before'];

                        do_action( 'comment_form_before_fields' );

                        foreach ( (array) $args['fields'] as $name => $field )
                            echo '<div class="form-group">' . apply_filters( "comment_form_field_{$name}", $field ) . '</div>';

                        do_action( 'comment_form_after_fields' );

                    endif;

                    echo '<div class="form-group">' . apply_filters( 'comment_form_field_comment', $args['comment_field'] ) . '</div>';
                    ?>

                    <div class="form-group">
                        <div class="col-sm-offset-11 col-sm-49">
                            <input name="submit" type="submit" class="btn btn-large"
                               id="<?php echo esc_attr( $args['id_submit'] ); ?>"
                               value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                        </div>
                    </div>

                    <?php
                    echo $args['comment_notes_after'];

                    comment_id_fields( $post_id );

                    do_action( 'comment_form', $post_id );

                    ?>

                </form>

            <?php

            endif;

            do_action( 'comment_form_after' );

        else :

            do_action( 'comment_form_comments_closed' );

        endif;
    }
?>