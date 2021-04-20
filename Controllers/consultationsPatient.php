<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
if (isset($_SESSION['role']) && !($_SESSION['role']=='patient')) {
	header('location:'. $_SESSION['role']);
}
$result_per_page=8;
$rows = $demande->getRequests($_SESSION['user_id'], false);

$consultations_rows=$consultation->getAcceptedPatient($_SESSION['user_id'], null, null);
$pages=ceil($consultations_rows/$result_per_page);
if (!isset($_GET['page'])) {
	$page=1;
}else{
	$page=$_GET['page'];
}
$starting_number=($page-1)*$result_per_page;
$consultations=$consultation->getAcceptedPatient($_SESSION['user_id'], $starting_number, $result_per_page);
require 'consultationsPatient.view.php';