<?php
include('private/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>

<body>
<?php 
echo 't: '.filter_var('tadasdasd@fhgfgf.com',FILTER_VALIDATE_EMAIL);

?>
	<h1>Register!</h1>
	<form method="post" action="user/reg.php">
		<input type="text" placeholder="Email" name="email"/><br/>
		<input type="password" placeholder="Password" name="password"/><br/>
		<input type="text" placeholder="First Name" name="first_name"/><br/>
		<input type="text" placeholder="Last Name" name="last_name"/><br/>
		<input type="text" placeholder="Date of Birth" name="date_of_birth"/><br/>
		<button type="submit">Register</button>
	</form> 
</body>
</html>