<?php
if (isset($_POST['received'])) {
	$user_id=$_SESSION['user_id'];
			$messages=$message->getReceived($user_id);
			$json=json_encode($messages);
			echo $json;
}else{
	require 'boite.view.php';
}