<?php 
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}
		if (isset($_GET['cityAdmin'])) {

			$cityName= $_GET['cityAdmin'];
			$quartiers = $quartier->selectAllQ($cityName);
			$json=json_encode($quartiers);
			echo $json;
		}