<?php 
include('../../private/reg_funct.php');
$reg = new Reg(); //init class

// Email
if (isset($_POST['email']) && !empty($_POST['email'])){
	$input_data['em'] = $_POST['email'];
	$clean_data['email'] = $reg->SVFilterVar($input_data['em'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
	if (!$clean_data['email']){
		die('Error: invalid email.');
	} else {
		if ($reg->DB_checkEmail($clean_data['email'])){
			die('Email already in use.');
		} else {
			//die('Success!');
		}
	}
} else {
	die('Error: please enter an email address.');
}

// Password
if (isset($_POST['password']) && !empty($_POST['password'])){
	$input_data['pw'] = $_POST['password'];
	$clean_data['password'] = $reg->SVFilterVar($input_data['pw'],FILTER_SANITIZE_STRING);
	if (!$clean_data['password']){
		die('Error: invalid password.');		
	} else {
		if (strlen($clean_data['password']) < 6) {
			die('Error: password did not meet the requirements.');
		}
	}	
} else {
	die('Error: please enter a password.');
}

// First name
if (isset($_POST['first_name']) && !empty($_POST['first_name'])){
	$input_data['fn'] = $_POST['first_name'];
	$clean_data['first_name'] = $reg->SVFilterVar($input_data['fn'],FILTER_SANITIZE_STRING);
	if (!$clean_data['first_name']){
		die('Error: invalid first name.');
	}
} else {
	die('Error: please enter your first name.');
}

// Last name
if (isset($_POST['last_name']) && !empty($_POST['last_name'])){
	$input_data['ln'] = $_POST['last_name'];
	$clean_data['last_name'] = $reg->SVFilterVar($input_data['ln'],FILTER_SANITIZE_STRING);
	if (!$clean_data['last_name']){
		die('Error: invalid last name.');
	}
} else {
	die('Error: please enter your last name.');
}


if (isset($_POST['month']) && !empty($_POST['month'])){
	$input_data['month'] = $_POST['month'];
	$clean_data['month'] = $reg->SVFilterVar($input_data['month'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
} else {
	die('Error: please enter a month.');
}

if (isset($_POST['day']) && !empty($_POST['day'])){
	$input_data['day'] = $_POST['day'];
	$clean_data['day'] = $reg->SVFilterVar($input_data['day'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
} else {
	die('Error: please enter a day.');
}

if (isset($_POST['year']) && !empty($_POST['year'])){
	$input_data['year'] = $_POST['year'];
	$clean_data['year'] = $reg->SVFilterVar($input_data['year'],FILTER_SANITIZE_NUMBER_INT,FILTER_VALIDATE_INT);
	if ($clean_data['year'] > (int)date('Y')){
		$clean_data['year'] = (int)date('Y');
	}
} else {
	die('Error: please enter a year.');
}
// Date of birth
if (!$clean_data['year'] && !$clean_data['month'] && !$clean_data['day']){
	die('Error: invalid date of birth.');
}
$clean_data['date_of_birth'] = new DateTime($clean_data['year'].'-'.$clean_data['month'].'-'.$clean_data['day']);
$clean_data['date_of_birth'] = $clean_data['date_of_birth']->format('Y-m-d');
//die('OK');
//echo $em."<br/>";
//echo $pw."<br/>";
//echo $fn."<br/>";
//echo $ln."<br/>";
//echo $dob."<br/>";

$reg->DB_reg_submit($clean_data);
?>