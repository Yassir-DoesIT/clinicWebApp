<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='doctor')) {
	header('location:'. $_SESSION['role']);
}elseif (isset($_SESSION['role']) && $_SESSION['estVerifier']==0) {
	header('location: ' . $_SESSION['role']);
}
$rows = $demande->getRequests($_SESSION['user_id'], false);
$demandes=$demande->getRequests($_SESSION['user_id'], true);
// var_dump($demandes);
require 'demande.view.php';