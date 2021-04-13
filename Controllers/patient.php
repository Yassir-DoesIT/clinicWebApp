<?php 
if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='patient' && isset($_SESSION['user_id'])) {
require 'patient.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='patient')) {
	header('location:'. $_SESSION['role']);
}else{ 
	header('location: signUpForm#login');
}

