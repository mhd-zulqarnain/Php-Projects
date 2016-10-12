<?php
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

if($_POST){
	//print_r($_POST);
	$username = $_POST['sf_username'];
	$email = $_POST['sf_email'];
	$password = $_POST['sf_password'];
	$password2 = $_POST['sf_password2'];
	$dob = $_POST['sf_dob'];
	$father_name = $_POST['sf_father_name'];
	$grand_father_name = $_POST['sf_grand_father_name'];
	$mother_name = $_POST['sf_mother_name'];
	$nic_no = $_POST['sf_nic_no'];
	$membership = $_POST['sf_membership'];
	$amroha_mohalla = $_POST['sf_amroha_mohalla'];
	$highest_education = $_POST['sf_highest_education'];
	$occupation = $_POST['sf_occupation'];
	$res_address = $_POST['sf_res_address'];
	$city = $_POST['sf_city'];
	$country = $_POST['sf_country'];
	$cell_phone = $_POST['sf_cell_phone'];
	$res_phone = $_POST['sf_res_phone'];
	$office_phone = $_POST['sf_office_phone'];
	$re = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
	preg_match($re,$email, $email_verify);
	$re2 = '/^(\d{5})+\-+(\d{7})+\-+(\d)+$/';
	preg_match($re2,$nic_no, $nic_verify);
	
	if($username == ''){
		$form_error_msg .= '- Name field is required.<br/>';
	}
	if($email == ''){
		$form_error_msg .= '- Email field is required.<br/>';
	}else if(empty($email_verify[0])){
		$form_error_msg .= '- Email field must contain a valid email address.<br/>';
	}
	if($password == ''){
		$form_error_msg .= '- Password field is required.<br/>';
	}else if(strlen($password) < 6){
		$form_error_msg .= '- Password field must be at least 6 characters in length.<br/>';
	}
	if($password2 == ''){
		$form_error_msg .= '- Password Confirmed field is required.<br/>';
	}else if($password != $password2){
		$form_error_msg .= '- Password Confirmed field does not match the Password field.<br/>';
	}
	if($dob == ''){
		$form_error_msg .= '- Date of Birth field is required.<br/>';
	}
	if($father_name == ''){
		$form_error_msg .= '- Father Name field is required.<br/>';
	}
	if($grand_father_name == ''){
		$form_error_msg .= '- Grand Father Name field is required.<br/>';
	}
	if($mother_name == ''){
		$form_error_msg .= '- Mother Name field is required.<br/>';
	}
	if($nic_no == ''){
		$form_error_msg .= '- NIC # field is required.<br/>';
	}else if(empty($nic_verify[0])){
		$form_error_msg .= '- NIC # field must contain a valid NIC #.<br/>';
	}
	if($membership == '0'){
		$form_error_msg .= '- Membership field is required.<br/>';
	}
	if($amroha_mohalla == '0'){
		$form_error_msg .= '- Amroha Mohalla field is required.<br/>';
	}
	if($highest_education == '0'){
		$form_error_msg .= '- Highest Education field is required.<br/>';
	}
	if($occupation == ''){
		$form_error_msg .= '- Occupation field is required.<br/>';
	}
	if($res_address == ''){
		$form_error_msg .= '- Res. Address field is required.<br/>';
	}
	if($city == ''){
		$form_error_msg .= '- City field is required.<br/>';
	}
	if($country == ''){
		$form_error_msg .= '- Country field is required.<br/>';
	}
	if($cell_phone == ''){
		$form_error_msg .= '- Cell Phone # field is required.<br/>';
	}
	if($res_phone == ''){
		$form_error_msg .= '- Res. Phone # field is required.<br/>';
	}
	if($office_phone == ''){
		$form_error_msg .= '- Office Phone # field is required.<br/>';
	}
	if($_FILES["sf_photo_file"]["name"]==''){
		$form_error_msg .= '- Please upload a photo file.<br/>';
	}else{
		if($email != ''){
		//print_r($_FILES);
		$photo_file = $email;
		$photo_file = str_replace("@", "-", $photo_file);
		$photo_file = str_replace(".", "_", $photo_file);
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$extension = end(explode(".", $_FILES["sf_photo_file"]["name"]));
		
		$photo = $photo_file.".".$extension;
		
		$uploads = wp_upload_dir();
		$full_path = $uploads['basedir']."/users/".$photo;
		
		if ((($_FILES["sf_photo_file"]["type"] == "image/gif")
		|| ($_FILES["sf_photo_file"]["type"] == "image/jpeg")
		|| ($_FILES["sf_photo_file"]["type"] == "image/png")
		|| ($_FILES["sf_photo_file"]["type"] == "image/pjpeg"))
		&& ($_FILES["sf_photo_file"]["size"] < 5300000)
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES["sf_photo_file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["sf_photo_file"]["error"] . "<br>";
			}
		  else
			{
			move_uploaded_file($_FILES["sf_photo_file"]["tmp_name"], $full_path);
			}
		  }
		else
		  {
		  echo "For Photo File: Only JPEG,GIF and PNG format are allowed & Max filesize: 500KB";
		  }
		}else{
			$form_error_msg .= '- Without Email Field, Photo will not be uploaded.<br/>';
		}
	}
	//$_SESSION['error'] = $form_error_msg;
	if($form_error_msg==""){	
		$pieces = explode("-", $dob);
		$dob = $pieces[2].'-'.$pieces[1].'-'.$pieces[0];
		
		$salt = '378570bd5aefb5c8efaebdfcfb64face';
		$hash_password = hash_hmac('md5', $password, $salt);
	
		$current_date_time = date("Y-m-d H:i:s"); //MySQL DATE TIME FORMAT
		
		global $wpdb;

		$wpdb->query( $wpdb->prepare( 
			"INSERT INTO amroha_users
			( username, email, password, dob, father_name, grand_father_name, mother_name, nic_no, membership, amroha_mohalla, highest_education, occupation, res_address, city, country, cell_no, res_phone, office_phone, photo_upload, is_email_valid, is_active, created_on)
			VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %d, %d, %s )", 
			array($username, $email, $hash_password, $dob, $father_name, $grand_father_name, $mother_name, $nic_no, $membership, $amroha_mohalla, $highest_education, $occupation, $res_address, $city, $country, $cell_phone, $res_phone, $office_phone, $photo, 0, 0, $current_date_time) 
		) );
		//$wpdb->print_error(); 
		$get_info = "?status=success";
		header("Location: ".$_SERVER['REQUEST_URI'].$get_info);
		exit();
	}
}
?>