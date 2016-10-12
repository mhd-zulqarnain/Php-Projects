<div class="login-form form">
	<form action="" method="post" accept-charset="utf-8" id="user_login_form">	
	<table width="100%">
		<tr>
	<td class="login-form-label"><label for="email">Email</label></td>
	<td class="form-field-separator">:</td>
	<td><input type="text" name="email" value="" id="email" size="30" maxlength="40"></td>
	</tr>
		<tr>
	<td class="login-form-label"><label for="password">Password</label></td>
	<td class="form-field-separator">:</td>
	<td><input type="password" name="password" value="" id="password" size="30" maxlength="12"></td>
	</tr>
	<tr>
	<td colspan="3" align="center"><input type="submit" name="login_submit" value="Login">	</td>
	</tr>
	
		<tr>
		<td colspan="3" align="center">Not registered yet? <a href="<?php echo get_option('home'); ?>/sign-up"><span style="color: #660000;font-weight: bold;border-bottom: 2px solid #660000;">For Sign Up, Click here...!</span></a></td>
	</tr>
		</table>
	</form>
</div>