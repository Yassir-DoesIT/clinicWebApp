<?php
if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='admin' && isset($_SESSION['user_id'])) {

	if (isset($_SESSION['notApprovedId'])) {
		$user_id=$_SESSION['notApprovedId'];
		$profile=$doctor->selectNotApprovedById($user_id);
		if(isset($_POST['approve'])){
			$doctor->approveDoctor($_POST['doctor_id']);
			header('location: admin');
		}elseif(isset($_POST['delete'])){
			$doctor->deleteDoctorById($_POST['doctor_id']);
			header('location: admin');
		}
	}

	require 'notApproved.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}
