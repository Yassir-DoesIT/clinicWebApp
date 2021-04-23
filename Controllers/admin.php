<?php 

if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='admin' && isset($_SESSION['user_id'])) {

	if (isset($_POST['insertForm'])) {
		if (isset($_POST['quartierDropDownInsert'])) {
			$result=$service->addService($_POST['quartierDropDownInsert'], $_POST['nom'], $_POST['permanence'], floatval($_POST['lat']), floatval($_POST['lng']));
		}else{
			$result=['errorMessage'=>'Fill the form correctly'];
		}
	}
	if (isset($_POST['editForm'])) {
		// var_dump($_POST);
		if (isset($_POST['serviceDropDown'])) {
			$result=$service->updateService($_POST['serviceDropDown'], $_POST['nom'], $_POST['permanence'], $_POST['lat'], $_POST['lng']);
		}else{
			$result=['errorMessage'=>'Fill the form correctly'];
		}
		
	}
	$rows=$doctor->selectNotApproved(false);
	$notApprovedDoctors=$doctor->selectNotApproved(true);
require 'admin.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}
