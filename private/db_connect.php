<?php
include('config.php');

class DB_connect extends PDO {
    public function __construct() {
        try {
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   				 
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		} 
    }
	public function DB_reg_submit($data){
		try {
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   	
			 
			$sub = $this->prepare('INSERT INTO '.DB_TABLE.' (email, password, first_name, last_name, date_of_birth) VALUES (:email, :password, :first_name, :last_name, :date_of_birth)');
			$sub->execute(array(
			':email' => $data['email'],
			':password' => $data['password'],
			':first_name' => $data['first_name'],
			':last_name' => $data['last_name'],
			':date_of_birth' => $data['date_of_birth']
			));
		 
			echo $sub->rowCount();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
}

//$db = new foo_mysqli('localhost', 'my_user', 'my_password', 'my_db');
//
//echo 'Success... ' . $db->host_info . "\n";

?>