<?php 
if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && $_SESSION['role']=='doctor' && isset($_SESSION['user_id'])) {
	if($_SERVER['REQUEST_METHOD']=="POST"){
	
		//photoProfile upload 
		if (isset($_FILES["photoProfile"]) && $_FILES["photoProfile"]["error"]==0) {
			//allowed file types
			$allowed = ["jpg"=>"image/jpg",
			"jpeg"=>"image/jpeg", "png"=>"image/png", "JPG"=>"image/JPG"];
			$photoProfile=$_FILES["photoProfile"]["name"];
			$filetype=$_FILES["photoProfile"]["type"];
			$filesize=$_FILES["photoProfile"]["size"];

				//verify file extension 
				$extension=pathinfo($photoProfile, PATHINFO_EXTENSION);
				if (!array_key_exists($extension, $allowed)) {die("Error: Please select a valid file format.");}

				//verify file size 5MB maximum
				$maxsize=5 * 1024 * 1024;
				if($filesize > $maxsize){die("Error : file size is larger than the allowed limit ". $maxsize);}
		if (in_array($filetype, $allowed)) {

				$photoProfile=$_SESSION['user_id'].$_SESSION['cin'] . "." . $extension;
				move_uploaded_file($_FILES["photoProfile"]["tmp_name"],"UsersCache/photoProfile/".$photoProfile);
				$result=$doctor->updatePicture($_SESSION['user_id'], $photoProfile);
				
			}else{
				echo "Error: There was a problem uploading your file. Please try again."; }
		}elseif (isset($_POST['email']) && isset($_POST['cin'])) {
			$result=$doctor->updateUser($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['dateNaissance'], $_POST['sexe'], $_POST['email'], $_POST['password'], $_POST['role'],$_POST['specialite'], $_POST['lieuTravaille']);
		}
}
require 'doctor.view.php';
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='doctor')) {
	header('location:'. $_SESSION['role']);
}else{
	header('location: signUpForm#login');
}
