<?php 

if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='admin' && isset($_SESSION['user_id'])) {


require 'admin.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}

