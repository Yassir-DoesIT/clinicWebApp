<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
$rows = $demande->getRequests($_SESSION['user_id'], null,null,false);
if ($_SESSION['role']=='patient') {
	$consultations=$consultation->getAcceptedPatient($_SESSION['user_id'], null, null, true);
$consultations_rows=$consultation->getAcceptedPatient($_SESSION['user_id'], null ,null , false);
}elseif ($_SESSION['role']=='doctor') {
	$consultations=$consultation->getAccepted($_SESSION['user_id'], null , null , true);
$consultations_rows=$consultation->getAccepted($_SESSION['user_id'], null , null, false);
}
if (isset($_POST['send'])) {
	if (isset($_POST['contenu'])) {
		$send=$message->sendMessage($_SESSION['user_id'], $_POST['receiver_id'], $_POST['contenu']);

	}
}else{
	header('location: '.$_SESSION['role']);
}

header('location: ' .$_SESSION['location']);