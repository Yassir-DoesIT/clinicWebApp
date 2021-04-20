<?php 
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}
$rows = $demande->getRequests($_SESSION['user_id'], null,null,false);
require 'boite.view.php';