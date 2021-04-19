<?php

class Consultation{
	protected $patient;
	protected $doctor;
	protected $pdo;
	function __construct($pdo){
		$this->pdo=$pdo;
	}

	function acceptRequest($patient, $doctor){
		try {
			$this->patient=$patient;
			$this->doctor=$doctor;
			$sql="insert into consultation (patient, doctor) select id_patient, id_doctor from demande_attente where id_patient=:patient and id_doctor=:doctor";
			$accept_statement=$this->pdo->prepare($sql);
			$accept_statement->bindValue(':patient', $this->patient);
			$accept_statement->bindValue(':doctor', $this->doctor);
			$accept_statement->execute();
		
		} catch (PDOException $e) {
			$e->getMessage();
		}

	}
	function ifAccepted($patient, $doctor,$data){
		try {
			$this->patient=$patient;
			$this->doctor=$doctor;
			$sql="select * from consultation where patient=:patient and doctor=:doctor";
			$statement=$this->pdo->prepare($sql);
			$statement->bindValue(':patient', $this->patient);
			$statement->bindValue(':doctor', $this->doctor);
			$statement->execute();
			if ($data==false) {
			 	return $statement->rowCount();
			 }else{
				return $statement->fetch(PDO::FETCH_ASSOC);
			 }
		} catch (PDOException $e) {
			$e->getMessage();
		}
		
	}
	function getAccepted($doctor,$data){
		try {
			$this->doctor=$doctor;
			$sql="select * from consultation where doctor=:doctor";
			$statement=$this->pdo->prepare($sql);
			$statement->bindValue(':doctor', $this->doctor);
			$statement->execute();
			if ($data==false) {
			 	return $statement->rowCount();
			 }else{
				return $statement->fetchAll(PDO::FETCH_OBJ);
			 }
		} catch (PDOException $e) {
			$e->getMessage();
		}
		
	}
	function getAcceptedPatient($patient,$data){
		try {
			$this->patient=$patient;
			$sql="select * from consultation where patient=:patient";
			$statement=$this->pdo->prepare($sql);
			$statement->bindValue(':patient', $this->patient);
			$statement->execute();
			if ($data==false) {
			 	return $statement->rowCount();
			 }else{
				return $statement->fetchAll(PDO::FETCH_OBJ);
			 }
		} catch (PDOException $e) {
			$e->getMessage();
		}
		
	}
	function deleteAccepted($patient, $doctor){
		try {
			$this->patient=$patient;
			$this->doctor=$doctor;
			$sql="delete from consultation where patient=:patient and doctor=:doctor";
			
			$delete_statement=$this->pdo->prepare($sql);
			$delete_statement->bindValue(':patient', $this->patient);
			$delete_statement->bindValue(':doctor', $this->doctor);
			$delete_statement->execute();
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}