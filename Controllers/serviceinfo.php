<?php

f (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}



if (isset($_GET['serviceId'])) {
			$id=$_GET['serviceId'];
			$serviceinfo=$service->selectService($id);
			$json=json_encode($serviceinfo);
			echo $json;
		}