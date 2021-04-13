<?php 

require_once 'User.php';

class Admin extends User{
	function __contruct($pdo){
		parent::__contruct($pdo);
	}
}