<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 03.06.2016
 * Time: 15:11
 */

global $review
?>

<?php if ( comments_open() ): ?>
	<?php
	$posts_per_page = ( isset( $wp_query->query_vars[ 'comments_per_page' ] ) &&
	                    intval( $wp_query->query_vars[ 'comments_per_page' ] ) ) ?
		$wp_query->query_vars[ 'comments_per_page' ] :
		intval( get_option( 'comments_per_page' ) );
	?>
	<div class="inner-box">
		<div class="controls">
			<div class="col-xs-60">
				<table id="comments" class="b-review_table">
					<thead>
					<tr>
						<th><?php _e( 'Buyer', 'ami3' ); ?></th>
						<th><?php _e( 'Rating', 'ami3' ); ?></th>
						<th class="b-review_table__date"><?php _e( 'Reviews', 'ami3' ); ?></th>
					</tr>
					</thead>
					<?php

					$args = array(
						'walker'            => null,
						'max_depth'         => '',
						'style'             => 'tr',
						'callback'          => 'dav_list_review',
						'end-callback'      => null,
						'type'              => 'all',
						'reply_text'        => 'Reply',
						'page'              => 1,
						'per_page'          => $posts_per_page,
						'avatar_size'       => 32,
						'reverse_top_level' => null,
						'reverse_children'  => '',
						'format'            => 'html5',
						'echo'              => true,
						'status'            => 'approve'
					);

					wp_list_comments( $args, $review->comments );
					?>
				</table>
			</div>
		</div>

	</div>
	<div class="inner-box-comment-form">
		<div class="pagination">
			<?php
			paginate_comments_links(
                array(
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                    'current'   => $review->getPage()
                )
            );
			?>
		</div>
		<?php
		//TODO возможность отставлять коментарии только купившим
		//dav_comment_form_add(); ?>
	</div>
<?php endif; ?>

<?php

function dav_comment_form_add( $post_id = null, $args = array() ) {
	global $id;

	if ( null === $post_id ) {
		$post_id = $id;
	} else {
		$id = $post_id;
	}

	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
	$req           = get_option( 'require_name_email' );
	$aria_req      = ( $req ? " aria-required='true'" : '' );
	$fields        = array(
		'author' => '<label for="author" class="col-sm-10 control-label">' . __( 'Name (required)', 'ami3' ) . '</label>
						<div class="col-sm-offset-1 col-sm-49"><input class="form-control" id="author" name="author" type="text"
						value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" ' . $aria_req . '/></div>',
		'email'  => '<label for="email" class="col-sm-10 control-label">' . __( 'Email (required)', 'ami3' ) . '</label>
						<div class="col-sm-offset-1 col-sm-49"><input class="form-control" id="email" name="email" type="text"
						value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" ' . $aria_req . '/></div>',
	);

	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields )
		,
		'comment_field'        => '<label for="comment" class="col-sm-10 control-label">' . __( 'Comment', 'ami3' ) . '</label>
                                <div class="col-sm-offset-1 col-sm-49">
                                    <textarea class="form-control" name="comment" id="comment" aria-required="true" rows="8"></textarea>
                                    </div>'
		,
		'must_log_in'          => '<p>' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ami3' ),
				wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>'
		,
		'logged_in_as'         => '<p>' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'ami3' ),
				admin_url( 'profile.php' ), $user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>'
		,
		'comment_notes_before' => ''
		,
		'comment_notes_after'  => ''
		,
		'id_form'              => 'commentform'
		,
		'id_submit'            => 'submit'
		,
		'title_reply'          => '<h2>' . __( "Leave a Review", 'ami3' ) . '</h2>'
		,
		'title_reply_to'       => __( "Leave a Reply to %s", 'ami3' )
		,
		'cancel_reply_link'    => __( "Cancel reply", 'ami3' )
		,
		'label_submit'         => __( "Send", 'ami3' )
	);
	$args     = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	if ( comments_open( $post_id ) ) :

		do_action( 'comment_form_before' );

		comment_form_title( $args[ 'title_reply' ], $args[ 'title_reply_to' ] ); ?>
		<small><?php cancel_comment_reply_link( $args[ 'cancel_reply_link' ] ); ?></small>

		<?php

		if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :

			echo $args[ 'must_log_in' ];

			do_action( 'comment_form_must_log_in_after' );

		else :

			?>

			<form class="form-horizontal" action="<?php echo site_url( '/wp-comments-post.php' ); ?>"
			      method="post" id="<?php echo esc_attr( $args[ 'id_form' ] ); ?>">

				<?php
				do_action( 'comment_form_top' );

				if ( is_user_logged_in() ) :

					echo apply_filters( 'comment_form_logged_in', $args[ 'logged_in_as' ], $commenter, $user_identity );

					do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

				else :

					echo $args[ 'comment_notes_before' ];

					do_action( 'comment_form_before_fields' );

					foreach ( (array) $args[ 'fields' ] as $name => $field ) {
						echo '<div class="form-group">' . apply_filters( "comment_form_field_{$name}", $field ) . '</div>';
					}

					do_action( 'comment_form_after_fields' );

				endif;

				?>
				<div class="form-group">
					<label for="comment" class="col-sm-10 control-label"><?php _e( 'Star' ); ?></label>
					<div class="col-sm-offset-1 col-sm-49">
						<?php for ( $i = 5; $i > 0; $i -- ) {
							printf( '<label class="checkbox-inline"><input type="radio" name="star" value="%1$s" class="widefat"  %2$s/> %1$s</label>',
								$i,
								0
							);
						}
						?>
					</div>
				</div>
				<div class="form-group">
					<label for="comment" class="col-sm-10 control-label"></label>
					<div class="col-sm-offset-1 col-sm-49">
						<select name="flag" id="" class="form-control">
							<?php
							if ( function_exists( 'ads_shipping_countries' ) ) {
								foreach ( ads_shipping_countries() as $k => $v ) {
									printf( '<option value="%1$s" %3$s>%2$s</option>',
										$k,
										$v,
										0
									);
								}
							}
							?>
						</select>
					</div>
				</div>
				<?php
				echo '<div class="form-group">' . apply_filters( 'comment_form_field_comment', $args[ 'comment_field' ] ) . '</div>';
				?>

				<div class="form-group">
					<div class="col-sm-offset-11 col-sm-49">
						<input name="submit" type="submit" class="btn btn-large"
						       id="<?php echo esc_attr( $args[ 'id_submit' ] ); ?>"
						       value="<?php echo esc_attr( $args[ 'label_submit' ] ); ?>"/>
					</div>
				</div>

				<?php
				echo $args[ 'comment_notes_after' ];

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

