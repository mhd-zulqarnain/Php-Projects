<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   //wp_deregister_script('jquery');
	   //wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   //wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	// Create a function for register_nav_menus()
	function add_wp3menu_support() {
		register_nav_menus(
			array(
			'main-menu' => __('Main Navigation'),
			'footer-menu' => __('Footer Navigation'),
			)
		 );
	}
	add_action('init', 'add_wp3menu_support');
	
	//Add the Featured Images Widget for Pages
	add_theme_support( 'post-thumbnails', array('page'));
	
	function limit_words($string, $word_limit) {

		// creates an array of words from $string (this will be our excerpt)
		// explode divides the excerpt up by using a space character

		$words = explode(' ', $string);

		// this next bit chops the $words array and sticks it back together
		// starting at the first word '0' and ending at the $word_limit
		// the $word_limit which is passed in the function will be the number
		// of words we want to use
		// implode glues the chopped up array back together using a space character

		return implode(' ', array_slice($words, 0, $word_limit));
	}
	
	/** SIGNUP FORM START **/
	
	$username = '';
	$email = '';
	$password = '';
	$password2 = '';
	$dob = '';
	$father_name = '';
	$grand_father_name = '';
	$mother_name = '';
	$nic_no = '';
	$membership = '';
	$amroha_mohalla = '';
	$highest_education = '';
	$occupation = '';
	$res_address = '';
	$city = '';
	$country = '';
	$cell_phone = '';
	$res_phone = '';
	$office_phone = '';
	$form_error_msg = '';
	
	function get_amorha_user_id($id){
		$query = 'SELECT CONCAT(amroha_mohalla,"-",membership,"-",DATE_FORMAT(created_on,"%Y"),"-",LPAD(member_id, 5, "0"))
				FROM amroha_users
				WHERE id = "{$id}"';
		global $wpdb;
		return $wpdb->get_var($query);
	}
	
	function amroha_email_verify($hash){
		global $wpdb;
		$query = 'Update amroha_users ';
		$query .= 'SET is_email_valid = 1 ';
		$query .= 'WHERE is_email_valid = 0 AND  sha1(email) = "'.$hash.'"';
		$result = $wpdb->query($query);
		if($result == 1){
			// Send Mail
			$message = "<p>Hi,<br/>";
			$message .= 'Your Email has been Verified Successfully.<br/>';
			$message .= 'Now you will get an email when admin activate your account, then you can login.</p>';
			$message .= "Regards,<br/>";
			$message .= "<strong>Anjuman Sadat-e-Amroha (Regd.) Pakistan</strong>";
			
			$query = 'SELECT email FROM amroha_users WHERE SHA1(email) = "'.$hash.'"';
			$to = $wpdb->get_var($query);
			
			$headers = 'From: Anjuman Sadat-e-Amroha(Regd.) Pakistan <no-reply@amroha.com.pk>'. "\r\n";
			$subject = 'Email Verification Successful';
			
			add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
			wp_mail( $to, $subject, $message, $headers );
			
			echo "<p style='color: #660000;text-decoration: underline;'>Email Verification Success</p>";
			echo "<p>Your Email has been Verified Successfully.<br/>";
			echo "Now you will get an email when admin activate your account, then you can login.</p>";
		}else{
			$query = 'SELECT is_email_valid FROM amroha_users ';
			$query .= 'WHERE sha1(email) = "'.$hash.'"';
			$result = $wpdb->get_var($query);
			if($result == 1){
				echo "<p style='color: #660000;text-decoration: underline;'>Email Already Verified</p>";
				echo "<p>Your Email is already verified.</p>";
			}else{
				echo "<p style='color: #660000;text-decoration: underline;'>Email Verification Failed</p>";
				echo "<p>URL is looking to be altered, copy the URL (which is sent in the email) in the browser and try again.</p>";
			}
		}
	}
	
	/*** SIGNUP FORM END ***/
?>