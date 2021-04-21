<?php 
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && $_SESSION['estVerifier']==0) {
	header('location: ' . $_SESSION['role']);
}
$rows = $demande->getRequests($_SESSION['user_id'], false);
require 'boite.view.php';