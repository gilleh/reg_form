<?php 
include('../../private/reg_funct.php');
require_once('../../lib/password.php');
$reg = new Reg(); //init class

if (isset($_COOKIE['user'])){
	$reg->redirectUser('You are already logged in...');
}

// Email
if (isset($_POST['email']) && !empty($_POST['email'])){
	$clean_data['email'] = $reg->SVFilterVar($_POST['email'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
	if (!$clean_data['email']){
		$reg->redirectUser('Error: invalid email.');
	} else {
		if ($reg->DB_checkEmail($clean_data['email'])){
			$reg->redirectUser('Email already in use.', '');
		}
	}
} else {
	$reg->redirectUser('Error: please enter an email address.', '');
}

// Password
if (isset($_POST['password']) && !empty($_POST['password'])){
	$clean_data['password'] = $reg->SVFilterVar($_POST['password'],FILTER_UNSAFE_RAW);
	if (!$clean_data['password']){
		$reg->redirectUser('Error: invalid password.', '');		
	} else {
		if (strlen($clean_data['password']) < 6) {
			$reg->redirectUser('Error: password did not meet the requirements.', '');
		} else {
			$clean_data['password'] = password_hash($clean_data['password'], PASSWORD_BCRYPT);
		}
	}	
} else {
	$reg->redirectUser('Error: please enter a password.', '');
}

// First name
if (isset($_POST['first_name']) && !empty($_POST['first_name'])){
	$clean_data['first_name'] = $reg->SVFilterVar($_POST['first_name'],FILTER_SANITIZE_STRING);
	if (!$clean_data['first_name']){
		$reg->redirectUser('Error: invalid first name.', '');
	}
} else {
	$reg->redirectUser('Error: please enter your first name.', '');
}

// Last name
if (isset($_POST['last_name']) && !empty($_POST['last_name'])){
	$clean_data['last_name'] = $reg->SVFilterVar($_POST['last_name'],FILTER_SANITIZE_STRING);
	if (!$clean_data['last_name']){
		$reg->redirectUser('Error: invalid last name.', '');
	}
} else {
	$reg->redirectUser('Error: please enter your last name.', '');
}


if (isset($_POST['month']) && !empty($_POST['month'])){
	$clean_data['month'] = $reg->SVFilterVar($_POST['month'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
} else {
	$reg->redirectUser('Error: please enter a month.', '');
}

if (isset($_POST['day']) && !empty($_POST['day'])){
	$clean_data['day'] = $reg->SVFilterVar($_POST['day'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
} else {
	$reg->redirectUser('Error: please enter a day.', '');
}

if (isset($_POST['year']) && !empty($_POST['year'])){
	$clean_data['year'] = $reg->SVFilterVar($_POST['year'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
	if ($clean_data['year'] > (int)date('Y')){
		$clean_data['year'] = (int)date('Y');
	}
} else {
	$reg->redirectUser('Error: please enter a year.', '');
}
// Date of birth
if ($clean_data['year'] && $clean_data['month'] && $clean_data['day']){
	if (!checkdate($clean_data['month'], $clean_data['day'], $clean_data['year'])){
		$reg->redirectUser('Error: invalid date of birth.', '');
	}
}
$clean_data['date_of_birth'] = new DateTime($clean_data['year'].'-'.$clean_data['month'].'-'.$clean_data['day']);
$clean_data['date_of_birth'] = $clean_data['date_of_birth']->format('Y-m-d');
$clean_data['time_stamp'] = date('Y-m-d');

if ($reg->DB_reg_submit($clean_data)){	
	$reg->redirectUser('Success! Moving to user page...', 'user/');
} else {
	$reg->redirectUser('Registration failed.', '');
}
?>