<?php //if (!defined('BASEPATH')){ die('Access denied.'); } 
include('../private/db_connect.php');
$input_data['em'] = $_POST['email'];
$input_data['pw'] = $_POST['password'];
$input_data['fn'] = $_POST['first_name'];
$input_data['ln'] = $_POST['last_name'];
$input_data['dob'] = $_POST['date_of_birth'];

$clean_data['email'] = filter_var($input_data['em'],FILTER_VALIDATE_EMAIL);
$clean_data['password'] = filter_var($input_data['pw']);
$clean_data['first_name'] = filter_var($input_data['fn']);
$clean_data['last_name'] = filter_var($input_data['ln']);
$clean_data['date_of_birth'] = filter_var($input_data['dob']);

if(!empty($input_data)){
	foreach($input_data as $i){
		
	}
}
//echo $em."<br/>";
//echo $pw."<br/>";
//echo $fn."<br/>";
//echo $ln."<br/>";
//echo $dob."<br/>";

$db = new DB_connect();
$db->DB_reg_submit($clean_data);
//header('Location: http://localhost/reg_form/?test='.$db->host_info);
//echo 'Success... '.$db->host_info."\n";
?>