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
	
	function searchDoctor($nom, $prenom){
		try {
				$this->nom=$nom;
				$this->prenom=$prenom;
			$search=$this->pdo->prepare("select * from utilisateurs where nom=:nom and prenom=:prenom and role='d'");
			$search->bindValue(':nom', $this->nom);
			$search->bindValue(':prenom', $this->prenom);
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