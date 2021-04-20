<?php

if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}



if (isset($_GET['serviceId'])) {
			$id=$_GET['serviceId'];
			$serviceinfo=$service->selectService($id);
			$json=json_encode($serviceinfo);
			echo $json;
		}