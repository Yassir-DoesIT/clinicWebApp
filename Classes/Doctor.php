<?php

require_once "User.php";

class Doctor extends User{
	function __construct($pdo){
		parent::__construct($pdo);
	}


}