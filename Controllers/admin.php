<?php 

if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='admin' && isset($_SESSION['user_id'])) {

	if (isset($_POST['insertForm'])) {
		// var_dump($_POST);
		$result=$service->addService($_POST['quartierDropDownInsert'], $_POST['nom'], $_POST['permanence'], floatval($_POST['lat']), floatval($_POST['lng']));
	}
	if (isset($_POST['editForm'])) {
		// var_dump($_POST);
		$result=$service->updateService($_POST['serviceDropDown'], $_POST['nom'], $_POST['permanence'], $_POST['lat'], $_POST['lng']);
	}
require 'admin.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}

