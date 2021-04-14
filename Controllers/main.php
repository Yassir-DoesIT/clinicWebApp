<?php

if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}

if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if($_POST['role']=='p'){
	$result=$patient->signUpUser($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['dateNaissance'], $_POST['sexe'], $_POST['email'], $_POST['password'], $_POST['role']);

	}elseif ($_POST['role']=='d') {
		//justificatif upload 
		if (isset($_FILES["justificatif"]) && $_FILES["justificatif"]["error"]==0) {
			//allowed file types
			$allowed = ["jpg"=>"image/jpg",
			"jpeg"=>"image/jpeg", "png"=>"image/png", "pdf"=>".pdf"];
			$filename=$_FILES["justificatif"]["name"];
			$filetype=$_FILES["justificatif"]["type"];
			$filesize=$_FILES["justificatif"]["size"];

				//verify file extension 
				$extension=pathinfo($filename, PATHINFO_EXTENSION);
				if (!array_key_exists($extension, $allowed)) {die("Error: Please select a valid file format.");}

				//verify file size 5MB maximum
				$maxsize=5 * 1024 * 1024;
				if($filesize > $maxsize){die("Error : file size is larger than the allowed limit ". $maxsize);}
		if (in_array($filetype, $allowed)) {
				if (file_exists("UsersCache/Justificatif/". $filename)) {
			
				return ['errorMessage'=>"{$filename} already exists"];
			
				}else{

				$filename=$_POST['cin'] . "." . $extension;
				move_uploaded_file($_FILES["justificatif"]["tmp_name"],"UsersCache/Justificatif/".$filename);
				$result=$doctor->signUpUser($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['dateNaissance'], $_POST['sexe'], $_POST['email'], $_POST['password'], $_POST['role'], $_POST['specialite'],  $filename);
				}
				
			}else{
				echo "Error: There was a problem uploading your file. Please try again."; }
		}else{
			echo "Error: " . $_FILES["justificatif"]["error"];
	}

		
	}

}




require 'main.view.php';