<?php
include('config.php');

class Reg extends PDO {
    public function __construct(){
        
    }

    //Submit registration details to database
	public function DB_reg_submit($data){
		try {
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   	
			 
			$query = $this->prepare('INSERT INTO '.DB_TABLE.' (email, password, first_name, last_name, date_of_birth) VALUES (:email, :password, :first_name, :last_name, :date_of_birth)');
			$query->execute(array(
			':email' => $data['email'],
			':password' => $data['password'],
			':first_name' => $data['first_name'],
			':last_name' => $data['last_name'],
			':date_of_birth' => $data['date_of_birth']
			));
		 
			echo $query->rowCount();
		} catch(PDOException $e){
			echo 'ERROR: '.$e->getMessage();
		}
	}

	//Check if email is taken
	public function checkEmail($email){
		try {
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

			$query = $this->prepare('SELECT email from '.DB_TABLE.' where email = :email');
			$query->execute(array(
			':email' => $email				
			));

			if($query->rowCount() === 1){
				return true;
			} else {
				return false;
			}
		} catch(PDOException $e){
			echo 'ERROR: '.$e->getMessage();
		}
	}

	public function SVFilterVar($var, $sFilter = FALSE, $vFilter = FALSE){
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
}
?>