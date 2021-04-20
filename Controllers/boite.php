<?php 
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
$rows = $demande->getRequests($_SESSION['user_id'], false);
require 'boite.view.php';