<?php 
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
if (isset($_SESSION['role']) && !($_SESSION['role']=='doctor')) {
	header('location:'. $_SESSION['role']);
}
$rows = $demande->getRequests($_SESSION['user_id'], false);
$ifSent = $demande->ifSent($_SESSION['patient_id'], $_SESSION['user_id']);

$ifAccepted= $consultation->ifAccepted($_SESSION['patient_id'], $_SESSION['user_id'], false);
if ($ifSent==0 && $ifAccepted==0) {
	header('location: doctor');
}elseif (isset($_POST['accept'])) {
		$consultation->acceptRequest($_POST['patient_id'], $_SESSION['user_id']);
		$demande->deleteRequest($_POST['patient_id'], $_SESSION['user_id']);
		$ifSent = $demande->ifSent($_SESSION['patient_id'], $_SESSION['user_id']);
		$ifAccepted= $consultation->ifAccepted($_POST['patient_id'], $_SESSION['user_id'], false);
		header('location: patientProfile?patientProfile='. $_POST['patient_id']);
}elseif(isset($_POST['refuse'])){
		$demande->deleteRequest($_POST['patient_id'], $_SESSION['user_id']);
		header('location: demande');
}elseif (isset($_POST['delete'])) {
		$consultation->deleteAccepted( $_POST['patient_id'],$_SESSION['user_id']);
		header('location: consultationsDoctor');
}




	

$profile=$patient->selectPatient($_SESSION['patient_id']);
require 'patientProfile.view.php';