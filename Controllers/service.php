<?php
// if (isset($_SESSION['role'])) {
// 	header('location:'. $_SESSION['role']);
// }




if (isset($_GET['quartierId'])) {
			$id=$_GET['quartierId'];
			$services=$service->selectAllServices($id);
			foreach($services as $service){
				echo '[\'';
				echo $service->INTITULE_SERVICE;
				echo '\'';
				echo ', ';
				echo $service->LAT_SERVICE;
				echo ', ';
				echo $service->LNG_SERVICE;
				echo ']';
				}

		}else{
					require 'etab.view.php';
				}




