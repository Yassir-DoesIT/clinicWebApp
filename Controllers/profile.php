<?php
if (isset($_GET['profile'])) {
	$profile=$doctor->selectApproved($_GET['profile']);
	// var_dump($profile);

require 'profile.view.php';
}