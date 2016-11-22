<p>Fill in the form below:-</p><?php //echo $_SESSION['error'];?>
<?php //include 'signupform_process.php'; 
print_r($_POST);
if($form_error_msg != ""){
	echo '<div class="error">Kindly resolve the following error(s) first:-<br/>'.$form_error_msg."</div>";
}
?>
<div class="signup-form form">
<form action="" method="post" accept-charset="utf-8" id="user_sign_up_form" enctype="multipart/form-data">
<table width="100%">
<tbody><tr>
<td class="signup-form-label"><label for="sf_username">Name</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_username" value="<?php echo $username; ?>" id="sf_username" size="50" maxlength="40" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_email">Email</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_email" value="<?php echo $email; ?>" id="sf_email" size="50" maxlength="40" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_password">Password</label></td>
<td class="form-field-separator">:</td>
<td><input type="password" name="sf_password" value="" id="sf_password" size="15" maxlength="12"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_password2">Password Confirmed</label></td>
<td class="form-field-separator">:</td>
<td><input type="password" name="sf_password2" value="" id="sf_password2" size="15" maxlength="12"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_dob">Date of Birth</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_dob" value="<?php echo $dob; ?>" id="sf_dob" readonly="readonly" size="10"/></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_father_name">Father Name</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_father_name" value="<?php echo $father_name; ?>" id="sf_father_name" size="50" maxlength="40" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_grand_father_name">Grand Father Name</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_grand_father_name" value="<?php echo $grand_father_name; ?>" id="sf_grand_father_name" size="50" maxlength="40" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_mother_name">Mother Name</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_mother_name" value="<?php echo $mother_name; ?>" id="sf_mother_name" size="50" maxlength="40" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_nic_no">N.I.C #</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_nic_no" value="<?php echo $nic_no; ?>" id="sf_nic_no" size="15" maxlength="15" autocomplete="off"><span style="color: #545454; font-size: 12px; margin-left: 20px;">Field Format: xxxxx-xxxxxxx-x </span></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_membership">Membership</label></td>
<td class="form-field-separator">:</td>
<td><select name="sf_membership" id="sf_membership">
<?php $m =  array("0"=>"Select any one...","D"=>"Dwami","A"=>"Annual","L"=>"Life"); 
foreach ($m as $k => $v) {
    echo "<option ";
	if ($k == $membership) echo " selected=selected ";
	echo "value='{$k}'>{$v}</option>";
}
?>
</select></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_amroha_mohalla">Amroha Mohalla</label></td>
<td class="form-field-separator">:</td>
<td><select name="sf_amroha_mohalla" id="sf_amroha_mohalla">
<?php
$am = array("0"=>"Select any one...",
"BG"=>"Bagla",
"BQ"=>"Baqar Qasab",
"CG"=>"Chah Ghori",
"CK"=>"Chakli",
"CH"=>"Chewra",
"DM"=>"Danishmand",
"ST"=>"Darbar-e-Shah Abul Hasan (Satti)",
"DK"=>"Darbar-e-Kalan (Bara Darbar)",
"NG"=>"Darbar-e-Miran Khan (Nogain)",
"LK"=>"Darbar-e-Shah Willayat (Lakra)",
"GH"=>"Gharyal Manzil",
"GM"=>"Gher Munaf",
"GZ"=>"Guzri",
"HQ"=>"Haqqani",
"JF"=>"Jafri",
"JD"=>"Jarodian",
"KP"=>"Kali Pagri",
"KK"=>"Katkoi",
"KT"=>"Katra Ghulam Ali",
"KO"=>"Koat (Chilla)",
"MN"=>"Mandi Chob",
"MT"=>"Macharhatta",
"MP"=>"Maja Pota",
"NQ"=>"Naqashbi",
"PD"=>"Pachdara",
"PB"=>"Panbari",
"QG"=>"Qazi Gali",
"QZ"=>"Qazi Zada",
"SG"=>"Sabongran",
"SP"=>"Shafaat Pota",
"SS"=>"Shah Ali Sarai",
"SD"=>"Saddo",
"SK"=>"Sarai Kohna",
"TP"=>"Tirpolia",
"--"=>"Other");

