<?php
require_once "User.php";

class Patient extends User {
	function __contruct($pdo){
		parent::__contruct($pdo);
	}
}