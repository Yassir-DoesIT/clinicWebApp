<?php


class Message{
	protected $id_expediteur;
	protected $id_destinataire;
	protected $contenu;
	protected $pdo;
	protected $id_message;
	function __construct($pdo){
		$this->pdo=$pdo;
	}

	function sendMessage($id_expediteur, $id_destinataire, $contenu){
		try {
			$this->id_expediteur=$id_expediteur;
			$this->id_destinataire=$id_destinataire;
			$this->contenu=$contenu;
			$sql="insert into messages (id_expediteur, id_destinataire, contenu) values (:id_expediteur, :id_destinataire, :contenu)";
			$message_statement=$this->pdo->prepare($sql);
			$message_statement->bindValue(':id_expediteur', $this->id_expediteur);
			$message_statement->bindValue(':id_destinataire', $this->id_destinataire);
			$message_statement->bindValue(':contenu', $this->contenu);
			$message_statement->execute();
			return ['successMessage'=>'Sent'];
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function getReceived($id_destinataire){
		try {
			$this->id_destinataire=$id_destinataire;
			$sql="select * from messages where id_destinataire=:id_destinataire";
			$get_statement=$this->pdo->prepare($sql);
			$get_statement->bindValue(':id_destinataire', $this->id_destinataire);
			$get_statement->execute();
			return $get_statement->fetchAll(PDO::FETCH_OBJ);
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function getSent($id_expediteur){
		try {
			$this->id_expediteur=$id_expediteur;
			$sql="select * from messages where id_expediteur=:id_expediteur";
			$get_statement=$this->pdo->prepare($sql);
			$get_statement->bindValue(':id_expediteur', $this->id_expediteur);
			$get_statement->execute();
			return $get_statement->fetchAll(PDO::FETCH_OBJ);
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function getMessage($id_message){
		try {
					$this->$id_message=$id_message;
					$sql="select * from messages where id_message=:id_message";
					$get_statement=$this->pdo->prepare($sql);
					$get_statement->bindValue(':id_message', $this->id_message);

					$get_statement->execute();
					return $get_statement->fetchAll(PDO::FETCH_OBJ);
			
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}