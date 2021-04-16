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
	function updateService($id_service, $permanance){
	try {

		$services=$this->pdo->prepare("update services_medicaux set permanance=:permanance where id_service=:id_service");
		$services->bindValue(':permanance', $this->permanance);
		$services->bindValue(':id_service', $this->id_service);
		$services->execute();
 		
 		return $services->fetchAll(PDO::FETCH_OBJ);
		}catch (PDOException $e) {
			$e->getMessage();
		}		
	}
}