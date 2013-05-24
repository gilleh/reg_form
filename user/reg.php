<?php //if (!defined('BASEPATH')){ die('Access denied.'); } 


include('../private/db_connect.php');
$input_data['em'] = $_POST['email'];
$input_data['pw'] = $_POST['password'];
$input_data['fn'] = $_POST['first_name'];
$input_data['ln'] = $_POST['last_name'];
$input_data['dob'] = $_POST['date_of_birth'];

$clean_data['email'] = SVFilterVar($input_data['em'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
$clean_data['password'] = SVFilterVar($input_data['pw'],FILTER_SANITIZE_STRING);
$clean_data['first_name'] = SVFilterVar($input_data['fn'],FILTER_SANITIZE_STRING);
$clean_data['last_name'] = SVFilterVar($input_data['ln'],FILTER_SANITIZE_STRING);
$clean_data['date_of_birth'] = SVFilterVar($input_data['dob'],FILTER_SANITIZE_STRING);

if (!$clean_data['email']){
	die('Error in input: invalid email.');
}
if (!$clean_data['password']){
	die('Error in input: invalid password.');
}
if (!$clean_data['first_name']){
	die('Error in input: invalid first name.');
}
if (!$clean_data['last_name']){
	die('Error in input: invalid last name.');
}
if (!$clean_data['date_of_birth']){
	die('Error in input: invalid date of birth.');
}

//die('OK');
//echo $em."<br/>";
//echo $pw."<br/>";
//echo $fn."<br/>";
//echo $ln."<br/>";
//echo $dob."<br/>";

$db = new DB_connect();
$db->DB_reg_submit($clean_data);
//header('Location: http://localhost/reg_form/?test='.$db->host_info);
//echo 'Success... '.$db->host_info."\n";

function SVFilterVar($var, $sFilter = FALSE, $vFilter = FALSE){
	if ($var != ""){
		if ($sFilter){
			$santized_var = filter_var($var, $sFilter);
		
			if ($vFilter){
				if (filter_var($santized_var, $vFilter)) {
					return $santized_var;
				} else {
					return FALSE;
				}
			} 
			return $santized_var;
		} else {
			return $var;
		}
	} else {
		return FALSE;
	}
}

?>