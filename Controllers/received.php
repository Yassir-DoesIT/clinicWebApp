<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && $_SESSION['estVerifier']==0) {
	header('location: ' . $_SESSION['role']);
}


	if(isset($_GET['userId']))
	{
		$user_id=$_GET['userId'];
			$userInfo=$user->getUserById($user_id);
			$json=json_encode($userInfo);
			echo $json;
	}
	elseif(isset($_GET['messageId']))
	{
		$message_id=$_GET['messageId'];
		
			$messageInfo=$message->getMessage($message_id);
			$json=json_encode($messageInfo);
			echo $json;
	}
	else
	{
		$user_id=$_SESSION['user_id'];
			$messages=$message->getReceived($user_id);
			$json=json_encode($messages);
			echo $json;
	}			
