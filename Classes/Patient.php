<?php
require_once "User.php";

class Patient extends User {
	function __construct($pdo){
		parent::__construct($pdo);
	}

	function selectPatient($user_id){
		try {
			$this->user_id=$user_id;
			$patient=$this->pdo->prepare("select * from utilisateurs where role='p' and id_user=:user_id");
			$patient->bindValue(':user_id', $this->user_id, PDO::PARAM_STR);
			$patient->execute();
			return $patient->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			$e->getMessage();
		}

	}
}