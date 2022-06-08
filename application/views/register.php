<!DOCTYPE html>
<html>
<head>
	<title>Register - CC2022</title>
</head>
<body>
	<h2>RDS - EC2</h2>
	<h3>Rafael Nixon</h3>
	<h4>05311940000025</h4>
	<br>
	<?php echo validation_errors(); ?>
	<br>
	<form action="<?php echo base_url('welcome/register'); ?>" method="post">		
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Repeat Password</td>
				<td><input type="password" name="repassword"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Register"></td>
			</tr>
			<tr>
				<td>Already have account?</td>
				<td><a href="<?php echo base_url('welcome/login') ?>">Login</a></td>
			</tr>
		</table>
	</form>
</body>
</html>