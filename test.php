<?php
require('lib/password.php');
$passwordHash = password_hash('so', PASSWORD_BCRYPT);
echo $passwordHash.' - '.strlen($passwordHash);
if (password_verify('secret-password', $passwordHash)) {
    //echo 'Correct password: '.$passwordHash;
} else {
	//echo 'Wrong password: '.$passwordHash;
} 
?>