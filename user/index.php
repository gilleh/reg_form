<?php
require_once('../private/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>css/reg.css" />
</head>

<body>
	<?php
		if (!isset($_COOKIE['user'])){
			$reg->redirectUser('You must login or register to view your profile...', '');
		} else {
			$user_info = explode("|", $_COOKIE['user']);
			date_default_timezone_set('Europe/London');
			$date_of_birth = new DateTime($user_info[2]);
			$time_stamp = new DateTime($user_info[3]);
		}
	?>
	<div id="container">
		<div id="userbar">
			Welcome
			<div id="logout"><a href="<?php echo BASEPATH ?>user/logout/logout.php">Logout</a></div>
		</div>
		<div id="userinfo">
			<div class="userrow">Name: <?php echo ucfirst($user_info[0]).' '.ucfirst($user_info[1]); ?></div>
			<div class="userrow">Born: <?php echo $date_of_birth->format('d/m/Y'); ?></div>
			<div class="userrow">Member since: <?php 
				if($time_stamp->format('d/m/Y') === date('d/m/Y')){
					echo 'Today!';
				} else {
					echo $time_stamp->format('d/m/Y');
				} ?>
			</div>
		</div>
	</div>
</body>
</html>