<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
  if ($_POST['role']=='a') {
  	$result = $admin->logInUser($_POST['email'],$_POST['password'], 'a');
  }elseif ($_POST['role']=='d') {
  	$result = $admin->logInUser($_POST['email'],$_POST['password'], 'd');
  }elseif ($_POST['role']=='p') {
  	$result = $admin->logInUser($_POST['email'],$_POST['password'], 'p');
  }
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email']) && isset($_SESSION['role'])){
	if ($_SESSION['role']=='a') {
		header('Location: admin');
		exit;
	}elseif ($_SESSION['role']=='d') {
		header('Location: doctor');
		exit;
	}elseif ($_SESSION['role']=='p') {
		header('Location: patient');
		exit;
	}
  
  
}
}
require 'main.view.php';