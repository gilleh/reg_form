<?php
include('private/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>/css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>/css/reg.css" />
<script type="text/javascript" src="js/reg.js"></script>
</head>

<body>
	<h1>Register!</h1>
	<form method="post" action="user/reg/reg.php" onsubmit="return checkPasswords();">
		<input type="text" placeholder="Email" name="email" /> example@domain.com<br/>
		<input type="password" placeholder="Password" name="password" id="pw1"/> Must be at least 6 characters.<br/>
		<input type="password" placeholder="Repeat password" id="pw2"/> <br/>
		<input type="text" placeholder="First Name" name="first_name"/><br/>
		<input type="text" placeholder="Last Name" name="last_name"/><br/>
		<!--<input type="text" placeholder="Date of Birth" name="date_of_birth"/><br/>!-->
		<select name="day">
		<?php
			for ($i=1;$i<=31;$i++){
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
		?>
		</select>
		<select name="month">
		<?php
			$months = array('Jan','Feb','Mar','Apr','May','June','July','Aug','Sep','Oct','Nov','Dec');
			for ($i=0;$i<12;$i++){
				echo '<option value="'.($i+1).'">'.$months[$i].'</option>';
			}
		?>
		</select>
		<input style="width:42px;" maxlength="4" type="text" placeholder="<?php echo date('Y'); ?>" name="year"/> Date of Birth - DD/MM/YYYY<br/>
		<button type="submit">Register</button>
	</form> 
</body>
</html>