<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
  if ($_POST['role']=='d') {
  	$result = $doctor->logInUser($_POST['email'],$_POST['password'], 'd');
  }elseif ($_POST['role']=='p') {
  	$result = $patient->logInUser($_POST['email'],$_POST['password'], 'p');
  }
}
// IF USER ALREADY LOGGED IN
if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}
}
require 'main.view.php';