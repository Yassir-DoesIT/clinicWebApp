<?php
if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
  if ($_POST['role']=='a') {
  	$result = $admin->logInUser($_POST['email'],$_POST['password'], 'a');

  }
  }
// var_dump($_POST);
require 'adminsignin.view.php';