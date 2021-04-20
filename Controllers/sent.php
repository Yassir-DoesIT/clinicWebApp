<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}

			$user_id=$_SESSION['user_id'];
			$messages=$message->getSent($user_id);
			$json=json_encode($messages);
			echo $json;
