<?php

if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}

if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if($_POST['role']=='p'){
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
				if (file_exists("UsersCache/photoProfile/". $photoProfile)) {
			
				return ['errorMessage'=>"{$photoProfile} already exists"];
			
				}else{

				$photoProfile=$_POST['role'].$_POST['cin'] . ".png";
				move_uploaded_file($_FILES["photoProfile"]["tmp_name"],"UsersCache/photoProfile/".$photoProfile);
				$result=$patient->signUpUser($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['dateNaissance'], $_POST['sexe'], $_POST['email'], $_POST['password'], $_POST['role'], $photoProfile);
				}
				
			}else{
				echo "Error: There was a problem uploading your file. Please try again."; }
		}else{
			echo "Error: " . $_FILES["photoProfile"]["error"];
	}
	

	}elseif ($_POST['role']=='d') {
		//justificatif upload 
		if (isset($_FILES["justificatif"]) && $_FILES["justificatif"]["error"]==0) {
			//allowed file types
			$allowed = ["jpg"=>"image/jpg",
			"jpeg"=>"image/jpeg", "png"=>"image/png", "JPG"=>"image/JPG","pdf"=>".pdf"];
			$justificatif=$_FILES["justificatif"]["name"];
			$filetype=$_FILES["justificatif"]["type"];
			$filesize=$_FILES["justificatif"]["size"];

				//verify file extension 
				$extension=pathinfo($justificatif, PATHINFO_EXTENSION);
				if (!array_key_exists($extension, $allowed)) {die("Error: Please select a valid file format.");}

				//verify file size 5MB maximum
				$maxsize=5 * 1024 * 1024;
				if($filesize > $maxsize){die("Error : file size is larger than the allowed limit ". $maxsize);}
		if (in_array($filetype, $allowed)) {
				if (file_exists("UsersCache/Justificatif/". $justificatif)) {
			
				return ['errorMessage'=>"{$justificatif} already exists"];
			
				}else{

				$justificatif=$_POST['cin'] . "." . $extension;
				move_uploaded_file($_FILES["justificatif"]["tmp_name"],"UsersCache/Justificatif/".$justificatif);
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
			

				$photoProfile=$_POST['role'].$_POST['cin'] . ".png";
				move_uploaded_file($_FILES["photoProfile"]["tmp_name"],"UsersCache/photoProfile/".$photoProfile);
				$result=$doctor->signUpUser($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['dateNaissance'], $_POST['sexe'], $_POST['email'], $_POST['password'], $_POST['role'], $photoProfile,$_POST['specialite'], $justificatif, $_POST['lieuTravaille']);
				
			}else{
				echo "Error: There was a problem uploading your file. Please try again."; }
		}else{
			echo "Error: " . $_FILES["photoProfile"]["error"];
	}
				
	}
				
			}else{
				echo "Error: There was a problem uploading your file. Please try again."; }
		}else{
			echo "Error: " . $_FILES["justificatif"]["error"];
	}

		
	}

}




require 'main.view.php';