<?php
if (isset($_SESSION['role']) && !($_SESSION['role']=='patient')) {
	header('location:'. $_SESSION['role']);
}
$rows = $demande->getRequests($_SESSION['user_id'], false);
$consultations=$consultation->getAcceptedPatient($_SESSION['user_id'], true);
$consultations_rows=$consultation->getAcceptedPatient($_SESSION['user_id'], false);
require 'consultationsPatient.view.php';