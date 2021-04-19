<?php


class Message{
	protected $id_expediteur;
	protected $id_destinataire;
	protected $contenu;
	protected $pdo;
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
}