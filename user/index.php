<?php
include('../private/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>/css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>/css/reg.css" />
</head>

<body>
	<div id="userbar"><?php echo ucfirst($_COOKIE['first_name']).' '.ucfirst($_COOKIE['last_name']); ?></div>
	<?php //var_dump($_COOKIE['first_name'],$_COOKIE['last_name'],$_COOKIE['date_of_birth']); ?>
</body>
</html>