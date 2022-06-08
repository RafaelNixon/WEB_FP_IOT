<!DOCTYPE html>
<html>
<head>
	<title>Welcome - CC2022</title>
</head>
<body>
	<h2>RDS - EC2</h2>
	<h3>Rafael Nixon</h3>
	<h4>05311940000025</h4>
    <br>
    <h2>Welcome, <?php echo $user[0]->username; ?>!</h2>
    <br>
    <a href="<?php echo base_url('welcome/logout') ?>">Logout</a>

</body>
</html>