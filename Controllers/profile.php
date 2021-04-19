<?php
$profile=$doctor->selectApproved($_SESSION['doctor_id']);

if (isset($_POST['request'])) {
	if (isset($_POST['doctor_id'])) {
		$rows=$demande->getRequests($_SESSION['user_id'], $_POST['doctor_id'], false);
		if ($rows==0) {
		$demande->sendRequest($_SESSION['user_id'], $_POST['doctor_id']);
		}
	}
	
}
$rows=$demande->getRequests($_SESSION['user_id'], $_SESSION['doctor_id'], false);
	// var_dump($rows);
require 'profile.view.php';