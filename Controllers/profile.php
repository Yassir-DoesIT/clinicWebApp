<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
if (isset($_SESSION['role']) && !($_SESSION['role']=='patient')) {
	header('location:'. $_SESSION['role']);
}
$ifAccepted= $consultation->ifAccepted( $_SESSION['user_id'], $_SESSION['doctor_id'], false);
$rows=$demande->ifSent($_SESSION['user_id'], $_SESSION['doctor_id']);
$profile=$doctor->selectApproved($_SESSION['doctor_id']);

if (isset($_POST['request'])) {
	if (isset($_POST['doctor_id'])) {
		$rows=$demande->ifSent($_SESSION['user_id'], $_POST['doctor_id']);
		if ($rows==0) {
		$demande->sendRequest($_SESSION['user_id'], $_POST['doctor_id']);
		header('location: profile?profile='. $_POST['doctor_id']);
		}
	}
	
}elseif (isset($_POST['delete'])) {
		$consultation->deleteAccepted($_SESSION['user_id'], $_POST['doctor_id']);
		header('location: consultationsPatient');
}

	// var_dump($rows);
require 'profile.view.php';