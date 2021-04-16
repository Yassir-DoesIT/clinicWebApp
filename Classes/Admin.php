<?php 

require_once 'User.php';
class Admin extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}

	
	function Approve($user_id){
		try {
			$approve=$this->pdo->prepare("update utilisateurs set estverifier=1 where user_id=?");
			$approve->execute($user_id);
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}