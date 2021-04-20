<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
if (isset($_SESSION['role']) && !($_SESSION['role']=='doctor')) {
	header('location:'. $_SESSION['role']);
}
$result_per_page=8;
$rows = $demande->getRequests($_SESSION['user_id'], null,null,false);
$consultations_rows=$consultation->getAccepted($_SESSION['user_id'], null, null, false);

$pages=ceil($consultations_rows/$result_per_page);
if (!isset($_GET['page'])) {
	$page=1;
}else{
	$page=$_GET['page'];
}
$starting_number=($page-1)*$result_per_page;
$consultations=$consultation->getAccepted($_SESSION['user_id'], $starting_number, $result_per_page,null);
require 'consultationsDoctor.view.php';