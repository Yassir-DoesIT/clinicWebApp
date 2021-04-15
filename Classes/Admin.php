<?php 

require_once 'User.php';
class Admin extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}

	function insertService(){
		try {
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}