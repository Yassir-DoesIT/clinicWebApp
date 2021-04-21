<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && $_SESSION['estVerifier']==0) {
	header('location: ' . $_SESSION['role']);
}
		$user_id=$_SESSION['user_id'];
			$messages=$message->getSent($user_id);
			$json=json_encode($messages);
			echo $json;
