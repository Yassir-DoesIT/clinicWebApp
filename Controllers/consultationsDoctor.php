<?php
if (isset($_SESSION['role']) && !($_SESSION['role']=='doctor')) {
	header('location:'. $_SESSION['role']);
}
$rows = $demande->getRequests($_SESSION['user_id'], false);
$consultations=$consultation->getAccepted($_SESSION['user_id'], true);
$consultations_rows=$consultation->getAccepted($_SESSION['user_id'], false);

require 'consultationsDoctor.view.php';