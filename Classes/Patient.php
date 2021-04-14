<?php
require_once "User.php";

class Patient extends User {
	function __construct($pdo){
		parent::__construct($pdo);
	}
}