<?php 

if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='admin' && isset($_SESSION['user_id'])) {

	// if (isset($_POST['insertForm'])) {
	// 	$result=$service->addService($quartier,$ville, $intitule_service, $permanance, $lat_service, $lng_service)
	// }
	// if (isset($_POST['editForm'])) {
	// 	$result=$service->
	// }
require 'admin.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}

