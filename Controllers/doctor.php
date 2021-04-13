<?php 
if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='doctor' && isset($_SESSION['user_id'])) {
require 'doctor.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='doctor')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}
