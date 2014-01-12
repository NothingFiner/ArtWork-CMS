<?php 
$pageTitle = "Admin Login";
$section = "login";
include('include/header.php');
?>
	<form id="admin_login" method="post">
		<input type="password" name="password" id="password" value="">
		<input type="submit" name="loginsub" value="login">
	</form>

<?php include('include/footer.php'); ?>