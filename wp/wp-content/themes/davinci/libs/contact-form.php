<?php
/**
 * Author: Vitaly Kukin
 * Date: 04.06.2015
 * Time: 10:38
 */

/**
 * Contact form
 */
function dav_contact_form() {

	$foo = array(
		'nameClient' => array(
			'type'        => 'text',
			'field'       => 'input',
			'label'       => __('Your Name', 'ami3'),
			'placeholder' => 'John Smith'
		),
		'email'      => array(
			'type'        => 'email',
			'field'       => 'input',
			'label'       => __('Email', 'ami3'),
			'placeholder' => 'mail@example.com'
		),
		'message'    => array( 'field' => 'textarea', 'label' => __('Message', 'ami3'), 'placeholder' => __('Your Message', 'ami3')),
	)

	?>
	<form class="contact-form" method="POST">

		<?php
		if ( isset( $_POST[ 'error' ] ) ) {
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>'
			, __( 'Something went wrong and we could not get a letter. Some fields were incorrectly filled out.', 'ami3' ),
			'</div>';
		} elseif ( isset( $_GET[ 'complete' ] ) ) {
			echo '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>', __( 'Your message has been sent!', 'ami3' ), '</div>';
		}
		?>

		<?php

		foreach ( $foo as $key => $val ) {

			echo '<div class="form-group">';

			$value       = isset( $_POST[ $key ] ) ? $_POST[ $key ] : '';
			$class       = ( $value != '' ) ? 'active' : '';
			$placeholder = isset( $val[ "placeholder" ] ) ? $val[ "placeholder" ] : '';

			if ( $val[ 'field' ] == 'input' ) {
				echo sprintf(
					'<label for="%1$s" class="%4$s">%5$s<span class="required_item">*</span></label><input id="%1$s" type="%2$s" name="%1$s" value="%3$s" class="form-control" placeholder="%5$s" required="required">',
					$key,
					$val[ 'type' ],
					$value,
					$class,
					$val[ 'label' ],
					$placeholder
				);
			} elseif ( $val[ 'field' ] == 'textarea' ) {
				echo sprintf(
					'<label for="%1$s" class="%3$s">%4$s<span class="required_item">*</span></label><textarea id="%1$s" name="%1$s" class="form-control" placeholder="%5$s" required="required">%2$s</textarea>',
					$key,
					$value,
					$class,
					$val[ 'label' ],
					$placeholder
				);
			}

			echo '</div>';
		}
		?>

		<div class="form-group text-right">
			<button type="submit" name="contactSender" value="Send" class="btn bg-none border-black"><?php _e( 'Send Message', 'ami3' ); ?></button>
		</div>
	</form>
	<?php
}

/**
 * Handler for contact form
 */
function dav_handler_contact()
{
	if (!isset($_POST['contactSender'])) {
		return;
	}

	$foo = array(
		'nameClient' => 'strip_tags',
		'email'      => 'is_email',
		'message'    => 'strip_tags'
	);

	$args  = array();
	$error = false;

	foreach ($foo as $key => $val) {
		if ($error) {
			break;
		}

		if (!isset($_POST[$key])) {
			$error = $key;
		} else {
			$result = call_user_func($val, trim($_POST[$key]));
			if ($result && ! empty($result)) {
				$args[$key] = $result;
			} else {
				$error = $key;
			}
		}
	}

	if ($error) {
		$_POST['error'] = $error;
	} else {
		$defaults = array(
			'nameClient' => '',
			'email'      => '',
			'phone'      => '',
			'location'   => '',
			'message'    => ''
		);

		$args = wp_parse_args($args, $defaults);
		extract($args, EXTR_SKIP);

		$defaults = array(
			'adminMailSend' => '',
			'template'      => '',
			'subject'       => '',
			'from_email'    => '',
			'from_name'     => ''
		);

        $options = new \ads\adsOptions();
        $argsNotifi = $options->get('ads_notifi_contact');
		$argsNotifi['template'] = trim(stripcslashes($argsNotifi['template']));

		foreach ($args as $k => $v) {
			$argsNotifi['template'] = str_replace('{{' . $k . '}}', esc_attr($v), $argsNotifi['template']);
		}

		if (empty($argsNotifi['template'])) {
			$argsNotifi['template'] = "
                User Name: " . $args['nameClient'] . "\r\n
                Email: " . $args['email'] . "\r\n\n
                Message\r\n
                " . $args['message'] . "\r\n
            ";
		}

		dav_sendmail(
			array(
				'email_to'   => array($argsNotifi['adminMailSend']),
				'subject'    => $argsNotifi['subject'],
				'content'    => $argsNotifi['template'],
				'from_email' => $argsNotifi['from_email'],
				'from_name'  => $argsNotifi['from_name']
			)
		);

		wp_redirect( home_url( '/thank-you-contact' ) );
		exit();
	}
}

add_action( 'wp', 'dav_handler_contact' );


function dav_sendmail( $ms ) {
	$sm = \SendMail\SendMail::i();
	return $sm->send( array(
		'to'         => $ms[ 'email_to' ],
		'subject'    => $ms[ 'subject' ],
		'html'       => $ms[ 'content' ],
		'from_email' => $ms[ 'from_email' ],
		'from_name'  => $ms[ 'from_name' ]
	) );
}
