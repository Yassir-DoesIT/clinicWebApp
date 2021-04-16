<?php

require_once "User.php";

class Doctor extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}

	function selectNotApproved(){
		$doctors=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=0");
		$doctor->execute();

	}
	function Approve($user_id){
		$approve=$this->pdo->prepare("update utilisateurs set estverifier=1 where user_id=:user_id")
	}

}