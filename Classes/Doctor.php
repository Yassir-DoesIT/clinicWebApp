<?php

require_once "User.php";

class Doctor extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}

	function selectNotApproved(){
		try {
		
			$doctors=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=0");
			$doctor->execute();
			return $doctor->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			$e->getMessage();
		}

	}
	
	function searchDoctors($starting_number, $resuts_per_page){
		try {
			$search=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=1 order by nom LIMIT :starting_number, :resuts_per_page");
			$search->bindValue(':starting_number', $starting_number,PDO::PARAM_INT);
			$search->bindValue(':resuts_per_page', $resuts_per_page,PDO::PARAM_INT);
			$search->execute();
			if ($search->rowcount()>0) {
				return $search->fetchAll(PDO::FETCH_OBJ);
			}else{
				return "You have no friends :(";
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}function searchDoctor(){
		try {
				$this->nom=$nom;
				$this->prenom=$prenom;
			$search=$this->pdo->prepare("select * from utilisateurs where (nom=:nom or prenom=:prenom) and role='d' LIMIT :starting_number, :resuts_per_page");
			$search->bindValue(':nom', $this->nom);
			$search->bindValue(':prenom', $this->prenom);
			$search->bindValue(':starting_number', $starting_number);
			$search->bindValue(':resuts_per_page', $resuts_per_page);
			$search->execute();
			if ($search->rowcount()>0) {
				return $search->fetchAll(PDO::FETCH_OBJ);
			}else{
				return "You have no friends :(";
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

}