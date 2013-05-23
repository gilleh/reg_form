<?php if (!defined('BASEPATH')){ die('Access denied.'); } 

$em = filter_input(INPUT_POST, trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$pw = filter_input(INPUT_POST, trim($_POST['password']));
$fn = filter_input(INPUT_POST, trim($_POST['first_name']));
$ln = filter_input(INPUT_POST, trim($_POST['last_name']));
$dob = filter_input(INPUT_POST, trim($_POST['date_of_birth']));

echo $em."<br/>";
echo $pw."<br/>";
echo $fn."<br/>";
echo $ln."<br/>";
echo $dob."<br/>";

?>