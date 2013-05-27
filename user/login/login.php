<?php
include_once('../../private/reg_funct.php');
$reg = new Reg();
if (isset($_COOKIE['user'])){
	$reg->redirectUser('You are already logged in...', 'user/');
}

// Email
if (isset($_POST['email']) && !empty($_POST['email'])){
	$clean_data['email'] = $reg->SVFilterVar($_POST['email'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
	if (!$clean_data['email']){
		$reg->redirectUser('Error: invalid email.', '');
	} 
} else {
	$reg->redirectUser('Error: invalid email.', '');
}

// Password
if (isset($_POST['password']) && !empty($_POST['password'])){
	$clean_data['password'] = $reg->SVFilterVar($_POST['password'],FILTER_UNSAFE_RAW);
	if (!$clean_data['password']){
		$reg->redirectUser('Error: invalid password.', '');	
	}	
} else {
	$reg->redirectUser('Error: invalid password.', '');	
}

if ($reg->DB_checkLogin($clean_data)){
	$reg->redirectUser('Success! Logging in...', 'user/');	
} else {
	$reg->redirectUser('Incorrect login.', '');	
}
?>