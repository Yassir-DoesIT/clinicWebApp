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
if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}
}
require 'main.view.php';