foreach ($am as $k => $v) {
	echo "<option ";
	if ($k == $amroha_mohalla) echo " selected=selected ";
	echo "value='{$k}'>{$v}</option>";}
?>
</select></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_highest_education">Highest Education</label></td>
<td class="form-field-separator">:</td>
<td><select name="sf_highest_education" id="sf_highest_education">
<?php
$he = array("0"=>"Select any one...",
"matric"=>"Matric",
"intermediate"=>"Intermediate",
"ba"=>"B.A",
"bcom"=>"B.Com",
"bsc"=>"B.Sc",
"ma"=>"M.A",
"msc"=>"M.Sc",
"phd"=>"Ph.D");

foreach ($he as $k => $v) {
    echo "<option ";
	if ($k == $highest_education) echo " selected=selected ";
	echo "value='{$k}'>{$v}</option>";
}

?>
</select></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_occupation">Occupation</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_occupation" value="<?php echo $occupation; ?>" id="sf_occupation" size="50" maxlength="45" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_res_address">Res. Address</label></td>
<td class="form-field-separator">:</td>
<td><textarea name="sf_res_address" cols="40" rows="3" id="sf_res_address"><?php echo $res_address; ?></textarea></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_city">City</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_city" value="<?php echo $city; ?>" id="sf_city" size="30" maxlength="25" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_country">Country</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_country" value="<?php echo $country; ?>" id="sf_country" size="30" maxlength="25" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_cell_phone">Cell Phone #</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_cell_phone" value="<?php echo $cell_phone; ?>" id="sf_cell_phone" size="20" maxlength="18" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_res_phone">Res. Phone #</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_res_phone" value="<?php echo $res_phone; ?>" id="sf_res_phone" size="20" maxlength="18" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_office_phone">Office Phone #</label></td>
<td class="form-field-separator">:</td>
<td><input type="text" name="sf_office_phone" value="<?php echo $office_phone; ?>" id="sf_office_phone" size="20" maxlength="18" autocomplete="off"></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_photo_file">Photo Upload</label></td>
<td class="form-field-separator">:</td>
<td><input type="file" name="sf_photo_file" value="" id="sf_photo_file" size="30"><br><span style="color: #545454; font-style: italic; font-size: 12px;">(Only JPEG,GIF and PNG format are allowed &amp; Max filesize: 500KB.)</span></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_captcha">Captcha Code #</label></td>
<td class="form-field-separator">:</td>
<td id="captcha_img">&nbsp;<img src="<?php bloginfo('template_directory'); ?>/php/captcha/captcha.php" width="150" height="40" style="border:0;" alt=" "></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td>
	<input type="text" name="sf_captcha" value="" id="sf_captcha" autocomplete="off"></td>
</tr>
<tr>
<td colspan="3" align="center"><button name="sf_signup_button" type="button" id="sf_signup_button">Sign Up</button></td>
</tr>
<tr>
<td colspan="3" align="left">All fields are required.</td>
</tr>
</tbody></table>
<input type="hidden" id="form_name" name="form_name" value="signup-form" />
</form></div>
<script>
$(function() {
    $( "#sf_dob" ).datepicker({
        showOn: "button",
        buttonImage: "<?php bloginfo('template_url'); ?>/images/calendar.png",
        buttonImageOnly: true,
        maxDate:0,
        changeMonth: true,
        changeYear: true,
        yearRange: "c-50:c+50",
        dateFormat: "dd-mm-yy"
    });
});

