<?php
if(isset($_GET['id_valid_code'])){
	amroha_email_verify($_GET['id_valid_code']);
}elseif(isset($_GET['status']) && $_GET['status'] == 'success'){ 
	echo "<p>You Successfully submitted the form. For Email Verification an email is sent to your email Id.<br/>
	Kindly verify your email address by clicking the link given in that mail.</p>";
	echo "<p>Note: Also check spam/junk folder too, sometimes emails are diverted there.</p>";
}else{ ?>
<p>Fill in the form below:-</p>
<?php 
global $username;
global $email;
global $password;
global $password2;
global $dob;
global $father_name;
global $grand_father_name;
global $mother_name;
global $nic_no;
global $membership;
global $amroha_mohalla;
global $highest_education;
global $occupation;
global $res_address;
global $city;
global $country;
global $cell_phone;
global $res_phone;
global $office_phone;
global $form_error_msg;
echo "<div class='error' style='display:none;' tabindex='1'>";
if($form_error_msg != ""){
	echo "Kindly resolve the following error(s) first:-<br/>".$form_error_msg;
}
echo "</div>";
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
<option value="0" >Select any one...</option>
<?php 
$result = $wpdb->get_results("SELECT * FROM amroha_membership ORDER BY id");
foreach ($result as $mem) {
    echo "<option ";
	if ($mem->code == $membership) echo " selected=selected ";
	echo "value='{$mem->code}'>{$mem->full_form}</option>";
}
$result = '';
?>
</select></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_amroha_mohalla">Amroha Mohalla</label></td>
<td class="form-field-separator">:</td>
<td><select name="sf_amroha_mohalla" id="sf_amroha_mohalla">
<option value="0" >Select any one...</option>
<?php 
$result = $wpdb->get_results("SELECT * FROM amroha_mohalla ORDER BY id");
foreach ($result as $moh) {
    echo "<option ";
	if ($moh->code == $membership) echo " selected=selected ";
	echo "value='{$moh->code}'>{$moh->full_form}</option>";
}
$result = '';
?>
</select></td>
</tr>
<tr>
<td class="signup-form-label"><label for="sf_highest_education">Highest Education</label></td>
<td class="form-field-separator">:</td>
<td><select name="sf_highest_education" id="sf_highest_education">
<option value="0" >Select any one...</option>
<?php 
$result = $wpdb->get_results("SELECT * FROM amroha_education e ORDER BY e.position");
foreach ($result as $edu) {
    echo "<option ";
	if ($edu->id == $membership) echo " selected=selected ";
	echo "value='{$edu->id}'>{$edu->education}</option>";
}
$result = '';
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
    <?php
        if($form_error_msg != ""){
            echo "$('div.error').css( 'display', 'block' );";
        }
    ?>
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
		error_msg += '- Name field is required.<br/>';
	}
	if(email.val() == ''){
		error_msg += '- Email field is required.<br/>';
	}else if(!re.test(email.val())){
		error_msg += '- Email field must contain a valid email address.<br/>';
	}else{
			$.ajax({url:"<?php bloginfo('template_directory'); ?>/php/is_email_exist.php?email="+encodeURIComponent(email.val()),async: false,success:function(result){
					if(result == "OK"){
						//alert("Email is OK");
					}else{
						//alert(result);
						error_msg += '- Email entered is already registered.<br/>';
					}
				}
			});
		}
	if(password.val() == ''){
		error_msg += '- Password field is required.<br/>';
	}else if(password.val().length < 6){
		error_msg += '- Password field must be at least 6 characters in length.<br/>';
	}
	if(password2.val() == ''){
		error_msg += '- Password Confirmed field is required.<br/>';
	}else if(password.val() != password2.val()){
		error_msg += '- Password Confirmed field does not match the Password field.<br/>';
	}
	if(dob.val() == ''){
		error_msg += '- Date of Birth field is required.<br/>';
	}
	if(father_name.val() == ''){
		error_msg += '- Father Name field is required.<br/>';
	}
	if(grand_father_name.val() == ''){
		error_msg += '- Grand Father Name field is required.<br/>';
	}
	if(mother_name.val() == ''){
		error_msg += '- Mother Name field is required.<br/>';
	}
	if(nic_no.val() == ''){
		error_msg += '- NIC # field is required.<br/>';
	}else if(!re2.test(nic_no.val())){
		error_msg += '- NIC # field must contain a valid NIC #.<br/>';
	}
	if(membership.val() == '0'){
		error_msg += '- Membership field is required.<br/>';
	}
	if(amroha_mohalla.val() == '0'){
		error_msg += '- Amroha Mohalla field is required.<br/>';
	}
	if(highest_education.val() == '0'){
		error_msg += '- Highest Education field is required.<br/>';
	}
	if(occupation.val() == ''){
		error_msg += '- Occupation field is required.<br/>';
	}
	if(res_address.val() == ''){
		error_msg += '- Res. Address field is required.<br/>';
	}
	if(city.val() == ''){
		error_msg += '- City field is required.<br/>';
	}
	if(country.val() == ''){
		error_msg += '- Country field is required.<br/>';
	}
	if(cell_phone.val() == ''){
		error_msg += '- Cell Phone # field is required.<br/>';
	}
	if(res_phone.val() == ''){
		error_msg += '- Res. Phone # field is required.<br/>';
	}
	if(office_phone.val() == ''){
		error_msg += '- Office Phone # field is required.<br/>';
	}
	if(photo_file.val()==''){
		error_msg += '- Please upload a photo file.<br/>';
	}
	if(captcha.val() == ''){
		error_msg += '- Captcha field is required.<br/>';
	}else{
		$.ajax({url:"<?php bloginfo('template_directory'); ?>/php/captcha/check_captcha.php?captcha="+captcha.val(),
		async: false,
		success:function(result){
		if(result == "OK"){
			//alert("Captcha is correct");
		}else{
			//alert(result);
			error_msg += '- Fill correct captcha.<br/>';
		}
		}});
	}
	if(error_msg!==""){
		//alert('Kindly resolve the following error(s) first:-\n'+error_msg);
        $('div.error').html('Kindly resolve the following error(s) first:-<br/>'+error_msg)
        $('div.error').css( 'display', 'block' );
        $('div.error').focus();
		signup_button.html('Sign Up');
		signup_button.removeAttr("disabled");  
	}else{
        $('div.error').css( 'display', 'none' );
		document.getElementById('user_sign_up_form').submit();
	}
		
});
</script>
<?php } ?>