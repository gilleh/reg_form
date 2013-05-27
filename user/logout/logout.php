<?php
	if(!isset($_COOKIE['user'])){
		require('../../private/config.php');
		header('Refresh: 2; url='.BASEPATH);
		echo 'You are not logged in...';		
	} else {
		require('../../private/config.php');
		setcookie('user', '', time()-3600, "/reg_form/");
		header('Refresh: 2; url='.BASEPATH);
		echo 'Logging out...';		
	}
?>	