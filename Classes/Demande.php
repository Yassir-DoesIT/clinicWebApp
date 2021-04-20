<?php

class Demande {
	protected $id_patient;
	protected $id_doctor;
	protected $pdo;
	function __construct($pdo){
		$this->pdo=$pdo;
	}
	function ifSent($id_patient, $id_doctor){
		try {
			$this->id_patient=$id_patient;
			$this->id_doctor=$id_doctor;
			$sql="select * from demande_attente where id_patient=:id_patient and id_doctor=:id_doctor";
			$result=$this->pdo->prepare($sql);
			$result->bindValue(':id_patient', $this->id_patient);
			$result->bindValue(':id_doctor', $this->id_doctor);
			$result->execute();
			 return $result->rowCount();
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function getRequests($id_doctor,$starting_number, $result_per_page, $data){
		try {
			$this->id_doctor=$id_doctor;
			if ($starting_number!=null && $result_per_page!=null && $data) {
					$sql="select * from demande_attente where id_doctor=:id_doctor LIMIT :starting_number, :result_per_page";
					$result=$this->pdo->prepare($sql);
					$result->bindValue(':id_doctor', $this->id_doctor);
					$result->bindValue(':starting_number', $starting_number);
					$result->bindValue(':result_per_page', $result_per_page);
					$result->execute();
					return $result->fetchAll(PDO::FETCH_OBJ);
			}
			if ($data==true) {
					$sql="select * from demande_attente where id_doctor=:id_doctor";
					$result=$this->pdo->prepare($sql);
					$result->bindValue(':id_doctor', $this->id_doctor);
					$result->execute();
					return $result->fetchAll(PDO::FETCH_OBJ);
			}else{
					$sql="select * from demande_attente where id_doctor=:id_doctor";
					$result=$this->pdo->prepare($sql);
					$result->bindValue(':id_doctor', $this->id_doctor);
					$result->execute();
					return $result->rowCount();
			}
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

	function sendRequest($id_patient, $id_doctor){
		try {
			$this->id_patient=$id_patient;
			$this->id_doctor=$id_doctor;
			$sql="insert into demande_attente (id_patient, id_doctor) values(:id_patient,:id_doctor)";
			$result=$this->pdo->prepare($sql);
			$result->bindValue(':id_patient', $this->id_patient);
			$result->bindValue(':id_doctor', $this->id_doctor);
			$result->execute();
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function deleteRequest($id_patient, $id_doctor){
		try {
			$this->id_patient=$id_patient;
			$this->id_doctor=$id_doctor;
			$sql="delete from demande_attente where id_patient=:id_patient and id_doctor=:id_doctor";
			$delete_statement=$this->pdo->prepare($sql);
			$delete_statement->bindValue(':id_patient', $this->id_patient);
			$delete_statement->bindValue(':id_doctor', $this->id_doctor);
			$delete_statement->execute();
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	
}