$("#sf_signup_button").click(function() {
	var username = $("#sf_username");
	var email = $("#sf_email");
	var password = $("#sf_password");
	var password2 = $("#sf_password2");
	var dob = $("#sf_dob");
	var father_name = $("#sf_father_name");
	var grand_father_name = $("#sf_grand_father_name");
	var mother_name = $("#sf_mother_name");
	var nic_no = $("#sf_nic_no");
	var membership = $("#sf_membership");
	var amroha_mohalla = $("#sf_amroha_mohalla");
	var highest_education = $("#sf_highest_education");
	var occupation = $("#sf_occupation");
	var res_address = $("#sf_res_address");
	var city = $("#sf_city");
	var country = $("#sf_country");
	var cell_phone = $("#sf_cell_phone");
	var res_phone = $("#sf_res_phone");
	var office_phone = $("#sf_office_phone");
	var photo_file = $("#sf_photo_file");
	var captcha = $("#sf_captcha");
	var signup_button = $("#sf_signup_button");
	var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var re2 = /^(\d{5})+\-+(\d{7})+\-+(\d)+$/;
	var error_msg = "";

	signup_button.attr("disabled", "disabled");
	signup_button.html('Wait...');
	
	if(username.val() == ''){
		error_msg += '- Name field is required.\n';
	}
	if(email.val() == ''){
		error_msg += '- Email field is required.\n';
	}else if(!re.test(email.val())){
		error_msg += '- Email field must contain a valid email address.\n';
	}
	if(password.val() == ''){
		error_msg += '- Password field is required.\n';
	}else if(password.val().length < 6){
		error_msg += '- Password field must be at least 6 characters in length.\n';
	}
	if(password2.val() == ''){
		error_msg += '- Password Confirmed field is required.\n';
	}else if(password.val() != password2.val()){
		error_msg += '- Password Confirmed field does not match the Password field.\n';
	}
	if(dob.val() == ''){
		error_msg += '- Date of Birth field is required.\n';
	}
	if(father_name.val() == ''){
		error_msg += '- Father Name field is required.\n';
	}
	if(grand_father_name.val() == ''){
		error_msg += '- Grand Father Name field is required.\n';
	}
	if(mother_name.val() == ''){
		error_msg += '- Mother Name field is required.\n';
	}
	if(nic_no.val() == ''){
		error_msg += '- NIC # field is required.\n';
	}else if(!re2.test(nic_no.val())){
		error_msg += '- NIC # field must contain a valid NIC #.\n';
	}
	if(membership.val() == '0'){
		error_msg += '- Membership field is required.\n';
	}
	if(amroha_mohalla.val() == '0'){
		error_msg += '- Amroha Mohalla field is required.\n';
	}
	if(highest_education.val() == '0'){
		error_msg += '- Highest Education field is required.\n';
	}
	if(occupation.val() == ''){
		error_msg += '- Occupation field is required.\n';
	}
	if(res_address.val() == ''){
		error_msg += '- Res. Address field is required.\n';
	}
	if(city.val() == ''){
		error_msg += '- City field is required.\n';
	}
	if(country.val() == ''){
		error_msg += '- Country field is required.\n';
	}
	if(cell_phone.val() == ''){
		error_msg += '- Cell Phone # field is required.\n';
	}
	if(res_phone.val() == ''){
		error_msg += '- Res. Phone # field is required.\n';
	}
	if(office_phone.val() == ''){
		error_msg += '- Office Phone # field is required.\n';
	}
	if(photo_file.val()==''){
		error_msg += '- Please upload a photo file.\n';
	}
	if(captcha.val() == ''){
		error_msg += '- Captcha field is required.\n';
	}else if(captcha.val() != ''){
		$.ajax({url:"<?php bloginfo('template_directory'); ?>/php/captcha/check_captcha.php?captcha="+captcha.val(),
		async: false,
		success:function(result){
		if(result == "OK"){
			//alert("Captcha is correct");
		}else{
			//alert(result);
			error_msg += '- Fill correct captcha.\n';
		}
		}});
	}
	if(error_msg!==""){
		alert('Kindly resolve the following error(s) first:-\n'+error_msg);
		signup_button.html('Sign Up');
		signup_button.removeAttr("disabled");  
	//}else{
		document.getElementById('user_sign_up_form').submit();
	}
	/*
	else{
		
		if(email.val() != '' && re.test(email.val())){
			$.ajax({url:"http://localhost/asa/users/check_email/"+encodeURIComponent(email.val()),success:function(result){
					if(result != "OK"){
						alert(result);
						email.focus();
						return false;
					}else{
						return true;
					}
				}
			});
		}
	}*/
});
</script>