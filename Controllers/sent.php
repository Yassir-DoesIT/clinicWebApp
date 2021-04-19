<?php

			$user_id=$_SESSION['user_id'];
			$messages=$message->getSent($user_id);
			$json=json_encode($messages);
			echo $json;
