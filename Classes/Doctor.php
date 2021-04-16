<?php

require_once "User.php";

class Doctor extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}

	function selectNotVerified(){
		$doctors=$this->pdo->prepare("select * from utilisateurs where role='d' and estverifier=0")
	}

}