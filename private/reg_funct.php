<?php
include_once('config.php');
require_once('../../lib/password.php');

class Reg extends PDO {
    public function __construct(){
        
    }

    //Submit registration details to database
	public function DB_reg_submit($data){
		try {
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   	
			
			$query = $this->prepare('INSERT INTO '.DB_TABLE.' (email, password, first_name, last_name, date_of_birth, time_stamp) VALUES (:email, :password, :first_name, :last_name, :date_of_birth, :time_stamp)');
			$query->execute(array(
			':email' => $data['email'],
			':password' => $data['password'],
			':first_name' => $data['first_name'],
			':last_name' => $data['last_name'],
			':date_of_birth' => $data['date_of_birth'],
			':time_stamp' => $data['time_stamp']
			));
		 
			if ($query->rowCount() === 1){
				setcookie('user', $data['first_name'].'|'.$data['last_name'].'|'.$data['date_of_birth'].'|'.$data['time_stamp'], time()+3600, "/reg_form/");
				return true;
			} else {
				return false;
			}
		} catch(PDOException $e){
			echo 'ERROR: '.$e->getMessage();
		}
	}

	//Check if email is taken
	public function DB_checkEmail($email){
		try {
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

			$query = $this->prepare('SELECT email from '.DB_TABLE.' WHERE email = :email');
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

	//Check if email is taken
	public function DB_checkLogin($data){
		try {
			
			parent::__construct(DB_DRIVER.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

			$query = $this->prepare('SELECT email,password,first_name,last_name,date_of_birth,time_stamp FROM '.DB_TABLE.' WHERE email = :email');
			$query->execute(array(
			':email' => $data['email']
			));

			if($query->rowCount() === 1){
				while ($row = $query->fetch(PDO::FETCH_OBJ)){
					if (password_verify($data['password'], $row->password)) {		
						setcookie('user', $row->first_name.'|'.$row->last_name.'|'.$row->date_of_birth.'|'.$row->time_stamp, time()+3600, "/reg_form/");						
						return true;					
					} else {
						header('Refresh: 2; url='.BASEPATH.'user/');
						return false;
					}
				} 
			} else {
				die('Incorrect details.');
				return false;
			}
		} catch(PDOException $e){
			echo 'ERROR: '.$e->getMessage();
		}
	}

	//Check sanitize/validate given variable
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

	//Re-direct from successful/failed login/reg attempt
	public function redirectUser($err = '', $url = 'user/', $delay = '2'){
		header('Refresh: '.$delay.'; url='.BASEPATH.$url);
		die($err);
	}
}
?>