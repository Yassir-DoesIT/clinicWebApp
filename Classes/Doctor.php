<?php

require_once "User.php";

class Doctor extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}

	function selectNotApproved($data){
		try {
		
			if ($data) {
				$doctors=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=0");
			$doctors->execute();
			return $doctors->fetchAll(PDO::FETCH_OBJ);
			}else{
				$doctors=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=0");
			$doctors->execute();
			return $doctors->rowcount();
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}

	}
	
	function searchDoctors($nom, $prenom,$starting_number, $results_per_page){
		try {
			$this->nom=$nom;
			$this->prenom=$prenom;
			if (!($starting_number===null) && !($results_per_page===null)) {
					$sql="select * from utilisateurs where role='d' and estverifier=1 and (lower(nom) LIKE :nom or lower(prenom) LIKE :prenom) or  role='d' and estverifier=1 and (lower(nom) LIKE :prenom or lower(prenom) LIKE :nom) order by nom LIMIT :starting_number, :results_per_page";
					$search=$this->pdo->prepare($sql); 
					$search->bindValue(':nom', "%$this->nom%", PDO::PARAM_STR);
					$search->bindValue(':prenom', "%$this->prenom%", PDO::PARAM_STR);
					$search->bindValue(':starting_number', $starting_number, PDO::PARAM_INT);
					$search->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);
					$search->execute();
					return $search->fetchAll(PDO::FETCH_OBJ);
					// return "inside not null";
			}else {
						$sql="select * from utilisateurs where role='d' and estverifier=1 and (lower(nom) LIKE :nom or lower(prenom) LIKE :prenom) or  role='d' and estverifier=1 and (lower(nom) LIKE :prenom or lower(prenom) LIKE :nom) order by nom";
				$search=$this->pdo->prepare($sql); 
					$search->bindValue(':nom', "%$this->nom%", PDO::PARAM_STR);
					$search->bindValue(':prenom', "%$this->prenom%", PDO::PARAM_STR);
					$search->execute();
					return $search->rowcount();
					// return "inside null";
				}
		
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

	function selectApproved($id_user){
		try {
			$this->user_id=$id_user;
			$doctor=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=1 and id_user=:id_user");
			$doctor->bindValue(':id_user', $this->user_id, PDO::PARAM_STR);
			$doctor->execute();
			if ($doctor->rowcount()==1) {
				return $doctor->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return "user not found";
			}
			
		} catch (PDOException $e) {
			$e->getMessage();
		}

	}
	function approveDoctor($user_id){
		try {
			$this->user_id=$user_id;
			$approve=$this->pdo->prepare("update utilisateurs set estverifier=1 where user_id=?");
			$approve->execute($this->user_id);
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

}